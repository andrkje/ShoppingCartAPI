<?php

require_once __DIR__ . '/../models/api/APIPaths.php';

class V1PathConfig
{
    /**
     * @return APIPaths
     */
    public static function getPaths()
    {
        $paths = new APIPaths();
        // *******************************************************************
        //                              Add paths
        //
        //  To add paths:
        // *******************************************************************

        $paths->addPath(new Path('/v1/lists/', 'ListController', ['GET']));
        $paths->addPath(new Path('/v1/lists/{n}/', 'ListController', ['GET','POST', 'PUT', 'DELETE']));
        $paths->addPath(new Path('/v1/lists/{n}/elements', 'ElementsController'));

        return $paths;
    }

}