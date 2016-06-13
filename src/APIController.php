<?php

require_once 'ControllerInterface.php';
require_once __DIR__ . '/v1/APIV1Controller.php';

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
                    $this->controller = new APIV1Controller();
                    break;
                default:
                    // TODO: return error response
            }
        } else {
            // TODO: return error response
        }
    }

    /**
     * Returns response.
     * @return Response
     */
    public function getResponse()
    {
        return $this->controller->getResponse();
    }
}