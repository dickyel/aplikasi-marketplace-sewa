@extends('layouts.app')

@section('title')
    Swa Mobile Toko Sewa
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
        @if(!empty($users) && $users->count())
          @foreach($users as $user) 
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
                  >
                  </div>
                </div>
                <div class="products-text">
                  {{$user->store_name}}
                </div>
                <div class="owner">
                  
                </div>
                
              </a>
            </div>
          @endforeach  
        @else
          <div 
            class="col-12 text-center py-5" 
            data-aos="fade-up"
            data-aos-delay="100">
              Tidak ada Toko
          </div>
        @endif
      </div><br>
      {!! $users->appends(Request::all())->links() !!}
    </div>
  </section>
</div>
@endsection