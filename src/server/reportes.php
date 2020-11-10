<?php

class reportes{

	function construct(){
		$campReport=""; 
	}

	function formRepor(){
		echo '<div class="container-fluid">
				<div class="row">
					<div class="col">
						<h2>Elije el reporte que necesitas</h2>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<select id="campReport" onChange="btnCargSub()">
							<option value="NADA"></option>
							<option value="usuarios">Usuarios</option>
							<option value="parroquia">Parroquia</option>
							<option value="uso">Uso</option>
							<option value="ambito">Ambito</option>
							<option value="tenencia">Tenencia</option>
							<option value="dia">Total Dia</option>
							<option value="guardado">Total Guardado</option>
						</select>
					</div>
					<div class="col">
						<select id="subCampRept">
							<option value="NADA"></option>
						</select>
					</div>
					<div class="col">
						<button class="btn btn-primary" onclick="btnBusRepor()">General
						</button>
						<button class="btn btn-primary" onclick="btnBusRepor()">Detallado
						</button>
					</div>
				</div>
			</div>';
	}
	function mostUsuarios(){
		include('../conexion.php');
        session_start();
        $MySql = new conexion;
        $link= $MySql->conectar();

        $busUsuSQL = "SELECT * FROM usuarios";
        $resBusUsu = $link->query($busUsuSQL);

        while($enconUsu = $resBusUsu->fetch_array()){
        	echo'
        		<option value="'.$enconUsu["nick"].'">'.$enconUsu["nick"].'</option>
        	';
        }
	}
}




?>