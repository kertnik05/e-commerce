@extends('layouts.master')

@section('title', 'Add Role')

@section('crud-title')
    <a class="navbar-brand" href="{{ route('roles.index') }}">Role CRUD</a>
@endsection

@section('content')
    <div class="container">
        <div class="card mx-auto w-50">
            <div class="card-header">
                Add a Role
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form action="{{ route('roles.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label>Role Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection