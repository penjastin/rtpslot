@extends('layouts.master')

@section('title')
    {{ !empty($id) ? ucwords($sites[$id]['site_name']) : '' }} Site Settings
@endsection
@section('heading_left')
    {{-- {{ !empty($id) ? ucwords($sites[$id]['site_name']) : '' }} Site Settings --}}
@endsection

@section('content')
    <!-- Content Row -->
    <div class="box">
        <h3 style="color: #686D76">{{ !empty($id) ? ucwords($sites[$id]['site_name']) : '' }} Site's</h3>
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
                    <select class="form-select" id="linkSelect">
                        <option value="" style="color:gray">Select yout site</option>
                        @foreach ($sites as $k => $item)
                            @if ($k != 1)
                                <option class="dropdown-item" value="{{ route('site_setting.edit', $item['id']) }}"
                                    {{ $item['id'] == $id ? 'selected=selected' : '' }}>{{ $item['site_name'] }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <button type="button" onclick="navigateToSelectedLink()"
                        class="btn btn-primary btn-md btn-block mt-3 mb-3 site"
                        style="color: white; background-image: linear-gradient(to top, #4481eb 0%, #04befe 100%); border:none">Go
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
        @if ($id != 1)
            <form action="{{ route('site_setting.update', $id) }}" method="post" enctype="multipart/form-data">
                <input type="hidden" value="{{ $sites[$id]['site_name'] }}" name="nama_situs">
                <div class="row">
                    @csrf
                    @method('PUT')
                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label for="site_title" class="col-sm-3 col-form-label">Site Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="site_title" name="site_title"
                                    value="{{ old('site_title') ? old('site_title') : $sites[$id]['site_title'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="site_description" class="col-sm-3 col-form-label">Site Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="site_description" name="site_description"
                                    value="{{ old('site_description') ? old('site_description') : $sites[$id]['site_description'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="site_url" class="col-sm-3 col-form-label">Site URL</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="site_url" name="site_url"
                                    value="{{ old('site_url') ? old('site_url') : $sites[$id]['site_url'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="site_marquee" class="col-sm-3 col-form-label">Announcement Text</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="site_marquee" id="site_marquee" cols="30" rows="10">{{ old('site_marquee') ? old('site_marquee') : $sites[$id]['site_marquee'] }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="logo" class="col-sm-3 col-form-label">Logo URL</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="logo_url" name="logo_url"
                                    value="{{ old('logo_url') ? old('logo_url') : $sites[$id]['logo_url'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ads_url" class="col-sm-3 col-form-label">Ads URL</label>
                            <div class="col-sm-9 d-flex">
                                <input type="text" class="form-control" id="ads_url" name="ads_url"
                                    value="{{ old('ads_url') ? old('ads_url') : $sites[$id]['ads_url'] }}">
                                <input type="file" name="ads_urlfile" class="form-control ml-2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bg_url" class="col-sm-3 col-form-label">Background Image</label>
                            <div class="col-sm-9 d-flex">
                                <input type="text" class="form-control" id="bg_url" name="bg_url"
                                    placeholder="Tempel Background URL yang sudah ada"
                                    value="{{ old('bg_url') ? old('bg_url') : $sites[$id]['bg_url'] }}">
                                <input type="file" name="bg_urlfile" class="form-control ml-2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="payment" class="col-sm-3 col-form-label">News Menu</label>
                            <div class="col-sm-2 d-flex">
                                <select class="form-select text-center rounded" aria-label="form-select-sm example"
                                    name="payment" id="payment">
                                    <option value="1" {{ $sites[$id]['payment'] == 1 ? 'selected' : '' }}>
                                        Enabled
                                    </option>
                                    <option value="0" {{ $sites[$id]['payment'] == 0 ? 'selected' : '' }}>
                                        Disabled
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="togel_prediction" class="col-sm-3 col-form-label">Togel Predictions Menu</label>
                            <div class="col-sm-2 d-flex">
                                <select class="form-select text-center rounded" aria-label="form-select-sm example"
                                    name="togel_prediction" id="togel_prediction">
                                    <option value="1" {{ $sites[$id]['togel_prediction'] == 1 ? 'selected' : '' }}>
                                        Enabled
                                    </option>
                                    <option value="0" {{ $sites[$id]['togel_prediction'] == 0 ? 'selected' : '' }}>
                                        Disabled
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary"
                                    style="color: white; background-image: linear-gradient(to top, #4481eb 0%, #04befe 100%); border:none">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endif

    @endsection

    @section('script')
        <script>
            var selectElements = document.querySelectorAll("[id^='togel_prediction'], [id^='payment']");

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

                // Memindahkan pemanggilan dispatchEvent ke dalam loop
                selectElement.dispatchEvent(new Event("change"));
            });
        </script>
    @endsection
