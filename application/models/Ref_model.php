<?php

class Ref_model extends CI_Model
{
	function __construct(){
		parent::__construct(); 
	}
	
	function check($db = false)
	{
        $datas = [];
        //data coming from db
        if($db){
            $db = $this->load->database('default', true);
            $db->select('referral_code,referral_owner');
            $db->from('referral');
            $db->where('referral_code',$this->input->post('referralcode'));
            $query=$db->get();
            $count = $query->num_rows();
            if($count > 0){ 
                foreach($query->result_array() as $data){ 
                    $d = array(
                        "value_ref_code"=>$data['referral_code'],
                        "value_ref_owner"=>$data['referral_owner'],
                        "value_ref_source"=>"database"
                    );
                    array_push($datas,$d);
                }
                
                
                return [
                    's' => 'success',
                    'm' => 'Success to Get Information',
                    'data' => $datas,
                    'k' => '200'
                ];
            }
            else{
                return [
                    's' => 'failed',
                    'm' => 'Your Referral Code Doesn\'t Exist',
                    'data' => $datas,
                    'k' => '403'
                ];
            }	
        }
        else{
            //pre-populated data
            /* `moolahgo`.`referral` */
            $referral = array(
              array('id' => '1','referral_code' => 'QWERTY','referral_owner' => 'Lazy Jay'),
              array('id' => '2','referral_code' => 'LADYFM','referral_owner' => 'Lady Fort May'),
              array('id' => '3','referral_code' => '4R15DA','referral_owner' => 'Aris D Ali'),
              array('id' => '4','referral_code' => '88RRYY','referral_owner' => 'Oni Gallileo')
            );
            
            $index = $this->searchAssoc($referral, 'referral_code', $this->input->post('referralcode'));
			if($index >= 0){ //exist
                $d = array(
                        "value_ref_code"=>$referral[$index]['referral_code'],
                        "value_ref_owner"=>$referral[$index]['referral_owner'],
                        "value_ref_source"=>"pre-populated"
                    );
                array_push($datas,$d);
                
                return [
                    's' => 'success',
                    'm' => 'Success to Get Information',
                    'data' => $datas,
                    'k' => '200'
                ];
			} 
            else{
                return [
                    's' => 'failed',
                    'm' => 'Your Referral Code Doesn\'t Exist',
                    'data' => $datas,
                    'k' => '403'
                ];
            }
        }	
	}
    
    function searchAssoc($arr, $field, $value)
	{
	   foreach((array)$arr as $key => $a)
	   {
		  if ( $a[$field] === $value )
			 return $key;
	   }
	   return -1;
	}
}