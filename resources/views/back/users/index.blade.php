@extends('layouts.back')
@section('title','User | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data User</h3>
                <div class="card-tools">
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus mr-2"></i>Tambah User</a>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="userTable">
                        <thead class="">
                            <tr>
                                <th>#</th>
                                <th>NIK</th>
                                <th>Username</th>
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
                                <td>{{ $user->txtUsername }}</td>
                                <td>{{ $user->txtNama }}</td>
                                <td>{{ $user->txtNoHp ? $user->txtNoHp : 'n/a'  }}</td>
                                <td>
                                    {{ $user->txtTempatLahir || $user->txtTanggalLahir ? $user->txtTempatLahir .", ". date('d-m-Y', strtotime($user->dtmTanggalLahir)) : "n/a" }}
                                </td>
                                <td>{{ $user->mdepartment->txtNamaDept }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-app btn-sm bg-warning"
                                            href="{{ route('users.edit',['user' => $user->id]) }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('users.destroy',['user' => $user->id]) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-app btn-sm btn-sm bg-danger btn-hapus"
                                                data-name="{{ $user->txtNama }}" data-table="user">
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
                        <tfoot>
                            <tr>
                                <th colspan="8">Jumlah User : <code>{{ $users->count() }}</code></th>
                            </tr>
                        </tfoot>
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
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

</script>
@endpush

@endsection
