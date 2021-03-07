@extends('layouts.app')

@section('content')

<div class="container card">
    <div class="card-header">Add channel</div>

    <div class="card-body">
        <form action="{{route('channel.store')}}" method="POST">
        @csrf
        <div class=" form-group">
            <label for="name">Channel Name</label>
            <input type="text" class=" form-control"  name="name" id="name">
        </div>
        @if (auth()->user()->role == 'admin')
        <div class=" form-group">
            <select class="form-control" name="channelprofession" required>
                <option class="hidden" value="" selected disabled>Select a Profession</option>
                @foreach($professions as $profession)
                <option value="{{$profession->profession_name}}">{{$profession->profession_name}}</option>
                @endforeach
            </select>
        </div>
        @endif
        <div class=" form-group text-center">
            <button type="submit" class=" btn btn-info text-white">Submit</button>
        </div>
        </form>
   
    </div>
</div>
@endsection