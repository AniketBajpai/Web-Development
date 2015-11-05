<?php  


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

 

?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    
    <style>
      #map-canvas { height:450px; width:70% ;
 		z-index: 0 ;
		border: 1px solid black;}
       
       
		
		  #login-menu{
        width:140px;
        position: fixed;
        right: 0px;
        top: 10%;
        z-index=100 ;
        }
	 #addnew{
		height:50px ;
 		width:25% ;
		}
		#patti
		{
			

		}
		#green
		{
			z-index: 1;
			position:fixed;
			height: 15vh;
			width:100vw;
			top:0px;
			left: 0px;
			right: 0px;
			background-color: #0266C8 ;
		}
		#logo
		{
			position:absolute;
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



		.gsc-tabHeader gsc-inline-block gsc-tabhActive{
			overflow-y:none ;	
			overflow-x:none ;	
	
		}
		
		.gsc-tabHeader gsc-inline-block gsc-tabhInactive{
			overflow-y:none	;	
				overflow-x:none ;
		}

		.cse .gsc-search-button input.gsc-search-button-v2, input.gsc-search-button-v2 {
			width:100% ;		
			padding:0px ;

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
		#back {
		background-color: #000000 ;
		}
		
		
	  
    </style>
   <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwoCiVuTkc6ChfPMFIiOpQS4hnbZW30RM">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>
// This example creates an interactive map which constructs a
// polyline based on user clicks. Note that the polyline only appears
// once its path property contains two LatLng coordinates.

var poly;
var map;
i = 1 ; j = 1 ; 
function initialize() {
  var mapOptions = {
    zoom: 15,
    // Center the map on IIT DELHI .
    center: new google.maps.LatLng(28.5450, 77.1922)
  };

  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var polyOptions = {
    strokeColor: '#000000',
    strokeOpacity: 1.0,
    strokeWeight: 3
  };
  poly = new google.maps.Polyline(polyOptions);
  poly.setMap(map);

  // Add a listener for the click event
  google.maps.event.addListener(map, 'click', addLatLng);
}

/**
 * Handles click events on a map, and adds a new point to the Polyline.
 * @param {google.maps.MouseEvent} event
 */
function addLatLng(event) {
 
  var path = poly.getPath();

  // Because path is an MVCArray, we can simply append a new coordinate
  // and it will automatically appear.
  path.push(event.latLng);

  // Add a new marker at the new plotted point on the polyline.
  var marker = new google.maps.Marker({
    position: event.latLng,
    title: '#' + path.getLength(),
    map: map
  });
  if(i==1)
  {a=a+event.latLng.lat() ;
  document.getElementById("lat").value= a ; i++}
  else
  {a=a+","+event.latLng.lat() ;
  document.getElementById("lat").value= a ;
  }
  if(j==1)
  {b=b+event.latLng.lng() ;
  document.getElementById("lng").value= b ; j++}
  else
  {b=b+","+event.latLng.lng() ;
  document.getElementById("lng").value= b ;
  }
}
a=""  ;
b="" ;
google.maps.event.addDomListener(window, 'load', initialize);

    </script>
	<script type="text/javascript">
	function check()
	{ c=document.getElementById("lat").value ;
	  e =document.getElementById("shortcut") ;
	  f= document.getElementById("Cycling") ;
	  g=document.getElementById("Walking") ;
		 if(c.length<100)
		 { alert("Number of points chosen on map are too less  ") ;
		 }
		 else if(!(e.checked||f.checked||g.checked))
		 {
		  alert(" Please select type of route" ) ;
		   
		 }
		 else {
		 if(e.checked)
		   {
		     document.getElementById("type").value= "shortcut" ;
		   }
		   if(f.checked)
		   {
		     document.getElementById("type").value= "Cycling" ;
		   }
		   if(g.checked)
		   {
		     document.getElementById("type").value= "Walking" ;
		   }
		document.getElementById("addingroute").submit() ; 
		}
	
	
	}
	</script>
	
  </head>
  <body id="back">
  
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
	   
	   <div class="container-fluid">
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
    </div>
  <br>
  <br>
  <br> 
   <div class="container-fluid">
         <div class="col-sm-2">
       </div>
        <div classs=" col-sm-10" id="map-canvas">
        
        </div>
        
      
    </div>
	<div  style="text-align:center ;">
		<form method="POST" action="routetodb.php"  id="addingroute">
		 <input type="hidden" id="lat" name="lat"/>
		 <input type="hidden" id="lng" name="lng" />
		 
		 <input type="radio"  id="shortcut"  value="shortcut">shortcut 
		
		<input type="radio"  id="Cycling" value="cycling">Cycling
		
		<input type="radio" id="Walking"  value="walking">Walking
		 
		<input type="hidden" id="type" name="type"  >
		<br> 
		<input type="button" onclick="check()" class="btn btn-deafult " value="Submit" >
		</form>
	</div>
  </body>
</html>