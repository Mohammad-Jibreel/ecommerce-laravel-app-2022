@extends('layouts.user')
@section('content')
<div id="carouselExampleInterval" class="carousel slide" data-mdb-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-mdb-interval="10000">
        <img src="https://images.pexels.com/photos/920382/pexels-photo-920382.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="w-100" style="height:500px" alt="Wild Landscape"/>
      </div>
      <div class="carousel-item" data-mdb-interval="2000">
        <img src="https://images.pexels.com/photos/853151/pexels-photo-853151.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="w-100" style="height:500px" alt="Camera"/>
      </div>
      <div class="carousel-item">
        <img src="https://images.pexels.com/photos/787929/pexels-photo-787929.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="w-100" style="height:500px" alt="Exotic Fruits"/>
      </div>
    </div>
    <button class="carousel-control-prev" data-mdb-target="#carouselExampleInterval" type="button" data-mdb-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" data-mdb-target="#carouselExampleInterval" type="button" data-mdb-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

 <h2 class="text-center text-info mt-4 p-3">Shop by Category
</h2>

<!--card-->
<div class="container">


<div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
      <div class="card h-100">
        <img src="https://preview.colorlib.com/theme/estore/assets/img/categori/xcat1.jpg.pagespeed.ic.fHyE_8RHVV.webp" class="card-img-top" alt="Skyscrapers"/>
        <div class="card-body">
          <h5 class="card-title">Owmen`S
            Best New Deals
            New Collection</h5>


        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <img src="https://preview.colorlib.com/theme/estore/assets/img/categori/xcat2.jpg.pagespeed.ic.Y9XV67bWs0.webp" class="card-img-top" alt="Los Angeles Skyscrapers"/>
        <div class="card-body">
          <h5 class="card-title">Discount!
            Winter Cloth
            New Collection

            </h5>
        </div>

      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <img src="https://preview.colorlib.com/theme/estore/assets/img/categori/xcat3.jpg.pagespeed.ic.2LQT-LNfhJ.webp" class="card-img-top" alt="Palm Springs Road"/>
        <div class="card-body">
          <h5 class="card-title">Man`S Cloth
            Best New Deals
            New Collection
            </h5>

        </div>

      </div>
    </div>
  </div>
</div>


{{-- latest product --}}
<h3 class="text-dark font-weight-bold text-center mt-5 p-2">Latest Product</h3>
<hr>
<!-- Tabs navs -->
<ul class="nav nav-tabs justify-content-around" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
      <a
        class="nav-link active"
        id="ex3-tab-1"
        data-mdb-toggle="tab"
        href="#ex3-tabs-1"
        role="tab"
        aria-controls="ex3-tabs-1"
        aria-selected="true"
        >All</a
      >
    </li>
    <li class="nav-item" role="presentation">
      <a
        class="nav-link"
        id="ex3-tab-2"
        data-mdb-toggle="tab"
        href="#ex3-tabs-2"
        role="tab"
        aria-controls="ex3-tabs-2"
        aria-selected="false"
        >New</a
      >
    </li>
    <li class="nav-item" role="presentation">
      <a
        class="nav-link"
        id="ex3-tab-3"
        data-mdb-toggle="tab"
        href="#ex3-tabs-3"
        role="tab"
        aria-controls="ex3-tabs-3"
        aria-selected="false"
        >Offer</a
      >
    </li>
  </ul>
  <!-- Tabs navs -->

  <!-- Tabs content -->
  <div class="tab-content" id="ex2-content">
    <div
      class="tab-pane fade show active"
      id="ex3-tabs-1"
      role="tabpanel"
      aria-labelledby="ex3-tab-1"
    >

<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-80">
              <img src="https://preview.colorlib.com/theme/estore/assets/img/categori/xproduct1.png.pagespeed.ic.1xDh2tYQRf.webp" class="card-img-top" alt="Palm Springs Road"/>
              <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">

                </p>
              </div>
              <div class="card-footer">
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-80">
              <img src="https://preview.colorlib.com/theme/estore/assets/img/categori/xproduct2.png.pagespeed.ic.eUEI6NamxP.webp" class="card-img-top" alt="Palm Springs Road"/>
              <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">

                </p>
              </div>
              <div class="card-footer">
                <small class="text-muted"></small>
              </div>
            </div>
          </div>
        <div class="col">
          <div class="card h-80">
            <img src="https://preview.colorlib.com/theme/estore/assets/img/categori/xproduct3.png.pagespeed.ic.7lSBCQxjjP.webp" class="card-img-top" alt="Palm Springs Road"/>
            <div class="card-body">
              <h5 class="card-title"></h5>
              <p class="card-text">

              </p>
            </div>
            <div class="card-footer">
              <small class="text-muted"></small>
            </div>
          </div>
        </div>
      </div>
</div>





    </div>

    <div
      class="tab-pane fade"
      id="ex3-tabs-2"
      role="tabpanel"
      aria-labelledby="ex3-tab-2"
    >
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-80">
                  <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/042.webp" class="card-img-top" alt="Palm Springs Road"/>
                  <div class="card-body">
                    <h5 class="card-title">product Name</h5>
                    <p class="card-text">
                    dasaodkd
                    </p>
                  </div>
                  <div class="card-footer">
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card h-80">
                  <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/042.webp" class="card-img-top" alt="Palm Springs Road"/>
                  <div class="card-body">
                    <h5 class="card-title">product Name</h5>
                    <p class="card-text">
                    price
                    </p>
                  </div>
                  <div class="card-footer">
                  </div>
                </div>
              </div>
            <div class="col">
              <div class="card h-80">
                <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/042.webp" class="card-img-top" alt="Palm Springs Road"/>
                <div class="card-body">
                  <h5 class="card-title">product Name</h5>
                  <p class="card-text">
                  price
                  </p>
                </div>
                <div class="card-footer">
                </div>
              </div>
            </div>
          </div>
    </div>

    </div>
    <div
      class="tab-pane fade"
      id="ex3-tabs-3"
      role="tabpanel"
      aria-labelledby="ex3-tab-3"
    >
     <div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-80">
              <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/042.webp" class="card-img-top" alt="Palm Springs Road"/>
              <div class="card-body">
                <h5 class="card-title">product Name</h5>
                <p class="card-text">
                dasaodkd
                </p>
              </div>
              <div class="card-footer">
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-80">
              <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/042.webp" class="card-img-top" alt="Palm Springs Road"/>
              <div class="card-body">
                <h5 class="card-title">product Name</h5>
                <p class="card-text">
                price
                </p>
              </div>
              <div class="card-footer">
              </div>
            </div>
          </div>
        <div class="col">
          <div class="card h-80">
            <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/042.webp" class="card-img-top" alt="Palm Springs Road"/>
            <div class="card-body">
              <h5 class="card-title">product Name</h5>
              <p class="card-text">
              price
              </p>
            </div>
            <div class="card-footer">
            </div>
          </div>
        </div>
      </div>
</div>

    </div>
  </div>

  <div class="p-5 text-center text-info bg-light" style="margin-top: 58px;">
    <h1 class="mb-3">Get Our
        Latest Offers News

        </h1>
    <h4 class="mb-3">Subscribe news latter
    </h4>
    <div class="input-group justify-content-center">
        <div class="form-outline ">
          <input type="search" id="form1" class="form-control p-2 " />
          <label class="form-label" for="form1">Search</label>
        </div>
        <button type="button" class="btn btn-primary">
         Shope now
        </button>
      </div>
  </div>


  <div class="container mt-5">

    <div class="card-group">
        <div class="card">
          <img src="https://preview.colorlib.com/theme/estore/assets/img/gallery/xgallery1.jpg.pagespeed.ic.mRum_SCVP_.webp" class="card-img-top" alt="Hollywood Sign on The Hill"/>


        </div>
        <div class="card">
          <img src="https://preview.colorlib.com/theme/estore/assets/img/gallery/xgallery2.jpg.pagespeed.ic.GtSiUs1tb3.webp" class="card-img-top" alt="Palm Springs Road"/>


        </div>
        <div class="card">
          <img src="https://preview.colorlib.com/theme/estore/assets/img/gallery/xgallery3.jpg.pagespeed.ic.tWI_VtRMni.webp" class="card-img-top" alt="Los Angeles Skyscrapers"/>


        </div>
        <div class="card">
            <img src="https://preview.colorlib.com/theme/estore/assets/img/gallery/xgallery4.jpg.pagespeed.ic.Men8FVEW1X.webp" class="card-img-top" alt="Hollywood Sign on The Hill"/>


          </div>
          <div class="card">
            <img src="https://preview.colorlib.com/theme/estore/assets/img/gallery/xgallery5.jpg.pagespeed.ic.cK5777QVa3.webp" class="card-img-top" alt="Palm Springs Road"/>


          </div>

      </div>
  </div>


  <!-- Tabs content -->
@endsection
