<?php

// כפולים יוד
if($root2 == "ي" && $root3 == "ي"){
	$type = "BW6";
}

// כפולים רגיל
elseif($root2 == $root3){
	$type = "BG1";
}

// אחד א שלוש
elseif($root2 == "ا"){
	$type = "BZ2";
}

// ו 2 י
elseif($root1 == "و" && $root3 == "ي"){
	$type = "BW5";
}

// ו 2 3
elseif($root1 == "و"){
	$type = "BA1";
}

// י 2 3
elseif($root1 == "ي"){
	$type = "BA2";
}

// א 2 י
elseif($root1 == "ا" && $root3 == "ي"){
	$type = "BW2";
}

// א 2 3
elseif($root1 == "ا"){
	$type = "BZ1";
}

// א י 3
elseif($root1 == "ا" && $root2 == "ي"){
	$type = "BW3";
}

// אחד 2 ו
elseif($root3 == "و"){
	$type = "BD1";
}

// אחד 2 י
elseif($root3 == "ي"){
	$type = "BD2";
}

// אחד ו י
elseif($root2 == "و" && $root3 == "ي"){
	$type = "BW1";
}

// אחד ו א
elseif($root2 == "و" && $root3 == "ا"){
	$type = "BW4";
}

// אחד ו 3
elseif($root2 == "و"){
	$type = "BH1";
}

// אחד י א
elseif($root2 == "ي" && $root3 == "ا"){
	$type = "BW7";
}

// אחד י 3
elseif($root2 == "ي"){
	$type = "BH2";
}

// אחד 2 א
elseif($root3 == "ا"){
	$type = "BZ3";
}

// שלמים
else{
	$type = "BS1";
}
?>