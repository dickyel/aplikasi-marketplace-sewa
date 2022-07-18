@extends('layouts.app')

@section('title')
    Swa Mobile Detail Product
@endsection

@section('content')
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
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                 Detail Produk
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <section class="store-gallery mb-3" id="gallery">
    <div class="container">
      <div class="row">
        <div class="col-lg-8" data-aos="zoom-in">
          <transition name="slide-fade" mode="out-in">
            <img
              :key="photos[activePhoto].id"
              :src="photos[activePhoto].url"
              class="w-100 main-image"
              alt=""
            />
          </transition>
        </div>
        <div class="col-lg-2">
          <div class="row">
            <div
              class="col-3 col-lg-12 mt-2 mt-lg-0"
              v-for="(photo, index) in photos"
              :key="photo.id"
              data-aos="zoom-in"
              data-aos-delay="100"
            >
              <a href="#" @click="changeActive(index)">
                <img
                  :src="photo.url"
                  class="w-100 thumbnail-image"
                  :class="{ active: index == activePhoto }"
                  alt=""
                />
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="store-details-container" data-aos="fade-up">
    <section class="store-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <h1>{{ $product->name }}</h1>
            <div class="owner">By {{ $product->user->store_name }}</div>
            <div class="price">Rp. {{ number_format($product->price) }}</div>
            <div class="price">{{ $product->day }} Hari</div>
          </div>
          <div class="col-lg-2" data-aos="zoom-in">
            @auth
              <form action="{{ route('detail-product-add', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <button
                type="submit"
                  class="btn btn-success nav-link px-4 text-white btn-block mb-3"
                  href="/cart.html"
                  >Tambahkan Ke Transaksi
                </button>
              </form>
            @else
              <a
                class="btn btn-success nav-link px-4 text-white btn-block mb-3"
                href="{{ route('login') }}"
                >Login Ke Akun Kamu
              </a>
            @endauth

            
          </div>
        </div>
      </div>
    </section>
    <section class="store-description">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-8">
            {!! $product->description !!}
          </div>
        </div>
      </div>
    </section>
    <section class="store-review">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-8 mt-3">
            <h3>Tinggalkan Review & Komentar</h3>
            <p>Gunakan Bahasa yang sopan dan santun</p>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-lg-8 mb-3">

            <ul class="list-unstyled">
            @auth
                    <form action="{{ route('detail-product-comment') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <input type="hidden" name="products_id" value="{{ $product->id }}">
                      <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                      <li class="media">

                        <div class="form-group">
                          <label>Pilih Rating Kamu</label>
                          <select name="rating" class="form-control">
                            <option value="5">
                              <div class="star-icon">
                                
                                <label class="fa fa-star">☆</label>
                                <label class="fa fa-star">☆</label>
                                <label class="fa fa-star">☆</label>
                                <label class="fa fa-star">☆</label>
                                <label class="fa fa-star">☆</label>
                                
                              </div>
                            </option>
                            <option value="4">
                              <div class="star-icon">
                                
                                <label class="fa fa-star">☆</label>
                                <label class="fa fa-star">☆</label>
                                <label class="fa fa-star">☆</label>
                                <label class="fa fa-star">☆</label>
                              
                                
                              </div>
                            </option>
                            <option value="3">
                              <div class="star-icon">
                                
                                <label class="fa fa-star">☆</label>
                                <label class="fa fa-star">☆</label>
                                <label class="fa fa-star">☆</label>
                                
                                
                              </div>
                            </option>
                            <option value="2">
                              <div class="star-icon">
                                
                                <label class="fa fa-star">☆</label>
                                <label class="fa fa-star">☆</label>
                                
                                
                              </div>
                            </option>
                            <option value="1">
                              <div class="star-icon">
                                
                                <label class="fa fa-star">☆</label>
                                
                              </div>
                            </option>
                          </select>
                        </div>               
                      
                      </li>
                    
                      <div class="form-group" >
                        <label>Tulis Pesan</label>
                        <textarea
                          name="message"
                          id="message"
                          cols="30"
                          rows="8"
                          class="form-control"
                        >

                        </textarea>
                      </div>
                  
                      <button type="submit" class="btn btn-success btn-block mt-4">
                        Kirim
                      </button>
                    </form>
                  @endauth 
                 
              
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="store-review">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-8 mt-3 mb-3">
            <h5>Review Pelanggan </h5>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-lg-8">
            <ul class="list-unstyled">
            
                @if( count($comment) > 0 )
                  @foreach ($comment as $item)
                  <li class="media">
                    <img
                      src="{{ $item->user->profile_photo_path ?? 'https://ui-avatars.com/api/?name=' . $item->user->name }}"
                      class="mr-3 rounded-circle"
                      alt=""
                    />
                    <div class="media-body">
                      <h5 class="mt-2">{{ $item->user->name }}</h5>
                      <div class="rating-user">
                        @if($item->rating == 5)

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
                        @elseif($item->rating == 4)
                          <div class="star-icon">
                            <input type="radio" name="rating1" id="rating1">
                            <label for="rating1" class="fa fa-star"></label>
                            <input type="radio" name="rating2" id="rating2">
                            <label for="rating2" class="fa fa-star"></label>
                            <input type="radio" name="rating3" id="rating3">
                            <label for="rating3" class="fa fa-star"></label>
                            <input type="radio" name="rating4" id="rating4">
                            <label for="rating4" class="fa fa-star"></label>
                            
                            
                          </div>
                        @elseif($item->rating == 3)
                          <div class="star-icon">
                            <input type="radio" name="rating1" id="rating1">
                            <label for="rating1" class="fa fa-star"></label>
                            <input type="radio" name="rating2" id="rating2">
                            <label for="rating2" class="fa fa-star"></label>
                            <input type="radio" name="rating3" id="rating3">
                            <label for="rating3" class="fa fa-star"></label>
                            
                          </div>
                          @elseif($item->rating == 2)
                            <div class="star-icon">
                              <input type="radio" name="rating1" id="rating1">
                              <label for="rating1" class="fa fa-star"></label>
                              <input type="radio" name="rating2" id="rating2">
                              <label for="rating2" class="fa fa-star"></label>
                            </div>
                          @elseif($item->rating == 1)
                            <div class="star-icon">
                              <input type="radio" name="rating1" id="rating1">
                              <label for="rating1" class="fa fa-star"></label>
                            </div>
                        @endif
                        <p>
                        {{ $item->message }}
                        </p>
                        
                    </div>
                  </li>
                  @endforeach
                @else
                  <ul class="list-unstyled">
                    <li class="media">
                    Belum Ada Comentar
                      
                    </li>
                  </ul>
                @endif
              
                  
                
            </ul>
          </div>
        </div>
      </div>
    </section>
    
  </div>
</div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
      var gallery = new Vue({
        el: "#gallery",
        mounted() {
          AOS.init();
        },
        data: {
          activePhoto: 0,
          photos: [
            @foreach ($product->galleries as $gallery)
            {
              id: {{ $gallery->id }},
              url: "{{ Storage::url($gallery->photos) }}",
            },
            @endforeach 
          ],
        },
        methods: {
          changeActive(id) {
            this.activePhoto = id;
          },
        },
      });
    </script>
@endpush