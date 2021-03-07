@extends('layouts.app')

@section('content')
@include('posts.create')
<hr>

<div class="row">

     <!-- /col-sml-3 -->
    <div class="col-sm-3" style="border: 2px solid black;  background-color:red" >
    </div>
     <!-- /col-sml-3 -->

    <!-- col-sml-5 -->
    <div class="col-sm-5" style="border: 2px solid black;  background-color:rgb(93, 89, 160) " >
      @if (count($posts) > 0)
      @foreach ($posts as $post)
      @if ($post->related_profession == auth()->user()->profession)
           <div class="cardbox shadow-lg bg-white">
                <div class="cardbox-heading">

                    <div class="media m-0">
                        <div class="d-flex mr-3">
                        <a href="/profile/{{$post->user->id}}">
                            <img class="img-fluid rounded-circle mt-2" src="/storage/profile_pics/{{$post->user->profile_pic}}" style="border:2px solid rgb(199, 198, 198) " width="60%" height="60%" alt=" ">
                            </a>
                        </div>
                        <div class="media-body">
                        <p class="m-0">{{$post->user->name}}</p>
                        <p class="m-0">{{$post->user->profession}}</p>
                        <small><span><a href="/profile/{{$post->user->id}}"><i  class="icon ion-md-pin"></i>{{$post->user->username}}</span></a></small>
                        <small><span><i class="icon ion-md-time"></i>{{$post->created_at}}</span></small>
                        </div>

                        @if(auth()->user()->id == $post->user->id) 
                            <div class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                    <a class="dropdown-item" href="/post/{{$post->post_id}}/edit" >
                                        Edit
                                    </a>

                                    <form method="POST" action="{{ route('post.destroy',$post->post_id) }}" onsubmit="return confirm('Are you sure you want to Delete Post?')">
                                        @csrf
                                            @method('DELETE')
                                            <a  ><button type="submit" class="btn dropdown-item"  >
                                                Delete Post</button></a>
                                    </form>
                                </div>
                            </div>
                         @endif

                    </div><!--/ media -->
                </div>
                <!--/ cardbox-heading -->


                @if ($post->post_img != 'noimage.jpg')
                    <div class="cardbox-item">
                    <a href="/post/{{$post->post_id}}" >
                        <img style="height:400px;width:100%;border-bottom:1px solid rgb(145, 134, 134);" class="img-fluid" src="/storage/post_imgs/{{$post->post_img}}" alt="Image"></a>
                    </div>   
                <br>
                @endif
               
                <a href="/post/{{$post->post_id}}" style="text-decoration:none;color:rgb(22, 4, 4)">
                    <div class="cardbox-base">
                        <div style="padding-left:5%;">
                            <!--<h3>{$post->title}}</h3>-->
                            <h4>{{$post->content}}</h4>
                        </div>			   
                    </div><!--/ cardbox-base -->
                </a>  	         
           </div>
           <!--/ cardbox -->



        @endif
        @endforeach
        
        @else   
            <h3>No post found</h3>

        @endif
    </div>
    <!-- /col-sml-5 -->


    <!-- col-sml-4 -->
    <div class="col-sm-4" style="border: 2px solid black;  background-color:rgb(0, 255, 55) " >.col-sm-2</div>
     <!-- /col-sml-4 -->
    

</div>
<!-- row -->

@endsection

















