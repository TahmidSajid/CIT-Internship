@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title">Logged-in as</h4>
                    <p>{{ auth()->user()->name }}</p>
                </div> <!--end card body-->
            </div>
        </div>
    </div>
</div>
@endsection
