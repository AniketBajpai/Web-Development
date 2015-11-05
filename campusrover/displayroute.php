
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="crdb" ;
// Create connection
$conn = new mysqli($servername, $username, $password ,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

 $sql = "SELECT * FROM route";
$result = $conn->query($sql);

$i= 0  ;
while($row=$result->fetch_assoc() )
{
   $lat[$i] = $row["lat"] ;
   $lng[$i] =$row["lon"] ;
   $type[$i]=$row["type"]  ;
   $i =$i +1 ;
}
 
?>



<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Routes</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
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
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;


function distance(lat1,lon1,lat2,lon2) {
	var R = 6371; // km (change this constant to get miles)
	var dLat = (lat2-lat1) * Math.PI / 180;
	var dLon = (lon2-lon1) * Math.PI / 180;
	var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
		Math.cos(lat1 * Math.PI / 180 ) * Math.cos(lat2 * Math.PI / 180 ) *
		Math.sin(dLon/2) * Math.sin(dLon/2);
	var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
	var d = R * c;
	
	return Math.round(d*1000) ;
	return d;
}


window.onload = function() {
  var lat= [[],[]] ;
var lng = [[],[]] ;


lat = <?php echo "[ " ; 
                $k = 0 ; 
               echo "[" ; echo $lat[$k] ; echo "]," ;
              for($k=1 ;$k<$i-1 ; $k=$k+1 )
              {   echo "[" ; echo $lat[$k] ; echo "] ," ; }
			   echo "[" ; echo $lat[$i-1] ; echo "] ]" ;
			  ?> ;
			  
	
    lng = <?php echo "[" ; 
                $k = 0 ; 
               echo "[" ; echo $lng[$k] ; echo "]," ;
              for($k=1 ;$k<$i-1 ; $k=$k+1 )
              {   echo "[" ; echo $lng[$k] ; echo "] ," ; }
			   echo "[" ; echo $lng[$i-1] ; echo "]]" ;
			  ?> ;
  
     var type = <?php echo "['" ;
                                 echo implode("','",$type);  
                                  echo "']" ;  ?> ;
console.log(); 			  

var no_of_routes = <?php echo $i ;?> ;
var table = document.getElementById("route_list");
 for(i= 0 ; i<no_of_routes-1 ;i++ )
 {
    var row = table.insertRow(i);
            row.id =   i;
           row.style="padding:2px" ;
		    var cell1 = row.insertCell(0);
			 cell1.id = "col" +i;
			 var cell2 = row.insertCell(1);
			 var cell3 =row.insertCell(2)  ;
			
			 var sum= 0 ; 
	 for(l = 0 ; l< lat[i].length-1 ;l++)
	 {
	   sum =  sum+ distance(lat[i][l],lng[i][l],lat[i][l+1],lng[i][l+1]) ;
	   
	 }
	 console.log(lat[i]) ;
	  i=i+1 ;
    var add= document.createTextNode("Route" + i) ;
              cell1.appendChild(add) ;
			  add= document.createTextNode("Distance:- " +sum+"m"  ) ;
			  cell2.appendChild(add) ;
			    add= document.createTextNode(type[i]) ;
			  cell3.appendChild(add) ;
			  i=i-1 ;
			  
			  row.addEventListener("click", function(){  
			  
			 var z=  $(this).attr('id');
			  	  
			  calcRoute(z); 
			  
			  
              } )
 
 }
 
 
} ;

<?php  $l= 0 ;  ?>
function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  var chicago = new google.maps.LatLng(28.540610126975402, 77.3 );
  var mapOptions = {
    zoom:10,
    center: chicago
  };
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  directionsDisplay.setMap(map);
  
  }
var waypts =[] ;
var len ; 

function calcRoute( x) {
  
 console.log(x) ;
   lat = <?php echo "[ " ; 
                $k = 0 ; 
               echo "[" ; echo $lat[$k] ; echo "]," ;
              for($k=1 ;$k<$i-1 ; $k=$k+1 )
              {   echo "[" ; echo $lat[$k] ; echo "] ," ; }
			   echo "[" ; echo $lat[$i-1] ; echo "] ]" ;
			  ?> ;
			  
	
    lng = <?php echo "[" ; 
                $k = 0 ; 
               echo "[" ; echo $lng[$k] ; echo "]," ;
              for($k=1 ;$k<$i-1 ; $k=$k+1 )
              {   echo "[" ; echo $lng[$k] ; echo "] ," ; }
			   echo "[" ; echo $lng[$i-1] ; echo "]]" ;
			  ?> ;
   
	
   
  
  len= lat[x].length ;
 console.log(len) ;
if(len<=10) 
 {for(i= 1 ;i<len-1 ;i++)
  { waypts.push({
          location:new google.maps.LatLng(lat[x][i], lng[x][i] ),
          stopover:true});
	}	 
 }	
 
 else if(len>10&&len<20) 
 {for(i= 1 ;i<len-1 ;i=i+2)
  { waypts.push({
          location:new google.maps.LatLng(lat[x][i], lng[x][i] ),
          stopover:true});
	}	 
 }	
  var request = {
      origin: new google.maps.LatLng(lat[x][0], lng[x][0] ),
	  
      destination: new google.maps.LatLng(lat[x][len-1], lng[x][len-1] ),
	  waypoints: waypts,
      optimizeWaypoints: true,
      travelMode: google.maps.TravelMode.WALKING
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
  });
}

google.maps.event.addDomListener(window, 'load', initialize);


  



	</script>
  
  
  </head>
  <body id="back" >
  
  
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
  
  
  
  
  
   
	<br> 
	<br> 
	<br> 
    <div class="container-fluid">
         <div class="col-sm-2">
       </div>
        <div classs=" col-sm-10" id="map-canvas">
        
        </div>
        
      
    </div>
	
	 <div class="container-fluid">
       
       <div class="col-sm-2">
	   Please Reload the page for viewing different Routes
		<button type="submit" class="btn btn-deafult" value="Refresh" name="Refresh" onclick="window.location.reload()"> Refresh   </button>
	
       </div>
       
       <div class="col-sm-8" style= " height:250px; overflow-y:auto">
       <table id="route_list" style="height:100%;width:100%" class="table table-responsive table-hover">
      
      
       </table>
       </div>
      
       <div class="col-sm-2">
       
	   <a href="addnew.php"> 
			<img src="images/addnew.png" id="addnew">
			</img> <font size="5px">ADD A PLACE </font> 
	 </a>
	   </div>
       
      </div>
	<div id="timepass">
	
	</div>
	
  </body>
</html>