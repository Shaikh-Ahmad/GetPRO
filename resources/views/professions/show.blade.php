@extends('layouts.app')

@section('content')
<div class="card col-md-3 cardshadow" >
    <img class="card-img-top" src="/storage/profession_imgs/{{$profession->profession_img}}"  alt="Profession img">
    <hr>
    <div class="card-body">
        <a href="/profession?key=doctor"><h5 class="card-title">{{$profession->profession_name}}</h5></a>
        <p class="card-text">{{$profession->content}} {{$profession->profession_img}}</p>
    </div>
</div>
@endsection