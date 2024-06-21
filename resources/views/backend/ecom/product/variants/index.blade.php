@extends('layouts.backend')
@section('content')

<div class="row">

    <!-- Column starts -->
    <a href="{{ route('admin.product.show', $product->id) }}"><i class="fa-solid fa-arrow-left me-2"></i> Go Back</a>
    <div class="col-xl-12">

        <div class="default-tab">
            <ul class="nav nav-tabs" role="tablist" style="border-bottom: none;">
                @foreach($product->attributes as $attribute)
                <li class="nav-item" role="presentation">
                    <a class="nav-link px-4 py-2 {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab" href="#attribute_{{ $attribute->id }}" aria-selected="true" role="tab"> {{ $attribute->name }}</a>
                </li>
                @endforeach


            </ul>
            <div class="tab-content">
                @foreach($product->attributes as $attribute)
                <div class="tab-pane fade {{ $loop->first ? 'active show' : '' }}" id="attribute_{{ $attribute->id }}" role="tabpanel">
                    <div class="card dz-card" style="border-radius: 0 0.625rem 0.625rem 0.625rem; border-top: none;">
                        <div class="card-header flex-wrap d-flex justify-content-between">
                            <div>
                                <h4 class="card-title">{{ $attribute->name }}</h4>
                                <p class="m-0 subtitle">All <code>{{ $attribute->name }}</code></p>
                            </div>
                            <a href="{{ route('admin.product-variant.create', $product->id)}}?attribute={{ $attribute->id }}" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>{{ $attribute->name }}</a>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table id="example3" class="display table image-table" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Variation</th>
                                            <th>SKU</th>
                                            <th>Price</th>
                                            <th>Actual Price</th>
                                            <th>Stock</th>
                                            <th>Weight</th>
                                            <th>Length</th>
                                            <th>Width</th>
                                            <th>Height</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $variants = \App\Models\ProductVariation::where('product_id', $product->id)->where('attribute_id', $attribute->id)->get();
                                        @endphp

                                        @foreach($variants as $variant)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            @if($variant->attributeItem['image'] != NULL)
                                            <td>
                                                <img src="{{ getFileUrl($variant->attributeItem['image']) }}" alt="" style="width: 100px;">
                                            </td>
                                            @else
                                            <td></td>
                                            @endif

                                            <td class="{{ $variant->attributeItem['color_code'] != NULL ? 'd-flex' : '' }}">
                                                @if($variant->attributeItem['color_code'] != NULL)
                                                <div class="color me-2" style="background: {{ $variant->attributeItem['color_code'] }};"></div>
                                                @endif
                                                {{ $variant->attributeItem['name'] }}
                                            </td>

                                            <td>{{ $variant->sku == NULL ? 'None' : $variant->sku }}</td>
                                            <td>{{ $variant->price == NULL ? 'None' : $variant->price }}</td>
                                            <td>{{ $variant->actual_price == NULL ? 'None' : $variant->actual_price }}</td>
                                            <td>{{ $variant->stock == NULL ? 'None' : $variant->stock }}</td>
                                            <td>{{ $variant->weight == NULL ? 'None' : $variant->weight }}</td>
                                            <td>{{ $variant->length == NULL ? 'None' : $variant->length }}</td>
                                            <td>{{ $variant->width == NULL ? 'None' : $variant->width }}</td>
                                            <td>{{ $variant->height == NULL ? 'None' : $variant->height }}</td>

                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('admin.product-variant.edit', $variant->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa-solid fa-pencil-alt"></i></a>
                                                    <a href="javascript:void(0)" class="delete btn btn-danger shadow btn-xs sharp" data-url="{{ route('admin.product-variant.destroy', $variant->id) }}"><i class="fa-solid fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="delete_form">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <h3>Do you want to delete this data?</h3>
                    <p class="text-danger mb-0">This will effect on your website</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    $(document).on('click', '.delete', function() {
        let url = $(this).attr('data-url');
        $('#delete_form').attr('action', url);
        $('#delete_modal').modal('show');
    });
</script>
@endsection