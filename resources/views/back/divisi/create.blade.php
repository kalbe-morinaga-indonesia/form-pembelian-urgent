@extends('layouts.back')
@section('title','Divisi | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Divisi</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('divisis.store')}}" method="POST">
                    @csrf
                    @include('back.divisi.form',['button' => 'Tambah'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
