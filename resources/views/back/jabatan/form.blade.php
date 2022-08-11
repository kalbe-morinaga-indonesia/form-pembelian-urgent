    <div class="form-group">
        <label for="txtIdJabatan">ID Jabatan</label>
        <input type="text" class="form-control @error('txtIdJabatan') is-invalid  @enderror" name="txtIdJabatan"
            id="txtIdJabatan" placeholder="Masukkan Nama ID Jabatan"
            value="{{ old('txtIdJabatan') ?? $jabatan->txtIdJabatan }}" @if($jabatan->txtIdJabatan)
            readonly @endif>
        @if ($button === 'Tambah')
        <small>ID Jabatan tidak bisa diubah</small>
        @endif
        @error('txtIdJabatan')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="txtIdDept">Department</label>
        <select name="txtIdDept" id="txtIdDept" class="form-control select2bs4" style="width: 100%;">
            @forelse ($departments as $department)
            <option value="{{ $department->txtIdDept }}" {{ old('txtIdDept') ?? $department->txtIdDept == $department->txtIdDept ?
                'selected' : '' }}>
                {{ $department->txtNamaDept }}</option>
            @empty
            <option>Tidak ada data</option>
            @endforelse
        </select>
        @error('txtIdDept')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="txtNamaJabatan">Nama Jabatan</label>
        <input type="text" class="form-control @error('txtNamaJabatan') is-invalid  @enderror" name="txtNamaJabatan"
            id="txtNamaJabatan" placeholder="Masukkan Nama Jabatan"
            value="{{ old('txtNamaJabatan') ?? $jabatan->txtNamaJabatan }}">
        @error('txtNamaJabatan')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button class="btn btn-primary" type="submit">{{ $button }}</button>
