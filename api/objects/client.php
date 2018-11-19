<?php
class Client{
 
    // database connection and table name
    private $conn;
    private $table_name = "clients";

     // object properties
     public $Id;
     public $FirstName;
     public $LastName;
     public $Email;
     public $Password;
     public $PhoneNumber;
     Public $Adress;

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
                FirstName=:FirstName, prenom=:LastName , Email=:Email , Password=:Password , PhonerNumber=:PhoneNumber,Adress=:Adress";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->FirstName=htmlspecialchars(strip_tags($this->FirstName));
    $this->LastName=htmlspecialchars(strip_tags($this->LastName));
    $this->Email=htmlspecialchars(strip_tags($this->Email));
    $this->Password=htmlspecialchars(strip_tags($this->Password));
    $this->PhoneNumber=htmlspecialchars(strip_tags($this->PhoneNumber));
    $this->Adress=htmlspecialchars(strip_tags($this->Adress));


 
    // bind values
    $stmt->bindParam(":FirstName", $this->FirstName);
    $stmt->bindParam(":LastName", $this->LastName);
    $stmt->bindParam(":Email", $this->Email);
    $stmt->bindParam(":Password", $this->Password);
    $stmt->bindParam(":PhoneNumber", $this->PhoneNumber);
    $stmt->bindParam(":Adress", $this->Adress);


 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
} 

function signIn(){
 
        // query to read single record
        $query = "SELECT *
                FROM
                    " . $this->table_name . " 
                    
                WHERE
                    Email =:Email and Password=:Password"
                    ;
               
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind id of product to be updated
        $stmt->bindParam(":Email",$this->Email);
        $stmt->bindParam("Password",$this->Password);
     
        // execute query
        $stmt->execute();
     
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        // set values to object properties
        $this->Id=$row['Id'];
        $this->FirstName = $row['FirstName'];
        $this->LastName = $row['LastName'];
        $this->PhoneNumber = $row['PhoneNumber'];
        $this->Adress = $row['Adress'];
    
    
}
    

}