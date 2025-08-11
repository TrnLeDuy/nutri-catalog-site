@extends('layouts.master')

@section('title')
    {{ $page->title }} | @parent
@stop
@section('meta')
    <meta name="title" content="{{ $page->meta_title }}" />
    <meta name="description" content="{{ $page->meta_description }}" />
@stop

@section('content')
    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        @if (!empty($dynamicfields['blog_background']))
        <div class="wt-bnr-inr overlay-wraper bg-center" style="background-image:url({{ app(Modules\Media\Repositories\FileRepository::class)->find($dynamicfields['blog_background'])->path }});">
        @else
        <div class="wt-bnr-inr overlay-wraper bg-center">
        @endif
            <div class="overlay-main site-bg-secondry opacity-07"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <div class="banner-title-outer">
                        <div class="banner-title-name">
                            <h2 class="site-text-primary">{{ $page->title }}</h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->

                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{ route('homepage') }}">{{ __('core.home') }}</a></li>
                            <li>{{ $page->title }}</li>
                            @if (isset($page->subtitle))
                                <li>{{ $page->subtitle }}</li>
                            @endif
                        </ul>
                    </div>

                    <!-- BREADCRUMB ROW END -->
                </div>
            </div>
        </div>
        <!-- INNER PAGE BANNER END -->

        <!-- OUR BLOG START -->
        <div class="section-full  p-t80 p-b50 bg-white">
            <div class="container">
                <!-- BLOG SECTION START -->
                <div class="section-content">
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                            @foreach ($blogs as $blog)
                                @php
                                    $image = $blog->getImageAttribute();
                                @endphp
                                @if ($image != '')
                                    @php
                                        $urlImage = $image->path_string;
                                    @endphp
                                    <div class="blog-post date-style-2">
                                        <div class="wt-post-media wt-img-effect zoom-slow full-radius">
                                            <a href="{{ route('post', $blog->slug) }}"><img class="full-radius" src={{ $urlImage }} alt=""></a>
                                        </div>
                                        <div class="wt-post-info bg-white p-t30">
                                            <div class="wt-post-meta ">
                                                <ul>
                                                    <li class="post-category bottomright-radius"><span class="topleft-radius bottomright-radius"> {{ $blog->categories->first()->title }} </span> </li>
                                                    <li class="post-date">
                                                        @if(App::getLocale() == 'vi')
                                                            Ngày {{ \Carbon\Carbon::parse($blog->created_at)->format('d') }} Tháng {{ \Carbon\Carbon::parse($blog->created_at)->format('m') }}, {{ \Carbon\Carbon::parse($blog->created_at)->format('Y') }}
                                                        @else
                                                            {{ \Carbon\Carbon::parse($blog->created_at)->format('F j, Y') }}
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="wt-post-title ">
                                                <h3 class="post-title"><a href="{{ route('post', $blog->slug) }}"
                                                        class="site-text-secondry">{{ $blog->title }}
                                                    </a></h3>
                                            </div>
                                            <div class="wt-post-readmore ">
                                                <a href="{{ route('post', $blog->slug) }}" class="site-button-link black">{{ __('core.read_more') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                <div class="blog-post date-style-2 blog-without-image">
                                    <div class="wt-post-info bg-white">
                                        <div class="wt-post-meta ">
                                            <ul>
                                                <li class="post-category"><span>{{ $blog->categories->first()->title }}</span> </li>
                                                <li class="post-date">
                                                    @if(App::getLocale() == 'vi')
                                                        Ngày {{ \Carbon\Carbon::parse($blog->created_at)->format('d') }} Tháng {{ \Carbon\Carbon::parse($blog->created_at)->format('m') }}, {{ \Carbon\Carbon::parse($blog->created_at)->format('Y') }}
                                                    @else
                                                        {{ \Carbon\Carbon::parse($blog->created_at)->format('F j, Y') }}
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="wt-post-title ">
                                            <h3 class="post-title"><a href="{{ route('post', $blog->slug) }}"
                                                    class="site-text-secondry">{{ $blog->title }}</a></h3>
                                        </div>
                                        <div class="wt-post-readmore ">
                                            <a href="{{ route('post', $blog->slug) }}" class="site-button-link black">{{ __('core.read_more') }}</a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                            {!! $blogs->links('partials.pagination') !!}
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 rightSidebar  m-b30">
                            <aside class="side-bar">
                                <div class="widget p-a20 full-radius">
                                    <div class="search-bx">
                                        <form method="GET" action="{{ (route('blogs.search')) }}">
                                        <div class="input-group">
                                                <input name="keyword" type="text" class="form-control left-radius" placeholder="{{ __('core.search_blogs') }}...">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn right-radius"><i
                                                            class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="widget recent-posts-entry p-a20 full-radius">
                                    <div class="text-left m-b30">
                                        <h3 class="widget-title">{{ __('core.recent_posts') }}</h3>
                                    </div>
                                    <div class="section-content">
                                        <div class="widget-post-bx">
                                            @foreach ($latestBlogs as $lblog)
                                            <div class="widget-post clearfix">
                                                @php
                                                    $image = $lblog->getImageAttribute();
                                                @endphp 
                                                    @if ($image != '')
                                                    @php
                                                        $urlImage = $image->path_string;
                                                    @endphp
                                                    <div class="wt-post-media">
                                                        <img src="{{ $urlImage }}" alt="">
                                                    </div>
                                                    <div class="wt-post-info">
                                                        <div class="wt-post-header">
                                                            <h6 class="post-title"> <a href="{{ route('post', $lblog->slug) }}">{{ $lblog->title }}</a></h6>
                                                        </div>
                                                        <div class="wt-post-meta">
                                                            <ul>
                                                                <li class="post-author">
                                                                    @if(App::getLocale() == 'vi')
                                                                        Ngày {{ \Carbon\Carbon::parse($lblog->created_at)->format('d') }} Tháng {{ \Carbon\Carbon::parse($lblog->created_at)->format('m') }}, {{ \Carbon\Carbon::parse($lblog->created_at)->format('Y') }}
                                                                    @else
                                                                        {{ \Carbon\Carbon::parse($lblog->created_at)->format('F j, Y') }}
                                                                    @endif
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div class="wt-post-media">
                                                        <img src="{{ Theme::url('images/default/blog/recent-blog/pic1.jpg') }}" alt="">
                                                    </div>
                                                    <div class="wt-post-info">
                                                        <div class="wt-post-header">
                                                            <h6 class="post-title"> <a href="{{ route('post', $lblog->slug) }}">{{ $lblog->title }}</a></h6>
                                                        </div>
                                                        <div class="wt-post-meta">
                                                            <ul>
                                                                <li class="post-author">
                                                                    @if(App::getLocale() == 'vi')
                                                                        Ngày {{ \Carbon\Carbon::parse($lblog->created_at)->format('d') }} Tháng {{ \Carbon\Carbon::parse($lblog->created_at)->format('m') }}, {{ \Carbon\Carbon::parse($lblog->created_at)->format('Y') }}
                                                                    @else
                                                                        {{ \Carbon\Carbon::parse($lblog->created_at)->format('F j, Y') }}
                                                                    @endif
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    @endif
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="widget widget_services p-a20 full-radius">
                                    <div class="text-left m-b30">
                                        <h3 class="widget-title">{{ __('core.categories') }}</h3>
                                    </div>
                                    <ul>
                                        @foreach ($categories as $category)
                                            <li>
                                                <a href="{{ route('category.posts', ['slug' => $category->slug]) }}">
                                                    {{ $category->title }}
                                                </a>
                                                <span class="badge">{{ $category->pages_count }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>                                
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT END -->
@stop
