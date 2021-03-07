@extends('layouts.app')
@section('content') 
  <div class=" container">
    <div class=" row">
          @include('layouts.discussion_layout')
          <div class=" col-md-8">

<div class="card">
    <div class="card-header app_theme_color" style="height: 3.6rem;">
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
    </div>
    <div class="card-body">
        <div class="text-center">
            <strong>{{$discussion->title}}</strong>
        </div>
        <hr>
        {!!$discussion->content!!}
        @if ($discussion->bestReply)
        <div class=" card bg-success text-white my-5">
           <div class="card-header">
               <div class=" d-flex justify-content-between">
                    <div>
                        <img width=" 40px" height="40px" style=" border-radius:50%" src="{{Gravatar::src($discussion->bestReply->owner->email)}}" alt="">
                        <strong><a style="color: honeydew" href="/profiledetail/{{$discussion->author->id}}">{{$discussion->bestReply->owner->name}}</a></strong>
                    </div>
                    <div>
                        Best Reply
                    </div>  
                </div>
            </div>
           <div class=" card-body">
            {!!$discussion->bestReply->content!!}
           </div>
        </div> 
        @endif
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        Add a reply
    </div>
    @auth
        <div class="card-body">
            <form action="{{route('replies.store',$discussion->id)}}" method="POST">
                @csrf
                <div class=" form-group">
                    <label for="message">Message</label>
                    <input id="message" type="hidden" name="message" >
                    <trix-editor input="message"></trix-editor>
                </div>
                <div class=" form-group text-center">
                    <input type="submit" class=" btn btn-success" value="Add a reply">
                </div>
            </form>
        </div>
        @else

        <div class=" card-body">
            <a class=" btn btn-info" href={{route('login')}} style="color:white;width:50%"> Sign in to reply</a>
        </div>

    @endauth
</div>

<h4 class=" my-3">Replies </h4>
@foreach ($discussion->replies()->orderBy('created_at','desc')->paginate(3) as $reply)
<div class=" card my-3">
    <div class=" card-header">
        <div class=" d-flex justify-content-between">
            <div >
                <a href="/profiledetail/{{$reply->owner->id}}"> <img width="50px" height="50px" style=" border-radius:50%" src="/storage/profile_pics/{{$reply->owner->profiledetail->profile_pic}}" alt=""></a>
            </div>
            <div class="media-body">
                <p class="m-0">  
                    {{$reply->owner->username}}
                </p>
                <p class="m-0">
                    <small><p><i class="fa fa-clock-o" aria-hidden="true"></i> 
                        {{$reply->created_at->diffForHumans()}}</p></small>
                </p>
            </div>
           
            <div>
              @auth
              @if(auth()->user()->id===$discussion->user_id)
              <form action="{{route('discussions.bestreply',['discussion'=>$discussion->id,'reply'=>$reply->id])}}" method="POST">
                  @csrf
                  <button type="submit" class=" btn text-dark btn-sm " style="background-color: yellow">Mark as best reply</button>
              </form>
              @endif

              @if(auth()->user()->id == $reply->user_id) 
                <div class="btn" >
                      <form method="POST" role="form" action="{{ route('replies.destroy',['discussion'=>$discussion->id,'reply'=>$reply->id]) }}">
                          @csrf
                             <!-- | DELETE    | discussions/{discussion}/replies/{reply}   -->
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-outline-danger ">Delete</button>
                      </form>
                </div>
                      
                @endif

              @endauth
            </div>
        </div>
    </div>
    <div class=" card-body">
      
        {!!$reply->content!!}
    </div>
</div>
@endforeach

{{$discussion->replies()->paginate(3)->links()}}


          </div>
    </div>
  </div>

@endsection
