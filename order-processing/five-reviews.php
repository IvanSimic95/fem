<?php
date_default_timezone_set('Europe/Zagreb');
//Check if server is localhost or guru and save DB info
//Check if server is localhost or guru and save DB info
$domain = $_SERVER['SERVER_NAME'];
if($domain == "empress.test"){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "empress";
  $base_url = "https://empress.test";
  $path_base = $_SERVER['DOCUMENT_ROOT'].'/pages';
}else{
	$servername = "localhost";
	$username = "theisenb_empress";
	$password = "Jepang123Iva";
	$db = "theisenb_empress";
  $base_url = "https://psychic-empress.com";
  $path_base = $_SERVER['DOCUMENT_ROOT'].'/pages/';
}
// Create connection
$conn = new mysqli($servername, $username, $password, $db);
$conn->query('set character_set_client=utf8');
$conn->query('set character_set_connection=utf8');
$conn->query('set character_set_results=utf8');
$conn->query('set character_set_server=utf8');
$conn->set_charset('utf8mb4');


// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}



$sql = "SELECT * FROM reviews ORDER BY review_date ASC LIMIT 10";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
$today = date('Y-m-d H:i:s', time());
$before =date("Y-m-d H:i:s", strtotime("-7 day"));

$timestamp = rand( strtotime($before), strtotime($today) );
$random_Date = date('Y-m-d H:i:s', $timestamp );

$id = $row['review_id'];
$sql2 = "UPDATE `reviews` SET `review_date`='$random_Date' WHERE review_id='$id'" ;
$result2 = $conn->query($sql2); //UNCOMMENT THIS TO MAKE IT WORK! 
}
?> 