<?php

$db = 	mysqli_connect("localhost", "root", "") or die(mysqli_error($db));
		mysqli_select_db($db, "morfix") or die(mysqli_error($db));
		mysqli_query($db, "SET NAMES 'UTF8'");


//////////////////////////////////////////////////////////////////
require('../simple_html_dom.php');

//אפשר לעשות גם לזה אוטומטיזציה, שירוץ על כל ה
//types שקיימים

@$type = $_GET['type'];
$fusha = 1;

if(mysqli_num_rows(mysqli_query($db, "SELECT * FROM records WHERE typeName = '$type'")) > 0){
	die("This type already exists in db!");
}

$html = file_get_html('http://arabicverb.com/conjugate/%D9%81%D8%B9%D9%84%D9%85/'.$type);
$i = 0;

foreach($html->find('tr') as $row) {
	$i++;
	if($i <= 2){
		continue;
	}
    $c1 = $row->find('td',0)->plaintext;
    $c2 = $row->find('td',1)->plaintext;
    $c3 = $row->find('td',2)->plaintext;
    $c4 = $row->find('td',3)->plaintext;
    $c5 = $row->find('td',4)->plaintext;
	
	//echo "row".$i.": ".$c1." - ".$c2." - ".$c3." - ".$c4." - ".$c5."<br>";
	
	if($i == 3){ // הוא
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '30', '$c2')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '29', '$c3')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '2', '$c4')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '1', '$c5')");
	}
	
	if($i == 4){ // שניהם
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '32', '$c2')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '31', '$c3')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '4', '$c4')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '3', '$c5')");
	}
	
	if($i == 5){ // הם
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '34', '$c2')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '33', '$c3')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '6', '$c4')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '5', '$c5')");
	}
	
	if($i == 6){ // היא
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '36', '$c2')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '35', '$c3')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '8', '$c4')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '7', '$c5')");
	}
	
	if($i == 7){ // שתיהן
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '38', '$c2')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '37', '$c3')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '10', '$c4')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '9', '$c5')");
	}
	
	if($i == 8){ // הן
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '40', '$c2')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '39', '$c3')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '12', '$c4')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '11', '$c5')");
	}
	
	if($i == 9){ // אתה
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '57', '$c1')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '42', '$c2')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '41', '$c3')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '14', '$c4')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '13', '$c5')");
	}
	
	if($i == 10){ // שניכם
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '58', '$c1')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '44', '$c2')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '43', '$c3')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '16', '$c4')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '15', '$c5')");
	}
	
	if($i == 11){ // אתם
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '59', '$c1')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '46', '$c2')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '45', '$c3')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '18', '$c4')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '17', '$c5')");
	}
	
	if($i == 12){ // את
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '60', '$c2')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '48', '$c3')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '47', '$c4')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '20', '$c5')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '19', '$c5')");
	}
	
	if($i == 13){ // שתיכן
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '61', '$c2')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '50', '$c3')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '49', '$c4')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '22', '$c5')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '21', '$c5')");
	}
	
	if($i == 14){ // אתן
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '62', '$c1')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '52', '$c2')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '51', '$c3')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '24', '$c4')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '23', '$c5')");
	}
	
	if($i == 15){ // אני
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '54', '$c2')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '53', '$c3')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '26', '$c4')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '25', '$c5')");
	}
	
	if($i == 16){ // אנחנו
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '56', '$c2')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '55', '$c3')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '28', '$c4')");
		mysqli_query($db, "INSERT INTO `records`(`typeName`, `isFusha`, `analysisID`, `content`) VALUES ('$type', '$fusha', '27', '$c5')");
	}

   
   
}
echo "success!";


?>