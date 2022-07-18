@extends('layouts.dashboard')

@section('title')
    Dashboard Transaction Detail
@endsection

@section('content')
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">{{ $transaction->code }}</h2>
      <p class="dashboard-subtitle">
        Transaksi Detail
      </p>
    </div>
    <div class="dashboard-content" id="transactionDetails">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-md-4">
                  <img
                    src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                    alt=""
                    class="w-100 mb-3"
                  />
                </div>
                <div class="col-12 col-md-8">
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="product-title">Nama Pelanggan</div>
                      <div class="product-subtitle">{{ $transaction->transaction->user->name }}</div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Nama Produk</div>
                      <div class="product-subtitle">
                        {{ $transaction->product->name }}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">
                        Tanggal Transaksi
                      </div>
                      <div class="product-subtitle">
                        {{ $transaction->created_at }}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">
                        Mulai Booking
                      </div>
                      <div class="product-subtitle">
                        {{ $transaction->transaction->booking_first }}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">
                        Akhir Booking
                      </div>
                      <div class="product-subtitle">
                        {{ $transaction->transaction->booking_last }}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Status</div>
                      <div class="product-subtitle text-danger">
                      {{ $transaction->transaction->transaction_status }}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Total Harga</div>
                      <div class="product-subtitle">Rp.{{ number_format($transaction->transaction->total_price) }}</div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Total Hari</div>
                      <div class="product-subtitle">{{ number_format($transaction->transaction->day_total) }} Hari</div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Nomor Telepon</div>
                      <div class="product-subtitle">
                        {{ $transaction->transaction->phone_number}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <form action="{{ route('dashboard-transaction-update', $transaction->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="row">
                  <div class="col-12 mt-4">
                    <h5>
                      Information Pelanggan
                    </h5>
                    <div class="row">
                      <div class="col-12 col-md-6">
                        <div class="product-title">Alamat</div>
                        <div class="product-subtitle">
                          {{ $transaction->transaction->address }}
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-md-4 col-lg-3">
                        <div class="card-body">
                          <img
                            src="{{ Storage::url($transaction->transaction->ktp_photo ?? '' ) }}"
                            alt=""
                            class="w-100 mb-2"
                          />
                          <div class="product-title">Foto KTP</div>
                        </div>
                      </div>
                      
                      <div class="col-12 col-md-6 col-md-4 col-lg-3">
                        <div class="card-body">
                          <img
                            src="{{ Storage::url($transaction->transaction->selfie_photo ?? '' ) }}"
                            alt=""
                            class="w-100 mb-2"
                          />
                          <div class="product-title">Foto Selfie</div>
                        </div>
                      </div>
                      
                      <div class="col-12">
                        <div class="row">
                          <div class="col-md-3">
                            <div class="product-title">Status Detail</div>
                            <select
                              name="status_details"
                              id="status"
                              class="form-control"
                              v-model="status"
                            >
                              
                              <option value="BELUM DIAMBIL">Belum Diambil</option>
                              <option value="SUDAH DIAMBIL">Sudah Diambil</option>
                              <option value="BELUM DIKEMBALIKA">Belum Dikembalikan</option>
                            </select>
                          </div>
                          <template v-if="status == 'BELUM DIAMBIL'">
                            <div class="col-md-3">
                              <div class="product-title">
                                Input Resi
                              </div>
                              <input
                                class="form-control"
                                type="text"
                                name="resi"
                                v-model="resi"
                              />
                            </div>
                            <div class="col-md-2">
                              <button
                                type="submit"
                                class="btn btn-success btn-block mt-4"
                              >
                                Update Resi
                              </button>
                            </div>
                          </template>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-12 text-right">
                        <button
                          type="submit"
                          class="btn btn-success btn-lg mt-4"
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
  </div>
</div>  
@endsection

@push('addon-script')
  <script src="/vendor/vue/vue.js"></script>
  <script>
    var transactionDetails = new Vue({
      el: "#transactionDetails",
      data: {
        status: "{{ $transaction->status_details }}",
        resi: "{{ $transaction->resi }}",
      },
    });
  </script>
@endpush