<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCapabilityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
             'status' => 'required|in:active,disabled',
            'order'  => 'nullable|integer|min:0',

            // Translations
            'ar.title'          => 'required|string|max:255',
            'en.title'          => 'required|string|max:255',
            'ar.desc'           => 'required|string',
            'en.desc'           => 'required|string',
            'ar.meta_desc'      => 'required|string|max:255',
            'en.meta_desc'      => 'required|string|max:255',
            'ar.meta_keyword'   => 'required|string|max:255',
            'en.meta_keyword'   => 'required|string|max:255',

            // Main image (nullable on update)
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

            // Extra images
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'ar.title.required' => 'العنوان العربي مطلوب.',
            'en.title.required' => 'العنوان الانجليزي مطلوب.',
            'ar.desc.required' => 'الوصف العربي مطلوب.',
            'en.desc.required' => 'الوصف الانجليزي مطلوب.',
            'image.image' => 'يجب أن تكون الصورة بصيغة صحيحة.',
            'image.mimes' => 'الصورة يجب أن تكون jpeg, png, jpg, gif, svg أو webp.',
            'image.max' => 'يجب ألا يتجاوز حجم الصورة 2MB.',
            'status.required' => 'الحالة مطلوبة.',
            'status.in' => 'الحالة يجب أن تكون مفعل أو غير مفعل.',
            'ar.meta_desc.required'     => 'الوصف التعريفي العربي مطلوب.',
            'en.meta_desc.required'     => 'الوصف التعريفي الإنجليزي مطلوب.',
            'ar.meta_keyword.required' => 'الكلمات المفتاحية العربية مطلوبة.',
            'en.meta_keyword.required' => 'الكلمات المفتاحية الإنجليزية مطلوبة.',

        ];
    }
}
