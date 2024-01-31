@extends('layouts.master')
@section('heading_left')
    {{ $user->name }}'s Profile
@endsection
@section('title')
    {{ $user->name }}'s Profile
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
    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">

        @csrf
        @method('PUT')
        <div class="container mt-5 mb-5" style="margin-left: 400px;">
            <div class="row justify-content-center">

                <div class="card" style="border-radius: 13px; box-shadow:1px 1px 5px 1px #CACACA">
                    <h4 class="card-header text-center">{{ __('Edit Profile Users') }}</h4>
                    <div class="card-body">
                        <div class="form-group">

                            <input type="text" class="form-control mb-2" id="email" name="email"
                                value="{{ $user->email }}" readonly="">

                        </div>
                        <div class="form-group">

                            <input type="text" class="form-control mb-2" id="name" name="name"
                                value="{{ $user->name }}">

                        </div>
                        <div class="form-group">

                            <input type="password" class="form-control mb-2" id="password" name="password" value=""
                                placeholder="New Password">

                        </div>
                        <div class="form-group">

                            <input type="password" class="form-control mb-2" id="password_confirmation"
                                name="password_confirmation" value="" placeholder="Confirm New Password">

                        </div>

                        <div class="form-group row">
                            <label for="site_permission" class="col-sm-3 col-form-label">Site Permission</label>
                            <div class="col-sm-9">
                                @if (auth()->user()->site_permission == 1)
                                    <select name="site_permission" class="form-select" id="site_permission" class="form-control">
                                        @foreach($sites as $site)
                                            <option value="{{ $site->id }}" {{ $user->site_permission == $site->id ? 'selected' : '' }}>
                                                {{ $site->site_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                @else
                                    @if ($user->id === auth()->user()->id)
                                        <input type="text" class="form-control" value="{{ $user->sites->site_name }}" readonly>
                                        <input type="hidden" name="site_permission" value="{{ $user->site_permission }}">
                                    @endif
                                @endif
                            </div>
                        </div>


                        <div class="form-group">

                            <label>
                                <input type="radio" name="active" class="minimal" value="1"
                                    {{ (isset($user['active']) && $user['active'] == 1) || (old('active') !== null && old('active') == 1) ? 'checked' : null }}
                                    required>
                                Active
                            </label>
                            <label>
                                <input type="radio" name="active" class="minimal" value="0"
                                    {{ (isset($user['active']) && $user['active'] == 0) || (old('active') !== null && old('active') == 0) ? 'checked' : null }}
                                    required>
                                Blocked
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 offset">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9 offset">
                            NOTE: Leave Password and confirmation password to blank If you are not changing the
                            password!
                        </div>
                    </div>
                </div>
            </div>

        </div>

        </div>
    </form>
@endsection

@section('script')
    <script></script>
@endsection
