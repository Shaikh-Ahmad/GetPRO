
<div   class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div  class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info" style="height: 3rem;">
          <div class="d-flex justify-content-between">
            <a href=""><img src="/storage/profile_pics/{{$user->profile_pic}}" alt="" style="border-radius: 50%;border:3px solid white; " width="60px" height="60px"></a>   
          </div>
          <h5 class="modal-title ml-3" id="exampleModalLongTitle">Hiring Fourm</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
          <form method="POST" action="{{ route('hire.store') }}" enctype="multipart/form-data">
            @csrf
            <div  class="form-group">
              <input class="form-control" name="reciever_id" value="{{$user->user_id}}" readonly hidden>
            
             <input type="hidden" value="{{$user->user->email}}" name="hire_email">
            </div>
            <div class="form-group">
                              
              <div class="col-xs-6">
                  <label for="first_name"><h4>Your First name</h4></label>
                  <input type="text" class="form-control" name="first_name" id="first_name" placeholder="{{auth()->user()->name}}" value="{{auth()->user()->name}}" readonly required>
              </div>
          </div>

          
          <div class="form-group">
              <div class="col-xs-6">
                <label for="last_name"><h4>Your Last name</h4></label>
                  <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="Enter your lastname."  required>
              </div>
          </div>

          <div class="form-group">  
            <div class="col-xs-6">
                <label for="Subject"><h4>Subject</h4></label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Title of the job" title="Work\Position you offer." required>
            </div>
          </div>
  
        
        <div class="form-group">
            <div class="col-xs-6">
              <label for="Detail"><h4>Details</h4></label>
                  <textarea type="text" class="form-control" name="detail" id="detail" placeholder="Details about work you offer" cols="30" rows="5"></textarea>
            </div>
        </div>

  
          <div class="form-group">
              <div class="col-xs-6">
                 <label for="mobile"><h4>Your Mobile no</h4></label>
                  <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Enter your mobile number" title="Enter your mobile number" required>
              </div>
          </div>

          <div class="form-group">
            <div class="col-xs-6">
               <label for="city"><h4>City name</h4></label>
                <input type="text" class="form-control" name="city" id="city" placeholder="Enter your city"  required>
            </div>
          </div>

          <div class="form-group">
              <div class="col-xs-6">
                  <label for="text"><h4>Yours Location</h4></label>
                  <input type="text" class="form-control" id="location" name="location" placeholder="Somewhere" title="Enter a location" required>
              </div>
          </div>

          <div class="form-group">
            <div class="col-xs-6">
               <label for="assistance_type"><h4>Assistance Type</h4></label>
                <select class="form-control" name="assistance_type" id="assistance_type" required>
                  <option class="hidden" value="" selected disabled>Select Assistance type</option>
                  <option>Personal Assistance</option>
                  <option>Firm / Company Assistance</option>
                </select>
              </div>
          </div>

          <div class="form-group">
            <div class="col-xs-6">
               <label for="work_tenure"><h4>Work Tenure</h4></label>
               <select class="form-control" name="work_tenure" id="work_tenure" required>
                <option class="hidden" value="" selected disabled>Select work tenure you offering</option>
                <option>Temporary</option>
                <option>Permanent</option>
                <option>Trial Base</option>
              </select>
            </div>
          </div>

          <div class="form-group ">         
            <!--<label for="content"><h5>Content</h5></label>-->
            <input class="form-control" placeholder="time" name="content" value="timing here"  cols="30" rows="10" hidden />
          </div>

     
  
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Send</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form> 
      </div>
    </div>
  </div>
  </div>

  

    <!-- <h1>send request</h1>

     <form method="POST" action="{ route('hire.store') }}" enctype="multipart/form-data">
        <div class="form-group">
            csrf            
            <label for="content"><h5>content</h5></label>
            <input class="form-control" placeholder="content" name="content"  cols="30" rows="10" />
        </div>
        <button type="submit" class="btn btn-primary">post</button>
    
 </form> 
    -->
<style>
  
    .font-family {
    font-family: "Times New Roman", Times, serif !important;
  }
</style>