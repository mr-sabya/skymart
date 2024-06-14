@extends('layouts.backend')
@section('content')

<div class="row">

    <!-- Column starts -->
    <div class="col-lg-12">
        <div class="card dz-card">
            <div class="card-header flex-wrap d-flex justify-content-between">
                <div>
                    <h4 class="card-title">{{ $title }}</h4>
                    <p class="m-0 subtitle">Add New <code>{{ $title }}</code></p>
                </div>
                <a href="{{ route('admin.brand.index')}}" class="btn btn-primary"><i class="fa-solid fa-bars me-2"></i>{{ $list_page }}</a>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <form action="{{ route('admin.brand.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="card dz-card">
                        <div class="card-header">
                            <h4 class="card-title">Basic Info</h4>
                        </div>
                        <div class="card-body pt-0">
                            <x-backend.input-text title="Name" name="name" value="{{ old('name') }}"></x-backend.input-text>
                            <x-backend.input-text title="Slug" name="slug" value="{{ old('slug') }}"></x-backend.input-text>
                            <x-backend.textarea title="Short Description" name="short_description"></x-backend.textarea>

                        </div>
                    </div>

                    <div class="card dz-card">
                        <div class="card-header">
                            <h4 class="card-title">Product Info</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-lg-6">
                                    <x-backend.input-text title="SKU" name="sku" value="{{ old('sku') }}"></x-backend.input-text>
                                </div>
                                <div class="col-lg-6">
                                    <x-backend.input-number title="Stock" name="stock" value="{{ old('stock') }}"></x-backend.input-number>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <x-backend.input-date title="Manufacturing Date" name="mfg_date" value="{{ old('mfg_date') }}"></x-backend.input-date>
                                </div>
                                <div class="col-lg-6">
                                    <x-backend.input-date title="Expiration Date" name="exp_date" value="{{ old('exp_date') }}"></x-backend.input-date>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <x-backend.input-text title="Price" name="price" value="{{ old('price') }}"></x-backend.input-text>
                                </div>
                                <div class="col-lg-4">
                                    <x-backend.input-text title="Actual Price" name="actual_price" value="{{ old('actual_price') }}"></x-backend.input-text>
                                </div>
                                <div class="col-lg-4">
                                    <x-backend.input-text title="Off(%)" name="off" value="{{ old('off') }}"></x-backend.input-text>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card dz-card">
                        <div class="card-header">
                            <h4 class="card-title">Description</h4>
                        </div>
                        <div class="card-body pt-0">
                            <x-backend.textarea title="Description" name="description"></x-backend.textarea>
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="card dz-card">
                        <div class="card-header">
                            <h4 class="card-title">Brand</h4>
                        </div>
                        <div class="card-body pt-0">
                            <label for="">Brand</label>
                            @foreach($brands as $brand)
                            <x-backend.dynamic-checkbox title="{!! $brand->name !!}" name="brand_id" id="brand_id" value="{{ $brand->id }}" class="parent"></x-backend.dynamic-checkbox>
                            @endforeach
                        </div>
                    </div>

                    <div class="card dz-card">
                        <div class="card-header">
                            <h4 class="card-title">Category</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="form-group dynamic-check">
                                <label for="">Category</label>
                                @foreach($categories as $category)
                                <div class="parent-box">
                                    <x-backend.dynamic-checkbox title="{!! $category->name !!}" name="category[]" id="category_{{ $category->id }}" value="{{ $category->id }}" class="parent"></x-backend.dynamic-checkbox>

                                    @if($category->childs->count() > 0)
                                    @foreach($category->childs as $subcat)
                                    <div class="subcat-box">
                                        <x-backend.dynamic-checkbox title="{!! $subcat->name !!}" name="category[]" id="category_{{ $subcat->id }}" value="{{ $subcat->id }}" class="subcat"></x-backend.dynamic-checkbox>

                                        @if($subcat->childs->count() > 0)
                                        @foreach($subcat->childs as $child)
                                        <div class="child-box">
                                            <x-backend.dynamic-checkbox title="{!! $child->name !!}" name="category[]" id="category_{{ $child->id }}" value="{{ $child->id }}" class="child"></x-backend.dynamic-checkbox>
                                        </div>
                                        @endforeach

                                        @endif
                                    </div>
                                    @endforeach

                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card dz-card">
                        <div class="card-header">
                            <h4 class="card-title">Product Image</h4>
                        </div>
                        <div class="card-body pt-0">
                            <x-backend.input-file title="Image" name="image" cardid="image_input"></x-backend.input-file>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>



</div>
</div>
<!-- Column ends -->


@endsection

@section('scripts')
<script>
    $('#description').summernote({
        placeholder: 'Write down product description',
        tabsize: 2,
        height: 500
    });
</script>
@endsection