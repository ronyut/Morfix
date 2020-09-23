<?php

// ي	و	3
if($root2 == "و" && $root3 == "ي"){
	$type = "GW1";
}

// ي	4	3
elseif($root3 == "ي"){
	$type = "GD1";
}

// 4	4	3
elseif($root2 == $root3){
	$type = "GG1";
}

// 	5	ي	3
elseif($root2 == "ي"){
	$type = "GH2";
}

// 5	و	3
elseif($root2 == "و"){
	$type = "GH1";
}

// أ	4	3
elseif($root3 == "ا"){
	$type = "GZ1";
}

// שלמים
else{
	$type = "GS1";
}

?>