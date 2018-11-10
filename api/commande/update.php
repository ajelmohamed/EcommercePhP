<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/commande.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare commande object
$commande = new Commande($db);
 
// get id of commande to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of commande to be edited
$commande->id = $data->id;
 
// set commande property values
    $commande->quantite = $data->quantite;
    $commande->etat =$data->etat;
    $commande->total=$data->total;
 
// update the commande
if($commande->update()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "commande was updated."));
}
 
// if unable to update the commande, tell the user
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "Unable to update commande."));
}
?>