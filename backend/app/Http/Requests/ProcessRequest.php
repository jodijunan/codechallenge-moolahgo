<?php
/**
 * Created by PhpStorm.
 * User: Malik Al Ichsan <malik.al.ichsan@gmail.com>
 */

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;

class ProcessRequest extends RequestAbstract
{
    public $code = 422;

    /**
     * @param Validator $validator
     * @return JsonResponse
     */
    protected function formatErrors(Validator $validator): JsonResponse
    {
        $return['status'] = false;
        $return['code'] = $this->code;
        $return['message'] = null;
        $return['error_message'] = $validator->getMessageBag()->toArray();
        $return['data'] = null;
        return response()->json($return, 422);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'referral_code' => 'required',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            //
        ];
    }
}