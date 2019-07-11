<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface; 
use Psr\Http\Message\ResponseInterface;
use App\Models\Client;
use Carbon\Carbon;

class ClientController extends Controller
{
    public function store(ServerRequestInterface $request, ResponseInterface $response){
        
        // $response->withHeader('Content-type', 'application/json');

        // return $response->getBody()->write($request->getParams());
        
        $today = Carbon::now();
        $age   = Carbon::create($request->getParam('age'));
        
        if($today->diffInYears($age) >= 18){
           
            $result = Client::where('idnumber', '=', $request->getParam('userId'))->first();
            
            if(!$result instanceof Client){
                $client = new Client();
                $client->idnumber         = $request->getParam('userId');
                $client->nombres          = $request->getParam('firstname');
                $client->apellidos        = $request->getParam('lastname');
                $client->fecha_nacimiento = $request->getParam('age');
                if($client->save()){
                    return $response->withJson([
                        'code'  => 100,
                        'data'    => $client,
                        'message' => 'Cliente creado satisfactoriamente.'
                    ], 200);
                }
                return $response->withJson([
                    'code'  => 500,
                    'data'    => [],
                    'message' => 'Error al crear. Intentelo mas tarde.'
                ], 200);
            }
            return $response->withJson([
                'code'  => 510,
                'data'    => ["userId" => $request->getParam('userId')],
                'message' => 'El documento ya se encuentra asignado a un cliente.'
            ], 200);
        }

        return $response->withJson([
            'code'  => 520,
            'data'    => [],
            'message' => 'El cliente debe ser mayor de edad.'
        ], 200);


   
    }

    public function findClient(ServerRequestInterface $request, ResponseInterface $response, array $args){
        
        $response->withHeader('Content-type', 'application/json');
        
        $result = Client::where('idnumber', '=', $args["idnumber"])->first();

        if($result instanceof Client){
            return $response->withJson([
                'code'  => 100,
                'data'    => $result,
                'message' => 'OK' 
            ]);
        }  
        return $response->withJson([
            'code'  => 400,
            'data'    => [],
            'message' => 'Empty' 
        ]);
        
    }

}