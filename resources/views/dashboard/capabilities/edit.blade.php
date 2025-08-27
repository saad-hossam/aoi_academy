@extends('layouts.dashbord.master')

@section('css')
<link href="{{ URL::asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">تعديل الميزة</h4>
        </div>
    </div>
   @can('capability-list')
    <div class="d-flex my-xl-auto right-content">
        <a class="btn btn-primary btn-block" href="{{ route('capabilities.index') }}">جميع الميزات</a>
    </div>
    @endcan
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">

        {{-- FORM تحديث الميزة --}}
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif

                <form method="POST" action="{{ route('capabilities.update', $capability->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Translations --}}
                    <div class="card mb-4">
                        <div class="card-header"><strong>{{ __('words.translations') }}</strong></div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" role="tablist">
                                @foreach (config('app.languages') as $key => $lang)
                                    <li class="nav-item">
                                        <a class="nav-link @if ($loop->first) active @endif" data-toggle="tab" href="#{{ $key }}" role="tab">
                                            {{ $lang }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content mt-3">
                                @foreach (config('app.languages') as $key => $lang)
                                    <div class="tab-pane fade @if ($loop->first) show active @endif" id="{{ $key }}" role="tabpanel">
                                        <div class="form-group">
                                            <label>العنوان - {{ $lang }}</label>
                                            <input type="text" name="{{ $key }}[title]" class="form-control" value="{{ old($key.'.title', $capability->translate($key)->title ?? '') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>الوصف - {{ $lang }}</label>
                                            <textarea name="{{ $key }}[desc]" class="form-control" rows="3">{{ old($key.'.desc', $capability->translate($key)->desc ?? '') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Description - {{ $lang }}</label>
                                            <textarea name="{{ $key }}[meta_desc]" class="form-control" rows="2">{{ old($key.'.meta_desc', $capability->translate($key)->meta_desc ?? '') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Keyword - {{ $lang }}</label>
                                            <input type="text" name="{{ $key }}[meta_keyword]" class="form-control" value="{{ old($key.'.meta_keyword', $capability->translate($key)->meta_keyword ?? '') }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- General Fields --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الصورة الرئيسية</label>
                                <input type="file" name="image" class="form-control">
                                @if ($capability->image)
                                    <div class="mt-2">
                                        <a href="{{ asset('images/capabilities/'.$capability->image) }}" target="_blank">
                                            <img src="{{ asset('images/capabilities/'.$capability->image) }}" width="100">
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الحالة</label>
                                <select name="status" class="form-control select2">
                                    <option value="active" {{ old('status', $capability->status) == 'active' ? 'selected' : '' }}>مفعل</option>
                                    <option value="disabled" {{ old('status', $capability->status) == 'disabled' ? 'selected' : '' }}>غير مفعل</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label>الترتيب</label>
                                <input type="number" name="order" class="form-control" value="{{ old('order', $capability->order) }}">
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">تحديث</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- END FORM تحديث الميزة --}}

        {{-- FORM رفع الصور --}}
        <div class="card mt-4">
            <div class="card-header"><h5 class="card-title">إدارة الصور</h5></div>
            <div class="card-body">

                <form action="{{ route('capabilities.images.store', $capability->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>إضافة صور جديدة</label>
                        <input type="file" name="images[]" class="form-control" multiple required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">رفع الصور</button>
                </form>

                <hr>

                <div class="table-responsive mt-3">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>الصورة</th>
                                <th>عمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($capability->images as $image)
                                <tr>
                                    <td>
                                        <a href="{{ $image->url }}" target="_blank">
                                            <img src="{{ $image->url }}" class="rounded" style="width:160px; max-height:100px">
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-danger"
                                                data-toggle="modal"
                                                data-target="#deleteImageModal"
                                                data-image_id="{{ $image->id }}">
                                            <i class="las la-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="2">لا توجد صور حالياً</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        {{-- END FORM رفع الصور --}}

    </div>
</div>

{{-- Delete Image Modal --}}
<div class="modal fade" id="deleteImageModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="deleteImageForm" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="image_id" id="image_id">
                <div class="modal-header">
                    <h6 class="modal-title">حذف الصورة</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body"><p>هل أنت متأكد من حذف هذه الصورة؟</p></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-danger">تأكيد</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ URL::asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
<script>
$(document).ready(function () {
    $('.select2').select2();

    $('#deleteImageModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var imageId = button.data('image_id');
        var url = "{{ route('capabilities.images.destroy', ':id') }}";
        url = url.replace(':id', imageId);
        $('#deleteImageForm').attr('action', url);
        $('#image_id').val(imageId);
    });
});
</script>
@endsection
