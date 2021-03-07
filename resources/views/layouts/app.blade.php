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
    <link rel = "icon" href = "/storage/project_imgs/work.png" type = "image/x-icon">
    @yield('css')
</head>
<body style="background-color: #dfe3ee">
    
    <div id="app">
        
        @include('layouts.nav')

        @if(!in_array(request()->path(),['login','register','password/email','password/reset']))
            <main>
            <div class="">
                @if(session()->has('success'))
                <div class=" alert alert-success">
                    {{session()->get('success')}}
                </div>
                @endif
                @if(session()->has('error'))
                <div class=" alert alert-danger">
                    {{session()->get('error')}}
                </div>
                @endif
                <div class="mt-3">              
                    @yield('content')
                </div>
            </div>
            @include('layouts.footer')
            </main>
        @else
            <main class="mt-3">
                @yield('content')
            </main>
        @endif
        
    </div>
    
</body>


</html>

