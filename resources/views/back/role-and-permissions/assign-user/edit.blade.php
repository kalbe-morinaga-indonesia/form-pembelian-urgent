@extends('layouts.back')
@section('title','Assign User | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Assign User</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('assign-users.update',['user' => $user->id]) }}" method="POST">
                @method('put')
                @csrf
                @include('back.role-and-permissions.assign-user.form',['button' => 'Sync'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
