@extends('frontend.layouts.app')

@section('title')
country
@endsection

@push("styles")

@vite(['resources/scss/frontend/country.scss'])
{{-- @vite(['resources/scss/frontend/country-dark.scss']) --}}
@endpush


@section('content')
    @if(session('success'))
        <div style="position: fixed; top: -20px; left: 50%; transform: translate(-50%, -50%); background-color: #fff; color: #111A3A; padding: 5px 15px; border-radius: 5px; display: flex; align-items: center; gap: 10px; opacity: 1; z-index: 1025" id="success-message">
            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><path fill="#111A3A" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> {{ session('success') }}
        </div>
    @endif
    <!-- contact_page_area -->
    <div class="contact_page_area" style="background-image: url({{ asset(getSettingsData('58', 'image')) }});">
        <div class="container">
            <div class="contact_wrapper">
                <h2>{{$country->country->name}}</h2>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">HOME</a></li>
                    <li class="breadcrumb-item active">{{$country->country->name}}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- country_work_area -->
    <div class="country_work_area">
      <div class="container">
        <div class="row row_gutters">
          <div class="col-lg-4 mt_50">
            <div class="country_left_side">
              <div class="country_lists mb_30">
                @foreach ($countryDetails as $ctry)
                    <a href="{{route('country',['id'=>$ctry->id])}}" class="{{ $ctry->id == $country->id ? 'active' : '' }}"><h3>{{ $ctry->country->name }}</h3><i class="fa-solid fa-caret-right"></i></a>
                @endforeach
              </div>
              <!-- call_us_area -->
              <div class="call_us_area mb_30">
                <img src="{{ asset(getSettingsData('59', 'image')) }}" alt="Image" class="w-100">
                <div class="call_content">
                  <h2>{{ getSettingsData('59', 'title') }}</h2>
                  <a href="tel:+{{ getSettingsData('59', 'subtitle') }}"><i class="fa-solid fa-phone-volume"></i>+{{ getSettingsData('59', 'subtitle') }}</a>
                </div>
              </div>
              <!-- request_form -->
              <div class="request_form_area">
                <h2>Request a<br> Appointment</h2>
                <form action="{{route('appointment.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="country" value="{{$country->name}}">
                    <input type="text" name="name" placeholder="Your Name">
                    @if($errors->has('name'))
                        <div class="error_msg">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <input type="email" name="email" placeholder="Your Email">
                    @if($errors->has('email'))
                        <div class="error_msg">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <input type="tel" name="phone" placeholder="Your Phone">
                    @if($errors->has('phone'))
                        <div class="error_msg">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                    <select name="visa_type_id">
                        <option disabled selected>Select Visa</option>
                        @foreach ($visa_types as $visa)
                            <option value="{{$visa->id}}">{{ $visa->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('visa_type_id'))
                        <div class="error_msg">
                            {{ $errors->first('visa_type_id') }}
                        </div>
                    @endif
                    <textarea placeholder="Your Meassage" name="message"></textarea>
                    @if($errors->has('message'))
                        <div class="error_msg">
                            {{ $errors->first('message') }}
                        </div>
                    @endif
                    <button type="submit" class="button">Send Request</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-8 mt_50">
              <div class="country_right_side">
                <img src="{{asset($country->image)}}" alt="Image" class="w-100">
                <div class="country_title">
                    <h2>Why Visit {{$country->country->name}}</h2>
                    <p>{!!$country->description!!}</p>
                </div>
                <div class="country_title">
                  <h2>Available Visa For {{$country->country->name}}</h2>
                  <ul class="circle_check_list">
                        @foreach ($visa_types as $visa)
                            <li><a href="{{route('visa',['slug'=>$visa->slug])}}" style="color: inherit"> <i class="fa-regular fa-circle-check"></i>{{$visa->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
@endsection
@push('scripts')
    <script>
        setTimeout(() => {
            document.getElementById('success-message').style.opacity = 1;
            document.getElementById('success-message').style.top = '30px';
            document.getElementById('success-message').style.transition = 'all 0.3s ease-in-out';
            setTimeout(() => {
                document.getElementById('success-message').style.opacity = 0;
                document.getElementById('success-message').style.top = '-20px';
                document.getElementById('success-message').style.transition = 'all 0.3s ease-in-out';
            }, 3000);
        }, 100);
    </script>    
@endpush
