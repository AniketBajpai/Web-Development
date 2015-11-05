<style>
	.error {color: #FF0000;}



	input
	{
		color: #000000;
	}
		#patti
		{
			
		}
		#green
		{
			z-index: 100;
			position:fixed;
			height: 15vh;
			width:100vw;
			top:0px;
			left: 0px;
			right: 0px;
			background-color: #3b5998;
		}
		#logo
		{
			position:fixed;
			left:1vw;
			top:0.5vh;
			height: 14vh;
		}
		#sinpu
		{
			position: fixed;
			top:0%;
		}
		#homelink
		{
			position:fixed;
			color:#3b59ff;
			margin-left: 13vw;
			font-size: 2vw;
			top: 5vh;
		}
		#searchinput
		{
			position: fixed;
			top:4%;
			left:30%;
			font-size: 100%;
		}
		#signup
		{
			position: fixed;
			top:4%;
			font-size: 75%;
			left:80%;
			color: #ffffff;
			background-color: #3b5998;
			border-color: #3b5998;
		}


		.gsc-tabHeader gsc-inline-block gsc-tabhActive{
			overflow-y:none ;	
			overflow-x:none ;	
	
		}
		
		.gsc-tabHeader gsc-inline-block gsc-tabhInactive{
			overflow-y:none	;	
				overflow-x:none ;
		}
		.gsc-orderby-label gsc-inline-block{
		 z-index: -100 ;
		}
		.gsc-selected-option {
		 z-index: -100 ;
		}
		.cse .gsc-search-button input.gsc-search-button-v2, input.gsc-search-button-v2 {
			width:100% ;		
			padding:0px ;

		}




		input[type=text] 
		{
    		color: black;
		}
		select
		{
			color: #888;
			background-color: #3b5998;
			-webkit-border-radius:4px;
		    -moz-border-radius:4px;
		    border-radius:4px;
		}
		#login
		{
			position: fixed;
			top:4%;
			font-size: 75%;
			left:88%;
			color: #ffffff;
			background-color: #3b5998;
			border-color: #3b5998;
		}
		.ico-mglass {
		  position: relative;
		  display: inline-block;
		  background: #fff;
		  border-radius: 60px;
		  height: 12px;
		  width: 12px;
		  border: 4px solid #888;
		}
		.ico-mglass:after {
		  content: "";
		  height: 4px;
		  width: 12px;
		  background: #888;
		  position: absolute;
		  top: 14px;
		  left: 10px;
		  -webkit-transform: rotate(45deg);
		  -moz-transform: rotate(45deg);
		  -ms-transform: rotate(45deg);
		  -o-transform: rotate(45deg);
		}
		#magnify
		{
			position: fixed;
			top:5%;
			left:60%;
			font-size: 2vw;
		}
		#searchbutton
		{
			position: fixed;
			top:4%;
			left:59%;
			width:4%;
			height:7%;
			font-size: 100%;
		}
		#addre
		{
			height: 90px;
			rows:3;
		}
		#descr
		{
			height:90px;
			rows:3;
		
		}
		#addform
		{
			text-align: center;
		}
		#option_selection
		{
			display: none;
		}
		#coordinate_inputbox
		{
			display: none;
		}
		#map
		{
			display: none;
			width: 100%;
		}
		#other_type
		{
			display: none;
		}

		#bod
		{
			background-color: #000000;
			color: #ffffff;
		}
		input[type=number]{
			color:black;
		}



		</style>



			


<?php
	//Place name variables
	$placenameErr="";
	$placename="";
	$placenamenum=0;
	//Type variables
	$typeErr="";
	$typename="";
	$typenum=0;
	//Type Lat/Lon
	$coordinateErr="";
	$lat=0;
	$lon=0;
	$coordinatenum=0;
	//Address variables
	$addressErr="";
	$address="";
	$addressnum=0;
	//Description variables
	$descriptionErr="";
	$description="";
	$descriptionnum=0;
	//Rating variables
	$ratingErr="";
	$rating="";
	$ratingnum=0;
	//success message
	$record="";

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{

		//placename constraint
		if (empty($_POST["placename"])) 
		{
	     	$placenameErr = " Place Name is required";
	     	$placenamenum=0;
	   	} 
	   	else 
	   	{
 			$placename = test_input($_POST["placename"]);
    		$placenamenum=1; 
   		}


   		//place type constraint
   		if (strcmp($_POST["type"],"NONE")==0) 
		{
		 	$type="none";
	    	$typeErr= "Type can't be NONE";
	    	$typenum=0;
	   	} 
	   	else if (strcmp($_POST["type"],"Other")==0) 
	   	{
	   		$type="Other";
	   		$typeErr = "";
	   		$type=test_input($_POST["type_other"]);
	   		$typenum=1;
	   		//echo '<script type="text/javascript">'
   			//			, 'document.getElementById("demo").innerHTML="it entered here";'
   			//			, '</script>'
			//							;
	   	}
	   	else 
	   	{
	   		$type = test_input($_POST["type"]);
	    	$typenum=1; 
   		}
   		//Coordinates
   		
		if (empty($_POST["lat"]) || $_POST["lat"]==0) 
		{
	     	$coordinateErr = " Please add gps coordinates by one of the two methods";
	     	$coordinatenum=0;
	   	} 
	   	else 
	   	{
 			$lat = test_input($_POST["lat"]);
 			$lon = test_input($_POST["lon"]);
    		$coordinatenum=1; 
   		}

   		//description
   		if (empty($_POST["description"])) 
		{
	     	$descriptionErr = " Please write a small description";
	     	$descriptionnum=0;
	   	} 
	   	else 
	   	{
 			$description = test_input($_POST["description"]);
    		$descriptionnum=1; 
   		}



   		//rating

   		if (empty($_POST["rating"])) 
		{
	     	$ratingErr = " Please give a rating";
	     	$ratingnum=0;
	   	} 
	   	else 
	   	{
 			$rating = test_input($_POST["rating"]);
    		$ratingnum=1; 
   		}



   		//address
   		if (empty($_POST["address"])) 
		{
	     	$addressErr = " Please write a brief address";
	     	$addressnum=0;
	   	} 
	   	else 
	   	{
 			$address = test_input($_POST["address"]);
    		$addressnum=1; 
   		}







   		//submitting in database
   		if($placenamenum==1 && $typenum==1 && $descriptionnum==1 && $ratingnum==1 && $addressnum==1 && $coordinatenum==1 )
   		{
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "crdb";
							// Create connection
							$conn = mysqli_connect($servername, $username, $password,$dbname);
							// Check connection
							if (!$conn) {
							    die("Connection failed: " . mysqli_connect_error());
							}
							        $placename= mysqli_real_escape_string($conn,$placename);
							        $type= mysqli_real_escape_string($conn,$type);
							        $lat= mysqli_real_escape_string($conn,$lat);
							        $lon= mysqli_real_escape_string($conn,$lon);
							        $description= mysqli_real_escape_string($conn,$description);
							        $rating= mysqli_real_escape_string($conn,$rating);
							        $address= mysqli_real_escape_string($conn,$address);
							        $query="SELECT name FROM places where name='".$placename."'";
							        $result = mysqli_query($conn,$query);
							        $numResults = mysqli_num_rows($result);
							if($numResults>=1)
							        {
							            $placenameErr = $placename." already exist !!!";
							        }
							
							else
							{
							$sql = "INSERT INTO places (name,type,latitude,longitude,Address,Description,AvgRating)
							VALUES (  '$placename' ,  '$type'  , '$lat', '$lon', '$address','$description','$rating')";
							if (mysqli_query($conn, $sql)) 
							{
								$placenameErr="";
								$placename="";
								$placenamenum=0;
								//Type variables
								$typeErr="";
								$typename="";
								$typenum=0;
								//Type Lat/Lon
								$coordinateErr="";
								$lat=0;
								$lon=0;
								$coordinatenum=0;
								//Address variables
								$addressErr="";
								$address="";
								$addressnum=0;
								//Description variables
								$descriptionErr="";
								$description="";
								$descriptionnum=0;
								//Rating variables
								$ratingErr="";
								$rating="";
								$ratingnum=0;
								echo '<script type="text/javascript">'
   									, 'visibilityreversal();'
   									, '</script>';
								echo " <script> alert('Record added successfully'); window.location.href='mainpage.php' ; </script>";
							    $record="New PLACE successfully added";
							} 
							else 
							{
							    $record="Error: " . $sql . "<br>" . mysqli_error($conn);
							}
							}
							mysqli_close($conn);
							
								
							



   		}
		
	}
	function test_input($data) 
		{
		   $data = trim($data);
		   $data = stripslashes($data);
		   $data = htmlspecialchars($data);
		   return $data;
		}
?>





<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript">


			function visibilitychange()
			{
				var x=document.getElementById("typedropdown").value;
				var y= "Other";
				var n = x.localeCompare(y);
				if(n==0)
				{
						document.getElementById("initial_type").style.display="none";
						document.getElementById("other_type").style.display="initial";
				}
			}
					
			 function visibilityreversal()
			 {
			 	document.getElementById("initial_type").style.display="initial";
				document.getElementById("other_type").style.display="none";
			 }

    </script>
	</head>
	<body onLoad="initialize()" id="bod">
	
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
	   
	   <br>
	   <br>
	   <br>
	   <br>
	   <br>
	   <br>


<div class="container-fluid">
<h1><div class="col-md-4 col-md-offset-4"><p class="text-center">ADD NEW PLACE</p></div>
   </h1>
</div>
	  
	  



	    <!--FORM STARTS HERE-->
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"  enctype="multipart/form-data" id="addform">
		



<div class="container-fluid">
<h4><div class="col-md-3 col-md-offset-3"><p class="text-center">Place Name   : </p></div>
<div class="col-md-3"><p class="text-center"><input type="text"  name="placename" value="<?php echo $placename;?>" placeholder="Enter Place Name"></p></div>
<div class="col-md-3"><p class="text-center"><span class="error" >* <?php echo $placenameErr;?></span></p></div></h4>
</div>
		<!--NAME OF PLACE-->
		 
		<!--Place Name Error-->
		 






<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crdb";
// Create connection
$conn = new mysqli($servername, $username, $password ,$dbname);
// Check connection


  // mysql_select_db("campusdb", $conn);
   //$sql=mysql_query("SELECT DISTINCT type FROM campusdbtable;");
   //while($row = mysql_fetch_array($sql))
	//{
 //		echo $row["type"];
   // }
	//mysql_close($conn);

// Create connection


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

 $sql = "SELECT DISTINCT type FROM places ;";
$result = $conn->query($sql);

$i=0;
while($row=$result->fetch_assoc())
{
    $type[$i]= $row["type"] ;
$i=$i+1;
}
$numResults = mysqli_num_rows($result);




?>

<script type="text/javascript">



	var type = <?php echo "['" ;
                                 echo implode("','",$type);  
                                  echo "']" ;  ?> ;
    //function myFunction() {
    //	for(i=0;i< <?php echo $numResults;?>;i=i+1)
//{
 //   var x = document.getElementById("typedropdown");
  //  var option = document.createElement("option");
 //   option.text = "Kiwi";
//    x.add(option);}
//}


//window.onload()= ;

 
</script>



		<!--TYPE OF PLACE-->
		

<div id="initial_type">
<div class="container-fluid">
<h4><div class="col-md-3 col-md-offset-3"><p class="text-center">TYPE : </p></div>
<div class="col-md-3"><p class="text-center"><select class="selectpicker" name="type" id="typedropdown" onchange="visibilitychange()" >
		  <option value="NONE">NONE</option>
		  <option value="Other">Other</option>
		</select></p></div>
<div class="col-md-3"><p class="text-center"><span class="error">* <?php echo $typeErr;?></span></p></div></h4>
</div>

</div>
<div id="other_type">
<div class="container-fluid">
<h4><div class="col-md-3 col-md-offset-3"><p class="text-center">OTHER TYPE : </p></div>
<div class="col-md-3"><p class="text-center"><input type="text" name ="type_other"></p></div>
<div class="col-md-3"><p class="text-center"><span class="error">* <?php echo $typeErr;?></span></p></div></h4>
</div>
</div>


		<!--GPS STUFF-->
		<!--INITIAL BUTTON-->
		<h4><button type="button" onclick="show_options()" id="options_button" class="btn btn-primary">ADD PLACE GPS CO-ORDINATES</button>
		<!--TYPE OF PLACE ERROR-->
		<span class="error">* <?php echo $coordinateErr;?></span>
		<br>
		<!--SELECTION BUTTON-->
		<div id="option_selection">
		<button type="button" onclick="getLocation()" class="btn btn-success">Get GPS of Device</button><br>
		Or<br>
		<button type="button" onclick="getLocationfrommap()" class="btn btn-success">Select place location on Map</button><br>
		</div>
		<!--LATITUDE-LONGITUDE BUTTON-->
		<div id="coordinate_inputbox" >
		Gps Coordinate:(latitude) <input type="text" name="lat" id="lat"> <br>
		Gps Coordinate:(longitude)<input type="text"  name="lon" id="lon"> <br>
		</div>
		<!--CONFIRM BUTTON-->
		<div id="map">
		<button type="button" onclick="confirmlocation()" class="btn btn-warning">Click here!</button> After Selecting the place Location<br>
		<div id="map_canvas" style="width:800px; height:400px;margin-left: 20vw;"></div>
		</div></h4>
		








<div class="container-fluid">
<h4><div class="col-md-3 col-md-offset-3"><p class="text-center">Address : </p></div>
<div class="col-md-3"><p class="text-center"> <textarea id="addre" class="form-control input-lg" type="text"  name="address" value="<?php echo $address;?>" placeholder="Enter brief Address"> </textarea>  </p></div>
<div class="col-md-3"><p class="text-center"><span class="error" >* <?php echo $addressErr;?></span></p></div></h4>
</div>
		<!--ADDRESS -->
			 
		
		<!--ADDRESS Error-->
		 
			<br>




<div class="container-fluid">
<h4><div class="col-md-3 col-md-offset-3"><p class="text-center">Description: </p></div>
<div class="col-md-3"><p class="text-center"> <textarea id="descr" class="form-control input-lg" type="text"  name="description" value="<?php echo $description;?>" placeholder="Add Description"> </textarea>  </p></div>
<div class="col-md-3"><p class="text-center"><span class="error" >* <?php echo $descriptionErr;?></span></p></div></h4>
</div>
		<!--DESCRIPTION-->	
			 
		
		<!--DESCRIPTION Error-->
		 
			<br>

<div class="container-fluid">
<h4><div class="col-md-3 col-md-offset-3"><p class="text-center">Rating: </p></div>
<div class="col-md-3"><p class="text-center"> <input type="number"  name="rating" min="1" max="10" placeholder="Rate"> </p></div>
<div class="col-md-3"><p class="text-center"><span class="error" >* <?php echo $ratingErr;?></span></p></div></h4>
</div>



		<!--RATING-->
		 
		
		<!--RATING Error-->
		 
			<br>

<h4>		<input type="submit" value="Submit" name="submit" class="btn btn-success">

	    </form>

	   <?php echo $record;?>
</h4>
		

	   
	    
	   
	   
	</body>
</html>

<cfoutput>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=#YOUR-GOOGLE-API-KEY#&sensor=false"></script>
</cfoutput>
	






	<script >
	   			
	   		
	  		<!--LOCATION OF DEVICE FUNCTION-->
			var x = document.getElementById("lat");
			var y = document.getElementById("lon");
			function getLocation() 
			{
				document.getElementById("option_selection").style.display ="none";
				document.getElementById("coordinate_inputbox").style.display ="initial";
				
				if (navigator.geolocation)
				{
					navigator.geolocation.getCurrentPosition(showPosition);
				} else 
				{ 
					 alert("Geolocation is not supported by this browser");
				}
			}
			function showPosition(position)
			{
				x.value = position.coords.latitude ;
				y.value= position.coords.longitude;	
				document.getElementById("lat").readOnly = true;
				document.getElementById("lon").readOnly = true;
			}




			function getLocationfrommap()
			{
				document.getElementById("option_selection").style.display ="none";
				document.getElementById("coordinate_inputbox").style.display ="initial";
				document.getElementById("map").style.display ="initial";
				initialize();
			}
			function confirmlocation()
			{
				document.getElementById("map").style.display ="none";
				document.getElementById("lat").readOnly = true;
				document.getElementById("lon").readOnly = true;
			}




			
	</script>
	<!--LOCATION FROM MAP API-->
	<script type="text/javascript">
		function show_options()
		{
			document.getElementById("option_selection").style.display ="initial";
			document.getElementById("options_button").style.display="none";
			document.getElementById("lat").readOnly = false;
			document.getElementById("lon").readOnly = false;
			//initializing null values to latitude and longitude
			document.getElementById("lat").value="0";
			document.getElementById("lon").value="0";
		}
	//<![CDATA[
		// global "map" variable
		var map = null;
		var marker = null;
		// popup window for pin, if in use
		var infowindow = new google.maps.InfoWindow({ 
			size: new google.maps.Size(150,50)
			});
		// A function to create the marker and set up the event window function 
		function createMarker(latlng, name, html) {
		var contentString = html;
		var marker = new google.maps.Marker({
			position: latlng,
			map: map,
			zIndex: Math.round(latlng.lat()*-100000)<<5
			});
		google.maps.event.addListener(marker, 'click', function() {
			infowindow.setContent(contentString); 
			infowindow.open(map,marker);
			});
		google.maps.event.trigger(marker, 'click');    
		return marker;
	}




	function initialize() 
	{
		//function(){
	for(i=0;i< <?php echo $numResults;?>;i=i+1)
	{
		var x = document.getElementById("typedropdown");
		var option = document.createElement("option");
		option.text = type[i];
		//option.value= type[i];
		x.add(option);
	}

	//}
		// the location of the initial pin
		var myLatlng = new google.maps.LatLng(28.5450,77.1922);
		// create the map
		var myOptions = {
			zoom: 19,
			center: myLatlng,
			mapTypeControl: true,
			mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
			navigationControl: true,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
		// establish the initial marker/pin
		var image = '/images/googlepins/pin2.png';  
		marker = new google.maps.Marker({
		  position: myLatlng,
		  map: map,
		  icon: image,
		  title:"Property Location"
		});
		// establish the initial div form fields
	  //  formlat = document.getElementById("lat").value = myLatlng.lat();
	  //  formlng = document.getElementById("lon").value = myLatlng.lng();
		// close popup window
		google.maps.event.addListener(map, 'click', function() {
			infowindow.close();
			});
		// removing old markers/pins
		google.maps.event.addListener(map, 'click', function(event) {
			//call function to create marker
			 if (marker) {
				marker.setMap(null);
				marker = null;
			 }
			// Information for popup window if you so chose to have one
			/*
			 marker = createMarker(event.latLng, "name", "<b>Location</b><br>"+event.latLng);
			*/
			var image = '/images/googlepins/pin2.png';
			var myLatLng = event.latLng ;
			/*  
			var marker = new google.maps.Marker({
				by removing the 'var' subsquent pin placement removes the old pin icon
			*/
			marker = new google.maps.Marker({   
				position: myLatLng,
				map: map,
				icon: image,
				title:"Property Location"
			});
			// populate the form fields with lat & lng 
			formlat = document.getElementById("lat").value = event.latLng.lat();
			formlng = document.getElementById("lon").value = event.latLng.lng();
		});



	}

	</script>



