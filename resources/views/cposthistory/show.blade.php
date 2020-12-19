@extends('maintemplate')
@section('content')
<div class="container mt-5">
   <div class="row">
    <div class="col mb-5">
      <center>
        <h2><span class="color-b">POS</span>T DE<span class="color-b">AILS</span>
          
        </h2>
      </center>
    </div>
  </div>

  <div class="row">

  	<div class="col-lg-6">
          
             <center><a href="{{route('cposthistory.show',$cpost->id)}}" class="btn">
               <img src="{{asset($cpost->image)}}" class="card-img-top img-fluid shadow" alt="..." style="width: 400px;height: 400px">
               </a></center>
        
      </div>
      
      <div class="col-lg-6">
  
         
         <div class="row mb-3">
                <div class="col-6">
                  <ul>
                    <li> <span>Title:</span></li>
                      <li> <span>Category:</span></li>
                      <li> <span>Sub Category:</span></li>
                      <li> <span>MinAmount:</span></li>
                      <li> <span>MinPrice:</span></li>
                      <li> <span>MaxAmount:</span></li>
                      <li> <span>MaxPrice:</span></li>
                      <li> <span>Description:</span></li>
                  </ul>

                </div>
                <div class="col-6">

                  <ul>
                     <li>{{$cpost->title}}</li>
                      <li>{{$cpost->categoryid}}</li>
                      <li>{{$cpost->subcategoryid}}</li>
                      <li>{{$cpost->minamount}}</li>
                      <li>{{$cpost->minprice}}</li>
                      <li>{{$cpost->maxamount}}</li>
                      <li>{{$cpost->maxprice}}</li>
                      <li>{{$cpost->description}}</li>
                  </ul>
                </div>
          </div>
          
          <div class="row">
            <div class="col">
              <a href="{{route('cposthistory.edit',$cpost->id)}}" class="btn btn-success" style="background-color: darkgreen;">Edit</a>
       
              <form method="post" action="{{route('cposthistory.destroy',$cpost->id)}}" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
              @csrf
              @method('DELETE')
              <input type="submit" name="btn" value="Delete" class="btn btn-danger">
              </form>
            </div>
          </div>

     

         </div>

  </div>
</div>
@endsection