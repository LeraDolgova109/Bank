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
            'user_id' => fake()->numberBetween(1, 1000),
            'is_banned' => fake()->boolean(),
            'role_id' => fake()->randomElement(Role::pluck('id')),
        ];
    }

    public function configure(): static
    {
        return $this->afterMaking(function (Staff $staff) {
            // ...
        })->afterCreating(function (Staff $staff) {
            if($staff->is_banned){
                $staff->ban()->create([
                    'staff_id' => $staff->id,
                    'reason' => fake()->text(),
                    'end_time' => Carbon::now()->addDays(fake()->numberBetween(1, 30)),
                ]);
            }
        });
    }
}
