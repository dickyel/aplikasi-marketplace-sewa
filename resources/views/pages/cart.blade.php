@extends('layouts.app')

@section('title')
    Swa Mobile Cart
@endsection

@push('addon-style')
 
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet" />
@endpush

@section('content')
<div class="page-content page-cart">
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
                Keranjang
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <section class="store-cart">
    <div class="container">
      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-12 table-responsive">
          <table
            class="table table-borderless table-cart"
            aria-describedby="Cart"
          >
            <thead>
              <tr>
                <th scope="col">Gambar</th>
                <th scope="col">Nama &amp; Toko</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah Hari</th>
                <th scope="col">Menu</th>
              </tr>
            </thead>
            <tbody>
              @php $totalPrice = 0 @endphp
              
              @php $totalDay =  0 @endphp
              
              @foreach($carts as $cart)
                <tr>
                  <td style="width: 16%;">
                  @if($cart->product->galleries)
                    <img
                      src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                      alt=""
                      class="cart-image"
                    />
                  @endif
                  </td>
                  <td style="width: 20%;">
                    <div class="product-title">{{ $cart->product->name }}</div>
                    <div class="product-subtitle">by {{ $cart->product->user->store_name }} </div>
                  </td>
                  <td style="width: 16%;">
                    <div class="product-title">Rp.{{ number_format($cart->product->price) }}</div>
                    <div class="product-subtitle">Rupiah</div>
                  </td>
                  <td style="width: 20%;">
                    <div class="product-title">{{ number_format($cart->product->day) }}</div>
                    <div class="product-subtitle">Hari</div>
                  </td>
                  <td style="width: 20%;">
                    <form action="{{ route('cart-delete', $cart->id) }}" method="post">
                      @method('DELETE')
                      @csrf
                      <button href="#" class="btn btn-remove-cart">
                        Hapus
                      </button>
                    </form>
                  </td>
                </tr>
                @php $totalPrice += $cart->product->price @endphp
                
                @php $totalDay = $cart->product->day @endphp
                
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="row" data-aos="fade-up" data-aos-delay="150">
        <div class="col-12">
          <hr />
        </div>
        <div class="col-12">
          <h2 class="mb-4">Isi Form Di Bawah Ini</h2>
        </div>
      </div> 
      <form action="{{ route('checkout') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="total_price" value="{{ $totalPrice }}">
        <input type="hidden" name="day_total" value="{{ $totalDay }}">
        <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
          <div class="col-md-6">
              <div class="form-group">
                <label for="full_name">Nama Lengkap</label>
                <input
                  type="text"
                  class="form-control"
                  id="full_name"   
                  name="full_name"
                  value=""
                  required
                />
              </div>
          </div>
        
          <div class="col-md-6">
            <div class="form-group">
              <label for="phone_numbe">Nomor Telepon</label>
              <input
                type="text"
                class="form-control"
                id="phone_number"
                name="phone_number"
                value="Blok B2 No. 34"
              />
            </div>
          </div>
        
          <div class="col-md-6">
            <div class="form-group">
              <label for="booking_first" >Mulai Tanggal Booking</label>
              <div class="input-group date datepicker" >
                <input type="text"
                  name="booking_first"
                  class="form-control"
                  id="booking_first"
                  >
                  <span class="input-group-append">
                    <span class="input-group-text bg-light d-block">
                      <i class="fa fa-calendar"></i>
                    </span>
                  </span>
              </div>
            
            </div>
          </div>
    
          <div class="col-md-6">
            <div class="form-group">
              <label for="booking_last">Pilih Tanggal Dikembalikan</label>
              <div class="input-group date datepicker" >
                <input type="text"
                  name="booking_last"
                  class="form-control"
                  id="booking_last"
                  >
                  <span class="input-group-append">
                    <span class="input-group-text bg-light d-block">
                      <i class="fa fa-calendar"></i>
                    </span>
                  </span>
              </div>
            </div>
          </div>
        
          <div class="col-md-6">
            <div class="form-group">
              <label for="address">Isi Alamat</label>
              <textarea
                    name="address"
                    id="address"
                    cols="30"
                    rows="6"
                    class="form-control"
                  >
              </textarea>
            </div>
          </div>
            

          <div class="col-md-6">
            <div class="form-group">
              <label for="ktp_photo">Upload Gambar KTP</label>
              <input
                type="file"
                multiple
                class="form-control pt-1"
                id="ktp_photo"
                name="ktp_photo"
              />
              <small class="text-muted">
                Ukuran Harus kurang dari 2 mb
              </small>
            </div>
            <div class="form-group">
              <label for="selfie_photo">Upload Gambar Selfie</label>
              <input
                type="file"
                multiple
                class="form-control pt-1"
                id="selfie_photo"
                
                name="selfie_photo"
              />
              <small class="text-muted">
                Ukuran Harus 2 mb
              </small>
            </div>
          </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="150">
        <div class="col-12">
          <hr />
        </div>
        <div class="col-12">
          <h2>Informasi Lengkapnya</h2>
        </div>
      </div>
      <div class="row" data-aos="fade-up" data-aos-delay="200">
        
        <div class="col-4 col-md-3">
          <div class="product-title">{{ number_format($totalDay)  }}  Hari </div>
          <div class="product-subtitle">Jumlah Hari </div>
        </div>
        <div class="col-4 col-md-3">
          <div class="product-title text-success">Rp. {{ number_format($totalPrice ?? 0) }}</div>
          <div class="product-subtitle">Total Harga</div>
        </div>
        <div class="col-8 col-md-3">
          <button
            type="submit"
            class="btn btn-success mt-4 px-4 btn-block"
          >
            Booking Sekarang
          </button>
        </div>
      </div>
        
      </form>
    </div>
      
      
    
  </section>
</div>
@endsection

@push('addon-script')

  <script src="/vendor/vue/vue.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

  <script>
      
      $(function(){
        $('.datepicker').datepicker({
          format: 'yyyy-mm-dd'
        });
      });
  </script>
@endpush

