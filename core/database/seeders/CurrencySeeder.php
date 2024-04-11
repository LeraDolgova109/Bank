<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $base_currency = Currency::create([
            'slug' => 'rub',
            'name' => 'Russian Ruble',
        ]);
        Currency::create([
            'slug' => 'eur',
            'name' => 'Euro',
        ]);
        Currency::create([
            'slug' => 'usd',
            'name' => 'US Dollar',
        ]);
        Currency::create([
            'slug' => 'krw',
            'name' => 'South Korean Won',
        ]);
        Currency::create([
            'slug' => 'jpy',
            'name' => 'Japanese Yen',
        ]);

        $accounts = Account::all();

        foreach ($accounts as $account){
            $account->currency_id = $base_currency->id;
            $account->save();
        }
    }
}
