<?php

namespace Homiedopie\App\Controllers;

use Homiedopie\Core\Response;
use Homiedopie\Core\Request;
use Homiedopie\Core\Session;

/**
 * HomeController class
 */
class HomeController
{
    public function index()
    {
        return Response::view('home');
    }

    /**
     * Add records to session
     *
     * @param Request $request
     * @return void
     */
    public function addRecordSession(Request $request = null)
    {
        $body = $request->getPost();
        if (!$body) {
            $body = $request->getDecodedRawPost();
        }

        if (!$body) {
            return [
                'error' => 'Fields required!'
            ];
        }

        $errors = $this->validateForm($body);
        if ($errors) {
            return [
                'error' => $errors
            ];
        }

        $records = Session::getInstance()->get('records');

        if (!$records) {
            $records = [];
        }

        $computed = $this->getFinalAmount($body);

        $body['final_amount'] = $computed['final_amount'];
        $body['fee'] = $computed['fee'];

        array_unshift($records, $body);
        Session::getInstance()->set('records', $records);
        return $body;
    }

    /**
     * Get final amount
     *
     * @param array $body
     * @return array
     */
    private function getFinalAmount($body)
    {
        $amount = floatval($body['amount']);
        $percentage = floatval($body['percentage']);

        if (!$percentage) {
            $percentage = 0;
        }

        $fee = ($amount * $percentage) / 100;
        $total = $amount + $fee;

        return [
            'fee' => $fee,
            'final_amount' => $total
        ];
    }

    /**
     * Lazy way validating form
     * TODO: Move to Validation class
     *
     * @return void
     */
    private function validateForm($body = [])
    {
        $errors = [];
        $date = null;
        $amount = null;
        $percentage = null;

        $this->validateDate($body, $errors);
        $this->validateAmount($body, $errors);
        $this->validatePercentage($body, $errors);

        return $errors;
    }

    /**
     * Validate percentage
     *
     * @param array $body
     * @param array $errors
     * @return void
     */
    private function validatePercentage($body = [], &$errors)
    {
        if (isset($body['percentage'])) {
            $percentage = $body['percentage'];
            if ($percentage) {
                if (!is_numeric($percentage)) {
                    $errors['percentage'] = 'Percentage must be numeric.';
                } else if (!($percentage >= -10 && $percentage <= 10)) {
                    $errors['percentage'] = 'Percentage must be between -10 and 10';
                }
            }
        }
    }

    /**
     * Validate amount
     *
     * @param array $body
     * @param array $errors
     * @return void
     */
    private function validateAmount($body = [], &$errors)
    {
        if (!isset($body['amount'])) {
            $errors['amount'] = 'Amount is required.';
        }

        $amount = $body['amount'];
        if (!$amount) {
            $errors['amount'] = 'Amount is required.';
        }

        if (!is_numeric($amount)) {
            $errors['amount'] = 'Amount must be numeric.';
        }
    }

    /**
     * Validate date
     *
     * @param array $body
     * @param array $errors
     * @return void
     */
    private function validateDate($body = [], &$errors)
    {
        if (!isset($body['date'])) {
            $errors['date'] = 'Date is required.';
            return;
        }

        $date = $body['date'];
        if (!$date) {
            $errors['date'] = 'Date is required.';
            return;
        }

        // YYYY-MM-DDTHH:mm:ss.sssZ
        // 2019-04-08
        // Y-m-dTH:i:s.vZ
        // https://www.php.net/manual/en/function.date.php
        if (\DateTime::createFromFormat('m/d/Y', $date) === false) {
            $errors['date'] = 'Date is in invalid format.';
            return;
        }
    }

    /**
     * Get all records in session
     *
     * @return array
     */
    public function getRecordsSession()
    {
        $records = Session::getInstance()->get('records');

        return [
            'data' => $records ? $records: []
        ];
    }
}
