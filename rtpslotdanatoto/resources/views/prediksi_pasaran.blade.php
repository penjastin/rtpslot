@extends('layouts.master')
@section('content')
    <amp-list class="paged-amp-list" layout="fixed-height" height="800" src="/prediksiByPasaran.json"
        [src]="'/prediksiByPasaran.json?page=' + pageNumber" binding="always" reset-on-refresh single-item>
        <template type="amp-mustache">
            <div class="flex justify-between align-items-center white">
                <span class="prediction"></span>
                <span class="title-page" [hidden]="page.items.pageCount <= 1">Hal. @{{ currentPage }} /
                    @{{ pageCount }}</span>
            </div>
            @{{ #prediksi }}
            <div class="items">
                <div class="title-prediction">
                    Prediksi Togel @{{ nama_togel }}
                </div>
                <table class="table table-layout">
                    <tr>
                        <th class="table-title">Tanggal</th>
                        <th class="table-title">@{{ tanggal }}</th>
                    </tr>
                    <tr>
                        <td class="table-session">BBFS</td>
                        <td class="table-session">@{{ bbfs }}</td>
                    </tr>
                    <tr>
                        <td class="table-session">ANGKA MAIN</td>
                        <td class="table-session">@{{ angka_main }}</td>
                    </tr>
                    <tr>
                        <td class="table-session">4D</td>
                        <td class="table-session">@{{ d4 }}</td>
                    </tr>
                    <tr>
                        <td class="table-session">3D</td>
                        <td class="table-session">@{{ d3 }}</td>
                    </tr>
                    <tr>
                        <td class="table-session">2D (BB)</td>
                        <td class="table-session">@{{ bb_2d }}</td>
                    </tr>
                    <tr>
                        <td class="table-session">2D (CADANGAN)</td>
                        <td class="table-session">@{{ cadangan_2d }}</td>
                    </tr>
                    <tr>
                        <td class="table-session">COLOK BEBAS</td>
                        <td class="table-session">@{{ colok_bebas }}</td>
                    </tr>
                    <tr>
                        <td class="table-session">COLOK BEBAS 2D</td>
                        <td class="table-session">@{{ colok_bebas_2d }}</td>
                    </tr>
                    <tr>
                        <td class="table-session">SHIO</td>
                        <td class="table-session">@{{ shio }}</td>
                    </tr>
                </table>
            </div>
            @{{ /prediksi }}
        </template>
        <div overflow class="show-more">
            <button class="show-more">Show more</button>
        </div>
    </amp-list>
    <div class="navigation">
        <button class="btn-prev" hidden [hidden]="pageNumber < 2"
            on="tap: AMP.setState({ pageNumber: pageNumber - 1 , jenis: location.search.split('=').pop() })">
            &larr; Sebelumnya</button>
        <button class="btn-next" [hidden]="page ? pageNumber >= page.items.pageCount : false"
            on="tap: AMP.setState({ pageNumber: pageNumber ? pageNumber + 1 : 2 })">Selanjutnya
            &rarr;</button>
    </div>

    <amp-state id="page" src="/prediksiByPasaran.json" [src]="'/prediksiByPasaran.json?page=' + pageNumber">
    </amp-state>
@endsection
