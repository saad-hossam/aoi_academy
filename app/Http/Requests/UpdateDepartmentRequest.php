<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentRequest extends FormRequest
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',  // Only allow jpeg, png, jpg images and max size of 2MB
            'status' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'en.name.required' => 'الاسم باللغه الانجليزيه مطلوب',
            'en.name.max:256'=>'يجب الا يتخطي عدد حروف الاسم اكثر من 256 حرف',
            'ar.name.max:256'=>'يجب الا يتخطي عدد حروف الاسم اكثر من 256 حرف',
            'ar.name.required'  => 'الاسم باللغه العربيه مطلوب',
            'status.required' => 'حاله القسم مطلوبه',
            'image.image' => 'يجب ان يكون الملف ��وره',
            'image.mimes' => 'يجب ان يكون نوع الصورة jpeg, png, jpg',
            'image.max' => 'يجب الا يتخطي حجم الصورة عن 2MB',
        ];
    }

}
