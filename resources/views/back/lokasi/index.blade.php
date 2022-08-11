@extends('layouts.back')
@section('title','Lokasi | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Lokasi</h3>
                <div class="card-tools">
                    <a href="{{route('lokasi.create')}}" class="btn btn-sm btn-primary">Tambah
                        Lokasi</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="departmentTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Id Lokasi</th>
                                <th>Nama Lokasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($lokasis as $lokasi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><code>{{$lokasi->txtIdLokasi}}</code></td>
                                <td>{{ $lokasi->txtNamaLokasi }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('lokasi.edit',['lokasi' => $lokasi->id]) }}"
                                            class="btn btn-warning mx-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form
                                            action="{{ route('lokasi.destroy',['lokasi' => $lokasi->id]) }}"
                                            method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-hapus"
                                                title="Hapus Department" data-name="{{ $lokasi->txtNamaLokasi }}"
                                                data-table="department">
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
