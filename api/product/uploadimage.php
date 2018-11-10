<?php header('Access-Control-Allow-Origin: *'); ?>
<?php header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept'); ?>
<?php header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT'); ?>
<?php
//include_once('config.php');
error_reporting(-1);
$result1 = array();
if (0 < $_FILES['file']['error']){
	echo 'Error: '.$_FILES['file']['error'].'<br>';
	$result1[] = array('status' => '0','qur' => $qur);
}else{

  
move_uploaded_file($_FILES['file']['tmp_name'],$_REQUEST['id'].'.png');
    
    
    $url = 'http://localhost/imageuploads/webservices/'.$_REQUEST['id'].'.png';
	$result1[] = array('status' => '1','url' => $url);
}

$json = $result1;
header('Content-type: application/json');
echo json_encode($json);