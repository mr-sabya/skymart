<div class="form-group">
    <label for="{{ $name }}">{{ $title }}</label>
    <input type="text" class="form-control error-input {{ isset($status) ? $status : '' }}" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}" {{ isset($status) ? $status : '' }}>
    @if($errors->has($name))
    <small id="{{$name}}_error" class="text-danger">{{ $errors->first($name)}}</small>
    @endif
</div>