@extends('layouts.back')
@section('title','Divisi | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Divisi</h3>
                <div class="card-tools">
                    <a href="{{route('divisis.create')}}" class="btn btn-sm btn-primary">Tambah
                        Divisi</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="departmentTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID Divisi</th>
                                <th>Nama Divisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($divisions as $divisi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><code>{{ $divisi->txtIdDivisi }}</code></td>
                                <td>{{ $divisi->txtNamaDivisi }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('divisis.edit',['divisi' => $divisi->id])}}" class="btn btn-warning mx-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{route('divisis.destroy',['divisi' => $divisi->id])}}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-hapus" title="Hapus Divisi"
                                                data-name="{{ $divisi->txtNamaDivisi }}" data-table="divisi">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">
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
