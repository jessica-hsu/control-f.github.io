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
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="readOnly.css">
	<script src="hello.all.js"></script>
	
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
         				<li><a href="viewCompanyProfile.php">Profile</a></li>
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
   				$query = "SELECT cName FROM company WHERE compID = ".$userID;
   				if ( ! ( $result = mysqli_query($conn, $query)) ) {
   					echo("Error: %s\n"+ mysqli_error($conn));
   					exit(1);
   				}
   				$row = mysqli_fetch_assoc($result);
   				echo($row['cName']);
   				?>
				<img id ="profile-pic" class="img-circle img-responsive" alt="Please upload profile picture." onError="imgError(this)" src ="<?php #query to get user information#
        		$query = "SELECT imageURL FROM ImageTable WHERE compID = " .$userID;
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
			<div class="section" id="s2">About
		  	
		  	</div>
			<div class="bg" id="about-box">
				<p id="about-text" contentEditable="false">
				<?php #query to get user information#
       				$query = "SELECT cDescription FROM company WHERE compID = ".$userID;
       				if ( ! ( $result = mysqli_query($conn, $query)) ) {
       					echo("Error: %s\n"+ mysqli_error($conn));
       					exit(1);
       				}
       				$row = mysqli_fetch_assoc($result);
       				echo($row['cDescription']);
       			?>
				</p>
			</div>
		</div>
		<div class="row" id="bg3">
			<div class="section" id="s3">Quick Facts
		  		
			</div>
			<div class="bg" id="quick-facts-box">
				<table id = "quick-facts-table">
          			<p id="facts-text" contentEditable="false">
            			<?php #query to get user information#
                		$query = "SELECT Founder, Location, Focus FROM company WHERE compID = ".$userID;
                		if ( ! ( $result = mysqli_query($conn, $query)) ) {
                  			echo("Error: %s\n"+ mysqli_error($conn));
                  			exit(1);
                		}
                		while($row = mysqli_fetch_assoc($result)) {
                			echo("<tr><td><i class=\"material-icons\">location_city</i></td><td>Location</td>  <span contentEditable='false' class='facts-text '> <td id = \"loc\">" . $row['Location'] . "</td></tr>");
                			echo("<tr><td><i class=\"material-icons\">person</i></td><td>Founder</td>  <span contentEditable='false' class='facts-text '> <td id =\"found\">" . $row['Founder'] . "</td></tr>");
                			echo("<tr><td><i class=\"material-icons\">star</i></td><td>Focus</td>  <span contentEditable='false' class='facts-text '> <td id =\"focus\">" . $row['Focus'] . "</td></tr>");
              			}
              			?>
          			</p>
      			</table>
			</div>
		</div>
		<div class="row" id="bg4">
			<div class="section" id="s4">What We're Proud Of
				
			</div>
			<div id="proud">
				<p id="proud-text" contentEditable="false">
          		<?php #query to get user information#
             	 $query = "SELECT companycol FROM company WHERE compID = ".$userID;
             	 if ( ! ( $result = mysqli_query($conn, $query)) ) {
                echo("Error: %s\n"+ mysqli_error($conn));
                exit(1);
              	}
              	$row = mysqli_fetch_assoc($result);
              	echo($row['companycol']);
            	?>
				</p>
			</div>
		</div>
		
		<div class="row" id="bg5">
			<div class="section" id="s5">Volunteers Needed
				
			</div>
			<div id="volunteers">
				<table id = "volunteers-table" class="table table-hover">
        			<thead>
          				<tr>
          					<th> Advert ID</th>
            				<th>Title</th>
            				<th>Description</th>
            				<th>Status</th>
							<th>Remove</th>
          				</tr>
        			</thead>
					<p id="awards-text" contentEditable="false">
          				<?php #query to get user information#
              				$query = "SELECT * FROM advert WHERE compID = ".$userID;
              				if ( ! ( $result = mysqli_query($conn, $query)) ) {
                				echo("Error: %s\n"+ mysqli_error($conn));
                				exit(1);
              				}

              				while($row = mysqli_fetch_assoc($result) ) {
              					echo("<tr><td class='adID'>".$row['advertID']."</td>");
                				echo("<span contentEditable='false' class='facts-text'> <td>" . $row['title'] . "</td>");
                				echo("<td>" . $row['aDescription'] . "</td></span>");
                				echo("<td class='adStatus'>" . $row['status'] . "</td></span>");
                				echo("<td><span class='glyphicon glyphicon-remove' onclick='removeAdvert(".$row['advertID'].",".$userID.")'></span></td></tr>");
              				}
              				
            			?>
					</p>
      			</table>
      			
			</div>
		</div>
		
		<div class="row" id="bg6">
			<div class="section" id="s6">Social Media
		  		
		  	</div>
			<div class="bg" id="social-media">
				<center>

              <a href = "<?php
                $query = "SELECT linkedIn FROM links WHERE id = " . $userID;
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
                $query = "SELECT googlePlus FROM links WHERE id = " . $userID;
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
                $query = "SELECT github FROM links WHERE id = " . $userID;
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
                $query = "SELECT facebook FROM links WHERE id = " . $userID;
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
                $query = "SELECT insta FROM links WHERE id = " . $userID;
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
                $query = "SELECT twitter FROM links WHERE id = " . $userID;
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
                $query = "SELECT paypal FROM links WHERE id = " . $userID;
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
                $query = "SELECT website FROM links WHERE id = " . $userID;
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
		
		<div class="row" id="bg7">
			<div class="section" id="s7">Contact Us
		  		
		  	</div>
			<div class="bg" id="contact-us">
				<p id="contact-text" contentEditable="false">
        			<table id = "quick-facts-table">
          				<?php #query to get user information#
           				   $query = "SELECT cEmail, cPhoneNumber FROM company WHERE compID = ".$userID;
           				   if ( ! ( $result = mysqli_query($conn, $query)) ) {
           				     echo("Error: %s\n"+ mysqli_error($conn));
            				 exit(1);
            			   }
              				while($row = mysqli_fetch_assoc($result)) {
                				echo("<br><tr><td><i class=\"material-icons\">email</i></td><td>Email &nbsp</td>  <span contentEditable='false' class='facts-text '> <td id=\"email\"> " . $row['cEmail'] . "</td></tr>");
                				echo("<tr><td><i class=\"material-icons\">phone</i></td><td>Phone &nbsp</td>  <span contentEditable='false' class='facts-text '> <td id=\"tel\">" . $row['cPhoneNumber'] . "</td></tr>");
              				}
            			?>
        			</table>
				</p>
			</div>
		</div>
	</div>

<?php mysqli_close($conn); ?>			


</body>
</html>
