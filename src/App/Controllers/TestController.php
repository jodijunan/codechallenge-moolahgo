<?php

namespace Homiedopie\App\Controllers;

use Homiedopie\Core\Response;

/**
 * TestController class
 */
class TestController
{
    public function test()
    {
        return Response::view('test', [
            'test' => 'test'
        ]);
    }
}
