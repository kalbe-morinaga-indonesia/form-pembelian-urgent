<div class="form-group">
    <label for="role">Role</label>
    <select name="role" id="role" class="form-control">
        @foreach ($roles as $item)
            <option value="{{ $item->id }}" {{ $role->id == $item->id ? 'selected' : '' }} {{ $role->id ? 'readonly' : '' }}>{{ $item->name }}</option>
        @endforeach
    </select>

    @error('role')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="form-group">
    <label for="permissions">Permissions</label>
    <br>
    @foreach ($permissions as $permission)
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="{{ $permission->name }}" name="permissions[]" value="{{ $permission->id }}" {{ $role->permissions()->find($permission->id) ? 'checked' : '' }}>
        <label class="form-check-label" for="{{ $permission->name }}">{{ $permission->name }}</label>
    </div>
    @endforeach
    @error('permissions')
    <div class="alert alert-danger mt-4">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">{{ $button }}</button>
