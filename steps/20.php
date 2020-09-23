<?php

$db = 	mysqli_connect("localhost", "root", "") or die(mysqli_error($db));
		mysqli_select_db($db, "morfix") or die(mysqli_error($db));
		mysqli_query($db, "SET NAMES 'UTF8'");


//////////////////////////////////////////////////////////	

//מדוברת: גזרת לו"י הם עבר צורת נסי ← נסיוא
$opID = 18;

$query = mysqli_query($db, "SELECT * FROM records WHERE (typeName = 'AD2' OR typeName = 'AD3' OR typeName = 'AD4' OR typeName = 'AW1' OR typeName = 'AW2' OR typeName = 'AWA' OR typeName = 'AWB')
							AND (analysisID = '5' OR analysisID = '6')"); // הם עבר גזרת לוי
while($row = mysqli_fetch_assoc($query)){
	if(preg_match("/عو/", $row['content'])){
		$newString = "عيو";
	}
	else{
		continue;
	}
	$fullNew = preg_replace("/عو/", $newString, $row['content']);
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
	unset($row);
	
	
}

echo "success!";
?>