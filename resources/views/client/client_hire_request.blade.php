@extends('layouts.app')
@section('content')


<br>
<div class="container" style="margin-bottom:420px">

    @if (count($sentreqs) > 0 )    
    @foreach ($sentreqs as $hire)
        @include('partials.hirecard')
    @endforeach  
    @else   
        <p class="text-muted">No sent request </p>
    @endif


</div>




<style>
.tab-pane {

border-left: 1px solid rgb(184, 18, 18);
border-right: 1px solid rgb(175, 5, 5);
border-bottom: 1px solid rgb(196, 27, 27);
border-radius: 0px 0px 5px 5px;
padding: 10px;
}

.nav-tabs>.active>a, .nav-tabs>.active>a:hover, .nav-tabs>.active>a:focus {
    border-color: #d45500;
    border-bottom-color: transparent;
}
.nav-tabs {
   border-bottom: 1px solid #d45500;
}

</style>


    
@endsection






















