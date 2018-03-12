<?php 
error_reporting(E_ERROR | E_PARSE);
//header('Content-Type:application/json');
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
//$data=array();
echo "<h2> TOP 10 Enteries for Temperature and Humidity</h2>";
if ($result->num_rows > 0) {
    // output data of each row
    $i=1;
    echo "<table border='1'><tr><td>No.</td><td>Temperature</td><td>Humidity</td><td>Date and Time</td></tr>";
    while($row = $result->fetch_assoc()) {
  
  echo "<tr>" ; 
    echo "<td>".$i ."</td>"."<td>". $row["temperature"]."</td>"."<td>". $row["humidity"]."</td>"."<td>".$row[time_stamp]."</td>";
    echo "</tr>";
    $i++;
    }
    echo "</table>" ;
} else {
    echo "0 results";
}





mysql_close($link); 
?> 