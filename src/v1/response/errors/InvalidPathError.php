<?php

require_once __DIR__ . '/../HTTPStatusCodes.php';
require_once __DIR__ . '/../ErrorResponse.php';

class InvalidPathError extends ErrorResponse
{
    /**
     * InvalidPathError constructor.
     * @param $path
     */
    public function __construct($path, $request_method)
    {
        $title = 'Invalid path error';
        $string_path = '\"/' . implode("/", $path) . '\"';  // TODO: Print prettier
        $message = "The request method $request_method is not valid to the path: $string_path";
        parent::__construct($title, $message, HTTPStatusCodes::NOT_FOUND);
    }

}