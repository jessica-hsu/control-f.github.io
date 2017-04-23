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
	
	<link rel="stylesheet" href="index2.css">
	<link rel='icon' href='img\icon.ico' type='image/x-icon'>
	<title>Control-F</title>
</head>
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
         				<li><a href="#description">How it works</a></li>
         				<li><a href="about.about">About Us</a></li>
         				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Login/Register<span class="caret"></span></a>
         					<ul class="dropdown-menu">
         						<li><a href="loginDev.php">Login - developers</a></li>
         						<li><a href="loginComp.php">Login - nonprofits</a></li>
         					</ul>
         				</li>
         				
         			</ul>
      			</div>
    		</div>
    	</nav>
		<div class="row">
			<div class="col-sm-4" id="banner">					
				<center><img class="img-responsive" src="img/Icon-title.png"></center>
			</div>
			<div class="col-sm-8" id="words">
				
				<div id="taglines">
					<div id="title">CONTROL-F</div>
					<div>Finding a <span id="freelance">freelancer</span> or <span id="gain">gaining experience</span> should be as easy as a keyboard command.</div>
				<br>
				</div>
				<div id="description">
					<span id="subheader">How does it work?</span><br>
					<a href="about.html">Control-F</a> is an advertisement-free, neutral marketplace, connecting small-businesses with aspiring, innovative developers.<br>
					Nonprofits can login with Google or LinkedIn and gain the ability to post help ads or search for developers with relevant skills. Developers
					can login with LinkedIn or Github, add a profile, and search for opportunities to posted by nonprofits. Contact information will be available to both parties.<br><br>
					<a href="loginComp.php"><button type="button" class="btn" id="loginNonprofit">login - nonprofits</button></a>
					<a href="loginDev.php"><button type="button" class="btn" id="loginDev">login - developers</button></a>
					
				</div>
			</div>
		</div>
		
		
	</div>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script> /*for the fancy scrolling function*/
$(document).ready(function() {		//do this when document has finished loading
	$("#flip").click(function() {
		$("#panel").slideToggle("slow");
	});
	
	$('a').click(function() {
	    var href = $.attr(this, 'href');
	    $("html, body").animate({
	        scrollTop: $(href).offset().top
	    }, 1500, function () {
	        window.location.hash = href;
	    });
	    return false;
	});
	
});
</script>
</body>

</html>