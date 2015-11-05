<!DOCTYPE HTML> 

<?php
session_start() ;

if($_SESSION["email"]!="")
{
	header('Location: http://localhost/CR/mainpage.php'); 
}


?>

<html>
<head>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<link rel="stylesheet" href="signup.css">

<script type="text/javascript">

window.onload=function()
{  var click=0 ;
    
	document.getElementById("login").addEventListener("click",function(){ 
						                            if(click%2==0){
						                            document.getElementById("loginform").style.visibility="visible";
						                                 document.getElementsByClassName("login-menu-text")[0].style.textAlign="left" ;
						                            } 
						                              else{document.getElementById("loginform").style.visibility="hidden";
						                                  document.getElementsByClassName("login-menu-text")[0].style.textAlign="right" ;
						                              }  click=click+1 ;
						                                                        
			                                			});
	
	
}

</script>



<style>

</style>
</head>
<body id="body"> 

<?php
// define variables and set to empty values
$nameErr = $emailErr=$passwordErr=$confpasswordErr = "";
$name = $email =$password=$confpassword="";
$submission="";
$errormessage="";
$record="";
$namenum=0;
$emailnum=0;
$passwordnum=0;
$confpasswordnum=0;
$created=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
     $errormessage="* mandatory";
     $namenum=0;
   } else {
     $name = test_input($_POST["name"]);
     $namenum=1;
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $namenum=0;
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
     $errormessage="* mandatory";
     $emailnum=0;
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     $emailnum=1;
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
       $emailnum=0;
     }
   }
   if (empty($_POST["password"])) {
     $passwordErr = "Password is required";
     $errormessage="* mandatory";
     $passwordnum=0;
   } else {
     $password = $_POST["password"];
     // check if password is well-formed
     $passwordnum=1;
     if (strlen($password)<8)
      {
       $passwordErr = "mininmum lenght reqd. is 8 chracters"; 
       $passwordnum=0;
     }
   }
if (empty($_POST["confpassword"])) {
     $confpasswordErr = "Confirm Password is required";
     $errormessage="* mandatory";
     $confpasswordnum=0;
   } else {
     $confpassword = $_POST["confpassword"];
     // check if password is well-formed
     $confpasswordnum=1;
     if (strcmp($password,$confpassword)!=0 && strlen($password)>=8)
      {
       $confpasswordErr = "password does not match...!!!"; 
       $confpasswordnum=0;
     }
   }

if($namenum==1 && $emailnum==1 && $passwordnum==1 && $confpasswordnum==1)
{

 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "campususerDB";
$name=$_POST["name"];
$email=$_POST["email"];
$password1=$_POST["password"];


// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



        $name= mysqli_real_escape_string($conn,$name);
        $email= mysqli_real_escape_string($conn,$email);
        $password= mysqli_real_escape_string($conn,$password);
        $query="SELECT email FROM USERDATABASE where email='".$email."'";
        $result = mysqli_query($conn,$query);
        $numResults = mysqli_num_rows($result);
if($numResults>=1)
        {
            $created=0;
            $record = $email." Email already exist!!";
        }

else
{

$sql = "INSERT INTO USERDATABASE (name,email,password)
VALUES (  '$name' ,  '$email'  , '$password1')";

if (mysqli_query($conn, $sql)) {
    $record="New record created successfully";
    $created=1;
} else {
    $record="Error: " . $sql . "<br>" . mysqli_error($conn);
    $created=0;
}
}
mysqli_close($conn);

}

if($namenum==1 && $emailnum==1 && $passwordnum==1 && $confpasswordnum==1 && $created==1)
{
  $name="";
  $email="";
  $password="";
  $confpassword="";
 $submission="Submission successful...!!!";
 $namenum=0;
 $emailnum=0;
 $passwordnum=0;
 $confpasswordnum=0;
 $created=0;
}
else
{
  $submission="Submission unsuccessful...!!!";
}




}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}



?>



<div class="container-fluid " >
	   <div   id="green">
            
	<div class="col-sm-3">
		<div id="patti">
		
		<img src="images/finallogo.jpg" id="logo">
		</img>
		 </div>
		
	</div>	
	<div class="col-sm-6" style="z-index:100"> 
		
		
		
		
 <script>
  (function() {
    var cx = '012116407352834705459:-_b9vpffzfi';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<br>
<gcse:searchbox></gcse:searchbox>
		<br>
		

	</div>	
		
	<div class="col-sm-3">	
	 <a href="signup.php">	<button type="button" id="signup">
			Sign-Up
		</button>
	</a>
		<button type="button" id="login">
			Login
		</button>
	  </div>
	   
   	   
	   
	   
	   
  </div>
	 </div>

		<div >
		
		<br>
		<gcse:searchresults></gcse:searchresults>
		</div>	



        <div id="login-menu" >
             <div class="login-menu-text" style="text-align:right">
             </div>
   
            <form id="loginform" style="visibility:hidden" action="login.php">
             <br>
			 <br>
			 E-Mail id:
                   <br>
               <input class="form-control" type="text" name="email-id" placeholder="something@xyzmail.com" />
                  <br>
                 Password:
                  <br>
                <input class="form-control" type="password" name="password" placeholder="Password">
                <input class="btn btn-deafult" type="submit" name="LOGIN" >
                    <br>
                 
             </form>
    
        </div>
    <br>
	<br>
	

<div style="text-align:center ;">
<h2>CAMPUS ROVER SIGN UP</h2>
<p>
<span class="error"><?php echo $errormessage;?></span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="for"> 
    <table class="table table-condensed" style="border-top: none;">
	   <tr>
	   <td class="leftcolumn">Name: </td>
	   <td class="rightcolumn"><input type="text" name="name" value="<?php echo $name;?>" class="inpu" placeholder="       First                Last"> </td>
	   </tr>
	   <tr><span class="error">* <?php echo $nameErr;?></span></tr>
	   
	   <tr>
	   <td class="leftcolumn">	E-mail:</td>
		<td class="rightcolumn"><input type="text" name="email" value="<?php echo $email;?>" class="inpu" placeholder="    Enter you email here"></td>
	   </tr>
	   <tr><span class="error">* <?php echo $emailErr;?></span><tr>
	   
	   <tr>
	   <td class="leftcolumn">Password:</td>
	   <td class="rightcolumn"><input type="password" name="password" value="<?php echo $password;?>" class="inpu" placeholder="         password"></td>
	   </tr>
	   <tr><span class="error">* <?php echo $passwordErr;?></span></tr>
	   
	   <tr>
	   <td class="leftcolumn">Confirm Password:</td>
	   <td class="rightcolumn"><input type="password" name="confpassword" value="<?php echo $confpassword;?>" class="inpu" placeholder="     confirm password"></td>
	   </tr>
	   <tr><span class="error">* <?php echo $confpasswordErr;?></span></tr>
	   
	 </table>
    
   <br><br>
   <input type="submit" name="submit" value="Submit" class="inpu" id="sub"> 
</form>
<?php echo $submission;?><br>
<?php echo $record;?>

</div> 
</body>
</html>