<?php 
session_start();	
$userID = $_SESSION['ID'];
if (strcmp($_SESSION['profileType'], "dev")==0) {
	header('Location: viewProfile.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equix="X-UA-Compatible" content="IE=edge">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	  <script src="viewCompanyProfile.js"></script>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="viewCompanyProfile2.css">
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
         				<li><a href="viewCompanyProfile2.php">Profile</a></li>
         				<li><a href="search.php">Search</a></li>
         				<li><a href="contact.php">Contact Us</a></li>
         				<li><a id="logout" onclick="logout()" >Logout</a></li>
         			</ul>
      			</div>
    		</div>
    	</nav>
    	
    	<!--Modal for successful profile update-->
    	<div id="successModal" class="modal fade" role="dialog">
 			 <div class="modal-dialog">
   			 	<!-- Modal content-->
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
        				<h4 class="modal-title">Success</h4>
      				</div>
      				<div class="modal-body">
        				<p>Profile updated. Refresh to see the changes.</p>
      				</div>
      				<div class="modal-footer">
        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      				</div>
    			</div>
  			</div>
		</div>
		
		<!--Modal for failed profile update-->
    	<div id="failModal" class="modal fade" role="dialog">
 			 <div class="modal-dialog">
   			 	<!-- Modal content-->
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
        				<h4 class="modal-title">Error</h4>
      				</div>
      				<div class="modal-body">
        				<p>Profile failed to update. Please contact an administrator.</p>
      				</div>
      				<div class="modal-footer">
        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      				</div>
    			</div>
  			</div>
		</div>
		
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
				<img id ="profile-pic" class="img-circle img-responsive" alt="Please upload profile picture."  onclick="editImage(this);" onError="imgError(this)" src ="img/jessica.jpg">
				<button class="btn" type="button" id="postAd" onclick="postAd()">
					Post Ad
				</button>
				<script>
					function postAd() {
						window.location.href = 'postAd.php';
					}
				</script>
			</div>
		</div>
		<div class="row" id="bg2">
			<div class="section" id="s2">About
		  		<button onclick="editAbout(this);" class="btn ourButton" type="button">
		  			<span class="glyphicon glyphicon-pencil " ></span>
		  		</button>
          		<button onclick="save('about-text');" class="save-icon btn" type="button">
            		<span class="glyphicon glyphicon-floppy-saved" id = "save-about-text"></span>
		  		</button>
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
		  		<button onclick="editFacts(this);" class="btn ourButton" type="button">
		  			<span class="glyphicon glyphicon-pencil "></span>
		  		</button>
       	 		<button onclick="save('quick-facts-table');" class="save-icon btn" type="button">
          			<span class="glyphicon glyphicon-floppy-saved" id = "save-quick-facts-text"></span>
        		</button>
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
				<button onclick="editProud(this);" class="btn ourButton" type="button">
		  			<span class="glyphicon glyphicon-pencil "></span>
		  		</button>
          		<button onclick="save('proud-text');" class="save-icon btn" type="button">
            		<span class="glyphicon glyphicon-floppy-saved" id = "save-proud-text"></span>
          		</button>
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
				<button onclick="editAwards(this);" class="btn ourButton" type="button">
		  			<span class="glyphicon glyphicon-pencil "></span>
		  		</button>
		  		<button onclick="save('volunteers-box');" class="save-icon btn" type="button">
            		<span class="glyphicon glyphicon-floppy-saved" id = "save-volunteers"></span>
          		</button>
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
      			<script>
			  	function editAwards(button) {
			    	var text = document.getElementById("awards-text");
			    	var box = document.getElementById("volunteers");
			    	var save = document.getElementById('save-volunteers').parentElement;
			    	var adStatus = document.getElementsByClassName("adStatus");
				    if (text.contentEditable == "true") {
				    	save.style.display ="none";
				        text.contentEditable = "false";
				       	box.style.backgroundColor="white";
				       	box.style.border = "none";
                 		$(button).find(".glyphicon").removeClass("glyphicon-remove").addClass("glyphicon-pencil");
                 		var theLink = document.getElementsByClassName("pickStatus");
             			var selected=[];
		       	 
		       			for (var i=0; i<theLink.length; i++) {
		       				selected.push(theLink[i].options[theLink[i].selectedIndex].text);
		       			}
		       			for (var i =0; i<adStatus.length; i++) {
			       			adStatus[i].innerHTML = selected[i];
		       			}
				    } else { //editing view
				    	save.style.display ="inline";
				        text.contentEditable = "true";
				        box.style.backgroundColor ="#f2f2f2";
				        box.style.border = "2px dashed #cecece";
                		$(button).find(".glyphicon").removeClass("glyphicon-pencil").addClass("glyphicon-remove");
                		var tempName ="";
                		for (var i=0; i<adStatus.length; i++) {
                    		tempName = adStatus[i].innerHTML;
                    		adStatus[i].innerHTML = "<select class='pickStatus'>\
													<option value='looking'>Looking for developer</option>\
													<option value='progress'>In progress</option>\
													<option value='complete'>Completed</option>\
                        							</select>";
                        	var o = adStatus[i].getElementsByTagName('option');
                        	for (var j=0; j<o.length; j++) {
                        		if (o[j].innerHTML == tempName) {
                        			o[j].selected = "selected";
                        		}
                        	}
                    		
                		}
                		
				    }
				}
		  		</script>
			</div>
		</div>
		
		<div class="row" id="bg6">
			<div class="section" id="s6">Social Media
		  		
		  	</div>
			<div class="bg" id="social-media">
				
			</div>
		</div>
		
		<div class="row" id="bg7">
			<div class="section" id="s7">Contact Us
		  		<button onclick="editContact(this);" class="btn ourButton" type="button">
		  			<span class="glyphicon glyphicon-pencil "></span>
		  		</button>
          		<button onclick="save('contact-box');" class="save-icon btn" type="button">
            		<span class="glyphicon glyphicon-floppy-saved" id = "save-contact-us-text"></span>
          		</button>
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