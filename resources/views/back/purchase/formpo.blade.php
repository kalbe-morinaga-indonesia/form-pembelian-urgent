@extends('layouts.back')
@section('title','Purchase Request | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <tr>
                            <td rowspan="4" colspan="2" class="align-middle">
                                <img src="{{asset('theme/dist/img/header-form-po.png')}}" alt="Kalbe Morinaga"
                                    class="img-fluid d-block mx-auto">
                            </td>
                            <td rowspan="2" colspan="3" class="align-middle">
                                <h5 class="font-weight-bold text-center">FORM</h5>
                            </td>
                            <td colspan="2">No Dok</td>
                            <td colspan="2">FR/HRD-PU/FPO/001</td>
                        </tr>
                        <tr>
                            <td colspan="2">No. Rev</td>
                            <td colspan="2">02</td>
                        </tr>
                        <tr>
                            <td rowspan="2" colspan="3" class="align-middle">
                                <h5 class="font-weight-bold text-center">PURCHASE ORDER</h5>
                            </td>
                            <td colspan="2">Tgl Berlaku</td>
                            <td colspan="2">08-Feb-21</td>
                        </tr>
                        <tr>
                            <td colspan="2">Halaman</td>
                            <td colspan="2">1 of 1</td>
                        </tr>
                        <tr>
                            <td colspan="9">
                                <p class="font-weight-bold m-0">PT KALBE MORINAGA INDONESIA</p>
                                <address class="m-0">
                                    Sektor 1A Blok Q1 <br>
                                    Kawasan Industri Indotaisei <br>
                                    Ds Kalihurip, Kec Cikampek, Kab Karawang Jawa Barat 41373
                                </address>
                                <p class="m-0">Phone : 0264-350680</p>
                                <p>NPWP : 02.192.995.5-057.000</p>
                            </td>
                        </tr>
                        <tr>
                            <td>Vendor Name</td>
                            <td colspan="4">: FESTO, PT</td>
                            <td>PO Number</td>
                            <td colspan="4">: {{ $purchase->minput->txtNomorPO }}</td>
                        </tr>
                        <tr>
                            <td>Vendor Address</td>
                            <td colspan="4">: JL. Sultan Iskandar Muda 68 JAKARTA SELATAN</td>
                            <td>PO Revision Number</td>
                            <td colspan="4">: 0</td>
                        </tr>
                        <tr>
                            <td>Vendor Contact Name</td>
                            <td colspan="4">: Tommy Subagja</td>
                            <td>Date</td>
                            <td colspan="4">: 10-MAR-22</td>
                        </tr>
                        <tr>
                            <td>Vendor Phone</td>
                            <td colspan="4">: 021-27507900</td>
                            <td>Payment</td>
                            <td colspan="4">: 30 Days</td>
                        </tr>
                        <tr>
                            <td>Vendor Email</td>
                            <td colspan="4">: tommy.subagja@festo.com</td>
                            <td></td>
                            <td colspan="4"></td>
                        </tr>
                        <tr>
                            <td colspan="9"></td>
                        </tr>
                        <tr>
                            <td>No</td>
                            <td>Part Name</td>
                            <td>Part No</td>
                            <td>Qty</td>
                            <td>UOM</td>
                            <td>Unit Price</td>
                            <td>Amount</td>
                            <td>Reference</td>
                            <td>Delivery</td>
                        </tr>
                        @foreach ($purchase->minputs as $input)
                             @php
                                 $total += $input->amount
                             @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$input->mbarang->txtNamaBarang}}</td>
                                <td></td>
                                <td>{{$input->mbarang->intJumlah}}</td>
                                <td>{{$input->mbarang->txtSatuan}}</td>
                                <td>@currency($input->intHarga)</td>
                                <td>@currency($input->amount)</td>
                                <td></td>
                                <td>{{ date("d-M-Y", strtotime($input->dtmTanggalKedatangan)) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="9"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p class="font-weight-bold m-0">Department</p>
                                <br>
                                <p class="font-weight-bold m-0">{{$purchase->mdepartment->txtNamaDept}}</p>
                            </td>
                            <td colspan="2">
                                <p class="font-weight-bold m-0">Note : {{$purchase->mdepartment->txtNamaDept}}</p>
                                <ol>
                                    <li>Please mention our PO number in your delivery order and Invoice.</li>
                                    <li>Delivery Franco our warehouse</li>
                                    <li>Please attached CoA/SDS/MSDS/food grade certificate/JSA for chemical/oil&gases goods/service work or
                                        related document
                                        support.</li>
                                </ol>
                            </td>
                            <td colspan="2">
                                <p class="font-weight-bold m-0">Total</p>
                                <p class="font-weight-bold m-0">VAT</p>
                                <p class="font-weight-bold m-0">Grand Total</p>
                            </td>
                            <td colspan="2">
                                <p class="font-weight-bold m-0">@currency($total)</p>
                                <p class="font-weight-bold m-0">@currency($vat = $total * 0.1)</p>
                                <p class="font-weight-bold m-0">@currency($total + $vat)</p>
                            </td>
                            <td colspan="2">
                                <p>
                                    Please supply as scheduled
                                    and do not hesitate to call
                                    for any question
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="m-0">Prepared by : </p>
                                <p class="m-0">Date : </p>
                                <br>
                                <br>
                                <br>
                                <p class="text-center m-0 font-weight-bold">Agus Riyanto</p>
                                <p class="text-center m-0 font-weight-bold">Purchasing</p>
                            </td>
                            <td colspan="2">
                                <p class="m-0">Authorized Signature:</p>
                                <p class="m-0">Date : </p>
                                <br>
                                <br>
                                <br>
                                <p class="text-center m-0 font-weight-bold">Didik Budiarto</p>
                                <p class="text-center m-0 font-weight-bold">BDA Dept Head</p>
                            </td>
                            <td colspan="2">
                                <p class="m-0">Authorized Signature : </p>
                                <p class="m-0">Date : </p>
                                <br>
                                <br>
                                <br>
                                <p class="text-center m-0 font-weight-bold">YUDHA AGUS TRI BASUKI</p>
                                <p class="text-center m-0 font-weight-bold">Manufacturing Head</p>
                            </td>
                            <td colspan="2">
                                <p class="m-0">Vendor Confirmation : </p>
                                <p class="m-0">Date : </p>
                                <br>
                                <br>
                                <br>
                                <br>
                                <p class="text-center m-0 font-weight-bold">Sign, Stamp & Refax</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <p class="font-weight-bold m-0">This purchase orders is automatic generated by system</p>
            </div>
        </div>
    </div>
</div>
@endsection
