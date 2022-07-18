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
        <h2 class="dashboard-title">Tambah Produk Baru</h2>
        <p class="dashboard-subtitle">
          Buat Produk Kamu
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
            <form action="{{ route('dashboard-product-store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
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
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Kategori Produk</label>
                          <select name="categories_id" class="form-control">
                          @foreach ($categories as $categories)
                            <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                          @endforeach
                        </select>
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
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Jumlah hari</label>
                        <input
                          type="number"
                          class="form-control"
                          id="day"
                          name="day"
                        />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Buat Deskripsi</label>
                        <textarea
                          name="description"
                          id="editor"
                          cols="30"
                          rows="4"
                          class="form-control"
                        >
                        </textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Thumbnail</label>
                        <input
                          type="file"
                          class="form-control"
                          name="photo"
                        />
                        <small class="text-muted">
                          Pilih Foto Thumbnail Utama Produk Kamu
                        </small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col">
                  <button
                    type="submit"
                    class="btn btn-success btn-block px-5"
                  >
                    Simpan Sekarang
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@push('addon-script')
<script src="/script/js/ckeditor/ckeditor.js"></script>
  
<script>
  CKEDITOR.replace("editor");
</script>
@endpush