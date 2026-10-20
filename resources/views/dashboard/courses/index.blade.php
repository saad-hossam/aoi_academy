@extends('layouts.dashbord.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/admin/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/admin/admin/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/admin/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/admin/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/admin/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/admin/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection

@section('title')
    الدورات
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الدورات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                    الدورات</span>
            </div>
        </div>

        @can('course-create')
            <div class="d-flex my-xl-auto right-content">
                <a class="btn btn-primary btn-block" href="{{ route('courses.create') }}">اضافه دورة</a>
            </div>
        @endcan
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    @if (session()->has('add'))
        <script>
            window.onload = function() {
                notif({
                    msg: "{{ session()->get('add') }}",
                    type: "success"
                });
            }
        </script>
    @endif

    @if (session()->has('edit'))
        <script>
            window.onload = function() {
                notif({
                    msg: "{{ session()->get('edit') }}",
                    type: "info"
                });
            }
        </script>
    @endif

    @if (session()->has('delete'))
        <script>
            window.onload = function() {
                notif({
                    msg: "{{ session()->get('delete') }}",
                    type: "error"
                });
            }
        </script>
    @endif

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive hoverable-table">
                        <table class="table table-hover text-md-nowrap" id="example1" data-page-length='50'
                            style="text-align: center;">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">اسم الدورة</th>
                                    <th class="wd-15p border-bottom-0">صورة الدورة</th>
                                    <th class="wd-15p border-bottom-0">المدة</th>
                                    <th class="wd-10p border-bottom-0">الترتيب</th>
                                    <th class="wd-15p border-bottom-0">حالة الدورة</th>
                                    <th class="wd-15p border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td>{{ $course->id }}</td>
                                        <td>{{ $course->title }}</td>
                                        <td>
                                            @if ($course->image)
                                                <img src="{{ asset('images/courses/' . $course->image) }}" alt=""
                                                    style="max-height: 50px;">
                                            @endif
                                        </td>
                                        <td>{{ $course->duration }}</td>
                                        <td>{{ $course->order }}</td>
                                        <td>
                                            @if ($course->status == 'active')
                                                <span class="label text-success d-flex" style="margin-right: 50px;">
                                                    <div class="dot-label bg-success"></div>مفعل
                                                </span>
                                            @else
                                                <span class="label text-danger d-flex" style="margin-right: 50px;">
                                                    <div class="dot-label bg-danger"></div>غير مفعل
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @can('course-edit')
                                                <a href="{{ route('courses.edit', $course->id) }}"
                                                    class="btn btn-sm btn-info" title="تعديل"><i
                                                        class="las la-pen"></i></a>
                                            @endcan

                                            @can('course-delete')
                                                <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                    data-url="{{ route('courses.destroy', $course->id) }}"
                                                    data-name="{{ $course->title }}" data-toggle="modal"
                                                    href="#modaldemo8" title="حذف"><i class="las la-trash"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->

        <!-- Delete modal -->
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">حذف الدورة</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form id="deleteCourseForm" action="" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="modal-body">
                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                            <input class="form-control" id="course_name" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تاكيد</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection

@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/admin/js/table-data.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/admin/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/notify/js/notifit-custom.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/admin/js/modal.js') }}"></script>

    <script>
        // Fill the delete modal with the clicked course (sets the form action to its own URL)
        $('#modaldemo8').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            $('#deleteCourseForm').attr('action', button.data('url'));
            $('#course_name').val(button.data('name'));
        });
    </script>
@endsection
