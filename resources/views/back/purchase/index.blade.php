@extends('layouts.back')
@section('title','Purchase Request | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Request</h3>
                @hasrole('user')
                <div class="card-tools">
                    <a href="{{ route('purchase-requests.create') }}" class="btn btn-primary">Purchase Request</a>
                </div>
                @endhasrole
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="purchaseTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No Dok</th>
                                <th>No PR/WO</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Last Update</th>
                                @hasrole('dept_head|user|pu_svp')
                                <th>Action</th>
                                @endhasrole
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($purchases as $purchase)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a class="text-dark"
                                        href="{{ route('purchase-requests.show',['purchase' => $purchase->txtSlug]) }}">{{ $purchase->txtNoDok }}</a>
                                </td>
                                <td>{{ $purchase->txtNoPurchaseRequest }}</td>
                                <td>{{ $purchase->txtReason }}</td>
                                <td>
                                    @if($purchase->status == "in process" || $purchase->status == "in process by buyer")
                                    <span class="badge p-1 bg-warning">{{ $purchase->status }}</span>
                                    @elseif($purchase->status == "approved by dept head" || $purchase->status ==
                                    "approved by pu spv")
                                    <span class="badge p-1 bg-success">{{ $purchase->status }}</span>
                                    @elseif($purchase->status == "rejected by dept head" || $purchase->status ==
                                    "rejected by pu spv")
                                    <span class="badge p-1 bg-danger">{{ $purchase->status }}</span>
                                    @endif
                                </td>
                                <td>{{ $purchase->dtmUpdatedBy->diffForHumans() }}</td>
                                @hasrole('dept_head')
                                <td>
                                    @if($purchase->status == "in process")
                                    <a href="{{ route('purchase-requests.show-approve',['purchase' => $purchase->txtSlug]) }}"
                                        class="btn btn-primary">Approve</a>
                                    @endif
                                </td>
                                @endhasrole
                                @hasrole('pu_svp')
                                <td>
                                    @if($purchase->status == "in process by buyer")
                                    <a href="{{ route('purchase-requests.show-approve',['purchase' => $purchase->txtSlug]) }}"
                                        class="btn btn-primary">Approve</a>
                                    @endif
                                    @if ($purchase->status == "approved by pu spv")
                                    <a href="{{ route('purchase-requests.formpo',['purchase' => $purchase->txtSlug]) }}" class="btn btn-primary">Form PO</a>
                                    @endif
                                </td>
                                @endhasrole
                                @hasrole('user')
                                <td>
                                    @if ($purchase->status == "rejected by dept head")
                                    <a href="{{route('purchase-requests.edit',['purchase' => $purchase->txtSlug])}}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    @else
                                    <button class="btn btn-warning btn-sm" disabled>Edit</button>
                                    @endif
                                </td>
                                @endhasrole
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">
                                    <img src="{{asset('theme/dist/img/no_data.png')}}" alt="Tidak Ada Data"
                                        class="img-fluid d-block mx-auto mt-4" width="200">
                                    <p class="text-center">Tidak ada data...</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script-datatable')
<script>
    $(document).ready(function () {
        $('#purchaseTable').DataTable();
    });
</script>
@endpush

@endsection
