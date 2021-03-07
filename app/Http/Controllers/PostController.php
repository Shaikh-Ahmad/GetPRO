<?php

namespace LaravelForum\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use LaravelForum\post;
use Laravelista\Comments\Comment;
use Illuminate\Support\Facades\Storage;
use DB;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       if (Auth::check()) {

        $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
        $post = post::orderBy('id','desc')->paginate(10);
        return view ('posts.index')->with('posts', $post)->with('imageExtensions',$imageExtensions); 
    }
         return redirect(route('login'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('posts.create');
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
            'title' => 'required',
            'content' => 'required|max:300',
            'post_img' => 'nullable'
        ]);

       
                // handeling image file upload
        if ($request->hasFile('post_img')) {
            //get file name with extesion
            $fileNameWithExt = $request->file('post_img')->getClientOriginalName();
            //get just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension =  $request->file('post_img')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore =   $fileName.'_'.time().'.'.$extension;
            //uploadImage
            
            $path = $request->file('post_img')->storeAs('public/post_imgs',$fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }

      
        $post = new post;
        $post->user_id = $request->user()->id;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->related_profession= $request->user()->profiledetail->profession;     
        $post->post_img = $fileNameToStore ;
            
        $post->save();
        session()->flash('success','Post Posted');
        return redirect('/post');
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
        $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
        $post = Post::find($id);
        return view('posts.show')->with('post',$post)->with('imageExtensions',$imageExtensions);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::find($id);

        if(auth()->user()->id == $post->user->id || auth()->user()->role == "admin"  ) {
            return view('posts.edit')->with('post',$post);
        }    
            return redirect('/')->with('error','Unauthorized page');
            
       
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
            'title' => 'required',
            'content' => 'required|max:300',
            'post_img' => 'image|nullable|max:1999'
        ]);
                  // handeling image file upload
                  if ($request->hasFile('post_img')) {
                    //get file name with extesion
                    $fileNameWithExt = $request->file('post_img')->getClientOriginalName();
                    //get just file name
                    $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                    //get just extension
                    $extension =  $request->file('post_img')->getClientOriginalExtension();
                    //filename to store
                    $fileNameToStore =   $fileName.'_'.time().'.'.$extension;
                    //uploadImage
                    $path = $request->file('post_img')->storeAs('public/post_imgs',$fileNameToStore);
                }
                else
                {
                    $fileNameToStore = 'noimage.jpg';
                }

                
        $post = post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        if($request->hasFile('post_img')){
            if($post->post_img != 'noimage.jpg'){
             Storage::delete('public/post_imgs/'.$post->post_img);
            }
            $post->post_img = $fileNameToStore ;
        }
        $post->save();
        if(auth()->user()->role == "admin"){
            return redirect('/configposts')->with('success','Post Edited');
        }
        return redirect('/post')->with('success','Post Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {     

        $post = post::find($id);
        if($post->post_img != 'noimage.jpg')
        {
            Storage::delete('public/post_imgs/'.$post->post_img);
        }
            $post->delete();

            if(auth()->user()->role == "admin"){
                return redirect('/configposts')->with('success','Post Deleted');
            }
            return redirect('/post')->with('success','Post Deleted');
        } 
}
