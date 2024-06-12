<div class="form-group">
    <label for="{{ $name }}">{{ $title }}</label>
    <select class="form-control" name="{{ $name }}" id="{{ $name}}">
        <option value="" disabled selected>Select {{ $title }}</option>
        @foreach($items as $item)
        <option value="{{ $item['id'] }}" {{ isset($value) ? $value == $item['id'] ? 'selected' : '' : '' }}>{{ $item['name'] }}</option>
        @endforeach
    </select>
</div>