<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartnerRequest extends FormRequest
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
            'name' => 'required|max:256',
            // 'ar.name' => 'required|max:256',
            'status' => 'required',
            'logo' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages(){
        return[
            'en.name.required' => 'الاسم باللغة الانجليزية مطلوب.',
            'en.name.max:256' => 'يجب الا يتخطي عدد حروف الاسم اكثر من 256 حرف.',
            'ar.name.required' => 'الاسم باللغة العربية مطلوب.',
            'ar.name.max:256' => 'يجب الا يتخطي عدد حروف الاسم اكثر من 256 حرف.',
           'status.required' => 'حالة الشريك مطلوبة.',
            'logo.required' => 'الشعار مطلوب.',
            'logo.image' => 'يجب ان يكون الملف صوره.',
            'logo.mimes' => 'يجب ان يكون نوع الصورة jpeg, png, jpg, gif.',

        ];
    }
}
