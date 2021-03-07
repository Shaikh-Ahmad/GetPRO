<?php

namespace LaravelForum;

use Illuminate\Notifications\Notifiable;
use LaravelForum\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravelista\Comments\Commenter;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cache;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable , Commenter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password' ,'username','role','profile_varified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function profiledetail(){
        
        return $this->hasOne(UserProfileDetail::class,'user_id');
    }
    public function isOnline(){
        return Cache::has('user-is-online'.$this->id);
    }
    public function discussions(){
         return $this->hasMany(Discussion::class);
    }
    public function replies(){
        return $this->hasMany(Reply::class);
   }
   public function sendEmailVerificationNotification(){
       $this->notify(new VerifyEmail());
   }

   public function posts(){
    return $this->hasMany(post::class);
    }
    public function channels(){
        return $this->hasMany(Channel::class);
    }

    public function hireRequest(){
        return $this->hasMany(HireRequest::class);
    }
    public function totalhirerequest(){
        return $this->hasMany(HireRequest::class,'reciver_id');
    }

}
