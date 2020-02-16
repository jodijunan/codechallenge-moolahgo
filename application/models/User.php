<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class User extends CI_Model {
	public $data = array();
	// protected $table = 'users';  for sql purposes

	function __construct() {
		parent::__construct();
		$this->data = array(
			'R1JC04' => array(
				'first_name' => 'John Carlo',
				'last_name' => 'De Leon',
				'age' => '23',
				'address' => 'Singapore',
				'referralcode' => 'R1JC04'
			),
			'R2MK11' => array(
				'first_name' => 'Mikha',
				'last_name' => 'Bartolo',
				'age' => '22',
				'address' => 'America',
				'referralcode' => 'R2MK11'
			),
			'R3JS29' => array(
				'first_name' => 'Joshua',
				'last_name' => 'De Leon',
				'age' => '20',
				'address' => 'China',
				'referralcode' => 'R3JS29'
			),
			'R4CM17' => array(
				'first_name' => 'Mae',
				'last_name' => 'De Leon',
				'age' => '12',
				'address' => 'Korea',
				'referralcode' => 'R4CM17'
			),
		);
	}

	function getUser($referralcode) {
		// via sql
		// $query = $this->db->get_where($this->table, array('referralcode'=>$referralcode));
		// return $query->row();

		if(isset($this->data[$referralcode])) {
			return $this->data[$referralcode];
		} else {
			return false;
		}
	}

}