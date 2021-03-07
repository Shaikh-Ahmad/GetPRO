@extends('layouts.app')
@section('content') 

<div class="col-lg-8 offset-lg-2 mt-3">
    <div class="cardbox shadow-lg bg-white cardshadow">
     
     <div class="cardbox-heading" >
      <div class="media ">
       <div class="media-body">
       <h2 style="font-style: oblique;">Edit profession</h2>
       
     <hr>
    
       </div>           
      </div><!--/ media --> 
     </div>

     <!--/ cardbox-item -->
     <div class="cardbox-base">
     <div style="padding-left:5%;padding-right:5%">
        <form method="POST" action="{{ route('professions.update',$profession->id) }}" enctype="multipart/form-data">
            @method('PUT')
            <div class="form-group sm">
                @csrf           
                <label for="profession_name">Profession Name</label>
                <input type="text" name="profession_name" value="{{$profession->profession_name}}" class="form-control" style="border-radius: 25px" />
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea  style="border-radius: 25px"  class="form-control"  name="content" cols="15" rows="3" required> {{$profession->content}}</textarea>
            </div>
            <div class="form-group">
                <label class="btn" for="profession_img">
                    <a class='btn btn-lg' href='javascript:;'>
                        <i class="fa fa-picture-o fa-lg" aria-hidden="true">
                        <input type="file" name="profession_img" id="profession_img" >
                        </i>
                    </a>
                 
                </label>
                <div class="form-group float-right" >
                <button type="submit" class="btn text-white app_theme_color" >Edit Profession</button>
                </div>	   
            </div>     
             </div>
            </div>  
</form> 
@endsection