@extends('layouts.front.master')

@section('content')
    <!-- Home Page -->
    <div id="home-page" class="page">
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 hero-content">
                        <h1>Elevate Your Skills with <span class="text-secondary-custom">Expert Training</span></h1>
                        <p>Join thousands of professionals who have advanced their careers through our comprehensive
                            training programs, modern facilities, and world-class instructors.</p>
                        <div class="d-flex flex-wrap gap-3">
                            <button class="btn btn-primary-custom" onclick="window.location.href='courses.html'">
                                Explore Courses <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                            <button class="btn btn-outline-custom" onclick="window.location.href='about.html'">
                                Learn More
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="stats-section section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="stat-item">
                            <span class="stat-number">10,000+</span>
                            <span class="stat-label">Graduates</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="stat-item">
                            <span class="stat-number">150+</span>
                            <span class="stat-label">Courses</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="stat-item">
                            <span class="stat-number">50+</span>
                            <span class="stat-label">Expert Instructors</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="stat-item">
                            <span class="stat-number">25</span>
                            <span class="stat-label">Years Experience</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Courses -->
        <section class="section">
            <div class="container">
                <h2 class="section-title">Featured Courses</h2>
                <p class="section-subtitle">Discover our most popular and in-demand training programs</p>
                <div class="row g-4" id="courses_container">
                    <!-- Courses will be dynamically inserted here -->
                </div>
            </div>
        </section>

        <!-- Featured Labs -->
        <section class="section">
            <div class="container">
                <h2 class="section-title">Featured Labs</h2>
                <p class="section-subtitle">Explore our most popular and in-demand rentable lab spaces for individuals and companies.</p>
                <div class="row g-4" id="rooms_container">
                    <!-- Rooms will be dynamically inserted here -->
                </div>
            </div>
        </section>
    </div>
@endsection
