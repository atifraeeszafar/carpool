<div class="footer">
    <div class="icons">
        <a href="{{ config('Base.web.links.facebook') }}" target="_blank" class="icon-circle">
            <img src="{{ asset('images/email/social/facebook.png') }}" alt="Facebook">
        </a>
        <a href="{{ config('Base.web.links.twitter') }}" target="_blank" class="icon-circle">
            <img src="{{ asset('images/email/social/twitter.png') }}" alt="Twitter">
        </a>
        <a href="{{ config('Base.web.links.google_plus') }}" target="_blank" class="icon-circle">
            <img src="{{ asset('images/email/social/google.png') }}" alt="Google plus">
        </a>
        <a href="{{ config('Base.web.links.linkedin') }}" target="_blank" class="icon-circle">
            <img src="{{ asset('images/email/social/linkedin.png') }}" alt="Linkedin">
        </a>
    </div>

    <p class="footer-text">
        &copy; Base. All right reserved.<br>

    </p>

    <div class="footer-space"></div>

    <p class="footer-text">
        <a href="{{ url('/') }}" target="_blank">Home</a>
        <span class="divider">|</span>
        <a href="{{ url('/contact') }}" target="_blank">Contact Us</a>
    </p>
</div>
