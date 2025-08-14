<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email',
           'message'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Name field is required',
            'email.required'=>'Email field is required',
            'email.email'=>'Please enter a valid email address',
           'message.required'=>'Message field is required'
        ];
    }
}
