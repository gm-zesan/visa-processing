<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AL FAHIM INTERNATIONAL') }}</title>

    <!-- Favicons -->
    @include('frontend.partials.favicon')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/fontawesome/css/all.min.css') }}">

    <!-- Scripts -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #F8FAFC;
        }
        h1, h2, h3, h4, h5, h6, .font-heading {
            font-family: 'Outfit', sans-serif;
        }
        .btn-gold {
            background-color: #C59A27 !important;
            color: #FFFFFF !important;
            transition: all 0.2s ease;
        }
        .btn-gold:hover {
            background-color: #A87F17 !important;
        }
        input:focus {
            border-color: #C59A27 !important;
            --tw-ring-color: rgba(197, 154, 39, 0.2) !important;
        }
    </style>
</head>
<body class="text-slate-800 antialiased bg-slate-50 min-h-screen">
    <div class="min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="mb-6 text-center">
            <a href="{{ route('home') }}" class="inline-block transition hover:opacity-90">
                <img style="max-height: 55px; max-width: 220px;" 
                     src="{{ asset(getSettingsData('5', 'image') ?? 'images/theme_logo.png') }}" 
                     alt="AL FAHIM INTERNATIONAL"
                     class="mx-auto drop-shadow-sm">
            </a>
        </div>

        <div class="w-full sm:max-w-md bg-white border border-slate-200 shadow-sm rounded-xl p-8">
            {{ $slot }}
        </div>

        <div class="mt-6 text-center text-xs text-slate-500">
            <a href="{{ route('home') }}" class="text-slate-500 hover:text-slate-800 inline-flex items-center gap-1.5 transition">
                <i class="fa-solid fa-arrow-left text-[11px]"></i> Return to Main Website
            </a>
            <p class="mt-2 text-slate-400">&copy; {{ date('Y') }} AL FAHIM INTERNATIONAL. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
