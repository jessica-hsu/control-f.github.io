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
			<a id="navLogo" class="navbar-brand" href="index.html" style="padding:0;">
          	</a>
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
         				<li><a href="index.html">How it works</a></li>
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
    	
    	<h1 id="header">
    	Meet Our Team
    	</h1>
	
		<div class="row" id="description">
			<div class="col-sm-12" id="info">
				<p>
				Our team holds an interest in helping organizations locate the technological resources they need. As Computer Science 
				students at Emory, we know first hand the difficult paradox many beginning programmers face: To find a job, you need 
				experience; but without experience, its extremely difficult to find a job. Our platform offers a solution to this paradox. 
				We hope to create a marketplace in which organizations and emerging developers may connect and exchange innovative, affordable 
				services for valuable experience. 

				</p>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIHLwYJKoZIhvcNAQcEoIIHIDCCBxwCAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYCU2vcs2tjcN9Mm5ehNRbbtcTAxUNu+hJ2QpVQkT2qyV1GJlqifwnIEo6PDHHEF25JjfZHELm2jSVoTQfb9FTwRT662kVAoiA5JT59cmJjCJ7xELtQv81qPSawNzbO7xKLvSoDv3Vl8waySOr14+TheU0gylEBIMxK3KU/6G5fZODELMAkGBSsOAwIaBQAwgawGCSqGSIb3DQEHATAUBggqhkiG9w0DBwQI6fEHgDAiMuWAgYg7cUGFcTBtpbeZd/E43JkpOj/u5yV6ViHAfN3eEO0eQH4ygw7hQAbcyFn+EYtLKj0wmbT3lwH675oZq83EdjHrlpDDEphBZ6EALluULf5BNE+Twhx2k5kr87K83kByiBBx+pmwVD6E6zJa8CN5DG9SHgnjr6O+cL6sSMh5ajalRvLfMK4tYwuSoIIDhzCCA4MwggLsoAMCAQICAQAwDQYJKoZIhvcNAQEFBQAwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tMB4XDTA0MDIxMzEwMTMxNVoXDTM1MDIxMzEwMTMxNVowgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDBR07d/ETMS1ycjtkpkvjXZe9k+6CieLuLsPumsJ7QC1odNz3sJiCbs2wC0nLE0uLGaEtXynIgRqIddYCHx88pb5HTXv4SZeuv0Rqq4+axW9PLAAATU8w04qqjaSXgbGLP3NmohqM6bV9kZZwZLR/klDaQGo1u9uDb9lr4Yn+rBQIDAQABo4HuMIHrMB0GA1UdDgQWBBSWn3y7xm8XvVk/UtcKG+wQ1mSUazCBuwYDVR0jBIGzMIGwgBSWn3y7xm8XvVk/UtcKG+wQ1mSUa6GBlKSBkTCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb22CAQAwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQUFAAOBgQCBXzpWmoBa5e9fo6ujionW1hUhPkOBakTr3YCDjbYfvJEiv/2P+IobhOGJr85+XHhN0v4gUkEDI8r2/rNk1m0GA8HKddvTjyGw/XqXa+LSTlDYkqI8OwR8GEYj4efEtcRpRYBxV8KxAW93YDWzFGvruKnnLbDAF6VR5w/cCMn5hzGCAZowggGWAgEBMIGUMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbQIBADAJBgUrDgMCGgUAoF0wGAYJKoZIhvcNAQkDMQsGCSqGSIb3DQEHATAcBgkqhkiG9w0BCQUxDxcNMTcwNDA3MTYyNDU3WjAjBgkqhkiG9w0BCQQxFgQUXE1SYKM75M3F5vrIrEmianBppQYwDQYJKoZIhvcNAQEBBQAEgYBvpac7XwzWGnVIunoO3OXeh09wwmpKkWarcs2Oqw6X5xoXOIX4K64+DmUrF/2Y7SD9DsxFODerqJeCLBoTVCxCWitWs1LNPlDQHFStS+XkOfMaB1GC3etV5K+ygD2JsRJl2yQ2e9iBY5VBcl6a9a+apqAx6zh2tRMJmtD5nHQKlA==-----END PKCS7-----
				">
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>

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
	
</body>

</html>


