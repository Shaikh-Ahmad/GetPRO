<div class="col-md-4 ">
    <div class="card user-card" >
      <!--  <div class="card-header">
            <h5>Profile</h5>
        </div> -->
        <div class="card-block cardshadow">
            <a href="/profile/{{$user->id}}">
                <div class="user-image">
                    <img src="/storage/profile_pics/{{$user->profile_pic}}" class="img-radius" alt="User-Profile-Image">
                </div>
            </a>
            <h6 class="f-w-600 m-t-25 m-b-10">{{$user->name}}</h6>
            <p class="text-muted">{{$user->profession}}| {{$user->gender}} | Born {{$user->birthday}}</p>
            <hr>
            <p class="text-muted m-t-15">Activity</p>
           <!--  <ul class="list-unstyled activity-leval">
                <li class="active"></li>
                <li class="active"></li>
                <li class="active"></li>
                <li></li>
                <li></li> -->
            </ul>
           <div class="bg-c-blue counter-block m-t-10 p-15" style="border-radius: 20px">
                <div class="row pt-3">
                    <div class="col-4 pl-4">
                        <i class="fa fa-comment"></i>
                        <p>Ans: {{ $user->replies->count() }}</p>
                    </div>
                    <div class="col-3">
                        <i class="fa fa-newspaper-o"></i>
                        <p>Posts: {{ $user->posts->count() }}</p>
                    </div>
                    <div class="col-4 pr-4">
                        <i class="fa fa-suitcase"></i>
                        <p>Offers: {{ $user->totalhirerequest->count() }}</p>
                    </div>
                </div>
            </div>
            <p class="m-t-15 text-muted">{{$user->about}}</p>
            <hr>
            <div class="row justify-content-center user-social-link">
                <div class="col-auto"><a href="#!"><i class="fa fa-facebook text-facebook"></i></a></div>
                <div class="col-auto"><a href="#!"><i class="fa fa-twitter text-twitter"></i></a></div>
                <div class="col-auto"><a href="#!"><i class="fa fa-dribbble text-dribbble"></i></a></div>
            </div>
        </div>
    </div>
</div>

<style>

.user-card .card-block {
    text-align: center;
}

.card .card-block {
    padding: 25px;
}

.user-card .card-block .user-image {
    position: relative;
    margin: 0 auto;
    display: inline-block;
    padding: 5px;
    width: 110px;
    height: 110px;
}

.user-card .card-block .user-image img {
    z-index: 20;
    position: absolute;
    top: 5px;
    left: 5px;
        width: 100px;
    height: 100px;
}

.img-radius {
    border-radius: 50%;
}

.f-w-600 {
    font-weight: 600;
}

.m-b-10 {
    margin-bottom: 10px;
}

.m-t-25 {
    margin-top: 25px;
}

.m-t-15 {
    margin-top: 15px;
}

.card .card-block p {
    line-height: 1.4;
}

.text-muted {
    color: #919aa3!important;
}

.user-card .card-block .activity-leval li.active {
    background-color: #2ed8b6;
}

.user-card .card-block .activity-leval li {
    display: inline-block;
    width: 15%;
    height: 4px;
    margin: 0 3px;
    background-color: #ccc;
}

.user-card .card-block .counter-block {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg,#4099ff,#73b4ff);
}

.bg-c-green {
    background: linear-gradient(45deg,#2ed8b6,#59e0c5);
}

.bg-c-yellow {
    background: linear-gradient(45deg,#FFB64D,#ffcb80);
}

.bg-c-pink {
    background: linear-gradient(45deg,#FF5370,#ff869a);
}

.m-t-10 {
    margin-top: 10px;
}

.p-20 {
    padding: 20px;
}

.user-card .card-block .user-social-link i {
    font-size: 30px;
}

.text-facebook {
    color: #3B5997;
}

.text-twitter {
    color: #42C0FB;
}

.text-dribbble {
    color: #EC4A89;
}

.user-card .card-block .user-image:before {
    bottom: 0;
    border-bottom-left-radius: 50px;
    border-bottom-right-radius: 50px;
}

.user-card .card-block .user-image:after, .user-card .card-block .user-image:before {
    content: "";
    width: 100%;
    height: 48%;
    border: 2px solid #4099ff;
    position: absolute;
    left: 0;
    z-index: 10;
}

.user-card .card-block .user-image:after {
    top: 0;
    border-top-left-radius: 50px;
    border-top-right-radius: 50px;
}

.user-card .card-block .user-image:after, .user-card .card-block .user-image:before {
    content: "";
    width: 100%;
    height: 48%;
    border: 2px solid #4099ff;
    position: absolute;
    left: 0;
    z-index: 10;
}
</style>