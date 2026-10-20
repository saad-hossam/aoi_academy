@extends('layouts.dashbord.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('title')
    تعديل الدورة
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">تعديل الدورة</h4>
            </div>
        </div>

        <div class="d-flex my-xl-auto right-content">
            <a class="btn btn-primary btn-block" href="{{ route('courses.index') }}">جميع الدورات</a>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('courses.update', $course->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @include('dashboard.courses._form')

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">تحديث</button>
                        </div>
                    </form>

                    {{-- Outside the main form on purpose: HTML does not allow a form inside a form --}}
                    <form id="deleteImageForm" method="POST" action="" style="display:none;">
                        @csrf
                        @method('DELETE')
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
        $(document).ready(function() {
            $('.select2').select2();
        });

        // Delete one gallery image
        $('.btn-delete-image').on('click', function() {
            if (confirm('هل أنت متأكد من حذف هذه الصورة؟')) {
                $('#deleteImageForm').attr('action', $(this).data('url')).submit();
            }
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
