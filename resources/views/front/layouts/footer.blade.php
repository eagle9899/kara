<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-3">
                <h5 class="text-white mb-4">Get In Touch</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{ $global_our_address->address }}</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ $global_our_address->phone }}</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{ $global_our_address->email }}</p>
                <div class="d-flex pt-2">
                    @foreach ($global_social_icon_show as $item)
                    <a class="btn btn-outline-light btn-social" href="{{ $item->url }}"><i
                            class="{{ $item->icon }}"></i></a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Quick Links</h5>
                @if ($global_faq_about->about_status == "Show")
                <a class="btn btn-link text-white-50"
                    href="{{ route('about') }}">{{ $global_faq_about->about_title }}</a>
                @endif
                @if ($global_disclaimer_login_contact->contact_status == "Show")
                <a class="btn btn-link text-white-50"
                    href="{{ route('contact') }}">{{ $global_disclaimer_login_contact->contact_title }}</a>
                @endif
                {{-- <a class="btn btn-link text-white-50" href="">Our Services</a> --}}
                @if ($global_terms_privacy->terms_status == "Show")
                <a class="btn btn-link text-white-50"
                    href="{{ route('privacy')}}">{{ $global_terms_privacy->privacy_title }}</a>
                @endif
                @if ($global_terms_privacy->terms_status == "Show")
                <a class="btn btn-link text-white-50"
                    href="{{ route('terms') }}">{{ $global_terms_privacy->terms_title }}</a>
                @endif
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Photo Gallery</h5>
                <div class="row g-2 pt-2">
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('uploads/property-1.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('uploads/property-2.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('uploads/property-3.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('uploads/property-4.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('uploads/property-5.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="{{ asset('uploads/property-6.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Newsletter</h5>
                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <form action="{{ route('subscribe') }}" method="post" class="form_subscribe_ajax">
                        @csrf
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" name="email" type="text"
                            placeholder="Your email">
                        <span class="text-danger error-text email_error"></span>
                        <button type="submit"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- subscriber start script --}}


    <div id="loader"></div>
    {{-- subscriber end script --}}

    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="{{ route('home') }}">Kara.com</a>, All Right Reserved.

                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="border-bottom" href="{{ route('home') }}">Kara</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="">Cookies</a>
                        <a href="">Help</a>
                        @if ($global_faq_about->faq_status == "Show")
                        <a href="{{ route('faq') }}">{{ $global_faq_about->faq_title }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->