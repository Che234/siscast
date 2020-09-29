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
						<select id="campReport">
							<option value="NADA"></option>
							<option value="usuarios">Usuarios</option>
							<option value="parroquia">Parroquia</option>
							<option value="uso">Uso</option>
							<option value="rural">Rural</option>
							<option value="urbano">Urbano</option>
							<option value="Tenencia">Tenencia</option>
							<option value="dia">Total Dia</option>
							<option value="guardado">Total Guardado</option>
						</select>
					</div>
					<div class="col">
						<button class="btn btn-primary" onclick="btnBusRepor()">Generar</button>
					</div>
				</div>
			</div>';
	}
}




?>