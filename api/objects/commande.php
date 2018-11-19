<?php
class Commande{
 
    // database connection and table name
    private $conn;
    private $table_name = "commandes";

     // object properties
     public $id;
     public $date;
     public $idclient;
     public $idproduct;
     public $Quantity;
     public $total;
     public $Status;

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
                idclient=:idclient, idproduct=:idproduct , date=:date , Quantity=:Quantity,total=:total,Status=:Status";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->idclient=htmlspecialchars(strip_tags($this->idclient));
    $this->idproduct=htmlspecialchars(strip_tags($this->idproduct));
    $this->date=htmlspecialchars(strip_tags($this->date));
    $this->Quantity=htmlspecialchars(strip_tags($this->Quantity));
    $this->total=htmlspecialchars(strip_tags($this->total));
    $this->Status=htmlspecialchars(strip_tags($this->Status));

 
    // bind values
    $stmt->bindParam(":idclient", $this->idclient);
    $stmt->bindParam(":idproduct", $this->idproduct);
    $stmt->bindParam(":Quantity", $this->Quantity);
    $stmt->bindParam(":total", $this->total);
    $stmt->bindParam(":date", $this->date);
    $stmt->bindParam(":Status", $this->Status);
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
} 

// update the product
function update(){
 
    // update query
    $query = "UPDATE
                " . $this->table_name . "
             SET 
             Quantity=:Quantity,
             total=:total,
             Status=:Status
            WHERE
                id = :id";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
      // sanitize
      $this->Quantity=htmlspecialchars(strip_tags($this->Quantity));
      $this->total=htmlspecialchars(strip_tags($this->total));
      $this->Status=htmlspecialchars(strip_tags($this->Status));
  
   
      // bind values
      $stmt->bindParam(":id", $this->id);

      $stmt->bindParam(":Quantity", $this->Quantity);
      $stmt->bindParam(":total", $this->total);
      $stmt->bindParam(":Status", $this->Status);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
    

}

function read(){
 
    // select all query
    $query = "SELECT *
            FROM
                " . $this->table_name . " c
                LEFT JOIN
                     clients cl
                        ON c.idclient = cl.id
                LEFT JOIN
                     products p 
                     ON c.idproduct = p.id
            ORDER BY
                c.date";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}
}