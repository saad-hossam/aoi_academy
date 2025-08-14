<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'en.body' => 'required|max:256',
            'ar.body' => 'required|max:256',
            'en.description' => 'required|max:256',
            'ar.description' => 'required|max:256',
            'price'=>'required',
            // 'package'=>'required',
            'category_id'=>'required',
            'image'=>['required',File::image()->types(['jpeg','png','jpg','gif'])->max(1024)],
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
            'en.body.required' => 'الاسم باللغه الانجليزيه مطلوب',
            'en.body.max:256'=>'يجب الا يتخطي عدد حروف الاسم اكثر من 256 حرف',
            'ar.body.max:256'=>'يجب الا يتخطي عدد حروف الاسم اكثر من 256 حرف',
            'ar.body.required'  => 'الاسم باللغه العربيه مطلوب',
            'en.description.required' => 'الاسم باللغه الانجليزيه مطلوب',
            'en.description.max:256'=>'يجب الا يتخطي عدد حروف الاسم اكثر من 256 حرف',
            'ar.description.max:256'=>'يجب الا يتخطي عدد حروف الاسم اكثر من 256 حرف',
            'ar.description.required'  => 'الاسم باللغه العربيه مطلوب',
            'price.number' => 'يجب ان يكون السعر رقم',
            'status.required' => 'حاله القسم مطلوبه'
        ];
    }
}
