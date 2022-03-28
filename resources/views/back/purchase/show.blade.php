@extends('layouts.back')
@section('title','Uom | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row align-items-center text-center mb-3">
                    <div class="col-sm-2 text-sm-start">
                        <img src="{{ asset('theme/dist/img/kalbe-morinaga-bg.png') }}" alt="invoice" width="120" />
                    </div>
                    <div class="col-sm-5 text-center mt-3">
                        <div class="mb-3">
                            <h5>FORM</h5>
                        </div>
                        <div class="mb-3">
                            <h5>PEMBELIAN URGENT</h5>
                        </div>
                    </div>
                    <div class="col mt-3 mt-sm-0 d-flex">
                        <div class="m-2">
                            <p class="fs--1 text-left mb-0">No. Dok</p>
                            <p class="fs--1 text-left mb-0">No. Rev</p>
                            <p class="fs--1 text-left mb-0">Tanggal Berlaku</p>
                        </div>
                        <div class="m-2">
                            <p class="fs--1 text-left mb-0">: {{$purchase->txtNoDok}}</p>
                            <p class="fs--1 text-left mb-0">: 04</p>
                            <p class="fs--1 text-left mb-0">: 01 Januari 2022</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="d-flex justify-content-between">
                            <p>Nomor PR / WO</p>
                            <p>{{ $purchase->txtNoPurchaseRequest }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Tanggal Dibuat</p>
                            <p>{{ $purchase->dtmInsertedBy->format("d M Y") }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Tanggal Dibutuhkan</p>
                            <p>{{ date("d M Y", strtotime($purchase->dtmTanggalKebutuhan)) }}</p>
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
                <div class="table-responsive scrollbar mt-4 fs--1">
                    <table class="table border-bottom">
                        <thead class="light">
                            <tr class="bg-primary text-white dark__bg-1000">
                                <th class="border-0">No</th>
                                <th class="border-0 text-center">Nama Barang</th>
                                <th class="border-0 text-center">Jumlah</th>
                                <th class="border-0 text-center">Satuan</th>
                                <th class="border-0 text-center">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchase->mbarangs as $barang)
                            <tr>
                                <td class="align-middle">
                                    <h6 class="mb-0 text-nowrap">{{ $loop->iteration }}</h6>
                                </td>
                                <td class="align-middle text-center">
                                    <h6 class="mb-0 text-nowrap">{{ $barang->txtNamaBarang }}</h6>
                                </td>
                                <td class="align-middle text-center">
                                    <h6 class="mb-0 text-nowrap">{{ $barang->intJumlah }}</h6>
                                </td>
                                <td class="align-middle text-center">
                                    <h6 class="mb-0 text-nowrap">{{ $barang->txtSatuan }}</h6>
                                </td>
                                <td class="align-middle text-center">
                                    <h6 class="mb-0 text-nowrap">{{ $barang->txtKeterangan }}</h6>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row justify-content-end">
                    <div class="col-auto">
                        <table class="table table-sm fs--1 border">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-right text-center">Dibuat Oleh</th>
                                    <th scope="col" class="text-center"> Disetujui Oleh</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border-right text-center">
                                        <br>
                                        <br>
                                        <br>
                                    </td>
                                    <td class="text-center">
                                        <br>
                                        <br>
                                        <br>
                                    </td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th scope="col" class="border-right text-center">User</th>
                                    <th scope="col" class="text-center">Dept Head</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-light">
                <p class="fs--1 mb-0"><strong>Notes: </strong>Form ini digunakan untuk pembelian yang bersifat urgent
                    purchase
                    Requisition (PR) dan Purchase Order (PO) belum approved!</p>
            </div>
        </div>
    </div>
</div>
@endsection
