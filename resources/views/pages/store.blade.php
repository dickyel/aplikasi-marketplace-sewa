@extends('layouts.app')

@section('title')
    Swa Mobile Store Rentals
@endsection

@section('content')
<!-- Page Content -->
<div class="page-content page-categories">
 
  <section class="store-new-products">
    <div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-up">
          <h5>Semua Toko Sewa</h5>
        </div>
      </div>
      <div class="row">
        @php $incrementUser = 0 @endphp
        @forelse($users as $user) 
          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="$incrementUser+= 100"
          >
            <a class="component-products d-block" href="{{ route('detail-store', $user->store_name) }}">
              <div class="products-thumbnail">
                <div
                  class="products-image"
                  style="
                    background-image: url('{{ Storage::url($user->logo_store) }}');
                  "
                ></div>
              </div>
              <div class="products-text">
                {{$user->store_name}}
              </div>
            
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
            </a>
          </div>
        @empty
          <div 
            class="col-12 text-center py-5" 
            data-aos="fade-up"
            data-aos-delay="100">
              Tidak ada kategori
          </div>
        @endforelse
      </div>
    </div>
  </section>
</div>
@endsection