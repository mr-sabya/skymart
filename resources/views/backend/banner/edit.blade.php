@extends('layouts.backend')
@section('content')

<div class="row">

    <!-- Column starts -->
    <div class="col-lg-6">
        <div class="card dz-card">
            <div class="card-header flex-wrap d-flex justify-content-between">
                <div>
                    <h4 class="card-title">{{ $title }}</h4>
                    <p class="m-0 subtitle">Edit <code>{{ $title }}</code></p>
                </div>
                <a href="{{ route('admin.banner.index')}}" class="btn btn-primary"><i class="fa-solid fa-bars me-2"></i>{{ $list_page }}</a>
            </div>

            <!-- /tab-content -->

            <div class="card-body pt-0">

                <form action="{{ route('admin.banner.update', $banner->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-backend.static-select-option title="Type" name="type" :items=$types value="{{ $banner->type }}"></x-backend.static-select-option>
                    <x-backend.input-text title="Title" name="title" value="{!! $banner->title !!}"></x-backend.input-text>
                    <x-backend.input-text title="Button Text" name="button_text" value="{{ $banner->button_text }}"></x-backend.input-text>
                    <x-backend.input-link title="Button Link" name="link" value="{{ $banner->link }}"></x-backend.input-link>
                    <x-backend.input-file title="Image" name="image" cardid="image_input" value="{{ getFileUrl($banner->image) }}"></x-backend.input-file>
                    <x-backend.dynamic-checkbox title="Is Active" name="is_active" id="is_active" value="1" checked="{{ $banner->is_active == 1 ? 'checked' : '' }}"></x-backend.dynamic-checkbox>

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