<?php 
error_reporting(E_ERROR | E_PARSE);
header('Content-Type:application/json');
$servername="localhost";
$username="root";
$password="root@123";
$dbname="iot";

$link = mysqli_connect($servername, $username, $password, $dbname); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 
$sql = "SELECT * FROM sensor limit 10";
$result = $link->query($sql);
$data=array();
foreach($result as $row){
$data[]=$row;
}
print json_encode($data);





mysql_close($link); 
?> 