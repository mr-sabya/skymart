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
                <a href="{{ route('admin.attribute.index')}}" class="btn btn-primary"><i class="fa-solid fa-bars me-2"></i>{{ $list_page }}</a>
            </div>

            <!-- /tab-content -->

            <div class="card-body pt-0">

                <form action="{{ route('admin.attribute.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-backend.input-text title="Name" name="name" value="{{ old('name') }}"></x-backend.input-text>
                    <x-backend.static-select-option title="Type" name="type" :items=$types></x-backend.static-select-option>
                    <x-backend.static-select-option title="Shape" name="shape" :items=$shapes></x-backend.static-select-option>


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