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

   public function show($id)
   {
      $staff = $this->staffService->get($id);
      return response() -> json($staff);
   }

   public function store(Request $request)
   {
      $staff = $this->staffService->create($request);
      return response() -> json($staff);
   }

   public function update()
   {
    
   }

   public function delete($id)
   {
      if ($this->staffService->delete($id))
         return response() -> json("OK");
   }
}