@extends('frontend.layouts.app')

@section('title')
Help Center
@endsection

@push("styles")

<!-- @vite(['resources/scss/frontend/helpcenter.scss']) -->
@vite(['resources/scss/frontend/helpcenter-dark.scss'])

@endpush


@section('content')
    <!-- contact_page_area -->
    <div class="contact_page_area" style="background-image: url({{ asset(getSettingsData('84', 'image')) }});">
        <div class="container">
            <div class="contact_wrapper">
                <h2>{{ getSettingsData('84', 'title') }}</h2>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">HOME</a></li>
                    <li class="breadcrumb-item active">{{ getSettingsData('84', 'title') }}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
   <!-- help_center_area -->
   <div class="help_center_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mt_50">
                <div class="help_area_left" id="help_left">
                    <ul id="list-example" class="list-group">
                        <li><a href="#booking"><i class="fa-regular fa-circle-check"></i>Booking details</a></li>
                        <li><a href="#cancellation"><i class="fa-solid fa-retweet"></i>Cancellation</a></li>
                        <li><a href="#Change"><i class="fa-solid fa-sheet-plastic"></i>Change a booking</a></li>
                        <li><a href="#price"><i class="fa-solid fa-bell"></i>Special requests</a></li>
                        <li><a href="#special"><i class="fa-solid fa-lock"></i>Price Freeze</a></li>
                        <li><a href="#fast"><i class="fa-solid fa-headphones"></i>Fast Track</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 mt_50">
                <div class="help_area_right">
                    <div class="need_help">
                        <img src="{{asset('frontend/images/help.png')}}" alt="Image">
                        <div class="need_cont">
                            <h2>Need help? We're here for you!</h2>
                            <p>Get quick answers, contact properties or visa customer care, and more with our self-service help features.</p>
                        </div>
                        <a href="{{route('contact')}}" class="button">Contact Visa Customer Service</a>
                    </div>
                    
                   
                                    
                        <div class="accordion_wrapp" id="booking">
                                <h3>Booking details</h3>
                                <div class="accordion">
                                @foreach( getSettingsList('help-booking-section') as $item) 
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapseOne">
                                    {{ $item->title }}
                                    </button>
                                    </h2>
                                    <div id="collapse{{$item->id}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>{!! $item->description !!}</p>
                                    </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                        <div class="accordion_wrapp" id="cancellation">
                            <h3>Cancellation</h3>
                            <div class="accordion">
                            @foreach( getSettingsList('help-cancel-section') as $item) 
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingChang_1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapsecen_1">
                                {{ $item->title }}
                                </h2>
                                <div id="collapse{{$item->id}}" class="accordion-collapse collapse" aria-labelledby="headingcen_1" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>{!! $item->description !!}</p>
                                </div>
                                </div>
                            </div>
                            @endforeach         
                        </div>

                         <div class="accordion_wrapp" id="Change">
                            <h3>Change a booking</h3>
                            <div class="accordion">
                                
                            @foreach( getSettingsList('help-change-section') as $item) 
                            <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingChang_1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapseChang_1">
                                    {{ $item->title }}
                                    </button>
                                    </h2>
                                    <div id="collapse{{$item->id}}" class="accordion-collapse collapse" aria-labelledby="headingChang_1" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>{!! $item->description !!}</p>
                                    </div>
                                    </div>
                                </div>
                         @endforeach
                                        
                        </div>

                         <div class="accordion_wrapp" id="price">
                            <h3>Special requests</h3>
                            <div class="accordion">
                                
                            @foreach( getSettingsList('help-special -section') as $item) 
                            <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSpec_1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapseSpec_1">
                                    {{ $item->title }}
                                    </button>
                                    </h2>
                                    <div id="collapse{{$item->id}}" class="accordion-collapse collapse" aria-labelledby="headingSpec_1" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>{!! $item->description !!}</p>
                                    </div>
                                    </div>
                                </div>
                               @endforeach
                        </div>

                        <div class="accordion_wrapp" id="special">
                            <h3>Price Freeze</h3>
                            <div class="accordion">
                                
                            @foreach( getSettingsList('help-price-section') as $item) 
                            <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFreez_1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapseFreez_1">
                                    {{ $item->title }}
                                    </button>
                                    </h2>
                                    <div id="collapse{{$item->id}}" class="accordion-collapse collapse" aria-labelledby="headingFreez_1" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>{!! $item->description !!}</p>
                                    </div>
                                    </div>
                                </div>            
                            @endforeach      
                        </div>
                         <div class="accordion_wrapp" id="fast">
                            <h3>Fast Track</h3>
                            <div class="accordion">
                                
                            @foreach( getSettingsList('help-fast-section') as $item) 
                            <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFast_1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapseFast_1">
                                    {{ $item->title }}
                                    </button>
                                    </h2>
                                    <div id="collapse{{$item->id}}" class="accordion-collapse collapse" aria-labelledby="headingFast_1" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>{!! $item->description !!}</p>
                                    </div>
                                    </div>
                                </div>
                          @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection
