<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('user');
	}

	public function index()
	{
		$data = array();
		$this->load->view('blocks/header');
		$this->load->view('home/index', $data);
		$this->load->view('blocks/footer');
	}

	public function process() {
		$data = array(
			'success' => false,
			'message' => 'No referral person found!'
		);
		$user = $this->user->getUser($_GET['referralcode']);
		if($user) {
			$data['success'] = true;
			$data['message'] = 'Referral person found!';
			// IF I WILL USE JAVASCRIPT TO SHOW CONTENT
			$data['data'] = $user;
			// IF I WILL FORMAT HERE FOR EASIER DISPLAYING
			// $data['data'] = "<p>{$data['message']}</p>";
			// $data['data'] .= "<p><strong>Referral Person:</strong> {$user['first_name']} {$user['last_name']}</p>";
			// $data['data'] .= "<p><strong>Address:</strong> {$user['address']}</p>"; 
		}
		echo json_encode($data);
	}
}
