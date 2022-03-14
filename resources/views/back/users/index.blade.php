@extends('layouts.back')
@section('title','User | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Data User</h3>
                    <a href="#" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus mr-2"></i>Tambah User</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="userTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Nomor Handphone</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Department</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->txtUsername }}</td>
                                    <td>{{ $user->txtNama }}</td>
                                    <td>{{ $user->txtNoHp }}</td>
                                    <td>{{ $user->txtTempatLahir .", ". date('d-m-Y', strtotime($user->dtmTanggalLahir)) }}</td>
                                    <td>{{ $user->txtAlamat }}</td>
                                    <td>{{ $user->mdepartment->txtNamaDept }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-warning btn-sm text-white mr-2" title="Edit Data">
                                                <i class="fas fa-pen"></i>
                                                Edit
                                            </a>
                                            <form action="#" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm btn-hapus" data-name="{{ $user->txtNama }}" data-table="user">
                                                    <i class="fas fa-trash"></i>
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
    $("#userTable").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endpush

@endsection
