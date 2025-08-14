<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePartnerRequest extends FormRequest
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
            'name' =>'required|string|max:255',
            'logo' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages(){
        return[
            'name.required'=>'Name is required',
            'name.string'=>'Name must be a string',
            'name.max'=>'Name should not exceed 255 characters',
            'logo.required'=>'Logo is required',
            'logo.image'=>'Logo must be an image',
            'logo.mimes'=>'Logo must be jpeg, png, jpg, or gif',
            'logo.max'=>'Logo size should not exceed 2MB'
        ];
    }
}

