<?php

namespace LaravelForum;

use LaravelForum\Notifications\Markedasbestreply;

class Discussion extends Model
{
    //<?php
    protected $primarykey='id';

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function getRouteKeyName(){
        return 'slug';
    }
    public function replies(){
        return $this->hasMany(Reply::class);
    }
    public function markAsBestReply(Reply $reply){
        $this->update([
            'reply_id'=>$reply->id
        ]);
        if($reply->owner->id ===$this->author->id){
            return;
        }
        $reply->owner->notify(new Markedasbestreply($reply->discussion)); //owner is the function belongsto of User model
    }
    public function BestReply(){
        return $this->belongsTo(Reply::class,'reply_id');
    }
    
    public function scopeFilterByChannels($builder){
        if(request()->query('channel')){
            $channel=Channel::where('id',request()->query('channel'))->first();
            
            
        if($channel){
            return $builder->where('channel_id',$channel->id);
        }
        return $builder;
    }
        return $builder;
    }
}


