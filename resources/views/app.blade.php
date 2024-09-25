<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <title>Backoffice - Mulaharja</title>
    <meta charset="utf-8" />
    <meta name="description" content="WIsata Kampung Tematik Mulaharja" />
    <meta name="keywords" content="mulaharja, tematik, kampung, wisata" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Backoffice - Mulaharja" />
    <meta property="og:site_name" content="Wisata | Mulaharja" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/logo.png') }}" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />

    <style>
        .aside-menu .menu-item.hover:not(.here)>.menu-link:not(.disabled):not(.active):not(.here),
        .aside-menu .menu-item:not(.here) .menu-link:hover:not(.disabled):not(.active):not(.here) {
            background-color: #085702 !important;
        }
    </style>


    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <style>
        .aside-menu .menu-item.hover:not(.here)>.menu-link:not(.disabled):not(.active):not(.here),
        .aside-menu .menu-item:not(.here) .menu-link:hover:not(.disabled):not(.active):not(.here) {
            background-color: #085702 !important;
        }

        .aside-menu {
            background: #fff;
        }

        .aside-menu .menu-item.show>.menu-link .menu-title {
            color: #085702;
        }

        .aside-menu .menu-item.show>.menu-link {
            transition: color .2s ease, background-color .2s ease;
            background-color: #DBFED7;
            color: #085702;
        }

        .aside-menu .menu-item.show>.menu-link .menu-icon i {
            color: #085702;
        }

        .header .header-menu .menu>.menu-item.show>.menu-link {
            transition: color .2s ease, background-color .2s ease;
            background-color: #fff;
            color: #085702;
        }

        .aside-menu .menu-item.here>.menu-link {
            transition: color .2s ease, background-color .2s ease;
            background-color: #DBFED7;
            color: #085702;
        }

        .aside-menu .menu-item.here>.menu-link .menu-icon i {
            color: #085702;
        }

        .aside-menu .menu-item.here>.menu-link .menu-title {
            color: #085702;
        }

        .aside-menu .menu-item .menu-link.active .menu-title {
            color: #085702;
        }

        .header .header-menu .menu>.menu-item.show>.menu-link .menu-title {
            color: #085702;
        }

        .aside-menu .menu-item .menu-link.active .menu-bullet .bullet {
            background-color: #085702;
        }

        div:hover,
        main:hover,
        ol:hover,
        pre:hover,
        span:hover,
        ul:hover {
            scrollbar-color: #085702 transparent;
        }

        .aside .aside-logo {
            background-color: #fff;
        }

        .header {
            background: #fff !important;
        }
    </style>
    @yield('style')
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">

            @include('components.sidebar')

            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                @include('components.header')

                @yield('content')

                @include('components.footer')

            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="black" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->

    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }} "></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
    @yield('script')
</body>
<!--end::Body-->

</html>
