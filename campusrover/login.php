<?php 

session_start();

if($_SESSION["email"] !="")
{  

	echo "<script>
alert('Access Restricted');
window.location.href='newmainpage.php';

</script>";
exit() ;
}

if(empty($_GET["email-id"]))
{  $_SESSION["email"]="";
	echo "<script>
alert('Unauthorised Access or Empty UserName');
window.location.href='newmainpage.php';

</script>";
exit() ;
}

if(empty($_GET["password"]))
{  $_SESSION["email"]="";
	echo "<script>
alert('Unauthorised Access or Empty Password');
window.location.href='newmainpage.php';

</script>";
exit() ;
}

$name=$_GET["email-id"];
$password1=$_GET["password"];



$servername = "localhost";
$username = "root";
$password = "";
$dbname="campususerDB" ;

// Create connection
$conn = new mysqli($servername, $username, $password ,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

 $sql = "SELECT password FROM userdatabase WHERE email='$name' ";
$result = $conn->query($sql);


if($result->num_rows<1 )
{
	$_SESSION["email"]="";
echo "<script>
alert('Wrong Username or Password');
window.location.href='newmainpage.php';

</script>";

exit() ;


}

$row=$result->fetch_assoc(); 
$password_real=$row["password"];
if($password1 != $password_real) 
{
	$_SESSION["email"]="";
   echo "<script>
alert('Wrong Username Or password');
window.location.href='newmainpage.php';

</script>";

exit() ;
}
else
{ 
$_SESSION["email"]=$name;

 echo "<script>
alert('Log-In Successful');
window.location.href='newmainpage.php';

</script>";
exit() ;
}




?>