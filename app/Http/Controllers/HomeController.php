<?php

namespace LaravelForum\Http\Controllers;

use LaravelForum\post;
use LaravelForum\User;
use LaravelForum\Channel;
use Illuminate\Http\Request;
use LaravelForum\Discussion;
use LaravelForum\Profession;
use LaravelForum\UserProfileDetail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        $profession = Profession::all();
       
        if($user->role == 'service_provider')
        {
            $user = UserProfileDetail::find($id); 
            if($user != null){
                $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
                return view('user_profile_detail.show')->with('user',$user)->with('imageExtensions',$imageExtensions);
            }
            return view('user_profile_detail.create2')->with('user',$user)->with('professions',$profession);
            
        }
        elseif($user->role == 'admin'){
            
            return redirect('/dashboard');
        }
        else{
            $profession = Profession::all();
            return view('welcome2')->with('user',$user)->with('professions',$profession);
        }
    }

    
}
