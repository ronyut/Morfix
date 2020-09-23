<?php

$db = 	mysqli_connect("localhost", "root", "") or die(mysqli_error($db));
		mysqli_select_db($db, "morfix") or die(mysqli_error($db));
		mysqli_query($db, "SET NAMES 'UTF8'");


//////////////////////////////////////////////////////////	

//יוצר צורות מגזום
$opID = 1;

$query = mysqli_query($db, "SELECT * FROM records WHERE analysisID > 28 AND analysisID < 57 ORDER BY recordID ASC"); // עתיד בלבד
while($row = mysqli_fetch_assoc($query)){
	$lastTwo = substr($row['content'], -4); // כל אות בערבית שווה ל-2 באנגלית
	if($lastTwo == "ان"){
		$newString = "ا";
	}
	elseif($lastTwo == "ول"){
		$newString = "ل";
	}
	elseif($lastTwo == "ال"){
		$newString = "ل";
	}
	elseif($lastTwo == "يل"){
		$newString = "ل";
	}
	else{
		continue;
	}
	$fullNew = substr($row['content'], 0, -4).$newString; // כל אות בערבית שווה ל-2 באנגלית
	$rowID = $row['recordID'];
	$type = $row['typeName'];
	$isFusha = 1;
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