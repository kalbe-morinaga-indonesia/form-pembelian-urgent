<div class="form-group">
    <label for="txtUsername">User By Username</label>

    @if ($user->txtUsername)
    <input type="text" name="txtUsername" id="txtUsername" class="form-control @error('txtUsername')
        is-invalid
    @enderror" value="{{ old('txtUsername') ?? $user->txtUsername }}" {{ $user->txtUsername ? 'disabled' : '' }}>

    @else
    <input name="txtUsername" class="form-control @error('txtUsername')
        is-invalid
    @enderror" list="datalistOptions" id="exampleDataList" placeholder="Cari username...">
    <datalist id="datalistOptions">
        @foreach ($users as $user)
        <option value="{{ $user->txtUsername }}">
            @endforeach
    </datalist>

    @endif
    @error('txtUsername')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="roles">Role</label>
    <br>
    @foreach ($roles as $role)
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="{{ $role->name }}" name="roles[]" value="{{ $role->id }}"
            {{ $user->roles()->find($role->id) ? 'checked' : '' }}>
        <label class="form-check-label" for="{{ $role->name }}">{{ $role->name }}</label>
    </div>
    @endforeach
    @error('roles')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">{{ $button }}</button>
