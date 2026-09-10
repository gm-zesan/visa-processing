<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') &mdash; AL FAHIM INTERNATIONAL</title>

        <!-- Meta data & SEO -->
        <meta name="author" content="AL FAHIM INTERNATIONAL" />
        @php
            $defaultDescription = "AL FAHIM INTERNATIONAL is a government-approved overseas manpower recruitment agency providing authentic work permit processing, legal foreign employment, and overseas placement solutions.";
            $defaultKeywords = "overseas manpower recruitment, work permit visa, foreign employment agency, saudi arabia visa, dubai uae jobs, malaysia calling visa, maldives hospitality jobs, romania work permit, al fahim international";
            $defaultImage = asset(getSettingsData('5', 'image') ?: 'images/favicon/android-chrome-512x512.png');
        @endphp
        <meta name="description" content="@yield('seo_description', $defaultDescription)"/>
        <meta name="keywords" content="@yield('seo_keywords', $defaultKeywords)">
        
        <!-- OpenGraph / Facebook / WhatsApp -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="@yield('title') &mdash; AL FAHIM INTERNATIONAL">
        <meta property="og:description" content="@yield('seo_description', $defaultDescription)">
        <meta property="og:image" content="@yield('seo_image', $defaultImage)">
        
        <!-- Twitter Cards -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" content="{{ url()->current() }}">
        <meta name="twitter:title" content="@yield('title') &mdash; AL FAHIM INTERNATIONAL">
        <meta name="twitter:description" content="@yield('seo_description', $defaultDescription)">
        <meta name="twitter:image" content="@yield('seo_image', $defaultImage)">


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