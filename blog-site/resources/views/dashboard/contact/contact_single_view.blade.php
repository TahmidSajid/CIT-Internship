@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-lg-2 my-4">
        <h4>
            Contact Message
        </h4>
    </div>
</div>
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $contact->name }}</h3>
                </div>
                <div class="card-body">
                    <h4 class="card-subtitle text-muted">{{ $contact->email }}</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $contact->text }}</p>
                    <form action="{{ route('contactUs.destroy',$contact->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
