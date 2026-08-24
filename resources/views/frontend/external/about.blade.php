@extends('frontend.layouts.app')
@section('title')
    Our Story
@endsection

@section('seo_title')
{{ getSettingsData('our-story-seo', 'title'); }}
@endsection

@section('seo_description')
{{ getSettingsData('our-story-seo', 'description'); }}
@endsection

@section('seo_keywords')
{{ getSettingsData('our-story-seo', 'keywords'); }}
@endsection

@section('seo_image')
{{ asset(getSettingsData('our-story-seo', 'image_1')) }}
@endsection

@push('styles')
@vite(['resources/scss/frontend/about.scss'])
@endpush

@section('content')

<!-- about hero section start -->
<section class="about-hero-wrapper" style="background-image: url({{asset(getSettingsData('story-hero-section', 'image_1'))}});">
    <div class="container">
        <div>
            <div class="row">
                <div class="about-hero">
                    <div class="our-story">
                    <h1 class="text-light">{{getSettingsData('story-hero-section', 'title')}}</h1>
                    <p class="text-light">{{getSettingsData('story-hero-section', 'subtitle')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- about hero section end -->


<!-- about story section start -->
<section class="about-story-wrapper py-5">
        <div class="container">
            <div>
                <div class="row">
                    <div class="about-story">
                      <!-- story -->
                      <div class="about-story-text">
                        <!-- story texts start -->
                        <div class="about-our-story">
                          <h1>{{getSettingsData('story-details', 'title')}}</h1>
                          {!!getSettingsData('story-details', 'description')!!}
                        </div>
                        <!-- story texts end-->

                        <!-- story images start -->
                        <div class="our-story-images">
                          <div class="story-images">
                            <img src="{{asset(getSettingsData('story-details', 'image_1'))}}" alt="" />
                          </div>
                          <div class="story-images">
                            <img src="{{asset(getSettingsData('story-details', 'image_2'))}}" alt="" />
                          </div>
                          <div class="story-images">
                            <img src="{{asset(getSettingsData('story-details', 'image_3'))}}" alt="" />
                          </div>
                        </div>
                        <!-- story images end -->
                    </div>

                      <!-- philosophy -->
                    <div class="about-philosophy">
                        <div class="philosophy-header">
                            <h1>{{getSettingsData('story-philosophy', 'title')}}</h1>
                        </div>
                        <div class="philosopies">
                            @foreach ($philosophies as $philosophy)
                                <div class="philosophy">
                                    <div>
                                        <img src="{{'/images/UQIF.svg'}}" alt="">
                                    </div>
                                    <div class="philosophy-small-header">
                                        <h5>{{$philosophy->value['title']}}</h5>
                                        <p>{!!$philosophy->value['description']!!}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                      <!-- philosophy -->

                    <!-- Vision mission -->
                    <div class="about-vision-mision">
                        <div class="visions-misions">
                          <div class="vision-mission vision">
                            <h1>{{getSettingsData('story-vision', 'title')}}</h1>
                            <p>{{getSettingsData('story-vision', 'description')}}</p>
                          </div>

                          <div class="vision-mission">
                            <h1>{{getSettingsData('story-mission', 'title')}}</h1>
                            <p>{{getSettingsData('story-mission', 'description')}}</p>
                          </div>
                        </div>
                        <!-- image div -->
                        <div class="about-vision-mision-image">
                          <img src="{{asset(getSettingsData('story-vision-mission-image', 'image_1'))}}" alt="">
                        </div>
                      </div>
                      <!-- Vision mission end -->
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- about story section end -->


@endsection
