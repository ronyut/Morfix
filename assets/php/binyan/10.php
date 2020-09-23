<?php

// ي	ي	4
if($root2 == "ي" && $root3 == "ي"){
	$type = "JW3";
}

// 5	5	4
elseif($root2 == $root3){
	$type = "JG1";
}

// ي	5	و
elseif($root1 == "و" && $root3 == "ي"){
	$type = "JW1";
}

// 6	5	و
elseif($root1 == "و"){
	$type = "JA1";
}

// 6	5	ي
elseif($root1 == "ي"){
	$type = "JA2";
}

// و	5	4
elseif($root3 == "و"){
	$type = "JD1";
}

// ي	5	4
elseif($root3 == "ي"){
	$type = "JD2";
}

// أ	و	4
elseif($root2 == "و" && $root3 == "ا"){
	$type = "JW2";
}

// 5	و	4
elseif($root2 == "و"){
	$type = "JH1,JH2";
}

// 5	ي	4
elseif($root2 == "ي"){
	$type = "JH3";
}

// 6	5	أ
elseif($root1 == "ا"){
	$type = "JZ1";
}

// 6	أ	4
elseif($root2 == "ا"){
	$type = "JZ2";
}

// أ	5	4
elseif($root3 == "ا"){
	$type = "JZ3";
}

// שלמים
else{
	$type = "JS1";
}
?>