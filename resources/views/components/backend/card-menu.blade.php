@php
$model_prefix="App\Models";
$get_modal = $model_prefix.'\\'.$model;
$items = $get_modal::count();
$trashed_items = $get_modal::onlyTrashed()->count();
@endphp

<ul class="nav nav-pills mb-4 light">
    <li class=" nav-item">
        <a href="{{ route($mainlink)}}" class="nav-link {{ Route::is($mainlink) ? 'active' : '' }}"><i class="fa-solid fa-bars me-2"></i>All ({{ $items }})</a>
    </li>
    <li class="nav-item">
        <a href="{{ route($trashlink) }}" class="nav-link {{ Route::is($trashlink) ? 'active' : '' }}"><i class="fa-solid fa-trash me-2"></i>Trash ({{$trashed_items}})</a>
    </li>
</ul>