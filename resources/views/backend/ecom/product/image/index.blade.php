@extends('layouts.backend')
@section('content')

<div class="row">

    <!-- Column starts -->
    <a href="{{ route('admin.product.show', $product->id) }}"><i class="fa-solid fa-arrow-left me-2"></i> Go Back</a>
    <div class="col-xl-12">
        <div class="card dz-card">

            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="card-title">{{ $product->name }} - {{ $title }}</h4>
                    <p class="m-0 subtitle">All <code>{{ $list_page }}</code></p>
                </div>
                <a href="{{ route('admin.product-image.create', $product->id)}}" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>{{ $title }}</a>
            </div>


            <!-- /tab-content -->

            <div class="card-body pt-0">

                <div class="row">
                    @if($images->count() > 0)
                    @foreach($images as $image)
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="new-arrivals-img-contnent">
                                        <img class="img-fluid" src="{{ getFileUrl($image->image) }}" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4><a href="ecom-product-detail.html">{{ $image->name }}</a></h4>
                                        <ul class="d-flex gap-1 justify-content-center">
                                            <li><a href="{{ route('admin.product-image.edit', $image->id) }}" class="btn btn-primary shadow btn-xs sharp me-1 w-auto px-2"><i class="fa-solid fa-pencil-alt me-2"></i>Edit</a></li>
                                            <li><a href="javascript:void(0)" class="delete btn btn-danger shadow btn-xs sharp me-1 w-auto px-2" data-url="{{ route('admin.product-image.destroy', $image->id) }}"><i class="fa-solid fa-trash me-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-lg-12">
                        <h4 class="text-center">No Image Found</h4>
                    </div>
                    @endif
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
                    <h3>Do you want to delete this image?</h3>
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