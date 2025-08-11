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
        @if (!empty($dynamicfields['product_background']))
        <div class="wt-bnr-inr overlay-wraper bg-center" style="background-image:url({{ app(Modules\Media\Repositories\FileRepository::class)->find($dynamicfields['product_background'])->path }});">
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


        <!-- SECTION CONTENT START -->
        <div class="section-full p-t80 p-b50">
            <div class="container">
                <div class="section-content">
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 m-b30">
                            <div class="row">
                                @php
                                    if (!isset($products)) {
                                        $products = getAllProducts();
                                        // dd($products);
                                    }
                                @endphp
                                @foreach ($products as $product)
                                    @php
                                        $image = $product->getAvatar();
                                        if ($image != '') {
                                            $urlImage = $image->path_string;
                                        } else {
                                            $urlImage = Theme::url('images/default/products/pic-1.jpg');
                                        }
                                    @endphp
                                    <div class="col-lg-6 col-md-6 m-b30" style="display: flex; justify-content: center;">
                                        <div class="wt-box wt-product-box block-shadow  overflow-hide full-radius"
                                            style="height: 500px; width: 350px; display:flex; flex-direction: column;">
                                            <div class="wt-img-effect zoom top-radius"
                                                style="display:flex; justify-content: center; align-items: center; height: 350px;">
                                                <img style="height: 350px; width: auto;" src="{{ $urlImage }}" alt="">
                                            </div>
                                            <div class="wt-info  text-center bottom-radius">
                                                <div class="p-a20 bg-white">
                                                    <h3 class="wt-title" style="height: 70px">
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
                            </div>
                            {!! $products->links('partials.pagination') !!}
                        </div>
                        <!-- SIDE BAR START -->
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 rightSidebar  m-b30">

                            <aside class="side-bar">
                                <!-- RECENT POSTS -->
                                <div class="widget recent-posts-entry p-a20 full-radius">
                                    <div class="text-left m-b30">
                                        <h3 class="widget-title">{{ __('core.recent_views') }}</h3>
                                    </div>
                                    @php
                                        if (session()->has('product_seen')) {
                                            $recentProducts = getProductSeen()->take(3);
                                        } else {
                                            $recentProducts = collect();
                                        }
                                    @endphp
                                    <div class="section-content">
                                        <div class="widget-post-bx">
                                            @foreach ($recentProducts as $product)
                                                @php
                                                    $image = $product->getAvatar();
                                                    if ($image != '') {
                                                        $urlImage = $image->path_string;
                                                    } else {
                                                        $urlImage = Theme::url(
                                                            'images/default/blog/recent-blog/pic1.jpg',
                                                        );
                                                    }
                                                @endphp
                                                <div class="widget-post clearfix">
                                                    <div class="wt-post-media">
                                                        <img style="max-height: 80px; object-fit: cover;"
                                                            src="{{ $urlImage }}" alt="">
                                                    </div>
                                                    <div class="wt-post-info">
                                                        <div class="wt-post-header">
                                                            <h6 class="post-title"> <a
                                                                    href="{{ route('fe.product.product.detail', ['slug' => $product->slug]) }}">{{ $product->title }}</a>
                                                            </h6>
                                                        </div>
                                                        <div class="wt-post-meta">
                                                            <ul>
                                                                @if ($product->is_promotion == 1)
                                                                    <li class="post-author">{{ number_format($product->price_sale) }} VND</li>
                                                                @else
                                                                    <li class="post-author">{{ number_format($product->price) }} VND</li>
                                                                @endif
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
                                        <h3 class="widget-title">{{ __('core.categories') }}</h3>
                                    </div>
                                    @php
                                        if (!isset($categories)) {
                                            $categories = getCategoryMenu();
                                        }
                                    @endphp
                                    <ul>
                                        @foreach ($categories as $category)
                                            <li><a
                                                    href="{{ route('fe.product.product.category', ['slug' => $category->slug]) }}">{{ $category->title }}</a><span
                                                    class="badge">{{ $category->products_count }}</span></li>
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
        <!-- SECTION CONTENT END -->
    </div>
    <!-- CONTENT END -->
@stop
