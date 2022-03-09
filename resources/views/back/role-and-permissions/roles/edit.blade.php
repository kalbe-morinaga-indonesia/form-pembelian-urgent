@extends('layouts.back')
@section('title','Role | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Role</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.update',['role' => $role->id]) }}" method="POST">
                @csrf
                @method('put')
                @include('back.role-and-permissions.roles.form',['button' => 'Edit'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
