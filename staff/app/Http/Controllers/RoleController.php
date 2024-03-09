<?php

namespace App\Http\Controllers;

use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleService;
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

   public function index()
   {
      $roles = $this->roleService->get_all();
      return response() -> json($roles);
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