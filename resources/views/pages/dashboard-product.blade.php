@extends('layouts.dashboard')

@section('title')
    Dashboard Produk
@endsection

@section('content')
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
>
    <div class="container-fluid">
        <div class="dashboard-heading">
        <h2 class="dashboard-title">Produk Saya</h2>
        <p class="dashboard-subtitle">
            Atur Semuanya dan dapatkan cuan
        </p>
        </div>
        <div class="dashboard-content">
        <div class="row">
            <div class="col-12">
            <a
                href="{{ route('dashboard-product-create') }}"
                class="btn btn-success"
                >Tambah Produk Baru</a
            >
            </div>
        </div>
        <div class="row mt-4">
            @foreach($products as $product)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a
                    class="card card-dashboard-product d-block"
                    href="{{ route('dashboard-product-details', $product->id) }}"
                    >
                        <div class="card-body">
                            <img
                            src="{{ Storage::url($product->galleries->first()->photos ?? '') }}"
                            alt=""
                            class="w-100 mb-2"
                            />
                            <div class="product-title">{{ $product->name }}</div>
                            <div class="product-category">{{ $product->category->name }}</div>
                            <div class="product-category">{{ $product->day }} Hari</div>
                            <div class="product-category">Rp. {{ $product->price }}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        </div>
    </div>
</div>
@endsection