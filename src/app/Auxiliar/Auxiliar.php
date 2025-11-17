<?php

namespace App\Auxiliar;

use Guzzle\Http\Client;
use Guzzle\Http\Message\Request;

class Auxiliar
{

    public static function mostrarRutaError(string $mensaje){


        $client = new Client();
        $headers = [
            'Content-Type' => 'application/json',
        ];
        $body = '{"message": "'.$mensaje.'"}';
        $request = new Request('GET', 'http://localhost:8080/error', $headers, $body);
        $client->send($request);
    }

    public static function isAPIRequest():bool{

        $ruta = explode('/',$_SERVER['REQUEST_URI']);

        return array_search('api',$ruta);

    }

}