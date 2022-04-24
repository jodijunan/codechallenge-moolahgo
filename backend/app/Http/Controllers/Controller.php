<?php

namespace App\Http\Controllers;

use App\Helper\GeneralHelper;
use App\Traits\BaseResponseTransform;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use Tymon\JWTAuth\JWTAuth;

class Controller extends BaseController
{
    use BaseResponseTransform;

    public $code;//error/success code
    public $message;//message for user
    public $errorMessage;
    public $data;
    public $status; // boolean
    protected $httpCode = 200;//system error message

    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param mixed $errorMessage
     */
    public function setErrorMessage($errorMessage): void
    {
        $this->errorMessage = $errorMessage;
    }

    /**
     * @return int
     */
    public function getHttpCode(): int
    {
        return $this->httpCode;
    }

    /**
     * @param int $httpCode
     */
    public function setHttpCode(int $httpCode): void
    {
        $this->httpCode = $httpCode;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        if (is_array($data) && isset($data["data"])) {
            $this->data = $data["data"];
        } elseif (is_object($data) && isset($data->data)) {
            $this->data = $data->data;
        } else {
            $this->data = $data;
        }
    }

    /**
     * @return bool
     */
    public function getStatus(): bool
    {
        return $this->status;
    }

    /**
     * @param $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    public function needAuth(Request $request)
    {
        foreach ($request->header() as $name => $values) {
            if (strtolower($name) == 'authorization' && !empty($this->getToken($request))) {
                return true;
            }
        }
        return false;
    }

    private function getToken(Request $request)
    {
        $headerAuthorization = $request->header("authorization");
        $authorization = explode(' ', $headerAuthorization);
        $authorizationType = $authorization[0];
        $authorizationValue = $authorization[1];
        return $authorizationValue;
    }

    public function getError($message = null, $data = null, $httpCode = false)
    {
        $this->setCode(env('STATUS_FAILED_CODE'));
        if ($data != null) {
            $this->setData($data);
        }

        if ($message != null) {
            $this->setMessage($message);
        } else {
            $this->setMessage("Caught Error Exception!");
        }
        $this->setStatus(false);
        $this->setHttpCode($httpCode);

        return $this->getReturn();
    }

    /**
     * @return mixed
     */
    public function getReturn()
    {
        $return['status'] = $this->status;
        $return['code'] = $this->code;
        $return['message'] = $this->message;
        $return['error_message'] = $this->errorMessage;
        $request = Request::createFromGlobals();
        $segments = $request->segments();
        if ($segments && isset($segments[0]) && $segments[0] == 'v2' && $this->needAuth($request)) {
            $return['data'] = GeneralHelper::dec_enc(GeneralHelper::ENCRYPT, json_encode($this->data));
            $return['token'] =  GeneralHelper::getToken();
        } else {
            $return['data'] = $this->data;
        }
        return response()->json($return, $this->httpCode);
    }
}
