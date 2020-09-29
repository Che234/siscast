<?php




if(isset($_POST['accion'])){
    $accion= $_POST['accion'];
}else{
    $accion= "nada";
}
if(isset($_POST['campReport'])){
    $repor->campReport= $_POST['campReport'];
}else{
    $repor->campReport= "nada";
}


if($accion=="fReport"){
	$repor->formRepor();
}
if($accion=="busReport"){
	include("../f003.php");
	$repor = new report;
	$repor->imprimir();
}

?>