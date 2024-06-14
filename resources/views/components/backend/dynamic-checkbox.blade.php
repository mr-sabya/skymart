<div class="form-check custom-checkbox {{ isset($class) ? $class : '' }}">
    <input type="checkbox" class="form-check-input" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}">
    <label class="form-check-label" for="{{ $id }}">{{ $title }}</label>
</div>