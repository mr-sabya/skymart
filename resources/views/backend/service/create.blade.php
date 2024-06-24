@extends('layouts.backend')
@section('content')

<div class="row">

    <!-- Column starts -->
    <div class="col-lg-6">
        <div class="card dz-card">
            <div class="card-header flex-wrap d-flex justify-content-between">
                <div>
                    <h4 class="card-title">{{ $title }}</h4>
                    <p class="m-0 subtitle">Add New <code>{{ $title }}</code></p>
                </div>
                <a href="{{ route('admin.service.index')}}" class="btn btn-primary"><i class="fa-solid fa-bars me-2"></i>{{ $list_page }}</a>
            </div>

            <!-- /tab-content -->

            <div class="card-body pt-0">

                <form action="{{ route('admin.service.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-backend.input-text title="Title" name="title" value="{{ old('title') }}"></x-backend.input-text>
                    <x-backend.input-text title="Text" name="text" value="{{ old('text') }}"></x-backend.input-text>
                    <x-backend.input-file title="Image" name="image" cardid="image_input"></x-backend.input-file>
                    <x-backend.dynamic-checkbox title="Is Active" name="is_active" id="is_active" value="1"></x-backend.dynamic-checkbox>

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