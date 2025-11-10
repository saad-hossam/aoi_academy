@extends('layouts.dashbord.master')
@section('css')

@section('title')
    المميزات
@stop

<!-- Internal Data table css -->
<link href="{{ URL::asset('assets/admin/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/admin/admin/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/admin/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/admin/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/admin/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/admin/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">المميزات</h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة المميزات</span>
        </div>
    </div>
    @can('capability-create')
    <div class="d-flex my-xl-auto right-content">
        <a class="btn btn-primary btn-block" href="{{ route('capabilities.create') }}">اضافة ميزة</a>
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
                msg: " {{ session()->get('delete') }}",
                type: "error"
            });
        }
    </script>
@endif

<!-- row opened -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0"></div>
            <div class="card-body">
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover text-md-nowrap" id="example1" data-page-length='50' style="text-align: center;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الميزة</th>
                                <th>وصف الميزة</th>
                                <th>صورة</th>
                                <th>الحالة</th>
                                <th>الترتيب</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($capabilities->count() > 0)
                                @foreach ($capabilities as $capability)
                                    <tr>
                                        <td>{{ $capability->id }}</td>
                                        <td>{{ $capability->title }}</td>
                                        <td>{{ $capability->desc }}</td>
                                        <td>
                                            <img src="{{ asset('images/capabilities/' . $capability->image) }}" alt="" width="80">
                                        </td>
                                        <td>
                                            @if ($capability->status == 'active')
                                                <span class="label text-success d-flex" style="margin-right: 50px;">
                                                    <div class="dot-label bg-success"></div>مفعل
                                                </span>
                                            @else
                                                <span class="label text-danger d-flex" style="margin-right: 50px;">
                                                    <div class="dot-label bg-danger"></div>غير مفعل
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{ $capability->order }}</td>
                                        <td>
                                            <a href="{{ route('capabilities.edit', $capability->id) }}" class="btn btn-sm btn-info" title="تعديل">
                                                <i class="las la-pen"></i>
                                            </a>
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                               data-capability_id="{{ $capability->id }}" data-title="{{ $capability->title }}"
                                               data-toggle="modal" href="#deleteModal" title="حذف">
                                                <i class="las la-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal" id="deleteModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف الميزة</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('capabilities.destroy', 0) }}" method="post">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="capability_id" id="capability_id" value="">
                        <input class="form-control" name="title" id="capability_title" type="text" readonly>
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
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/js/table-data.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/notify/js/notifit-custom.js') }}"></script>
<script src="{{ URL::asset('assets/admin/js/modal.js') }}"></script>

<script>
    $('#deleteModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var capability_id = button.data('capability_id')
        var title = button.data('title')
        var modal = $(this)
        modal.find('.modal-body #capability_id').val(capability_id);
        modal.find('.modal-body #capability_title').val(title);
    })
</script>
@endsection
