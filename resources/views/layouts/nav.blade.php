
        <nav class="navbar navbar-expand-md navbar-light shadow-lg app_theme_color "  >
            <div class="container">
                <a class="navbar-brand " style="width:40px; height:40px ; margin-bottom:5px" href="{{ url('/') }}">
                    <div class="col-md-3 register-left">
                    <b><!-- { config('app.name', 'Laravel') }}--> <img class="sizelg  mr-4" src="/storage/project_imgs/work.png" width="30px" height="30px"  alt=""></b>
                    </div>
                </a>
                <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon "></span>
                </button>
                <!-- <i class="fab fa-500px"></i>-->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                    <ul class="navbar-nav mr-auto" style="">
                            <li class=" nav-item " >
                                <a href="/home" class=" nav-link" style="color: whitesmoke" >
                                    <i class="fa fa-home ml-2"></i> 
                                    @if (auth()->user()->role == "admin")
                                        Dashboard
                                    @else
                                        Home
                                    @endif
                                </a>
                            </li>
                    
                        @if (auth()->user()->role == 'service_provider')
                
                            <li class=" nav-item">
                                <a href="/post" class=" nav-link" style="color: whitesmoke">
                                    <i class="fa fa-users ml-2" aria-hidden="true"></i> {{auth()->user()->profession}} Community</a>
                            </li>
    
                            <li class=" nav-item" >
                                <a href="{{route('discussions.index')}}" class=" nav-link" style="color: whitesmoke"> <i class="fas fa-quote-right mx-2" aria-hidden="true"></i>Discussuions</a>
                            </li>

                            <li class=" nav-item">
                                <a href="{{route('hire.index')}}" class="nav-item nav-link" style="color: whitesmoke">
                                    <i class="fas fa-briefcase mx-2" aria-hidden="true"></i><span>Offers {{auth()->user()->totalhirerequest->where('request_status', '=','Awaiting')->count()}}</span>
                                </a>
                            </li>
                            <li class=" nav-item">    
                                <a class=" nav-item nav-link" href="{{route('users.notifications')}}" style="color: whitesmoke">
                                    <i class="fas fa-bell ml-2" aria-hidden="true"></i><span class="text-light">{{auth()->user()->unreadNotifications->count()}}</span>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->role == 'client')
                        <li class=" nav-item">
                            <a href="{{route('hire.index')}}" class="nav-item nav-link" style="color: whitesmoke">
                                <i class="fas fa-briefcase mx-2" aria-hidden="true"></i><span>Sent Requests </span>
                            </a>
                        </li>
                        @endif
                    </ul>
                    @endauth
                    

                    <!-- Right Side Of Navbar -->

                    <ul class="navbar-nav ml-auto ">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" style="color: whitesmoke" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" style="color: whitesmoke" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: whitesmoke" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (auth()->user()->role == 'service_provider')
                                    <a class="dropdown-item" href="\home" >
                                        <i class="fa fa-user fa-fw mr-2 text-gray-400" aria-hidden="true"></i> 
                                        My Profile
                                    </a>
                                        <div class="dropdown-divider"></div>
                                    @endif
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                             <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                             {{ __('Logout') }}
                                        </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

<style>

    .sizelg:hover{
        width: 40px;
        height: 40px;
       
    }

    
.register-left img{
   
    -webkit-animation: mover 1s infinite  alternate;
    animation: mover 3s infinite  alternate;
}

@keyframes mover {
    0% { transform: translateX(0); }
    100% { transform: translateX(-30px); }
}

   
</style>