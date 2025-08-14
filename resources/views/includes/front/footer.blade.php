<!-- Footer Start -->
<div class="container-fluid bg-dark text-body footer  mt-5 pt-5 px-3 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <h3 class="text-light mb-4" data-translate="footer.address.title">
                    {{ __('footer.address.title') }}
                </h3>
                <p class="mb-2" style="font-size:larger">
                    <i class="fa fa-map-marker-alt  me-3 ps-2"></i>
{{ trans('footer.address1') }}
                </p>
                <p class="mb-2" style="font-size:larger">
                    <i class="fa fa-phone-alt  me-3 ps-2"></i>
                    {{ trans('footer.mobile') }}
                </p>
                 <p class="mb-2" style="font-size:larger">
                    <i class="fa fa-fax  me-3 ps-2"></i>
                    {{ trans('footer.fax') }}
                </p>
                <p class="mb-2" style="font-size:larger">
                    <i class="fa fa-envelope  me-3 ps-2"></i>
{{ trans('footer.email_address') }}
                </p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square btn-outline-body me-3" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-body me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-body me-3" href="#"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-outline-body me-3" href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <h3 class="text-light mb-4" data-translate="footer.services.title">
                    {{ __('footer.services.title') }}
                </h3>
                {{-- @foreach ($services as $service)
                    <a class="btn btn-link" href="#">{!! $service->translate(app()->getLocale())->name !!}</a>
                @endforeach --}}
            </div>

            <div class="col-lg-2 col-md-6">
                <h3 class="text-light mb-4" data-translate="footer.quickLinks.title">
                    {{ __('footer.quickLinks.title') }}
                </h3>
                <a class="btn btn-link" href="{{ route('home') }}" data-translate="footer.quickLinks.links.home">
                    {{ __('footer.quickLinks.links.home') }}
                </a>
                <a class="btn btn-link" href="{{ route('contact-us') }}" data-translate="footer.quickLinks.links.contact">
                    {{ __('footer.quickLinks.links.contact') }}
                </a>
                <a class="btn btn-link" href="{{ route('about') }}" data-translate="footer.quickLinks.links.about">
                    {{ __('footer.quickLinks.links.about') }}
                </a>
                <a class="btn btn-link" href="{{ route('services') }}" data-translate="footer.quickLinks.links.services">
                    {{ __('footer.quickLinks.links.services') }}
                </a>
            </div>

            <div class="col-lg-4 col-md-6">
                <h3 class="text-light mb-4" data-translate="footer.newsletter.title">
                    {{ __('footer.newsletter.title') }}
                </h3>
                <iframe class="w-100 mb-n2 pb-5" style="height:300px"
                src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d55238.93196350343!2d31.442309149602174!3d30.0817760250493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x1458178d9fbacd13%3A0x1151dbf2a01c10fb!2z2LHYptin2LPYqSDYp9mE2YfZitim2Kkg2KfZhNi52LHYqNmK2Kkg2YTZhNiq2LXZhtmK2LksINi32LHZitmCINmF2LXYsSwg2LTZitix2KfYqtmI2YYg2KfZhNmF2LfYp9ix2Iwg2YLYs9mFINin2YTZhtiy2YfYqdiMINmF2K3Yp9mB2LjYqSDYp9mE2YLYp9mH2LHYqeKArCA0NDcyMTIw!3m2!1d30.0822455!2d31.4066826!5e0!3m2!1sar!2seg!4v1753432839143!5m2!1sar!2seg"
                frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>

    <div class="container-fluid copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0" data-translate="footer.copyright.title">
                    &copy; <a href="#" data-translate="footer.links.siteName">
                        {{ __('footer.company') }}
                    </a>, {{ __('footer.copyright.title') }}.
                </div>
                <div class="col-md-6 text-center text-md-end" data-translate="footer.copyright.designedBy">
                    <a href="#" data-translate="footer.links.designedBy">
                        {{ __('footer.links.designedBy') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
