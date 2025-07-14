@extends('admin.inc.main')
@section('container')
    @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container py-4">
        <h3>Customer Lists</h3>
        <table class="table table-secondary table-hover table-bordered table-sm table-responsive-sm">
            <thead class="bg">
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Email</th>
                    <th scope="col">City</th>
                    <th scope="col">Address</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone}}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td><a target="_blank" href="{{ asset('uploads/' . $user->image) }}">
                                <img src="{{ asset('uploads/' . $user->image) }}" alt="" width="100px"
                                    height="100px">
                            </a>
                        </td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
