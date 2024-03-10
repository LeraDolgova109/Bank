<?php

namespace App\Http\Controllers;

use App\Services\BanService;
use Illuminate\Http\Request;

class BanController extends Controller
{
    protected $banService;
    public function __construct(BanService $banService)
    {
        $this->banService = $banService;
    }

   public function index()
   {
      
   }
 
    public function show()
    {
     
    }
 
    public function store()
    {
     
    }
 
    public function ban(Request $request)
    {
        if ($this->banService->ban($request))
            return response() -> json('OK');
    }
 
    public function unban($id)
    {
        if ($this->banService->unban($id))
            return response() -> json('OK');
    }
}