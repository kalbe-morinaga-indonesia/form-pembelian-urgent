@extends('layouts.back')
@section('title','User | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card" id="card">
            <div class="card-header">
                <h3 class="card-title">Data User</h3>
                <div class="card-tools">
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus mr-2"></i>Tambah User
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="userTable">
                        <thead class="">
                            <tr>
                                <th>#</th>
                                <th>NIK (Nomor Induk Karyawan)</th>
                                <th>Nama</th>
                                <th>Nomor Handphone</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Department</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->txtNik }}</td>
                                <td>{{ $user->txtNama }}</td>
                                <td>{{ $user->txtNoHp ? $user->txtNoHp : 'n/a'  }}</td>
                                <td>
                                    {{ $user->txtTempatLahir || $user->txtTanggalLahir ? $user->txtTempatLahir .", ". date('d-m-Y', strtotime($user->dtmTanggalLahir)) : "n/a" }}
                                </td>
                                <td>{{ $user->mdepartment->txtNamaDept }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-sm bg-warning mr-2"
                                            href="{{ route('users.edit',['user' => $user->id]) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('users.destroy',['user' => $user->id]) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-sm bg-danger btn-hapus"
                                                data-name="{{ $user->txtNama }}" data-table="user">
                                                <i class="fas fa-trash"></i>
                                                </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">
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
$(document).ready( function () {
    $('#userTable').DataTable();
});
</script>
@endpush

@endsection
