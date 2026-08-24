@extends('frontend.layouts.app')

@section('title')
    Directors
@endsection

@section('seo_title')
{{ getSettingsData('directors-seo', 'title'); }}
@endsection

@section('seo_description')
{{ getSettingsData('directors-seo', 'description'); }}
@endsection

@section('seo_keywords')
{{ getSettingsData('directors-seo', 'keywords'); }}
@endsection

@section('seo_image')
{{ asset(getSettingsData('directors-seo', 'image_1')) }}
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@vite(['resources/scss/frontend/directors.scss'])
@endpush

@section('content')
<!-- directors hero section start -->
<section class="directors-hero-wrapper directors-bg" style="background-image: url({{asset(getSettingsData('employee-hero-section', 'image_1'))}});">
    <div class="container">
        <div class="row">
            <div class="directors-hero">
                <h1 class="text-light">{{getSettingsData('employee-hero-section', 'title')}}</h1>
                <p class="text-light">{{getSettingsData('employee-hero-section', 'subtitle')}}</p>
            </div>
        </div>
    </div>
</section>
<!-- directors hero section end -->

<!-- directors hero section start -->
<section class="directors-hero-wrapper">
        <div class="container">
            <div class="row">
                <div class="directors-section">
                    <div class="directors-about">
                        <!-- 1 -->
                        @foreach ($employees as $employee)
                            <div class="director-about">
                                <a href="{{ route('director.profile', ['id' => $employee->id]) }}">
                                    @if(isset($employee->image))
                                        <img class="w-100" src="{{asset($employee->image)}}" alt="Mufti picture">
                                    @else
                                        <img class="w-100" src="{{'/images/Blank-porfile.svg'}}" alt="Mufti picture">
                                    @endif
                                </a>
                                <div class="director-info">
                                    <a href="{{ route('director.profile', ['id' => $employee->id]) }}" class="title">{{$employee->name}}</a>
                                    <div class="director-social-icons">
                                        <p>{{$employee->designation}}</p>
                                        <div class="social-icons">
                                            <a href="{{$employee->facebook_link}}">
                                                <i class="fa-brands fa-facebook"></i>
                                            </a>
                                            <a href="{{$employee->linkdin_link}}">
                                                <i class="fa-brands fa-linkedin"></i>
                                            </a>
                                            <a href="{{$employee->instagram_link}}">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>
                                            <a href="{{$employee->twitter_link}}">
                                                <i class="fa-brands fa-twitter"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
</section>
<!-- directors hero section end -->

@endsection
