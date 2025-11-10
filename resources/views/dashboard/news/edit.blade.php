@extends('layouts.dashbord.master')

@section('css')
<link href="{{ URL::asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">تعديل الخبر</h4>
        </div>
    </div>
    @can('new-list')
    <div class="d-flex my-xl-auto right-content">
        <a class="btn btn-primary btn-block" href="{{ route('news.index') }}">جميع الأخبار</a>
    </div>
    @endcan
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">

        <!-- Form تعديل الخبر -->
        <div class="card">
            <div class="card-body">

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif

                <form method="POST" action="{{ route('news.update', $new->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Translations -->
                    <div class="card mb-4">
                        <div class="card-header"><strong>{{ __('words.translations') }}</strong></div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="localeTabs" role="tablist">
                                @foreach (config('app.languages') as $key => $lang)
                                    <li class="nav-item">
                                        <a class="nav-link @if ($loop->first) active @endif" id="{{ $key }}-tab" data-toggle="tab" href="#{{ $key }}" role="tab" aria-controls="{{ $key }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $lang }}</a>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="tab-content mt-3">
                                @foreach (config('app.languages') as $key => $lang)
                                    <div class="tab-pane fade @if ($loop->first) show active @endif" id="{{ $key }}" role="tabpanel" aria-labelledby="{{ $key }}-tab">
                                        <div class="form-group">
                                            <label for="{{ $key }}_title">العنوان - {{ $lang }}</label>
                                            <input type="text" id="{{ $key }}_title" name="{{ $key }}[title]" class="form-control" value="{{ old($key.'.title', $new->translate($key)->title ?? '') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="{{ $key }}_desc">المحتوى - {{ $lang }}</label>
                                            <textarea id="{{ $key }}_desc" name="{{ $key }}[desc]" class="form-control" rows="3">{{ old($key.'.desc', $new->translate($key)->desc ?? '') }}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- General Fields -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">الصورة الرئيسية</label>
                                <input type="file" id="image" name="image" class="form-control">
                                @if ($new->image)
                                    <div class="mt-2">
                                        <a href="{{ asset('images/news/'.$new->image) }}" target="_blank">
                                            <img src="{{ asset('images/news/'.$new->image) }}" width="100">
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">الحالة</label>
                                <select id="status" name="status" class="form-control select2">
                                    <option value="active" {{ old('status', $new->status) == 'active' ? 'selected' : '' }}>مفعل</option>
                                    <option value="disabled" {{ old('status', $new->status) == 'disabled' ? 'selected' : '' }}>غير مفعل</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label for="order">الترتيب</label>
                                <input type="number" name="order" class="form-control" value="{{ old('order', $new->order) }}">
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">تحديث</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Form رفع الصور -->
        <div class="card mt-4">
            <div class="card-header"><h5 class="card-title">إدارة الصور</h5></div>
            <div class="card-body">

                <form action="{{ route('news.images.store', $new->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="images">إضافة صور جديدة</label>
                        <input type="file" name="images[]" class="form-control" multiple>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">رفع الصور</button>
                </form>

                <hr>

                <!-- Existing Images -->
                <div class="table-responsive mt-3">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>الصورة</th>
                                <th>عمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($new->images as $image)
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

    </div>
</div>

<!-- Delete Image Modal -->
<div class="modal fade" id="deleteImageModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="deleteImageForm" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="image_id" id="image_id">
                <div class="modal-header">
                    <h6 class="modal-title">حذف الصورة</h6>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <p>هل أنت متأكد من حذف هذه الصورة؟</p>
                </div>
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

    // Pass image ID to delete form
    $('#deleteImageModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var imageId = button.data('image_id');
        var url = "{{ route('news.images.destroy', ':id') }}";
        url = url.replace(':id', imageId);
        $('#deleteImageForm').attr('action', url);
        $('#image_id').val(imageId);
    });
});
</script>
@endsection
