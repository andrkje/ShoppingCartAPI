<?php

require_once 'ControllerInterface.php';

class APIController implements ControllerInterface
{
    private $controller;
    /**
     * APIController constructor.
     * @param $request_method
     * @param $path
     * @param $body
     */
    public function __construct($request_method, $path, $body)
    {

        if (count($path) > 0) {
            $api_version = $path[0];

            switch ($api_version) {
                case 'v1':
                    // TODO: set APIV1Controller
                    break;
                default:
                    // TODO: return error response
            }
        } else{
            // TODO: return error response
        }
    }

    /**
     * Returns response.
     * @return Response
     */
    public function getResponse()
    {
        // TODO: Implement getResponse() method.
    }
}