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
						<select id="campReport" onChange="btnCargSub();">
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
						<button class="btn btn-primary" onclick="btnBusRepor()">Generar</button>
					</div>
				</div>
			</div>';
	}
	function cargSub(){
		if($this->campReport =="usuarios"){
			$userBusSQl = "SELECT * FROM usuarios";
			$resUserBus = $link->query();
			$userResBus = $resUserBus->fetch_array();
			echo $userBusSQl;
			for($i = 0; $i < sizeof($userResBus); $i++){
				echo'
					<option value="'.$i.'">"'.$i.'"</option>

				';
			}
		}
	}
}




?>