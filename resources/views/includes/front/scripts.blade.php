  <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/front')}}/main.js"></script>

    <!-- // Courses data -->
    <script>
        const coursesData = [
            {
                id: 1,
                image: "https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
                title: "Advanced Leadership Training",
                instructor:"Dr. Sarah Johnson",
                description: "Develop essential leadership skills including strategic thinking, team management, and organizational development. Perfect for managers and executives.",
                duration: "12 Weeks",
                price: 1200
            },
            {
                id: 2,
                image: "https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
                title: "Project Management Professional",
                instructor:"Prof. Michael Chen",
                description: "Comprehensive PMP certification preparation covering project lifecycle, methodologies, risk management, and stakeholder communication",
                duration: "14 Weeks",
                price: 1300
            },
            {
                id: 3,
                image: "https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
                title: "Data Analytics & Visualization",
                instructor:"Dr. Emily Rodriguez",
                description: "Master data analysis techniques, statistical methods, and visualization tools including Python, R, and Tableau for data-driven decision making.",
                duration: "16 Weeks",
                price: 1500
            },
            {
                id: 4,
                image: "https://images.unsplash.com/photo-1563986768609-322da13575f3?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
                title: "Financial Analysis & Modeling",
                instructor:"Mr. David Thompson",
                description: "Advanced financial modeling techniques, valuation methods, and investment analysis for finance professionals and analysts.",
                duration: "12 Weeks",
                price: 1100
            },
            {
                id: 5,
                image: "https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
                title: "Digital Marketing Mastery",
                instructor:"Dr. Lisa Wang",
                description: "Gain expertise in digital marketing strategies including SEO, PPC, social media, and content marketing to drive online engagement and conversions.",
                duration: "10 Weeks",
                price: 1000
            },
            {
                id: 6,
                image: "https://images.unsplash.com/photo-1516321497487-e288fb19713f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80",
                title: "Executive Communication Skills",
                instructor:"Prof. James Mitchell",
                description: "Master public speaking, presentation skills, negotiation techniques, and interpersonal communication for executive success.",
                duration: "8 Weeks",
                price: 800
            }
        ]

        function renderCourses(courses) {
            const container = document.getElementById('courses_container');
            container.innerHTML = '';

            courses.slice(0, 3).forEach(course => {
                const courseCard = document.createElement('div');
                courseCard.className = 'col-lg-4 col-md-6'; ``
                courseCard.innerHTML = `
                    <div class="card card-custom">
                        <img src="${course.image}" class="card-img-top" alt="${course.title}">
                        <div class="card-body">
                            <h5 class="card-title">${course.title}</h5>
                            <b>${course.instructor}</b>
                            <p class="card-text" style="height:100px; overflow:hidden;">${course.description}</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="badge bg-primary-custom">${course.duration}</span>
                                <span class="text-primary-custom fw-bold">$${course.price}</span>
                            </div>
                            <button class="btn btn-card w-100" onclick="handleCTAClick('course', '${course.title}')">
                                Enroll Now <i class="fas fa-arrow-right ms-1"></i>
                            </button>
                        </div>
                    </div>
                `;
                container.appendChild(courseCard);
            })
        }

        renderCourses(coursesData)
    </script>

    <!-- // Rooms data -->
    <script>
        const roomsData = [
                {
                    id: 1,
                    image: "https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?q=80&w=1174&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    images: [
                        "https://plus.unsplash.com/premium_photo-1689701711362-a574bea1822a?q=80&w=1206&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                        "https://plus.unsplash.com/premium_photo-1678734268616-015d5879b8c2?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    ],
                    title: "Executive Conference Room",
                    description: "Premium conference room with capacity for 50 people, featuring state-of-the-art AV equipment, video conferencing capabilities, and elegant furnishing perfect for board meetings and executive sessions.",
                    capacity: 50,
                    price: 200,
                    category: "Conference",
                    features: ["AV Equipment", "Video Conference", "Elegant Furnishing", "Board Room Setup"]
                },
                {
                    id: 2,
                    image: "https://images.unsplash.com/photo-1667646639495-8865f3ea638b?q=80&w=1931&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    images: [
                        "https://plus.unsplash.com/premium_photo-1663068630302-c1bfd81f57a6?q=80&w=1117&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                        "https://plus.unsplash.com/premium_photo-1663099814676-72cfabfb91f8?q=80&w=1090&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                        "https://plus.unsplash.com/premium_photo-1683121307874-107ea06c6737?q=80&w=2138&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                        "https://plus.unsplash.com/premium_photo-1661495889657-d1ad276bed23?q=80&w=1739&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                        "https://plus.unsplash.com/premium_photo-1681487153917-6fd9608f635b?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                        "https://plus.unsplash.com/premium_photo-1661900268317-2ab4dccd2fcb?q=80&w=1074&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    ],
                    title: "Advanced Computer Lab",
                    description: "Fully equipped computer lab with 30 high-performance workstations, latest software suites, and high-speed internet. Perfect for technical training and software development workshops.",
                    capacity: 30,
                    price: 150,
                    category: "Computer Lab",
                    features: ["Latest Software", "High-Speed WiFi", "30 Workstations", "Technical Support"]
                },
                {
                    id: 3,
                    image: "https://images.unsplash.com/photo-1596522354195-e84ae3c98731?q=80&w=1187&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    images: [
                        "https://images.unsplash.com/photo-1627884812866-51f842389ee5?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                        "https://images.unsplash.com/photo-1677536849474-2819061389ed?q=80&w=1175&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                        "https://images.unsplash.com/photo-1558969989-4cb0503614c9?q=80&w=1074&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                        "https://images.unsplash.com/photo-1577179269308-b2e290d07ce5?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    ],
                    title: "Main Training Hall",
                    description: "Spacious training hall accommodating up to 100 participants with theater-style seating, professional lighting, sound system, and multiple projection screens for large-scale events.",
                    capacity: 100,
                    price: 300,
                    category: "Training Hall",
                    features: ["Theater Seating", "Sound System", "Multiple Screens", "Professional Lighting"]
                },
                {
                    id: 4,
                    image: "https://plus.unsplash.com/premium_photo-1679547202918-bf37285d3caf?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    images: [
                        "https://plus.unsplash.com/premium_photo-1679547202405-0cd1f7f3efb3?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                        "https://plus.unsplash.com/premium_photo-1679547202734-95e59a16cac9?q=80&w=1171&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                        "https://plus.unsplash.com/premium_photo-1679547202348-9aef21c9f30e?q=80&w=1332&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    ],
                    title: "Interactive Workshop Studio",
                    description: "Modern workshop space designed for interactive sessions with flexible seating arrangements, whiteboard walls, collaboration tools, and breakout areas for team activities.",
                    capacity: 25,
                    price: 120,
                    category: "Workshop",
                    features: ["Flexible Seating", "Collaboration Tools", "Whiteboard Walls", "Breakout Areas"]
                }
        ]

        function renderRooms(rooms) {
            const container = document.getElementById('rooms_container');
            container.innerHTML = '';

            rooms.forEach(room => {
                const roomCard = document.createElement('div');
                roomCard.className = 'col-lg-6 col-md-6';
                roomCard.innerHTML = `
                        <div class="card card-custom">
                            <img src="${room.image}"
                                class="card-img-top" alt="${room.title}">
                            <div class="card-body">
                                <h5 class="card-title">${room.title}</h5>
                                <p class="card-text" style="height:100px; overflow:hidden;">${room.description}</p>
                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="badge bg-tertiary-custom align-self-start">${room.capacity} Capacity</span>
                                    <span class="d-none d-md-flex flex-wrap justify-content-center align-items-center gap-2 mx-2">
                                        ${room.features.map(feature => `<span class="badge bg-primary-custom">${feature}</span>`).join(' ')}
                                    </span>
                                    <div class="text-primary-custom fw-bold align-self-start">$${room.price}/hour</div>
                                </div>
                                <button class="btn btn-card w-100"
                                    onclick="handleCTAClick('room', '${room.id}')">
                                    View Details
                                </button>
                            </div>
                        </div>
                        `;
                container.appendChild(roomCard);
            })
        }

        renderRooms(roomsData);
    </script>
