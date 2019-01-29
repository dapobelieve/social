<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	protected $table = 'statuses';
    protected $fillable = [
    	'body',
    ];


    //a status belongTo a user aka Duser
    public function Duser()
    {
    	return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function scopeNotReply($query)
    {
    	return $query->whereNull('parent_id');
    }
    //this is a scope that helps to dry out our query a
    //and return only records that dont have a parent_id
    //that way we can know they're comments not replies

    public function replies()
    {
    	return $this->hasMany('App\Status', 'parent_id');
    }

    // a status can have many likes
    public function likes()
    {
        return $this->morphMany('App\likeable', 'likeable');
    }

}
