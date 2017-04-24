<?php 
/*session_start();	
if ($_SESSION['profileType'] == null) {
	header('Location: index.php');
}
$userID = $_SESSION['ID'];
if (strcmp($_SESSION['profileType'], "comp")==0) {
	header('Location: viewCompanyProfile.php');
}*/
$userID = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equix="X-UA-Compatible" content="IE=edge">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="hello.all.js"></script>
	
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="viewProfile.css">
	
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
   				$query = "SELECT firstName, lastName FROM user WHERE userID = " . $userID;
   				if ( ! ( $result = mysqli_query($conn, $query)) ) {
   					echo("Error: %s\n"+ mysqli_error($conn));
   					exit(1);
   				} 
   				$row = mysqli_fetch_assoc($result);
   				echo($row['firstName'] . " " . $row['lastName']);
   				?>
				<img id ="profile-pic" class="img-circle img-responsive" alt="Please upload profile picture."  onclick="editImage(this);" onError="imgError(this)" data-toggle="tooltip" title="Click to change picture" src ="<?php #query to get user information#
			$query = "SELECT imageURL FROM ImageTableDeveloper WHERE devID = " .$userID;
			if ( ! ( $result = mysqli_query($conn, $query)) ) {
			  echo("Error: %s\n"+ mysqli_error($conn));
			  exit(1);
			}
			$row = mysqli_fetch_assoc($result);
			echo($row['imageURL']);

		      ?> ">
			<script>
		    function editImage(Image) {
		      var url = prompt("Please provide a url to insert a profile picture!", 'Enter link here');
		      if(url==null)
			      return;
		      Image.src = url;    
		      console.log(url);
		      save("profile-pic");
		    }

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
		  		<button type="button" onclick="editAbout(this);" class="btn ourButton"> 
		  			<span class="glyphicon glyphicon-pencil "></span> 
		  		</button>
		  		<button class="btn ourButtonSave" onclick="update('about-text')"> 
		  			<span id='save-about-text' class="glyphicon glyphicon-floppy-disk""></span> 
		  		</button>
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
				<script>
				function editAbout(button) {
					var text = document.getElementById("about-text");
					var box = document.getElementById("about-box");
					var save = document.getElementById('save-about-text').parentElement;
					
				    if (text.contentEditable == "true") {
				        text.contentEditable = "false";
				       	box.style.backgroundColor="white";
				       	 box.style.border = "none";
				       	 save.style.display = 'none';
				       
				    } else {
				        text.contentEditable = "true";
				        box.style.backgroundColor ="#f2f2f2";
				        box.style.border = "2px dashed #cecece";
				        save.style.display = 'inline';
				    }
				}
				</script>
			</div>
		</div>
		<div class="row" id="bg3">
			<div class="section" id="s2">Quick Facts
		  		<button type="button" onclick="editFacts(this);" class="btn ourButton"> 
		  			<span class="glyphicon glyphicon-pencil "></span> 
		  		</button>
		  		<button type="button" onclick="update('quick-facts')" class="btn ourButtonSave"> 
		  			<span id='save-quick-facts' class="glyphicon glyphicon-floppy-disk""></span> 
		  		</button>
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
				<script>
			  	function editFacts(button) {
			    	var text = document.getElementById("myPhone");
			    	var age = document.getElementById("myAge");
			    	var box = document.getElementById("quick-facts-box");
			    	var save = document.getElementById('save-quick-facts').parentElement;
				    if (text.contentEditable == "true") {
				        text.contentEditable = "false";
				        var s = document.getElementById('age');
				        age.innerHTML = s.options[s.selectedIndex].value;
				        save.style.display="none";
				       	box.style.backgroundColor="white";
				       	box.style.border = "none";
				       
				    } else {
				        text.contentEditable = "true";
				        box.style.backgroundColor ="#f2f2f2";
				        box.style.border = "2px dashed #cecece";
				        save.style.display="inline";
				        var temp = age.innerHTML;
				        age.innerHTML = "<select id='age' name='age'></selected>";
				        for (var i = 1; i<=100; i++) {
					        if (i==temp) {
					        	$("#age").append("<option value='"+i+"' selected>"+i+"</option>");
					        } else {   
					        	$("#age").append("<option value='"+i+"'>"+i+"</option>");
					        }
				        }
				    }
				}
		  		</script>
			</div>
		</div>
		<div class="row" id="bg4">
			<div class="section" id="s3">Skills
				<button type="button" onclick="editSkills(this);" class="btn ourButton"> 
		  			<span class="glyphicon glyphicon-pencil "></span> 
		  		</button>
		  		<button  type="button" onclick="update('skills-facts')" class="btn ourButtonSave"> 
		  			<span id='save-skills-facts' class="glyphicon glyphicon-floppy-disk""></span> 
		  		</button>
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
									"</td><td><span class='glyphicon glyphicon-remove' onclick='removeSkill(this)'></span></tr>");
						}

						?>
												
						<button type="button" id="add-skill" class="btn btn-info addMe" onclick="addSkill()"><span class="glyphicon glyphicon-plus"></span></button>
						</tbody>
					</table>
				</div>
				<script>
			  	function editSkills(button) {
			    	var box = document.getElementById("skills-box");
			    	var temp = document.getElementById('temp');
			    	var save = document.getElementById('save-skills-facts').parentElement;
			    	var add = document.getElementById('add-skill');
			    	var s = document.getElementsByClassName('skills-text-name');
			    	var y = document.getElementsByClassName('skills-text-yrs');
			    	var t = document.getElementsByClassName('skills-text');
				    if (temp.contentEditable == "true") { //CLOSE EDITING VIEW
				    	temp.contentEditable = "false";
				       	box.style.backgroundColor="white";
				       	box.style.border = "none";
				       	save.style.display = "none";
				       	add.style.display = "none";
				       	for (var i=0; i<t.length; i++) {	//for the website box
					       	t[i].contentEditable = "false";
				       	}
				       	var rowCount = $('#skill-table tr').length;
				       	var selectName = document.getElementsByClassName('pickSkill');
				       	var selectYear = document.getElementsByClassName('pickYear'); 
				       	var theNames = []; 
				       	var theYears = [];
						if (rowCount > 1) {			//only turn text non-editable when there are rows of data
							for (var i=0; i<t.length; i++) {
								t[i].contentEditable = "false";
							}
							for (var i=0; i<selectName.length; i++) {
								var theName = selectName[i].options[selectName[i].selectedIndex].text;
								theNames.push(theName);
								var theYear = selectYear[i].value;
								theYears.push(theYear);
							}
							for (var i =0; i<s.length; i++) {
								s[i].innerHTML = theNames[i];
								y[i].innerHTML = theYears[i];
							}
							
						}				       		
				    } else {  //START EDITING
				    	temp.contentEditable = "true";
						box.style.backgroundColor ="#f2f2f2";
				        box.style.border = "2px dashed #cecece";
				    	save.style.display = "inline";
				    	add.style.display = "block";
				    	for (var i=0; i<t.length; i++) { //for the website box
					       	t[i].contentEditable = "true";
				       	}
				    	var tempName = "";
				    	var tempYr = "";
				    	for (var i=0; i<s.length; i++) {
					    	tempName = s[i].innerHTML;
					    	s[i].innerHTML="<select class='pickSkill'>\
					    		<option value='web'>Website/Web application</option>\
			    				<option value='android'>Mobile - android application</option>\
			    				<option value='ios'>Mobile - iOS application</option>\
			    				<option value='social'>Social Media</option>\
			    				<option value='game'>Game development</option>\
			    				<option value='graphic'>Graphic Design</option>\
			    				<option value='support'>IT Support</option>\
			    				<option value='html'>HTML</option>\
			    				<option value='sql'>SQL</option>\
			    				<option value='java'>Java</option>\
			    				<option value='python'>Python</option>\
			    				<option value='php'>PHP</option>\
			    				<option value='swift'>Swift</option></select>";
		    				var o = s[i].getElementsByTagName('option');
		    				for (var j=0; j<o.length; j++) {
			    				if (o[j].innerHTML == tempName) {
				    				o[j].selected = "selected";
			    				}
		    				}
				    	}
				    	for (var i=0; i<s.length; i++) {
					    	tempYr = y[i].innerHTML;
					    	y[i].innerHTML="<input type='number' min='1' max='100' value='"+tempYr+"' class='pickYear'>";
				    	}
				    }
				}
		  		</script>
			</div>
		</div>
		
		<div class="row" id="bg5">
			<div class="section" id="s3">Social Media
		  		<button onclick="editSocial(this);" class="btn ourButton">
            		<span class="glyphicon glyphicon-pencil "></span>
        		</button>
        		<button onclick="update1('links-facts')" class="ourButtonSave btn">
            		<span id="save-links" class="glyphicon glyphicon-floppy-disk"></span>
        		</button>
		  	</div>
			<div class="bg" id="social-media">
				<p id="links-text" contentEditable="false">
        <div class="table-responsive">
          <table class="table table-striped" id="link-table">
            <thead>
              <tr>
                <th>Name</th>
                <th>URL</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>LinkedIn</td>
                <td id="linkedinurl" class = "social-links" contentEditable="false">
                  <?php
                  $query = "SELECT linkedIn FROM links WHERE id = " . $userID;
                  if ( ! ( $result = mysqli_query($conn, $query)) ) {
                    echo("Error: %s\n"+ mysqli_error($conn));
                    exit(1);
                  }
                  $row = mysqli_fetch_assoc($result);
                  echo($row['linkedIn']);
                  ?>
                </td>

              </tr>
              <tr>
                <td>Google Plus</td>
                <td id="googleurl" class = "social-links" contentEditable="false">
                  <?php
                  $query = "SELECT googlePlus FROM links WHERE id = " . $userID;
                  if ( ! ( $result = mysqli_query($conn, $query)) ) {
                    echo("Error: %s\n"+ mysqli_error($conn));
                    exit(1);
                  }
                  $row = mysqli_fetch_assoc($result);
                  echo($row['googlePlus']);
                  ?>
                </td>
              </tr>
              <tr>
                <td>Github</td>
                <td id="githuburl" class = "social-links" contentEditable="false">
                  <?php
                  $query = "SELECT github FROM links WHERE id = " . $userID;
                  if ( ! ( $result = mysqli_query($conn, $query)) ) {
                    echo("Error: %s\n"+ mysqli_error($conn));
                    exit(1);
                  }
                  $row = mysqli_fetch_assoc($result);
                  echo($row['github']);
                  ?>
                </td>
              </tr>
              <tr>
                <td>Facebook</td>
                <td id="fburl" class = "social-links" contentEditable="false">
                  <?php
                  $query = "SELECT facebook FROM links WHERE id = " . $userID;
                  if ( ! ( $result = mysqli_query($conn, $query)) ) {
                    echo("Error: %s\n"+ mysqli_error($conn));
                    exit(1);
                  }
                  $row = mysqli_fetch_assoc($result);
                  echo($row['facebook']);
                  ?>
                </td>
              </tr>
              <tr>
                <td>Instagram</td>
                <td id="instaurl" class = "social-links" contentEditable="false">
                  <?php
                  $query = "SELECT insta FROM links WHERE id = " . $userID;
                  if ( ! ( $result = mysqli_query($conn, $query)) ) {
                    echo("Error: %s\n"+ mysqli_error($conn));
                    exit(1);
                  }
                  $row = mysqli_fetch_assoc($result);
                  echo($row['insta']);
                  ?>
                </td>
              </tr>
              <tr>
                <td>Twitter</td>
                <td id="twitterurl" class = "social-links" contentEditable="false">
                  <?php
                  $query = "SELECT twitter FROM links WHERE id = " . $userID;
                  if ( ! ( $result = mysqli_query($conn, $query)) ) {
                    echo("Error: %s\n"+ mysqli_error($conn));
                    exit(1);
                  }
                  $row = mysqli_fetch_assoc($result);
                  echo($row['twitter']);
                  ?>
                </td>
              </tr>
              <tr>
                <td>PayPal</td>
                <td id="paypalurl" class = "social-links" contentEditable="false">
                  <?php
                  $query = "SELECT paypal FROM links WHERE id = " . $userID;
                  if ( ! ( $result = mysqli_query($conn, $query)) ) {
                    echo("Error: %s\n"+ mysqli_error($conn));
                    exit(1);
                  }
                  $row = mysqli_fetch_assoc($result);
                  echo($row['paypal']);
                  ?>
                </td>
              </tr>
              <tr>
                <td>Personal Website</td>
                <td id="websiteurl" class = "social-links" contentEditable="false">
                  <?php
                  $query = "SELECT website FROM links WHERE id = " . $userID;
                  if ( ! ( $result = mysqli_query($conn, $query)) ) {
                    echo("Error: %s\n"+ mysqli_error($conn));
                    exit(1);
                  }
                  $row = mysqli_fetch_assoc($result);
                  echo($row['website']);
                  ?>
                </td>
              </tr>
            </tbody>
          </table>
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
        </p>
			  	
			</div>
			<script>
          function editSocial(button) {
            var text = document.getElementById("link-table");

            var links = document.getElementsByClassName('social-links');
            var linkedinurl = document.getElementById("linkedinurl");
            var googleurl = document.getElementById("googleurl");

            var box = document.getElementById("social-media");
            var save = document.getElementById('save-links').parentElement;
            var linkedinicon = document.getElementById('linkedinicon');

            if (linkedinurl.contentEditable == "true") {
                for (var i=0; i < links.length; i++) {
                  links.item(i).contentEditable = "false";
                }
                text.style.display="none";
                box.style.backgroundColor="white";
                box.style.border = "none";
                save.style.display = "none";
                $(button).find(".glyphicon").removeClass("glyphicon-remove").addClass("glyphicon-pencil");
            } else {
                for (var i=0; i < links.length; i++) {
                  links.item(i).contentEditable = "true";
                }
                text.style.display="inline-block";
                box.style.backgroundColor ="#f2f2f2";
                box.style.border = "2px dashed #cecece";
                save.style.display = "inline";
                $(button).find(".glyphicon").removeClass("glyphicon-pencil").addClass("glyphicon-remove");
            }

            for (var i=0; i < links.length; i++) {
              if (linkedinurl == null) {
                linkedinicon.style.display = "none";
              }
            }
        }

        function update1(id) {
          console.log("in update function");
          var table = document.getElementById('link-table');
          //table.style.display = 'none';
          f = 'change-social';
          var links = [];
          var linktext = document.getElementsByClassName('social-links');

          var temp="";
          for (var i = 0; i < linktext.length; i++) {
            temp = linktext[i].innerHTML;
            links.push(temp);
          }
          console.log('links');
          console.log(links);
          $.ajax({
                url: 'ajax.php',
                data: {func: f, textUpdate: links},
                type: 'post',
                dataType: "html",
                success: function(result) {
                  console.log("yay");
                  $('#successModal').modal('show');

                },
                error: function(result) {
                  console.log(result);
		  $('#failModal').modal('show');

                }
            });
          }

        </script>
		</div>
		</div>

<?php mysqli_close($conn); ?>			

<script>
	function addSkill() {
		var table = document.getElementById('skill-table');
		var row = table.insertRow(-1);
		row.className = "skillz";
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);
		var att = document.createAttribute("contentEditable");
		att.value=true;
		cell3.setAttributeNode(att);
		cell1.className = "skills-text-name";
		cell2.className = "skills-text-yrs";
		cell3.className = "skills-text";
		cell1.innerHTML = "<select class='pickSkill'>\
    		<option value='web'>Website/Web application</option>\
			<option value='android'>Mobile - android application</option>\
			<option value='ios'>Mobile - iOS application</option>\
			<option value='social'>Social Media</option>\
			<option value='game'>Game development</option>\
			<option value='graphic'>Graphic Design</option>\
			<option value='support'>IT Support</option>\
			<option value='html'>HTML</option>\
			<option value='sql'>SQL</option>\
			<option value='java'>Java</option>\
			<option value='python'>Python</option>\
			<option value='php'>PHP</option>\
			<option value='swift'>Swift</option></select>";
			
		cell2.innerHTML = "<input type='number' min='1' max='100' value='1' class='pickYear'>";
		cell3.innerHTML = "sample website";
		cell4.innerHTML = "<span class='glyphicon glyphicon-remove' onclick='removeSkill(this)'></span>";
	}
	function removeSkill(skill) {
		var j = skill.parentNode.parentNode.rowIndex;
	    document.getElementById("skill-table").deleteRow(j);
		
	}
	function addLink() {
		var table = document.getElementById('link-table');
		var row = table.insertRow(-1);
		row.className = "linkz";
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		cell1.className = "link-text";
		cell2.className = "link-url";
		var att = document.createAttribute("contentEditable");
		att.value=true;
		cell2.setAttributeNode(att);
		cell1.innerHTML = "<select class='pickLink'>\
    		<option value='github'>GitHub</option>\
    		<option value='linkedin'>LinkedIn</option>\
    		<option value='google'>Google</option>\
    		<option value='twitter'>Twitter</option>\
    		<option value='website'>Personal Website</option>\
    		<option value='instagram'>Instagram</option>\
    		<option value='project'>Project Link</option></select>";
		
		cell2.innerHTML = "URL";
		cell3.innerHTML = "<span class='glyphicon glyphicon-remove' onclick='removeLink(this)'></span>";
	}
	function removeLink(link) {
		var j = link.parentNode.parentNode.rowIndex;
	    document.getElementById("link-table").deleteRow(j);
	}
	
	function update(id) {
		var box = document.getElementById(id);
		var text="";
		var func = "";
		var years="";
		var urls="";
		var size=0;		
		var user=document.getElementById('currentUser').innerHTML;	
		switch(id) {
			case 'about-text':
				f = 'about';
				text = box.innerHTML;
				console.log(text);
				break;
			case 'quick-facts':
				f = 'facts';
				var text = [];
				var age = document.getElementById('age');
				var phone = document.getElementById('myPhone');
				text = [age.value, phone.innerHTML];
				break;
			case 'skills-facts':
				var skillz = document.getElementsByClassName('pickSkill');
				f = 'skills';
				text = []; years = []; urls=[];
				var yrs = document.getElementsByClassName('pickYear');
				var links = document.getElementsByClassName('skills-text');
				for (var i=0; i<skillz.length; i++) {
					text.push(skillz[i].options[skillz[i].selectedIndex].text);
					years.push(yrs[i].value);
					
					if (links[i].innerHTML == "") {
						urls.push("no website available");
					} else {
						urls.push(links[i].innerHTML);
					}	
				}
				size = text.length;
				
				break;
			/*case 'links-facts':
				f = 'links';
				var linkName = document.getElementsByClassName('pickLink');
				var linkz = document.getElementsByClassName('link-url');
				text = []; urls=[];
				for (var i=0; i<linkName.length; i++) {
					if (linkz[i].innerHTML.indexOf("<a href") == -1) {
						var web = linkz[i].innerHTML;
					} else {
						var a = linkz[i].getElementsByTagName('a');
						var web = a[i].innerHTML;
					}
					text.push(linkName[i].options[linkName[i].selectedIndex].text);	
					
					if (web == "") {
						urls.push("no website available");
					} else {
						urls.push(web);
					}			
				}
				
				size = text.length;
				break;*/
			case 'profile-pic':
			      f ='change-company-pic';
			      var url = document.getElementById('profile-pic');
			      changedText = url.src;
			break;
			default:
				alert("Error");
				break;
		} 
		$.ajax ({
			type: "POST",
			url: "ajax.php",
			data: {func: f, textUpdate: text, tYear: years, tURL: urls, s: size, id: user},
			dataType: "html",
			success: function(data) {
				console.log("success");
				$('#successModal').modal('show');
				
			},
			error: function(e) {
				console.log(e);
				$('#failModal').modal('show');
			}	
		});
		
		
	}

	function save(id) {
		  console.log("entered function");
		  var box = document.getElementById(id);
		  var changedText = "";
		  f ='change-company-pic';
		  var url = document.getElementById('profile-pic');
		  changedText = url.src;
		  console.log(changedText);
		  $.ajax ({
		    type: "POST",
		    url: "ajax.php",
		    data: {func: f, textUpdateCompany: changedText},
		    dataType: "html",
		    success: function(data) {
		      console.log("success");
		      $('#successModal').modal('show');

		    },
		    error: function(e) {
		      console.log(e);
		      $('#failModal').modal('show');
		    }
		  });


}
	
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
