<!DOCTYPE html>
<html lang="pt-br">

<head>
    <style>
        /* Loading Spinner */
        .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}
    </style>
    {{-- Required meta tags --}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('images/favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('images/favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png')}}">
    <meta name="msapplication-TileImage" content="{{ asset('images/favicon/ms-icon-144x144.png')}}">

    {{-- SEO metas --}}
    @if(!empty($pageTitle))
    <title>{{$pageTitle}}</title>
    @else
    <title>{{config('app.Name')}}</title>
    @endif
    @if(!empty($pageDescription))
    <meta name="description" content="{{$pageDescription}}">
    @endif
    @yield('custom-meta')
    {{-- Theme CSS --}}
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/bootstrap/css/bootstrap.css')}}">
    {{-- HELPERS --}}
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/helpers/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/helpers/backgrounds.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/helpers/boilerplate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/helpers/border-radius.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/helpers/grid.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/helpers/page-transitions.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/helpers/spacing.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/helpers/typography.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/helpers/utils.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/helpers/colors.css')}}">
    {{-- ELEMENTS --}}
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/elements/badges.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/elements/buttons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/elements/content-box.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/elements/dashboard-box.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/elements/forms.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/widgets/chosen/chosen.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/elements/images.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/elements/info-box.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/elements/invoice.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/elements/loading-indicators.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/elements/menus.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/elements/panel-box.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/elements/response-messages.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/elements/responsive-tables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/elements/ribbon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/elements/social-box.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/elements/tables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/elements/tile-box.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/elements/timeline.css')}}">
    {{-- ICONS --}}
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/icons/fontawesome/fontawesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/icons/linecons/linecons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/icons/spinnericon/spinnericon.css')}}">
    {{-- WIDGETS --}}
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/widgets/datatable/datatable.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/widgets/datepicker/datepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/widgets/dialog/dialog.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/widgets/dropdown/dropdown.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/widgets/loading-bar/loadingbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/widgets/markdown/markdown.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/widgets/modal/modal.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/widgets/tabs-ui/tabs.css')}}">
    {{-- Admin theme --}}
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/themes/admin/layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets\widgets\popover\popover.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/themes/admin/color-schemes/default.css')}}">
    {{-- Admin responsive --}}
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/helpers/responsive-elements.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/helpers/admin-responsive.css')}}">
    {{-- Components theme --}}
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/themes/components/default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/themes/components/border-radius.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/snippets/mobile-navigation.css')}}">

    {{-- Others CSS --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/nitsys.css')}}">
    @yield('css')

    {{-- JS Core --}}

    <script type="text/javascript" src="{{asset('theme-assets/js-core/jquery-core.js')}}"></script>
    <script type="text/javascript" src="{{asset('theme-assets/js-core/jquery-ui-core.js')}}"></script>
    <script type="text/javascript" src="{{asset('theme-assets/js-core/jquery-ui-widget.js')}}"></script>
    <script type="text/javascript" src="{{asset('theme-assets/js-core/jquery-ui-mouse.js')}}"></script>
    <script type="text/javascript" src="{{asset('theme-assets/js-core/jquery-ui-position.js')}}"></script>
    <script type="text/javascript" src="{{asset('theme-assets/js-core/transition.js')}}"></script>
    <script type="text/javascript" src="{{asset('theme-assets/js-core/modernizr.js')}}"></script>
    <script type="text/javascript" src="{{asset('theme-assets/js-core/jquery-cookie.js')}}"></script>
    <script type="text/javascript" src="{{asset('theme-assets/widgets/multi-select/multiselect.js')}}"></script>

    <script type="text/javascript">
        $(window).load(function () {
            setTimeout(function () {
                $('#loading').fadeOut(400, "linear");
            }, 300);
        });
    </script>
</head>
<body>
    <div class="sb-site">
        <div id="loading">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
        <div id="page-wrapper">
            <div id="page-header" class="bg-gradient-8">
                @component('base.header')
                @endcomponent
            </div>
            @if(!empty($primaryMenu))
            <div id="page-sidebar" class="bg-gradient-8 d-none d-lg-block">
                @component('base.sidebar',['primaryMenu' => $primaryMenu, 'subMenu' => $subMenu])
                @endcomponent
            </div>
            @endif
            <div id="page-content-wrapper">
                <div id="page-content">
                    <div class="container">
                        @if(!empty($pageTitle))
                        <div id="page-title">
                            <h2>{{$pageTitle}}</h2>
                            @if(!empty($pageDescription))
                            <p>{{$pageDescription}}</p>
                            @endif
                        </div>
                        @endif
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        {{-- WIDGETS --}}
        <script type="text/javascript" src="{{asset('theme-assets/tether/js/tether.js')}}"></script>
        <script type="text/javascript" src="{{asset('theme-assets/bootstrap/js/bootstrap.js')}}"></script>
        <script type="text/javascript" src="{{asset('theme-assets/widgets/progressbar/progressbar.js')}}"></script>
        {{-- Superclick --}}
        <script type="text/javascript" src="{{asset('theme-assets/widgets/superclick/superclick.js')}}"></script>
        {{-- Input switch alternate --}}
        <script type="text/javascript" src="{{asset('theme-assets/widgets/input-switch/inputswitch-alt.js')}}"></script>
        {{-- Slim scroll --}}
        <script type="text/javascript" src="{{asset('theme-assets/widgets/slimscroll/slimscroll.js')}}"></script>
        {{-- Slidebars --}}
        <script type="text/javascript" src="{{asset('theme-assets/widgets/slidebars/slidebars.js')}}"></script>
        <script type="text/javascript" src="{{asset('theme-assets/widgets/slidebars/slidebars-demo.js')}}"></script>
        {{-- Screenfull --}}
        <script type="text/javascript" src="{{asset('theme-assets/widgets/screenfull/screenfull.js')}}"></script>
        {{-- Content box --}}
        <script type="text/javascript" src="{{asset('theme-assets/widgets/content-box/contentbox.js')}}"></script>
        {{-- Overlay --}}
        <script type="text/javascript" src="{{asset('theme-assets/widgets/overlay/overlay.js')}}"></script>
        {{-- Theme layout --}}
        <script type="text/javascript" src="{{asset('theme-assets/themes/admin/layout.js')}}"></script>
        @yield('javascript')
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="confirm-modal"></div>
    <form id="logout-form" action="{{config('app.url')}}/logout" method="POST" style="display: none;">
        {{csrf_field()}}
    </form>
</body>
</html>