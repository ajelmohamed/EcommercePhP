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
                idclient=:idclient, idproduit=:idproduit , date=:dateco , quantite=:quantite,total=:total,etat=:etat";
 
    // prepare query
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
             quantite=:quantite,
             total=:total,
             etat=:etat
            WHERE
                id = :id";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
      // sanitize
      $this->quantite=htmlspecialchars(strip_tags($this->quantite));
      $this->total=htmlspecialchars(strip_tags($this->total));
      $this->etat=htmlspecialchars(strip_tags($this->etat));
  
   
      // bind values
      $stmt->bindParam(":id", $this->id);

      $stmt->bindParam(":quantite", $this->quantite);
      $stmt->bindParam(":total", $this->total);
      $stmt->bindParam(":etat", $this->etat);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
    

}

function read(){
 
    // select all query
    $query = "SELECT
                c.id ,cl.nom as clientname, cl.prenom as clientlname,p.name,p.price,c.etat, c.total , c.quantite
            FROM
                " . $this->table_name . " c
                LEFT JOIN
                     clients cl
                        ON c.idclient = cl.id
                LEFT JOIN
                     products p 
                     ON c.idproduit = p.id
            ORDER BY
                c.date";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}
}