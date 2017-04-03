<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Company</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="viewCompanyProfile.css">
  <script src="viewCompanyProfile.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>



</head>
<?php include "connectDB.php"?>
<body>
	<!--- navbar code -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="navbar-header">
			<a id="navLogo" class="navbar-brand" href="index.html">
		    		<img  src="img/Icon-title.png" class="d-inline-block align-top" alt="" style="width: 10%; margin:0;">
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
					<li><a href="viewCompanyProfile.php">Profile</a></li>
					<li><a href="search.php">Search</a></li>
					<li><a href="postAd.php">Post Ad</a></li>
					<li><a href="about.php">About Us</a></li>
					<li><a href="contact.php">Contact Us</a></li>

					<li><a id="logout" onclick="logout()" >Logout</a></li>

				</ul>
			</div>
		</div>
	</nav>
	<!---for the profile backimage-->
	<div class = "container-fluid" id = "top-background">
		<div id = "title-text">
      <?php #query to get user information#
   				$query = "SELECT cName FROM company WHERE compID = 6 ";
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
		  	<div class="col-lg-4 col-lg-offset-2 left-box left-box" id = "about-box">

          <button onclick="editAbout(this);" class="edit-icon">
		  			<span class="glyphicon glyphicon-pencil " ></span>
		  		</button>
          <button onclick="save('about-text');" class="save-icon">
            <span class="glyphicon glyphicon-floppy-saved" id = "save-about-text"></span>
		  		</button>
          <br>
				<p class = "sub-heading" > About Company </p> <br>
				<p id="about-text" contentEditable="false">
          <?php #query to get user information#
       				$query = "SELECT cDescription FROM company WHERE compID = 6 ";
       				if ( ! ( $result = mysqli_query($conn, $query)) ) {
       					echo("Error: %s\n"+ mysqli_error($conn));
       					exit(1);
       				}
       				$row = mysqli_fetch_assoc($result);
       				echo($row['cDescription']);
       			?>
				</p>

			</div>



		  	<div class="col-lg-4  col-lg-offset-1 right-box top-box" id = "quick-facts-box">
				<button onclick="editFacts(this);" class="edit-icon">
		  			<span class="glyphicon glyphicon-pencil "></span>
		  	</button>
        <button onclick="save('quick-facts-table');" class="save-icon">
          <span class="glyphicon glyphicon-floppy-saved" id = "save-quick-facts-text"></span>
        </button>

        <br>

				<p class = "sub-heading" > Quick Facts </p> <br>

        <table style="width:60%" id = "quick-facts-table">


          <p id="facts-text" contentEditable="false">
            <?php #query to get user information#
                $query = "SELECT Founder, Location, Focus FROM company WHERE compID = 6";
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


			<!--second row-->
		  	<div class="col-lg-4 col-lg-offset-2 left-box " id = "skills-box">
		  		<button onclick="editSkills(this);" class="edit-icon">
		  			<span class="glyphicon glyphicon-pencil "></span>
		  		</button>
          <button onclick="save('skills-text');" class="save-icon">
            <span class="glyphicon glyphicon-floppy-saved" id = "save-skills-text"></span>
          </button>
          <br>
				<p class = "sub-heading" > What We're Proud Of </p> <br>
				<p id="skills-text" contentEditable="false">
          <?php #query to get user information#
              $query = "SELECT companycol FROM company WHERE compID = 6 ";
              if ( ! ( $result = mysqli_query($conn, $query)) ) {
                echo("Error: %s\n"+ mysqli_error($conn));
                exit(1);
              }
              $row = mysqli_fetch_assoc($result);
              echo($row['companycol']);
            ?>
				</p>

			</div>


		  	<div class="col-lg-4  col-lg-offset-1 right-box " id = "projects-box">
		  		<button onclick="editContact(this);" class="edit-icon">
		  			<span class="glyphicon glyphicon-pencil "></span>
		  		</button>
          <button onclick="save('contact-box');" class="save-icon">
            <span class="glyphicon glyphicon-floppy-saved" id = "save-contact-us-text"></span>
          </button>
          <br>
				<p class = "sub-heading" > Contact Us  </p>

        <p id="projects-text" contentEditable="false">
        <table style="width:60%" id = "quick-facts-table">
          <?php #query to get user information#
              $query = "SELECT cEmail, cPhoneNumber FROM company WHERE compID = 6;";
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

			<!-- 3rd row -->

			<div class="col-lg-9 col-lg-offset-2 left-box " id = "awards-box">
				<button onclick="editAwards(this);" class="edit-icon">
		  			<span class="glyphicon glyphicon-pencil "></span>
		  	</button> <br>
				<p class = "sub-heading" > Volunteers Needed </p>

        <table style="width:80%" id = "volunteers-table" class="table table-hover">
        <thead>
          <tr>
            <th>Position</th>
            <th>Description</th>

          </tr>
        </thead>
				<p id="awards-text" contentEditable="false">
          <?php #query to get user information#
              $query = "SELECT title,post_date,aDescription FROM advert WHERE compID = 6;";
              if ( ! ( $result = mysqli_query($conn, $query)) ) {
                echo("Error: %s\n"+ mysqli_error($conn));
                exit(1);
              }
              while($row = mysqli_fetch_assoc($result) ) {
                echo("<tr> <span contentEditable='false' class='facts-text '> <td>" . $row['title'] . "</td>");
                echo("<td>" . $row['aDescription'] . "</td></tr></span>");
              }
            ?>
				</p>
      </table>
      </center>

				<script>
			  	function editAwards(button) {
			    	var text = document.getElementById("awards-text");
			    	var box = document.getElementById("awards-box");
				    if (text.contentEditable == "true") {
				        text.contentEditable = "false";
				       	box.style.backgroundColor="#e8e9ea";
				       	 box.style.border = "none";
                 $(button).find(".glyphicon").removeClass("glyphicon-remove").addClass("glyphicon-pencil");
				    } else {
				        text.contentEditable = "true";
				        box.style.backgroundColor ="#f2f2f2";
				        box.style.border = "2px dashed #cecece";
                $(button).find(".glyphicon").removeClass("glyphicon-pencil").addClass("glyphicon-remove");
				    }
				}
		  		</script>

			</div>

			<!-- fourth row -->
			<div class="col-lg-9  col-lg-offset-2 left-box " id = "social-media">
				<button onclick="editSocial(this);" class="edit-icon">
		  			<span class="glyphicon glyphicon-pencil "></span>
		  		</button> <br>
				<p class = "sub-heading" > Social Media </p>
				<p id="social-media-text" contentEditable="false">
        <center>
          <a href = "https://www.linkedin.com">
            <i class="fa fa-linkedin-square" style="font-size:48px;color:rgb(0, 119, 181)"></i>
          </a> &nbsp &nbsp
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

				<script>
			  	function editSocial(button) {
			    	var text = document.getElementById("social-media-text");
			    	var box = document.getElementById("social-media");
				    if (text.contentEditable == "true") {
				        text.contentEditable = "false";
				       	box.style.backgroundColor="#e8e9ea";
				       	 box.style.border = "none";
                 $(button).find(".glyphicon").removeClass("glyphicon-remove").addClass("glyphicon-pencil");
				    } else {
				        text.contentEditable = "true";
				        box.style.backgroundColor ="#f2f2f2";
				        box.style.border = "2px dashed #cecece";
                $(button).find(".glyphicon").removeClass("glyphicon-pencil").addClass("glyphicon-remove");
				    }
				}
		  		</script>

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
