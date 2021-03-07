
@extends('layouts.app')
@section('content')
    <!-- page-header-->
      
    <div class="wrapper">
        <video autoplay loop muted class="wrapper__video">
           <source src="https://media.gettyimages.com/videos/business-comp-bs-cm-video-id176607261">
            {{-- https://dm0qx8t0i9gc9.cloudfront.net/watermarks/video/Vv03xyNwg/videoblocks-the-deterioration-of-the-environment-the-silhouette-of-men-in-the-office-and-infographics_szmohkdy_w__5c6a56b1af8cb5db8ae09af6968ce573__P360.mp4 --}}
        </video>
       <!-- <img src="https://mdbootstrap.com/img/Photos/Others/images/89.jpg" > -->
     </div>
        
   <!--page-header-->
    <!-- news -->
    <div class="card-section  ">
        <div class="container">
            <div class="card bg-white shadow-lg p-4  " style="background-color:rgb(224, 216, 216);  border-style: solid; border-color:grey; border-width: 0.5px; border-radius:5px;">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <!-- section-title -->
                        <div class="section-title mb-0">
                            <h1 style="font-family: Lucida Sans Unicode; color:rgb(115, 148, 209);">GETPRO</h1>
                            <p style="margin-left: 100px">We allow you to hire best professionals Onine. And a platform for professionals where they can get them self recognized</p>
                        </div>
                        <!-- /.section-title -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-14">
                <div class=" well-sm">
                    <div class="row">                     
                            <div class="card-deck ">
                                <div class="card cardshadow" >
                                <img class="card-img-top" src="https://img.icons8.com/clouds/500/000000/medical-doctor.png"  alt="Card image cap">
                                <hr>
                                <div class="card-body">
                                    <a href="/profession?key=doctor"><h5 class="card-title">Doctor</h5></a>
                                    <p class="card-text">looking for a medical expert? you are just in place here top expertise are available to help u through your misery.   </p>
                                </div>
                                <div class="card-footer">
                                
                                </div>
                                </div>
                                    
                                <div class="card cardshadow">
                                <img class="card-img-top" src="https://img.icons8.com/clouds/500/000000/code.png" alt="Card image cap">
                                <hr>
                                <div class="card-body">
                                    <a href="/profession?key=Software-Engineer"><h5 class="card-title">Software Engineer</h5></a>
                                    <p class="card-text">In need of a software, our developer have the skills of just what u need. </p>
                                </div>
                                <div class="card-footer">
                                    
                                </div>
                                </div>
                                <div class="card cardshadow">
                                    <img class="card-img-top" src="https://img.icons8.com/clouds/500/000000/law.png" alt="Card image cap">
                                    <hr>
                                    <div class="card-body">
                                        <a href="/profession?key=lawyer"> <h5 class="card-title">Lawyer</h5></a>
                                        <p class="card-text">want a lawyer to help u through your legal proceedings, our lawyers are available to back u up.    </p>
                                    </div>
                                    <div class="card-footer">
                                    
                                    </div>
                                    </div>
                                    <div class="card cardshadow">
                                        <img class="card-img-top" src="https://img.icons8.com/clouds/500/000000/accounting.png"  alt="Card image cap">
                                        <hr>
                                        <div class="card-body">
                                            <a href="/profession?key=financeManager"><h5 class="card-title">Finance Manager</h5></a>
                                        <p class="card-text">In need of some one who manages you finance our financial advisers take care financial health of yours organization</p>
                                    </div>
                                    <div class="card-footer">
                                    
                                    </div>
                                    </div>
                        </div>
    </div>
        </div>
            </div>
                </div>
                    </div>

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