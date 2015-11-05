




<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- css -->
  <link rel="stylesheet" href="../../bootstrap.min.css">
  <link rel="stylesheet" href="../../bootstrap-theme.min.css">
  <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->
  <script src="../../jquery-2.1.4.min.js"></script>
   
  <link rel="stylesheet" href="template.css">  
  	  
</head>

<body>

	
		
    
  <!-- Uppermost patti-->	
  <div class="container-fluid " >
	   <div   id="green">
            
			<div class="col-sm-3">
				<div id="patti">
				
				<img src="../../images/finallogo.jpg" id="logo">
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
		 <a href="../../signup.php">	<button type="button" id="signup">
				Sign-Up
			</button>
		</a>
		 <a href="../../login.php">	<button type="button" id="login">
				Login
			</button>
		</a>
	  </div>
	   
	   
  </div>
</div>

		<div >		
		<br>
		<gcse:searchresults></gcse:searchresults>
		</div>	
	   
	   <div class="container-fluid" style="display:none;">
        <div id="login-menu">
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
  
  
  <!-- Header (place specific) - fixed position -->
  <div id="header">
		<h1 id="placename">Nescafe</h1>
		<div id="rating">
			<div id="ratingtext">Rating :</div>
			<div class="progress" >
			  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100">
				<span id="ratingvalue">8.0 / 10 </span>
			  </div>
			</div>
		</div>
		
  </div> 
  
 
  <div id="map-canvas"></div>
  
  <div id="addressbox">
	<div id="smallmap"></div> 
	<div id="address">
		<span id="directions">Get Directions<br></span>
				Below Central Library,<br>
		IIT Delhi,<br>
		Hauz Khas.<br>
	</div>
  </div>
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000" data-pause="hover">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
	  </ol>

	  <!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
	  <div class="item active">
		<img src="../../images/IITDday.jpeg" alt="IITDday">
	  </div>
	  <div class="item">
		<img src="../../images/IITDnight.jpeg" alt="IITDnight">
	  </div>
	</div>

	  <!-- Left and right controls -->
	  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	  </a>
  </div>
  
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  
  <div id="timings" >
	<h3>Timings :</h3>
		<span class="timingstext"> 7am to 2am, </span> <br />
	<span class="timingstext"> Open all days.</span>
  </div>
  
  <div id="menu">
	<h2>Menu -</h2>
	<div id="menuimage">
		<img src="../../images/nescafemenu.jpg" alt="menu"></img>
	</div>
  </div>
	
	<div id="description">
	  <h2> Description :</h2>
	  <div id="descriptiontext">
		It is one of the most happening spots on campus, not only for humans but for dogs as well. It serves a variety of fast food items like several types of sandwiches, brownies, coffee, tea, burgers etc. Its close competitors are Lipton and HPMC. It is usually quite crowded. It has limited seating arrangement. <br/>
	  </div>  
	 </div>
  
  <button type="button" class="btn btn-primary" id="editbutton" >Edit Page	</button>
  
  <div id="edit">
	<h3>Edit contents:</h3>
	<form id="editcontents" action="edit.php?name=Nescafe" method='post'>
		<b>Name</b>: Nescafe		<br><b>Type</b>: Eatery		<br><b>Latitude</b>:<input type="text" class="form-control" value="28.54475960" style="display:inline-block;width:33%;" name="lat"></input>
		<br><b>Longitude</b>:<input type="text" class="form-control" value="77.19130430" style="display:inline-block;width:33%;" name="long"></input>
		<br><b>Photo</b>:
		<br><button class="btn btn-default" style="width:25%">Add Photo</button>
		<br><b>Description</b>:
		<br><textarea rows="2" cols="30" style="padding:2%;overflow-y:scroll;" name="description">It is one of the most happening spots on campus, not only for humans but for dogs as well. It serves a variety of fast food items like several types of sandwiches, brownies, coffee, tea, burgers etc. Its close competitors are Lipton and HPMC. It is usually quite crowded. It has limited seating arrangement.</textarea></input>
		<br><b>Rating</b>: 8.0		<br><b>Address</b>:
			<br><input type="text" class="form-control" value="Below Central Library" style="display:inline-block;width:80%;" name="add_l1"></input>
			<br><input type="text" class="form-control" value="IIT Delhi" style="display:inline-block;width:80%;" name="add_l2"></input>
			<br><input type="text" class="form-control" value="Hauz Khas" style="display:inline-block;width:80%;" name="add_l3"></input>			
		<br><b>Timings</b>:
			<br><input type="text" class="form-control" value="7am to 2am" style="display:inline-block;width:80%;" name="tim_1"></input>
			<br><input type="text" class="form-control" value="Open all days" style="display:inline-block;width:80%;" name="tim_2"></input>
		<br><br><input type="submit" class="btn btn-info" value="Submit"  style="margin-left:5vw;width:20%;">
	</form>
  </div>
  
  <br/><br/><br/><br/><br/><br/><br/>
	
</body>

<footer>

</footer>

 <!-- js -->
    
  <script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBwoCiVuTkc6ChfPMFIiOpQS4hnbZW30RM'> </script>	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> 
  <script src="../../bootstrap.min.js"></script>  
  <script src="../rangeslider.min.js"></script>
  <script src="../markerwithlabel.js"></script>
  
  <script type="text/javascript">

    function initialize() {
		var myCenter=new google.maps.LatLng(28.54475960,77.19130430);
        var mapOptions = {
          center: myCenter,
          zoom: 18,		  	 
		  panControl:true,
          zoomControl:true,
          mapTypeControl:true,
          scaleControl:true,
          streetViewControl:true,
          overviewMapControl:true,
          rotateControl:true,
		  mapTypeControlOptions: {
			 mapTypeId:[google.maps.MapTypeId.ROADMAP]
		  }
        };
		 var smallMapOptions = {
          center: myCenter,
          zoom: 16,		  	 
		  panControl:false,
          zoomControl:true,
          mapTypeControl:false,
          scaleControl:false,
          streetViewControl:false,
          overviewMapControl:false,
          rotateControl:false,
		  mapTypeControlOptions: {
			 mapTypeId:[google.maps.MapTypeId.ROADMAP]
		  }
        };
        var largemap = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
		var map = new google.maps.Map(document.getElementById('smallmap'),smallMapOptions);
		var marker=new google.maps.Marker({ position:myCenter, });
		var marker2 = new MarkerWithLabel({
		   position: myCenter,
		   draggable: false,
		   map: map,
		   labelText: "Nescafe",
		   labelAnchor: new google.maps.Point(22, 0),
		   labelClass: "labels"  // the CSS class for the label
		   
		 });
		marker2.setMap(largemap);
		marker.setMap(map);
		var directionsDisplay = new google.maps.DirectionsRenderer({preserveViewport: true});
		directionsDisplay.setMap(map);
    }
     google.maps.event.addDomListener(window, 'load', initialize);
	
	
  </script>
	  
  <script>
	$('#directions').bind("click",function(){
		$('#map-canvas').css({'display':'block'});
		var script = document.createElement("script");
        script.type = "text/javascript";
        script.src = "../markerwithlabel.js" ;
        document.body.appendChild(script);		
		var script = document.createElement("script");
        script.type = "text/javascript";
        script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBwoCiVuTkc6ChfPMFIiOpQS4hnbZW30RM&callback=initialize"; 
        document.body.appendChild(script);		
	});
  </script>
  
  <script>
	$('body').bind("keydown",function(event e){
		var code = e.keyCode || e.which;
		if(code == 27) {
		   $('#map-canvas').css({'display':'none'});
		 }
	});		
  </script>
  
  <script>
	var w=10*8.0;
	$('.progress-bar').attr('aria-valuenow',w);
	$('.progress-bar').css('width',w+'%');
	
  </script>
  
  <script>
     var toggle=0;
	 $("#editbutton").bind("click", function(){
		if(toggle%2==0){
			$('#edit').css('display','block');
			$('#editcontents').css('display','block');
			$('body').animate({scrollTop: '1400'}, 800);
			toggle = 1;
		}
		else{
        	$('#edit').css('display','none');
			$('#editcontents').css('display','none');
			toggle = 0;
		}
	 });
		
	
  </script>
    
</html>