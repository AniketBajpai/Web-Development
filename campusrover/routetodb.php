<?php
$lat= $_POST["lat"] ;
$lng = $_POST["lng"] ;
$type =$_POST["type"] ;

$servername = "localhost";
$username = "root";
$password = "";
$dbname="crDB" ;
// Create connection
$conn = new mysqli($servername, $username, $password ,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

 $sql = "INSERT INTO route (type,lat,lon)
VALUES (  '$type'  , '$lat', '$lng')"; 
$result = $conn->query($sql);
 echo " <script> alert('Record added successfully'); window.location.href='mainpage.php' ; </script>";

?>