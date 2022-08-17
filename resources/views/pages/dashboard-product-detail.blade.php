@extends('layouts.dashboard')

@section('title')
    Dashboard Produk Detail
@endsection

@section('content')
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title"></h2>
        <p class="dashboard-subtitle">
          Detail Produk
        </p>
      </div>
      <div class="dashboard-content">
        <div class="row">
          <div class="col-12">
            @if($errors->any())
              <div class="alert-danger">
                  <ul>
                      @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>    
              </div>
            @endif
            <form action="{{ route('dashboard-product-update', $product->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="users_id" value="{{ Auth::user()->id }}" >
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Produk</label>
                        <input
                          type="text"
                          class="form-control"
                          id="name"
                         
                          name="name"
                          value="{{ $product->name }}"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Harga</label>
                        <input
                          type="number"
                          class="form-control"
                          id="price"
                          name="price"
                          value="{{ $product->price }}"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Hari</label>
                        <input
                          type="number"
                          class="form-control"
                          id="day"
                          
                          name="day"
                          value="{{ $product->day }}"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Kategori Produk</label>
                          <select name="categories_id" class="form-control">
                          <option value="{{ $product->categories_id  }}">Tidak Diganti ({{ $product->category->name }})</option>
                          @foreach ($categories as $categories)
                            <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Deskripsi</label>
                        <textarea
                          name="description"
                          id=""
                          cols="30"
                          rows="4"
                          class="form-control"
                          value="{{ $product->description }}"
                        >
                        {!! $product->description !!}
                        </textarea>
                      </div>
                    </div>
                    <div class="col">
                      <button
                        type="submit"
                        class="btn btn-success btn-block px-5"
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
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                @foreach ($product->galleries as $gallery)
                  <div class="col-md-4">
                    <div class="gallery-container">
                      <img
                        src="{{ Storage::url($gallery->photos ?? '') }}"
                        alt=""
                        class="w-100"
                      />
                      <a href="{{ route('dashboard-product-gallery-delete', $gallery->id) }}" class="delete-gallery">
                        <img src="/images/icon-delete.svg" alt="" />
                      </a>
                    </div>
                  </div>
                @endforeach
                <div class="col-12">
                  <form action="{{ route('dashboard-product-gallery-upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $product->id }}" name="products_id">
                    <input
                      type="file"
                      name="photos"
                      id="file"
                      style="display: none;"
                      multiple
                      onchange="form.submit()"
                    />
                    <button
                      type="button"
                      class="btn btn-secondary btn-block mt-3"
                      onclick="thisFileUpload()"
                    >
                      Tambah Foto
                    </button>
                  </form>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@push('addon-script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  <script>
    function thisFileUpload() {
      document.getElementById("file").click();
    }
  </script>
  <script>
    CKEDITOR.replace("editor");
</script>
@endpush