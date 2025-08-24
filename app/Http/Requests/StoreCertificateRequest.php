<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCertificateRequest extends FormRequest
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
            'ar.title' =>'required|string|max:255',
            'en.title' =>'required|string|max:255',
'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            
        ];
    }
    public function messages(){
        return [
            'ar.title.required' => 'الاسم العربي مطلوب.',
        'en.title.required' => 'الاسم الانجليزي مطلوب.',
        'image.required' => 'الصورة مطلوبة.',
        'image.image' => 'الملف يجب أن يكون صورة.',
        'image.mimes' => 'الصورة يجب أن تكون بصيغة: jpeg, png, jpg, gif, webp.',
        'image.max' => 'حجم الصورة لا يجب أن يتجاوز 2 ميجا.',
        'status.required' => 'الحالة مطلوبة.',
        ];

    }
}
