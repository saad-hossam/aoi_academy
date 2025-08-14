@extends('layouts.dashbord.master2')

@section('title')
@stop

@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin ">
                                    <div class="mb-2 d-flex text-center">
                                         {{-- <a href="{{ url('/' . $page='Home') }}"><img src="{{asset('images/logo/academy.jpg')}}" class="sign-favicon ht-40" alt="logo"></a> --}}
                                         <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">المعهد العربى للتكنولوجيا المتطورة
 </h1></div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header ">
                                            <div class="text-center"> <h2> مرحبا</h2>
                                                <h5 class="font-weight-semibold mb-4">  تسجيل الدخول</h5></div>

                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label> البريد الالكتروني</label>
                                                    <input id="email" placeholder="البريد الالكتروني" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                     </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label> كلمة المرور</label>

                                                    <input id="password" placeholder="كلمة المرور" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                  </span>
                                                    @enderror
                                                    <div class="form-group row">
                                                        <div class="col-md-6 offset-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <label class="form-check-label" for="remember">
                                                                تذكرني

                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-main-primary btn-block">
تسجيل الدخول
                                            </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->

            <div class="col-md-6 col-lg-6 col-xl-7 p-0 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p  text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 ">
                        <img src="{{asset('images/logo/academy.jpg')}}" class=" ht-xl- wd-md-100p " style="height: 100%" alt="logo">
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('js')
@endsection
