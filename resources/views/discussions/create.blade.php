@extends('layouts.app')
@section('content')
    
<div class=" container">
    <div class=" row">
        @include('layouts.discussion_layout')
        <div class=" col-md-8">
            <div class="card">
                <div class="card-header">Add Discussions</div>
                <div class="card-body">
                    <form action="{{route('discussions.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class=" form-control" value="" name="title" id="title">
                        </div>
                        <div class=" form-group">
                            <label for="content">Content</label>
                            <input id="content" type="text" name="content" hidden >
                            <trix-editor input="content"></trix-editor>
                        </div>
                        
                        @include('partials.autosearchajex')
                       
                        {{-- <div class="form-group">
                        <form action="discussions.create" method="get">
                            <label for="channel" name="channel" >Choose your channel from the list:</label>
                            <input list="channels" name="channel" id="channel">
                            <datalist id="channels">
                                @foreach ($channels as $c) 
                                @if ($c->channelprofession == auth()->user()->profession)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                                @endif
                                @endforeach
                            </datalist>
                        </div> --}}
                      
                        <br>
                        <div class=" form-group text-center">
                            <button type="submit" class=" btn btn-info text-white">Submit</button>
                        </div>
                    </form>

                    <small style="padding-left: 49% ; padding-down:15%">
                        OR
                    </small>
                    <div style="padding-top:1%" class=" form-group text-center">
                        <a class="btn btn-info text-white" href="/channel/create">Creat your own channel</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .box{
    width:600px;
    margin:0 auto;
   }

</style>


