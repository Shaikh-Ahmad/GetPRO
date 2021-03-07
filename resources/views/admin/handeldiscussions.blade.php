@extends('layouts.adminlayout')
@section('content')
<h1 class="title"><i class="fa fa-comment fa-1x text-gray-300"></i>Discussions</h1>
</div>
<br>
<div class=" ml-4"  style="margin-left: 150px">
  <form action="configdiscussions" method="GET" role="search">
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
          <th>Posted By</th>
          <th>Related Profession</th>
          <th>Content</th>
          <th>Created At</th>
          <th>Delete</th> 
        </tr>
      </thead>
      <tbody>
        @if ($discussions->count() > 0)
            @foreach ($discussions as $d)
                <tr>
                <td><a href="/discussions/{{$d->id}}">{{$d->id}}</a></td>
                   <td><a href="/profiledetail/{{$d->user_id}}">{{$d->author->username}}</a></td>
                   <td>{{$d->related_profession}}</td>
                   <td>{!!$d->content!!}</td>
                   <td>{{$d->created_at}}</td>
                   <td>
                   <div class="row">
                      <form action="{{ route('discussions.destroy',$d->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete Discussion? Once deleted can not be Redone!');">
                        @csrf
                        @method('DELETE')
                        <button   type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger "></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
            @endforeach
        @else
                <h5 class="text-muted">No post Found </h5>
        @endif 
      </tbody>
    </table>
  </div>
  
@endsection