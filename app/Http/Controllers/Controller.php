<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use PhpMqtt\Client\Facades\MQTT;

class Controller extends BaseController{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function jsonSuccess($message, $url = null){
        return response()->json([
            'code' => '0000',
            'message' => $message,
            'url' => $url
        ]);
    }
    /* Custom response code */
    public function jsonResponse($code, $message, $data = []){
        return json_encode([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ]);
    }
    public function liveResponse($code, $message, $data = [], $url = null){
        $data = [
            'code' => $code,
            'message' => $message,
            'data' => $data,
            'url' => $url
        ];

        /* Note: Do not send any message to TV screen!! */
        /* First, publish data to socket */
        // MQTT::publish('quiz/znzkvi/live-stream', json_encode($data, JSON_UNESCAPED_UNICODE ));

        /* Return value */
        return json_encode($data);
    }

    /* Send WSS message to screen(s) */
    public function publishMessage($topic, $code, $data, $uri = null){
        try{
            $message = [
                'code' => $code,
                'data' => $data,
                'uri' => $uri
            ];

            MQTT::publish($topic, json_encode($message, JSON_UNESCAPED_UNICODE ));
        }catch (\Exception $e){ throw $e; }
    }

    /* Helper functions */
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        try{
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[random_int(0, $charactersLength - 1)];
            }
        }catch (\Exception $e){ return false; }
        return $randomString;
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  Sync method
     */
    protected static function fetchData($method, $uri, $params = []){
        try{
            $client = new \GuzzleHttp\Client(['base_uri' => env('CENTAR_URI') . ':' . env('CENTAR_PORT')]);
            return $client->request($method, $uri, [
                'headers' => [
                    'User-Agent' => 'WebApp',
                    'Accept'     => 'application/json',
                    'x-apisports-key' => '00cdc2ab50670b5cee20a42ed29d59e3'
                ],
                'form_params' => $params
            ]);
        }catch (\Exception $e){ dd($e); }
    }
}
