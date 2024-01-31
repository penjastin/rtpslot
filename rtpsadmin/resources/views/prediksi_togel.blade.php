@extends('layouts.master')

@section('title')
    {{ !empty($id) ? ucwords(auth()->user()->sites->site_name) : '' }} Togel Predictions
@endsection
@section('heading_left')
    {{-- {{ !empty($id) ? ucwords(auth()->user()->sites->site_name) : '' }} Togel Predictions --}}
@endsection

@section('content')
    <!-- Content Row -->
    <div class="box">
        {{-- <h3 style="color: #686D76">{{ !empty($id) ? ucwords(auth()->user()->sites->site_name) : '' }} Site's</h3> --}}
        {{-- <hr> --}}
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
        {{-- @if (auth()->user()->sites->site_name == 'all')
                @endif --}}

        {{-- untuk selain admin --}}
        {{-- @if ($id != 1)
        @endif --}}



        <h3 style="color: #686D76">Data Predictions</h3>
        <hr>
        <!-- Button trigger modal -->
        <div class="d-grid gap-2">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal"
                style="background: linear-gradient(to right, #11998e, #38ef7d); border:none;">
                + Add Your Predictions
            </button>
        </div>
        <hr>
        <table class="table table-bordered table-hover" id="myTable">
            <thead>
                <tr>
                    <th class="text-center" style="width: 3%;">No</th>
                    @if (auth()->user()->sites->site_name == 'all')
                        <th class="text-center" style="width: 6%;">Site</th>
                    @endif
                    <th class="text-center"style="width: 8%;">Nama Togel</th>
                    <th class="text-center" style="width: 7%;">Tanggal</th>
                    <th class="text-center" style="width: 6%;">Angka Main</th>
                    <th class="text-center" style="width: 10%;">Prediksi 4D</th>
                    <th class="text-center" style="width: 10%;">Prediksi 3D</th>
                    <th class="text-center" style="width: 10%;">Shio</th>
                    <th class="text-center" style="width: 10%;">Kontrol</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($dataTogel as $data)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        @if (auth()->user()->sites->site_name == 'all')
                            <td>{{ $data->site_name }}</td>
                        @endif

                        <td>{{ $data->nama_togel }}</td>
                        <td class="text-center">{{ $data->tanggal }}</td>
                        <td class="text-center">{{ $data->angka_main }}</td>
                        <td class="text-center">{{ $data->d4 }}</td>
                        <td class="text-center">{{ $data->d3 }}</td>
                        <td>{{ $data->shio }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#editModal{{ $data->id }}"
                                style="color: white; background-image: linear-gradient(to top, #4481eb 0%, #04befe 100%); border:none">
                                <li class="fa fa-list-alt">
                                    Detail</li>
                            </button>
                            <form action="{{ route('delete', $data->id) }}" method="POST" style="display: inline">
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
                    <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="editModalLabel{{ $data->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
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
                                    <form action="{{ route('updateTogel', $data->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <!-- Isi form dengan input field sesuai kebutuhan -->
                                        <div class="form-group mb-1">
                                            <div class="row">
                                                <input type="hidden" class="form-control" name="site"
                                                    value="{{ $data->site }}" id="site_edit">
                                                <div class="col-md-6">
                                                    <small id="labelEdit" class="form-text text-muted">Jenis Pasaran
                                                        Togel</small>
                                                    @if (auth()->user()->sites->site_name == 'all')
                                                        <select class="form-select text-muted form-control"
                                                            name="jenis_togel_id" id="jenis_togel_edit">
                                                            <option value="{{ $data->jenis_togel_id }}" selected>
                                                                {{ $data->nama_togel }}
                                                            </option>
                                                        </select>
                                                    @endif
                                                    @if ($id != 1)
                                                        <select class="form-select text-muted form-control"
                                                            name="jenis_togel_id">
                                                            @foreach ($jenis_togel as $item)
                                                                <option value="{{ $item['id'] }}"
                                                                    {{ $item['id'] == $data->jenis_togel_id ? 'selected' : '' }}>
                                                                    {{ $item['nama_togel'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    @endif


                                                </div>
                                                <div class="col-md-6">
                                                    <small id="labelEdit" class="form-text text-muted">Prediksi untuk
                                                        Tanggal</small>
                                                    <input type="date" class="form-control" name="tanggal"
                                                        value="{{ $data->tanggal }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-1">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <small id="labelEdit" class="form-text text-muted">BBFS</small>
                                                    <input type="text" class="form-control" name="bbfs"
                                                        value="{{ $data->bbfs }}" autocomplete="off">
                                                </div>
                                                <div class="col-md-6">
                                                    <small id="labelEdit" class="form-text text-muted">Angka Main</small>
                                                    <input type="text" class="form-control" name="angka_main"
                                                        value="{{ $data->angka_main }}" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-1">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <small id="labelEdit" class="form-text text-muted">Prediksi 4D</small>
                                                    <input type="text" class="form-control" name="d4"
                                                        value="{{ $data->d4 }}" autocomplete="off">
                                                </div>
                                                <div class="col-md-6">
                                                    <small id="labelEdit" class="form-text text-muted">Prediksi 3D</small>
                                                    <input type="text" class="form-control" name="d3"
                                                        value="{{ $data->d3 }}" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-1">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <small id="labelEdit" class="form-text text-muted">Prediksi 2D Bolak
                                                        Balik</small>
                                                    <input type="text" class="form-control" name="bb_2d"
                                                        value="{{ $data->bb_2d }}" autocomplete="off">
                                                </div>
                                                <div class="col-md-6">
                                                    <small id="labelEdit" class="form-text text-muted">2D Cadangan</small>
                                                    <input type="text" class="form-control" name="cadangan_2d"
                                                        value="{{ $data->cadangan_2d }}" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-1">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <small id="labelEdit" class="form-text text-muted">2D Colok
                                                        Bebas</small>
                                                    <input type="text" class="form-control" name="colok_bebas_2d"
                                                        value="{{ $data->colok_bebas_2d }}" autocomplete="off">
                                                </div>
                                                <div class="col-md-6">
                                                    <small id="labelEdit" class="form-text text-muted">Colok Bebas</small>
                                                    <input type="text" class="form-control" name="colok_bebas"
                                                        value="{{ $data->colok_bebas }}" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <small id="labelEdit" class="form-text text-muted">Shio</small>
                                            <input type="text" class="form-control" name="shio"
                                                value="{{ $data->shio }}" autocomplete="off">
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
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add New Data Predictions</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form tambah data -->
                        <form action="{{ route('prediksi.create') }}" method="POST">
                            @csrf

                            <div class="row">
                                @if (auth()->user()->sites->site_name == 'all')
                                    <div class="mb-2">
                                        <select class="form-select" name="site" id="siteSelect">
                                            <option value="" style="color:gray">Select your site</option>
                                            @foreach ($sites as $k => $item)
                                                @if ($k != 1)
                                                    <option class="dropdown-item" value="{{ $k }}">
                                                        {{ $item['site_name'] }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                                <div class="col-md-6">
                                    @if (auth()->user()->sites->site_name == 'all')
                                        <small id="labelPrediksiTogel" class="form-text text-muted">Jenis Togel yang di
                                            Prediksi</small>
                                        <select class="form-select text-muted form-control" name="jenis_togel_id"
                                            required>
                                            <!-- Tambahkan option default untuk jenis togel -->
                                            <option value="" style="color:gray">Pilih Jenis Togel</option>
                                        </select>
                                    @endif

                                    @if ($id != 1)
                                        <div class="mb-2">

                                            <input type="hidden" class="form-control" name="site"
                                                value="{{ $id }}">

                                            <small id="labelPrediksiTogel" class="form-text text-muted">Jenis Togel yang
                                                di
                                                Prediksi</small>
                                            <select class="form-select text-muted form-control" name="jenis_togel_id"
                                                required>
                                                <option value="" style="color:gray">Pilih Jenis Togel</option>
                                                @foreach ($jenis_togel as $k => $item)
                                                    <option class="dropdown-item" value="{{ $item['id'] }}">
                                                        {{ $item['nama_togel'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    <div class="mb-2">
                                        <small id="labelPrediksiTogel" class="form-text text-muted">Tanggal
                                            Prediksi</small>
                                        <input type="date" class="form-control datepicker text-muted" name="tanggal"
                                            required>
                                    </div>
                                    <div class="mb-2">
                                        <small id="labelPrediksiTogel" class="form-text text-muted">BBFS</small>
                                        <input type="text" class="form-control" name="bbfs" pattern="[0-9 /\\]*"
                                            oninput="this.value = this.value.replace(/[^0-9 /\\]/g, '')"
                                            autocomplete="off">
                                    </div>
                                    <div class="mb-2">
                                        <small id="labelPrediksiTogel" class="form-text text-muted">Angka Main</small>
                                        <input type="text" class="form-control" name="angka_main"
                                            pattern="[0-9 /\\]*"
                                            oninput="this.value = this.value.replace(/[^0-9 /\\]/g, '')"
                                            autocomplete="off">
                                    </div>
                                    <div class="mb-2">
                                        <small id="labelPrediksiTogel" class="form-text text-muted">Prediksi 4D</small>
                                        <input type="text" class="form-control" name="d4" pattern="[0-9 /\\]*"
                                            oninput="this.value = this.value.replace(/[^0-9 /\\]/g, '')"
                                            autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <small id="labelPrediksiTogel" class="form-text text-muted">Prediksi 3D</small>
                                        <input type="text" class="form-control" name="d3" pattern="[0-9 /\\]*"
                                            oninput="this.value = this.value.replace(/[^0-9 /\\]/g, '')"
                                            autocomplete="off">
                                    </div>
                                    <div class="mb-2">
                                        <small id="labelPrediksiTogel" class="form-text text-muted">Prediksi
                                            2D(BB)</small>
                                        <input type="text" class="form-control" name="bb_2d" pattern="[0-9 /\\]*"
                                            oninput="this.value = this.value.replace(/[^0-9 /\\]/g, '')"
                                            autocomplete="off">
                                    </div>
                                    <div class="mb-2">
                                        <small id="labelPrediksiTogel" class="form-text text-muted">2D (Cadangan)</small>
                                        <input type="text" class="form-control" name="cadangan_2d"
                                            pattern="[0-9 /\\]*"
                                            oninput="this.value = this.value.replace(/[^0-9 /\\]/g, '')"
                                            autocomplete="off">
                                    </div>
                                    <div class="mb-2">
                                        <small id="labelPrediksiTogel" class="form-text text-muted">2D Colok Bebas</small>
                                        <input type="text" class="form-control" name="colok_bebas_2d"
                                            pattern="[0-9 /\\]*"
                                            oninput="this.value = this.value.replace(/[^0-9 /\\]/g, '')"
                                            autocomplete="off">
                                    </div>
                                    <div class="mb-2">
                                        <small id="labelPrediksiTogel" class="form-text text-muted">Colok Bebas</small>
                                        <input type="text" class="form-control" name="colok_bebas"
                                            pattern="[0-9 /\\]*"
                                            oninput="this.value = this.value.replace(/[^0-9 /\\]/g, '')"
                                            autocomplete="off">
                                    </div>
                                </div>
                            </div>


                            <div class="mb-3">
                                <small id="labelPrediksiTogel" class="form-text text-muted">Shio</small>
                                <input type="text" class="form-control" name="shio" autocomplete="off">
                            </div>

                            <small class="form-text text-muted">Note : Kosongkan apabila tidak dibutuhkan</small>
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


        <hr>

        <small>
            Note :
        </small>
        <br>
        <small>
            -- Silahkan Disable status untuk Togel yang tidak ada prediksinya
        </small>
        <br>
        @if ($id != 1)
            <small>
                -- Harap Reload Halaman ini Jika Telah Merubah Status
            </small>
        @endif
        <br><br>
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-8">
                    <table class="table table-bordered table-hover" id="daftarTogel">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 5%;">No</th>
                                <th class="text-center">Nama Togel</th>
                                @if (auth()->user()->sites->site_name == 'all')
                                    <th class="text-center">Situs</th>
                                @endif
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jenis_togel_all as $data)
                                <tr data-togel-id="{{ $data->id }}">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama_togel }}</td>
                                    @if (auth()->user()->sites->site_name == 'all')
                                        <td>{{ $data->site_name }}</td>
                                    @endif
                                    <td class="text-center">
                                        <select class="form-select-sm rounded border-0 text-center status" id="status"
                                            name="status">
                                            <option value="1" @if ($data->status == 1) selected @endif>
                                                Enabled
                                            </option>
                                            <option value="0" @if ($data->status == 0) selected @endif>
                                                Disabled
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    @endsection

    @section('script')
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
                $('#daftarTogel').DataTable();

                //untuk memilih jenis togel berdasarkan site yang dipilih
                @if (auth()->user()->sites->site_name == 'all')
                    $('#siteSelect').change(function() {
                        var siteId = $(this).val();
                        if (siteId) {
                            $.ajax({
                                url: "/get-jenis-togel/" + siteId,
                                type: "GET",
                                success: function(data) {
                                    var jenisTogelSelect = $('select[name="jenis_togel_id"]');
                                    jenisTogelSelect.empty();
                                    $.each(data, function(index, element) {
                                        jenisTogelSelect.append('<option value="' + element
                                            .id + '">' + element.nama_togel +
                                            '</option>');
                                    });
                                },
                                error: function(xhr, status, error) {
                                    console.error(xhr.responseText);
                                }
                            });
                        }
                    });
                @endif
                //UNTUK MENGUBAH STATUS TOGEL
                $(document).on('change', '.status', function() {
                    var togelId = $(this).closest('tr').data('togel-id');
                    var status = $(this).val();

                    $.ajax({
                        url: "{{ route('jenis-togel.update-status') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            togelId: togelId,
                            status: status
                        },
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });
            });
        </script>

        <script>
            var selectElements = document.querySelectorAll("[id^='status']");

            selectElements.forEach(function(selectElement) {
                selectElement.addEventListener("change", function() {
                    var selectedValue = this.value;
                    var element = this;
                    if (selectedValue == 1) {
                        element.style.background =
                            "linear-gradient(0deg, rgba(93,135,0,1) 0%, rgba(190,237,83,1) 100%)";
                    } else if (selectedValue == 0) {
                        element.style.background =
                            "linear-gradient(0deg, rgba(177,13,13,1) 0%, rgba(255,146,146,1) 100%)";
                    }
                });

                selectElement.dispatchEvent(new Event("change"));
            });
        </script>
    @endsection
