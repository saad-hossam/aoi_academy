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
                <h4 class="content-title mb-0 my-auto">تعديل الشريك</h4>
            </div>
        </div>
        
        <div class="d-flex my-xl-auto right-content">
            <a class="btn btn-primary btn-block" href="{{ route('partners.index') }}">جميع الشركاء</a>
        </div>
       
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

                    <form method="POST" action="{{ route('partners.update', $partner->id) }}" enctype="multipart/form-data">
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
                                                       value="{{ $partner->translate($key)->title ?? '' }}">
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
                                    @if ($partner->image)
                                        <div class="text-muted">الصورة الحالية:
                                             <a href="{{ asset($partner->image) }}" target="_blank"><img src="{{asset('images/partners/'.$partner->image)}}" alt="">
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
                                        <option value="active" {{ $partner->status == 'active' ? 'selected' : '' }}>مفعل</option>
                                        <option value="disabled" {{ $partner->status == 'disabled' ? 'selected' : '' }}>غير مفعل</option>
                                    </select>
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