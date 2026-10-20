@extends('layouts.front.master')

@section('content')

  <div id="rooms-page" class="page ">
        <div class="page-header">
            <div class="container">
                <h1 class="page-title">Rooms & Labs</h1>
                <p class="page-subtitle">Modern facilities for conferences, workshops, and events</p>
            </div>
        </div>

        <section class="section">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-6 col-md-6">
                        <div class="card card-custom">
                            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                                class="card-img-top" alt="Executive Conference Room">
                            <div class="card-body">
                                <h5 class="card-title">Executive Conference Room</h5>
                                <p class="card-text">Premium conference room with capacity for 50 people, featuring
                                    state-of-the-art AV equipment, video conferencing capabilities, and elegant
                                    furnishing perfect for board meetings and executive sessions.</p>
                                <div class="mb-3">
                                    <span class="badge bg-secondary-custom me-2">50 Capacity</span>
                                    <span class="badge bg-tertiary-color me-2">AV Equipment</span>
                                    <span class="badge bg-primary-custom">Video Conference</span>
                                </div>
                                <div class="text-primary-custom fw-bold mb-3">$200/hour</div>
                                <button class="btn btn-card w-100"
                                    onclick="handleCTAClick('room', 'executive-conference')">
                                    Book Now <i class="fas fa-calendar-alt ms-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card card-custom">
                            <img src="https://images.unsplash.com/photo-1587825140708-dfaf72ae4b04?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                                class="card-img-top" alt="Computer Lab">
                            <div class="card-body">
                                <h5 class="card-title">Advanced Computer Lab</h5>
                                <p class="card-text">Fully equipped computer lab with 30 high-performance workstations,
                                    latest software suites, and high-speed internet. Perfect for technical training and
                                    software development workshops.</p>
                                <div class="mb-3">
                                    <span class="badge bg-secondary-custom me-2">30 Workstations</span>
                                    <span class="badge bg-tertiary-color me-2">Latest Software</span>
                                    <span class="badge bg-primary-custom">High-Speed WiFi</span>
                                </div>
                                <div class="text-primary-custom fw-bold mb-3">$150/hour</div>
                                <button class="btn btn-card w-100" onclick="handleCTAClick('room', 'computer-lab')">
                                    Book Now <i class="fas fa-calendar-alt ms-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card card-custom">
                            <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                                class="card-img-top" alt="Training Hall">
                            <div class="card-body">
                                <h5 class="card-title">Main Training Hall</h5>
                                <p class="card-text">Spacious training hall accommodating up to 100 participants with
                                    theater-style seating, professional lighting, sound system, and multiple projection
                                    screens for large-scale events.</p>
                                <div class="mb-3">
                                    <span class="badge bg-secondary-custom me-2">100 Capacity</span>
                                    <span class="badge bg-tertiary-color me-2">Theater Seating</span>
                                    <span class="badge bg-primary-custom">Sound System</span>
                                </div>
                                <div class="text-primary-custom fw-bold mb-3">$300/hour</div>
                                <button class="btn btn-card w-100" onclick="handleCTAClick('room', 'training-hall')">
                                    Book Now <i class="fas fa-calendar-alt ms-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card card-custom">
                            <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                                class="card-img-top" alt="Workshop Studio">
                            <div class="card-body">
                                <h5 class="card-title">Interactive Workshop Studio</h5>
                                <p class="card-text">Modern workshop space designed for interactive sessions with
                                    flexible seating arrangements, whiteboard walls, collaboration tools, and breakout
                                    areas for team activities.</p>
                                <div class="mb-3">
                                    <span class="badge bg-secondary-custom me-2">25 Capacity</span>
                                    <span class="badge bg-tertiary-color me-2">Flexible Seating</span>
                                    <span class="badge bg-primary-custom">Collaboration Tools</span>
                                </div>
                                <div class="text-primary-custom fw-bold mb-3">$120/hour</div>
                                <button class="btn btn-card w-100" onclick="handleCTAClick('room', 'workshop-studio')">
                                    Book Now <i class="fas fa-calendar-alt ms-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
