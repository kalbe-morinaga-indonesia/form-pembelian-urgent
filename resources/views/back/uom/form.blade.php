    <div class="form-group">
        <label for="txtItemCode">Item Code</label>
        <input type="text" class="form-control @error('txtItemCode') is-invalid  @enderror" name="txtItemCode"
            id="txtItemCode" placeholder="Masukkan Item Code" value="{{ old('txtItemCode') }}">
        @error('txtItemCode')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="dtmTanggalKebutuhan">Tanggal Kebutuhan</label>
        <input type="date" class="form-control @error('dtmTanggalKebutuhan') is-invalid  @enderror"
            name="dtmTanggalKebutuhan" id="dtmTanggalKebutuhan" placeholder="Masukkan Nama Department"
            value="{{ old('dtmTanggalKebutuhan')}}">
        @error('dtmTanggalKebutuhan')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="intJumlahKebutuhan">Jumlah Kebutuhan</label>
        <input type="number" min="1" class="form-control @error('intJumlahKebutuhan') is-invalid  @enderror"
            name="intJumlahKebutuhan" id="intJumlahKebutuhan" placeholder="Masukkan Nama Department"
            value="{{ old('intJumlahKebutuhan') }}">
        @error('intJumlahKebutuhan')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button class="btn btn-primary">{{ $button }}</button>
