<?php

interface EndPointControllerInterface
{
    /**
     * Constructor
     */
    public function __construct($request_method, $path, $body, array $path_arguments);

    /**
     * Returns response
     * @return Response
     */
    public function getResponse();


}