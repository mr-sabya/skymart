<div class="form-group">
    <label for="{{ $name }}">{{ $title }}</label><br>
    <div class="d-flex gap-2">
        <div class="form-color">
            <div class="color-picker">
                <div class="color-input">
                    <input type="color" class="form-control" name="get_color" id="get_color" data-value="{{ $name }}" value="{{ isset($value) ? $value : '#f6f7f7' }}">
                </div>
                <div class="text">
                    <label for="get_color">Select Color</label>
                </div>
            </div>
        </div>
        <div>
            <input type="text" class="form-control" name="{{ $name }}" id="{{ $name }}" value="{{ isset($value) ? $value : '' }}">
        </div>
        <button type="button" id="remove_color" data-value="{{ $name }}" class="btn btn-primary {{ isset($value) ? '' : 'd-none' }}"><i class="fa-solid fa-times"></i> Remove</button>

    </div>
    @if($errors->has($name))
    <small id="{{$name}}_error" class="text-danger">{{ $errors->first($name)}}</small>
    @endif
</div>