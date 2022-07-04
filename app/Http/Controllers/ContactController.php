<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(User $user)
    {
        return view('contacts.index', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        return view('contacts.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $this->validate($request, [
            'address' => ['max:255'],
            'social' => ['max:255'],
            'website' => ['max:255'],
            'email' => ['required', 'email', 'max:255'],
            'mobile' => ['numeric', 'nullable', 'digits_between: 10,15'],
        ]);

        $dataContact = [
            'address' => $request->address,
            'social' => $request->social,
            'website' => $request->website,
            'mobile' => $request->mobile,
        ];

        $dataUser = [
            'email' => $request->email,
        ];

        $user->profile->contact->update($dataContact);
        
        $user->update($dataUser);

        return redirect()->route('contact', compact('user'));

    }
}
