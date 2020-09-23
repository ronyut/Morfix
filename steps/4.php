<?php

$db = 	mysqli_connect("localhost", "root", "") or die(mysqli_error($db));
		mysqli_select_db($db, "morfix") or die(mysqli_error($db));
		mysqli_query($db, "SET NAMES 'UTF8'");


//////////////////////////////////////////////////////////	

//פעלים שנגמרים ב-و ונוספה להם ا בסוף 
$opID = 2;

$query = mysqli_query($db, "SELECT * FROM records"); // כל הזמנים
while($row = mysqli_fetch_assoc($query)){
	$lastOne = substr($row['content'], -2); // כל אות בערבית שווה ל-2 באנגלית
	if($lastOne == "و"){
		$add = "ا";
	}
	else{
		continue;
	}
	$fullNew = $row['content'].$add; // כל אות בערבית שווה ל-2 באנגלית
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
	unset($add);
	unset($lastOne);
	unset($row);
	
	
}

?>