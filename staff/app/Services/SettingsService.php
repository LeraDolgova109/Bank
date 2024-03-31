<?php

namespace App\Services;

use App\Models\HiddenAccounts;
use App\Models\Role;
use App\Models\Settings;
use App\Models\Staff;
use Illuminate\Http\Request;


class SettingsService
{

    public function get($id)
    {
        $settings = Settings::where('user_id', '=', $id)->first();
        return $settings;
    }

    public function create(Request $request, $id)
    {
        $settings = Settings::updateOrCreate([
            'user_id'   => $id,
        ],[
            'user_id' => $id,
            'mode' => $request->mode,
        ]);
        return $settings;
    }

    public function get_all($id)
    {
        $settings = HiddenAccounts::where('user_id', '=', $id)->get();
        return $settings;
    }

    public function hide_account(Request $request, $id)
    {
        $account = HiddenAccounts::where([
            ['account_id', '=', $request->account_id],
            ['user_id', '=', $id]
        ])->first();
        if ($account != null) {
            return $account->delete();
        }
        $settings = HiddenAccounts::create([
            'user_id' => $id,
            'account_id' => $request->account_id,
        ]);        

        return $settings;
    }
}