@extends('layouts.master')

@section('title', 'Role CRUD')

@section('crud-title')
    <a class="navbar-brand" href="{{ route('roles.index') }}">Role CRUD</a>
@endsection

@section('content')
    <div class="container">
        @if(session()->get('success'))
            <div class="alert alert-success w-50 mx-auto">
                {{ session()->get('success') }}  
            </div>
        @endif
        <div class="card mx-auto w-50">
            <div class="card-header">
                Roles
            </div>
            <div class="card-body">
                <a href="{{ route('roles.create') }}" role="button" class="btn btn-primary float-left mb-2">
                    Add New
                </a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col" colspan="2" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <th scope="row">{{ $role->id }}</th>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('roles.edit', $role->id) }}" role="button" class="btn btn-success float-right">Edit</a>
                                    </td>
                                    <td class="text-center ">
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger float-left">Delete</button>
                                        </form>
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