@extends('layouts.backend')
@section('content')

<div class="row">

    <!-- Column starts -->
    <div class="col-xl-12">
        <div class="card dz-card">
            <div class="card-header flex-wrap d-flex justify-content-between">
                <div>
                    <h4 class="card-title">Category</h4>
                    <p class="m-0 subtitle">All <code>Categories</code></p>
                </div>
                <a href="{{ route('admin.category.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Category</a>
            </div>

            <!-- /tab-content -->

            <div class="card-body pt-0">
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
                                        <a href="{{ route('admin.category.edit', $category->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
                                        <a href="{{ route('admin.category.edit', $subcat->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
                                        <a href="{{ route('admin.category.edit', $child->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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


    @endsection