@extends('layouts.back')
@section('title','Purchase Request | Form Pembelian Urgent')

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
                            <p class="fs--1 text-left mb-0">Halaman</p>
                        </div>
                        <div class="m-2">
                            <p class="fs--1 text-left mb-0">: FR/BDA-PU/FPU/008</p>
                            <p class="fs--1 text-left mb-0">: 04</p>
                            <p class="fs--1 text-left mb-0">: 01 Januari 2022</p>
                            <p class="fs--1 text-left mb-0">: 1 dari 1</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td>Nomor PR/WO</td>
                                <td>{{ $purchase->txtNoPurchaseRequest }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Dibuat</td>
                                <td>{{ $purchase->dtmInsertedBy->format("d M Y") }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Dibutuhkan</td>
                                <td>{{ date("d M Y", strtotime($purchase->dtmTanggalKebutuhan)) }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td>Nama Requester</td>
                                <td>{{ $purchase->muser->txtNama }}</td>
                            </tr>
                            <tr>
                                <td>Department</td>
                                <td>{{ $purchase->mdepartment->txtNamaDept }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="table-responsive scrollbar mt-4 fs--1">
                    <table class="table border-bottom">
                        <thead class="light">
                            <tr class="bg-primary text-white dark__bg-1000">
                                <th class="border-0">No</th>
                                <th class="border-0 text-center">Item Code</th>
                                <th class="border-0 text-center">Nama Barang</th>
                                <th class="border-0 text-center">Jumlah</th>
                                <th class="border-0 text-center">Satuan</th>
                                <th class="border-0 text-center">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($purchase->mbarangs as $barang)
                            <tr>
                                <td class="align-middle">
                                    <h6 class="mb-0 text-nowrap">{{ $loop->iteration }}</h6>
                                </td>
                                <td class="align-middle text-center">
                                    <h6 class="mb-0 text-nowrap">{{ $barang->txtItemCode }}</h6>
                                </td>
                                <td class="align-middle text-center">
                                    <h6 class="mb-0 text-nowrap">{{ $barang->txtNamaBarang }}</h6>
                                </td>
                                <td class="align-middle text-center">
                                    <h6 class="mb-0 text-nowrap">{{ $barang->intJumlah }}</h6>
                                </td>
                                <td class="align-middle text-center">
                                    <h6 class="mb-0 text-nowrap">{{ $barang->uom->txtUom }}</h6>
                                </td>
                                <td class="align-middle text-center">
                                    <h6 class="mb-0 text-nowrap">{{ $barang->txtKeterangan }}</h6>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">Tidak ada data...</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <table class="table table-borderless">
                            <tr>
                                <td>Nomor Dok</td>
                                <td>{{ $purchase->txtNoDok }}</td>
                            </tr>
                            <tr>
                                <td>Reason</td>
                                <td>{{ $purchase->txtReason }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4 offset-4 ms-auto">
                        <table class="table table-sm table-bordered text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Dibuat Oleh</th>
                                    <th scope="col"> Disetujui Oleh</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$purchase->muser->txtNama}}</td>
                                    <td>{{$purchase->txtApprovedByDeptHead ? $purchase->txtApprovedByDeptHead : "-"}}</td>
                                </tr>
                            </tbody>
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
