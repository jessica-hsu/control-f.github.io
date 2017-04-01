<?php 
session_start(); 


include 'connectDB.php';

#CHECK IF USER IS COMPANY OR DEVELOPER
if (strcmp($_SESSION['profileType'], "dev") == 0) {		#user is a DEVELOPER
	#CHECK TO SEE IF userEmail already exists in DB
	$query = "SELECT firstName FROM user WHERE email = '" . $_SESSION['userEmail'] . "'";
	$result = mysqli_query($conn, $query);
	
	#parse full name into first and last name
	$fullName = explode(" ", $_SESSION['userName']);
	
	#IF userEmail doesn't exists in DB, insert a record
	if (mysqli_num_rows($result) < 1) {
		$query = "INSERT INTO user (firstName, lastName, email, phone, age, uDescription, isAdmin) 
				VALUES
				('" . $fullName[0] . "', '" . $fullName[1] . "', '" . $_SESSION['userEmail'] . "', 'enter phone', 1, 'Enter description', 0)";
		if (mysqli_query($conn, $query)) {
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}
	} 
	
	#get userID from DB and save as SESSION variable
	$query = "SELECT userID FROM user WHERE email = '" . $_SESSION['userEmail'] . "'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);
	$_SESSION['ID'] = $row['userID'];

} else {	#user is a COMPANY
	
	#CHECK TO SEE IF company Name already exists in DB
	$query = "SELECT cEmail FROM company WHERE cEmail = '" . $_SESSION['userEmail'] . "'";
	$result = mysqli_query($conn, $query);
	
	#parse full name into first and last name
	$fullName = explode(" ", $_SESSION['userName']);
	
	#IF userEmail doesn't exists in DB, insert a record
	if (mysqli_num_rows($result) < 1) {
		$query = "INSERT INTO company (cName, contactPerson, cEmail, linkURL, cDescription, Founder, Location, Focus, cPhoneNumber)
				VALUES
				('" . $_SESSION['userName'] . "', 'Enter contact person', '".$_SESSION['userEmail']."', 'enter link', 'enter description', 'enter founder', 'enter location', 'Other', 'enter phone')";
		if (mysqli_query($conn, $query)) {
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}
	}
	
	#get userID from DB and save as SESSION variable
	$query = "SELECT compID FROM company WHERE cEmail = '" . $_SESSION['userEmail'] . "'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);
	$_SESSION['ID'] = $row['compID'];


}
#rejoice
?>
<span id="profileType" hidden><?php echo $_SESSION['profileType']?></span>
<span id="network" hidden><?php echo $_SESSION['network']?></span>
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
	
	<link rel="stylesheet" href="welcome.css">
	<link rel='icon' href='img\icon.ico' type='image/x-icon'>

	<title>Control-F</title>
	<style>
		#logout {
			cursor: pointer;
		}
	</style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	<div class="container-fluid">
	<div class="loading"><span>&bull;</span><span>&bull;</span><span>&bull;</span></div>

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
    	<?php echo("<h1 id='banner'>Welcome back, " . $_SESSION['userName'] . "!</h1>")?>
	<p>Make a profile <a href="viewProfile.php" id="here">here</a> to get started!</p>
   </div> 	
<script src="hello.all.js"></script>
<script>
$( document ).ready(function() {
	
    console.log( "ready!" );
    var linkedin = hello('linkedin').getAuthResponse();
    console.log("token:" + linkedin.access_token);
    console.log("expires: " + linkedin.expires);
	console.log("network: " + document.getElementById('network').innerHTML);
	console.log("profile Type: " + document.getElementById('profileType').innerHTML);
	
    	    
    hello.on('auth.login', function(auth) {
        hello(auth.network).api('/me').then(function(r) {   
            console.log(auth.network);            
            console.log("name(login) = "+r.name);
            console.log("email(login) = " + r.email);
        });
    });

	
});
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
