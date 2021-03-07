<!--cardbox -->
<div class="cardbox shadow-lg bg-white">
    <!--cardbox-heading -->
    <div class="cardbox-heading">
        <div class="media m-0">
            <div class="d-flex mr-3">
                <a href="/profiledetail/{{$post->user->id}}">
                    <img class="img-fluid rounded-circle mt-2" src="/storage/profile_pics/{{$post->user->profiledetail->profile_pic}}" style="border:2px solid rgb(199, 198, 198) " width="60%" height="60%" alt=" ">
                    
                </a>
            </div>

            <div class="media-body">
                <p class="m-0">{{$post->user->name}}</p>
                <p class="m-0">{{$post->user->profiledetail->profession}}</p>
                <small><span><a href="/profiledetail/{{$post->user->id}}"><i  class="icon ion-md-pin"></i>{{$post->user->username}}</span></a></small>
                <small><span><i class="fa fa-clock-o" aria-hidden="true"></i> {{$post->created_at->diffForHumans()}}</span></small>
            </div>
            @if (Auth::check())
            @if(Auth::id() == $post->user_id) 
                <div class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/post/{{$post->id}}/edit" >
                            <i class="fa fa-pencil" aria-hidden="true"></i>  Edit
                        </a>
                        <form method="POST" action="{{ route('post.destroy',$post->id) }}" onsubmit="return confirm('Are you sure you want to Delete Post?')">
                            @csrf
                                @method('DELETE')
                                <a>
                                    <button type="submit" class="btn dropdown-item"><i class="fa fa-trash" aria-hidden="true">  Delete Post </i></button>
                                </a>
                        </form>
                    </div>
                </div>
            @endif
            @endif
        </div>
    </div>
    <!--/ cardbox-heading -->

    <!--cardbox-body-->
    @if ($post->post_img != 'noimage.jpg')
        <div class="cardbox-item">
            <a href="/post/{{$post->id}}" >
                
                @if ( in_array(File::extension($post->post_img), $imageExtensions))
                    <img style="height:400px;width:100%;" class="img-fluid" src="/storage/post_imgs/{{$post->post_img}}" alt="Image">
                @elseif(File::extension($post->post_img) == 'mp4' ||  File::extension($post->post_img) == 'MP4' )
                <video width="100%" height="100%" controls>
                    <source src="{{URL::asset("/storage/post_imgs/$post->post_img")}}" type="video/mp4">
               </video>
                @else
                <a class="btn btn-info  ml-4" href="/storage/post_imgs/{{$post->post_img}}" target="_blank" style="border-radius: 15px">{{$post->post_img}}</a>
                @endif       
                      
            </a>
        </div>   
        <br>
    @endif
   
    <a href="/post/{{$post->id}}" style="text-decoration:none;color:rgb(22, 4, 4)">
        <div class="cardbox-base">
            <div style="padding-left:5%;">
                <!--<h3>{$post->title}}</h3>-->
                <h6>{{$post->content}}</h6>
            </div>
            <div >
                <ul class="float-right">
                    <li class="mr-4">
                    <a><i class="fa fa-comments fa-lg"><span class="m-0">{{ Laravelista\Comments\Comment::where('commentable_id', $post->id)->count()}}</span></i>
                    </a>    
                    </li>
                    <li class="ml-4"><a><i class="fa fa-share-alt"></i></a></li>
                </ul>
                <ul>
                    <li><a><i class="fa fa-thumbs-up"></i></a></li>
                </ul>
            </div>			   
        </div>
        <!--/ cardbox-base -->
    </a>  	        

</div>
<!--/ cardbox -->