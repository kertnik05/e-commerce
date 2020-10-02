@extends('layouts.master')

@section('title', 'User CRUD')

@section('crud-title')
    <a class="navbar-brand" href="{{ route('users.index') }}">User CRUD</a>
@endsection

@section('content')
    <div class="container">
        @if(session()->get('success'))
            <div class="alert alert-success mx-auto">
                {{ session()->get('success') }}  
            </div>
        @endif
        <div class="card mx-auto">
            <div class="card-header">
                Users
            </div>
            <div class="card-body">
                <a href="{{ route('users.create') }}" role="button" class="btn btn-primary float-left mb-2">
                    Add New
                </a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Middle Name</th>
                                <th scope="col">Suffix</th>
                                <th scope="col">Gender</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->userDetail->last_name }}</td>
                                    <td>{{ $user->userDetail->first_name }}</td>
                                    <td>{{ $user->userDetail->middle_name }}</td>
                                    <td>{{ $user->userDetail->suffix }}</td>
                                    <td>{{ $user->userDetail->gender }}</td>
                                    <td class="">
                                        <a href="{{ route('users.show', $user->id) }}" role="button" class="btn btn-primary">View</a>
                                        <a href="{{ route('users.edit', $user->id) }}" role="button" class="btn btn-success">Edit</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    <td class="">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection