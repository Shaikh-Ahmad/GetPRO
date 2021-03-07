<?php

namespace LaravelForum\Http\Controllers;

use DB;
use LaravelForum\Reply;
use LaravelForum\Channel;
use Illuminate\Http\Request;
use LaravelForum\Discussion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use LaravelForum\Http\Requests\Discussions\CreateDiscussionRequest;

class DiscussionsController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only('create','store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $q = Input::get ( 'q' );
        if(Auth::user()->role == 'admin')
            {
                $channel = Channel::where('name','LIKE','%'.$q.'%')->get();
                return view('discussions.index',['discussions'=>Discussion::orderBy('created_at','desc')->filterByChannels()->paginate(15)])->with('channels', $channel)->withDetails($channel)->withQuery( $q );
            }
        else
        {
            $channel = Channel::where('channelprofession', '=', auth()->user()->profiledetail->profession)->where('name','LIKE','%'.$q.'%')->get();
            return view('discussions.index',['discussions'=>Discussion::orderBy('created_at','desc')->filterByChannels()->paginate(15)])->with('channels', $channel)->withDetails($channel)->withQuery( $q );
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $q = Input::get ( 'q' );
        $channel = Channel::where('channelprofession', '=', auth()->user()->profiledetail->profession)->where('name','LIKE','%'.$q.'%')->get();
        return view('discussions.create')->with('channels', $channel)->withDetails($channel)->withQuery( $q );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscussionRequest $request)
    {
        auth()->user()->discussions()->create([
            'title'=>$request->title,
            'content'=>$request->content,
            'related_profession'=>$request->user()->profiledetail->profession,
            'channel_id'=>$request->channel

        ]);
        session()->flash('success','Discussion Posted');
        return redirect()->route('discussions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $q = Input::get ( 'q' );
        $disscussion=Discussion::find($id);
        if(auth()->user()->role == "admin"){
            $channel = Channel::where('name','LIKE','%'.$q.'%')->get();
            return view('discussions.show')->with('discussion',$disscussion)->with('channels', $channel);
            
        }
        $channel = Channel::where('channelprofession', '=', auth()->user()->profiledetail->profession)->where('name','LIKE','%'.$q.'%')->get();
        return view('discussions.show')->with('discussion',$disscussion)->with('channels', $channel);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disscussion = Discussion::find($id);
        if(auth()->user()->id == $disscussion ->user_id || auth()->user()->role == "admin") {
            $reply = Reply::all()->where('discussion_id' , $disscussion->id ); 
            $reply->each->delete();
            $disscussion -> delete();
            return redirect()->back()->with('success','Discussion Deleted');

        }

        return redirect('/discussions')->with('error','Unauthorized page');
    }


    public function reply($id,$reply_id)
    {
        $disscussion=Discussion::find($id);
        $reply=Reply::find($reply_id);
        $disscussion->markAsBestReply($reply);
        session()->flash('success','Marked as best reply!');
        return redirect()->back();

    }
}
