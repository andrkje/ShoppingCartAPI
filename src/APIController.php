<?php

require_once 'ControllerInterface.php';
require_once __DIR__ . '/v1/APIV1Controller.php';
require_once __DIR__ . '/v1/response/errors/InvalidPathError.php';

class APIController implements ControllerInterface
{
    private $controller, $error;

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
                    $this->controller = new APIV1Controller($request_method, $path, $body);
                    break;
                default:
                    $this->error = new InvalidPathError($path, $request_method);
            }
        } else {
            $this->error = new InvalidPathError($path, $request_method);
        }
    }

    /**
     * Returns response.
     * @return Response
     */
    public function getResponse()
    {
        if ($this->error)
            return $this->error;
        return $this->controller->getResponse();
    }
}