<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCapabilityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
             'status' => 'required|in:active,disable',
            'order'  => 'nullable|integer|min:0',

            // Translations
            'ar.title'          => 'required|string|max:255',
            'en.title'          => 'required|string|max:255',
            'ar.desc'           => 'required|string',
            'en.desc'           => 'required|string',
            'ar.meta_desc'      => 'required|string|max:255',
            'en.meta_desc'      => 'required|string|max:255',
            'ar.meta_keyword'  => 'required|string|max:255',
            'en.meta_keyword'  => 'required|string|max:255',

            // Main image
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

            // Extra images
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ];
    }
     public function messages(): array
    {
        return [
              'ar.title.required'         => 'العنوان العربي مطلوب.',
            'en.title.required'         => 'العنوان الإنجليزي مطلوب.',
            'ar.desc.required'          => 'الوصف العربي مطلوب.',
            'en.desc.required'          => 'الوصف الإنجليزي مطلوب.',
            'ar.meta_desc.required'     => 'الوصف التعريفي العربي مطلوب.',
            'en.meta_desc.required'     => 'الوصف التعريفي الإنجليزي مطلوب.',
            'ar.meta_keywords.required' => 'الكلمات المفتاحية العربية مطلوبة.',
            'en.meta_keywords.required' => 'الكلمات المفتاحية الإنجليزية مطلوبة.',

            // Main image
            'image.required' => 'الصورة الرئيسية مطلوبة.',
            'image.image'    => 'يجب أن تكون الصورة الرئيسية بصيغة صحيحة.',
            'image.mimes'    => 'الصورة الرئيسية يجب أن تكون من نوع jpeg, png, jpg, gif, svg أو webp.',
            'image.max'      => 'يجب ألا يتجاوز حجم الصورة الرئيسية 2MB.',

            // Extra images
            'images.*.image' => 'كل صورة إضافية يجب أن تكون بصيغة صحيحة.',
            'images.*.mimes' => 'كل صورة إضافية يجب أن تكون من نوع jpeg, png, jpg, gif, svg أو webp.',
            'images.*.max'   => 'يجب ألا يتجاوز حجم أي صورة إضافية 2MB.',

            // Status
            'status.required' => 'الحالة مطلوبة.',
            'status.in'       => 'الحالة يجب أن تكون مفعل أو غير مفعل.',
        ];
    }
}
