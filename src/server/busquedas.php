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
                        <select onchange="btnCambSec()" id="parrInmue">
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
                        <select id="secInmue">
                            <option value="0"></option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="campDat">
                        <p class="negritas">Dirección del inmueble</p>
                        <input type="text" class="direc1" id="direcInmue" />
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
        
        <div class="btnSig1">
            <input type="button" value="Siguiente" onclick="btnfCarac()" class="botones btn btn-primary" />
        </div>
        
        ';
    }
    fuction modifcarcTerreno(){
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
}


?>