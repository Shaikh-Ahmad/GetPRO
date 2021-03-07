
@extends('layouts.app')
@section('content')
    <!-- page-header-->
      
    <div class="wrapper mb-4" style="margin-top: -13px">
        <video autoplay loop muted class="wrapper__video">
           <source src="/storage/project_imgs/fypvedio.mp4">
            {{-- https://media.istockphoto.com/videos/resume-applicant-choosing-a-candidate-for-a-vacant-job-video-id1164876389 --}}
            {{--https://media.istockphoto.com/videos/people-working-process-video-id964105780--}}
        </video>
       <!-- <img src="https://mdbootstrap.com/img/Photos/Others/images/89.jpg" > -->
     </div>
        
   <!--page-header-->
    <!-- news -->
    <div class=" card-section " >
        <div class="container">
            <div class="card bg-white shadow-lg p-4  " style="background-color:rgb(224, 216, 216);border-radius:15px;">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <!-- section-title -->
                        <div class="section-title mb-0">
                            <h1 style="font-family: Lucida Sans Unicode; color:rgb(115, 148, 209);"><img class="sizelg  mr-4" src="/storage/project_imgs/work.png" width="35px" height="35px"  alt="">GETPRO</h1>
                            <p style="margin-left: 100px ; font-size :16px ">We allow you to Hire best professionals Onine. And a platform for Professionals where they can get themself recognized</p>
                        </div>
                        <!-- /.section-title -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top: -60px">
        <div class="row justify-content-center">
            @if (count($professions) > 0)
                @foreach($professions->chunk(4) as $chunk)
                    @foreach($chunk as $profession)               
                     @include('partials.professions')
                    @endforeach
                @endforeach
            @else
                <h5 class="text-secondary">No Profession Avalible</h5>
            @endif  
        </div>
    </div>
    
    @guest
    <div class="container">
        <div class="row justify-content-center">
            @if (Route::has('register'))
                <a class="btn btn-lg app_theme_color m-4" style="color: whitesmoke" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
            @if (Route::has('login'))
                <a class="btn btn-lg app_theme_color m-4" style="color: whitesmoke" href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif
        </div>
    </div>     
    @endguest

    <br><br><br>

@endsection



<style>

.card-section { position: relative; bottom: 100px; }
.card-block { padding: 80px;  }
.section-title { margin-bottom: 60px; }


*{
  margin: 0;
}

.wrapper{
  width: 100%;
  height: 60vh;
  overflow: hidden;
}

.wrapper .wrapper__video{
  object-fit: cover;
  width: 100%;
  height: 100%;
}

.cardshadow:hover {
      box-shadow: 4px 8px 0px 4px #97d9e9;
      border: 1px solid #22d3ff ;
      border-radius: 15px;
  }
</style>
<script>
    function initialize() {
  var input = document.getElementById('searchTextField');
  new google.maps.places.Autocomplete(input);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>