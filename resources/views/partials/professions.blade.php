<div class="card cardshadow col-sm-2 " style="margin: 10px; border-radius:10px" >
    <a href="/profession?key={{$profession->profession_name}}">
        <img class="card-img-top" src="/storage/profession_imgs/{{$profession->profession_img}}"  alt="Card image cap">
    </a>
        <hr>
    <div class="card-body">
        <div class="row">
            <a href="/profession?key={{$profession->profession_name}}"><h5 class="card-title">{{$profession->profession_name}}</h5></a>
            @if(Auth::check())
                @if(Auth::user()->role == 'admin') 
                <div class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/professions/{{$profession->id}}/edit" >
                            <i class="fa fa-pencil" aria-hidden="true"></i>  Edit
                        </a>
                        <form method="POST" action="{{ route('professions.destroy',$profession->id) }}" onsubmit="return confirm('Are you sure you want to Delete Profession?')">
                            @csrf
                                @method('DELETE')
                                <a>
                                    <button type="submit" class="btn dropdown-item"><i class="fa fa-trash" aria-hidden="true">  Delete </i></button>
                                </a>
                        </form>
                    </div>
                </div>
                @endif
            @endif
        </div>
        <p class="text mt-1" style="margin:-12px">{{$profession->content}} </p>
    </div>
</div> 


