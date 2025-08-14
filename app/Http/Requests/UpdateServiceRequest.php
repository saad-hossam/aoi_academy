<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
            'en.name' => 'required|max:256',
            'ar.name' => 'required|max:256',
            'en.description' => 'required',
            'ar.description' => 'required',
            'en.body' => 'required',
            'ar.body' => 'required',
            'status' => 'required',
            'image' =>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // هنا الفرق: nullable بدلاً من required
        ];
    }

    public function messages()
    {
        return [
            'en.name.required' => 'الاسم باللغة الانجليزية مطلوب.',
            'en.name.max' => 'يجب ألا يتجاوز عدد حروف الاسم 256 حرف.',
            'ar.name.required' => 'الاسم باللغة العربية مطلوب.',
            'ar.name.max' => 'يجب ألا يتجاوز عدد حروف الاسم 256 حرف.',
            'en.description.required' => 'الوصف باللغة الانجليزية مطلوب.',
            'ar.description.required' => 'الوصف باللغة العربية مطلوب.',
            'en.body.required' => 'المحتوى باللغة الانجليزية مطلوب.',
            'ar.body.required' => 'المحتوى باللغة العربية مطلوب.',
            'status.required' => 'حالة الخدمة مطلوبة.',
            'image.image' => 'يجب أن تكون الصورة بصيغة صحيحة.',
            'image.mimes' => 'يجب أن تكون الصورة من نوع jpeg, png, jpg, gif.',
            'image.max' => 'يجب ألا يتجاوز حجم الصورة 2 ميغابايت.',
        ];
    }
}
