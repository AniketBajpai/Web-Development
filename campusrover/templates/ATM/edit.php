<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crdb";

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
  }

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


//sql to update table

$name=$_GET['name'];
$latitude=$_POST['lat'];
$longitude=$_POST['long'];
$address_line1=$_POST['add_l1'];
$address_line2=$_POST['add_l2'];
$address_line3=$_POST['add_l3'];
$timings_1=$_POST['tim_1'];
$timings_2=$_POST['tim_2'];
$Description=$_POST['description'];


$name=test_input($name);
$latitude=test_input($latitude);
$longitude=test_input($longitude);
$Description=test_input($Description);
$address_line1=test_input($address_line1);
$address_line2=test_input($address_line2);
$address_line3=test_input($address_line3);
$address = $address_line1.",".$address_line2.",".$address_line3;
$timings_1=test_input($timings_1);
$timings_2=test_input($timings_2);
$timings = $timings_1 .".".$timings_2;

$count=0; $sql="";

 /* $sql = "UPDATE Places SET type='$type' WHERE name='$name';
 if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
 } 
 else {
    echo "Error updating record: " . $conn->error;
 } */
 $sql = "UPDATE Places SET latitude='$latitude' WHERE name='$name'";
 if ($conn->query($sql) === TRUE) {
    $count++;
 }
 else {
    echo "Error updating record: " . $conn->error;
 } 
 $sql = "UPDATE Places SET longitude='$longitude' WHERE name='$name'";
 if ($conn->query($sql) === TRUE) {
    $count++;
 }
 else {
    echo "Error updating record: " . $conn->error;
 } 
 /*$sql = "UPDATE Places SET Photo='$imagepath' WHERE name='$name'";
 if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
 }
 else {
    echo "Error updating record: " . $conn->error;
 } */
 $sql = "UPDATE Places SET Description='$Description' WHERE name='$name'";
 if ($conn->query($sql) === TRUE) {
    $count++;
 }
 else {
    echo "Error updating record: " . $conn->error;
 } 
  
 $sql = "UPDATE Places SET Address='$address' WHERE name='$name'";
 if ($conn->query($sql) === TRUE) {
    $count++;
 }
 else {
    echo "Error updating record: " . $conn->error;
 } 
 
 $sql = "UPDATE Places SET Timings='$timings' WHERE name='$name'";
 if ($conn->query($sql) === TRUE) {
    $count++;
 }
 else {
    echo "Error updating record: " . $conn->error;
 } 
 
 $conn->close(); 
 ?>
 

<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
 <script>
	 if(<?php echo $count;?> == 5){
		alert("Records updated successfully ");
	 }
	 window.location.href="template.php?name=<?php echo $name; ?>";
 </script>
	 
  
 </html>

