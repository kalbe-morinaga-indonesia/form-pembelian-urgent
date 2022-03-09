@extends('layouts.back')
@section('title','Role | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Role</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                @include('back.role-and-permissions.roles.form',['button' => 'Tambah'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
