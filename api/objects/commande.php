<?php
class Commande{
 
    // database connection and table name
    private $conn;
    private $table_name = "commandes";

     // object properties
     public $id;
     public $dateco;
     public $idclient;
     public $idproduit;
     public $quantite;
     public $total;
     public $etat;

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
                idclient=:idclient, idproduit=:idproduit , dateco=:dateco , quantite=:quantite,total=:total,etat=:etat";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->idclient=htmlspecialchars(strip_tags($this->idclient));
    $this->idproduit=htmlspecialchars(strip_tags($this->idproduit));
    $this->dateco=htmlspecialchars(strip_tags($this->dateco));
    $this->quantite=htmlspecialchars(strip_tags($this->quantite));
    $this->total=htmlspecialchars(strip_tags($this->quantite));
    $this->etat=htmlspecialchars(strip_tags($this->quantite));

 
    // bind values
    $stmt->bindParam(":idclient", $this->idclient);
    $stmt->bindParam(":idproduit", $this->idproduit);
    $stmt->bindParam(":quantite", $this->quantite);
    $stmt->bindParam(":total", $this->total);
    $stmt->bindParam(":dateco", $this->dateco);
    $stmt->bindParam(":etat", $this->etat);
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
             idclient=:idclient , 
             idproduit=:idproduit , 
             dateco=:dateco , 
             quantite=:quantite,
             total=:total,
             etat=:etat
            WHERE
                id = :id";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
      // sanitize
      $this->idclient=htmlspecialchars(strip_tags($this->idclient));
      $this->idproduit=htmlspecialchars(strip_tags($this->idproduit));
      $this->dateco=htmlspecialchars(strip_tags($this->dateco));
      $this->quantite=htmlspecialchars(strip_tags($this->quantite));
      $this->total=htmlspecialchars(strip_tags($this->total));
      $this->etat=htmlspecialchars(strip_tags($this->etat));
  
   
      // bind values
      $stmt->bindParam(":idclient", $this->idclient);
      $stmt->bindParam(":idproduit", $this->idproduit);
      $stmt->bindParam(":quantite", $this->quantite);
      $stmt->bindParam(":total", $this->total);
      $stmt->bindParam(":dateco", $this->dateco);
      $stmt->bindParam(":etat", $this->etat);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
    

}
}