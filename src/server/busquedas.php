<?php

class busquedas{

        var $campBuscar = "";
        var $tipoBuscar = "";
        var $expBuscar = "";
        var $cedula = "";
        var $rif = "";
        var $nomProp = "";
        var $apelProp = "";
        var $telefono = "";
        var $direcProp = "";
        var $cedula2 = "";
        var $telefono2 = "";
        var $parrInmue = "";
        var $secInmue = "";
        var $direcInmue = "";
        var $ambInmue = "";
        var $idInmueble = "";

    function mostBusqueda(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        
        if($this->tipoBuscar=="Expediente"){
            //BUSQUEDA EXPEDIENTE
                $expSql = "SELECT * FROM expediente where n_expediente=".$this->campBuscar."";
                $resBus=$link->query($expSql);
                $expRes = $resBus->fetch_assoc();
                $numExp = $expRes["n_expediente"];
                $idProp = $expRes["fk_propietario"];
                $idInmue = $expRes["fk_inmueble"];
            //BUSQUEDA PROPIETARIO
                $propSql = "SELECT * FROM propietarios where id=".$idProp."";
                $resProp = $link->query($propSql);
                $propRes = $resProp->fetch_assoc();
            //BUSQUEDA INMUEBLE
                $inmueSql = "SELECT * FROM inmueble where id=".$idInmue."";
                $resInmue = $link->query($inmueSql);
                $inmueRes = $resInmue->fetch_assoc();
            //BUSQUEDA CARACTERISTICAS DEL INMUEBLE
                $caracInmueSql = "SELECT * FROM carc_inmueble where id=".$inmueRes["fk_carac_inmuebles"]."";
                $rescaracInmue = $link->query($caracInmueSql);
                $inmueResCarac = $rescaracInmue->fetch_assoc();
            //BUSQUEDA PAGOS
                $pagosSql = "SELECT * FROM pagos where fk_expedient=".$expRes["id"]."";
                $resPago = $link->query($pagosSql);
                $pagoRes = $resPago->fetch_assoc();
            echo'
            <table border="1">
                 <tr>
                     <td colspan="5">
                         <h2>Resultado</h2>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         <b>Propietario</b>
                     </td>
                     <td>
                         <b>Expediente</b>
                     </td>
                     <td>
                         <b>Fecha Pago</b>
                     </td>
                     <td>
                         <b>Uso del Inmueble</b>
                     </td>
                     <td>
                        <b>Acción</b>
                     </td>
                 </tr>
                 <tr>
                     <td>
                         '.$propRes["nombre"].' '.$propRes["apellido"].'
                     </td>
                     <td>
                        '.$this->campBuscar.'
                     </td>
                     <td>';
                    if($pagoRes!=0){
                        echo 'Si ha pagado';
                    }else{
                        echo 'No ha realizado pago';
                    }
                     echo'</td>
                     <td>
                        '.$inmueResCarac["uso"].'
                     </td>
                     <td>
                        <input type"button" value="Ver pagos" class="botones btn btn-primary" />
                        <input type"button" value="Modificar" class="botones btn btn-primary" onclick="mostTipModif()"/>
                        <input type"button" value="Eliminar" class="botones btn btn-primary" />
                        <input type="hidden" value="'.$this->campBuscar.'" id="expBuscar">
                     </td>
                 </tr>
            </table>';
        }
        echo'<div id="MostResult"></div>';
    }
    function mostModif(){
        echo'
            <select id="secciones" onChange="btnFormCambios()">
                <option value="0"></option>
                <option value="Propietario">Datos del Propietario</option>
                <option value="Inmueble">Datos del Inmueble</option>
                <option value="Caract Terreno">Caracteristicas del Terreno</option>
                <option value="Caract Construccion">Caracteristicas de la Construcción</option>
                <option value="Protocolizacion">Datos de Protocolizacion</option>
                <option value="Linderos">Linderos</option>
                <option value="Areas Terreno">Areas del Terreno</option>
                <option value="Servicios">Servicios</option>
                <option value="Inmueble">Datos del Inmueble</option>
                <option value="Inmueble">Datos de la Factura</option>
            </select>
            <div id="modificaciones"></div>';
    }
    function modifInmueble(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        //BUSQUEDA DEL EXPEDIENTE
            $expSql = "SELECT * FROM expediente where n_expediente=".$this->expBuscar."";
            $resExp = $link->query($expSql);
            $expRes = $resExp->fetch_assoc();
        //BUSQUEDA DEL INMUEBLE
            $inmuSql = "SELECT * FROM inmueble where id=".$expRes["id"]."";
            $resInmue = $link->query($inmuSql);
            $inmueRes = $resInmue->fetch_assoc();
        echo'
        
        <table border="1px" class="taConst">
            <tr>
                <td colspan="4" class="tiConst">
                    <p class="h1">DATOS DEL INMUEBLE</p>
                </td>
            </tr>
            <tr>
                <td class="tdConst">
                    <div class="campDat">
                        <p class="negritas">Telefono</p>
                        <input type="text" class="codigo2" id="codTelf2"/>
                        <input type="text" class="numText" id="numTelf2"/>
                    </div>
                </td>
                <td >
                    <div class="campDat">
                        <p class="negritas">Parroquia</p>
                        <select id="parrInmue">
                            <option value="0"></option>
                            <option value="Capital">Capital</option>
                            <option value="Dr. Alberto Adriani">Dr. Alberto Adriani</option>
                            <option value="Santo Domingo">Santo Domingo</option>
                        </select>
                    </div>
                </td>
                <td >
                    <div class="campDat">
                        <p class="negritas">Sector</p>
                        <select id="secInmue" >
                         </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="campDat">
                        <p class="negritas">Dirección del inmueble</p>
                        <input type="text" value="'.$inmueRes["direccion"].'" class="direc1" id="direcInmue" />
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Ambito inmueble</p>
                        <select id="ambInmue">
                            <option value="nada"></option>
                            <option value="Urbano">Urbano</option>
                            <option value="Rural">Rural</option>
                        </select>
                    </div>
                </td>
            </tr>
        </table>
        <input type="hidden" id="telefono" value="'.$inmueRes["telef"].'"/>
        <input type="hidden" id="parr" value="'.$inmueRes["parroquia"].'" />
        <input type="hidden" id="sector" value="'.$inmueRes["sector"].'"/>
        <input type="hidden" id="ambito" value="'.$inmueRes["ambito"].'"/>
        <input type="hidden" id="idInmueble" value="'.$inmueRes["id"].'"/>
        <div class="btnSig1">
            <input type="button" value="Siguiente" onclick="btnActInmue()" class="botones btn btn-primary" />
        </div>
        
        ';
    }
    function modifcarcTerreno(){
        echo'
        <table border="1px" class="taConst">
            <tr>
                <td colspan="4" class="tiConst">
                    <p class="h1">CARACTERISTICAS DEL TERRENO</p>
                </td>
            </tr>
            <tr>
                <td class="tdConst">
                    <div class="campDat">
                        <p class="negritas">Topografía</p>
                        <select id="topoConst">
                            <option value="0"></option>
                            <option value="Terreno Llano">Terreno Llano</option>
                            <option value="Terreno Quebrado">Terreno Quebrado</option>
                        </select>
                    </div>
                </td>
                <td >
                    <div class="campDat">
                        <p class="negritas">Forma</p>
                        <select id="formaConst">
                            <option value="0"></option>
                            <option value="Regular">Regular</option>
                            <option value="Irregular">Irregular</option>
                        </select>
                    </div>
                </td>
                <td >
                    <div class="campDat">
                        <p class="negritas">Regimen</p>
                        <select id="regInmue">
                            <option value="0"></option>
                            <option value="Propiedad Horizontal">Propiedad Horizontal</option>
                            <option value="Condominio">Condominio</option>
                            <option value="Sucesion">Sucesion</option>
                        </select>
                    </div>
                </td>
                <td >
                    <div class="campDat">
                        <p class="negritas">Uso</p>
                        <select id="usoConst">
                            <option value="0"></option>
                            <option value="Comercial">Comercial</option>
                            <option value="Residencial">Residencial</option>
                            <option value="Residencial-Comercial">Residencial-Comercial</option>
                            <option value="Industrial">Industrial</option>
                            <option value="Espacios-Publicos">Espacios Publicos</option>
                            <option value="Rural">Rural</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="campDat">
                        <p class="negritas">Tenencia</p>
                        <select id="tenenConst">
                            <option value="0"></option>
                            <option value="Municipio">Municipio</option>
                            <option value="Comunidad">Comunidad</option>
                            <option value="INTU">INTU</option>
                            <option value="INTI">INTI</option>
                            <option value="Propio">Propio</option>
                            <option value="Enfiteusis">Enfiteusis</option>
                            <option value="Ocupado">Ocupado</option>
                            <option value="Otros">Otros</option>
                        </select>
                    </div>
                </td>
                <td >
                    <div class="campDat">
                        <p class="negritas">Ocupante</p>
                        <select id="ocupConst">
                            <option value="0"></option>
                            <option value="Hab. por Prop.">Hab. por Prop.</option>
                            <option value="Hab. por Inquilino">Hab. por Inquilino</option>
                            <option value="Renta Mensual">Renta Mensual</option>
                            <option value="Fecha de Contrato">Fecha de Contrato</option>
                            <option value="Habitantes No">Habitantes No</option>
                            <option value="Ingreso Familiar">Ingreso Familiar</option>
                        </select>
                    </div>
                </td>
                <td >
                    <div class="campDat">
                        <p class="negritas">Dimensiones</p>
                        <select id="dimeConst">
                            <option value="0"></option>
                            <option value="Frente">Frente</option>
                            <option value="Profundidad">Profundidad</option>
                            <option value="Área">Área</option>
                            <option value="Frente tipo">Frente tipo</option>
                            <option value="Prof tipo">Prof tipo</option>
                        </select>
                    </div>
                </td>
                <td >
                </td>
            </tr>
        </table>
        ';
    }
    
    function modifPropietario(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        //BUSCAR EXPEDIENTE
            $busExped = "SELECT * FROM expediente where n_expediente=".$this->expBuscar."";
            $resExped = $link->query($busExped);
            $expedRes = $resExped->fetch_assoc();
            
        //BUSCAR PROPIETARIO
            $propSql = "SELECT * FROM propietarios where id=".$expedRes["fk_propietario"]."";
            $resProp = $link->query($propSql);
            $propRes = $resProp->fetch_assoc();
        echo'
        <input type="hidden" value="'.$propRes["cedula"].'" id="divCedula" />
        <input type="hidden" value="'.$propRes["rif"].'" id="divRif" />
        <input type="hidden" value="'.$propRes["telef"].'" id="divTelf" />
        <table border="1px" class="taConst">
        <tr>
            <td colspan="4" class="tiConst">
                <p class="h1">DATOS DEL PROPIETARIO</p>
            </td>
        </tr>
        <tr>
            <td class="tdConst">
                <div class="campDat">
                <p class="negritas">Cedula:</p>
                    <select class="codigo2" id="cedR">
                        <option value="0"></option>
                        <option value="V">V</option>
                        <option value="E">E</option>
                    </select>
                    <input type="text" class="numText" value="" id="cedConst" />
                </div>
                
            </td>
            <td>
                <div class="campDat">
                    <p class="negritas">Rif:</p>
                    <select class="codigo2" id="rifR">
                        <option value="0"></option>
                        <option value="V">V</option>
                        <option value="J">J</option>
                    </select>
                    <input type="text" class="numText" value="" id="rifN" />
                </div>
            </td>
            <td >
                <div class="campDat">
                    <p class="negritas">Nombres</p>
                    <input type="text" value="'.$propRes["nombre"].'" id="nomProp" > 
                </div>
            </td>
            <td >
                <div class="campDat">
                    <p class="negritas">Apellido</p>
                    <input type="text" value="'.$propRes["apellido"].'" id="apelProp" />
                </div>
                
            </td>
        </tr>
        <tr>
            <td>
                <div class="campDat">
                    <p class="negritas">Telefono</p>
                    <input type="text" class="codigo2" value="" id="codTelf"/>
                    <input type="text" class="numText" value="" id="numTelf"/>
                </div>
            </td>
            <td colspan="3">
                <div class="campDat">
                    <p class="negritas">Dirección del propietario</p>
                    <input type="text" value="'.$propRes["dir_hab"].'" class="direc2" id="direcProp" />
                </div>
            </td>
        </tr>
        </table>
        <div class="btnSig1">
                <input type="button" value="Actualizar" onclick="btnActProp()" class="botones btn btn-primary" />
        </div>';
    }
    function actProp(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $propSql = "UPDATE propietarios SET cedula='".$this->cedula."',rif='".$this->rif."',nombre='".$this->nomProp."',apellido='".$this->apelProp."',telef='".$this->telefono."',dir_hab='".$this->direcProp."' WHERE cedula='".$this->cedula2."' ";
        $link->query($propSql);
        echo 'ACTUALIZADO CON EXITO';
    }
    function actInmue(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $inmueSql = "UPDATE inmueble SET telef='".$this->telefono2."',direccion='".$this->direcInmue."',parroquia='".$this->parrInmue."',sector='".$this->secInmue."',ambito='".$this->ambInmue."' WHERE id='".$this->idInmueble."' ";
        $link->query($inmueSql);
        echo 'ACTUALIZADO CON EXITO';
    }
    function cambSecMod(){
        if($inmueRes["parroquia"]=="Capital"){
            echo'
                <option value="'.$inmueRes["sector"].'">'.$inmueRes["sector"].'</option>
                <option value="URB RENATO LAPORTA">URB RENATO LAPORTA</option>
                <option value="URB LOS LEONES">URB LOS LEONES</option>
                <option value="EL PIÑALITO">EL PIÑALITO</option>
                <option value="EL PLAN">EL PLAN</option>
                <option value="LA GUADALUPE">LA GUADALUPE</option>
                <option value="JOSE FRLIX RIVAS">JOSE FRLIX RIVAS</option>
                <option value="MORICHITOS">MORICHITOS</option>
                <option value="LA MILAGROSA">LA MILAGROSA</option>
                <option value="TECHO PARA MIS HIJOS">TECHO PARA MIS HIJOS</option>
                <option value="BRISAS DEL PIÑAL">BRISAS DEL PIÑAL</option>
                <option value="LA URIBANTINA"> LA URIBANTINA</option>
                <option value="EL ARAGUANEY">EL ARAGUANEY</option>
                <option value="BRISAS DE URIBANTE">BRISAS DE URIBANTE</option>
                <option value="PROHENSA">PROHENSA</option>
                <option value="CANTA RANA">CANTA RANA</option>
                <option value="CHURURU (TRONCAL)">CHURURU (TRONCAL)</option>
                <option value="LAS PALMERAS">LAS PALMERAS</option>
                <option value="MORONI">MORONI</option>
                <option value="LOS MIRTOS">LOS MIRTOS</option>
                <option value="JUAN PABLO">JUAN PABLO</option>
                <option value="BARRIO COLOMBIA">BARRIO COLOMBIA</option>
                <option value="COSTA RICA">COSTA RICA</option>
                <option value="MAPACA">MAPACA</option>
                <option value="KM 8">KM 8</option>
                <option value="SANTA MARIA">SANTA MARIA</option>
                <option value="TIERRA LINDA">TIERRA LINDA</option>
                <option value="EL PABELLON">EL PABELLON</option>
                <option value="EL OASIS">EL OASIS</option>
                <option value="LOS NARANJOS">LOS NARANJOS</option>
                <option value="GUAFITAS">GUAFITAS</option>
                <option value="DORADAS">DORADAS</option>
                <option value="SAN MIGUEL">SAN MIGUEL</option>
                <option value="EL MONERO">EL MONERO</option>
                <option value="EL CANAL">EL CANAL</option>
                <option value="RECTA DE AYARI">RECTA DE AYARI</option>
                <option value="CAÑO TIGRE">CAÑO TIGRE</option>
                <option value="EL YUYE">EL YUYE</option>
                <option value="LA ISLA DE BENTACOURT">LA ISLA DE BENTACOURT</option>
                <option value="EL TROMPEZON">EL TROMPEZON</option>
                <option value="EL ROISAL">EL ROISAL</option>
                <option value="LA ORQUIDEA">LA ORQUIDEA</option>
                <option value="19 DE ABRIL">19 DE ABRIL</option>
                <option value="COLINAS DE BELLO MONTE">COLINAS DE BELLO MONTE</option>
                <option value="IRCO">IRCO</option>
                <option value="VEGAS DE URIBANTE">VEGAS DE URIBANTE</option>
                <option value="LA VALERIA">LA VALERIA</option>
                <option value="SAN HISIDRO">SAN HISIDRO</option>
                <option value="EL TOPACIO">EL TOPACIO</option>
            ';
        }elseif($inmueRes["parroquia"]=="Dr. Alberto Adriani"){
            echo'
                <option value="'.$inmueRes["sector"].'">'.$inmueRes["sector"].'</option>
                <option value="LA GABARRA (LA MORITA)">LA GABARRA (LA MORITA)</option>
                <option value="LA MORITA">LA MORITA</option>
                <option value="LOS MANGUTOS">LOS MANGUITOS</option>
                <option value="VILLA PARAISO">VILLA PARAISO</option>
                <option value="VALLE LORENA I">VALLE LORENA I</option>
                <option value="VALLE LORENA II">VALLE LORENA II</option>
                <option value="12 DE OCTUBRE">12 DE OCTUBRE</option>
                <option value="NARANJALES">NARANJALES</option>
                <option value="BARRIO LA PAZ">BARRIO LA PAZ</option>
                <option value="LA BOLIVARIANA">LA BOLIVARIANA</option>
                <option value="27 DE FEBRERO PARTE ALTA">27 DE FEBRERO PARTE ALTA</option>
                <option value="27 DE FEBRERO PARTE BAJA">27 DE FEBRERO PARTE BAJA</option>
                <option value="VILLA MORTERREY">VILLA MORTERREY</option>
                <option value="TETEO I">TETEO I</option>
                <option value="TETEO II">TETEO II</option>
                <option value="BUENOS AIRES">BUENOS AIRES</option>
                <option value="CAUCAGUITA">CAUCAGUITA</option>
                <option value="SAN ANTONIO">SAN ANTONIO</option>
                <option value="SANTA LUCIA">SANTA LUCIA</option>
                <option value="EL JORDAN">EL JORDAN</option>
                <option value="RANCHO CHIRE">RANCHO CHIRE</option>
                <option value="EL RENUEVO">EL RENUEVO</option>
                <option value="LA REFORMA">LA REFORMA</option>
                <option value="EL CRISOL">EL CRISOL</option>
                <option value="CUITE">CUITE</option>
                <option value="EL SOCORRO">EL SOCORRO</option>
                <option value="EL TALADRO">EL TALADRO</option>
                <option value="LA VICTORIA">LA VICTORIA</option>
                <option value="LA ZANCUDA">LA ZANCUDA</option>
                <option value="LA COLORADA">LA COLORADA</option>
                <option value="LA ESPUMA">LA ESPUMA</option>
                <option value="LA ROCHELA">LA ROCHELA</option>
            ';
        }elseif($inmueRes["parroquia"] =="Santo Domingo"){
            echo'
                <option value="'.$inmueRes["sector"].'">'.$inmueRes["sector"].'</option>
                <option value="CHURURU VIEJO">CHURURU VIEJO</option>
                <option value="I ETAPA DE SAN LORENZO">I ETAPA DE SAN LORENZO</option>
                <option value="II ETAPA DE SAN LORENZO">II ETAPA DE SAN LORENZO</option>
                <option value="III ETAPA DE SAN LORENZO">III ETAPA DE SAN LORENZO</option>
                <option value="IV ETAPA DE SAN LORENZO">IV ETAPA DE SAN LORENZO</option>
                <option value="LA MANUELITA">LA MANUELITA</option>
                <option value="Z SAN LORENZO">Z SAN LORENZO</option>
                <option value="SANTO DOMINGO">SANTO DOMINGO</option>
                <option value="EL VARIANTE">EL VARIANTE</option>
                <option value="PUENTE URIBANTE">PUENTE URIBANTE</option>
                <option value="LA LAGUNA">LA LAGUNA</option>
                <option value="CESAR DARIO">CESAR DARIO</option>
                <option value="MATA DE CAFÉ">MATA DE CAFÉ</option>
                <option value="EL ZIG ZAG">EL ZIG ZAG</option>
                <option value="LA RAYA">LA RAYA</option>
                <option value="FUNDOS ZAMORANOS">FUNDOS ZAMORANOS</option>
                <option value="LA PALMITA">LA PALMITA</option>
                <option value="MANAURE">MANAURE</option>
                <option value="CAÑO NEGRO">CAÑO NEGRO</option>
                
            ';
        }
    }
}


?>