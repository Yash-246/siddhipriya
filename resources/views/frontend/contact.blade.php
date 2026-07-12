@extends('layouts.front')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
@endsection

@section('content')
    <div class="contactExperience" data-contact-page>

        <div class="contactPageProgress" aria-hidden="true">
            <span data-contact-page-progress></span>
        </div>

        {{-- Contact hero --}}
        <section class="contactHero contactFullBleed" aria-labelledby="contactHeroTitle">
            <div class="contactHero__grid" aria-hidden="true"></div>
            <div class="contactHero__orb" data-contact-parallax data-speed="-0.035" aria-hidden="true"></div>

            <div class="contactHero__meta">
                <p class="contactKicker contactKicker--light" data-contact-reveal="fade">
                    <span>Contact Gracia</span>
                    Site visits · Project enquiries · Location
                </p>

                <p class="contactHero__location" data-contact-reveal="fade">
                    Bopal-Ghuma Road · Ahmedabad
                </p>
            </div>

            <div class="contactHero__layout">
                <div class="contactHero__copy">
                    <p class="contactHero__eyebrow" data-contact-reveal="up">
                        Start with a real conversation
                    </p>

                    <h1 id="contactHeroTitle" data-contact-reveal="title">
                        <span>Let’s make</span>
                        <span>your visit</span>
                        <em>worth the time.</em>
                    </h1>

                    <p class="contactHero__lead" data-contact-reveal="up" data-contact-delay="90">
                        Tell us what you want to understand—residence options, planning, amenities, location, or a
                        private walkthrough. The form below keeps the enquiry clear and useful.
                    </p>

                    <div class="contactHero__actions" data-contact-reveal="up" data-contact-delay="150">
                        <a href="#inquiry" class="contactPrimaryLink">
                            Plan a site visit
                            <span aria-hidden="true">↓</span>
                        </a>

                        <a href="https://www.google.com/maps/search/?api=1&query=23%2C%20Greencity%2C%20Vrajshyam%20co-society%2C%20Bopal%20-%20Ghuma%20Rd%2C%20Ahmedabad%2C%20Gujarat%20380058"
                            class="contactQuietLink" target="_blank" rel="noopener">
                            Open location
                        </a>
                    </div>
                </div>

                <div class="contactHeroRoute" data-contact-reveal="scale" aria-label="Animated route to Siddhipriya Gracia">
                    <div class="contactHeroRoute__surface">
                        <div class="contactHeroRoute__mesh" aria-hidden="true"></div>

                        <span class="contactHeroRoute__road contactHeroRoute__road--one" aria-hidden="true"></span>
                        <span class="contactHeroRoute__road contactHeroRoute__road--two" aria-hidden="true"></span>
                        <span class="contactHeroRoute__road contactHeroRoute__road--three" aria-hidden="true"></span>
                        <span class="contactHeroRoute__road contactHeroRoute__road--four" aria-hidden="true"></span>

                        <svg class="contactHeroRoute__path" viewBox="0 0 680 620" aria-hidden="true">
                            <path data-contact-route-path
                                d="M86 510 C170 468, 162 374, 264 348 C350 326, 346 216, 448 194 C520 179, 560 126, 594 72" />
                        </svg>

                        <div class="contactHeroRoute__start">
                            <span></span>
                            <small>Your enquiry</small>
                        </div>

                        <div class="contactHeroRoute__pin">
                            <span>SG</span>
                            <i></i>
                        </div>

                        <div class="contactHeroRoute__card contactHeroRoute__card--address">
                            <small>Project address</small>
                            <strong>Bopal-Ghuma Road</strong>
                            <span>Ahmedabad West</span>
                        </div>

                        <div class="contactHeroRoute__card contactHeroRoute__card--visit">
                            <small>Visit format</small>
                            <strong>Private walkthrough</strong>
                            <span>Preferred date requested below</span>
                        </div>

                        <div class="contactHeroRoute__compass" aria-hidden="true">
                            <span>N</span>
                            <i></i>
                        </div>
                    </div>

                    <div class="contactHeroRoute__caption">
                        <span>23, Greencity</span>
                        <i></i>
                        <span>Vrajshyam Co-Society</span>
                        <i></i>
                        <span>Gujarat 380058</span>
                    </div>
                </div>
            </div>

            <div class="contactHero__steps" aria-label="Enquiry process">
                <article data-contact-reveal="up">
                    <span>01</span>
                    <div>
                        <strong>Tell us your interest</strong>
                        <p>Share what you want to explore.</p>
                    </div>
                </article>

                <article data-contact-reveal="up" data-contact-delay="70">
                    <span>02</span>
                    <div>
                        <strong>Choose a preferred visit</strong>
                        <p>Select a convenient date and time window.</p>
                    </div>
                </article>

                <article data-contact-reveal="up" data-contact-delay="140">
                    <span>03</span>
                    <div>
                        <strong>Get confirmation</strong>
                        <p>The team can confirm the final appointment.</p>
                    </div>
                </article>
            </div>
        </section>

        {{-- Main enquiry --}}
        <section class="contactInquiry contactFullBleed" id="inquiry" aria-labelledby="contactInquiryTitle">
            <div class="contactInquiry__grid" aria-hidden="true"></div>

            <div class="contactInquiry__intro">
                <p class="contactKicker" data-contact-reveal="fade">
                    <span>Plan your visit</span>
                    A focused enquiry takes less time to answer
                </p>

                <h2 id="contactInquiryTitle" data-contact-reveal="title">
                    Tell us what would make the visit useful for you.
                </h2>

                <p data-contact-reveal="up">
                    Complete the essentials below. Avoid vague messages—specific questions help the project team
                    prepare the right information before you arrive.
                </p>

                <div class="contactInquiry__promise" data-contact-reveal="up" data-contact-delay="80">
                    <article>
                        <span>01</span>
                        <div>
                            <strong>Residence discussion</strong>
                            <p>Compare available configurations and planning priorities.</p>
                        </div>
                    </article>

                    <article>
                        <span>02</span>
                        <div>
                            <strong>Project walkthrough</strong>
                            <p>Understand arrival, common spaces, amenities, and circulation.</p>
                        </div>
                    </article>

                    <article>
                        <span>03</span>
                        <div>
                            <strong>Location context</strong>
                            <p>Evaluate the Bopal-Ghuma address beyond a map pin.</p>
                        </div>
                    </article>
                </div>
            </div>

            <div class="contactFormPanel" data-contact-reveal="scale">
                <div class="contactFormPanel__top">
                    <div>
                        <small>Site visit request</small>
                        <strong>Project enquiry form</strong>
                    </div>

                    <div class="contactFormPanel__completion" aria-label="Form completion">
                        <span data-contact-form-percent>0%</span>
                        <i><b data-contact-form-progress></b></i>
                    </div>
                </div>

                <form class="contactForm" action="{{ url('/contact') }}" method="POST" data-contact-form novalidate>
                    @csrf

                    <div class="contactForm__honeypot" aria-hidden="true">
                        <label>
                            Website
                            <input type="text" name="website" tabindex="-1" autocomplete="off">
                        </label>
                    </div>

                    <div class="contactField contactField--wide">
                        <label for="contact-name">
                            Full name
                            <span aria-hidden="true">*</span>
                        </label>

                        <input id="contact-name" name="name" type="text" value="{{ old('name') }}" autocomplete="name"
                            placeholder="Enter your full name" required data-contact-required>

                        <small class="contactField__hint">The name the project team should use.</small>

                        @error('name')
                            <small class="contactField__error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="contactField">
                        <label for="contact-phone">
                            Phone number
                            <span aria-hidden="true">*</span>
                        </label>

                        <input id="contact-phone" name="phone" type="tel" value="{{ old('phone') }}" autocomplete="tel"
                            inputmode="tel" placeholder="+91 98765 43210" required data-contact-required>

                        @error('phone')
                            <small class="contactField__error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="contactField">
                        <label for="contact-email">Email address</label>

                        <input id="contact-email" name="email" type="email" value="{{ old('email') }}" autocomplete="email"
                            placeholder="you@example.com">

                        @error('email')
                            <small class="contactField__error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="contactField">
                        <label for="contact-interest">
                            I am interested in
                            <span aria-hidden="true">*</span>
                        </label>

                        <select id="contact-interest" name="interest" required data-contact-required>
                            <option value="">Select an option</option>
                            <option value="2-bhk" {{ old('interest') === '2-bhk' ? 'selected' : '' }}>2 BHK residence</option>
                            <option value="3-bhk" {{ old('interest') === '3-bhk' ? 'selected' : '' }}>3 BHK residence</option>
                            <option value="site-visit" {{ old('interest') === 'site-visit' ? 'selected' : '' }}>Site visit
                            </option>
                            <option value="project-details" {{ old('interest') === 'project-details' ? 'selected' : '' }}>
                                Project details</option>
                            <option value="other" {{ old('interest') === 'other' ? 'selected' : '' }}>Other enquiry</option>
                        </select>

                        @error('interest')
                            <small class="contactField__error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="contactField">
                        <label for="contact-date">Preferred visit date</label>

                        <input id="contact-date" name="preferred_date" type="date" value="{{ old('preferred_date') }}"
                            data-contact-date>

                        @error('preferred_date')
                            <small class="contactField__error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="contactField contactField--wide">
                        <span class="contactField__label">Preferred time window</span>

                        <div class="contactTimeChoices" data-contact-time-group>
                            <label>
                                <input type="radio" name="preferred_time" value="morning" {{-- {{
                                    old('preferred_time')==='morning' ? 'checked' : '' }}> --}}
                                <span>
                                    <small>Morning</small>
                                    <strong>9 AM – 12 PM</strong>
                                </span>
                            </label>

                            <label>
                                <input type="radio" name="preferred_time" value="afternoon" {{ old('preferred_time') === 'afternoon' ? 'checked' : '' }}>
                                <span>
                                    <small>Afternoon</small>
                                    <strong>12 PM – 4 PM</strong>
                                </span>
                            </label>

                            <label>
                                <input type="radio" name="preferred_time" value="evening" {{ old('preferred_time') === 'evening' ? 'checked' : '' }}>
                                <span>
                                    <small>Evening</small>
                                    <strong>4 PM – 7 PM</strong>
                                </span>
                            </label>
                        </div>

                        @error('preferred_time')
                            <small class="contactField__error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="contactField contactField--wide">
                        <label for="contact-message">What would you like to understand?</label>

                        <textarea id="contact-message" name="message" rows="5"
                            placeholder="Example: I want to compare 2 BHK and 3 BHK planning, understand current availability, and schedule a weekend visit."
                            data-contact-message>{{ old('message') }}</textarea>

                        <div class="contactField__footer">
                            <small>Specific questions lead to a better prepared visit.</small>
                            <small><span data-contact-character-count>0</span>/600</small>
                        </div>

                        @error('message')
                            <small class="contactField__error">{{ $message }}</small>
                        @enderror
                    </div>

                    <label class="contactConsent contactField--wide">
                        <input type="checkbox" name="consent" value="1" required data-contact-required {{ old('consent') ? 'checked' : '' }}>

                        <span>
                            I agree to be contacted regarding this project enquiry.
                            <small>Your details should only be used to respond to this request.</small>
                        </span>
                    </label>

                    @error('consent')
                        <small class="contactField__error contactField--wide">{{ $message }}</small>
                    @enderror

                    <button class="contactSubmit contactField--wide" type="submit">
                        <span>
                            Submit enquiry
                            <small>Request a project conversation</small>
                        </span>

                        <i aria-hidden="true">↗</i>
                    </button>

                    <p class="contactForm__status contactField--wide" data-contact-form-status aria-live="polite"></p>
                </form>
            </div>
        </section>

        {{-- Address and visit information --}}
        <section class="contactAddress contactFullBleed" aria-labelledby="contactAddressTitle">
            <div class="contactAddress__map" data-contact-reveal="scale">
                <div class="contactAddress__mapGrid" aria-hidden="true"></div>

                <span class="contactAddress__road contactAddress__road--one" aria-hidden="true"></span>
                <span class="contactAddress__road contactAddress__road--two" aria-hidden="true"></span>
                <span class="contactAddress__road contactAddress__road--three" aria-hidden="true"></span>
                <span class="contactAddress__road contactAddress__road--four" aria-hidden="true"></span>

                <div class="contactAddress__pulse" aria-hidden="true"></div>

                <div class="contactAddress__marker">
                    <span>SG</span>
                    <i></i>
                </div>

                <div class="contactAddress__label contactAddress__label--one">
                    Ahmedabad West
                </div>

                <div class="contactAddress__label contactAddress__label--two">
                    Bopal-Ghuma Road
                </div>

                <div class="contactAddress__coordinate" aria-hidden="true">
                    <span>23.0° N</span>
                    <span>72.5° E</span>
                </div>
            </div>

            <div class="contactAddress__content">
                <p class="contactKicker contactKicker--light" data-contact-reveal="fade">
                    <span>Find the project</span>
                    A connected residential address
                </p>

                <h2 id="contactAddressTitle" data-contact-reveal="title">
                    Visit the location, not just the listing.
                </h2>

                <address data-contact-reveal="up">
                    23, Greencity, Vrajshyam Co-Society,<br>
                    Bopal-Ghuma Road, Ahmedabad,<br>
                    Gujarat 380058
                </address>

                <div class="contactAddress__actions" data-contact-reveal="up" data-contact-delay="80">
                    <a href="https://www.google.com/maps/search/?api=1&query=23%2C%20Greencity%2C%20Vrajshyam%20co-society%2C%20Bopal%20-%20Ghuma%20Rd%2C%20Ahmedabad%2C%20Gujarat%20380058"
                        target="_blank" rel="noopener" class="contactAddress__primary">
                        Open in Google Maps
                        <span aria-hidden="true">↗</span>
                    </a>

                    <a href="#inquiry" class="contactAddress__secondary">
                        Request a visit
                    </a>
                </div>

                <div class="contactAddress__notes">
                    <article data-contact-reveal="up">
                        <span>01</span>
                        <div>
                            <strong>Arrive prepared</strong>
                            <p>Bring the questions and priorities that affect your decision.</p>
                        </div>
                    </article>

                    <article data-contact-reveal="up" data-contact-delay="70">
                        <span>02</span>
                        <div>
                            <strong>Compare carefully</strong>
                            <p>Look beyond room counts and examine circulation, light, privacy, and utility.</p>
                        </div>
                    </article>

                    <article data-contact-reveal="up" data-contact-delay="140">
                        <span>03</span>
                        <div>
                            <strong>Evaluate the address</strong>
                            <p>Consider the surrounding routine, not only travel distance on a map.</p>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        {{-- FAQ --}}
        <section class="contactFaq contactFullBleed" aria-labelledby="contactFaqTitle">
            <div class="contactFaq__head">
                <p class="contactKicker" data-contact-reveal="fade">
                    <span>Before you enquire</span>
                    Useful questions, clear answers
                </p>

                <div>
                    <h2 id="contactFaqTitle" data-contact-reveal="title">
                        Make the first conversation more productive.
                    </h2>

                    <p data-contact-reveal="up">
                        These are practical starting points. Final project, availability, pricing, and visit details
                        should be confirmed directly with the authorised project team.
                    </p>
                </div>
            </div>

            <div class="contactFaq__list" data-contact-accordion>
                <article class="contactFaqItem is-open" data-contact-reveal="up">
                    <button type="button" aria-expanded="true">
                        <span>01</span>
                        <strong>What should I mention in my enquiry?</strong>
                        <i aria-hidden="true"></i>
                    </button>

                    <div class="contactFaqItem__answer">
                        <p>
                            State the residence type you are considering, your preferred visit date, your budget or
                            decision priorities where relevant, and the specific questions you want answered.
                        </p>
                    </div>
                </article>

                <article class="contactFaqItem" data-contact-reveal="up" data-contact-delay="60">
                    <button type="button" aria-expanded="false">
                        <span>02</span>
                        <strong>Is the preferred date automatically confirmed?</strong>
                        <i aria-hidden="true"></i>
                    </button>

                    <div class="contactFaqItem__answer">
                        <p>
                            No. The submitted date is a preference. The project team should confirm the final
                            appointment after checking availability.
                        </p>
                    </div>
                </article>

                <article class="contactFaqItem" data-contact-reveal="up" data-contact-delay="120">
                    <button type="button" aria-expanded="false">
                        <span>03</span>
                        <strong>What should I evaluate during a site visit?</strong>
                        <i aria-hidden="true"></i>
                    </button>

                    <div class="contactFaqItem__answer">
                        <p>
                            Review practical planning, room proportions, daylight, ventilation, privacy, common areas,
                            access, surrounding development, documentation, and the details most important to your family.
                        </p>
                    </div>
                </article>

                <article class="contactFaqItem" data-contact-reveal="up" data-contact-delay="180">
                    <button type="button" aria-expanded="false">
                        <span>04</span>
                        <strong>Where should current pricing and availability be confirmed?</strong>
                        <i aria-hidden="true"></i>
                    </button>

                    <div class="contactFaqItem__answer">
                        <p>
                            Confirm all current commercial information directly with the authorised project team.
                            Website content can become outdated and should not replace written confirmation.
                        </p>
                    </div>
                </article>
            </div>
        </section>

        {{-- Closing --}}
        <section class="contactClosing contactFullBleed" aria-labelledby="contactClosingTitle">
            <div class="contactClosing__grid" aria-hidden="true"></div>
            <div class="contactClosing__word" data-contact-parallax data-speed="-0.025" aria-hidden="true">VISIT</div>

            <div class="contactClosing__content">
                <p class="contactKicker contactKicker--light" data-contact-reveal="fade">
                    <span>Your next step</span>
                    Move from browsing to understanding
                </p>

                <h2 id="contactClosingTitle" data-contact-reveal="title">
                    A serious home decision deserves more than a quick scroll.
                </h2>

                <div class="contactClosing__bottom">
                    <p data-contact-reveal="up">
                        Ask better questions, inspect the project carefully, and make the visit useful for the decision
                        you are actually trying to make.
                    </p>

                    <a href="#inquiry" class="contactClosing__button" data-contact-reveal="up" data-contact-delay="90">
                        <span>Plan your site visit</span>
                        <i aria-hidden="true">↑</i>
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/js/contact.js') }}" defer></script>
@endsection
