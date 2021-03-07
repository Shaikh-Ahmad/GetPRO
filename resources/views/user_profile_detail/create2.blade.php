<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" ></script>
      @yield('scripts')  
      <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
      <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

      <link href="css/sb-admin-2.min.css" rel="stylesheet">

  
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rokkitt" rel="stylesheet"> 
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="">
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile_index.css') }}" rel="stylesheet">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel = "icon" href =  
    "/storage/project_imgs/work.png" 
            type = "image/x-icon">
    @yield('css')
</head>

<body style="background-color: #f7f7f7">

<div class="container register mt-4">
    <div class="row">
        <div class="col-md-3 register-left">
            <a href="/"><img src="/storage/project_imgs/work.png" alt=""/></a>
            <h3>Create Profile</h3>
            <p>You are just few steps away to be register as professional!</p>
        </div>

        <div class="col-md-9 register-right">
            <form method="POST" action="{{ route('profiledetail.store')  }}" enctype="multipart/form-data">
                @csrf
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Personal Detail</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <select class="form-control" name="profession" required>
                                            <option class="hidden" value="" selected disabled>Select your Profession</option>
                                            @foreach($professions as $profession)
                                            <option value="{{$profession->profession_name}}">{{$profession->profession_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="city *" name="city"  required />
                                </div>
                                <div class="form-group">
                                    <textarea name="about" id="about" cols="30" rows="3" placeholder="About Yourself *" style="text-transform: capitalize;" required></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline"> 
                                            <input type="radio" id="male" name="gender" value="Male"  required>
                                            <span> Male </span> 
                                        </label>
                                        <label class="radio inline"> 
                                            <input type="radio" id="female" name="gender" value="Female" required>
                                            <span>Female </span> 
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Phone no *" name="phone_no"  required />
                                </div>
                                <div class="form-group">
                                    <input type="date" placeholder="Birthday *" class="form-control"  name="birthday" required/>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="profile_pic">Profile picture <i class="fa fa-camera ml-2 fa-lg" aria-hidden="true"></i></label>
                                    <input  type="file"  name="profile_pic" id="cover_image">
                                </div>
                            </div>
                        </div>
                    </div>







                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading">Profession / Occupation  detail</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control"  placeholder="Education *" name="education" required/>
                                </div>
                                <div class="form-group">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Current Work *" name="current_work" required />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Work Adress*" name="work_adress"  required/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Studied At *" name="studied_at" required />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Previous Work *" name="previous_work" required />
                                </div>
                                <div class="form-group mt-4">
                                    <div class="maxl">
                                        <label class="radio inline"> 
                                            <input type="radio" id="employed" name="work_status" value="employed" checked="checked" required>
                                            <span> Employeed </span> 
                                        </label>
                                        <label class="radio inline"> 
                                            <input type="radio" id="un_employed" name="work_status" value="unemployed" required>
                                            <span> Un-Employeed </span> 
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btnRegister mt-4">
                                    {{ __('create') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <ul class="nav nav-tabs nav-justified float-right" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">step 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">step 2</a>
            </li>
        </ul>
        
    </div>
</div>
    
</body>

<style>
    .register{
    height: 110%;
    background-image: url('https://www.teahub.io/photos/full/127-1270024_seamless-polygon-backgrounds-vol-professional-background-for-poster.jpg') !important;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 1s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-60px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 100%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}
</style>
