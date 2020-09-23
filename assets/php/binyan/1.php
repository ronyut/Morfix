<?php

// ליס
if($root == "ليس"){
	$type = "AH5";
	// אל תחליף אותיות או שזה דופק את כל הפועל
	$dontReplace = true;
}

// כפולים יוד
elseif($root2 == "ي" && $root3 == "ي"){
	$type = "AW5";
}

// כפולים פ"ו
elseif($root1 == "و" && $root2 == $root3){
	$type = "AG4";
}

//כפולים רגיל
elseif($root2 == $root3){
	if($ayin == "דמה"){
		$type = "AG1";
	}
	elseif($ayin == "פתחה"){
		$type = "AG2";
	}
	elseif($ayin == "כסרה"){
		$type = "AG3";
	}
	else{
		echo "ע' הפועל בעתיד לא קיימת";
		exit();
	}
}

// 1וא
elseif($root2 == "و" && $root3 == "ا"){
	$type = "AW8";
}

// 1יא
elseif($root2 == "ي" && $root3 == "ا"){
	if($ayin == "פתחה"){
		$type = "AW7";
	}
	elseif($ayin == "כסרה"){
		$type = "AW6";
	}
	else{
		echo "ע' הפועל בעתיד לא קיימת";
		exit();
	}
}

// נל"א רגיל
elseif($root3 == "ا"){
	if($ayin == "דמה"){
		$type = "AZA";
	}
	elseif($ayin == "פתחה"){
		$type = "AZ9,AZB";
	}
	else{
		echo "ע' הפועל בעתיד לא קיימת";
		exit();
	}
}

// א2י
elseif($root1 == "ا" && $root3 == "ي"){
	if($ayin == "פתחה"){
		$type = "AWB";
	}
	elseif($ayin == "כסרה"){
		$type = "AWA";
	}
	else{
		echo "ע' הפועל בעתיד לא קיימת";
		exit();
	}
}

// ו2י
elseif($root1 == "و" && $root3 == "ي"){
	$type = "AW1,AW2";
}

// 1אי
elseif($root2 == "ا" && $root3 == "ي"){
	$type = "AW9";
}

// 1וי
elseif($root2 == "و" && $root3 == "ي"){
	$type = "AW3,AW4";
}

// 1א3
elseif($root2 == "ا"){
	if($ayin == "פתחה"){
		$type = "AZ5,AZ6,,AZ8";
	}
	elseif($ayin == "דמה"){
		$type = "AZ7";
	}
	else{
		echo "ע' הפועל בעתיד לא קיימת";
		exit();
	}
}

// אחד 2 י
elseif($root3 == "ي"){
	if($ayin == "פתחה"){
		$type = "AD2,AD4";
	}
	elseif($ayin == "כסרה"){
		$type = "AD3";
	}
	else{
		echo "ע' הפועל בעתיד לא קיימת";
		exit();
	}
}

// 1ו3
elseif($root2 == "و"){
	if($ayin == "דמה"){
		$type = "AH1,BH1";
	}
	elseif($ayin == "פתחה"){
		$type = "AH3";
	}
	else{
		echo "ע' הפועל בעתיד לא קיימת";
		exit();
	}
}

// 1י3
elseif($root2 == "ي"){
	if($ayin == "פתחה"){
		$type = "AH6";
	}
	elseif($ayin == "כסרה"){
		$type = "AH4";
	}
	else{
		echo "ע' הפועל בעתיד לא קיימת";
		exit();
	}
}

// או3 (used to be: או2)
elseif($root1 == "ا" && $root2 == "و"){
	$type = "AH2";
}

// א 2 3
elseif($root1 == "ا"){
	if($ayin == "דמה"){
		$type = "AZ1,AZ2";
	}
	elseif($ayin == "פתחה"){
		$type = "AZ4";
	}
	elseif($ayin == "כסרה"){
		$type = "AZ3";
	}
	else{
		echo "ע' הפועל בעתיד לא קיימת";
		exit();
	}
}

// ו 2 3
elseif($root1 == "و"){
	$type = "AA3,AA4,AA5"; // מיותר: AA1,AA2,AA7
}

// י 2 3
elseif($root1 == "ي"){
	$type = "AA6";
}

// אחד 2 ו
elseif($root3 == "و"){
	$type = "AD1";
}

// שלמים
else{
	$type = "AS1"; // מיותר: AS2,AS3,AS4,AS5,AS6,AS7
}
?>