@extends('layouts.back')
@section('title','PO | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Nomor Purchase Request <code>{{$purchase->txtNoPurchaseRequest}}</code></h3>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List PO</h3>
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
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="mdepartment_id">No PO</label>
                            <input type="text" name="mdepartment_id" id="mdepartment_id" class="form-control"
                                value="{{ $input->txtNomorPO ?? '-' }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="txtNamaSupplier">Nama Supplier</label>
                            <input type="text" name="txtNamaSupplier" id="txtNamaSupplier" class="form-control"
                                value="{{ $input->txtNamaSupplier ?? '-' }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="total">Total</label>
                            <div class="input-group mb-2">
                                <input type="text" name="total" id="total" class="form-control" value="@currency($subTotal)"
                                    readonly>
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
                                <td>{{ $barang->mbarang->uom->txtUom }}</td>
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
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <form action="{{route('purchase-requests.approve-po',['purchase' => $purchase->txtSlug,'input' => $input->txtNomorPO])}}" method="POST">
                        @method('put')
                        @csrf
                        @if ($input->txtStatus == "approved by pu spv")
                            <button type="submit" name="submit" value="yes" class="btn btn-success mx-2" disabled>Approved</button>
                            <button type="submit" name="submit" value="no" class="btn btn-danger mx-2" disabled>Rejected</button>
                        @endif

                        @if($input->txtStatus == "In Proccess")
                        <button type="submit" name="submit" value="yes" class="btn btn-success mx-2">Approved</button>
                        <button type="submit" name="submit" value="no" class="btn btn-danger mx-2">Rejected</button>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
