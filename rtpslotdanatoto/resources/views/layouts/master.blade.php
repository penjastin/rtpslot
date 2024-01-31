<!DOCTYPE html>
<html amp lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title itemprop="PLAYEntityOfPage">{{ $site_meta['site_title'] }}</title>
    {{-- Amp --}}
    <meta name="googlebot" content="noindex">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <link rel="manifest" href="/manifest.json">
    <link rel="icon" type="image/png" href="/favicon.png">
    <script async custom-element="amp-install-serviceworker"
        src="https://cdn.ampproject.org/v0/amp-install-serviceworker-0.1.js"></script>
    <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
    <script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
    <script async custom-element="amp-list" src="https://cdn.ampproject.org/v0/amp-list-0.1.js"></script>
    <script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
    <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="canonical" href="http://localhost">

    <style amp-boilerplate>
        body {
            -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            animation: -amp-start 8s steps(1, end) 0s 1 normal both
        }

        @-webkit-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @-moz-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @-ms-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @-o-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }
    </style>
    <noscript>
        <style amp-boilerplate>
            body {
                -webkit-animation: none;
                -moz-animation: none;
                -ms-animation: none;
                animation: none
            }
        </style>
    </noscript>
    <meta name="description" content="{{ $site_meta['site_description'] }}">
    <link
        href="https://static.hokibagus.club/{{ $site_meta['site_name'] }}/rtpslot/{{ $site_meta['site_name'] }}_fav_icon.png"
        rel="shortcut icon" sizes="16x16">
    <style amp-custom>
        .btn {
            display: inline-block;
            padding: 6px 12px;
            touch-action: manipulation;
            cursor: pointer;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 5px;
            font: 500 18.5px BebasNeue;
            width: 100%;
            color: #FAF0D7;
            text-shadow: 0 0 3px #000;
            letter-spacing: 1px
        }

        .btn-one {
            transition: all 0.3s;
            position: relative;
        }

        .btn-one span {
            transition: all 0.3s;
        }

        .btn-one::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            opacity: 0;
            transition: all 0.3s;
            border-top-width: 1.8px;
            border-bottom-width: 1.8px;
            border-top-style: solid;
            border-bottom-style: solid;
            border-top-color: rgba(250, 240, 215, 0.5);
            border-bottom-color: rgba(250, 240, 215, 0.5);
            transform: scale(0.1, 1);
        }

        .btn-one:hover span {
            letter-spacing: 2px;
        }

        .btn-one:hover::before {
            opacity: 1;
            transform: scale(1, 1);
        }

        .btn-one::after {
            border-radius: 5px;
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            transition: all 0.3s;
            background-color: rgba(250, 240, 215, 0.4);
        }

        .btn-one:hover::after {
            opacity: 0;
            transform: scale(0.1, 1);
        }




        .material-symbols-rounded {
            font-size: 15px;
            font-variation-settings:
                'FILL' 1,
                'wght' 800,
                'GRAD' 600,
                'opsz' 30
        }


        .title-prediction {
            color: #fff;
            font-weight: 700;
            text-align: center;
            font-size: 22px;
            margin-top: 17px;
            text-decoration: underline
        }

        .content-payment {
            margin: 7px;
            text-align: center;
            justify-content: center;
            align-items: center;
        }

        .items-image {
            text-align: center;
            justify-content: center;
            align-items: center;
        }


        .paraf-content {
            font-size: 18px;
            text-align: center;
            margin: 5px;
            color: white;
        }

        .paraf-content-under {
            font-size: 18px;
            text-align: center;
            margin: 5px;
            color: white;
            margin-bottom: 25px;
        }

        .title-payment {
            color: white;
            font-weight: 700;
            text-align: center;
            font-size: 25px;
            margin: 5px;
            margin-top: 25px;
        }

        .table-responsive {
            min-height: .01%;
            overflow-x: auto
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0
        }

        .table td,
        .table th {
            background-color: #F3F5EF;
            border: 1px solid #bbb;
            color: #333;
            font-family: sans-serif;
            font-size: 85%;
            padding: 10px;
            vertical-align: top
        }

        .table tr:nth-child(even) td {
            background-color: #F0F0E5
        }

        .table th {
            background-color: #EAE2CF;
            color: #333;
            font-size: 95%
        }

        .table tr.even:hover td,
        .table tr:hover td {
            color: #222;
            background-color: #FFFBEF
        }

        .tg-bf {
            font-weight: 700
        }

        .tg-it {
            font-style: italic
        }

        .tg-left {
            text-align: left
        }

        .tg-right {
            text-align: right
        }

        .tg-center {
            text-align: center
        }

        @media screen and (max-width:767px) {
            .table-responsive {
                width: 100%;
                margin-bottom: 15px;
                overflow-y: hidden;
                -ms-overflow-style: -ms-autohiding-scrollbar
            }

            .table-responsive>.table {
                margin-bottom: 0
            }

            .table-responsive>.table>tbody>tr>td,
            .table-responsive>.table>tbody>tr>th,
            .table-responsive>.table>tfoot>tr>td,
            .table-responsive>.table>tfoot>tr>th,
            .table-responsive>.table>thead>tr>td,
            .table-responsive>.table>thead>tr>th {
                white-space: nowrap
            }
        }

        .table-layout {
            margin-top: 20px;
            margin-bottom: 25px
        }

        .table-title {
            background-color: #E7CEA6;
            padding: 5px
        }

        .table-session {
            background-color: #F4F2DE;
            padding: 5px
        }

        .author {
            text-align: right;
            font-size: 15px;
            margin-bottom: 25px;
            margin-top: 25px;
            color: white;
        }

        .items-payment {
            margin: 20px;
        }

        .fixed-height-container {
            position: relative;
            width: 100%;
            height: 500px;
            margin: 20px 0px;
        }

        amp-img.contain img {
            object-fit: contain;
        }

        .menu-side {
            color: #FAF0D7;
            font-size: 14px;
            font-weight: 700;
            text-align: center;
            padding: 12px;
            border-bottom: solid #FAF0D7 1px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-transform: uppercase
        }

        .menu-side-type {
            color: #FAF0D7;
            font-size: 14px;
            font-weight: 700;
            text-align: left;
            padding: 5px;
            border-bottom: solid #FAF0D7 1px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-transform: uppercase
        }

        .side-prediksi {
            color: #FAF0D7;
            font-size: 16px;
            font-weight: 700;
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
        }

        .show-more {
            display: none;
        }

        .title-page {
            color: whitesmoke;
            background: rgb(0, 0, 0);
            background: -moz-linear-gradient(0deg, rgba(0, 0, 0, 0.50) 0%, rgba(0, 0, 0, 0.50) 100%);
            background: -webkit-linear-gradient(0deg, rgba(0, 0, 0, 0.50) 0%, rgba(0, 0, 0, 0.50) 100%);
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.50) 0%, rgba(0, 0, 0, 0.50) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#000000", endColorstr="#000000", GradientType=1);
            border-radius: 3px;
            padding: 4px;
            font-size: 13px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
        }


        .list-test {
            height: 1000px;
        }

        .side {
            background: transparent;
            border: none;
            margin-top: 5px
        }

        .flex-container-side {
            display: flex;
            flex-direction: row;
            font-size: 16px;
            text-align: center
        }


        .flex-item-desktop-left {
            flex: 50%;
            margin-top: 14px;
            margin-right: 1.5px;


        }

        .flex-item-desktop-right {
            flex: 50%;
            margin-top: 14px;
            margin-left: 1.5px;


        }

        .flex-item-desktop-right:hover {
            animation-name: hoverWobbleVertical;
            animation-duration: 1s;
            animation-timing-function: ease-out;
            animation-iteration-count: 1;
            transform-origin: center bottom;
            border-radius: 10px;
            transition-delay: 30ms;
            color: black;
        }


        .flex-item-left {
            flex: 20%
        }

        .flex-item-center {
            flex: 60%;
            padding-top: 26px;
            padding-bottom: 7px
        }

        .flex-item-left-search {
            flex: 90%
        }

        .flex-item-right-search {
            flex: 10%;

        }

        .flex-item-right {
            padding-top: 26px;
            padding-bottom: 7px;
            flex: 20%
        }

        .flex-item-dropdown-left {
            padding-top: 12px;
            flex: 80%;
            border-bottom: solid #FAF0D7 1px;
            border-right: solid #FAF0D7 1px
        }

        .flex-item-dropdown-right {
            flex: 20%
        }

        .header {
            background-color: #FFF349;
            padding: 1px
        }

        .marquee-text {
            height: 30px;
            display: block;
            line-height: 30px;
            overflow: hidden;
            position: relative
        }

        .marquee-text:before,
        .marquee-text:after {
            content: '';
            position: absolute;
            width: 5px;
            height: 100%;
            background: #FFF349;
            top: 0;
            z-index: 2
        }

        .marquee-text:before {
            left: 0
        }

        .marquee-text:after {
            right: 0
        }

        .marquee-text div {
            display: block;
            width: 200%;
            height: 30px;
            line-height: 30px;
            position: absolute;
            overflow: hidden;
            font-size: 14px;
            color: #3C4048;
            z-index: 1;
            font-weight: 700;
            animation: marquee 15s linear infinite
        }

        .marquee-text span {
            float: left;
            width: 50%
        }

        .marquee-text:hover div {
            animation-play-state: paused
        }

        @keyframes marquee {
            0% {
                left: 0
            }

            100% {
                left: -100%
            }
        }

        .on-768px,
        .on-425px {
            display: none
        }


        @media screen and (max-width:1024px) {
            .marquee-text div {
                animation: marquee 10s linear infinite
            }
        }

        @media screen and (max-width:768px) {
            .marquee-text div {
                animation: marquee 8s linear infinite
            }

            .on-768px {
                display: block
            }

            .on-425px,
            .on-1440px {
                display: none
            }


        }

        @media screen and (max-width:425px) {
            .marquee-text div {
                animation: marquee 5s linear infinite
            }

            .on-425px {
                display: block
            }

            .on-768px,
            .on-1440px {
                display: none
            }
        }

        body {
            font: "Bitstream Vera Serif Bold", serif
        }

        @keyframes slide-in {
            0% {
                top: -100%
            }

            100% {
                top: 50%
            }
        }

        .link-container {
            display: flex;
            justify-content: center;
            font-size: var(--x-large-font);
            padding: 0;
            width: 100%
        }

        .grid-container {
            display: grid;
            grid: 70px / auto auto auto;
            padding: 5px
        }

        .grid-container>div {
            text-align: center;
            padding: 3px
        }

        .item2 {
            justify-content: center;
            text-align: center;
            padding-top: 3px;
            padding-bottom: 3px
        }

        .link-container a {
            width: 50%;
            text-align: center;
            padding: 15px 20px;
            text-transform: uppercase;
            color: #fff;
            text-decoration: none
        }

        .register-button {
            background-image: linear-gradient(rgb(104, 2, 2), rgb(203, 0, 0));
            background-color: initial
        }

        .login-button {
            background-image: linear-gradient(rgb(0, 12, 153), rgb(7, 71, 102));
            background-color: initial
        }

        * {
            font-family: sans-serif;
            box-sizing: border-box
        }

        p {
            margin: 0
        }

        a:hover {
            text-decoration: none;
            color: #fff
        }

        .container {
            width: 100%;
            margin-left: auto;
            margin-right: auto
        }

        .adv {
            justify-content: center;
            display: flex;
            flex-wrap: wrap
        }

        img {
            vertical-align: middle;
            border-style: none
        }

        .title {
            display: flex;
            justify-content: center
        }

        .title-text {
            color: #fff;
            font-size: 2.5rem
        }

        .container.footer.text-center {
            padding-top: 2px;
            color: #929AAB
        }

        .slot {
            display: block
        }

        .slot .slot-sidebar {
            padding-right: 10px;
            padding-left: 0;
            margin-top: -15px;
            background-color: #000;
            width: 100%;
            flex: none;
            max-width: 100%;
            padding-right: 0
        }

        .btn-provider:hover {
            background-color: #644c1c
        }

        .slot-sidebar-nav {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: nowrap;
            padding-left: 0;
            margin-bottom: 0;
            list-style: none
        }

        .slot-sidebar-nav>li {
            border-bottom: 1px solid #0092b1;
            width: 100%;
            position: relative;
            display: block;
            border-bottom: none;
            padding: 6px;
            background: linear-gradient(to bottom, #f5cc00 0%, #ffd400 46%, #fff702 100%)
        }

        .slot-sidebar-nav>li>a {
            color: #fff;
            font-size: 13px;
            padding: 7px 10px;
            display: block;
            background-color: #000
        }

        .btn-provider {
            text-align: center;
            display: block
        }

        .enter {
            display: none
        }

        .btn-provider span {
            position: unset
        }

        .active {
            background-color: #0092b1
        }


        .slot .content {
            float: none;
            width: 100%;
            padding: 10px;
            flex: 0 0 100%;
            max-width: 100%;
            background-color: #1d1d1d;
            border-radius: 4px
        }

        .wrapper {
            width: 100%;
            padding: 0;
            overflow: hidden;
            position: relative;
            z-index: 0
        }

        .card {
            float: left;
            width: 25%;
            background: 0 0;
            border: none;
            text-align: center;
            position: relative
        }

        .card-content {
            margin: 5px;
            color: #fff;
            font-size: 12px;
            background-color: rgba(219, 219, 219, .21);
            overflow: hidden;
            position: relative;
            padding: 5px;
            border-radius: 5px
        }

        .percent {
            height: 18px;
            display: flex;
            overflow: hidden;
            line-height: 0;
            font-size: .75rem;
            background-color: gray;
            position: relative;
            z-index: 1;
            border-radius: 18px;
            margin: 4px auto
        }

        .percent p {
            z-index: 15;
            position: absolute;
            text-align: center;
            width: 100%;
            font-size: 14px;
            font-weight: 700;
            transform: translateY(8px);
            color: #000
        }

        .percent-bar {
            background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
            background-size: 1rem 1rem;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            -ms-flex-pack: center;
            justify-content: center;
            overflow: hidden;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            transition: width .6s ease;
            -webkit-animation: progress-bar-stripes 1s linear infinite;
            animation: progress-bar-stripes 1s linear infinite;
            z-index: 10
        }

        .card-content a.hover-btn {
            display: block
        }

        .hover-btn {
            position: absolute;
            width: 212px;
            opacity: 0;
            background-color: rgba(0, 0, 0, .9);
            transition: all .1s ease-in-out;
            z-index: 10;
            height: 148px;
            border-radius: 3px
        }

        .image {
            width: 100%;
            height: 100%
        }

        .maintenance {
            position: absolute;
            background-color: rgba(0, 0, 0, .5);
            z-index: 10;
            width: 100%;
            height: 100%;
            color: #fff;
            text-align: center;
            margin: -6px
        }

        .maintenance p {
            position: relative;
            top: 40%;
            font-size: 13px
        }

        .play-btn {
            font-size: 15px;
            text-decoration: none;
            font-weight: 700;
            text-align: center;
            align-items: center;
            margin-top: 42%;
            padding: 8px;
            display: block;
            margin-left: 30px;
            margin-right: 30px;
            margin: 42% 30px;
            background-color: #eeec36;
            background-image: linear-gradient(19deg, #eeec36 0%, #f79e1a 100%);
            border-radius: 4px;
            transition: all .3s ease
        }

        .play-btn:hover {
            color: #000;
            background-color: #e0de31;
            background-image: linear-gradient(19deg, #e0de31 0%, #d6860f 100%);
            transition-duration: 3s
        }

        .img-zoom {
            transition: all .45s ease-in-out;
            border-radius: 5px
        }

        .ygg-img {
            border: 5px solid #2f2f2f
        }

        .hover-btn:hover {
            opacity: 100%
        }

        .hover-btn:hover~.img-zoom {
            position: relative
        }

        .short {
            display: none
        }

        .next-btn {
            background: linear-gradient(to bottom, #242424 0%, #515151 46%, #242424 100%);
            width: 15%
        }

        .mySlides {
            display: none
        }

        .next-btn {
            background-color: #292a2b;
            border: none;
            color: #fff
        }

        @media(min-width:576px) {
            .container {
                max-width: 540px
            }
        }

        @media(min-width:768px) {
            .container {
                max-width: 720px
            }
        }

        @media(min-width:992px) {
            .container {
                max-width: 960px
            }
        }

        @media(min-width:1200px) {
            .container {
                max-width: 1140px
            }
        }

        @media(max-width:992px) {
            .slot-sidebar-nav {
                flex-wrap: nowrap
            }

            .slot-sidebar {
                width: 100%;
                flex: none;
                max-width: 100%;
                padding-right: 0
            }

            .content {
                float: none;
                width: 100%;
                flex: none;
                max-width: 100%
            }

            .card {
                width: 33.333333333333333%
            }

            .hover-btn {
                display: none
            }

            .play-btn {
                display: none
            }

            .hover-btn:hover~.img-zoom {
                transform: scale(1);
                position: relative
            }

            .btn-provider {
                text-align: center;
                display: block
            }

            .enter {
                display: block
            }

            .btn-provider span {
                position: unset
            }

            .btn-provider i {
                margin: 0
            }

            .slot-sidebar-nav li {
                border-bottom: none
            }

            .slot-sidebar-nav li a p {
                font-size: 13px
            }

            .slot-sidebar-nav li a img {
                height: 37.5px
            }

            .maintenance p {
                font-size: 5px
            }
        }

        html {
            font-family: -apple-system, system-ui, BlinkMacSystemFont, segoe ui, Roboto, helvetica neue, Arial, sans-serif;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%
        }

        a,
        body,
        center,
        div,
        em,
        kolongramen,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        header,
        html,
        iframe,
        img,
        li,
        menu,
        nav,
        ol,
        p,
        span,
        table,
        tbody,
        td,
        tfoot,
        th,
        thead,
        tr,
        ul {
            font-family: -apple-system, system-ui, BlinkMacSystemFont, segoe ui, Roboto, helvetica neue, Arial, sans-serif;
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            vertical-align: baseline
        }

        a,
        a:active,
        a:focus {
            outline: 0;
            text-decoration: none
        }

        a {
            color: #fff
        }

        * {
            padding: 0;
            margin: 0;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-top: 0;
            margin-bottom: .5rem
        }

        p {
            margin: 0 0 10px
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem
        }

        .clear {
            clear: both
        }

        .konten-bola {
            text-align: center
        }

        .align-middle {
            vertical-align: middle
        }

        body.rtpslot {
            background: url("{{ $site_settings['bg_url'] }}");
            background-position: center top;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
            top: -12px
        }

        main {
            background: rgb(0, 0, 0);
            background: linear-gradient(90deg, rgba(0, 0, 0, .2) 0%, rgba(0, 0, 0, .2) 100%);
            border-bottom-left-radius: .5rem;
            border-bottom-right-radius: .5rem;
            margin: 0 auto;
            max-width: 960px
        }

        .container {
            padding: 1rem
        }


        @keyframes blinking {
            0% {
                border: 5px solid #fff
            }

            100% {
                border: 5px solid #fdbf02
            }
        }

        .bola-casino {
            animation-name: blinker;
            animation-duration: 1s;
            animation-timing-function: linear;
            animation-iteration-count: infinite
        }

        .anim {
            animation: blinkings 1s infinite
        }

        @keyframes blinkings {
            0% {
                border: 2px solid #fff
            }

            100% {
                border: 2px solid #fdbf02
            }
        }

        @media(min-width:768px) {
            .container {
                max-width: 720px
            }
        }

        @media(min-width:992px) {
            .container {
                max-width: 960px
            }
        }

        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px
        }

        .p-0 {
            padding: 0
        }

        .col-md-12,
        .col-md-4,
        .col-md-6,
        .col-md-8,
        .col-xs-6 {
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px
        }

        .col-xs-6 {
            float: left;
            width: 50%
        }

        @media(min-width:768px) {
            .col-md-4 {
                -ms-flex: 0 0 33.333333%;
                flex: 0 0 33.333333%;
                max-width: 33.333333%
            }

            .col-md-6 {
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%
            }

            .col-md-8 {
                -ms-flex: 0 0 66.666667%;
                flex: 0 0 66.666667%;
                max-width: 66.666667%
            }

            .col-md-12 {
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                width: 100%
            }

            .order-first {
                -ms-flex-order: -1;
                order: -1
            }

            .logomobi {
                display: none
            }

            .logform {
                padding-top: 2rem
            }

            .nopadding {
                padding: 0
            }
        }

        @media(max-width:768px) {
            .logo {
                display: none
            }

            .navbar {
                position: fixed
            }

            .border-bt {
                border-bottom: 1px solid #fdbf02;
                border-top: 1px solid #fdbf02;
                padding: 5px 15px
            }
        }

        .pt-1,
        .py-1 {
            padding-top: .25rem
        }

        .pb-1,
        .py-1 {
            padding-bottom: .25rem
        }

        .pt-2,
        .py-2 {
            padding-top: .5rem
        }

        .pb-2,
        .py-2 {
            padding-bottom: .5rem
        }

        .mt-2,
        .my-2 {
            margin-top: .5rem
        }

        .my-2 {
            margin-top: .5rem
        }

        .mb-2 {
            margin-bottom: 1rem
        }

        .mb-4 {
            margin-bottom: 4rem
        }

        .bartender,
        .my-3 {
            margin-top: .75rem
        }

        .mb-3,
        .my-3 {
            margin-bottom: .75rem
        }

        .mt-4 {
            margin-top: 1.1rem
        }

        .mt-5,
        .my-5 {
            margin-top: 2rem
        }

        .mb-5,
        .my-5 {
            margin-bottom: 2rem
        }

        .pb-5 {
            padding-bottom: 1.25rem
        }

        .mx-5 {
            margin-left: .75rem;
            margin-right: .75rem
        }

        .pt-3 {
            padding-top: 1rem
        }

        .pt-5 {
            padding-top: 2rem
        }

        .navbar {
            background-color: #000;
            right: 0;
            left: 0;
            z-index: 1030;
            width: 100%;
            float: left;
            padding: 5px
        }

        .bg-blue {
            background-color: #020202
        }

        .bottom {
            float: left;
            width: 100%
        }

        .konten {
            color: #fff;
            padding: 20px 30px;
            border-radius: 5px;
            font-family: -apple-system, system-ui, BlinkMacSystemFont, segoe ui, Roboto, helvetica neue, Arial, sans-serif;
            box-shadow: 0 0 10px 6px #f9f303
        }

        .konten h1 {
            font-size: 1.5em
        }

        .konten h2 {
            font-size: 1.3em
        }

        .konten h3 {
            font-size: 1.1em
        }

        .konten p {
            font-size: 1em
        }

        .konten a {
            color: #fdbf02
        }

        .list {
            margin-bottom: 1rem
        }

        .kolongramen {
            text-decoration: none;
            color: #fff
        }

        .kolongramen a {
            color: #fdbf02
        }

        .slide {
            width: 100%;
            border-radius: 4px;
            box-shadow: 0 0 3px 0 #1a1a1a
        }

        .lc-atribut {
            border: 2px solid #f7a303;
            border-radius: 4px;
            box-shadow: 0 0 5px 0 #f7a303
        }

        ul {
            color: #fff;
            text-align: left
        }

        .faq-label {
            display: flex;
            font-size: 1.5em;
            justify-content: space-between;
            padding: 1em;
            margin: 12px 0 0;
            background: #0095ff
        }

        .faq-answer {
            padding: 1em;
            font-size: 1.19em;
            color: #fff;
            text-align: justify;
            background: #212121;
            transition: all .35s
        }

        .qiuonline {
            text-align: center;
            font-size: 1.5em;
            justify-content: space-between;
            padding: 1em;
            margin: 12px 0 0;
            background: #fdbf02
        }

        .list {
            margin-bottom: 1rem
        }

        .silau {
            border-radius: 10px;
            box-shadow: 0 0 10px 2px #965800;
            animation: blinking .3s infinite;
            transition: all .1s
        }

        .silau:hover {
            opacity: 1
        }

        .tengah {
            width: 40%;
            margin: auto
        }

        .button {
            display: inline;
            align-items: center;
            background: #000;
            width: 100%;
            border-radius: 5px;
            height: 38px;
            cursor: pointer;
            padding: 5px 20px;
            max-width: 128px;
            color: rgb(255 255 255);
            font-weight: 700;
            font-family: -apple-system, system-ui, BlinkMacSystemFont, segoe ui, Roboto, helvetica neue, Arial, sans-serif;
            text-transform: uppercase;
            text-decoration: none;
            transition: background .3s, transform .3s, box-shadow .3s;
            will-change: transform;
            min-width: 80px;
            border: 0 solid rgb(255 255 255);
            line-height: 12px;
            animation: blinking .5s infinite;
            transition: all .4s
        }

        .button:hover {
            color: #e7b10c;
            font-weight: 700;
            text-decoration: none;
            background: rgb(255 255 255);
            cursor: pointer;
            box-shadow: 0 4px 17px rgba(0, 0, 0, .2);
            transform: translate3d(0, -2px, 0);
            border: 2px solid #e7b10c
        }

        .button:active {
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            transform: translate3d(0, 1px, 0)
        }

        a {
            background-color: transparent
        }

        a:active,
        a:hover {
            outline: 0
        }

        h1 {
            margin: .67em 0;
            font-size: 2em
        }

        img {
            border: 0
        }

        @media print {

            *,
            :after,
            :before {
                color: #000;
                text-shadow: none;
                background: 0 0;
                -webkit-box-shadow: none;
                box-shadow: none
            }

            a,
            a:visited {
                text-decoration: underline
            }

            a[href]:after {
                content: " (" attr(href) ")"
            }

            img,
            tr {
                page-break-inside: avoid
            }

            img {
                max-width: 100%
            }

            h2,
            h3,
            p {
                orphans: 3;
                widows: 3
            }

            h2,
            h3 {
                page-break-after: avoid
            }
        }

        .list {
            margin-bottom: 1rem
        }

        .text-center {
            text-align: center
        }

        p#breadcrumbs {
            color: #fff;
            text-align: center
        }

        .konten ul li {
            list-style-type: square
        }

        .konten li {
            margin: 5px 30px 10px;
            text-align: justify;
            color: #fff
        }

        .betting-list-card__list-item-1 {
            border-bottom: 4px solid #f6a841
        }

        @media only screen and (min-width:1200px) {
            .betting-list-card__title {
                width: 70%
            }

            .betting-list-card__title {
                order: 2;
                padding-left: 18px;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between
            }

            .text-white {
                color: #fff
            }

            .layout-list-home {
                height: 274px;
            }
        }

        @media only screen and (min-width:998px) {
            .img-zoom {
                height: 148px
            }

            .layout-list {
                height: 118px;
            }

            .layout-list-home {
                height: 274px;
            }


            .flex-container-side-desktop {
                display: flex;
                flex-direction: row;
                font-size: 16px;
                text-align: center;
                align-items: center;
            }

            .side-bar {
                width: 310px;
                background-color: rgba(0, 0, 0, .90);
                border-radius: 10px 0px 0px 10px;
            }

        }

        @media only screen and (max-width:998px) {


            .grid-container {
                display: grid;
                grid: 55px / auto auto auto;
                padding: 5px
            }

            .img-zoom {
                height: 132px
            }

            .flex-container-side-desktop {
                display: none;
            }

            .side-bar {
                width: 240px;
                background-color: rgba(0, 0, 0, .90);
                border-radius: 10px 0px 0px 10px;
            }

            .card-content {
                font-size: 18px
            }

            . .hover-btn {
                position: absolute;
                width: 0;
                opacity: 0;
                background-color: transparent;
                transition: all .1s ease-in-out;
                z-index: 10;
                height: 148px;
                border-radius: 3px
            }

            .layout-list-home {
                height: 223px;
            }

            .layout-list {
                height: 115px;
            }
        }

        @media only screen and (max-width:768px) {

            .grid-container {
                display: grid;
                grid: 55px / auto auto auto;
                padding: 5px
            }

            .img-zoom {
                height: 120px
            }

            .card-content {
                font-size: 16px
            }

            .hover-btn {
                position: absolute;
                width: 0;
                opacity: 0;
                background-color: transparent;
                transition: all .1s ease-in-out;
                z-index: 10;
                height: 148px;
                border-radius: 3px
            }

            .layout-list-home {
                height: 223px;
            }

            .layout-list {
                height: 114px;
            }
        }

        @media only screen and (max-width:568px) {

            .grid-container {
                display: grid;
                grid: 55px / auto auto auto;
                padding: 5px
            }

            .img-zoom {
                height: 76px;
                object-fit: contain
            }

            .m-80 {
                width: 80%
            }

            .card-content {
                font-size: 11px;
                padding: 3.5px
            }

            .hover-btn {
                position: absolute;
                width: 0;
                opacity: 0;
                background-color: transparent;
                transition: all .1s ease-in-out;
                z-index: 10;
                height: 148px;
                border-radius: 3px
            }

            .layout-list-home {
                height: 223px;
            }

            .layout-list {
                height: 114px;
            }
        }

        @media only screen and (max-width:400px) {

            .grid-container {
                display: grid;
                grid: 55px / auto auto auto;
                padding: 5px
            }

            .img-zoom {
                height: 67px;
                object-fit: contain
            }

            .card-content {
                font-size: 10px;
                padding: 3px
            }

            .hover-btn {
                position: absolute;
                width: 0;
                opacity: 0;
                background-color: transparent;
                transition: all .1s ease-in-out;
                z-index: 10;
                height: 148px;
                border-radius: 3px
            }

            .layout-list-home {
                height: 223px;
            }

            .layout-list {
                height: 114px;
            }
        }

        #menutb td {
            background: #1a1a1a
        }

        #menutb td:hover {
            background: #141414;
            border-radius: 10px
        }

        a:hover>.play-btn {
            text-decoration: none;
            color: #000
        }

        .toplist__label {
            color: #1f2426;
            font-weight: 700;
            font-style: normal;
            font-stretch: normal;
            line-height: 1.58;
            color: #1f2426;
            font-size: 28px;
            margin-top: 14px
        }

        .content.marq {
            background-color: transparent
        }

        .content.marq-header {
            background-color: #f3c314;
        }

        .content.bgrtp {
            background-color: #000
        }

        h3.gacor {
            padding-top: 1px;
            color: #000;
            border: 1px solid #f3c314;
            border-radius: 5px;
            background-image: radial-gradient(circle 763px at 18.3% 24.1%, rgba(255, 249, 137, 1) 7.4%, rgba(226, 183, 40, 1) 58.3%)
        }

        .m-hide {
            display: none
        }

        .search {
            border: 1px solid grey;
            border-radius: 5px;
            height: 25px;
            width: 100%;
            padding: 2px 23px 2px 30px;
            outline: 0;
            background-color: #f5f5f5
        }

        .search-icon {
            position: absolute;
            top: 6px;
            left: 8px;
            width: 14px
        }

        .clear-icon {
            position: absolute;
            top: 7px;
            right: 8px;
            width: 12px;
            cursor: pointer;
            visibility: hidden
        }

        .search:hover,
        .search:focus {
            border: 1px solid #009688;
            background-color: #fff
        }

        .app-footer {
            border-radius: 5px;
            background-color: #1a1a1a;
            opacity: .9;
            padding: 1rem;
            margin-bottom: 11px
        }

        .app-footer section {
            border-top: 1px solid hsla(0, 0%, 100%, .1);
            border-bottom: 1px solid hsla(0, 0%, 100%, .1)
        }

        .app-footer__partners h5 {
            color: #f79236;
            text-align: center;
            margin-bottom: 1rem
        }

        .app-footer__partners ul {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(2rem, 1fr))
        }

        .app-footer__partners li:hover {
            background-image: linear-gradient(to bottom, #fdf571 0%, #d6b75f 100%);
            border-radius: 1rem
        }

        ul {
            list-style-type: none
        }

        .app-footer__partners ul li {
            flex-grow: 1;
            min-width: 15%;
            align-items: center
        }

        .app-footer__partners ul li a {
            padding: .5rem;
            font-size: .75rem;
            white-space: nowrap;
            color: hsla(0, 0%, 100%, .6);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center
        }

        .app-footer__partners ul li a:hover {
            color: #000
        }

        @media screen and (max-width:600px) {
            h3.gacor {
                font-size: 22px
            }
        }

        .box-logo {
            padding: 1rem;
            border-radius: 5px;
            background-image: radial-gradient(circle 941px at 2.6% 6.8%, rgba(124, 74, 228, .82) 15.9%, rgba(249, 208, 40, .82) 88.6%)
        }

        #jamgacor {
            position: relative;
            z-index: 100
        }

        #xpola {
            position: relative;
            z-index: 99;
            min-height: 90px
        }

        .d-block {
            display: block
        }

        .bg-dark {
            background-color: #1a1a1a;
            border-radius: 7px
        }

        .rounded {
            border-radius: .25rem
        }

        .rounded-pill {
            border-radius: 50rem
        }

        .p-1 {
            padding: .25rem
        }

        .mt-md-1,
        .my-md-1 {
            margin-top: .25rem
        }

        .mb-0,
        .my-0 {
            margin-bottom: 0
        }

        .text-danger {
            color: #dc3545
        }

        .text-success {
            color: #28a745
        }

        #bPola {
            z-index: 100
        }

        .hidden {
            display: none
        }

        .px-2 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .f-1 {
            font-size: 14px
        }

        .p-2 {
            padding-top: 20px;
            padding-bottom: 2px;
            padding-left: 2px;
            padding-right: 2px
        }

        #xpola:before {
            content: "POLA";
            position: relative;
            display: block;
            margin: -18px 0 4px -4px;
            padding: 4px;
            left: 0;
            width: 100%;
            background: #c414c9;
            border-radius: 40px;
            box-shadow: 0 1px 0 #fdb1ff;
            font-size: 14px;
            transform: scale(.7);
            color: #fff;
            font-weight: 600
        }


        .vendor-list>div[role="list"] {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            align-items: center
        }

        .vendor-list>div[role="list"]>div[role="listitem"] {
            flex-grow: 1;
            width: calc(100% / 3)
        }

        .form-control {
            width: 100%;
            box-sizing: border-box;
            padding: 6px 10px;
            border: 1px solid #000;
            border-radius: 6px;
            margin-bottom: 8px
        }

        .form-inline {
            display: flex
        }

        .icon-search {
            display: flex;
            align-items: center;
            border: 1px solid #000;
            border-right-color: transparent;
            padding: 6px 10px;
            background-color: #fff;
            border-top-left-radius: 6px;
            border-bottom-left-radius: 6px
        }

        .form-inline>.form-control {
            border-left: 0;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            margin-left: -10px
        }

        .pbar {
            margin-top: 5px;
            background-color: #e9ecef;
            border-radius: 18px;
            font-size: .75rem;
            height: 18px;
            overflow: hidden;
            position: relative
        }

        .pbar>.pbar-bg {
            position: relative;
            background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
            background-size: 1rem 1rem;
            height: 18px;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .pbar>.pbar-text {
            position: absolute;
            left: 50%;
            top: 50%;
            color: #000;
            font-weight: 700;
            transform: translate(-50%, -50%)
        }

        .yellow {
            background-color: #ffc107
        }

        .green {
            background-color: #28a745
        }

        .red {
            background-color: #dc3545
        }

        .white {
            color: #fff
        }

        .info {
            color: #fff;
            font-style: italic;
            text-align: right
        }

        .navigation {
            display: flex;
            justify-content: space-around;
            align-items: center
        }

        .btn-prev,
        .btn-next {
            margin-top: 35px;
            padding: 6px 10px;
            background-color: #FFF1DC;
            border: 1px solid #E8D5C4;
            color: black;
            font-weight: bold;
            border-radius: 8px;
            font-size: 14px;
            transition: all .3s;
            cursor: pointer;
            box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, .15)
        }

        .flex {
            display: flex
        }

        .justify-between {
            justify-content: space-between
        }

        .align-items-center {
            align-items: center
        }

        .menu-side.back {
            word-spacing: 10px
        }
    </style>
</head>

<body class="rtpslot">
    <amp-install-serviceworker src="/serviceworker.js" layout="nodisplay"></amp-install-serviceworker>
    @include('layouts.container')
    @include('layouts.header')
    <main>
        <div class="content marq">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </main>

    <i class="material-symbols-rounded" style="color: #00ff00; font-size:0">check</i>

    @include('layouts.footer')
</body>

</html>
