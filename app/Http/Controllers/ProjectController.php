<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'view']);
    }

    public function index(User $user)
    {
        return view('projects.index', compact('user'));
    }

    public function view(User $user)
    {
        $projects = $user->profile->projects;

        return response()->json([
            'projects' => $projects,
            'count' => $projects->count(),
        ]);
    }

    public function store(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'max:255'],
            'description' => ['required'],
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
                'description' => $request->description,
            ];

            $user->profile->projects()->create($data);

            $projects = $user->profile->projects;

            return response()->json([
                'status' => 200,
                'message' => 'Project added successfully!',
                'project' => $projects[0],
                'count' => $projects->count(),
            ]);
        }
    }

    public function edit(User $user, $id)
    {

        $project = Project::find($id);

        if( $project )
        {
            return response()->json([
                'status' => 200,
                'project' => $project,
            ]);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => "Project not found!",
            ]);
        }
    }

    public function update(Request $request, User $user, $id)
    {

        $validator = Validator::make($request->all(), [
            'title' => ['required', 'max:255'],
            'description' => ['required'],
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
            $project = Project::find($id);

            if( $project )
            {
                $data = [
                    'title' => $request->title,
                    'description' => $request->description,
                ];

                $project->update($data);

                return response()->json([
                    'status' => 200,
                    'message' => 'Project updated successfully!',
                    'project' => $project,
                ]);
            }
            else
            {
                return response()->json([
                    'status' => 404,
                    'message' => "Project not found!",
                ]);
            }
        }
    }

    public function destroy(User $user, $id)
    {
        $project = Project::find($id);

        if( $project )
        {
            $project->delete();
            $count = $user->profile->projects->count();
            
            return response()->json([
                'status' => 200,
                'message' => "Project deleted successfully!",
                'count' => $count,
            ]);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => "Project not found!",
            ]);
        }
    }
}
