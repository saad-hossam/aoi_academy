
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fa-solid fa-building-columns me-2"></i>AOI Academy
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('courses') }}">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rooms') }}">Rooms & Labs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('instructors')}}">Instructors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news')}}">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('videos')}}">Videos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center flex-row-reverse gap-2">
                    <div class="form-check form-switch d-flex align-items-center gap-2">
                        <input class="form-check-input m-0" type="checkbox" id="languageSwitch"
                            onchange="toggleLanguage()">
                        <label class="form-check-label text-light" for="languageSwitch" id="languageLabel">
                            العربية
                        </label>
                    </div>
                    <a href="/sign_in.html" class="btn btn-auth me-2" id="authBtn">
                        <span class="auth-btn-text">Sign In</span>
                    </a>
                    <button class="btn btn-outline-light me-2" id="userBtn"
                        style="display: none;">
                        <span class="profile-btn-text">Profile</span>
                    </button>
                    <button class="btn btn-outline-light" onclick="logout()" id="logoutBtn" style="display: none;">
                        <span class="logout-btn-text">Logout</span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

