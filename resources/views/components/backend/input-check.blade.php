<div class="form-check custom-checkbox mb-3">
    <input type="checkbox" class="form-check-input" id="{{ $name }}" name="{{ $name }}" value="1" {{ isset($value) ? $value == 1 ? 'checked' : '' : ''}}>
    <label class="form-check-label" for="{{ $name }}">{{ $title }}</label>
</div>