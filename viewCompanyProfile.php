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
<link rel="stylesheet" type="text/css" href="viewProfile.css">


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
					<li><a href="profile.html">Profile</a></li>
					<li><a href="search.html">Search</a></li>
					<li><a href="postAd.html">Post Ad</a></li>
						<li><a href="about.html">About Us</a></li>
					<li><a href="contact.html">Contact Us</a></li>

				</ul>
			</div>
		</div>
	</nav>
	<!--- for the profile backimage -->

	<div class = "container-fluid" id = "top-background">
		<div id = "title-text">
      <?php #query to get user information#
   				$query = "SELECT cName FROM company WHERE compID = 1 ";
   				if ( ! ( $result = mysqli_query($conn, $query)) ) {
   					echo("Error: %s\n"+ mysqli_error($conn));
   					exit(1);
   				}
   				$row = mysqli_fetch_assoc($result);
   				echo($row['cName']);
   			?>

    </div>
	</div>
	<img src="img/puppies.jpg" class="img-fluid" alt="Responsive image" id = "profile-image">


	<div class="container-fluid">

		<div class="row">

			<!--first row-->
		  	<div class="col-sm-4 col-sm-offset-2 left-box left-box" id = "about-box">
		  		<button onclick="editAbout(this);" class="edit-icon">
		  			<span class="glyphicon glyphicon-pencil "></span>
		  		</button> <br>
				<p class = "sub-heading" > About Company </p> <br>
				<p id="about-text" contentEditable="false">
          <?php #query to get user information#
       				$query = "SELECT cDescription FROM company WHERE compID = 1 ";
       				if ( ! ( $result = mysqli_query($conn, $query)) ) {
       					echo("Error: %s\n"+ mysqli_error($conn));
       					exit(1);
       				}
       				$row = mysqli_fetch_assoc($result);
       				echo($row['cDescription']);
       			?>
				</p>
				<script>

			  	function editAbout(button) {
			    	var text = document.getElementById("about-text");
			    	var box = document.getElementById("about-box");
				    if (text.contentEditable == "true") {
				        text.contentEditable = "false";
				       	box.style.backgroundColor="#e8e9ea";
				       	 box.style.border = "none";

				    } else {
				        text.contentEditable = "true";
				        box.style.backgroundColor ="#f2f2f2";
				        box.style.border = "2px dashed #cecece";

				    }
				}
		  		</script>
			</div>



		  	<div class="col-sm-4  col-sm-offset-1 right-box top-box" id = "quick-facts-box">
				<button onclick="editFacts(this);" class="edit-icon">
		  			<span class="glyphicon glyphicon-pencil "></span>
		  		</button> <br>
				<p class = "sub-heading" > Quick Facts </p> <br>

        <table style="width:60%" id = "quick-facts-table">


          <p id="facts-text" contentEditable="false">
            <?php #query to get user information#
                $query = "SELECT Founder, Location, Focus FROM company WHERE compID = 1";
                if ( ! ( $result = mysqli_query($conn, $query)) ) {
                  echo("Error: %s\n"+ mysqli_error($conn));
                  exit(1);
                }
                while($row = mysqli_fetch_assoc($result)) {
                echo("<tr><td><i class=\"material-icons\">location_city</i></td><td>Location</td>  <span contentEditable='false' class='facts-text '> <td>" . $row['Location'] . "</td></tr>");
                echo("<tr><td><i class=\"material-icons\">person</i></td><td>Founder</td>  <span contentEditable='false' class='facts-text '> <td>" . $row['Founder'] . "</td></tr>");
                echo("<tr><td><i class=\"material-icons\">star</i></td><td>Focus</td>  <span contentEditable='false' class='facts-text '> <td>" . $row['Focus'] . "</td></tr>");
              }
              ?>

          </p>

      </table>

				<script>

			  	function editFacts(button) {
			    	var text = document.getElementById("facts-text");
			    	var box = document.getElementById("quick-facts-box");
				    if (text.contentEditable == "true") {
				        text.contentEditable = "false";
				       	box.style.backgroundColor="#e8e9ea";
				       	 box.style.border = "none";

				    } else {
				        text.contentEditable = "true";
				        box.style.backgroundColor ="#f2f2f2";
				        box.style.border = "2px dashed #cecece";

				    }
				}
		  		</script>

			</div>


			<!--second row-->
		  	<div class="col-sm-4 col-sm-offset-2 left-box " id = "skills-box">
		  		<button onclick="editSkills(this);" class="edit-icon">
		  			<span class="glyphicon glyphicon-pencil "></span>
		  		</button> <br>
				<p class = "sub-heading" > Things We Do </p> <br>
				<p id="skills-text" contentEditable="false">

				</p>

				<script>

			  	function editSkills(button) {
			    	var text = document.getElementById("skills-text");
			    	var box = document.getElementById("skills-box");
				    if (text.contentEditable == "true") {
				        text.contentEditable = "false";
				       	box.style.backgroundColor="#e8e9ea";
				       	 box.style.border = "none";

				    } else {
				        text.contentEditable = "true";
				        box.style.backgroundColor ="#f2f2f2";
				        box.style.border = "2px dashed #cecece";

				    }
				}
		  		</script>

			</div>


		  	<div class="col-sm-4  col-sm-offset-1 right-box " id = "projects-box">
		  		<button onclick="editProjects(this);" class="edit-icon">
		  			<span class="glyphicon glyphicon-pencil "></span>
		  		</button> <br>
				<p class = "sub-heading" > Contact Us  </p>

        <p id="projects-text" contentEditable="false">
        <table style="width:60%" id = "quick-facts-table">
          <?php #query to get user information#
              $query = "SELECT cEmail, cPhoneNumber FROM company WHERE compID = 1;";
              if ( ! ( $result = mysqli_query($conn, $query)) ) {
                echo("Error: %s\n"+ mysqli_error($conn));
                exit(1);
              }
              while($row = mysqli_fetch_assoc($result)) {
                echo("<br><tr><td><i class=\"material-icons\">email</i></td><td>Email</td>  <span contentEditable='false' class='facts-text '> <td>" . $row['cEmail'] . "</td></tr>");
                echo("<tr><td><i class=\"material-icons\">phone</i></td><td>Phone</td>  <span contentEditable='false' class='facts-text '> <td>" . $row['cPhoneNumber'] . "</td></tr>");

              }
            ?>
        </table>
				</p>

				<script>

			  	function editProjects(button) {
			    	var text = document.getElementById("projects-text");
			    	var box = document.getElementById("projects-box");
				    if (text.contentEditable == "true") {
				        text.contentEditable = "false";
				       	box.style.backgroundColor="#e8e9ea";
				       	 box.style.border = "none";

				    } else {
				        text.contentEditable = "true";
				        box.style.backgroundColor ="#f2f2f2";
				        box.style.border = "2px dashed #cecece";

				    }
				}
		  		</script>
			</div>

			<!-- 3rd row -->

			<div class="col-sm-9 col-sm-offset-2 left-box " id = "awards-box">
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
              $query = "SELECT title,post_date,aDescription FROM advert WHERE compID = 1;";
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

				    } else {
				        text.contentEditable = "true";
				        box.style.backgroundColor ="#f2f2f2";
				        box.style.border = "2px dashed #cecece";

				    }
				}
		  		</script>

			</div>

			<!-- fourth row -->
			<div class="col-sm-9  col-sm-offset-2 left-box " id = "social-media">
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

				    } else {
				        text.contentEditable = "true";
				        box.style.backgroundColor ="#f2f2f2";
				        box.style.border = "2px dashed #cecece";

				    }
				}
		  		</script>

			</div>

		</div>




	</div>


</body>
</html>
