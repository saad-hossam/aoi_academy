<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUnitRequest extends FormRequest
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
            'geha' => 'required|in:تابع للهيئة,غير تابع للهيئة',

            'ar.title' => 'required|string|max:255',
            'en.title' => 'required|string|max:255',

        ];
    }
    public function messages()
    {
        return [
            'ar.title.required' => 'الاسم العربي مطلوب.',
            'en.title.required' => 'الاسم الانجليزي مطلوب.',
            'ar.title.max' => 'الاسم العربي يجب ألا يتجاوز 255 حرفًا.',
            'en.title.max' => 'الاسم الانجليزي يجب ألا يتجاوز 255 حرفًا.',

            'status.required' => 'الحالة مطلوبة.',
            'geha.required' => 'الجهة مطلوبة',
        ];

    }
}
