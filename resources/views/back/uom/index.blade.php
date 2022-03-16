@extends('layouts.back')
@section('title','UOM | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Data UOM</h3>
                    <a href="{{ route('uoms.create') }}" class="btn btn-primary">Tambah
                        UOM</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="uomTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item Code</th>
                                <th>Tanggal Kebutuhan</th>
                                <th>Jumlah Kebutuhan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($uoms as $uom)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $uom->txtItemCode }}</td>
                                <td>{{ $uom->dtmTanggalKebutuhan }}</td>
                                <td>{{ $uom->intJumlahKebutuhan }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('uoms.edit',['uom' => $uom->id]) }}" class="btn btn-warning edit">Edit</a>
                                        <form action="{{ route('uoms.destroy',['uom' => $uom->id]) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-hapus"
                                                title="Hapus Department" data-name="{{ $uom->txtItemCode }}"
                                                data-table="uom">Delete</button>
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
        $("#uomTable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        });
    });

</script>
@endpush

@endsection
