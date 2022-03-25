@extends('layouts.back')
@section('title','Uom | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Request</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="txtNama">Requester Name</label>
                        <input type="text" class="form-control" value="{{ $purchase->muser->txtNama }}" readonly>
                        <input type="hidden" name="muser_id" value="{{ $purchase->muser->txtNama }}">
                    </div>
                    <div class="form-group">
                        <label for="mdepartment_id">Department</label>
                        <input type="text" name="mdepartment_id" id="mdepartment_id" class="form-control"
                            value="{{ $purchase->mdepartment->txtNamaDept }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="txtNoPurchaseRequest">No PR/WO</label>
                        <input type="text" name="txtNoPurchaseRequest" id="txtNoPurchaseRequest" class="form-control"
                            value="{{ $purchase->txtNoPurchaseRequest }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="dtmDateCreated">No PR/WO</label>
                        <input type="date" name="dtmDateCreated" id="dtmDateCreated" class="form-control"
                            value="{{ $purchase->dtmDateCreated }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="dtmDateRequired">No PR/WO</label>
                        <input type="date" name="dtmDateRequired" id="dtmDateRequired" class="form-control"
                            value="{{ $purchase->dtmDateRequired }}" readonly>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="bg-primary text-white">
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

                    <div class="form-group">
                        <label for="txtFile">File</label>
                        <p>
                            @foreach (json_decode($purchase->txtFile) as $file)
                                <ol class="list-group list-group-numbered">
                                    <li class="list-group-item my-2">
                                        <a href="{{ asset('files/'.$file) }}" target="_blank">{{ $file }}</a>
                                    </li>
                                </ol>
                            @endforeach
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="txtReason">Reason</label>
                        <input type="text" name="txtReason" id="txtReason" class="form-control"
                            value="{{ $purchase->txtReason }}" readonly>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="#" class="btn btn-success mx-2">Yes</a>
                        <a href="#" class="btn btn-danger">No</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
