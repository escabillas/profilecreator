<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ExperienceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'view']);
    }

    public function index(User $user)
    {
        return view('experiences.index', compact('user'));
    }

    public function view(User $user)
    {
        $experiences = $user->profile->experiences->sortBy([
            ['startdateyear', 'desc'],
            ['startdatemonth', 'desc'],         
            ['enddatemonth', 'asc'],
            ['enddatemonth', 'asc'],
        ]);

        return response()->json([
            'experiences' => $experiences,
            'count' => $experiences->count(),
        ]);
    }

    public function store(Request $request, User $user)
    {
        $current = isset($request->current) ? true : false;
        $valid = ( $current )? 'nullable' : 'required';

        $validator = Validator::make($request->all(), [
            'company' => ['required', 'max:255'],
            'position' => ['required', 'max:255'],
            'startdatemonth' => ['required', 'digits_between:1,12'],
            'startdateyear' => ['required', 'digits:4'],
            'enddatemonth' => [$valid, 'digits_between:1,12'],
            'enddateyear' => [$valid, 'digits:4'],
            'description' => ['nullable'],
        ]);

        $startdate = date_create_from_format("n-Y","{$request->startdatemonth}-{$request->startdateyear}");
        $enddate = date_create_from_format("n-Y","{$request->enddatemonth}-{$request->enddateyear}");
        $startend = [];

        if( !$current && ($startdate >= $enddate) )
        {
            $startend['error'] = "End date must be after Start date.";
        }


        if( $validator->fails() || $startend )
        {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
                'startend' => $startend,
            ]);
        } 
        else 
        {
            $data = [
                'company' => $request->company,
                'position' => $request->position,
                'current' => $current,
                'startdatemonth' => $request->startdatemonth,
                'startdateyear' => $request->startdateyear,
                'enddatemonth' => $request->enddatemonth,
                'enddateyear' => $request->enddateyear,
                'description' => $request->description,
            ];

            $user->profile->experiences()->create($data);

            return response()->json([
                'status' => 200,
                'message' => 'Experience added successfully!',
            ]);
        }
    }

    public function edit(User $user, $id)
    {

        $experience = Experience::find($id);

        if( $experience )
        {
            return response()->json([
                'status' => 200,
                'experience' => $experience,
            ]);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => "Experience not found!",
            ]);
        }
    }

    public function update(Request $request, User $user)
    {
        $current = isset($request->current) ? true : false;
        $valid = ( $current )? 'nullable' : 'required';

        $validator = Validator::make($request->all(), [
            'company' => ['required', 'max:255'],
            'position' => ['required', 'max:255'],
            'startdatemonth' => ['required', 'digits_between:1,12'],
            'startdateyear' => ['required', 'digits:4'],
            'enddatemonth' => [$valid, 'digits_between:1,12'],
            'enddateyear' => [$valid, 'digits:4'],
            'description' => ['nullable'],
        ]);

        $startdate = date_create_from_format("n-Y","{$request->startdatemonth}-{$request->startdateyear}");
        $enddate = date_create_from_format("n-Y","{$request->enddatemonth}-{$request->enddateyear}");
        $startend = [];

        if( !$current && ($startdate >= $enddate) )
        {
            $startend['error'] = "End date must be after Start date.";
        }

        if( $validator->fails() || $startend )
        {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
                'startend' => $startend,
            ]);
        } 
        else 
        {
            $experience = Experience::find($request->id);

            if( $experience )
            {
                $data = [
                    'company' => $request->company,
                    'position' => $request->position,
                    'current' => $current,
                    'startdatemonth' => $request->startdatemonth,
                    'startdateyear' => $request->startdateyear,
                    'enddatemonth' => $request->enddatemonth,
                    'enddateyear' => $request->enddateyear,
                    'description' => $request->description,
                ];

                $experience->update($data);

                return response()->json([
                    'status' => 200,
                    'message' => 'Experience updated successfully!',
                ]);
            }
            else
            {
                return response()->json([
                    'status' => 404,
                    'message' => "Experience not found!",
                ]);
            }
        }
    }

    public function destroy(User $user, $id)
    {
        $experience = Experience::find($id);

        if( $experience )
        {
            $experience->delete();
            
            return response()->json([
                'status' => 200,
                'message' => "Experience deleted successfully!",
            ]);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => "Experience not found!",
            ]);
        }
    }
}
