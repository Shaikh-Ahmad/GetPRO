
<div class="container">          
<div class="container" style="background-color: white; border-radius: 15px;  box-shadow: 5px 5px 12px rgb(159, 159, 240);">
  <div class="row">
        <div class="col-xs-12 col-sm-9">
          <br>
          <!-- User profile -->
          <div class="panel panel-default">
            <div class="panel-heading">
            <h4 class="panel-title">User profile</h4>
            </div>
            <div class="panel-body">
              <div class="profile__avatar">
                <img src="/storage/profile_pics/{{$user->profile_pic}}" alt="...">
              </div>
              
              <div class="profile__header">
              <h4>{{$user->name}}</h4>
              <br>
                <h5>About</h5>
                <p class="text-muted">
                  {{$user->about}}
                </p>
              </div>
            </div>
          </div>
  
          <!-- User info -->
          <div class="panel panel-default">
            <div class="panel-heading">
            <h4 class="panel-title">User info</h4>
            </div>
            <div class="panel-body">
              <table class="table profile__table">
                <tbody>
                  <tr>
                    <th><strong>Profession</strong></th>
                    <td>{{$user->profession}}</td>
                  </tr>
                  <tr>
                    <th><strong>Studied At</strong></th>
                    <td>{{$user->studied_at}}</td>
                  </tr>
                  <tr>
                    <th><strong>Work Status</strong></th>
                    <td>{{$user->work_status}}</td>
                  </tr>
                  <tr>
                    <th><strong>City</strong></th>
                    <td>{{$user->city}}</td>
                  </tr>
                  <tr>
                    <th><strong>Gender</strong></th>
                    <td>{{$user->gender}}</td>
                  </tr>
                  <tr>
                      <th><strong>Birth day</strong></th>
                      <td>{{$user->birthday}}</td>
                  </tr>
                  <tr>
                  <tr>
                      <th><strong>Education</strong></th>
                      <td>{{$user->education}}</td>
                    </tr>
                  <tr>
                    <th><strong>Current work</strong></th>
                    <td>{{$user->current_work}}</td>
                  </tr>
                  <tr>
                      <th><strong>previous work</strong></th>
                      <td>{{$user->previous_work}}</td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
  
          
  
        </div>
        <div class="col-xs-12 col-sm-3"> 
          <!-- hire user or edit profile-->
          <br>
          @auth
          @if(auth()->user()->id !== $user->id) 
          <p>
            <a href="#" class="profile__contact-btn btn btn-lg btn-block btn-info" data-toggle="modal" data-target="#exampleModalLong" >
              Hire Now 
            </a>
          </p>
          
          @elseif(auth()->user()->id == $user->id) 
          
          <a href="/profile/{{$user->id}}/edit" class="profile__contact-btn btn btn-lg btn-block btn-info"  >
              Edit Profile
            </a>
          @endauth
              
          @else
          <p>
            <a href="{{route('login')}}" class="profile__contact-btn btn btn-lg btn-block btn-info"  >
              Login to Hire
            </a>
          </p>
          @endif
          
         
  @auth
        <hr class="profile__contact-hr">
          <!-- Contact info -->
          <div class="profile__contact-info">
            <div class="profile__contact-info-item">
              <div class="profile__contact-info-icon">
                <i class="fa fa-phone"></i>
              </div>
              <div class="profile__contact-info-body">
                <h5 class="profile__contact-info-heading">Mobile number</h5>
                {{$user->phone_no}}
              </div>
            </div>
            <div class="profile__contact-info-item">
              <div class="profile__contact-info-icon">
                <i class="fa fa-envelope-square"></i>
              </div>
              <div class="profile__contact-info-body">
                <h5 class="profile__contact-info-heading">E-mail address</h5>
                <a href="#">{{$user->email}}</a>
              </div>
            </div>
            <div class="profile__contact-info-item">
              <div class="profile__contact-info-icon">
                <i class="fa fa-map-marker"></i>
              </div>
              <div class="profile__contact-info-body">
                <h5 class="profile__contact-info-heading">Work address</h5>
                {{$user->work_adress}}
              </div>
            </div>
          </div>
    @endauth
     
  </div>
</div>
</div>
<!-- Create hire request -->
@include('hire.create')
<!-- -->


<!-- Latest posts -->
<hr>
<div class="container " style="background-color: white;  box-shadow: 5px 5px 12px rgb(159, 159, 240);">
<br>
  <ul class="nav nav-tabs nav-pills" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Posts</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Discussions</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Replies</a>
    </li>
  </ul>
  <br>
  <div class="tab-content" id="myTabContent">

    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      
      <div class="col-md-8 offset-md-2">
          @if (count($user->posts) > 0)
            @foreach ($user->posts->sortByDesc('created_at') as $post)
              @include('partials.postcard')
            @endforeach
            <br>
          @else   
              <h3>No post till now</h3>     
          @endif
      </div>
    </div>

    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      
      <div class="col-md-8 offset-md-2">
          @if (count($user->discussions) > 0)
            @foreach ($user->discussions->sortByDesc('created_at') as $discussion)
              @include('partials.discussioncard')
            @endforeach
            <br>
          @else   
              <h3>No discussions till now</h3>     
          @endif
      </div>
   </div>
    
    
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
         <div class="col-md-8 offset-md-2 ">
            @if (count($user->replies) > 0)
              @foreach ($user->replies->sortByDesc('created_at') as $reply)
              @include('partials.discussionreplycardprofile')
              @endforeach
              <br>
            @else   
              <h3>No reply till now</h3>     
            @endif
         </div>
    </div>

  </div>
</div>
