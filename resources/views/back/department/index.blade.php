@extends('layouts.back')
@section('title','Department | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Department</h3>
                <div class="card-tools">
                    <a href="{{ route('departments.create') }}" class="btn btn-sm btn-primary">Tambah
                        Department</a>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="departmentTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Departemen</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($departments as $department)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $department->txtNamaDept }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('departments.edit',['department' => $department->id]) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form
                                            action="{{ route('departments.destroy',['department' => $department->id]) }}"
                                            method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-hapus"
                                                title="Hapus Department" data-name="{{ $department->txtNamaDept }}"
                                                data-table="department">Delete</button>
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
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

</script>
@endpush

@endsection
