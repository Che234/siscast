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
							<option value="rango">Fecha</option>
							<option value="dia">Total Dia</option>
							<option value="guardado">Total Guardado</option>
						</select>
					</div>
					<div class="col" id="posicSub">
						<select id="subCampRept">
							<option value="NADA"></option>
						</select>
					</div>
					<div class="col">
						<button class="btn btn-primary" onclick="btnBusRepor()">General
						</button>
						<button class="btn btn-primary" onclick="btnDetRepor()">Detallado
						</button>
						<input type="hidden" value="" id="cambSelect"/>
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
	function mostParroquia(){
        echo'
        	<option value="Capital">Capital</option>
        	<option value="Dr. Alberto Adriani">Dr. Alberto Adriani</option>
        	<option value="Santo Domingo">Santo Domingo</option>
        ';
	}
	function mostUso(){
		echo'
			<option value="Comercial">Comercial</option>
            <option value="Residencial">Residencial</option>
            <option value="Residencial-Comercial">Residencial-Comercial</option>
            <option value="Industrial">Industrial</option>
            <option value="Espacios-Publicos">Espacios Publicos</option>
            <option value="Rural">Rural</option>
		';
	}
	function mostAmbito(){
		echo'
			<option value="Urbano">Urbano</option>
            <option value="Rural">Rural</option>
		';
	}
	function mostTenencia(){
		echo'
			<option value="Municipio">Municipio</option>
            <option value="Comunidad">Comunidad</option>
            <option value="INTU">INTU</option>
            <option value="INTI">INTI</option>
            <option value="Propio">Propio</option>
            <option value="Enfiteusis">Enfiteusis</option>
            <option value="Ocupado">Ocupado</option>
            <option value="Otros">Otros</option>
		';
	}
	function mostRango(){
		echo'<b>Desde</b>
			<select id="diaSub1">
				<option value="NADA">Día</option>
				<option value="01">01</option>
				<option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				<option value="05">05</option>
				<option value="06">06</option>
				<option value="07">07</option>
				<option value="08">08</option>
				<option value="09">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
			</select>
			<select id="mesSub1">
				<option value="NADA">Mes</option>
				<option value="01">01</option>
				<option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				<option value="05">05</option>
				<option value="06">06</option>
				<option value="07">07</option>
				<option value="08">08</option>
				<option value="09">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select>
			<select id="anoSub1">
				<option value="NADA">Año</option>';
				for($i=1970; $i<=2020; $i++){
					echo'<option value="'.$i.'">'.$i.'</option>';
				}
				echo'
			</select>
			</br>
			</br>
			<b>Hasta</b>
			<select id="diaSub2">
				<option value="NADA">Día</option>
				<option value="01">01</option>
				<option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				<option value="05">05</option>
				<option value="06">06</option>
				<option value="07">07</option>
				<option value="08">08</option>
				<option value="09">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
			</select>
			<select id="mesSub2">
				<option value="NADA">Mes</option>
				<option value="01">01</option>
				<option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				<option value="05">05</option>
				<option value="06">06</option>
				<option value="07">07</option>
				<option value="08">08</option>
				<option value="09">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select>
			<select id="anoSub2">
				<option value="NADA">Año</option>';
				for($i=1970; $i<=2020; $i++){
					echo'<option value="'.$i.'">'.$i.'</option>';
				}
				echo'
			</select>
		';
	}
}

?>