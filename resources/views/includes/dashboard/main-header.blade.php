<!-- main-header opened -->
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="{{ url('/' . ($page = 'index')) }}"><img
                        src="{{ URL::asset('assets/admin/img/brand/logo.png') }}" class="logo-1" alt="logo"></a>
                <a href="{{ url('/' . ($page = 'index')) }}"><img
                        src="{{ URL::asset('assets/admin/img/brand/logo-white.png') }}" class="dark-logo-1"
                        alt="logo"></a>
                <a href="{{ url('/' . ($page = 'index')) }}"><img
                        src="{{ URL::asset('assets/admin/img/brand/favicon.png') }}" class="logo-2" alt="logo"></a>
                <a href="{{ url('/' . ($page = 'index')) }}"><img
                        src="{{ URL::asset('assets/admin/img/brand/favicon.png') }}" class="dark-logo-2"
                        alt="logo"></a>
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>
            {{-- <div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
                <input class="form-control" placeholder="Search for anything." type="search"> <button
                class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
            </div> --}}
        </div>

        <div class="d-flex justify-content-start">

            @guest
                @if (Route::has('login'))
                    <li class="nav-item text-center mt-3">
                        <a class="link-one " href="{{ route('login') }}">{{ __('تسجيل دخول') }}</a>
                    </li>
                @endif


            @else
                <li class="nav-item dropdown mt-3">


                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('تسجيل خروج') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    </div>
                </li>
            @endguest
        </div>
    </div>
</div>
<!-- /main-header -->
