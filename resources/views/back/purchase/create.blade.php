@extends('layouts.back')
@section('title','Uom | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Purchase Request</h3>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                    @include('back.purchase.form',['button' => 'Purchase'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
