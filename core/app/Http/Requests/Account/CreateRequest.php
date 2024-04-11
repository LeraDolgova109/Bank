<?php

namespace App\Http\Requests\Account;

use App\Models\AccountType;
use App\Models\Currency;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'customer_id' => $this->customer_id,
            'open_date' => Carbon::now(),
            'end_date' => Carbon::now()->addYears(4),
            'type_id' => AccountType::where('slug', $this->type)->first()->id,
            'currency_id' => Currency::where('slug', $this->currency)->first()->id,
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
            'customer_id' => 'required|string|exists:customers,id',
            'type' => 'required|exists:account_types,slug|not_in:master',
            'currency' => 'required|exists:currencies,slug',
        ];
    }
}
