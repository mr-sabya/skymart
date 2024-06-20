@extends('layouts.backend')
@section('content')

<div class="row">

    <!-- Column starts -->
    <div class="col-lg-9">
        <div class="card dz-card">
            <div class="card-header flex-wrap d-flex justify-content-between">
                <div>
                    <h4 class="card-title">{{ $title }}</h4>
                    <p class="m-0 subtitle">Add New <code>{{ $title }}</code></p>
                </div>
                <a href="{{ route('admin.product-info.index', $product->id)}}" class="btn btn-primary"><i class="fa-solid fa-bars me-2"></i>{{ $list_page }}</a>
            </div>

            <!-- /tab-content -->

            <div class="card-body pt-0">
                <form action="{{ route('admin.product-info.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dynamic_field">
                            <tr>
                                <td><input type="text" name="title[]" placeholder="Enter Title" class="form-control" /></td>
                                <td><input type="text" name="info[]" placeholder="Enter Information" class="form-control" /></td>
                                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                            </tr>
                        </table>
                    </div>


                    <button type="submit" class="btn btn-primary">Save</button>
                </form>

            </div>

            <!-- /tab-content -->

        </div>
    </div>
    <!-- Column ends -->

    <div class="col-lg-3">
        <div class="card dz-card">
            <div class="card-header flex-wrap d-flex justify-content-between">
                <div>
                    <h4 class="card-title">Errors</h4>
                    <p class="m-0 subtitle">Error <code>List</code></p>
                </div>

            </div>
            <div class="card-body pt-0">
                @if($errors->any())
                @foreach($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    var i = 1;

    $('#add').click(function() {
        i++;
        $('#dynamic_field').append(
            '<tr id="row' + i + '" class="dynamic-added"><td>' +
            '<input type="text" name="title[]" placeholder="Enter Title" class="form-control" /></td>' +
            '<td><input type="text" name="info[]" placeholder="Enter Information" class="form-control" /></td>' +
            '<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>'
        );
    });

    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
</script>
@endsection