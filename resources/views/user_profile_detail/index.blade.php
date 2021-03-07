@extends('layouts.app')
@section('content')

<div class="container" style="margin-bottom: 250px">
    
    @include('partials.search')
    <div class="title d-flex justify-content-center bg-white" ><h4 class="mt-2"> {{$profession}}s  </h4></div>
    <div class="row">
        @if (count($userdetails) > 0)
            @foreach($userdetails as $userdetail)            
                @include('partials.profilecardflip')
            @endforeach
        @else
            <h5 class="text-secondary mt-4 ml-4">No User Avalible</h5>
        @endif  
       
    </div>
</div>

<br><br><br>

@endsection

