<?php

namespace App\Services;

use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class ConsumeService
{
    private AMQPChannel $channel;

    private AMQPStreamConnection $connection;

    private function connect(){
        $this->connection = new AMQPStreamConnection(
            env('RABBITMQ_HOST', 'localhost'),
            env('RABBITMQ_PORT', 5672),
            env('RABBITMQ_USER', 'guest'),
            env('RABBITMQ_PASSWORD', 'guest')
        );
        $this->channel = $this->connection->channel();
    }

    public function main(){
        $this->connect();

        echo " [*] Waiting for messages. To exit press CTRL+C\n";

        $callback = function ($msg) {
            $data = json_decode($msg->body, true);
            $logger = new LogsService();
            $response = $logger->store($data['cluster'], $data['msg']);
            dump($data);
            echo $response."\n";
        };

        $this->channel->basic_consume('logs', '', false, true, false, false, $callback);

        while ($this->channel->is_open()){
            $this->channel->wait();
        }
//        try {
//            $this->channel->consume();
//        } catch (\Throwable $exception) {
//            echo $exception->getMessage();
//        }
    }
}
