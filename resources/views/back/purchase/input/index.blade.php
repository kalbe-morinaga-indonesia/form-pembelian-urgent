@extends('layouts.back')
@section('title','Input Data | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Input</h3>
            </div>
            <div class="card-body">
                @if (session()->has('message'))
                <div class="alert alert-danger mb-2">
                    {{session()->get('message')}}
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped" id="inputDataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No PR</th>
                                <th>Item</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Keterangan</th>
                                <th>No PO</th>
                                <th>Tanggal Kebutuhan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form
                                action="{{ route('purchase-requests.create.input',['purchase' => $purchase->txtSlug]) }}"
                                method="post">
                                @csrf
                                @forelse ($barangs as $barang)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            @if (!empty($barang->inputs->txtNomorPO))
                                            <input class="form-check-input" type="checkbox" checked disabled>
                                            @else
                                            <input class="form-check-input" type="checkbox" value="{{$barang->id}}"
                                                id="defaultCheck1" name="noInput[]">
                                            @endif

                                        </div>
                                    </td>
                                    <td>{{$barang->purchase->txtNoPurchaseRequest}}</td>
                                    <td>{{$barang->txtNamaBarang}}</td>
                                    <td>{{$barang->intJumlah}}</td>
                                    <td>{{$barang->satuan}}</td>
                                    <td>{{$barang->txtKeterangan}}</td>
                                    <td>{{$barang->inputs->txtNomorPO ?? "-"}}</td>
                                    <td>{{$barang->purchase->dtmTanggalKebutuhan}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8">Tidak ada data</td>
                                </tr>
                                @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8">
                                    <button type="submit" class="d-block ml-auto mt-4 btn btn-primary">Input</button>
                                </td>
                            </tr>
                            </form>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
