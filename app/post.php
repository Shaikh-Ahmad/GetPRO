<?php

namespace LaravelForum;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class post extends Model
{
    use Commentable;

   
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeOrdered($query){
    return $query->orderBy('id','desc')->get();
    }

}
