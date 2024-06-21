<div class="form-group">
    <label for="{{ $name }}">{{ $title }}</label>
    <textarea class="form-control" name="{{ $name }}" id="{{ $name }}" cols="50" rows="5">{{ isset($value) ? $value : '' }}</textarea>
    @if($errors->has($name))
    <small id="{{$name}}_error" class="text-danger">{{ $errors->first($name)}}</small>
    @endif
</div>