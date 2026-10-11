@extends('layouts.front.master')

@section('content')

    <div id="videos-page" class="page">
        <div class="page-header">
            <div class="container">
                <h1 class="page-title">Training Videos</h1>
                <p class="page-subtitle">Watch highlights from our courses and events</p>
            </div>
        </div>

        <section class="section">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="card card-custom">
                            <div class="ratio ratio-16x9">
                                <iframe id="main-video" src="" title="Featured Video" allowfullscreen></iframe>
                            </div>
                            <div class="card-body">
                                <h4 id="main-video-title" class="card-title"></h4>
                                <p id="main-video-description" class="card-text"></p>
                            </div>
                        </div>
                    </div>
                    <div id="videos-container" class="col-lg-4 pt-2 overflow-y-auto" style="max-height: 70vh;">
                        <h5 class="text-primary-custom mb-3">More Videos</h5>
                        <!-- Courses will be dynamically inserted here -->
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection
@push('scripts')
 <script>
        const videosData = [
            {
                id: "2JvLvJygHwU",
                title: "Data Analytics Fundamentals",
                description: "Learn the core principles of data analytics and how to transform raw data into actionable business insights. Perfect for beginners looking to start their data science journey.",
                duration: "15:30",
                category: "Analytics Course",
            },
            {
                id: "kBdfcR-8hEY",
                title: "Leadership Masterclass with Dr. Sarah Johnson",
                description: "Watch excerpts from our popular leadership masterclass featuring former Education Minister Dr. Sarah Johnson as she shares insights on effective leadership in the modern workplace.",
                duration: "22:15",
                category: "Dr. Sarah Johnson",
            },
            {
                id: "072P_2o8vzQ",
                title: "Digital Marketing Trends 2025",
                description: "Stay ahead of the curve with the latest digital marketing trends and strategies. Learn about social media marketing, content creation, and customer engagement techniques.",
                duration: "12:45",
                category: "Marketing Series",
            },
            {
                id: "IxRVa1DbSAg",
                title: "Project Management Best Practices",
                description: "Master the art of project management with proven methodologies and tools. Learn about agile practices, team coordination, and successful project delivery.",
                duration: "18:20",
                category: "PM Essentials",
            },
            {
                id: "HQGCJiNCvec",
                title: "Communication Skills Workshop",
                description: "Enhance your communication skills with practical techniques for presentations, meetings, and interpersonal interactions. Build confidence and clarity in your professional communications.",
                duration: "24:10",
                category: "Soft Skills Series",
            }
        ];

        // Function to render videos from data
        function renderVideos(videos) {
            const container = document.getElementById('videos-container');
            container.innerHTML = '';

            videos.forEach((video, index) => {
                const videoHTML = `
                    <div class="mb-4">
                        <div class="card video-item"
                             data-video-id="${video.id}"
                             data-title="${video.title}"
                             data-description="${video.description}">
                            <div class="row g-0">
                                <div class="col-4 position-relative">
                                    <img src="https://img.youtube.com/vi/${video.id}/default.jpg
"
                                        class="img-fluid rounded-start h-100 w-100" style="object-fit: cover;"
                                        alt="${video.title}">
                                    <span class="video-duration position-absolute bottom-0 end-0 m-1">${video.duration}</span>
                                </div>
                                <div class="col-8">
                                    <div class="card-body p-3">
                                        <h6 class="card-title small">${video.title}</h6>
                                        <small class="text-muted">${video.category}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                container.innerHTML += videoHTML;
            });
        }
    </script>

    <!-- // Video switching functionality -->
    <script>
        // First render the videos
        renderVideos(videosData);

        document.addEventListener('DOMContentLoaded', function () {
            const videoItems = document.querySelectorAll('.video-item');
            const mainVideo = document.getElementById('main-video');
            const mainVideoTitle = document.getElementById('main-video-title');
            const mainVideoDescription = document.getElementById('main-video-description');

            // Load first video by default
            if (videoItems.length > 0) {
                const firstVideo = videoItems[0];

                // Remove active class from all items
                videoItems.forEach(vi => vi.classList.remove('active'));

                // Add active class to first item
                firstVideo.classList.add('active');

                // Get first video data
                const videoId = firstVideo.getAttribute('data-video-id');
                const title = firstVideo.getAttribute('data-title');
                const description = firstVideo.getAttribute('data-description');

                // Update main video with first video
                mainVideo.src = `https://www.youtube.com/embed/${videoId}`;
                mainVideoTitle.textContent = title;
                mainVideoDescription.textContent = description;
            }

            videoItems.forEach(item => {
                item.addEventListener('click', function () {
                    // Remove active class from all items
                    videoItems.forEach(vi => vi.classList.remove('active'));

                    // Add active class to clicked item
                    this.classList.add('active');

                    // Get video data
                    const videoId = this.getAttribute('data-video-id');
                    const title = this.getAttribute('data-title');
                    const description = this.getAttribute('data-description');

                    // Update main video
                    mainVideo.src = `https://www.youtube.com/embed/${videoId}`;
                    mainVideoTitle.textContent = title;
                    mainVideoDescription.textContent = description;

                    // Smooth scroll to main video on mobile
                    if (window.innerWidth < 992) {
                        mainVideo.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });
        });
    </script>
@endpush
