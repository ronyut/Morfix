<?php

$db = 	mysqli_connect("localhost", "root", "") or die(mysqli_error($db));
		mysqli_select_db($db, "morfix") or die(mysqli_error($db));
		mysqli_query($db, "SET NAMES 'UTF8'");


//////////////////////////////////////////////////////////	

//פעלים במדוברת שנגמרים ב-وا והושמטה ה-ا
$opID = 3;

$query = mysqli_query($db, "SELECT * FROM records WHERE operationID != '2'"); // כל הזמנים מלבד שלב 4
while($row = mysqli_fetch_assoc($query)){
	$lastTwo = substr($row['content'], -4); // כל אות בערבית שווה ל-2 באנגלית
	if($lastTwo == "وا"){
		$newString = "و";
	}
	else{
		continue;
	}
	$fullNew = substr($row['content'], 0, -4).$newString; // כל אות בערבית שווה ל-2 באנגלית
	$rowID = $row['recordID'];
	$type = $row['typeName'];
	$isFusha = 0;
	$analysisID = $row['analysisID'];
	
	mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`, `operationID`) VALUES ('$type', '$isFusha', '$analysisID', '$fullNew', '$opID')") or die(mysqli_error($db));
	mysqli_query($db, "UPDATE types SET `typeComment` = '$rowID' WHERE typeID = '1'") or die(mysqli_error($db));
	
	unset($type);
	unset($isFusha);
	unset($analysisID);
	unset($fullNew);
	unset($newString);
	unset($lastTwo);
	unset($row);
	
	
}

?>