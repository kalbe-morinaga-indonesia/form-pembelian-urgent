    <div class="form-group">
        <label for="txtIdDept">ID Department</label>
        <input type="text" class="form-control @error('txtIdDept') is-invalid  @enderror" name="txtIdDept"
            id="txtIdDept" placeholder="Masukkan Nama ID Department"
            value="{{ old('txtIdDept') ?? $department->txtIdDept }}" @if($department->txtIdDept)
            readonly @endif>
        @if ($button === 'Tambah')
        <small>ID Dept tidak bisa diubah</small>
        @endif
        @error('txtIdDept')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="txtIdDivisi">Divisi</label>
        <select name="txtIdDivisi" id="txtIdDivisi" class="form-control select2bs4" style="width: 100%;">
            @forelse ($divisis as $divisi)
            <option value="{{ $divisi->txtIdDivisi }}" {{ old('txtIdDivisi') ?? $department->txtIdDivisi == $divisi->txtIdDivisi ?
                'selected' : '' }}>
                {{ $divisi->txtNamaDivisi }}</option>
            @empty
            <option>Tidak ada data</option>
            @endforelse
        </select>
        @error('txtIdDivisi')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="txtNamaDept">Nama Department</label>
        <input type="text" class="form-control @error('txtNamaDept') is-invalid  @enderror" name="txtNamaDept"
            id="txtNamaDept" placeholder="Masukkan Nama Department"
            value="{{ old('txtNamaDept') ?? $department->txtNamaDept }}">
        @error('txtNamaDept')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button class="btn btn-primary" type="submit">{{ $button }}</button>
