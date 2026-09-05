@extends('frontend.layouts.app')

@section('title')
Faq
@endsection

@push("styles")

@vite(['resources/scss/frontend/faq.scss'])
{{-- @vite(['resources/scss/frontend/faq-dark.scss']) --}}
@endpush


@section('content')
    <!-- contact_page_area -->
    <div class="contact_page_area" style="background-image: url({{ asset(getSettingsData('47', 'image')) }});">
        <div class="container">
            <div class="contact_wrapper">
                <h2>{{ getSettingsData('47', 'title') }}</h2>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">HOME</a></li>
                    <li class="breadcrumb-item active">{{ getSettingsData('47', 'title') }}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- faq_area -->
    <div class="faq_area">
        <div class="container">
            <div class="choose_top">
                <h3>{{ getSettingsData('48', 'title') }}</h3>
                <h2>{!! getSettingsData('48', 'description') !!}</h2>
                <div class="em_bar_bg"></div>
            </div>
            <div class="accordion coustom_accordion">
                <div class="row">
                    <div class="col-lg-6">
                        @foreach( getSettingsList('faq-accordion') as $item) 
                            @if($loop->iteration % 2 == 1)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button @if ($item->id != 49 && $item->id != 50) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapseOne">
                                        {{ $item->title }}
                                        </button>
                                    </h2>
                                    @if($item->id == 49 || $item->id == 50)
                                        <div id="collapse{{$item->id}}" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {!! $item->description !!}
                                            </div>
                                        </div>
                                    @else
                                        <div id="collapse{{$item->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {!! $item->description !!}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                
                            @endif
                        @endforeach
                    </div>
                    <div class="col-lg-6">
                        @foreach( getSettingsList('faq-accordion') as $item) 
                            @if($loop->iteration % 2 == 0)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button @if ($item->id != 49 && $item->id != 50) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapse{{$item->id}}">
                                        {{ $item->title }}
                                        </button>
                                    </h2>
                                    @if($item->id == 49 || $item->id == 50)
                                        <div id="collapse{{$item->id}}" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {!! $item->description !!}
                                            </div>
                                        </div>
                                    @else
                                        <div id="collapse{{$item->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {!! $item->description !!}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
