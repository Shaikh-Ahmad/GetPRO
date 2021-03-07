<?php

namespace LaravelForum;

use Illuminate\Database\Eloquent\Model;

class UserProfileDetail extends Model
{   
    protected $fillable = [
        'profession','gender','birthday','city','profile_pic','phone_no','education','studied_at','work_adress','education','profile_varified',
    ];

    protected $primaryKey = 'user_id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
