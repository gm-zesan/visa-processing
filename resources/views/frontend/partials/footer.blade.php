<!-- ======= Footer ======= -->
<footer class="footer" data-aos="fade-up"
     data-aos-anchor-placement="center-bottom">
    <div class="container">
        <div class="row">
           <div class="col-lg-3 col-sm-6 footer_first_item pt_40">
                <a href="{{route('home')}}" class="f_logo">
                    <img src="{{ asset(getSettingsData('5', 'image')) }}" alt="Image" class="w-100">
                </a>
                <p>Energistically repurpose standards services into whereas productivate Rapidiously morph best</p>
                <h4>Follow Us</h4>
                <ul>
                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
           </div>
           <div class="col-lg-3 col-sm-6 footer_secoend_item pt_40">
                <h3>Immigration</h3>
                <ul>
                    <li><a href="#"><i class="fa-solid fa-arrow-right"></i>Take IELTS</a></li>
                    <li><a href="#"><i class="fa-solid fa-arrow-right"></i>Sat Coaching</a></li>
                    <li><a href="#"><i class="fa-solid fa-arrow-right"></i>Student Visa</a></li>
                    <li><a href="#"><i class="fa-solid fa-arrow-right"></i>Immigration Visa</a></li>
                    <li><a href="#"><i class="fa-solid fa-arrow-right"></i>Diploma Visa</a></li>
                </ul>
           </div>
           <div class="col-lg-3 col-sm-6 footer_three_item pt_40">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="{{route('about')}}"><i class="fa-solid fa-arrow-right"></i>About Us</a></li>
                    <li><a href="{{route('ourTeam')}}"><i class="fa-solid fa-arrow-right"></i>Our Team</a></li>
                    <li><a href="{{route('blog_list')}}"><i class="fa-solid fa-arrow-right"></i>Our Blog</a></li>
                    <li><a href="{{route('our_service')}}"><i class="fa-solid fa-arrow-right"></i>Our Service</a></li>
                    <li><a href="{{route('contact')}}"><i class="fa-solid fa-arrow-right"></i>Contact Us</a></li>
                </ul>
           </div>
           <div class="col-lg-3 col-sm-6 footer_four_item pt_40">
                <h3>Our Blog</h3>
                @foreach ($commonBlogs as $blog)
                    <div class="footer_galary pb_10">
                        <a href="{{route('single_blog', ['slug'=>$blog->slug])}}">
                            <img src="{{asset($blog->image)}}" alt="Image" class="w-100">
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
        <p>Copyright © 2024 visaDoc all rights reserved.</p>
        <ul>
            <li><a href="{{route('faq')}}">FAQ</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="{{route('our_service')}}">Services</a></li>
        </ul>
        </div>
    </div>
</div>
<!-- back to top -->
<a href="#" class="back-to-top"><i class="fa-solid fa-angle-up"></i></a>