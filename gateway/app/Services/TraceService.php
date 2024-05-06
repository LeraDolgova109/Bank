<?php

namespace App\Services;
use Illuminate\Support\Str;

class TraceService
{
   public function generate_id()
   {
    return (string) Str::uuid(); 
   }
}
