<?php 

require_once("connection.php");
$conn = new MyConnection();
$pdo = $conn->getPdo();

$response = array();

$dept =!empty($_POST["dept"]) ? $_POST["dept"] :"";
$password = !empty($_POST["password"]) ? $_POST["password"] :"";


//echo "ID_Emp : ".$ID_Emp." Pass: ".$password."";


$response = array('dept'=> $dept,'password'=> $password);
echo json_encode($response);


//ID_Emp : 1234 Pass: 1234

?>