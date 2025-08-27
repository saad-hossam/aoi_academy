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
                <h4 class="content-title mb-0 my-auto">إضافة خبر</h4>
            </div>
        </div>

          @can('new-list')
        <div class="d-flex my-xl-auto right-content">
            <a class="btn btn-primary btn-block" href="{{ route('news.index') }}">جميع الأخبار</a>
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
                        <div class="alert alert-info">{{ $error }}</div>
                    @endforeach
                @endif

                <form method="post" action="{{ route('news.store') }}" class="needs-validation" enctype="multipart/form-data">
                    @csrf

                    <!-- Translations -->
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('words.translations') }}</strong>
                        </div>
                        <div class="card-block">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @foreach (config('app.languages') as $key => $lang)
                                    <li class="nav-item">
                                        <a class="nav-link @if ($loop->index == 0) active @endif"
                                           data-toggle="tab"
                                           href="#{{ $key }}" role="tab">{{ $lang }}</a>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                @foreach (config('app.languages') as $key => $lang)
                                    <div class="tab-pane mt-3 fade @if ($loop->index == 0) show active in @endif"
                                         id="{{ $key }}" role="tabpanel">
                                        <div class="form-group mt-3 col-md-12">
                                            <label>العنوان ({{ $lang }})</label>
                                            <input type="text" name="{{ $key }}[title]" class="form-control" placeholder="العنوان">
                                        </div>

                                        <div class="form-group mt-3 col-md-12">
                                            <label>الوصف ({{ $lang }})</label>
                                            <textarea name="{{ $key }}[desc]" class="form-control" rows="4" placeholder="الوصف"></textarea>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Main Image -->
                    <div class="row row-xs formgroup-wrapper">
                        <div class="col-md-6 mg-t-20 mg-md-t-0">
                            <label class="form-lable h5">الصورة الرئيسية</label>
                            <div class="form-group">
                                <input name="image" type="file" class="form-control"/>
                            </div>
                        </div>

                        <!-- Extra Images -->
                        <div class="col-md-6 mg-t-20 mg-md-t-0">
                            <label class="form-lable h5">صور إضافية</label>
                            <div class="form-group">
                                <input name="images[]" type="file" class="form-control" multiple/>
                                <small class="text-muted">يمكنك اختيار أكثر من صورة</small>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6 mg-t-20 mg-md-t-0">
                            <label class="form-lable h5">الحالة</label>
                            <div class="form-group">
                                <select class="form-control select2-search" name="status">
                                    <option value="active" selected>مفعل</option>
                                    <option value="disabled">غير مفعل</option>
                                </select>
                            </div>
                        </div>

                        <!-- Order -->
                        <div class="col-md-6 mg-t-20 mg-md-t-0">
                            <label class="form-lable h5">الترتيب</label>
                            <div class="form-group">
                                <input type="number" name="order" class="form-control" placeholder="الترتيب">
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-main-primary pd-x-20" type="submit">تأكيد</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ URL::asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/parsleyjs/parsley.min.js') }}"></script>
@endsection
