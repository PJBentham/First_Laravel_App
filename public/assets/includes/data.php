<?php

try {
	$db = new PDO("mysql:host=localhost;dbname=mysignoff_db;","second_user","V0!.]7RA[eVb");
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e){
	echo "oops something went wrong: ".$e;
}

try {
	$results = $db->query("SELECT * FROM mysignoff_db.jewellerybay");
	$items = $results->fetchAll(PDO::FETCH_ASSOC);
}
catch (Exception $e){
	echo "oops something went wrong: ".$e;
}

function getSignOffs($items){
	foreach($items as $item){
		echo "<tr>";
		echo	"<td><span class='glyphicon glyphicon-cloud-download'></span><a style='color: black;' href='".$item["File"]."'> ".$item["File"]."</a></th>";
		echo	"<td>".$item["Location"]."</th>";
		echo	"<td>".$item["Job Number"]."</th>";
		echo	"<td>".$item["PO Number"]."</th>";
		echo	"<td>".$item["Date"]."</th>";
		echo	"<td>".$item["Name"]."</th>";
		echo	"<td>".$item["Photo"]."</th>";
		echo "</tr>";
	}
}

function addSignOff($db, $file, $location, $jnumber, $ponumber, $x, $name, $photo){
	try {
		$stmt = $db->prepare("	INSERT INTO mysignoff_db.jewellerybay (File, Location, `Job Number`, `PO Number`, `Date`, Name, Photo) VALUES (?, ?, ?, ?, ?, ?, ?);");
		$stmt->bindParam(1, $file);
		$stmt->bindParam(2, $location);
		$stmt->bindParam(3, $jnumber);
		$stmt->bindParam(4, $ponumber);
		$stmt->bindParam(5, $x);
		$stmt->bindParam(6, $name);
		$stmt->bindParam(7, $photo);	
		$stmt->execute();
	}
	catch (Exception $e){
		echo "<p>oops something went wrong: ".$e."</p>";
	}
}
	
function getProjects($user){	
	try {
		$db = new PDO("mysql:host=localhost;dbname=mysignoff_db;","second_user","V0!.]7RA[eVb");
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch (Exception $e){
		echo "oops something went wrong: ".$e;
	}
	try {
		$results = $db->query("SELECT * FROM projects JOIN member_projects ON member_projects.projectid = projects.id WHERE user = '".$user."'");
		$projects = $results->fetchAll(PDO::FETCH_ASSOC);
	}
	catch (Exception $e){
		echo "oops something went wrong: ".$e;
	}
	if (checkMemberType($user) == 1){
		foreach($projects as $project){
			echo	"<a style='color:SlateGray;' href=../".$project["db_url"].">".$project["description"]."</a><br>";
		}
	}
	elseif (checkMemberType($user) == 2){
		foreach($projects as $project){
			echo	"<a style='color:SlateGray;' href=../".$project["form_url"].">".$project["description"]."</a><br>";
		}	
	}
	}

function checkValidProjectMember($user, $url){	
	try {
		$db = new PDO("mysql:host=localhost;dbname=mysignoff_db;","second_user","V0!.]7RA[eVb");
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch (Exception $e){
		echo "oops something went wrong: ".$e;
	}
	if (checkMemberType($user) == 1){
		try {
			$results = $db->query("	SELECT * FROM projects JOIN member_projects 
									ON member_projects.projectid = projects.id 
									WHERE user = '".$user."'
									AND db_url = '".$url."'");
			$projects = $results->fetchAll(PDO::FETCH_ASSOC);
		}
		catch (Exception $e){
			echo "oops something went wrong: ".$e;
		}
	} 
	elseif (checkMemberType($user) == 2) {
		try {
			$results = $db->query("	SELECT * FROM projects JOIN member_projects 
									ON member_projects.projectid = projects.id 
									WHERE user = '".$user."'
									AND form_url = '".$url."'");
			$projects = $results->fetchAll(PDO::FETCH_ASSOC);
			}
		catch (Exception $e){
			echo "oops something went wrong: ".$e;
		}	# code...
	}
	if(count($projects) >= 1){
		return true;
	}
	else {
		return false;
	}
}	

function checkMemberType($user){
	try {
		$db = new PDO("mysql:host=localhost;dbname=mysignoff_db;","second_user","V0!.]7RA[eVb");
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch (Exception $e){
		echo "oops something went wrong: ".$e;
	}
	try {
		$results = $db->query("	SELECT * FROM members 
								WHERE username = '".$user."'");
		$infos = $results->fetchAll(PDO::FETCH_ASSOC);
	}
	catch (Exception $e){
			echo "oops something went wrong: ".$e;
		}
	foreach($infos as $info){
		return $info["UserType"];
	}
}

?>