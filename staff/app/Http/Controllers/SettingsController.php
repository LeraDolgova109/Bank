<?php

namespace App\Http\Controllers;

use App\Services\SettingsService;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    protected $settingsService;

    public function __construct(SettingsService $settingsService)
    {
        $this->settingsService = $settingsService;
    }
    public function show($id)
    {
        $settings = $this->settingsService->get($id);
        return response() -> json($settings);
    }

    public function store(Request $request, $id)
    {
        $settings = $this->settingsService->create($request, $id);
        return response() -> json($settings);
    }
}
