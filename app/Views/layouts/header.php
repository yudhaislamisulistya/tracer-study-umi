<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 9 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Tracer Study - Universitas Muslim Indonesia</title>
    <meta name="description" content="Tracer Study Universitas Muslim Indonesia" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="<?= base_url('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->

    <!-- Datatable -->
    <link href="<?= base_url('assets/plugins/custom/datatables/datatables.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Datatable -->


    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="<?= base_url('assets/plugins/global/plugins.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/plugins/custom/prismjs/prismjs.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/style.bundle.css') ?>" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->

    <link rel="shortcut icon" href="<?= base_url('assets/media/logos/favicon.ico') ?>" />

</head>

<!--begin::Body-->

<?php
if (session()->get('STATUS') == 'alumni') {
?>

    <body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed aside-enabled aside-static page-loading">

        <!--begin::Main-->
        <!--begin::Header Mobile-->
        <div id="kt_header_mobile" class="header-mobile  header-mobile-fixed ">
            <!--begin::Logo-->
            <a href="<?php base_url('/dashboard') ?>">
                <img alt="Logo" src="<?= base_url('assets/media/logos/umi.png') ?>" class="logo-default max-h-30px" />
            </a>
            <!--end::Logo-->

            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <button class="btn p-0 burger-icon rounded-0 burger-icon-left" id="kt_aside_tablet_and_mobile_toggle">
                    <span></span>
                </button>

                <button class="btn btn-hover-text-primary p-0 ml-3" id="kt_header_mobile_topbar_toggle">
                    <span class="svg-icon svg-icon-xl">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                            </g>
                        </svg>
                        <!--end::Svg Icon--></span> </button>
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Header Mobile-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="d-flex flex-row flex-column-fluid page">
                <!--begin::Aside-->
                <div class="aside aside-left  d-flex flex-column flex-row-auto" id="kt_aside">
                    <!--begin::Aside Menu-->
                    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                        <!--begin::Menu Container-->
                        <div id="kt_aside_menu" class="aside-menu  min-h-lg-800px" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
                            <!--begin::Menu Nav-->
                            <ul class="menu-nav ">
                                <li class="menu-item  menu-item-active" aria-haspopup="true"><a href="<?= base_url('/') ?>" class="menu-link "><span class="svg-icon menu-icon">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon--></span><span class="menu-text">Dashboard</span>
                                    </a>
                                </li>
                                <li class="menu-item" aria-haspopup="true"><a href="<?= base_url('biodata') ?>" class="menu-link ">
                                        <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo5\dist/../src/media/svg/icons\Communication\Clipboard-check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3" />
                                                    <path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" fill="#000000" />
                                                    <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000" />
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        <span class="menu-text">Biodata</span>
                                    </a>
                                </li>
                                <li class="menu-item" aria-haspopup="true"><a href="<?= base_url('kuesioner') ?>" class="menu-link ">
                                        <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo5\dist/../src/media/svg/icons\Communication\Clipboard-check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3" />
                                                    <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000" />
                                                    <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1" />
                                                    <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1" />
                                                    <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1" />
                                                    <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1" />
                                                    <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1" />
                                                    <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1" />
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        <span class="menu-text">Kuesioner</span>
                                    </a>
                                </li>
                                <li class="menu-item" aria-haspopup="true"><a href="<?= base_url('berita') ?>" class="menu-link ">
                                        <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo5\dist/../src/media/svg/icons\Communication\Clipboard-check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                                    <path d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z" fill="#000000" />
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        <span class="menu-text">Berita/Informasi</span>
                                    </a>
                                </li>
                                <li class="menu-item" aria-haspopup="true"><a href="<?= base_url('portal-alumni') ?>" class="menu-link ">
                                        <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo5\dist/../src/media/svg/icons\Communication\Clipboard-check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        <span class="menu-text">Portal Alumni</span>
                                    </a>
                                </li>
                                <li class="menu-item" aria-haspopup="true"><a href="<?= base_url('legalisir') ?>" class="menu-link ">
                                        <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo5\dist/../src/media/svg/icons\Communication\Clipboard-check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
                                                    <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        <span class="menu-text">Legalisir</span>
                                    </a>
                                </li>
                                <li class="menu-item" aria-haspopup="true"><a href="<?= base_url('lowongan-kerja') ?>" class="menu-link ">
                                        <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo5\dist/../src/media/svg/icons\Communication\Clipboard-check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) " />
                                                    <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000" />
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        <span class="menu-text">Lowongan Kerja</span>
                                    </a>
                                </li>
                            </ul>
                            <!--end::Menu Nav-->
                        </div>
                        <!--end::Menu Container-->
                    </div>
                    <!--end::Aside Menu-->
                </div>
                <!--end::Aside-->

                <!--begin::Wrapper-->
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    <!--begin::Header-->
                    <div id="kt_header" class="header  header-fixed ">
                        <!--begin::Container-->
                        <div class=" container  d-flex align-items-stretch justify-content-between">
                            <!--begin::Left-->
                            <div class="d-none d-lg-flex align-items-center mr-3">
                                <!--begin::Aside Toggle-->
                                <button class="btn btn-icon aside-toggle ml-n3 mr-10" id="kt_aside_desktop_toggle">
                                    <span class="svg-icon svg-icon-xxl svg-icon-dark-75">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Text/Align-left.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <rect fill="#000000" opacity="0.3" x="4" y="5" width="16" height="2" rx="1" />
                                                <rect fill="#000000" opacity="0.3" x="4" y="13" width="16" height="2" rx="1" />
                                                <path d="M5,9 L13,9 C13.5522847,9 14,9.44771525 14,10 C14,10.5522847 13.5522847,11 13,11 L5,11 C4.44771525,11 4,10.5522847 4,10 C4,9.44771525 4.44771525,9 5,9 Z M5,17 L13,17 C13.5522847,17 14,17.4477153 14,18 C14,18.5522847 13.5522847,19 13,19 L5,19 C4.44771525,19 4,18.5522847 4,18 C4,17.4477153 4.44771525,17 5,17 Z" fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon--></span> </button>
                                <!--end::Aside Toggle-->

                                <!--begin::Logo-->
                                <a href="<?php base_url('/dashboard') ?>">
                                    <img alt="Logo" src="<?= base_url('assets/media/logos/umi.png') ?>" class="logo-sticky max-h-35px" />
                                </a>
                                <!--end::Logo-->


                            </div>
                            <!--end::Left-->

                            <!--begin::Topbar-->
                            <div class="topbar">

                                <!--begin::User-->
                                <div class="topbar-item mr-4">
                                    <div class="btn btn-icon btn-sm btn-clean btn-text-dark-75" id="kt_quick_user_toggle">
                                        <span class="svg-icon svg-icon-lg">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon--></span>
                                    </div>
                                </div>
                                <!--end::User-->

                            </div>
                            <!--end::Topbar-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Header-->
                <?php
            } else if (session()->get('STATUS') == 'admin') { ?>

                    <body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed aside-enabled aside-static page-loading">

                        <!--begin::Main-->
                        <!--begin::Header Mobile-->
                        <div id="kt_header_mobile" class="header-mobile  header-mobile-fixed ">
                            <!--begin::Logo-->
                            <a href="<?php base_url('/dashboard') ?>">
                                <img alt="Logo" src="<?= base_url('assets/media/logos/umi.png') ?>" class="logo-default max-h-30px" />
                            </a>
                            <!--end::Logo-->

                            <!--begin::Toolbar-->
                            <div class="d-flex align-items-center">
                                <button class="btn p-0 burger-icon rounded-0 burger-icon-left" id="kt_aside_tablet_and_mobile_toggle">
                                    <span></span>
                                </button>

                                <button class="btn btn-hover-text-primary p-0 ml-3" id="kt_header_mobile_topbar_toggle">
                                    <span class="svg-icon svg-icon-xl">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon--></span> </button>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header Mobile-->
                        <div class="d-flex flex-column flex-root">
                            <!--begin::Page-->
                            <div class="d-flex flex-row flex-column-fluid page">
                                <!--begin::Aside-->
                                <div class="aside aside-left  d-flex flex-column flex-row-auto" id="kt_aside">
                                    <!--begin::Aside Menu-->
                                    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                                        <!--begin::Menu Container-->
                                        <div id="kt_aside_menu" class="aside-menu  min-h-lg-800px" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
                                            <!--begin::Menu Nav-->
                                            <ul class="menu-nav ">
                                                <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="javascript:;" class="menu-link menu-toggle">
                                                        <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Files/Upload.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M10.5,5 L20.5,5 C21.3284271,5 22,5.67157288 22,6.5 L22,9.5 C22,10.3284271 21.3284271,11 20.5,11 L10.5,11 C9.67157288,11 9,10.3284271 9,9.5 L9,6.5 C9,5.67157288 9.67157288,5 10.5,5 Z M10.5,13 L20.5,13 C21.3284271,13 22,13.6715729 22,14.5 L22,17.5 C22,18.3284271 21.3284271,19 20.5,19 L10.5,19 C9.67157288,19 9,18.3284271 9,17.5 L9,14.5 C9,13.6715729 9.67157288,13 10.5,13 Z" fill="#000000" />
                                                                    <rect fill="#000000" opacity="0.3" x="2" y="5" width="5" height="14" rx="1" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon--></span>
                                                        <span class="menu-text">Dashboard</span><i class="menu-arrow"></i></a>
                                                    <div class="menu-submenu "><i class="menu-arrow"></i>
                                                        <ul class="menu-subnav">
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to('admin_dashboard') ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Beranda</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to('admin_statistik') ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Statistik</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to('admin_laporan') ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Laporan</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="javascript:;" class="menu-link menu-toggle">
                                                        <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Files/Upload.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M14.1124454,7.00625159 C14.0755336,7.00212117 14.0380145,7 14,7 L10,7 C9.96198549,7 9.92446641,7.00212117 9.88755465,7.00625159 L7.34761705,4.55799196 C6.95060373,4.17530866 6.9382927,3.54346816 7.32009765,3.14561006 L8.41948359,2 L15.5805164,2 L16.6799023,3.14561006 C17.0617073,3.54346816 17.0493963,4.17530866 16.6523829,4.55799196 L14.1124454,7.00625159 Z" fill="#000000" />
                                                                    <path d="M13.7640285,9 L15.4853424,18.1494183 C15.5450675,18.4668794 15.4477627,18.7936387 15.2240963,19.0267093 L12.7215131,21.6345146 C12.7120098,21.6444174 12.7023037,21.6541236 12.6924008,21.6636269 C12.2939201,22.0460293 11.6608893,22.0329953 11.2784869,21.6345146 L8.77590372,19.0267093 C8.55223728,18.7936387 8.45493249,18.4668794 8.5146576,18.1494183 L10.2359715,9 L13.7640285,9 Z" fill="#000000" opacity="0.3" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon--></span>
                                                        <span class="menu-text">Manajemen Alumni</span><i class="menu-arrow"></i></a>
                                                    <div class="menu-submenu "><i class="menu-arrow"></i>
                                                        <ul class="menu-subnav">
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to('admin_alumni') ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Daftar Alumni</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="javascript:;" class="menu-link menu-toggle">
                                                        <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Files/Upload.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M14,7 C13.6666667,10.3333333 12.6666667,12.1167764 11,12.3503292 C11,12.3503292 12.5,6.5 10.5,3.5 C10.5,3.5 10.287918,6.71444735 8.14498739,10.5717225 C7.14049032,12.3798172 6,13.5986793 6,16 C6,19.428689 9.51143904,21.2006583 12.0057195,21.2006583 C14.5,21.2006583 18,20.0006172 18,15.8004732 C18,14.0733981 16.6666667,11.1399071 14,7 Z" fill="#000000" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon--></span>
                                                        <span class="menu-text">Karir dan Pekerjaan</span><i class="menu-arrow"></i></a>
                                                    <div class="menu-submenu "><i class="menu-arrow"></i>
                                                        <ul class="menu-subnav">
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to('admin_lowongan_kerja') ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Daftar Lowongan Kerja</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to('admin_pekerjaan_alumni') ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Daftar Pekerjaan Alumni</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to('admin_status_pekerjaan_alumni') ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Status Pekerjaan Alumni</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to('admin_perusahaan_alumni') ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Daftar Perusahaan Pengguna Alumni</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="javascript:;" class="menu-link menu-toggle">
                                                        <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Files/Upload.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M5.84026576,8 L18.1597342,8 C19.1999115,8 20.0664437,8.79732479 20.1528258,9.83390904 L20.8194924,17.833909 C20.9112219,18.9346631 20.0932459,19.901362 18.9924919,19.9930915 C18.9372479,19.9976952 18.8818364,20 18.8264009,20 L5.1735991,20 C4.0690296,20 3.1735991,19.1045695 3.1735991,18 C3.1735991,17.9445645 3.17590391,17.889153 3.18050758,17.833909 L3.84717425,9.83390904 C3.93355627,8.79732479 4.80008849,8 5.84026576,8 Z M10.5,10 C10.2238576,10 10,10.2238576 10,10.5 L10,11.5 C10,11.7761424 10.2238576,12 10.5,12 L13.5,12 C13.7761424,12 14,11.7761424 14,11.5 L14,10.5 C14,10.2238576 13.7761424,10 13.5,10 L10.5,10 Z" fill="#000000" />
                                                                    <path d="M10,8 L8,8 L8,7 C8,5.34314575 9.34314575,4 11,4 L13,4 C14.6568542,4 16,5.34314575 16,7 L16,8 L14,8 L14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 C10.4477153,6 10,6.44771525 10,7 L10,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon--></span>
                                                        <span class="menu-text">Akademik</span><i class="menu-arrow"></i></a>
                                                    <div class="menu-submenu "><i class="menu-arrow"></i>
                                                        <ul class="menu-subnav">
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to('admin_program_studi') ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Daftar Program Studi</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to("admin_legalisir_dokumen") ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Legalisir Dokumen</span>
                                                                </a>
                                                            </li>
                                                            <!-- <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to('admin_registrasi') ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Registrasi Alumni</span>
                                                                </a>
                                                            </li> -->
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="javascript:;" class="menu-link menu-toggle">
                                                        <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Files/Upload.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                    <rect fill="#000000" opacity="0.3" x="11" y="2" width="2" height="14" rx="1" />
                                                                    <path d="M12.0362375,3.37797611 L7.70710678,7.70710678 C7.31658249,8.09763107 6.68341751,8.09763107 6.29289322,7.70710678 C5.90236893,7.31658249 5.90236893,6.68341751 6.29289322,6.29289322 L11.2928932,1.29289322 C11.6689749,0.916811528 12.2736364,0.900910387 12.6689647,1.25670585 L17.6689647,5.75670585 C18.0794748,6.12616487 18.1127532,6.75845471 17.7432941,7.16896473 C17.3738351,7.57947475 16.7415453,7.61275317 16.3310353,7.24329415 L12.0362375,3.37797611 Z" fill="#000000" fill-rule="nonzero" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon--></span>
                                                        <span class="menu-text">Informasi dan Berita</span><i class="menu-arrow"></i></a>
                                                    <div class="menu-submenu "><i class="menu-arrow"></i>
                                                        <ul class="menu-subnav">
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to('admin_berita') ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Berita Alumni</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to('admin_artikel') ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Artikel Alumni</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to('admin_event') ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Event Alumni</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="javascript:;" class="menu-link menu-toggle">
                                                        <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Files/Upload.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M12.9863016,8.83409843 C12.9953113,8.88805868 13,8.94348179 13,9 L13,11 L17,11 C18.1045695,11 19,11.8954305 19,13 L19,16 L5,16 L5,13 C5,11.8954305 5.8954305,11 7,11 L11,11 L11,9 C11,8.94348179 11.0046887,8.88805868 11.0136984,8.83409843 C9.84135601,8.42615464 9,7.31133193 9,6 C9,4.34314575 10.3431458,3 12,3 C13.6568542,3 15,4.34314575 15,6 C15,7.31133193 14.158644,8.42615464 12.9863016,8.83409843 Z" fill="#000000" />
                                                                    <rect fill="#000000" opacity="0.3" x="5" y="18" width="14" height="2" rx="1" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon--></span>
                                                        <span class="menu-text">Manajemen Data</span><i class="menu-arrow"></i></a>
                                                    <div class="menu-submenu "><i class="menu-arrow"></i>
                                                        <ul class="menu-subnav">
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to('admin_status_pekerjaan') ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Status Pekerjaan</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to('admin_pekerjaan') ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Pekerjaan</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to('admin_jenis_keluar') ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Jenis Keluar</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to('admin_biodata') ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Biodata</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to('admin_negara') ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Negara</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to('admin_provinsi') ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Provinsi</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to('admin_kabupaten_kota') ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Kabupaten/Kota</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="javascript:;" class="menu-link menu-toggle">
                                                        <span class="svg-icon menu-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3" />
                                                                    <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000" />
                                                                    <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1" />
                                                                </g>
                                                            </svg>
                                                        </span>
                                                        <span class="menu-text">Kuesioner</span><i class="menu-arrow"></i></a>
                                                    <div class="menu-submenu "><i class="menu-arrow"></i>
                                                        <ul class="menu-subnav">
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to('admin_kuesioner_prodi') ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Kuesioner Prodi</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="menu-submenu "><i class="menu-arrow"></i>
                                                        <ul class="menu-subnav">
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="<?= route_to('admin_kuesioner_universitas_umum_download') ?>" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Kuesioner Universitas Umum (Download)</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <!-- <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="javascript:;" class="menu-link menu-toggle">
                                                        <span class="svg-icon menu-icon">
                                                            < <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3" />
                                                                    <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000" />
                                                                    <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1" />
                                                                </g>
                                                                </svg>
                                                        </span>
                                                        <span class="menu-text">Laporan</span><i class="menu-arrow"></i></a>
                                                    <div class="menu-submenu "><i class="menu-arrow"></i>
                                                        <ul class="menu-subnav">
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="/metronic/demo5/crud/file-upload/image-input.html" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Laporan Alumni</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="/metronic/demo5/crud/file-upload/image-input.html" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Laporan Pekerjaan</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="/metronic/demo5/crud/file-upload/image-input.html" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Laporan Statistik Lainnya</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li> -->
                                            </ul>
                                            <!--end::Menu Nav-->
                                        </div>
                                        <!--end::Menu Container-->
                                    </div>
                                    <!--end::Aside Menu-->
                                </div>
                                <!--end::Aside-->

                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                                    <!--begin::Header-->
                                    <div id="kt_header" class="header  header-fixed ">
                                        <!--begin::Container-->
                                        <div class=" container  d-flex align-items-stretch justify-content-between">
                                            <!--begin::Left-->
                                            <div class="d-none d-lg-flex align-items-center mr-3">
                                                <!--begin::Aside Toggle-->
                                                <button class="btn btn-icon aside-toggle ml-n3 mr-10" id="kt_aside_desktop_toggle">
                                                    <span class="svg-icon svg-icon-xxl svg-icon-dark-75">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Text/Align-left.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <rect fill="#000000" opacity="0.3" x="4" y="5" width="16" height="2" rx="1" />
                                                                <rect fill="#000000" opacity="0.3" x="4" y="13" width="16" height="2" rx="1" />
                                                                <path d="M5,9 L13,9 C13.5522847,9 14,9.44771525 14,10 C14,10.5522847 13.5522847,11 13,11 L5,11 C4.44771525,11 4,10.5522847 4,10 C4,9.44771525 4.44771525,9 5,9 Z M5,17 L13,17 C13.5522847,17 14,17.4477153 14,18 C14,18.5522847 13.5522847,19 13,19 L5,19 C4.44771525,19 4,18.5522847 4,18 C4,17.4477153 4.44771525,17 5,17 Z" fill="#000000" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon--></span> </button>
                                                <!--end::Aside Toggle-->

                                                <!--begin::Logo-->
                                                <a href="<?php base_url('/dashboard') ?>">
                                                    <img alt="Logo" src="<?= base_url('assets/media/logos/umi.png') ?>" class="logo-sticky max-h-35px" />
                                                </a>
                                                <!--end::Logo-->


                                            </div>
                                            <!--end::Left-->

                                            <!--begin::Topbar-->
                                            <div class="topbar">

                                                <!--begin::User-->
                                                <div class="topbar-item mr-4">
                                                    <div class="btn btn-icon btn-sm btn-clean btn-text-dark-75" id="kt_quick_user_toggle">
                                                        <span class="svg-icon svg-icon-lg">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon--></span>
                                                    </div>
                                                </div>
                                                <!--end::User-->

                                            </div>
                                            <!--end::Topbar-->
                                        </div>
                                        <!--end::Container-->
                                    </div>
                                    <!--end::Header-->
                                <?php } else { ?>

                                    <body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed aside-enabled aside-static page-loading">

                                        <!--begin::Main-->
                                        <!--begin::Header Mobile-->
                                        <div id="kt_header_mobile" class="header-mobile  header-mobile-fixed ">
                                            <!--begin::Logo-->
                                            <a href="<?php base_url('/dashboard') ?>">
                                                <img alt="Logo" src="<?= base_url('assets/media/logos/umi.png') ?>" class="logo-default max-h-30px" />
                                            </a>
                                            <!--end::Logo-->

                                            <!--begin::Toolbar-->
                                            <div class="d-flex align-items-center">
                                                <button class="btn p-0 burger-icon rounded-0 burger-icon-left" id="kt_aside_tablet_and_mobile_toggle">
                                                    <span></span>
                                                </button>

                                                <button class="btn btn-hover-text-primary p-0 ml-3" id="kt_header_mobile_topbar_toggle">
                                                    <span class="svg-icon svg-icon-xl">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon--></span> </button>
                                            </div>
                                            <!--end::Toolbar-->
                                        </div>
                                        <!--end::Header Mobile-->
                                        <div class="d-flex flex-column flex-root">
                                            <!--begin::Page-->
                                            <div class="d-flex flex-row flex-column-fluid page">
                                                <!--begin::Aside-->
                                                <div class="aside aside-left  d-flex flex-column flex-row-auto" id="kt_aside">
                                                    <!--begin::Aside Menu-->
                                                    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                                                        <!--begin::Menu Container-->
                                                        <div id="kt_aside_menu" class="aside-menu  min-h-lg-800px" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
                                                            <!--begin::Menu Nav-->
                                                            <ul class="menu-nav ">
                                                                <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="javascript:;" class="menu-link menu-toggle">
                                                                        <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Files/Upload.svg-->
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                                    <path d="M10.5,5 L20.5,5 C21.3284271,5 22,5.67157288 22,6.5 L22,9.5 C22,10.3284271 21.3284271,11 20.5,11 L10.5,11 C9.67157288,11 9,10.3284271 9,9.5 L9,6.5 C9,5.67157288 9.67157288,5 10.5,5 Z M10.5,13 L20.5,13 C21.3284271,13 22,13.6715729 22,14.5 L22,17.5 C22,18.3284271 21.3284271,19 20.5,19 L10.5,19 C9.67157288,19 9,18.3284271 9,17.5 L9,14.5 C9,13.6715729 9.67157288,13 10.5,13 Z" fill="#000000" />
                                                                                    <rect fill="#000000" opacity="0.3" x="2" y="5" width="5" height="14" rx="1" />
                                                                                </g>
                                                                            </svg>
                                                                            <!--end::Svg Icon--></span>
                                                                        <span class="menu-text">Dashboard</span><i class="menu-arrow"></i></a>
                                                                    <div class="menu-submenu "><i class="menu-arrow"></i>
                                                                        <ul class="menu-subnav">
                                                                            <li class="menu-item " aria-haspopup="true">
                                                                                <a href="<?= route_to('admin_prodi_dashboard') ?>" class="menu-link ">
                                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                                    <span class="menu-text">Beranda</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                                <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="javascript:;" class="menu-link menu-toggle">
                                                                        <span class="svg-icon menu-icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                                    <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3" />
                                                                                    <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000" />
                                                                                    <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1" />
                                                                                    <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1" />
                                                                                    <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1" />
                                                                                    <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1" />
                                                                                    <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1" />
                                                                                    <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1" />
                                                                                </g>
                                                                            </svg>
                                                                        </span>
                                                                        <span class="menu-text">Kuesioner</span><i class="menu-arrow"></i></a>
                                                                    <div class="menu-submenu "><i class="menu-arrow"></i>
                                                                        <ul class="menu-subnav">
                                                                            <li class="menu-item " aria-haspopup="true">
                                                                                <a href="<?= route_to('admin_prodi_kuesioner_prodi') ?>" class="menu-link ">
                                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                                    <span class="menu-text">Kuesioner Prodi</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                                <!-- <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a href="javascript:;" class="menu-link menu-toggle">
                                                        <span class="svg-icon menu-icon">
                                                            < <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3" />
                                                                    <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000" />
                                                                    <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1" />
                                                                </g>
                                                                </svg>
                                                        </span>
                                                        <span class="menu-text">Laporan</span><i class="menu-arrow"></i></a>
                                                    <div class="menu-submenu "><i class="menu-arrow"></i>
                                                        <ul class="menu-subnav">
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="/metronic/demo5/crud/file-upload/image-input.html" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Laporan Alumni</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="/metronic/demo5/crud/file-upload/image-input.html" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Laporan Pekerjaan</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item " aria-haspopup="true">
                                                                <a href="/metronic/demo5/crud/file-upload/image-input.html" class="menu-link ">
                                                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                                                    <span class="menu-text">Laporan Statistik Lainnya</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li> -->
                                                            </ul>
                                                            <!--end::Menu Nav-->
                                                        </div>
                                                        <!--end::Menu Container-->
                                                    </div>
                                                    <!--end::Aside Menu-->
                                                </div>
                                                <!--end::Aside-->

                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                                                    <!--begin::Header-->
                                                    <div id="kt_header" class="header  header-fixed ">
                                                        <!--begin::Container-->
                                                        <div class=" container  d-flex align-items-stretch justify-content-between">
                                                            <!--begin::Left-->
                                                            <div class="d-none d-lg-flex align-items-center mr-3">
                                                                <!--begin::Aside Toggle-->
                                                                <button class="btn btn-icon aside-toggle ml-n3 mr-10" id="kt_aside_desktop_toggle">
                                                                    <span class="svg-icon svg-icon-xxl svg-icon-dark-75">
                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Text/Align-left.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <rect fill="#000000" opacity="0.3" x="4" y="5" width="16" height="2" rx="1" />
                                                                                <rect fill="#000000" opacity="0.3" x="4" y="13" width="16" height="2" rx="1" />
                                                                                <path d="M5,9 L13,9 C13.5522847,9 14,9.44771525 14,10 C14,10.5522847 13.5522847,11 13,11 L5,11 C4.44771525,11 4,10.5522847 4,10 C4,9.44771525 4.44771525,9 5,9 Z M5,17 L13,17 C13.5522847,17 14,17.4477153 14,18 C14,18.5522847 13.5522847,19 13,19 L5,19 C4.44771525,19 4,18.5522847 4,18 C4,17.4477153 4.44771525,17 5,17 Z" fill="#000000" />
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon--></span> </button>
                                                                <!--end::Aside Toggle-->

                                                                <!--begin::Logo-->
                                                                <a href="<?php base_url('/dashboard') ?>">
                                                                    <img alt="Logo" src="<?= base_url('assets/media/logos/umi.png') ?>" class="logo-sticky max-h-35px" />
                                                                </a>
                                                                <!--end::Logo-->


                                                            </div>
                                                            <!--end::Left-->

                                                            <!--begin::Topbar-->
                                                            <div class="topbar">

                                                                <!--begin::User-->
                                                                <div class="topbar-item mr-4">
                                                                    <div class="btn btn-icon btn-sm btn-clean btn-text-dark-75" id="kt_quick_user_toggle">
                                                                        <span class="svg-icon svg-icon-lg">
                                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                                                </g>
                                                                            </svg>
                                                                            <!--end::Svg Icon--></span>
                                                                    </div>
                                                                </div>
                                                                <!--end::User-->

                                                            </div>
                                                            <!--end::Topbar-->
                                                        </div>
                                                        <!--end::Container-->
                                                    </div>
                                                    <!--end::Header-->
                                                <?php } ?>