@extends('layouts.back')
@section('title','Assign Permission | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Assign Permission</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('assign-permissions.store') }}" method="POST">
                @csrf
                @include('back.role-and-permissions.assign-permissions.form',['button' => 'Assign'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
