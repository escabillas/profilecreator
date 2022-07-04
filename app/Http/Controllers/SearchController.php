<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search()
    {
        $search_text = trim($_GET['query'], ' ');
        $results = [];

        if( $search_text )
        {
            $results = User::where('email', 'like', '%' . $search_text . '%')
                            ->orWhere('name', 'like', '%' . $search_text . '%')
                            ->with('profile')->get()->sortBy('name');
        }

        return view('search', compact('results'));
    }
}
