<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface; 
use Psr\Http\Message\ResponseInterface;

class Controller
{
    protected $container;
    public function __construct($container)
    {
        $this->container = $container;
    }
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        return $response;
    }
    public function __get($name)
    {
        if ($this->container->get($name)) {
            return $this->container->get($name);
        }
        return null;
    }
}