@extends('layouts.dashbord.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('title')
    اضافه دورة
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">اضافه دورة</h4>
            </div>
        </div>
        @can('course-list')
            <div class="d-flex my-xl-auto right-content">
                <a class="btn btn-primary btn-block" href="{{ route('courses.index') }}">جميع الدورات</a>
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
                    <form method="post" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                        @csrf

                        @include('dashboard.courses._form')

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
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

        // Rich text editor for "content" (only if CKEditor is loaded by the layout)
        if (typeof ClassicEditor !== 'undefined') {
            document.querySelectorAll('textarea.editor').forEach(function(el) {
                ClassicEditor.create(el).catch(function(error) {
                    console.error(error);
                });
            });
        }
    </script>
@endsection
