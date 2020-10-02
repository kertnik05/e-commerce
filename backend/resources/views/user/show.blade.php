@extends('layouts.master')

@section('title', 'User')

@section('crud-title')
    <a class="navbar-brand" href="{{ route('users.index') }}">User CRUD</a>
@endsection

@section('content')
    <div class="container">
        <div class="card mx-auto w-50">
            <div class="card-header">
                User Details
            </div>
            <div class="card-body">
                <div>
                    Last Name: 
                    {{ $user->userDetail->last_name }}, 
                    {{ $user->userDetail->first_name }} 
                    {{ $user->userDetail->middle_name }}
                    {{ $user->userDetail->suffix }}
                </div>
                <div>Gender: {{ $user->userDetail->gender }}</div>
                <div>Birthdate: {{ $user->userDetail->birthdate }}</div>
                <div>Address: {{ $user->userDetail->address }}</div>
                <div>Shipping Address: {{ $user->userDetail->shipping_address }}</div>
                <div>Email: {{ $user->email }}</div>
                <div>
                    Roles: 
                    <ul>
                        @foreach($user->roles as $role)
                            <li>{{ $role->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection