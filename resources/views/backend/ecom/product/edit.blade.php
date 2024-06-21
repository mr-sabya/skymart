@extends('layouts.backend')
@section('content')

<div class="row">

    <!-- Column starts -->
    <div class="col-lg-12">
        <div class="card dz-card">
            <div class="card-header flex-wrap d-flex justify-content-between">
                <div>
                    <h4 class="card-title">{{ $title }}</h4>
                    <p class="m-0 subtitle">Edit <code>{{ $title }}</code></p>
                </div>
                <a href="{{ route('admin.product.index')}}" class="btn btn-primary"><i class="fa-solid fa-bars me-2"></i>{{ $list_page }}</a>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-8">
                    <div class="card dz-card">
                        <div class="card-header">
                            <h4 class="card-title">Basic Info</h4>
                        </div>
                        <div class="card-body pt-0">
                            <x-backend.input-text title="Name" name="name" value="{{ $product->name }}"></x-backend.input-text>
                            <x-backend.input-text title="Slug" name="slug" value="{{ $product->slug }}"></x-backend.input-text>
                            <x-backend.textarea title="Short Description" name="short_description" value="{{ $product->short_description }}"></x-backend.textarea>

                        </div>
                    </div>

                    <div class="card dz-card">
                        <div class="card-header">
                            <h4 class="card-title">Product Info</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-lg-6">
                                    <x-backend.input-text title="SKU" name="sku" value="{{ $product->sku }}" status="disabled"></x-backend.input-text>
                                </div>
                                <div class="col-lg-6">
                                    <x-backend.input-number title="Stock" name="stock" value="{{ $product->stock }}"></x-backend.input-number>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <x-backend.input-date title="Manufacturing Date" name="mfg_date" value="{{ $product->mfg_date }}"></x-backend.input-date>
                                </div>
                                <div class="col-lg-6">
                                    <x-backend.input-date title="Expiration Date" name="exp_date" value="{{ $product->exp_date }}"></x-backend.input-date>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <x-backend.input-text title="Price" name="price" value="{{ $product->price }}"></x-backend.input-text>
                                </div>
                                <div class="col-lg-4">
                                    <x-backend.input-text title="Actual Price" name="actual_price" value="{{ $product->actual_price }}"></x-backend.input-text>
                                </div>
                                <div class="col-lg-4">
                                    <x-backend.input-number title="Off(%)" name="off" value="{{ $product->off }}"></x-backend.input-number>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="attribute">Attributes</label>
                                <select class="form-control" name="attribute[]" id="attribute" multiple="multiple">
                                    @foreach($attributes as $item)
                                    <option value="{{ $item->id }}" {{ $product->checkAttribute($item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="card dz-card">
                        <div class="card-header">
                            <h4 class="card-title">Description</h4>
                        </div>
                        <div class="card-body pt-0">
                            <x-backend.textarea title="Description" name="description" value="{!! $product->description !!}"></x-backend.textarea>
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
                            <x-backend.dynamic-checkbox title="{!! $brand->name !!}" name="brand_id" id="brand_id" value="{{ $brand->id }}" checked="{{ $product->brand_id == $brand->id ? 'checked' : '' }}"></x-backend.dynamic-checkbox>
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
                                    <x-backend.dynamic-checkbox title="{!! $category->name !!}" name="category[]" id="category_{{ $category->id }}" value="{{ $category->id }}" class="parent" checked="{{ $product->checkCategory($category->id) ? 'checked' : '' }}"></x-backend.dynamic-checkbox>

                                    @if($category->childs->count() > 0)
                                    @foreach($category->childs as $subcat)
                                    <div class="subcat-box">
                                        <x-backend.dynamic-checkbox title="{!! $subcat->name !!}" name="category[]" id="category_{{ $subcat->id }}" value="{{ $subcat->id }}" class="subcat" checked="{{ $product->checkCategory($subcat->id) ? 'checked' : '' }}"></x-backend.dynamic-checkbox>

                                        @if($subcat->childs->count() > 0)
                                        @foreach($subcat->childs as $child)
                                        <div class="child-box">
                                            <x-backend.dynamic-checkbox title="{!! $child->name !!}" name="category[]" id="category_{{ $child->id }}" value="{{ $child->id }}" class="child" checked="{{ $product->checkCategory($child->id) ? 'checked' : '' }}"></x-backend.dynamic-checkbox>
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
                            <x-backend.input-file title="Image" name="image" cardid="image_input" value="{{ getFileUrl($product->image) }}"></x-backend.input-file>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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

    $('#attribute').select2({
        placeholder: "Select attributes",
        allowClear: true
    });

    $('#actual_price').keyup(function() {
        if ($('#price').val() != '') {
            let price = parseFloat($('#price').val()).toFixed(2);
            let actual_price = parseFloat($(this).val()).toFixed(2);

            let diff = actual_price - price;
            let off = parseInt((diff * 100) / actual_price);

            $('#off').val(off);
        }

    });


    $('#off').keyup(function() {
        let actual_price = parseFloat($('#actual_price').val()).toFixed(2);
        let off = parseInt($('#off').val());

        let percentage = parseFloat((off * actual_price) / 100).toFixed(2);
        let price = actual_price - percentage;
        $('#price').val(price);
    });
</script>
@endsection