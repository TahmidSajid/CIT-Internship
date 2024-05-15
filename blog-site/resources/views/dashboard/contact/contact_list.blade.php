@extends('layouts.dashboard')
@section('content')
    <div class="row my-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Contact Us messages</h4>

                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Text</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($contactUs as $contact)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ Str::limit($contact->text,15) }}</td>
                                    <td>{{ $contact->created_at }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <form action="{{ route('contactUs.destroy',$contact->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                                </form>
                                            </div>
                                            <div class="col-lg-6">
                                                <a href="{{ route('contactUs.show',$contact->id) }}" class="btn btn-sm btn-primary">View</a>
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
        </div><!-- end col-->
    </div>
@endsection

@if (session('delete'))
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
                title: "{{ session('delete') }}"
            });
        </script>
    @endsection
@endif
