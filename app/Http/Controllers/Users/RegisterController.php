<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'max:255'],
            'username' => ['required', 'unique:users', 'max:30'],
            'email' => ['required', 'unique:users', 'email', 'max:255'],
            'password' => ['required', 'confirmed'],            
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $profile = $user->profile()->create();
        $profile->contact()->create();

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('contact', compact('user'));
    }
}
