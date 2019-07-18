<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface; 
use Psr\Http\Message\ResponseInterface;
use Carbon\Carbon;

class LoanController extends Controller
{
    public function verify(ServerRequestInterface $request, ResponseInterface $response){
        
        // $response->withHeader('Content-type', 'application/json');

        // return $response->getBody()->write($request->getParams());
        // print_r($request->getParam('date-of-hire'));
        // die();

        $today = Carbon::now();
        $hire   = Carbon::create($request->getParam('date-of-hire'));
        
        if($today->diffInMonths($hire) > 18){
           
            if($request->getParam('salary') > 800000){  
                
                $loan = $this->evaluate($request->getParam('salary'));
                return $response->withJson([
                    'code'  => 100,
                    'data'    => ["loan" => $loan],
                    'message' => 'Prestamo aprobado por un total de: ' . $loan
                ], 200);
                
            }
            return $response->withJson([
                'code'  => 510,
                'data'    => [],
                'message' => 'Su salario debe ser superior a $800.000'
            ], 200);
        }

        return $response->withJson([
            'code'  => 520,
            'data'    => [],
            'message' => 'Debe haber trabajado mas de 18 meses en la empresa.'
        ], 200);


   
    }

    protected function evaluate($salary){
        if($salary > 800000 && $salary < 1000000){
            return 5000000;
        }else if($salary > 1000000 && $salary < 4000000){
            return 20000000;
        }else{
            return 50000000;
        }
    }

}