<div class="mb-3">
    <label class="form-label">{{ $label }}</label>
    <input
        type="{{ $type }}"
        class="form-control @error($name) is-invalid @enderror"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}">

    @error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
