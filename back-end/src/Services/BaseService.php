<?php

namespace Api\Services;

use Psr\Container\ContainerInterface;

class BaseService 
{
    protected $response;

    public function __construct() 
    {
        $this->response = new \Slim\Http\Response();
    }
    
    public function ok($data = null)
    {
        if (empty($data))
        {
            return $this->response->withJson([ 'ok' => true ], 200);
        }

        if (is_string($data))
        {
            $data = [ 'ok' => true, 'msg' => $data ];
        }
        else if (is_array($data))
        {
            $data = [ 'ok' => true, 'data' => $data ];
        }

        return $this->response->withJson($data, 200);
    }

    public function error($errors, $status = 500)
    {
        if (is_array($errors))
        {
            $errors = array_values(array_unique($errors));
        }
        else
        {
            $errors = [$errors];
        }

        return $this->response->withJson(['ok' => false, "errors" => $errors], $status);
    }    
}

