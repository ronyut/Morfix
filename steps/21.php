<?php

$db = 	mysqli_connect("localhost", "root", "") or die(mysqli_error($db));
		mysqli_select_db($db, "morfix") or die(mysqli_error($db));
		mysqli_query($db, "SET NAMES 'UTF8'");


//////////////////////////////////////////////////////////	

//למחוק את כל התאים הריקים
$opID = 19;

mysqli_query($db, "DELETE FROM records WHERE content = ''") or die(mysqli_error($db));

echo "success!";
?>