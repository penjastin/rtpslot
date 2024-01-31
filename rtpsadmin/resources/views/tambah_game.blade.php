@extends('layouts.master')
@section('heading_left')
    Tambah Data Game
@endsection
@section('title')
    Gamelist
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
    <div class="box-2" style="margin-bottom: 498px">
        <h3 style="color: #686D76">Add your games</h3>
        <hr>
        <form action="/insertdata" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="vid" class="col-sm-3 col-form-label">Nama Provider</label>
                <div class="col-sm-9">
                    <label>
                        <input type="radio" name="vid" value="1" required>
                        Pragmatic &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="vid" value="2" required>
                        Habanero &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="vid" value="3" required>
                        IDNslot &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="vid" value="4" required>
                        PGSoft &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="vid" value="5" required>
                        Microgaming &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="vid" value="6" required>
                        Toptrend &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="vid" value="7" required>
                        GMW &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="vid" value="8" required>
                        NoLimitCity &nbsp;
                    </label>
                </div>
            </div>
            {{-- <div class="form-group row">
                        <label for="game_name" class="col-sm-3 col-form-label">Nama game</label>
                        <div class="col-sm-9"> --}}
            <input type="hidden" class="form-control" id="game_name" name="game_name">
            {{-- </div>
                    </div> --}}
            <div class="form-group row">
                <label for="value" class="col-sm-3 col-form-label">Presentase Game</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="value" name="value">
                </div>
            </div>
            <div class="form-group row">
                <label for="pola" class="col-sm-3 col-form-label">Pola</label>
                <div class="col-sm-9">
                    <label>
                        <input type="radio" name="pola" value="1" required>
                        Ada &nbsp;
                    </label>
                    <label>
                        <input type="radio" name="pola" value="0" required>
                        Tidak Ada
                    </label>
                </div>
            </div>
            <div class="form-group row">
                <label for="image_url" class="col-sm-3 col-form-label">URL Icon Game</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" id="image_url" name="image_url[]" multiple>
                </div>
            </div>

            <input type="hidden" class="form-control" id="order">


            <div class="form-group row">
                <div class="col-sm-9 offset-sm-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script></script>
@endsection
