<div class="col-md-4">
    @auth
    <a href="{{route('discussions.create')}}" class=" btn text-white app_theme_color my-2" style="width: 100%;">
    Add discussion
    </a>
    @else
    <a href="{{route('login')}}" class="btn text-white app_theme_color my-2" style="width: 100%;">
    Sign in to add discussion
    </a>
    @endauth

    <div class="card">
        <div class="card-header">
        @if (auth()->user()->role != "admin")
        {{auth()->user()->profiledetail->profession}}   
        @endif
         Channels
          <form action="/discussions" method="GET" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q" placeholder="Search channel"> 
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default bg-info ml-2 text-white">
                            <span class="glyphicon glyphicon-search ">search</span>
                        </button>
                    </span>
            </div>
          </form>                
        </div>
        
        <div class=" card-body">
            <ul class="list-group">
                @if ( count($channels) > 0)
                @foreach ($channels as $c)
                <li class=" list-group-item btn-outline-info" >
                    <a  style="text-decoration:none;" href="{{route('discussions.index')}}?channel={{$c->id}}">
                        {{$c->name}}
                    </a>
                </li>
                @endforeach 
                 @endif
            </ul>    
        </div>
    </div>
</div>