@extends('layouts.backend')
@section('content')

<div class="row">

    <!-- Column starts -->
    <div class="col-lg-6">
        <div class="card dz-card">
            <div class="card-header flex-wrap d-flex justify-content-between">
                <div>
                    <h4 class="card-title">Category</h4>
                    <p class="m-0 subtitle">Add New <code>Category</code></p>
                </div>
                <a href="{{ route('admin.category.index')}}" class="btn btn-primary"><i class="fa-solid fa-bars me-2"></i>Categories</a>
            </div>

            <!-- /tab-content -->

            <div class="card-body pt-0">

                <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-backend.input-text title="Name" name="name" value="{{ old('name') }}"></x-backend.input-text>
                    <x-backend.input-text title="Slug" name="slug" value="{{ old('slug') }}"></x-backend.input-text>

                    <div class="row">
                        <div class="col-lg-6">
                            <x-backend.input-file title="Image" name="image" cardid="image_input"></x-backend.input-file>
                        </div>
                        <div class="col-lg-6">
                            <x-backend.input-file title="Icon" name="icon" cardid="icon_input"></x-backend.input-file>
                        </div>
                    </div>

                    <x-backend.select-option-m2m title="Parent" name="parent_id" :items=$categories></x-backend.select-option-m2m>
                    <x-backend.input-check title="Featured" name="is_featured"></x-backend.input-check>

                
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