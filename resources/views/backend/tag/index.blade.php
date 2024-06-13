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
                <a href="{{ route('admin.tag.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>{{ $title }}</a>
            </div>

            <!-- /tab-content -->

            <div class="card-body pt-0">

                <x-backend.card-menu mainlink="admin.tag.index" trashlink="admin.tag.trash" model="Tag"></x-backend.card-menu>

                <div class="table-responsive">
                    <table id="data_table" class="display table image-table w-100" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>

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


    $('#data_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.tag.index') }}",
        },
        language: {
            paginate: {
                next: '<i class="fa-solid fa-angle-right"></i>',
                previous: '<i class="fa-solid fa-angle-left"></i>'
            }
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'slug',
                name: 'slug'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false
            }
        ]
    });
</script>
@endsection