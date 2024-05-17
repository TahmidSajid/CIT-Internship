@extends('layouts.dashboard')
@section('content')
    <div class="row my-4">
        <div class="col-lg-6">
            <h4>Information</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Social Links</h4>
                    <div class="p-2">
                        <form class="form" action="{{ route('add_social') }}">
                            @csrf
                            <div class="mb-2 row">
                                <label class="col-md-2 col-form-label">Social Name</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="social_name">
                                    @error('social_name')
                                        <span class="text-danger">Social name required</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-md-2 col-form-label">Social Link</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="url" name="social_link">
                                    @error('social_link')
                                        <span class="text-danger">Social link required</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-md-2 col-form-label">Social Icon</label>
                                <div class="col-md-6">
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
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Bordered table</h4>
                    <p class="sub-header">
                        Add <code>.table-bordered</code> for borders on all sides of the table and cells.
                    </p>

                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Social Name</th>
                                    <th>Social Link</th>
                                    <th>Social Icon</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($socials as $social)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $social->social_name }}</td>
                                        <td>{{ $social->social_link }}</td>
                                        <td>{{ $social->social_icon }}</td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div> <!-- end .table-responsive-->
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
