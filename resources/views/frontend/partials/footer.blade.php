<!-- ======= Footer ======= -->
<footer class="footer" data-aos="fade-up"
     data-aos-anchor-placement="center-bottom">
    <div class="container">
        <div class="row">
           <div class="col-lg-3 col-sm-6 footer_first_item pt_40">
                <a href="{{route('home')}}" class="f_logo">
                    <img src="{{ asset(getSettingsData('5', 'image')) }}" alt="AL FAHIM INTERNATIONAL" style="max-height: 55px; object-fit: contain;" loading="lazy" decoding="async">
                </a>
                <p>AL FAHIM INTERNATIONAL is a government-approved overseas manpower recruitment agency dedicated to providing authentic, legally verified Work Permit Visas.</p>
                <h4>Follow Us</h4>
                <ul>
                    <li><a href="https://www.facebook.com/share/196jqwbpyM/" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="https://twitter.com/" target="_blank" rel="noopener noreferrer" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="https://www.youtube.com/" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
           </div>
           <div class="col-lg-3 col-sm-6 footer_secoend_item pt_40">
                <h3>Destination Countries</h3>
                <ul>
                    @foreach ($commonCountriesVisa as $commonCountryVisa)
                        <li><a href="{{route('country',['id'=>$commonCountryVisa->id])}}"><i class="fa-solid fa-arrow-right"></i>Working in {{$commonCountryVisa->country->name}}</a></li>
                    @endforeach
                </ul>
           </div>
           <div class="col-lg-3 col-sm-6 footer_three_item pt_40">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="{{route('about')}}"><i class="fa-solid fa-arrow-right"></i>About Us</a></li>
                    <li><a href="{{route('apply')}}"><i class="fa-solid fa-arrow-right"></i>Apply Online</a></li>
                    <li><a href="{{route('our_service')}}"><i class="fa-solid fa-arrow-right"></i>Work Permits</a></li>
                    <li><a href="{{route('ourTeam')}}"><i class="fa-solid fa-arrow-right"></i>Our Team</a></li>
                    <li><a href="{{route('contact')}}"><i class="fa-solid fa-arrow-right"></i>Contact Us</a></li>
                </ul>
           </div>
           <div class="col-lg-3 col-sm-6 footer_four_item pt_40">
                <h3>Latest Updates</h3>
                @foreach ($commonBlogs as $blog)
                    <div class="footer_galary pb_10">
                        <a href="{{route('single_blog', ['slug'=>$blog->slug])}}">
                            <img src="{{asset($blog->image)}}" alt="Image" class="w-100" loading="lazy" decoding="async">
                        </a>
                        <div>
                            <h4><a href="{{route('single_blog', ['slug'=>$blog->slug])}}">{{$blog->title}}</a></h4>
                            <p>{{ date('F d, Y', strtotime($blog->created_at)) }}</p>
                        </div>
                    </div>
                @endforeach
           </div>
        </div>
    </div>
</footer>
<!-- footer_bottom -->
<div class="footer_bottom">
    <div class="container">
        <div class="foot_bottom_wrap">
        <p>Copyright © {{ date('Y') }} AL FAHIM INTERNATIONAL. All rights reserved.</p>
        <ul>
            <li><a href="{{route('faq')}}">FAQ</a></li>
            <li><a href="{{route('privacy')}}">Privacy Policy</a></li>
            <li><a href="{{route('termsofuse')}}">Terms of Use</a></li>
        </ul>
        </div>
    </div>
</div>
<!-- back to top -->
<a href="#" class="back-to-top"><i class="fa-solid fa-angle-up"></i></a>