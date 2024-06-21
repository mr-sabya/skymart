<div class="form-group">
    <label for="{{ $name }}">{{ $title }}</label>
    <select class="form-control" name="{{ $name }}" id="{{ $name}}">
        <option value="">None</option>
        @foreach($items as $item)
        <option value="{{ $item->id }}" {{ isset($value) ? $value == $item->id ? 'selected' : '' : '' }}>{{ $item->name }}</option>
        @if($item->childs->count() > 0)
        @foreach($item->childs as $child)
        <option value="{{ $child->id }}" {{ isset($value) ? $value == $child->id ? 'selected' : '' : '' }}>--{{ $child->name }}</option>
        @endforeach
        @endif
        @endforeach
    </select>
</div>