<?php

/**
 * Class Path
 *
 * Storage of path and controller.
 */
class Path
{
    private $path, $controller;

    public function __construct($path, $controller)
    {
        $this->path = $path;    // TODO: validation?
        $this->controller = $controller;
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