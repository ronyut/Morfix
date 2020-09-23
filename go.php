<?php


/************************************************
    MySQL Connect
************************************************/
const DB_NAME = "morfix";
$SERVER_NAME = $_SERVER['SERVER_NAME'];
$local_names = array("localhost");

$db = 	mysqli_connect("localhost", "root", "") or die(mysqli_error($db));
        mysqli_select_db($db, DB_NAME) or die(mysqli_error($db));
        mysqli_query($db, "SET NAMES 'UTF8'");
	
//////////////////////////////////////////////////////////////////

// some functions

function uniord($u) {
    // i just copied this function fron the php.net comments, but it should work fine!
    $k = mb_convert_encoding($u, 'UCS-2LE', 'UTF-8');
    $k1 = ord(substr($k, 0, 1));
    $k2 = ord(substr($k, 1, 1));
    return $k2 * 256 + $k1;
}

function is_arabic($str) {
    if(mb_detect_encoding($str) !== 'UTF-8') {
        $str = mb_convert_encoding($str,mb_detect_encoding($str),'UTF-8');
    }

    /*
    $str = str_split($str); <- this function is not mb safe, it splits by bytes, not characters. we cannot use it
    $str = preg_split('//u',$str); <- this function woulrd probably work fine but there was a bug reported in some php version so it pslits by bytes and not chars as well
    */
    preg_match_all('/.|\n/u', $str, $matches);
    $chars = $matches[0];
    $arabic_count = 0;
    $latin_count = 0;
    $total_count = 0;
    foreach($chars as $char) {
        //$pos = ord($char); we cant use that, its not binary safe 
        $pos = uniord($char);
        //echo $char ." --> ".$pos.PHP_EOL;

        if($pos >= 1536 && $pos <= 1791) {
            $arabic_count++;
        } else if($pos > 123 && $pos < 123) {
            $latin_count++;
        }
        $total_count++;
    }
    if(($arabic_count/$total_count) == 1) {
        // 100% arabic chars, its probably arabic
        return true;
    }
    return false;
}

//////////////////////////////////////////////////////////////////

// some initial variables

@$root = $_POST['root']; // שורש
@$binyan = $_POST['binyan']; // בניין
@$ayin = $_POST['ayin']; // ע הפועל בעתיד
@$active = $_POST['active']; // סביל פעיל
@$tense = $_POST['tense']; // זמנים
@$subject = $_POST['subject']; // נושא
@$selectMusa = $_POST['selectMusa']; // מושא ישיר
@$objects = $_POST['object']; // מושא ישיר
//@$mode = $_POST['mode']; // מדוברת - ספרותית
@$indirects = $_POST['indirect']; // מושא עקיף
@$prefixes = $_POST['prefixes']; // תחיליות
@$negative = $_POST['negative']; // סופית שלילה

// הגדר את אותיות השורש
@$root1 = $root[0].$root[1];
@$root2 = $root[2].$root[3];
@$root3 = $root[4].$root[5];
@$root4 = $root[6].$root[7];

// בגזרות מסוימות אל תחליף את פעל באותיות השורש כי זה ידפוק את הפועל
$dontReplace = false;

//////////////////////////////////////////////////////////////////

if(empty($root) || empty($binyan) || empty($ayin) || empty($active) || empty($tense) || empty($subject)){
	echo "~מלא את כל השדות הדרושים!";
	exit();
}

// the root must be in arabic
if(!is_arabic($root)){
	echo "~מותר לכתוב רק בערבית!";
	exit();
}

if(strlen($root) == 6 || strlen($root) == 8){
	// שורש מרובע
	if(strlen($root) == 8){
		$binyan = $binyan."b";
	}
	require_once "assets/php/binyan/".$binyan.".php";
	require_once "assets/php/analysis.php";
	
	$past = array();
	$imper = array();
	$majzum = array();
	$noMajzum = array();
	
	$query = mysqli_query($db, "SELECT * FROM records WHERE ($typeSQL) AND ($analysesToSQL) ORDER BY content") or die(mysqli_error($db));
	while($row = mysqli_fetch_array($query)){
		// עתיד בלי מג'זום - שים את הפעלים בעתיד במערך נפרד לטיפול המשך - הוספת תחיליות
		if($row['analysisID'] >= 29 && $row['analysisID'] <= 56 && $row['operationID'] != 6 && $row['operationID'] != 1){
			$noMajzum[] = $row['content'];
		}
		// שאר העתיד
		elseif($row['analysisID'] >= 29 && $row['analysisID'] <= 56){
			$majzum[] = $row['content'];
		}
		elseif($row['analysisID'] < 29){
			$past[] = $row['content'];
		}
		else{
			$imper[] = $row['content'];
		}
	}
	
	// מחק דופים
	$past = array_unique($past);
	$imper = array_unique($imper);
	$majzum = array_unique($majzum);
	$noMajzum = array_unique($noMajzum);
	
	//החלף פ-ע-ל באותיות השורש
	array_walk($past, "replace_root_letters");
	array_walk($imper, "replace_root_letters");
	array_walk($majzum, "replace_root_letters");
	array_walk($noMajzum, "replace_root_letters");
	
	// הוסף מ"י או מ"ע
	$past_obj = addObjects($past, "past");
	$imper_obj = addObjects($imper, "ignore");
	$majzum_obj = addObjects($majzum , "ignore");
	$noMajzum_obj = addObjects($noMajzum, "ignore");
	
	// מחק דופים שוב
	$past_obj = array_unique($past_obj);
	$imper_obj = array_unique($imper_obj);
	$majzum_obj = array_unique($majzum_obj);
	$noMajzum_obj = array_unique($noMajzum_obj);
	
	// הוסף תחיליות
	$imper_prefixed = addPrefixes($imper, "general");
	$imper_obj_prefixed = addPrefixes($imper_obj, "general");
	$past_prefixed = addPrefixes($past, "general");
	$past_obj_prefixed = addPrefixes($past_obj, "general");
	$majzum_prefixed = addPrefixes($majzum, "majzum");
	$majzum_obj_prefixed = addPrefixes($majzum_obj, "majzum");
	$noMajzum_obj_prefixed = addPrefixes($noMajzum_obj, "noMajzum");
	$noMajzum_prefixed = addPrefixes($noMajzum, "noMajzum");
		
	// כל הנ"ל ביחד
	$finalArray_0 = array_merge($imper, $imper_obj, $imper_obj_prefixed, $imper_prefixed, $past, $past_obj, $past_prefixed, $past_obj_prefixed, $majzum, $majzum_obj, $majzum_prefixed, $majzum_obj_prefixed, $noMajzum, $noMajzum_obj, $noMajzum_obj_prefixed, $noMajzum_prefixed);
	// רק עבר
	$finalArray_00 = array_merge($past, $past_obj, $past_prefixed, $past_obj_prefixed);
	// לא מג'זום בלבד
	$finalArray_000 = array_merge($noMajzum, $noMajzum_obj, $noMajzum_obj_prefixed, $noMajzum_prefixed);
	
	// מחק דופים שוב
	$finalArray_0 = array_unique($finalArray_0);
	$finalArray_00 = array_unique($finalArray_00);
	$finalArray_000 = array_unique($finalArray_000);
	
	// הוסף ש לשלילה בסוף
	$finalArray_1_1 = addNegative($finalArray_00, "past");
	$finalArray_1_2 = addNegative($finalArray_000, "majzum");
	
	// מחק דופים ומזג את כל המערכים
	$finalArray_A = array_merge($finalArray_0, $finalArray_1_1, $finalArray_1_2);
	$finalArray_A = array_unique($finalArray_A);
	
	// הוסף ו,פ
	$finalArray_2 = addAnds($finalArray_A);
	
	// הוסף א פרוסטטית
	$finalArray_3 = addAlifPros($finalArray_A);
	
	// מחק דופים ומזג את כל המערכים
	$finalArray_B = array_merge($finalArray_A, $finalArray_2, $finalArray_3);
	$finalArray_B = array_unique($finalArray_B);

	// תקן שגיאות אחרונות: המזה מרחפת ויוד -> המזה יוד + יוד וכן לגבי ואו
	array_walk($finalArray_B, "hamzaCorrections");
	
	// מחק דופים ומזג את כל המערכים
	$finalArray = array_unique($finalArray_B);
	
	// הפוך את המערך לטקסט
	$verbsAsString = implode("\n",$finalArray);
	
	// הצג פלט
	echo $verbsAsString;
	
}
else{
	echo "~יש להזין שורש משולש או מרובע בלבד";
	exit();
}


?>