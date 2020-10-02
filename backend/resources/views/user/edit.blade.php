@extends('layouts.master')

@section('title', 'Edit User')

@section('crud-title')
    <a class="navbar-brand" href="{{ route('users.index') }}">User CRUD</a>
@endsection

@section('content')
    <div class="container">
        <div class="card mx-auto w-50">
            <div class="card-header">
                Edit User
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
                <form action="{{ route('users.update', $user->id) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="first_name" value="{{ $user->userDetail->first_name }}">
                    </div>
                    <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="middle_name" value="{{ $user->userDetail->middle_name }}">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="{{ $user->userDetail->last_name }}">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Birthdate</label>
                        <input type="date" class="form-control" name="birthdate" value="{{ $user->userDetail->birthdate }}">
                    </div>
                    <div class="form-group">
                        <label>Suffix</label>
                        <input type="text" class="form-control" name="suffix" value="{{ $user->userDetail->suffix }}">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" value="{{ $user->userDetail->address }}">
                    </div>
                    <div class="form-group">
                        <label>Shipping Address</label>
                        <input type="text" class="form-control" name="shipping_address" value="{{ $user->userDetail->shipping_address }}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection