<?php

namespace LaravelForum\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index(){
            $test=Auth::user()->unreadNotifications;
            dd($test);

    }
}
