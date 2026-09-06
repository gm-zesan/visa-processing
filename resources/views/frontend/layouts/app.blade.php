<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>VisaDocs || @yield('title')</title>

        <!-- Meta data -->
        <meta name="author" content="UQIF" />
        <meta name="description" content="@yield('seo_description')"/>
        <meta name="Resource-type" content="@yield('seo_resource_type')" />
        <meta name="keywords" content="@yield('seo_keywords')">
        <link rel="image_src" href="@yield('seo_image')"/>


        @include('frontend.partials.favicon')
        @include('frontend.partials.styles')
        @stack("styles")

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