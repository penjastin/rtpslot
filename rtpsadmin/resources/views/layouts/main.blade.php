@include('layouts.header')
<body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">
            @yield('content')
        </div>
        <!-- End of Page Wrapper -->
    
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendor/toast/jquery.toast.min.js') }}"></script> --}}
    @yield('vendor-script')
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/custom.js') }}"></script> --}}
    @yield('script')
</body>
</html>
