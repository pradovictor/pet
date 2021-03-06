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
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('images/favicon/android-icon-192x192.png')}}">
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

    {{-- Theme CSS  --}}
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/bootstrap/css/bootstrap.css">

    {{-- HELPERS --}}
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/helpers/animate.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/helpers/backgrounds.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/helpers/boilerplate.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/helpers/border-radius.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/helpers/grid.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/helpers/page-transitions.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/helpers/spacing.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/helpers/typography.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/helpers/utils.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/helpers/colors.css">

    {{-- ELEMENTS --}}
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/elements/badges.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/elements/buttons.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/elements/content-box.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/elements/dashboard-box.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/elements/forms.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/elements/images.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/elements/info-box.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/elements/invoice.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/elements/loading-indicators.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/elements/menus.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/elements/panel-box.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/elements/response-messages.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/elements/responsive-tables.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/elements/ribbon.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/elements/social-box.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/elements/tables.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/elements/tile-box.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/elements/timeline.css">

    {{-- ICONS --}}
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/icons/fontawesome/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/icons/linecons/linecons.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/icons/spinnericon/spinnericon.css">

    {{-- WIDGETS --}}
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/accordion-ui/accordion.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/calendar/calendar.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/carousel/carousel.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/charts/justgage/justgage.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/charts/morris/morris.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/charts/piegage/piegage.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/charts/xcharts/xcharts.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/chosen/chosen.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/colorpicker/colorpicker.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/datatable/datatable.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/datepicker/datepicker.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/datepicker-ui/datepicker.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/dialog/dialog.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/dropdown/dropdown.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/dropzone/dropzone.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/file-input/fileinput.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/input-switch/inputswitch.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/input-switch/inputswitch-alt.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/ionrangeslider/ionrangeslider.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/jcrop/jcrop.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/jgrowl-notifications/jgrowl.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/loading-bar/loadingbar.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/maps/vector-maps/vectormaps.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/markdown/markdown.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/modal/modal.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/multi-select/multiselect.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/multi-upload/fileupload.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/nestable/nestable.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/noty-notifications/noty.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/popover/popover.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/pretty-photo/prettyphoto.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/progressbar/progressbar.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/range-slider/rangeslider.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/slidebars/slidebars.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/slider-ui/slider.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/summernote-wysiwyg/summernote-wysiwyg.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/tabs-ui/tabs.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/theme-switcher/themeswitcher.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/timepicker/timepicker.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/tocify/tocify.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/tooltip/tooltip.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/touchspin/touchspin.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/uniform/uniform.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/wizard/wizard.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/widgets/xeditable/xeditable.css">

    {{-- SNIPPETS --}}
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/snippets/chat.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/snippets/files-box.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/snippets/login-box.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/snippets/notification-box.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/snippets/progress-box.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/snippets/todo.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/snippets/user-profile.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/snippets/mobile-navigation.css">

    {{-- APPLICATIONS --}}
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/applications/mailbox.css">

    {{-- Admin theme --}}
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/themes/admin/layout.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/themes/admin/color-schemes/default.css">

    {{-- Components theme --}}
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/themes/components/default.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/themes/components/border-radius.css">

    {{-- Admin responsive --}}
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/helpers/responsive-elements.css">
    <link rel="stylesheet" type="text/css" href="{{config('app.url')}}/theme-assets/helpers/admin-responsive.css">

    {{-- Others CSS --}}
    @yield('css')

    {{-- JS Core --}}

    <script type="text/javascript" src="{{config('app.url')}}/theme-assets/js-core/jquery-core.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/theme-assets/js-core/jquery-ui-core.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/theme-assets/js-core/jquery-ui-widget.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/theme-assets/js-core/jquery-ui-mouse.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/theme-assets/js-core/jquery-ui-position.js"></script>
    {{--<script type="text/javascript" src="{{config('app.url')}}/theme-assets/js-core/transition.js"></script>--}}
    <script type="text/javascript" src="{{config('app.url')}}/theme-assets/js-core/modernizr.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/theme-assets/js-core/jquery-cookie.js"></script>

    <script type="text/javascript">
        $(window).load(function(){
            setTimeout(function() {
                $('#loading').fadeOut( 400, "linear" );
            }, 300);
        });
    </script>
</head>
<body>
  <div id="loading">
    <div class="spinner">
      <div class="bounce1"></div>
      <div class="bounce2"></div>
      <div class="bounce3"></div>
    </div>
  </div>
  <style type="text/css">

    html,body {
      height: 100%;
      background: #fff;
      overflow: hidden;
    }
  </style>
  <script type="text/javascript" src="{{config('app.url')}}/theme-assets/widgets/wow/wow.js"></script>
  <script type="text/javascript">
    /* WOW animations */
    wow = new WOW({
      animateClass: 'animated',
      offset: 100
    });
    wow.init();
  </script>
  <img src="{{config('app.url')}}/theme-assets/image-resources/blurred-bg/blurred-bg-3.jpg" class="login-img wow fadeIn" alt="">

    @yield('content')
    {{-- WIDGETS --}}
    <script type="text/javascript" src="{{config('app.url')}}/theme-assets/tether/js/tether.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/theme-assets/bootstrap/js/bootstrap.js"></script>
    {{-- Slim scroll --}}
    <script type="text/javascript" src="{{config('app.url')}}/theme-assets/widgets/slimscroll/slimscroll.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/theme-assets/widgets/charts/piegage/piegage-demo.js"></script>
    {{-- Screenfull --}}
    <script type="text/javascript" src="{{config('app.url')}}/theme-assets/widgets/screenfull/screenfull.js"></script>
    {{-- Content box --}}
    <script type="text/javascript" src="{{config('app.url')}}/theme-assets/widgets/content-box/contentbox.js"></script>
    {{-- Overlay --}}
    <script type="text/javascript" src="{{config('app.url')}}/theme-assets/widgets/overlay/overlay.js"></script>
    {{-- Widgets init for demo --}}
    <script type="text/javascript" src="{{config('app.url')}}/theme-assets/js-init/widgets-init.js"></script>
    {{-- Theme layout --}}
    <script type="text/javascript" src="{{config('app.url')}}/theme-assets/themes/admin/layout.js"></script>
    @yield('javascript')
    </div>
</body>
</html>
