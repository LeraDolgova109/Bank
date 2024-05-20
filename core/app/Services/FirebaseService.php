<?php

namespace App\Services;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class FirebaseService
{
    public function getAllStaff()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://staff/api/devices');
        return $response->getBody();
    }
    public function sendNotification(Request $request, string $id)
    {
        // $firebaseToken = $this->getAllStaff();
        // if ($firebaseToken == null)
        // {
        //     return;
        // }

        $SERVER_API_KEY = 'AAAAyzXj8Ts:AAAAmkRzoKs:APA91bHTFpc0XdNPfhWJtWl3V-jC-4EmbiDGoYdjOGQUfw-L7IIyW47bdaWL-U6kljvwqNKJMDoBsaqdpub6-P3ksIitQFHGOhLEmOToFvWv-Nhmspw-1qxfKzb7vdM9nsEPkf67IsBP';

        $data = [
            "registration_ids" => ["dlER2r57TiyUDLzQq_1NjK:APA91bGN_CLVdUQ5PujsjxDqUj0PlVbjo9ehAK39EiRYmUySX5X5JqI79DmNYTwRiaVFb3X86UsbPcF1-xvyLwQkvpyHhQw6hmof4jPjoKr16s8GZQk6qZ_c6hMvG8lc7ZMZCX8hpYE6"],
            "notification" => [
                "title" => $id,
                "body" => $request->amount,
                "content_available" => true,
                "priority" => "high",
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);
    }
}
