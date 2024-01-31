@extends('layouts.master')

@section('title')
    {{ !empty($id) ? ucwords(auth()->user()->sites->site_name) : '' }} Berita
@endsection
@section('heading_left')
    {{-- {{ !empty($id) ? ucwords(auth()->user()->sites->site_name) : '' }} Togel Predictions --}}
@endsection

@section('content')
    <!-- Content Row -->
    <div class="box">
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

        {{-- untuk All admin --}}
        {{--  --}}

        {{-- untuk selain admin --}}
        {{-- @if ($id != 1)
        @endif --}}



        <h3 style="color: #686D76">Data Berita</h3>
        <hr>
        <!-- Button trigger modal -->
        <div class="d-grid gap-2">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModalBerita"
                style="background: linear-gradient(to right, #11998e, #38ef7d); border:none;">
                + Tambahkan Berita
            </button>
        </div>
        <hr>
        <table class="table table-bordered table-hover" id="myTable">
            <thead>
                <tr>
                    <th class="text-center" style="width: 5%;">No</th>
                    @if (auth()->user()->sites->site_name == 'all')
                        <th class="text-center" style="width: 10%;">Site</th>
                    @endif
                    <th class="text-center" style="width: 65%;">Judul Berita</th>
                    <th class="text-center" style="width: 10%;">Author</th>
                    <th class="text-center" style="width: 10%;">Kontrol</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($berita as $data)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        @if (auth()->user()->sites->site_name == 'all')
                            <td>{{ $data->site_name }}</td>
                        @endif

                        <td>{{ $data->judul }}</td>
                        <td>{{ $data->author_name }}</td>

                        <td class="text-center">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#editModalBerita{{ $data->id }}"
                                style="color: white; background-image: linear-gradient(to top, #4481eb 0%, #04befe 100%); border:none">
                                <li class="fa fa-list-alt">
                                    Detail</li>
                            </button>
                            <form action="{{ route('deleteBerita', $data->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    style="color: white; background-image: linear-gradient(to top, #ac0202 0%, #ff4f4f 100%); border:none"><i
                                        class="fa fa-trash" aria-hidden="true">
                                        Delete</i></button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModalBerita{{ $data->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="editModalLabel{{ $data->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $data->id }}">Detail Data Prediksi
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form edit data -->
                                    <form action="{{ route('updateBerita', $data->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <!-- Isi form dengan input field sesuai kebutuhan -->


                                        {{-- <input type="hidden" class="form-control" name="site"
                                                    value="{{ $data->site }}"> --}}
                                        <div class="form-group mb-3">
                                            <small id="labelEdit" class="form-text text-muted">Judul Berita Saat
                                                ini</small>
                                            <textarea class="form-control text-justify" name="judul" rows="3">{{ old('judul', $data->judul) }}</textarea>
                                        </div>

                                        <div class="form-group mb-1 text-center">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <img src="{{ asset($data->gambar_1) }}"
                                                        class="img-fluid rounded shadow mx-auto" alt="Bukti Menang">
                                                </div>
                                                <div class="col-md-6">
                                                    <img src="{{ asset($data->gambar_2) }}"
                                                        class="img-fluid rounded shadow mx-auto" alt="Bukti Menang">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-2">
                                            <small id="labelEdit" class="form-text text-muted">Konten</small>
                                            <textarea class="form-control" name="konten_atas" rows="3">{{ old('konten_atas', $data->konten_atas) }}</textarea>
                                        </div>

                                        <div class="form-group mb-2">
                                            <small id="labelEdit" class="form-text text-muted">Konten</small>
                                            <textarea class="form-control" name="konten_bawah" rows="8">{{ old('konten_bawah', $data->konten_bawah) }}</textarea>
                                        </div>


                                        <button type="submit" class="btn btn-primary">Update</button>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Edit -->
                @endforeach
            </tbody>
        </table>





        <!-- Modal tambah data-->
        <div class="modal fade" id="addModalBerita" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambahkan Berita Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form tambah data -->
                        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($id != 1)
                                <input type="hidden" class="form-control" name="site" value="{{ $id }}">
                            @endif

                            <input type="hidden" class="form-control" name="author" value="{{ auth()->user()->id }}">

                            <div class="row">
                                @if (auth()->user()->sites->site_name == 'all')
                                    <div class="mb-2">
                                        <select class="form-select" name="site">
                                            <option value="" style="color:gray">Select yout site</option>
                                            @foreach ($sites as $k => $item)
                                                @if ($k != 1)
                                                    <option class="dropdown-item" value="{{ $k }}">
                                                        {{ $item['site_name'] }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                                <div class="form-group mb-2">
                                    <small id="labelberita" class="form-text text-muted">Judul Berita Terbaru</small>
                                    <textarea class="form-control text-justify" name="judul" rows="3" required></textarea>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <small id="labelberita" class="form-text text-muted">gambar 1</small>
                                            <input type="file" class="form-control" name="gambar_1" required>
                                        </div>
                                        <div class="col-md-6">
                                            <small id="labelberita" class="form-text text-muted">gambar 2</small>
                                            <input type="file" class="form-control" name="gambar_2" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <small id="labelberita" class="form-text text-muted">Isi Konten</small>
                                    <textarea class="form-control text-justify" name="konten_atas" rows="5" required></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <small id="labelberita" class="form-text text-muted">Isi Konten</small>
                                    <textarea class="form-control text-justify" name="konten_bawah" rows="10" required></textarea>
                                </div>


                            </div>




                            <small class="form-text text-muted">Note : Semua Form Wajib diisi</small>
                            <hr>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary"
                                    style="background : linear-gradient(to right, #2193b0, #6dd5ed);  border:none;">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    @endsection

    @section('script')
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
    @endsection
