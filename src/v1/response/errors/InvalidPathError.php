<?php

require_once __DIR__ . '/../HTTPStatusCodes.php';

class InvalidPathError extends ErrorResponse
{
    /**
     * InvalidPathError constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $title = 'Invalid path error';
        parent::__construct($title, $path, HTTPStatusCodes::NOT_FOUND);
    }

}