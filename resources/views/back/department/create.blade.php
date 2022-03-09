@extends('layouts.back')
@section('title','Departmen | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Department</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('departments.store') }}" method="POST">
                    @csrf
                    @include('back.department.form.partials',['button' => 'Tambah'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
