<?php

namespace App\Models;

use App\Status;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable; 

    public function getName()
    {
        if($this->first_name && $this->last_name){
            return ucwords($this->first_name ." ". $this->last_name);
        }

        if($this->first_name)
            return ucfirst($this->first_name);

        return null;
    }

    public function getNameOrUsername()
    {
        return $this->getName() ?: ucfirst($this->username);
    }

    public function getFirstNameOrUsername()
    {
        return ucfirst($this->first_name) ?: ucfirst($this->username);
    }

    public function getAvatar()
    {
        return '/img/'.$this->avatar;
    }

   
    protected $fillable = [
        'username',
        'email',
        'password',
        'first_name',
        'last_name',
        'location',
    ];

   
    protected $hidden = [
        'password',
        'remember_token',
    ];


    // returns all users that are friends to this user
    public function friendsOfMine()
    {
        return $this->belongsToMany('App\Models\User', 'friends', 'user_id', 'friend_id');
        //friends->pivot table, user_id->fkey, friend_id->pkey
    }


    //a user has many statuses
    public function status()
    {
        return $this->hasMany('App\Status', 'user_id');
    }

    public function ulikes()
    {
        return $this->hasMany('App\likeable', 'user_id');
    }


    //returns all users that have me as friends
    public function friendOf()
    {
        return $this->belongsToMany('App\Models\User','friends','friend_id','user_id');
        //friends->pivot table, user_id->pkey, friend_id->fkey
    }

    public function friends()
    {
        return $this->friendsOfMine()->wherePivot('accepted', true)->get()->merge($this->friendOf()->wherePivot('accepted',true)->get()); 
    }

    //users i've sent requests to that have not accepted
    public function friendRequests()
    {
        return $this->friendsOfMine()->wherePivot('accepted', false)->get();
    }
    
    public function friendRequestsPending()
    {
        return $this->friendOf()->wherePivot('accepted', false)->get();
    }

    //to check if a user has a friend request pending from another user
    public function hasFriendRequestPending(User $user)
    {
        return (bool) $this->friendRequestsPending()->where('id', $user->id)->count();
    }

    public function hasFriendRequestReceived(User $user)
    {
        return (bool) $this->friendRequests()->where('id', $user->id)->count();
    }

    public function addFriend(User $user)
    {
        $this->friendOf()->attach($user->id);
    }

    public function acceptFriendRequest(User $user)
    {
        $this->friendRequests()->where('id', $user->id)->first()->pivot->update([
            'accepted' => true,
        ]);
    }

    public function isFriendsWith(User $user)
    {
        return (bool) $this->friends()->where('id', $user->id)->count();
    }


    public function hasLikedStatus(Status $status)
    {
        return (bool) $status->likes->where('user_id', $this->id)->count();
    }
}
