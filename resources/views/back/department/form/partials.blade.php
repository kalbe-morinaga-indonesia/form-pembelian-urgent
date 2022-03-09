    <div class="form-group">
        <label for="txtNamaDept">Nama Department</label>
        <input type="text" class="form-control @error('txtNamaDept') is-invalid  @enderror" name="txtNamaDept" id="txtNamaDept"
            placeholder="Masukkan Nama Department" value="{{ old('txtNamaDept') ?? $department->txtNamaDept }}">
        @error('txtNamaDept')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button class="btn btn-primary" type="submit">{{ $button }}</button>
