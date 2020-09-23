<?php

// 4	4	2
if($root2 == $root3){
	$type = "FG1";
}

// ي	4	و
elseif($root1 == "و" && $root3 == "ي"){
	$type = "FW1";
}

// 	5	4	و
elseif($root1 == "و"){
	$type = "FA1";
}

// و	4	2
elseif($root3 == "و"){
	$type = "FD1";
}

// ي	و	2
elseif($root2 == "و" && $root3 == "ي"){
	$type = "FW2";
}

// ي	4	2
elseif($root3 == "ي"){
	$type = "FD2";
}

// 5	و	2
elseif($root2 == "و"){
	$type = "FH1";
}

// 5	ي	2
elseif($root2 == "ي"){
	$type = "FH2";
}

// 4	3	أ
elseif($root1 == "ا"){
	$type = "FZ1";
}

// 5	أ	2
elseif($root2 == "ا"){
	$type = "FZ2";
}

// أ	4	2
elseif($root3 == "ا"){
	$type = "FZ3";
}

// שלמים
else{
	$type = "FS1";
}

?>