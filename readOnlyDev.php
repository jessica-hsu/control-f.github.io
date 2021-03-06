<?php 
session_start();	
$userID = $_GET['info'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equix="X-UA-Compatible" content="IE=edge">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="hello.all.js"></script>
		  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	
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
         				<li><a href="viewProfile.php">Profile</a></li>
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
				<img id ="profile-pic" class="img-circle img-responsive" alt="Please upload profile picture." onError="imgError(this)" src ="<?php #query to get user information#
			$query = "SELECT imageURL FROM ImageTableDeveloper WHERE devID = " .$userID;
			if ( ! ( $result = mysqli_query($conn, $query)) ) {
			  echo("Error: %s\n"+ mysqli_error($conn));
			  exit(1);
			}
			$row = mysqli_fetch_assoc($result);
			echo($row['imageURL']);

		      ?> ">
				<script>
		  
		   function imgError(image) {
		    image.onerror = "";
		    image.src = "/img/blank-profile-picture.png";
		    return true;
		    }
  		  </script>
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
				<center>

              <a href = "<?php
                $query = "SELECT linkedIn FROM linksDev WHERE id = " . $userID;
                if ( ! ( $result = mysqli_query($conn, $query)) ) {
                  echo("Error: %s\n"+ mysqli_error($conn));
                  exit(1);
                }
                $row = mysqli_fetch_assoc($result);
                echo($row['linkedIn']);
                ?>">
                  <i class="fa fa-linkedin-square" id="linkedinicon" style="font-size:48px;color:#007bb6"></i> &nbsp &nbsp
              </a>

              <a href = "<?php
                $query = "SELECT googlePlus FROM linksDev WHERE id = " . $userID;
                if ( ! ( $result = mysqli_query($conn, $query)) ) {
                  echo("Error: %s\n"+ mysqli_error($conn));
                  exit(1);
                }
                $row = mysqli_fetch_assoc($result);
                echo($row['googlePlus']);
                ?>">
                  <i class="fa fa-google" style="font-size:48px;color:#d34836"></i> &nbsp &nbsp
              </a>

              <a href = "<?php
                $query = "SELECT github FROM linksDev WHERE id = " . $userID;
                if ( ! ( $result = mysqli_query($conn, $query)) ) {
                  echo("Error: %s\n"+ mysqli_error($conn));
                  exit(1);
                }
                $row = mysqli_fetch_assoc($result);
                echo($row['github']);
                ?>">
                  <i class="fa fa-github-square" style="font-size:48px;color:black"></i>  &nbsp &nbsp
              </a>

              <a href = "<?php
                $query = "SELECT facebook FROM linksDev WHERE id = " . $userID;
                if ( ! ( $result = mysqli_query($conn, $query)) ) {
                  echo("Error: %s\n"+ mysqli_error($conn));
                  exit(1);
                }
                $row = mysqli_fetch_assoc($result);
                echo($row['facebook']);
                ?>">
                  <i class="fa fa-facebook-official" style="font-size:48px;color:#3b5998"></i> &nbsp &nbsp
              </a>

              <a href = "<?php
                $query = "SELECT insta FROM linksDev WHERE id = " . $userID;
                if ( ! ( $result = mysqli_query($conn, $query)) ) {
                  echo("Error: %s\n"+ mysqli_error($conn));
                  exit(1);
                }
                $row = mysqli_fetch_assoc($result);
                echo($row['insta']);
                ?>">
                  <i class="fa fa-instagram" style="font-size:48px;color:#cd486b"></i>  &nbsp &nbsp
              </a>

              <a href = "<?php
                $query = "SELECT twitter FROM linksDev WHERE id = " . $userID;
                if ( ! ( $result = mysqli_query($conn, $query)) ) {
                  echo("Error: %s\n"+ mysqli_error($conn));
                  exit(1);
                }
                $row = mysqli_fetch_assoc($result);
                echo($row['twitter']);
                ?>">
                <i class="fa fa-twitter" style="font-size:48px;color:# 00aced"></i>  &nbsp &nbsp
              </a>

              <a href = "<?php
                $query = "SELECT paypal FROM linksDev WHERE id = " . $userID;
                if ( ! ( $result = mysqli_query($conn, $query)) ) {
                  echo("Error: %s\n"+ mysqli_error($conn));
                  exit(1);
                }
                $row = mysqli_fetch_assoc($result);
                echo($row['paypal']);
                ?>">
                  <i class="fa fa-paypal" style="font-size:48px;color:#003087"></i>  &nbsp &nbsp
              </a>

              <a href = "<?php
                $query = "SELECT website FROM linksDev WHERE id = " . $userID;
                if ( ! ( $result = mysqli_query($conn, $query)) ) {
                  echo("Error: %s\n"+ mysqli_error($conn));
                  exit(1);
                }
                $row = mysqli_fetch_assoc($result);
                echo($row['website']);
                ?>">
                  <i class="fa fa-globe" style="font-size:48px;color:#47ffd1"></i>
              </a>
            </center>
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
