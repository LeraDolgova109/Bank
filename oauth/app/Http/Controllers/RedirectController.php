<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class RedirectController extends Controller
{
    public function __invoke(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('app');
    }

    public function redirect (string $name, string $token) {
        $client = Client::where('name', '=', $name)->first();
    
        return $client->redirect.$token;
    }
}