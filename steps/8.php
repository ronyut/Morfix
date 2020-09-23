<?php

$db = 	mysqli_connect("localhost", "root", "") or die(mysqli_error($db));
		mysqli_select_db($db, "morfix") or die(mysqli_error($db));
		mysqli_query($db, "SET NAMES 'UTF8'");


//////////////////////////////////////////////////////////	

//הסר א מקצורה בסוף פועל (למג'זום)
$opID = 6;

$query = mysqli_query($db, "SELECT * FROM records WHERE analysisID > 28 AND analysisID < 57 AND operationID != '11' AND operationID != '12' ORDER BY recordID ASC"); // עתיד בלבד
while($row = mysqli_fetch_assoc($query)){
	$lastTwo = substr($row['content'], -2); // כל אות בערבית שווה ל-2 באנגלית
	if($lastTwo == "ى"){
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