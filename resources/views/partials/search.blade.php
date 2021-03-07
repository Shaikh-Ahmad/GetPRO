<div class=" my-3" >
    <form action="search" method="GET" role="search">
    {{ csrf_field() }}
    <div class="input-group" >
        <input type="text" class="form-control" name="q" placeholder="Search Profile" style="border-radius: 15px"> 
            <span class="input-group-btn" style="width:75%; border-radius: 25px;">
                <button type="submit" class="btn btn-outline-success my-2 ml-2 my-sm-0"  style="border-radius: 15px" >
                    <span class="glyphicon glyphicon-search">search</span>
                </button>
            </span>
    </div>
    </form>
</div>