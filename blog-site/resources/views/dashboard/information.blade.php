@extends('layouts.dashboard')
@section('content')
    <div class="row my-4">
        <div class="col-lg-6">
            <h4>Information</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Social Links</h4>
                    <div class="p-2">
                        <form class="form" action="{{ route('add_social') }}">
                            @csrf
                            <div class="mb-2 row">
                                <label class="col-md-4 col-form-label">Social Name</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="social_name">
                                    @error('social_name')
                                        <span class="text-danger">Social name required</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-md-4 col-form-label">Social Link</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="url" name="social_link">
                                    @error('social_link')
                                        <span class="text-danger">Social link required</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-md-4 col-form-label">Social Icon</label>
                                <div class="col-md-4">
                                    <input class="form-control" id="icon-input" type="text" name="social_icon">
                                    @error('social_icon')
                                        <span class="text-danger">Social icon required</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <p class="text-center">
                                        <i class="" style="font-size: 35px" id="icon-show"></i>
                                    </p>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <div class="col-lg-6">
                                    <button class="btn btn-sm btn-primary">Add Links</button>
                                </div>
                            </div>
                        </form>
                        <div class="all-icons mt-4" style="overflow-y: scroll; height:300px">

                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Logos</h4>
                    <div class="p-2">
                        <div class="row mb-4">
                            <div class="col-lg-6 offset-lg-3 text-center">
                                @if ($logo != [])
                                    @if ($logo->logo)
                                        <img src="{{ asset('uploads/logos') }}/{{ $logo->logo }}"
                                            class="img-fluid img-thumbnail" alt="">
                                    @endif
                                @else
                                    <p>No image uploaded</p>
                                @endif
                            </div>
                        </div>
                        <form class="form" action="{{ route('add_logo') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <label class="col-md-2 col-form-label">Logo</label>
                                <div class="col-md-10">
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="logo">
                                        <button class="btn btn-dark waves-effect waves-light" type="submit">Upload</button>
                                    </div>
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Social Links</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Social Name</th>
                                    <th>Social Link</th>
                                    <th>Social Icon</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($socials as $key => $social)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $social->social_name }}</td>
                                        <td>
                                            {{ $social->social_link }}
                                        </td>
                                        <td style="font-size: 20px">
                                            <i class="{{ $social->social_icon }}"></i>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $key }}">
                                                        <i class="fa-solid fa-pencil"></i>
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{ $key }}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        @include('components.social.social_edit')
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <a class="btn btn-sm btn-danger"
                                                        href="{{ route('delete_social', $social->id) }}">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div> <!-- end .table-responsive-->
                </div>
            </div> <!-- end card -->
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Information</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form class="form-horizontal" role="form" method="post"
                                    action="{{ route('add_info') }}">
                                    @csrf
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label">phone</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="tel" name="phone"
                                                @if ($info != []) value ="{{ $info->phone }}" @endif
                                                placeholder="Enter phone number">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="example-email">Email</label>
                                        <div class="col-md-10">
                                            <input type="email" id="example-email" name="email" class="form-control"
                                                @if ($info != []) value="{{ $info->email }}" @endif
                                                placeholder="Enter Email">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label">Location</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" name="address"
                                                @if ($info != []) value="{{ $info->address }}" @endif
                                                placeholder="Enter Location">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <div class="col-lg-4 offset-lg-4 text-center mt-2">
                                            <button class="btn btn-sm btn-primary" type="submit">Update</button>
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
    </div>
@endsection


@push('pageCss')
    <style>
        .btn-icons {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            height: 60px;
            width: 60px;
            text-align: center;
            padding-top: 18px;
            border-radius: 50%;
            font-size: 25px;
            margin-bottom: 15px;
            margin-left: 8px;
            transition: 0.3s ease-in-out;
        }

        .btn-animation {
            box-shadow: 0 !important;
            background-color: gray !important;
        }
    </style>
@endpush

@push('pageJs')
    <script src="{{ asset('dashboard-assets/js/custom.js') }}" type="module"></script>
@endpush


@if (session('social_added'))
    @section('alert')
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('social_added') }}"
            });
        </script>
    @endsection
@endif

@if (session('social_update'))
    @section('alert')
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('social_update') }}"
            });
        </script>
    @endsection
@endif

@if (session('social_delete'))
    @section('alert')
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "error",
                title: "{{ session('social_delete') }}"
            });
        </script>
    @endsection
@endif

@if (session('logo_added'))
    @section('alert')
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('logo_added') }}"
            });
        </script>
    @endsection
@endif
