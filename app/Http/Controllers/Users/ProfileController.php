<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {
        if( $user )
        {
            return response()->json([
                'status' => 200,
                'user' => $user,
                'profile' => $user->profile,
            ]);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => "Profile not found!",
            ]);
        }
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'description' => ['nullable'],
            'image' => ['nullable', 'image', 'max:2048', 'mimes:jpg,png,jpeg'],
        ]);

        if( $validator->fails() )
        {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        else
        {
            if( $user )
            {
                $dataProfile = [
                    'description' => $request->description,
                ];

                $dataUser = [
                    'name' => $request->name,
                ];

                if( $request->image )
                {
                    $imagePath = $request->image->store('profile', 'public');
                    $image = Image::make(public_path('storage/'.$imagePath))->fit(170, 170);
                    $image->save();

                    $dataProfile['image'] = $imagePath;
                }

                $user->update($dataUser);
                $user->profile()->update($dataProfile);

                return response()->json([
                    'status' => 200,
                    'message' => 'Profile updated successfully!',
                    'user' => $user,
                    'profile' => $user->profile,
                ]);
            }
            else
            {
                return response()->json([
                    'status' => 404,
                    'message' => "Profile not found!",
                ]);
            }
        }
    }
}
