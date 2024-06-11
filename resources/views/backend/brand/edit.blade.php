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
                <a href="{{ route('admin.brand.index')}}" class="btn btn-primary"><i class="fa-solid fa-bars me-2"></i>{{ $list_page }}</a>
            </div>

            <!-- /tab-content -->

            <div class="card-body pt-0">

                <form action="{{ route('admin.brand.update', $brand->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-backend.input-text title="Name" name="name" value="{{ $brand->name }}"></x-backend.input-text>
                    <x-backend.input-text title="Slug" name="slug" value="{{ $brand->slug }}"></x-backend.input-text>

                    <x-backend.input-file title="Image" name="image" cardid="image_input" value="{{ getFileUrl($brand->image) }}"></x-backend.input-file>


                    <button class="btn btn-primary">Save</button>
                </form>
            </div>

            <!-- /tab-content -->

        </div>
    </div>
    <!-- Column ends -->


    @endsection

    @section('scripts')

    @endsection