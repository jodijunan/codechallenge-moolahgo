<?php
namespace App\Http\Controllers;
use App\Common;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function index(Request $request) {
        $ref = $request->input('code');
        $commonFx = new Common();
        $result = $commonFx->checkValueInArray($ref);
        echo $result;
    }
}