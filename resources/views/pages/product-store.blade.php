@extends('layouts.app')

@section('title')
    Swa Mobile Store Rentals
@endsection

@section('content')
<!-- Page Content -->
<div class="page-content page-details">
  <section
    class="store-breadcrumbs"
    data-aos="fade-down"
    data-aos-delay="100"
  >
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Beranda</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Produk Toko
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
    <section class="store-new-products">
    
      <div class="container">
        <div class="row">
          <div class="col-12" data-aos="fade-up">
            <h5>Semua Produk</h5>
          </div>
        </div>
        <div class="row">
          <div
          class="col-6 col-md-4 col-lg-3"
          data-aos="fade-up"
          data-aos-delay="100"
          >
              <a href="" class="component-products d-block">
                  <div class="products-thumbnail">
                      <div
                      class="products-image"
                      style="
                              background-image: url('');
                      "
                      ></div>
                  </div>
                  <div class="products-text">
                    
                  </div>
                  <div class="owner">
                    
                  </div>
                  <div class="products-price">
                      
                  </div>
                  <div class="products-price">
                      
                  </div>
              </a>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection