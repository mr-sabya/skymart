@extends('layouts.backend')
@section('content')

<div class="row">

    <!-- Column starts -->
    <div class="col-xl-12">
        <div class="card dz-card">
            <div class="card-header flex-wrap d-flex justify-content-between">
                <div>
                    <h4 class="card-title">{{ $title }}</h4>
                    <p class="m-0 subtitle">All <code>{{ $list_page }}</code></p>
                </div>
                <div>
                    <a href="{{ route('admin.product-image.index', $product->id) }}" class="btn btn-primary"><i class="fa-regular fa-image me-2"></i>Image</a>
                    <a href="{{ route('admin.product.create')}}" class="btn btn-primary"><i class="fa-solid fa-circle-info me-2"></i> Info</a>
                    <a href="{{ route('admin.product.create')}}" class="btn btn-primary"><i class="fa-solid fa-list me-2"></i>Variations</a>
                </div>
                <div>
                    <a href="{{ route('admin.product.edit', $product->id)}}" class="btn btn-primary"><i class="fa-solid fa-pencil-alt me-2"></i>Edit</a>
                    <a href="{{ route('admin.product.create')}}" class="btn btn-danger"><i class="fa-solid fa-trash me-2"></i>Delete</a>
                </div>
            </div>

            <!-- /tab-content -->

            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <!-- Tab panes -->
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                                <img class="img-fluid rounded  " src="{{ getFileUrl($product->image )}}" alt="">
                                            </div>
                                            @foreach($product->images as $image)
                                            <div class="tab-pane fade" id="image_{{ $image->id }}" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                                <img class="img-fluid rounded " src="{{ getFileUrl($image->image)}}" alt="">
                                            </div>
                                            @endforeach
                                            
                                        </div>
                                        <div class="tab-slide-content new-arrival-product mb-4 mb-xl-0">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs slide-item-list mt-3" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a href="#first" class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" role="tab" aria-controls="home-tab-pane" aria-selected="true"><img class="img-fluid me-2 rounded" src="{{ getFileUrl($product->image )}}" alt="" width="80"></a>
                                                </li>
                                                @foreach($product->images as $image)
                                                <li class="nav-item" role="presentation">
                                                    <a href="#{{$loop->index}}" class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#image_{{ $image->id }}" role="tab" aria-controls="image_{{ $image->id }}" aria-selected="false"><img class="img-fluid me-2 rounded" src="{{ getFileUrl($image->image)}}" alt="" width="80"></a>
                                                </li>
                                                @endforeach
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <!--Tab slider End-->
                                    <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12">
                                        <div class="product-detail-content">
                                            <!--Product details-->
                                            <div class="new-arrival-content pr">
                                                <h4>{{ $product->name }}</h4>
                                                <div class="comment-review star-rating d-flex">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>

                                                </div>
                                                <div class="d-table mb-2">
                                                    <p class="price float-start d-block">${{ $product->price }} @if($product->actual_price != NULL)<span class="actual-price">${{ $product->actual_price }}</span> @endif</p>
                                                </div>
                                                <p>Availability: <span class="item"> In stock {{ $product->stock }} <i class="fa fa-shopping-basket"></i></span>
                                                </p>
                                                <p>Product code: <span class="item">{{ $product->sku }}</span> </p>
                                                <p>Brand: <span class="item">{{ $product->brand['name']}}</span></p>
                                                <p>Product Categories:&nbsp;&nbsp;
                                                    @foreach($product->categories as $category)
                                                    <span class="badge badge-success light">{{ $category->name }}</span>
                                                    @endforeach
                                                </p>
                                                <p>Product Attributes:&nbsp;&nbsp;
                                                    @foreach($product->attributes as $attribute)
                                                    <span class="badge badge-success light">{{ $attribute->name }}</span>
                                                    @endforeach
                                                </p>
                                                <p class="text-content">{{ $product->short_description }}</p>
                                                <div class="d-flex align-items-end flex-wrap mt-4">
                                                    <div class="filtaring-area me-3">
                                                        <div class="size-filter">
                                                            <h4 class="m-b-15">Size</h4>
                                                            <div class="d-flex select-size mb-2" role="group" aria-label="Basic radio toggle button group">
                                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" checked>
                                                                <label class="btn btn-outline-primary sharp sharp-lg" for="btnradio1">XS</label>

                                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2">
                                                                <label class="btn btn-outline-primary sharp sharp-lg" for="btnradio2">SM</label>

                                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio3">
                                                                <label class="btn btn-outline-primary sharp sharp-lg" for="btnradio3">MD</label>

                                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio4">
                                                                <label class="btn btn-outline-primary sharp sharp-lg" for="btnradio4">LG</label>

                                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio5">
                                                                <label class="btn btn-outline-primary sharp sharp-lg" for="btnradio5">XL</label>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Description</h4>
                            </div>
                            <div class="card-body">
                                {!! $product->description !!}
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <!-- /tab-content -->

        </div>
    </div>
    <!-- Column ends -->

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