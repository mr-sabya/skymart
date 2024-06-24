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
                <a href="{{ route('admin.service.index')}}" class="btn btn-primary"><i class="fa-solid fa-bars me-2"></i>{{ $list_page }}</a>
            </div>

            <!-- /tab-content -->

            <div class="card-body pt-0">

                <form action="{{ route('admin.service.update', $service->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-backend.input-text title="Title" name="title" value="{!! $service->title !!}"></x-backend.input-text>
                    <x-backend.input-text title="Text" name="text" value="{{ $service->text }}"></x-backend.input-text>
                    <x-backend.input-file title="Image" name="image" cardid="image_input" value="{{ getFileUrl($service->image) }}"></x-backend.input-file>
                    <x-backend.dynamic-checkbox title="Is Active" name="is_active" id="is_active" value="1" checked="{{ $service->is_active == 1 ? 'checked' : '' }}"></x-backend.dynamic-checkbox>

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