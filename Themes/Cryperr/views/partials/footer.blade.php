<footer class="site-footer footer-large footer-dark text-white footer-style1">
    <!-- FOOTER BLOCKES START -->
    <div class="footer-top bg-no-repeat bg-bottom-right" style="background-image:url(images/background/footer-bg.png)">
        <div class="container">
            <div class="row">

                <div class="col-lg-5 col-md-12 col-sm-12">
                    <div class="footer-h-left">
                        <div class="widget widget_about">
                            <div class="logo-footer clearfix">
                                <a href="{{ route('homepage') }}"><img src={{ $footer_logo }}
                                        alt="logo"></a>
                            </div>
                            <p>{{ $site_description }}</p>
                        </div>
                        <div class="widget recent-posts-entry">
                            <ul class="widget_address">
                                <li><i class="fa fa-map-marker"></i>{{ $address }}</li>
                                <li><i class="fa fa-envelope"></i>{{ $email }}</li>
                                <li> <i class="fa fa-phone"></i>{{ $phone }}</li>
                            </ul>
                        </div>
                        <ul class="social-icons wt-social-links footer-social-icon">
                            @if (themeOption('cryperr::skype') != null)
                                <li><a href="{{ themeOption('cryperr::skype') }}" class="fa fa-skype full-radius" target="_blank"></a></li>
                            @endif
                            @if (themeOption('cryperr::facebook') != null)
                                <li><a href="{{ themeOption('cryperr::facebook') }}" class="fa fa-facebook full-radius" target="_blank"></a></li>
                            @endif
                            @if (themeOption('cryperr::twitter') != null)
                                <li><a href="{{ themeOption('cryperr::twitter') }}" class="fa fa-twitter full-radius" target="_blank"></a></li>
                            @endif
                            @if (themeOption('cryperr::instagram') != null)
                                <li><a href="{{ themeOption('cryperr::instagram') }}" class="fa fa-instagram full-radius" target="_blank"></a></li>
                            @endif
                        </ul>
                    </div>

                </div>

                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="row footer-h-right">
                        <div class="col-lg-5 col-md-4">
                            <div class="widget widget_services">
                                <h3 class="widget-title">{{ __('core.useful_links') }}</h3>
                                @menu('main_footer', 'footer_menu')
                            </div>
                        </div>
                        
                        <div class="col-lg-7 col-md-8">
                            <div class="widget widget_services">
                                <h3 class="widget-title">{{ __('core.our_services') }}</h3>
                                <ul>
                                    @menu('our_services', 'footer_menu')
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER COPYRIGHT -->

    <div class="footer-bottom">
        <div class="container">
            <div class="wt-footer-bot-left d-flex justify-content-between">
                <span class="copyrights-text">Copyright © 2024 <span
                        class="site-text-primary">{{ $site_name }}</span></span>
                <ul class="copyrights-nav">
                    @menu('copyright', 'footer_menu')
                </ul>
            </div>
        </div>
    </div>


</footer>
