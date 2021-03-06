<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="txtNama">Requester Name</label>
            <input type="text" class="form-control @error('muser_id') is-invalid @enderror" value="{{ Auth::user()->txtNama }}"
            readonly>
        <input type="hidden" name="muser_id" value="{{ Auth::user()->id }}">
    </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="txtNoPurchaseRequest">No PR/WO</label>
            <input type="text" name="txtNoPurchaseRequest" id="txtNoPurchaseRequest" class="form-control @error('txtNoPurchaseRequest') is-invalid @enderror" placeholder="Masukkan No PR/WO" value="{{ old('txtNoPurchaseRequest') ?? $purchase->txtNoPurchaseRequest }}">
            @error('txtNoPurchaseRequest')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="dtmTanggalKebutuhan">Need By Date</label>
            <input type="date" name="dtmTanggalKebutuhan" id="dtmTanggalKebutuhan" class="form-control @error('dtmTanggalKebutuhan') is-invalid @enderror" value="{{ old('dtmTanggalKebutuhan') ?? $purchase->dtmTanggalKebutuhan }}">
            @error('dtmTanggalKebutuhan')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

    <div class="table-responsive">
        <table class="table table-striped" id="dynamicAddRemove">
            <thead>
                <tr>
                    <th>Item Code</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Keterangan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($purchase->mbarangs as $key => $barang)
                <tr>
                    <input type="hidden" name="barang[{{$key}}][id]" value="{{$barang->id}}">
                    <td>
                        <input type="text" class="form-control" placeholder="Item Code" name="barang[{{$key}}][txtItemCode]" value="{{$barang->txtItemCode}}"
                            required>
                    </td>
                    <td>
                        <input type="text" class="form-control" placeholder="Nama Barang"
                            name="barang[{{$key}}][txtNamaBarang]" value="{{$barang->txtNamaBarang}}" required>
                    </td>
                    <td><input type="number" class="form-control" placeholder="Jumlah" value="{{$barang->intJumlah}}" name="barang[{{$key}}][intJumlah]"
                            required></td>
                    <td>
                        <input type="hidden" class="form-control" placeholder="Satuan" value="{{$barang->muom_id}}" name="barang[{{$key}}][muom_id]"
                            required>
                        <input type="text" class="form-control" placeholder="Satuan" value="{{$barang->uom->txtUom}}">
                        </td>
                    <td><input type="text" class="form-control" placeholder="Keterangan"
                            name="barang[{{$key}}][txtKeterangan]" value="{{$barang->txtKeterangan}}"></td>
                </tr>
                @empty
                    <tr>
                        <td>
                            <input type="text" class="form-control" placeholder="Item Code" name="barang[0][txtItemCode]"
                                required>
                        </td>
                        <td>
                            <input type="text" class="form-control" placeholder="Nama Barang" name="barang[0][txtNamaBarang]" required>
                        </td>
                        <td><input type="number" class="form-control" placeholder="Jumlah" name="barang[0][intJumlah]" required></td>
                        <td>
                            <select name="barang[0][muom_id]" class="form-control">
                                @forelse ($uoms as $uom)
                                    <option value="{{$uom->id}}">{{$uom->txtUom}}</option>
                                @empty
                                    <option>Tidak ada data</option>
                                @endforelse
                            </select>
                        </td>
                        <td><input type="text" class="form-control" placeholder="Keterangan" name="barang[0][txtKeterangan]"></td>
                        <td><button class="btn btn-primary" id="dynamic-ar" type="button">Tambah</button></td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>


<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="reason">Reason</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="txtReason" id="breakdown" value="Breakdown" @if(old('txtReason')=="Breakdown" ) checked @elseif ($purchase->txtReason == 'Breakdown')
                checked
                @endif>
                <label class="form-check-label" for="breakdown">
                    Breakdown
                </label>
                @error('txtReason')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="txtReason" id="iddle_produksi" value="Iddle Produksi" @if(old('txtReason')=="Iddle Produksi" ) checked @elseif ($purchase->txtReason == 'Iddle Produksi')
                checked
                @endif>
                <label class="form-check-label" for="iddle_produksi">
                    Iddle Produksi
                </label>
                @error('txtReason')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="txtReason" id="human_error"
                    value="Human Error (Miss Planning)" @if (old('txtReason')=="Human Error (Miss Planning)" ) checked
                    @elseif ($purchase->txtReason == 'Human Error (Miss Planning)') checked
                @endif>
                <label class="form-check-label" for="human_error">
                    Human Error (Miss Planning)
                </label>
                @error('txtReason')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="txtReason" id="safety_k3" value="Safety K3" @if(old('txtReason')=="Safety K3" ) checked @elseif ($purchase->txtReason == 'Safety K3')checked
                @endif>
                <label class="form-check-label" for="safety_k3">
                    Safety K3
                </label>
                @error('txtReason')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label for="txtFile">Upload File</label>
            <br>
            <small>Tekan tombol <code>alt</code> untuk menambahkan beberapa file</small>
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('txtFile.*') is-invalid @enderror" id="txtFile"
                    name="txtFile[]" multiple title="Tekan alt jika ingin menambahkan beberapa file">
                <label class="custom-file-label" for="txtFile">Upload file</label>
            </div>
            @error('txtFile.*')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

    <button class="btn btn-primary d-block ml-auto">{{ $button }}</button>
