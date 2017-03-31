<?php session_start();
$compID = $_SESSION['ID'];
$compName = $_SESSION['userName'];
?>
<!DOCTYPE html>
<html lang="en">
<span id="user" hidden><?php echo $compID?></span>
<span id="mahName" hidden><?php echo $compName?></span>
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
	
	<link rel="stylesheet" href="postAd.css">

	<!--<link rel='icon' href='img/icon.ico' type='image/x-icon'>-->

	<title>Control-F</title>
</head>

<?php include "connectDB.php" ?>

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
         			</ul>
      			</div>
    		</div>
    	</nav>
	</div>


	<h1>Post an Advertisement</h1>

	<div>			
	<span><h2>Your company: <?php echo $compName;?></h2></span>
	
  		<form action="viewProfile.php" onsubmit="submit()" method="post">
   			<label for="project" id="projtype">Project Type</label>
	   			<select id="project" name="project">
	   				<option value="Website/Web Application">Website/Web Application</option>
	      			<option value="Mobile - Android Application">Mobile - Android Application</option>
	      			<option value="Mobile - iOS Application">Mobile - iOS Application</option>
	      			<option value="Social Media">Social Media</option>
	      			<option value="Game Development">Game Development</option>
	      			<option value="Graphic Design">Graphic Design</option>
	      			<option value="IT Support">IT Support</option>
	      		</select>

	      	<br>
	      	<label for="why">Please give a short description of the project:</label>
   				<input type="text" id="why" name="whyproject" placeholder="Description">

  			<br>

	      	<label for="why">What is the purpose of this project?</label>
   				<input type="text" id="purpose" name="whyproject" placeholder="This project will...">

  			<br>

    		<button class="btn" type="button" id="preview" onclick="p()">Preview</button>

    		<button class="btn" type="submit" id="submit">
    			Submit
    		</button>

  		</form>
	</div>

	<div class = "row" id="result-table">
		<div class="col-sm-6">
			<div class="table-responsive">
				<table class="table table-striped" id="profiles">
					<thead><tr>
						<th>Name</th>
						<th>Type</th>
						<th>Description</th>
						<th>Purpose</th>
						<th>Profile</th></tr>
					</thead>
					<tbody>
						<tr>
							<td id="name"></td>
							<td id="type"></td>
							<td id="description"></td>
							<td id="purp"></td>
							<td id="profile"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script>
		function p() {
			var text=[]; //this is where we store the dev/comp option and the selected product type/company focus
			var table = document.getElementById('result-table');
			var menu = document.getElementById('preview');

			var project = document.getElementById('project');
			var project_selected = project.options[project.selectedIndex].value;
			var why = document.getElementById('why');
			var purpose = document.getElementById('purpose');
			var mahName = document.getElementById('mahName');

			var cell1 = document.getElementById('name');
			var cell2 = document.getElementById('type');
			var cell3 = document.getElementById('description');
			var cell4 = document.getElementById('purp');
	
			cell1.innerHTML = mahName.innerHTML;
			cell2.innerHTML = project_selected;
			cell3.innerHTML = why.value;
			cell4.innerHTML = purpose.value;
			 			
			var preview = 'preview';
			var submit = 'submit';
			table.style.display = "block";
		}

		function submit() {
			f = "postAd";
			text = [];
			purpose = document.getElementById('purpose').value;
			description = document.getElementById('why').value;
			project = document.getElementById('project');
			project_type = project.options[project.selectedIndex].value;
			user = document.getElementById('user').innerHTML;
			text.push(user); text.push(project_type); text.push(description); text.push(purpose);
			$.ajax({
	            url: 'ajax.php',
	            data: {text: r.name, func: f},
	            type: 'post',
	            success: function(result) {
	                console.log("action performed successfully");
	            }, 
	            error: function(result) {
	            	console.log(result);
	            }
	        });
		}
	</script>

</body>
</html>
