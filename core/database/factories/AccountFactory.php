<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\AccountType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    protected $model = Account::class;

    public function definition(): array
    {
        $status = fake()->randomElement(['opened', 'closed']);
        $open_date = Carbon::create(fake()->dateTime());
        return [
            'open_date' => $open_date,
            'end_date' => $open_date->addYears(4),
            'close_date' => $status == 'closed' ? Carbon::now()->subDays(fake()->numberBetween(1, 10)) : null,
            'status' => $status,
            'type_id' => fake()->randomElement(AccountType::pluck('id')),
            'balance' => fake()->numberBetween(0, 1000000) * 100,
        ];
    }
}
