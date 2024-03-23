<?php

namespace App\Services;
use App\Components\HttpClient;
use GuzzleHttp\Exception\RequestException;

abstract class ApiService
{
    protected string $endpoint;
    public function request($method, $path, $data = [])
    {  
        $import = new HttpClient();
        
        $headers['Content-Type'] = 'application/json';
        $body = $data;
        if ($method == 'POST' || $method == 'PUT') {
            $response = $import->client->request($method, $this->endpoint . $path, array('headers' => $headers, 'body' => $body));
        }
        else {
            $response = $import->client->request($method, $this->endpoint . $path, array('headers' => $headers));
        }
        //$token = $data['bearerToken'];
        $data = json_decode($response->getBody()->getContents());
        return $data;
    }

    public function post($path, $data)
    {
        return $this->request('POST', $path, $data);
    }
    public function get($path)
    {
        return $this->request('GET', $path);
    }
    public function put($path, $data)
    {
        return $this->request('PUT', $path, $data);
    }
    public function delete($path)
    {
        return $this->request('DELETE', $path);
    }
}