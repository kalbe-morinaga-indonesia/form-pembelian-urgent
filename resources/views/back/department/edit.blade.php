@extends('layouts.back')
@section('title','Departmen | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Department {{ $department->txtNamaDept }}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('departments.update',['department' => $department->id]) }}" method="POST">
                    @method('put')
                    @csrf
                    @include('back.department.form.partials',['button' => 'Edit'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
