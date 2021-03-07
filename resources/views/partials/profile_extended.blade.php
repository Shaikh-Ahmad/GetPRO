<!-- Latest posts -->
<hr>
<div class="container col-md-9" style="background-color: white;  box-shadow: 5px 5px 12px rgb(159, 159, 240); margin-bottom:100px">
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
          @if (count($user->user->posts) > 0)
            @foreach ($user->user->posts->sortByDesc('created_at') as $post)
              @include('partials.postcard')
            @endforeach
            <br>
          @else   
              <h5 class="text-muted font-size-sm pb-4">No post till now</h5>     
          @endif
      </div>
    </div>

    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      
      <div class="col-md-8 offset-md-2">
          @if (count($user->user->discussions) > 0)
            @foreach ($user->user->discussions->sortByDesc('created_at') as $discussion)
              @include('partials.discussioncard')
            @endforeach
            <br>
          @else   
              <h5 class="text-muted font-size-sm pb-4">No discussions till now</h5>     
          @endif
      </div>
   </div>
    
    
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
         <div class="col-md-8 offset-md-2 ">
            @if (count($user->user->replies) > 0)
              @foreach ($user->user->replies->sortByDesc('created_at') as $reply)
              @include('partials.discussionreplycardprofile')
              @endforeach
              <br>
            @else   
              <h5 class="text-muted font-size-sm pb-4">No reply till now</h5>     
            @endif
         </div>
    </div>

  </div>
</div>

