<section class="section inquiry-section" id="inquiry">
    <div class="section-label">Book a private walkthrough</div>
    <div class="inquiry-grid">
        <div>
            <h2>Get brochure, price details and site visit support.</h2>
            <p>Share your requirement. The form is intentionally short because serious buyers do not need a ten-field obstacle before talking to a sales team.</p>
            <div class="trust-strip">
                <span>RERA reference available</span>
                <span>2 & 3 BHK plans</span>
                <span>Bopal-Ghuma Road</span>
            </div>
        </div>
        <form class="inquiry-form glass" action="{{ route('inquiry.store') }}" method="post">
            @csrf
            <input type="hidden" name="project_id" value="{{ $project->id ?? '' }}">
            <input type="text" name="website" class="hidden-field" tabindex="-1" autocomplete="off">
            <label>Name<input type="text" name="name" value="{{ old('name') }}" required placeholder="Your name"></label>
            <label>Phone<input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="+91 XXXXX XXXXX"></label>
            <label>Email<input type="email" name="email" value="{{ old('email') }}" placeholder="Optional"></label>
            <label>Interested In
                <select name="interest">
                    <option value="">Select option</option>
                    <option>2 BHK</option>
                    <option>3 BHK</option>
                    <option>Site Visit</option>
                    <option>Brochure</option>
                </select>
            </label>
            <label>Budget<input type="text" name="budget" value="{{ old('budget') }}" placeholder="Example: 60L - 80L"></label>
            <label>Message<textarea name="message" rows="4" placeholder="Tell us your preferred visit time or requirement">{{ old('message') }}</textarea></label>
            <input type="hidden" name="source" value="website">
            <button class="btn btn-wide" type="submit">Send Inquiry</button>
        </form>
    </div>
</section>
