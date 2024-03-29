<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'fullName' => 'required|string|min:1',
            'phone' => 'required|regex:/\+7\(\d{3}\)\d{3}-\d{2}-\d{2}/',
            'address' => 'string|min:5',
            'restaurant_id' => 'integer'
        ];
    }
}
