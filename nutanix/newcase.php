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

$name = $_GET['name'] ;
$type = $_GET['type'] ;
$title = $_GET['title'] ;
$address = $_GET['address'] ;
$region = $_GET['region'] ;
$description = $_GET['description'] ; 

$url = "http://localhost/codeigniter3/index.php/books/case/name/".$name."/type/".$type."/title/".$title."/address/".$address."/region/".$region."/description/".$description."/";
//echo $url;

$len = strlen($url); $newurl ="";
for( $i=0;$i<$len;$i++) {
	$char = substr( $url, $i, 1 );
	if($char!='/' && $char!=':'){ $char = rawurlencode($char); }
	$newurl .= $char ;
} 
$url = $newurl ; 
//echo $url;

$req = new HttpRequest($url,"PUT");	
$req->headers["Connection"] = "close";
$req->send() or die("Couldn't send!");
$ans= $req->getResponseBody() ;
echo  $ans ;

?>

<html>

<body onload = "myfunction()" >

</body>

<script>
	function myfunction() {
		alert("Case added to records.\nAwait response from us");
		window.location.href = "index.html" ;
	}
</script>

</html>