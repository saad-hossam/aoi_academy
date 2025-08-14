


    <!-- Topbar Start -->
    <div class="top-bar container-fluid bg-dark p-0 wow fadeIn d-none d-lg-block" data-wow-delay="0.1s">
                <div class="row gx-0 d-none d-lg-flex px-5">
            <div class="col-lg-7  ">
                <div class="h-100 d-inline-flex align-items-center py-3 me-3">
                    <a class="text-body px-4" href="tel:+0123456789"><i class="fa fa-phone-alt text-primary me-2 ps-2 "></i>{{ trans('footer.mobile') }}</a>
                    <a class="text-body px-4" href="tel:+0123456789"><i class="fa fa-fax text-primary me-2 ps-2 "></i>{{ trans('footer.fax') }}</a>

                    <a class="text-body px-4" href="mailto:info@example.com"><i class="fa fa-envelope-open text-primary me-2 ps-2"></i>{{ trans('footer.email_address') }}</a>
                </div>
            </div>
            <div class="col-lg-5 links ">
                <div class="h-100 d-inline-flex align-items-center py-3 ">
                    <a class=" px-2" href=""></a>
                    <a class=" px-2" href=""></a>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square btn-outline-body me-3" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square btn-outline-body me-3" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square btn-outline-body me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square btn-outline-body me-3" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="{{route('home')}}" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="text-primary m-0"><img class="me-3" src="/img/b8c72a254b2d423f8e19c1b9f9d387fc (1).png"  width="100px" height="60px" alt="Icon"></h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{route('home')}}" class="nav-item nav-link active" data-translate="header.nav.home">{{trans('header.home')}}</a>
                <a href="{{route('about')}}" class="nav-item nav-link" data-translate="header.nav.about">{{trans('header.about_us')}}</a>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-translate="header.nav.pages">{{ trans('header.our_departments') }}</a>
                    <div class="dropdown-menu border-0 m-0">
                        {{-- @foreach ($departments as $department)
                            <a href="{{ route('projects.by_department', $department->id) }}" class="dropdown-item">
                                {!! $department->translate(app()->getLocale())->name !!}
                            </a>
                        @endforeach --}}
                    </div>
                </div>

                <a href="{{route('services_all')}}" class="nav-item nav-link" data-translate="header.nav.services">{{trans('header.our_services')}}</a>
                <a href="{{route('projects_all')}}" class="nav-item nav-link" data-translate="header.nav.projects">{{trans('header.projects')}}</a>
                <a href="{{route('front.news')}}" class="nav-item nav-link" data-translate="header.nav.contact">{{trans('header.news')}}</a>

                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-translate="header.nav.pages">{{trans('header.projects')}}</a>
                    <div class="dropdown-menu border-0 m-0">
                        <a href="feature.html" class="dropdown-item">Our Services</a>
                        <a href="project.html" class="dropdown-item">Our Projects</a>
                        <a href="team.html" class="dropdown-item">Team Members</a>
                        <a href="appointment.html" class="dropdown-item">Appointment</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div> --}}
                <a href="{{route('contact-us')}}" class="nav-item nav-link" data-translate="header.nav.contact">{{trans('header.contact_us')}}</a>
            </div>
            <div class="border-start ps-4 d-none d-lg-block">
                @if (app()->getLocale() == 'en')
                    <a rel="alternate" hreflang="ar"
                       href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                        <button class="btn btn-primary  " style="border-radius: 25px; font-size:20px">
                            <i class="fa fa-globe" style="margin-right: 5px;"></i> عربى
                        </button>
                    </a>
                @else
                    <a rel="alternate" hreflang="en"
                       href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                       <button class="btn btn-primary  " style="border-radius: 25px; font-size:18px">
                        <i class="fa fa-globe" style="margin-right: 5px;"></i> English
                        </button>
                    </a>
                @endif
            </div>

        </div>
    </nav>
    <!-- Navbar End -->
