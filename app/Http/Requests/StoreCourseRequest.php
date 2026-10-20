<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // permissions are checked by the controller middleware
    }

    public function rules(): array
    {
        $rules = [
            'image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // main image
            'images'   => 'nullable|array',                                   // gallery
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'   => 'required|in:active,disabled',                      // same values as partners
            'order'    => 'nullable|integer|min:0',
        ];

        foreach (array_keys(config('app.languages')) as $locale) {
            $rules["$locale.title"]        = 'required|string|max:255';
            $rules["$locale.goal"]         = 'nullable|string';
            $rules["$locale.content"]      = 'nullable|string';
            $rules["$locale.duration"]     = 'nullable|string|max:100';
            $rules["$locale.pre_request"]  = 'nullable|string';
            $rules["$locale.meta_desc"]    = 'nullable|string|max:500';
            $rules["$locale.meta_keyword"] = 'nullable|string|max:500';
        }

        return $rules;
    }

    // Readable names in error messages (instead of "ar.title")
    public function attributes(): array
    {
        $attributes = [
            'image'  => 'الصورة الرئيسية',
            'images' => 'صور الدورة',
            'status' => 'الحالة',
            'order'  => 'الترتيب',
        ];

        foreach (config('app.languages') as $locale => $lang) {
            $attributes["$locale.title"]        = "عنوان الدورة ($lang)";
            $attributes["$locale.goal"]         = "الهدف ($lang)";
            $attributes["$locale.content"]      = "المحتوى ($lang)";
            $attributes["$locale.duration"]     = "المدة ($lang)";
            $attributes["$locale.pre_request"]  = "المتطلبات السابقة ($lang)";
            $attributes["$locale.meta_desc"]    = "وصف السيو ($lang)";
            $attributes["$locale.meta_keyword"] = "كلمات السيو ($lang)";
        }

        return $attributes;
    }
}
