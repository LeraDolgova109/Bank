<?php

namespace App\Services;

interface ServiceInterface 
{
    public function get_all();
    public function get();
    public function create();
    public function update();
    public function delete();
}