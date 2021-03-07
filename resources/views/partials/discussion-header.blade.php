<div class="card-header app_theme_color" style="height: 3.6rem;">
    <div class="d-flex justify-content-between">
        <div class="d-flex justify-content-between">
            <div>
                <a href="/profiledetail/{{$discussion->author->id}}"><img src="/storage/profile_pics/{{$discussion->author->profiledetail->profile_pic}}" alt="" style="border-radius: 50%;border:3px solid white" width="60px" height="60px"></a>
            </div>
            <div class="media-body">
                <p class="m-0 text-white">  
                    <a href="/profiledetail/{{$discussion->author->id}}"><b class="text-white">{{$discussion->author->name}}</b></a>    
                </p>
                <p class="m-0">
                    <small>
                        <p  class="text-white m-0"> <i class="fa fa-clock-o" aria-hidden="true"></i> 
                            {{$discussion->created_at->diffForHumans()}}</p>
                    </small>
                </p>
            </div>
        </div>

        <div>
            @if (Auth::check())
            @if(Auth::id() == $discussion->user_id) 
                <div class="btn" >
                    <form method="POST" action="{{ route('discussions.destroy',$discussion->id) }}" onsubmit="return confirm('Are you sure you want to delete discussion?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm text-white">Delete <i class="fa fa-trash" aria-hidden="true"></i> </button>
                    </form>
                </div>
                @endif 
            @endif
            @if (Auth::check())
                @if (Auth::user()->role == 'service_provider' )
                    @if (auth()->user()->profiledetail->profession ==  $discussion->author->profiledetail->profession)
                        <a href="{{route('discussions.show',$discussion->id)}}" class=" btn  btn-sm btn-outline-light">view<i class="fa fa-eye ml-2 fa-lg" aria-hidden="true"></i></a>
                    @endif
                @endif
            @endif
        </div>
    </div>

</div>
