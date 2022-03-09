<input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" class="form-control @error($name) is-invalid @enderror" @if ($value !== null && $value !== "") value="{{ $value }}" @else value="{{ old($name) }}"  @endif placeholder="{{ $placeholder }}" {{ $isReadOnly }}>
<div class="text-danger">
    @error($name)
        $message
    @enderror
</div>
