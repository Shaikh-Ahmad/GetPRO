<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" ></script>
      @yield('scripts')  
      <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
      <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

      <link href="css/sb-admin-2.min.css" rel="stylesheet">

  
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rokkitt" rel="stylesheet"> 
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="">
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile_index.css') }}" rel="stylesheet">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel = "icon" href =  
    "/storage/project_imgs/work.png" 
            type = "image/x-icon">
    @yield('css')
</head>
 
<body class="container my-4">
<div class="title ml-4"><h4><i class="fa fa-user fa-lg" aria-hidden="true"></i> Create Profile</h4></div><hr>
<form method="POST" action="{{ route('profiledetail.store')  }}" enctype="multipart/form-data">
<div class="coitainer row mx-2">
    
            @csrf 
    <div class="col-md-6">        
            <table class="table table-hover table-bordered table-bg-color">
                <thead class="bg-primary text-white">
                    <th scope="col" class="offset-md-3"><h3>Personal</h3></th>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Profession  <i class="fa fa-black-tie ml-2" aria-hidden="true"></i></th>
                    <td>  
                        @foreach($professions as $profession)
                        <label for="{{$profession->profession_name}}">{{$profession->profession_name}}</label>
                        <input class="mr-3" type="radio" id="{{$profession->profession_name}}" name="profession" value="{{$profession->profession_name}}" required>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th scope="row">About</th>
                    <td><textarea name="about" id="about" cols="40" rows="4" placeholder="About Yourself" style="text-transform: capitalize;" required></textarea></td>
                </tr>
                <tr>
                    <th scope="row">Gender <i class="fa fa-venus-mars ml-2 fa-lg" aria-hidden="true"></i> </th>
                    <td>  
                        <label for="male">Male</label>
                        <input type="radio" id="male" name="gender" value="Male"  required>
                        <label  class="ml-4" for="female">Female</label>
                        <input type="radio" id="female" name="gender" value="Female" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Phone No<i class="fa fa-mobile ml-2 fa-lg" aria-hidden="true"></i></th>
                    <td><input class="form-control"  name="phone_no"  required /></td>
                </tr>
                <tr>
                    <th scope="row">City <i class="fa fa-map-marker ml-2" aria-hidden="true"></i>
                    </th>
                    <td><input class="form-control"  name="city"  required /></td>
                </tr>
                <tr>
                    <th scope="row">Profile picture <i class="fa fa-camera ml-2 fa-lg" aria-hidden="true"></i></th>
                    <td> <input type="file" name="profile_pic" id="cover_image"></td>
                </tr>
                <tr>
                    <th scope="row">Birthday <i class="fa fa-birthday-cake ml-2 fa-lg" aria-hidden="true"></i></th>
                    <td><input type="date" class="form-control"  name="birthday" required/></td>
                </tr>
                </tbody>
            </table>       
    </div>
    
    <div class="col-md-6">
        <table class="table table-hover table-bordered table-bg-color">
            <thead>
            <tr class="bg-primary text-white">
                <th scope="col" class="offset-md-3"><h3>Profession Related</h3></th>
            </tr>
            <tr>
                <th scope="row">working Status <i class="fa fa-briefcase " aria-hidden="true"></i></th>
                <td>  
                    <label for="employed">Employeed</label>
                    <input type="radio" id="employed" name="work_status" value="employed" checked="checked" required>
                    <label  class="ml-4" for="unemployed">UnEmployeed</label>
                    <input type="radio" id="un_employed" name="work_status" value="unemployed" required>
                </td>
            </tr>
            <tr>
                <th scope="row">Education <i class="fa fa-graduation-cap ml-2" aria-hidden="true"></i></th>
                <td><input class="form-control"  name="education" required/></td>
            </tr>
            <tr>
                <th scope="row">Studied At <i class="fa fa-university ml-2" aria-hidden="true"></i></th>
                <td><input class="form-control"  name="studied_at" required /></td>
            </tr>
         
            <tr>
                <th scope="row">Work Adress <i class="fa fa-address-book-o ml-2" aria-hidden="true"></i></th>
                <td><input class="form-control" name="work_adress"  required/></td>
            </tr>
            <tr>
                <th scope="row">Current Work <i class="fa fa-address-card" aria-hidden="true"></i></th>
                <td><input class="form-control" name="current_work" required /></td>
            </tr>
            <tr>
                <th scope="row">Previous Work <i class="fa fa-address-card" aria-hidden="true"></i></th>
                <td><input class="form-control" name="previous_work" required /></td>
            </tr>
            </tbody>
        </table>   
    </div>
</div>
</body>

<button type="submit" class="btn btn-primary offset-sm-3" style="width:50%">Create</button>
</form> 


<style>
    .table-bg-color{
        background: linear-gradient(to right, #ffffff, #e2e5ec); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
</style>
