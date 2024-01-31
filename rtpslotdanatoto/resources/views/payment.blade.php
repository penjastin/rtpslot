@extends('layouts.master')
@section('content')
    <amp-state id="dataStat" src="/payment.json" [src]="'/payment.json?page='+page"></amp-state>
    <amp-list class="paged-amp-list" layout="fixed-height" height="800" src="/payment.json"
        [src]="'/payment.json?page='+page" binding="no" reset-on-refresh single-item>
        <template type="amp-mustache">
            <div class="flex justify-between align-items-center white">
                <span class="prediction"></span>
                <span class="title-page" {{ $count ? '' : 'hidden' }}>Hal. @{{ current_page }} /
                    @{{ last_page }}</span>
            </div>
            @{{ #data }}
            <div class="items-payment">
                <div class="title-payment">@{{ judul }}</div>
                <div class="items-image">
                    <div class="fixed-height-container">
                        <amp-img class="contain" layout="fill" src="@{{ gambar_1 }}"></amp-img>
                    </div>
                    <p class="paraf-content">@{{ konten_atas }}</p>
                </div>
                <div class="items-image">
                    <div class="fixed-height-container">
                        <amp-img class="contain" layout="fill" src="@{{ gambar_2 }}"></amp-img>
                    </div>
                </div>
                <p class="paraf-content-under">@{{ konten_bawah }}</p>
            </div>
            <hr>
            @{{ /data }}
        </template>
        <div class="show-more" overflow>
            <button class="show-more">Show more</button>
        </div>
    </amp-list>
    <div class="navigation">
        <button class="btn-prev" hidden [hidden]="dataStat.items.prev_page_url != null ? false : true"
            on="tap:AMP.pushState({ page: page - 1 })">
            &larr; Sebelumnya</button>
        <button class="btn-next" {{ $count ? '' : 'hidden' }} [hidden]="dataStat.items.next_page_url != null ? false : true"
            on="tap:AMP.pushState({ page: page ? page + 1 : 2 })">Selanjutnya &rarr;</button>
    </div>
@endsection
