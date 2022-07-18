@extends('layouts.dashboard')

@section('title')
    Swa Mobile Dashboard Account Settings
@endsection

@section('content')
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Upload File Tambahan</h2>
      <p class="dashboard-subtitle">
        Update file tambahan untuk dapat dipercaya
      </p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
          
          <form action="{{ route('dashboard-upload-update', 'dashboard-upload' ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
            <div class="card">
              <div class="card-body">
                <div class="row mb-2">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label >Tambahkan Foto KTP</label>
                      <input
                        type="file"
                        class="form-control"
                        id="ktp_photo"
                        name="ktp_photo"
                        
                      />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tambahkan Foto Selfie</label>
                      <input
                        type="file"
                        class="form-control"
                        id="selfie_photo"
                        name="selfie_photo"
                        
                      />
                    </div>
                  </div>
                  
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tambahkan Logo Toko</label>
                      <input
                        type="file"
                        class="form-control"
                        name="logo_store"
                        id="logo_store"
                      />
                    </div>
                  </div>

              
                  <div class="col text-right">
                    <button
                      type="submit"
                      class="btn btn-success px-5"
                    >
                      Simpan Sekarang
                    </button>
                    
                  </div>
                
              </div>
            </div>
          </form>
        </div>
      </div>
    </div><br>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
           
            <div class="row mb-2">
              @foreach($users as $user)  
              <div class="col-md-4">
                <div class="product-title">Foto KTP</div>
                <img
                  src="{{ Storage::url($user->ktp_photo ?? '') }}"
                  alt=""
                  class="w-100 mb-2"
                />
              </div>
              @endforeach
            
              @foreach($users as $user)
              <div class="col-md-4">
                <div class="product-title">Foto Selfie</div>
                <img
                  src="{{ Storage::url($user->selfie_photo ?? '') }}"
                  alt=""
                  class="w-100 mb-2"
                />

              </div>
              @endforeach

              @foreach($users as $user)
              <div class="col-md-4">
                <div class="product-title">Logo</div>
                <img
                  src="{{ Storage::url($user->logo_store ?? '') }}"
                  alt=""
                  class="w-100 mb-2"
                />
              </div>
              @endforeach
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection