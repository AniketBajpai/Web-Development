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
    $url = str_replace(' ','%20',$url);
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

$type = $_GET['type'] ;
$region = $_GET['region'] ;

$url = "http://localhost/codeigniter3/index.php/books/lawyers/"."type/".$type."/region/".$region ;
//echo $url ;
$req = new HttpRequest($url, "GET");
$req->headers["Connection"] = "close";
$req->send() or die("Couldn't send!");
$ans= $req->getResponseBody() ;
$k= $ans ;
//$k= "'".$ans."'" ;
//echo $k  ;
$m =json_decode($k, true);
//echo $m ;
 
?>



<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<!-- bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css" />

<link rel="stylesheet" href="css.css" />
<div class="container">

    <hgroup class="mb20">
		<h1>Lawyers Found  </h1>
		<h2 class="lead"><strong class="text-danger"><?php  echo  sizeof($m); ?></strong> results were found <strong class="text-danger"></strong></h2>								
	</hgroup>
   
    <section class="col-xs-12 col-sm-12 col-md-12">
		 <?php for($i=0 ;$i<sizeof($m) ; $i=$i+1) { ?>
		<article class="search-result row">
			<div class="col-xs-12 col-sm-12 col-md-3" >
				<a href="#" title="Lorem ipsum" class="thumbnail"><img src="<?php echo 'uploads/'.$m[$i]['photo'].'.jpg' ; ?> " alt="<?php echo $m[$i]['Name'] ; ?> " /></a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-5">
				<ul class="meta-search">
					<li><i class="glyphicon glyphicon-user"></i> <span><?php   echo $m[$i]['Name'] ;?></span></li>
					<li><i class="glyphicon glyphicon-globe"></i> <span><?php   echo $m[$i]['region'] ;?></span></li>
					<li><i class="glyphicon glyphicon-pencil"></i> <span><?php echo $m[$i]['qualification']  ?></span></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 excerpet">
				<h2><i class="glyphicon glyphicon-hand-right"></i><a href="#" title=""><?php  echo $m[$i]['Type']  ;	?></a></h3>
				
				<p>  <i class="glyphicon glyphicon-time"></i>Availability :  <?php echo  $m[$i]['Availability'] ;?> </p>	
				<h3> <a href="mailto: <?php echo $m[$i]['email'] ;  ?>  "> Click to send Personal E-mail to lawyers </a>  </h4>
                <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
			</div>
			<span class="clearfix borda"></span>
		</article>
		<?php } ?>
        
	</section>
</div>