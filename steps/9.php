<?php

$db = 	mysqli_connect("localhost", "root", "") or die(mysqli_error($db));
		mysqli_select_db($db, "morfix") or die(mysqli_error($db));
		mysqli_query($db, "SET NAMES 'UTF8'");


//////////////////////////////////////////////////////////	

//הסר י בסוף 
$opID = 7;

$query = mysqli_query($db, "SELECT * FROM records WHERE (analysisID != '19' AND analysisID != '20' AND analysisID != '47' AND analysisID != '48' AND analysisID > 28  AND analysisID < 57 AND operationID != '8')"); // לא לנקבה ולא לעבר ולא לציווי בלי אופרציה 8
while($row = mysqli_fetch_assoc($query)){
	$lastTwo = substr($row['content'], -2); // כל אות בערבית שווה ל-2 באנגלית
	if($lastTwo == "ي"){
		$newString = "";
	}
	else{
		continue;
	}
	$fullNew = substr($row['content'], 0, -2).$newString; // כל אות בערבית שווה ל-2 באנגלית
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

echo "success!";
?>