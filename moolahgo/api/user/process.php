<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header('Content-Type: application/json');
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare product object
$user = new User($db);
  
// set ID property of record to read
$user->referralcode = isset($_GET['referralcode']) ? $_GET['referralcode'] : die();
  
// read the details of product to be edited
$user->process();
  
if($user->referralcode!=null){
    $user_arr = array(
        "id" =>  $user->id,
        "firstname" => $user->firstname,
        "lastname" => $user->lastname,
        "username" => $user->username,
        "email" => $user->email,
    );
  
    // set response code - 200 OK
    http_response_code(200);
  
    // make it json format
    echo json_encode($user_arr);
}
  
else{
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user product does not exist
    echo json_encode(array("message" => "User does not exist."));
}
?>
