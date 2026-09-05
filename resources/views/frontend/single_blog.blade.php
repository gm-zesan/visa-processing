@extends('frontend.layouts.app')

@section('title')
single Blog
@endsection

@push("styles")

@vite(['resources/scss/frontend/single_blog.scss'])
{{-- @vite(['resources/scss/frontend/single_blog-dark.scss']) --}}
@endpush


@section('content')

  @if(session('success'))
          <div style="position: fixed; top: -20px; left: 50%; transform: translate(-50%, -50%); background-color: #fff; color: #111A3A; padding: 5px 15px; border-radius: 5px; display: flex; align-items: center; gap: 10px; opacity: 1; z-index: 1025" id="success-message">
              <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><path fill="#111A3A" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> {{ session('success') }}
          </div>
      @endif
    <!-- contact_page_area -->
    <div class="contact_page_area" style="background-image: url({{asset('frontend/images/contact_bg.jpg')}});">
        <div class="container">
            <div class="contact_wrapper">
                <h2>{{$blog->title}}</h2>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">HOME</a></li>
                    <li class="breadcrumb-item active">{{$blog->title}}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- single_blog_area -->
    <div class="single_blog_wrapp">
        <div class="container">
          <div class="row row_gutters">
            <div class="col-lg-8 mt_50">
              <div class="single_blog_left">
                <img src="{{asset($blog->image)}}" alt="Image" class="w-100">
                <div class="single_blog_cont">
                  <h2>{{$blog->title}}</h2>
                  <div class="blog-meta-left">
                        <a href="#"> {{$blog->created_by}}</a>	
                        <span>- {{ date('F d, Y', strtotime($blog->created_at)) }} -</span>
                        {{-- <a href="#">0 Comments</a> --}}
					</div>
                  {!! $blog->description !!}
                  <div class="blog_border"></div>
                </div>
              </div>
              <!-- Leave_Comment_area -->
              <div class="leave_comment_area">
                <div class="choose_top">
                    <h2>Get In Touch</h2>
                    <div class="em_bar_bg"></div>
                </div>
              </div>
              <div class="single_form_area">
                <form action="{{route('message.store')}}" method="POST">
                @csrf
                  <div class="row row_gutters">
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
                      <input type="text" name="subject" placeholder="Your Subject">
                    </div>
                    <div class="col-lg-12">
                      <textarea name="message" placeholder="Message"></textarea>
                    </div>
                    <div class="col-lg-6">
                      <button type="submit" class="button">Send Request</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-4 mt_50">
              <div class="search_box_single">
                <form action="#">
                  <input type="text" placeholder="Search Here">
                  <button type="submit" class="submit_box"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
              </div>
              <div class="categories_right">
                <div class="choose_top">
                    <h2>Categories</h2>
                    <div class="em_bar_bg"></div>
                </div>
                <ul>
                    @foreach ($categories as $category)
                        <li><a href="{{route('blog_filter', ['category'=>$category->id])}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
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
