<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan <malik.al.ichsan@gmail.com>
 */

namespace App\Http\Controllers;

use App\Http\Requests\ProcessRequest;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function show(ProcessRequest $request)
    {
        dd('referralcode', $request->get('referral_code'), $request->all(), $request->referral_code);
        $user = new User();
        $user = $user->getUsersReferral($request->get('referral_code'));

        if ($user == false) {
            $this->setStatus(false);
            $this->setCode(Response::HTTP_UNPROCESSABLE_ENTITY);
            $this->setMessage(__('message.not_found'));
            $this->setData(null);
        } else {
            $this->setStatus(true);
            $this->setCode(Response::HTTP_OK);
            $this->setMessage(__('message.success'));
            $this->setData($user);
        }

        return $this->getReturn();
    }
}