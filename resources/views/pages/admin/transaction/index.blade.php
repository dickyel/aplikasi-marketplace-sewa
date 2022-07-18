@extends('layouts.admin')

@section('title')
    Swa Mobile Transaksi Admin
@endsection

@section('content')
<!-- Section Content -->
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Transaksi</h2>
            <p class="dashboard-subtitle">
                Daftar List Transaksi
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Harga</th>
                                        <th>Mulai Booking</th>
                                        <th>Akhir Booking</th>
                                        <th>Nomor Telepon</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th>Dibooking Oleh</th>
                                        <th>Dibuat</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
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
    <script>
        
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'full_name', name: 'full_name' },
                { data: 'total_price', name: 'total_price' },
                { data: 'booking_first', name: 'booking_first' },
                { data: 'booking_last', name: 'booking_last' },
                { data: 'phone_number', name: 'phone_number' },
                { data: 'address', name: 'address' },
                { data: 'transaction_status', name: 'transaction_status' },
                { data: 'user.name', name: 'user.name' },
                { data: 'created_at', name: 'created_at' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ]
        });
    </script>
@endpush