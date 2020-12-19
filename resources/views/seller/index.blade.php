@extends('maintemplate')
@section('content')
  <section class="property-grid grid mt-5">
    <div class="container">
        <div class="row mb-5">
        <div class="col">
          <center>
            <h2 class="navbar-brand text-brand">
              <span class="color-b">SE</span>LL<span class="color-b">ER</span> PO<span class="color-b">S</span>TS
            </h2>
          </center>
        </div>
      </div>
      <div class="row">
        <!-- <div class="col-sm-12">
          <div class="grid-option">
            <form>
              <select class="custom-select">
                <option selected>All</option>
                <option value="1">Categories</option>
              </select>
            </form>
          </div>
        </div> -->
        @foreach($sellers as $seller)
        <div class="col-md-4">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="{{asset($seller->image)}}" alt="" class="img-a img-fluid" style="width: 300px;height: 350px">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="#">{{$seller->title}}</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">{{$seller->description}}</span>
                  </div>
                  <a href="{{route('seller.show',$seller->id)}}" class="link-a">Click here to view
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                       <h4 class="card-info-title"><i class="fa fa-user" aria-hidden="true"></i>{{$seller->uname}}</h4>
                      <span><i class="fa fa-clock-o" aria-hidden="true"></i>{{$seller->created_at}}
                      </span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
     
      </div>
      <div class="row">
        <div class="col-sm-12">
          <nav class="pagination-a">
            <ul class="pagination justify-content-end">
              <!-- <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                  <span class="ion-ios-arrow-back"></span>
                </a>
              </li> -->
              <!-- <li class="page-item">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li> -->
              <!-- <li class="page-item next">
                <a class="page-link" href="#">
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </li> -->
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </section>
@endsection