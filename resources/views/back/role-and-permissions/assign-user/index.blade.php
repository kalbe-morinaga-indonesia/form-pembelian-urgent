@extends('layouts.back')
@section('title','Assign User | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Data Assign User</h3>
                    <a href="{{ route('assign-users.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus mr-2"></i>Assign User</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="assignUserTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->txtNama }}</td>
                                    <td>{{ $user->getRoleNames()->toArray() ? implode(', ', $user->getRoleNames()->toArray()) : "N/a" }}</td>
                                    <td>
                                            <a href="{{ route('assign-users.edit',['user' => $user->id]) }}" class="btn btn-warning btn-sm text-white mr-2" title="Edit Data">
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
    $("#assignUserTable").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endpush

@endsection
