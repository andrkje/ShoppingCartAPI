<?php

require_once __DIR__ . '/../../v1/EndPointControllerInterface.php';

class ListController implements EndPointControllerInterface
{
    private $message;

    /**
     * Constructor
     */
    public function __construct($request_method, $path, $body, array $path_arguments = [])
    {
        $id = '';
        if ($path_arguments)
            $id .= ', with id: ' . $path_arguments[0];
        $this->message = 'ListController called with request method ' . $request_method . $id . '.';
    }

    /**
     * Returns response
     * @return Response
     */
    public function getResponse()
    {
        return new Response($this->message);
    }
}