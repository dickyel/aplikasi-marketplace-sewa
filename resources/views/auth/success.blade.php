@extends('layouts.success')

@section('title')
    Swa Mobile success
@endsection

@section('content')
    <div class="page-content page-success">
      <div class="section-success" data-aos="zoom-in">
        <div class="container">
          <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="/images/success.svg" alt="" class="mb-4" />
              <h2>
                Booking Kamu Berhasil Masuk!
              </h2>
              <p>
                Silahkan datang ke toko kami sesuai jadwal booking barang, <br/>
                kami akan menginformasikan resi secepat mungkin via dashboard anda, <br/>
                dan perlihatkan resi yang masuk kepada pemilik toko....
              </p>
              <div>
                <a class="btn btn-success w-50 mt-4" href="{{ route('dashboard') }}">
                   Dashboard Saya
                </a>
                <a class="btn btn-signup w-50 mt-2" href="{{ route('home') }}">
                  Pergi Booking
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection