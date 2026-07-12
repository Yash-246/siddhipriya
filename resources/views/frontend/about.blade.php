@extends('layouts.front')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
@endsection

@section('content')
    <div class="studioAbout" data-studio-about>

        {{-- Page progress --}}
        <div class="studioAboutProgress" aria-hidden="true">
            <span data-about-page-progress></span>
        </div>

        {{-- Editorial hero --}}
        <section class="studioHero studioFullBleed" aria-labelledby="studioHeroTitle">
            <div class="studioHero__grid" aria-hidden="true"></div>
            <div class="studioHero__wash" data-about-parallax data-speed="-0.035" aria-hidden="true"></div>

            <div class="studioHero__meta">
                <p class="studioKicker studioKicker--light" data-about-reveal="fade">
                    <span>About Gracia</span>
                    Residential thinking · Ahmedabad West
                </p>

                <p class="studioHero__code" data-about-reveal="fade">
                    23.0° N · Bopal-Ghuma Road
                </p>
            </div>

            <div class="studioHero__layout">
                <div class="studioHero__copy">
                    <p class="studioHero__eyebrow" data-about-reveal="up">
                        A residential address shaped around real life
                    </p>

                    <h1 id="studioHeroTitle" data-about-reveal="title">
                        <span>Thoughtful</span>
                        <span>by design.</span>
                        <em>Comfortable by nature.</em>
                    </h1>

                    <div class="studioHero__intro" data-about-reveal="up" data-about-delay="110">
                        <p>
                            Siddhipriya Gracia is not designed around visual noise. It is designed around the things
                            people feel every day—light, movement, privacy, connection, and the calm of coming home.
                        </p>

                        <div class="studioHero__actions">
                            <a href="#studio-story" class="studioPrimaryLink">
                                Discover the thinking
                                <span aria-hidden="true">↓</span>
                            </a>

                            <a href="{{ route('project.show', 'siddhipriya-gracia') }}" class="studioQuietLink">
                                View project
                            </a>
                        </div>
                    </div>
                </div>

                <div class="studioHeroPlan" data-about-reveal="scale" aria-label="Animated architectural plan illustration">
                    <div class="studioHeroPlan__paper" data-about-plan>
                        <div class="studioHeroPlan__coordinates" aria-hidden="true">
                            <span>G-01</span>
                            <span>N 23.0°</span>
                            <span>W 72.5°</span>
                        </div>

                        <svg class="studioHeroPlan__drawing" viewBox="0 0 680 720" role="img"
                            aria-label="Abstract residential blueprint">
                            <g class="studioHeroPlan__lines">
                                <path d="M70 92H610V625H70Z" />
                                <path d="M70 240H610" />
                                <path d="M70 430H610" />
                                <path d="M262 92V625" />
                                <path d="M456 92V625" />
                                <path d="M262 328H456" />
                                <path d="M165 92V240" />
                                <path d="M545 430V625" />
                                <path d="M110 132H222V200H110Z" />
                                <path d="M302 132H416V286H302Z" />
                                <path d="M496 132H572V200H496Z" />
                                <path d="M110 474H222V580H110Z" />
                                <path d="M302 474H416V580H302Z" />
                                <path d="M487 474H572V580H487Z" />
                                <path d="M85 650H595" />
                                <path d="M95 668H585" />
                            </g>

                            <g class="studioHeroPlan__doors">
                                <path d="M262 270C227 270 200 297 200 332" />
                                <path d="M456 375C491 375 518 402 518 437" />
                                <path d="M165 240C165 210 141 186 111 186" />
                            </g>

                            <g class="studioHeroPlan__measure">
                                <path d="M44 92V625" />
                                <path d="M34 92H54" />
                                <path d="M34 625H54" />
                                <path d="M70 56H610" />
                                <path d="M70 46V66" />
                                <path d="M610 46V66" />
                            </g>
                        </svg>

                        <div class="studioHeroPlan__room studioHeroPlan__room--one">
                            <small>Living</small>
                            <strong>Light + flow</strong>
                        </div>

                        <div class="studioHeroPlan__room studioHeroPlan__room--two">
                            <small>Private zone</small>
                            <strong>Rest + quiet</strong>
                        </div>

                        <div class="studioHeroPlan__room studioHeroPlan__room--three">
                            <small>Shared edge</small>
                            <strong>Connect + pause</strong>
                        </div>

                        <div class="studioHeroPlan__stamp">
                            <span>SG</span>
                            <small>Designed for everyday living</small>
                        </div>

                        <div class="studioHeroPlan__scan" aria-hidden="true"></div>
                    </div>

                    <div class="studioHeroPlan__caption">
                        <span>Planning before decoration</span>
                        <i></i>
                        <span>Purpose before excess</span>
                    </div>
                </div>
            </div>

            <div class="studioHero__footer" aria-label="Project philosophy">
                <article data-about-reveal="up">
                    <span>01</span>
                    <p>Clear planning</p>
                </article>

                <article data-about-reveal="up" data-about-delay="70">
                    <span>02</span>
                    <p>Warm restraint</p>
                </article>

                <article data-about-reveal="up" data-about-delay="140">
                    <span>03</span>
                    <p>Everyday usefulness</p>
                </article>

                <article data-about-reveal="up" data-about-delay="210">
                    <span>04</span>
                    <p>Connected living</p>
                </article>
            </div>
        </section>

        {{-- Moving statement --}}
        <section class="studioStatement studioFullBleed" aria-label="Our belief">
            <div class="studioStatement__track" aria-hidden="true">
                <span>Homes should simplify life</span><i></i>
                <span>Homes should simplify life</span><i></i>
                <span>Homes should simplify life</span><i></i>
                <span>Homes should simplify life</span><i></i>
            </div>

            <div class="studioStatement__content">
                <p class="studioKicker" data-about-reveal="fade">
                    <span>Our belief</span>
                    The quiet decisions matter most
                </p>

                <blockquote data-about-reveal="title">
                    “A good home does not ask for attention. It quietly makes every day work better.”
                </blockquote>

                <div class="studioStatement__aside" data-about-reveal="up">
                    <p>
                        Gracia is imagined as a composed residential address—one where planning, material restraint,
                        shared spaces, and location work together instead of competing for attention.
                    </p>

                    <a href="{{ route('contact') }}" class="studioTextArrow">
                        Talk to the team
                        <span aria-hidden="true">↗</span>
                    </a>
                </div>
            </div>
        </section>

        {{-- Sticky story --}}
        <section class="studioStory studioFullBleed" id="studio-story" aria-labelledby="studioStoryTitle"
            data-about-story>
            <div class="studioStory__head">
                <p class="studioKicker studioKicker--light">
                    <span>How Gracia takes shape</span>
                    Four layers · One clear experience
                </p>

                <div class="studioStory__progress" aria-hidden="true">
                    <span data-about-story-progress></span>
                </div>
            </div>

            <div class="studioStory__layout">
                <div class="studioStory__visualColumn">
                    <div class="studioStoryVisual" data-about-story-visual data-active="01">
                        <div class="studioStoryVisual__grid" aria-hidden="true"></div>

                        <div class="studioStoryVisual__frame">
                            <span class="studioStoryVisual__line studioStoryVisual__line--a"></span>
                            <span class="studioStoryVisual__line studioStoryVisual__line--b"></span>
                            <span class="studioStoryVisual__line studioStoryVisual__line--c"></span>
                            <span class="studioStoryVisual__line studioStoryVisual__line--d"></span>

                            <div class="studioStoryVisual__shape studioStoryVisual__shape--one"></div>
                            <div class="studioStoryVisual__shape studioStoryVisual__shape--two"></div>
                            <div class="studioStoryVisual__shape studioStoryVisual__shape--three"></div>

                            <div class="studioStoryVisual__focus">
                                <small>Current layer</small>
                                <strong data-about-story-title>Begin with people</strong>
                            </div>
                        </div>

                        <div class="studioStoryVisual__index">
                            <strong data-about-story-index>01</strong>
                            <span>/</span>
                            <small>04</small>
                        </div>
                    </div>
                </div>

                <div class="studioStory__content">
                    <header>
                        <h2 id="studioStoryTitle" data-about-reveal="title">
                            A home is built in layers, not gestures.
                        </h2>
                    </header>

                    <article class="studioStoryStep is-active" data-about-step data-index="01"
                        data-title="Begin with people">
                        <span>01</span>

                        <div>
                            <small>People</small>
                            <h3>Start with how families actually live.</h3>
                            <p>
                                Morning routines, shared meals, work, rest, privacy, and movement are more important
                                than decorative spectacle. Planning begins with behaviour.
                            </p>
                        </div>
                    </article>

                    <article class="studioStoryStep" data-about-step data-index="02" data-title="Read the place">
                        <span>02</span>

                        <div>
                            <small>Place</small>
                            <h3>Respond to light, climate, access, and neighbourhood.</h3>
                            <p>
                                The Bopal-Ghuma context shapes orientation, arrival, connectivity, and the rhythm
                                between private homes and shared residential life.
                            </p>
                        </div>
                    </article>

                    <article class="studioStoryStep" data-about-step data-index="03"
                        data-title="Give every space a role">
                        <span>03</span>

                        <div>
                            <small>Purpose</small>
                            <h3>Make every space useful before making it impressive.</h3>
                            <p>
                                Circulation, amenities, private rooms, and social zones should each perform clearly.
                                Good planning removes wasted space and unnecessary friction.
                            </p>
                        </div>
                    </article>

                    <article class="studioStoryStep" data-about-step data-index="04"
                        data-title="Design beyond trends">
                        <span>04</span>

                        <div>
                            <small>Longevity</small>
                            <h3>Choose restraint so the address can age with confidence.</h3>
                            <p>
                                Warm materials, calm proportions, and practical details remain relevant longer than
                                visual trends designed only for first impressions.
                            </p>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        {{-- Design DNA --}}
        <section class="studioDna studioFullBleed" aria-labelledby="studioDnaTitle">
            <div class="studioDna__top">
                <p class="studioKicker" data-about-reveal="fade">
                    <span>Design DNA</span>
                    Five quiet principles
                </p>

                <div class="studioDna__intro">
                    <h2 id="studioDnaTitle" data-about-reveal="title">
                        Details that improve life without demanding attention.
                    </h2>

                    <p data-about-reveal="up">
                        The strongest parts of a residential experience are often invisible at first glance. They are
                        felt through comfort, orientation, clarity, and the ease of repeating daily routines.
                    </p>
                </div>
            </div>

            <div class="studioDna__grid">
                <article class="studioDnaCard studioDnaCard--feature" data-about-reveal="up">
                    <div class="studioDnaCard__visual studioDnaCard__visual--light" aria-hidden="true">
                        <span></span><span></span><span></span><span></span>
                    </div>

                    <div class="studioDnaCard__copy">
                        <span>01</span>
                        <h3>Natural light</h3>
                        <p>Daylight should shape the atmosphere of the home, not remain an afterthought.</p>
                    </div>
                </article>

                <article class="studioDnaCard" data-about-reveal="up" data-about-delay="70">
                    <div class="studioDnaCard__visual studioDnaCard__visual--flow" aria-hidden="true">
                        <span></span><span></span><span></span>
                    </div>

                    <div class="studioDnaCard__copy">
                        <span>02</span>
                        <h3>Clear movement</h3>
                        <p>Circulation should feel intuitive, comfortable, and free from wasted corners.</p>
                    </div>
                </article>

                <article class="studioDnaCard studioDnaCard--dark" data-about-reveal="up"
                    data-about-delay="140">
                    <div class="studioDnaCard__visual studioDnaCard__visual--privacy" aria-hidden="true">
                        <span></span><span></span><span></span>
                    </div>

                    <div class="studioDnaCard__copy">
                        <span>03</span>
                        <h3>Balanced privacy</h3>
                        <p>Social and private spaces should connect without collapsing into one another.</p>
                    </div>
                </article>

                <article class="studioDnaCard studioDnaCard--wide" data-about-reveal="up">
                    <div class="studioDnaCard__visual studioDnaCard__visual--community" aria-hidden="true">
                        <span></span><span></span><span></span><span></span>
                    </div>

                    <div class="studioDnaCard__copy">
                        <span>04</span>
                        <h3>Purposeful community</h3>
                        <p>
                            Shared spaces should support movement, play, celebration, conversation, and pause—not just
                            fill a brochure checklist.
                        </p>
                    </div>
                </article>

                <article class="studioDnaCard studioDnaCard--wide studioDnaCard--accent"
                    data-about-reveal="up" data-about-delay="70">
                    <div class="studioDnaCard__visual studioDnaCard__visual--location" aria-hidden="true">
                        <span></span><span></span><span></span>
                    </div>

                    <div class="studioDnaCard__copy">
                        <span>05</span>
                        <h3>Connected address</h3>
                        <p>
                            Location matters when schools, healthcare, retail, workplaces, and essentials remain
                            practically connected to everyday life.
                        </p>
                    </div>
                </article>
            </div>
        </section>

        {{-- Location / context --}}
        <section class="studioContext studioFullBleed" aria-labelledby="studioContextTitle">
            <div class="studioContext__map" data-about-reveal="scale">
                <div class="studioContext__mapGrid" aria-hidden="true"></div>

                <span class="studioContext__road studioContext__road--one" aria-hidden="true"></span>
                <span class="studioContext__road studioContext__road--two" aria-hidden="true"></span>
                <span class="studioContext__road studioContext__road--three" aria-hidden="true"></span>
                <span class="studioContext__road studioContext__road--four" aria-hidden="true"></span>

                <div class="studioContext__pin">
                    <span>SG</span>
                    <i></i>
                </div>

                <div class="studioContext__label studioContext__label--one">
                    Ahmedabad West
                </div>

                <div class="studioContext__label studioContext__label--two">
                    Bopal-Ghuma Road
                </div>

                <div class="studioContext__compass" aria-hidden="true">
                    <span>N</span>
                    <i></i>
                </div>
            </div>

            <div class="studioContext__copy">
                <p class="studioKicker studioKicker--light" data-about-reveal="fade">
                    <span>The address</span>
                    Connected without feeling crowded
                </p>

                <h2 id="studioContextTitle" data-about-reveal="title">
                    A home is also the life around it.
                </h2>

                <p data-about-reveal="up">
                    Gracia sits within Ahmedabad’s growing western corridor, close to the everyday destinations that
                    shape routine—while preserving the calmer residential character families look for.
                </p>

                <div class="studioContext__list" data-about-reveal="up" data-about-delay="100">
                    <span>Schools & learning</span>
                    <span>Healthcare</span>
                    <span>Retail & essentials</span>
                    <span>Workplace connectivity</span>
                </div>

                <a href="https://www.google.com/maps/search/?api=1&query=23%2C%20Greencity%2C%20Vrajshyam%20co-society%2C%20Bopal%20-%20Ghuma%20Rd%2C%20Ahmedabad%2C%20Gujarat%20380058"
                    target="_blank" rel="noopener" class="studioContext__link" data-about-reveal="up"
                    data-about-delay="160">
                    Open location
                    <span aria-hidden="true">↗</span>
                </a>
            </div>
        </section>

        {{-- Closing --}}
        <section class="studioClosing studioFullBleed" aria-labelledby="studioClosingTitle">
            <div class="studioClosing__grid" aria-hidden="true"></div>
            <div class="studioClosing__number" data-about-parallax data-speed="-0.025" aria-hidden="true">01</div>

            <div class="studioClosing__content">
                <p class="studioKicker" data-about-reveal="fade">
                    <span>Experience Gracia</span>
                    See the thinking in person
                </p>

                <h2 id="studioClosingTitle" data-about-reveal="title">
                    A plan becomes meaningful when you can walk through it.
                </h2>

                <div class="studioClosing__bottom">
                    <p data-about-reveal="up">
                        Explore the residences, understand the planning, experience the location, and decide from more
                        than a brochure.
                    </p>

                    <div class="studioClosing__actions" data-about-reveal="up" data-about-delay="100">
                        <a href="{{ route('contact') }}#inquiry" class="studioClosing__primary">
                            Schedule a site visit
                            <span aria-hidden="true">↗</span>
                        </a>

                        <a href="{{ route('contact') }}" class="studioClosing__secondary">
                            Contact the team
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/js/about.js') }}" defer></script>
@endsection
