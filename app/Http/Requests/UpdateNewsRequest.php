<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
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
              'status' => 'required|in:active,inactive',

            'ar.title' => 'required|string|max:255',
            'en.title' => 'required|string|max:255',

            'ar.desc' => 'required|string',
            'en.desc' => 'required|string',

            
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

           
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

     public function messages(): array
    {
        return [
            // Translations
            'ar.title.required' => 'العنوان العربي مطلوب.',
            'en.title.required' => 'العنوان الإنجليزي مطلوب.',
            'ar.desc.required'  => 'الوصف العربي مطلوب.',
            'en.desc.required'  => 'الوصف الإنجليزي مطلوب.',

            // Main image
            'image.image' => 'يجب أن تكون الصورة الرئيسية بصيغة صحيحة.',
            'image.mimes' => 'الصورة الرئيسية يجب أن تكون من نوع jpeg, png, jpg, gif أو svg.',
            'image.max'   => 'حجم الصورة الرئيسية يجب ألا يتخطى 2MB.',

            // Extra images
            'images.*.image' => 'كل صورة إضافية يجب أن تكون بصيغة صحيحة.',
            'images.*.mimes' => 'كل صورة إضافية يجب أن تكون من نوع jpeg, png, jpg, gif أو svg.',
            'images.*.max'   => 'حجم أي صورة إضافية يجب ألا يتخطى 2MB.',

            // Status
            'status.required' => 'حالة الخبر مطلوبة.',
            'status.in'       => 'الحالة يجب أن تكون مفعل أو غير مفعل.',
        ];
    }

}
