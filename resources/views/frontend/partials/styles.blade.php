<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('frontend/vendor/fontawesome/css/all.min.css')}}">

<!-- Vendor CSS Files -->
<link href="{{asset('frontend/vendor/aos/aos.css')}}" rel="stylesheet">
<link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('frontend/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
<link href="{{asset('frontend/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

<!-- Template Main CSS File -->
<!-- <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet"> -->

@vite(['resources/scss/frontend/styles.scss', 'resources/scss/frontend/helper.scss', 'resources/scss/frontend/responsive.scss'])
{{-- @vite(['resources/scss/frontend/styles-dark.scss']) --}}
