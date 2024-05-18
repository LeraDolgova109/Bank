<?php

namespace App\Http\Controllers;

use App\Models\Staff;
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

   public function saveToken(Request $request, $id)
   {
      $staff = Staff::find($id);
      $staff->update(['device_token'=>$request->token]);
      return response()->json(['token saved successfully.']);
   }

   public function getDevices()
   {
      return Staff::whereNotNull('device_token')->pluck('device_token')->all();
   }

   public function delete($id)
   {
      if ($this->staffService->delete($id))
         return response() -> json("OK");
   }
}