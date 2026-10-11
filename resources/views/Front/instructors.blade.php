@extends('layouts.front.master')

@section('content')

  <div id="instructors-page" class="page ">
        <div class="page-header">
            <div class="container">
                <h1 class="page-title">Our Expert Instructors</h1>
                <p class="page-subtitle">Learn from distinguished professionals and industry leaders</p>
            </div>
        </div>

        <section class="section">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="instructor-card">
                            <img src="https://images.unsplash.com/photo-1720805752653-10ddccea4c94?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                class="instructor-avatar" alt="Dr. Sarah Johnson">
                            <h4 class="instructor-name">Dr. Sarah Johnson</h4>
                            <p class="instructor-title">Former Minister of Education | Leadership Expert</p>
                            <p class="instructor-bio">With over 30 years in public service and education policy, Dr.
                                Johnson brings unparalleled expertise in leadership development and organizational
                                transformation.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="instructor-card">
                            <img src="https://images.unsplash.com/photo-1649899111001-f585ce5ec178?q=80&w=745&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                class="instructor-avatar" alt="Prof. Michael Chen">
                            <h4 class="instructor-name">Prof. Michael Chen</h4>
                            <p class="instructor-title">Former Finance Minister | Investment Strategist</p>
                            <p class="instructor-bio">A renowned economist and former Finance Minister, Prof. Chen
                                specializes in financial modeling, investment analysis, and economic policy development.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="instructor-card">
                            <img src="https://plus.unsplash.com/premium_photo-1741378216141-ed12ecac9fa0?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                class="instructor-avatar" alt="Dr. Emily Rodriguez">
                            <h4 class="instructor-name">Dr. Emily Rodriguez</h4>
                            <p class="instructor-title">Tech Industry Veteran | Data Science Expert</p>
                            <p class="instructor-bio">Former CTO of major tech companies, Dr. Rodriguez leads our data
                                analytics and digital transformation programs with cutting-edge industry insights.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="instructor-card">
                            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80"
                                class="instructor-avatar" alt="Mr. David Thompson">
                            <h4 class="instructor-name">Mr. David Thompson</h4>
                            <p class="instructor-title">Former Trade Minister | International Business</p>
                            <p class="instructor-bio">With extensive experience in international trade and diplomacy,
                                Mr. Thompson brings global perspective to our business strategy and negotiation courses.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="instructor-card">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80"
                                class="instructor-avatar" alt="Dr. Lisa Wang">
                            <h4 class="instructor-name">Dr. Lisa Wang</h4>
                            <p class="instructor-title">Marketing Director | Digital Strategy Expert</p>
                            <p class="instructor-bio">A digital marketing pioneer with 20+ years of experience, Dr. Wang
                                has led marketing transformations for Fortune 500 companies and startups alike.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="instructor-card">
                            <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80"
                                class="instructor-avatar" alt="Prof. James Mitchell">
                            <h4 class="instructor-name">Prof. James Mitchell</h4>
                            <p class="instructor-title">Project Management Institute Fellow</p>
                            <p class="instructor-bio">A certified PMP with extensive experience in managing
                                multi-billion dollar projects, Prof. Mitchell leads our project management certification
                                programs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection
