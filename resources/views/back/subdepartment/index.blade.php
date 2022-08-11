@extends('layouts.back')
@section('title','Sub Department | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Sub Department</h3>
                <div class="card-tools">
                    <a href="{{route('subdepartments.create')}}" class="btn btn-sm btn-primary">Tambah
                        Sub Department</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="departmentTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Id Sub-Department</th>
                                <th>Department</th>
                                <th>Nama Sub-Department</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subdepartments as $subdepartment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><code>{{$subdepartment->txtIdSubDept}}</code></td>
                                <td>{{$subdepartment->department->txtNamaDept}}</td>
                                <td>{{ $subdepartment->txtNamaSubDept }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('subdepartments.edit',['subdepartment' => $subdepartment->id]) }}"
                                            class="btn btn-warning mx-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form
                                            action="{{ route('subdepartments.destroy',['subdepartment' => $subdepartment->id]) }}"
                                            method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-hapus"
                                                title="Hapus Department" data-name="{{ $subdepartment->txtNamaSubDept }}"
                                                data-table="department">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">
                                    <img src="{{asset('theme/dist/img/no_data.png')}}" alt="Tidak Ada Data" class="img-fluid d-block mx-auto mt-4"
                                        width="200">
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
        $('#departmentTable').DataTable();
    });
</script>
@endpush

@endsection
