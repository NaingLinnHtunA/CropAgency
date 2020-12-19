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
             <!--  <p class="mb-0"><i>Post by-{{$spost->name}}</i></p> -->
           

              <a href="{{route('sposthistory.show',$spost->id)}}" class="btn">
               <img src="{{asset($spost->image)}}" class="card-img-top img-fluid shadow" alt="..." style="width: 400px;height: 400px">
               </a>
         
      </div>
      
      <div class="col-lg-6">
  
         
         <div class="row mb-3">
                <div class="col-6">
                  <ul>
                    <li> <span>Title:</span></li>
                      <li> <span>Category:</span></li>
                      <li> <span>Sub Category:</span></li>
                      <li> <span>Price:</span></li>
                      <li> <span> Quantity:</span></li>
                      <li> <span>Description:</span></li>
                  </ul>
                </div>
                <div class="col-6">

                  <ul>
                     <li>{{$spost->title}}</li>
                      <li>{{$spost->categoryid}}</li>
                      <li>{{$spost->subcategoryid}}</li>
                      <li>{{$spost->price}}</li>
                      <li>{{$spost->quantity}}</li>
                      <li>{{$spost->description}}</li>
                  </ul>
                </div>
          </div>
     
      
      
     
      <div class="row ">
        <div class="col">
          <a href="{{route('sposthistory.edit',$spost->id)}}" class="btn btn-success" style="background-color: darkgreen;">Edit</a>
       
            <form method="post" action="{{route('sposthistory.destroy',$spost->id)}}" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
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

