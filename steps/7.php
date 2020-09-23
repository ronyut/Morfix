<?php

$db = 	mysqli_connect("localhost", "root", "") or die(mysqli_error($db));
		mysqli_select_db($db, "morfix") or die(mysqli_error($db));
		mysqli_query($db, "SET NAMES 'UTF8'");


//////////////////////////////////////////////////////////	


//המר إأآ ל-ا

$query = mysqli_query($db, "SELECT * FROM records");
while($row = mysqli_fetch_assoc($query)){
	$replace = array('إ', 'أ', 'آ');
	$newString = str_replace($replace, 'ا', $row['content']);
	$rowID = $row['recordID'];
	
	 mysqli_query($db, "UPDATE records SET `content` = '$newString' WHERE recordID = '$rowID'");
	 mysqli_query($db, "UPDATE types SET `typeComment` = '$rowID' WHERE typeID = '1'");
	 
	 unset($rowID);
	 unset($newString);
}


?>