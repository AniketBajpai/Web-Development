<?php
class HttpRequest {
  public $url = null;
  public $method = 'GET';
  public $body = null;
  public $headers = Array();
  public $allow_redirect = true;
  private $url_info = null;
  private $host_name = null; 
  private $host_ip = null;
  private $response_body = null;
  private $response_headers = Array();
  private $response_code = null;
  private $response_message = null;
  private $port = null;
  private $verbose = true;
  public function __construct($url, $method = 'GET') {
    $this->url = $url;
    $this->method = $method;
    //  parse url
    $this->url_info = parse_url($url);
    $this->host_name = $this->url_info['host'];
    $this->host_ip = gethostbyname($this->host_name);
    //  get port number given the scheme
    if(!isset($this->url_info['port'])) {
      if($this->url_info['scheme'] == "http")
        $this->port = 80;
      else if($this->url_info['scheme'] == "https")
        $this->port = 443;
    } else {
      $this->port = $this->url_info['port'];
    }
    //  add default headers
    $this->headers["Host"] = "$this->host_name";
    $this->headers["Connection"] = "close";
  }
  private function constructRequest() {
    $path = "/";
    if(isset($this->url_info['path']))
      $path = $this->url_info['path'];
    $req = "$this->method $path HTTP/1.1\r\n";
    foreach($this->headers as $header => $value) {
      $req .= "$header: $value\r\n";
    }
  
    return "$req\r\n";
  }
  ///  reads a line from a file
  function readLine($fp)
  {
    $line = "";
    while (!feof($fp)) {
      $line .= fgets($fp, 2048);
      if (substr($line, -1) == "\n") {
        return rtrim($line, "\r\n");
      }
    }
    return $line;
  }
  public function send() {
    $fp = fsockopen($this->host_ip, $this->port);
    //  construct request
    $request = $this->constructRequest();
    //  write request to socket
    fwrite($fp, $request);
    //  read the status line
    $line = $this->readline($fp);
    $status = explode(" ", $line);
    //  make sure the HTTP version is valid
    if(!isset($status[0]) || !preg_match("/^HTTP\/\d+\.?\d*/", $status[0]))
      die("Couldn't get HTTP version from response.");
    //  get the response code
    if(!isset($status[1]))
      die("Couldn't get HTTP response code from response.");
    else $this->response_code = $status[1];
    
    //  get the reason, e.g. "not found"
    if(!isset($status[2]))
      die("Couldn't get HTTP response reason from response.");
    else $this->response_reason = $status[2];
    //  read the headers
    do {
      $line = $this->readLine($fp);
      if($line != "") { 
        $header = split(":", $line);
        $this->response_headers[$header[0]] = ltrim($header[1]);
      }
    } while(!feof($fp) && $line != "");
    //  read the body
    $this->response_body = "";
    do {
      $line = $this->readLine($fp); {
      if($line)
        $this->response_body .= "$line\n";
      }
    } while(!feof($fp));
    //  close the connection
    fclose($fp);
    return TRUE;
  }
  public function getStatus() {
    return $this->response_code;
  }
  public function getHeaders() {
    return $this->response_headers;
  }
  public function getResponseBody() {
    return $this->response_body;
  }
}

$email = $_POST['email'];
$password = $_POST['password'];

$url = "http://localhost/codeigniter3/index.php/books/login1/email/".$email."/password/".$password."/" ;

$len = strlen($url); $newurl ="";
for( $i=0;$i<$len;$i++) {
	$char = substr( $url, $i, 1 );
	if($char!='/' && $char!=':'){ $char = rawurlencode($char); }
	$newurl .= $char ;
} 
$url = $newurl ;

$req = new HttpRequest($url, "GET");
$req->headers["Connection"] = "close";
$req->send() or die("Couldn't send!");
$ans= $req->getResponseBody() ;


//echo $m ;
//echo $ans ;

$m =json_decode($ans, true);
 
//echo $m['id'] ;

if($m['id']=="true")
{ 		//echo "yes" ;

		$url = "http://localhost/codeigniter3/index.php/books/login2/email/".$email."/password/".$password."/" ;

		$len = strlen($url); $newurl ="";
		for( $i=0;$i<$len;$i++) {
			$char = substr( $url, $i, 1 );
			if($char!='/' && $char!=':'){ $char = rawurlencode($char); }
			$newurl .= $char ;
		} 
		$url = $newurl ;
		
		  $req2 = new HttpRequest($url, "GET");
		$req2->headers["Connection"] = "close";
		$req2->send() or die("Couldn't send!");
		$ans= $req2->getResponseBody() ;
		
         //$ans[1] ;
		 $l =json_decode($ans, true);
		//echo sizeof($l) ;
		//echo $l['Type'] ;
  ?>
  

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Court-kacheri</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index" >

   

    <!-- Contact Section -->
   <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Edit Your Profile</h2>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form role="form" name="sentMessage" id="contactForm" method="get" action="editprofile.php">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?php echo $l['Name'] ; ?>" id="name" name="name" readonly="true">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="<?php echo $l['email'] ; ?>" id="email" name="email"   data-validation- -message="Please enter your email address."readonly="true">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="New Password *" id="password" name="password"   data-validation- -message="Your Account password.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="<?php echo $l['phone'] ; ?>" id="phone" name="phone"   data-validation- -message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>

                            </div>
                            
                            <div class="col-md-6">

                                <div class="form-group">
                                      <label for="sel1"><p style="color:white;">Region</p></label>
                                      <select class="form-control" id="sel1" name="region"   >
                                                <option value=""><?php echo $l['region'] ; ?></option>
                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
												<option value="Assam">Assam</option>
												<option value="Bihar">Bihar</option>
												<option value="Goa">Goa</option>
												<option value="Gujarat">Gujarat</option>
												<option value="Haryana">Haryana</option>
												<option value="Jharkhand">Jharkhand</option>
												<option value="Karnataka">Karnataka</option>
												<option value="Kerala">Kerela</option>
												<option value="Maharashtra">Maharashtra</option>
												<option value="Manipur">Manipur</option>
												<option value="Orissa">Orissa</option>
												<option value="Punjab">Punjab</option>
												<option value="Rajasthan">Rajasthan</option>
												<option value="Tamil Nadu">Tamil Nadu</option>
												<option value="Uttar Pradesh">Uttar Pradesh</option>
												<option value="West Bengal">West Bengal</option>
                                      </select>
                                </div>
                                <div class="form-group">
                                      <label for="sel1"><p style="color:white;">Speciality</p></label>
                                      <select class="form-control" id="sel2" name="type"  >
                                                <option value=""><?php echo $l['Type'] ; ?></option>
                                                <option value="Administrative">Administrative</option>
												<option value="Advertising">Advertising</option>
												<option value="Agency">Agency</option>
												<option value="Alcohol">Alcohol</option>
												<option value="Animal">Animal</option>
												<option value="Aviation">Aviation</option>
												<option value="Banking">Banking</option>
												<option value="Bioethics">Bioethics</option>
												<option value="Business">Business</option>
												<option value="Contract">Contract</option>
												<option value="Copyright">Copyright</option>
												<option value="Criminal">Criminal</option>
												<option value="Cyber">Cyber</option>
												<option value="Defamation">Defamation</option>
												<option value="Family">Family</option>
												<option value="Food Franchise">Food Franchise</option>
												<option value="Health">Health</option>
												<option value="Insurance">Insurance</option>
												<option value="Martial">Martial</option>
												<option value="Mining">Mining</option>
												<option value="Patent">Patent</option>

                                              </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="<?php echo $l['qualification'] ; ?>" id="Qualifications" name="qualification"   data-validation- -message="Please enter your Qualification.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="<?php echo $l['Availability'] ; ?>" id="available" name="availability"   data-validation- -message="Enter time available during Day.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            

                            </div>

                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Make Changes to My Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> -->

    <!-- <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Court-kacheri 2015</span>
                </div>
              
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer> -->

    

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

</body>

</html>

  
  <?php 
}
else
{
	echo "<script>
	alert('You have entered the wrong username or password. Please retry!');
	window.location.href='login.php';

	</script>";
}
?>
 
