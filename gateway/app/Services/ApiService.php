<?php

namespace App\Services;
use App\Components\HttpClient;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Sleep;

abstract class ApiService
{
    protected int $attemps = 0;
    protected string $endpoint;
    public function generate_id()
    {
        return (string) \Illuminate\Support\Str::uuid(); 
    }
    public function retry($method, $import, $path, $headers, $body)
    {
        Sleep::for(1)->seconds();
        try {
            $headers['trace-id'] = $this->generate_id();
            if ($method == 'POST' || $method == 'PUT') {
                return $import->client->request($method, $this->endpoint . $path, array('headers' => $headers, 'body' => $body));
                
            }
            else {
                return $import->client->request($method, $this->endpoint . $path, array('headers' => $headers));
            }
        }
        catch (RequestException $e) {
            if ($e->getCode() == 500 && $this->attemps <= 7)
            {
                $this->attemps += 1;
                $this->retry($method, $import, $path, $headers, $body);
            }
            else if ($e->getCode() == 500)
            {
                Sleep::for(10)->seconds();
                $this->attemps == 0;
                $this->retry($method, $import, $path, $headers, $body);
            }
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            abort($e->getCode(), $responseBodyAsString);
        }
    }
    public function request($method, $path, $data = [], $token)
    {  
        $import = new HttpClient();
        
        $headers['Accept'] = 'application/json';
        $headers['Content-Type'] = 'application/json';
        $headers['Authorization'] = 'Bearer ' . $token;
        $headers['Idempotency-key'] = getallheaders()['Idempotency-key'];
        $body = $data;
        $response = $this->retry($method, $import, $path, $headers, $body);
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