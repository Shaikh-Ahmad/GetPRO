@extends('layouts.adminlayout')
@section('content')

<h1 class="title"><i class="fa fa-newspaper-o text-gray-300"></i> Posts</h1>
</div>
<br>
<div class=" ml-4"  style="margin-left: 150px">
  <form action="configposts" method="GET" role="search">
  {{ csrf_field() }}
  <div class="input-group" >
      <input type="text" class="form-control" name="q" placeholder="Search Profile" style="border-radius: 15px"> 
          <span class="input-group-btn" style="width:75%; border-radius: 25px;">
              <button type="submit" class="btn btn-outline-info my-2 ml-2 my-sm-0"  style="border-radius: 15px" >
                  <span class="glyphicon glyphicon-search">search</span>
              </button>
          </span>
  </div>
  </form>
</div>
<br>
<div class="container">        
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>Posted By</th>
          <th>Title</th>
          <th>Content</th>
          <th><i class="fa fa-picture-o" aria-hidden="true"></th>
          <th>Edit/Delete</th>
        </tr>
      </thead>
      <tbody>
        @if ($posts->count() > 0)
            @foreach ($posts as $post)
                <tr>
                <td><a href="/post/{{$post->id}}">{{$post->id}}</a></td>
                   <td><a href="/profiledetail/{{$post->user->id}}">{{$post->user->username}}</a></td>
                   <td>{{$post->title}}</td>
                   <td>{{$post->content}}</td>
                   <td>
                     
                     @if ( in_array(File::extension($post->post_img), $imageExtensions))
                        <img src="/storage/post_imgs/{{$post->post_img}}" alt="" style="border-radius: 10%;border:1px solid white" width="30px" height="30px">
                      @elseif(File::extension($post->post_img) == 'MP4')
                        <video width="30px" height="30px" controls>
                          <source src="{{URL::asset("/storage/post_imgs/$post->post_img")}}" type="video/mp4">
                        </video>
                       @else
                          <a href="/storage/post_imgs/{{$post->post_img}}" target="_blank" style="width: 15px">{{$post->post_img}}</a>
                        @endif 
                    </td>
                     
                   <td>
                   <div class="row">
                    
                        <a  href="/post/{{$post->id}}/edit"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                        
                        <hr style="border: 1px solid rgb(196, 194, 194) ;height:30px ; margin:5px">
                        
                      <form action="{{ route('post.destroy',$post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete Post? Once deleted can not be Redone!');">
                        @csrf
                        @method('DELETE')
                        <button   type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger "></i>
                        </button>
                      </form>
                    </div>
                  </td>

                </tr>
            @endforeach
        @else
                <h5 class="text-muted">No post Found </h5>
        @endif 
      </tbody>
    </table>
  </div>
  
@endsection