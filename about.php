<?php session_start(); ?>
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

	<link rel="stylesheet" href="extras.css">

	<link rel='icon' href='img\icon.ico' type='image/x-icon'>

	<title>About Us</title>
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
         				<li><a href="index.php">How it works</a></li>
         				<li><a href="about.php">About Us</a></li>
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
<div class = "container-fluid">
    	<h1 id="header">
    	Meet Our Team
    	</h1>

			<div id ="division-bar"> </div>
</div>

<div class = "container">

		<div class="row">
  			<div class="col-sm-4" id = "david">
				<a href = "https://www.linkedin.com/in/david-godon-4290b7116/">
  				<img  src="img/david.jpg" class="rounded-circle img-responsive people-pictures" alt="Circle image" >
				</a>
  			</div>



  			<div class="col-sm-4">
				<a href="https://www.linkedin.com/in/michelle-menzies-87a409102/">
  				<img  src="img/michelle.jpg" class="rounded-circle img-responsive people-pictures" alt="Circle image">
				</a>
  			</div>



  			<div class="col-sm-4">
					<a href="https://www.linkedin.com/in/jhsu26/">
  					<img  src="img/jessica.jpg" class="rounded-circle img-responsive people-pictures" alt="Circle image">
					</a>

  			</div>

		</div>



		<div class="row row-second">
  			<div class="col-sm-4">
					<a href="https://www.linkedin.com/in/kamya-shethia-2a60b6a7/">
  					<img  src="img/kamya.jpg" class="rounded-circle img-responsive people-pictures" alt="Circle image">
  				</a>
  			</div>



  			<div class="col-sm-4">
					<a href="https://www.linkedin.com/">
  					<img  src="img/daniel.jpg" class="rounded-circle img-responsive people-pictures" alt="Circle image">
					</a>
  		 </div>



  			<div class="col-sm-4">
					<a href="https://www.linkedin.com/in/brandon-pownall-b89ab6134/">
  					<img  src="img/brandon.jpg" class="rounded-circle img-responsive people-pictures" alt="Circle image">
					</a>

  			</div>
		</div>
</div> <!-- close image container -->

<div class = "container"
<div id ="division-bar"> </div>
		<div class="row" id="description">
			<div class="col-sm-10" id="info">

				This website was developed as a project for our Computer Science Practicum class at Emory. The theme for our class was social justice, and we thought of our experiences working with companies who were doing amazing work, but didn't have the recources to higher developers.
				As students at Emory, we knew first hand the difficult paradox many beginning programmers face: to find a job, you need
				experience; but without experience, its extremely difficult to find a job.  We wanted to create a marketplace that would address both these problems. Control-f isn't designed to make a profit, just solve a solution to a problem. Being promotion free and ad free is important for us, so that we can be fair to our users. Any contributions go directly to keeping our servers running.

			</div>


		</div>
		<div id ="division-bar"> </div>

		<div id = "paypal">
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class = "paypal" >
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="UEHXDZUAJPDLA">
			<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
		</div>
</div>



</body>

</html>
