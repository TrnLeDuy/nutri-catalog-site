@extends('layouts.master')

@section('title')
    {{ $product->title }} | @parent
@stop

@section('content')
    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->
        @if (!empty($dynamicfields['product_background']))
            <div class="wt-bnr-inr overlay-wraper bg-center"
                style="background-image:url({{ app(Modules\Media\Repositories\FileRepository::class)->find($dynamicfields['product_background'])->path }});">
            @else
                <div class="wt-bnr-inr overlay-wraper bg-center">
        @endif
        <div class="overlay-main site-bg-secondry opacity-07"></div>
        <div class="container">
            <div class="wt-bnr-inr-entry">
                <div class="banner-title-outer">
                    <div class="banner-title-name">
                        <h2 class="site-text-primary">{{ $product->title }}</h2>
                    </div>
                </div>
                <!-- BREADCRUMB ROW -->

                <div>
                    <ul class="wt-breadcrumb breadcrumb-style-2">
                        <li><a href="{{ route('homepage') }}">{{ __('core.home') }}</a></li>
                        <li><a href="/{{ __('routes.products-prefix') }}">{{ __('core.product') }}</a></li>
                        <li>{{ $product->title }}</li>
                    </ul>
                </div>

                <!-- BREADCRUMB ROW END -->
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->

    <!-- SECTION CONTENT START -->
    <div class="section-full p-t80 p-b80">

        <!-- PRODUCT DETAILS -->
        <div class="container woo-entry">

            <div class="row m-b30">
                <div class="col-lg-3 col-md-4  m-b30">
                    <div class="wt-box wt-product-gallery on-show-slider">

                        <div id="sync1" class="owl-carousel owl-theme owl-btn-vertical-center m-b5">
                            <div class="item">
                                <div class="mfp-gallery">
                                    <div class="wt-box">
                                        <div class="wt-thum-bx wt-img-overlay1 full-radius">
                                            @if(!empty($productImage) && !empty($productImage->path_string))
                                                <img class="full-radius" src="{{ $productImage->path_string }}" alt="">
                                                <div class="overlay-bx">
                                                    <div class="overlay-icon">
                                                        <a class="mfp-link full-radius" href="{{ $productImage->path_string }}">
                                                            <i class="fa fa-arrows-alt wt-icon-box-xs"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach ($productSlideImages as $slide)
                                <div class="item">
                                    <div class="mfp-gallery">
                                        <div class="wt-box">
                                            <div class="wt-thum-bx wt-img-overlay1 full-radius">
                                                <img class="full-radius" src="{{ $slide->path_string }}" alt="">
                                                <div class="overlay-bx">
                                                    <div class="overlay-icon">
                                                        <a class="mfp-link full-radius" href="{{ $slide->path_string }}">
                                                            <i class="fa fa-arrows-alt wt-icon-box-xs"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div id="sync2" class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="wt-media">
                                    @isset($productImage->path_string)
                                        <img class="full-radius" src="{{ $productImage->path_string }}" alt="">
                                    @endisset
                                </div>
                            </div>
                            @foreach ($productSlideImages as $slide)
                                <div class="item">
                                    <div class="wt-media">
                                        <img class="full-radius" src="{{ $slide->path_string }}" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-8">
                    <div class="product-detail-info bg-gray p-a30 full-radius">
                        <div class="wt-product-title ">
                            <h2 class="post-title"><a href="javascript:void(0);">{{ $product->title }}</a></h2>
                        </div>
                        @if ($product->is_promotion == 1)
                            <div style="display: flex;">
                                <h3 class="m-tb10">{{ number_format($product->price_sale) }} VND</h3>
                                <del style="align-content: center; padding-left: 10px;"> {{ number_format($product->price) }} VND </del>
                            </div>
                        @else
                            <h3 class="m-tb10">{{ number_format($product->price) }} VND</h3>
                        @endif
                    </div>
                </div>
            </div>

            <!-- TABS CONTENT START -->
            <div class="row">
                <div class="col-md-12">
                    <div class="wt-tabs border bg-tabs">
                        <ul class="nav nav-tabs">
                            <li><a data-toggle="tab" href="#web-design-19" class="topleft-radius active">{{ __('product.description') }}</a></li>
                            <li><a data-toggle="tab" href="#graphic-design-19" class="topright-radius">{{ __('product.specification') }}</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="web-design-19" class="tab-pane right-radius bottomleft-radius active">
                                <div class=" p-a10">
                                    {!! $product->sumary !!}
                                </div>
                            </div>
                            <div id="graphic-design-19" class="tab-pane right-radius bottomleft-radius">
                                {!! $product->product_info !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- TABS CONTENT START -->
        </div>
        <!-- PRODUCT DETAILS -->

    </div>
    <!-- CONTENT CONTENT END -->

    <!-- SECTION CONTENT START -->
    <div class="section-full p-t80 p-b80 bg-gray">
        <div class="container">
            <div class="section-content">

                <!-- TITLE START -->
                <div class="wt-separator-two-part">
                    <div class="row wt-separator-two-part-row">
                        <div class="col-lg-8 col-md-6 wt-separator-two-part-left">
                            <!-- TITLE START-->
                            <div class="section-head left wt-small-separator-outer">
                                <div class="wt-small-separator site-text-primary">
                                    <div class="sep-leaf-left"></div>
                                    <div>{{ __('product.related_products') }}</div>
                                    <div class="sep-leaf-right"></div>
                                </div>
                            </div>
                            <!-- TITLE END-->
                        </div>
                        <div class="col-lg-4 col-md-6 wt-separator-two-part-right text-right">
                            <a href="/{{ __('routes.products-prefix') }}" class="site-button site-btn-effect full-radius">{{ __('core.more_detail') }}</a>
                        </div>
                    </div>
                </div>

                <!-- TITLE END -->

                <div class="owl-carousel featured-products owl-btn-vertical-center">

                    @foreach ($productRelated as $product)
                        @php
                            $image = $product->getAvatar();
                            if ($image != '') {
                                $urlImage = $image->path_string;
                            } else {
                                $urlImage = Theme::url('images/default/products/pic-1.jpg');
                            }
                        @endphp
                        <div class="item full-radius" style="display:flex; justify-content: center;">
                            <div class="wt-box wt-product-box overflow-hide full-radius" style="height: 500px; width: 350px;">
                                <div class="wt-img-overlay1 wt-img-effect zoom" style="display:flex; justify-content:center;">
                                    <img  style="height: 350px; width: auto;" src="{{ $urlImage }}" alt="">
                                </div>
                                <div class="wt-info text-center">
                                    <div class="p-a20 bg-white bottom-radius">
                                        <h3 class="wt-title">
                                            <a
                                                href="{{ route('fe.product.product.detail', ['slug' => $product->slug]) }}">{{ Str::limit($product->title, 40, '...') }}</a>
                                        </h3>
                                        @include('products.partials.price', [
                                            'is_promotion' => $product->is_promotion,
                                            'price' => $product->price,
                                            'price_sale' => $product->price_sale,
                                        ])

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- COLUMNS 1 -->
                </div>
            </div>
        </div>
    </div>
    <!-- SECTION CONTENT END -->
    </div>
    <!-- CONTENT END -->
@stop
