<?php

namespace Database\Factories;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition(): array
    {
        $status = fake()->randomElement(['in_process', 'success', 'reject']);
        return [
            'type' => fake()->randomElement(['replenishment', 'debiting']),
            'status' => $status,
            'amount' => fake()->numberBetween(1, 100000) * 100,
            'add_info' => fake()->text(),
            'success_datetime' => $status == 'success' ? Carbon::now()->subMinutes(fake()->numberBetween(1, 10)) : null,
        ];
    }
}
