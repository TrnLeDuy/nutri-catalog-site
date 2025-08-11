@extends('layouts.master')

@section('title')
    {{ $page->title }} | @parent
@stop

@section('meta')
    <meta name="title" content="{{ $page->meta_title }}" />
    <meta name="description" content="{{ $page->meta_description }}" />
@stop

@php
    // dd($dynamicfields);
    // @inject('fileService', 'Modules\Media\Repositories\FileRepository');

    // $file = app(Modules\Media\Repositories\FileRepository::class)->find($dynamicfields['home_01_image'])->path;
    // dd($file);
@endphp

@section('content')
    <div class="slider-outer">

        <div id="welcome_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="goodnews-header"
            data-source="gallery" style="background:#eeeeee;padding:0px;">
            <div id="welcome" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.3.1">
                <ul>
                    @if (!empty($dynamicfields['header_slider']))
                        @foreach ($dynamicfields['header_slider'] as $key => $item)
                            <li data-index="rs-901" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                                data-hideslideonmobile="off" data-easein="default" data-easeout="default"
                                data-masterspeed="default"
                                data-thumb="{{ app(Modules\Media\Repositories\FileRepository::class)->find($item['slider'])->path }}"
                                data-rotate="0" data-fstransition="fade" data-fsmasterspeed="300" data-fsslotamount="7"
                                data-saveperformance="off" data-title="Slide Title" data-param1="Additional Text"
                                data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7=""
                                data-param8="" data-param9="" data-param10="" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="{{ app(Modules\Media\Repositories\FileRepository::class)->find($item['slider'])->path }}"
                                    alt=""
                                    data-lazyload="{{ app(Modules\Media\Repositories\FileRepository::class)->find($item['slider'])->path }}"
                                    data-bgposition="center center" data-bgfit="cover" data-bgparallax="4"
                                    class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->
                            </li>
                        @endforeach
                    @else
                        <li data-index="rs-901" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                            data-hideslideonmobile="off" data-easein="default" data-easeout="default"
                            data-masterspeed="default" data-thumb="images/main-slider/slider5/slide1.jpg" data-rotate="0"
                            data-fstransition="fade" data-fsmasterspeed="300" data-fsslotamount="7"
                            data-saveperformance="off" data-title="Slide Title" data-param1="Additional Text" data-param2=""
                            data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                            data-param9="" data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="{{ Theme::url('images/default/main-slider/slider5/slide1.jpg') }}" alt=""
                                data-lazyload="images/main-slider/slider5/slide1.jpg" data-bgposition="center center"
                                data-bgfit="cover" data-bgparallax="4" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->
                        </li>
                        <li data-index="rs-901" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                            data-hideslideonmobile="off" data-easein="default" data-easeout="default"
                            data-masterspeed="default" data-thumb="images/main-slider/slider5/slide1.webp" data-rotate="0"
                            data-fstransition="fade" data-fsmasterspeed="300" data-fsslotamount="7"
                            data-saveperformance="off" data-title="Slide Title" data-param1="Additional Text" data-param2=""
                            data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                            data-param9="" data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="{{ Theme::url('images/default/main-slider/slider5/slide1.webp') }}" alt=""
                                data-lazyload="images/main-slider/slider5/slide1.webp" data-bgposition="center center"
                                data-bgfit="cover" data-bgparallax="4" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->
                        </li>
                        <li data-index="rs-901" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                            data-hideslideonmobile="off" data-easein="default" data-easeout="default"
                            data-masterspeed="default" data-thumb="images/main-slider/slider5/slide2.webp"
                            data-rotate="0" data-fstransition="fade" data-fsmasterspeed="300" data-fsslotamount="7"
                            data-saveperformance="off" data-title="Slide Title" data-param1="Additional Text"
                            data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7=""
                            data-param8="" data-param9="" data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="{{ Theme::url('images/default/main-slider/slider5/slide2.webp') }}" alt=""
                                data-lazyload="images/main-slider/slider5/slide2.webp" data-bgposition="center center"
                                data-bgfit="cover" data-bgparallax="4" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->
                        </li>
                        <li data-index="rs-901" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                            data-hideslideonmobile="off" data-easein="default" data-easeout="default"
                            data-masterspeed="default" data-thumb="images/main-slider/slider5/slide3.webp"
                            data-rotate="0" data-fstransition="fade" data-fsmasterspeed="300" data-fsslotamount="7"
                            data-saveperformance="off" data-title="Slide Title" data-param1="Additional Text"
                            data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7=""
                            data-param8="" data-param9="" data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="{{ Theme::url('images/default/main-slider/slider5/slide3.webp') }}" alt=""
                                data-lazyload="images/main-slider/slider5/slide3.webp" data-bgposition="center center"
                                data-bgfit="cover" data-bgparallax="4" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->
                        </li>
                    @endif
                </ul>
                <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
            </div>
        </div>

    </div>
    <!-- SLIDER END -->

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
                                        src="{{ app(Modules\Media\Repositories\FileRepository::class)->find($item['thumbnail'])->path }}" alt="">
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
                style="background-image:url({{ app(Modules\Media\Repositories\FileRepository::class)->find($dynamicfields['value_background'])->path }})">
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

    <!-- ALL PROJECTS START -->
    <div class="section-full p-t80 p-b40">
        <div class="container">
            <div class="section-content">
                @php
                    if (!isset($categories)) {
                        $categories = getHomepageCategory(3);
                    }
                @endphp
                @foreach ($categories as $category)
                    @if ($category->products_count > 0)
                        <div class="wt-separator-two-part">
                            <div class="row wt-separator-two-part-row">
                                <div class="col-lg-8 col-md-7 wt-separator-two-part-left">
                                    <!-- TITLE START-->
                                    <div class="section-head left wt-small-separator-outer">
                                        <h2>{{ $category->title }}</h2>
                                    </div>
                                    <!-- TITLE END-->
                                </div>

                                <div class="col-lg-4 col-md-5 wt-separator-two-part-right text-right">
                                    <a href="{{ route('fe.product.product.category', ['slug' => $category->slug]) }}"
                                        class="site-button site-btn-effect full-radius">{{ __('core.more_detail') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            @php
                                $products = getProductHomepageByCategory($category->id, 3);
                            @endphp
                            @foreach ($products as $product)
                                @php
                                    $image = $product->getAvatar();
                                    if ($image != '') {
                                        $urlImage = $image->path_string;
                                    } else {
                                        $urlImage = Theme::url('images/default/project_3/pic2.jpg');
                                    }
                                @endphp
                                <div class="col-lg-4 col-md-6 col-sm-12 m-b50">
                                    <div class="wt-box service-box-2 bg-white">
                                        {{-- <div class="service-box-2-media m-b20"> --}}
                                        <div class="m-b20" style="text-align: center;">
                                            <img class="full-radius" style="height: 30vh;"
                                                src={{ $urlImage }} alt="">
                                        </div>
                                        <div class="service-box-title title-style-2 site-text-secondry">
                                            <span class="s-title-one">{{ Str::limit($product->title, 55, '...') }}</span>
                                            <span class="s-title-two"></span>
                                        </div>
                                        <div class="service-box2-content">
                                            <p class="description-clamp">{{ $product->og_description }}</p>
                                            <a href="{{ route('fe.product.product.detail', ['slug' => $product->slug]) }}" class="site-button-link">{{ __('core.read_more') }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- ALL PROJECTS SECTION END -->

    <!-- TESTIMONIAL SECTION START -->
    @if (!empty($dynamicfields['comment_background']))
        <div class="section-full  p-t80 p-b50 bg-no-repeat bg-center bg-gray"
            style="background-image:url({{ app(Modules\Media\Repositories\FileRepository::class)->find($dynamicfields['comment_background'])->path }})">
        @else
            <div class="section-full  p-t80 p-b50 bg-no-repeat bg-center bg-gray"
                style="background-image:url({{ Theme::url('images/default/background/bg-13.jpg') }})">
    @endif
    <div class="container">
        <!-- TITLE START-->
        <div class="section-head center wt-small-separator-outer">
            <div class="wt-small-separator site-text-primary">
                <div class="sep-leaf-left"></div>
                @if (!empty($dynamicfields['comment_top_header']))
                    <div>{{ $dynamicfields['comment_top_header'] }}</div>
                @else
                    <div>What our client say</div>
                @endif
                <div class="sep-leaf-right"></div>
            </div>
            @if (!empty($dynamicfields['comment_title']))
                <h2>{{ $dynamicfields['comment_title'] }}</h2>
            @else
                <h2>Happy WIth Customers & Clients</h2>
            @endif
        </div>
        <!-- TITLE END-->

        <div class="testimonial-2-content-outer">
            <div class="testimonial-3-content owl-carousel  owl-btn-vertical-center long-arrow-next-prev">
                @if (!empty($dynamicfields['comment_card_group']))
                    @foreach ($dynamicfields['comment_card_group'] as $key => $item)
                        <div class="item">
                            <div class="full-radius testimonial-2 bg-white">
                                <div class="testimonial-content">
                                    <div class="testimonial-text">
                                        <i class="fa fa-quote-left"></i>
                                        @if (!empty($item['comment_context']))
                                            <p>{{ $item['comment_context'] }}</p>
                                        @else
                                            <p>This is not just another nail salon! These ladies are super talented! My
                                                nails have
                                                never looked/felt more amazing!! the environment here is so happy and
                                                cheery!</p>
                                        @endif
                                    </div>
                                    <div class="testimonial-detail clearfix">
                                        <div class="testimonial-pic-block">
                                            <div class="testimonial-pic">
                                                @if (!empty($item['commentor_avt']))
                                                    <img class="full-radius"
                                                        src="{{ app(Modules\Media\Repositories\FileRepository::class)->find($item['commentor_avt'])->path }}"
                                                        alt="">
                                                @else
                                                    <img class="full-radius"
                                                        src="{{ Theme::url('images/default/testimonials/pic2.jpg') }}"
                                                        alt="">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="testimonial-info">
                                            @if (!empty($item['commentor']))
                                                <span
                                                    class="testimonial-name  title-style-2 site-text-secondry">{{ $item['commentor'] }}</span>
                                            @else
                                                <span class="testimonial-name  title-style-2 site-text-secondry">Malcolm
                                                    Franzcrip</span>
                                            @endif
                                            @if (!empty($item['commentor_job']))
                                                <span
                                                    class="testimonial-position title-style-2 site-text-primary">{{ $item['commentor_job'] }}</span>
                                            @else
                                                <span
                                                    class="testimonial-position title-style-2 site-text-primary">Contractor</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="item">
                        <div class="testimonial-2 bg-white full-radius">
                            <div class="testimonial-content">
                                <div class="testimonial-text">
                                    <i class="fa fa-quote-left"></i>
                                    <p>This is not just another nail salon! These ladies are super talented! My nails have
                                        never looked/felt more amazing!! the environment here is so happy and cheery!</p>
                                </div>
                                <div class="testimonial-detail clearfix">
                                    <div class="testimonial-pic-block">
                                        <div class="testimonial-pic">
                                            <img class="full-radius"
                                                src="{{ Theme::url('images/default/testimonials/pic2.jpg') }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="testimonial-info">
                                        <span class="testimonial-name  title-style-2 site-text-secondry">Malcolm
                                            Franzcrip</span>
                                        <span
                                            class="testimonial-position title-style-2 site-text-primary">Contractor</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>

    </div>
    </div>
    <!-- TESTIMONIAL SECTION END -->


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
                                                        class="title-style-2 team-position site-text-primary"></span>
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
                                            <h3 class="m-t0 team-name"><a href="#"
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

    <!-- OUR BLOG START -->
    <div class="section-full  p-t80  bg-white">
        <div class="container">

            <div class="wt-separator-two-part">
                <div class="row wt-separator-two-part-row">
                    <div class="col-lg-8 col-md-7 wt-separator-two-part-left">
                        <!-- TITLE START-->
                        <div class="section-head left wt-small-separator-outer">
                            <div class="wt-small-separator site-text-primary">
                                <div class="sep-leaf-left"></div>
                                <div>{{ __('core.latest_articles') }}</div>
                                <div class="sep-leaf-right"></div>
                            </div>
                        </div>
                        <!-- TITLE END-->
                    </div>
                    <div class="col-lg-4 col-md-5 wt-separator-two-part-right text-right">
                        <a href="/{{ trans('page::pages.routes.blogs-prefix') }}" class="site-button site-btn-effect full-radius">{{ __('core.more_detail') }}</a>
                    </div>
                </div>
            </div>

            <!-- BLOG SECTION START -->
            <div class="section-content">
                <div class="row d-flex justify-content-center">
                    @foreach ($latestBlogs as $blog)
                        <div class="col-lg-6 col-md-6 col-sm-12 m-b30">
                            <div class="blog-post date-style-2">
                                @php
                                    $image = $blog->getImageAttribute();
                                    $urlImage = Theme::url('images/default/blog/default/thum1.jpg');
                                    if ($image != '') {
                                        $urlImage = $image->path_string;
                                    }
                                @endphp
                                <div class="wt-post-media wt-img-effect zoom-slow">
                                    <a href="javascript:;"><img class="full-radius" src={{ $urlImage }}
                                            alt="" style="max-height: 300px; "></a>
                                </div>
                                <div class="wt-post-info bg-white p-t30">
                                    <div class="wt-post-meta ">
                                        <ul>
                                            <li class="post-category bottomright-radius"><span
                                                    class="topleft-radius bottomright-radius">{{ $blog->categories->first()->title }}</span>
                                            </li>
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
                                        <h3 class="post-title">{{ $blog->title }}</h3>
                                    </div>
                                    <div class="wt-post-readmore ">
                                        <a href="{{ route('post', $blog->slug) }}" class="site-button-link black">{{ __('core.read_more') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <!-- OUR BLOG END -->

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
@stop
