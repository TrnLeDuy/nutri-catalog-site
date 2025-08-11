<header class="site-header header-style-1 mobile-sider-drawer-menu">
    <div class="container header-middle clearfix" style="padding-top: 10px;">
        <div class="logo-header">
            <div class="logo-header-inner logo-header-one">
                <a href="{{ route('homepage') }}">
                    <img src={{ $header_logo }} alt="logo" style="height: 70px;" />
                </a>
            </div>
        </div>
        <div class="header-info">
            <img src={{ $header_banner }} alt="banner" style="float: right; height: 70px;">
        </div>
    </div>

    <div class="sticky-header main-bar-wraper  navbar-expand-lg">
        <div class="main-bar">
            <div class="container clearfix">
                <!-- NAV Toggle Button -->
                <button id="mobile-side-drawer" data-target=".header-nav" data-toggle="collapse" type="button"
                    class="navbar-toggler collapsed">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar icon-bar-first"></span>
                    <span class="icon-bar icon-bar-two"></span>
                    <span class="icon-bar icon-bar-three"></span>
                </button>

                <!-- MAIN Vav -->
                <div
                    class="nav-animation header-nav navbar-collapse collapse d-flex justify-content-center margin-topbot-5px">
                    @menu('main_menu', 'main_menu')
                    <ul>
                        <li>
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle" type="button" id="languageDropdown"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="flag-icon flag-icon-{{ locale() }}"></i>
                                    {{-- {{ LaravelLocalization::getSupportedLocales()[locale()]['native'] ?? locale() }} --}}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="languageDropdown">
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <a class="dropdown-item {{ App::getLocale() == $localeCode ? 'active' : '' }}"
                                            href="{{ isset($localizedUrls) && isset($localizedUrls[$localeCode]) ? $localizedUrls[$localeCode] : LaravelLocalization::getLocalizedURL($localeCode) }}"
                                            lang="{{ $localeCode }}">
                                            <i class="flag-icon flag-icon-{{ $localeCode }}"></i> &nbsp; {{ $properties['native'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <form method="GET" action="{{ '/' . app()->getLocale() . '/' . trans('product::products.router.product') . '/' . trans('product::products.router.search') }}"
                    class="header-nav-request margin-topbot-5px">
                    <input type="text" name="keyword" placeholder="{{ __('core.search') }}..." required>
                    <button type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>



</header>
