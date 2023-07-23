<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

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
        return json_encode([
            'code' => $code,
            'message' => $message,
            'data' => $data,
            'url' => $url
        ]);
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
        }catch (\Exception $e){  }
    }
}
