<?php

namespace App\Services;

class LogsService
{
    const CLUSTER = 'core';

    private MessageBrokerService $mbService;

    public function __construct(){
        $this->mbService = new MessageBrokerService();
    }

    public function send(string $level, string $message, $code = null){
        $data = [
            'cluster' => self::CLUSTER,
            'msg' => 'lvl='.$level.' '. ($code ? 'code='.$code : '') . 'msg="'. $message . '"'
        ];
        $this->mbService->publish($data, 'logs');
    }
}
