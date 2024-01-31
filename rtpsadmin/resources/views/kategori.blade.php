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
    <div class="box-2">
        <h3 style="color: #686D76">User management</h3>
        <hr>
        <table class="table table-striped w-100">
            <thead>
                <tr>
                    <th style="background-color: gray; text-align:center; color:white; width:10%">No</th>
                    <th style="background-color: gray; text-align:center; color:white; width:25%">Kategori</th>
                    <th style="background-color: gray; text-align:center; color:white; width:25%">status</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($kategori as $kat)
                    <tr>
                        <td style="text-align: center">{{ $loop->iteration }}</td>
                        <td style="text-align: left">{{ $kat->nama_kategori }}</td>
                        <td style="text-align: left">{{ $kat->status }}</td>

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
