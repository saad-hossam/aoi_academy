<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
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
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ar.title' => 'required|string|max:255',
            'en.title' => 'required|string|max:255',
        ];
    }
    public function messages(){
        return[
            'status.required' => 'حالة العرض مطلوبة.',
            'status.in' => 'حالة العرض غير صحيحة.',
            'image.required' => 'صورة العرض مطلوبة.',
            'image.mimes' => 'يجب أن تكون صورة العرض بملفات jpeg, png, jpg, gif, svg.',
            'image.max' => 'حجم الصورة يتجاوز 2MB.',
            'ar.title.required' => 'عنوان العرض باللغة العربية مطلوب.',
            'ar.title.string' => 'عنوان العرض باللغة العربية ',
            'ar.title.max' => 'يجب الا يتخطي عدد حروف العنوان اكثر من 255 حرف.',
            'en.title.required' => 'عنوان العرض باللغة الانجليزية مطلوب.',
            'en.title.string' => 'عنوان العرض باللغة الانجليزية ',
            'en.title.max' => 'يجب الا يتخطي عدد حروف العنوان اكثر من 255 حرف.',

        ];

}
}
