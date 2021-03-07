@extends('layouts.app')
@section('content')

<div class="container">
    
    @include('partials.search')
    <div class="row">
        @if (count($userdetails) > 0)
            @foreach($userdetails->chunk(4) as $chunk)
                @foreach($chunk as $userdetail)                
                        @include('partials.profilecardflip')
                @endforeach
            @endforeach
        @else
            <h5 class="text-secondary">No User Avalible</h5>
        @endif  
       
    </div>
</div>

@endsection

