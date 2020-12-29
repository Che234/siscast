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
if($accion=="detRepor"){
	include("../f003.php");
	$f3 = new report;

	if(isset($_POST['campReport'])){
    	$f3->campReport= $_POST['campReport'];
	}else{
	    $f3->campReport= "nada";
	}
	if(isset($_POST['subCampRept'])){
    	$f3->subCampRept= $_POST['subCampRept'];
	}else{
	    $f3->subCampRept= "nada";
	}
	if(isset($_POST['valorBuscar'])){
    	$f3->valorBuscar= $_POST['valorBuscar'];
	}else{
	    $f3->valorBuscar= "nada";
	}
	echo'<div id="enlacePdf"></div>';
	$f3->imprimir();
}

if($accion=="cargSub"){
	if(isset($_POST['campReport'])){
		$campReport= $_POST['campReport'];
	}else{
	    $campReport= "nada";
	}

	if($campReport=="usuarios"){
		$repor->mostUsuarios();
	}
	if($campReport=="parroquia"){
		$repor->mostParroquia();
	}
	if($campReport=="uso"){
		$repor->mostUso();
	}
	if($campReport=="ambito"){
		$repor->mostAmbito();
	}
	if($campReport=="tenencia"){
		$repor->mostTenencia();
	}
	if($campReport=="rango"){
		$repor->mostRango();
	}
}
if($accion=="detFecha"){
	include("../f003.php");
	$repor = new report;

	if(isset($_POST['diaSub1'])){
    	$repor->diaSub1= $_POST['diaSub1'];
	}else{
	    $repor->diaSub1= "nada";
	}
	if(isset($_POST['campReport'])){
    	$repor->campReport= $_POST['campReport'];
	}else{
	    $repor->campReport= "nada";
	}
	if(isset($_POST['mesSub1'])){
    	$repor->mesSub1= $_POST['mesSub1'];
	}else{
	    $repor->mesSub1= "nada";
	}
	if(isset($_POST['anoSub1'])){
    	$repor->anoSub1= $_POST['anoSub1'];
	}else{
	    $repor->anoSub1= "nada";
	}
	if(isset($_POST['diaSub2'])){
    	$repor->diaSub2= $_POST['diaSub2'];
	}else{
	    $repor->diaSub2= "nada";
	}
	if(isset($_POST['mesSub2'])){
    	$repor->mesSub2= $_POST['mesSub2'];
	}else{
	    $repor->mesSub2= "nada";
	}
	if(isset($_POST['anoSub2'])){
    	$repor->anoSub2= $_POST['anoSub2'];
	}else{
	    $repor->anoSub2= "nada";
	}

	echo'<div id="enlacePdf"></div>';
	$repor->imprimir();
}

?>