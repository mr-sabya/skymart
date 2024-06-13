@extends('layouts.backend')
@section('content')

<div class="row">

    <!-- Column starts -->
    <div class="col-xl-5">
        <div class="card dz-card">
            <div class="card-header flex-wrap d-flex justify-content-between">
                <div>
                    <h4 class="card-title">{{ $title }}</h4>
                    <p class="m-0 subtitle">Edit <code>{{ $title }}</code></p>
                </div>

            </div>

            <!-- /tab-content -->

            <div class="card-body pt-0">

                <form action="{{ route('admin.attribute-item.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-backend.input-text title="Name" name="name" value="{{ $item->name }}"></x-backend.input-text>

                    @if($attribute->type == 1)
                    <x-backend.input-color title="Color" name="color_code" value="{{ $item->color_code }}"></x-backend.input-color>
                    @elseif($attribute->type == 3)
                    <x-backend.input-file title="Image" name="image" cardid="image_input" value="{{ getFileUrl($item->image) }}"></x-backend.input-file>
                    @endif

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>

            <!-- /tab-content -->

        </div>
    </div>

    <!-- Column ends -->

</div>

@endsection


@section('scripts')

@endsection