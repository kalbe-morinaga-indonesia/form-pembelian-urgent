@extends('layouts.back')
@section('title','Department | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Data Department</h3>
                    <a href="{{ route('departments.create') }}" class="btn btn-primary">Tambah
                        Department</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="departmentTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Departemen</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($departments as $department)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $department->txtNamaDept }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('departments.edit',['department' => $department->id]) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('departments.destroy',['department' => $department->id]) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-hapus" title="Hapus Department" data-name="{{ $department->txtNamaDept }}" data-table="department">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">Tidak ada data...</td>
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
    $("#departmentTable").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endpush

@endsection
