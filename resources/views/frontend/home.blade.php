@extends('layouts.front')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@endsection

@section('content')
    {{-- Modus building zoom hero --}}
    <section class="modusZoomHero heroDeviceHero" id="home-hero" aria-labelledby="homeHeroTitle" data-sequence-wrap>
        <div class="modusZoomHero__pin">

            <div class="modusZoomHero__visual" data-sequence-element
                aria-label="Siddhipriya Gracia residential building visual">
                <canvas class="modusZoomHero__canvas" data-sequence-canvas
                    data-desktop-src="https://cdn.overflow.nl/modus-sequence-v2/frame"
                    data-mobile-src="https://cdn.overflow.nl/modus-sequence-v2/frame"
                    data-static-src="https://cdn.overflow.nl/modus-sequence-v2/frame000.jpg" data-filetype="jpg"
                    data-frames="121" data-digits="3" data-index-start="0"></canvas>

                <img class="modusZoomHero__fallback" src="https://cdn.overflow.nl/modus-sequence-v2/frame000.jpg"
                    alt="Siddhipriya Gracia residential apartments on Bopal Ghuma Road Ahmedabad">

                <div class="modusZoomHero__shade"></div>
            </div>

            <div class="modusZoomHero__content">
                <div class="heroKicker">
                    <span class="heroKicker__dot"></span>
                    <span>Siddhipriya Gracia · Bopal-Ghuma Road</span>
                </div>

                <h1 id="homeHeroTitle">
                    <span>Where comfort</span>
                    <span>meets quiet elegance.</span>
                </h1>

                <p>
                    Experience contemporary living at Siddhipriya Gracia, strategically located near Bopal-Ghuma Road with
                    elegant residences, seamless connectivity, and lifestyle amenities crafted for everyday comfort.
                </p>

                <div class="heroCompactDock" aria-label="Hero actions and trust summary">
                    <div class="heroCompactDock__actions">
                        <a href="#inquiry" class="btn">Schedule Visit</a>

                        <a href="https://www.google.com/maps/search/?api=1&query=23%2C%20Greencity%2C%20Vrajshyam%20co-society%2C%20Bopal%20-%20Ghuma%20Rd%2C%20Ahmedabad%2C%20Gujarat%20380058"
                            class="btn btn-ghost btn-on-hero" target="_blank" rel="noopener">
                            View Location
                        </a>
                    </div>

                    <div class="heroTrustChip" aria-label="Google rating">
                        <strong>4.6</strong>
                        <div>
                            <span>Trusted for Quality & Comfort</span>
                        </div>
                    </div>
                </div>

                <div class="heroSignalStrip" aria-label="Project highlights">
                    <span>
                        <b>01</b>
                        <p>Contemporary homes</p>
                    </span>

                    <span>
                        <b>02</b>
                        <p>Bopal-Ghuma location</p>
                    </span>

                    <span>
                        <b>03</b>
                        <p>Lifestyle amenities</p>
                    </span>
                </div>
            </div>

            <div class="modusZoomHero__facts heroFactRail" aria-label="Project highlights">
                <div>
                    <small>Homes</small>
                    <span>{{ $project->configuration ?? '2 & 3 BHK' }}</span>
                </div>

                <div>
                    <small>Possession</small>
                    <span>{{ $project->possession_date ?? 'On Request' }}</span>
                </div>

                <div>
                    <small>Location</small>
                    <span>Bopal-Ghuma</span>
                </div>
            </div>

            <div class="modusZoomHero__scroll heroScrollCue" aria-hidden="true">
                <span>Explore</span>
            </div>
        </div>
    </section>

    {{-- Full-width introduction --}}
    <section class="graciaIntro graciaFullBleed" id="overview" aria-labelledby="graciaIntroTitle" data-intro-section>
        <div class="graciaIntro__noise" aria-hidden="true"></div>
        <div class="graciaIntro__word" aria-hidden="true">GRACIA</div>

        <div class="graciaIntro__top">
            <p class="graciaLabel" data-reveal="fade">
                <span>01</span>
                Architecture for everyday life
            </p>

            <p class="graciaIntro__sideNote" data-reveal="fade">
                Bopal-Ghuma Road · Ahmedabad West
            </p>
        </div>

        <div class="graciaIntro__experience">
            <div class="graciaIntro__copy">
                <p class="graciaIntro__edition" data-reveal="fade">
                    Contemporary residences · Thoughtful community living
                </p>

                <h2 id="graciaIntroTitle" data-reveal="line">
                    <span>More than</span>
                    <span>a building.</span>
                    <em>A better rhythm of living.</em>
                </h2>

                <p class="graciaIntro__lead" data-reveal="up">
                    Siddhipriya Gracia brings calm planning, contemporary architecture, and useful lifestyle spaces
                    together in one connected residential address.
                </p>

                <div class="graciaIntro__actions" data-reveal="up" data-reveal-delay="80">
                    <a href="{{ route('project.show', 'siddhipriya-gracia') }}" class="graciaArrowLink">
                        Explore project details
                        <span aria-hidden="true">↗</span>
                    </a>

                    <a href="#amenities" class="graciaIntro__quietLink">
                        Discover the lifestyle
                    </a>
                </div>
            </div>

            <div class="graciaIntroScene" data-reveal="scale" data-intro-scene
                aria-label="Abstract architectural illustration of Siddhipriya Gracia">
                <div class="graciaIntroScene__grid" aria-hidden="true"></div>
                <span class="graciaIntroScene__orbit graciaIntroScene__orbit--one" aria-hidden="true"></span>
                <span class="graciaIntroScene__orbit graciaIntroScene__orbit--two" aria-hidden="true"></span>
                <span class="graciaIntroScene__sun" data-parallax data-parallax-speed="-0.035" aria-hidden="true"></span>

                <div class="graciaIntroTower" data-parallax data-parallax-speed="0.018" aria-hidden="true">
                    <span class="graciaIntroTower__crown"></span>

                    @for ($floor = 0; $floor < 7; $floor++)
                        <span class="graciaIntroTower__floor">
                            <i></i>
                            <i></i>
                            <i></i>
                        </span>
                    @endfor

                    <span class="graciaIntroTower__base"></span>
                </div>

                <div class="graciaIntroScene__note graciaIntroScene__note--one">
                    <small>Residences</small>
                    <strong>{{ $project->configuration ?? '2 & 3 BHK' }}</strong>
                </div>

                <div class="graciaIntroScene__note graciaIntroScene__note--two">
                    <small>Design language</small>
                    <strong>Warm minimalism</strong>
                </div>

                <div class="graciaIntroScene__note graciaIntroScene__note--three">
                    <small>Address</small>
                    <strong>Ahmedabad West</strong>
                </div>

                <div class="graciaIntroScene__compass" aria-hidden="true">
                    <span>N</span>
                    <i></i>
                    <small>23.0° N</small>
                </div>

                <div class="graciaIntroScene__baseline" aria-hidden="true">
                    <span>Light</span>
                    <i></i>
                    <span>Flow</span>
                    <i></i>
                    <span>Privacy</span>
                </div>
            </div>
        </div>

        <div class="graciaIntro__metrics" aria-label="Project highlights">
            <article data-reveal="up" data-reveal-delay="0">
                <strong data-count="2">0</strong>
                <span>Home configurations</span>
            </article>

            <article data-reveal="up" data-reveal-delay="70">
                <strong data-count="4.6" data-count-decimals="1">0</strong>
                <span>Trusted rating</span>
            </article>

            <article data-reveal="up" data-reveal-delay="140">
                <strong data-count="24" data-count-suffix="/7">0</strong>
                <span>Security focus</span>
            </article>

            <article data-reveal="up" data-reveal-delay="210">
                <strong>West</strong>
                <span>Ahmedabad address</span>
            </article>
        </div>

        <div class="graciaIntro__orb" data-parallax data-parallax-speed="-0.025" aria-hidden="true"></div>
    </section>

    {{-- Full-width horizontal living story --}}
    <section class="graciaJourney graciaFullBleed" data-horizontal-story aria-label="Life at Siddhipriya Gracia">
        <div class="graciaJourney__pin">
            <div class="graciaJourney__header">
                <p class="graciaLabel graciaLabel--light">
                    <span>02</span>
                    One address · Four experiences
                </p>

                <div class="graciaJourney__counter" aria-hidden="true">
                    <span data-journey-current>01</span>
                    <i></i>
                    <span>04</span>
                </div>
            </div>

            <div class="graciaJourney__viewport">
                <div class="graciaJourney__track" data-horizontal-track>

                    <article class="graciaJourneyPanel graciaJourneyPanel--arrival">
                        <div class="graciaJourneyPanel__copy">
                            <span class="graciaJourneyPanel__number">01</span>
                            <p class="graciaJourneyPanel__eyebrow">A composed arrival</p>
                            <h2>Come home to a quieter first impression.</h2>
                            <p>
                                A warm material palette, landscaped edges, and a secure arrival experience create a
                                clear transition from the city outside to the calm within.
                            </p>
                        </div>

                        <div class="graciaJourneyPanel__visual graciaArrivalVisual" aria-hidden="true">
                            <span class="graciaArrivalVisual__sun" data-parallax data-parallax-speed="-0.08"></span>
                            <span class="graciaArrivalVisual__tower graciaArrivalVisual__tower--one"></span>
                            <span class="graciaArrivalVisual__tower graciaArrivalVisual__tower--two"></span>
                            <span class="graciaArrivalVisual__gate"></span>
                            <span class="graciaArrivalVisual__road"></span>
                        </div>
                    </article>

                    <article class="graciaJourneyPanel graciaJourneyPanel--home">
                        <div class="graciaJourneyPanel__copy">
                            <span class="graciaJourneyPanel__number">02</span>
                            <p class="graciaJourneyPanel__eyebrow">Considered residences</p>
                            <h2>Spaces planned around people, not empty spectacle.</h2>
                            <p>
                                Comfortable proportions, useful circulation, natural light, and privacy give each
                                residence a practical sense of ease.
                            </p>
                        </div>

                        <div class="graciaJourneyPanel__visual graciaPlanVisual" aria-hidden="true">
                            <span class="graciaPlanVisual__grid"></span>
                            <span class="graciaPlanVisual__room graciaPlanVisual__room--one"></span>
                            <span class="graciaPlanVisual__room graciaPlanVisual__room--two"></span>
                            <span class="graciaPlanVisual__room graciaPlanVisual__room--three"></span>
                            <span class="graciaPlanVisual__room graciaPlanVisual__room--four"></span>
                            <span class="graciaPlanVisual__line graciaPlanVisual__line--one"></span>
                            <span class="graciaPlanVisual__line graciaPlanVisual__line--two"></span>
                            <small>Light · Flow · Privacy</small>
                        </div>
                    </article>

                    <article class="graciaJourneyPanel graciaJourneyPanel--wellness">
                        <div class="graciaJourneyPanel__copy">
                            <span class="graciaJourneyPanel__number">03</span>
                            <p class="graciaJourneyPanel__eyebrow">Lifestyle spaces</p>
                            <h2>Make room for movement, connection, and pause.</h2>
                            <p>
                                Fitness, recreation, play, and community spaces support different moments of the day
                                without making everyday life feel over-programmed.
                            </p>
                        </div>

                        <div class="graciaJourneyPanel__visual graciaWellnessVisual" aria-hidden="true">
                            <span class="graciaWellnessVisual__ring graciaWellnessVisual__ring--one"></span>
                            <span class="graciaWellnessVisual__ring graciaWellnessVisual__ring--two"></span>
                            <span class="graciaWellnessVisual__ring graciaWellnessVisual__ring--three"></span>
                            <span class="graciaWellnessVisual__core">Live<br>well</span>
                            <span class="graciaWellnessVisual__label graciaWellnessVisual__label--one">Move</span>
                            <span class="graciaWellnessVisual__label graciaWellnessVisual__label--two">Connect</span>
                            <span class="graciaWellnessVisual__label graciaWellnessVisual__label--three">Pause</span>
                        </div>
                    </article>

                    <article class="graciaJourneyPanel graciaJourneyPanel--location">
                        <div class="graciaJourneyPanel__copy">
                            <span class="graciaJourneyPanel__number">04</span>
                            <p class="graciaJourneyPanel__eyebrow">Connected Ahmedabad West</p>
                            <h2>Stay close to what moves your day forward.</h2>
                            <p>
                                The Bopal-Ghuma location keeps schools, healthcare, retail, workplaces, and the wider
                                western corridor within practical reach.
                            </p>

                            <a href="https://www.google.com/maps/search/?api=1&query=23%2C%20Greencity%2C%20Vrajshyam%20co-society%2C%20Bopal%20-%20Ghuma%20Rd%2C%20Ahmedabad%2C%20Gujarat%20380058"
                                class="graciaArrowLink graciaArrowLink--light" target="_blank" rel="noopener">
                                Open location
                                <span aria-hidden="true">↗</span>
                            </a>
                        </div>

                        <div class="graciaJourneyPanel__visual graciaMapVisual" aria-hidden="true">
                            <span class="graciaMapVisual__road graciaMapVisual__road--one"></span>
                            <span class="graciaMapVisual__road graciaMapVisual__road--two"></span>
                            <span class="graciaMapVisual__road graciaMapVisual__road--three"></span>
                            <span class="graciaMapVisual__road graciaMapVisual__road--four"></span>
                            <span class="graciaMapVisual__pulse"></span>
                            <span class="graciaMapVisual__pin">SG</span>
                            <small>Bopal-Ghuma Road</small>
                        </div>
                    </article>

                </div>
            </div>

            <div class="graciaJourney__progress" aria-hidden="true">
                <span data-horizontal-progress></span>
            </div>
        </div>
    </section>

    {{-- Full-width amenities --}}
    <section class="graciaAmenities graciaFullBleed" id="amenities" aria-labelledby="graciaAmenitiesTitle">
        <div class="graciaAmenities__word" aria-hidden="true">LIVE WELL</div>

        <div class="graciaAmenities__showcase">
            <div class="graciaAmenities__header">
                <p class="graciaLabel" data-reveal="fade">
                    <span>03</span>
                    Amenities with purpose
                </p>

                <h2 id="graciaAmenitiesTitle" data-reveal="line">
                    <span>Energy when</span>
                    <span>you need it.</span>
                    <em>Calm when you want it.</em>
                </h2>

                <p class="graciaAmenities__introText" data-reveal="up">
                    The amenity plan is organised around three everyday needs: movement, connection, and recovery.
                    Each space has a role instead of existing only as a checklist item.
                </p>
            </div>

            <div class="graciaAmenityCompass" data-reveal="scale" aria-hidden="true">
                <span class="graciaAmenityCompass__ring graciaAmenityCompass__ring--one"></span>
                <span class="graciaAmenityCompass__ring graciaAmenityCompass__ring--two"></span>
                <span class="graciaAmenityCompass__ring graciaAmenityCompass__ring--three"></span>

                <div class="graciaAmenityCompass__core">
                    <small>Daily balance</small>
                    <strong>Live<br>well</strong>
                </div>

                <span class="graciaAmenityCompass__node graciaAmenityCompass__node--one">Move</span>
                <span class="graciaAmenityCompass__node graciaAmenityCompass__node--two">Meet</span>
                <span class="graciaAmenityCompass__node graciaAmenityCompass__node--three">Play</span>
                <span class="graciaAmenityCompass__node graciaAmenityCompass__node--four">Pause</span>

                <div class="graciaAmenityCompass__readout">
                    <span>06</span>
                    <small>Purpose-led spaces</small>
                </div>
            </div>
        </div>

        <div class="graciaAmenityMarquee" aria-hidden="true">
            <div class="graciaAmenityMarquee__track">
                <span>Club House</span><i></i>
                <span>Fitness</span><i></i>
                <span>Swimming Pool</span><i></i>
                <span>Children's Play</span><i></i>
                <span>Landscaped Spaces</span><i></i>
                <span>24×7 Security</span><i></i>
                <span>Club House</span><i></i>
                <span>Fitness</span><i></i>
                <span>Swimming Pool</span><i></i>
                <span>Children's Play</span><i></i>
                <span>Landscaped Spaces</span><i></i>
                <span>24×7 Security</span><i></i>
            </div>
        </div>

        <div class="graciaAmenities__grid">
            <article class="graciaAmenityBlock graciaAmenityBlock--large" data-index="01" data-reveal="up">
                <span>01</span>
                <div class="graciaAmenityBlock__symbol graciaAmenityBlock__symbol--club" aria-hidden="true">
                    <i></i><i></i><i></i>
                </div>
                <div>
                    <h3>Club House</h3>
                    <p>A flexible social setting for gatherings, celebrations, and everyday community life.</p>
                </div>
            </article>

            <article class="graciaAmenityBlock" data-index="02" data-reveal="up" data-reveal-delay="70">
                <span>02</span>
                <div class="graciaAmenityBlock__symbol graciaAmenityBlock__symbol--fitness" aria-hidden="true">
                    <i></i><i></i><i></i>
                </div>
                <div>
                    <h3>Fitness</h3>
                    <p>Make movement easier to sustain by keeping it close to home.</p>
                </div>
            </article>

            <article class="graciaAmenityBlock graciaAmenityBlock--dark" data-index="03" data-reveal="up"
                data-reveal-delay="140">
                <span>03</span>
                <div class="graciaAmenityBlock__symbol graciaAmenityBlock__symbol--pool" aria-hidden="true">
                    <i></i><i></i><i></i>
                </div>
                <div>
                    <h3>Swimming Pool</h3>
                    <p>A refreshing pause for active mornings and slower evenings.</p>
                </div>
            </article>

            <article class="graciaAmenityBlock" data-index="04" data-reveal="up">
                <span>04</span>
                <div class="graciaAmenityBlock__symbol graciaAmenityBlock__symbol--play" aria-hidden="true">
                    <i></i><i></i><i></i>
                </div>
                <div>
                    <h3>Children's Play</h3>
                    <p>Safe space for curiosity, movement, and friendships to grow.</p>
                </div>
            </article>

            <article class="graciaAmenityBlock graciaAmenityBlock--wide" data-index="05" data-reveal="up"
                data-reveal-delay="70">
                <span>05</span>
                <div class="graciaAmenityBlock__symbol graciaAmenityBlock__symbol--garden" aria-hidden="true">
                    <i></i><i></i><i></i>
                </div>
                <div>
                    <h3>Landscaped Spaces</h3>
                    <p>Green edges and open-air moments soften the pace of daily residential life.</p>
                </div>
            </article>

            <article class="graciaAmenityBlock graciaAmenityBlock--accent" data-index="06" data-reveal="up"
                data-reveal-delay="140">
                <span>06</span>
                <div class="graciaAmenityBlock__symbol graciaAmenityBlock__symbol--security" aria-hidden="true">
                    <i></i><i></i><i></i>
                </div>
                <div>
                    <h3>Secure Living</h3>
                    <p>Controlled access and round-the-clock attention for greater everyday confidence.</p>
                </div>
            </article>
        </div>
    </section>

    {{-- Full-width location --}}
    <section class="graciaLocation graciaFullBleed" aria-labelledby="graciaLocationTitle">
        <div class="graciaLocation__map" data-reveal="fade" aria-hidden="true">
            <div class="graciaLocation__mapGrid"></div>
            <span class="graciaLocation__route graciaLocation__route--one"></span>
            <span class="graciaLocation__route graciaLocation__route--two"></span>
            <span class="graciaLocation__route graciaLocation__route--three"></span>

            <div class="graciaLocation__marker">
                <span>SG</span>
                <i></i>
            </div>

            <div class="graciaLocation__mapLabel graciaLocation__mapLabel--one">
                Ahmedabad West
            </div>

            <div class="graciaLocation__mapLabel graciaLocation__mapLabel--two">
                Bopal-Ghuma Road
            </div>

            <div class="graciaLocation__legend">
                <span><i></i> Siddhipriya Gracia</span>
                <small>Connected to the western growth corridor</small>
            </div>

            <div class="graciaLocation__compass">
                <span>N</span>
                <i></i>
                <small>West Ahmedabad</small>
            </div>

            <div class="graciaLocation__coordinates">
                <small>Project address</small>
                <strong>23, Greencity</strong>
                <span>Bopal-Ghuma Road</span>
            </div>
        </div>

        <div class="graciaLocation__content">
            <p class="graciaLabel" data-reveal="fade">
                <span>04</span>
                A connected address
            </p>

            <h2 id="graciaLocationTitle" data-reveal="line">
                <span>Near the places</span>
                <em>that shape your routine.</em>
            </h2>

            <p data-reveal="up">
                Live within Ahmedabad's growing western corridor while keeping essential everyday destinations
                comfortably connected.
            </p>

            <div class="graciaLocation__placeGrid" data-reveal="up" data-reveal-delay="70">
                <span><i>01</i> Schools</span>
                <span><i>02</i> Healthcare</span>
                <span><i>03</i> Retail</span>
                <span><i>04</i> Daily essentials</span>
            </div>

            <div class="graciaLocation__actions" data-reveal="up" data-reveal-delay="120">
                <a href="https://www.google.com/maps/search/?api=1&query=23%2C%20Greencity%2C%20Vrajshyam%20co-society%2C%20Bopal%20-%20Ghuma%20Rd%2C%20Ahmedabad%2C%20Gujarat%20380058"
                    class="btn" target="_blank" rel="noopener">
                    View on Google Maps
                </a>

                <a href="{{ route('contact') }}" class="graciaTextButton">
                    Contact the team
                </a>
            </div>
        </div>
    </section>

    {{-- Full-width final CTA --}}
    <section class="graciaVisit graciaFullBleed" id="inquiry" aria-labelledby="graciaVisitTitle">
        <div class="graciaVisit__lines" aria-hidden="true"></div>
        <div class="graciaVisit__monogram" data-parallax data-parallax-speed="-0.025" aria-hidden="true">G</div>
        <div class="graciaVisit__word" aria-hidden="true">VISIT</div>

        <div class="graciaVisit__layout">
            <div class="graciaVisit__content">
                <p class="graciaLabel graciaLabel--light" data-reveal="fade">
                    <span>05</span>
                    See the address in person
                </p>

                <h2 id="graciaVisitTitle" data-reveal="line">
                    <span>Your next home</span>
                    <em>should feel right.</em>
                </h2>

                <p class="graciaVisit__lead" data-reveal="up">
                    Walk through the project, understand the residences, and evaluate the location without relying
                    only on a brochure.
                </p>

                <a href="{{ route('contact') }}#inquiry" class="graciaVisit__button" data-reveal="up"
                    data-reveal-delay="90">
                    <span>Schedule a site visit</span>
                    <i aria-hidden="true">↗</i>
                </a>
            </div>

            <aside class="graciaVisitCard" data-reveal="scale" aria-label="What to expect during a site visit">
                <div class="graciaVisitCard__top">
                    <span>Private walkthrough</span>
                    <i>By appointment</i>
                </div>

                <div class="graciaVisitCard__window" aria-hidden="true">
                    <span class="graciaVisitCard__sun"></span>
                    <span class="graciaVisitCard__tower graciaVisitCard__tower--one"></span>
                    <span class="graciaVisitCard__tower graciaVisitCard__tower--two"></span>
                    <span class="graciaVisitCard__ground"></span>
                </div>

                <div class="graciaVisitCard__steps">
                    <article>
                        <span>01</span>
                        <div>
                            <strong>Project walkthrough</strong>
                            <small>Understand the arrival, amenities, and common areas.</small>
                        </div>
                    </article>

                    <article>
                        <span>02</span>
                        <div>
                            <strong>Residence discussion</strong>
                            <small>Compare configurations and practical planning.</small>
                        </div>
                    </article>

                    <article>
                        <span>03</span>
                        <div>
                            <strong>Location review</strong>
                            <small>Evaluate access and everyday connectivity.</small>
                        </div>
                    </article>
                </div>

                <div class="graciaVisitCard__address">
                    <small>Meeting point</small>
                    <strong>23, Greencity, Bopal-Ghuma Road</strong>
                </div>
            </aside>
        </div>
    </section>


@endsection

@section('js')
    <script src="{{ asset('assets/js/home.js') }}" defer></script>
@endsection
