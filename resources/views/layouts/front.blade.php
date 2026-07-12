<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $seo['title'] ?? 'Siddhipriya Gracia | Refined Apartments on Bopal-Ghuma Road, Ahmedabad' }}</title>
    <meta name="description"
        content="{{ $seo['description'] ?? 'Discover Siddhipriya Gracia, a residential apartment project near Bopal-Ghuma Road, Ahmedabad. View location, amenities, residence details, and schedule a site visit.' }}">
    <meta name="robots" content="index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1">
    <link rel="canonical" href="{{ $seo['canonical'] ?? url()->current() }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Siddhipriya Gracia">
    <meta property="og:title" content="{{ $seo['title'] ?? 'Siddhipriya Gracia | Apartments in Ahmedabad West' }}">
    <meta property="og:description"
        content="{{ $seo['description'] ?? 'A thoughtfully planned residential address near Bopal-Ghuma Road, Ahmedabad with everyday amenities and convenient connectivity.' }}">
    <meta property="og:url" content="{{ $seo['canonical'] ?? url()->current() }}">
    <meta property="og:image" content="{{ asset('assets/img/gracia-hero-building.svg') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seo['title'] ?? 'Siddhipriya Gracia' }}">
    <meta name="twitter:description"
        content="{{ $seo['description'] ?? 'Thoughtfully planned apartments near Bopal-Ghuma Road, Ahmedabad.' }}">
    <meta name="twitter:image" content="{{ asset('assets/img/gracia-hero-building.svg') }}">

    <link rel="icon" href="{{ asset('assets/img/logo-mark.svg') }}" type="image/svg+xml">
    <link rel="preconnect" href="https://cdn.overflow.nl" crossorigin>
    <link rel="preload" href="https://cdn.overflow.nl/modus-sequence-v2/frame000.jpg" as="image">
    <link rel="preload" href="{{ asset('assets/css/front.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('assets/css/front.css') }}">

    @yield('css')

    @php
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'ApartmentComplex',
            'name' => 'Siddhipriya Gracia',
            'description' => 'Thoughtfully planned residential apartments near Bopal-Ghuma Road, Ahmedabad.',
            'url' => url('/'),
            'image' => asset('assets/img/gracia-hero-building.svg'),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => '23, Greencity, Vrajshyam Co-Society, Bopal-Ghuma Road',
                'addressLocality' => 'Ahmedabad',
                'addressRegion' => 'Gujarat',
                'postalCode' => '380058',
                'addressCountry' => 'IN',
            ],
            'amenityFeature' => [
                [
                    '@type' => 'LocationFeatureSpecification',
                    'name' => 'Club House',
                ],
                [
                    '@type' => 'LocationFeatureSpecification',
                    'name' => 'Gymnasium',
                ],
                [
                    '@type' => 'LocationFeatureSpecification',
                    'name' => 'Swimming Pool',
                ],
                [
                    '@type' => 'LocationFeatureSpecification',
                    'name' => '24x7 Security',
                ],
            ],
        ];
    @endphp

    <script type="application/ld+json">
        {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
</head>

<body data-theme="light" class="is-loading">

    <div class="siteLoader" data-site-loader role="status" aria-live="polite" aria-label="Loading Siddhipriya Gracia">
        <div class="siteLoader__glow" aria-hidden="true"></div>

        <div class="siteLoader__stage">
            <div class="siteLoader__brand">
                <img src="{{ asset('assets/img/logo-mark.svg') }}" alt="">
                <span><b>Siddhipriya</b> Gracia</span>
            </div>

            <div class="siteLoader__visual" aria-hidden="true">
                <div class="siteLoader__crane">
                    <span class="siteLoader__craneMast"></span>
                    <span class="siteLoader__craneBoom"></span>
                    <span class="siteLoader__craneSupport"></span>
                    <span class="siteLoader__craneCable">
                        <span class="siteLoader__craneHook"></span>
                    </span>
                </div>

                <div class="siteLoader__tower">
                    <span class="siteLoader__floor"></span>
                    <span class="siteLoader__floor"></span>
                    <span class="siteLoader__floor"></span>
                    <span class="siteLoader__floor"></span>
                    <span class="siteLoader__floor"></span>
                    <span class="siteLoader__roof"></span>
                </div>

                <span class="siteLoader__ground"></span>
            </div>

            <div class="siteLoader__content">
                <span class="siteLoader__label" data-loader-status>Preparing your address</span>

                <div class="siteLoader__progress" aria-hidden="true">
                    <span data-loader-progress></span>
                </div>

                <small class="siteLoader__percent">
                    <span data-loader-percent>0</span>% loaded
                </small>
            </div>
        </div>

        <span class="siteLoader__sr">Loading website</span>
    </div>

    <div class="site-shell">
        <header class="site-header" id="top">
            <a href="{{ route('home') }}" class="brand" aria-label="Siddhipriya Gracia Home">
                <img src="{{ asset('assets/img/logo-mark.svg') }}" alt="Siddhipriya Gracia Logo">
                <span><b>Siddhipriya</b> Gracia</span>
            </a>

            @php
                $isHomePage = request()->routeIs('home');
                $isAboutPage = request()->routeIs('about');
                $isContactPage = request()->routeIs('contact');
            @endphp

            <nav class="nav" id="navMenu" aria-label="Main navigation">
                <a href="{{ route('home') }}" class="{{ $isHomePage ? 'is-active' : '' }}"
                    aria-current="{{ $isHomePage ? 'page' : 'false' }}">
                    Home
                </a>

                <a href="{{ route('about') }}" class="{{ $isAboutPage ? 'is-active' : '' }}"
                    aria-current="{{ $isAboutPage ? 'page' : 'false' }}">
                    About
                </a>

                <a href="{{ route('contact') }}" class="{{ $isContactPage ? 'is-active' : '' }}"
                    aria-current="{{ $isContactPage ? 'page' : 'false' }}">
                    Contact Us
                </a>
            </nav>

            <div class="header-actions">
                <button class="theme-toggle" type="button" data-theme-toggle aria-label="Toggle dark and light theme">
                    ☾
                </button>

                <button class="menu-toggle" type="button" data-menu-toggle aria-label="Open menu" aria-expanded="false">
                    ☰
                </button>
            </div>
        </header>

        @if (session()->has('success'))
            <div class="flash success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="flash error">
                Please check the form details and try again.
            </div>
        @endif

        <main>
            @yield('content')
        </main>

        <footer class="sgCompactFooter">
            <div class="sgCompactFooter__grid" aria-hidden="true"></div>
            <div class="sgCompactFooter__accent" aria-hidden="true"></div>

            <div class="sgCompactFooter__main">
                <div class="sgCompactFooter__identity">
                    <a href="{{ route('home') }}" class="sgCompactFooter__brand" aria-label="Siddhipriya Gracia Home">
                        <img src="{{ asset('assets/img/logo-mark.svg') }}" alt="">
                        <span>
                            <b>Siddhipriya</b>
                            <small>Gracia</small>
                        </span>
                    </a>

                    <p>
                        Thoughtfully planned homes for calm, connected living in Ahmedabad West.
                    </p>
                </div>

                <nav class="sgCompactFooter__nav" aria-label="Footer navigation">
                    <span>Explore</span>

                    <div>
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('about') }}">About</a>
                        <a href="{{ route('contact') }}">Contact Us</a>
                    </div>
                </nav>

                <div class="sgCompactFooter__visit">
                    <div class="sgCompactFooter__visitCopy">
                        <span>Project address</span>
                        <h2>Visit Gracia</h2>
                        <address>
                            Bopal-Ghuma Road,<br>
                            Ahmedabad, Gujarat 380058
                        </address>
                    </div>

                    <div class="sgCompactFooter__actions">
                        <a href="{{ route('contact') }}#inquiry" class="sgCompactFooter__primary">
                            Schedule Visit
                            <span aria-hidden="true">↗</span>
                        </a>

                        <a href="https://www.google.com/maps/search/?api=1&query=23%2C%20Greencity%2C%20Vrajshyam%20co-society%2C%20Bopal%20-%20Ghuma%20Rd%2C%20Ahmedabad%2C%20Gujarat%20380058"
                            class="sgCompactFooter__map" target="_blank" rel="noopener">
                            Open Maps
                        </a>
                    </div>
                </div>
            </div>

            <div class="sgCompactFooter__bottom">
                <p>© {{ date('Y') }} Siddhipriya Gracia. All rights reserved.</p>

                <p class="sgCompactFooter__location">
                    Bopal-Ghuma Road · Ahmedabad West
                </p>

                <button type="button" data-scroll-top class="sgCompactFooter__top">
                    Back to top
                    <span aria-hidden="true">↑</span>
                </button>
            </div>
        </footer>

        <button class="toTopLift" type="button" data-scroll-top aria-label="Back to top">
            <span class="toTopLift__progress" aria-hidden="true">
                <span class="toTopLift__arrow">↑</span>
            </span>

            <span class="toTopLift__copy">
                <small>Back to</small>
                <strong>Top</strong>
            </span>
        </button>
    </div>

    <script src="{{ asset('assets/js/front.js') }}" defer></script>
    @yield('js')
</body>

</html>
