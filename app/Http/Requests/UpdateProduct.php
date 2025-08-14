<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
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
            'price' => 'nullable|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => [
                'nullable',
                'file',
                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:1024', // 1MB max size
            ],
            'status' => [
                'required',
                Rule::in(['active', 'inactive']),
            ],
        ];
    }

    /**
     * Get the custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            // English name validation
            'en.name.required' => 'The English name is required.',
            'en.name.max' => 'The English name must not exceed 256 characters.',

            // Arabic name validation
            'ar.name.required' => 'الاسم باللغة العربية مطلوب.',
            'ar.name.max' => 'يجب ألا يتجاوز الاسم باللغة العربية 256 حرفًا.',

            // English body validation
            'en.body.required' => 'The English body is required.',
            'en.body.max' => 'The English body must not exceed 256 characters.',

            // Arabic body validation
            'ar.body.required' => 'النص باللغة العربية مطلوب.',
            'ar.body.max' => 'يجب ألا يتجاوز النص باللغة العربية 256 حرفًا.',

            // English description validation
            'en.description.required' => 'The English description is required.',
            'en.description.max' => 'The English description must not exceed 256 characters.',

            // Arabic description validation
            'ar.description.required' => 'الوصف باللغة العربية مطلوب.',
            'ar.description.max' => 'يجب ألا يتجاوز الوصف باللغة العربية 256 حرفًا.',

            // Price validation
            'price.numeric' => 'يجب أن يكون السعر رقمًا.',
            'price.min' => 'يجب ألا يكون السعر أقل من صفر.',

            // Category validation
            'category_id.required' => 'Category is required.',
            'category_id.exists' => 'The selected category is invalid.',

            // Image validation
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image size must not exceed 1MB.',

            // Status validation
            'status.required' => 'حالة المنتج مطلوبة.',
            'status.in' => 'الحالة يجب أن تكون إما "active" أو "inactive".',
        ];
    }
}
