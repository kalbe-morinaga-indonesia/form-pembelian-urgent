    <div class="form-group">
        <label for="txtIdLokasi">ID Lokasi</label>
        <input type="text" class="form-control @error('txtIdLokasi') is-invalid  @enderror" name="txtIdLokasi"
            id="txtIdLokasi" placeholder="Masukkan ID Lokasi"
            value="{{ old('txtIdLokasi') ?? $lokasi->txtIdLokasi }}" @if($lokasi->txtIdLokasi)
            readonly @endif>
        @if ($button === 'Tambah')
        <small>ID Lokasi tidak bisa diubah</small>
        @endif
        @error('txtIdLokasi')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="txtNamaLokasi">Nama Lokasi</label>
        <input type="text" class="form-control @error('txtNamaLokasi') is-invalid  @enderror" name="txtNamaLokasi"
            id="txtNamaLokasi" placeholder="Masukkan Nama Lokasi"
            value="{{ old('txtNamaLokasi') ?? $lokasi->txtNamaLokasi }}">
        @error('txtNamaLokasi')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button class="btn btn-primary" type="submit">{{ $button }}</button>
