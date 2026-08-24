@extends('frontend.layouts.app')

@section('title')
contact
@endsection

@push("styles")

<!-- @vite(['resources/scss/frontend/contact.scss']) -->
@vite(['resources/scss/frontend/contact-dark.scss'])
@endpush


@section('content')

    @if(session('success'))
        <div style="position: fixed; top: -20px; left: 50%; transform: translate(-50%, -50%); background-color: #fff; color: #111A3A; padding: 5px 15px; border-radius: 5px; display: flex; align-items: center; gap: 10px; opacity: 1; z-index: 1025" id="success-message">
            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><path fill="#111A3A" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> {{ session('success') }}
        </div>
    @endif


    <!-- contact_page_area -->
    <div class="contact_page_area" style="background-image: url({{ asset(getSettingsData('43', 'image')) }});">
        <div class="container">
            <div class="contact_wrapper">
                <h2>{{ getSettingsData('43', 'title') }}</h2>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">HOME</a></li>
                    <li class="breadcrumb-item active">{{ getSettingsData('43', 'title') }}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- touch_from_area -->
     <div class="touch_from_area">
      <form action="{{route('message.store')}}" method="POST">
        @csrf
          <div class="container">
            <div class="row g-0">
              <div class="col-lg-6 mt_50">
                  <div class="touch_left">
                  <h2>Get In Touch</h2>
                  <div class="row">
                    <div class="col-lg-6">
                      <input type="text" name="name" placeholder="Your Name">
                    </div>
                    <div class="col-lg-6">
                      <input type="email" name="email" placeholder="Your Email">
                    </div>
                    <div class="col-lg-6">
                      <input type="tel" name="phone" placeholder="Your Phone">
                    </div>
                    <div class="col-lg-6">
                      <input type="text" name="subject" placeholder="Subject">
                    </div>
                    <div class="col-lg-12">
                      <textarea name="message" placeholder="Message"></textarea>
                    </div>
                   <div class="col-lg-6">
                      <button type="submit" class="sub_btn">Send Request</button>
                   </div>
                  </div>
                  </div>
              </div>
              <div class="col-lg-6 mt_50">
                <div class="company_right">
                    <div class="company_item">
                      <div class="company_icons">
                      <i class="fa-solid fa-location-pin"></i>
                      </div>
                      <div class="company_cont">
                        <h2>Company Location</h2>
                        <p>{{ getSettingsData('44', 'button_text') }}</p>
                      </div>
                    </div>
                    <div class="company_item">
                      <div class="company_icons">
                      <i class="fa-solid fa-phone"></i>
                      </div>
                      <div class="company_cont">
                        <h2>Telephone Number</h2>
                       <ul>
                        <li><a href="tel:{{ getSettingsData('44', 'title') }}">{{ getSettingsData('44', 'title') }}</a></li>
                        <!-- <li><a href="tel:880636524265">+880 636 524 265,</a></li> -->
                       </ul>
                      </div>
                    </div>
                    <div class="company_item">
                      <div class="company_icons">
                        <i class="fa-regular fa-envelope"></i>
                      </div>
                      <div class="company_cont">
                        <h2>Our Email Address</h2>
                       <ul>
                        <li><a href="mailto:{{ getSettingsData('44', 'subtitle') }}">{{ getSettingsData('44', 'subtitle') }}</a></li>
                        <!-- <li><a href="mailto:yourinfo@gmail.com">yourinfo@gmail.com</a></li> -->
                       </ul>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
      </form>
     </div>
     <!-- map_section -->
     <div class="map_section">
     {!! getSettingsData('44', 'description') !!}
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
