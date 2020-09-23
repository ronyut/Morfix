<?php

$db = 	mysqli_connect("localhost", "root", "") or die(mysqli_error($db));
		mysqli_select_db($db, "morfix") or die(mysqli_error($db));
		mysqli_query($db, "SET NAMES 'UTF8'");


//////////////////////////////////////////////////////////	

// גזרת הכפולים עבר מדוברת – הוספת י בכמה גופים
$opID = 17;

$query = mysqli_query($db, "SELECT * FROM records WHERE analysisID > 28 AND analysisID < 57 AND analysisID != '47' AND analysisID != '48'");
while($row = mysqli_fetch_assoc($query)){
	if(substr($row['content'], -4) == "ين"){
		
	}
	else{
		continue;
	}
	
	$rowID = $row['recordID'];
	$type = $row['typeName'];
	$isFusha = 0;
	$analysisID = $row['analysisID'];
	
	echo $row['content']."<br>";
	//echo $fullNew."<br>";
	
	//mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`, `operationID`) VALUES ('$type', '$isFusha', '$analysisID', '$fullNew', '$opID')") or die(mysqli_error($db));
	//mysqli_query($db, "UPDATE types SET `typeComment` = '$rowID' WHERE typeID = '1'") or die(mysqli_error($db));
	
	unset($type);
	unset($isFusha);
	unset($analysisID);
	unset($newString);
	unset($row);
	
	
}

echo "success!";
?>