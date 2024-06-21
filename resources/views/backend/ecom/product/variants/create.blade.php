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
                <a href="{{ route('admin.product-variant.index', $product->id)}}" class="btn btn-primary"><i class="fa-solid fa-bars me-2"></i>{{ $list_page }}</a>
            </div>

            <!-- /tab-content -->

            <div class="card-body pt-0">

                <form action="{{ route('admin.product-variant.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="attribute_id" value="{{ $attribute->id }}">

                    <x-backend.select-option title="Variants" name="attribute_item_id" :items=$items></x-backend.select-option>

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
                            <x-backend.input-text title="Price" name="price" value="{{ old('price') }}"></x-backend.input-text>
                        </div>
                        <div class="col-lg-6">
                            <x-backend.input-text title="Actual Price" name="actual_price" value="{{ old('actual_price') }}"></x-backend.input-text>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-3">
                            <x-backend.input-text title="Weight" name="weight" value="{{ old('weight') }}"></x-backend.input-text>
                        </div>
                        <div class="col-lg-3">
                            <x-backend.input-text title="Length" name="length" value="{{ old('length') }}"></x-backend.input-text>
                        </div>
                        <div class="col-lg-3">
                            <x-backend.input-text title="Width" name="width" value="{{ old('width') }}"></x-backend.input-text>
                        </div>
                        <div class="col-lg-3">
                            <x-backend.input-text title="Height" name="height" value="{{ old('height') }}"></x-backend.input-text>
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