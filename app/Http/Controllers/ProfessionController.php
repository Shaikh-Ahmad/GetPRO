<?php

namespace LaravelForum\Http\Controllers;
use LaravelForum\Profession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profession = Profession::all();
        return view('professions.index')->with('professions',$profession);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('professions.create');
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
           
            'content' => 'required|max:300',
            'profession_name' => 'required|max:300',
            'profession_img' => 'image|nullable|max:1999'
        ]);

       
                // handeling image file upload
        if ($request->hasFile('profession_img')) {
            //get file name with extesion
            $fileNameWithExt = $request->file('profession_img')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension =  $request->file('profession_img')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore =   $fileName.'_'.time().'.'.$extension;
            //uploadImage
            
            $path = $request->file('profession_img')->storeAs('public/profession_imgs',$fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }

      
        $profession = new Profession;
        $profession->profession_name= $request->input('profession_name');  
        $profession->content = $request->input('content');
        $profession->profession_img = $fileNameToStore ;
            
        $profession->save();
        return redirect('/professions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profession = Profession::find($id);
        return view('professions.show')->with('profession',$profession);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profession = Profession::find($id);
        return view('professions.edit')->with('profession',$profession);
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
           
            'content' => 'required|max:300',
            'profession_name' => 'required|max:300',
            'profession_img' => 'image|nullable|max:1999'
        ]);

       
                // handeling image file upload
        if ($request->hasFile('profession_img')) {
            //get file name with extesion
            $fileNameWithExt = $request->file('profession_img')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension =  $request->file('profession_img')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore =   $fileName.'_'.time().'.'.$extension;
            //uploadImage
            
            $path = $request->file('profession_img')->storeAs('public/profession_imgs',$fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }

      
        $profession = Profession::find($id);
        $profession->profession_name= $request->input('profession_name');  
        $profession->content = $request->input('content');
       
        if($request->hasFile('profession_img')){
            if($profession->profession_img != 'noimage.jpg'){
             Storage::delete('public/profession_imgs/'.$profession->profession_img);
            }
            $profession->profession_img = $fileNameToStore ;
        }
            
        $profession->save();
        return redirect('/professions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profession = Profession::find($id);
        if($profession->profession_img != 'noimage.jpg')
        {
            Storage::delete('public/profession_imgs/'.$profession->profession_img);
        }
            $profession->delete();
            return redirect('/professions')->with('success','profession Deleted');
         
    }
}
