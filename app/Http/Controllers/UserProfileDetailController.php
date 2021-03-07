<?php

namespace LaravelForum\Http\Controllers;
use DB;
use LaravelForum\User;
use Illuminate\Http\Request;
use LaravelForum\Profession;
use LaravelForum\UserProfileDetail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class UserProfileDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userdetail = UserProfileDetail::orderBy('user_id','asc')->paginate(12);
        return view ('client.dashboard')->with('userdetails', $userdetail); 
    }

    public function search()
    {
        $q = Input::get ( 'q' );
        $user = UserProfileDetail::where('name','LIKE','%'.$q.'%')->get();
        if(count($user) > 0)
        return view('user_profile_detail.searchuser')->with('userdetails', $user)->withDetails($user)->withQuery( $q );
        else return  redirect()->back()->with('error','no user found');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $profession = Profession::all();
        if(auth()->user()->role != 'client') 
        {
            return view('user_profile_detail.create2')->with('professions',$profession);
        }
        else{
            return abort(404);
        }
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
        
            'profile_pic' => 'image|nullable|max:1999'
        ]);
                // handeling image file upload
        if ($request->hasFile('profile_pic')) {
            //get file name with extesion
            $fileNameWithExt = $request->file('profile_pic')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension =  $request->file('profile_pic')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore =   $fileName.'_'.time().'.'.$extension;
            //uploadImage
            
            $path = $request->file('profile_pic')->storeAs('public/profile_pics',$fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }

        $userd = new UserProfileDetail ;
        
        $userd->user_id = $request->user()->id;
        $userd->name = $request->user()->name;
        $userd->username = $request->user()->username;
        $userd->about = $request->input('about');
        $userd->gender= $request->input('gender');
        $userd->profession= $request->input('profession');
        $userd->city = $request->input('city');
        $userd->education = $request->input('education');
        $userd->studied_at = $request->input('studied_at');
        $userd->current_work = $request->input('current_work');
        $userd->previous_work = $request->input('previous_work');
        $userd->work_status = $request->input('work_status');
        $userd->work_adress = $request->input('work_adress');
        $userd->phone_no = $request->input('phone_no');
        $userd->birthday = $request->input('birthday');
        
        $userd->profile_pic = $fileNameToStore ;
            
        $userd->save();
        return redirect('/home')->with('sucess','ID edited');
        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user = UserProfileDetail::find($id);
        $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
        return view('user_profile_detail.show')->with('user',$user)->with('imageExtensions',$imageExtensions);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        if(auth()->user()->role != 'client') 
        {
            $user = UserProfileDetail::find($id);
            //authentication
            if(auth()->user()->id == $user->user->id || auth()->user()->role == "admin") {
                
                return view('user_profile_detail.edit2')->with('user',$user);
            }
            return redirect('/')->with('error','Unauthorized page');
        }
        else{
            return abort(404);
        }
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
        
            'profile_pic' => 'image|nullable'
        ]);
                // handeling image file upload
        if ($request->hasFile('profile_pic')) {
            //get file name with extesion
            $fileNameWithExt = $request->file('profile_pic')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension =  $request->file('profile_pic')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore =   $fileName.'_'.time().'.'.$extension;
            //uploadImage
            
            $path = $request->file('profile_pic')->storeAs('public/profile_pics',$fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }

        $userd = UserProfileDetail::find($id);
        if(auth()->user()->id == $userd->user->id || auth()->user()->role == "admin") 
        {
        
        $userd->about = $request->input('about');
        $userd->gender= $request->input('gender');
        $userd->profession= $request->input('profession');
        $userd->city = $request->input('city');
        $userd->education = $request->input('education');
        $userd->studied_at = $request->input('studied_at');
        $userd->current_work = $request->input('current_work');
        $userd->previous_work = $request->input('previous_work');
        $userd->work_status = $request->input('work_status');
        $userd->work_adress = $request->input('work_adress');
        $userd->phone_no = $request->input('phone_no');
        $userd->birthday = $request->input('birthday');
        $userd->skills = $request->input('skills');
        $userd->speciality = $request->input('speciality');
        $userd->website = $request->input('website');
        $userd->facebook = $request->input('facebook');
        $userd->twitter = $request->input('twitter');
        $userd->github = $request->input('github');
        $userd->profile_varified = $request->input('profile_varified');

        if($request->hasFile('profile_pic')){
            if($userd->profile_pic != 'noimage.jpg'){
             Storage::delete('public/profile_pics/'.$userd->profile_pic);
            }
            $userd->profile_pic = $fileNameToStore ;
        }
            
        $userd->save();
       
        if(auth()->user()->role == "admin"){
            return redirect('/configusers')->with('success','ID Edited');
        }
        return redirect('/home')->with('success','ID Edited');
         
        }

        return redirect('/home')->with('error','Unauthorized page');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function profession(Request $request)
    {
        $key = $request->key;
        $user = UserProfileDetail::where([['profession', $key]])->get();
        return view ('user_profile_detail.index')->with('userdetails', $user)->with('profession', $key);
    }

    
  
   


 
}
