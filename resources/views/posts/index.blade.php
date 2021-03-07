@extends('layouts.app')
@section('content')

    @include('posts.create')
    <hr>

    <div class="row">
        {{-- <!-- news -->
        <div class="col-lg-3"  > 
            <div class="card  mx-1 ">
                <div class="card-header app_theme_color text-white" >
                    <div class="title">News</div>
                </div>
                <div class="body">
                    <div class="container">
                        <p>Some news content here...</p>
                    </div>
                </div>
            </div>    
        </div>
     --}}
        <!-- posts -->
        <div class="col-md-5 offset-md-3"  >
        @if (count($posts) > 0)
                @foreach ($posts as $post)
                    @if ($post->related_profession == auth()->user()->profiledetail->profession)
                        @include('partials.postcard')
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5fe1cc576f4cfaee"></script>
                    @endif
                @endforeach
            @else   
                <h3>No post found</h3>     
            @endif
        </div>
        
        <!--Ads-->
        <div class="col-sm-3"  > 
            <div class="card  ">
                <div class="card-header app_theme_color">
                    <div class="title">News / Ads</div>
                </div>
                <div class="body">
                    <div class="container">
                        <p>Some Ads will appear here...</p>
                    </div>
                </div>
            </div>    
        </div>

    </div>
    <br><br><br><br><br>

@endsection

