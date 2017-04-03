<?php 

session_start();	

if ($_SESSION['profileType'] == null) {
	header('Location: index.php');
}

$userID = $_SESSION['ID'];
//$userID = 1;
if (strcmp($_SESSION['profileType'], "comp")==0) {
	header('Location: viewCompanyProfile.php');
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
<?php include "connectDB.php"?>
<span id="currentUser" hidden><?php echo $userID?></span>
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
   				$query = "SELECT firstName, lastName, email, phone, age, uDescription FROM user WHERE userID = " . $userID;
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
		<div class="container-fluid">
		<div class="row">
			<div class="alert alert-success alert-dismissable" id="updateYes" style="display: none;">
  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  				<strong>Profile updated.</strong>
			</div>	  	
	  		<div class="alert alert-danger alert-dismissable" id="updateNo" style="display: none;">
  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  				<strong>ERROR: Profile failed to update.</strong>
			</div>
			
			<div class="row" id="row1"> 
		  	<div class="col-sm-4 col-sm-offset-2 left-box left-box" id = "about-box">
		  		<button onclick="editAbout(this);" class="edit-icon"> 
		  			<span class="glyphicon glyphicon-pencil "></span> 
		  		</button>
		  		<button onclick="update('about-text')" class="edit-icon"> 
		  			<span id='save-about-text' class="glyphicon glyphicon-floppy-disk""></span> 
		  		</button>
		  		<br>
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
				<script>
			  	function editAbout(button) {
			    	var text = document.getElementById("about-text");
			    	var box = document.getElementById("about-box");
			    	var save = document.getElementById('save-about-text');
			    	
				    if (text.contentEditable == "true") {
				        text.contentEditable = "false";
				       	box.style.backgroundColor="#e8e9ea";
				       	 box.style.border = "none";
				       	 save.style.display = 'none';
				       
				    } else {
				        text.contentEditable = "true";
				        box.style.backgroundColor ="#f2f2f2";
				        box.style.border = "2px dashed #cecece";
				        save.style.display = 'block';
				    }
				}
		  		</script>
			</div>
		  	


		  	<div class="col-sm-4  col-sm-offset-1 right-box top-box" id = "quick-facts-box"> 
				<button onclick="editFacts(this);" class="edit-icon"> 
		  			<span class="glyphicon glyphicon-pencil "></span> 
		  		</button>
		  		<button onclick="update('quick-facts')" class="edit-icon"> 
		  			<span id='save-quick-facts' class="glyphicon glyphicon-floppy-disk""></span> 
		  		</button> <br>
				<p class = "sub-heading" > Quick Facts </p>
				<p id="quick-facts">
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
			    	var save = document.getElementById('save-quick-facts');
				    if (text.contentEditable == "true") {
				        text.contentEditable = "false";
				        var s = document.getElementById('age');
				        age.innerHTML = s.options[s.selectedIndex].value;
				        save.style.display="none";
				       	box.style.backgroundColor="#e8e9ea";
				       	box.style.border = "none";
				       
				    } else {
				        text.contentEditable = "true";
				        box.style.backgroundColor ="#f2f2f2";
				        box.style.border = "2px dashed #cecece";
				        save.style.display="block";
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
			</div> <!-- end row -->

			<div class="row" id="row2">
			<div class="col-sm-9 col-sm-offset-2 left-box " id = "skills-box"> 
				<button onclick="editSkills(this);" class="edit-icon"> 
		  			<span class="glyphicon glyphicon-pencil "></span> 
		  		</button>
		  		<button  onclick="update('skills-facts')" class="edit-icon"> 
		  			<span id='save-skills-facts' class="glyphicon glyphicon-floppy-disk""></span> 
		  		</button> <br>
				<p class = "sub-heading" >Skills </p>
				<p> <span id="temp" contentEditable="false" hidden></span>
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
				</p>

				<script>
			  	function editSkills(button) {
			    	var box = document.getElementById("skills-box");
			    	var temp = document.getElementById('temp');
			    	var save = document.getElementById('save-skills-facts');
			    	var add = document.getElementById('add-skill');
			    	var s = document.getElementsByClassName('skills-text-name');
			    	var y = document.getElementsByClassName('skills-text-yrs');
			    	var t = document.getElementsByClassName('skills-text');
				    if (temp.contentEditable == "true") { //CLOSE EDITING VIEW
				    	temp.contentEditable = "false";
				       	box.style.backgroundColor="#e8e9ea";
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
				    	save.style.display = "block";
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
			</div> <!-- end row -->
			
			<div class="row" id="row3">
			<div class="col-sm-9  col-sm-offset-2 left-box " id = "social-media"> 
				<button onclick="editLinks(this);" class="edit-icon"> 
		  			<span class="glyphicon glyphicon-pencil "></span> 
		  		</button>
		  		<button  onclick="update('links-facts')" class="edit-icon"> 
		  			<span id="save-links" class="glyphicon glyphicon-floppy-disk""></span> 
		  		</button>
		  		 <br>
				<p class = "sub-heading" > Other Places to Find Developer </p> 
				<p><span id="temp" contentEditable="false" hidden></span>
				<div class="table-responsive">
					<table class="table table-striped" id="link-table">
						<thead><tr>
							<th>Name</th>
							<th>URL</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$query = "SELECT name, links FROM links WHERE id = " . $userID;
						if ( ! ( $result = mysqli_query($conn, $query)) ) {
							echo("Error: %s\n"+ mysqli_error($conn));
							exit(1);
						}
						while($row = mysqli_fetch_assoc($result)) {
							echo("<tr class='linkz'><td class='link-text'>" . $row['name'] .
									"</td><td class='link-url' contentEditable='false'><a href='" . $row['links'] . "'>" . $row['links'] . "</a>
									</td><td><span class='glyphicon glyphicon-remove' onclick='removeLink(this)'></span></tr>");
						}
						?>
						<button type="button" id='add-link' class="btn btn-info addMe" onclick="addLink()"><span class="glyphicon glyphicon-plus"></span></button>
						</tbody>
					</table>
				</div>
				</p>

				<script>
			  	function editLinks(button) {
			    	var box = document.getElementById("social-media");
			    	var temp = document.getElementById('temp');
			    	var save = document.getElementById('save-links');
			    	var add = document.getElementById('add-link');
			    	var t = document.getElementsByClassName('link-url');
			    	var s = document.getElementsByClassName('link-text');
			       	var theLink = document.getElementsByClassName('pickLink');
			    	
				    if (temp.contentEditable == "true") { //CLOSE EDIT VIEW
				    	temp.contentEditable = "false";
				       	box.style.backgroundColor="#e8e9ea";
				       	box.style.border = "none";
				       	save.style.display = "none";
				       	add.style.display = "none";
				       	var selected=[];
				       	 
				       	for (var i=0; i<theLink.length; i++) {
				       		selected.push(theLink[i].options[theLink[i].selectedIndex].text);
				       	}
				       	for (var i =0; i<s.length; i++) {
					       	s[i].innerHTML = selected[i];
				       	}
				       	for (var i=0; i<t.length; i++) { //for the website box
					       	t[i].contentEditable = "false";
				       	}
				       
				    } else { //OPEN EDIT VIEW
				    	temp.contentEditable = "true";
						box.style.backgroundColor ="#f2f2f2";
				        box.style.border = "2px dashed #cecece";
				    	save.style.display = "block";
				    	add.style.display = "block";
				    	for (var i=0; i<t.length; i++) { //for the website box
					       	t[i].contentEditable = "true";
				       	}
				       	var tempName="";
				    	for (var i=0; i<s.length; i++) {
					    	tempName = s[i].innerHTML;
					    	s[i].innerHTML="<select class='pickLink'>\
					    		<option value='github'>GitHub</option>\
					    		<option value='linkedin'>LinkedIn</option>\
					    		<option value='google'>Google</option>\
					    		<option value='twitter'>Twitter</option>\
					    		<option value='website'>Personal Website</option>\
					    		<option value='instagram'>Instagram</option>\
					    		<option value='project'>Project Link</option></select>";
		    				var o = s[i].getElementsByTagName('option');
		    				for (var j=0; j<o.length; j++) {
			    				if (o[j].innerHTML == tempName) {
				    				o[j].selected = "selected";
			    				}
		    				}
				    	}
				    }
				}
		  		</script>
			</div> <!-- end column -->
		  	</div> <!-- end row -->
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
				size=text.length;
				break;
			case 'links-facts':
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
				var success = document.getElementById("updateYes");
				success.style.display='block';
				
			},
			error: function(e) {
				var fail = document.getElementById("updateNo");
				success.style.display='block';
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
