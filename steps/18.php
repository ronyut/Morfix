<?php

$db = 	mysqli_connect("localhost", "root", "") or die(mysqli_error($db));
		mysqli_select_db($db, "morfix") or die(mysqli_error($db));
		mysqli_query($db, "SET NAMES 'UTF8'");


//////////////////////////////////////////////////////////	

//נוכחת עבר – נוספת י בסוף (קלת←קלתי)
$opID = 16;

$query = mysqli_query($db, "SELECT * FROM records WHERE (analysisID = '19' OR analysisID = '20')"); // רק נוכחת בעבר
while($row = mysqli_fetch_assoc($query)){
	if($row['content'] == ""){
		continue;
	}
	$fullNew = $row['content']."ي";
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