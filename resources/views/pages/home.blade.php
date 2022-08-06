@extends('layouts.app')

@section('title')
    Swa Mobile Beranda
@endsection

@section('content')
<div class="page-content page-home">
  <!--  kode untuk form pencarian -->
  <div class="container">
    
      <div class="row justify-content">
        <div class="col-md-6">
          <form class="form" method="GET" action='/'>
            <div class="form-group w-100 mb-3">
                
                <input type="text" name="keyword" class="form-control w-75 d-inline" id="keyword" placeholder="Ketikkan sesuatu" value="{{ request('keyword') }}">
                <button type="submit" class="btn btn-primary mb-1">Cari</button>
            </div>
          </form>
        </div>
        
      </div>
    
  </div>

  <section class="store-carousel">
    <div class="container">
      <div class="row">
        <div class="col-lg-12" >
          <div
            id="storeCarousel"
            class="carousel slide"
            data-ride="carousel"
          >
            <ol class="carousel-indicators">
              <li
                data-target="#storeCarousel"
                data-slide-to="0"
                class="active"
              ></li>
              <li data-target="#storeCarousel" data-slide-to="1"></li>
              <li data-target="#storeCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img
                  src="/images/banner.jpg"
                  class="d-block w-100"
                  alt="Carousel Image"
                />
              </div>
              <div class="carousel-item">
                <img
                  src="/images/banner.jpg"
                  class="d-block w-100"
                  alt="Carousel Image"
                />
              </div>
              <div class="carousel-item">
                <img
                  src="/images/banner.jpg"
                  class="d-block w-100"
                  alt="Carousel Image"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="store-trend-categories">
    <div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-up">
          <h5>Rekomendasi Produk</h5>
        </div>
      </div>
      <div class="row">
        <div
          class="col-6 col-md-3 col-lg-2"
          data-aos="fade-up"
          data-aos-delay="100"
        >
          <a class="component-categories d-block" href="{{ route('recommendation-store') }}">
            <div class="categories-image">
              <img
                src="/rating.svg"
                alt="Gadgets Categories"
                class="w-100"
              />
            </div>
            <p class="categories-text">
              Rating
            </p>
          </a>
        </div>
        
      </div>
    </div>
  </section>
  <section class="store-new-products">
    <div class="container">
        <div class="row">
            <div class="col-6" data-aos="fade-up">
                <h5>Produk Terbaru</h5>
            </div>
            <div class="col-6" data-aos="fade-up">
              
              
            </div> 
        </div>
        <div class="row">
            @php $incrementProduct = 0 @endphp
            @if(!empty($products) && $products->count())
              @foreach ($products as $product)
                  <div
                  class="col-6 col-md-4 col-lg-3"
                  data-aos="fade-up"
                  data-aos-delay="{{  $incrementProduct += 50 }}"
                  >
                      <a href="{{ route('detail-product', $product->slug) }}" class="component-products d-block">
                          <div class="products-thumbnail">
                              <div
                              class="products-image"
                              style="
                                  @if($product->galleries->count() > 0 )
                                      background-image: url('{{ Storage::url($product->galleries->first()->photos) }}');
                                  @else
                                      background-color: #eee;
                                  @endif
                              "
                              ></div>
                          </div>
                          <div class="products-text">
                            {{  $product->user->store_name }}
                          </div>
                          <div class="products-text">------------------------</div>
                          

                          <div class="products-text">
                            {{  $product->name }}
                          </div>
                      
                          <div>
                          <h6>{{ $product->category->name }}</h6>
                          </div>
                    
                          <div class="products-price">
                              Rp.{{ $product->price }}
                          </div>
                          <div class="products-price">
                              {{ $product->day }} Hari
                          </div>
                      </a>
                  </div>
              @endforeach
            @else
                <div
                  class="col-12 text-center py-5"
                  data-aos="fade-up"
                  data-aos-delay="100"
                >
                  Tidak ada produk terbaru
                </div>
            @endif
        </div><br><br>
        {!! $products->appends(Request::all())->links() !!}
    </div>
  </section>
</div>
@endsection