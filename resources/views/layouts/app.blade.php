<!DOCTYPE html>
<html lang="en" data-url-prefix="/" data-footer="true"
     data-override='{&quot;attributes&quot; : { &quot;placement&quot;: &quot;vertical&quot; }}' >


<!-- Mirrored from acorn-laravel-classic-dashboard.coloredstrategies.com/Interface/Content/Menu/VerticalStandard by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Sep 2022 09:39:14 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>{{ $page }} | {{ config('app.name') }}</title>
    <meta name="description" content="Standard vertical menu that can be pinned for larger screens, switches to semi-hidden state for tablet sizes and shows mobile menu for smaller screens."/>
    <!-- Favicon Tags Start -->
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{asset('temp')}}/img/favicon/apple-touch-icon-57x57.png"/>
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('temp')}}/img/favicon/apple-touch-icon-114x114.png"/>
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('temp')}}/img/favicon/apple-touch-icon-72x72.png"/>
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('temp')}}/img/favicon/apple-touch-icon-144x144.png"/>
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="{{asset('temp')}}/img/favicon/apple-touch-icon-60x60.png"/>
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{asset('temp')}}/img/favicon/apple-touch-icon-120x120.png"/>
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="{{asset('temp')}}/img/favicon/apple-touch-icon-76x76.png"/>
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{asset('temp')}}/img/favicon/apple-touch-icon-152x152.png"/>
<link rel="icon" type="image/png" href="{{asset('temp')}}/img/favicon/favicon-196x196.png" sizes="196x196"/>
<link rel="icon" type="image/png" href="{{asset('temp')}}/img/favicon/favicon-96x96.png" sizes="96x96"/>
<link rel="icon" type="image/png" href="{{asset('temp')}}/img/favicon/favicon-32x32.png" sizes="32x32"/>
<link rel="icon" type="image/png" href="{{asset('temp')}}/img/favicon/favicon-16x16.png" sizes="16x16"/>
<link rel="icon" type="image/png" href="{{asset('temp')}}/img/favicon/favicon-128.png" sizes="128x128"/>
<meta name="application-name" content="&nbsp;"/>
<meta name="msapplication-TileColor" content="#FFFFFF"/>
<meta name="msapplication-TileImage" content="{{asset('temp')}}/img/favicon/mstile-144x144.png"/>
<meta name="msapplication-square70x70logo" content="{{asset('temp')}}/img/favicon/mstile-70x70.png"/>
<meta name="msapplication-square150x150logo" content="{{asset('temp')}}/img/favicon/mstile-150x150.png"/>
<meta name="msapplication-wide310x150logo" content="{{asset('temp')}}/img/favicon/mstile-310x150.png"/>
<meta name="msapplication-square310x310logo" content="{{asset('temp')}}/img/favicon/mstile-310x310.png"/>
<!-- Favicon Tags End -->
<!-- Font Tags Start -->
<link rel="preconnect" href="https://fonts.gstatic.com/"/>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&amp;display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="{{asset('temp')}}/font/CS-Interface/style.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.css" rel="stylesheet">

<!-- Font Tags End -->
<!-- Vendor Styles Start -->
<link rel="stylesheet" href="{{asset('temp')}}/css/vendor/bootstrap.min.css"/>
<link rel="stylesheet" href="{{asset('temp')}}/css/vendor/OverlayScrollbars.min.css"/>
{{-- <link rel="stylesheet" href="{{asset('temp')}}/css/vendor/select2.min.css"/>
<link rel="stylesheet" href="{{asset('temp')}}/css/vendor/select2-bootstrap4.min.css"/> --}}
<!-- Vendor Styles End -->
<!-- Template Base Styles Start -->
<link rel="stylesheet" href="{{asset('temp')}}/css/styles.css"/>
<link rel="stylesheet" href="{{asset('temp')}}/css/main.css"/>
<!-- Template Base Styles End -->
@stack('css')
<script src="{{asset('temp')}}/js/base/loader.js"></script>
<style>
        @media print{
            .noprint,body * {
                visibility: hidden;
            }
            .print-container, .print-container * {
                visibility: visible;
            }
            header, footer, aside, nav, form, iframe, .menu, .hero, .adslot, .noprint {
            display: none;
            }

            .print-container {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: white;
                overflow: auto;
            }
        }
    </style>
</head>

<body>
<div id="root">
    {{-- Navbar -> Start --}}
    {{-- Admin Sidebar --}}
    @role('Admin Manager')
    @include('layouts.navbar.admin.sidebar')
    @else
    {{-- Sales Manager Sidebar --}}
    @include('layouts.navbar.sales.sidebar')
    @endrole
    {{-- Navbar -> End --}}
    <main>
        {{-- Contents -> Start--}}
        @yield('content')
        {{-- Contents -> End --}}
    </main>
    <!-- Layout Footer Start -->
<footer>
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <p class="mb-0 text-muted text-medium">Inventory 2022</p>
                </div>
                <div class="col-sm-6 d-none d-sm-block">
                    <ul class="breadcrumb pt-0 pe-0 mb-0 float-end">
                        <li class="breadcrumb-item mb-0 text-medium">
                            <a href="https://web.whatsapp.com/" target="_blank" class="btn-link">Watcher</a>
                        </li>
                        <li class="breadcrumb-item mb-0 text-medium">
                            <a href="https://web.facebook.com/" target="_blank" class="btn-link">Contact</a>
                        </li>
                        <li class="breadcrumb-item mb-0 text-medium">
                            <a href="https://www.google.com/" target="_blank" class="btn-link">Help</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Layout Footer End -->
</div>
<!-- Theme Settings Modal Start -->
<div
        class="modal fade modal-right scroll-out-negative"
        id="settings"
        data-bs-backdrop="true"
        tabindex="-1"
        role="dialog"
        aria-labelledby="settings"
        aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-scrollable full" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Theme Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="scroll-track-visible">
                    <div class="mb-5" id="color">
                        <label class="mb-3 d-inline-block form-label">Color</label>
                        <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                            <a href="#" class="flex-grow-1 w-50 option col" data-value="light-blue" data-parent="color">
                                <div class="card rounded-md p-3 mb-1 no-shadow color">
                                    <div class="blue-light"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">LIGHT BLUE</span>
                                </div>
                            </a>
                            <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-blue" data-parent="color">
                                <div class="card rounded-md p-3 mb-1 no-shadow color">
                                    <div class="blue-dark"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">DARK BLUE</span>
                                </div>
                            </a>
                        </div>
                        <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                            <a href="#" class="flex-grow-1 w-50 option col" data-value="light-teal" data-parent="color">
                                <div class="card rounded-md p-3 mb-1 no-shadow color">
                                    <div class="teal-light"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">LIGHT TEAL</span>
                                </div>
                            </a>
                            <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-teal" data-parent="color">
                                <div class="card rounded-md p-3 mb-1 no-shadow color">
                                    <div class="teal-dark"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">DARK TEAL</span>
                                </div>
                            </a>
                        </div>
                        <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                            <a href="#" class="flex-grow-1 w-50 option col" data-value="light-sky" data-parent="color">
                                <div class="card rounded-md p-3 mb-1 no-shadow color">
                                    <div class="sky-light"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">LIGHT SKY</span>
                                </div>
                            </a>
                            <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-sky" data-parent="color">
                                <div class="card rounded-md p-3 mb-1 no-shadow color">
                                    <div class="sky-dark"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">DARK SKY</span>
                                </div>
                            </a>
                        </div>
                        <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                            <a href="#" class="flex-grow-1 w-50 option col" data-value="light-red" data-parent="color">
                                <div class="card rounded-md p-3 mb-1 no-shadow color">
                                    <div class="red-light"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">LIGHT RED</span>
                                </div>
                            </a>
                            <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-red" data-parent="color">
                                <div class="card rounded-md p-3 mb-1 no-shadow color">
                                    <div class="red-dark"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">DARK RED</span>
                                </div>
                            </a>
                        </div>
                        <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                            <a href="#" class="flex-grow-1 w-50 option col" data-value="light-green" data-parent="color">
                                <div class="card rounded-md p-3 mb-1 no-shadow color">
                                    <div class="green-light"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">LIGHT GREEN</span>
                                </div>
                            </a>
                            <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-green" data-parent="color">
                                <div class="card rounded-md p-3 mb-1 no-shadow color">
                                    <div class="green-dark"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">DARK GREEN</span>
                                </div>
                            </a>
                        </div>
                        <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                            <a href="#" class="flex-grow-1 w-50 option col" data-value="light-lime" data-parent="color">
                                <div class="card rounded-md p-3 mb-1 no-shadow color">
                                    <div class="lime-light"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">LIGHT LIME</span>
                                </div>
                            </a>
                            <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-lime" data-parent="color">
                                <div class="card rounded-md p-3 mb-1 no-shadow color">
                                    <div class="lime-dark"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">DARK LIME</span>
                                </div>
                            </a>
                        </div>
                        <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                            <a href="#" class="flex-grow-1 w-50 option col" data-value="light-pink" data-parent="color">
                                <div class="card rounded-md p-3 mb-1 no-shadow color">
                                    <div class="pink-light"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">LIGHT PINK</span>
                                </div>
                            </a>
                            <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-pink" data-parent="color">
                                <div class="card rounded-md p-3 mb-1 no-shadow color">
                                    <div class="pink-dark"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">DARK PINK</span>
                                </div>
                            </a>
                        </div>
                        <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                            <a href="#" class="flex-grow-1 w-50 option col" data-value="light-purple" data-parent="color">
                                <div class="card rounded-md p-3 mb-1 no-shadow color">
                                    <div class="purple-light"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">LIGHT PURPLE</span>
                                </div>
                            </a>
                            <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-purple" data-parent="color">
                                <div class="card rounded-md p-3 mb-1 no-shadow color">
                                    <div class="purple-dark"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">DARK PURPLE</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="mb-5" id="navcolor">
                        <label class="mb-3 d-inline-block form-label">Override Nav Palette</label>
                        <div class="row d-flex g-3 justify-content-between flex-wrap">
                            <a href="#" class="flex-grow-1 w-33 option col" data-value="default" data-parent="navcolor">
                                <div class="card rounded-md p-3 mb-1 no-shadow">
                                    <div class="figure figure-primary top"></div>
                                    <div class="figure figure-secondary bottom"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">DEFAULT</span>
                                </div>
                            </a>
                            <a href="#" class="flex-grow-1 w-33 option col" data-value="light" data-parent="navcolor">
                                <div class="card rounded-md p-3 mb-1 no-shadow">
                                    <div class="figure figure-secondary figure-light top"></div>
                                    <div class="figure figure-secondary bottom"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">LIGHT</span>
                                </div>
                            </a>
                            <a href="#" class="flex-grow-1 w-33 option col" data-value="dark" data-parent="navcolor">
                                <div class="card rounded-md p-3 mb-1 no-shadow">
                                    <div class="figure figure-muted figure-dark top"></div>
                                    <div class="figure figure-secondary bottom"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">DARK</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="mb-5" id="placement">
                        <label class="mb-3 d-inline-block form-label">Menu Placement</label>
                        <div class="row d-flex g-3 justify-content-between flex-wrap">
                            <a href="#" class="flex-grow-1 w-50 option col" data-value="horizontal" data-parent="placement">
                                <div class="card rounded-md p-3 mb-1 no-shadow">
                                    <div class="figure figure-primary top"></div>
                                    <div class="figure figure-secondary bottom"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">HORIZONTAL</span>
                                </div>
                            </a>
                            <a href="#" class="flex-grow-1 w-50 option col" data-value="vertical" data-parent="placement">
                                <div class="card rounded-md p-3 mb-1 no-shadow">
                                    <div class="figure figure-primary left"></div>
                                    <div class="figure figure-secondary right"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">VERTICAL</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="mb-5" id="behaviour">
                        <label class="mb-3 d-inline-block form-label">Menu Behaviour</label>
                        <div class="row d-flex g-3 justify-content-between flex-wrap">
                            <a href="#" class="flex-grow-1 w-50 option col" data-value="pinned" data-parent="behaviour">
                                <div class="card rounded-md p-3 mb-1 no-shadow">
                                    <div class="figure figure-primary left large"></div>
                                    <div class="figure figure-secondary right small"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">PINNED</span>
                                </div>
                            </a>
                            <a href="#" class="flex-grow-1 w-50 option col" data-value="unpinned" data-parent="behaviour">
                                <div class="card rounded-md p-3 mb-1 no-shadow">
                                    <div class="figure figure-primary left"></div>
                                    <div class="figure figure-secondary right"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">UNPINNED</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="mb-5" id="layout">
                        <label class="mb-3 d-inline-block form-label">Layout</label>
                        <div class="row d-flex g-3 justify-content-between flex-wrap">
                            <a href="#" class="flex-grow-1 w-50 option col" data-value="fluid" data-parent="layout">
                                <div class="card rounded-md p-3 mb-1 no-shadow">
                                    <div class="figure figure-primary top"></div>
                                    <div class="figure figure-secondary bottom"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">FLUID</span>
                                </div>
                            </a>
                            <a href="#" class="flex-grow-1 w-50 option col" data-value="boxed" data-parent="layout">
                                <div class="card rounded-md p-3 mb-1 no-shadow">
                                    <div class="figure figure-primary top"></div>
                                    <div class="figure figure-secondary bottom small"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">BOXED</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="mb-5" id="radius">
                        <label class="mb-3 d-inline-block form-label">Radius</label>
                        <div class="row d-flex g-3 justify-content-between flex-wrap">
                            <a href="#" class="flex-grow-1 w-33 option col" data-value="rounded" data-parent="radius">
                                <div class="card rounded-md radius-rounded p-3 mb-1 no-shadow">
                                    <div class="figure figure-primary top"></div>
                                    <div class="figure figure-secondary bottom"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">ROUNDED</span>
                                </div>
                            </a>
                            <a href="#" class="flex-grow-1 w-33 option col" data-value="standard" data-parent="radius">
                                <div class="card rounded-md radius-regular p-3 mb-1 no-shadow">
                                    <div class="figure figure-primary top"></div>
                                    <div class="figure figure-secondary bottom"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">STANDARD</span>
                                </div>
                            </a>
                            <a href="#" class="flex-grow-1 w-33 option col" data-value="flat" data-parent="radius">
                                <div class="card rounded-md radius-flat p-3 mb-1 no-shadow">
                                    <div class="figure figure-primary top"></div>
                                    <div class="figure figure-secondary bottom"></div>
                                </div>
                                <div class="text-muted text-part">
                                    <span class="text-extra-small align-middle">FLAT</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Theme Settings Modal End -->


<!-- Theme Settings Buttons Start -->
<div class="settings-buttons-container">
    <button type="button" class="btn settings-button btn-primary p-0" data-bs-toggle="modal" data-bs-target="#settings" id="settingsButton">
    <span class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="left" title="Settings">
      <i data-acorn-icon="paint-roller" class="position-relative"></i>
    </span>
    </button>
</div>
<!-- Theme Settings Buttons End -->
<!-- Search Modal Start -->
<div class="modal fade modal-under-nav modal-search modal-close-out" id="searchPagesModal" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0 p-0">
                <button type="button" class="btn-close btn btn-icon btn-icon-only btn-foreground"
                        data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ps-5 pe-5 pb-0 border-0">
                <input id="searchPagesInput"
                       class="form-control form-control-xl borderless ps-0 pe-0 mb-1 auto-complete" type="text"
                       autocomplete="off"/>
            </div>
            <div class="modal-footer border-top justify-content-start ps-5 pe-5 pb-3 pt-3 border-0">
                <span class="text-alternate d-inline-block m-0 me-3">
                    <i data-acorn-icon="arrow-bottom" data-acorn-size="15" class="text-alternate align-middle me-1"></i>
                    <span class="align-middle text-medium">Navigate</span>
                </span>
                <span class="text-alternate d-inline-block m-0 me-3">
                    <i data-acorn-icon="arrow-bottom-left" data-acorn-size="15" class="text-alternate align-middle me-1"></i>
                    <span class="align-middle text-medium">Select</span>
                </span>
            </div>
        </div>
    </div>
</div>
<!-- Search Modal End -->
<!-- Vendor Scripts Start -->
<script src="{{asset('temp/js/vendor/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('temp/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('temp/js/vendor/OverlayScrollbars.min.js')}}"></script>
<script src="{{asset('temp/js/vendor/autoComplete.min.js')}}"></script>
<script src="{{asset('temp/js/vendor/clamp.min.js')}}"></script>
<script src="{{asset('temp/icon/acorn-icons.js')}}"></script>
<script src="{{asset('temp')}}/icon/acorn-icons-interface.js"></script>

<!-- Vendor Scripts End -->
<!-- Template Base Scripts Start -->
<script src="{{asset('temp')}}/js/base/helpers.js"></script>
<script src="{{asset('temp')}}/js/base/globals.js"></script>
<script src="{{asset('temp')}}/js/base/nav.js"></script>
<script src="{{asset('temp')}}/js/base/search.js"></script>
<script src="{{asset('temp')}}/js/base/settings.js"></script>
<!-- Template Base Scripts End -->
<!-- Page Specific Scripts Start -->
<script src="{{asset('temp')}}/js/common.js"></script>
<script src="{{asset('temp')}}/js/scripts.js"></script>
<!-- Page Specific Scripts End -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
@stack('js')

</body>
</html>
