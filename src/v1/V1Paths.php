<?php

require_once __DIR__ . '/../ControllerInterface.php';
require_once __DIR__ . '/response/errors/InvalidPathError.php';
require_once __DIR__ . '/response/Response.php';

//TEOMP
require_once __DIR__ . '/models/APIPaths.php';
require_once __DIR__ . '/models/Path.php';


class V1Paths implements ControllerInterface
{
    private $controller;

    public function __construct($request_method, $path, $body)
    {
        //$p = new Path('test/aa', 'test', ['sdfsdf', 'PUT']);

        print_r(REQUEST_METHODS);


        /*
        switch ( $this->getPathFormat($path)) {
            case '/lists':
                $this->controller = 'User\'s lists';
                break;
            case '/lists/{n}':
                $this->controller = 'User\'s list with id n';
                break;
            case '/lists/{n}/elements':
                $this->controller = 'User\'s list elements under list with id n';
                break;
            case '/lists/{n}/elements/{n}':
                $this->controller = 'User\'s list element with id m under list with id n';
                break;
            default:
                $this->controller = 'error';

        }
*/
    }

    /**
     * Removes '/' on the end of the path
     * @param $path
     * @return string
     */
    private function trimPath($path)
    {
        if (substr($path, -1) == '/')
            return substr($path, 0, strlen($path)-1);
        return $path;
    }

    /**
     * Returns array representation of path
     * @param $path
     * @return array
     */
    private function getPathArray($path) {
        $path = $this->trimPath($path);
        $path_array = explode('/', $path);
        array_shift($path_array);
        return  $path_array;  // TODO: should this be accessible form everywhere?
    }

    /**
     * Returns path on XXXXXX format    // TODO: change XXXXXXX to something more descriptive
     * @param $path
     * @return string
     */
    private function getPathFormat($path) {
        $path_array = $this->getPathArray($path);
        array_shift($path_array);   // Removes 'v1'
        $string_path = '';

        foreach ($path_array as $path_element) {        // Handle decimal numbers (2.54 is valid...)
            $string_path .= '/';
            if (is_numeric($path_element) && is_int((int)$path_element))
                $string_path .= '{n}';
            else
                $string_path .= $path_element;
        }

        return $string_path;
    }

    private function isIntegerString($s) {      // TODO: Global?
        $numbers = '1234567890';
        foreach (str_split($s) as $char) {
            if (strpos($numbers, $char) === false)
                return false;
        }
        return true;



        return " --  ";
    }

    private function getArguments($path) {
        $path_array = explode('/', $path);  // TODO: clean up.
        array_shift($path_array);
        $numeric_parameters = [];

        foreach ($path_array as $path_element) {        // Handle decimal numbers (2.54 is valid...)
            echo " "; print_r($path_element);echo " ";
            if (is_numeric($path_element) && is_int((int)$path_element))
                array_push($numeric_parameters, $path_element);
        }

        return $numeric_parameters;
    }

    /**
     * Returns response
     * @return Response
     */
    public function getResponse()
    {
        return new Response($this->controller);
    }
}