
<div class="container">
    <div class="main-body">    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card user-heading">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center ">
                      <div class="profile__avatar2"  style="border:4px solid rgb(255, 255, 255);" >
                        <img src="/storage/profile_pics/{{$user->profile_pic}}" alt="Admin" >
                      </div>  
                      @if ($user->user->isOnline())
                        <div style="height: 22px;width:90px; background:rgb(0, 190, 0) ; border-radius:10px" class="text-center text-light mt-2 ">
                          <p class="fas fa-dot-circle ">Online</p>
                        </div>  
                        @else
                        <div style="height: 22px;width:90px; background:rgb(255, 72, 0) ; border-radius:10px" class="text-center text-light text-center mt-2">
                          <p class="fas fa-dot-circle "> Offline</p>
                        </div>
                        @endif                   
                      <div class="mt-2 text-center">
                        <h4 style="margin-bottom:-4px">{{$user->user->username}} </h4>
                        <p class="text-muted">{{$user->profession}}
                          @if ($user->profile_varified == "yes")
                          <i class="fa fa-check-circle fa-lg " style="color:yellow" aria-hidden="true"></i>
                          <!--<img src="/storage/project_imgs/varify2.png" style="border-radius:50%;" height="40px" width="40px">-->
                          @endif
                        </p>
                        @auth
                          @if(auth()->user()->id != $user->user_id) 
                            <a class="btn btn-outline-light profile__contact-btn btn btn-lg btn-block btn-info" data-toggle="modal" data-target="#exampleModalLong" >Hire Now</a>
                            @include('hire.create')
                          @elseif(auth()->user()->id == $user->user_id)
                            <a  href="/profiledetail/{{$user->user_id}}/edit" class="btn btn-outline-light "><i class="fas fa-edit">  <b>Edit</b></i></a>
                        @endauth
                          @else
                            <a href="{{route('login')}}" class="btn btn-outline-light">Login to Hire</a>
                          @endif
                      </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                    <span class="text-secondary"><a target="_blank" href="HTTP://{{$user->website}}">{{$user->website}}</a></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                    <span class="text-secondary"><a target="_blank" href="{{$user->github}}">{{$user->github}}</a></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                    <span class="text-secondary"><a target="_blank" href="HTTP:// {{$user->twitter}}">{{$user->twitter}}</a></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                    <span class="text-secondary"><a target="_blank" href="{{$user->facebook}}">{{$user->facebook}}</a></span>
                  </li>
                </ul>
              </div>
              <div class="card mt-3">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><Strong>Speciality</Strong></h6>
                    <span class="text-secondary">{{$user->speciality}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><strong>Skills</strong></h6>
                    <span class="text-secondary">{{$user->skills}}</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><b>User Name</b></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$user->username}}
                      @if ($user->profile_varified == "yes")
                      <img src="/storage/project_imgs/varify.png" style="border-radius:50%;" height="30px" width="30px">
                      @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><b>Name</b></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$user->name}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><b>Email</b></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$user->user->email}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><b>Phone</b></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$user->phone_no}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><b>City</b></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$user->city}}
                    </div>
                  </div>
                </div>
              </div>

              <div class="card mb-3">
                <div class="card-body about-bg">
                  <div>
                    <div class="col-sm-3 ">
                      <h6 class="mb-0 title text-white"><b>About</b></h6>
                    </div>
                    <div class="col-sm-12 ml-3 text-center text-white">
                      {{$user->about}}
                    </div>
                  </div>
                </div>
              </div>

              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Education</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$user->education}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Studied at</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$user->studied_at}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$user->user->email}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Work Status</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$user->work_status}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Current Work</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$user->current_work}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Pervious Work</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$user->previous_work}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Work Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$user->work_adress}}
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        
    </div>

    @include('partials.profile_extended')
    

<style>
body{
  color: #1a202c;
  text-align: left;
  background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

.about-bg{
    /* background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-qAGU6Glc5Ch_62n1PFXJdhldWvbx4gH8-w&usqp=CAU') !important; */
    background-image: url('https://www.teahub.io/photos/full/127-1270024_seamless-polygon-backgrounds-vol-professional-background-for-poster.jpg') !important;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;

}



 .user-heading {
  
   /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
   
    background-image: url('https://www.teahub.io/photos/full/127-1270024_seamless-polygon-backgrounds-vol-professional-background-for-poster.jpg') !important;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    border-radius: 4px 4px 0 0;
    -webkit-border-radius: 4px 4px 0 0;
    padding: 30px;
    text-align: center;
}

.bg-color {
    /*background: #dfa001; */
    background: #ED213A;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #93291E, #ED213A);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #93291E, #ED213A); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    color: #fff;
}
    </style>