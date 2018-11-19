<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/client.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$client = new Client($db);
 
// set ID property of record to read
$client->Email = isset($_GET['Email']) ? $_GET['Email'] : die();
$client->Password = isset($_GET['Password']) ? $_GET['Password'] : die();
// read the details of product to be edited

$client->SignIn();
 
if($client->FirstName!=null){
    /* create array
    $product_arr = array(
       "id" =>  $product->id,
        "name" => $product->name,
        "description" => $product->description,
        "price" => $product->price,
        "category_id" => $product->category_id,
        "category_name" => $product->category_name,
        "img"=>$product->img,
 
    );
 */
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($client);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user product does not exist
    echo json_encode(array("message" => "Product does not exist."));
}
?>