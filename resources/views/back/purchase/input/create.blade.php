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
                <form action="{{route('purchase-requests.store.input')}}" id="inputBuyer" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtNomorPo">Nomor PO</label>
                                <input type="text" class="form-control @error('txtNomorPo') is-invalid  @enderror"
                                    name="txtNomorPo" id="txtNomorPo" placeholder="Masukkan Nomor PO"
                                    value="{{ old('txtNomorPo') }}" required>
                                @error('txtNomorPo')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtNamaSupplier">Nama Supplier</label>
                                <input type="text" class="form-control @error('txtNamaSupplier') is-invalid  @enderror"
                                    name="txtNamaSupplier" id="txtNamaSupplier" placeholder="Masukkan Nama Supplier"
                                    value="{{ old('txtNamaSupplier') }}" required>
                                @error('txtNamaSupplier')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="intTotal">Total</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp. </div>
                                    </div>
                                    <input type="text" class="form-control @error('intTotal') is-invalid  @enderror" name="intTotal" id="intTotal"
                                        placeholder="Total Harga" value="{{ old('intTotal') }}" readonly>
                                    @error('intTotal')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
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
                    <th>Need By Date</th>
                    <th>Harga</th>
                    <th>Tanggal Kedatangan</th>
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
                    <td>
                        <input type="hidden" name="intJumlah" id="intJumlah{{$loop->iteration}}" value="{{$inputBarang->intJumlah}}"
                            class="form-control">
                        {{$inputBarang->intJumlah}}
                    </td>
                    <td>{{$inputBarang->uom->txtUom}}</td>
                    <td>{{$inputBarang->txtKeterangan}}</td>
                    <td>{{$inputBarang->purchase->dtmTanggalKebutuhan}}</td>
                    <td>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp. </div>
                                </div>
                                <input type="text" class="form-control harga @error('intHarga') is-invalid  @enderror" name="intHarga[]"
                                    id="intHarga{{$loop->iteration}}" placeholder="Masukkan Harga" value="{{ old('intHarga') }}" required
                                    onblur="getAmount()">
                                @error('intHarga')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" class="subTotal" name="intSubTotal[]" id="intSubTotal{{$loop->iteration}}">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="date" class="form-control @error('dtmTanggalKedatangan') is-invalid  @enderror"
                                name="dtmTanggalKedatangan" id="dtmTanggalKedatangan"
                                value="{{ old('dtmTanggalKedatangan') }}" required>
                            @error('dtmTanggalKedatangan')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="9">
                        <button type="submit" class="d-block ml-auto mt-4 btn btn-primary">Input</button>
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
@push('script-purchase')
<script>
    let today = new Date();
    let dd = String(today.getDate()).padStart(2, '0');
    let mm = String(today.getMonth() + 1).padStart(2, '0');
    let yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#dtmTanggalKedatangan').attr('min', today);


    function getAmount() {
        @foreach ($inputBarangs as $input)
            var intJumlah{{$loop->iteration}} = $('#intJumlah{{$loop->iteration}}').val();
            var intHarga{{$loop->iteration}} = $('#intHarga{{$loop->iteration}}').val();
            $('#intSubTotal{{$loop->iteration}}').val(intJumlah{{$loop->iteration}} * intHarga{{$loop->iteration}});
        @endforeach
            var sum_value = 0;
            $('.subTotal').each(function () {
                sum_value += +$(this).val();
                $('#intTotal').val(sum_value);
            })

    }

</script>
@endpush
@endsection
