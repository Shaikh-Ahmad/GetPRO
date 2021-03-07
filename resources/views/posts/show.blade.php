@extends('layouts.app')

@section('content')
<div>
    <div class="col-lg-6 offset-lg-3 mt-3">
           @include('partials.postcard')
           <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5fe1cc576f4cfaee"></script>
    </div>
    <div class="container col-md-8 bg-light">
        @comments(['model' => $post])
    </div>
   
</div>    
@endsection