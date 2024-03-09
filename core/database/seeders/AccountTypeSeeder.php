<?php

namespace Database\Seeders;

use App\Models\AccountType;
use Illuminate\Database\Seeder;

class AccountTypeSeeder extends Seeder
{
    public function run(): void
    {
        AccountType::query()->create([
            'slug' => 'debit',
            'name' => 'Дебетовый счет',
        ]);

        AccountType::query()->create([
            'slug' => 'credit',
            'name' => 'Кредитный счет',
        ]);
    }
}
