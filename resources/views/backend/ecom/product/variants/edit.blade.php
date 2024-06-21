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
                <a href="{{ route('admin.product-variant.index', $product->id)}}" class="btn btn-primary"><i class="fa-solid fa-bars me-2"></i>{{ $list_page }}</a>
            </div>

            <!-- /tab-content -->

            <div class="card-body pt-0">

                <form action="{{ route('admin.product-variant.update', $variant->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-backend.select-option title="Variants" name="attribute_item_id" :items=$items value="{{ $variant->attribute_item_id }}"></x-backend.select-option>

                    <div class="row">
                        <div class="col-lg-6">
                            <x-backend.input-text title="SKU" name="sku" value="{{ $variant->sku }}"></x-backend.input-text>
                        </div>
                        <div class="col-lg-6">
                            <x-backend.input-number title="Stock" name="stock" value="{{ $variant->stock }}"></x-backend.input-number>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-6">
                            <x-backend.input-text title="Price" name="price" value="{{ $variant->price }}"></x-backend.input-text>
                        </div>
                        <div class="col-lg-6">
                            <x-backend.input-text title="Actual Price" name="actual_price" value="{{ $variant->actual_price }}"></x-backend.input-text>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-3">
                            <x-backend.input-text title="Weight" name="weight" value="{{ $variant->weight }}"></x-backend.input-text>
                        </div>
                        <div class="col-lg-3">
                            <x-backend.input-text title="Length" name="length" value="{{ $variant->length }}"></x-backend.input-text>
                        </div>
                        <div class="col-lg-3">
                            <x-backend.input-text title="Width" name="width" value="{{ $variant->width }}"></x-backend.input-text>
                        </div>
                        <div class="col-lg-3">
                            <x-backend.input-text title="Height" name="height" value="{{ $variant->height }}"></x-backend.input-text>
                        </div>
                    </div>

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