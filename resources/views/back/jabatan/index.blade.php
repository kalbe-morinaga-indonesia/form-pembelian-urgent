@extends('layouts.back')
@section('title','Jabatan | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Jabatan</h3>
                <div class="card-tools">
                    <a href="{{route('jabatan.create')}}" class="btn btn-sm btn-primary">Tambah
                        Jabatan</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="departmentTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Id Jabatan</th>
                                <th>Department</th>
                                <th>Nama Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jabatans as $jabatan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><code>{{$jabatan->txtIdJabatan}}</code></td>
                                <td>{{$jabatan->department->txtNamaDept}}</td>
                                <td>{{ $jabatan->txtNamaJabatan }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('jabatan.edit',['jabatan' => $jabatan->id]) }}"
                                            class="btn btn-warning mx-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form
                                            action="{{ route('jabatan.destroy',['jabatan' => $jabatan->id]) }}"
                                            method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-hapus"
                                                title="Hapus Department" data-name="{{ $jabatan->txtNamaJabatan }}"
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
