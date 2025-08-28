@extends('layouts.dashbord.master')
@section('css')

@section('title')
    الأخبار
@stop

<link href="{{ URL::asset('assets/admin/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/admin/admin/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/admin/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/admin/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/admin/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/admin/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection

@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الأخبار</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة الأخبار</span>
        </div>
    </div>
     @can('new-create')
    <div class="d-flex my-xl-auto right-content">
        <a class="btn btn-primary btn-block" href="{{ route('news.create') }}">إضافة خبر</a>
    </div>
    @endcan
</div>
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


<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover text-md-nowrap" id="example1" data-page-length='50' style="text-align: center;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان الخبر</th>
                                <th>الوصف</th>
                                <th>الصورة الرئيسية</th>
                                <th>الحالة</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($news->count() > 0)
                                @foreach ($news as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->desc }}</td>
                                        <td><img src="{{ asset('images/news/' . $item->image) }}" width="100" alt=""></td>
                                        <td>
                                            @if ($item->status == 'active')
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
                                            <a href="{{ route('news.edit', $item->id) }}" class="btn btn-sm btn-info" title="تعديل"><i class="las la-pen"></i></a>

                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                               data-news_id="{{ $item->id }}" data-newstitle="{{ $item->title }}"
                                               data-toggle="modal" href="#deleteModal" title="حذف"><i class="las la-trash"></i></a>
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

    <!-- Modal Delete -->
    <div class="modal" id="deleteModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف الخبر</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('news.destroy',0) }}" method="post">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="news_id" id="news_id" value="">
                        <input class="form-control" name="newstitle" id="newstitle" type="text" readonly>
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

@endsection

@section('js')
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/js/table-data.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/notify/js/notifit-custom.js') }}"></script>
<script src="{{ URL::asset('assets/admin/js/modal.js') }}"></script>

<script>
    $('#deleteModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var news_id = button.data('news_id')
        var newstitle = button.data('newstitle')
        var modal = $(this)
        modal.find('.modal-body #news_id').val(news_id);
        modal.find('.modal-body #newstitle').val(newstitle);
    })
</script>
@endsection
