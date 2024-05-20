<?php

namespace App\Http\Controllers;

use App\Services\LogsService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected LogsService $logsService;

    public function __construct()
    {
        $this->logsService = new LogsService();
    }

    protected function except()
    {
        $condition = !(bool)((int)Carbon::now()->format('i') % 2);
        $percent = $condition ? 90 : 50;
        if (rand(1, 100) < $percent) {
            throw new \Exception("Server error", 500);
        }
    }
}
