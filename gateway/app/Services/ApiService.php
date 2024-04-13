<?php

namespace App\Services;
use App\Components\HttpClient;
use GuzzleHttp\Exception\RequestException;

abstract class ApiService
{
    protected string $endpoint;
    public function request($method, $path, $data = [], $token)
    {  
        $import = new HttpClient();
        
        $headers['Accept'] = 'application/json';
        $headers['Content-Type'] = 'application/json';
        $headers['Authorization'] = 'Bearer ' . $token;
        $body = $data;
        try {
            if ($method == 'POST' || $method == 'PUT') {
                $response = $import->client->request($method, $this->endpoint . $path, array('headers' => $headers, 'body' => $body));
                
            }
            else {
                $response = $import->client->request($method, $this->endpoint . $path, array('headers' => $headers));
            }
        }
        catch (RequestException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            abort($e->getCode(), $responseBodyAsString);
        }
        $data = json_decode($response->getBody()->getContents());
        return $data;
    }

    public function post($path, $data, $token)
    {
        return $this->request('POST', $path, $data, $token);
    }
    public function get($path, $token)
    {
        return $this->request('GET', $path, [], $token);
    }
    public function put($path, $data, $token)
    {
        return $this->request('PUT', $path, $data, $token);
    }
    public function delete($path, $token)
    {
        return $this->request('DELETE', $path, [], $token);
    }
}