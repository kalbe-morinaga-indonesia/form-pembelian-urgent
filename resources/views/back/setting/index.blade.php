@extends('layouts.back')
@section('title','Setting | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Setting</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="row">
                               <div class="col-md-12">
                                   <div class="form-group">
                                        <label for="intVat">VAT<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('intVat') is-invalid  @enderror" name="intVat" id="intVat"
                                            placeholder="Masukkan VAT" value="{{ old('intVat')}}" autofocus>
                                        @error('intVat')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                               </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Change</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
