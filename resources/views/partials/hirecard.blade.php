<div class="container">
    <div class="card shadow cardshadow">
        <div class="card-header app_theme_color " style="height:35px; color:whitesmoke;">
            <h5>
                @if ($hire->user->role == "service_provider")
                <span>Offer from : <a style="color:rgb(252, 252, 252)" href="profiledetail/{{$hire->user->id}}">{{$hire->user->name}}</a></span>
                @else
                <span>Offer from: {{$hire->user->name}}</span>
                @endif
            </h5>
            @if ($hire->request_status == 'Awaiting')
            <p class="float-right text-muted" ><b>Status:</b> <i class="far fa-dot-circle bg-warning">{{$hire->request_status}}</i></p>
            @elseif ($hire->request_status == 'Accepted')
            <p class="float-right text-muted"><b>Status:</b> <i class="fas fa-dot-circle" style="color:rgb(6, 255, 39)">{{$hire->request_status}} </i></p>
            @else 
            <p class="float-right text-muted"><b>Status:</b> <i class="fas fa-dot-circle" style="color:rgb(255, 0, 0)">{{$hire->request_status}} </i></p>
            @endif
        </div>

        <div class="card-body">
            <h5 class="card-title py-1 " ></h5>
            @if ($hire->user->role != 'client')
                <a href="profiledetail/{{$hire->user->id}}">
                    <div class="profile__avatar">
                        <img src="/storage/profile_pics/{{$hire->user->profiledetail->profile_pic}}" width="60px" height="60px" alt="">
                    </div>
                </a>
            @endif

            
            <div class="title"> <h4><b>Subject: </b>{{$hire->subject}}</h4></div>
            <div class="title"> <h6 >Offer sent to: 
                <a href="profiledetail/{{$hire->reciveruser->id}}">{{$hire->reciveruser->name}}</a></h6></div>
            <p class="card-text"><b>Detail: </b> {{$hire->detail}}</p>
            
            <a href="/hire/{{$hire->id}}"  style="text-decoration:none;color:rgb(22, 4, 4)">
                <button class="btn-sm btn-info float-right mr-2"  >
                View Details <i class="fa fa-eye" aria-hidden="true"></i></button>
            </a>
            
            
            @if(auth()->user()->id != $hire->sender_id)
                @if ($hire->request_status == 'Awaiting')
                <form method="POST" action="{{ route('hire.update',$hire->id) }}" onsubmit="return confirm('Are you sure you want to Accept request?')">
                    @csrf
                        @method('PUT')
                        <input type="text" name="request_status" id="request_status" value="Accepted" readonly hidden>
                        <a><button type="submit" class="btn-sm btn-outline-success float-right ml-2" >
                            Accept Request </button>
                        </a>
                </form>
                @endif    
                <form method="POST" action="{{ route('hire.update',$hire->id) }}" onsubmit="return confirm('Are you sure you want to Decline Request?')">
                    @csrf
                        @method('PUT')
                        <input type="text" name="request_status" id="request_status" value="Rejected" readonly hidden>
                        <a><button type="submit" class="btn-sm btn-outline-danger float-right"  >
                            Decline Request </button>
                        </a>
                </form>  
            @endif

        
        </div>
    </div>
</div>
<br>