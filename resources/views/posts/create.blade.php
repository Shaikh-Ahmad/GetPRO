

<div class="col-lg-8 offset-lg-2 mt-3">
    <div class="cardbox shadow-lg bg-white cardshadow">
     
     <div class="cardbox-heading" >
      <div class="media ">
       <div class="d-flex mr-2">
        <a href="/profiledetail/{{auth()->user()->id}}"><img class="img-fluid rounded-circle" src="/storage/profile_pics/{{auth()->user()->profiledetail->profile_pic}}" alt="User"></a>
       </div>
       <div class="media-body">
       <h2 style="font-style: oblique;">Create Post</h2>
       
     <hr>
    
       </div>           
      </div><!--/ media --> 
     </div>

     <!--/ cardbox-item -->
     <div class="cardbox-base">
     <div style="padding-left:5%;padding-right:5%">
        <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
            <div class="form-group sm">
                @csrf           

                <input type="text" name="title" placeholder="Title" value="none" class="form-control" style="border-radius: 25px" hidden/>
            </div>
            <div class="form-group">
                <textarea  style="border-radius: 25px"  class="form-control" placeholder="what's on your mind? share your professional life with your community" name="content" cols="15" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label class="btn" for="post_img">
                    <div style="position:relative;">
                    <a class='btn btn-lg' href='javascript:;'>
                        <i class="fa fa-picture-o " aria-hidden="true"> / <i class="fa fa-paperclip" aria-hidden="true"></i>
                        <input  type="file" name="post_img" id="post_img" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                        </i>
                    </a>
                    &nbsp;
                    <span class='label label-info' id="upload-file-info"></span>
                    </div>
                </label>
                <div class="form-group float-right" >
                <button type="submit" class="btn text-white app_theme_color" >Post</button>
                </div>	   
            </div>     
             </div>
            </div>  
     </div>
   </div><!--/ col-lg-6 -->	
</form> 

<style>
    .cardshadow:hover {
      box-shadow: 5px 10px 0px 5px #97d9e9;
      border: 2px solid #22d3ff ;
      border-radius: 15px;
  }
  </style>





