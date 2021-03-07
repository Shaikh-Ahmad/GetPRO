
<div class=" card my-3 shadow">
    <div class=" card-header">
        <div class=" d-flex justify-content-between">
            <div >
                <a href="/profile/{{$reply->owner->id}}"> <img width="50px" height="50px" style=" border-radius:50%" src="/storage/profile_pics/{{$reply->owner->profiledetail->profile_pic}}" alt=""></a>
                <span>{{$reply->owner->name}}</span>
                @if (Auth::check())
                    @if (auth()->user()->role == 'service_provider')
                        @if (auth()->user()->profiledetail->profession ==  $reply->owner->profiledetail->profession)
                            <a href="{{route('discussions.show',$reply->discussion_id)}}" class=" btn btn-info btn-sm text-white">View</a>
                        @endif
                    @endif
                @endif
            </div>
        </div>
    </div>
    <div class=" card-body">
        <h5 class="title">Title : {{$reply->discussion->title}}</h5>
        <p>{!!$reply->discussion->content!!}</p>
        <h6>{!!$reply->content!!}</p>
    </div>
</div>