<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class likeable extends Model
{
    protected $table = 'likeables';

    public function likeable()
    {
    	//i can be applied to any other model
    	return $this->morphTo();
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'user_id');
    }
}
