<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function index(User $user)
    {
        return view('comments.index', compact('user'));
    }

    public function view(User $user)
    {
        $comments = $user->profile->comments;

        foreach($comments as $i => $items)
        {
            $items->user->name;
        }

        $authId = ( auth()->user() )? auth()->user()->id: "";

        return response()->json([
            'comments' => $comments,
            'count' => $comments->count(),
            'authId' => $authId,
        ]);
    }

    public function store(Request $request, User $user)
    {
        if( auth()->guest() )
        {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorized to comment.'
            ]);
        }
        else if( $user->id == auth()->user()->id )
        {
            return response()->json([
                'status' => 403,
                'message' => 'Forbidden to comment.'
            ]);
        }
        else
        {

            $validator = Validator::make($request->all(), [
                'comment' => ['required'],
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
                    'user_id' => auth()->user()->id,
                    'comment' => $request->comment,
                ];

                $user->profile->comments()->create($data);

                $comment = $user->profile->comments[0];

                $comment->user->name;

                $count = $user->profile->comments->count();

                return response()->json([
                    'status' => 200,
                    'message' => 'Comment added successfully!',
                    'comment' => $comment,
                    'count' => $count,
                    'authId' => auth()->user()->id,
                ]);
            }
        }
    }

    public function edit(User $user, $id)
    {
        if( auth()->guest() )
        {
            return response()->json([
                'status' => 500,
                'message' => 'Unauthorized!'
            ]);
        }

        $comment = Comment::find($id);

        if( $comment )
        {
            return response()->json([
                'status' => 200,
                'comment' => $comment,
            ]);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => "Comment not found!",
            ]);
        }
    }

    public function update(Request $request, User $user, $id)
    {
        if( $user->id == auth()->user()->id )
        {
            return response()->json([
                'status' => 403,
                'message' => 'Forbidden to update.'
            ]);
        }
        else
        {
            $validator = Validator::make($request->all(), [
                'comment' => ['required'],
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
                $comment = Comment::find($id);

                if( $comment )
                {
                    $data = [
                        'comment' => $request->comment,
                    ];

                    $comment->update($data);

                    return response()->json([
                        'status' => 200,
                        'message' => 'Comment updated successfully!',
                        'comment' => $comment,
                    ]);
                }
                else
                {
                    return response()->json([
                        'status' => 404,
                        'message' => "Comment not found!",
                    ]);
                }
            }
        }
    }

    public function destroy(User $user, $id)
    {
        
        $comment = Comment::find($id);

        if( $comment )
        {
            $comment->delete();
            $count = $user->profile->comments->count();
            
            return response()->json([
                'status' => 200,
                'message' => "Comment deleted successfully!",
                'count' => $count,
            ]);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => "Comment not found!",
            ]);
        }
        
    }
}
