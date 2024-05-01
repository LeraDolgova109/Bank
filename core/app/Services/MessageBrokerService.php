<?php

namespace App\Services;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class MessageBrokerService
{
    private $channel;
    private $connection;

    public function __construct(){

    }
    private function connect(){
        $this->connection = new AMQPStreamConnection(
            env('RABBITMQ_HOST', 'localhost'),
            env('RABBITMQ_PORT', 5672),
            env('RABBITMQ_USER', 'guest'),
            env('RABBITMQ_PASSWORD', 'guest')
        );
        $this->channel = $this->connection->channel();
    }

    private function disconnect(){
        $this->channel->close();
        $this->connection->close();
    }

    public function publish(array $data, string $exchange = ''){
        $this->connect();
        $msg = new AMQPMessage(json_encode($data));
        $this->channel->basic_publish($msg, '', $exchange);
        $this->disconnect();
    }
}
