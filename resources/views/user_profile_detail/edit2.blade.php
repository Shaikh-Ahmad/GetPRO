@extends('layouts.app')
@section('content')

<div class="container register mt-4">
    <div class="row">
        <div class="col-md-3 register-left">
            <a href="/"><img src="/storage/project_imgs/work.png" alt=""/></a>
            <h3>Update Profile</h3>
            <p>Keep your profile upto date to get better hire requests!</p>
        </div>

        <div class="col-md-9 register-right">
            <form method="POST" action="{{ route('profiledetail.update',$user->user_id)}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Personal Detail</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                     <input class="form-control" type="text" value="{{$user->profession}}" name="profession" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="City *" value="{{$user->city}}" name="city"  required />
                                </div>
                                <div class="form-group">
                                    <textarea name="about" id="about" cols="30" rows="3" placeholder="About You *" style="text-transform: capitalize;" required>{{$user->about}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="skills">Skills</label>
                                    <textarea name="skills" id="skills" cols="30" rows="2" placeholder="Discribe skills you have (optional)" >{{$user->skills}}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline"> 
                                            <input type="radio" id="male" name="gender" value="Male" {{  ($user->gender == "Male" ? ' checked' : '') }} required>
                                            <span> Male </span> 
                                        </label>
                                        <label class="radio inline"> 
                                            <input type="radio" id="female" name="gender" value="Female" {{  ($user->gender == "Female" ? ' checked' : '') }} required>
                                            <span>Female </span> 
                                        </label>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Phone no *" value="{{$user->phone_no}}" name="phone_no"  required />
                                </div>
                                <div class="form-group">
                                    <input type="date" placeholder="Birthday *" class="form-control" value="{{$user->birthday}}" name="birthday" required/>
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input class="form-control" name="website" id="website" value="{{$user->website}}" placeholder="Add link to your website (optional)" />
                                </div>
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input class="form-control" name="facebook"  value="{{$user->facebook}}" placeholder="Add link to your Facebook (optional)"/>
                                </div>
                                <div class="form-group">
                                    <label for="twitter">Twitter</label>
                                    <input class="form-control" name="twitter" value="{{$user->twitter}}" placeholder="Add link to your Twitter (optional)" />
                                </div>
                                <div class="form-group">
                                    <label for="github">Git Hub</label>
                                    <input class="form-control" name="github"  value="{{$user->github}}" placeholder="Add link to your Github (optional)" />
                                </div>
                        
                                <div class="form-group mt-4">
                                    <label for="profile_pic">Profile picture <i class="fa fa-camera ml-2 fa-lg" aria-hidden="true"></i></label>
                                    <input  type="file"  name="profile_pic" id="cover_image">
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading">Profession / Occupation  detail</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Education *" name="education" value="{{$user->education}}" required/>
                                </div>
                                <div class="form-group">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Current Work *" value="{{$user->current_work}}" name="current_work" required />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Work At *" value="{{$user->work_adress}}" name="work_adress"  required/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Studied At *" value="{{$user->studied_at}}" name="studied_at" required />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="previous Work *" value="{{$user->previous_work}}" name="previous_work" required />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="speciality" id="speciality"  placeholder="In which field you specialize (optional)" value="{{$user->speciality}}" />
                                </div>
                                <div class="form-group mt-4">
                                    <div class="maxl">
                                        <label class="radio inline"> 
                                            <input type="radio" id="employed" name="work_status" value="employed" {{  ($user->work_status == "employed" ? ' checked' : '') }} checked="checked" required>
                                            <span> Employeed </span> 
                                        </label>
                                        <label class="radio inline"> 
                                            <input type="radio" id="un_employed" name="work_status" value="unemployed" {{  ($user->work_status == "unemployed" ? ' checked' : '') }}  required>
                                            <span> Un-Employeed </span> 
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btnRegister mt-4">
                                    {{ __('Update Profile') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                    @if (auth()->user()->role == "admin")
                    <div class="col-md-8 ml-4">
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
            </form>
        </div>

        <ul class="nav nav-tabs nav-justified float-right" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Step 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Step 2</a>
            </li>
        </ul>
        
    </div>
</div>


<style>
    .register{
    height: 110%;
    background-image: url('https://www.teahub.io/photos/full/127-1270024_seamless-polygon-backgrounds-vol-professional-background-for-poster.jpg') !important;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 1s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-60px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 100%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}
</style>

@endsection