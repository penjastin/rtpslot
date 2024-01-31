@extends('layouts.master')
@section('heading_left')
    Profile
@endsection
@section('title')
    User Profile
@endsection

@section('content')
    <!-- Content Row -->
    <hr>
    @if ($errors->any())
        <div class="card border-left-danger shadow h-100 py-2 mb-4 bg-gradient-danger text-white">
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
        <div class="card border-left-success shadow h-100 py-2 mb-4 bg-gradient-success text-white">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    {{ session()->get('success') }}
                </div>
            </div>
        </div>
    @endif

    <div class="container mt-5 mb-5" style="margin-left: 400px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="border-radius: 13px; box-shadow:1px 1px 5px 1px #CACACA">
                    <h4 style="color: #686D76" class="card-header">{{ __('My profile') }}</h4>


                    {{-- Untuk pesan error --}}
                    <div class="card-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                        <form action="" method="post">
                            @csrf
                            <div class="form-group" style="text-align: center">
                                <label class="">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/2048px-Circle-icons-profile.svg.png"
                                        style="width: 150px; margin-bottom:50px; margin-top:50px" alt="">

                                </label>
                            </div>
                            <div class="form-group">
                                <label class="">Username</label>
                                <input type="text" name="name" placeholder="Name" class="form-control mb-4"
                                    value="{{ auth()->user()->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="">Email</label>
                                <input type="email" class="form-control mb-4" value="{{ auth()->user()->email }}"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label class="">Site Permission</label>
                                <input type="number" class="form-control mb-4"
                                    value="{{ auth()->user()->site_permission }}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="">Member since</label>
                                <input type="date" class="form-control mb-4" value="{{ auth()->user()->created_at }}"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label class="">Last login</label>
                                <input type="date" class="form-control mb-4" value="{{ auth()->user()->last_login }}"
                                    disabled>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('script')
    <script></script>
@endsection
