@extends('layouts.dashboard')
@section('content')
    <!-- start page title -->
    <div class="row py-4">
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
    <div class="row">
        <!-- end page title -->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Viewers</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{ $viewers }}
                            </h2>
                        </div>
                    </div>
                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div> <!-- end col-->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Writters</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{ $writters }}
                            </h2>
                        </div>
                    </div>
                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div> <!-- end col-->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Posts</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{ $posts }}
                            </h2>
                        </div>
                    </div>
                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div> <!-- end col-->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Comments</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{ $comments }}
                            </h2>
                        </div>
                    </div>
                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div> <!-- end col-->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Engagment</h4>
                    <div class="text-center">
                        <input data-plugin="knob" data-width="165" data-height="165" data-linecap=round
                            data-fgColor="#7a08c2" value="{{ $engagment }}" data-skin="tron" data-angleOffset="180"
                            data-readOnly=true data-thickness=".15" />
                        <h5 class="text-muted mt-3">Percentage</h5>
                        <p class="text-muted w-75 mx-auto sp-line-2">

                        </p>
                        <div class="row mt-3">
                            <div class="col-6">
                                <p class="text-muted font-15 mb-1 text-truncate">Posts</p>
                                <h4>{{ $posts }}</h4>

                            </div>
                            <div class="col-6">
                                <p class="text-muted font-15 mb-1 text-truncate">Comments</p>
                                <h4>{{ $comments }}</h4>
                            </div>

                        </div>
                    </div>
                </div> <!--end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection
