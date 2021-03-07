<?php

namespace LaravelForum;

use Illuminate\Database\Eloquent\Model;

class HireRequest extends Model
{
    protected $guarded=[];
    // protected $fillable = [
    //     'mobile'
    // ];

    protected $primaryKey = 'id';
    public function user(){
        return $this->belongsTo(User::class,'sender_id');
    }
    public function reciveruser(){
        return $this->belongsTo(User::class,'reciver_id');
    }
}
