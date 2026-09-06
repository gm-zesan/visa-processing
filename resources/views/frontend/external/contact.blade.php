@extends('frontend.layouts.app')
@section('title')
    Contact Us
@endsection

@section('seo_title')
    {{ getSettingsData('contact-seo', 'title') }}
@endsection

@section('seo_description')
    {{ getSettingsData('contact-seo', 'description') }}
@endsection

@section('seo_keywords')
    {{ getSettingsData('contact-seo', 'keywords') }}
@endsection

@section('seo_image')
    {{ asset(getSettingsData('contact-seo', 'image_1')) }}
@endsection

@push('styles')
    @vite(['resources/scss/frontend/contact.scss'])
@endpush

@section('content')
    @if(session('success'))
        <div style="position: fixed; top: -20px; left: 50%; transform: translate(-50%, -50%); background-image: linear-gradient(to right, #bba574, #967e4a); color: #fff; padding: 5px 15px; border-radius: 5px; display: flex; align-items: center; gap: 10px; opacity: 0"
            id="success-message">
            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512">
                <path fill="#ffffff"
                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
            </svg> {{ session('success') }}
        </div>
    @endif

    <!-- Start contact Section -->
    <section class="contact-wrapper"
        style="background-image: url({{asset(getSettingsData('contact-details', 'image_1'))}});">
        <div class="container">
            <div class="contact-hero">
                <h1>{{getSettingsData('contact-details', 'title')}}</h1>
                <p>{{getSettingsData('contact-details', 'subtitle')}}</p>
            </div>
        </div>
    </section>


    <section class="contact-form-wrapper">
        <div class="container">
            <!-- location and form start-->
            <div class="location-and-form">
                <div class="map">
                    <iframe src="{{getSettingsData('contact-details', 'iframe_link')}}" width="100%" height="590"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="form-div">
                    <h1 class="form-header">{{getSettingsData('contact-details', 'button_text_1')}}</h1>

                    <form action="{{route('message.store')}}" method="POST">
                        @csrf
                        <div>
                            <input type="text" name="first_name" required placeholder="First Name">
                            <input type="text" name="last_name" placeholder="Last Name">
                        </div>
                        <div>
                            <input type="text" name="email" required placeholder="Your Email Here">
                            <input type="text" name="phone" required placeholder="Phone Number">
                        </div>
                        <div>
                            <textarea name="message" cols="30" required
                                placeholder="Write Your Message Here....."></textarea>
                        </div>

                        <div class="form-button">
                            <input type="submit" value="{{getSettingsData('contact-details', 'button_text_2')}}">
                        </div>
                    </form>
                </div>
            </div>
            <!-- location and form end -->
        </div>
    </section>
    <!-- End contact Section -->
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