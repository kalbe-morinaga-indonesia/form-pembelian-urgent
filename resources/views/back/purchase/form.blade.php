    <div class="form-group">
        <label for="txtNama">Requester Name</label>
        <input type="text" class="form-control @error('muser_id') is-invalid @enderror" value="{{ Auth::user()->txtNama }}" readonly>
        <input type="hidden" name="muser_id" value="{{ Auth::user()->id }}">
    </div>
    <div class="form-group">
        {{-- {{ dd($users->mdepartment) }} --}}
        <label for="mdepartment_id">Department</label>
        <select class="form-control @error('mdepartment_id') is-invalid @enderror" name="mdepartment_id"
            id="mdepartment_id">
            @forelse ($departments as $department)
            <option value="{{ $department->id }}" {{ Auth::user()->mdepartment_id == $department->id ? 'selected' : '' }}>{{ $department->txtNamaDept }}</option>
            @empty
            <option>Tidak ada data</option>
            @endforelse
        </select>
        @error('mdepartment_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="txtNoPurchaseRequest">No PR/WO</label>
        <input type="text" name="txtNoPurchaseRequest" id="txtNoPurchaseRequest"
            class="form-control @error('txtNoPurchaseRequest') is-invalid @enderror" placeholder="Masukkan No PR/WO" value="{{ old('txtNoPurchaseRequest') }}">
        @error('txtNoPurchaseRequest')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="dtmDateCreated">Date Created</label>
        <input type="date" name="dtmDateCreated" id="dtmDateCreated"
            class="form-control @error('dtmDateCreated') is-invalid @enderror">
        @error('dtmDateCreated')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="dtmDateRequired">Date Required</label>
        <input type="date" name="dtmDateRequired" id="dtmDateRequired"
            class="form-control @error('dtmDateRequired') is-invalid @enderror">
        @error('dtmDateRequired')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="table-responsive">
        <table class="table table-striped" id="dynamicAddRemove">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" class="form-control" placeholder="Nama Barang"
                            name="barang[0][txtNamaBarang]" required>
                    </td>
                    <td><input type="number" class="form-control" placeholder="Jumlah" name="barang[0][intJumlah]" required></td>
                    <td><input type="text" class="form-control" placeholder="Satuan" name="barang[0][txtSatuan]" required></td>
                    <td><input type="text" class="form-control" placeholder="Keterangan"
                            name="barang[0][txtKeterangan]"></td>
                    <td><button class="btn btn-primary" id="dynamic-ar" type="button">Tambah</button></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Keterangan</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="form-group">
        <label for="txtFile">Upload File</label>
        <br>
        <small>Tekan tombol <code>alt</code> untuk menambahkan beberapa file</small>
        <div class="custom-file">
            <input type="file" class="custom-file-input @error('txtFile') is-invalid @enderror" id="txtFile"
                name="txtFile[]" multiple title="Tekan alt jika ingin menambahkan beberapa file">
            <label class="custom-file-label" for="txtFile">Upload file</label>
        </div>
        @error('txtFile')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="reason">Reason</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="txtReason" id="breakdown" value="Breakdown">
            <label class="form-check-label" for="breakdown">
                Breakdown
            </label>
            @error('txtReason')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="txtReason" id="iddle_produksi" value="Iddle Produksi">
            <label class="form-check-label" for="iddle_produksi">
                Iddle Produksi
            </label>
            @error('txtReason')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="txtReason" id="human_error"
                value="Human Error (Miss Planning)">
            <label class="form-check-label" for="human_error">
                Human Error (Miss Planning)
            </label>
            @error('txtReason')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="txtReason" id="safety_k3" value="Safety K3">
            <label class="form-check-label" for="safety_k3">
                Safety K3
            </label>
            @error('txtReason')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <button class="btn btn-primary d-block ml-auto">{{ $button }}</button>
