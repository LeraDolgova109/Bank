<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|unique:users|email',
            'name' => 'required|string|min:1',
            'surname' => 'required|string|min:1',
            'patronymic' => 'required|string|min:1',
            'password' => 'required|string|min:5',
            'phone' => 'required|string|regex:/\+7\(\d{3}\)\d{3}-\d{2}-\d{2}/',
            'birthdate' => 'required|date_format:Y-m-d|before:today',
            'birthplace' => 'required|date|min:1',
            'gender' => 'required|in:Man,Woman',
        ];
    }
}
