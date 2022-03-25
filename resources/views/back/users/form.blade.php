    <div class="form-group">
        <label for="txtNik">NIK (Nomor Induk Kependudukan) <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('txtNik') is-invalid  @enderror" name="txtNik" id="txtNik"
            placeholder="Masukkan NIK" value="{{ old('txtNik') ?? $user->txtNik }}" autofocus @if($user->txtNik) readonly @endif>
        @error('txtNik')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="txtNama">Nama Lengkap <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('txtNama') is-invalid  @enderror" name="txtNama" id="txtNama"
            placeholder="Masukkan Nama User" value="{{ old('txtNama') ?? $user->txtNama }}">
        @error('txtNama')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="txtNoHp">Nomor Handhone</label>
        <input type="text" class="form-control @error('txtNoHp') is-invalid  @enderror" name="txtNoHp" id="txtNoHp"
            placeholder="Masukkan Nomor Handphone" value="{{ old('txtNoHp') ?? $user->txtNoHp }}">
        @error('txtNoHp')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="txtTempatLahir">Tempat Lahir</label>
                <input type="text" class="form-control @error('txtTempatLahir') is-invalid  @enderror"
                    name="txtTempatLahir" id="txtTempatLahir" placeholder="Masukkan Tempat Lahir"
                    value="{{ old('txtTempatLahir') ?? $user->txtTempatLahir }}">
                @error('txtTempatLahir')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="dtmTanggalLahir">Tanggal Lahir</label>
                <input type="date" class="form-control @error('dtmTanggalLahir') is-invalid  @enderror"
                    name="dtmTanggalLahir" id="dtmTanggalLahir" placeholder="Masukkan Tanggal Lahir"
                    value="{{ old('dtmTanggalLahir') ?? $user->dtmTanggalLahir }}">
                @error('dtmTanggalLahir')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="txtUsername">Username <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('txtUsername') is-invalid  @enderror" name="txtUsername"
            id="txtUsername" placeholder="Masukkan Username" value="{{ old('txtUsername') ?? $user->txtUsername }}">
        @error('txtUsername')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    @if ($button == 'Tambah')
        <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="txtPassword">Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control @error('txtPassword') is-invalid  @enderror" name="txtPassword"
                    id="txtPassword" placeholder="Masukkan Password"
                    value="{{ old('txtPassword') ?? $user->txtPassword }}">
                @error('txtPassword')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="txtPassword_confirmation">Konfirmasi Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control @error('txtPassword_confirmation') is-invalid  @enderror" name="txtPassword_confirmation"
                    id="txtPassword" placeholder="Masukkan Konfirmasi Password" value="{{ old('txtPassword_confirmation') ?? $user->txtPassword }}">
                @error('txtPassword_confirmation')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    @endif
    <div class="form-group">
        <label for="txtAlamat">Alamat </label>
        <textarea class="form-control @error('txtAlamat') is-invalid  @enderror" name="txtAlamat" id="txtAlamat"
            placeholder="Masukkan Alamat">{{ old('txtAlamat') ?? $user->txtAlamat }}</textarea>
        @error('txtAlamat')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="mdepartment_id">Departmen <span class="text-danger">*</span></label>
        <select name="mdepartment_id" id="mdepartment_id" class="form-control select2bs4" style="width: 100%;">
            @forelse ($departments as $department)
                <option value="{{ $department->id }}" {{ old('mdepartment_id') ?? $user->mdepartment_id == $department->id ? 'selected' : '' }}>{{ $department->txtNamaDept }}</option>
            @empty
                <option>Tidak ada data</option>
            @endforelse
        </select>
        @error('mdepartment_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button class="btn btn-primary" type="submit">{{ $button }}</button>
