@extends('layouts.back')
@section('title','Purchase Request | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Request</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="txtNama">Requester Name</label>
                            <input type="text" class="form-control" value="{{ $purchase->muser->txtNama }}" readonly>
                            <input type="hidden" name="muser_id" value="{{ $purchase->muser->txtNama }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="mdepartment_id">Department</label>
                            <input type="text" name="mdepartment_id" id="mdepartment_id" class="form-control"
                                value="{{ $purchase->mdepartment->txtNamaDept }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="txtNoPurchaseRequest">No PR/WO</label>
                            <input type="text" name="txtNoPurchaseRequest" id="txtNoPurchaseRequest" class="form-control"
                                value="{{ $purchase->txtNoPurchaseRequest }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="dtmTanggalKebutuhan">Tanggal Kebutuhan</label>
                            <input type="date" name="dtmTanggalKebutuhan" id="dtmTanggalKebutuhan" class="form-control"
                                value="{{ $purchase->dtmTanggalKebutuhan }}" readonly>
                        </div>
                    </div>
                </div>

                @hasrole('pu_svp')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="mdepartment_id">No PO</label>
                            <input type="text" name="mdepartment_id" id="mdepartment_id" class="form-control"
                                value="{{ $purchase->minput->txtNomorPO ?? '-' }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="mdepartment_id">Nama Supplier</label>
                            <input type="text" name="mdepartment_id" id="mdepartment_id" class="form-control"
                                value="{{ $purchase->minput->txtNamaSupplier ?? '-' }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="total">Total</label>
                            <div class="input-group mb-2">
                                <input type="text" name="total" id="total" class="form-control" value="@currency($purchase->total)" readonly>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Item Code</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Tanggal Kedatangan</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($inputs as $barang)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $barang->mbarang->txtItemCode }}</td>
                                <td>{{ $barang->mbarang->txtNamaBarang }}</td>
                                <td>{{ $barang->mbarang->intJumlah }}</td>
                                <td>{{ $barang->mbarang->satuan }}</td>
                                <td>@currency($barang->intHarga)</td>
                                <td>{{ $barang->dtmTanggalKedatangan }}</td>
                                <td>{{ $barang->mbarang->txtKeterangan }}</td>
                            </tr>
                            @empty
                            <td colspan="6">
                                <img src="{{asset('theme/dist/img/no_data.png')}}" alt="Tidak Ada Data"
                                    class="img-fluid d-block mx-auto mt-4" width="200">
                                <p class="text-center">Tidak ada data...</p>
                            </td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @endhasrole

                @hasrole('dept_head')
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Item Code</th>
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
                                <td>{{ $barang->txtItemCode }}</td>
                                <td>{{ $barang->txtNamaBarang }}</td>
                                <td>{{ $barang->intJumlah }}</td>
                                <td>{{ $barang->satuan }}</td>
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
                @endhasrole

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="txtFile">File</label>
                            <p>
                                @if ($purchase->txtFile != null)
                                @foreach (json_decode($purchase->txtFile) as $file)
                            <ol class="list-group list-group-numbered">
                                <li class="list-group-item my-2">
                                    <a href="{{ asset('files/'.$file) }}" target="_blank">{{ $file }}</a>
                                </li>
                            </ol>
                            @endforeach
                            @else
                            Tidak ada file...
                            @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="txtReason">Reason</label>
                            <input type="text" name="txtReason" id="txtReason" class="form-control" value="{{ $purchase->txtReason }}"
                                readonly>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <form action="{{route('purchase-requests.approve',['purchase' => $purchase->txtSlug])}}" method="POST">
                        @method('put')
                        @csrf
                        <button type="submit" name="submit" value="yes" class="btn btn-success mx-2">Approved</button>
                        <button type="submit" name="submit" value="no" class="btn btn-danger mx-2">Rejected</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
