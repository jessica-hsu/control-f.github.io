<?php 
session_start();	
$userID = $_GET['info'];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equix="X-UA-Compatible" content="IE=edge">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="hello.all.js"></script>
	
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="readOnly.css">
	
	<title>Control-F</title>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<?php include "connectDB.php"?>
<span id="currentUser" hidden><?php echo $userID?></span>
<span id="network" hidden><?php echo $_SESSION['network']?></span>
<span id="profileType" hidden><?php echo $_SESSION['profileType']?></span>
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
         				<li><a href="viewProfile2.php">Profile</a></li>
         				<li><a href="search.php">Search</a></li>
         				<li><a href="contact.php">Contact Us</a></li>
         				<li><a id="logout" onclick="logout()" >Logout</a></li>
         			</ul>
      			</div>
    		</div>
    	</nav>
    	
		
		<div class="row" id="bg1">
			<div class="bg" id="name">
				<?php #query to get user information#
   				$query = "SELECT firstName, lastName FROM user WHERE userID = " . $userID;
   				if ( ! ( $result = mysqli_query($conn, $query)) ) {
   					echo("Error: %s\n"+ mysqli_error($conn));
   					exit(1);
   				} 
   				$row = mysqli_fetch_assoc($result);
   				echo($row['firstName'] . " " . $row['lastName']);
   				?>
				<img id ="profile-pic" class="img-circle img-responsive" alt="Please upload profile picture."  onclick="editImage(this);" onError="imgError(this)" src ="img/jessica.jpg">
				
			</div>
		</div>
		<div class="row" id="bg2">
			<div class="section" id="s1">About
		  		
		  	</div>
			<div class="bg" id="about-box">
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
		</div>
		<div class="row" id="bg3">
			<div class="section" id="s2">Quick Facts
		  		
			</div>
			<div class="bg" id="quick-facts-box">
				<?php #query to get user information#
   				$query = "SELECT email, phone, age FROM user WHERE userID = " . $userID;
   				if ( ! ( $result = mysqli_query($conn, $query)) ) {
   					echo("Error: %s\n"+ mysqli_error($conn));
   					exit(1);
   				} 
   				while($row = mysqli_fetch_assoc($result)) {
   					echo("Age: &nbsp; <span id='myAge'>" . $row['age'] . "</span><br>");
   					echo("Phone: &nbsp; <span contentEditable='false' id='myPhone'>" . $row['phone'] . "</span><br>");
   					echo("Email: &nbsp; <span id='myEmail'>" . $row['email'] . "</span><br>");
   				}
   				
   				?>	 
				</p>
			
			</div>
		</div>
		<div class="row" id="bg4">
			<div class="section" id="s3">Skills
				
			</div>
			<div class="bg" id="skills-box">
				<span id="temp" contentEditable="false" hidden></span>
				<div class="table-responsive">
					<table class="table table-striped" id="skill-table">
						<thead><tr>
							<th>Skill</th>
							<th>Years</th>
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
							echo("<tr class='skillz'><td class='skills-text-name'>" . $row['skillName'] . 
									"</td><td class='skills-text-yrs'>" . $row['yearsExp'] . 
									"</td><td class='skills-text' contentEditable='false'>" . $row['portfolioURL'] . 
									"</td></tr>");
						}

						?>
												
						</tbody>
					</table>
				</div>
				
			</div>
		</div>
		
		<div class="row" id="bg5">
			<div class="section" id="s3">Social Media
		  		
		  	</div>
			<div class="bg" id="social-media">
				<span id="temp" contentEditable="false" hidden></span>
				<div class="table-responsive">
					<table class="table table-striped" id="link-table">
						<thead><tr>
							<th>Name</th>
							<th>URL</th>
							</tr>
						</thead>
						<tbody>
						<?php /*
						$query = "SELECT name, links FROM links WHERE id = " . $userID;
						if ( ! ( $result = mysqli_query($conn, $query)) ) {
							echo("Error: %s\n"+ mysqli_error($conn));
							exit(1);
						}
						while($row = mysqli_fetch_assoc($result)) {
							echo("<tr class='linkz'><td class='link-text'>" . $row['name'] .
									"</td><td class='link-url' contentEditable='false'><a href='" . $row['links'] . "'>" . $row['links'] . "</a>
									</td><td><span class='glyphicon glyphicon-remove' onclick='removeLink(this)'></span></tr>");
						}*/
						?>
						</tbody>
					</table>
					
				</div>
			</div>
		</div>
	</div>

<?php mysqli_close($conn); ?>			

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