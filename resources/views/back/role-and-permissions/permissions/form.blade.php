<div class="form-group">
    <label for="name">Nama</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama permission" value="{{ old('name') ?? $permission->name }}" autofocus>
    @error('name')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="guard_name">Guard</label>
    <select name="guard_name" id="guard_name" class="form-control">
        <option value="web" {{ $permission->guard_name == 'web' ? 'selected' : '' }}>Web</option>
        <option value="api" {{ $permission->guard_name == 'api' ? 'selected' : '' }}>Api</option>
    </select>
    @error('guard_name')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">{{ $button }}</button>
