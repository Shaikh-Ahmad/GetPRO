<?php

namespace LaravelForum\Http\Controllers;

use Illuminate\Http\Request;
use LaravelForum\HireRequest;
use LaravelForum\UserProfileDetail;
use LaravelForum\Notifications\HireNow;
use Illuminate\Support\Facades\Notification;

class HireRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $hire = HireRequest::where('reciver_id', '=', auth()->user()->id )->orderBy('id','desc')->get();
        $totalrequest = HireRequest::where([['reciver_id', '=', auth()->user()->id],['request_status', '=','Awaiting']])->get();
        $sentreq = HireRequest::where('sender_id', '=', auth()->user()->id )->get();
        if(auth()->user()->role == 'service_provider'){
            return view ('hire.index')->with(['hires' => $hire, 'sentreqs' => $sentreq , 'totalrequest' => $totalrequest]); 
        }
        else{
            return view ('client.client_hire_request')->with(['sentreqs' => $sentreq ]); 
        }
    }

 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('hire.create');
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
            'first_name' => 'required',
            'subject' => 'required',
            'detail' => 'required',
            'mobile' => 'required|regex:/(03)[0-9]{9}/',
            'location' => 'required',
            'work_tenure' => 'required',
            'assistance_type' => 'required',
            'city' => 'required',

            
        ]);
            $hire=HireRequest::create([
                'sender_id'=>auth()->user()->id,
                'reciver_id'=> $request->input('reciever_id'),
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'content' => $request->input('content'),
                'mobile' => $request->input('mobile'),
                'city' => $request->input('city'),
                'location' => $request->input('location'),
                'subject' => $request->input('subject'),
                'detail' => $request->input('detail'),
                'assistance_type' => $request->input('assistance_type'),
                'work_tenure' => $request->input('work_tenure'),
            ]);
        // $hire_req = new HireRequest;
        // $hire_req->sender_id= $request->user()->id;
        // $reciever_email=$request->input('hire_email');
        // $hire_req->reciver_id= $request->input('reciever_id'); 
        // $hire_req->first_name = $request->input('first_name'); 
        // $hire_req->last_name = $request->input('last_name'); 
        // $hire_req->content = $request->input('content');
        // $hire_req->mobile = $request->input('mobile');
        // $hire_req->location = $request->input('location'); 
        // $hire_req->subject = $request->input('subject');
        // $hire_req->detail = $request->input('detail');
        // 
        // $hire_req->save();
        $data=[
                 'user_name'=>$request->input('first_name'),
                 'message'=>$request->input('subject'),
                 'hire_id'=>$hire->id
             ];
       $users=UserProfileDetail::where('user_id',$request->input('reciever_id'))->first();
        $users->user->notify(new HireNow($data));

    //    Notification::route('mail',$reciever_email)->notify(new HireNow());
        session()->flash('success','Request Sent');
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        $hire = HireRequest::find($id);
        return view('hire.show')->with('hire',$hire);
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
        $this->validate($request,[
            'request_status' => 'required',
            
        ]);
        $hire_req = HireRequest::find($id);
        $hire_req->request_status = $request->input('request_status');

        $hire_req->save();
        if($hire_req->request_status == 'Accepted'){
            return redirect('/hire')->with('success','Request Accepted');
        }
        if($hire_req->request_status == 'Rejected'){
            return redirect('/hire')->with('error','Request Rejected');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hirequest = HireRequest::find($id);
        if(auth()->user()->id !== $hirequest->sender_id) {
            return redirect('/hire')->with('error','Unauthorized page');
            } 
        $hirequest -> delete();
        return redirect('/hire')->with('success','Request Removed');
    }
}
