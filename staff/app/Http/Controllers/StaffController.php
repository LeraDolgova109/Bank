<?php

namespace App\Http\Controllers;

use App\Services\StaffService;
use Illuminate\Http\Request;

class StaffController extends Controller
{
   protected $staffService;
    public function __construct(StaffService $staffService)
    {
        $this->staffService = $staffService;
    }

   public function index()
   {
      $staffs = $this->staffService->get_all();
      return response() -> json($staffs);
   }

   public function show()
   {
    
   }

   public function store()
   {
    
   }

   public function update()
   {
    
   }

   public function delete()
   {
    
   }
}