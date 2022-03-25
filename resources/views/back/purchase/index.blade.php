@extends('layouts.back')
@section('title','Uom | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">List Request</h3>
                    <a href="{{ route('purchase-requests.create') }}" class="btn btn-primary">Tambah
                        Purchase Request</a>
                </div>
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
                                @hasrole('dept_head')
                                <th>Action</th>
                                @endhasrole
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($purchases as $purchase)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td></td>
                                <td>
                                    <a
                                        href="{{ route('purchase-requests.show',['purchase' => $purchase->id]) }}">{{ $purchase->txtNoPurchaseRequest }}</a>
                                </td>
                                <td>{{ $purchase->txtReason }}</td>
                                <td>
                                    @if($purchase->status == "in process")
                                    <span class="badge p-1 bg-warning">{{ $purchase->status }}</span>
                                    @elseif($purchase->status == "approved by dept head")
                                    <span class="badge p-1 bg-success">{{ $purchase->status }}</span>
                                    @endif
                                </td>
                                <td>{{ $purchase->dtmUpdatedBy->diffForHumans() }}</td>
                                @hasrole('dept_head')
                                <td>
                                    @if($purchase->status == "in process")
                                    <a href="{{ route('purchase-requests.approve',['purchase' => $purchase->id]) }}"
                                        class="btn btn-primary" disabled>Approve</a>
                                    @endif
                                </td>
                                @endhasrole
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">Tidak ada data</td>
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
    $(function () {
        $("#purchaseTable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        });
    });

</script>
@endpush

@endsection
