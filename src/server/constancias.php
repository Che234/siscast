<?php

class constancias{

    function construct(){
        $fechaExp = "";
        $ascensor = "";
        $aireAcond = "";
        $rejas = "";
        $closets = "";
        $porcelana = "";
        $entamFina = "";
        $entamEcon = "";
        $madeCepil = "";
        $hierro = "";
        $porFina = "";
        $porceEcon="";
        $banera= "";
        $calentador="";
        $wc="";
        $bidet="";
        $lavamanos="";
        $ducha="";
        $urinario="";
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
        $numFact = "";
        $uniAreaConst3 = "";
        $uniAreaConst2 = "";
        $uniAreaConst = "";
        $uniAreaT3 = "";
        $uniAreaT2 = "";
        $uniAreaT = "";
        $puntNorte = "";
        $puntSur = "";
        $puntEste = "";
        $puntOeste= "";
        $puntNorte2 = "";
        $puntSur2 = "";
        $puntEste2 = "";
        $puntOeste2 = "";
        $puntNorte3 = "";
        $puntSur3 = "";
        $puntEste3 = "";
        $puntOeste3 = "";
        $telfFull = "";
        $telfFull2 = "";
    }
        
    function secNuvIns(){
        session_start();
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $busUser = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
        $resUser = $link->query($busUser);
        $userRes = $resUser->fetch_array();
        
        $tempUser = "SELECT * FROM user_temp where id=".$userRes["id"]."";
        $resUser = $link->query($tempUser);
        $filaUser = $link->num_rows;
        $userRes = $resUser->fetch_array();
        echo $filaUser;
        if($filaUser==""){
            $tempUser = "INSERT INTO user_temp(userId,temp_ambientes,temp_caraconst,temp_carainmue,temp_complementos,temp_datos_protocolizacion,temp_expediente,temp_factura,temp_inmueble,temp_linderos_documento,temp_linderos_general,temp_linderos_posible_venta,temp_piezas_sanitarias,temp_propietarios,temp_puertas,temp_servicios_inmue,temp_estado_conservacion)value(".$userRes["id"].",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)";
            $link->query($tempUser);
            $userId = $link->insert_id;
        }else{
            $userId = $userRes["id"];
        }

        echo'
            <div class="container-fluid forms">
                <div class="row">
                    <div class="col-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" onclick="btnFormProp()" class="btn btn-info" >DATOS DEL PROPIETARIO</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" onclick="btnFormInmue()" class="btn btn-info" >DATOS DEL INMUEBLE</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" onclick="btnfCarTerreno()" class="btn btn-info" >CARACTERISTICAS DEL TERRENO</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" onclick="btnfcaracConst()" class="btn btn-info" >CARACTERISTICAS DE LAS CONSTRUCCIÓN</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" onclick="btnfprotInmue()" class="btn btn-info" >PROTOCOLIZACION DEL INMUEBLE</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" onclick="actGeneral()" class="btn btn-info" >LINDEROS SEGUN INSPECCIÓN</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" onclick="actSecDoc()" class="btn btn-info" >LINDEROS SEGUN DOCUMENTO</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" onclick="actPosVenta()" class="btn btn-info" >LINDEROS POSIBLE VENTA</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" onclick="btnfServicios()" class="btn btn-info" >SERVICIOS</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" onclick="btnfConserv()" class="btn btn-info" >ESTADO DE CONSERVACIÓN</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" onclick="btnfPiezSant()" class="btn btn-info" >PIEZAS SANITARIAS</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" onclick="btnfAmbi()" class="btn btn-info" >AMBIENTES</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" onclick="btnfpuertas()" class="btn btn-info" >PUERTAS</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" onclick="btnfComple()" class="btn btn-info" >COMPLEMENTOS</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" onclick="btnfFactura()" class="btn btn-info" >FACTURA</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" onclick="btnfexpedient()" class="btn btn-info" >EXPEDIENTE</button>
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-8" id="formsInscrip">
                        
                    </div>
                </div>
            </div>
        ';
    }
    //PROPIETARIOS
    function fPropietario(){
        
        echo'
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <p class="h1">DATOS DEL PROPIETARIO</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Cedula:</p>
                            <select class="codigo2" id="cedR">
                                <option value="NA">NA</option>
                                <option value="V">V</option>
                                <option value="E">E</option>
                            </select>
                            <input type="text" class="numText" id="cedConst" onchange="btnRevUsuario()"/>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Rif:</p>
                            <select class="codigo2" id="rifR">
                                <option value="NA">NA</option>
                                <option value="V">V</option>
                                <option value="J">J</option>
                                <option value="G">G</option>
                                <option value="E">E</option>
                                <option value="P">P</option>
                                <option value="C">C</option>
                            </select>
                        <input type="text" class="numText" id="rifN" />
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Nombres</p>
                        <input type="text" id="nomProp" /> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Apellido</p>
                        <input type="text" id="apelProp" />
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Telef. Hab.</p>
                        <input type="text" class="codigo2" id="codTelf"/>
                        <input type="text" class="numText" id="numTelf"/>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Telef. Celular</p>
                        <input type="text" class="codigo2" id="codTelf2"/>
                        <input type="text" class="numText" id="numTelf2"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="campDat">
                    <p class="negritas">Dirección del propietario</p>
                    <input type="text" class="direc2" id="direcProp" />
                </div>
            </div>
        </div>
        <div class="btnSig1">
            <input type="button" value="Guardar" onclick="btnGuarProp()" class="botones btn btn-primary" />
        </div>
        <div id="campGeneral2"></div>';
    }
    function guardProp(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $propSql = "INSERT INTO temp_propietarios(cedula,rif,nombre,apellido,telef,dir_hab,telef_hab)value('".$this->cedFul."','".$this->rifConst."','".$this->nomProp."','".$this->apelProp."','".$this->telfFull."','".$this->direcProp."','".$this->telfFull2."')";
        $link->query($propSql);
        $idProp= $link->insert_id;
        echo'PROCESO COMPLETADO CON EXITO';
    }
    //INMUEBLE
    function fInmueble(){
        echo'
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <p class="h1">DATOS DEL INMUEBLE</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Parroquia</p>
                        <select onchange="btnCambSec()" id="parrInmue">
                            <option value="0"></option>
                            <option value="Capital">Capital</option>
                            <option value="Dr. Alberto Adriani">Dr. Alberto Adriani</option>
                            <option value="Santo Domingo">Santo Domingo</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Sector</p>
                        <select id="secInmue">
                            <option value="0"></option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Ambito inmueble</p>
                        <select id="ambInmue">
                            <option value="nada"></option>
                            <option value="Urbano">Urbano</option>
                            <option value="Rural">Rural</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Dirección del inmueble</b>
                        <input type="text" class="direc1" id="direcInmue" />
                    </div>
                </div>
            </div>
        </div>
        <div class="btnSig1">
            <input type="button" value="Guardar" onclick="btnGuarInmue()" class="botones btn btn-primary" />
        </div>
        ';
    }
    function guarInmue(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $inmueSql = "INSERT INTO temp_inmueble(direccion,parroquia,sector,ambito)value('".$this->direcInmue."','".$this->parrInmue."','".$this->secInmue."','".$this->ambInmue."')";
        $link->query($inmueSql);
        echo'PROCESO COMPLETADO CON EXITO';
    }
    //CARACTERISTICAS DEL TERRENO
    function fCarTerreno(){
        echo'
        <div class="container-flud">
            <div class="row">
                <div class="col">
                    <p class="h1">CARACTERISTICAS DEL TERRENO</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Topografía</p>
                        <select id="topoConst">
                            <option value="0"></option>
                            <option value="Terreno Llano">Terreno Llano</option>
                            <option value="Terreno Quebrado">Terreno Quebrado</option>
                        </select>
                    </div>
                </div>   
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Forma</p>
                        <select id="formaConst">
                            <option value="0"></option>
                            <option value="Regular">Regular</option>
                            <option value="Irregular">Irregular</option>
                        </select>
                    </div>
                </div>  
                <div class="col">
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
                </div>       
            </div>
            <div class="row">
                <div class="col">
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
                </div>
            </div>
        </div>
        <div class="btnSig1">
            <input type="button" value="Guardar" onclick="btnGuarCarTerr()" class="botones btn btn-primary" />
        </div>';
    }
    function guarCarTerr(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $carcTerrSql = "INSERT INTO temp_carainmue(topografia,forma,uso,tenencia)value('".$this->topoConst."','".$this->formaConst."','".$this->usoConst."','".$this->tenenConst."')";
        $link->query($carcTerrSql);
        echo'PROCESO COMPLETADO CON EXITO';
    }
    //CARACTERISTICAS DE LA CONSTRUCCION
    function fcaracConst(){
        echo'
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <p class="h1">CARACTERISTICAS DE LAS CONSTRUCCIÓN</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="campDat">
                        <b>Destino</b>
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
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Estructura</b>
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
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Paredes</b>
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
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="campDat">
                        <b>Pintura</b>
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
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Techo</b>
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
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Pisos</b>
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
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Ventanas</b>
                        <select id="ventConst">
                            <option value="0"></option>
                            <option value="Vetanal">Vetanal</option>
                            <option value="Celosial">Celosial</option>
                            <option value="Corredora">Corredora</option>
                            <option value="Basculante">Basculante</option>
                            <option value="Batiente">Batiente</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="campDat">
                        <b>Instal. Electricas</b>
                        <select id="instElect">
                            <option value="0"></option>
                            <option value="Embutidas">Embutidas</option>
                            <option value="Externa">Externa</option>
                            <option value="Industrial">Industrial</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Regimen</b>
                        <select id="regInmue">
                            <option value="0"></option>
                            <option value="Propiedad Horizontal">Propiedad Horizontal</option>
                            <option value="Condominio">Condominio</option>
                            <option value="Sucesion">Sucesion</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Observaciones</b>
                        <textarea id="obsConst"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="btnSig1">
            <input type="button" value="Guardar" onclick="btnGuarCaracConst()" class="botones btn btn-primary" />
        </div>
        ';
    }
    function guarCaracConst(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $caracConstSql= "INSERT INTO temp_caraconst(destino,estructura,paredes_tipo,paredes_acabado,pintura,techo,pisos,ventanas,insta_electricas,observ,Regimen)value('".$this->destConst."','".$this->estConst."','".$this->pareTipoInmue."','".$this->pareAcaInmue."','".$this->pintConst."','".$this->techoConst."','".$this->pisosConst."','".$this->ventConst."','".$this->instElect."','".$this->obsConst."','".$this->regInmue."')";
        $link->query($caracConstSql);
    }
    //PROTOCOLIZACION DEL INMUEBLE
    function fprotInmue(){
        echo'
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <p class="h1">DATOS DE PROTOCOLIZACION DEL INMUEBLE</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="campDat">
                        <b>Documento Debidamente:</p>
                        <input type="text" id="docDebConst"/>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Dirección:</p>
                        <input type="text" id="direcProtConst"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Numero:</p>
                        <input type="text" id="numProtConst"/>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Tomo:</p>
                        <input type="text" id="tomoProtConst"/>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Folio:</p>
                        <input type="text" id="folioProtConst"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Protocolo:</p>
                        <select id="protoConst">
                            <option value="No Aplica">No Aplica</option>
                            <option value="Primero">Primero</option>
                            <option value="Segundo">Segundo</option>
                            <option value="Tercero">Tercero</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Trimestre:</p>
                        <select id="trimProtConst">
                            <option value="No Aplica">No Aplica</option>
                            <option value="Primero">Primero</option>
                            <option value="Segundo">Segundo</option>
                            <option value="Tercero">Tercero</option>
                            <option value="Tercero">No Aplica</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Fecha:</p>
                        <input type="date" id="dateProtConst"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Valor del Inmueble:</p>
                        <input type="text" id="valorProtConst"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="btnSig1">
            <input type="button" value="Guardar" onclick="btnGuarProt()" class="botones btn btn-primary" />
        </div>';
    }
    function guarProtInmue(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $protInmueSql ="INSERT INTO temp_datos_protocolizacion(documento,direccion,numero,tomo,folio,protocolo,trimestre,fecha,valor_inmueble)value('".$this->docDebConst."','".$this->direcProtConst."','".$this->numProtConst."','".$this->tomoProtConst."','".$this->folioProtConst."','".$this->protoConst."','".$this->trimProtConst."','".$this->dateProtConst."','".$this->valorProtConst."')";
        $link->query($protInmueSql);
        echo 'PROCESO COMPLETADO CON EXITO';
    }
    //ESTADO DE CONSERVACION
    function fConserv(){
        echo'
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <p class="h1">Estado de Conservación</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <b>Año de Construcción</b>
                    <input type="text" id="ano_construc">
                </div>
                <div class="col">
                    <b>Año de Refacción</b>
                    <input type="text" id="ano_refac">
                </div>
                <div class="col">
                    <b>Edad Efectiva</b>
                    <input type="text" id="edadEfec"/>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <b>Nº de planta</b>
                    <input type="text" id="numPlata" />
                </div>
                <div class="col">
                    <b>Nº de Vivienda</b>
                    <input type="text" id="numVivienda" />
                </div>
            </div>
        </div>
        <div class="btnSig1">
            <input type="button" value="Siguiente" onclick="btnGuarConserv()" class="botones btn btn-primary" />
        </div';
    }
    function guarConserv(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $conservSql = "INSERT INTO temp_estado_conservacion(ano_construccion,ano_refaccion,edad_efectiva,nro_planta,nro_vivienda)value(".$this->ano_construc.",".$this->ano_refac.",".$this->edadEfec.",".$this->numPlata.",".$this->numVivienda.")";
        $link->query($conservSql);
        echo'PROCESO COMPLETADO CON EXITO';
    }
    //PIEZAS SANITARIAS 
    function fPiezSant(){
        echo'
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <p class="h1">Piezas Sanitarias</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <b>Porcelana Fina</b>
                        <select id="porFina">
                            <option value="No"></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Porcelana Econ.</b>
                        <select id="porceEcon">
                            <option value="No"></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Bañera</b>
                        <select id="banera">
                            <option value="No"></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Calentador</b>
                        <select id="calentador">
                            <option value="No"></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <b>W.C.</b>
                        <select id="wc">
                            <option value="No"></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Bidet</b>
                        <select id="bidet">
                            <option value="No"></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Lavamanos</b>
                        <select id="lavamanos">
                            <option value="No"></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Ducha</b>
                        <select id="ducha">
                            <option value="No"></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Urinario</b>
                        <select id="urinario">
                            <option value="No"></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="btnSig1">
                <input type="button" value="Guardar" onclick="btnGuarPizSanit()" class="botones btn btn-primary" />
            </div>
        ';
    }
    function guarPiezSant(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $piezSant="INSERT INTO temp_piezas_sanitarias(porcelana_fina,porcelana_econ,banera,calentador,wc,bidet,lavamanos,ducha,urinario)value('".$this->porFina."','".$this->porceEcon."','".$this->banera."','".$this->calentador."','".$this->wc."','".$this->bidet."','".$this->lavamanos."','".$this->ducha."','".$this->urinario."')";
        $link->query($piezSant);
        echo'PROCESO COMPLETADO CON EXITO';
    }
    //PUERTAS
    function fpuertas(){
        echo '
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <p class="h1">Puertas</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <b>Entamborada Fina</b>
                        <select id="entamFina">
                            <option value="No"></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Ent. Economica</b>
                        <select id="entamEcon">
                            <option value="No"></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Madera cepillada</b>
                        <select id="madeCepil">
                            <option value="No"></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Hierro</b>
                        <select id="hierro">
                            <option value="No"></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="btnSig1">
                <input type="button" value="Guardar" onclick="btnGuarPuertas()" class="botones btn btn-primary" />
            </div>
        ';
    }
    function guarPuertas(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $puertaSql = "INSERT INTO temp_puertas(entamborada_fina,ent_econo,madera_cepi,hierro)value('".$this->entamFina."','".$this->entamEcon."','".$this->madeCepil."','".$this->hierro."')";
        $link->query($puertaSql);
        echo'PROCESO COMPLETADO CON EXITO';
    }
    //AMBIENTES
    function fambien(){
        echo'
        <div class="contaniner-fluid">
            <div class="row">
                <div class="col">
                    <p class="h1">Ambientes</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <b>Dormitorio</b>
                    <input type="text" class="text" id="dormit">
                </div>
                <div class="col">
                    <b>Comedor</b>
                    <input type="text" class="text" id="comedor">
                </div>
                <div class="col">
                    <b>Sala</b>
                    <input type="text" class="text" id="sala">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <b>Baños</b>
                    <input type="text" class="text" id="banos" />
                </div>
                <div class="col">
                    <b>Cocina</b>
                    <input type="text" class="text" id="Cocina" />
                </div>
                <div class="col">
                    <b>Servicio</b>
                    <input type="text" class="text" id="Servicio" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <b>Oficina</b>
                    <input type="text" class="text" id="oficina" />
                </div>
                <div class="col">
                    <b>Garaje</b>
                    <input type="text" class="text" id="garaje" />
                </div>
                <div class="col">
                    <b>Estacionamiento</b>
                    <input type="text" class="text" id="estac" />
                </div>
            </div>
        </div>
        <div class="btnSig1">
            <input type="button" value="Guardar" onclick="btnguarAmbien()" class="botones btn btn-primary" />
        </div>
        ';
    }
    function guarAmbien(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $ambSql = "INSERT INTO temp_ambientes(dormitorio,comedor,sala,banos,cocina,servicio,oficina,garaje,estacionamiento)value('".$this->dormit."','".$this->comedor."','".$this->sala."','".$this->banos."','".$this->Cocina."','".$this->Servicio."','".$this->oficina."','".$this->garaje."','".$this->estac."')";
        $link->query($ambSql);
        echo'PROCESO COMPLETADO CON EXITO';
    }
    //COMPLEMENTOS
    function fConple(){
        echo'
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <p class="h1">Complementos</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <b>Ascensor</b>
                        <select id="ascensor">
                            <option value="No"></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Aire Acond.</b>
                        <select id="aireAcond">
                            <option value="No"></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Rejas</b>
                        <select id="rejas">
                            <option value="No"></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Closets</b>
                        <select id="closets">
                            <option value="No"></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Porcelana</b>
                        <select id="porcelana">
                            <option value="No"></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="btnSig1">
                <input type="button" value="Guardar" onclick="btnGuarComple()" class="botones btn btn-primary" />
            </div>
        ';
    }
    function guarComple(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $compleSql = "INSERT INTO temp_complementos(ascensor,aire_acond,rejas,closets,porcelana)value('".$this->ascensor."','".$this->aireAcond."','".$this->rejas."','".$this->closets."','".$this->porcelana."')";
        $link->query($compleSql);
        echo'PROCESO COMPLETADO CON EXITO';
    }
    //SERVICIOS
    function fServicios(){
        echo'
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <p class="h1">Servicios</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="campDat">
                        <b>Acueducto:</b>
                        <select class="codigo2" id="Acue">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Acueducto Rural:</b>
                        <select class="codigo2" id="AcueRural">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Aguas Subterráneas:</b>
                        <select class="codigo2" id="AguasSub">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="campDat">
                        <b>Pavimento Flexible:</b>
                        <select class="codigo2" id="PavFlex">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Pavimento Rígido:</b>
                        <select class="codigo2" id="PavRig">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Vía Engranzonada:</b>
                        <select class="codigo2" id="viaEngran">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="campDat">
                        <b>Alumbrado Público:</b>
                        <select class="codigo2" id="AlumPublico">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Electricidad Residencial:</b>
                        <select class="codigo2" id="ElectResidencial">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Transporte Público:</b>
                        <select class="codigo2" id="transPublic">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="campDat">
                        <b>Electricidad Industrial:</b>
                        <select class="codigo2" id="ElectriIndust">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Línea Telefónica:</b>
                        <select class="codigo2" id="linTelf">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Aseo:</b>
                        <select class="codigo2" id="aseo">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="campDat">
                        <b>Pozo Séptico:</b>
                        <select class="codigo2" id="pozoSept">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Aguas Servidas:</b>
                        <select class="codigo2" id="AguasServ">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Acera:</b>
                        <select class="codigo2" id="acera">
                            <option value="0"></option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="btnSig1">
            <input type="button" value="Guardar" onclick="btnGuarServicios()" class="botones btn btn-primary" />
        </div>';
    }
    function guarServicios(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $servSql = "INSERT INTO temp_servicios_inmue(acued,acuedRural,aguasSubter,aguasServ,pavimentoFlex,pavimentoRig,viaEngran,acera,alumbradoPub,aseo,transportePublic,pozoSept,electriResi,electriIndus,lineaTelef)value('".$this->Acue."','".$this->AcueRural."','".$this->AguasSub."','".$this->AguasServ."','".$this->PavFlex."','".$this->PavRig."','".$this->viaEngran."','".$this->acera."','".$this->AlumPublico."','".$this->aseo."','".$this->transPublic."','".$this->pozoSept."','".$this->ElectResidencial."','".$this->ElectriIndust."','".$this->linTelf."')";
        $link->query($servSql);
        echo'PROCESO COMPLETADO CON EXITO';
    }
    //EXPEDIENTE
    function fExpedient(){
        echo'
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <b class="h1">EXPEDIENTE</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="campDat">
                            <b>Numero Expediente:</b>
                            <input type="text" id="nuExp" onchange="veriExpediente()" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="campDat">
                            <b>Aplicar:</b>
                            <select id="multa"/>
                                <option value="No Aplica">No Aplica</option>
                                <option value="Multa">Multa</option>
                                <option value="Empadronamiento">Empadronamiento</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="campDat">
                            <b>Fecha:</b>
                            <input type="date" id="fechaExp" />
                        </div>
                    </div>
                </div>
            </div>
            <div id="campOculto">
            
            </div>
            <div class="btnSig1">
                <input type="button" value="Guardar" onclick="btnGuarExpe()" class="botones btn btn-primary" />
            </div>
        ';
    }
    function guarExpe(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $expeSql = "INSERT INTO temp_expediente(no_expediente,condicion,fecha)value('".$this->nuExp."','".$this->multa."','".$this->fechaExp."')";
        $link->query($expeSql);
        echo'PROCESO COMPLETADO CON EXITO';
    }
    //FACTURA
    function fFactura(){
        echo'
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <b class="h1">FACTURA</b>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="campDat">
                        <b>Monto:</b>
                        <input type="text" id="montoFact"/>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Número Factura:</b>
                        <input type="number" id="numFact" onchange="btnVeriFact()"/>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Fecha:</b>
                        <input type="date" id="fechFact"/>
                    </div>
                </div>
            </div>
        </div>
        <div id="campOculto">
            
            </div>
        <div class="btnSig1">
            <input type="button" value="Guardar" onclick="btnGuarFact()" class="botones btn btn-primary" />
        </div>
        ';
    }
    function guarFact(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $factSql = "INSERT INTO temp_factura(monto,n_factura,fecha)value('".$this->montoFact."','".$this->numFact."','".$this->fechaFact."')";
        $link->query($factSql);
        echo'PROCESO COMPLETADO CON EXITO';
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
            16 => $this->ambInmue
        );
        echo'
        
        
        <div class="btnSig1">
            <input type="button" value="Siguiente" onclick="btnfLind()" class=" botones btn btn-primary" />
        </div>
        <input type="hidden" id="parte1" value="'.$parte1[0].'|'.$parte1[1].'|'.$parte1[2].'|'.$parte1[3].'|'.$parte1[4].'|'.$parte1[5].'|'.$parte1[6].'|'.$parte1[7].'|'.$parte1[8].'|'.$parte1[9].'|'.$parte1[10].'|'.$parte1[11].'|'.$parte1[12].'|'.$parte1[13].'|'.$parte1[14].'|'.$parte1[15].'|'.$parte1[16].'">
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
            23 => $this->valorProtConst,
            24 => $this->regInmue
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
                    <p class="negritas">Inspección:</p>
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
        
        <div id="campOculto"></div>
            <input type="hidden" id="parte2" value="'.$parte2[0].'|'.$parte2[1].'|'.$parte2[2].'|'.$parte2[3].'|'.$parte2[4].'|'.$parte2[5].'|'.$parte2[6].'|'.$parte2[7].'|'.$parte2[8].'|'.$parte2[9].'|'.$parte2[10].'|'.$parte2[11].'|'.$parte2[12].'|'.$parte2[13].'|'.$parte2[14].'|'.$parte2[15].'|'.$parte2[16].'|'.$parte2[17].'|'.$parte2[18].'|'.$parte2[19].'|'.$parte2[20].'|'.$parte2[21].'|'.$parte2[22].'|'.$parte2[23].'|'.$parte2[24].'" />
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
    //LINDERO SEGUN INSPECCIÓN
    function actGeneral(){
        echo'
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <b class="h1">LINDEROS SEGÚN INSPECCIÓN</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <select id="puntNorte">
                            <option value="Norte">Norte</option>
                            <option value="NorteEste">NortEste</option>
                        </select>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-4">
                                <input type="number" class="text" value="" id="nortGen" />
                                <select id="uniNorte">
                                    <option></option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <b>Alinderado</b>
                                <input type="text" class="text" id="alindNort" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <select id="puntSur">
                            <option value="Sur">Sur</option>
                            <option value="SurEste">SurEste</option>
                        </select>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-4">
                                <input type="number" class="text" id="surGen" />
                                <select id="uniSur">
                                    <option></option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <b>Alinderado</b>
                                <input type="text" class="text" id="alindSur" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <select id="puntEste">
                            <option value="Este">Este</option>
                            <option value="SurOeste">SurOeste</option>
                        </select>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-4">
                                <input type="number" class="text" id="esteGen" />
                                <select id="uniEste">
                                    <option></option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <b>Alinderado</b>
                                <input type="text" class="text" id="alindEste" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <select id="puntOeste">
                            <option value="Oeste">Oeste</option>
                            <option value="NortOeste">NortOeste</option>
                        </select>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-4">
                                <input type="number" class="text" id="oesteGen" />
                                <select id="uniOeste">
                                    <option></option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <b>Alinderado</b>
                                <input type="text" class="text" id="alindOeste" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="campDat">
                            <b>Área Total</b>
                            <input type="text" class="text" id="arTotal" >
                            <select id="uniAreaT">
                                <option value="No Aplica">No Aplica</option>
                                <option value="m2">m2</option>
                                <option value="Ha">Ha</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="campDat">
                            <b>Niveles de Construcción</b>
                            <input type="text" class="text" id="NivConstTotal" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="campDat">
                            <b>Área de Construcción</b>
                            <input type="text" class="text" id="arConstTotal" >
                            <select id="uniAreaConst">
                                <option value="No Aplica">No Aplica</option>
                                <option value="m2">m2</option>
                                <option value="Ha">Ha</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <input type="button" class="btn btn-success" onclick="calLind()" value="Calcular">
                    </div>
                </div>
            </div>
            <div class="btnSig1">
                <input type="button" value="Guardar" onclick="btnGuarGeneral()" class="botones btn btn-primary" />
            </div>
        ';
    }
    function guarGeneral(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        if($this->puntNorte=="Norte"){
            $Norte = $this->nortGen;
            $norEste = "nada";
        }else{
            $Norte = "nada";
            $norEste = $this->nortGen;
        }
        if($this->puntSur=="Sur"){
            $Sur = $this->surGen;
            $SurEste = "nada";
        }else{
            $Sur = "nada";
            $SurEste = $this->surGen;
        }
        if($this->puntEste=="Este"){
            $Este = $this->esteGen;
            $SurOeste = "nada";
        }else{
            $Este = "nada";
            $SurOeste = $this->esteGen;
        }
        if($this->puntOeste=="Oeste"){
            $Oeste = $this->oesteGen;
            $NortOeste = "nada";
        }else{
            $Oeste = "nada";
            $NortOeste = $this->oesteGen;
        }
        $lindGen = "INSERT INTO linderos_general(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$Norte."','".$norEste."','".$Sur."','".$SurEste."','".$Este."','".$SurOeste."','".$Oeste."','".$NortOeste."','".$this->alindNort."','".$this->alindSur."','".$this->alindEste."','".$this->alindOeste."','".$this->arTotal."','".$this->uniAreaT."','".$this->NivConstTotal."','".$this->uniAreaConst."','".$this->arConstTotal."','".$this->uniNorte."','".$this->uniSur."','".$this->uniEste."','".$this->uniOeste."')";
        $link->query($lindGen);
        echo'PROCESO COMPLETADO CON EXITO';
    }
    //LINDEROS POSIBLE VENTA
    function actPosVenta(){
        echo'

        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <b class="h1">LINDEROS POSIBLE VENTA</b>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <select id="puntNorte2">
                        <option value="Norte">Norte</option>
                        <option value="NorteEste">NortEste</option>
                    </select>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-4">
                            <input type="text" class="text" id="nortPosVenta" />
                            <select id="uniNorte2">
                                <option></option>
                                <option value="m">m</option>
                                <option value="Lq">Lq</option>
                                <option value="Ld">Ld</option>
                                <option value="otros">otros</option>
                            </select>
                        </div>
                        <div class="col-8">
                            <b>Alinderado</b>
                            <input type="text" class="text" id="alindPosNort" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <select id="puntSur2">
                        <option value="Sur">Sur</option>
                        <option value="SurEste">SurEste</option>
                    </select>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-4">
                            <input type="text" class="text" id="surPosVenta" />
                            <select id="uniSur2">
                                <option></option>
                                <option value="m">m</option>
                                <option value="Lq">Lq</option>
                                <option value="Ld">Ld</option>
                                <option value="otros">otros</option>
                            </select>
                        </div>
                        <div class="col-8">
                            <b>Alinderado</b>
                            <input type="text" class="text" id="alindPosSur" />
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <select id="puntEste2">
                        <option value="Este">Este</option>
                        <option value="SurOeste">SurOeste</option>
                    </select>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-4">
                            <input type="text" class="text" id="estePosVenta" />
                            <select id="uniEste2">
                                <option></option>
                                <option value="m">m</option>
                                <option value="Lq">Lq</option>
                                <option value="Ld">Ld</option>
                                <option value="otros">otros</option>
                            </select>
                        </div>
                        <div class="col-8">
                            <b>Alinderado</b>
                            <input type="text" class="text" id="alindPosEste" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <select id="puntOeste2">
                        <option value="Oeste">Oeste</option>
                        <option value="NortOeste">NortOeste</option>
                    </select>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-4">
                            <input type="text" class="text" id="oestePosVenta" />
                            <select id="uniOeste2">
                                <option></option>
                                <option value="m">m</option>
                                <option value="Lq">Lq</option>
                                <option value="Ld">Ld</option>
                                <option value="otros">otros</option>
                            </select>
                        </div>
                        <div class="col-8">
                            <b>Alinderado</b>
                            <input type="text" class="text"id="alindPosOeste" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row" > 
                <div class="col">
                    <div class="campDat">
                        <b>Área Total</b>
                        <input type="text" class="text" id="arTotal2" >
                        <select id="uniAreaT2">
                            <option value="No Aplica">No Aplica</option>
                            <option value="m2">m2</option>
                            <option value="Ha">Ha</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Niveles de Construcción</b>
                        <input type="text" class="text" id="NivConstTotal2" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="campDat">
                        <b>Área de Construcción</b>
                        <input type="text" class="text" id="arConstTotal2" >
                        <select id="uniAreaConst2">
                            <option value="No Aplica">No Aplica</option>
                            <option value="m2">m2</option>
                            <option value="Ha">Ha</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <input type="button" class="btn btn-success" onclick="calLindVenta()" value="Calcular">
                </div>
            </div>
        </div>
        <div class="btnSig1">
            <input type="button" value="Guardar" onclick="btnGuarPosVenta()" class="botones btn btn-primary" />
        </div>
        ';
    }
    function guarPosVenta(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        if($this->puntNorte2=="Norte"){
            $Norte2 = $this->nortPosVenta;
            $norEste2 = "nada";
        }else{
            $Norte2 = "nada";
            $norEste2 = $this->nortPosVenta;
        }
        if($this->puntSur2=="Sur"){
            $Sur2 = $this->surPosVenta;
            $SurEste2 = "nada";
        }else{
            $Sur2 = "nada";
            $SurEste2 = $this->surPosVenta;
        }
        if($this->puntEste2=="Este"){
            $Este2 = $this->estePosVenta;
            $SurOeste2 = "nada";
        }else{
            $Este2 = "nada";
            $SurOeste2 = $this->estePosVenta;
        }
        if($this->puntOeste2=="Oeste"){
            $Oeste2 = $this->oestePosVenta;
            $NortOeste2 = "nada";
        }else{
            $Oeste2 = "nada";
            $NortOeste2 = $this->oestePosVenta;
        }
        $lindPosVentaSql = "INSERT INTO temp_linderos_posible_venta(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$Norte2."','".$norEste2."','".$Sur2."','".$SurEste2."','".$Este2."','".$SurOeste2."','".$Oeste2."','".$NortOeste2."','".$this->alindPosNort."','".$this->alindPosSur."','".$this->alindPosEste."','".$this->oestePosVenta."','".$this->arTotal2."','".$this->uniAreaT2."','".$this->NivConstTotal2."','".$this->uniAreaConst2."','".$this->arConstTotal2."','".$this->uniNorte2."','".$this->uniSur2."','".$this->uniEste2."','".$this->uniOeste2."')";
        $link->query($lindPosVentaSql);
        $idLindPosVenta = $link->insert_id;
        echo'PROCESO COMPLETADO CON EXITO';
    }
    //LINDEROS SEGUN DOCUMENTO
    function SecDoc(){
        echo'
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <p class="h1">LINDEROS SEGUN DOCUMENTO</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <select id="puntNorte3">
                            <option value="Norte">Norte</option>
                            <option value="NorteEste">NortEste</option>
                        </select>
                    </div>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="number" class="text" id="nortSecDoc" />
                                <select id="uniNorte3">
                                    <option></option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-lg-8">
                                <b>Alinderado</b>
                                <input type="text" class="text" id="alindSecNorte" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <select id="puntSur3">
                            <option value="Sur">Sur</option>
                            <option value="SurEste">SurEste</option>
                        </select>
                    </div>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="number" class="text" id="surSecDoc" />
                                <select id="uniSur3">
                                    <option></option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-lg-8">
                                <b >Alinderado</b>
                                <input type="text" class="text" id="alindSecSur" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <select id="puntEste3">
                            <option value="Este">Este</option>
                            <option value="SurOeste">SurOeste</option>
                        </select>
                    </div>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="number" class="text" id="esteSecDoc" />
                                <select id="uniEste3">
                                    <option></option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-lg-8">
                                <b>Alinderado</b>
                                <input type="text" class="text" id="alindSecEste" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <select id="puntOeste3">
                            <option value="Oeste">Oeste</option>
                            <option value="NortOeste">NortOeste</option>
                        </select>
                    </div>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="number" class="text" id="oesteSecDoc" />
                                <select id="uniOeste3">
                                    <option></option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-lg-8">
                                <b>Alinderado</b>
                                <input type="text" class="text" id="alindSecOeste" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="campDat">
                            <b>Área Total</b>
                            <input type="text" class="text" id="arTotal3" >
                            <select id="uniAreaT3">
                                <option value="No Aplica">No Aplica</option>
                                <option value="m2">m2</option>
                                <option value="Ha">Ha</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="campDat">
                            <b>Niveles de Construcción</b>
                            <input type="text" class="text" id="NivConstTotal3" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7">
                        <div class="campDat">
                            <b>Área de Construcción</b>
                            <input type="text" id="arConstTotal3" >
                            <select id="uniAreaConst3">
                                <option value="No Aplica">No Aplica</option>
                                <option value="m2">m2</option>
                                <option value="Ha">Ha</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-5">
                        <input type="button" class="btn btn-success" onclick="calLindDoc()" value="Calcular">
                    </div>
                </div>
            </div>
            <div class="btnSig1">
                <input type="button" value="Guardar" onclick="btnGuarSecDoc()" class="botones btn btn-primary" />
            </div>
        ';
    }
    function guarSecDoc(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        if($this->puntNorte3=="Norte"){
            $Norte3 = $this->nortSecDoc;
            $norEste3 = "nada";
        }else{
            $Norte3 = "nada";
            $norEste3 = $this->nortSecDoc;
        }
        if($this->puntSur3=="Sur"){
            $Sur3 = $this->surSecDoc;
            $SurEste3 = "nada";
        }else{
            $Sur3 = "nada";
            $SurEste3 = $this->surSecDoc;
        }
        if($this->puntEste3=="Este"){
            $Este3 = $this->esteSecDoc;
            $SurOeste3 = "nada";
        }else{
            $Este3 = "nada";
            $SurOeste3 = $this->esteSecDoc;
        }
        if($this->puntOeste3=="Oeste"){
            $Oeste3 = $this->oesteSecDoc;
            $NortOeste3 = "nada";
        }else{
            $Oeste3 = "nada";
            $NortOeste3 = $this->oesteSecDoc;
        }
        $lindDocSql = "INSERT INTO temp_linderos_documento(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$Norte3."','".$norEste3."','".$Sur3."','".$SurEste3."','".$Este3."','".$SurOeste3."','".$Oeste3."','".$NortOeste3."','".$this->alindSecNorte."','".$this->alindSecSur."','".$this->alindSecEste."','".$this->alindSecOeste."','".$this->arTotal3."','".$this->uniAreaT3."','".$this->NivConstTotal3."','".$this->uniAreaConst3."','".$this->arConstTotal3."','".$this->uniNorte3."','".$this->uniSur3."','".$this->uniEste3."','".$this->uniOeste3."')";
        $link->query($lindDocSql);
        $idLindDoc= $link->insert_id;
        echo'PROCESO COMPLETADO CON EXITO';
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
                    $propSql = "INSERT INTO propietarios(cedula,rif,nombre,apellido,telef,dir_hab,telef_hab) value('".$this->cedFul."','".$this->rifConst."','".$this->nomProp."','".$this->apelProp."','".$this->telfFul."','".$this->direcProp."','".$this->telfFul2."')";
                    $link->query($propSql);
                    $idProp = $link->insert_id;
                }

            //CARACTERISTICAS DEL INMUEBLE (LISTO)
                $carcSql = "INSERT INTO carc_inmueble(topografia,forma,uso,tenencia)value('".$this->topoConst."','".$this->formaConst."','".$this->usoConst."','".$this->tenenConst."')";
                $link->query($carcSql);
                $idCarc= $link->insert_id;

            //DATOS DE PROTOCOLIZACION (LISTO)
                $datProtSql= "INSERT INTO datos_protocolizacion(documento,direccion,numero,tomo,folio,protocolo,trimestre,fecha,valor_inmueble)value('".$this->docDebConst."','".$this->direcProtConst."','".$this->numProtConst."','".$this->tomoProtConst."','".$this->folioProtConst."','".$this->protoConst."','".$this->trimProtConst."','".$this->dateProtConst."','".$this->valorProtConst."')";
                $link->query($datProtSql);
                $idProt= $link->insert_id;

            //CARACTERISTICAS DE LA CONSTRUCCION (LISTO)
                $carcConstSql= "INSERT INTO caracteristicas_construccion(destino,estructura,paredes_tipo,paredes_acabado,pintura,techo,pisos,piezas_sanitarias,ventanas,puertas,insta_electricas,complementos,estado_conservacion,ambientes,observ,Regimen)value('".$this->destConst."','".$this->estConst."','".$this->pareTipoInmue."','".$this->pareAcaInmue."','".$this->pintConst."','".$this->techoConst."','".$this->pisosConst."','".$this->piezConst."','".$this->ventConst."','".$this->puertConst."','".$this->instElect."','".$this->compConst."','".$this->estConserv."','".$this->ambConst."','".$this->obsConst."','".$this->regInmue."')";
                $link->query($carcConstSql);
                $idCarcConst = $link->insert_id;
            //LINDEROS DOCUMENTO(LISTO)
                if($this->puntNorte3=="Norte"){
                    $Norte3 = $this->nortSecDoc;
                    $norEste3 = "nada";
                }else{
                    $Norte3 = "nada";
                    $norEste3 = $this->nortSecDoc;
                }
                if($this->puntSur3=="Sur"){
                    $Sur3 = $this->surSecDoc;
                    $SurEste3 = "nada";
                }else{
                    $Sur3 = "nada";
                    $SurEste3 = $this->surSecDoc;
                }
                if($this->puntEste3=="Este"){
                    $Este3 = $this->esteSecDoc;
                    $SurOeste3 = "nada";
                }else{
                    $Este3 = "nada";
                    $SurOeste3 = $this->esteSecDoc;
                }
                if($this->puntOeste3=="Oeste"){
                    $Oeste3 = $this->oesteSecDoc;
                    $NortOeste3 = "nada";
                }else{
                    $Oeste3 = "nada";
                    $NortOeste3 = $this->oesteSecDoc;
                }
                $lindDocSql = "INSERT INTO linderos_documento(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$Norte3."','".$norEste3."','".$Sur3."','".$SurEste3."','".$Este3."','".$SurOeste3."','".$Oeste3."','".$NortOeste3."','".$this->alindSecNorte."','".$this->alindSecSur."','".$this->alindSecEste."','".$this->alindSecOeste."','".$this->arTotal3."','".$this->uniAreaT3."','".$this->NivConstTotal3."','".$this->uniAreaConst3."','".$this->arConstTotal3."','".$this->uniNorte3."','".$this->uniSur3."','".$this->uniEste3."','".$this->uniOeste3."')";
                $link->query($lindDocSql);
                $idLindDoc= $link->insert_id;

            //LINDEROS GENERAL (LISTO)
                if($this->puntNorte=="Norte"){
                    $Norte = $this->nortGen;
                    $norEste = "nada";
                }else{
                    $Norte = "nada";
                    $norEste = $this->nortGen;
                }
                if($this->puntSur=="Sur"){
                    $Sur = $this->surGen;
                    $SurEste = "nada";
                }else{
                    $Sur = "nada";
                    $SurEste = $this->surGen;
                }
                if($this->puntEste=="Este"){
                    $Este = $this->esteGen;
                    $SurOeste = "nada";
                }else{
                    $Este = "nada";
                    $SurOeste = $this->esteGen;
                }
                if($this->puntOeste=="Oeste"){
                    $Oeste = $this->oesteGen;
                    $NortOeste = "nada";
                }else{
                    $Oeste = "nada";
                    $NortOeste = $this->oesteGen;
                }
                $lindGenSql = "INSERT INTO linderos_general(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$Norte."','".$norEste."','".$Sur."','".$SurEste."','".$Este."','".$SurOeste."','".$Oeste."','".$NortOeste."','".$this->alindNort."','".$this->alindSur."','".$this->alindEste."','".$this->alindOeste."','".$this->arTotal."','".$this->uniAreaT."','".$this->NivConstTotal."','".$this->uniAreaConst."','".$this->arConstTotal."','".$this->uniNorte."','".$this->uniSur."','".$this->uniEste."','".$this->uniOeste."')";
                $link->query($lindGenSql);
                $idLindGen = $link->insert_id;
                
            //LINDEROS PARA VENTA (LISTO)
                if($this->puntNorte2=="Norte"){
                    $Norte2 = $this->nortPosVenta;
                    $norEste2 = "nada";
                }else{
                    $Norte2 = "nada";
                    $norEste2 = $this->nortPosVenta;
                }
                if($this->puntSur2=="Sur"){
                    $Sur2 = $this->surPosVenta;
                    $SurEste2 = "nada";
                }else{
                    $Sur2 = "nada";
                    $SurEste2 = $this->surPosVenta;
                }
                if($this->puntEste2=="Este"){
                    $Este2 = $this->estePosVenta;
                    $SurOeste2 = "nada";
                }else{
                    $Este2 = "nada";
                    $SurOeste2 = $this->estePosVenta;
                }
                if($this->puntOeste2=="Oeste"){
                    $Oeste2 = $this->oestePosVenta;
                    $NortOeste2 = "nada";
                }else{
                    $Oeste2 = "nada";
                    $NortOeste2 = $this->oestePosVenta;
                }
                $lindPosVentaSql = "INSERT INTO linderos_posible_venta(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$Norte2."','".$norEste2."','".$Sur2."','".$SurEste2."','".$Este2."','".$SurOeste2."','".$Oeste2."','".$NortOeste2."','".$this->alindPosNort."','".$this->alindPosSur."','".$this->alindPosEste."','".$this->oestePosVenta."','".$this->arTotal2."','".$this->uniAreaT2."','".$this->NivConstTotal2."','".$this->uniAreaConst2."','".$this->arConstTotal2."','".$this->uniNorte2."','".$this->uniSur2."','".$this->uniEste2."','".$this->uniOeste2."')";
                $link->query($lindPosVentaSql);
                $idLindPosVenta = $link->insert_id;
            //SERVICIOS(LISTO)
                $servSql = "INSERT INTO servicios_inmue(acued,acuedRural,aguasSubter,aguasServ,pavimentoFlex,pavimentoRig,viaEngran,acera,alumbradoPub,aseo,transportePublic,pozoSept,electriResi,electriIndus,lineaTelef)value('".$this->Acue."','".$this->AcueRural."','".$this->AguasSub."','".$this->AguasServ."','".$this->PavFlex."','".$this->PavRig."','".$this->viaEngran."','".$this->acera."','".$this->AlumPublico."','".$this->aseo."','".$this->transPublic."','".$this->pozoSept."','".$this->ElectResidencial."','".$this->ElectriIndust."','".$this->linTelf."')";
                $link->query($servSql);
                $idServ= $link->insert_id;
            //INMUEBLE(LISTO)
                $InmuebleSql= "INSERT INTO inmueble(direccion,parroquia,sector,ambito,fk_carac_construccion,fk_protocolizacion,fk_carac_inmuebles,fk_lind_documento,fk_lind_general,fk_lind_pos_venta,fk_servicios)value('".$this->direcInmue."','".$this->parrInmue."','".$this->secInmue."','".$this->ambInmue."',".$idCarcConst.",".$idProt.",".$idCarc.",".$idLindDoc.",".$idLindGen.",".$idLindPosVenta.",".$idServ.")";
                $link->query($InmuebleSql);
                $idInmueble= $link->insert_id;
            //EXPEDIENTE
                $fechaExp= date('Y-m-d');
                $expediSql= "INSERT INTO expediente(fk_inmueble,fk_propietario,fk_usuario,n_expediente,fecha,condicion)value(".$idInmueble.",".$idProp.",".$idUser["id"].",".$this->nuExp.",'".$fechaExp."','".$this->multa."')";
                $link->query($expediSql);
                $idExpediente = $link->insert_id;
              echo'<h1>PROCESO COMPLETADO CON EXITO</h1>
            <div id="iconGuard">
                <img src="./assets/guard.png"/>
            </div>
            <p>Para imprimir la constancia debe ingresar los datos de la Factura</p>
            ';
        //GENERAL
            $sqlIdGen = "SELECT * from linderos_general where id=".$idLindGen."";
            $resGen=$link->query($sqlIdGen);
            $norteGen = $resGen->fetch_assoc();
        //SEGUN DOCUMENTO
            $sqlIdDoc = "SELECT * from linderos_documento where id=".$idLindDoc."";
            $resDoc=$link->query($sqlIdDoc);
            $norteDoc = $resDoc->fetch_assoc();
        //POSIBLE VENTA
            $sqlIdPosVenta = "SELECT * from linderos_posible_venta where id=".$idLindPosVenta."";
            $resPosVenta=$link->query($sqlIdPosVenta);
            $nortePosVenta = $resPosVenta->fetch_assoc();


        //IF DEL F002
            if($norteGen['norte']=="nada" && $norteGen['noreste'] =="nada"){
                if($norteDoc['norte']!="nada" || $norteDoc['noreste'] =="nada"){
                    if($nortePosVenta['norte']=="nada" && $nortePosVenta['noreste']=="nada" ){
                        if($this->multa =="No Aplica"){
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
            echo'</table>
            <div id="campOculto"></div>';
        //IF DEL F001
            if($norteGen['norte']!="nada" || $norteGen['noreste']!="nada" ){
                if($norteDoc['norte']!="nada" || $norteGen['noreste']!="nada"){
                    if($nortePosVenta['norte']=="nada" && $nortePosVenta['norte']=="nada"){
                        if($this->multa =="No Aplica"){
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
            if($norteGen['norte']=="nada" && $norteGen['norte']=="nada"){
                if($norteDoc['norte']!="nada" || $norteDoc['noreste']!="nada"){
                    if($nortePosVenta['norte']!="nada" || $nortePosVenta['noreste']!="nada"){
                        if($this->multa=="No Aplica"){
                            echo'
                                <div class="btnSig1">
                                    <input type="button" value="Imprimir" onclick="btnImprConst3()" class=" botones btn btn-primary" />
                                </div>
                            ';
                        }
                    }       
                }
            }
        //IF DEL F004 - EMPADRONAMIENTO
            if($this->multa=="Empadronamiento" ){
                echo'
                    <div class="btnSig1">
                        <input type="button" value="Imprimir" onclick="btnImprEmpa()" class=" botones btn btn-primary" />
                    </div>
                            ';
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
        <input type="hidden" value="'.$usuarioRes["telef_hab"].'" id="telf_hab" />
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
    function busFactura(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());

        $veriFactSql = "SELECT * FROM factura where n_factura='".$this->numFact."'";
        $resVeriFact = $link->query($veriFactSql);
        $veriFactRes = $resVeriFact->fetch_array();

            echo'<input type="hidden" value="'.$veriFactRes["n_factura"].'" id="numFactura" />';
    }
}


?>