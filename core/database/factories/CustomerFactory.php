<?php

namespace Database\Factories;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 1000),
            'is_banned' => fake()->boolean(),
        ];
    }

    public function configure(): static
    {
        return $this->afterMaking(function (Customer $customer) {
            // ...
        })->afterCreating(function (Customer $customer) {
            if($customer->is_banned){
                $customer->bans()->create([
                    'customer_id' => $customer->id,
                    'reason' => fake()->text(),
                    'end_time' => Carbon::now()->addDays(fake()->numberBetween(1, 30)),
                ]);
            }
        });
    }
}
