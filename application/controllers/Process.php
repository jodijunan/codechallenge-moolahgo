<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Process extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }
	
	public function index_post()
    {
		$isEmptyParams = ($this->input->post('referralcode')==NULL || empty($this->input->post('referralcode')))?true:false;
		if(!$isEmptyParams){
            //check for alphanumeric and 6 characters long
            if (preg_match("/[A-Z0-9]{6}/", $this->input->post('referralcode'))) {
                $this->load->model('ref_model', 'ref');
                
                //$data = $this->ref->check(true); //add param as boolean: true, for check data from db
                $data = $this->ref->check(); //empty param to check data from pre-populated data
                
                $this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                $data = [
                    's' => 'failed',
                    'm' => 'Check Your Input',
                    'data' => '',
                    'k' => '401'
                ];
                $this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
		}
		else{
			$data = [
				's' => 'failed',
				'm' => 'Referral Code Can\'t be empty',
				'data' => '',
				'k' => '401'
			];
			$this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}
    }
}
