<!doctype html>
<html lang="en" dir="{{ (getPathLang() ?? authUser()?->default_lang) == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Landrick - Bootstrap 5 Multipurpose App, Saas & Software Landing & Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
    <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
    <meta name="author" content="Shreethemes" />
    <meta name="email" content="support@shreethemes.in" />
    <meta name="website" content="https://shreethemes.in" />
    <meta name="Version" content="v5.0.0" />

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets_dashboard/images/favicon.ico') }}" />
    <!-- Css -->
    <link href="{{ asset('assets_dashboard/libs/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets_dashboard/css/bootstrap'. (authUser()?->color_mode == 'dark' ? '-dark' : '') . ((getPathLang() ?? authUser()?->default_lang) == 'ar' ? '-rtl' : '') .'.min.css') }}" class="theme-opt" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets_dashboard/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets_dashboard/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets_dashboard/libs/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet" />
    <!-- Style Css-->
    <link href="{{ asset('assets_dashboard/css/style'. (authUser()?->color_mode == 'dark' ? '-dark' : '') . ((getPathLang() ?? authUser()?->default_lang) == 'ar' ? '-rtl' : '') .'.min.css') }}" class="theme-opt" rel="stylesheet" type="text/css" />
    <style>
        .custom-logo {
            text-align: center;
            margin: auto !important;
            align-items: center;
            justify-content: center;
            height: 50px;
            display: flex;
        }
        
        /* Theme Switcher Active State */
        .theme-icon.active {
            background-color: var(--bs-primary) !important;
            color: white !important;
            border-color: var(--bs-primary) !important;
        }
        
        .theme-icon.active i {
            color: white !important;
        }
        
        /* Smooth theme transition */
        * {
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }
    </style>
</head>

<body>
    <!-- Loader -->
    {{-- <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div> --}}
    <!-- Loader -->
