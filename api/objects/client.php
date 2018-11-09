<?php
class Client{
 
    // database connection and table name
    private $conn;
    private $table_name = "clients";

     // object properties
     public $id;
     public $fname;
     public $lname;
     public $email;
     public $password;

     // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create client
function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                nom=:fname, prenom=:lname , email=:email , password=:password";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->fname=htmlspecialchars(strip_tags($this->fname));
    $this->lname=htmlspecialchars(strip_tags($this->lname));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->password=htmlspecialchars(strip_tags($this->password));

 
    // bind values
    $stmt->bindParam(":fname", $this->fname);
    $stmt->bindParam(":lname", $this->lname);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":password", $this->password);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
} 
    

}