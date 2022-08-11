@extends('layouts.back')
@section('title','Jabatan | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Jabatan</h3>
                <div class="card-tools">
                    <a href="#" class="btn btn-sm btn-primary">Tambah
                        Jabatan</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="departmentTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Nama Department</th>
                                <th>Nama Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

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
