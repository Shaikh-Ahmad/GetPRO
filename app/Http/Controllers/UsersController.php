<?php

namespace LaravelForum\Http\Controllers;

use LaravelForum\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class UsersController extends Controller
{

  
    public function notification(){
        // dd(auth()->user()->unreadNotifications);
        //mark as all read
        auth()->user()->unreadNotifications->markAsRead();
        //dd(auth()->user()->notifications->first()->data['discussion']['slug']);
       

        //display all notifications
        return view('users.notifications',[
            'notifications'=>auth()->user()->notifications()->paginate(10)
        ]);
    }
}
