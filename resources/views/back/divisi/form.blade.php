<div class="form-group">
    <label for="txtIdDivisi">ID Divisi</label>
    <input type="text" class="form-control @error('txtIdDivisi') is-invalid  @enderror" name="txtIdDivisi"
        id="txtIdDivisi" placeholder="Masukkan ID Divisi"
        value="{{ old('txtIdDivisi') ?? $divisi->txtIdDivisi }}">
    @error('txtIdDivisi')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="txtNamaDivisi">Nama Divisi</label>
    <input type="text" class="form-control @error('txtNamaDivisi') is-invalid  @enderror" name="txtNamaDivisi"
        id="txtNamaDivisi" placeholder="Masukkan Nama Divisi" value="{{ old('txtNamaDivisi') ?? $divisi->txtNamaDivisi }}">
    @error('txtNamaDivisi')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<button class="btn btn-primary" type="submit">{{ $button }}</button>
