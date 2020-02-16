<?php
$config = array(
	'referral' => array(
		array(
			'field' => 'ref_code',
			'label' => 'referral code',
			'rules' => 'required|alpha_numeric|min_length[6]|max_length[6]'
		),
	),
);
$config['error_prefix'] = '<small class="text-danger">';
$config['error_suffix'] = '</small>';