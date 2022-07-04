<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'view']);
    }

    public function index(User $user)
    {
        return view('skills.index', compact('user'));        
    }

    public function view(User $user)
    {
        $skills = $user->profile->skills;

        return response()->json([
            'skills' => $user->profile->skills,
            'count' => $skills->count(),
        ]);
    }
    
    public function store(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'max:255'],
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
            $data = [
                'title' => $request->title,
            ];

            $user->profile->skills()->create($data);

            $skills = $user->profile->skills;

            return response()->json([
                'status' => 200,
                'message' => 'Skill added successfully!',
                'skill' => $skills[0],
                'count' => $skills->count(),
            ]);
        }
    }

    public function edit(User $user, $id)
    {

        $skill = Skill::find($id);

        if( $skill )
        {
            return response()->json([
                'status' => 200,
                'skill' => $skill,
            ]);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => "Skill not found!",
            ]);
        }
    }

    public function update(Request $request, User $user, $id)
    {

        $validator = Validator::make($request->all(), [
            'title' => ['required', 'max:255'],
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
            $skill = Skill::find($id);

            if( $skill )
            {
                $data = [
                    'title' => $request->title,
                ];

                $skill->update($data);

                return response()->json([
                    'status' => 200,
                    'message' => 'Skill updated successfully!',
                    'skill' => $skill,
                ]);
            }
            else
            {
                return response()->json([
                    'status' => 404,
                    'message' => "Skill not found!",
                ]);
            }
        }
    }

    public function destroy(User $user, $id)
    {
        $skill = Skill::find($id);

        if( $skill )
        {
            $skill->delete();
            $count = $user->profile->skills->count();
            
            return response()->json([
                'status' => 200,
                'message' => "Skill deleted successfully!",
                'count' => $count,
            ]);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => "Skill not found!",
            ]);
        }
    }
}
