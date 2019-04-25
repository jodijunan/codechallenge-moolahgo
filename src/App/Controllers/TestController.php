<?php

namespace Homiedopie\App\Controllers;

use Homiedopie\Core\Response;

/**
 * TestController class
 */
class TestController
{
    /**
     * Display php info page
     *
     * @return Response
     */
    public function index()
    {
        return Response::view('test');
    }
}
