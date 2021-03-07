@extends('layouts.app')

@section('content')
<div class="container">
     <h3 class="title">Edit Post</h3>

     <form method="POST" action="{{ route('post.update',$post->id)  }}" enctype="multipart/form-data">
        @method('PUT')
        <div class="form-group">
            @csrf            
            <input type="text" name="title" value="{{$post->title}}" class="form-control" hidden readonly />
        </div>
        <div class="form-group">
            <label for="content"><h5>content:</h5></label>
            <textarea class="form-control"  name="content"  cols="20" rows="7"> {{$post->content}} </textarea>
        </div>
        <div class="form-group">
            <input type="file" name="post_img" id="post_img">
        </div>
        <button type="submit" class="btn btn-primary">post</button>
 </form> 
</div> 

@endsection