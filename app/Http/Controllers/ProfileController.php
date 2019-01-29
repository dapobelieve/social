<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function getProfile($username)
    {
    	$user = User::where('username', $username)->first();
        $statuses = $user->status()->notReply()->get();

    	if(!$user){
    		abort(404);
    	}
    	return view('profile.index')
    			->with('user', $user)
                ->with('stats', $statuses)
                ->with('isAFriend', Auth::user()->isFriendsWith($user));
    }

    public function getEdit()
    {
    	return view('profile.edit');
    }

    public function postEdit(Request $request)
    {
    	$this->validate($request, [
    		'first_name' => 'alpha|max:50',
    		'last_name' => 'alpha|max:50',
            'location' => 'max:20',
    		'username' => 'required|alpha:50',
    	]);

    	Auth::user()->update([
    		'first_name' => $request->input('first_name'),
    		'last_name'  => $request->input('last_name'),
            'location'   => $request->input('location'),
    		'username'   => $request->input('username'),
    	]);

    	return redirect()
		    	->route('profile.edit')
		    	->with('info','Profile updated successfully');
    }
}
