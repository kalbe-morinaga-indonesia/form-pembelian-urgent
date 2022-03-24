@extends('layouts.back')
@section('title','Uom | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Request</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No PR/WO</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Last Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($purchases as $purchase)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ route('purchase-requests.show',['purchase' => $purchase->id]) }}">{{ $purchase->txtNoPurchaseRequest }}</a>
                                    </td>
                                    <td>{{ $purchase->txtReason }}</td>
                                    <td>
                                        @if($purchase->status)
                                            <span class="badge p-1 bg-warning">{{ $purchase->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $purchase->dtmUpdatedBy->diffForHumans() }}</td>
                                </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
