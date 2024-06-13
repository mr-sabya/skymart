@extends('layouts.backend')
@section('content')

<div class="row">

    <!-- Column starts -->
    <div class="col-xl-5">
        <div class="card dz-card">
            <div class="card-header flex-wrap d-flex justify-content-between">
                <div>
                    <h4 class="card-title">{{ $title }}</h4>
                    <p class="m-0 subtitle">Add New <code>{{ $title }}</code></p>
                </div>
                
            </div>

            <!-- /tab-content -->

            <div class="card-body pt-0">

                <form action="{{ route('admin.attribute-item.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="attribute_id" value="{{ $attribute->id }}">
                    <x-backend.input-text title="Name" name="name" value="{{ old('name') }}"></x-backend.input-text>
                    
                    @if($attribute->type == 1)
                    <x-backend.input-color title="Color" name="color_code" ></x-backend.input-color>
                    @elseif($attribute->type == 3)
                    <x-backend.input-file title="Image" name="image" cardid="image_input"></x-backend.input-file>
                    @endif

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>

            <!-- /tab-content -->

        </div>
    </div>
    <div class="col-xl-7">
        <div class="card dz-card">
            <div class="card-header flex-wrap d-flex justify-content-between">
                <div>
                    <h4 class="card-title">{{ $title }}</h4>
                    <p class="m-0 subtitle">All <code>{{ $list_page }}</code></p>
                </div>
                
            </div>

            <!-- /tab-content -->

            <div class="card-body pt-0">

                <div class="table-responsive">
                    <table id="example3" class="display table image-table" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                @if($attribute->type == 1)
                                <th>Color</th>
                                @elseif($attribute->type == 3)
                                <th>Image</th>
                                @endif
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                @if($attribute->type == 1)
                                <td>{{ $item->color_code }}</td>
                                @elseif($attribute->type == 3)
                                <th><img class="item-image" src="{{ getFileUrl($item->image) }}" alt=""></th>
                                @endif

                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.attribute-item.edit', $item->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa-solid fa-pencil-alt"></i></a>
                                        <a href="javascript:void(0)" class="delete btn btn-danger shadow btn-xs sharp" data-url="{{ route('admin.attribute-item.destroy', $item->id) }}"><i class="fa-solid fa-trash"></i></a>

                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
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