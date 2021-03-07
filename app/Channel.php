<?php

namespace LaravelForum;


class Channel extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'user_id');
     }
}
