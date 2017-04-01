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
	
	<!-- jQUERY -->
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="hello.all.js"></script>
	
	<link rel="stylesheet" href="search.css">

	<link rel='icon' href='img/icon.ico' type='image/x-icon'>

	<title>Control-F</title>
</head>
<?php include "connectDB.php" ?>
<span id="network" hidden><?php echo $_SESSION['network']?></span>
<span id="profileType" hidden><?php echo $_SESSION['profileType']?></span>

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
         				<li><a id="logout" onclick="logout()" >Logout</a></li>
         			</ul>
      			</div>
    		</div>
    	</nav>

		<div class="row">
			<div class="col-sm-12">
		  		<div id="searchbox">
    				<label for="search">Search for developers or company:</label>
	    			<select id="search" onchange="changeSubMenu()">
	    				<option value="dev" selected>Developer</option>
	    				<option value="comp">Company</option>
	    			</select>
	    			
	    			<!--  hide secondary drop down menu at first. Display depends on developer or company selected -->
	    			<label class="dev" for="product" >Select a desired product:</label>
	    			<select class="dev" id="product" >
	    				<option value="web">Website/Web application</option>
	    				<option value="android">Mobile - android application</option>
	    				<option value="ios">Mobile - iOS application</option>
	    				<option value="social">Social Media</option>
	    				<option value="game">Game development</option>
	    				<option value="graphic">Graphic Design</option>
	    				<option value="support">IT Support</option>
	    			</select>
	    				
	    			<label class="comp" for="company-types" >Select company focus:</label>
	    			<select class="comp" id="company-types" >	    				
	    				<option value="1">Advocacy & Human Rights</option>
	    				<option value="2">Animals</option>
	    				<option value="3">Arts & Culture</option>
	    				<option value="4">Board Development</option>
	    				<option value="5">Children & Youth</option>
	    				<option value="6">Community</option>
	    				<option value="7">Computers & Technology</option>
	    				<option value="8">Crisis Support</option>
	    				<option value="9">Disaster Relief</option>
	    				<option value="10">Education & Literacy</option>
	    				<option value="11">Emergency & Safety</option>
	    				<option value="12">Employment</option>
	    				<option value="13">Environment</option>
	    				<option value="14">Faith-based</option>
	    				<option value="15">Health & Medicine</option>
	    				<option value="16">Homeless & Housing</option>
	    				<option value="17">Hunger</option>
	    				<option value="18">Immigrants & Refugees</option>
	    				<option value="19">International</option>
	    				<option value="20">Justice & Legal</option>
	    				<option value="21">LGBT</option>
	    				<option value="22">Media & Broadcasting</option>
	    				<option value="23">People with Disabilities</option>
	    				<option value="24">Politics</option>
	    				<option value="25">Race & Ethnicity</option>
	    				<option value="26">Seniors</option>
	    				<option value="27">Sports & Recreation</option>
	    				<option value="28">Veterans & Military Families</option>
	    				<option value="29">Women</option>
						<option value="30">Other</option>
	    			</select>
	    			<button id="submit" type="button" class="btn btn-info" onclick="search()">
	    				<span class="glyphicon glyphicon-search"></span>
	    			</button>
	   			</div> <!-- end of search box -->
	   		</div> <!-- end of column -->
		</div> <!-- end of row -->
		<div class = "row" id="result-table">
			<div class="col-sm-6">
			<h4>Search Results:</h4>
				<div class="table-responsive">
					<table class="table table-striped" id="profiles">
						<thead><tr>
							<th>Name</th>
							<th>Profile</th></tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div> <!-- end of container-fluid -->
	
	<!-- Javascript code begins here -->
	<script>
		/*change second drop down menu depending on what is selected in the first one */
		function changeSubMenu() {
			var menu = document.getElementById('search');
			var menu_selected = menu.options[menu.selectedIndex].value;
			var products = document.getElementsByClassName('dev');
			var focus = document.getElementsByClassName('comp');
			if (menu_selected == "dev") {		//show the product menu if developers selected
				products[0].style.display = "inline";
				products[1].style.display = "inline";
				focus[0].style.display = "none";
				focus[1].style.display = "none";
				
			} else {	//show company type if company selected
				products[0].style.display = "none";
				products[1].style.display = "none";
				focus[0].style.display = "inline";
				focus[1].style.display = "inline";
			}
		}

		/*ajax to display profile when you click VIEW button*/
		function viewProfile(profile) {
			var text=[];
			var compID = profile.id.charAt(profile.id.length-1);
			var menu = document.getElementById('search');
			var menu_selected = menu.options[menu.selectedIndex].value;
			if (menu_selected == "dev") {
				text= ["developer", compID];
			} else {
				text=["company", compID];
			}
			var f="view";
						
			$.ajax ({
				type: "POST",
				url: "ajax.php",
				data: {func: f, textUpdate: text},
				dataType: "json",
				success: function(data) {
					var obj = JSON.stringify(data);	//need this or it won't work
					obj = JSON.parse(obj);
					var title = document.getElementById('modal-title');
					title.innerHTML = obj[0]['cName'];
					var content = document.getElementById('modal-body');
					content.innerHTML = "<b>Focus:</b> " + obj[0]['Focus'] + "<br>\
					<b>Description:</b> " + obj[0]['cDescription'] + "<br>\
					<b>Contact Person:</b> " + obj[0]['contactPerson'] + "<br>\
					<b>Contact Email:</b> " + obj[0]['cEmail'] + "<br>\
					<b>Founder:</b>: " + obj[0]['Founder'] + "<br>\
					<b>Location:</b> " + obj[0]['Location'];

				},
				error: function(e) {
					var table = document.getElementById('result-table');
					table.style.display= "none";
				}	
			});
			
		}

		/*ajax to search user and company*/
		function search() {
			var text=[]; 	//this is where we store the dev/comp option and the selected product type/company focus
			var menu = document.getElementById('search');
			var menu_selected = menu.options[menu.selectedIndex].value;
			var sub_menu; var sub_menu_selected;
			if (menu_selected == "dev") {
				sub_menu = document.getElementById('product');
				sub_menu_selected = sub_menu.options[sub_menu.selectedIndex].value;
			} else {
				sub_menu = document.getElementById('company-types');
				sub_menu_selected = sub_menu.options[sub_menu.selectedIndex].text;
			}
			text.push(menu_selected); text.push(sub_menu_selected);
			var f = "search";

			$.ajax ({
				type: "POST",
				url: "ajax.php",
				data: {func: f, textUpdate: text},
				dataType: "json",
				success: function(data) {
					var obj = JSON.stringify(data);	//need this or it won't work
					obj = JSON.parse(obj);
		            $("#profiles").find("tr:not(:first)").remove();
					for (var i=0; i<obj.length; i++) {
						var profile_table = document.getElementById('profiles');
						var row = profile_table.insertRow(-1);
						var cell_name= row.insertCell(0);
						var cell_link = row.insertCell(1);
						cell_name.innerHTML = obj[i][1];
						if (menu_selected == "dev") {
							cell_link.innerHTML = "<form action='readOnlyDev.php' target='_blank' method='get'><button type='submit' value='" + obj[i][0]+ "' class='btn btn-info' name='info'>View</button></form>";
						} else {
							cell_link.innerHTML = "<form action='readOnlyComp.php' target='_blank' method='get'><button type='submit' value='" + obj[i][0]+ "' class='btn btn-info' name='info'>View</button></form>";
						}
						
						
					}
					var table = document.getElementById('result-table');
					table.style.display= "block";
				},
				error: function(e) {
					var table = document.getElementById('result-table');
					table.style.display= "none";
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
