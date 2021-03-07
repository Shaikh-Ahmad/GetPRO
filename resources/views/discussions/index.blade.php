@extends('layouts.app')
@section('content') 
  <div class=" container" style="margin-bottom: 90px">
    <div class=" row">
          @include('layouts.discussion_layout')
          <div class=" col-md-8">
            @foreach ($discussions as $discussion) 
            @if ( auth()->user()->role == "admin" || $discussion->related_profession == auth()->user()->profiledetail->profession )
            <div class="card cardshadow shadow mt-2 " >
                @include('partials.discussion-header')
                <div class="card-body">
                  <div class="text-center">
                    <strong>
                        {{$discussion->title}}
                    </strong>
                  </div>
                </div>
            </div>
            @endif
            @endforeach
            <hr>
            
            {{$discussions->appends(['channel'=>request()->query('channel')])->links()}}
            
        </div>
    </div>
  </div>
@endsection
