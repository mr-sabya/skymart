<div class="form-group">
    <label for="{{ $name }}">{{ $title }}</label>
    <div class="card-input-image {{ isset($value) ? 'active' : '' }}" id="{{ $cardid }}">
        <input type="file" id="{{ $name }}" name="{{ $name }}" class="input-image" accept=".png, .jpg, .jpeg" onchange="onchange_value('{{ $name }}', '{{ $cardid }}')" />
        <label for="{{ $name }}" class="label-upload-image">
            @if(!isset($value))
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12 20c-4.41 0-8-3.59-8-8s3.59-8 8-8s8 3.59 8 8s-3.59 8-8 8m0-18A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2m1 5h-2v4H7v2h4v4h2v-4h4v-2h-4V7Z" />
            </svg>
            Upload File
            @endif
        </label>
        <button type="button" class="btn-delete" onclick="delete_value('{{ $name }}', '{{ $cardid }}')">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256">
                <path fill="currentColor" d="M208.5 191.5a12 12 0 0 1 0 17a12.1 12.1 0 0 1-17 0L128 145l-63.5 63.5a12.1 12.1 0 0 1-17 0a12 12 0 0 1 0-17L111 128L47.5 64.5a12 12 0 0 1 17-17L128 111l63.5-63.5a12 12 0 0 1 17 17L145 128Z" />
            </svg>
            Delete
        </button>
        @if(isset($value))
        <img src="{{ $value }}" class="image-preview" alt="" />
        @else
        <img src="" class="image-preview" alt="" />
        @endif
    </div>

</div>