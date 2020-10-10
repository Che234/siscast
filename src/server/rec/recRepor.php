<?php
include("../reportes.php");

$repor = new reportes;

if(isset($_POST['accion'])){
    $accion= $_POST['accion'];
}else{
    $accion= "nada";
}
if($accion=="fReport"){
	$repor->formRepor();
}
if($accion=="busReport"){
	include("../f003.php");
	$f3 = new report;

	if(isset($_POST['campReport'])){
    	$f3->campReport= $_POST['campReport'];
	}else{
	    $f3->campReport= "nada";
	}
	echo'<div id="enlacePdf"></div>';
	$f3->imprimir();
}


if($accion=="cargSub"){
	if(isset($_POST['campReport'])){
    	$repor->campReport= $_POST['campReport'];
	}else{
	    $repor->campReport= "nada";
	}
	$repor->cargSub();
}

?>