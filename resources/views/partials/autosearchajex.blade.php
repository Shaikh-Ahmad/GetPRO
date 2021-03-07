
   <div class="form-group">
    <label for="channel">Choose your channel from the list:</label>
    <input  name="channel" id="channel" class="form-control input-lg" placeholder="select channel" />
    <div id="channelList">
       
    </div>
   </div>
   {{ csrf_field() }}
 

<script>
$(document).ready(function(){

 $('#channel').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('channel.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#channelList').fadeIn();  
                    $('#channelList').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#channel').val($(this).text());  
        $('#channelList').fadeOut();  
    });  

});
</script>
