@extends('layouts.back')
@section('title','Uom | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Uom</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('uoms.update',['uom' => $uom->id]) }}" method="POST">
                    @method("put")
                    @csrf
                    @include('back.uom.form',['button' => 'Edit'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
