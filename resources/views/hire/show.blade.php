@extends('layouts.app')

@section('content')
<div class="container">
    <div class="title"><h3 class="d-flex justify-content-center">Hire Request</h3></div><hr style="width:50%">
        <table class="table table-striped table-hover ">
            <tbody>
              <tr>
                <th scope="row">Subject</th>
                <td>{{$hire->subject}}</td>
              </tr>
              <tr>
                <th scope="row">Detail</th>
                <td>{{$hire->detail}}</td>
              </tr>
              <tr>
                <th scope="row">City</th>
                <td>{{$hire->city}}</td>
              </tr>
              <tr>
                <th scope="row">Client location</th>
                <td>{{$hire->location}}</td>
              </tr>
              <tr>
                <th scope="row">client Mobile</th>
                <td>{{$hire->mobile}}</td>
              </tr>
              <tr>
                <th scope="row">Assistance Type</th>
                <td>{{$hire->assistance_type}}</td>
              </tr>
              <tr>
                <th scope="row">Work Tenure</th>
                <td>{{$hire->work_tenure}}</td>
              </tr>
              <tr>
                <th scope="row">Send to</th>
                <td><a href="/profiledetail/{{$hire->reciveruser->id}}">{{$hire->reciveruser->name}}</a></td>
              </tr>
              <tr>
                <th scope="row">Send by</th>
                @if ($hire->user->role == "service_provider")
                <td><a href="/profiledetail/{{$hire->user->id}}">{{$hire->user->username}}</a></td>
                @else
                <td>{{$hire->user->username}}</td>
                @endif
                
              </tr>
              <tr>
                <th scope="row">Recieved On</th>
                <td>{{$hire->created_at->diffForHumans()}}  => {{$hire->created_at}}</td>
              </tr>
             
            </tbody>
        </table>
         
          @if(auth()->user()->id == $hire->reciever_id)
            <form method="POST" action="{{ route('hire.update',$hire->id) }}" onsubmit="return confirm('Are you sure you want to Decline Request?')">
              @csrf
                  @method('PUT')
                  <input type="text" name="request_status" id="request_status" value="Rejected" readonly hidden>
                  <a><button type="submit" class="btn-sm btn-outline-danger float-right"  >
                      Decline Request </button>
                  </a>
            </form>  
          @endif
          @if(auth()->user()->id == $hire->sender_id)         
          <form method="POST" action="{{ route('hire.destroy',$hire->id) }}" onsubmit="return confirm('Are you sure you want to Remove request?')">
              @csrf
                  @method('DELETE')
                  <a><button type="submit" class="btn-sm btn-danger float-right"  >
                      Delete Request <i class="fa fa-times" aria-hidden="true"></i></button>
                  </a>
          </form>      
          @endif
</div>
<br><br><br>
@endsection