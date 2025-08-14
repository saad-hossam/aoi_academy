<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'image' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages(){
        return[
            'en.name.required' => 'الاسم باللغة الانجليزية مطلوب.',
            'en.name.max:256' => 'يجب الا يتخطي عدد حروف الاسم اكثر من 256 حرف.',
            'ar.name.required' => 'الاسم باللغة العربية مطلوب.',
            'ar.name.max:256' => 'يجب الا يتخطي عدد حروف الاسم اكثر من 256 حرف.',
            'en.description.required' => 'الوصف باللغة الانجليزية مطلوب.',
            'en.description.max:256' => 'يجب الا يتخطي عدد حروف الوصف اكثر من 256 حرف.',
            'ar.description.required' => 'الوصف باللغة العربية مطلوب.',
            'ar.description.max:256' => 'يجب الا يتخطي عدد حروف الوصف اكثر من 256 حرف.',
            'en.body.required' => 'المحتوى باللغة الانجليزية مطلوب.',
            'en.body.max:256' => 'يجب الا يتخطي عدد حروف المحتوى اكثر من 256 حرف.',
            'ar.body.required' => 'المحتوى باللغة العربية مطلوب.',
            'ar.body.max:256' => 'يجب الا يتخطي عدد حروف المحتوى اكثر من 256 حرف.',
           'status.required' => 'حالة الخدمة مطلوبة.',
            'image.required' => 'الصورة مطلوبة.',
            'image.image' => 'يجب أن تكون الصورة بصيغة صحيحة.',
            'image.mimes' => 'يجب أن تكون الصورة من نوع jpeg, png, jpg, gif.',

        ];

}
}
