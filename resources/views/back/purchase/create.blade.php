@extends('layouts.back')
@section('title','Purchase Request | Form Pembelian Urgent')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Purchase Request</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('purchase-requests.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('back.purchase.form',['button' => 'Request'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script-purchase')
<script type="text/javascript">
    let i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="barang[' + i +
            '][txtItemCode]" placeholder="Item Code" class="form-control" required /></td><td><input type="text" name="barang[' +
            i +
            '][txtNamaBarang]" placeholder="Nama Barang" class="form-control" required /></td><td><input type="text" name="barang[' +
            i +
            '][intJumlah]" placeholder="Jumlah" class="form-control" required /></td><td><select name="barang['+i+'][muom_id]" class="form-control">@forelse($uoms as $uom) <option value="{{$uom->id}}">{{$uom->txtUom}}</option> @empty <option>Tidak ada data</option> @endforelse</select></td><td><input type="text" name="barang[' +
            i +
            '][txtKeterangan]" placeholder="Keterangan" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

    let today = new Date();
    let dd = String(today.getDate()).padStart(2, '0');
    let mm = String(today.getMonth() + 1).padStart(2, '0');
    let yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#dtmTanggalKebutuhan').attr('min', today);


</script>
@endpush
