<?php

namespace App;

use App\Post;
use App\Role;
use App\Photo;
use Illuminate\Support\Facades\App;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $dates = [
        'deleted_at'
    ];

    /**
     * パスワード再設定メールの送信
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id', 'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    // アイコン画像が登録済みかチェック
    public function is_photo()
    {
        if($this->photo_id !== null) {
            return true;
        } else {
            return false;
        }
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    // master権限かチェック
    public function is_master()
    {
        if($this->role_id == '1') {
            return true;
        } else {
            return false;
        }
    }


    public function likes()
    {
        return $this->belongsToMany('App\Post', 'likes', 'user_id', 'post_id')->withTimestamps();
    }

    
    public function is_like($id)
    {
        return $this->likes()->where('post_id', $id)->exists();
    }


    public function like($id) //postのid
    {
        $exist = $this->is_like($id);

        if($exist) {
            return false;
        } else {
            //Userモデルのlikesメソッドを呼び出して、Auth::user（のid。controller）と、postのidを、それぞれlikesテーブルのuser_id、post_idとして保存する
            $this->likes()->attach($id);
            return true;
        }
    }


    public function unlike($id)
    {
        $exist = $this->is_like($id);

        if($exist) {
            $this->likes()->detach($id);
            return true;
        } else {
            return false;
        }
    }


}
