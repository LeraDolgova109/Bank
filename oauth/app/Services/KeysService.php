<?php

namespace App\Services;

use App\Models\Key;

class KeysService
{
   public function check_key($key)
   {
        $result = Key::find($key);
        if ($result != null)
        {
            return $result->response;
        }
        else
        {
            return null;
        }
   }

   public function write($key, $response)
   {
        Key::create([
            'id' => $key,
            'response' => $response
        ]);
   }
}
