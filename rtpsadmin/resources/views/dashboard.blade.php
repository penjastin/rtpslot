@extends('layouts.master')

@section('title')
    Admin Dashboard
@endsection

@section('content')

    <!-- Content Row -->
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">

    <div class="box">
        <h3 style="color: #686D76">{{ !empty($id) ? ucwords($sites[$id]['site_name']) : '' }} Dashboard</h3>
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

        @if (auth()->user()->sites->site_name == 'all')
            <div class="row">
                <div class="col-md-12">
                    <select id="linkSelect" class="form-select">
                        <option value="" style="color: gray">Select your site</option>
                        @foreach ($sites as $k => $item)
                            @if ($k != 1)
                                <option value="{{ route('dashboard.select', $item['id']) }}"
                                    {{ $item['id'] == $id ? 'selected=selected' : '' }}>
                                    {{ $item['site_name'] }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <button type="button" onclick="navigateToSelectedLink()"
                        class="btn btn-primary btn-md btn-block mt-3 mb-3 site"
                        style="color: white; background-color: #4481eb; border:none">Go
                        to
                        site</button>
                </div>
                <script>
                    function navigateToSelectedLink() {
                        const linkSelect = document.getElementById('linkSelect');
                        const selectedValue = linkSelect.value;

                        if (selectedValue !== '') {
                            window.location.href = selectedValue;
                        }
                    }
                </script>

            </div>
        @endif
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#filter_vid').on('change', function() {
                    var selectedVid = $(this).val();
                    // Kirim permintaan AJAX ke server
                    $.ajax({
                        url: '/update-data', // Ganti dengan URL yang sesuai
                        type: 'POST',
                        data: {
                            vid: selectedVid
                        },
                        success: function(response) {
                            // Perbarui tampilan data dengan hasil respons dari server
                            $('#data-container').html(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                });
            });
        </script>
        @if (auth()->user()->sites->site_name != 'all' || (auth()->user()->sites->site_name == 'all' && !empty($id)))
            @if ($id)
                <form action="{{ route('dashboard.update', $id) }}" method="post">
                @else
                    <form action="{{ route('dashboard.update', 'update') }}" method="post">
            @endif
            @csrf
            @method('PUT')

            <div>

                <span class="text-dark font-weight-bold">Status Vendor : &nbsp;</span>

                @php
                    $vids = [];
                @endphp

                @foreach ($results as $key => $item)
                    @if (!in_array($item['vid'], $vids))
                        @php
                            $vids[] = $item['vid'];
                        @endphp
                        <div class="form-check-inline form-switch">
                            <label class="form-check-label mb-3" for="status_vendor[{{ $key }}]">
                                <input class="form-check-input status-switch mt-1" type="checkbox" name="status_vendor[]"
                                    id="status_vendor" value="{{ $item['vid'] }}"
                                    {{ $item['status_vendor'] == 1 ? 'checked' : '' }}>
                                @if ($item['vid'] == 1)
                                    Pragmatic Play
                                @elseif ($item['vid'] == 2)
                                    Habanero
                                @elseif ($item['vid'] == 3)
                                    IDN Slot
                                @elseif ($item['vid'] == 4)
                                    PG Soft
                                @elseif ($item['vid'] == 5)
                                    Microgaming
                                @elseif ($item['vid'] == 6)
                                    Top Trend
                                @elseif ($item['vid'] == 7)
                                    GMW
                                @elseif ($item['vid'] == 8)
                                    No Limit City
                                @endif
                            </label>
                        </div>
                    @endif
                @endforeach


                @php
                    $filters = [];
                @endphp
                <label for="filter_vid">&nbsp; | &nbsp; Filter by Vendor:</label>
                <select id="filter_vid" name="filter_vid" style="border-radius: 10px; background:#80808038;"
                    class="text-center">
                    <option value="">All Games</option>
                    @foreach ($results as $item)
                        @if (!in_array($item['vid'], $filters))
                            @php
                                $filters[] = $item['vid'];
                            @endphp
                            <option value="{{ $item['vid'] }}">
                                @if ($item['vid'] == 1)
                                    Pragmatic Play
                                @elseif ($item['vid'] == 2)
                                    Habanero
                                @elseif ($item['vid'] == 3)
                                    IDN Slot
                                @elseif ($item['vid'] == 4)
                                    PG Soft
                                @elseif ($item['vid'] == 5)
                                    Microgaming
                                @elseif ($item['vid'] == 6)
                                    Top Trend
                                @elseif ($item['vid'] == 7)
                                    GMW
                                @elseif ($item['vid'] == 8)
                                    No Limit City
                                @endif
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="row mb-6" id="data-container" style="margin-bottom: 100px;">
                @foreach ($results as $k => $result)
                    <div class="col-md-2 text-center" data-vid="{{ $result['vid'] }}">
                        <div class="card mb-3 card-1" style="width: 15rem;">
                            <img src="{{ $result['image_url'] }}" style="height: 150px" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <label for="rtp_value[]">{{ $result['game_name'] }}</label>
                                <hr>
                                <input type="text" name="rtp_value[]" class="form-control text-center form-control-sm"
                                    id="percent-bar-{{ $k }}"
                                    value="{{ old('rtp_value.' . $k) ? old('rtp_value.' . $k) : $result['value'] }}">
                                <input type="hidden" name="pola_rtp[]" class="form-control form-control-sm"
                                    id="polartp-{{ $k }}"
                                    value="{{ old('pola_rtp.' . $k) ? old('pola_rtp.' . $k) : $result['pola_rtp'] }}">

                                <hr>
                                {{-- <div class="form-check form-switch d-flex flex-column-reverse justify-content-between">
                                    <label class="form-check-label"
                                        for="flexSwitchCheckChecked">{{ $result['status_game'] ? 'Active' : 'Non-Active' }}</label>
                                    <input class="form-check-input flexSwitchCheckChecked" type="checkbox" role="switch"
                                        id="flexSwitchCheckChecked" {{ $result['status_game'] ? 'checked' : '' }}
                                        name="status_game[{{ $k }}]" value="0">
                                </div> --}}
                                <select class="text-center rounded" aria-label="form-select-sm example" name="status_game[]"
                                    id="selectStatus{{ $loop->index }}" style="width:100%; height: 30px; border: 0;">
                                    <option value="1" {{ $result['status_game'] == 1 ? 'selected' : '' }}>
                                        Enabled
                                    </option>
                                    <option value="0" {{ $result['status_game'] == 0 ? 'selected' : '' }}>
                                        Disabled
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                @endforeach
                <input type="hidden" value="{{ $count }}" id="counter">
            </div>
            <div class="fixed-bottom box-4">

                <div class="row">
                    <div class="col-md-6">
                        <button type="button" id="randomrtp" class="btn btn-md btn-danger btn-block mt-2 reset"><i
                                class="fas fa-crosshairs"></i>&nbsp;Random RTP</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" id="savertp" class="btn btn-md btn-primary btn-block mt-2"><i
                                class="fas fa-plus-square"></i>&nbsp;Simpan RTP</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ url('dashboard') }}" class="btn btn-md btn-secondary btn-block mt-2"><i
                                class="fas fa-back"></i>&nbsp;Refresh</a>
                    </div>
                </div>
            </div>

    </div>
    </form>
    </div>
    @endif

@endsection

@section('script')
    <script>
        //switch
        // $(`.flexSwitchCheckChecked`).on("change", function() {
        //         $(this).val($(this).prop("checked") ? "1" : "0");
        //         $(this).prop("checked") ? $(this).siblings().text("Active") : $(this).siblings().text("Non-Active");
        //     })
        //     .trigger("change");

        // $(document).ready(function() {
        //     $('.form-check').each(function() {
        //         var switchContainer = $(this);
        //         var switchInput = switchContainer.find('.flexSwitchCheckChecked');
        //         var isChecked = switchInput.prop('checked');

        //         if (isChecked) {
        //             switchContainer.addClass('switch-on');
        //             switchContainer.removeClass('switch-off');
        //         } else {
        //             switchContainer.addClass('switch-off');
        //             switchContainer.removeClass('switch-on');
        //         }

        //         // Atur teks berdasarkan status saat halaman dimuat
        //         var labelText = isChecked ? 'Active' : 'Non-Active';
        //         switchContainer.find('.form-check-label').text(labelText);

        //         switchContainer.on('click', function(event) {
        //             event.stopPropagation();
        //             isChecked = !isChecked;
        //             switchInput.prop('checked', isChecked);

        //             if (isChecked) {
        //                 switchContainer.addClass('switch-on');
        //                 switchContainer.removeClass('switch-off');
        //             } else {
        //                 switchContainer.addClass('switch-off');
        //                 switchContainer.removeClass('switch-on');
        //             }

        //             // Atur teks berdasarkan status setelah perubahan
        //             labelText = isChecked ? 'Active' : 'Non-Active';
        //             switchContainer.find('.form-check-label').text(labelText);
        //         });
        //     });
        // });

        // end switch

        //filter
        // Fungsi untuk memfilter dan menampilkan data yang sesuai
        function filterData(vid) {
            $('#data-container .col-md-2').hide();
            if (vid === '') {
                $('#data-container .col-md-2').show();
            } else {
                $('#data-container .col-md-2[data-vid="' + vid + '"]').show();
            }
        }
        $(document).ready(function() {
            $('#filter_vid').on('change', function() {
                var selectedVid = $(this).val();
                filterData(selectedVid);
            });
        });


        var selectElements = document.querySelectorAll("[id^='selectStatus']");

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

    <script src="{{ asset('assets/js/rand.js') }}"></script>
@endsection
