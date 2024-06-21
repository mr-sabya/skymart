<div class="form-check custom-checkbox {{ isset($class) ? $class : '' }}">
    <input type="checkbox" class="form-check-input" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}" {{ isset($checked) ? $checked == 'checked' ? 'checked' : '' : ''}}>
    <label class="form-check-label" for="{{ $id }}">{{ $title }}</label>
</div>