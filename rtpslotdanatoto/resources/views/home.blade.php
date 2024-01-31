@extends('layouts.master')
@section('content')
    <a href="{{ $site_settings->site_url }}">
        <amp-img src="{{ $site_settings->ads_url }}" width="900" height="510" layout="responsive" tabindex="0"
            alt="banner-img" role="button" class="banner"></amp-img>
    </a>

    <section class="slot">
        <div id="wrapper" class="wrapper">
            <div class="text-center mt-4 box-logo">
                <a href="/">
                    <amp-img src="{{ $site_settings->logo_url }}" height="60px" width="180px" alt="Logo"></amp-img>
                </a>
            </div>

            <div class="flex-container-side-desktop">
                <a class="flex-item-desktop-left" href="{{ route('payment') }}">
                    <div class="box-1">
                        <div class="btn btn-one">
                            <span>BUKTI BAYAR</span>
                        </div>
                    </div>
                </a>
                <a class="flex-item-desktop-right" href="{{ route('prediksi') }}">
                    <div class="box-1">
                        <div class="btn btn-one">
                            <span>PREDIKSI TOGEL</span>
                        </div>
                    </div>
                </a>
            </div>

            <h3 class="toplist__label text-center gacor">RTP Slot Terbaik Hari Ini</h3>


            <h3 class="text-center mb-2" style="padding-top: 4px;color:#FAF0D7;font-size:18px">
                {{ $current_datetime->format('l, d F Y') }}
            </h3>


            <amp-list layout="responsive" width="200px" height="125px" class="layout-list-home" src="/jenisVendor.json"
                binding="no" items="." single-item>
                <template type="amp-mustache">
                    <div class="app-footer" style="height: -webkit-fill-available;">
                        <section class="app-footer__partners" style="border:none">
                            <div class="grid-container">
                                @{{ #vendor }}
                                <div>
                                    <a href="{{ route('vendor') }}/@{{ vendor_name }}">
                                        <amp-img media="(max-width: 998px)" class="image-layout"
                                            src="@{{ image_url_vendor }}" width="90" height="45"
                                            alt="pragmatic"></amp-img>
                                        <amp-img media="(min-width: 998px)" src="@{{ image_url_vendor }}" width="130"
                                            height="63" alt="pragmatic"></amp-img>
                                    </a>
                                </div>
                                @{{ /vendor }}
                            </div>
                        </section>
                    </div>
                </template>
            </amp-list>

            <amp-state id="allGames" src="/games.json"></amp-state>

            <input class="form-control" type="search" placeholder=" Cari Game"
                on="input-debounced:AMP.setState({
                filteredGames: allGames.items.filter(
                    game => event.value == ''
                    ? true
                    : game.game_name.toLowerCase().indexOf(event.value.toLowerCase()) > -1
                        ? game
                        : ''
                )
                })" />
            <br>

            <amp-list width="auto" height="100" [height]="40 * filteredGames.length" layout="fixed-height"
                src="/games.json" [src]="filteredGames" class="game-list" binding="no">
                <template type="amp-mustache">
                    <div class="card game-one-half-slot slots-games">
                        <div class="card-content">
                            <a class="hover-btn" href="{{ $site_settings->site_url }}">
                                <div class="play-btn">PLAY NOW</div>
                            </a>
                            <a href="{{ $site_settings->site_url }}">
                                <amp-img class="img-zoom" src="@{{ image_url }}" alt="@{{ game_name }}"
                                    layout="responsive" width="200" height="150"></amp-img>
                            </a>
                            <div class="pbar">
                                <div class="pbar-bg @{{ warna }}" style="width: @{{ value }}%">
                                </div>
                                <div class="pbar-text">@{{ value }} %
                                </div>
                            </div>

                            <div id="xpola" class="my-icon d-block bg-dark p-2 mt-1 mt-md-1 mb-0 text-center lpola-1"
                                [class]="pola ? 'fitur-yes' : 'fitur-no'">
                                @{{ {
    pola_rtp }}}
                            </div>
                        </div>
                    </div>
                </template>
                <div placeholder>Loading...</div>
                <div fallback>Failed to load data !</div>
            </amp-list>

        </div>
    </section>
@endsection
