<?php

require_once __DIR__ . '/../config/APIConfig.php';

/**
 * Class Path
 *
 * Storage of path and controller.
 */
class Path
{
    private $path, $controller, $request_methods, $authentication;

    public function __construct($path, $controller, array $request_methods = ['GET'], $authentication = 0)
    {
        /*
        print_r($path); echo '  ';
        print_r($controller); echo '  ';
        print_r($request_methods); echo '  ';
        print_r($authentication); echo '  ';
        echo '________________';
*/
        if (!is_string($path))
            throw new InvalidArgumentException('Controller must be a string');
        $this->path = $path;    // TODO: validation?

        if (!is_string($controller))
            throw new InvalidArgumentException('Controller must be a string');
        $this->controller = $controller;

        if (!$this->isValidRequestMethodArray($request_methods))
            throw new InvalidArgumentException('$request_methods contains illegal request method. Allowed request methods:' .
                APIConfig::getStringRepresentationRequestMethods());
        $this->request_methods = $request_methods;
        //$authentication
    }

    private function isValidRequestMethodArray($request_methods) {
        foreach ($request_methods as $request_method) {
            if (!in_array($request_method, $REQUEST_METHODS))
                return false;
        }
        return true;
    }

    /**
     * Path getter
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Controller getter
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

}