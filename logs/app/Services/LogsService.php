<?php

namespace App\Services;

use InfluxDB2\ApiException;
use InfluxDB2\Client;
use InfluxDB2\Point;

class LogsService
{
    public function store(string $measurement, $info, string $field = 'info'){
        $client = new Client([
            'url' => env('INFLUXDB_HOST'),
            'token' => env('INFLUXDB_TOKEN'),
            'bucket' => env('INFLUXDB_BUCKET'),
            'org' => env('INFLUXDB_ORG'),
            'precision' => \InfluxDB2\Model\WritePrecision::S
        ]);

        $writeApi = $client->createWriteApi();

        $point = Point::measurement($measurement)
            ->addField($field, $info)
            ->time(time());

        try {
            $result = $writeApi->write($point);
        } catch(ApiException $e) {
            return $e;
        }

        return $result;

    }
}
