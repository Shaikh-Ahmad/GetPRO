@extends('layouts.adminlayout')
@section('content')
<a href="/channel/create" class="btn btn-primary">create channel</a>
<hr>
<div class="container">        
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>Channel name</th>
          <th>Channel profession</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        @if ($channels->count() > 0)
        @foreach ($channels as $channel)
                <tr>
                <td><a href="discussions?channel={{$channel->id}}">{{$channel->id}}</a></td>
                   <td>{{$channel->name}}</td>
                   <td>{{$channel->channelprofession}}</td>
                   <td>
                    <form method="POST" action="{{ route('channel.destroy',$channel->id) }}" onsubmit="return confirm('Are you sure you want to Delete channel?')">
                        @csrf
                            @method('DELETE')
                            <a>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash " aria-hidden="true"></i></button>
                            </a>
                    </form>
                   </td>
                </tr>
            @endforeach
        @else
                <h5 class="text-muted">No channels Found </h5>
        @endif 
      </tbody>
    </table>
  </div>

@endsection
