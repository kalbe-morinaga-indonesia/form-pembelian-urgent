@extends('layouts.back')
@section('title','Permission | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Permission</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('permissions.store') }}" method="POST">
                @csrf
                @include('back.role-and-permissions.permissions.form',['button' => 'Tambah'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
