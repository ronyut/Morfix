<?php

// 3	3	1
if($root2 == $root3){
	$type = "CG1";
}

// ي	و	1
elseif($root2 == "و" && $root3 == "ي"){
	$type = "CW1";
}

// 	4	أ	1
elseif($root2 == "ا"){
	$type = "CZ2";
}

// 	أ	3	1
elseif($root3 == "ا"){
	$type = "CZ3";
}

// 4	3	و
elseif($root1 == "و"){
	$type = "CA1";
}

// 4	3	ي
elseif($root1 == "ي"){
	$type = "CA2";
}

// و	3	1
elseif($root3 == "و"){
	$type = "CD1";
}

// ي	3	1
elseif($root3 == "ي"){
	$type = "CD2";
}

// 4	و	1
elseif($root2 == "و"){
	$type = "CH1";
}

// 4	ي	1
elseif($root2 == "ي"){
	$type = "CH2";
}

// ي	2	أ
elseif($root1 == "ا" && $root3 == "ي"){
	$type = "CW2";
}

// 3	2	أ
elseif($root1 == "ا"){
	$type = "CZ1";
}

// שלמים
else{
	$type = "CS1";
}
?>