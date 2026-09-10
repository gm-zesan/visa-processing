@extends('frontend.layouts.app')

@section('title')
    {{$teamMember->name}}
@endsection

@push("styles")
    @vite(['resources/scss/frontend/single_team.scss'])
@endpush


@section('content')
    <!-- contact_page_area -->
    <div class="contact_page_area"
        style="background-image: url({{ asset(getSettingsData('46', 'image') ?: 'frontend/images/contact_bg.jpg') }});">
        <div class="container">
            <div class="contact_wrapper">
                <h2>{{$teamMember->name}}</h2>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">HOME</a></li>
                        <li class="breadcrumb-item"><a href="{{route('ourTeam')}}">Our Team</a></li>
                        <li class="breadcrumb-item active">{{$teamMember->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- single_person_wrap -->
    <div class="single_person_wrap">
        <div class="container">
            <div class="inner_person_items">
                <img src="{{ (!empty($teamMember->image) && file_exists(public_path($teamMember->image))) ? asset($teamMember->image) : asset('images/admin/user.jpeg') }}"
                    alt="{{ $teamMember->name }}" class="single_person_images">
                <div class="connt_person">
                    <h2>{{$teamMember->name}}</h2>
                    <h3>{{$teamMember->designation}}</h3>
                    <ul class="single_list_person">
                        {{-- <li><strong>Department:</strong> Web Development</li> --}}
                        <li><strong>Experience:</strong> {{$teamMember->experience}}</li>
                        <li><strong>Email:</strong><a href="mailto:{{$teamMember->email}}">{{$teamMember->email}}</a></li>
                        <li><strong>Phone:</strong><a href="tel:{{$teamMember->phone}}">{{$teamMember->phone}}</a></li>
                    </ul>
                    <ul class="person_social_list">
                        <li><a href="{{$teamMember->facebook}}"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="{{$teamMember->twitter}}"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="{{$teamMember->instagram}}"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="{{$teamMember->youtube}}"><i class="fa-brands fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- biography_area -->
    <div class="biography_area">
        <div class="container">
            <div class="biography_wrap">
                <h2>Biography</h2>
                {!!$teamMember->biography!!}
            </div>
        </div>
    </div>
@endsection