@extends('layouts.dashbord.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">تعديل المعلومة</h4>
            </div>
        </div>
        @can('about-list')
        <div class="d-flex my-xl-auto right-content">
            <a class="btn btn-primary btn-block" href="{{ route('abouts.index') }}">جميع المعلومات</a>
        </div>
        @endcan
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif

                    <form method="POST" action="{{ route('abouts.update', $about->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Translations -->
                        <div class="card">
                            <div class="card-header">
                                <strong>{{ __('words.translations') }}</strong>
                            </div>
                            <div class="card-block">
                                <ul class="nav nav-tabs" id="localeTabs" role="tablist">
                                    @foreach (config('app.languages') as $key => $lang)
                                        <li class="nav-item">
                                            <a class="nav-link @if ($loop->first) active @endif"
                                               id="{{ $key }}-tab"
                                               data-toggle="tab"
                                               href="#{{ $key }}"
                                               role="tab"
                                               aria-controls="{{ $key }}"
                                               aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                               {{ $lang }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="tab-content mt-3" id="localeTabsContent">
                                    @foreach (config('app.languages') as $key => $lang)
                                        <div class="tab-pane fade @if ($loop->first) show active @endif"
                                             id="{{ $key }}"
                                             role="tabpanel"
                                             aria-labelledby="{{ $key }}-tab">

                                            <!-- Name Input -->
                                            <div class="form-group">
                                                <label for="{{ $key }}_name">الاسم - {{ $lang }}</label>
                                                <input type="text"
                                                       id="{{ $key }}_name"
                                                       name="{{ $key }}[title]"
                                                       class="form-control"
                                                       placeholder="أدخل الاسم"
                                                       value="{{ $about->translate($key)->title ?? '' }}">
                                            </div>

                                            <!-- Description Input -->
                                            <div class="form-group">
                                                <label for="{{ $key }}_description">المحتوى - {{ $lang }}</label>
                                                <textarea id="{{ $key }}_description"
                                                          name="{{ $key }}[desc]"
                                                          class="form-control"
                                                          placeholder="أدخل المحتوى"
                                                          rows="3">{{ $about->translate($key)->desc ?? '' }}</textarea>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- General Fields -->
                        <div class="row">
                            <!-- Image Upload -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image" class="form-label">الصورة</label>
                                    <input type="file" id="image" name="image" class="form-control">
                                    @if ($about->image)
                                        <div class="text-muted">الصورة الحالية:
                                             <a href="{{ asset($about->image) }}" target="_blank"><img src="{{asset('images/about/'.$about->image)}}" alt="">
                                            </a>
                                            </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status" class="form-label">الحالة</label>
                                    <select id="status" name="status" class="form-control select2">
                                        <option value="active" {{ $about->status == 'active' ? 'selected' : '' }}>مفعل</option>
                                        <option value="disabled" {{ $about->status == 'disabled' ? 'selected' : '' }}>غير مفعل</option>
                                    </select>
                                </div>
                            </div>

                              <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status"> الترتيب</label>
                                <div class="form-group">
                                     <input type="number" name="order" class="form-control" placeholder="الترتيب" value="{{ $about -> order }}">
                                     
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">تحديث</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Internal Select2 js -->
    <script src="{{ URL::asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endsection