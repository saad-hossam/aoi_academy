<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutRequest extends FormRequest
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
            'ar.desc' => 'required|string',
            'en.desc' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages(){
        return [
            'ar.name.required' => 'الاسم العربي مطلوب.',
            'en.name.required' => 'الاسم الانجليزي مطلوب.',
            'ar.description.required' => 'الوصف العربي مطلوب.',
            'en.description.required' => 'الوصف الانجليزي مطلوب.',
            'image.required' => 'الصورة مطلوبة.',
            'image.image' => 'يجب أن تكون الصورة بصيغة صحيحة.',
            'image.mimes' => 'يجب أن تكون الصورة من نوع jpeg, png, jpg, gif أو svg.',
            'image.max' => 'يجب الا يتخطي حجم الصورة عن 2MB',
            'status.required' => 'حالة التاريخ المطلوبة.',
        ];
        
    }
}
