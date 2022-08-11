    <div class="form-group">
        <label for="txtIdSubDept">ID Sub Department</label>
        <input type="text" class="form-control @error('txtIdSubDept') is-invalid  @enderror" name="txtIdSubDept"
            id="txtIdSubDept" placeholder="Masukkan ID Sub Department"
            value="{{ old('txtIdSubDept') ?? $subdepartment->txtIdSubDept }}" @if($subdepartment->txtIdSubDept)
            readonly @endif>
        @if ($button === 'Tambah')
        <small>ID Sub-Dept tidak bisa diubah</small>
        @endif
        @error('txtIdSubDept')
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
        <label for="txtNamaSubDept">Nama Sub Department</label>
        <input type="text" class="form-control @error('txtNamaSubDept') is-invalid  @enderror" name="txtNamaSubDept"
            id="txtNamaSubDept" placeholder="Masukkan Nama Department"
            value="{{ old('txtNamaSubDept') ?? $subdepartment->txtNamaSubDept }}">
        @error('txtNamaSubDept')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button class="btn btn-primary" type="submit">{{ $button }}</button>
