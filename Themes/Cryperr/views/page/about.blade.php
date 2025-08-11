@extends('layouts.master')

@section('title')
    {{ $page->title }} | @parent
@stop

@section('meta')
    <meta name="title" content="{{ $page->meta_title }}" />
    <meta name="description" content="{{ $page->meta_description }}" />
@stop

@section('content')
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        @if (!empty($dynamicfields['about_us_background']))
            <div class="wt-bnr-inr overlay-wraper bg-center"
                style="background-image:url({{ app(Modules\Media\Repositories\FileRepository::class)->find($dynamicfields['about_us_background'])->path }});">
            @else
                <div class="wt-bnr-inr overlay-wraper bg-center"
                    style="background-image:url({{ Theme::url('images/default/banner/3.jpg') }});">
        @endif
        <div class="overlay-main site-bg-secondry opacity-09"></div>
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
                    </ul>
                </div>

                <!-- BREADCRUMB ROW END -->
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->

    <!-- SERVICES SECTION START -->
    @if (!empty($dynamicfields['services_background']))
        <div class="section-full p-t80 p-b50 bg-gray bg-cover"
            style="background-image:url({{ app(Modules\Media\Repositories\FileRepository::class)->find($dynamicfields['services_background'])->path }});">
        @else
            <div class="section-full p-t80 p-b50 bg-gray bg-cover"
                style="background-image:url({{ Theme::url('images/default/background/bg-12.jpg') }});">
    @endif
    <div class="container">
        <!-- TITLE START-->
        <div class="section-head center wt-small-separator-outer text-center">
            <div class="wt-small-separator site-text-primary">
                <div class="sep-leaf-left"></div>
                @if (!empty($dynamicfields['service_welcome_title']))
                    <div>{{ $dynamicfields['service_welcome_title'] }}</div>
                @else
                    <div>Welcome to Industro</div>
                @endif
                <div class="sep-leaf-right"></div>
            </div>
            @if (!empty($dynamicfields['service_welcome_context']))
                <h2>{{ $dynamicfields['service_welcome_context'] }}</h2>
            @else
                <h2>Professional Gardening, Landscaping Services By Industro</h2>
            @endif
        </div>
        <!-- TITLE END-->

        <div class="section-content">
            <div class="owl-carousel h3-project-slider  mfp-gallery">
                @if (!empty($dynamicfields['service_card']))
                    @foreach ($dynamicfields['service_card'] as $key => $item)
                        <div class="item">
                            <div class="line-filter-outer">
                                <div class="line-filter-media">
                                    <img class="top-radius"
                                        src="{{ app(Modules\Media\Repositories\FileRepository::class)->find($item['thumbnail'])->path }}"
                                        alt="">
                                    <div class="hover-effect-1">
                                        <div class="hover-effect-content text-white">
                                            <h3 class="m-tb0 h-category topleft-radius">{{ $item['short_title'] }}</h3>
                                            <p>{{ $item['context'] }}</p>
                                            <a href="{{ app(Modules\Media\Repositories\FileRepository::class)->find($item['thumbnail_hover'])->path }}"
                                                class="mfp-link full-radius"><i class="fa fa-search-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="line-filter  bg-white p-a30">
                                    <div class="filter-content">
                                        <h3 class="m-t0 m-b20 text-uppercase">{{ $item['title'] }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="item">
                        <div class="line-filter-outer">
                            <div class="line-filter-media">
                                <img class="top-radius"
                                    src="{{ Theme::url('images/default/gallery/portrait-3/pic1.jpg') }}" alt="">
                                <div class="hover-effect-1">
                                    <div class="hover-effect-content text-white">
                                        <h3 class="m-tb0 h-category topleft-radius">Shrub Care</h3>
                                        <p>Lorem ipsum dolor sit amet,tetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua.</p>
                                        <a href="{{ Theme::url('images/default/gallery/portrait-2/pic1.jpg') }}"
                                            class="mfp-link full-radius"><i class="fa fa-search-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="line-filter  bg-white p-a30">
                                <div class="filter-content">
                                    <h3 class="m-t0 m-b20 text-uppercase">Tree & Shrub Care</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="line-filter-outer">
                            <div class="line-filter-media">
                                <img class="top-radius"
                                    src="{{ Theme::url('images/default/gallery/portrait-3/pic1.jpg') }}" alt="">
                                <div class="hover-effect-1">
                                    <div class="hover-effect-content text-white">
                                        <h3 class="m-tb0 h-category topleft-radius">Shrub Care</h3>
                                        <p>Lorem ipsum dolor sit amet,tetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua.</p>
                                        <a href="{{ Theme::url('images/default/gallery/portrait-2/pic1.jpg') }}"
                                            class="mfp-link full-radius"><i class="fa fa-search-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="line-filter  bg-white p-a30">
                                <div class="filter-content">
                                    <h3 class="m-t0 m-b20 text-uppercase">Tree & Shrub Care</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="line-filter-outer">
                            <div class="line-filter-media">
                                <img class="top-radius"
                                    src="{{ Theme::url('images/default/gallery/portrait-3/pic1.jpg') }}" alt="">
                                <div class="hover-effect-1">
                                    <div class="hover-effect-content text-white">
                                        <h3 class="m-tb0 h-category topleft-radius">Shrub Care</h3>
                                        <p>Lorem ipsum dolor sit amet,tetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua.</p>
                                        <a href="{{ Theme::url('images/default/gallery/portrait-2/pic1.jpg') }}"
                                            class="mfp-link full-radius"><i class="fa fa-search-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="line-filter  bg-white p-a30">
                                <div class="filter-content">
                                    <h3 class="m-t0 m-b20 text-uppercase">Tree & Shrub Care</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
    </div>
    <!-- SERVICES SECTION  SECTION END -->

    <!-- VIDEO SECTION START -->
    <div class="section-full video-counter-section bg-gray">
        @if (!empty($dynamicfields['value_background']))
            <div class="video-counter-bg-image overlay-wraper bg-cover bg-no-repeat"
                style="background-image:url({{ app(Modules\Media\Repositories\FileRepository::class)->find($dynamicfields['value_background'])->path }}">
            @else
                <div class="video-counter-bg-image overlay-wraper bg-cover bg-no-repeat"
                    style="background-image:url({{ Theme::url('images/default//background/bg-15.jpg') }})">
        @endif
        <div class="overlay-main site-bg-secondry opacity-05"></div>

        <div class="container">
            <div class="counter-section-outer-top">
                <div class="counter-outer">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-3 m-b30 ">
                            <div class="wt-icon-box-wraper center">
                                @if (!empty($dynamicfields['value_1']))
                                    <h2 class="counter site-text-primary">{{ $dynamicfields['value_1'] }}</h2>
                                @else
                                    <h2 class="counter site-text-primary">0</h2>
                                @endif
                                @if (!empty($dynamicfields['value_1_title']))
                                <span class="site-text-white title-style-2">{{ $dynamicfields['value_1_title'] }}</span>
                                @else
                                    <span class="site-text-white title-style-2">Projects Completed</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 m-b30">
                            <div class="wt-icon-box-wraper center">
                                @if (!empty($dynamicfields['value_2']))
                                    <h2 class="counter site-text-primary">{{ $dynamicfields['value_2'] }}</h2>
                                @else
                                    <h2 class="counter site-text-primary">0</h2>
                                @endif
                                @if (!empty($dynamicfields['value_2_title']))
                                    <span class="site-text-white title-style-2">{{ $dynamicfields['value_2_title'] }}</span>
                                @else
                                    <span class="site-text-white title-style-2">Work Employed</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 m-b30">
                            <div class="wt-icon-box-wraper center">
                                @if (!empty($dynamicfields['value_3']))
                                    <h2 class="counter site-text-primary">{{ $dynamicfields['value_3'] }}</h2>
                                @else
                                    <h2 class="counter site-text-primary">0</h2>
                                @endif
                                @if (!empty($dynamicfields['value_3_title']))
                                    <span class="site-text-white title-style-2">{{ $dynamicfields['value_3_title'] }}</span>
                                @else
                                    <span class="site-text-white title-style-2">Work facilities</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 m-b30">
                            <div class="wt-icon-box-wraper center">
                                @if (!empty($dynamicfields['value_4']))
                                    <h2 class="counter site-text-primary">{{ $dynamicfields['value_4'] }}</h2>
                                @else
                                    <h2 class="counter site-text-primary">0</h2>
                                @endif
                                @if (!empty($dynamicfields['value_4_title']))
                                    <span class="site-text-white title-style-2">{{ $dynamicfields['value_4_title'] }}</sp>
                                @else
                                    <span class="site-text-white title-style-2">Year Experienced</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- VIDEO SECTION  SECTION END -->

    <!-- OUR TEAM START -->
    <div class="section-full p-t80 p-b50 bg-white team-bg-section-outer">
        <div class="container">
            <div class="section-content">

                <!-- TITLE START-->
                <div class="section-head center wt-small-separator-outer text-center">
                    <div class="wt-small-separator site-text-primary">
                        <div class="sep-leaf-left"></div>
                        @if (!empty($dynamicfields['team_section']))
                            <div>{{ $dynamicfields['team_section'] }}</div>
                        @else
                            <div>Our Experts</div>
                        @endif
                        <div class="sep-leaf-right"></div>
                    </div>
                    @if (!empty($dynamicfields['team_section_title']))
                        <h2>{{ $dynamicfields['team_section_title'] }}</h2>
                    @else
                        <h2>We will serve you with the best of our capacity by expert team</h2>
                    @endif
                </div>
                <!-- TITLE END-->

                <div class="section-content">
                    <div class="row justify-content-center">
                        @if (!empty($dynamicfields['team_member_card']))
                            @foreach ($dynamicfields['team_member_card'] as $key => $item)
                                <div class="col-lg-4 col-md-6 col-sm-12 m-b30">
                                    <div class="wt-team-1">
                                        <div class="wt-media">
                                            @if (!empty($item['member_avt']))
                                                <img src="{{ app(Modules\Media\Repositories\FileRepository::class)->find($item['member_avt'])->path }}"
                                                    alt="" class="full-radius">
                                            @else
                                                <img class="full-radius"
                                                    src={{ Theme::url('images/default/team-5/pic1.jpg') }} alt="">
                                            @endif
                                            <div class="team-social-center full-radius">
                                                <ul class="team-social-bar">
                                                    @if (!empty($item['member_facebook']))
                                                        <li><a href="{{ $item['member_facebook'] }}"><i
                                                                    class="fa fa-facebook"></i></a></li>
                                                    @else
                                                        <li><a href="javascript:void(0);"><i
                                                                    class="fa fa-facebook"></i></a></li>
                                                    @endif
                                                    @if (!empty($item['member_twitter']))
                                                        <li><a href="{{ $item['member_twitter'] }}"><i
                                                                    class="fa fa-twitter"></i></a></li>
                                                    @else
                                                        <li><a href="javascript:void(0);"><i
                                                                    class="fa fa-twitter"></i></a></li>
                                                    @endif
                                                    @if (!empty($item['member_instagram']))
                                                        <li><a href="{{ $item['member_instagram'] }}"><i
                                                                    class="fa fa-instagram"></i></a></li>
                                                    @else
                                                        <li><a href="javascript:void(0);"><i
                                                                    class="fa fa-instagram"></i></a></li>
                                                    @endif
                                                    @if (!empty($item['member_linkedin']))
                                                        <li><a href="{{ $item['member_linkedin'] }}"><i
                                                                    class="fa fa-linkedin"></i></a></li>
                                                    @else
                                                        <li><a href="javascript:void(0);"><i
                                                                    class="fa fa-linkedin"></i></a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="wt-info p-a30 bg-gray full-radius">
                                            <div class="team-detail  text-center">
                                                <h3 class="m-t0 team-name">
                                                    @if (!empty($item['member_name']))
                                                        <a class="site-text-secondry">{{ $item['member_name'] }}</a>
                                                    @else
                                                        <a class="site-text-secondry">Malcolm Franzcrip</a>
                                                    @endif
                                                </h3>
                                                @if (!empty($item['member_job']))
                                                    <span
                                                        class="title-style-2 team-position site-text-primary">{{ $item['member_job'] }}</span>
                                                @else
                                                    <span
                                                        class="title-style-2 team-position site-text-primary">Contractor</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-lg-4 col-md-6 col-sm-12 m-b30">
                                <div class="wt-team-1">
                                    <div class="wt-media">
                                        <img class="full-radius" src={{ Theme::url('images/default/team-5/pic1.jpg') }}
                                            alt="">
                                        <div class="team-social-center full-radius">
                                            <ul class="team-social-bar">
                                                <li><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="javascript:void(0);"><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="wt-info p-a30 bg-gray full-radius">
                                        <div class="team-detail  text-center">
                                            <h3 class="m-t0 team-name"><a href="team-single.html"
                                                    class="site-text-secondry">Malcolm Franzcrip</a></h3>
                                            <span class="title-style-2 team-position site-text-primary">Contractor</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- OUR TEAM SECTION END -->

    <!-- CLIENT LOGO SECTION START -->
    @if (!empty($dynamicfields['client_logo_section']))
        <div class="section-full bg-gray">
            <div class="container">
                <div class="section-content">
                    <!-- TESTIMONIAL 4 START ON BACKGROUND -->
                    <div class="section-content">
                        <div class="section-content p-tb30 owl-btn-vertical-center">
                            <div class="owl-carousel home-client-carousel-2">
                                @foreach ($dynamicfields['client_logo_section'] as $key => $item)
                                    @if (!empty($item['client_logo']))
                                        <div class="item">
                                            <div class="ow-client-logo">
                                                <div class="client-logo client-logo-media">
                                                    <a href="javascript:void(0);"><img
                                                            src={{ app(Modules\Media\Repositories\FileRepository::class)->find($item['client_logo'])->path }}
                                                            alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- CLIENT LOGO  SECTION End -->
    </div>

    </div>
@stop
