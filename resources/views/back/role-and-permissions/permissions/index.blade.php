@extends('layouts.back')
@section('title','Permission | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Data Permission</h3>
                    <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus mr-2"></i>Tambah Permission</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="permissionTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Guard</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($permissions as $permission)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->guard_name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('permissions.edit',['permission' => $permission->id]) }}" class="btn btn-warning btn-sm text-white mr-2" title="Edit Data">
                                                <i class="fas fa-pen mr-2"></i>
                                                Edit
                                            </a>
                                            <form action="{{ route('permissions.destroy',['permission' => $permission->id]) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm btn-hapus" data-name="{{ $permission->name }}" data-table="permission">
                                                    <i class="fas fa-trash mr-2"></i>
                                                    Hapus</button>
                                            </form>
                                        </div>
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
    $("#permissionTable").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endpush

@endsection
