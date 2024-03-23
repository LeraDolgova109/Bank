<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class DebitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function passedValidation()
    {
        $this->replace([
            'amount' => (int)($this->amount * 100),
            'add_info' => $this->add_info,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'amount' => 'required|numeric',
            'add_info' => 'nullable|string',
        ];
    }
}
