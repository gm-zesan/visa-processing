@extends('frontend.layouts.app')

@section('title', $blog->title)

@section('seo_description')
{{ Str::limit(strip_tags($blog->description), 160) }}
@endsection

@section('seo_image')
{{ asset($blog->image ?? getSettingsData('5', 'image')) }}
@endsection

@push("styles")
  @vite(['resources/scss/frontend/single_blog.scss'])
  <style>
    main {
      overflow: visible !important;
    }

    .single_blog_wrapp .row {
      align-items: stretch;
    }

    .single_blog_wrapp .col-lg-4 {
      align-self: stretch;
    }

    .choose_top {
      margin-bottom: 0 !important;
    }

    @media (min-width: 992px) {
      .categories_right {
        position: -webkit-sticky !important;
        position: sticky !important;
        top: 150px !important;
        z-index: 99;
        max-height: calc(100vh - 160px);
        overflow-y: auto;
        scrollbar-width: thin;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        border: 1px solid #E2E8F0;
        transition: top 0.25s ease;
      }
    }
  </style>
@endpush

@section('content')

  @if(session('success'))
    <div
      style="position: fixed; top: -20px; left: 50%; transform: translate(-50%, -50%); background-color: #fff; color: #111A3A; padding: 5px 15px; border-radius: 5px; display: flex; align-items: center; gap: 10px; opacity: 1; z-index: 1025"
      id="success-message">
      <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512">
        <path fill="#111A3A"
          d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
      </svg> {{ session('success') }}
    </div>
  @endif

  <!-- contact_page_area -->
  <div class="contact_page_area"
    style="background-image: url({{ asset(getSettingsData('45', 'image') ?? 'frontend/images/contact_bg.jpg') }});">
    <div class="container">
      <div class="contact_wrapper">
        <h2>{{ $blog->title }}</h2>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
            <li class="breadcrumb-item"><a href="{{ route('blog_list') }}">RESOURCES & NEWS</a></li>
            <li class="breadcrumb-item active">{{ $blog->category->name ?? 'Article' }}</li>
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
          <article class="single_blog_left">
            <div class="article_featured_box">
              <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="w-100" loading="lazy" decoding="async">
              @if($blog->category)
                <span class="article_category_tag">{{ $blog->category->name }}</span>
              @endif
            </div>
            <div class="single_blog_cont">
              <h1 class="article_main_title">{{ $blog->title }}</h1>
              <div class="blog-meta-bar">
                <span class="meta-item"><i class="fa-regular fa-user"></i>
                  {{ $blog->created_by ?? 'AL FAHIM Editorial Team' }}</span>
                <span class="meta-dot">&bull;</span>
                <span class="meta-item"><i class="fa-regular fa-calendar"></i>
                  {{ date('F d, Y', strtotime($blog->created_at)) }}</span>
                <span class="meta-dot">&bull;</span>
                <span class="meta-item"><i class="fa-regular fa-clock"></i> 5 Min Read</span>
              </div>

              <div class="article_body_content">
                {!! $blog->description !!}
              </div>

              <!-- Official Advisory & Job Application CTA -->
              <div class="article_footer_box">
                <div class="agency_notice">
                  <div class="notice_icon"><i class="fa-solid fa-shield-halved"></i></div>
                  <div class="notice_text">
                    <h5>Government Approved Recruitment Advisory</h5>
                    <p>AL FAHIM INTERNATIONAL is a certified Overseas Manpower Agency. All work permits, bio-medical
                      clearances, and employer agreements are processed through official government portals with
                      guaranteed BMET Emigration Smart Card issuance. Protect your future from unaccredited middlemen.</p>
                  </div>
                </div>

                <div class="article_action_cta">
                  <div class="cta_text">
                    <h4>Looking for Overseas Job Opportunities?</h4>
                    <p>Apply online today to be matched with verified employer quotas across Saudi Arabia, UAE, Maldives,
                      Malaysia, and Romania.</p>
                  </div>
                  <a href="{{ route('apply') }}" class="btn_apply_now">
                    <span>Apply Online Now</span>
                    <i class="fa-solid fa-arrow-right-long"></i>
                  </a>
                </div>
              </div>

              <!-- Social Share & Return Link -->
              <div class="article_share_bar">
                <div class="share_left">
                  <span class="share_title"><i class="fa-solid fa-share-nodes"></i> Share Guide:</span>
                  <div class="share_buttons">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                      target="_blank" class="share_btn fb" title="Share on Facebook"><i
                        class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($blog->title) }}&url={{ urlencode(url()->current()) }}"
                      target="_blank" class="share_btn tw" title="Share on Twitter"><i
                        class="fa-brands fa-x-twitter"></i></a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($blog->title) }}"
                      target="_blank" class="share_btn in" title="Share on LinkedIn"><i
                        class="fa-brands fa-linkedin-in"></i></a>
                    <a href="https://wa.me/?text={{ urlencode($blog->title . ' ' . url()->current()) }}" target="_blank"
                      class="share_btn wa" title="Share on WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                  </div>
                </div>
                <div class="share_right">
                  <a href="{{ route('blog_list') }}" class="btn_back_to_news">
                    <i class="fa-solid fa-arrow-left-long"></i>
                    <span>All News & Updates</span>
                  </a>
                </div>
              </div>
            </div>
          </article>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4 mt_50">
          <div class="search_box_single">
            <form action="{{ route('blog_list') }}" method="GET">
              <input type="text" name="search" placeholder="Search Here">
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
                <li class="{{ $blog->category_id == $category->id ? 'active' : '' }}">
                  <a href="{{ route('blog_filter', ['category' => $category->id]) }}"
                    style="{{ $blog->category_id == $category->id ? 'color: #b58105; font-weight: 600;' : '' }}">
                    <span>{{ $category->name }}</span>
                    <i class="fa-solid fa-angle-right"></i>
                  </a>
                </li>
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
      const successMsg = document.getElementById('success-message');
      if (successMsg) {
        successMsg.style.opacity = 1;
        successMsg.style.top = '30px';
        successMsg.style.transition = 'all 0.3s ease-in-out';
        setTimeout(() => {
          successMsg.style.opacity = 0;
          successMsg.style.top = '-20px';
          successMsg.style.transition = 'all 0.3s ease-in-out';
        }, 3000);
      }
    }, 100);
  </script>
@endpush