<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class StaffFactory extends Factory
{
    protected $model = Staff::class;

    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 20),
            'role_id' => fake()->randomElement(Role::pluck('id')),
        ];
    }
}
