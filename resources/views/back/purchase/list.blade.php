@extends('layouts.back')
@section('title','List PO | Form Pembelian Urgent')

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
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Requester Name</th>
                                    <td>{{ $purchase->muser->txtNama }}</td>
                                    <th>Department</th>
                                    <td>{{ $purchase->mdepartment->txtNamaDept }}</td>
                                    <th>Tanggal Kebutuhan</th>
                                    <td>{{ date("d M Y", strtotime($purchase->dtmTanggalKebutuhan)) }}</td>
                                    <th>Total</th>
                                    <td>@currency($purchase->total)</td>
                                </tr>
                                <tr>
                                    <th>File</th>
                                    <td colspan="5">@if ($purchase->txtFile != null)
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
                                    </td>
                                    <th>Reason</th>
                                    <td>{{ $purchase->txtReason }}</td>
                                </tr>
                            </table>
                        </div>
                    @hasrole('pu_svp')
                    <div class="alert alert-light">
                        Pilih salah satu list PO dibawah ini
                    </div>
                    <div class="list">
                        <ul class="list-group">
                            @forelse ($inputs as $input)
                            <li class="list-group-item d-flex justify-content-between">
                                <a href="{{route('purchase-requests.show-list-po',['purchase' => $purchase->txtSlug, 'input' => $input->txtNomorPO])}}">
                                    {{$input->txtNomorPO}}
                                </a>
                                <a href="{{route('purchase-requests.show-list-po',['purchase' => $purchase->txtSlug, 'input' => $input->txtNomorPO])}}">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </li>
                            @empty
                            Tidak ada list PO
                            @endforelse
                        </ul>
                    </div>
                    {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                        <form
                            action="{{route('purchase-requests.approve',['purchase' => $purchase->txtSlug])}}"
                            method="POST">
                            @method('put')
                            @csrf
                            @if ($proccess == 0)
                            <button type="submit" name="submit" value="yes" class="btn btn-success mx-2" >Approved</button>
                            <button type="submit" name="submit" value="no" class="btn btn-danger mx-2" >Rejected</button>
                            @endif
                        </form>
                    </div> --}}
                    @endhasrole
                    @hasrole('buyer')
                    <div class="alert alert-light">
                        Untuk mencetak po. Pilih salah satu list PO dibawah ini
                    </div>
                    <div class="list">
                        <ul class="list-group">
                            @forelse ($inputs as $input)
                            <li class="list-group-item">
                                <a
                                    href="{{route('purchase-requests.cetakpo',['purchase' => $purchase->txtSlug, 'input' => $input->txtNomorPO])}}" target="_blank">
                                    {{$input->txtNomorPO}}
                                </a>
                            </li>
                            @empty
                            Tidak ada list PO
                            @endforelse
                        </ul>
                    </div>
                    @endhasrole
            </div>
        </div>
    </div>
</div>
@endsection
