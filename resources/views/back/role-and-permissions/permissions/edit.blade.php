@extends('layouts.back')
@section('title','Permission | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Permission</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('permissions.update',['role' => $role->id]) }}" method="POST">
                @csrf
                @method('put')
                @include('back.role-and-permissions.permissions.form',['button' => 'Edit'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
