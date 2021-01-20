<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Models\Owner;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/process', function (Request $request) {
    $referralcode = strtoupper($request->input('referralcode'));
    if(strlen($referralcode)!=6 || !ctype_alnum($referralcode))
    {
        throw new HttpException(400,'Referral code is invalid');
    }
    $owner = new Owner();
    $ownerDetails = $owner->getOwnerByReferralCode($referralcode);
    if(count($ownerDetails) == 0)
    {
        throw new HttpException(404,'Referral code does not match anyone');
    }
    return json_encode($ownerDetails);
});
