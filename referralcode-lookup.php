 <?php

header('Content-Type: application/json');

// CORS - Allow from any origin
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

//Invalid referral code
$invalid->notfound = "true";

//Owner #1
$owner1  = new stdClass();
$owner1->name = "David";
$owner1->department = "IT";
$owner1->jobtitle = "IT Manager";
$owner1->email = "david@company1.com.au";
$owners['ABC123'] = $owner1;

//Owner #2
$owner2  = new stdClass();
$owner2->name = "John";
$owner2->department = "Marketing";
$owner2->jobtitle = "Data Analyst";
$owner2->email = "john@company2.com.au";
$owners['DEF456'] = $owner2;

//Owner #3
$owner3  = new stdClass();
$owner3->name = "Francis";
$owner3->department = "Sales";
$owner3->jobtitle = "Senior Sales Associate";
$owner3->email = "francis@company3.com.au";
$owners['GHI789'] = $owner3;

//Check if referralcode exists as an URL parameter
if (isset($_GET['referralcode']))
{
	if(isset($owners[$_GET['referralcode']]))
	{
		echo json_encode($owners[$_GET['referralcode']]);
	}
	else
	{
		echo json_encode($invalid);
	}

	/**************************************	
	SQL / Database Connection
	**************************************/
	/*$db = new Database;
	$db->query('SELECT * FROM referralcodeowner WHERE referralcode = :referral_code');
	$db->bind(':referral_code', $_GET['referralcode']);
	if ($db->execute()) {
		$owner = $db->single();
	}

	if($owner) {
		echo json_encode($owner);
	}
	else
	{
		echo json_encode($invalid);
	}*/
}
else
{
	echo json_encode($invalid);
}


/**************************************	
Database Class - This is only relevant if we are connecting to a database
**************************************/

class Database{

	private $host = "localhost"; 
	private $user = "root";
	private $pass = "password";
	private $dbname = "database_name";
 
	private $dbh; //Database Handle
	private $error;

	private $stmt; //Statement
 
	public function __construct(){
		// Set DSN (Data Source Name)
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
		// Set options
		$options = array(
			PDO::ATTR_PERSISTENT    => true,
			PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
		);
		// Create a new PDO instanace
		try{
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
		}
		// Catch any errors
		catch(PDOException $e){
			$this->error = $e->getMessage();
		}
	}

	public function query($query){
    	$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($param, $value, $type = null){
	    if (is_null($type)) {
	        switch (true) {
	            case is_int($value):
	                $type = PDO::PARAM_INT;
	                break;
	            case is_bool($value):
	                $type = PDO::PARAM_BOOL;
	                break;
	            case is_null($value):
	                $type = PDO::PARAM_NULL;
	                break;
	            default:
	                $type = PDO::PARAM_STR;
	        }
	    }
	    $this->stmt->bindValue($param, $value, $type);
	}

	public function execute(){
    return $this->stmt->execute();
	}

	public function resultset(){
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function single(){
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
}


?> 