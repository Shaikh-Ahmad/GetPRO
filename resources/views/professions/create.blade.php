

<div class="col-lg-8 offset-lg-2 mt-3">
    <div class="cardbox shadow-lg bg-white cardshadow">

     <!--/ cardbox-item -->
     <div class="cardbox-base">
     <div style="padding-left:5%;padding-right:5%">
        <form method="POST" action="{{ route('professions.store') }}" enctype="multipart/form-data">
            <div class="form-group pt-4">
                @csrf           
                <input type="text" name="profession_name" placeholder="profession name"  class="form-control" style="border-radius: 25px" />
            </div>
            <div class="form-group">
                <textarea  style="border-radius: 25px"  class="form-control" placeholder="About profession" name="content" cols="15" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label class="btn" for="profession_img">  
                        <i class="fa fa-picture-o fa-lg" aria-hidden="true">
                        <input type="file" name="profession_img" id="profession_img" >
                        </i>
                </label>
                <div class="form-group float-right" >
                <button type="submit" class="btn text-white bg-primary" >Add Profession</button>
                </div>	   
            </div>  
        </form>    
             </div>
            </div>  
    </div>
</div>
