<?php

$db = 	mysqli_connect("localhost", "root", "") or die(mysqli_error($db));
		mysqli_select_db($db, "morfix") or die(mysqli_error($db));
		mysqli_query($db, "SET NAMES 'UTF8'");


//////////////////////////////////////////////////////////	


//מסיר את כל התשכיל מהטבלה

$query = mysqli_query($db, "SELECT * FROM records");
while($row = mysqli_fetch_assoc($query)){
	$remove = array('ِ', 'ُ', 'ٓ', 'ٰ', 'ْ', 'ٌ', 'ٍ', 'ً', 'ّ', 'َ');
	$newString = str_replace($remove, '', $row['content']);
	$rowID = $row['recordID'];
	
	 mysqli_query($db, "UPDATE records SET `content` = '$newString' WHERE recordID = '$rowID'");
	 mysqli_query($db, "UPDATE types SET `typeComment` = '$rowID' WHERE typeID = '1'");
	 
	 unset($rowID);
	 unset($newString);
}


?>