<?php

namespace LaravelForum\Http\Controllers;

use LaravelForum\post;
use LaravelForum\User;
use LaravelForum\Channel;
use Illuminate\Http\Request;
use LaravelForum\Discussion;
use LaravelForum\Reply;
use LaravelForum\HireRequest;
use Illuminate\Support\Facades\DB;
use LaravelForum\UserProfileDetail;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index(){
        $totalusers = User::all()->where('role','!=','admin');
        $totalposts = post::all();
        $totaldiscussions = Discussion::all();
        $totalchannels = Channel::all();
        $id = auth()->user()->id;
        $user = User::find($id);
        
        return view('admin.dashboard',
        ['user'=>$user,'totalusers'=>$totalusers,'totalposts'=>$totalposts,'totaldiscussions'=>$totaldiscussions,'totalchannels'=>$totalchannels]);
    }

    public function configusers(Request $request)
    {   
        $q = $request->input( 'q' );
        $users = User::where('role','!=','admin')->where('username','LIKE','%'.$q.'%')->get();   
        return view('admin.handelusers',['users'=>$users]);
    }

     public function userdestroy($id)
    {
        if(Auth::user()->role == "admin"){  
        $user = User::find($id);

        if($user->role == 'service_provider'){
           
            $userdetail = UserProfileDetail::find($id);
            $post = post::all()->where('user_id' , "=" , $user->id );
            $discussion = Discussion::all()->where('user_id' , "=" , $user->id );
            $reply = Reply::all()->where('user_id' , "=" , $user->id );
            $hirereq_recieved = HireRequest::all()->where('reciver_id' , "=" , $user->id );
            $hirereq_send = HireRequest::all()->where('sender_id' , "=" , $user->id );
            
            $hirereq_send->each->delete();
            $hirereq_recieved->each->delete();
            $reply->each->delete();
            $discussion->each->delete();
            $post->each->delete();
            $userdetail->delete();
            $user->delete();
            return redirect('/configusers')->with('success','User Deleted'); 
        }
        
            $user->delete();
            return redirect('/configusers')->with('success','User Deleted'); 
             
        }
    }


    public function configposts( Request $request)
    {   
        if (Auth::check()) {
            $q = $request->input( 'q' );
            $post = post::orderBy('id','desc')->where('id','LIKE','%'.$q.'%')->get();
            $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
            return view('admin.handelposts',['posts'=> $post],['imageExtensions' => $imageExtensions]); 
        }
             return redirect(route('login'));
        
    }

    public function configdiscussions( Request $request)
    {   
        if (Auth::check()) {
            $q = $request->input( 'q' );
            $discussion = Discussion::orderBy('id','desc')->where('title','LIKE','%'.$q.'%')->get();
            return view('admin.handeldiscussions',['discussions'=> $discussion]); 
        }
            return redirect(route('login'));
        
    }

    public function test($id)
    {
      
        $discussion = Discussion::find($id);
        $reply = Reply::all()->where('discussion_id' , $discussion->id );

        return $reply;
    }
   
      
}
