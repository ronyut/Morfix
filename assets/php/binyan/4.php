<?php

// ي	ي	2
if($root2 == "ي" && $root3 == "ي"){
	$type = "DW5";
}

// 3	3	2
elseif($root2 == $root3){
	$type = "DG1";
}

// 	أ	3	2
elseif($root3 == "ا"){
	$type = "DZ3";
}

// 	ي	أ	2
elseif($root2 == "ا" && $root3 == "ي"){
	$type = "DW3";
}

// 4	أ	2
elseif($root2 == "ا"){
	$type = "DZ2";
}

// ي	2	أ
elseif($root1 == "ا" && $root3 == "ي"){
	$type = "DW4";
}

// 3	2	أ
elseif($root1 == "ا"){
	$type = "DZ1";
}

// 4	و	2
elseif($root2 == "و"){
	$type = "DH1";
}

// ا	ي	2
elseif($root2 == "ي" && $root3 == "ا"){
	$type = "DW2";
}

// 4	ي	2
elseif($root2 == "ي"){
	$type = "DH2";
}

// ي	3	و
elseif($root1 == "و" && $root3 == "ي"){
	$type = "DW1";
}

// 4	3	و
elseif($root1 == "و"){
	$type = "DA1";
}

// 4	3	ي
elseif($root1 == "ي"){
	$type = "DA2";
}

// و	3	2
elseif($root3 == "و"){
	$type = "DD1";
}

// ي	3	2
elseif($root3 == "ي"){
	$type = "DD2";
}

// שלמים
else{
	$type = "DS1";
}
?>