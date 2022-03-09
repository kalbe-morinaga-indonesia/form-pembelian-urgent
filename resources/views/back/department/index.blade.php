@extends('layouts.back')
@section('title','Department | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-12">
        @component('layouts.alert')
        {{ session()->get('message') }}
        @endcomponent
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Data Department</h3>
                    <a href="{{ route('departments.create') }}" class="btn btn-primary">Tambah
                        Department</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Departemen</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $department->txtNamaDept }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-warning">Edit</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
