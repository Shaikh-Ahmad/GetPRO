@extends('layouts.app')
@section('content')

@if (count($hires) > 0) 
    <div class="container " style="color: honeydew">
        <div class=" card  bg-success mb-2  p-2 mx-5 mt-2">
             <h4>Total Offers: {{auth()->user()->totalhirerequest->where('request_status', '=','Awaiting')->count()}}</h4>
        </div>
    </div>
@endif

<br>
<div class="container" style="margin-bottom: 280px">

    <div class="m-3">
        <ul class="nav nav-tabs" id="myTab">
            <li class="nav-item">
                <a href="#sectionA" class="nav-link active" data-toggle="tab">Recieved Request</a>
            </li>
            <li class="nav-item">
                <a href="#sectionB" class="nav-link" data-toggle="tab">Accepted Request</a>
            </li>
            <li class="nav-item">
                <a href="#sectionC" class="nav-link" data-toggle="tab">Request Sent by you</a>
            </li>
        </ul>
        <br>
        <div class="tab-content">

            <div id="sectionA" class="tab-pane fade show active">
                @if ($totalrequest->count() > 0 )    
                @foreach ($hires as  $hire)
                    @if ($hire->request_status == 'Awaiting')
                        @include('partials.hirecard')
                    @endif
                @endforeach  
                @else   
                <p class="text-muted">No offer avalible<p>
                @endif
            </div>

            <div id="sectionB" class="tab-pane fade">
                @if (count($hires) > 0 )    
                @foreach ($hires as $hire)
                    @if ($hire->request_status == 'Accepted')
                        @include('partials.hirecard')
                        
                    @endif
                @endforeach  
                    
                @else   
                    <p class="text-muted">No offer accepted by you <p>
                @endif
            </div>
            <div id="sectionC" class="tab-pane fade">
                @if (count($sentreqs) > 0 )    
                @foreach ($sentreqs as $hire)
                    @include('partials.hirecard')
                @endforeach  
                @else   
                    <p class="text-muted">No sent request </p>
                @endif
            </div>
        </div>
    </div>    

</div>



<script>
    $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
});
</script>



    
@endsection






















