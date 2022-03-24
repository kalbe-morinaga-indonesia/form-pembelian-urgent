@extends('layouts.back')
@section('title','Uom | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Request <code>{{ $purchase->txtNoPurchaseRequest }}</code></h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="d-flex justify-content-between">
                            <p>Nomor PR / WO</p>
                            <p>{{ $purchase->txtNoPurchaseRequest }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Tanggal Dibuat</p>
                            <p>{{ $purchase->dtmDateCreated }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Tanggal Dibutuhkan</p>
                            <p>{{ $purchase->dtmDateRequired }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 offset-4">
                        <div class="d-flex justify-content-between">
                            <p>Nama Requester</p>
                            <p>{{ $purchase->muser->txtNama }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Department</p>
                            <p>{{ $purchase->mdepartment->txtNamaDept }}</p>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($purchase->mbarangs as $barang)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $barang->txtNamaBarang }}</td>
                                <td>{{ $barang->intJumlah }}</td>
                                <td>{{ $barang->txtSatuan }}</td>
                                <td>
                                    @if ($barang->txtKeterangan)
                                        {{ $barang->txtKeterangan }}
                                    @else
                                        n/a
                                    @endif
                                </td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
