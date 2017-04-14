<?php
session_start();
include 'connectDB.php';

if (isset($_POST['func'])) {
	$func = $_POST['func'];
	
} 

if (isset($_POST['textUpdate'])) {
	$text = $_POST['textUpdate'];
		
} 

if (isset($_POST['tYear'])) {
	$years = $_POST['tYear'];

} 

if (isset($_POST['tURL'])) {
	$urls = $_POST['tURL'];

} 

if (isset($_POST['s'])) {
	$size = $_POST['s'];

} 

if (isset($_POST['id'])) {
	$userID = $_POST['id'];

} else {
	$userID = $_SESSION['ID'];
}

if (isset($_POST['companyFunc'])) {
	$companyFunc = $_POST['companyFunc'];

}

if (isset($_POST['textUpdateCompany'])) {
	$changedText = $_POST['textUpdateCompany'];

}

if (isset($_POST['adId'])) {
	$adId = $_POST['adId'];

}
//$companyFunc = 'editAd';
//$userID = 6;
//$adId = array(64); $changedText = array("In progress"); $size = 1;*/
switch ($func) {
	#Update the description of user
	case 'about':
		$query = "UPDATE user SET uDescription = '" . $text . "' WHERE userID = " . $userID;
		if (mysqli_query($conn, $query)) {
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}
		break;
		
	#Update the email, age, phone of user
	case 'facts':
		$age = $text[0]; $phone = $text[1]; 
		$query = "UPDATE user SET age = " . $age . ", phone= '" . $phone . "' WHERE userID = " . $userID;
		if (mysqli_query($conn, $query)) {
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		} 
		break;
		
	#Update, add, delete skills
	case 'skills':
		#Delete all skills from table where userID = id of current user
		$query = "DELETE FROM userSkill WHERE userID = " . $userID;
		if (mysqli_query($conn, $query)) {
			echo "deleted records \n";
		} else {
			echo "Error deleting records: " . mysqli_error($conn);
		}
		
		#insert all listed skills back
		for ($i = 0; $i<$size; $i++) {
			$query = "INSERT INTO userSkill (skillName, userID, yearsExp, portfolioURL)
				VALUES ('".$text[$i]."', ".$userID.",".$years[$i].", '".$urls[$i]."')";
			echo $query . "\n";
			if (mysqli_query($conn, $query)) {
				echo "success" . $i . "\n";
			} else {
				echo "Error inserting record: " . mysqli_error($conn);
			}
		}
	
		break;
		
	#Update, add, delete social media of user
	case 'links':
		#Delete all links from table where userID = id of current user
		$query = "DELETE FROM links WHERE id = " . $userID;
		if (mysqli_query($conn, $query)) {
		} else {
			echo "Error deleting records: " . mysqli_error($conn);
		}
		#Insert all the links back
		for ($i=0; $i < $size; $i++) {
			$query = "INSERT INTO links (id, name, links)
				VALUES (". $userID .", '" . $text[$i] . "', '" . $urls[$i] . "')";
						
			if (mysqli_query($conn, $query)) {
			} else {
				echo "Error inserting record: " . mysqli_error($conn);
			}
				
		}
		break;
		
	#Search for developers/company	
	case 'search':
		$menu = $text[0];
		$sub_menu = $text[1];
		$sub_menu2 = $text[2];	//for the 2nd drop down if ad is selected (the company focus)
		if (strcmp($menu, "dev") == 0) {
			
			if (strcmp($sub_menu, "All") == 0) {
				$query = "SELECT userID, CONCAT(firstName,' ',lastName) AS person FROM user";
			} else {
				$query = "SELECT user.userID AS userID, CONCAT(firstName,' ',lastName) AS person, skillName FROM user, userSkill
				WHERE user.userID = userSkill.userID AND skillName LIKE '%" . $sub_menu . "%'";
			}
			
		} else if (strcmp($menu, "comp") == 0) { #query to search for company using given focus
			
			if (strcmp($sub_menu, "All") == 0 ) {
				$query="SELECT compID, cName FROM company";
			} else {
				$query="SELECT compID, cName FROM company WHERE Focus LIKE '%" . $sub_menu . "%'";
			}
			
		} else if (strcmp($menu, "skill") == 0) { #query to search for developers using given skill
			$query = "SELECT user.userID AS userID, CONCAT(firstName,' ',lastName) AS person, skillName FROM user, userSkill
				WHERE user.userID = userSkill.userID AND skillName LIKE '%" . $sub_menu . "%'";
			
		} else if (strcmp($menu, "ad") == 0) { #query to search for ads using given product type and/or focus
			
			if (strcmp($sub_menu, "All") == 0 && strcmp($sub_menu2, "All") == 0 )  {
				$query = "SELECT c.compID, cName, Focus, title, type, aDescription FROM advert as a, company as c
							WHERE a.compID = c.compID";
			} else if (strcmp($sub_menu, "All") != 0 && strcmp($sub_menu2, "All") == 0 ) {
				$query="SELECT c.compID, cName, Focus, title, type, aDescription FROM advert as a, company as c
						WHERE a.compID = c.compID 
						AND type LIKE '%".$sub_menu."%';";
			} else if (strcmp($sub_menu, "All") == 0 && strcmp($sub_menu2, "All") != 0 ) {
				$query = "SELECT c.compID, cName, Focus, title, type, aDescription FROM advert as a, company as c
						WHERE a.compID = c.compID 
						AND Focus = '".$sub_menu2."'";
			} else {
				$query = "SELECT c.compID, cName, Focus, title, type, aDescription FROM advert as a, company as c
				WHERE a.compID = c.compID 
				AND type LIKE '%".$sub_menu."%'
				AND Focus = '".$sub_menu2."'";
			}
			
		}
		if (! ( $result = mysqli_query($conn, $query))) {
			echo "Error getting records: " . mysqli_error($conn);
		}
		$data = array();
		while($row = mysqli_fetch_array($result)) {
   			$data[] = $row;
		}
		
		print json_encode($data); //must have this for php to return json object

		break;
		
	#view a read-only profile of a user
	case 'view':
		$menu = $text[0];
		$id = $text[1];
		if (strcmp($menu, "dev") == 0) {
			$query = "";
		} else { #query to search for company info using given compID
			$query="SELECT cName, contactPerson, cEmail, linkURL, cDescription, Founder, Location, Focus FROM company WHERE compID =" . $id;
		}
		if (! ( $result = mysqli_query($conn, $query))) {
			echo "Error getting records: " . mysqli_error($conn);
		}
		$data = array();
		$row = mysqli_fetch_assoc($result);
		$data[] = $row;
		print json_encode($data); //must have this for php to return json object
		break;
	
	#for companies to post ad	
	case 'postAd':	
		$type = $text[0];
		$description = $text[1]; 
		$purpose = $text[2]; 
		date_default_timezone_set('America/New_York');
		$date = date('Y/m/d');
		$query = "INSERT INTO advert (compID, title, post_date, aDescription, type, status) VALUES
				(".$userID.", '".$description."', '".$date."', '".$purpose."', '".$type."', 'looking for developer')";
		echo $query;
		if (mysqli_query($conn, $query)) {
			echo "success" . "\n";
		} else {
			echo "Error inserting record: " . mysqli_error($conn);
		}
		break;
	
	#kill session when user clicks logout
	case 'logout':
		$_SESSION = array();
		session_destroy();
		break;
	default:
		break;
}

switch ($companyFunc) {
	case 'about-company':
		
		$query = "UPDATE company SET cDescription = '  $changedText  ' WHERE compID = ".$userID;
		if (mysqli_query($conn, $query)) {
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}

		break;
	case 'quick-facts-company':
		$location= $changedText[0];
		$founder = $changedText[1];
		$focus = $changedText[2];
		$query = "UPDATE company SET Founder= ' $founder ', Location = ' $location ', Focus = ' $focus '   WHERE compID= ".$userID;
		if (mysqli_query($conn, $query)) {
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}
		break;
	case 'skills-company':
		$query = "UPDATE company SET companycol = '  $changedText  ' WHERE compID = ".$userID;
		if (mysqli_query($conn, $query)) {
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}
		break;
	case 'contact-company':
		$query = "UPDATE company SET cPhoneNumber= '  $changedText[0]  ' WHERE compID = ".$userID;
		if (mysqli_query($conn, $query)) {
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}
		break;
	case 'removeAds':
		$query = "DELETE FROM advert WHERE advertID= " . $changedText[0] . " AND compID = ". $changedText[1];
		if (mysqli_query($conn, $query)) {
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}
		break;
	case 'editAd':
		echo ("in edit ad");
		for ($i=0; $i<$size; $i++) {
			if (strcmp($changedText[$i], "Completed") == 0) {
				$query = "DELETE from advert WHERE advertID = ".$adId[$i]." AND compID = " . $userID;
			} else {
				$query = "UPDATE advert SET status = '".$changedText[$i]."' WHERE advertID = ".$adId[$i]." and compID = " . $userID;
				
			}
			if (mysqli_query($conn, $query)) {
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}
		break;

}
mysqli_close($conn);

?>
