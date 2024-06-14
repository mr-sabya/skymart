<div class="form-group">
    <label for="{{ $name }}">{{ $title }}</label>
    <input type="date" class="form-control error-input" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}">
    @if($errors->has($name))
    <small id="{{$name}}_error" class="text-danger">{{ $errors->first($name)}}</small>
    @endif
</div>