<?php

namespace LaravelForum;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $guarded=[];
    protected $fillable = [
        'profession_name'
    ];
}
