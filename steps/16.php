<?php

$db = 	mysqli_connect("localhost", "root", "") or die(mysqli_error($db));
		mysqli_select_db($db, "morfix") or die(mysqli_error($db));
		mysqli_query($db, "SET NAMES 'UTF8'");


//////////////////////////////////////////////////////////	

//תמ בסוף ← תוא
$opID = 14;

$query = mysqli_query($db, "SELECT * FROM records");
while($row = mysqli_fetch_assoc($query)){
	$lastTwo = substr($row['content'], -4); // כל אות בערבית שווה ל-2 באנגלית
	if($lastTwo == "تم"){
		$newString = "توا";
	}
	else{
		continue;
	}
	$fullNew = substr($row['content'], 0, -4).$newString; // כל אות בערבית שווה ל-2 באנגלית
	$rowID = $row['recordID'];
	$type = $row['typeName'];
	$isFusha = 0;
	$analysisID = $row['analysisID'];
	
	//echo $row['content']."<br>";
	//echo $fullNew."<br>";
	
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