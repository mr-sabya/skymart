<div class="form-group dynamic-input">
    <label for="{{ $name }}">{{ $title }}</label>
    <div class="input-link">
        <input type="text" class="form-control error-input {{ isset($status) ? $status : '' }}" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}" {{ isset($status) ? $status : '' }} placeholder="https://www.website.com">
        <button type="button" id="shop_page_link" class="btn btn-primary"> <i class="fa-solid fa-shop me-2"></i></button>
    </div>
    @if($errors->has($name))
    <small id="{{$name}}_error" class="text-danger">{{ $errors->first($name)}}</small>
    @endif
</div>