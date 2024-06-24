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
                <a href="{{ route('admin.category.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>{{ $title }}</a>
            </div>

            <!-- /tab-content -->

            <div class="card-body pt-0">

                <x-backend.card-menu mainlink="admin.category.index" trashlink="admin.category.trash" model="Category"></x-backend.card-menu>

                <div class="table-responsive">
                    <table id="example3" class="display table image-table" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Icon</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Slug</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $count = 1;
                            @endphp

                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td><img class="item-icon" src="{{ getFileUrl($category->icon) }}" alt=""></td>
                                <td>{{ $category->name }}</td>
                                <td><img class="item-image" src="{{ getFileUrl($category->image) }}" alt=""></td>
                                <td>{{ $category->slug }}</td>

                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.category.edit', $category->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa-solid fa-pencil-alt"></i></a>
                                        <a href="javascript:void(0)" class="delete btn btn-danger shadow btn-xs sharp" data-url="{{ route('admin.category.destroy', $category->id) }}"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>

                            @if($category->childs->count() > 0)
                            @foreach($category->childs as $subcat)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td><img class="item-icon" src="{{ getFileUrl($subcat->icon) }}" alt=""></td>
                                <td><span class="ps-3"></span>--{{ $subcat->name }}</td>
                                <td><img class="item-image" src="{{ getFileUrl($subcat->image) }}" alt=""></td>
                                <td>{{ $subcat->slug }}</td>

                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.category.edit', $subcat->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa-solid fa-pencil-alt"></i></a>
                                        <a href="javascript:void(0)" class="delete btn btn-danger shadow btn-xs sharp" data-url="{{ route('admin.category.destroy', $subcat->id) }}"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>

                            @if($subcat->childs->count() > 0)
                            @foreach($subcat->childs as $child)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td><img class="item-icon" src="{{ getFileUrl($child->icon) }}" alt=""></td>
                                <td><span class="ps-5"></span>---{{ $child->name }}</td>
                                <td><img class="item-image" src="{{ getFileUrl($child->image) }}" alt=""></td>
                                <td>{{ $child->slug }}</td>

                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.category.edit', $child->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa-solid fa-pencil-alt"></i></a>
                                        <a href="javascript:void(0)" class="delete btn btn-danger shadow btn-xs sharp" data-url="{{ route('admin.category.destroy', $child->id) }}"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                            @endif

                            @endforeach
                            @endif

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