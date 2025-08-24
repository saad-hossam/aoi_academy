<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVideoRequest extends FormRequest
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
            'link' => 'required|string',
            
        ];
    }
    public function messages(){
        return [
            'ar.title.required' => 'الاسم العربي مطلوب.',
            'en.title.required' => 'الاسم الانجليزي مطلوب.',
            'link.required' => 'الرابط  مطلوب.',
           
            'status.required' => 'حالة الفيديو مطلوبة.',
        ];

    }
}

