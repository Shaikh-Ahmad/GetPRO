@extends('layouts.app')
@section('content')
<div class="title ml-4"><h4><i class="fa fa-user fa-lg" aria-hidden="true"></i>Update Profile</h4></div><hr>
<form method="POST" action="{{ route('profiledetail.update',$user->user_id)}}" enctype="multipart/form-data">
<div class="coitainer row mx-2">
    @method('PUT')
            @csrf 
    <div class="col-md-6">        
            <table class="table table-hover table-bordered table-bg-color">
                <thead class="text-white bg-primary">
                    <th scope="col" class="offset-md-3"><h3>Personal Details</h3></th>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Profession  <i class="fa fa-black-tie ml-2" aria-hidden="true"></i></th>
                    <td><input class="form-control" value="{{$user->profession}}" name="profession"  readonly /></td>
                </tr>
                <tr>
                    <th scope="row">About</th>
                    <td><textarea name="about" id="about" cols="40" rows="4" placeholder="About Yourself" style="text-transform: capitalize; border-radius:10px" required>{{$user->about}}</textarea></td>
                </tr>
                <tr>
                    <th scope="row">Gender <i class="fa fa-venus-mars ml-2 fa-lg" aria-hidden="true"></i></th>
                    <td>  
                        <label for="Male">Male</label>
                        <input type="radio" name="gender"  value="Male" {{  ($user->gender == "Male" ? ' checked' : '') }} required>
                        <label  class="ml-4" for="female">Female</label>
                        <input type="radio"  name="gender" value="Female"  {{  ($user->gender == "Female" ? ' checked' : '') }} required>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Phone No<i class="fa fa-mobile ml-2 fa-lg" aria-hidden="true"></i></th>
                    <td><input class="form-control"  name="phone_no" value="{{$user->phone_no}}"  required /></td>
                </tr>
                <tr>
                    <th scope="row">City <i class="fa fa-map-marker ml-2" aria-hidden="true"></i>
                    </th>
                    <td><input class="form-control"  name="city" value="{{$user->city}}" required /></td>
                </tr>
                <tr>
                    <th scope="row">Profile picture <i class="fa fa-camera ml-2 fa-lg" aria-hidden="true"></i></th>
                    <td> <input type="file" name="profile_pic" id="cover_image"></td>
                </tr>
                <tr>
                    <th scope="row">Birthday<i class="fa fa-birthday-cake ml-2 fa-lg" aria-hidden="true"></i></th>
                    <td><input type="date" class="form-control"  name="birthday" value="{{$user->birthday}}" /></td>
                </tr>
                </tbody>
            </table>       
    </div>
    
    <div class="col-md-6">
        <table class="table table-hover table-bordered table-bg-color">
            <thead>
            <tr class="text-white bg-primary">
                <th scope="col" class="offset-md-3"><h3>Professional Details</h3></th>
            </tr>
            <tr>
                <th scope="row">working Status <i class="fa fa-briefcase " aria-hidden="true"></i></th>
                <td>  
                    <label for="employed">Employeed</label>
                    <input type="radio" id="employed" name="work_status" value="employed" {{  ($user->work_status == "employed" ? ' checked' : '') }}  required>
                    <label  class="ml-4" for="unemployed">UnEmployeed</label>
                    <input type="radio" id="un_employed" name="work_status" value="unemployed" {{  ($user->work_status == "unemployed" ? ' checked' : '') }} required>
                </td>
            </tr>
            <tr>
                <th scope="row">Education <i class="fa fa-graduation-cap ml-2" aria-hidden="true"></i></th>
                <td><input class="form-control"  name="education" value="{{$user->education}}" required/></td>
            </tr>
            <tr>
                <th scope="row">Studied At <i class="fa fa-university ml-2" aria-hidden="true"></i></th>
                <td><input class="form-control"  name="studied_at" value="{{$user->studied_at}}"  required /></td>
            </tr>
         
            <tr>
                <th scope="row">Work Adress <i class="fa fa-address-book-o ml-2" aria-hidden="true"></i></th>
                <td><input class="form-control" name="work_adress" value="{{$user->work_adress}}"/></td>
            </tr>
            <tr>
                <th scope="row">Current Work <i class="fa fa-address-card" aria-hidden="true"></i></th>
                <td><input class="form-control" name="current_work" value="{{$user->current_work}}" required /></td>
            </tr>
            <tr>
                <th scope="row">Previous Work <i class="fa fa-address-card" aria-hidden="true"></i></th>
                <td><input class="form-control" name="previous_work" value="{{$user->previous_work}}" required /></td>
            </tr>
            
            </tbody>
        </table> 
        
</div>

    @if (auth()->user()->role == "admin")
        <div class="col-md-8">
            <table class="container table table-hover table-bordered bg-warning">
                <tbody>
                    <tr>
                        <th scope="row">Pofile Varified<i class="fa fa-check-circle fa-lg "aria-hidden="true"></i> </th>
                        <td>  
                            <label for="yes">Yes</label>
                            <input type="radio" name="profile_varified"  value="yes" {{  ($user->profile_varified == "yes" ? ' checked' : '') }} required>
                            <label  class="ml-4" for="No">No</label>
                            <input type="radio"  name="profile_varified" value="no"  {{  ($user->profile_varified == "no" ? ' checked' : '') }} required>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @else
        <input type="radio" name="profile_varified"  value="yes" {{  ($user->profile_varified == "yes" ? ' checked' : '') }} readonly hidden required >
        <input type="radio"  name="profile_varified" value="no"  {{  ($user->profile_varified == "no" ? ' checked' : '') }} readonly hidden required>
    @endif


</div>

<button type="submit" class="btn btn-primary offset-sm-3" style="width:50%">update</button>
</form> 
@endsection

<style>
    .table-bg-color{
     
        background: linear-gradient(to right, #ffffff, #e6eaf3); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }
</style>
