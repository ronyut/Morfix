<?php

$db = 	mysqli_connect("localhost", "root", "") or die(mysqli_error($db));
		mysqli_select_db($db, "morfix") or die(mysqli_error($db));
		mysqli_query($db, "SET NAMES 'UTF8'");


//////////////////////////////////////////////////////////////////
require('../assets/php/simple_html_dom.php');

//get all the types - (already in the db)

$html = file_get_html('http://arabicverb.com/conjugate/');

foreach($html->find('tr') as $row) {

    $typeName = $row->find('td',2)->plaintext;
	
	echo $typeName."<br>";
}


?>