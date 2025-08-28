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
                <h4 class="content-title mb-0 my-auto">اضافه فئة</h4>
            </div>
        </div>

        <div class="d-flex my-xl-auto right-content">
            <a class="btn btn-primary btn-block" href="{{ route('categories.index') }}">جميع الفئات </a>

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
                            <div class="alert alert-info">{{ $error }}</div>
                        @endforeach
                    @endif





                    <form method="post" action="{{ route('categories.store') }}" class="needs-validation ">
                        @csrf

                        <div class="card">
                            <div class="card-header">
                                <strong>{{ __('words.translations') }}</strong>
                            </div>
                            <div class="card-block">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    @foreach (config('app.languages') as $key => $lang)
                                        <li class="nav-item">
                                            <a class="nav-link @if ($loop->index == 0) active @endif" id="home-tab"
                                                data-toggle="tab" href="#{{ $key }}" role="tab" aria-controls="home"
                                                aria-selected="true">{{ $lang }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    @foreach (config('app.languages') as $key => $lang)
                                        <div class="tab-pane mt-3 fade @if ($loop->index == 0) show active in @endif"
                                            id="{{ $key }}" role="tabpanel" aria-labelledby="home-tab">
                                            <br>
                                            <div class="form-group mt-3 col-md-12">
                                                <label> عنوان الفئة-- {{ $lang }}</label>
                                                <input type="text" name="{{$key}}[title]" class="form-control"
                                                    placeholder="عنوان الفئة">
                                            </div>


                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row row-xs formgroup-wrapper">

                            {{-- Video Order --}}
                            <div class="col-md-6 mg-t-20">
                                <label class="form-label h5" for="order">ترتيب الفئة</label>
                                <input type="number" class="form-control" name="order" id="order" value="0"
                                    placeholder="ادخل ترتيب العرض">
                            </div>
                            <div class="form-group">
                                <label for="parent_id">الفئة الاب</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="">-- لا يوجد --</option>
                                    @foreach($categories as $parentCategory)
                                        <option value="{{ $parentCategory->id }}" {{ isset($category) && $category->parent_id == $parentCategory->id ? 'selected' : '' }}>
                                            {{ $parentCategory->translate(app()->getLocale())->title ?? $parentCategory->id }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-md-6 mg-t-20 mg-md-t-0 mt-2">
                                <label class="form-lable h5" for="status">حاله الفئة</label>
                                <div class="form-group">
                                    <select class="form-control select2-search" id="status" name="status">
                                        <option value="active" selected>مفعل</option>
                                        <option value="disabled">غير مفعل</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button class="btn btn-main-primary pd-x-20" type="submit">تاكيد</button>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!--Internal  Select2 js -->
    <script src="{{ URL::asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.steps js -->
    <script src="{{ URL::asset('assets/admin/plugins/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/parsleyjs/parsley.min.js') }}"></script>
    <!--Internal  Form-wizard js -->
    {{--
    <script src="{{URL::asset('assets/admin/js/form-wizard.js')}}"></script> --}}
    <script>
        ClassicEditor
            .create(document.querySelector('#client_address'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#client_note'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#client_stats_note'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);



            });

    </script>

@endsection