@php $course = $course ?? null; @endphp

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
@endif

<!-- Translations -->
<div class="card">
    <div class="card-header">
        <strong>{{ __('words.translations') }}</strong>
    </div>
    <div class="card-block">
        <ul class="nav nav-tabs" id="localeTabs" role="tablist">
            @foreach (config('app.languages') as $key => $lang)
                <li class="nav-item">
                    <a class="nav-link @if ($loop->first) active @endif" id="{{ $key }}-tab"
                        data-toggle="tab" href="#{{ $key }}" role="tab" aria-controls="{{ $key }}"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $lang }}</a>
                </li>
            @endforeach
        </ul>

        <div class="tab-content mt-3" id="localeTabsContent">
            @foreach (config('app.languages') as $key => $lang)
                @php $tr = $course ? $course->translate($key) : null; @endphp
                <div class="tab-pane fade @if ($loop->first) show active @endif" id="{{ $key }}"
                    role="tabpanel" aria-labelledby="{{ $key }}-tab">

                    <div class="form-group">
                        <label>عنوان الدورة - {{ $lang }}</label>
                        <input type="text" name="{{ $key }}[title]" class="form-control"
                            placeholder="عنوان الدورة" value="{{ old($key . '.title', $tr->title ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label>المدة - {{ $lang }}</label>
                        <input type="text" name="{{ $key }}[duration]" class="form-control"
                            placeholder="مثال: 6 أسابيع" value="{{ old($key . '.duration', $tr->duration ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label>الهدف من الدورة - {{ $lang }}</label>
                        <textarea name="{{ $key }}[goal]" rows="3" class="form-control">{{ old($key . '.goal', $tr->goal ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>محتوى الدورة - {{ $lang }}</label>
                        <textarea name="{{ $key }}[content]" id="content_{{ $key }}" rows="6"
                            class="form-control editor">{{ old($key . '.content', $tr->content ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>المتطلبات السابقة - {{ $lang }}</label>
                        <textarea name="{{ $key }}[pre_request]" rows="3" class="form-control">{{ old($key . '.pre_request', $tr->pre_request ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>وصف السيو (Meta Description) - {{ $lang }}</label>
                        <textarea name="{{ $key }}[meta_desc]" rows="2" class="form-control">{{ old($key . '.meta_desc', $tr->meta_desc ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>كلمات السيو (Meta Keywords) - {{ $lang }}</label>
                        <input type="text" name="{{ $key }}[meta_keyword]" class="form-control"
                            placeholder="كلمة, كلمة, كلمة"
                            value="{{ old($key . '.meta_keyword', $tr->meta_keyword ?? '') }}">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- General fields -->
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label h5">الصورة الرئيسية</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            @if ($course && $course->image)
                <div class="text-muted mt-2">الصورة الحالية:
                    <a href="{{ asset('images/courses/' . $course->image) }}" target="_blank">
                        <img src="{{ asset('images/courses/' . $course->image) }}" alt=""
                            style="max-height: 80px;">
                    </a>
                </div>
            @endif
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="form-label h5" for="status">الحالة</label>
            <select id="status" name="status" class="form-control select2">
                <option value="active" {{ old('status', $course->status ?? 'active') == 'active' ? 'selected' : '' }}>مفعل</option>
                <option value="disabled" {{ old('status', $course->status ?? 'active') == 'disabled' ? 'selected' : '' }}>غير مفعل</option>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label class="form-label h5" for="order">الترتيب</label>
            <input type="number" min="0" id="order" name="order" class="form-control"
                value="{{ old('order', $course->order ?? 0) }}">
        </div>
    </div>
</div>

<!-- Gallery -->
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="form-label h5">صور الدورة (يمكن اختيار أكثر من صورة)</label>
            <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
        </div>

        @if ($course && $course->images->count())
            <div class="row mt-3">
                @foreach ($course->images as $img)
                    <div class="col-6 col-md-3 text-center mb-3">
                        <img src="{{ asset('images/courses/gallery/' . $img->path) }}" alt=""
                            class="img-fluid" style="max-height: 120px;">
                        <div>
                            <button type="button" class="btn btn-sm btn-danger mt-2 btn-delete-image"
                                data-url="{{ route('courses.images.destroy', $img->id) }}">حذف</button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
