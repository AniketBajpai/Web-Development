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

<body id="page-top" class="index">

   

    <!-- Contact Section -->
   <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Add a New Case </h2>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form role="form" name="sentMessage" id="contactForm" method="get" action="newcase.php" >
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" name="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                      <label for="sel1"><p style="color:white;">REGION:</p> </label>
                                      <select class="form-control" id="sel1" name ="region">
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
                                      <label for="sel1"><p style="color:white;">Type:</p></label>
                                      <select class="form-control" id="sel2" name="type" required>
										<option value="">Select Type of Crime</option>
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
                            </div>
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Contact Details(E-mail/Phone Number/Address)" id="Address" name="address" required data-validation-required-message="Please enter you Address.">
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Title" id="title" name="title" required data-validation-required-message="Please Enter a title.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Description" id="Description" name="description" required data-validation-required-message="Please Enter a Description.">
                                    <p class="help-block text-danger"></p>
                                </div>

                                </div>

                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div> 
                                <input type="submit" class="btn btn-xl">Add Case</input>
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
