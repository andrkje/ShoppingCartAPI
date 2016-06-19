<?php

require_once __DIR__ . '/../models/APIPaths.php';

class PathConfig
{
    private $paths;

    /**
     * PathConfig constructor.
     */
    public function __construct()
    {
        $this->paths = new APIPaths();
        // *******************************************************************
        //                              Add paths
        //
        //  To add paths:
        // *******************************************************************

        $this->paths->addPath(new Path('test'), 'TestController');


    }

    /**
     * @return APIPaths
     */
    public function getPaths()
    {
        return $this->paths;
    }





}