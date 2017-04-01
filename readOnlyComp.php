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
	
	<!-- jQUERY -->
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	
	<link rel="stylesheet" href="viewProfile.css">

	<link rel='icon' href='img/icon.ico' type='image/x-icon'>

	<title>Control-F</title>
</head>
<?php include "connectDB.php";
	$compID = $_GET['info']; 
?>

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
    	
    	<div class = "container-fluid" id = "top-background">
		<div id = "title-text">
      <?php #query to get user information#
   				$query = "SELECT cName FROM company WHERE compID = " . $compID;
   				if ( ! ( $result = mysqli_query($conn, $query)) ) {
   					echo("Error: %s\n"+ mysqli_error($conn));
   					exit(1);
   				}
   				$row = mysqli_fetch_assoc($result);
   				echo($row['cName']);
   			?>

    </div>
	</div>
	<img src="puppies.jpg" class="img-fluid" alt="Responsive image" id = "profile-image">


	<div class="container-fluid">

		<div class="row">

			<!--first row-->
		  	<div class="col-sm-4 col-sm-offset-2 left-box left-box" id = "about-box">
				<p class = "sub-heading" > About Company </p> 
				<p id="about-text">
          <?php #query to get user information#
       				$query = "SELECT cDescription FROM company WHERE compID = " . $compID;
       				if ( ! ( $result = mysqli_query($conn, $query)) ) {
       					echo("Error: %s\n"+ mysqli_error($conn));
       					exit(1);
       				}
       				$row = mysqli_fetch_assoc($result);
       				echo($row['cDescription']);
       			?>
				</p>

			</div>

		  	<div class="col-sm-4  col-sm-offset-1 right-box top-box" id = "quick-facts-box">
				<p class = "sub-heading" > Quick Facts </p>
				<p id="facts-text">
          <?php #query to get user information#
              $query = "SELECT Founder, Location, Focus FROM company WHERE compID = " . $compID;
              if ( ! ( $result = mysqli_query($conn, $query)) ) {
                echo("Error: %s\n"+ mysqli_error($conn));
                exit(1);
              }
              while($row = mysqli_fetch_assoc($result)) {
              echo("Location: &nbsp; <span class='facts-text'> " . $row['Location'] . "</span><br>");
              echo("Founder: &nbsp; <span class='facts-text' >" . $row['Founder'] . "</span><br>");
              echo("Focus: &nbsp; <span class='facts-text' >" . $row['Focus'] . "</span><br>");
            }
            ?>

				</p>

			</div>


			<!--second row-->
		  	<div class="col-sm-4 col-sm-offset-2 left-box " id = "skills-box">
				<p class = "sub-heading" > Things We Do </p> <br>
				<p id="skills-text">

				</p>

			</div>


		  	<div class="col-sm-4  col-sm-offset-1 right-box " id = "projects-box">
				<p class = "sub-heading" > Contact Us  </p>
				<p id="projects-text" >
          <?php #query to get user information#
              $query = "SELECT cEmail, cPhoneNumber FROM company WHERE compID = " . $compID;
              if ( ! ( $result = mysqli_query($conn, $query)) ) {
                echo("Error: %s\n"+ mysqli_error($conn));
                exit(1);
              }
              while($row = mysqli_fetch_assoc($result)) {
              echo("Email: &nbsp; <span class='facts-text'> " . $row['cEmail'] . "</span><br>");
              echo("Phone: &nbsp; <span class='facts-text' >" . $row['cPhoneNumber'] . "</span><br>");
              }
            ?>

				</p>

			</div>

			<!-- 3rd row -->

			<div class="col-sm-9 col-sm-offset-2 left-box " id = "awards-box">
				
				<p class = "sub-heading" > Volunteers Needed </p>
        <center>
				<p id="awards-text" >
          <?php #query to get user information#
              $query = "SELECT title,post_date,aDescription FROM advert WHERE compID = " . $compID;
              if ( ! ( $result = mysqli_query($conn, $query)) ) {
                echo("Error: %s\n"+ mysqli_error($conn));
                exit(1);
              }
              while($row = mysqli_fetch_assoc($result)) {
              echo($row['title']);
              echo("&nbsp" . $row[ 'post_date'] );
              echo("&nbsp" . $row['aDescription'] );
              }
            ?>
				</p>
      </center>


			</div>

			<!-- fourth row -->
			<div class="col-sm-9  col-sm-offset-2 left-box " id = "social-media">
				
				<p class = "sub-heading" > Social Media </p>
				<p id="social-media-text">
        <center>
          <i class="fa fa-linkedin-square" style="font-size:48px;color:rgb(0, 119, 181)"></i> &nbsp &nbsp
          <i class="fa fa-google-plus-square" style="font-size:48px;color:#dd4b39"> </i> &nbsp &nbsp
          <i class="fa fa-facebook-square" style="font-size:48px;color:#3b5998"></i> &nbsp &nbsp
          <i class="fa fa-instagram" style="font-size:48px;color:#cd486b"></i>  &nbsp &nbsp
          <i class="fa fa-snapchat-square" style="font-size:48px;color:#fffc00"></i>  &nbsp &nbsp
          <i class="fa fa-tumblr-square" style="font-size:48px;color:#35465c"></i>  &nbsp &nbsp
          <i class="fa fa-wikipedia-w" style="font-size:44px"></i>  &nbsp &nbsp
          <i class="fa fa-youtube-square" style="font-size:48px;color:#c4302b"></i>  &nbsp &nbsp
          <i class="fa fa-github-square" style="font-size:48px"></i>  &nbsp &nbsp
          <i class="fa fa-globe" style="font-size:48px"></i>
        </center>
        </p>

			</div>
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