@extends('layouts.back')
@section('title','Input Data | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Input Data</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('purchase-requests.store.input')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="txtNomorPo">Nomor PO</label>
                        <input type="text" class="form-control @error('txtNomorPo') is-invalid  @enderror"
                            name="txtNomorPo" id="txtNomorPo" placeholder="Masukkan Nomor PO"
                            value="{{ old('txtNomorPo') }}" required>
                        @error('txtNomorPo')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="txtNamaSupplier">Nama Supplier</label>
                        <input type="text" class="form-control @error('txtNamaSupplier') is-invalid  @enderror"
                            name="txtNamaSupplier" id="txtNamaSupplier" placeholder="Masukkan Nama Supplier"
                            value="{{ old('txtNamaSupplier') }}" required>
                        @error('txtNamaSupplier')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="intHarga">Harga</label>
                        <input type="text" class="form-control @error('intHarga') is-invalid  @enderror" name="intHarga"
                            id="intHarga" placeholder="Masukkan Harga" value="{{ old('intHarga') }}" required>
                        @error('intHarga')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dtmTanggalKedatangan">Tanggal Kedatangan</label>
                        <input type="date" class="form-control @error('dtmTanggalKedatangan') is-invalid  @enderror"
                            name="dtmTanggalKedatangan" id="dtmTanggalKedatangan"
                            value="{{ old('dtmTanggalKedatangan') }}" required>
                        @error('dtmTanggalKedatangan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" id="inputDataTable">
                            <thead>
                                <tr>
                                    <th>No PR</th>
                                    <th>Item</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal Kebutuhan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @csrf
                                @forelse ($inputBarangs as $inputBarang)
                                <tr>
                                    <td>
                                        <input type="hidden" name="mpurchase_id" value="{{$inputBarang->purchase->id}}">
                                        {{$inputBarang->purchase->txtNoPurchaseRequest}}
                                    </td>
                                        <input type="hidden" name="mbarang_id[]" id="mbarang_id" value="{{$inputBarang->id}}">
                                    <td>{{$inputBarang->txtNamaBarang}}</td>
                                    <td>{{$inputBarang->intJumlah}}</td>
                                    <td>{{$inputBarang->txtSatuan}}</td>
                                    <td>{{$inputBarang->txtKeterangan}}</td>
                                    <td>{{$inputBarang->purchase->dtmTanggalKebutuhan}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <button type="submit"
                                            class="d-block ml-auto mt-4 btn btn-primary">Input</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
