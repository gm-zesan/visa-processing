<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') &mdash; AL FAHIM INTERNATIONAL</title>

        <!-- Meta data -->
        <meta name="author" content="UQIF" />
        <meta name="description" content="@yield('seo_description')"/>
        <meta name="Resource-type" content="@yield('seo_resource_type')" />
        <meta name="keywords" content="@yield('seo_keywords')">
        <link rel="image_src" href="@yield('seo_image')"/>


        @include('frontend.partials.favicon')
        @include('frontend.partials.styles')
        @stack("styles")

        @php
            $activeTheme = getActiveTheme();
        @endphp
        @if($activeTheme)
        <style id="dynamic-brand-theme">
            :root, html, body {
                --primary-color: {{ $activeTheme->primary_color ?? '#C59A27' }} !important;
                --primary-hover: {{ $activeTheme->hover_color ?? '#A87F17' }} !important;
                --primary-light: {{ $activeTheme->light_color ?? '#FBF6EA' }} !important;
                --secondary-color: {{ $activeTheme->secondary_color ?? '#111A3A' }} !important;
                --nav-bg: {{ $activeTheme->nav_bg ?? '#FFFFFF' }} !important;
                --footer-bg: {{ $activeTheme->footer_bg ?? '#111A3A' }} !important;
                --primary-rgb: {{ hexToRgb($activeTheme->primary_color ?? '#C59A27') }} !important;
                --secondary-rgb: {{ hexToRgb($activeTheme->secondary_color ?? '#111A3A') }} !important;
            }
        </style>
        @endif

    </head>

    <body>
        @include('frontend.partials.header')
        <main>
             @yield('content')
        </main>

        @include('frontend.partials.footer')
    
        @include('frontend.partials.scripts')

        @stack("scripts")
    </body>

</html>