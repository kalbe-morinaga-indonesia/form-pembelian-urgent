@extends('layouts.back')
@section('title','Users | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit User</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update',['user' => $user->id]) }}" method="POST">
                    @method('put')
                    @csrf
                    @include('back.users.form',['button' => 'Edit'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
