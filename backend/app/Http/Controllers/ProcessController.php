<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan <malik.al.ichsan@gmail.com>
 */

namespace App\Http\Controllers;

use App\Http\Requests\ProcessRequest;
use App\Models\User;
use App\Transformers\UserReferralTransformer;
use Illuminate\Http\Response;

class ProcessController extends Controller
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function show(ProcessRequest $request)
    {
        $user = $this->user->getUsersReferral($request->get('referral_code'));

        $response = $this->item($user, new UserReferralTransformer());

        if ($user == false) {
            $this->setStatus(false);
            $this->setCode(Response::HTTP_UNPROCESSABLE_ENTITY);
            $this->setMessage(__('message.not_found'));
            $this->setData(null);
        } else {
            $this->setStatus(true);
            $this->setCode(Response::HTTP_OK);
            $this->setMessage(__('message.success'));
            $this->setData($response);
        }

        return $this->getReturn();
    }
}