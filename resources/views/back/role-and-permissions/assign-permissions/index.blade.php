@extends('layouts.back')
@section('title','Assign Permission | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Data Assign Permission</h3>
                    <a href="{{ route('assign-permissions.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus mr-2"></i>Assign Permission</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="assignPermissionTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Guard</th>
                                <th>Permission</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->guard_name }}</td>
                                <td>{{ $role->getPermissionNames()->toArray() ? implode(', ', $role->getPermissionNames()->toArray()) : "N/a" }}
                                </td>
                                <td>
                                    <a href="{{ route('assign-permissions.edit',['role' => $role->id]) }}"
                                        class="btn btn-warning btn-sm text-white mr-2" title="Edit Data">
                                        <i class="fas fa-fan mr-2"></i>
                                        Sync
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">Tidak ada data</td>
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
        $("#assignPermissionTable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

</script>
@endpush

@endsection
