@extends('layouts.adminlayout')
@section('content')

<h1 class="title"><i class="fa fa-users text-gray-300" aria-hidden="true"></i> Users</h1>
</div>
<br>
<div class=" ml-4"  style="margin-left: 150px">
  <form action="configusers" method="GET" role="search">
  {{ csrf_field() }}
  <div class="input-group" >
      <input type="text" class="form-control" name="q" placeholder="Search Profile" style="border-radius: 15px"> 
          <span class="input-group-btn" style="width:75%; border-radius: 25px;">
              <button type="submit" class="btn btn-outline-info my-2 ml-2 my-sm-0"  style="border-radius: 15px" >
                  <span class="glyphicon glyphicon-search">search</span>
              </button>
          </span>
  </div>
  </form>
</div>
<br>
<div class="container">        
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>Firstname</th>
          <th>name</th>
          <th>Email</th>
          <th>User Role </th>
          <th>profession</th>
          <th>Varification </th>
          <th>Edit/delete</th>
        </tr>
      </thead>
      <tbody>
        @if ($users->count() > 0)
            @foreach ($users as $user)
                <tr>
                <a href=""><td>{{$user->id}}</td></a>
                   <td> @if ($user->role != "client")
                    @if ($user->profiledetail != null)
                    <a href="profiledetail/{{$user->id}}">
                       @endif
                       @endif
                      {{$user->username}}</a>
                    </td>
                   
                   <td>{{$user->name}}</td>
                   <td>{{$user->email}}</td>
                   <td>{{$user->role}}</td>
                   <td>
                    @if ($user->role == "service_provider")
                      @if ($user->profiledetail != null)
                       {{$user->profiledetail->profession}}
                      @endif
                    @else
                      null
                    @endif
                   </td>
                   <td>
                     @if ($user->role == "service_provider")
                      @if ($user->profiledetail != null)
                          @if ($user->profiledetail->profile_varified == "yes")
                          <i class="fa fa-check-circle fa-lg text-warning"aria-hidden="true"></i>
                          @else
                          <i class="fa fa-ban fa-lg " aria-hidden="true"></i>
                          @endif
                      @else  
                      <i class="fa fa-ban fa-lg " aria-hidden="true"></i>
                      @endif
                     @else
                     <i class="fa fa-ban fa-lg " aria-hidden="true"></i>
                     @endif
                   </td>
                   

                   <td>
                   <div class="row">
                      @if ($user->role != "client")
                        @if ($user->profiledetail != null)
                          <a  href="/profiledetail/{{$user->id}}/edit"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                          <hr style="border: 1px solid rgb(196, 194, 194) ;height:30px ; margin:5px">
                        @endif
                      @endif

                      <form action="{{ route('user.destroy',$user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete user? Once deleted can not be Redone!');">
                        @csrf
                        @method('DELETE')
                        <button  type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger "></i>
                        </button>
                      </form>
                    </div>
                  </td>

                </tr>
            @endforeach
        @else
                <h5 class="text-muted">No user Found </h5>
        @endif 
      </tbody>
    </table>
  </div>
  
@endsection