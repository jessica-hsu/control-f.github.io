<?php
include 'connectDB.php';

/*if (isset($_POST['func'])) {
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

}*/
$userID = 1;
$func = "skills";
$urls = ["some web app"];
$size = 1;
$years = [2];
$text = ["SQL"];

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
		//$query = "DELETE FROM userSkill WHERE userID = " . $userID;
		/*if (mysqli_query($conn, $query)) {
		} else {
			echo "Error deleting records: " . mysqli_error($conn);
		}*/
		#Insert all the values back
		for ($i=0; $i < $size; $i++) {
			$query = "INSERT INTO userSkill (skillName, userID, yearsExp, portfolioURL)
				VALUES ('" . $text[$i] . 
				"'," . $userID . ", " . $years[$i] . ", '" . $urls[$i] . "')";
			/*if (mysqli_query($conn, $query)) {
			} else {
				echo "Error inserting record: " . mysqli_error($conn);
			}*/
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
		if (strcmp($menu, "dev") == 0) {
			$query = "SELECT user.userID AS userID, CONCAT(firstName,' ',lastName) AS person, skillName FROM user, userSkill
			WHERE user.userID = userSkill.userID AND skillName LIKE '%" . $text[1] . "%'";
		} else { #query to search for company using given focus
			$query="SELECT compID, cName FROM company WHERE Focus LIKE '%" . $sub_menu . "%'";
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
		
	default:
		die("Choose a function!");
}
mysqli_close($conn);

?>