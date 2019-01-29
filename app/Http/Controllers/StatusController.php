<?php

namespace App\Http\Controllers;
use Auth;
use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function postStatus(Request $request)
    {
    	$this->validate($request, [
    		'status' => 'required|max:1000'
    	]);

    	Auth::user()->status()->create([
    		'body' => $request->input('status'),
    	]);

    	return redirect()->route('home')->with('info', 'Status Posted!');
    }

    public function postReply(Request $request, $statusId)
    {
    	$this->validate($request,[
    		"reply-{$statusId}" => 'required|max:1000'
    	],
    	[
    		"required" => 'The reply field cannot be empty'
    	]

    	);

    	$status = Status::notReply()->find($statusId);

    	if(!$status){
    		return redirect()->route('home');
    	}

    	if(!Auth::user()->isFriendsWith($status->Duser) && Auth::user()->id !== $status->Duser->id){
    		return redirect()->route('home')->with('info', 'Somethings wrong');
    	}

    	$reply = Status::create([
    		'body' => $request->input("reply-{$statusId}"),
    	])->Duser()->associate(Auth::user());

    	$status->replies()->save($reply);

    	return redirect()->back();
    }

    public function getLike($statusId)
    {
        $status =  Status::find($statusId);

        if(!$status){
            return redirect()->route('home');
        }
 
        if(!Auth::user()->isFriendsWith($status->Duser)){
            return redirect()->route('home');
        }

        if(Auth::user()->hasLikedStatus($status)){
            dd('has already liked ');
            return redirect()->back();
        }
         
        $like = $status->likes()->create([]);  
        Auth::user()->ulikes()->save($like);
        return redirect()->back();
    }
}
