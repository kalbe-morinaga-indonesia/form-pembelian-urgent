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
        $("#dynamicAddRemove").append('<tr><td><select name="barang[' + i + '][txtItemCode]" id="item_code" class="select2bs4 form-control" onchange="myItem'+i+'(event)" required><option value="">Pilih Item</option>@foreach ($purchase_items as $item)<option value="{{$item->item_code}}">{{$item->item_code}} | {{$item->item_description}} | {{$item->quantity}} | {{$item->unit_meas_lookup_code}}</option>@endforeach</select></td><td><input type="text" name="barang[' + i +'][txtNamaBarang]" placeholder="Nama Barang" class="form-control barang" id="barang['+i+']" required readonly/></td><td><input type="text" name="barang[' +
            i +
            '][intJumlah]" placeholder="Jumlah" class="form-control" required /></td><td><input type="text" name="barang['+i+'][satuan]" id="satuan['+i+']" class="form-control" placeholder="Satuan" required readonly></td><td><input type="text" name="barang[' +
            i +
            '][txtKeterangan]" placeholder="Keterangan" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });


    function myItem0(event){
        @foreach ($purchase_items as $items)
                    if(event.target.value === "{{$items->item_code}}"){
                        document.getElementById("barang[0]").value = "{{$items->item_description}}"
                        document.getElementById("satuan[0]").value = "{{$items->unit_meas_lookup_code}}"
                    }
        @endforeach
    }
    function myItem1(event){
        @foreach ($purchase_items as $items)
                    if(event.target.value === "{{$items->item_code}}"){
                        document.getElementById("barang[1]").value = "{{$items->item_description}}"
                        document.getElementById("satuan[1]").value = "{{$items->unit_meas_lookup_code}}"
                    }
        @endforeach
    }
    function myItem2(event){
        @foreach ($purchase_items as $items)
                    if(event.target.value === "{{$items->item_code}}"){
                        document.getElementById("barang[2]").value = "{{$items->item_description}}"
                        document.getElementById("satuan[2]").value = "{{$items->unit_meas_lookup_code}}"
                    }
        @endforeach
    }
    function myItem3(event){
        @foreach ($purchase_items as $items)
                    if(event.target.value === "{{$items->item_code}}"){
                        document.getElementById("barang[3]").value = "{{$items->item_description}}"
                        document.getElementById("satuan[3]").value = "{{$items->unit_meas_lookup_code}}"
                    }
        @endforeach
    }
    function myItem4(event){
        @foreach ($purchase_items as $items)
                    if(event.target.value === "{{$items->item_code}}"){
                        document.getElementById("barang[4]").value = "{{$items->item_description}}"
                        document.getElementById("satuan[4]").value = "{{$items->unit_meas_lookup_code}}"
                    }
        @endforeach
    }
    function myItem5(event){
        @foreach ($purchase_items as $items)
                    if(event.target.value === "{{$items->item_code}}"){
                        document.getElementById("barang[5]").value = "{{$items->item_description}}"
                        document.getElementById("satuan[5]").value = "{{$items->unit_meas_lookup_code}}"
                    }
        @endforeach
    }
    function myItem6(event){
        @foreach ($purchase_items as $items)
                    if(event.target.value === "{{$items->item_code}}"){
                        document.getElementById("barang[6]").value = "{{$items->item_description}}"
                        document.getElementById("satuan[6]").value = "{{$items->unit_meas_lookup_code}}"
                    }
        @endforeach
    }
    function myItem7(event){
        @foreach ($purchase_items as $items)
                    if(event.target.value === "{{$items->item_code}}"){
                        document.getElementById("barang[7]").value = "{{$items->item_description}}"
                        document.getElementById("satuan[7]").value = "{{$items->unit_meas_lookup_code}}"
                    }
        @endforeach
    }
    function myItem8(event){
        @foreach ($purchase_items as $items)
                    if(event.target.value === "{{$items->item_code}}"){
                        document.getElementById("barang[8]").value = "{{$items->item_description}}"
                        document.getElementById("satuan[8]").value = "{{$items->unit_meas_lookup_code}}"
                    }
        @endforeach
    }
    function myItem9(event){
        @foreach ($purchase_items as $items)
                    if(event.target.value === "{{$items->item_code}}"){
                        document.getElementById("barang[9]").value = "{{$items->item_description}}"
                        document.getElementById("satuan[9]").value = "{{$items->unit_meas_lookup_code}}"
                    }
        @endforeach
    }
    function myItem10(event){
        @foreach ($purchase_items as $items)
                    if(event.target.value === "{{$items->item_code}}"){
                        document.getElementById("barang[10]").value = "{{$items->item_description}}"
                        document.getElementById("satuan[10]").value = "{{$items->unit_meas_lookup_code}}"
                    }
        @endforeach
    }
    function myItem11(event){
        @foreach ($purchase_items as $items)
                    if(event.target.value === "{{$items->item_code}}"){
                        document.getElementById("barang[11]").value = "{{$items->item_description}}"
                        document.getElementById("satuan[11]").value = "{{$items->unit_meas_lookup_code}}"
                    }
        @endforeach
    }
    function myItem12(event){
        @foreach ($purchase_items as $items)
                    if(event.target.value === "{{$items->item_code}}"){
                        document.getElementById("barang[12]").value = "{{$items->item_description}}"
                        document.getElementById("satuan[12]").value = "{{$items->unit_meas_lookup_code}}"
                    }
        @endforeach
    }
    function myItem13(event){
        @foreach ($purchase_items as $items)
                    if(event.target.value === "{{$items->item_code}}"){
                        document.getElementById("barang[13]").value = "{{$items->item_description}}"
                        document.getElementById("satuan[13]").value = "{{$items->unit_meas_lookup_code}}"
                    }
        @endforeach
    }
    function myItem14(event){
        @foreach ($purchase_items as $items)
                    if(event.target.value === "{{$items->item_code}}"){
                        document.getElementById("barang[14]").value = "{{$items->item_description}}"
                        document.getElementById("satuan[14]").value = "{{$items->unit_meas_lookup_code}}"
                    }
        @endforeach
    }
    function myItem15(event){
        @foreach ($purchase_items as $items)
                    if(event.target.value === "{{$items->item_code}}"){
                        document.getElementById("barang[15]").value = "{{$items->item_description}}"
                        document.getElementById("satuan[15]").value = "{{$items->unit_meas_lookup_code}}"
                    }
        @endforeach
    }
    function myItem16(event){
        @foreach ($purchase_items as $items)
                    if(event.target.value === "{{$items->item_code}}"){
                        document.getElementById("barang[16]").value = "{{$items->item_description}}"
                        document.getElementById("satuan[16]").value = "{{$items->unit_meas_lookup_code}}"
                    }
        @endforeach
    }
    function myItem17(event){
        @foreach ($purchase_items as $items)
                    if(event.target.value === "{{$items->item_code}}"){
                        document.getElementById("barang[17]").value = "{{$items->item_description}}"
                        document.getElementById("satuan[17]").value = "{{$items->unit_meas_lookup_code}}"
                    }
        @endforeach
    }
    function myItem18(event){
        @foreach ($purchase_items as $items)
                    if(event.target.value === "{{$items->item_code}}"){
                        document.getElementById("barang[18]").value = "{{$items->item_description}}"
                        document.getElementById("satuan[18]").value = "{{$items->unit_meas_lookup_code}}"
                    }
        @endforeach
    }
    function myItem19(event){
        @foreach ($purchase_items as $items)
                    if(event.target.value === "{{$items->item_code}}"){
                        document.getElementById("barang[19]").value = "{{$items->item_description}}"
                        document.getElementById("satuan[19]").value = "{{$items->unit_meas_lookup_code}}"
                    }
        @endforeach
    }

    let today = new Date();
    let dd = String(today.getDate()).padStart(2, '0');
    let mm = String(today.getMonth() + 1).padStart(2, '0');
    let yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#dtmTanggalKebutuhan').attr('min', today);




</script>
@endpush
