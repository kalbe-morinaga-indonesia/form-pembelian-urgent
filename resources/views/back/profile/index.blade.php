@extends('layouts.back')
@section('title','Profile | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Profile</h3>
            </div>
            <div class="card-body">
                <form action="{{route('profile.update')}}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="txtNik" class="form-label">NIK</label>
                        <input type="text" name="txtNik" id="txtNik" class="form-control" value="{{$user->txtNik}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="txtNama" class="form-label">Nama</label>
                        <input type="text" name="txtNama" id="txtNama" class="form-control" value="{{$user->txtNama}}">
                    </div>
                    <div class="mb-3">
                        <label for="txtNoHp" class="form-label">Nomor Handphone</label>
                        <input type="text" name="txtNoHp" id="txtNoHp" class="form-control" value="{{$user->txtNoHp}}">
                    </div>
                    <div class="mb-3">
                        <label for="txtTempatLahir" class="form-label">Tempat Lahir</label>
                        <input type="text" name="txtTempatLahir" id="txtTempatLahir" class="form-control" value="{{$user->txtTempatLahir}}">
                    </div>
                    <div class="mb-3">
                        <label for="dtmTanggalLahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="dtmTanggalLahir" id="dtmTanggalLahir" class="form-control" value="{{$user->dtmTanggalLahir}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Profile</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
