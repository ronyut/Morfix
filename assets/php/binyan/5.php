<?php

// 3	3	2
if($root2 == $root3){
	$type = "EG1";
}

// ي	3	و
elseif($root1 == "و" && $root3 == "ي"){
	$type = "EW1";
}

// 	4	3	و
elseif($root1 == "و"){
	$type = "EA1";
}

// 4	3	ي
elseif($root1 == "ي"){
	$type = "EA2";
}

// و	3	2
elseif($root3 == "و"){
	$type = "ED1";
}

// ي	3	2
elseif($root3 == "ي"){
	$type = "ED2";
}

// 4	و	2
elseif($root2 == "و"){
	$type = "EH1";
}

// 4	ي	2
elseif($root2 == "ي"){
	$type = "EH2";
}

// 4	3	أ
elseif($root1 == "ا"){
	$type = "EZ1";
}

// 4	أ	2
elseif($root2 == "ا"){
	$type = "EZ2";
}

// أ	3	2
elseif($root3 == "ا"){
	$type = "EZ3";
}

// שלמים
else{
	$type = "ES1";
}

?>