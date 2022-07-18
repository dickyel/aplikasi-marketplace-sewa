@extends('layouts.app')

@section('title')
    Swa Mobile Detail Toko
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
                Detail Toko Sewa
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <section class="store-gallery" id="gallery">
    <div class="container">
      <div class="row">
        <img
          src="{{ Storage::url($user->logo_store ?? '' ) }}"
          alt=""
          class="col-md-6 "
        />
        <div class="col-md-3">
          <a
          class="btn btn-success nav-link px-4 text-white btn-block mb-3 "
          href="http://{{$user->store_phone}}"
          >Lihat Alamat Di Maps</a>
          <a
            class="btn btn-success nav-link px-4 text-white btn-block mb-3"
            href="https://api.whatsapp.com/send?phone=+62$user->store_phone&text=Hello"
          >Hubungi Toko
        </a>
          
        </div>
        
        
      </div>
            
    </div>
  </section>

  <div class="store-details-container" data-aos="fade-up">
    <section class="store-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <h1>{{ $user->store_name }}</h1>
            <div class="owner">By. {{ $user->name }}</div>
            <div class="rating-user">
              <div class="star-icon">
                <input type="radio" name="rating1" id="rating1">
                <label for="rating1" class="fa fa-star"></label>
                <input type="radio" name="rating2" id="rating2">
                <label for="rating2" class="fa fa-star"></label>
                <input type="radio" name="rating3" id="rating3">
                <label for="rating3" class="fa fa-star"></label>
                <input type="radio" name="rating4" id="rating4">
                <label for="rating4" class="fa fa-star"></label>
                <input type="radio" name="rating5" id="rating5">
                <label for="rating5" class="fa fa-star"></label>
              </div>
              <div class="owner">
                5.0/5.0
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>

    
    <section class="store-description">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-8">
            {{ $user->store_description }}
          </div>
        </div>
      </div>
    </section>

    
  </div>

  <section class="store-new-products">
    <div class="container">
        <div class="row">
            <div class="col-12" data-aos="fade-up">
                <h5>Produk Toko</h5>
            </div>
        </div>
        <br>
        
        <div class="row">
          @php $incrementProduct = 0 @endphp
          @forelse($products as $product)
            <div
              class="col-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-delay="{{  $incrementProduct += 100 }}"
            >
              <a href="{{ route('detail-product', $product->slug) }}" class="component-products d-block">
                <div class="products-thumbnail">
                  <div class="products-image" style="
                       @if($product->galleries->count() > 0 )
                          background-image: url('{{ Storage::url($product->galleries->first()->photos) }}');
                      @else
                          background-color: #eee;
                      @endif
                    
                    ">
                  </div>
                </div>
                <div class="products-text">
                {{  $product->name }}        
                </div>
                <div>
                  Oleh.{{ $product->user->store_name }}
                </div>
                <div class="products-price">
                  Rp.  Rp.{{ $product->price }}
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

@push('addon-script')

  <script src="/vendor/vue/vue.js"></script>
    
@endpush
