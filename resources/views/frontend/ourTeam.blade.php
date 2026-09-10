@extends('frontend.layouts.app')

@section('title')
ourTeam
@endsection

@push("styles")

@vite(['resources/scss/frontend/ourTeam.scss'])
@endpush


@section('content')
    <!-- contact_page_area -->
    <div class="contact_page_area" style="background-image: url({{ asset(getSettingsData('46', 'image')) }});">
        <div class="container">
            <div class="contact_wrapper">
                <h2>{{ getSettingsData('46', 'title') }}</h2>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">HOME</a></li>
                    <li class="breadcrumb-item active">{{ getSettingsData('46', 'title') }}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
   
    <!-- Dedicated_area -->
    <div class="dedicated_area">
        <div class="container">
            <div class="row row_gutters_sm">

                @foreach ($teams as $team)
                    <div class="col-lg-4 col-sm-6 mt_40">
                        <div class="styles_card_dedi">
                            <div class="dedicated_card_wrap">
                                <div class="team_inner_wrap">
                                    <div class="image_wrap">
                                        <img src="{{ (!empty($team->image) && file_exists(public_path($team->image))) ? asset($team->image) : asset('images/admin/user.jpeg') }}" alt="{{ $team->name }}" class="w-100" loading="lazy" decoding="async">
                                        <div class="social_icons1">				            								
                                            <a href="{{$team->facebook}}" class="social-icon">
                                            <i class="fa-brands fa-facebook-f"></i>
                                            </a>			                                               
                                            <a href="{{$team->twitter}}" class="social-icon">
                                            <i class="fa-brands fa-twitter"></i>
                                            </a>			                                           
                                            <a href="{{$team->instagram}}" class="social-icon">
                                            <i class="fa-brands fa-instagram"></i>
                                            </a>			 
                                        </div>
                                    </div>
                                    <div class="team_content">
                                        <a href="{{route('single_team',['id'=>$team->id])}}"><h3>{{$team->name}}</h3></a>
                                        <p>{{$team->designation}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
@endsection
