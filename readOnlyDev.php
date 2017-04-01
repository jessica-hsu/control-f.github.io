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
	
	<!-- jQUERY -->
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	
	<link rel="stylesheet" href="viewProfile.css">
	<link rel="icon" href="img\icon.ico" type="image/x-icon">
	<title>Control-F</title>
	
		

</head>
<?php include "connectDB.php";
$userID = $_GET['info'];

?>
<span id="network" hidden><?php echo $_SESSION['network']?></span>
<span id="profileType" hidden><?php echo $_SESSION['profileType']?></span>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
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
    	<!--- for the profile backimage -->
	
		<div class = "container-fluid" id = "top-background">
			<div id = "title-text">
			<?php #query to get user information#
   				$query = "SELECT firstName, lastName, email, phone, age, uDescription FROM user WHERE userID =" . $userID;
   				if ( ! ( $result = mysqli_query($conn, $query)) ) {
   					echo("Error: %s\n"+ mysqli_error($conn));
   					exit(1);
   				} 
   				$row = mysqli_fetch_assoc($result);
   				echo($row['firstName'] . " " . $row['lastName']);
   			?>
			
			</div>	 
		</div>
		<div class = "container-fluid" id = "division-bar"> 
		</div>
		<img src="puppies.jpg" class="img-fluid" alt="Responsive image" id = "profile-image">
		<div class="container-fluid"
		<div class="row">

		  	<!--first row-->
		  	<div class="col-sm-4 col-sm-offset-2 left-box left-box" id = "about-box">
		  		
				<p class = "sub-heading" > About Developer </p>
				<p id="about-text" contentEditable="false">
				<?php #query to get user information#
   					$query = "SELECT uDescription FROM user WHERE userID = " . $userID;
   					if ( ! ( $result = mysqli_query($conn, $query)) ) {
   						echo("Error: %s\n"+ mysqli_error($conn));
   						exit(1);
   					} 
   					$row = mysqli_fetch_assoc($result);
   					echo($row['uDescription']);
   				?>	
				</p>
				
			</div>
		  	


		  	<div class="col-sm-4  col-sm-offset-1 right-box top-box" id = "quick-facts-box"> 
				
				<p class = "sub-heading" > Quick Facts </p>
				<p id="quick-facts">
				<?php #query to get user information#
   				$query = "SELECT email, phone, age FROM user WHERE userID = " . $userID;
   				if ( ! ( $result = mysqli_query($conn, $query)) ) {
   					echo("Error: %s\n"+ mysqli_error($conn));
   					exit(1);
   				} 
   				while($row = mysqli_fetch_assoc($result)) {
   					echo("Age: &nbsp; <span contentEditable='false' class='facts-text' id='myAge'>" . $row['age'] . "</span><br>");
   					echo("Email: &nbsp; <span contentEditable='false' class='facts-text' id='myEmail'>" . $row['email'] . "</span><br>");
   					echo("Phone: &nbsp; <span contentEditable='false' class='facts-text' id='myPhone'>" . $row['phone'] . "</span><br>");
   				}
   				
   				?>	 
				</p>

			</div>

			<!-- 3rd row -->

			<div class="col-sm-9 col-sm-offset-2 left-box " id = "skills-box"> 
			
				<p class = "sub-heading" >Skills </p>
				<p>
				<div class="table-responsive">
					<table class="table table-striped" id="skill-table">
						<thead><tr>
							<th>Skill</th>
							<th>Years of Experience</th>
							<th>Sample URL</th></tr>
						</thead>
						<tbody>
						<?php 
						$query = "SELECT skillName, yearsExp, portfolioURL FROM userSkill WHERE userID = " . $userID;
						if ( ! ( $result = mysqli_query($conn, $query)) ) {
							echo("Error: %s\n"+ mysqli_error($conn));
							exit(1);
						}
						while($row = mysqli_fetch_assoc($result)) {
							echo("<tr class='skillz'><td class='skills-text' contentEditable='false'>" . $row['skillName'] . 
									"</td><td class='skills-text' contentEditable='false'>" . $row['yearsExp'] . 
									"</td><td class='skills-text' contentEditable='false'>" . $row['portfolioURL'] . 
									"</td></tr>");
						}

						?>
												
						</tbody>
					</table>
				</div>
				</p>

			</div>
			
			<div class="col-sm-9  col-sm-offset-2 left-box " id = "social-media"> 
				
				<p class = "sub-heading" > Other Places to Find Developer </p> 
				<p>
				<div class="table-responsive">
					<table class="table table-striped" id="link-table">
						<thead><tr>
							<th>Name</th>
							<th>URL</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$query = "SELECT name, links FROM links WHERE id=" . $userID;
						if ( ! ( $result = mysqli_query($conn, $query)) ) {
							echo("Error: %s\n"+ mysqli_error($conn));
							exit(1);
						}
						while($row = mysqli_fetch_assoc($result)) {
							echo("<tr class='linkz'><td class='link-text' contentEditable='false'>" . $row['name'] .
									"</td><td class='link-text' contentEditable='false'><a href='" . $row['links'] . "'>" . $row['links'] . "</a>
									</td></tr>");
						}
						

						?>
						</tbody>
					</table>
				</div>
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
<?php mysqli_close($conn); ?>	
</body>
</html>