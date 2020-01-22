<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;

    protected $dates = [
        'deleted_at'
    ];

    protected $guarded = [
        'id'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function like_users() {
        return $this->belongsToMany('App\User', 'likes', 'post_id', 'user_id')->withTimestamps();
    }

}
