@extends('layouts.master')
@section('heading_left')
    Add user
@endsection
@section('title')
    Add user
@endsection

@section('content')
    <!-- Content Row -->
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
        <h3>Create user</h3>
        <hr>
        <!-- <div class="form-group row">
            <label for="value" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="value" name="value">
            </div>
        </div>
        <div class="form-group row">
            <label for="value" class="col-sm-3 col-form-label">E-mail</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="value" name="value">
            </div>
        </div>
        <div class="form-group row">
            <label for="value" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="value" name="value">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-9 offset-sm-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div> -->
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="value" class="col-sm-3 col-form-label">Name </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
            </div>
            <div class="form-group row">
                <label for="value" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="value" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <label for="value" class="col-sm-3 col-form-label">Site permission</label>
                <div class="col-sm-9">
                    <!-- <input type="text" class="form-control" name="site_permission" placeholder="0"> -->
                    <select name="site_permission" id="site_permission" class="form-control form-select">
                        @foreach($sites as $site)
                            <option value="{{ $site->id }}">{{ $site->site_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-9 offset-sm-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

    </div>
@endsection

@section('script')
    <script></script>
@endsection
