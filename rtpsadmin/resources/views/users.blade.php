@extends('layouts.master')
@section('heading_left')
    Users
@endsection
@section('title')
    Users
@endsection

@section('content')
    <!-- Content Row -->
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    <hr>
    @if ($errors->any())
        <div class="card box-2 border-left-danger shadow h-100 py-2 mb-4 bg-gradient-danger text-white">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br />
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="card box-2 border-left-success shadow h-100 py-2 mb-4 bg-gradient-success text-white">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    {{ session()->get('success') }}
                </div>
            </div>
        </div>
    @endif



    <div class="box-2">
        <h3 style="color: #686D76">User management</h3>
        <hr>
        <table class="table table-striped w-100">
            <thead>
                <tr>
                    <th style="background-color: gray; text-align:center; color:white; width:10%">No</th>
                    <th style="background-color: gray; text-align:center; color:white; width:25%">Name</th>
                    <th style="background-color: gray; text-align:center; color:white; width:25%">Email</th>
                    <!-- <th>Password</th> -->
                    <th style="background-color: gray; text-align:center; color:white; width:20%">Site Permission</th>
                    <th style="background-color: gray; text-align:center; color:white; width:20%">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr>
                        <td style="text-align: center">{{ $loop->iteration }}</td>
                        <td style="text-align: left">{{ $user->name }}</td>
                        <td style="text-align: left">{{ $user->email }}</td>
                        <!-- <td>{{ $user->password }}</td> -->
                        <td style="text-align: center">{{ $user->sites->site_name }}</td>
                        <td style="text-align: center">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>

        <form action="{{ route('users.create') }}">
            <div class="d-grid gap-2">
                <button class="btn btn-success" type="submit">+ Add user</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script></script>
@endsection
