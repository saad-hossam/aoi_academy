<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'department_id' => 'required|exists:departments,id',
            'status' => 'required|in:active,disabled',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ar.name' => 'required|string',
            'en.name' => 'required|string',
            'ar.description' => 'required|string',
            'en.description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages(){
        return [
            'department_id.required' => 'الإدارة مطلوبة',
            'department_id.exists' => 'الإدارة غير موجودة',
            'status.required' => 'الحالة مطلوبة',
            'status.in' => 'الحالة غير صحيحة',
            'images.*.image' => 'يجب أن يكون الملفات الصور فقط',
            'images.*.mimes' => 'يجب أن يكونون الملفات الصور بصيغة صحيحة مثل jpeg, png, jpg, gif, svg',
            'images.*.max' => 'يجب أن لا يتجاوز حجم الملفات الصور 2MB',
            'ar.name.required' => 'الاسم بالعربية مطلوب',
            'ar.name.string' => 'الاسم بالعربية يجب أن يكون نص',
            'ar.name.max' => 'الاسم بالعربية يجب أن لا يتجاوز 255 حرفا',
            'en.name.required' => 'الاسم بالانجليزية مطلوب',
            'en.name.string' => 'الاسم بالانجليزية يجب أن يكون نص',
            'en.name.max' => 'الاسم بالانجليزية يجب أن لا يتجاوز 255 حرفا',
            'ar.description.required' => 'الوصف بالعربية مطلوب',
            'ar.description.string' => 'الوصف بالعربية يجب أن يكون نص',
            'en.description.required' => 'الوصف بالانجليزية مطلوب',
            'en.description.string' => 'الوصف بالانجليزية يجب أن يكون نص',
            // 'image.required' => 'الصورة الرئيسية مطلوبة',
            'image.image' => 'يجب أن يكون الملف الصور فقط',
            'image.mimes' => 'يجب أن يكونون الملفات الصور بصيغة صحيحة مثل jpeg, png, jpg, gif, svg',
            'image.max' => 'يجب أن لا يتجاوز حجم الملف الصور 2MB',
            // Add more validation rules as needed for other fields in your project model and request.
        ];
    }
}
