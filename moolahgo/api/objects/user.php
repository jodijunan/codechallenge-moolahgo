<?php
class User{
  
    private $conn;
    private $table_name = "users";
  
    public $id;
    public $firstname;
    public $lastname;
    public $username;
    public $email;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // used when filling up the update product form
    function process(){
        // query to read single record
        $query = "SELECT
                    id, firstname, lastname, username, email
                FROM
                    " . $this->table_name . "
                WHERE
                    referralcode = ?
                LIMIT
                    0,1";
    
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
    
        // bind id of product to be updated
        $stmt->bindParam(1, $this->referralcode);
    
        // execute query
        $stmt->execute();
    
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // set values to object properties
        $this->id = $row['id'];
        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];
        $this->username = $row['username'];
        $this->email = $row['email'];
    }
}
?>