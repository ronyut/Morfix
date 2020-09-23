<?php

$db = 	mysqli_connect("localhost", "root", "") or die(mysqli_error($db));
		mysqli_select_db($db, "morfix") or die(mysqli_error($db));
		mysqli_query($db, "SET NAMES 'UTF8'");


//////////////////////////////////////////////////////////	

// גזרת הכפולים עבר מדוברת – הוספת י בכמה גופים
$opID = 17;

$query = mysqli_query($db, "SELECT * FROM records WHERE
							(analysisID = '25' OR analysisID = '26' OR analysisID = '27' OR analysisID = '28' OR analysisID = '19' OR analysisID = '20' OR analysisID = '17' OR analysisID = '18' OR analysisID = '13' OR analysisID = '14')
							AND (typeName = 'AG1' OR typeName = 'AG2' OR typeName = 'AG3' OR typeName = 'AG4')"); // גזרת כפולים - אני את אתה אתם אנחנו 
while($row = mysqli_fetch_assoc($query)){
	if(preg_match("/عع/", $row['content'])){
		
	}
	else{
		continue;
	}
	$fullNew = preg_replace("/عع/", "عي", $row['content']);
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