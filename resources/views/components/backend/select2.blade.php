<div class="form-group">
    <label for="{{ $id }}">{{ $title }}</label>
    <select class="form-control" name="{{ $name }}" id="{{ $id}}" multiple="multiple">
        @foreach($items as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
</div>