<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;

use Auth;

class HomeController extends Controller
{
    public function index()
    {
    	if(Auth::check()){
    		$stats = Status::notReply()->where(function ($query) {
    			return $query->where('user_id', Auth::user()->id)
    						 ->orWhereIn('user_id', Auth::user()->friends());
    		})
    		  ->orderBy('created_at', 'desc')
    		  ->paginate(10);

    		return view('timeline.index')
    			->with('stats', $stats);
    	}
    	return view('home');
    }
}
