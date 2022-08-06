@extends('layouts.auth')

@section('content')

<!-- Page Content -->
    <div class="page-content page-auth mt-5" id="register">
      <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4">
              <h2>
                Buat Toko Sewa, <br />
                dengan cara terbaru
              </h2>
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input
                    v-model="name"  
                    id="name"
                    type="text" 
                    class="form-control @error('name') is-invalid @enderror" 
                    name="name" 
                    value="{{ old('name') }}" 
                    required 
                    autocomplete="name" 
                    autofocus>

                    @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input
                    v-model="email" 
                    id="email"
                    @change="checkEmail()" 
                    type="email" 
                    class="form-control @error('email') is-invalid @enderror"
                    :class="{ 'is-invalid' : this.email_unavailable }"
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autocomplete="email">

                    @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input 
                    id="password" 
                    type="password" 
                    class="form-control @error('password') is-invalid @enderror" 
                    name="password" 
                    required 
                    autocomplete="new-password">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Konfirmasi Password</label>
                  <input 
                    id="password-confirm" 
                    type="password"
                    name="password_confirmation"  
                    class="form-control @error('password_confirmation') is-invalid @enderror" 
                    required 
                    autocomplete="new-password">

                  @error('password_confirmation')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Toko Sewa</label>
                  <p class="text-muted">
                    Apakah anda juga ingin membuka toko?
                  </p>
                  <div
                    class="custom-control custom-radio custom-control-inline"
                  >
                    <input
                      type="radio"
                      class="custom-control-input"
                      name="is_store_open"
                      id="openStoreTrue"
                      v-model="is_store_open"
                      :value="true"
                    />
                    <label class="custom-control-label" for="openStoreTrue"
                      >Iya, boleh</label
                    >
                  </div>
                  <div
                    class="custom-control custom-radio custom-control-inline"
                  >
                    <input
                      class="custom-control-input"
                      type="radio"
                      name="is_store_open"
                      id="openStoreFalse"
                      v-model="is_store_open"
                      :value="false"
                    />
                    <label
                      class="custom-control-label"
                      for="openStoreFalse"
                    >
                      Tidak, makasih
                    </label>
                    
                  </div>
                </div>
                <!-- form buat toko sewa -->
                <!-- nama toko -->
                <div class="form-group" v-if="is_store_open">
                  <label>Nama Toko Sewa</label>
                  <input
                    v-model="store_name"
                    id="store_name"
                    type="text"
                    class="form-control @error('store_name') is-invalid @enderror"
                    name="store_name"
                    value="{{ old('store_name') }}"
                    required 
                    autocomplete
                    autofocus 
                  >
                  @error('store_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  
                </div>
                <!-- kategori -->
                <div class="form-group" v-if="is_store_open">
                  <label>Kategori</label>
                  <select name="category" class="form-control">
                      <option value="" disabled>Pilih Kategori</option>
                      @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                  </select>
                </div>
                <!-- Nomor Telpon Owner-->
                <div class="form-group" v-if="is_store_open">
                  <label>Nomor Telepon Pemilik Toko</label>
                  <input
                    type="text"
                    v-model="owner_phone"
                    id="owner_phone"
                    class="form-control @error('owner_phone') is-invalid @enderror"
                    name="owner_phone"
                    value="{{ old('owner_phone') }}"
                    required 
                    autocomplete
                    autofocus
                  >
                  @error('owner_phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <!-- Nomor Telpon Toko-->
                <div class="form-group" v-if="is_store_open">
                  <label>Nomor Telepon Toko</label>
                  <input
                    type="text"
                    v-model="store_phone"
                    id="store_phone"
                    class="form-control @error('store_phone') is-invalid @enderror"
                    name="store_phone"
                    value="{{ old('store_phone') }}"
                    required 
                    autocomplete
                    autofocus
                  >
                  @error('store_phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <!-- Url Maps Sewa -->
                <div class="form-group" v-if="is_store_open">
                  <label>Url Maps Toko Sewa(Google Maps)</label>
                  <input
                    type="text"
                    v-model="maps_store"
                    id="maps_store"
                    
                    class="form-control @error('maps_store') is-invalid @enderror"
                    name="maps_store"
                    value="{{ old('maps_store') }}"
                    required
                    autocomplete
                    autofocus
                  >
                  @error('maps_store')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                 
                <!-- alamat -->
                <div class="form-group" v-if="is_store_open">
                  <label for="store_address">Alamat Toko</label>
                  <textarea
                    name="store_address"
                    v-model="store_address"
                    id="store_address"
                    cols="30"
                    rows="4"
                    class="form-control @error('store_address') is-invalid @enderror"
                    value="{{ old('store_address') }}"
                    required
                    autocomplete
                    autofocus
                  >
                  </textarea>
                </div>
                
                <button type="submit" class="btn btn-success btn-block mt-4"
                :disabled="this.email_unavailable"
                >
                  Register Sekarang
                </button>
                <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-2">
                  Kembali Login
                </a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection

@push('addon-script')
    <!-- <script src="/vendor/vue/vue.js"></script> -->
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      Vue.use(Toasted);

      var register = new Vue({
        el: "#register",
        mounted() {
          AOS.init();
          
        },
        methods: {
            checkEmail: function () {
                var self = this;
                axios.get('{{ route("api-register-check") }}', {
                        params: {
                            email: this.email
                        }
                    }).then(function (response) {
                        if(response.data == 'Available') {
                            self.$toasted.show(
                                "Email anda tersedia! Silahkan lanjut langkah selanjutnya!", {
                                    position: "top-center",
                                    className: "rounded",
                                    duration: 1000,
                                }
                            );
                            self.email_unavailable = false;
                        } else {
                            self.$toasted.error(
                                "Maaf, tampaknya email sudah terdaftar pada sistem kami.", {
                                    position: "top-center",
                                    className: "rounded",
                                    duration: 1000,
                                }
                            );
                            self.email_unavailable = true;
                        }
                        // handle success
                        console.log(response.data);
                    })
            }
        },
        data() {
          return {
            name: "",
            email: "",
            email_unavailable: false,
            is_store_open: true,
            store_name: "",
            owner_phone: "",
            store_phone: "",
            maps_store: "",
            store_address: "",
            // logo_store: "",
            // ktp_photo: "",
            // selfie_photo: "",
          }
        },
      });
    </script>
@endpush
