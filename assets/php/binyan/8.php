<?php

// 4	4	ض
if($root2 == $root3 && $root1 == "ض"){
	$type = "HG2";
}

// 4	4	2
elseif($root2 == $root3){
	$type = "HG1";
}

// ي	3	و
elseif($root1 == "و" && $root3 == "ي"){
	$type = "HW1";
}

// 	4	3	و
elseif($root1 == "و"){
	$type = "HA1";
}

// و	4	2
elseif($root3 == "و"){
	$type = "HD1";
}

// 5	و	ز
elseif($root1 == "ز" && $root2 == "و"){
	$type = "HH2";
}
	
// ي	و	2
elseif($root2 == "و" && $root3 == "ي"){
	$type = "HW2";
}
	
// 5	و	2
elseif($root2 == "و"){
	$type = "HH1";
}
	
// 	ي	4	2
elseif($root3 == "ي"){
	$type = "HD2";
}
	
// ي	3	د
elseif($root1 == "د" && $root3 == "ي"){
	$type = "HD3";
}
	
// 4	3	د
elseif($root1 == "د"){
	$type = "HS3";
}
	
// 5	ي	ز
elseif($root1 == "ز" && $root2 == "ي"){
	$type = "HH4";
}

// 5	4	ز
elseif($root1 == "ز"){
	$type = "HS4";
}

// 	5	ي	ص
elseif($root1 == "ص" && $root2 == "ي"){
	$type = "HH5";
}

// 5	4	ص
elseif($root1 == "ص"){
	$type = "HS5";
}

// 5	ي	2
elseif($root2 == "ي"){
	$type = "HH3";
}

// أ	و	2
elseif($root2 == "و" && $root3 == "ا"){
	$type = "HW3";
}

// أ	4	2
elseif($root3 == "ا"){
	$type = "HZ4";
}

// 	5	4	أ
// 4	3	أ
elseif($root1 == "ا"){
	$type = "HZ1,HZ2";
}
	
// 5	أ	2
elseif($root2 == "ا"){
	$type = "HZ3";
}

// 4	3	ت
elseif($root1 == "ت"){
	$type = "HS2";
}

// 5	4	ض
elseif($root1 == "ض"){
	$type = "HS6";
}

// 	4	3	ط
elseif($root1 == "ط"){
	$type = "HS7";
}

// 4	3	ظ
elseif($root1 == "ظ"){
	$type = "HS8";
}

// שלמים
else{
	$type = "HS1";
}

?>