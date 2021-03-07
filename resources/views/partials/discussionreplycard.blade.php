
<div class=" card my-3">
    <div class=" card-header">
        <div class=" d-flex justify-content-between">
            <div >
                <a href="/profile/{{$reply->owner->id}}"> <img width="50px" height="50px" style=" border-radius:50%" src="/storage/profile_pics/{{$reply->owner->profiledetail->profile_pic}}" alt=""></a>
                <span>{{$reply->owner->name}}</span>
                <a href="/discussions/{{$reply->discussion_id}}" class=" btn btn-info btn-sm text-white">View</a>
            </div>
        </div>
    </div>
    <div class=" card-body">
        <a href="{{route('discussions.show',$discussion->id)}}" ><p>Discussion title : {{$discussion->title}}</p></a>
        <p>Reply:{!!$reply->content!!}
    </div>
</div>