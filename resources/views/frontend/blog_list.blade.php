@extends('frontend.layouts.app')

@section('title')
    Blog List
@endsection

@push("styles")
    @vite(['resources/scss/frontend/blog_list.scss'])
    <style>
        main {
            overflow: visible !important;
        }

        .blog_list_wrappers .row {
            align-items: stretch;
        }

        .blog_list_wrappers .col-lg-4 {
            align-self: stretch;
        }

        .choose_top {
            margin-bottom: 0 !important;
        }

        @media (min-width: 992px) {
            .categories_right {
                position: -webkit-sticky !important;
                position: sticky !important;
                top: 130px !important;
                z-index: 99;
                max-height: calc(100vh - 140px);
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
    <!-- contact_page_area -->
    <div class="contact_page_area" style="background-image: url({{ asset(getSettingsData('45', 'image')) }});">
        <div class="container">
            <div class="contact_wrapper">
                <h2>{{ getSettingsData('45', 'title') }}</h2>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">HOME</a></li>
                        <li class="breadcrumb-item active">{{ getSettingsData('45', 'title') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- single_blog_area -->
    <div class="blog_list_wrappers">
        <div class="container">
            <div class="row row_gutters">
                <div class="col-lg-8 mt_50">

                    @foreach ($blogs as $blog)

                        <div class="resources_card mb_30">
                            <a href="{{route('single_blog', ['slug' => $blog->slug])}}" class="resources_img">
                                <div class="student_top">{{$blog->category->name ?? 'News'}}</div>
                                <img src="{{asset($blog->image)}}" alt="Image" class="w-100" loading="lazy" decoding="async">
                            </a>
                            <div class="resources_cont">
                                <div class="visapro-blog-meta-left ">
                                    <a href="#">{{$blog->created_by}}</a>
                                    <span>{{ date('F d, Y', strtotime($blog->created_at)) }}</span>
                                </div>
                                <h2><a href="{{route('single_blog', ['slug' => $blog->slug])}}">{{$blog->title}}</a></h2>

                                {!! Str::limit($blog->description, 200, '...') !!}
                            </div>
                        </div>
                    @endforeach


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
                                <li class="{{ request()->route('category') == $category->id ? 'active' : '' }}">
                                    <a href="{{route('blog_filter', ['category' => $category->id])}}"
                                        style="{{ request()->route('category') == $category->id ? 'color: #b58105; font-weight: 600;' : '' }}">
                                        {{$category->name}}
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