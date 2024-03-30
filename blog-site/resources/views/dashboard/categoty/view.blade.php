@extends('layouts.dashboard')
@section('content')
    <!-- start page title -->
    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Dashborad</h4>
            </div>
            <div class="col-lg-6">
                <div class="d-none d-lg-block">
                    <ol class="breadcrumb m-0 float-end">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Katen</a></li>
                        <li class="breadcrumb-item active">Dashborad</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Add Category</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form class="form-horizontal" action="{{ route('category.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label class="col-md-4 col-form-label" for="simpleinput">Category Name</label>
                                        <div class="col-md-8">
                                            <input type="text" id="simpleinput" class="form-control"
                                                name="category_name">
                                            @error('category_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-4 col-form-label" for="simpleinput">Description
                                            <span>(optional)</span></label>
                                        <div class="col-md-8">
                                            <input type="text" id="simpleinput" class="form-control"
                                                name="category_description">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-4 col-form-label" for="simpleinput">Category Photo
                                            <span>(optional)</span></label>
                                        <div class="col-md-8">
                                            <input type="file" id="simpleinput" class="form-control"
                                                name="category_photo">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-2 offset-md-10">
                                            <button class="btn btn-info waves-effect waves-light"
                                                type="submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->
                </div>
            </div> <!-- end card -->
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Category List</h4>

                    <table id="alternative-page-datatable" class="table dt-responsive nowrap w-100 text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Photo</th>
                                <th>Category Name </th>
                                <th>Category Slug </th>
                                <th>Description</th>
                                <th>Added By</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @forelse ($categories as $key => $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($category->category_photo)
                                            <img class="avatar-xs"
                                                src="{{ asset('uploads/category_photos') }}/{{ $category->category_photo }}"
                                                alt="img">
                                        @else
                                            no image added
                                        @endif
                                    </td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->category_slug }}</td>
                                    <td>
                                        @if ($category->category_description)
                                            {{ $category->category_description }}
                                        @else
                                            no description added
                                        @endif
                                    </td>
                                    <td>{{ $category->added_by }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <a class="text-info" data-bs-toggle="modal"
                                                    data-bs-target="#standard-modal{{ $key }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <!-- Standard modal content -->
                                                <div id="standard-modal{{ $key }}" class="modal fade text-start" tabindex="-1" role="dialog"
                                                    aria-labelledby="standard-modalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="standard-modalLabel">
                                                                    Category View
                                                                </h4>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row mb-4">
                                                                    <div class="col-lg-4">
                                                                        Category Name
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        :
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        {{ $category->category_name }}
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-4">
                                                                    <div class="col-lg-4">
                                                                        Category Slug
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        :
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        {{ $category->category_slug }}
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-4">
                                                                    <div class="col-lg-4">
                                                                        Description
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        :
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        {{ $category->category_description }}
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-4">
                                                                    <div class="col-lg-4">
                                                                        Added By
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        :
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        {{ $category->added_by }}
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-4">
                                                                    <div class="col-lg-4">
                                                                        Image
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        :
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        @if ($category->category_photo)
                                                                            <img class="avatar-xl"
                                                                                src="{{ asset('uploads/category_photos') }}/{{ $category->category_photo }}"
                                                                                alt="img">
                                                                        @else
                                                                            no image added
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </a>
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            @empty
                            @endforelse
                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>
@endsection

@push('pageCss')
    <!-- third party css -->
    <link href="{{ asset('dashboard-assets') }}/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard-assets') }}/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard-assets') }}/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard-assets') }}/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <!-- third party css end -->
@endpush

@push('pageJs')
    <!-- third party js -->
    <script src="{{ asset('dashboard-assets') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js">
    </script>
    <script src="{{ asset('dashboard-assets') }}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/libs/pdfmake/build/vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Datatables js -->
    <script src="{{ asset('dashboard-assets') }}/js/pages/datatables.js"></script>
@endpush
