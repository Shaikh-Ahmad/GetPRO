@extends('layouts.app')

@section('content')
<div class=" container my-5" >
    <div class="row" style="margin-bottom: 280px">
        <div class=" col-12 col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-info font-weight-bold text-white text-center">Notifications</div>
            
                <div class="card-body">
               <ul class="list-group">
                
                @foreach ($notifications as $notification)
                <li class=" list-group-item">
                    @if($notification->type=='LaravelForum\Notifications\HireNow')
                    You have a new hire request from <strong> {{$notification->data['hiredata']['user_name']}} </strong>
                    {{-- <a href="{{route('hire.show',$notification->data['hiredata']['hire_id'])}}" class=" btn float-right btn-info text-white">
                        View Request
                    </a> --}}
                    @endif
                    @if ($notification->type=='LaravelForum\Notifications\NewReplyAdded')
                    A new reply was added to your discussion
                    <strong>" {{$notification->data['discussion']['title']}}  "</strong>
                   
                        {{-- <a href="{{route('discussions.show',$notification->data['discussion']['id'])}}" class=" btn float-right btn-info text-white">
                            View discussion
                        </a> --}}
                    @endif
                 @if ($notification->type=='LaravelForum\Notifications\Markedasbestreply')
               Your reply to the discussion
                    <strong>" {{$notification->data['discussion']['title']}} "</strong> was mark as best reply
                        {{-- <a href="{{route('discussions.show',$notification->data['discussion']['id'])}}" class=" btn float-right btn-info text-white">
                            View discussion
                        </a> --}}
                     
                 @endif
                </li>
                @endforeach
               
               </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
