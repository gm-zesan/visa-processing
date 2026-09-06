@extends('frontend.layouts.app')

@section('title')
    Director profile
@endsection

@section('seo_title')
{{ getSettingsData('director-profile-seo', 'title') }}
@endsection

@section('seo_description')
{{ getSettingsData('director-profile-seo', 'description') }}
@endsection

@section('seo_keywords')
{{ getSettingsData('director-profile-seo', 'keywords') }}
@endsection

@section('seo_image')
{{ asset(getSettingsData('director-profile-seo', 'image_1')) }}
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('frontend/vendor/fontawesome/css/all.min.css')}}">
{{-- @vite(['resources/scss/frontend/director-profile.scss']) --}}
@endpush

@section('content')

<!-- directors hero section start -->
<section class="director-profile-wrapper">
    <div class="container">
        <div>
            <div class="row">
                <div class="director-profile-info">
                    <!-- header -->
                    <a href="{{ route('directors') }}" class="director-profile">
                        <span><i class="fa-solid fa-angle-left"></i></span>
                        <h1>Director Profile</h1>
                    </a>
                    <!-- header -->

                    <!-- image and name -->
                    <div class="image-and-name">
                        <div>
                            @if($employee->image)
                                <img src="{{asset($employee->image)}}" alt="profile image">
                            @else
                                <img class="w-100" src="{{'/images/Blank-porfile.svg'}}" alt="Mufti picture">
                            @endif
                        </div>

                        <div class="name-box">
                            <h1>{{$employee->name}}</h1>
                            <small>{{$employee->designation}}</small>
                            <div class="director-profile-social-icons">
                                <a href="{{$employee->facebook_link}}">
                                <i class="fa-brands fa-facebook"></i>
                                </a>
                                <a href="{{$employee->linkdin_link}}">
                                <i class="fa-brands fa-linkedin"></i>
                                </a>
                                <a href="{{$employee->instagram_link}}">
                                <i class="fa-brands fa-instagram"></i>
                                </a>
                                <a href="mailto:{{$employee->email}}">
                                <i class="fa-solid fa-envelope"></i>
                                </a>
                                <span>{{$employee->email}}</span>
                            </div>
                        </div>
                    </div>
                    <!-- image and name -->

                    <!-- director information -->
                    <div class="info-box">
                        {!!$employee->description!!}
                    </div>
                    <!-- director information -->

                </div>
            </div>
        </div>
    </div>
</section>
<!-- directors hero section end -->

@endsection

