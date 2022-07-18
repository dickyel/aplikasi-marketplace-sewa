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
      <h2 class="dashboard-title">Akun Saya</h2>
      <p class="dashboard-subtitle">
        Update Profil Kamu dengan cepat
      </p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
          <form action="{{ route('dashboard-settings-redirect', 'dashboard-settings-account') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
              <div class="card-body">
                <div class="row mb-2">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label >Nama Kamu</label>
                      <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        value="{{ $user->name }}"
                      />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Email Kamu</label>
                      <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        value="{{ $user->email }}"
                      />
                    </div>
                  </div>
  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Alamat Pemilik Toko</label>
                      <textarea
                        name="owner_address"
                        id=""
                        cols="30"
                        rows="4"
                        class="form-control"
                        
                      >
                      {{ $user->owner_address }}
                      </textarea>
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nomor Handphone</label>
                      <input
                        type="text"
                        class="form-control"
                        name="owner_phone"
                        value="{{ $user->owner_phone }}"
                      />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tambahkan Username</label>
                      <input
                        type="text"
                        class="form-control"
                        name="username"
                        value="{{ $user->username }}"
                      />
                    </div>
                  </div>
                </div>
                <div class="row">
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
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection