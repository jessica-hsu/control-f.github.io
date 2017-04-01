<?php 

session_start(); 
if ($_SESSION['profileType'] == null) {
	header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equix="X-UA-Compatible" content="IE=edge">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="hello.all.js"></script>
	
	<link rel="stylesheet" href="contactUs.css">
	
	<link rel='icon' href='img\icon.ico' type='image/x-icon'>
	
	<title>Contact Us</title>
</head>
<span id="network" hidden><?php echo $_SESSION['network']?></span>
<span id="profileType" hidden><?php echo $_SESSION['profileType']?></span>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
	<div class="container-fluid">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#theNav">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
        </div>
        <div>
            <div class="collapse navbar-collapse" id="theNav">
              <ul class="nav navbar-nav">
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="welcome.php">Home</a></li>             
                <li><a href="viewProfile.php">Profile</a></li>
                <li><a href="search.php">Search</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a id="logout" onclick="logout()" >Logout</a></li>
              </ul>
            </div>
        </div>
      </nav>
    	
    	
      <h1 id="header">
      Contact Us
      <h1>

      <p id="qs">
      Questions? Comments? Concerns?
      </p>

      <p id="qs">
      Please email us at <a href="mailto:controlf370@gmail.com?Subject=Control-F%20Help" target="_top" id="email">controlf370@gmail.com</a>, 
      and we will do our best to assist you! Thank you for your help in improving our service.
      </p>

      <h2 id="meetourteam">
    	Meet Our Team
    	</h2>
	
		<div class="row" id="description">
			<div class="col-sm-12" id="info">
				<p>
				Our team holds an interest in helping organizations locate the technological resources they need. As Computer Science 
				students at Emory, we know first hand the difficult paradox many beginning programmers face: To find a job, you need 
				experience; but without experience, its extremely difficult to find a job. Our platform offers a solution to this paradox. 
				We hope to create a marketplace in which organizations and emerging developers may connect and exchange innovative, affordable 
				services for valuable experience. 

				</p>
			</div> 
		</div>
		 
		<div class="row">
  			<div class="col-sm-3   left"> 
  				<img  src="img/david.jpg" class="rounded-circle img-responsive people-pictures" alt="Circle image">
  			</div>
  			<div class="col-sm-8 right align-middle"> 
  				David Godon<br>
  				<a href="https://www.linkedin.com/in/david-godon-4290b7116/">LinkedIn</a>
  			</div>
		</div>	
		
		<div class="row">
  			<div class="col-sm-3   left"> 
  				<img  src="img/michelle.jpg" class="rounded-circle img-responsive people-pictures" alt="Circle image">
  			</div>
  			<div class="col-sm-8 right align-middle"> 
  				Michelle Menzies<br>
  				<a href="https://www.linkedin.com/in/michelle-menzies-87a409102/">LinkedIn</a>
  			</div>
		</div>	
		
		<div class="row">
  			<div class="col-sm-3   left"> 
  				<img  src="img/jessica.jpg" class="rounded-circle img-responsive people-pictures" alt="Circle image">
  			</div>
  			<div class="col-sm-8 right" align-middle"> 
  				Jessica Hsu<br>
  				<a href="https://www.linkedin.com/in/jhsu26/">LinkedIn</a>
  			</div>
		</div>	
		
		<div class="row">
  			<div class="col-sm-3  left"> 
  				<img  src="img/kamya.jpg" class="rounded-circle img-responsive people-pictures" alt="Circle image">
  			</div>
  			<div class="col-sm-8 right align-middle"> 
  				Kamya Shethia<br>
  				<a href="https://www.linkedin.com/in/kamya-shethia-2a60b6a7/">LinkedIn</a>
  			</div>
		</div>	
		<div class="row">
  			<div class="col-sm-3  left"> 
  				<img  src="img/daniel.jpg" class="rounded-circle img-responsive people-pictures" alt="Circle image">
  			</div>
  			<div class="col-sm-8 right align-middle"> 
  				Daniel Lee<br>
  				<a href="https://www.linkedin.com/">LinkedIn</a>
  			</div>
		</div>
        
        <div class="row">
  			<div class="col-sm-3   left"> 
  				<img  src="img/brandon.jpg" class="rounded-circle img-responsive people-pictures" alt="Circle image">
  			</div>
  			<div class="col-sm-8 right align-middle"> 
  				Brandon Pownall<br>
  				<a href="https://www.linkedin.com/in/brandon-pownall-b89ab6134/">LinkedIn</a>
  			</div>
		</div>

<script>
function logout() {
	console.log("logging out ... ");
	f="logout";
	network = document.getElementById('network').innerHTML;
	console.log(network);
	profileType = document.getElementById('profileType').innerHTML;
	console.log(profileType);
	hello( network ).logout({force:true},function(e){
		console.log("force logout of " + network);
	});
	
	$.ajax({
        url: 'ajax.php',
        data: {func: f},
       	type: 'post',
        success: function(result) {
            console.log("action performed successfully");
            if (profileType == "dev") {
            	window.location.href = "loginDev.php";
            } else {
               	window.location.href = "loginComp.php";
            }
        }, 
        error: function(result) {
        	console.log(result);
        }
    });
	
}
</script>	
</body>
</html>
