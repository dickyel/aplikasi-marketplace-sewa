@extends('layouts.app')

@section('title')
    Swa Mobile Homepage
@endsection

@section('content')
<div class="page-content page-home">
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
          <h5>Rekomendasi Toko</h5>
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
        <div
          class="col-6 col-md-3 col-lg-2"
          data-aos="fade-up"
          data-aos-delay="200"
        >
          <a class="component-categories d-block" href="#">
            <div class="categories-image">
              <img
                src="/transaction.svg"
                alt="Furniture Categories"
                class="w-100"
              />
            </div>
            <p class="categories-text">
              Transaction
            </p>
          </a>
        </div>
      </div>
    </div>
  </section>
  <section class="store-new-products">
    <div class="container">
        <div class="row">
            <div class="col-12" data-aos="fade-up">
                <h5>Produk Terbaru</h5>
            </div>
        </div>
        <div class="row">
            @php $incrementProduct = 0 @endphp
            @forelse ($products as $product)
                <div
                class="col-6 col-md-4 col-lg-3"
                data-aos="fade-up"
                data-aos-delay="{{  $incrementProduct += 100 }}"
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
                          {{  $product->name }}
                        </div>
                        <div>
                          Oleh. {{  $product->user->store_name }}
                        </div>
                        <div class="products-price">
                            Rp.{{ $product->price }}
                        </div>
                        <div class="products-price">
                            {{ $product->day }} Hari
                        </div>
                    </a>
                </div>
            @empty
                <div
                  class="col-12 text-center py-5"
                  data-aos="fade-up"
                  data-aos-delay="100"
                >
                  Tidak ada produk terbaru
                </div>
            @endforelse
        </div>
    </div>
  </section>
</div>
@endsection