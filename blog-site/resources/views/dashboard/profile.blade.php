@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card mx-auto">
                <img class="text-center mx-auto rounded-circle" style="width: 450px; height: 450px;"
                    src="{{ asset('dashboard-assets') }}/images/media/img-5.jpg" alt="Card image cap" />
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <form class="" action="{{ route('profile_picture') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mx-auto">
                                    <label class="col-md-2 col-form-label">Buttons</label>
                                    <div class="col-md-10">
                                        <div class="input-group">
                                            <input type="file" class="form-control" name="profile_photo">
                                            <button class="btn btn-dark waves-effect waves-light"
                                                type="submit">Upload</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card-box-->
        </div>
    </div>
    <!-- end row -->

    <!-- file preview template -->
@endsection

{{-- @push('pageCss')
    <!-- Plugins css -->
    <link href="{{ asset('dashboard-assets') }}/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
@endpush --}}

@push('pageJs')
    <!-- Plugins js -->
    <script src="{{ asset('dashboard-assets') }}/libs/dropzone/min/dropzone.min.js"></script>

    <!-- Demo js-->
    <script src="{{ asset('dashboard-assets') }}/js/pages/form-fileuploads.js"></script>
@endpush
