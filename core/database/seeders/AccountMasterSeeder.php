<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\AccountType;
use App\Models\Currency;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = AccountType::query()->create([
            'slug' => 'master',
            'name' => 'Счет принадлежащий банку',
        ]);

        Account::query()->create([
            'open_date' => Carbon::now(),
            'end_date' => Carbon::now()->addYears(50),
            'status' => 'opened',
            'type_id' => $type->id,
            'balance' => 10000000 * 100,
            'currency_id' => Currency::where('slug', env('BASE_CURRENCY', 'rub'))->first()->id,
        ]);
    }
}
