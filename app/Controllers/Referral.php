<?php

namespace App\Controllers;

class Referral extends BaseController
{
	/**
	 * Frontend
	 * @return string
	 */
	public function index()
	{
		helper(['form', 'url']);
		return view('check_referral');
	}

	/**
	 * /process endpoint for searching the referral
	 * Search referrals database for the referral's input
	 *
	 * Test Data:
	 * ID:   Referral Code:   Name:
	 * 1001  H0H0H0           Santa Claus
	 * 1002  1E3R53           Harry Potter
	 * 1003  29O0P8           Hermione Granger
	 * 1004  EDT5E9           Ronald Weasley
	 * 1005  3Q1VYT           Neville Longbottom
	 *
	 * @return \CodeIgniter\HTTP\ResponseInterface
	 */
	public function process()
	{
		helper(['form']);
		$model = new \App\Models\ReferralModel();
		$referralcode = $this->request->getVar('referralcode');
		$referralcode = strtoupper($referralcode);
		if (preg_match("/[A-Z0-9]{6}/", $referralcode)) {
			$result = $model->where('referral_code', $referralcode)->find();
			if (empty($result)) {
				return $this->response->setJSON(['error' => 'Cannot find the referral code in the database.']);
			}
			return $this->response->setJSON(['error' => null, 'data' => $result]);
	    } else {
			return $this->response->setJSON(['error' => 'Please check the format of input.']);
		}
	}
}
