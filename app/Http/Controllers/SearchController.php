<?php

namespace App\Http\Controllers;

use App\Models\User;
use DB;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getResults(Request $reku)
    {
    	$query = $reku->input('query');
    	// dd($query);
    	if(!$query)
    	{
    		return redirect()->route('home');
    	}

    	$users = User::where(DB::raw("CONCAT(first_name, ' ', last_name)"), 'LIKE', " %{$query}%")
    					->orWhere('username', 'LIKE', "%{$query}%")
    					->get();
    	// dd($users);
    	return view('search.results')->with('users',$users);
    }
}
