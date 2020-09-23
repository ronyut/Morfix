<?php

$analysesIDs = array();
foreach($subject as $guf){
	foreach($tense as $zman){
		foreach($active as $pail){
			$query = mysqli_query($db, "SELECT * FROM analyses WHERE tense = '$zman' AND body = '$guf' AND isPassive = '$pail'") or die(mysqli_error($db));
			while($row = mysqli_fetch_array($query)){
				 $analysesIDs[] = $row['analysisID'];
			}
		}
	}
}

// התאם לשאילתת SQL
$analysesToSQL = "";
if(count($analysesIDs) > 0){
	foreach($analysesIDs as $id){
		$analysesToSQL .= "analysisID = '$id' OR ";
	}
	$analysesToSQL = substr($analysesToSQL, 0, -4);
	unset($row);
}
elseif(count($analysesIDs) == 1){
	$onlyOne = $analysesIDs[0];
	$analysesToSQL .= "analysisID = '$onlyOne'";
}
else{
	echo "~אין תוצאות";
	exit();
}

// אם יש יותר מטייפ אחד
if(strlen($type) > 3){
	$typeSQL = "";
	$type = explode(",", $type);
	foreach($type as $value){
		$typeSQL .= "typeName = '$value' OR ";
	}
	$typeSQL = substr($typeSQL, 0, -4);
}
else{
	$typeSQL = "typeName = '$type'";
}

#######################################################################

//*********************************************************************
// רץ על כל המילים כדי להחליף את פעל באותיות השורש
//*********************************************************************

function replace_root_letters(&$value){
	global $root1;
	global $root2;
	global $root3;
	global $root4;
	global $dontReplace;

	// don't use str_replace!!! use strtsr instead
	/*
	$before = array("ف", "ع", "ل");
	$after  = array($root1, $root2, $root3);
	$value = str_replace($before, $after, $value);
	*/
	
	if(!$dontReplace){
		$replace = array("ف" => $root1, "ع" => $root2, "ل" => $root3, "م" => $root4);
		$value = strtr($value, $replace);
	}
	
}

//*********************************************************************
// הוסף מ"י או מ"ע
//*********************************************************************

function addObjects($allVerbs, $special){
	global $root3;
	global $root4;
	global $objects;
	global $indirects;
	global $selectMusa;
	
	$objected = array();
	
	if(!is_array($selectMusa) && !is_object($selectMusa) && empty($selectMusa)){
		return $objected;
	}
	
	if($selectMusa[0] == "direct"){
		$musaim = $objects;
	}
	elseif($selectMusa[0] == "indirect"){
		$musaim = $indirects;
	}
	
	if ((is_array($allVerbs) || is_object($allVerbs)) && (is_array($musaim) || is_object($musaim))){
		foreach($musaim as $object){
			foreach($allVerbs as $verb){
				// אני מ"י
				if($object == "ني"){
					if(substr($verb, -2) == "ن"){
						$objected[] = $verb."ي";
					}
					// ח'לי -> ח'לאני
					elseif(substr($verb, -2) == "ى" && ($root3 == "ي" || $root4 == "ي") && $special == "past"){
						$objected[] = substr($verb, 0, -2)."ني";
						$objected[] = substr($verb, 0, -2)."نئ";
						$objected[] = substr($verb, 0, -2)."انى";

					}
					elseif(substr($verb, -2) == "ئ" || substr($verb, -2) == "ا" || substr($verb, -2) == "ى"){
						continue;
					}
					else{
						$objected[] = $verb."ني";
						$objected[] = $verb."نئ";
						$objected[] = $verb."نى";
					}
					
				}
				// אנחנו מ"י
				elseif($object == "نا"){
					if(substr($verb, -2) == "ن"){
						$objected[] = $verb."ا";
					}
					// ח'לי -> ח'לאנא
					elseif(substr($verb, -2) == "ى" && ($root3 == "ي" || $root4 == "ي") && $special == "past"){
						$objected[] = substr($verb, 0, -2)."انا";
					}
					elseif(substr($verb, -2) == "ئ" || substr($verb, -2) == "ا" || substr($verb, -2) == "ى"){
						continue;
					}
					else{
						$objected[] = $verb."نا";
					}
					
				}
				// כל השאר - אוטומטי
				else{
					if((substr($verb, -2) == "ى" || substr($verb, -2) == "ا") && ($root3 == "ي" || $root4 == "ي") && $special == "past" && $selectMusa[0] == "direct"){
						$objected[] = substr($verb, 0, -2)."ا".$object;
					}
					elseif(substr($verb, -2) == "ئ" || substr($verb, -2) == "ى"){
						continue;
					}
					// אם המ"י מתחיל ב-ל וגם הפועל נגמר ב-ל
					elseif(substr($verb, -2) == "ل" && substr($object,0, 2) == "ل"){
						$objected[] = substr($verb, 0, -2).$object;
						// פעמיים ל: יקוללהנ
					}
					else{
						$objected[] = $verb.$object;
						//echo "~".$verb.$object;
					}
					
					if(substr($object, -2) == "ي"){
						$objected[] = $verb.$object;
						$objected[] = $verb.substr($object, 0, -2)."ئ";
						$objected[] = $verb.substr($object, 0, -2)."ى";
					}
					
				}
			}
		}
	}
	
	return $objected;
}

//*********************************************************************
// הוסף תחיליות
//*********************************************************************

function addPrefixes($array, $special){
	global $prefixes;
	
	$prefixed = array();
	if ((is_array($prefixes) || is_object($prefixes)) && (is_array($array) || is_object($array))){
		foreach($prefixes as $prefix){
			foreach($array as $verb){
				// אם עתיד - הוסף את כל התחיליות של העתיד כולל ו פ וכולי
				// לא מג'זום
				if($special == "noMajzum"){
					// תחיליות: ב ד ח ה
					if($prefix == "ب" || $prefix == "ح" || $prefix == "ه" || $prefix == "د"){
						// אם האות הראשונה היא א או י אז תמחק אותה
						if(substr($verb, 0, 2) == "ا" || substr($verb, 0, 2) == "ي"){
							$prefixed[] = $prefix.substr($verb, 2);
						}
						if($prefix != "د"){
							$prefixed[] = $prefix.$verb;
						}
					}
					// תחילית מ למדברים: מנרוח
					elseif($prefix == "م"){
						if(substr($verb, 0, 2) == "ن"){
							$prefixed[] = $prefix.$verb;
						}
					}
					// קבל גם את אלה למקרה שהערבי לא יודע דקדוק
					elseif($prefix == "ل" || $prefix == "فل" || $prefix == "س"){
						$prefixed[] = $prefix.$verb;
					}
				}
				// מג'זום
				elseif($special == "majzum"){
					if($prefix == "ل" || $prefix == "فل"){
						$prefixed[] = $prefix.$verb;
					}
				}
				// עבר וציווי
				elseif($special == "general"){
					// אל תוסיף תחיליות
				}
			}
		}
	}
	return $prefixed;
}

//*********************************************************************
// הוסף ו:و ف
//*********************************************************************

function addAnds($array){
	global $prefixes;
	
	$newArray = array();
	if ((is_array($prefixes) || is_object($prefixes)) && (is_array($array) || is_object($array))){
		foreach($array as $verb){
			if(in_array("ف", $prefixes)){
				$newArray[] = "ف".$verb;
			}
			if(in_array("و", $prefixes)){
				$newArray[] = "و".$verb;
			}
		}
	}
	return $newArray;
}

//*********************************************************************
// הוסף א פרוסטטית
//*********************************************************************

function addAlifPros($array){
	global $prefixes;
	
	$newArray = array();
	if ((is_array($prefixes) || is_object($prefixes)) && (is_array($array) || is_object($array))){
		foreach($array as $verb){
			// הוסף א פרוסטטית רק אם האות הראשונה היא לא אם קריאה
			if(substr($verb, 0, 2) == "ا" || substr($verb, 0, 2) == "ي" | substr($verb, 0, 2) == "و"){
				
			}
			else{
				if(in_array("ا", $prefixes)){
					$newArray[] = "ا".$verb;
				}
			}
		}
	}
	return $newArray;
}

//*********************************************************************
// הוסף ש לשלילה
//*********************************************************************

function addNegative($array, $special){
	global $negative;
	
	$newArray = array();
	
	if(!is_array($negative) && !is_object($negative) && empty($negative)){
		return $newArray;
	}
	
	if ((is_array($negative) || is_object($negative)) && (is_array($array) || is_object($array))){
		foreach($array as $verb){
			// הוסף ש לשלילה רק אם האות האחרונה לא מפריעה לה
			if(substr($verb, -2) != "ا" && substr($verb, -2) != "ئ" && substr($verb, -2) != "ى"){
				if(in_array("ش", $negative)){
					// אל תוסיף ש לנוכחת ספרותית
					if(substr($verb, -4) == "ين" && substr($verb, 0, 2) == "ت" && $special == "majzum"){
						continue;
					}
					else{
						$newArray[] = $verb."ش";
					}
				}
			}
		}
	}
	return $newArray;
}

//*********************************************************************
// תקן המזות: ءو הופך ל ؤو וכן: ءي הופך ל ئي ועוד שטויות
//*********************************************************************

function hamzaCorrections(&$value){
	$replace = array("ءي" => "ئي", "ءو" => "ؤو", "ئئ" => "ئي");
	
	if(substr($value, -4) != "يء"){
		$replace["يء"] = "يئ";
	}
	
	if(substr($value, -4) != "وء"){
		$replace["وء"] = "وؤ";
	}
	
	$value = strtr($value, $replace);
	
}
?>