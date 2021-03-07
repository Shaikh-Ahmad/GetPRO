@extends('layouts.adminlayout')
@section('content')
<div class="container">
    @include('professions.create')
</div>

<div >
    <div class="row justify-content-center">
        @if (count($professions) > 0)
            @foreach($professions->chunk(4) as $chunk)
                @foreach($chunk as $profession)                
                        @include('partials.professions')
                @endforeach
            @endforeach
        @else
            <h5 class="text-secondary">No User Avalible</h5>
        @endif  
    </div>
</div>
                    



@endsection