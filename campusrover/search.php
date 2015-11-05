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

 $type= $_GET["type"]  ;
 
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

 $sql = "SELECT * FROM places WHERE type='$type'";
$result = $conn->query($sql);

while($row=$result->fetch_assoc())
{
  $lat[]= $row["latitude"];
  $lon[] =$row["longitude"] ;
  $placename[]=$row["name"] ;
  $id[]=$row["id"] ;
  $rating[]=$row["AvgRating"] ;	
  $address[]=$row["Address"] ;
	
}
 

?>


<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">




<style>
		
		
		#back {
		background-color: #000000 ;
		}
		
		#addnew{
		height:50px ;
 		width:30% ;
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

		</style>
	






<style type="text/css">
         #map-canvas{
             height:450px ;
             width:70% ;
            z-index: 0 ;
		border: 1px solid black; 
		 
		margin:10% ;
         }
        .logo{
    	    padding:10px ;
    	    margin:10px;
        }
        .search{
	         padding-left:10px ;
	         padding-right:10px ;
	           padding-top:10px ; 
	        padding-bottom:2px ; 
		
        }
        #login-menu{
     
             position: fixed;
             right: 0px;
            top: 10%;
             z-index=100 ;
		width:15% ;
        }
</style>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwoCiVuTkc6ChfPMFIiOpQS4hnbZW30RM">
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>







<script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', initialize);
  var xcoord= [] ;
  var ycoord= []; 
  var address=[] ;
  var place_name=[];  
  var pid=[] ;
  var rating = [] ;
    function initialize() 
        {     var i=0 ;
            //plotting markers
                   var no_of_marker= <?php echo $result->num_rows  ; ?>; 
             
 var a ="abc" ;                   
            
             var ycoord = <?php echo "[" ;
				echo implode("," ,$lat) ;
				echo "]" ;?> ;
	 
               rating = <?php echo "['" ;
                                 echo implode("','",$rating);  
                                  echo "']" ; ?>  ; 
			   
               var xcoord =<?php echo "[" ;
				echo implode("," ,$lon) ;
				echo "]" ;?> ;
			
                 var address = <?php echo "['" ;
                                 echo implode("','",$address);  
                                  echo "']" ; 
                ?> ;
              var placename =<?php 
                              echo "['" ;
                                 echo implode("','",$placename);  
                                  echo "']" ; 
                ?> ;
	       var  pid =<?php echo "[" ;
				echo implode("," ,$id) ;
				echo "]" ;
                
				?> ;
            
            



  // Create an array of styles.
            
          var styles = [
            {
              stylers: [
                {  },
                { saturation: -20 }
              ]
            },{
              featureType: "road",
              elementType: "geometry",
              stylers: [
                {  },
                { visibility: "on" }
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
            zoom: 15,
            center: new google.maps.LatLng(28.5450, 77.1922),
            mapTypeControlOptions: {
              mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
            }
          };
          var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
    
 var marker= [] ;
 var myinfowindow=[] ;
      //Associate the styled map with the MapTypeId and set it to display.
          map.mapTypes.set('map_style', styledMap);
          map.setMapTypeId('map_style');
          
          for(i=0;i<no_of_marker ;i++)
          {
             
            myinfowindow[i] = new google.maps.InfoWindow({
                        content: address[i]
                        });
                     
             marker[i] = new google.maps.Marker({
             position: new google.maps.LatLng(ycoord[i],xcoord[i]),
            map: map,
            title:  placename[i] ,
            id: pid[i] , 
            infowindow: myinfowindow[i]
             });
             
           google.maps.event.addListener(marker[i], 'mouseover', function() {
                        this.infowindow.open(map,this);
                             });
            google.maps.event.addListener(marker[i], 'mouseout', function() {
                        this.infowindow.close(map,this);
                             });
        
          }
          
          //adding the obtained results
          
          var table= document.getElementById("results") ;
          
          for(i= 0 ;i<no_of_marker;i++)
          {
              var row=table.insertRow(i) ;
              row.id=i ; // row id must be equal to element id
              row.title= placename[i]  ;
			  
			  row.addEventListener("click", function(){ document.getElementById("userselection").value=$(this).attr('title');
                  //document.getElementById("selectionform").submit() ;
				  window.location.href="templates/eateries/template.php?name="+$(this).attr('title');
              } )
              
             var dummymarker ;
			 var dummywindow ; 
             row.addEventListener("mouseover",function(){
                    
                     dummywindow = new google.maps.InfoWindow({
                        content: address[parseInt($(this).attr('id'))] 
                        });
                    
                   dummymarker = new google.maps.Marker({
                     position: new google.maps.LatLng(ycoord[parseInt($(this).attr('id'))],xcoord[parseInt($(this).attr('id'))]),
                     map: map,
                     title:  address[parseInt($(this).attr('id'))] , 
                      id: pid[parseInt($(this).attr('id'))] , //add the id of places 
                    infowindow: dummywindow
                    });
                    
                     dummymarker.infowindow.open(map,dummymarker);
             })
            row.addEventListener("mouseout",function(){
                    
                 
                    
                     dummymarker.infowindow.close(map,dummymarker);
                     dummymarker.setMap(null);
             })
           
              var cell1=row.insertCell(0) ;
              var cell2=row.insertCell(1) ;
              var cell3=row.insertCell(2) ;
			  var cell4=row.insertCell(3) ;
              cell1.id="col"+i +"0" ;
              cell2.id="col"+i+ "1" ;
              cell3.id="col"+i+"2" ;
              cell4.id="col"+i+"3" ;
              cell1.style="width:39% ; size:10px ;" ;
              cell2.style="width:60% ;fontSize:20 ;" ;
              cell3.style="width:1%" ;
			  
					cell1.style.fontSize="30px" ;
					cell2.style.fontSize="15px" ;
			 var name =document.createTextNode(placename[i]);//add variable obtained from php
             
              cell1.appendChild(name) ;
              var add= document.createTextNode(address[i]) ;
			 
              cell2.appendChild(add) ;
              
              var ID = document.createTextNode("pid[i]") ;
              cell3.style.display="none" ;
              cell3.appendChild(ID); 
              var rat =  document.createTextNode("rating "+rating[i]) ;
			  cell4.appendChild(rat) ;
          }
  
          
    }
</script>

<script type="text/javascript">

window.onload = function()
    {
        var name= "<?php echo $name ;?>" ;
        var click=0   ;
        if(name=="SIGN-UP/IN")
			{
				//document.getElementsByClassName("login-menu-text")[0].innerHTML= name ;
			     
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
    <div container-fluid>
         <div class="col-sm-2">
       </div>
        <div classs=" col-sm-10" id="map-canvas">
        
        </div>
        
      
    </div>
    <br>
    <div class="container-fluid">
       
       <div class="col-sm-2">
		
	<a href="addroute.php"> 
			<img src="images/cycling.jpg" id="addnew" style="border: 1px solid black">
			</img> <font size="3px">ADD JOGGING /CYCLING ROUTE </font> 
	 </a>
       </div>
       
       <div class="col-sm-8" style= " height:250px; overflow-y:auto">
       <table id="results" style="height:100%;width:100%" class="table table-responsive table-hover">
      
      
       </table>
       </div>
      
       <div class="col-sm-2">
       
	   <a href="addnew.php"> 
			<img src="images/addnew.png" id="addnew">
			</img> <font size="5px">ADD A PLACE </font> 
	 </a>
	   </div>
       
      </div>
      <div style=" text-align:right">
       
	   
	   <font >Making IIT a better place to live </font> <font size=0.5px> Copyright CampusRover </font> 
      </div>
      <div>
      <form style="display:none" action="Newfile.php" id="selectionform">
      <input type="text" id="userselection" name="userselection">
      </form>
      </div>
      
	  
	 

    </div>
  </div>
  
</body>

</html>


