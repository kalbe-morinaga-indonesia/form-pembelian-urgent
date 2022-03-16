    <div class="form-group">
        <label>Requester Name</label>
        <input type="text" class="form-control" placeholder="Masukkan Requester Name">
    </div>
    <div class="form-group">
        <label>Department</label>
        <select class="form-control">
            @forelse ($departments as $department)
            <option value="{{ $department->id }}">{{ $department->txtNamaDept }}</option>
            @empty

            @endforelse
        </select>
    </div>
    <div class="form-group">
        <label>No PR/WO</label>
        <input type="text" class="form-control" placeholder="Masukkan No PR/WO">
    </div>
    <div class="form-group">
        <label>Date Created</label>
        <input type="date" class="form-control">
    </div>
    <div class="form-group">
        <label>Date Required</label>
        <input type="date" class="form-control">
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Keterangan</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="form-group">
        <label>Upload File</label>
        <input type="file" class="form-control">
    </div>

    <div class="form-group">
        <label>Reason</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
            <label class="form-check-label" for="exampleRadios1">
                Breakdown
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
            <label class="form-check-label" for="exampleRadios1">
                Jadwal Produksi
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
            <label class="form-check-label" for="exampleRadios1">
                Human Error (Miss Planning)
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
            <label class="form-check-label" for="exampleRadios1">
                Safety K3
            </label>
        </div>
    </div>

    <button class="btn btn-primary d-block ml-auto">{{ $button }}</button>
