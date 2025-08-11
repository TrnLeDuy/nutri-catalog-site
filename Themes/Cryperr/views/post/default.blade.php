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
                            <li><a href="/{{__('page::pages.routes.blogs-prefix')}}">{{ __('core.blogs') }}</a></li>
                            <li>{{ $page->title }}</li>
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
                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 m-b30">
                            <!-- BLOG START -->
                            @php
                                $image = $page->getImageAttribute();
                            @endphp
                            @if ($image != '')
                                @php
                                    $urlImage = $image->path_string;
                                @endphp
                                <div class="blog-post date-style-2 blog-lg">
                                    <div class="wt-post-media wt-img-effect zoom-slow full-radius">
                                        <a href="javascript:;"><img class="full-radius" src={{ $urlImage }}
                                                alt=""></a>
                                    </div>
                                    <div class="wt-post-info  bg-white p-t30">
                                        <div class="wt-post-meta ">
                                            <ul>
                                                <li class="post-category bottomright-radius"><span
                                                        class="topleft-radius bottomright-radius">{{ $page->categories->first()->title }}
                                                    </span> </li>
                                                <li class="post-date">
                                                    @if(App::getLocale() == 'vi')
                                                        Ngày {{ \Carbon\Carbon::parse($page->created_at)->format('d') }} Tháng {{ \Carbon\Carbon::parse($page->created_at)->format('m') }}, {{ \Carbon\Carbon::parse($page->created_at)->format('Y') }}
                                                    @else
                                                        {{ \Carbon\Carbon::parse($page->created_at)->format('F j, Y') }}
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="wt-post-title ">
                                            <h2 class="post-title">{{ $page->title }}</h2>
                                        </div>
                                    @else
                                        <div class="blog-post date-style-2 blog-lg">
                                            <div class="wt-post-info  bg-white p-t30">
                                                <div class="wt-post-title ">
                                                    <h2 class="post-title">{{ $page->title }}</h2>
                                                </div>
                                                <div class="wt-post-meta ">
                                                    <ul>
                                                        <li class="post-date">
                                                            @if(App::getLocale() == 'vi')
                                                                Ngày {{ \Carbon\Carbon::parse($page->created_at)->format('d') }} Tháng {{ \Carbon\Carbon::parse($page->created_at)->format('m') }}, {{ \Carbon\Carbon::parse($page->created_at)->format('Y') }}
                                                            @else
                                                                {{ \Carbon\Carbon::parse($page->created_at)->format('F j, Y') }}
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </div>
                            @endif
                            <div class="wt-post-text">
                                {!! $page->body !!}
                            </div>
                        </div>
                    </div>
                    <div class="widget bg-white  widget_tag_cloud">
                        <h4 class="tagcloud">{{ __('core.tags') }}</h4>
                        @if ($tags)
                            <div class="tagcloud">
                                @foreach ($tags as $tag)
                                    <a class="full-radius" href="javascript:void(0);">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- SIDE BAR START -->
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 rightSidebar  m-b30">
                    <aside class="side-bar">
                        <!-- RECENT POSTS -->
                        <div class="widget recent-posts-entry p-a20 full-radius">
                            <div class="text-left m-b30">
                                <h3 class="widget-title">{{ __('core.related_posts') }}</h3>
                            </div>
                            <div class="section-content">
                                <div class="widget-post-bx">
                                    @foreach ($relatedBlogs as $relatedBlog)
                                        @php
                                            $image = $relatedBlog->getImageAttribute();
                                            $urlImage = Theme::url('images/default/blog/recent-blog/pic1.jpg');
                                            if ($image != '') {
                                                $urlImage = $image->path_string;
                                            }
                                        @endphp
                                        <div class="widget-post clearfix">
                                            <div class="wt-post-media">
                                                <img src="{{ $urlImage }}" alt="">
                                            </div>
                                            <div class="wt-post-info">
                                                <div class="wt-post-header">
                                                    <h6 class="post-title"> <a href="{{ route('page', $relatedBlog->slug) }}">{{ $relatedBlog->title }}</a></h6>
                                                </div>
                                                <div class="wt-post-meta">
                                                    <ul>
                                                        <li class="post-author">
                                                            @if(App::getLocale() == 'vi')
                                                                Ngày {{ \Carbon\Carbon::parse($relatedBlog->created_at)->format('d') }} Tháng {{ \Carbon\Carbon::parse($relatedBlog->created_at)->format('m') }}, {{ \Carbon\Carbon::parse($relatedBlog->created_at)->format('Y') }}
                                                            @else
                                                                {{ \Carbon\Carbon::parse($relatedBlog->created_at)->format('F j, Y') }}
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- CATEGORY -->
                        <div class="widget widget_services p-a20 full-radius">
                            <div class="text-left m-b30">
                                <h3 class="widget-title">{{ __('core.related_categories') }}</h3>
                            </div>
                            <ul>
                                @foreach ($categories as $category)
                                <li><a href="{{ route('category.posts', ['slug' => $category->slug]) }}">{{ $category->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>

                </div>
                <!-- SIDE BAR END -->


            </div>

        </div>

    </div>

    </div>
    <!-- OUR BLOG END -->
    </div>
@stop
