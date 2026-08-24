@extends('frontend.layouts.app')

@section('title')
    Home
@endsection

@section('seo_title')
{{ getSettingsData('home-seo', 'title'); }}
@endsection

@section('seo_description')
{{ getSettingsData('home-seo', 'description'); }}
@endsection

@section('seo_keywords')
{{ getSettingsData('home-seo', 'keywords'); }}
@endsection

@section('seo_image')
{{ asset(getSettingsData('home-seo', 'image_1')) }}
@endsection

@push('styles')
@vite(['resources/scss/frontend/home.scss'])
@endpush

@section('content')
    <div class="home-hero-wrapper">
        <div class="container">
            <div class="row">
                <div class="home-hero">
                    <div class="hero-text">
                        <h1>{{getSettingsData('home-hero-section', 'title')}}</h1>
                        <p>{!!getSettingsData('home-hero-section', 'description')!!}</p>
                        <a href="{{getSettingsData('home-hero-section', 'button_link_1')}}">{{getSettingsData('home-hero-section', 'button_text_1')}}</a>
                    </div>
                    <div class="hero-image-right">
                        <div class="hero-image-bg">
                            <img src="{{asset('admin/assets/images/home/home-hero-circle.svg')}}" alt="">
                        </div>
                        <div class="hero-image">
                            <img class="hero-image-1" src="{{asset(getSettingsData('home-hero-section', 'image_1'))}}" alt="">
                            <img class="hero-image-2" src="{{asset(getSettingsData('home-hero-section', 'image_2'))}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="home-activities-wrapper">
        <div class="container">
            <div class="row">
                <div class="home-activities">
                    <h2>{{getSettingsData('home-activities', 'title')}}</h2>
                    <div class="activities-wrapper">
                        @foreach ($activities as $activity)
                            <div class="activity">
                                <img src="{{asset('admin/assets/images/home/home-activity.svg')}}" alt="">
                                <h5>{{$activity->title}}</h5>
                                <p>{{$activity->description}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="home-donation-wrapper">
        <div class="container">
            <div class="row">
                <div class="home-donation">
                    <div class="donation-text">
                        <h5>{{getSettingsData('home-donate', 'title')}}</h5>
                        <h1>{{getSettingsData('home-donate', 'subtitle')}}</h1>
                        <a href="{{getSettingsData('home-donate', 'button_link_1')}}">{{getSettingsData('home-donate', 'button_text_1')}}</a>
                        <div class="count">
                            <h2>{{getSettingsData('home-year-budget', 'title')}}</h2>
                            <div class="all-counts">
                                <div class="count-item">
                                    <h2>{{getSettingsData('home-year-budget', 'total_budget_value')}}</h2>
                                    <p>{{getSettingsData('home-year-budget', 'total_budget_text')}}</p>
                                </div>
                                <div class="count-item">
                                    <h2>{{getSettingsData('home-year-budget', 'total_income_value')}}</h2>
                                    <p>{{getSettingsData('home-year-budget', 'total_income_text')}}</p>
                                </div>
                                <div class="count-item count-item-last">
                                    <h2>{{getSettingsData('home-year-budget', 'deficits_value')}}</h2>
                                    <p>{{getSettingsData('home-year-budget', 'deficits_text')}}</p>
                                </div>
                            </div>
                            <div class="total-count">
                                <h3>{{getSettingsData('home-year-budget', 'subtitle_1')}}</h3>
                                <p>{{getSettingsData('home-year-budget', 'subtitle_2')}}</p>
                            </div>
                            <div class="lines">
                                <div class="line-one" style="width:{{getSettingsData('home-year-budget', 'zakat_value')}}"></div>
                                <div class="line-two" style="width:{{getSettingsData('home-year-budget', 'sadaqah_value')}}"></div>
                                <div class="line-three"></div>
                            </div>
                            <div class="line-colors">
                                <div class="color-one">
                                    <div class="color">

                                    </div>
                                    <p>Zakat</p>
                                </div>
                                <div class="color-two">
                                    <div class="color">

                                    </div>
                                    <p>Sadaqah</p>
                                </div>
                            </div>
                            <div class="line-content">
                                <p>*Updated On - {{getSettingsData('home-year-budget', 'update_date')}}</p>
                                <a href="{{getSettingsData('home-year-budget', 'button_link')}}">{{getSettingsData('home-year-budget', 'button_text')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="donation-image">
                        <img src="{{asset(getSettingsData('home-donate', 'image_1'))}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="home-service-wrapper">
        <div class="container">
            <div class="row">
                <div class="home-service">
                    <div class="service-heading">
                        <h2>{{getSettingsData('home-enrol', 'title')}}</h2>
                        <p>{!!getSettingsData('home-enrol', 'description')!!}</p>
                    </div>
                    <div class="services-item">
                        @foreach ($services as $service)
                            <div class="single-service" style="
                            background-image: url({{asset($service->value['image'])}}); background-size: cover; background-repeat: no-repeat; background-position: center;">
                                <div class="single-service-content">
                                    <h5>{{$service->value['title']}}</h5>
                                    @if(isset($service->value['subtitle_2']))
                                        <h6>{{$service->value['subtitle_1']}}</h6>
                                    @else
                                        <p class="admission"><span>{{$service->value['subtitle_1']}}</span></p>
                                    @endif
                                    @if(isset($service->value['subtitle_2']))
                                        <p class="admission"><span>{{$service->value['subtitle_2']}}</span></p>
                                    @endif
                                    {!!$service->value['description']!!}
                                    @if(isset($service->value['qualification']))
                                        <div class="content-program" style="margin-bottom: 4px">
                                            <p><b>Qualification</b></p>
                                            <p style="margin-bottom: 0">{!!$service->value['qualification']!!}</span></p>
                                        </div>
                                    @endif
                                    <div class="content-program">
                                        <p><b>Program Schedule</b></p>
                                        <p>{!!$service->value['program_schedule']!!}</p>
                                        {{-- <p>Mon-Thur 7:45 am - 12:15 am <span>Fri 4:45 pm - 11:30 pm</span></p> --}}
                                    </div>

                                    <button><a href="{{$service->value['button_link']}}">{{$service->value['button_text']}}</a></button>
                                    <p>Application Closes in {{date('d M, Y' ,strtotime($service->value['application_close_date']))}}</p>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="home-about-wrapper">
        <div class="container">
            <div class="row">
                <div class="home-about">
                    <div class="home-about-text">
                        <h2>{{ getSettingsData('home-who-we-are', 'title') }}</h2>

                        <div class="for-small-device">
                            <div>
                                <img src="{{asset( getSettingsData('home-who-we-are', 'image_1') )}}" alt="">
                            </div>
                        </div>
                        {!! getSettingsData('home-who-we-are', 'description') !!}
                        <div class="home-about-button">
                            <button><a href="{{ getSettingsData('home-who-we-are', 'button_link_1') }}">{{ getSettingsData('home-who-we-are', 'button_text_1') }}</a></button>
                            <button><a href="{{ getSettingsData('home-who-we-are', 'button_link_2') }}">{{ getSettingsData('home-who-we-are', 'button_text_2') }} &rarr;</a></button>
                        </div>
                    </div>

                    <div class="home-about-image">
                        <div class="single-about">
                            <img src="{{asset( getSettingsData('home-who-we-are', 'image_1') )}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="home-event-wrapper">
        <div class="container">
            <div class="row">
                <div class="home-event">
                    <div class="home-event-top">
                        <h2>{{ getSettingsData('home-events', 'title') }}</h2>
                        <div class="home-event-buttons">
                            <a href="{{route('home.event',['event' => 'previous'])}}" onclick="myEvent('previous')">Previous</a>
                            <a href="{{route('home.event',['event' => 'latest'])}}" onclick="myEvent('latest')">Latest</a>
                        </div>
                    </div>
                    <div class="home-event-image">
                        @foreach ($events as $event)
                            <div class="single-event">
                                <img src="{{asset($event->image)}}" alt="">
                                <div class="event-imege-text">
                                    <div class="heading">
                                        <h3>{{$event->title}}</h3>
                                        <a href="#">
                                            <img src="{{asset('admin/assets/images/home/home-event-share-icon.svg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="venue">
                                        <div class="venue-text">
                                            <h6>Venue</h6>
                                            <p>{{$event->venue}}</p>
                                        </div>

                                        @if($event->time)
                                            <div class="venue-time">
                                                <h6>Time</h6>
                                                <p>{{date('h:i A', strtotime($event->time))}}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="speaker">
                                        <div class="speaker-text">
                                            <h6>Speaker</h6>
                                            <p>{{$event->speaker}}</p>
                                        </div>
                                        <div class="speaker-buttons">
                                            <button><a href="{{$event->button_link_1}}">{{$event->button_text_1}}</a></button>
                                            @if($event->button_text_2)
                                                <button><a href="{{$event->button_link_2}}">{{$event->button_text_2}}</a></button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="home-subscribe-wrapper">
        <div class="container">
            <div class="row">
                <div class="home-subscribe" style="background-image: url({{asset('admin/assets/images/home/home-subcribe-bg.png')}});">
                    <div class="home-subscribe-content">
                        <div class="home-subscribe-text">
                            <img src="{{asset('admin/assets/images/home/home-activity.svg')}}" alt="">
                            <h2>{{ getSettingsData('home-subscription', 'title') }}</h2>
                            <a href="{{ getSettingsData('home-subscription', 'button_link_1') }}">{{ getSettingsData('home-subscription', 'button_text_1') }}</a>
                            <img class="mosque-image" src="{{asset('images/single-mosque.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function myEvent(event) {
            console.log(event);
        }
    </script>
@endpush
