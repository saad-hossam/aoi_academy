@extends('layouts.front.master')

@section('content')

    <div id="courses-page" class="page ">
        <div class="page-header">
            <div class="container">
                <h1 class="page-title">Our Courses</h1>
                <p class="page-subtitle">Comprehensive training programs designed for your success</p>
            </div>
        </div>

        <section class="section">
            <div class="container">
                <div class="row g-4" id="courses_container">
                    <!-- Courses will be dynamically inserted here -->
                </div>
            </div>
    </div>

@endsection
