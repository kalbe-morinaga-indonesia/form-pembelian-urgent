@extends('layouts.back')
@section('title','Uom | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Request</h3>
                @hasrole('user')
                <div class="card-tools">
                    <a href="{{ route('purchase-requests.create') }}" class="btn btn-primary">Purchase Request</a>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
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
                                @hasrole('dept_head|user')
                                <th>Action</th>
                                @endhasrole
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($purchases as $purchase)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a class="text-dark" href="{{ route('purchase-requests.show',['purchase' => $purchase->txtSlug]) }}">{{ $purchase->txtNoDok }}</a>
                                </td>
                                <td>{{ $purchase->txtNoPurchaseRequest }}</td>
                                <td>{{ $purchase->txtReason }}</td>
                                <td>
                                    @if($purchase->status == "in process" || $purchase->status == "in process by buyer")
                                    <span class="badge p-1 bg-warning">{{ $purchase->status }}</span>
                                    @elseif($purchase->status == "approved by dept head")
                                    <span class="badge p-1 bg-success">{{ $purchase->status }}</span>
                                    @elseif($purchase->status == "rejected by dept head")
                                    <span class="badge p-1 bg-danger">{{ $purchase->status }}</span>
                                    @endif
                                </td>
                                <td>{{ $purchase->dtmUpdatedBy->diffForHumans() }}</td>
                                @hasrole('dept_head')
                                <td>
                                    @if($purchase->status == "in process" || $purchase->status == "rejected by dept head")
                                    <a href="{{ route('purchase-requests.show-approve',['purchase' => $purchase->txtSlug]) }}" class="btn btn-primary" disabled>Approve</a>
                                    @endif
                                </td>
                                @endhasrole
                                @hasrole('user')
                                <td>
                                    @if ($purchase->status == "rejected by dept head")
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                    @else
                                        <button class="btn btn-warning btn-sm" disabled>Edit</button>
                                    @endif
                                </td>
                                @endhasrole
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">Tidak ada data</td>
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
