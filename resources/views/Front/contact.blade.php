@extends('layouts.front.master')

@section('content')
        <div id="contact-page" class="page ">
        <div class="page-header">
            <div class="container">
                <h1 class="page-title">Contact Us</h1>
                <p class="page-subtitle">Get in touch with our team</p>
            </div>
        </div>

        <section class="section">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-8">
                        <div class="form-custom">
                            <h3 class="text-primary-custom mb-4">Send us a Message</h3>
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstName" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="tel" class="form-control" id="phone">
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <select class="form-control" id="subject" required>
                                        <option value="">Select a subject</option>
                                        <option value="course-inquiry">Course Inquiry</option>
                                        <option value="room-booking">Room Booking</option>
                                        <option value="general">General Question</option>
                                        <option value="support">Technical Support</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn-card">
                                    Send Message <i class="fas fa-paper-plane ms-2"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-custom h-100">
                            <div class="card-body">
                                <h5 class="text-primary-custom mb-4">Get in Touch</h5>
                                <div class="mb-4">
                                    <h6><i class="fas fa-map-marker-alt text-primary-custom me-2"></i>Address</h6>
                                    <p class="text-muted">123 Training Street<br>Business District<br>Cairo, Egypt</p>
                                </div>
                                <div class="mb-4">
                                    <h6><i class="fas fa-phone text-primary-custom me-2"></i>Phone</h6>
                                    <p class="text-muted">+20 2 1234 5678</p>
                                </div>
                                <div class="mb-4">
                                    <h6><i class="fas fa-envelope text-primary-custom me-2"></i>Email</h6>
                                    <p class="text-muted">info@elitetraining.com</p>
                                </div>
                                <div class="mb-4">
                                    <h6><i class="fas fa-clock text-primary-custom me-2"></i>Office Hours</h6>
                                    <p class="text-muted">Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 9:00 AM - 2:00
                                        PM<br>Sunday: Closed</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection
