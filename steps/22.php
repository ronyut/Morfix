<?php

$db = 	mysqli_connect("localhost", "root", "") or die(mysqli_error($db));
		mysqli_select_db($db, "morfix") or die(mysqli_error($db));
		mysqli_query($db, "SET NAMES 'UTF8'");


//////////////////////////////////////////////////////////	

//בגזרת לו"י מחק ציווי "פע!"
$opID = 20;

mysqli_query($db, "DELETE FROM records WHERE analysisID = '57' AND (typeName = 'AD2' OR typeName = 'AD3' OR typeName = 'AD4') AND operationID = '4'") or die(mysqli_error($db));

echo "success!";
?>