<?php

namespace LaravelForum\Http\Controllers;

use Illuminate\Http\Request;
use LaravelForum\Channel;
use Illuminate\Support\Facades\Input;
use DB;
use LaravelForum\Profession;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $channels = Channel::all();
        $professions = Profession::all();

        if(auth()->user()->role =="service_provider")
        {
            return DB::table('channels')->where('channelprofession', '=', auth()->user()->profiledetail->profession)->get();

        }
        else{
            return view('channel.index')->with('channels', $channels)->with('professions',$professions);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $professions = Profession::all();
        return view ('channel.create')->with('professions',$professions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:50'
        ]);
        $channel = new channel;
        $channel->name = $request->input('name');
        if(auth()->user()->role == 'admin'){
            $channel->channelprofession = $request->input('channelprofession');
            $channel->save();
            return redirect('/channel')->with('sucess','Channel created');
        }
        else{
            $channel->channelprofession = $request->user()->profiledetail->profession;
            $channel->save();
            return redirect('discussions/create')->with('sucess','Channel created');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $channel = Channel::find($id);
            $channel->delete();
            return redirect('/channel')->with('success','channel Deleted');
        
    }

    
  

    function fetch(Request $request)
    {
        if($request->get('query'))
        {
        $query = $request->get('query');
        $data = DB::table('channels')
            ->where('name', 'LIKE', "%{$query}%")
            ->get();
        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        foreach($data as $row)
        {
        $output .= '<li  class="ml-4">'.$row->id.'</li>';
        }
        $output .= $row->name. '</ul>';
        echo $output;
        }

        
    }

}
