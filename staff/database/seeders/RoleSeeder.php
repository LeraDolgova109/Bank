<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::query()->create([
            'slug' => 'main',
            'name' => 'Главный менеджер',
            'description' => fake()->text(),
        ]);

        Role::query()->create([
            'slug' => 'help',
            'name' => 'Помощник',
            'description' => fake()->text(),
        ]);
    }
}
