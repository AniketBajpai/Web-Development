<?php
 session_start() ;
     if($_SESSION['email'] =="")
    {
        $name = "SIGN-UP/IN" ;
    }
    else
    {
         $name = $_SESSION['email'] ;
    }

 
 
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

 $sql = "SELECT DISTINCT type FROM places";
$result = $conn->query($sql);


while($row=$result->fetch_assoc())
{
   $type[] = $row["type"] ;
}

?>


<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    
	
	<style>
		#addnew{
		height:50px ;
 		width:25% ;
		}
		#patti
		{
			

		}
		#green
		{
			z-index: 10;
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

		</style>
	
	
	
	
    <style type="text/css">
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
    </style>
    
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwoCiVuTkc6ChfPMFIiOpQS4hnbZW30RM">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <script type="text/javascript">
     
      google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() 
        {

  // Create an array of styles.
          var styles = [
            {
              stylers: [
                { },
                { saturation: -20 },
                
              ]
            },{
              featureType: "road",
              elementType: "geometry",
              stylers: [
                { lightness: 100 },
                { visibility: "simplified" }
              ]
            },{
              featureType: "road",
              elementType: "labels",
              stylers: [
                { visibility: "on" }
              ]
            },{
        	featureType: "cities",
        	elementType: "labels",
        	stylers: [
        		{visibility: "on"}
        		]
             }
          ];
    
      // Create a new StyledMapType object, passing it the array of styles,
      // as well as the name to be displayed on the map type control.
          var styledMap = new google.maps.StyledMapType(styles,
             {name: "CR Map"});
    
      // Create a map object, and include the MapTypeId to add
      // to the map type control.
    
          var mapOptions = {
            zoom: 17,
            center: new google.maps.LatLng(28.5450, 77.1922),
            mapTypeControlOptions: {
              mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
            }
          };
          var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
    
      //Associate the styled map with the MapTypeId and set it to display.
          map.mapTypes.set('map_style', styledMap);
          map.setMapTypeId('map_style');
    }


    window.onload = function()
    {
        var name= "<?php echo $name ; ?>"; 
        var click=0   ;
       if(name=="SIGN-UP/IN")
			{
				
			
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
			else
			{
			    document.getElementById("login-menu").innerHTML= "Hello "+name+"<br>" ; 
			
				
				var link = document.createElement('a');
                link.setAttribute('href', 'http://localhost/CR/logout.php');
                link.setAttribute("class","logout");
			
			
			
			    document.getElementById("login-menu").appendChild(link) ;
			    document.getElementsByClassName("logout")[0].innerHTML="LOGOUT" ;
				
				document.getElementById("signup").style.display="none" ;
				document.getElementById("login").style.display="none" ;
			}
 
 
 
      var  no_of_button =  <?php echo $result->num_rows ; ?> 
    if(no_of_button%3 !=0)
	{	var no_of_rows = parseInt(no_of_button/3) +1 ; 
	}
	else
	{
		var no_of_rows = no_of_button/3
	}
	 var table = document.getElementById("type");
        var type = <?php echo "['" ;
                                 echo implode("','",$type);  
                                  echo "']" ;  ?> ;
		var a = type.length ;
         type[a] = "" ;
         type[a+1]= "" ;     
        var j =0 ; 		 
        for(i= 0; i<no_of_rows ;i++)
        {
            var row = table.insertRow(i);
            row.id = "row" + i;
           row.style="padding:2px" ;
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            cell1.id = "col" + i+"0";
            cell2.id = "col" +i+"1";
            cell3.id = "col" +i+"2";
            cell1.style="width:31.3% ;" ;
            cell2.style="width:34.3% ;" ;
            cell3.style="width:34.3% ;" ;
           
            if(type[j]!="")
            { var form=document.createElement("form");
               form.action="search.php" ;
               form.id="form"+i+"0" ;
               form.className="form-inline" ;
               document.getElementById("col"+i+"0").appendChild(form);
               //form.write("<br>") ;
                 var button = document.createElement("input");
                 button.type = "submit";
                 button.value = type[j];
				 button.name="type" ;
		button.id="Btn"+j ;
                 ///button.onclick = ;
               
                button.className="btn btn-default";
                 document.getElementById("form"+i+"0").appendChild(button);
		document.getElementById("Btn" + j).style.margin = "2px";
		document.getElementById("Btn" + j).style.width = "60%";
		
                  
                 
            }
            else
            break ;
                
            j++ ;
            if(type[j] !="" )
            {
            var form=document.createElement("form");
               form.action="search.php" ;
               form.id="form"+i+"1" ;
               form.className="form-inline" ;
               document.getElementById("col"+i+"1").appendChild(form);
            
                 var button = document.createElement("input");
                 button.type = "submit";
                 button.value = type[j] ;
				 button.name="type" ;
		button.id="Btn"+j ;
		
                 ///button.onclick = ;
                  button.className="btn btn-default";
                 document.getElementById("form"+i+"1").appendChild(button);
		document.getElementById("Btn" + j).style.margin = "2px";
		document.getElementById("Btn" + j).style.width = "70%";
		
            }
            else
            break ;
                
            j++ ;
            if(type[j] !="")
            {
                var form=document.createElement("form");
               form.action="search.php" ;
               form.id="form"+i+"2" ;
               form.className="form-inline" ;
               document.getElementById("col"+i+"2").appendChild(form);
                 var button = document.createElement("input");
                 button.type = "submit";
                 button.value = type[j]  ;
				 button.name="type" ;
		button.id="Btn"+j ;
                 ///button.onclick = ;
                  button.className="btn btn-default";
                 document.getElementById("form"+i+"2").appendChild(button);
		document.getElementById("Btn" + j).style.margin = "2px";
		document.getElementById("Btn" + j).style.width = "70%";
                 
            }
            else
            break ;
                
            j++ ;
        }
      
 
    }

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
	<div class="col-sm-1">
	</div>
        <div id="map-canvas" class="col-sm-9 ">
        </div>
	<div class="col-sm-1">
	</div>
	</div>
   </body>
        <body id="back" >
        <br>
        
         <div class="col-sm-12 container-fluid">
         <div style="margin-left:10%">
              <font font-family="Times New Roman" size=5px> Select What YOU Need </font>
        </div>
	</div>
	<div class="container-fluid">
	<div class="col-sm-1">
	<a href="addroute.php"> 
			 <font size="3px">ADD JOGGING /CYCLING ROUTE </font> 
	 </a>
	</div>
          <div class="col-sm-9" style="background-image:url(images/result_background.jpg); border: 1px solid black ;overflow-y:auto;height:100px; ">
        <div align="center" id="jogging" onclick="jogging()">
	<font color="yellow" size="4px" >
	  Jogging-Cycling Route
	  </font>	   
         </div>  
		 <br>
	 <table id="type" style="height:100%;width:100%" class="container-fluid ">
           
	       		   
            </table>
        </div>
      <div class="col-sm-2">
	
	<a href="addnew.php"> 
			<img src="images/addnew.png" id="addnew">
			</img> <font size="4px">ADD A PLACE </font> 
	</a>
	</div>
	
      </div>
      <div style="position:relative; right:0px ;bottom:0px; text-align:right">
       <br>
      
        <font size=2px>Making IIT a better Place to live</font>  <font size=0.5px> Copyright CampusRover </font>
      </div>
        
  </body>
  
  <script>
  function jogging(){
		window.location.href='displayroute.php';
	};
  </script>
  
  </html>