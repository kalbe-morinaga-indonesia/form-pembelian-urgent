    <div class="form-group">
        <label for="txtUom">UOM</label>
        <input type="text" class="form-control @error('txtUom') is-invalid  @enderror" name="txtUom"
            id="txtUom" placeholder="Masukkan UOM" value="{{ old('txtUom') ?? $uom->txtUom }}">
        @error('txtUom')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button class="btn btn-primary">{{ $button }}</button>
