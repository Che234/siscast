<?php

class constancias{

    function construct(){
        $cedFul="";
        $rifConst="";
        $nomProp="";
        $apelProp="";
        $codTelf="";
        $numText="";
        $direcProp= "";
        $codTelf2 = "";
        $numTelf2= "";
        $parrInmue="";
        $secInmue= "";
        $direcInmue= "";
        $topoConst= "";
        $formaConst="";
        $servPublic="";
        $usoConst= "";
        $tenenConst= "";
        $ocupConst= "";
        $dimeConst="";
        $destConst = "";
        $estConst = "";
        $pareTipoInmue = "";
        $pareAcaInmue = "";
        $pintConst = "";
        $techoConst = "";
        $pisosConst = "";
        $piezConst = "";
        $ventConst = "";
        $puertConst = "";
        $instElect = "";
        $ambConst = "";
        $compConst = "";
        $estConserv ="";
        $obsConst = "";
        $docDebConst = "";
        $direcProtConst = "";
        $numProtConst = "";
        $tomoProtConst = "";
        $folioProtConst ="";
        $protoConst = "";
        $trimProtConst = "";
        $dateProtConst ="";
        $valorProtConst = "";
        $NivConstTotal = "";
        $arConstTotal = "";
        $arTotal = "";
        $arTotalVenta = "";
        $arRestante = "";
        $valorTerreno = "";
        $valorInmueble = "";
        $valorConstruc = "";
        $nortGen = "";
        $alindNort = "";
        $surGen = "";
        $alindSur = "";
        $esteGen = "";
        $alindEste = "";
        $oesteGen = "";
        $alindOeste = "";
        $nortPosVenta = "";
        $alindPosNort = "";
        $surPosVenta = "";
        $alindPosSur = "";
        $estePosVenta = "";
        $alindPosEste = "";
        $oestePosVenta = "";
        $alindPosOeste = "";
        $nortSecDoc = "";
        $alindSecNorte = "";
        $surSecDoc = "";
        $alindSecSur = "";
        $esteSecDoc = "";
        $alindSecEste = "";
        $oesteSecDoc = "";
        $alindSecOeste = "";
        $parte1 ;
        $telfFul2 = "";
        $telfFul = "";
        $regInmue = "";
        $Acue = "";
        $AcueRural = "";
        $AguasSub = "";
        $AguasServ = "";
        $PavFlex = "";
        $PavRig = "";
        $viaEngran ="";
        $acera = "";
        $AlumPublico = "";
        $aseo = "";
        $transPublic = "";
        $pozoSept = "";
        $ElectResidencial = "";
        $ElectriIndust = "";
        $linTelf = "";
        $multa = "";
        $empadro = "";
        $ambInmue = "";
        $arTotal3 = "";
        $NivConstTotal3= "";
        $arConstTotal3= "";
        $arTotal2 = "";
        $NivConstTotal2 ="";
        $arConstTotal2 = "";
        $uniNorte = "";
        $uniSur = "";
        $uniEste = "";
        $uniOeste = "";
        $uniNorte2 = "";
        $uniSur2 = "";
        $uniEste2 = "";
        $uniOeste2 = "";
        $uniNorte3 = "";
        $uniSur3 = "";
        $uniEste3 = "";
        $uniOeste3 = "";
        $campBuscar = "";
    }
        

    function fPropietario(){
        echo'
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
                        <input type="text" class="numText" id="cedConst" onchange="btnRevUsuario()"/>
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
                        <input type="text" class="numText" id="rifN" />
                    </div>
                </td>
                <td >
                    <div class="campDat">
                        <p class="negritas">Nombres</p>
                        <input type="text" id="nomProp" /> 
                    </div>
                </td>
                <td >
                    <div class="campDat">
                        <p class="negritas">Apellido</p>
                        <input type="text" id="apelProp" />
                    </div>
                    
                </td>
            </tr>
            <tr>
                <td>
                    <div class="campDat">
                        <p class="negritas">Telefono</p>
                        <input type="text" class="codigo2" id="codTelf"/>
                        <input type="text" class="numText" id="numTelf"/>
                    </div>
                </td>
                <td colspan="3">
                    <div class="campDat">
                        <p class="negritas">Dirección del propietario</p>
                        <input type="text" class="direc2" id="direcProp" />
                    </div>
                </td>
            </tr>
        </table>
        
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
        <div class="btnSig1">
            <input type="button" value="Siguiente" onclick="btnfCarac()" class="botones btn btn-primary" />
        </div>
        <div id="campGeneral2"></div>';
    }

    function fCarac(){

        $parte1 = array(
            0 => $this->cedFul,
            1 => $this->rifConst,
            2 => $this->nomProp,
            3 => $this->apelProp,
            4 => $this->codTelf,
            5 => $this->numText,
            6 => $this->direcProp,
            7 => $this->codTelf2,
            8 => $this->numTelf2,
            9 => $this->parrInmue,
            10 => $this->secInmue,
            11 => $this->direcInmue,
            12 => $this->topoConst,
            13 => $this->formaConst,
            14 => $this->usoConst,
            15 => $this->tenenConst,
            16 => $this->ocupConst,
            17 => $this->dimeConst,
            18 => $this->regInmue,
            19 => $this->ambInmue
        );
        echo'
        <table border="1px" class="taConst">
            <tr>
                <td colspan="4" class="tiConst">
                    <p class="h1">CARACTERISTICAS DE LAS CONSTRUCCIÓN</p>
                </td>
            </tr>
            <tr>
                <td class="tdConst">
                    <div class="campDat">
                        <p class="negritas">Destino</p>
                        <select id="destConst">
                            <option value="0"></option>
                            <option value="Unifamiliar">Unifamiliar</option>
                            <option value="Bifamiliar">Bifamiliar</option>
                            <option value="Multifamiliar">Multifamiliar</option>
                            <option value="Comercial">Comercial</option>
                            <option value="Industrial">Industrial</option>
                            <option value="Hotel-Posada">Hotel-Posada</option>
                            <option value="Institución Pública">Institución Pública</option>
                            <option value="Espacios Públicos">Espacios Públicos</option>
                        </select>
                    </div>
                </td>
                <td >
                    <div class="campDat">
                        <p class="negritas">Estructura</p>
                        <select id="estConst">
                            <option value="0"></option>
                            <option value="Concreto">Concreto</option>
                            <option value="Acero ">Acero</option>
                            <option value="Concreto-Acero">Concreto-Acero</option>
                            <option value="Paredes-Portantes">Paredes Portantes</option>
                            <option value="Madera">Madera</option>
                            <option value="Prefabricado">Prefabricado</option>
                            <option value="Otros">Otros</option>
                        </select>
                    </div>
                </td>
                <td >
                    <div class="campDat">
                        <p class="negritas">Paredes</p>
                        <select id="pareTipoInmue">
                            <option value="">Tipo</option>
                            <option value="Concreto">Ladrillo</option>
                            <option value="Metalica">Bloque</option>
                            <option value="Madera">Adobe Tapia</option>
                            <option value="Concreto">Bahareque</option>
                            <option value="Metalica">Madera</option>
                            <option value="Madera">Prefabricado</option>
                        </select>
                        <select id="pareAcaInmue">
                            <option value="0">Acabado</option>
                            <option value="Concreto">Lujoso</option>
                            <option value="Metalica">Friso liso</option>
                            <option value="Madera">Friso rustico</option>
                            <option value="Concreto">Obra limpia</option>
                            <option value="Metalica">Sin friso</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="campDat">
                        <p class="negritas">Pintura</p>
                        <select id="pintConst">
                            <option value="0"></option>
                            <option disabled>Pintura C</option>
                            <option value="Caucho">Caucho</option>
                            <option value="Óleo">Óleo</option>
                            <option value="Pasta">Pasta</option>
                            <option value="Abestina">Abestina</option>
                            <option value="Luchada">Luchada</option>
                            <option value="Texturación">Texturación</option>
                            <option disabled>Pintura A</option>
                            <option value="Concreto">Concreto</option>
                            <option value="Metálica">Metálica</option>
                            <option value="Madera">Madera</option>
                            <option value="Varas">Varas</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Estado Conservación</p>
                        <select id="estConserv">
                            <option value="0"></option>
                            <option value="Año de Construcción">Año de Construcción</option>
                            <option value="Año de refacción">Año de refacción</option>
                            <option value="Edad Efectiva">Edad Efectiva</option>
                            <option value="Nro de Planta">Nro de Planta</option>
                            <option value="Nro de Vivienda">Nro de Vivienda</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Techo</p>
                        <select id="techoConst">
                            <option value="0"></option>
                            <option value="Madera-teja">Madera-teja</option>
                            <option value="Placa-teja">Placa-teja</option>
                            <option value="Platabanda">Platabanda</option>
                            <option value="Tejas-riple">Tejas-riple</option>
                            <option value="Aluminio">Aluminio</option>
                            <option value="Acerolit-Asbesto">Acerolit-Asbesto</option>
                            <option value="Paca Tabelon">Paca Tabelon</option>
                            <option value="Placa nevada">Placa nevada</option>
                            <option value="Losacero">Losacero</option>
                            <option value="Zinc">Zinc</option>
                            <option value="Cana teja">Cana teja</option>
                            <option value="Cielo raso">Cielo raso</option>
                            <option value="Raso laminas">Raso laminas</option>
                            <option value="Machimbre">Machimbre</option>
                            <option value="Policarbonato">Policarbonato</option>P
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="campDat">
                        <p class="negritas">Pisos</p>
                        <select id="pisosConst">
                            <option value="0"></option>
                            <option value="Lujoso">Lujoso</option>
                            <option value="Baldosas/Terracota">Baldosas/Terracota</option>
                            <option value="Cerámica">Cerámica</option>
                            <option value="Granito">Granito</option>
                            <option value="Mosaico">Mosaico</option>
                            <option value="Cemento olor">Cemento olor</option>
                            <option value="Cemento rustico">Cemento rustico</option>
                            <option value="Vinil">Vinil</option>
                            <option value="Porcelanato">Porcelanato</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Piezas sanitarias</p>
                        <select id="piezConst">
                            <option value="0"></option>
                            <option value="Porcelana Fina">Porcelana Fina</option>
                            <option value="Porcelana Econ">Porcelana Econ</option>
                            <option value="Bañera">Bañera</option>
                            <option value="Calentador">Calentador</option>
                            <option value="W.C.">W.C.</option>
                            <option value="Bidet">Bidet</option>
                            <option value="Lavamanos">Lavamanos</option>
                            <option value="Ducha">Ducha</option>
                            <option value="Urinario">Urinario</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Ventanas</p>
                        <select id="ventConst">
                            <option value="0"></option>
                            <option value="Vetanal">Vetanal</option>
                            <option value="Celosial">Celosial</option>
                            <option value="Corredora">Corredora</option>
                            <option value="Basculante">Basculante</option>
                            <option value="Batiente">Batiente</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="campDat">
                        <p class="negritas">Puertas</p>
                        <select id="puertConst">
                            <option value="0"></option>
                            <option value="Entamborada Fina">Entamborada Fina</option>
                            <option value="Ent. Economica">Ent. Economica</option>
                            <option value="Madera cepillada">Madera cepillada</option>
                            <option value="Hierro">Hierro</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Instal. Electricas</p>
                        <select id="instElect">
                            <option value="0"></option>
                            <option value="Embutidas">Embutidas</option>
                            <option value="Externa">Externa</option>
                            <option value="Industrial">Industrial</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Ambientes</p>
                        <select id="ambConst">
                            <option value="0"></option>
                            <option value="Dormitorio">Dormitorio</option>
                            <option value="Comedor">Comedor</option>
                            <option value="Sala">Sala</option>
                            <option value="Baños">Baños</option>
                            <option value="Cocina">Cocina</option>
                            <option value="Servicio">Servicio</option>
                            <option value="Oficina">Oficina</option>
                            <option value="Garaje">Garaje</option>
                            <option value="Estacionamiento">Estacionamiento</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="campDat">
                        <p class="negritas">Complementos</p>
                        <select id="compConst">
                            <option value="0"></option>
                            <option value="Ascensor">Ascensor</option>
                            <option value="Aire Acondici.">Aire Acondici.</option>
                            <option value="Rejas">Rejas</option>
                            <option value="Closets">Closets</option>
                            <option value="Porcelana">Porcelana</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Observaciones</p>
                        <textarea id="obsConst"></textarea>
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        
                    </div>
                </td>
            </tr>
        </table>
        <table border="1px" class="taConst">
            <tr>
                <td colspan="3">
                    <p class="h1">DATOS DE PROTOCOLIZACION DEL INMUEBLE</p>
                </td>
            </tr>
            <tr>
                <td class="tdConst">
                    <div class="campDat">
                        <p class="negritas">Documento Debidamente:</p>
                        <input type="text" id="docDebConst"/>
                    </div>
                </td>
                <td class="tdConst">
                    <div class="campDat">
                        <p class="negritas">Dirección:</p>
                        <input type="text" id="direcProtConst"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="tdConst">
                    <div class="campDat">
                        <p class="negritas">Numero:</p>
                        <input type="text" id="numProtConst"/>
                    </div>
                </td>
                <td class="tdConst">
                    <div class="campDat">
                        <p class="negritas">Tomo:</p>
                        <input type="text" id="tomoProtConst"/>
                    </div>
                </td>
                <td class="tdConst">
                    <div class="campDat">
                        <p class="negritas">Folio:</p>
                        <input type="text" id="folioProtConst"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="tdConst">
                    <div class="campDat">
                        <p class="negritas">Protocolo:</p>
                        <input type="text" id="protoConst"/>
                    </div>
                </td>
                <td class="tdConst">
                    <div class="campDat">
                        <p class="negritas">Trimestre:</p>
                        <input type="text" id="trimProtConst"/>
                    </div>
                </td>
                <td class="tdConst">
                    <div class="campDat">
                        <p class="negritas">Fecha:</p>
                        <input type="date" id="dateProtConst"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="tdConst">
                    <div class="campDat">
                        <p class="negritas">Valor del Inmueble:</p>
                        <input type="text" id="valorProtConst"/>
                    </div>
                </td>
            </tr>
        </table>
        <div class="btnSig1">
            <input type="button" value="Siguiente" onclick="btnfLind()" class=" botones btn btn-primary" />
        </div>
        <input type="hidden" id="parte1" value="'.$parte1[0].'|'.$parte1[1].'|'.$parte1[2].'|'.$parte1[3].'|'.$parte1[4].'|'.$parte1[5].'|'.$parte1[6].'|'.$parte1[7].'|'.$parte1[8].'|'.$parte1[9].'|'.$parte1[10].'|'.$parte1[11].'|'.$parte1[12].'|'.$parte1[13].'|'.$parte1[14].'|'.$parte1[15].'|'.$parte1[16].'|'.$parte1[17].'|'.$parte1[18].'|'.$parte1[19].'">
        ';
        }
    function fProtConst(){
        $parte2= array(
            0 => $this->destConst,
            1 => $this->estConst,
            2 => $this->pareTipoInmue,
            3 => $this->pareAcaInmue,
            4 => $this->pintConst,
            5 => $this->techoConst,
            6 => $this->pisosConst,
            7 => $this->piezConst,
            8 => $this->ventConst,
            9 => $this->puertConst,
            10 => $this->instElect,
            11 => $this->ambConst,
            12 => $this->compConst,
            13 => $this->estConserv,
            14 => $this->obsConst,
            15 => $this->docDebConst,
            16 => $this->direcProtConst,
            17 => $this->numProtConst,
            18 => $this->tomoProtConst,
            19 => $this->folioProtConst,
            20 => $this->protoConst,
            21 => $this->trimProtConst,
            22 => $this->dateProtConst,
            23 => $this->valorProtConst
        );
        echo'
        <table border="1px" class="taConst">
            <tr>
                <td colspan="2" class="tiConst">
                    <p class="h1">Linderos</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="negritas">General:</p>
                    <select onchange="actGeneral()" id="lindGeneral">
                        <option value="0"></option>
                        <option value="si">Si</option>
                        <option value="no">No</option>
                    </select>
                </td>
                <td>
                    <div id="lindActGen"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="negritas">Posible Venta:</p>
                    <select onchange="actPosVenta()" id="posVenta">
                        <option value="0"></option>
                        <option value="si">Si</option>
                        <option value="no">No</option>
                    </select>
                </td>
                <td>
                    <div id="lindPosVenta"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="negritas">Segun Documento:</p>
                    <select onchange="actSecDoc()" id="secDoc">
                        <option value="0"></option>
                        <option value="si">Si</option>
                        <option value="no">No</option>
                    </select>
                </td>
                <td>
                    <div id="lindSecDoc"></div>
                </td>
            </tr>
        </table>
        <table border="1px" class="taConst">
            <tr>
                <td colspan="3" class="tiConst">
                    <p class="h1">Áreas del Terreno</p>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="campDat">
                        <p class="negritas">Área Total de Venta</p>
                        <input type="text" id="arTotalVenta" >
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Área restante</p>
                        <input type="text" id="arRestante" >
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Valor del terreno</p>
                        <input type="text" id="valorTerreno" >
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="campDat">
                        <p class="negritas">Valor del Inmueble</p>
                        <input type="text" value="" id="valorInmueble" >
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Valor de la Construcción</p>
                        <input type="text" value="" id="valorConstruc" >
                    </div>
                </td>
            </tr>
        </table>
        <table border="1px" class="taConst">
            <tr>
                <td colspan="3" class="tiConst">
                    <p class="h1">Servicios</p>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="campDat">
                        <p class="negritas">Acueducto:</p>
                        <select class="codigo2" id="Acue">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Acueducto Rural:</p>
                        <select class="codigo2" id="AcueRural">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Aguas Subterráneas:</p>
                        <select class="codigo2" id="AguasSub">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Aguas Servidas:</p>
                        <select class="codigo2" id="AguasServ">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="campDat">
                        <p class="negritas">Pavimento Flexible:</p>
                        <select class="codigo2" id="PavFlex">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Pavimento Rígido:</p>
                        <select class="codigo2" id="PavRig">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Vía Engranzonada:</p>
                        <select class="codigo2" id="viaEngran">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Acera:</p>
                        <select class="codigo2" id="acera">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="campDat">
                        <p class="negritas">Alumbrado Público:</p>
                        <select class="codigo2" id="AlumPublico">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Aseo:</p>
                        <select class="codigo2" id="aseo">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Transporte Público:</p>
                        <select class="codigo2" id="transPublic">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Pozo Séptico:</p>
                        <select class="codigo2" id="pozoSept">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="campDat">
                        <p class="negritas">Electricidad Residencial:</p>
                        <select class="codigo2" id="ElectResidencial">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Electricidad Industrial:</p>
                        <select class="codigo2" id="ElectriIndust">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Línea Telefónica:</p>
                        <select class="codigo2" id="linTelf">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="tdConst">
                    <div class="campDat">
                        <p class="negritas">Numero Expediente:</p>
                        <input type="text" id="nuExp" onchange="veriExpediente()" />
                    </div>
                </td>
                <td>
                    <div class="campDat">
                        <p class="negritas">Multa:</p>
                        <select id="multa"/>
                            <option value="no"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </td>
            </tr>
        </table>
        <div id="campOculto"></div>
            <input type="hidden" id="parte2" value="'.$parte2[0].'|'.$parte2[1].'|'.$parte2[2].'|'.$parte2[3].'|'.$parte2[4].'|'.$parte2[5].'|'.$parte2[6].'|'.$parte2[7].'|'.$parte2[8].'|'.$parte2[9].'|'.$parte2[10].'|'.$parte2[11].'|'.$parte2[12].'|'.$parte2[13].'|'.$parte2[14].'|'.$parte2[15].'|'.$parte2[16].'|'.$parte2[17].'|'.$parte2[18].'|'.$parte2[19].'|'.$parte2[20].'|'.$parte2[21].'|'.$parte2[22].'|'.$parte2[23].'" />
            <input type="hidden" id="parte1" value="'.$this->parte1.'"/>
        <div class="btnSig1">
            <input type="button" value="Guardar" onclick="btnGuardConst()" class=" botones btn btn-primary" />
        </div>';
    }
    function cambSect(){
        if($this->parrInmue=="Capital"){
            echo'
                <option value="0"></option>
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
        }elseif($this->parrInmue=="Dr. Alberto Adriani"){
            echo'
                <option value="0"></option>
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
        }elseif($this->parrInmue =="Santo Domingo"){
            echo'
                <option value="0"></option>
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
    function actGeneral(){
        echo'
            <table border="1px" class="taConst">
                <tr>
                    <td class="tiConst">
                        <p class="negritas">Mts Norte</p>
                        <input type="text" value="" id="nortGen" />
                        <select id="uniNorte">
                            <option></option>
                            <option value="m">m</option>
                            <option value="Lq">Lq</option>
                        </select>
                        <p class="negritas">Alinderado</p>
                        <input type="text" id="alindNort" />
                    </td>
                    <td class="tiConst">
                        <p class="negritas">Mts Sur</p>
                        <input type="text" id="surGen" />
                        <select id="uniSur">
                            <option></option>
                            <option value="m">m</option>
                            <option value="Lq">Lq</option>
                        </select>
                        <p class="negritas">Alinderado</p>
                        <input type="text" id="alindSur" />
                    </td>
                    <td class="tiConst">
                        <p class="negritas">Mts Este</p>
                        <input type="text" id="esteGen" />
                        <select id="uniEste">
                            <option></option>
                            <option value="m">m</option>
                            <option value="Lq">Lq</option>
                        </select>
                        <p class="negritas">Alinderado</p>
                        <input type="text" id="alindEste" />
                    </td>
                    <td class="tiConst">
                        <p class="negritas">Mts Oeste</p>
                        <input type="text" id="oesteGen" />
                        <select id="uniOeste">
                            <option></option>
                            <option value="m">m</option>
                            <option value="Lq">Lq</option>
                        </select>
                        <p class="negritas">Alinderado</p>
                        <input type="text" id="alindOeste" />
                    </td>
                </tr>
            </table>
            <table border="1px" class="taConst">
                <tr>
                    <td >
                        <div class="campDat">
                            <p class="negritas">Área Total</p>
                            <input type="text" id="arTotal" >
                        </div>
                    </td>
                    <td >
                        <div class="campDat">
                            <p class="negritas">Niveles de Construcción</p>
                            <input type="text" id="NivConstTotal" >
                        </div>
                    </td>
                    <td >
                        <div class="campDat">
                            <p class="negritas">Área de Construcción</p>
                            <input type="text" id="arConstTotal" >
                        </div>
                    </td>
                </tr>
            </table>
            <table border="1px" class="taConst">
                <tr>
                    <td>
                        <input type="button" class="btn btn-success" onclick="calLind()" value="Calcular">
                    </td>
                </tr>
            </table>
        ';
    }
    function actPosVenta(){
        echo'
            <table border="1px" class="taConst">
                <tr>
                    <td class="tiConst">
                        <p class="negritas">Mts Norte</p>
                        <input type="text" id="nortPosVenta" />
                        <select id="uniNorte2">
                            <option></option>
                            <option value="m">m</option>
                            <option value="Lq">Lq</option>
                        </select>
                        <p class="negritas">Alinderado</p>
                        <input type="text" id="alindPosNort" />
                    </td>
                    <td class="tiConst">
                        <p class="negritas">Mts Sur</p>
                        <input type="text" id="surPosVenta" />
                        <select id="uniSur2">
                            <option></option>
                            <option value="m">m</option>
                            <option value="Lq">Lq</option>
                        </select>
                        <p class="negritas">Alinderado</p>
                        <input type="text" id="alindPosSur" />
                    </td>
                    <td class="tiConst">
                        <p class="negritas">Mts Este</p>
                        <input type="text" id="estePosVenta" />
                        <select id="uniEste2">
                            <option></option>
                            <option value="m">m</option>
                            <option value="Lq">Lq</option>
                        </select>
                        <p class="negritas">Alinderado</p>
                        <input type="text" id="alindPosEste" />
                    </td>
                    <td class="tiConst">
                        <p class="negritas">Mts Oeste</p>
                        <input type="text" id="oestePosVenta" />
                        <select id="uniOeste2">
                            <option></option>
                            <option value="m">m</option>
                            <option value="Lq">Lq</option>
                        </select>
                        <p class="negritas">Alinderado</p>
                        <input type="text" id="alindPosOeste" />
                    </td>
                </tr>
            </table>
            <table border="1px" class="taConst">
                <tr>
                    <td >
                        <div class="campDat">
                            <p class="negritas">Área Total</p>
                            <input type="disabled" id="arTotal2" >
                        </div>
                    </td>
                    <td >
                        <div class="campDat">
                            <p class="negritas">Niveles de Construcción</p>
                            <input type="text" id="NivConstTotal2" >
                        </div>
                    </td>
                    <td >
                        <div class="campDat">
                            <p class="negritas">Área de Construcción</p>
                            <input type="text" id="arConstTotal2" >
                        </div>
                    </td>
                </tr>
            </table>
            <table border="1px" class="taConst">
                <tr>
                    <td>
                        <input type="button" class="btn btn-success" onclick="calLindVenta()" value="Calcular">
                    </td>
                </tr>
            </table>
        ';
    }
    function SecDoc(){
        echo'
            <table border="1px" class="taConst">
                <tr>
                    <td class="tiConst">
                        <p class="negritas">Mts Norte</p>
                        <input type="number" id="nortSecDoc" />
                        <select id="uniNorte3">
                            <option></option>
                            <option value="m">m</option>
                            <option value="Lq">Lq</option>
                        </select>
                        <p class="negritas">Alinderado</p>
                        <input type="text" id="alindSecNorte" />
                    </td>
                    <td class="tiConst">
                        <p class="negritas">Mts Sur</p>
                        <input type="number" id="surSecDoc" />
                        <select id="uniSur3">
                            <option></option>
                            <option value="m">m</option>
                            <option value="Lq">Lq</option>
                        </select>
                        <p class="negritas">Alinderado</p>
                        <input type="text" id="alindSecSur" />
                    </td>
                    <td class="tiConst">
                        <p class="negritas">Mts Este</p>
                        <input type="number" id="esteSecDoc" />
                        <select id="uniEste3">
                            <option></option>
                            <option value="m">m</option>
                            <option value="Lq">Lq</option>
                        </select>
                        <p class="negritas">Alinderado</p>
                        <input type="text" id="alindSecEste" />
                    </td>
                    <td class="tiConst">
                        <p class="negritas">Mts Oeste</p>
                        <input type="number" id="oesteSecDoc" />
                        <select id="uniOeste3">
                            <option></option>
                            <option value="m">m</option>
                            <option value="Lq">Lq</option>
                        </select>
                        <p class="negritas">Alinderado</p>
                        <input type="text" id="alindSecOeste" />
                    </td>
                </tr>
            </table>
            <table border="1px" class="taConst">
                <tr>
                    <td >
                        <div class="campDat">
                            <p class="negritas">Área Total</p>
                            <input type="text" id="arTotal3" >
                        </div>
                    </td>
                    <td >
                        <div class="campDat">
                            <p class="negritas">Niveles de Construcción</p>
                            <input type="text" id="NivConstTotal3" >
                        </div>
                    </td>
                    <td >
                        <div class="campDat">
                            <p class="negritas">Área de Construcción</p>
                            <input type="text" id="arConstTotal3" >
                        </div>
                    </td>
                </tr>
            </table>
            <table border="1px" class="taConst">
                <tr>
                    <td>
                        <input type="button" class="btn btn-success" onclick="calLindDoc()" value="Calcular">
                    </td>
                </tr>
            </table>
        ';
    }
    function guardConst(){

        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        session_start();

        //LISTA DE INSERT SQL
            
            //BUSQUEDA DE USUARIO
                $userSql = "SELECT id,nick,pass,nombre,apellido,cedula,direccion,telef,correo FROM usuarios where nick='".$_SESSION["usuario"]."'";
                $resultUser= $link->query($userSql);
                $idUser= $resultUser->fetch_assoc();
            //PROPIETARIOS (LISTO)
                $busPropSql = "SELECT * FROM propietarios where cedula='".$this->cedFul."'";
                $resBusProp = $link->query($busPropSql);
                $busPropRes = $resBusProp->fetch_array();
            if($busPropRes["id"]!=0){
                $idProp = $busPropRes["id"];
            }else{
                $propSql = "INSERT INTO propietarios(cedula,rif,nombre,apellido,telef,dir_hab) value('".$this->cedFul."','".$this->rifConst."','".$this->nomProp."','".$this->apelProp."','".$this->telfFul."','".$this->direcProp."')";
                $link->query($propSql);
                $idProp = $link->insert_id;
            }

            //CARACTERISTICAS DEL INMUEBLE (LISTO)
                $carcSql = "INSERT INTO carc_inmueble(topografia,forma,uso,tenencia,ocupante,dimenciones,regimen)value('".$this->topoConst."','".$this->formaConst."','".$this->usoConst."','".$this->tenenConst."','".$this->ocupConst."','".$this->dimeConst."','".$this->regInmue."')";
                $link->query($carcSql);
                $idCarc= $link->insert_id;

            //DATOS DE PROTOCOLIZACION (LISTO)
                $datProtSql= "INSERT INTO datos_protocolizacion(documento,direccion,numero,tomo,folio,protocolo,trimestre,fecha,valor_inmueble)value('".$this->docDebConst."','".$this->direcProtConst."','".$this->numProtConst."','".$this->tomoProtConst."','".$this->folioProtConst."','".$this->protoConst."','".$this->trimProtConst."','".$this->dateProtConst."','".$this->valorProtConst."')";
                $link->query($datProtSql);
                $idProt= $link->insert_id;

            //CARACTERISTICAS DE LA CONSTRUCCION (LISTO)
                $carcConstSql= "INSERT INTO caracteristicas_construccion(destino,estructura,paredes_tipo,paredes_acabado,pintura,techo,pisos,piezas_sanitarias,ventanas,puertas,insta_electricas,complementos,estado_conservacion,ambientes,observ)value('".$this->destConst."','".$this->estConst."','".$this->pareTipoInmue."','".$this->pareAcaInmue."','".$this->pintConst."','".$this->techoConst."','".$this->pisosConst."','".$this->piezConst."','".$this->ventConst."','".$this->puertConst."','".$this->instElect."','".$this->compConst."','".$this->estConserv."','".$this->ambConst."','".$this->obsConst."')";
                $link->query($carcConstSql);
                $idCarcConst = $link->insert_id;

            //TERRENO(LISTO)
                $terrSql= "INSERT INTO terreno(area_total_venta,area_restante,valor_terreno,valor_inmueble,valor_construccion)value('".$this->arTotalVenta."','".$this->arRestante."','".$this->valorTerreno."','".$this->valorInmueble."','".$this->valorConstruc."')";
                $link->query($terrSql);
                $idTerreno= $link->insert_id;

            //LINDEROS DOCUMENTO(LISTO)
                $lindDocSql = "INSERT INTO linderos_documento(norte,sur,este,oeste,alind_n,alind_s,alind_e,alind_o,areaTotal,nivelesConst,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$this->nortSecDoc."','".$this->surSecDoc."','".$this->esteSecDoc."','".$this->oesteSecDoc."','".$this->alindSecNorte."','".$this->alindSecSur."','".$this->alindSecEste."','".$this->alindSecOeste."','".$this->arTotal3."','".$this->NivConstTotal3."','".$this->arConstTotal3."','".$this->uniNorte3."','".$this->uniSur3."','".$this->uniEste3."','".$this->uniOeste3."')";
                $link->query($lindDocSql);
                $idLindDoc= $link->insert_id;

            //LINDEROS GENERAL (LISTO)
                $lindGenSql = "INSERT INTO linderos_general(norte,sur,este,oeste,alind_n,alind_s,alind_e,alind_o,areaTotal,nivelesConst,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$this->nortGen."','".$this->surGen."','".$this->esteGen."','".$this->oesteGen."','".$this->alindNort."','".$this->alindSur."','".$this->alindEste."','".$this->alindOeste."','".$this->arTotal."','".$this->NivConstTotal."','".$this->arConstTotal."','".$this->uniNorte."','".$this->uniSur."','".$this->uniEste."','".$this->uniOeste."')";
                $link->query($lindGenSql);
                $idLindGen = $link->insert_id;
                
            //LINDEROS PARA VENTA (LISTO)
                $lindPosVentaSql = "INSERT INTO linderos_posible_venta(norte,sur,este,oeste,alind_n,alind_s,alind_e,alind_o,areaTotal,nivelesConst,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$this->nortPosVenta."','".$this->surPosVenta."','".$this->estePosVenta."','".$this->oestePosVenta."','".$this->alindPosNort."','".$this->alindPosSur."','".$this->alindPosEste."','".$this->alindPosOeste."','".$this->arTotal2."','".$this->NivConstTotal2."','".$this->arConstTotal2."','".$this->uniNorte2."','".$this->uniSur."','".$this->uniEste."','".$this->uniOeste."')";
                $link->query($lindPosVentaSql);
                $idLindPosVenta = $link->insert_id;
            //SERVICIOS(LISTO)
                $servSql = "INSERT INTO servicios_inmue(acued,acuedRural,aguasSubter,aguasServ,pavimentoFlex,pavimentoRig,viaEngran,acera,alumbradoPub,aseo,transportePublic,pozoSept,electriResi,electriIndus,lineaTelef)value('".$this->Acue."','".$this->AcueRural."','".$this->AguasSub."','".$this->AguasServ."','".$this->PavFlex."','".$this->PavRig."','".$this->viaEngran."','".$this->acera."','".$this->AlumPublico."','".$this->aseo."','".$this->transPublic."','".$this->pozoSept."','".$this->ElectResidencial."','".$this->ElectriIndust."','".$this->linTelf."')";
                $link->query($servSql);
                $idServ= $link->insert_id;
            //INMUEBLE(LISTO)
                $InmuebleSql= "INSERT INTO inmueble(telef,direccion,parroquia,sector,ambito,fk_carac_construccion,fk_protocolizacion,fk_carac_inmuebles,fk_lind_documento,fk_lind_general,fk_lind_pos_venta,fk_terreno,fk_servicios)value('".$this->telfFul2."','".$this->direcInmue."','".$this->parrInmue."','".$this->secInmue."','".$this->ambInmue."',".$idCarcConst.",".$idProt.",".$idCarc.",".$idLindDoc.",".$idLindGen.",".$idLindPosVenta.",".$idTerreno.",".$idServ.")";
                $link->query($InmuebleSql);
                $idInmueble= $link->insert_id;
            //EXPEDIENTE
                $fechaExp= date('Y-m-d');
                $expediSql= "INSERT INTO expediente(fk_inmueble,fk_propietario,fk_usuario,n_expediente,fecha)value(".$idInmueble.",".$idProp.",".$idUser["id"].",".$this->nuExp.",'".$fechaExp."')";
                $link->query($expediSql);
                $idExpediente = $link->insert_id;
              echo'<h1>PROCESO COMPLETADO CON EXITO</h1>
            <div id="iconGuard">
                <img src="./assets/guard.png"/>
            </div>
            <p>Para imprimir la constancia debe ingresar los datos de la Factura</p>
            <table border="1px" class="taConst">
                <tr>
                    
                    <td class="tdConst">
                        <div class="campDat">
                            <p class="negritas">Monto:</p>
                            <input type="text" id="montoFact"/>
                        </div>
                    </td>
                    <td>
                        <div class="campDat">
                            <p class="negritas">Empadronamiento:</p>
                            <select id="empadro"/>
                                <option value="no"></option>
                                <option value="si">Si</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="tdConst">
                        <div class="campDat">
                            <p class="negritas">Numero Factura:</p>
                            <input type="number" id="numFact"/>
                        </div>
                    <td class="tdConst">
                        <div class="campDat">
                            <p class="negritas">Fecha:</p>
                            <input type="date" id="fechFact"/>
                            <input type="hidden" id="idInmueble" value="'.$idInmueble.'">
                            <input type="hidden" id="idProp" value="'.$idProp.'">
                            <input type="hidden" id="nuExp" value="'.$idExpediente.'" />
                            <input type="hidden" id="operacion" value="Nueva Inscripción">
                        </div>
                    </td>
                </tr>';
        //GENERAL
            $sqlIdGen = "SELECT * from linderos_general where id=".$idLindGen."";
            $resGen=$link->query($sqlIdGen);
            $norteGen = $resGen->fetch_assoc();
        //SEGUN DOCUMENTO
            $sqlIdDoc = "SELECT norte from linderos_documento where id=".$idLindDoc."";
            $resDoc=$link->query($sqlIdDoc);
            $norteDoc = $resDoc->fetch_assoc();
        //POSIBLE VENTA
            $sqlIdPosVenta = "SELECT norte from linderos_posible_venta where id=".$idLindPosVenta."";
            $resPosVenta=$link->query($sqlIdPosVenta);
            $nortePosVenta = $resPosVenta->fetch_assoc();


        //IF DEL F002
            if($norteGen['norte']=="nada"){
                if($norteDoc['norte']!="nada"){
                    if($nortePosVenta['norte']=="nada"){
                        if($this->multa =="no"){
                            echo'
                            <tr>
                                <td class="tdConst">
                                    <div class="btnSig1">
                                        <input type="button" value="Imprimir" onclick="btnImprConst()" class=" botones btn btn-primary" />
                                    </div>
                                </td>
                                
                            </tr>
                        ';
                        }
                    }
                }
            }
            echo'</table>';
        //IF DEL F001
            if($norteGen['norte']!="nada"){
                if($norteDoc['norte']!="nada"){
                    if($nortePosVenta['norte']=="nada"){
                        if($this->multa =="no"){
                            echo'
                                <div class="btnSig1">
                                    <input type="button" value="Imprimir" onclick="btnImprConst1()" class=" botones btn btn-primary" />
                                </div>
                            ';
                        }
                    }
                }
            }
        
            
        //IF DEL F003
            if($norteGen['norte']=="nada"){
                if($norteDoc['norte']!="nada"){
                    if($nortePosVenta['norte']!="nada"){
                        if($this->multa=="no"){
                            echo'
                                <div class="btnSig1">
                                    <input type="button" value="Imprimir" onclick="btnImprConst3()" class=" botones btn btn-primary" />
                                </div>
                            ';
                        }
                    }       
                }
            }
                
        // //if para caso Multas
        //     if(($idLindGen==0) && ($idLindDoc==0) && ($idLindPosVenta==0) && ($this->multa!="si")){
        //         echo'
        //             <div class="btnSig1">
        //                 <input type="button" value="Imprimir" onclick="btnImprMulta()" class=" botones btn btn-primary" />
        //             </div>
        //         ';
        //     }
    }
    function revUsuario(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $usuarioSql = "SELECT * FROM propietarios where cedula='".$this->cedFul."'";
        $resUsuario = $link->query($usuarioSql);
        $usuarioRes = $resUsuario->fetch_assoc();
        echo'
        <input type="hidden" value="'.$usuarioRes["cedula"].'" id="cedula"/>
        <input type="hidden" value="'.$usuarioRes["rif"].'" id="rifBus" />
        <input type="hidden" value="'.$usuarioRes["nombre"].'" id="nombreRes" />
        <input type="hidden" value="'.$usuarioRes["apellido"].'" id="apellido" />
        <input type="hidden" value="'.$usuarioRes["telef"].'" id="telef" />
        <input type="hidden" value="'.$usuarioRes["dir_hab"].'" id="dir_hab" />
        ';
    }
    function formImpri(){
        echo'
        <div id="campGeneral">
            <div class="campBuscador">
            <h2>Ingresa el número de expediente</h2>
            <input type="text" id="campBuscar" />
            <input type="button" value="Imprimir" onclick="btnVeriImpr()" class="botones btn btn-primary" />
            </div>
        </div>';
    }
    function veriImpr(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        //BUSQUEDA DE EXPEDIENTE
            $expSql = "SELECT * FROM expediente where n_expediente=".$this->campBuscar."";
            $resExp = $link->query($expSql);
            $expRes = $resExp->fetch_assoc();
        //BUSQUEDA DE PAGO
            $pagSql = "SELECT * FROM pagos where fk_expedient=".$expRes["id"]." ORDER BY fechaPagos DESC";
            $resPagos = $link->query($pagSql);
            $pagosRes = $resPagos->fetch_array();
            $anoPago = explode("-",$pagosRes["fechaPagos"]);
        if($anoPago[0]==date("Y")){
            //BUSQUEDA DE EXPEDIENTE - CONSTANCIA
            $constSql  ="SELECT * FROM constancias INNER JOIN expediente where fk_exped=".$pagosRes["fk_expedient"]."";
            $resConst = $link->query($constSql);
            $constRes = $resConst->fetch_array();
            echo'
            <div class="campDat"><embed id="embedPdf" src="http://localhost/SisCast/assets/constancias/'.$constRes["n_expediente"].'.pdf" type="application/pdf"></div>
            ';
        }
        if($anoPago[0] < date("Y")){
            $this->formImpri();
            echo'<center><br/><b>EL NUMERO DE EXPEDIENTE QUE INGRESO NO HA PAGADO EL AÑO EN CURSO</b></center>';
        }
    }
    function busExpediente(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());

        $expBusSql= "SELECT * FROM expediente where n_expediente=".$this->nuExp." ";
        $resExpBus = $link->query($expBusSql);
        $expBusRes = $resExpBus->fetch_array();
    
        echo'<input type="hidden" value="'.$expBusRes["n_expediente"].'" id="expVerificado" />';
    }
}


?>