<?php

namespace App\Http\Controllers;

use App\Services\SettingsService;
use Illuminate\Http\Request;

class HiddenController extends Controller
{
    protected $settingsService;

    public function __construct(SettingsService $settingsService)
    {
        $this->settingsService = $settingsService;
    }
    public function index($id)
    {
        $settings = $this->settingsService->get_all($id);
        return response() -> json($settings);
    }

    public function hide(Request $request, $id)
    {
        $settings = $this->settingsService->hide_account($request, $id);
        return response() -> json($settings);
    }
}
