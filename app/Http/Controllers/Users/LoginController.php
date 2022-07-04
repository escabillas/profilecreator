<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        session(['prevLink' => url()->previous() ]);

        return view('users.login');
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!auth()->attempt($request->only('email', 'password')))
        {
            return back()->with('status', 'Invalid login details');
        }

        if( session('prevLink') )
        {
            return redirect(session('prevLink'));
        }
        else
        {
            return redirect()->route('contact', [
                'user' => auth()->user(),
            ]);
        }        
    }
}
