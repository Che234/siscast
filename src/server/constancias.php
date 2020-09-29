<?php

class constancias{

    function construct(){
        $recFact = "";
        $valorInmue = "";
        $idExp = "";
        $fechFact = "";
        $idFactura = "";
        $idComple = "";
        $idPuertas = "";
        $idAmbientes = "";
        $idPiezSant = "";
        $idEstConserv = "";
        $idServInmue = "";
        $idPosVenta = "";
        $idLindDoc = "";
        $idLindGen = "";
        $idProto = "";
        $idCaraConst ="";
        $idCaraInmue = "";
        $idInmue="";
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
        $idProp = "";
    }
    //MENU NUEVO INGRESO
    function secNuvIns(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        $busUser = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
        $resUser = $link->query($busUser);
        $userBusRes = $resUser->fetch_array();
        
        $tempUser = "SELECT * FROM user_temp where userId=".$userBusRes["id"]."";
        $resUser = $link->query($tempUser);
        $userRes = $resUser->fetch_array();
        if($userRes["userId"]==0){
            $tempUser = "INSERT INTO user_temp(userId,temp_ambientes,temp_caraconst,temp_carainmue,temp_complementos,temp_datos_protocolizacion,temp_expediente,temp_factura,temp_inmueble,temp_linderos_documento,temp_linderos_general,temp_linderos_posible_venta,temp_piezas_sanitarias,temp_propietarios,temp_puertas,temp_servicios_inmue,temp_estado_conservacion)value(".$userBusRes["id"].",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)";
            $link->query($tempUser);
            $userId = $link->insert_id;
        }else{
            $userId = $userRes["id"];
        }
        echo'
            <div class="container-fluid forms">
                <div class="row">
                    <div class="col-lg-4">
                            <div class="row">';
                        if($userRes["temp_propietarios"]!=0){//LISTO
                            echo'
                                <div class="col-lg-12">
                                    <input type="hidden" value="'.$userRes["temp_propietarios"].'" id="idProp">
                                    <button type="button" onclick="btnFormProp()" class="btn btn-secondary" >DATOS DEL PROPIETARIO</button>
                                </div>
                            ';
                        }else{
                            echo'<input type="hidden" value="0" id="idProp">
                                <div class="col-lg-12">
                                    <button type="button" onclick="btnFormProp()" class="btn btn-info" >DATOS DEL PROPIETARIO</button>
                                </div>
                            ';
                        }
                            echo'
                            </div>
                            <div class="row">';
                        if($userRes["temp_inmueble"]!=0){//LISTO
                            echo'
                            <input type="hidden" value="'.$userRes["temp_inmueble"].'" id="idInmue">
                            <div class="col-lg-12">
                                <button type="button" onclick="btnFormInmue()" class="btn btn-secondary" >DATOS DEL INMUEBLE</button>
                            </div>';
                        }else{
                            echo'<input type="hidden" value="0" id="idInmue">
                            <div class="col-lg-12">
                                <button type="button" onclick="btnFormInmue()" class="btn btn-info" >DATOS DEL INMUEBLE</button>
                            </div>';
                        }
                            
                        echo'</div>
                            <div class="row">';
                        if($userRes["temp_carainmue"]!=0){//LISTO
                            echo' <input type="hidden" value="'.$userRes["temp_carainmue"].'" id="idCaraInmue" />
                            <div class="col-lg-12">
                                <button type="button" onclick="btnfCarTerreno()" class="btn btn-secondary" >CARACTERISTICAS DEL TERRENO</button>
                            </div>';
                        }else{
                            echo'<input type="hidden" value="0" id="idCaraInmue" />
                            <div class="col-lg-12">
                                <button type="button" onclick="btnfCarTerreno()" class="btn btn-info" >CARACTERISTICAS DEL TERRENO</button>
                            </div>';
                        }
                            
                        echo'
                            </div>
                            <div class="row">';
                        if($userRes["temp_caraconst"]!=0){//LISTO
                            echo'    
                            <input type="hidden" value="'.$userRes["temp_caraconst"].'" id="idCaraConst" />
                            <div class="col-lg-12">
                                <button type="button" onclick="btnfcaracConst()" class="btn btn-secondary" >CARACTERISTICAS DE LAS CONSTRUCCIÓN</button>
                            </div>';
                        }else{
                            echo'   
                            <input type="hidden" value="0" id="idCaraConst" /> 
                            <div class="col-lg-12">
                                <button type="button" onclick="btnfcaracConst()" class="btn btn-info" >CARACTERISTICAS DE LAS CONSTRUCCIÓN</button>
                            </div>';
                        }
                            
                        echo'    </div>
                            <div class="row">';
                        if($userRes["temp_datos_protocolizacion"]!=0){
                            echo'
                            <input type="hidden" value="'.$userRes["temp_datos_protocolizacion"].'" id="idProto" />
                            <div class="col-lg-12">
                                <button type="button" onclick="btnfprotInmue()" class="btn btn-secondary" >PROTOCOLIZACION DEL INMUEBLE</button>
                            </div>';//LISTO
                        }else{
                            echo'
                            <input type="hidden" value="0" id="idProto" />
                            <div class="col-lg-12">
                                <button type="button" onclick="btnfprotInmue()" class="btn btn-info" >PROTOCOLIZACION DEL INMUEBLE</button>
                            </div>';
                        }
                               
                        echo'</div>
                            <div class="row">';
                        if($userRes["temp_linderos_general"]!=0){
                            echo'
                            <input type="hidden" value="'.$userRes["temp_linderos_general"].'" id="idLindGen">
                                <div class="col-lg-12">
                                    <button type="button" onclick="actGeneral()" class="btn btn-secondary" >LINDEROS SEGUN INSPECCIÓN</button>
                                </div>';
                        }else{
                            echo'
                            <input type="hidden" value="0" id="idLindGen">
                            <div class="col-lg-12">
                                <button type="button" onclick="actGeneral()" class="btn btn-info" >LINDEROS SEGUN INSPECCIÓN</button>
                            </div>';
                        }
                            
                        echo'
                            </div>
                            <div class="row">';
                        if($userRes["temp_linderos_documento"]!=0){
                            echo'
                            <input type="hidden" value="'.$userRes["temp_linderos_documento"].'" id="idLindDoc"/>
                            <div class="col-lg-12">
                                <button type="button" onclick="actSecDoc()" class="btn btn-secondary" >LINDEROS SEGUN DOCUMENTO</button>
                            </div>';
                        }else{
                            echo'
                            <input type="hidden" value="0" id="idLindDoc"/>
                            <div class="col-lg-12">
                                <button type="button" onclick="actSecDoc()" class="btn btn-info" >LINDEROS SEGUN DOCUMENTO</button>
                            </div>';
                        }
                            echo'
                            </div>
                            <div class="row">';
                        if($userRes["temp_linderos_posible_venta"]!=0){
                            echo'
                            <input type="hidden" value="'.$userRes["temp_linderos_posible_venta"].'" id="idPosVenta"/>
                            <div class="col-lg-12">
                                <button type="button" onclick="actPosVenta()" class="btn btn-secondary" >LINDEROS POSIBLE VENTA</button>
                            </div>';
                        }else{
                            echo'
                            <input type="hidden" value="0" id="idPosVenta"/>
                            <div class="col-lg-12">
                                <button type="button" onclick="actPosVenta()" class="btn btn-info" >LINDEROS POSIBLE VENTA</button>
                            </div>';
                        }
                        echo'
                        </div>
                        <div class="row">';
                        if($userRes["temp_servicios_inmue"]!=0){
                            echo'
                            <input type="hidden" value="'.$userRes["temp_servicios_inmue"].'" id="idServInmue"/>
                            <div class="col-lg-12">
                                <button type="button" onclick="btnfServicios()" class="btn btn-secondary" >SERVICIOS</button>
                            </div>';
                        }else{
                            echo'
                            <input type="hidden" value="'.$userRes["temp_servicios_inmue"].'" id="idServInmue"/>
                            <div class="col-lg-12">
                                <button type="button" onclick="btnfServicios()" class="btn btn-info" >SERVICIOS</button>
                            </div>';
                        }
                            
                        echo'
                        </div>
                        <div class="row">';
                        if($userRes["temp_estado_conservacion"]!=0){//LISTO
                            echo'
                            <input type="hidden" value="'.$userRes["temp_estado_conservacion"].'" id="idEstConserv" />
                            <div class="col-lg-12">
                                <button type="button" onclick="btnfConserv()" class="btn btn-secondary" >ESTADO DE CONSERVACIÓN</button>
                            </div>';
                        }else{
                            echo'
                            <input type="hidden" value="0" id="idEstConserv" />
                            <div class="col-lg-12">
                                <button type="button" onclick="btnfConserv()" class="btn btn-info" >ESTADO DE CONSERVACIÓN</button>
                            </div>';
                        }
                           
                        echo'</div>
                        <div class="row">';
                        if($userRes["temp_piezas_sanitarias"]!=0){//LISTO
                            echo'
                            <input type="hidden" value="'.$userRes["temp_piezas_sanitarias"].'" id="idPiezSant"/>
                            <div class="col-lg-12">
                                <button type="button" onclick="btnfPiezSant()" class="btn btn-secondary" >PIEZAS SANITARIAS</button>
                            </div>';
                        }else{
                            echo'
                            <input type="hidden" value="0" id="idPiezSant"/>
                            <div class="col-lg-12">
                                <button type="button" onclick="btnfPiezSant()" class="btn btn-info" >PIEZAS SANITARIAS</button>
                            </div>';
                        }
                            
                        echo'</div>
                        <div class="row">';
                        if($userRes["temp_ambientes"]!=0){//LISTO
                            echo'
                            <input type="hidden" value="'.$userRes["temp_ambientes"].'" id="idAmbientes"/>
                            <div class="col-lg-12">
                                <button type="button" onclick="btnfAmbi()" class="btn btn-secondary" >AMBIENTES</button>
                            </div>';
                        }else{
                            echo'
                            <input type="hidden" value="0" id="idAmbientes"/>
                            <div class="col-lg-12">
                                <button type="button" onclick="btnfAmbi()" class="btn btn-info" >AMBIENTES</button>
                            </div>';
                        }
                            
                        echo'
                        </div>
                        <div class="row">';
                        if($userRes["temp_puertas"]!=0){//LISTO
                            echo'
                            <input type="hidden" value="'.$userRes["temp_puertas"].'" id="idPuertas"/>
                            <div class="col-lg-12">
                                <button type="button" onclick="btnfpuertas()" class="btn btn-secondary" >PUERTAS</button>
                        </div>';
                        }else{
                            echo'
                            <input type="hidden" value="0" id="idPuertas"/>
                            <div class="col-lg-12">
                                <button type="button" onclick="btnfpuertas()" class="btn btn-info" >PUERTAS</button>
                            </div>';
                        }
                            
                        echo'</div>
                        <div class="row">';
                        if($userRes["temp_complementos"]!=0){//LISTO
                            echo'
                            <input type="hidden" value="'.$userRes["temp_complementos"].'" id="idComple" />
                            <div class="col-lg-12">
                                <button type="button" onclick="btnfComple()" class="btn btn-secondary" >COMPLEMENTOS</button>
                            </div>';
                        }else{
                            echo'
                            <input type="hidden" value="0" id="idComple" />
                            <div class="col-lg-12">
                                <button type="button" onclick="btnfComple()" class="btn btn-info" >COMPLEMENTOS</button>
                            </div>';
                        }
                            
                        echo'</div>
                        <div class="row">';
                        if($userRes["temp_factura"]!=0){
                            echo'
                            <input type="hidden" value="'.$userRes["temp_factura"].'" id="idFactura"/>
                            <div class="col-lg-12">
                                <button type="button" onclick="btnfFactura()" class="btn btn-secondary" >FACTURA</button>
                            </div>';
                        }else{
                            echo'
                            <input type="hidden" value="0" id="idFactura"/>
                            <div class="col-lg-12">
                                <button type="button" onclick="btnfFactura()" class="btn btn-info" >FACTURA</button>
                            </div>';
                        }
                           
                        echo'</div>
                        <div class="row">';
                        if($userRes["temp_expediente"]!=0){
                            echo'
                            <input type="hidden" value="'.$userRes["temp_expediente"].'" id="idExp">
                            <div class="col-lg-12">
                                <button type="button" onclick="btnfexpedient()" class="btn btn-secondary" >EXPEDIENTE</button>
                            </div>';
                        }else{
                            echo'
                            <input type="hidden" value="0" id="idExp">
                            <div class="col-lg-12">
                                <button type="button" onclick="btnfexpedient()" class="btn btn-info" >EXPEDIENTE</button>
                            </div>';
                        }
                                
                            echo'</div>
                    </div>

                    <div class="col-lg-8" id="formsInscrip">
                        
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-3">
                        <div class="campDat">
                            <b>Aplicar:</b>
                            <select id="multa"/>
                                <option value="'.$expRes["condicion"].'">'.$expRes["condicion"].'</option>
                                <option value="No Aplica">No Aplica</option>
                                <option value="Multa">Multa</option>
                                <option value="Empadronamiento">Empadronamiento</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-1">
                        <button type="button" onclick="btnVeriImpri()" class="btn btn-info" >Imprimir</button>
                    </div>
                    <div class="col-1">
                        <button type="button" onclick="btnElimReg()" class="btn btn-info" >Eliminar</button>
                    </div>
            </div>
                    
            
        ';
    }
    //PROPIETARIOS
    function fPropietario(){//VERIFICADO
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $busPropSql ="SELECT * FROM temp_propietarios where id='".$this->idProp."'";
        $resProp = $link->query($busPropSql);
        $propRes = $resProp->fetch_array();
        $divCed = explode('-',$propRes["cedula"]);
        $divRif = explode('-',$propRes["rif"]);
        $divTelfHab = explode('-',$propRes["telef_hab"]);
        $divTelef = explode('-',$propRes["telef"]);
        if($propRes["cedula"]=="NO APLICA"){
            $divCed[0] ="N/A";
            $divCed[1] = "NO APLICA";
        }
        if($propRes["rif"]=="NO APLICA"){
            $divRif[0] = "N/A";
            $divRif[1] = "NO APLICA";
        }
        
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
                                <option value="'.$divCed[0].'">'.$divCed[0].'</option>
                                <option value="N/A">N/A</option>
                                <option value="V">V</option>
                                <option value="E">E</option>
                                <option value="P">P</option>
                            </select>
                            <input type="text" class="numText" value="'.$divCed[1].'" id="cedConst" onchange="btnRevUsuario()"/>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Rif:</p>
                            <select class="codigo2" id="rifR">
                                <option value="'.$divRif[0].'">'.$divRif[0].'</option>
                                <option value="N/A">N/A</option>
                                <option value="V">V</option>
                                <option value="J">J</option>
                                <option value="G">G</option>
                                <option value="E">E</option>
                                <option value="P">P</option>
                                <option value="C">C</option>
                            </select>
                        <input type="text" class="numText" value="'.$divRif[1].'" id="rifN" />
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Nombres</p>
                        <input type="text" onKeyUp="mayusProp(this)" value="'.$propRes["nombre"].'" id="nomProp" /> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Apellido</p>
                        <input type="text" onKeyUp="mayusProp(this)" value="'.$propRes["apellido"].'"id="apelProp" />
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Telef. Hab.</p>
                        <input type="text" class="codigo2" value="'.$divTelfHab[0].'" id="codTelf"/>
                        <input type="text" class="numText" value="'.$divTelfHab[1].'" id="numTelf"/>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Telef. Celular</p>
                        <input type="text" class="codigo2" value="'.$divTelef[0].'" id="codTelf2"/>
                        <input type="text" class="numText" value="'.$divTelef[1].'" id="numTelf2"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="campDat">
                    <p class="negritas">Dirección del propietario</p>
                    <input type="text" onKeyUp="mayusProp(this)" class="direc2" value="'.$propRes["dir_hab"].'" id="direcProp" />
                </div>
            </div>
        </div>
        <div class="btnSig1">
            <input type="button" value="Guardar" onclick="btnGuarProp()" class="botones btn btn-primary" />
        </div>
        <div id="campGeneral2"></div>';
    }
    function guardProp(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //USUARIOS
        $userTempSql = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
        $resUserTemp = $link->query($userTempSql);
        $userTempRes1 = $resUserTemp->fetch_array();
        //TEMP USER
        $userTempSql = "SELECT * FROM user_temp where userId='".$userTempRes1["id"]."'";
        $resUserTemp = $link->query($userTempSql);
        $userTempRes = $resUserTemp->fetch_array();
        
        if($userTempRes["temp_propietarios"]==0){
            $propSql = "INSERT INTO temp_propietarios(cedula,rif,nombre,apellido,telef,dir_hab,telef_hab)value('".$this->cedFul."','".$this->rifConst."','".$this->nomProp."','".$this->apelProp."','".$this->telfFull."','".$this->direcProp."','".$this->telfFull2."')";
            $link->query($propSql);
            $idProp= $link->insert_id;
            $userTemp = "UPDATE user_temp SET temp_propietarios='".$idProp."'";
            $link->query($userTemp);
        }else{
            $propSql = "UPDATE temp_propietarios set cedula='".$this->cedFul."', rif='".$this->rifConst."', nombre='".$this->nomProp."',apellido='".$this->apelProp."',telef='".$this->telfFull."',dir_hab='".$this->direcProp."',telef_hab='".$this->telfFull2."' where id=".$userTempRes["temp_propietarios"]." ";
            $link->query($propSql);
        }//LISTO//LISTO
        
    }
    //INMUEBLE
    function fInmueble(){//VERIFICADO
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $busSql = "SELECT * FROM temp_inmueble where id=".$this->idInmue."";
        $resBusInmue = $link->query($busSql);
        $busInmueRes = $resBusInmue->fetch_array();
        echo'
        <input type="hidden" value="'.$busInmueRes["parroquia"].'" id="parrInmuebles"/>
        <input type="hidden" value="'.$busInmueRes["sector"].'" id="sectorInmue"/>
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
                            <option value="'.$busInmueRes["ambito"].'">'.$busInmueRes["ambito"].'</option>
                            <option value="Urbano">Urbano</option>
                            <option value="Rural">Rural</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Dirección del inmueble</b>
                        <input type="text" onKeyUp="mayusProp(this)" class="direc1" value="'.$busInmueRes["direccion"].'" id="direcInmue" />
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
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //USUARIOS
        $userTempSql = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
        $resUserTemp = $link->query($userTempSql);
        $userTempRes1 = $resUserTemp->fetch_array();
        //TEMP USER
        $userTempSql = "SELECT * FROM user_temp where userId='".$userTempRes1["id"]."'";
        $resUserTemp = $link->query($userTempSql);
        $userTempRes = $resUserTemp->fetch_array();
        if($userTempRes["temp_inmueble"]!=0){
            $upInmueSql = "UPDATE temp_inmueble SET direccion='".$this->direcInmue."',parroquia='".$this->parrInmue."',sector='".$this->secInmue."',ambito='".$this->ambInmue."' where id=".$userTempRes["temp_inmueble"]." ";
            $link->query($upInmueSql);
        }else{
            $inmueSql = "INSERT INTO temp_inmueble(direccion,parroquia,sector,ambito)value('".$this->direcInmue."','".$this->parrInmue."','".$this->secInmue."','".$this->ambInmue."')";
            $link->query($inmueSql);
            $idInmue= $link->insert_id;
            $inmueTemp = "UPDATE user_temp SET temp_inmueble='".$idInmue."'";
            $link->query($inmueTemp);
        }//LISTO//LISTO
        
    }
    //CARACTERISTICAS DEL TERRENO
    function fCarTerreno(){ //VERIFICADO
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $busCaracTer = "SELECT * FROM temp_carainmue where id=".$this->idCaraInmue."";
        $resCaraTer = $link->query($busCaracTer);
        $caraTerRes = $resCaraTer->fetch_assoc();
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
                            <option value="'.$caraTerRes["topografia"].'">'.$caraTerRes["topografia"].'</option>
                            <option value="NO APLICA">NO APLICA</option>
                            <option value="Terreno Llano">Terreno Llano</option>
                            <option value="Terreno Quebrado">Terreno Quebrado</option>
                        </select>
                    </div>
                </div>   
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Forma</p>
                        <select id="formaConst">
                            <option value="'.$caraTerRes["forma"].'">'.$caraTerRes["forma"].'</option>
                            <option value="NO APLICA">NO APLICA</option>
                            <option value="Regular">Regular</option>
                            <option value="Irregular">Irregular</option>
                        </select>
                    </div>
                </div>  
                <div class="col">
                    <div class="campDat">
                        <p class="negritas">Uso</p>
                        <select id="usoConst">
                            <option value="'.$caraTerRes["uso"].'">'.$caraTerRes["uso"].'</option>
                            <option value="NO APLICA">NO APLICA</option>
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
                            <option value="tenencia">'.$caraTerRes["tenencia"].'</option>
                            <option value="NO APLICA">NO APLICA</option>
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
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //USUARIOS
            $userTempSql = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUserTemp = $link->query($userTempSql);
            $userTempRes1 = $resUserTemp->fetch_array();
        //TEMP USER
            $userTempSql = "SELECT * FROM user_temp where userId='".$userTempRes1["id"]."'";
            $resUserTemp = $link->query($userTempSql);
            $userTempRes = $resUserTemp->fetch_array();
        if($userTempRes["temp_carainmue"]!=0){
            $caraInmuSql = "UPDATE temp_carainmue set topografia='".$this->topoConst."', forma='".$this->formaConst."', uso='".$this->usoConst."', tenencia='".$this->tenenConst."' where id=".$userTempRes["temp_carainmue"]."";
            $link->query($caraInmuSql);
        }else{
            $carcTerrSql = "INSERT INTO temp_carainmue(topografia,forma,uso,tenencia)value('".$this->topoConst."','".$this->formaConst."','".$this->usoConst."','".$this->tenenConst."')";
            $link->query($carcTerrSql);
            $idCarInmue= $link->insert_id;
            $CarInmueTemp = "UPDATE user_temp SET temp_carainmue='".$idCarInmue."'";
            $link->query($CarInmueTemp);
        }//LISTO//LISTO
        
    }
    //CARACTERISTICAS DE LA CONSTRUCCION
    function fcaracConst(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $constSql = "SELECT * FROM temp_caraconst where id=".$this->idCaraConst."";
        $resConst = $link->query($constSql);
        $constRes = $resConst->fetch_array();
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
                            <option value="'.$constRes["destino"].'">'.$constRes["destino"].'</option>
                            <option value="NO APLICA">NO APLICA</option>
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
                            <option value="'.$constRes["estructura"].'">'.$constRes["estructura"].'</option>
                            <option value="NO APLICA">NO APLICA</option>
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
                            <option value="'.$constRes["paredes_tipo"].'">'.$constRes["paredes_tipo"].'</option>
                            <option value="NO APLICA">NO APLICA</option>
                            <option value="Concreto">Ladrillo</option>
                            <option value="Metalica">Bloque</option>
                            <option value="Madera">Adobe Tapia</option>
                            <option value="Concreto">Bahareque</option>
                            <option value="Metalica">Madera</option>
                            <option value="Madera">Prefabricado</option>
                        </select>
                        <select id="pareAcaInmue">
                            <option value="'.$constRes["paredes_acabado"].'">'.$constRes["paredes_acabado"].'</option>
                            <option value="NO APLICA">NO APLICA</option>
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
                            <option value="'.$constRes["pintura"].'">'.$constRes["pintura"].'</option>
                            <option value="NO APLICA">NO APLICA</option>
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
                            <option value="'.$constRes["techo"].'">'.$constRes["techo"].'</option>
                            <option value="NO APLICA">NO APLICA</option>
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
                            <option value="'.$constRes["pisos"].'">'.$constRes["pisos"].'</option>
                            <option value="N/A">N/A</option>
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
                            <option value="'.$constRes["ventanas"].'">'.$constRes["ventanas"].'</option>
                            <option value="NO APLICA">NO APLICA</option>
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
                            <option value="'.$constRes["insta_electricas"].'">'.$constRes["insta_electricas"].'</option>
                            <option value="NO APLICA">NO APLICA</option>
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
                            <option value="'.$constRes["Regimen"].'">'.$constRes["Regimen"].'</option>
                            <option value="NO APLICA">NO APLICA</option>
                            <option value="Propiedad Horizontal">Propiedad Horizontal</option>
                            <option value="Condominio">Condominio</option>
                            <option value="Sucesion">Sucesion</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Observaciones</b>
                        <textarea onKeyUp="mayusProp(this)" id="obsConst">'.$constRes["observ"].'</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="btnSig1">
            <input type="button" value="Guardar" onclick="btnGuarCaracConst()" class="botones btn btn-primary" />
        </div>
        ';//VERIFICADO
    }
    function guarCaracConst(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //USUARIOS
            $userTempSql = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUserTemp = $link->query($userTempSql);
            $userTempRes1 = $resUserTemp->fetch_array();
        //TEMP USER
            $userTempSql = "SELECT * FROM user_temp where userId='".$userTempRes1["id"]."'";
            $resUserTemp = $link->query($userTempSql);
            $userTempRes = $resUserTemp->fetch_array();
            if($userTempRes["temp_caraconst"] !=0){
                $tempUserAct = "UPDATE temp_caraconst SET destino='".$this->destConst."', estructura='".$this->estConst."', paredes_tipo='".$this->pareTipoInmue."', paredes_acabado='".$this->pareAcaInmue."',pintura='".$this->pintConst."',techo='".$this->techoConst."' where id=".$userTempRes["temp_caraconst"]."";
                $link->query($tempUserAct);
            }else{
                $caracConstSql= "INSERT INTO temp_caraconst(destino,estructura,paredes_tipo,paredes_acabado,pintura,techo,pisos,ventanas,insta_electricas,observ,Regimen)value('".$this->destConst."','".$this->estConst."','".$this->pareTipoInmue."','".$this->pareAcaInmue."','".$this->pintConst."','".$this->techoConst."','".$this->pisosConst."','".$this->ventConst."','".$this->instElect."','".$this->obsConst."','".$this->regInmue."')";
                $link->query($caracConstSql);
                $idCarConst= $link->insert_id;
                $CarConstTemp = "UPDATE user_temp SET temp_caraconst='".$idCarConst."'";
                $link->query($CarConstTemp);
            }
        }//LISTO//LISTO
    //PROTOCOLIZACION DEL INMUEBLE
    function fprotInmue(){//VERIFICADO
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        
                $protoSql = "SELECT * FROM temp_datos_protocolizacion where id=".$this->idProto."";
                $resProto = $link->query($protoSql);
                $protoRes = $resProto->fetch_array();
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
                        <b>Documento Debidamente:</b>
                        <select id="docDebConst">
                            <option value="'.$protoRes["documento"].'">'.$protoRes["documento"].'</option>
                            <option value="NO APLICA">NO APLICA</option>
                            <option value="AUTENTICADO">AUTENTICADO</option>
                            <option value="REGISTRADO">REGISTRADO</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Dirección:</b>
                        <input type="text" onKeyUp="mayusProp(this)" class="text" value="'.$protoRes["direccion"].'" id="direcProtConst"/>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Numero:</b>
                        <input type="text" onKeyUp="mayusProp(this)" class="text" value="'.$protoRes["numero"].'" id="numProtConst"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="campDat">
                        <b>Tomo:</b>
                        <input type="text" onKeyUp="mayusProp(this)" value="'.$protoRes["tomo"].'" id="tomoProtConst"/>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Folios:</b>
                        <input type="text" onKeyUp="mayusProp(this)" value="'.$protoRes["folio"].'" id="folioProtConst"/>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Protocolo:</b>
                        <select id="protoConst">
                            <option value="'.$protoRes["protocolo"].'">'.$protoRes["protocolo"].'</option>
                            <option value="NO APLICA">NO APLICA</option>
                            <option value="Primero">Primero</option>
                            <option value="Segundo">Segundo</option>
                            <option value="Tercero">Tercero</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="campDat">
                        <b>Trimestre:</b>
                        <select id="trimProtConst">
                            <option value="'.$protoRes["trimestre"].'">'.$protoRes["trimestre"].'</option>
                            <option value="NO APLICA">NO APLICA</option>
                            <option value="Primero">Primero</option>
                            <option value="Segundo">Segundo</option>
                            <option value="Tercero">Tercero</option>
                            <option value="Cuarto">Cuarto</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Fecha:</b>
                        <input type="date" value="'.$protoRes["fecha"].'" id="dateProtConst"/>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Valor del Inmueble:</b>
                        <input type="text" onKeyUp="mayusProp(this)" value="'.$protoRes["valor_inmueble"].'" id="valorProtConst"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="btnSig1">
            <input type="button" value="Guardar" onclick="btnGuarProt()" class="botones btn btn-primary" />
        </div>';
    }
    function guarProtInmue(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //USUARIOS
            $userTempSql = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUserTemp = $link->query($userTempSql);
            $userTempRes1 = $resUserTemp->fetch_array();
        //TEMP USER
            $userTempSql1 = "SELECT * FROM user_temp where userId='".$userTempRes1["id"]."'";
            $resUserTemp1 = $link->query($userTempSql1);
            $userTempRes = $resUserTemp1->fetch_array();

            if($userTempRes["temp_datos_protocolizacion"] ==0){
                $protInmueSql ="INSERT INTO temp_datos_protocolizacion(documento,direccion,numero,tomo,folio,protocolo,trimestre,fecha,valor_inmueble)value('".$this->docDebConst."','".$this->direcProtConst."','".$this->numProtConst."','".$this->tomoProtConst."','".$this->folioProtConst."','".$this->protoConst."','".$this->trimProtConst."','".$this->dateProtConst."','".$this->valorProtConst."')";
                $link->query($protInmueSql);
                $idProt= $link->insert_id;
                $protTemp = "UPDATE user_temp SET temp_datos_protocolizacion='".$idProt."'";
                $link->query($protTemp);
            }else{
                $upProtSql = "UPDATE temp_datos_protocolizacion SET documento='".$this->docDebConst."',direccion='".$this->direcProtConst."',numero='".$this->numProtConst."',tomo='".$this->tomoProtConst."',folio='".$this->folioProtConst."',protocolo='".$this->protoConst."',trimestre='".$this->trimProtConst."',fecha='".$this->dateProtConst."',valor_inmueble='".$this->valorProtConst."' where id=".$userTempRes["temp_datos_protocolizacion"]."";
                $link->query($upProtSql);
            }//LISTO//LISTO//LISTO
    }
    //ESTADO DE CONSERVACION
    function fConserv(){//VERIFICADO
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $conservSql = "SELECT * FROM temp_estado_conservacion where id=".$this->idEstConserv."";
        $resConserv = $link->query($conservSql);
        $conservRes = $resConserv->fetch_array();
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
                    <input type="text" value="'.$conservRes["ano_construccion"].'" id="ano_construc">
                </div>
                <div class="col">
                    <b>Año de Refacción</b>
                    <input type="text" value="'.$conservRes["ano_refaccion"].'"id="ano_refac">
                </div>
                <div class="col">
                    <b>Edad Efectiva</b>
                    <input type="text" value="'.$conservRes["edad_efectiva"].'"id="edadEfec"/>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <b>Nº de planta</b>
                    <input type="text" value="'.$conservRes["nro_planta"].'" id="numPlata" />
                </div>
                <div class="col">
                    <b>Nº de Vivienda</b>
                    <input type="text" value="'.$conservRes["nro_vivienda"].'" id="numVivienda" />
                </div>
            </div>
        </div>
        <div class="btnSig1">
            <input type="button" value="Siguiente" onclick="btnGuarConserv()" class="botones btn btn-primary" />
        </div'; 
    }
    function guarConserv(){//LISTO//LISTO
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //USUARIOS
            $userTempSql = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUserTemp = $link->query($userTempSql);
            $userTempRes1 = $resUserTemp->fetch_array();
        //TEMP USER
            $userTempSql1 = "SELECT * FROM user_temp where userId='".$userTempRes1["id"]."'";
            $resUserTemp1 = $link->query($userTempSql1);
            $userTempRes = $resUserTemp1->fetch_array();

            if($userTempRes["temp_estado_conservacion"] ==0){
                $conservSql = "INSERT INTO temp_estado_conservacion(ano_construccion,ano_refaccion,edad_efectiva,nro_planta,nro_vivienda)value('".$this->ano_construc."','".$this->ano_refac."','".$this->edadEfec."','".$this->numPlata."','".$this->numVivienda."')";
                $link->query($conservSql);
                $idConserv= $link->insert_id;
                $conservTemp = "UPDATE user_temp SET temp_estado_conservacion='".$idConserv."'";
                $link->query($conservTemp);
            }else{
                $upConservSql = "UPDATE temp_estado_conservacion SET ano_construccion='".$this->ano_construc."',ano_refaccion='".$this->ano_refac."',edad_efectiva='".$this->edadEfec."',nro_planta='".$this->numPlata."',nro_vivienda='".$this->numVivienda."' where id=".$userTempRes["temp_estado_conservacion"]."";
                $link->query($upConservSql);
            }
    }
    //PIEZAS SANITARIAS 
    function fPiezSant(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $piezSaSQL ="SELECT * FROM temp_piezas_sanitarias where id =".$this->idPiezSant."";
        $resPiezSan = $link->query($piezSaSQL);
        $piezSanRes = $resPiezSan->fetch_array();
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
                            <option value="'.$piezSanRes["porcelana_fina"].'">'.$piezSanRes["porcelana_fina"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Porcelana Econ.</b>
                        <select id="porceEcon">
                            <option value="'.$piezSanRes["porcelana_econ"].'">'.$piezSanRes["porcelana_econ"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Bañera</b>
                        <select id="banera">
                            <option value="'.$piezSanRes["banera"].'">'.$piezSanRes["banera"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Calentador</b>
                        <select id="calentador">
                            <option value="'.$piezSanRes["calentador"].'">'.$piezSanRes["calentador"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <b>W.C.</b>
                        <select id="wc">
                            <option value="'.$piezSanRes["wc"].'">'.$piezSanRes["wc"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Bidet</b>
                        <select id="bidet">
                            <option value="'.$piezSanRes["bidet"].'">'.$piezSanRes["bidet"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Lavamanos</b>
                        <select id="lavamanos">
                            <option value="'.$piezSanRes["lavamanos"].'">'.$piezSanRes["lavamanos"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Ducha</b>
                        <select id="ducha">
                            <option value="'.$piezSanRes["ducha"].'">'.$piezSanRes["ducha"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Urinario</b>
                        <select id="urinario">
                            <option value="'.$piezSanRes["urinario"].'">'.$piezSanRes["urinario"].'</option>
                            <option value="N/A">N/A</option>s
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="btnSig1">
                <input type="button" value="Guardar" onclick="btnGuarPizSanit()" class="botones btn btn-primary" />
            </div>
        ';//VERIFICADO
    }
    function guarPiezSant(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //USUARIOS
            $userTempSql = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUserTemp = $link->query($userTempSql);
            $userTempRes1 = $resUserTemp->fetch_array();
        //TEMP USER
            $userTempSql1 = "SELECT * FROM user_temp where userId='".$userTempRes1["id"]."'";
            $resUserTemp1 = $link->query($userTempSql1);
            $userTempRes = $resUserTemp1->fetch_array();

            if($userTempRes["temp_piezas_sanitarias"] ==0){
                $piezSant="INSERT INTO temp_piezas_sanitarias(porcelana_fina,porcelana_econ,banera,calentador,wc,bidet,lavamanos,ducha,urinario)value('".$this->porFina."','".$this->porceEcon."','".$this->banera."','".$this->calentador."','".$this->wc."','".$this->bidet."','".$this->lavamanos."','".$this->ducha."','".$this->urinario."')";
                $link->query($piezSant);
                $idpiezSant= $link->insert_id;
                $piezSantTemp = "UPDATE user_temp SET temp_piezas_sanitarias='".$idpiezSant."'";
                $link->query($piezSantTemp);
            }else{
                $upPiezSantSql = "UPDATE temp_piezas_sanitarias SET porcelana_fina='".$this->porFina."',porcelana_econ='".$this->porceEcon."',banera='".$this->banera."',calentador='".$this->calentador."',wc='".$this->wc."',bidet='".$this->bidet."',lavamanos='".$this->lavamanos."',ducha='".$this->ducha."',urinario='".$this->urinario."' where id=".$userTempRes["temp_piezas_sanitarias"]."";
                $link->query($upPiezSantSql);
            }//LISTO//LISTO
    }
    //PUERTAS
    function fpuertas(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $puertSQL ="SELECT * FROM temp_puertas where id=".$this->idPuertas."";
        $resPuertas = $link->query($puertSQL);
        $puertasRes = $resPuertas->fetch_array();
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
                            <option value="'.$puertasRes["entamborada_fina"].'">'.$puertasRes["entamborada_fina"].'</option>
                            <option value="NA">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Ent. Economica</b>
                        <select id="entamEcon">
                            <option value="'.$puertasRes["ent_econo"].'">'.$puertasRes["ent_econo"].'</option>
                            <option value="NA">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Madera cepillada</b>
                        <select id="madeCepil">
                            <option value="'.$puertasRes["madera_cepi"].'">'.$puertasRes["madera_cepi"].'</option>
                            <option value="NA">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Hierro</b>
                        <select id="hierro">
                            <option value="'.$puertasRes["hierro"].'">'.$puertasRes["hierro"].'</option>
                            <option value="NA">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="btnSig1">
                <input type="button" value="Guardar" onclick="btnGuarPuertas()" class="botones btn btn-primary" />
            </div>
        ';//VERIFICADO
    }
    function guarPuertas(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //USUARIOS
            $userTempSql = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUserTemp = $link->query($userTempSql);
            $userTempRes1 = $resUserTemp->fetch_array();
        //TEMP USER
            $userTempSql1 = "SELECT * FROM user_temp where userId='".$userTempRes1["id"]."'";
            $resUserTemp1 = $link->query($userTempSql1);
            $userTempRes = $resUserTemp1->fetch_array();

            if($userTempRes["temp_puertas"] ==0){
                $puertaSql = "INSERT INTO temp_puertas(entamborada_fina,ent_econo,madera_cepi,hierro)value('".$this->entamFina."','".$this->entamEcon."','".$this->madeCepil."','".$this->hierro."')";
                $link->query($puertaSql);
                $idPuertas= $link->insert_id;
                $puertasTemp = "UPDATE user_temp SET temp_puertas='".$idPuertas."'";
                $link->query($puertasTemp);
            }else{
                $upPuerSql= "UPDATE temp_puertas SET entamborada_fina='".$this->entamFina."', ent_econo='".$this->entamEcon."', madera_cepi='".$this->madeCepil."',hierro='".$this->hierro."' where id=".$userTempRes["temp_puertas"]."";
                $link->query($upPuerSql);
            }//LISTO//LISTO
    }
    //AMBIENTES
    function fambien(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $ambienSql = "SELECT * FROM temp_ambientes where id=".$this->idAmbientes."";
        $resAmbiente = $link->query($ambienSql);
        $ambienteRes = $resAmbiente->fetch_array();
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
                    <input type="text" value="'.$ambienteRes["dormitorio"].'" class="text" id="dormit">
                </div>
                <div class="col">
                    <b>Comedor</b>
                    <input type="text" value="'.$ambienteRes["comedor"].'" class="text" id="comedor">
                </div>
                <div class="col">
                    <b>Sala</b>
                    <input type="text" value="'.$ambienteRes["sala"].'" class="text" id="sala">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <b>Baños</b>
                    <input type="text" value="'.$ambienteRes["banos"].'" class="text" id="banos" />
                </div>
                <div class="col">
                    <b>Cocina</b>
                    <input type="text" value="'.$ambienteRes["cocina"].'" class="text" id="Cocina" />
                </div>
                <div class="col">
                    <b>Servicio</b>
                    <input type="text" value="'.$ambienteRes["servicio"].'" class="text" id="Servicio" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <b>Oficina</b>
                    <input type="text" value="'.$ambienteRes["oficina"].'" class="text" id="oficina" />
                </div>
                <div class="col">
                    <b>Garaje</b>
                    <input type="text" value="'.$ambienteRes["garaje"].'" class="text" id="garaje" />
                </div>
                <div class="col">
                    <b>Estacionamiento</b>
                    <input type="text" value="'.$ambienteRes["estacionamiento"].'" class="text" id="estac" />
                </div>
            </div>
        </div>
        <div class="btnSig1">
            <input type="button" value="Guardar" onclick="btnguarAmbien()" class="botones btn btn-primary" />
        </div>
        ';//VERIFICADO//VERIFICADO
    }
    function guarAmbien(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //USUARIOS
            $userTempSql = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUserTemp = $link->query($userTempSql);
            $userTempRes1 = $resUserTemp->fetch_array();
        //TEMP USER
            $userTempSql1 = "SELECT * FROM user_temp where userId='".$userTempRes1["id"]."'";
            $resUserTemp1 = $link->query($userTempSql1);
            $userTempRes = $resUserTemp1->fetch_array();

            if($userTempRes["temp_ambientes"] ==0){
                $ambSql = "INSERT INTO temp_ambientes(dormitorio,comedor,sala,banos,cocina,servicio,oficina,garaje,estacionamiento)value('".$this->dormit."','".$this->comedor."','".$this->sala."','".$this->banos."','".$this->Cocina."','".$this->Servicio."','".$this->oficina."','".$this->garaje."','".$this->estac."')";
                $link->query($ambSql);
                $idAmbient= $link->insert_id;
                $ambientTemp = "UPDATE user_temp SET temp_ambientes='".$idAmbient."'";
                $link->query($ambientTemp);
            }else{
                $upAmbSql = "UPDATE temp_ambientes SET dormitorio='".$this->dormit."', comedor='".$this->comedor."', sala='".$this->sala."', banos='".$this->banos."', cocina='".$this->Cocina."', servicio='".$this->Servicio."',oficina='".$this->oficina."', garaje='".$this->garaje."', estacionamiento='".$this->estac."' where id= ".$userTempRes["temp_ambientes"]."";
                $link->query($upAmbSql);
            }//LISTO//LISTO
    }
    //COMPLEMENTOS
    function fConple(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $compleSQL = "SELECT * FROM temp_complementos where id=".$this->idComple."";
        $resComple = $link->query($compleSQL);
        $compleRes = $resComple->fetch_array();
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
                            <option value="'.$compleRes["ascensor"].'">'.$compleRes["ascensor"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Aire Acond.</b>
                        <select id="aireAcond">
                            <option value="'.$compleRes["aire_acond"].'">'.$compleRes["aire_acond"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Rejas</b>
                        <select id="rejas">
                            <option value="'.$compleRes["rejas"].'">'.$compleRes["rejas"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Closets</b>
                        <select id="closets">
                            <option value="'.$compleRes["closets"].'">'.$compleRes["closets"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Porcelana</b>
                        <select id="porcelana">
                            <option value="'.$compleRes["porcelana"].'">'.$compleRes["porcelana"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="btnSig1">
                <input type="button" value="Guardar" onclick="btnGuarComple()" class="botones btn btn-primary" />
            </div>
        ';//VERIFICADO
    }
    function guarComple(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //USUARIOS
            $userTempSql = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUserTemp = $link->query($userTempSql);
            $userTempRes1 = $resUserTemp->fetch_array();
        //TEMP USER
            $userTempSql1 = "SELECT * FROM user_temp where userId='".$userTempRes1["id"]."'";
            $resUserTemp1 = $link->query($userTempSql1);
            $userTempRes = $resUserTemp1->fetch_array();

            if($userTempRes["temp_complementos"] ==0){
                $compleSql = "INSERT INTO temp_complementos(ascensor,aire_acond,rejas,closets,porcelana)value('".$this->ascensor."','".$this->aireAcond."','".$this->rejas."','".$this->closets."','".$this->porcelana."')";
                $link->query($compleSql);
                $idcomple= $link->insert_id;
                $compleTemp = "UPDATE user_temp SET temp_complementos='".$idcomple."'";
                $link->query($compleTemp);
            }else{
                $upCompleSQL = "UPDATE temp_complementos SET ascensor='".$this->ascensor."', aire_acond='".$this->aireAcond."', rejas='".$this->rejas."', closets='".$this->closets."', porcelana='".$this->porcelana."' where id=".$userTempRes["temp_complementos"]."";
                $link->query($upCompleSQL);
            }//LISTO//LISTO
    }
    //SERVICIOS
    function fServicios(){//VERIFICADO
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $servSql = "SELECT * FROM temp_servicios_inmue where id=".$this->idServInmue."";
        $resServ = $link->query($servSql);
        $servRes = $resServ->fetch_array();
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
                            <option value="'.$servRes["acued"].'">'.$servRes["acued"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Acueducto Rural:</b>
                        <select class="codigo2" id="AcueRural">
                            <option value="'.$servRes["acuedRural"].'">'.$servRes["acuedRural"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Aguas Subterráneas:</b>
                        <select class="codigo2" id="AguasSub">
                            <option value="'.$servRes["aguasSubter"].'">'.$servRes["aguasSubter"].'</option>
                            <option value="N/A">N/A</option>
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
                            <option value="'.$servRes["pavimentoFlex"].'">'.$servRes["pavimentoFlex"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Pavimento Rígido:</b>
                        <select class="codigo2" id="PavRig">
                            <option value="'.$servRes["pavimentoRig"].'">'.$servRes["pavimentoRig"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Vía Engranzonada:</b>
                        <select class="codigo2" id="viaEngran">
                            <option value="'.$servRes["viaEngran"].'">'.$servRes["viaEngran"].'</option>
                            <option value="N/A">N/A</option>
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
                            <option value="'.$servRes["alumbradoPub"].'">'.$servRes["alumbradoPub"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Electricidad Residencial:</b>
                        <select class="codigo2" id="ElectResidencial">
                            <option value="'.$servRes["electriResi"].'">'.$servRes["electriResi"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Transporte Público:</b>
                        <select class="codigo2" id="transPublic">
                            <option value="'.$servRes["transportePublic"].'">'.$servRes["transportePublic"].'</option>
                            <option value="N/A">N/A</option>
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
                            <option value="'.$servRes["electriIndus"].'">'.$servRes["electriIndus"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Línea Telefónica:</b>
                        <select class="codigo2" id="linTelf">
                            <option value="'.$servRes["lineaTelef"].'">'.$servRes["lineaTelef"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Aseo:</b>
                        <select class="codigo2" id="aseo">
                            <option value="'.$servRes["aseo"].'">'.$servRes["aseo"].'</option>
                            <option value="N/A">N/A</option>
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
                            <option value="'.$servRes["pozoSept"].'">'.$servRes["pozoSept"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Aguas Servidas:</b>
                        <select class="codigo2" id="AguasServ">
                            <option value="'.$servRes["aguasServ"].'">'.$servRes["aguasServ"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Acera:</b>
                        <select class="codigo2" id="acera">
                            <option value="'.$servRes["acera"].'">'.$servRes["acera"].'</option>
                            <option value="N/A">N/A</option>
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
    function guarServicios(){//LISTO//LISTO
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //USUARIOS
            $userTempSql = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUserTemp = $link->query($userTempSql);
            $userTempRes1 = $resUserTemp->fetch_array();
        //TEMP USER
            $userTempSql1 = "SELECT * FROM user_temp where userId='".$userTempRes1["id"]."'";
            $resUserTemp1 = $link->query($userTempSql1);
            $userTempRes = $resUserTemp1->fetch_array();

            if($userTempRes["temp_servicios_inmue"] ==0){
                $servSql = "INSERT INTO temp_servicios_inmue(acued,acuedRural,aguasSubter,aguasServ,pavimentoFlex,pavimentoRig,viaEngran,acera,alumbradoPub,aseo,transportePublic,pozoSept,electriResi,electriIndus,lineaTelef)value('".$this->Acue."','".$this->AcueRural."','".$this->AguasSub."','".$this->AguasServ."','".$this->PavFlex."','".$this->PavRig."','".$this->viaEngran."','".$this->acera."','".$this->AlumPublico."','".$this->aseo."','".$this->transPublic."','".$this->pozoSept."','".$this->ElectResidencial."','".$this->ElectriIndust."','".$this->linTelf."')";
                $link->query($servSql);
                $idServic= $link->insert_id;
                $servicTemp = "UPDATE user_temp SET temp_servicios_inmue='".$idServic."'";
                $link->query($servicTemp);
            }else{
                $upServiSql = "UPDATE temp_servicios_inmue SET acued='".$this->Acue."', acuedRural='".$this->AcueRural."', aguasSubter='".$this->AguasServ."', pavimentoFlex='".$this->PavFlex."', pavimentoRig='".$this->PavRig."', viaEngran='".$this->viaEngran."', acera='".$this->acera."', alumbradoPub='".$this->AlumPublico."', aseo='".$this->aseo."', transportePublic='".$this->transPublic."', pozoSept='".$this->pozoSept."', electriResi='".$this->ElectResidencial."', electriIndus='".$this->ElectriIndust."', lineaTelef='".$this->linTelf."' where id=".$userTempRes["temp_complementos"]."";
                $link->query($upServiSql);
            }
    }
    //EXPEDIENTE
    function fExpedient(){//VERIFICADO
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $expSQL ="SELECT * FROM temp_expediente where id=".$this->idExp."";
        $resExp = $link->query($expSQL);
        $expRes = $resExp->fetch_array();
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
                            <input type="text" id="nuExp" value="'.$expRes["no_expediente"].'" onchange="veriExpediente()" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="campDat">
                            <b>Fecha:</b>
                            <input type="date" value="'.$expRes["fecha"].'"id="fechaExp" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="campDat">
                            <b>Valor Estimado del Inmueble:</b>
                            <input type="text" value="'.$expRes["valorInmue"].'"id="valorInmue" />
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
    function guarExpe(){//LISTO
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //USUARIOS
            $userTempSql = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUserTemp = $link->query($userTempSql);
            $userTempRes1 = $resUserTemp->fetch_array();
        //TEMP USER
            $userTempSql1 = "SELECT * FROM user_temp where userId='".$userTempRes1["id"]."'";
            $resUserTemp1 = $link->query($userTempSql1);
            $userTempRes = $resUserTemp1->fetch_array();
            if($userTempRes["temp_expediente"] ==0){
                $expeSql = "INSERT INTO temp_expediente(no_expediente,condicion,fecha,valorInmue)value('".$this->nuExp."','nada','".$this->fechaExp."','".$this->valorInmue."')";
                $link->query($expeSql);
                $idExpediente= $link->insert_id;
                $expedienteTemp = "UPDATE user_temp SET temp_expediente='".$idExpediente."'";
                $link->query($expedienteTemp);
            }else{
                $upExpeSql = "UPDATE temp_expediente SET no_expediente='".$this->nuExp."', condicion='nada', fecha='".$this->fechaExp."', valorInmue='".$this->valorInmue."' where id=".$userTempRes["temp_expediente"]."";
                $link->query($upExpeSql);
            }
    }
    function busExpediente(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        $expBusSql= "SELECT * FROM expediente where n_expediente=".$this->nuExp." ";
        $resExpBus = $link->query($expBusSql);
        $expBusRes = $resExpBus->fetch_array();
        if($expBusRes["id"]==""){
            $expEmpaBusSql= "SELECT * FROM expempadro where n_expediente=".$this->nuExp." ";
            $resExpEmpa = $link->query($expEmpaBusSql);
            $expEmpaRes = $resExpBus->fetch_array();
            echo'<input type="hidden" value="'.$expEmpaRes["n_expediente"].'" id="expVerificado" />';
        }else{
            echo'<input type="hidden" value="'.$expBusRes["n_expediente"].'" id="expVerificado" />';
        }
    } 
    //FACTURA
    function fFactura(){//VERIFICADO
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $factSQL = "SELECT * FROM temp_factura where id=".$this->idFactura."";
        $resFact = $link->query($factSQL);
        $factRes = $resFact->fetch_array();
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
                        <input type="text" value="'.$factRes["monto"].'" id="montoFact"/>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Número Factura:</b>
                        <input type="text" value="'.$factRes["n_factura"].'" id="numFact" onchange="btnVeriFact()"/>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Fecha:</b>
                        <input type="date" value="'.$factRes["fecha"].'" id="fechFact"/>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Recibo:</b>
                        <input type="text" value="'.$factRes["n_recibo"].'" id="recFact"/>
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
    function guarFact(){//LISTO//LISTO
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //USUARIOS
            $userTempSql = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUserTemp = $link->query($userTempSql);
            $userTempRes1 = $resUserTemp->fetch_array();
        //TEMP USER
            $userTempSql1 = "SELECT * FROM user_temp where userId='".$userTempRes1["id"]."'";
            $resUserTemp1 = $link->query($userTempSql1);
            $userTempRes = $resUserTemp1->fetch_array();
            if($userTempRes["temp_factura"] ==0){
                $factSql = "INSERT INTO temp_factura(monto,n_factura,fecha,n_recibo)value('".$this->montoFact."','".$this->numFact."','".$this->fechFact."','".$this->recFact."')";
                $link->query($factSql);
                $idFact= $link->insert_id;
                $factTemp = "UPDATE user_temp SET temp_factura='".$idFact."'";
                $link->query($factTemp);
            }else{
                $upFactSql = "UPDATE temp_factura SET monto='".$this->montoFact."', n_factura='".$this->numFact."', fecha='".$this->fechFact."', n_recibo='".$this->recFact."' where id='".$userTempRes["temp_factura"]."' ";
                $link->query($upFactSql);
            }
    }
    
    function cambSect(){
        if($this->parrInmue=="Capital"){
            echo'
                <option value="0"></option>
                <option value="URB RENATO LAPORTA">URB RENATO LAPORTA</option>
                <option value="EL PIÑAL">EL PIÑAL</option>
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
    function actGeneral(){//VERIFICADO
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $lindGenSql = "SELECT * FROM temp_linderos_general where id=".$this->idLindGen."";
        $reslindGen = $link->query($lindGenSql);
        $lindGenRes = $reslindGen->fetch_array();

        if($lindGenRes["norte"]=="nada"){
            $norteGen = $lindGenRes["noreste"];
            $puntNortGen = "NorEste";
        }elseif(!$lindGenRes["norte"]){
            $norteGen = "";
            $puntNortGen = "";
        }else{
            $norteGen = $lindGenRes["norte"];
            $puntNortGen = "Norte";
        }
        if($lindGenRes["sur"]=="nada"){
            $surGen = $lindGenRes["sureste"];
            $puntSurGen = "SurEste";
        }elseif(!$lindGenRes["sur"]){
            $surGen = "";
            $puntSurGen = "";
        }else{
            $surGen = $lindGenRes["sur"];
            $puntSurGen = "Sur";
        }
        if($lindGenRes["este"]=="nada"){
            $esteGen = $lindGenRes["suroeste"];
            $puntEsteGen = "SurOeste";
        }elseif(!$lindGenRes["este"]){
            $esteGen = "";
            $puntEsteGen = "";
        }else{
            $esteGen = $lindGenRes["este"];
            $puntEsteGen = "Este";
        }
        if($lindGenRes["oeste"]=="nada"){
            $oesteGen = $lindGenRes["noroeste"];
            $puntOesteGen = "NorOeste";
        }elseif(!$lindGenRes["oeste"]){
            $oesteGen = "";
            $puntOesteGen = "   ";
        }else{
            $oesteGen = $lindGenRes["oeste"];
            $puntOesteGen = "Oeste";
        }
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
                            <option value="'.$puntNortGen.'">'.$puntNortGen.'</option>
                            <option value="Norte">Norte</option>
                            <option value="NorEste">NorEste</option>
                        </select>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-4">
                                <input type="text" class="text" value="'.$norteGen.'" id="nortGen" />
                                <select id="uniNorte">
                                    <option value="'.$lindGenRes["uniNorte"].'">'.$lindGenRes["uniNorte"].'</option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <b>Alinderado</b>
                                <input type="text" value="'.$lindGenRes["alind_n"].'" class="text" id="alindNort" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <select id="puntSur">
                            <option value="'.$puntSurGen.'">'.$puntSurGen.'</option>
                            <option value="Sur">Sur</option>
                            <option value="SurEste">SurEste</option>
                        </select>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-4">
                                <input type="text" value="'.$surGen.'" class="text" id="surGen" />
                                <select id="uniSur">
                                    <option value="'.$lindGenRes["uniSur"].'">'.$lindGenRes["uniSur"].'</option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <b>Alinderado</b>
                                <input type="text" class="text" value="'.$lindGenRes["alind_s"].'" id="alindSur" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <select id="puntEste">
                            <option value="'.$puntEsteGen.'">'.$puntEsteGen.'</option>
                            <option value="Este">Este</option>
                            <option value="SurOeste">SurOeste</option>
                        </select>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-4">
                                <input type="text" value="'.$esteGen.'" class="text" id="esteGen" />
                                <select id="uniEste">
                                    <option value="'.$lindGenRes["uniEste"].'">'.$lindGenRes["uniEste"].'</option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <b>Alinderado</b>
                                <input type="text" onKeyUp="mayusProp(this)" value="'.$lindGenRes["alind_e"].'" class="text" id="alindEste" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <select id="puntOeste">
                            <option value="'.$puntOesteGen.'">'.$puntOesteGen.'</option>
                            <option value="Oeste">Oeste</option>
                            <option value="NorOeste">NorOeste</option>
                        </select>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-4">
                                <input type="text" value="'.$oesteGen.'" class="text" id="oesteGen" />
                                <select id="uniOeste">
                                    <option value="'.$lindGenRes["uniOeste"].'">'.$lindGenRes["uniOeste"].'</option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <b>Alinderado</b>
                                <input type="text" onKeyUp="mayusProp(this)" value="'.$lindGenRes["alind_o"].'" class="text" id="alindOeste" />
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
                            <input type="text" value="'.$lindGenRes["areaTotal"].'" class="text" id="arTotal" >
                            <select id="uniAreaT">
                                <option value="'.$lindGenRes["areaTotal"].'">'.$lindGenRes["uniAreaT"].'</option>
                                <option value="N/A">N/A</option>
                                <option value="m2">m2</option>
                                <option value="Ha">Ha</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="campDat">
                            <b>Niveles de Construcción</b>
                            <input type="text" onKeyUp="mayusProp(this)" value="'.$lindGenRes["nivelesConst"].'" class="text" id="NivConstTotal" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="campDat">
                            <b>Área de Construcción</b>
                            <input type="text" value="'.$lindGenRes["areaConst"].'" class="text" id="arConstTotal" >
                            <select id="uniAreaConst">
                                <option value="'.$lindGenRes["uniAreaC"].'">'.$lindGenRes["uniAreaC"].'</option>
                                <option value="N/A">N/A</option>
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
    function guarGeneral(){//LISTO
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
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
        session_start();
        //USUARIOS
            $userTempSql = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUserTemp = $link->query($userTempSql);
            $userTempRes1 = $resUserTemp->fetch_array();
        //TEMP USER
            $userTempSql1 = "SELECT * FROM user_temp where userId='".$userTempRes1["id"]."'";
            $resUserTemp1 = $link->query($userTempSql1);
            $userTempRes = $resUserTemp1->fetch_array();
            if($userTempRes["temp_linderos_general"] ==0){
                $lindGen = "INSERT INTO temp_linderos_general(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$Norte."','".$norEste."','".$Sur."','".$SurEste."','".$Este."','".$SurOeste."','".$Oeste."','".$NortOeste."','".$this->alindNort."','".$this->alindSur."','".$this->alindEste."','".$this->alindOeste."','".$this->arTotal."','".$this->uniAreaT."','".$this->NivConstTotal."','".$this->uniAreaConst."','".$this->arConstTotal."','".$this->uniNorte."','".$this->uniSur."','".$this->uniEste."','".$this->uniOeste."')";
                $link->query($lindGen);
                $idlindGen= $link->insert_id;
                $lindGenTemp = "UPDATE user_temp SET temp_linderos_general='".$idlindGen."'";
                $link->query($lindGenTemp);
            }else{
                $upLindGenSql ="UPDATE temp_linderos_general SET norte='".$Norte."', noreste='".$norEste."', sur='".$Sur."', sureste='".$SurEste."', este='".$Este."', suroeste='".$SurOeste."', oeste='".$Oeste."', noroeste='".$NortOeste."', alind_n='".$this->alindNort."', alind_s='".$this->alindSur."', alind_e='".$this->alindEste."', alind_o='".$this->alindOeste."', areaTotal='".$this->arTotal."', uniAreaT='".$this->uniAreaT."', nivelesConst='".$this->NivConstTotal."', uniAreaC='".$this->uniAreaConst."', areaConst='".$this->arConstTotal."', uniNorte='".$this->uniNorte."', uniSur='".$this->uniSur."', uniEste='".$this->uniEste."', uniOeste='".$this->uniOeste."' where id=".$userTempRes["temp_linderos_general"]."";
                $link->query($upLindGenSql);
            }
    }
    //LINDEROS POSIBLE VENTA
    function actPosVenta(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $lindPosSql = "SELECT * FROM temp_linderos_posible_venta where id=".$this->idPosVenta."";
        $resLindPos = $link->query($lindPosSql);
        $lindPosRes = $resLindPos->fetch_array();
        if($lindPosRes["norte"]=="nada"){
            $nortePosVen = $lindPosRes["noreste"];
            $puntNortPos = "NorEste";
        }elseif(!$lindPosRes["norte"]){
            $nortePosVen = "";
            $puntNortPos = "";
        }else{
            $nortePosVen = $lindPosRes["norte"];
            $puntNortPos = "Norte";
        }
        if($lindPosRes["sur"]=="nada"){
            $surPosVen = $lindPosRes["sureste"];
            $puntSurPos = "SurEste";
        }elseif(!$lindPosRes["sur"]){
            $surPosVen = "";
            $puntSurPos = "";
        }else{
            $surPosVen = $lindPosRes["sur"];
            $puntSurPos = "Sur";
        }
        if($lindPosRes["este"]=="nada"){
            $estePosVen = $lindPosRes["suroeste"];
            $puntEstePos = "SurOeste";
        }elseif(!$lindPosRes["este"]){
            $estePosVen = "";
            $puntEstePos = "";
        }else{
            $estePosVen = $lindPosRes["este"];
            $puntEstePos = "Este";
        }
        if($lindPosRes["oeste"]=="nada"){
            $oestePosVen = $lindPosRes["noroeste"];
            $puntOestePos = "NorOeste";
        }elseif(!$lindPosRes["oeste"]){
            $oestePosVen = "";
            $puntOestePos = "";
        }else{
            $oestePosVen = $lindPosRes["oeste"];
            $puntOestePos = "Oeste";
        }
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
                        <option value='.$puntNortPos.'>'.$puntNortPos.'</option>
                        <option value="Norte">Norte</option>
                        <option value="NorteEste">NortEste</option>
                    </select>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-4">
                            <input type="text" value="'.$nortePosVen.'" class="text" id="nortPosVenta" />
                            <select id="uniNorte2">
                                <option value="'.$lindPosRes["uniNorte"].'">'.$lindPosRes["uniNorte"].'</option>
                                <option value="m">m</option>
                                <option value="Lq">Lq</option>
                                <option value="Ld">Ld</option>
                                <option value="otros">otros</option>
                            </select>
                        </div>
                        <div class="col-8">
                            <b>Alinderado</b>
                            <input type="text" onKeyUp="mayusProp(this)" value="'.$lindPosRes["uniNorte"].'"class="text" id="alindPosNort" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <select id="puntSur2">
                        <option value="'.$puntSurPos.'">'.$puntSurPos.'</option>
                        <option value="Sur">Sur</option>
                        <option value="SurEste">SurEste</option>
                    </select>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-4">
                            <input type="text" value="'.$surPosVen.'" class="text" id="surPosVenta" />
                            <select id="uniSur2">
                                <option value="'.$lindPosRes["uniSur"].'">'.$lindPosRes["uniSur"].'</option>
                                <option value="m">m</option>
                                <option value="Lq">Lq</option>
                                <option value="Ld">Ld</option>
                                <option value="otros">otros</option>
                            </select>
                        </div>
                        <div class="col-8">
                            <b>Alinderado</b>
                            <input type="text" onKeyUp="mayusProp(this)" value="'.$lindPosRes["alind_s"].'" class="text" id="alindPosSur" />
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <select id="puntEste2">
                        <option value="'.$puntEstePos.'">'.$puntEstePos.'</option>
                        <option value="Este">Este</option>
                        <option value="SurOeste">SurOeste</option>
                    </select>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-4">
                            <input type="text" value="'.$surPosVen.'" class="text" id="estePosVenta" />
                            <select id="uniEste2">
                                <option value="'.$lindPosRes["uniEste"].'">'.$lindPosRes["uniEste"].'</option>
                                <option value="m">m</option>
                                <option value="Lq">Lq</option>
                                <option value="Ld">Ld</option>
                                <option value="otros">otros</option>
                            </select>
                        </div>
                        <div class="col-8">
                            <b>Alinderado</b>
                            <input type="text" onKeyUp="mayusProp(this)" value="'.$lindPosRes["alind_e"].'" class="text" id="alindPosEste" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <select id="puntOeste2">
                        <option value="'.$puntOestePos.'">'.$puntOestePos.'</option>
                        <option value="Oeste">Oeste</option>
                        <option value="NortOeste">NortOeste</option>
                    </select>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-4">
                            <input type="text" value="'.$oestePosVen.'" class="text" id="oestePosVenta" />
                            <select id="uniOeste2">
                                <option value="'.$lindPosRes["uniOeste"].'">'.$lindPosRes["uniOeste"].'</option>
                                <option value="m">m</option>
                                <option value="Lq">Lq</option>
                                <option value="Ld">Ld</option>
                                <option value="otros">otros</option>
                            </select>
                        </div>
                        <div class="col-8">
                            <b>Alinderado</b>
                            <input type="text" onKeyUp="mayusProp(this)" value="'.$lindPosRes["alind_o"].'"class="text"id="alindPosOeste" />
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
                        <input type="text" value="'.$lindPosRes["areaTotal"].'"class="text" id="arTotal2" >
                        <select id="uniAreaT2">
                            <option value="'.$lindPosRes["uniAreaT"].'">'.$lindPosRes["uniAreaT"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="m2">m2</option>
                            <option value="Ha">Ha</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="campDat">
                        <b>Niveles de Construcción</b>
                        <input type="text" onKeyUp="mayusProp(this)" value="'.$lindPosRes["nivelesConst"].'"class="text" id="NivConstTotal2" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="campDat">
                        <b>Área de Construcción</b>
                        <input type="text" value="'.$lindPosRes["areaConst"].'"class="text" id="arConstTotal2" >
                        <select id="uniAreaConst2">
                            <option value="'.$lindPosRes["uniAreaC"].'">'.$lindPosRes["uniAreaC"].'</option>
                            <option value="N/A">N/A</option>//
                            <option value="m2">m2</option>
                            <option value="Ha">Ha</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <input type="button" onKeyUp="mayusProp(this)" class="btn btn-success" onclick="calLindVenta()" value="Calcular">
                </div>
            </div>
        </div>
        <div class="btnSig1">
            <input type="button" value="Guardar" onclick="btnGuarPosVenta()" class="botones btn btn-primary" />
        </div>
        ';//VERIFCADO
    }
    function guarPosVenta(){//LISTO
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
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
        session_start();
        //USUARIOS
            $userTempSql = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUserTemp = $link->query($userTempSql);
            $userTempRes1 = $resUserTemp->fetch_array();
        //TEMP USER
            $userTempSql1 = "SELECT * FROM user_temp where userId='".$userTempRes1["id"]."'";
            $resUserTemp1 = $link->query($userTempSql1);
            $userTempRes = $resUserTemp1->fetch_array();
            if($userTempRes["temp_linderos_posible_venta"] ==0){
                $lindPosVentaSql = "INSERT INTO temp_linderos_posible_venta(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$Norte2."','".$norEste2."','".$Sur2."','".$SurEste2."','".$Este2."','".$SurOeste2."','".$Oeste2."','".$NortOeste2."','".$this->alindPosNort."','".$this->alindPosSur."','".$this->alindPosEste."','".$this->alindOeste."','".$this->arTotal2."','".$this->uniAreaT2."','".$this->NivConstTotal2."','".$this->uniAreaConst2."','".$this->arConstTotal2."','".$this->uniNorte2."','".$this->uniSur2."','".$this->uniEste2."','".$this->uniOeste2."')";
                $link->query($lindPosVentaSql);
                $idLindPosVenta = $link->insert_id;
                $lindPosVentTemp = "UPDATE user_temp SET temp_linderos_posible_venta='".$idLindPosVenta."'";
                $link->query($lindPosVentTemp);
            }else{
                $upLindGenSql ="UPDATE temp_linderos_posible_venta SET norte='".$Norte2."', noreste='".$norEste2."', sur='".$Sur2."', sureste='".$SurEste2."', este='".$Este2."', suroeste='".$SurOeste2."', oeste='".$Oeste2."', noroeste='".$NortOeste2."', alind_n='".$this->alindPosNort."', alind_s='".$this->alindPosSur."', alind_e='".$this->alindPosEste."', alind_o='".$this->alindOeste."', areaTotal='".$this->arTotal2."', uniAreaT='".$this->uniAreaT2."', nivelesConst='".$this->NivConstTotal2."', uniAreaC='".$this->uniAreaConst2."', areaConst='".$this->arConstTotal2."', uniNorte='".$this->uniNorte2."', uniSur='".$this->uniSur2."', uniEste='".$this->uniEste2."', uniOeste='".$this->uniOeste2."' where id=".$userTempRes["temp_linderos_posible_venta"]."";
                $link->query($upLindGenSql);
            }
    }
    //LINDEROS SEGUN DOCUMENTO
    function SecDoc(){//VERIFICADO
       include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $secDocSql = "SELECT * FROM temp_linderos_documento where id=".$this->idLindDoc."";
        $resSecDoc = $link->query($secDocSql);
        $secDocRes = $resSecDoc->fetch_array();
        if($secDocRes["norte"]=="nada"){
            $norteSecDoc = $secDocRes["noreste"];
            $puntNortDoc = "NorEste";
        }elseif(!$secDocRes["norte"]){
            $norteSecDoc = "";
            $puntNortDoc = "";
        }else{
            $norteSecDoc = $secDocRes["norte"];
            $puntNortDoc = "Norte";
        }
        if($secDocRes["sur"]=="nada"){
            $surSecDoc = $secDocRes["sureste"];
            $puntSurDoc = "SurEste";
        }elseif(!$secDocRes["sur"]){
            $surSecDoc = "";
            $puntSurDoc = "";
        }else{
            $surSecDoc = $secDocRes["sur"];
            $puntSurDoc = "Sur";
        }
        if($secDocRes["este"]=="nada"){
            $esteSecDoc = $secDocRes["suroeste"];
            $puntEsteDoc = "SurOeste";
        }elseif(!$secDocRes["este"]){
            $esteSecDoc = "";
            $puntEsteDoc = "";
        }else{
            $esteSecDoc = $secDocRes["este"];
            $puntEsteDoc = "Este";
        }
        if($secDocRes["oeste"]=="nada"){
            $oesteSecDoc = $secDocRes["noroeste"];
            $puntOesteDoc = "NorOeste";
        }elseif(!$secDocRes["oeste"]){
            $oesteSecDoc = "";
            $puntOesteDoc = "";
        }else{
            $oesteSecDoc = $secDocRes["oeste"];
            $puntOesteDoc = "Oeste";
        }
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
                            <option value="'.$puntNortDoc.'">'.$puntNortDoc.'</option>
                            <option value="Norte">Norte</option>
                            <option value="NorteEste">NortEste</option>
                        </select>
                    </div>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="text" value="'.$norteSecDoc.'" class="text" id="nortSecDoc" />
                                <select id="uniNorte3">
                                    <option value="'.$secDocRes["uniNorte"].'">'.$secDocRes["uniNorte"].'</option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-lg-8">
                                <b>Alinderado</b>
                                <input type="text" onKeyUp="mayusProp(this)" value="'.$secDocRes["alind_n"].'" class="text" id="alindSecNorte" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <select id="puntSur3">
                            <option value="'.$puntSurDoc.'">'.$puntSurDoc.'</option>
                            <option value="Sur">Sur</option>
                            <option value="SurEste">SurEste</option>
                        </select>
                    </div>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="text" value="'.$surSecDoc.'" class="text" id="surSecDoc" />
                                <select id="uniSur3">
                                    <option value="'.$secDocRes["uniSur"].'">'.$secDocRes["uniSur"].'</option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-lg-8">
                                <b >Alinderado</b>
                                <input type="text" onKeyUp="mayusProp(this)" value="'.$secDocRes["alind_s"].'" class="text" id="alindSecSur" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <select id="puntEste3">
                            <option value="'.$puntEsteDoc.'">'.$puntEsteDoc.'</option>
                            <option value="Este">Este</option>
                            <option value="SurOeste">SurOeste</option>
                        </select>
                    </div>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="text" value="'.$esteSecDoc.'" class="text" id="esteSecDoc" />
                                <select id="uniEste3">
                                    <option value="'.$secDocRes["uniEste"].'">'.$secDocRes["uniEste"].'</option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-lg-8">
                                <b>Alinderado</b>
                                <input type="text" onKeyUp="mayusProp(this)" value="'.$secDocRes["alind_e"].'" class="text" id="alindSecEste" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <select id="puntOeste3">
                            <option value="'.$puntOesteDoc.'">'.$puntOesteDoc.'</option>
                            <option value="Oeste">Oeste</option>
                            <option value="NortOeste">NortOeste</option>
                        </select>
                    </div>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="text" value="'.$oesteSecDoc.'" class="text" id="oesteSecDoc" />
                                <select id="uniOeste3">
                                    <option value="'.$secDocRes["uniOeste"].'">'.$secDocRes["uniOeste"].'</option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-lg-8">
                                <b>Alinderado</b>
                                <input type="text" onKeyUp="mayusProp(this)" value="'.$secDocRes["alind_o"].'" class="text" id="alindSecOeste" />
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
                            <input type="text" onKeyUp="mayusProp(this)" value="'.$secDocRes["areaTotal"].'" class="text" id="arTotal3" >
                            <select id="uniAreaT3">
                                <option value="'.$secDocRes["uniAreaT"].'">'.$secDocRes["uniAreaT"].'</option>
                                <option value="N/A">N/A</option>
                                <option value="m2">m2</option>
                                <option value="Ha">Ha</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="campDat">
                            <b>Niveles de Construcción</b>
                            <input type="text" onKeyUp="mayusProp(this)" value="'.$secDocRes["nivelesConst"].'" class="text" id="NivConstTotal3" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7">
                        <div class="campDat">
                            <b>Área de Construcción</b>
                            <input type="text" onKeyUp="mayusProp(this)" value="'.$secDocRes["areaConst"].'" id="arConstTotal3" >
                            <select id="uniAreaConst3">
                                <option value="'.$secDocRes["uniAreaC"].'">'.$secDocRes["uniAreaC"].'</option>
                                <option value="N/A">N/A</option>
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
    function guarSecDoc(){//LISTO
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
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
        session_start();
        //USUARIOS
            $userTempSql = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUserTemp = $link->query($userTempSql);
            $userTempRes1 = $resUserTemp->fetch_array();
        //TEMP USER
            $userTempSql1 = "SELECT * FROM user_temp where userId='".$userTempRes1["id"]."'";
            $resUserTemp1 = $link->query($userTempSql1);
            $userTempRes = $resUserTemp1->fetch_array();
            if($userTempRes["temp_linderos_documento"] ==0){
                $lindDocSql = "INSERT INTO temp_linderos_documento(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$Norte3."','".$norEste3."','".$Sur3."','".$SurEste3."','".$Este3."','".$SurOeste3."','".$Oeste3."','".$NortOeste3."','".$this->alindSecNorte."','".$this->alindSecSur."','".$this->alindSecEste."','".$this->alindSecOeste."','".$this->arTotal3."','".$this->uniAreaT3."','".$this->NivConstTotal3."','".$this->uniAreaConst3."','".$this->arConstTotal3."','".$this->uniNorte3."','".$this->uniSur3."','".$this->uniEste3."','".$this->uniOeste3."')";
                $link->query($lindDocSql);
                $idLindDoc= $link->insert_id;
                $lindDocSQL = "UPDATE user_temp SET temp_linderos_documento='".$idLindDoc."'";
                $link->query($lindDocSQL);
            }else{
                $upLindGenSql ="UPDATE temp_linderos_documento SET norte='".$Norte3."', noreste='".$norEste3."', sur='".$Sur3."', sureste='".$SurEste3."', este='".$Este3."', suroeste='".$SurOeste3."', oeste='".$Oeste3."', noroeste='".$NortOeste3."', alind_n='".$this->alindSecNorte."', alind_s='".$this->alindSecSur."', alind_e='".$this->alindSecEste."', alind_o='".$this->alindSecOeste."', areaTotal='".$this->arTotal3."', uniAreaT='".$this->uniAreaT3."', nivelesConst='".$this->NivConstTotal3."', uniAreaC='".$this->uniAreaConst3."', areaConst='".$this->arConstTotal3."', uniNorte='".$this->uniNorte3."', uniSur='".$this->uniSur3."', uniEste='".$this->uniEste3."', uniOeste='".$this->uniOeste3."' where id=".$userTempRes["temp_linderos_documento"]."";
                $link->query($upLindGenSql);
            }
    }
    //VERIFICAR F003
    function veriF3(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //USUARIO
            $userSQL = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUser = $link->query($userSQL);
            $userRes = $resUser->fetch_array();
        //USUARIOS TEMPORALES
            $tempUserSQL ="SELECT * FROM user_temp where userId=".$userRes["id"]."";
            $resTempUser = $link->query($tempUserSQL);
            $tempUserRes = $resTempUser->fetch_array();
        //PROPIETARIOS TEMP
            $propSQL ="SELECT * FROM temp_propietarios where id=".$tempUserRes["temp_propietarios"]."";
            $resProp = $link->query($propSQL);
            $propieRes = $resProp->fetch_array();
        //PROPIETARIOS
            $propSqlDe= "SELECT * FROM propietarios where cedula='".$propieRes["cedula"]."'";
            $resPropDe = $link->query($propSqlDe);
            $propDeRes = $resPropDe->fetch_array();
            //BUSQUEDA PROPIETARIO
                
                if($propSQLRes["cedula"]==$propieRes["cedula"]){
                    $uptPropSQl = "UPDATE propietarios SET cedula='".$propieRes["cedula"]."', rif='".$propieRes["rif"]."', nombre='".$propieRes["nombre"]."', apellido='".$propieRes["apellido"]."',telef='".$propieRes["telef"]."',dir_hab='".$propieRes["dir_hab"]."', telef_hab='".$propieRes["telef_hab"]."' where cedula='".$propieRes["cedula"]."'";
                    $resUptProp = $link->query($uptPropSQl);
                    $idProp2 = $propSQLRes["id"];
                }else{
                    $propietarioSQL ="INSERT INTO propietarios(cedula,rif,nombre,apellido,telef,dir_hab,telef_hab)value('".$propieRes['cedula']."','".$propieRes['rif']."','".$propieRes['nombre']."','".$propieRes['apellido']."','".$propieRes['telef']."','".$propieRes['dir_hab']."','".$propieRes['telef_hab']."') ";
                    $link->query($propietarioSQL);
                    $idProp2 = $link->insert_id;
                }
        //INMUEBLE TEMP
            $inmueSQL ="SELECT * FROM temp_inmueble where id=".$tempUserRes["temp_inmueble"]."";
            $resInmue = $link->query($inmueSQL);
            $inmueRes = $resInmue->fetch_array();
        //INMUEBLE
            $inmueDeSQL ="SELECT * FROM inmueble where direccion='".$inmueRes["direccion"]."'";
            $resDeInmue = $link->query($inmueDeSQL);
            $inmueDeRes = $resDeInmue->fetch_array();
        if($propDeRes["cedula"]==$propieRes["cedula"]){
            if($inmueDeRes["id"]!=0){
                echo'<input type="hidden" value="true" id="verInmV">';
            }else{
                echo'<input type="hidden" value="false" id="verInmV">';
                //CARACTERISTICAS DEL INMUEBLE
                    $caracInmueSQL = "SELECT * FROM temp_carainmue where id=".$tempUserRes["temp_carainmue"]." ";
                    $resCaracInmue = $link->query($caracInmueSQL);
                    $caracInmueRes = $resCaracInmue->fetch_array();
                    $caraInmueSQL = "INSERT INTO carc_inmueble(topografia,forma,uso,tenencia)value('".$caracInmueRes["topografia"]."','".$caracInmueRes["forma"]."','".$caracInmueRes["uso"]."','".$caracInmueRes["tenencia"]."')";
                    $link->query($caraInmueSQL);
                    $idcaraInmue2 = $link->insert_id;
                //PUERTAS
                    $puertSQL = "SELECT * FROM temp_puertas where id=".$tempUserRes["temp_puertas"]."";
                    $resPuert = $link->query($puertSQL);
                    $puertRes = $resPuert->fetch_array();
                    $puertasSQL = "INSERT INTO puertas(entamborada_fina,ent_econo,madera_cepi,hierro)value('".$puertRes['entamborada_fina']."','".$puertRes['ent_econo']."','".$puertRes['madera_cepi']."','".$puertRes['hierro']."')";
                    $link->query($puertasSQL);
                    $idPuertas = $link->insert_id;
                //ESTADO DE CONSERVACION
                    $estaConserSQL = "SELECT * FROM temp_estado_conservacion where id=".$tempUserRes["temp_estado_conservacion"]."";
                    $resEstaConser = $link->query($estaConserSQL);
                    $estaConserRes = $resEstaConser->fetch_array();
                    $conservSQL = "INSERT INTO estado_conservacion(ano_construccion,ano_refaccion,edad_efectiva,nro_planta,nro_vivienda)value('".$estaConserRes["ano_construccion"]."','".$estaConserRes["ano_refaccion"]."','".$estaConserRes["edad_efectiva"]."','".$estaConserRes["nro_planta"]."','".$estaConserRes["nro_vivienda"]."')";
                    $link->query($conservSQL);
                    $idConserv = $link->insert_id;
                //PIEZAS SANITARIAS
                    $piezSantSQL = "SELECT * FROM temp_piezas_sanitarias where id=".$tempUserRes["temp_piezas_sanitarias"]."";
                    $resPiezSant = $link->query($piezSantSQL);
                    $piezSantRes = $resPiezSant->fetch_array();
                    $piezSQL = "INSERT INTO piezas_sanitarias(porcelana_fina,porcelana_econ,banera,calentador,wc,bidet,lavamanos,ducha,urinario)value('".$piezSantRes["porcelana_fina"]."','".$piezSantRes["porcelana_econ"]."','".$piezSantRes["banera"]."','".$piezSantRes["calentador"]."','".$piezSantRes["wc"]."','".$piezSantRes["bidet"]."','".$piezSantRes["lavamanos"]."','".$piezSantRes["ducha"]."','".$piezSantRes["urinario"]."')";
                    $link->query($piezSQL);
                    $idPiezSant = $link->insert_id;
                //COMPLEMENTOS
                    $compleSQL ="SELECT * FROM temp_complementos where id=".$tempUserRes["temp_complementos"]."";
                    $resComple = $link->query($compleSQL);
                    $compleRes = $resComple->fetch_array();
                    $complementSQL ="INSERT INTO complementos(ascensor,aire_acond,rejas,closets,porcelana)value('".$compleRes["ascensor"]."','".$compleRes["aire_acond"]."','".$compleRes["rejas"]."','".$compleRes["closets"]."','".$compleRes["porcelana"]."')";
                    $link->query($complementSQL);
                    $idComplement = $link->insert_id;
                //AMBIENTES
                    $ambienSQL = "SELECT * FROM temp_ambientes where id=".$tempUserRes["temp_ambientes"]."";
                    $resAmbiente = $link->query($ambienSQL);
                    $ambientesRes = $resAmbiente->fetch_array();
                    $ambientSQL = "INSERT INTO ambientes(dormitorio,comedor,sala,banos,cocina,servicio,oficina,garaje,estacionamiento)value('".$ambientesRes["dormitorio"]."','".$ambientesRes["comedor"]."','".$ambientesRes["sala"]."','".$ambientesRes["banos"]."','".$ambientesRes["cocina"]."','".$ambientesRes["servicio"]."','".$ambientesRes["oficina"]."','".$ambientesRes["garaje"]."','".$ambientesRes["estacionamiento"]."')";
                    $link->query($ambientSQL);
                    $idAmbientes = $link->insert_id;
                //CARACTERISTICAS DE LA CONSTRUCCION
                    $caracConstSQL = "SELECT * FROM temp_caraconst where id=".$tempUserRes["temp_caraconst"]."";
                    $resCaraConst = $link->query($caracConstSQL);
                    $caraConstRes = $resCaraConst->fetch_array();
                    $SQLcaraConst = "INSERT INTO caracteristicas_construccion(destino,estructura,paredes_tipo,paredes_acabado,pintura,techo,pisos,ventanas,insta_electricas,observ,Regimen,fk_puertas,fk_estadoConserv,fk_piezasSanitarias,fk_complementos,fk_ambientes,fk_estadoCons)value('".$caraConstRes["destino"]."','".$caraConstRes["estructura"]."','".$caraConstRes["paredes_tipo"]."','".$caraConstRes["paredes_acabado"]."','".$caraConstRes["pintura"]."','".$caraConstRes["techo"]."','".$caraConstRes["pisos"]."','".$caraConstRes["ventanas"]."','".$caraConstRes["insta_electricas"]."','".$caraConstRes["observ"]."','".$caraConstRes["Regimen"]."',".$idPuertas.",".$idConserv.",".$idPiezSant.",".$idComplement.",".$idComplement.",".$idAmbientes.")";
                    $link->query($SQLcaraConst);
                    $idCaraConst = $link->insert_id;
                //PROTOCOLIZACION DEL INMUEBLE
                    $protoSQL = "SELECT * FROM temp_datos_protocolizacion where id=".$tempUserRes["temp_datos_protocolizacion"]."";
                    $resProto = $link->query($protoSQL);
                    $protoRes = $resProto->fetch_array();
                    $protSQL = "INSERT INTO datos_protocolizacion(documento,direccion,numero,tomo,folio,protocolo,trimestre,fecha,valor_inmueble)value('".$protoRes["documento"]."','".$protoRes["direccion"]."','".$protoRes["numero"]."','".$protoRes["tomo"]."','".$protoRes["folio"]."','".$protoRes["protocolo"]."','".$protoRes["trimestre"]."','".$protoRes["fecha"]."','".$protoRes["valor_inmueble"]."')";
                    $link->query($protSQL);
                    $idProt = $link->insert_id;
                //SERVICIOS
                    $serviciosSQL ="SELECT * FROM temp_servicios_inmue where id=".$tempUserRes["temp_servicios_inmue"]."";
                    $resServicios = $link->query($serviciosSQL);
                    $serviciosRes = $resServicios->fetch_array();
                    $servSQL = "INSERT INTO servicios_inmue(acued,acuedRural,aguasSubter,aguasServ,pavimentoFlex,pavimentoRig,viaEngran,acera,alumbradoPub,aseo,transportePublic,pozoSept,electriResi,electriIndus,lineaTelef)VALUE('".$serviciosRes["acued"]."','".$serviciosRes["acuedRural"]."','".$serviciosRes["aguasSubter"]."','".$serviciosRes["aguasServ"]."','".$serviciosRes["pavimentoFlex"]."','".$serviciosRes["pavimentoRig"]."','".$serviciosRes["viaEngran"]."','".$serviciosRes["acera"]."','".$serviciosRes["alumbradoPub"]."','".$serviciosRes["aseo"]."','".$serviciosRes["transportePublic"]."','".$serviciosRes["pozoSept"]."','".$serviciosRes["electriResi"]."','".$serviciosRes["electriIndus"]."','".$serviciosRes["lineaTelef"]."')";
                    $link->query($servSQL);
                    $idServ = $link->insert_id;
                //LINDEROS SEGUN DOC
                    $lindDocSQL = "SELECT * FROM temp_linderos_documento where id=".$tempUserRes["temp_linderos_documento"]."";
                    $resLindDoc = $link->query($lindDocSQL);
                    $lindDocRes = $resLindDoc->fetch_array();
                    $lindDocumSQL = "INSERT INTO linderos_documento(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$lindDocRes["norte"]."','".$lindDocRes["noreste"]."','".$lindDocRes["sur"]."','".$lindDocRes["sureste"]."','".$lindDocRes["este"]."','".$lindDocRes["suroeste"]."','".$lindDocRes["oeste"]."','".$lindDocRes["noroeste"]."','".$lindDocRes["alind_n"]."','".$lindDocRes["alind_s"]."','".$lindDocRes["alind_e"]."','".$lindDocRes["alind_o"]."','".$lindDocRes["areaTotal"]."','".$lindDocRes["uniAreaT"]."','".$lindDocRes["nivelesConst"]."','".$lindDocRes["uniAreaC"]."','".$lindDocRes["areaConst"]."','".$lindDocRes["uniNorte"]."','".$lindDocRes["uniSur"]."','".$lindDocRes["uniEste"]."','".$lindDocRes["uniOeste"]."')";
                    $link->query($lindDocumSQL);
                    $idLinDocum = $link->insert_id;
                //LINDEROS SEGUN INSPEC
                    $lindGenSQL = "SELECT * FROM temp_linderos_general where id=".$tempUserRes["temp_linderos_general"]."";
                    $resLindGen = $link->query($lindGenSQL);
                    $lindGenRes = $resLindGen->fetch_array();
                    $lindGeneralSQL = "INSERT INTO linderos_general(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$lindGenRes["norte"]."','".$lindGenRes["noreste"]."','".$lindGenRes["sur"]."','".$lindGenRes["sureste"]."','".$lindGenRes["este"]."','".$lindGenRes["suroeste"]."','".$lindGenRes["oeste"]."','".$lindGenRes["noroeste"]."','".$lindGenRes["alind_n"]."','".$lindGenRes["alind_s"]."','".$lindGenRes["alind_e"]."','".$lindGenRes["alind_o"]."','".$lindGenRes["areaTotal"]."','".$lindGenRes["uniAreaT"]."','".$lindGenRes["nivelesConst"]."','".$lindGenRes["uniAreaC"]."','".$lindGenRes["areaConst"]."','".$lindGenRes["uniNorte"]."','".$lindGenRes["uniSur"]."','".$lindGenRes["uniEste"]."','".$lindGenRes["uniOeste"]."')";
                    $link->query($lindGeneralSQL);
                    $idLinGeneral = $link->insert_id;
                //LINDEROS POSIBLE VENTA
                    $lindPosSQL = "SELECT * FROM temp_linderos_posible_venta where id=".$tempUserRes["temp_linderos_posible_venta"]."";
                    $resLindPos = $link->query($lindPosSQL);
                    $lindPosRes = $resLindPos->fetch_array();
                    $lindVentaSQL = "INSERT INTO linderos_posible_venta(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$lindPosRes["norte"]."','".$lindPosRes["noreste"]."','".$lindPosRes["sur"]."','".$lindPosRes["sureste"]."','".$lindPosRes["este"]."','".$lindPosRes["suroeste"]."','".$lindPosRes["oeste"]."','".$lindPosRes["noroeste"]."','".$lindPosRes["alind_n"]."','".$lindPosRes["alind_s"]."','".$lindPosRes["alind_e"]."','".$lindPosRes["alind_o"]."','".$lindPosRes["areaTotal"]."','".$lindPosRes["uniAreaT"]."','".$lindPosRes["nivelesConst"]."','".$lindPosRes["uniAreaC"]."','".$lindPosRes["areaConst"]."','".$lindPosRes["uniNorte"]."','".$lindPosRes["uniSur"]."','".$lindPosRes["uniEste"]."','".$lindPosRes["uniOeste"]."')";
                    $link->query($lindVentaSQL);
                    $idLinVenta = $link->insert_id;
                //INMUEBLE 
                    $inmuebleSQL = "INSERT INTO inmueble(direccion,parroquia,sector,ambito,fk_carac_construccion,fk_protocolizacion,fk_carac_inmuebles,fk_lind_documento,fk_lind_general,fk_lind_pos_venta,fk_servicios)value('".$inmueRes["direccion"]."','".$inmueRes["parroquia"]."','".$inmueRes["sector"]."','".$inmueRes["ambito"]."',".$idCaraConst.",".$idProt.",".$idcaraInmue2.",".$idLinDocum.",".$idLinGeneral.",".$idLinVenta.",".$idServ.")";
                    $link->query($inmuebleSQL);
                    $idInmueble = $link->insert_id;
                //EXPEDIENTE
                    $expSQL = "SELECT * FROM temp_expediente where id=".$tempUserRes["temp_expediente"]."";
                    $resExpe = $link->query($expSQL);
                    $expeRes = $resExpe->fetch_array();
                    $expedientSQL = "INSERT INTO expediente(fk_inmueble,fk_propietario,fk_usuario,n_expediente,fecha,condicion,valorInmue)value(".$idInmueble.",".$idProp2.",".$userRes["id"].",'".$expeRes["no_expediente"]."','".$expeRes["fecha"]."','".$expeRes["condicion"]."','".$expeRes["valorInmue"]."')";
                    $link->query($expedientSQL);
                    $idExpedient = $link->insert_id;
                //FACTURA
                    $factSQL = "SELECT * FROM temp_factura where id=".$tempUserRes["temp_factura"]."";
                    $resFact = $link->query($factSQL);
                    $factRes = $resFact->fetch_array();
                    $facturaSQL = "INSERT INTO factura(monto,n_factura,fecha,n_recibo)value('".$factRes["monto"]."','".$factRes["n_factura"]."','".$factRes["fecha"]."','".$factRes["n_recibo"]."')";
                    $link->query($facturaSQL);
                    $idFactura = $link->insert_id;
                echo'
                <input type="hidden" value="'.$factRes["monto"].'" id="montoFact"/>
                <input type="hidden" value="'.$factRes["fecha"].'" id="fechFact"/>
                <input type="hidden" value="'.$idInmueble.'" id="idInmueble"/>
                <input type="hidden" value="'.$idProp2.'" id="idProp"/>
                <input type="hidden" value="'.$factRes["n_factura"].'" id="numFact"/>
                <input type="hidden" value="Nuevo Ingreso" id="operacion"/>
                <input type="hidden" value="'.$idExpedient.'" id="nuExp"/>
                ';
                //ELIMINAR SQL DE TEMP
                    //PROPIETARIO
                        $eliPropSQL ="DELETE FROM temp_propietarios where id=".$tempUserRes["temp_propietarios"]."";
                        $link->query($eliPropSQL);
                    //CARACTERISTICAS DEL INMUEBLE
                        $elimCaracInmueSQL = "DELETE FROM temp_carainmue where id=".$tempUserRes["temp_carainmue"]."";
                        $link->query($elimCaracInmueSQL);
                    //PUERTAS
                        $elimPuertasSQL = "DELETE FROM temp_puertas where id=".$tempUserRes["temp_puertas"]."";
                        $link->query($elimPuertasSQL);
                    //ESTADO CONSERVACION
                        $elimConservSQL = "DELETE FROM temp_estado_conservacion where id=".$tempUserRes["temp_estado_conservacion"]."";
                        $link->query($elimConservSQL);
                    //PIEZAS SANITARIAS
                        $elimPiezSan = "DELETE FROM temp_piezas_sanitarias where id=".$tempUserRes["temp_piezas_sanitarias"]."";
                        $link->query($elimPiezSan);
                    //COMPLEMENTOS
                        $elimComple = "DELETE FROM temp_complementos where id=".$tempUserRes["temp_complementos"]."";
                        $link->query($elimComple);
                    //AMBIENTES 
                        $elimAmbientSQL = "DELETE FROM temp_ambientes where id=".$tempUserRes["temp_ambientes"]."";
                        $link->query($elimAmbientSQL);
                    //CARACTERISTICAS DE LA CONSTRUCCION
                        $elimCaracConstSQL = "DELETE FROM temp_caraconst where id=".$tempUserRes["temp_caraconst"]."";
                        $link->query($elimCaracConstSQL);
                    //PROTOCOLIZACION DEL INMUEBLE
                        $elimProtInmueSQL = "DELETE FROM temp_datos_protocolizacion where id=".$tempUserRes["temp_datos_protocolizacion"]."";
                        $link->query($elimProtInmueSQL);
                    //SERVICIOS
                        $elimServSQL = "DELETE FROM temp_servicios_inmue where id=".$tempUserRes["temp_servicios_inmue"]." ";
                        $link->query($elimServSQL);
                    //LINDEROS SEGUN DOC
                        $elimLindDocSQL = "DELETE FROM temp_linderos_documento where id=".$tempUserRes["temp_linderos_documento"]."";
                        $link->query($elimLindDocSQL);
                    //LINDEROS SEGUN INSPECCION
                        $elimLindInspSQL = "DELETE FROM temp_linderos_general where id=".$tempUserRes["temp_linderos_general"]."";
                        $link->query($elimLindInspSQL);
                    //LINDEROS POSIBLE VENTA
                        $elimLindPosSQL ="DELETE FROM temp_linderos_posible_venta where id=".$tempUserRes["temp_linderos_posible_venta"]."";
                        $link->query($elimLindPosSQL);
                    //INMUEBLE
                        $elimInmueSQL ="DELETE FROM temp_inmueble where id=".$tempUserRes["temp_inmueble"]."";
                        $link->query($elimInmueSQL);
                    //EXPEDIENTE
                        $elimExpSQL = "DELETE FROM temp_expediente where id=".$tempUserRes["temp_expediente"]."";
                        $link->query($elimExpSQL);
                    //FACTURA
                        $elimFactSQL = "DELETE FROM temp_factura where id=".$tempUserRes["temp_factura"]."";
                        $link->query($elimFactSQL);
                    //USER
                        $elimUserSQL = "DELETE FROM user_temp where userId=".$userRes["id"]."";
                        $link->query($elimUserSQL);
            
            }
        }else{
            //CARACTERISTICAS DEL INMUEBLE
                $caracInmueSQL = "SELECT * FROM temp_carainmue where id=".$tempUserRes["temp_carainmue"]." ";
                $resCaracInmue = $link->query($caracInmueSQL);
                $caracInmueRes = $resCaracInmue->fetch_array();
                $caraInmueSQL = "INSERT INTO carc_inmueble(topografia,forma,uso,tenencia)value('".$caracInmueRes["topografia"]."','".$caracInmueRes["forma"]."','".$caracInmueRes["uso"]."','".$caracInmueRes["tenencia"]."')";
                $link->query($caraInmueSQL);
                $idcaraInmue2 = $link->insert_id;
            //PUERTAS
                $puertSQL = "SELECT * FROM temp_puertas where id=".$tempUserRes["temp_puertas"]."";
                $resPuert = $link->query($puertSQL);
                $puertRes = $resPuert->fetch_array();
                $puertasSQL = "INSERT INTO puertas(entamborada_fina,ent_econo,madera_cepi,hierro)value('".$puertRes['entamborada_fina']."','".$puertRes['ent_econo']."','".$puertRes['madera_cepi']."','".$puertRes['hierro']."')";
                $link->query($puertasSQL);
                $idPuertas = $link->insert_id;
            //ESTADO DE CONSERVACION
                $estaConserSQL = "SELECT * FROM temp_estado_conservacion where id=".$tempUserRes["temp_estado_conservacion"]."";
                $resEstaConser = $link->query($estaConserSQL);
                $estaConserRes = $resEstaConser->fetch_array();
                $conservSQL = "INSERT INTO estado_conservacion(ano_construccion,ano_refaccion,edad_efectiva,nro_planta,nro_vivienda)value('".$estaConserRes["ano_construccion"]."','".$estaConserRes["ano_refaccion"]."','".$estaConserRes["edad_efectiva"]."','".$estaConserRes["nro_planta"]."','".$estaConserRes["nro_vivienda"]."')";
                $link->query($conservSQL);
                $idConserv = $link->insert_id;
            //PIEZAS SANITARIAS
                $piezSantSQL = "SELECT * FROM temp_piezas_sanitarias where id=".$tempUserRes["temp_piezas_sanitarias"]."";
                $resPiezSant = $link->query($piezSantSQL);
                $piezSantRes = $resPiezSant->fetch_array();
                $piezSQL = "INSERT INTO piezas_sanitarias(porcelana_fina,porcelana_econ,banera,calentador,wc,bidet,lavamanos,ducha,urinario)value('".$piezSantRes["porcelana_fina"]."','".$piezSantRes["porcelana_econ"]."','".$piezSantRes["banera"]."','".$piezSantRes["calentador"]."','".$piezSantRes["wc"]."','".$piezSantRes["bidet"]."','".$piezSantRes["lavamanos"]."','".$piezSantRes["ducha"]."','".$piezSantRes["urinario"]."')";
                $link->query($piezSQL);
                $idPiezSant = $link->insert_id;
            //COMPLEMENTOS
                $compleSQL ="SELECT * FROM temp_complementos where id=".$tempUserRes["temp_complementos"]."";
                $resComple = $link->query($compleSQL);
                $compleRes = $resComple->fetch_array();
                $complementSQL ="INSERT INTO complementos(ascensor,aire_acond,rejas,closets,porcelana)value('".$compleRes["ascensor"]."','".$compleRes["aire_acond"]."','".$compleRes["rejas"]."','".$compleRes["closets"]."','".$compleRes["porcelana"]."')";
                $link->query($complementSQL);
                $idComplement = $link->insert_id;
            //AMBIENTES
                $ambienSQL = "SELECT * FROM temp_ambientes where id=".$tempUserRes["temp_ambientes"]."";
                $resAmbiente = $link->query($ambienSQL);
                $ambientesRes = $resAmbiente->fetch_array();
                $ambientSQL = "INSERT INTO ambientes(dormitorio,comedor,sala,banos,cocina,servicio,oficina,garaje,estacionamiento)value('".$ambientesRes["dormitorio"]."','".$ambientesRes["comedor"]."','".$ambientesRes["sala"]."','".$ambientesRes["banos"]."','".$ambientesRes["cocina"]."','".$ambientesRes["servicio"]."','".$ambientesRes["oficina"]."','".$ambientesRes["garaje"]."','".$ambientesRes["estacionamiento"]."')";
                $link->query($ambientSQL);
                $idAmbientes = $link->insert_id;
            //CARACTERISTICAS DE LA CONSTRUCCION
                $caracConstSQL = "SELECT * FROM temp_caraconst where id=".$tempUserRes["temp_caraconst"]."";
                $resCaraConst = $link->query($caracConstSQL);
                $caraConstRes = $resCaraConst->fetch_array();
                $SQLcaraConst = "INSERT INTO caracteristicas_construccion(destino,estructura,paredes_tipo,paredes_acabado,pintura,techo,pisos,ventanas,insta_electricas,observ,Regimen,fk_puertas,fk_estadoConserv,fk_piezasSanitarias,fk_complementos,fk_ambientes,fk_estadoCons)value('".$caraConstRes["destino"]."','".$caraConstRes["estructura"]."','".$caraConstRes["paredes_tipo"]."','".$caraConstRes["paredes_acabado"]."','".$caraConstRes["pintura"]."','".$caraConstRes["techo"]."','".$caraConstRes["pisos"]."','".$caraConstRes["ventanas"]."','".$caraConstRes["insta_electricas"]."','".$caraConstRes["observ"]."','".$caraConstRes["Regimen"]."',".$idPuertas.",".$idConserv.",".$idPiezSant.",".$idComplement.",".$idComplement.",".$idAmbientes.")";
                $link->query($SQLcaraConst);
                $idCaraConst = $link->insert_id;
            //PROTOCOLIZACION DEL INMUEBLE
                $protoSQL = "SELECT * FROM temp_datos_protocolizacion where id=".$tempUserRes["temp_datos_protocolizacion"]."";
                $resProto = $link->query($protoSQL);
                $protoRes = $resProto->fetch_array();
                $protSQL = "INSERT INTO datos_protocolizacion(documento,direccion,numero,tomo,folio,protocolo,trimestre,fecha,valor_inmueble)value('".$protoRes["documento"]."','".$protoRes["direccion"]."','".$protoRes["numero"]."','".$protoRes["tomo"]."','".$protoRes["folio"]."','".$protoRes["protocolo"]."','".$protoRes["trimestre"]."','".$protoRes["fecha"]."','".$protoRes["valor_inmueble"]."')";
                $link->query($protSQL);
                $idProt = $link->insert_id;
            //SERVICIOS
                $serviciosSQL ="SELECT * FROM temp_servicios_inmue where id=".$tempUserRes["temp_servicios_inmue"]."";
                $resServicios = $link->query($serviciosSQL);
                $serviciosRes = $resServicios->fetch_array();
                $servSQL = "INSERT INTO servicios_inmue(acued,acuedRural,aguasSubter,aguasServ,pavimentoFlex,pavimentoRig,viaEngran,acera,alumbradoPub,aseo,transportePublic,pozoSept,electriResi,electriIndus,lineaTelef)VALUE('".$serviciosRes["acued"]."','".$serviciosRes["acuedRural"]."','".$serviciosRes["aguasSubter"]."','".$serviciosRes["aguasServ"]."','".$serviciosRes["pavimentoFlex"]."','".$serviciosRes["pavimentoRig"]."','".$serviciosRes["viaEngran"]."','".$serviciosRes["acera"]."','".$serviciosRes["alumbradoPub"]."','".$serviciosRes["aseo"]."','".$serviciosRes["transportePublic"]."','".$serviciosRes["pozoSept"]."','".$serviciosRes["electriResi"]."','".$serviciosRes["electriIndus"]."','".$serviciosRes["lineaTelef"]."')";
                $link->query($servSQL);
                $idServ = $link->insert_id;
            //LINDEROS SEGUN DOC
                $lindDocSQL = "SELECT * FROM temp_linderos_documento where id=".$tempUserRes["temp_linderos_documento"]."";
                $resLindDoc = $link->query($lindDocSQL);
                $lindDocRes = $resLindDoc->fetch_array();
                $lindDocumSQL = "INSERT INTO linderos_documento(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$lindDocRes["norte"]."','".$lindDocRes["noreste"]."','".$lindDocRes["sur"]."','".$lindDocRes["sureste"]."','".$lindDocRes["este"]."','".$lindDocRes["suroeste"]."','".$lindDocRes["oeste"]."','".$lindDocRes["noroeste"]."','".$lindDocRes["alind_n"]."','".$lindDocRes["alind_s"]."','".$lindDocRes["alind_e"]."','".$lindDocRes["alind_o"]."','".$lindDocRes["areaTotal"]."','".$lindDocRes["uniAreaT"]."','".$lindDocRes["nivelesConst"]."','".$lindDocRes["uniAreaC"]."','".$lindDocRes["areaConst"]."','".$lindDocRes["uniNorte"]."','".$lindDocRes["uniSur"]."','".$lindDocRes["uniEste"]."','".$lindDocRes["uniOeste"]."')";
                $link->query($lindDocumSQL);
                $idLinDocum = $link->insert_id;
            //LINDEROS SEGUN INSPEC
                $lindGenSQL = "SELECT * FROM temp_linderos_general where id=".$tempUserRes["temp_linderos_general"]."";
                $resLindGen = $link->query($lindGenSQL);
                $lindGenRes = $resLindGen->fetch_array();
                $lindGeneralSQL = "INSERT INTO linderos_general(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$lindGenRes["norte"]."','".$lindGenRes["noreste"]."','".$lindGenRes["sur"]."','".$lindGenRes["sureste"]."','".$lindGenRes["este"]."','".$lindGenRes["suroeste"]."','".$lindGenRes["oeste"]."','".$lindGenRes["noroeste"]."','".$lindGenRes["alind_n"]."','".$lindGenRes["alind_s"]."','".$lindGenRes["alind_e"]."','".$lindGenRes["alind_o"]."','".$lindGenRes["areaTotal"]."','".$lindGenRes["uniAreaT"]."','".$lindGenRes["nivelesConst"]."','".$lindGenRes["uniAreaC"]."','".$lindGenRes["areaConst"]."','".$lindGenRes["uniNorte"]."','".$lindGenRes["uniSur"]."','".$lindGenRes["uniEste"]."','".$lindGenRes["uniOeste"]."')";
                $link->query($lindGeneralSQL);
                $idLinGeneral = $link->insert_id;
            //LINDEROS POSIBLE VENTA
                $lindPosSQL = "SELECT * FROM temp_linderos_posible_venta where id=".$tempUserRes["temp_linderos_posible_venta"]."";
                $resLindPos = $link->query($lindPosSQL);
                $lindPosRes = $resLindPos->fetch_array();
                $lindVentaSQL = "INSERT INTO linderos_posible_venta(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$lindPosRes["norte"]."','".$lindPosRes["noreste"]."','".$lindPosRes["sur"]."','".$lindPosRes["sureste"]."','".$lindPosRes["este"]."','".$lindPosRes["suroeste"]."','".$lindPosRes["oeste"]."','".$lindPosRes["noroeste"]."','".$lindPosRes["alind_n"]."','".$lindPosRes["alind_s"]."','".$lindPosRes["alind_e"]."','".$lindPosRes["alind_o"]."','".$lindPosRes["areaTotal"]."','".$lindPosRes["uniAreaT"]."','".$lindPosRes["nivelesConst"]."','".$lindPosRes["uniAreaC"]."','".$lindPosRes["areaConst"]."','".$lindPosRes["uniNorte"]."','".$lindPosRes["uniSur"]."','".$lindPosRes["uniEste"]."','".$lindPosRes["uniOeste"]."')";
                $link->query($lindVentaSQL);
                $idLinVenta = $link->insert_id;
            //INMUEBLE 
                $inmuebleSQL = "INSERT INTO inmueble(direccion,parroquia,sector,ambito,fk_carac_construccion,fk_protocolizacion,fk_carac_inmuebles,fk_lind_documento,fk_lind_general,fk_lind_pos_venta,fk_servicios)value('".$inmueRes["direccion"]."','".$inmueRes["parroquia"]."','".$inmueRes["sector"]."','".$inmueRes["ambito"]."',".$idCaraConst.",".$idProt.",".$idcaraInmue2.",".$idLinDocum.",".$idLinGeneral.",".$idLinVenta.",".$idServ.")";
                $link->query($inmuebleSQL);
                $idInmueble = $link->insert_id;
            //EXPEDIENTE
                $expSQL = "SELECT * FROM temp_expediente where id=".$tempUserRes["temp_expediente"]."";
                $resExpe = $link->query($expSQL);
                $expeRes = $resExpe->fetch_array();
                $expedientSQL = "INSERT INTO expediente(fk_inmueble,fk_propietario,fk_usuario,n_expediente,fecha,condicion,valorInmue)value(".$idInmueble.",".$idProp2.",".$userRes["id"].",'".$expeRes["no_expediente"]."','".$expeRes["fecha"]."','".$expeRes["condicion"]."','".$expeRes["valorInmue"]."')";
                $link->query($expedientSQL);
                $idExpedient = $link->insert_id;
            //FACTURA
                $factSQL = "SELECT * FROM temp_factura where id=".$tempUserRes["temp_factura"]."";
                $resFact = $link->query($factSQL);
                $factRes = $resFact->fetch_array();
                $facturaSQL = "INSERT INTO factura(monto,n_factura,fecha,n_recibo)value('".$factRes["monto"]."','".$factRes["n_factura"]."','".$factRes["fecha"]."','".$factRes["n_recibo"]."')";
                $link->query($facturaSQL);
                $idFactura = $link->insert_id;
            echo'
            <input type="hidden" value="'.$factRes["monto"].'" id="montoFact"/>
            <input type="hidden" value="'.$factRes["fecha"].'" id="fechFact"/>
            <input type="hidden" value="'.$idInmueble.'" id="idInmueble"/>
            <input type="hidden" value="'.$idProp2.'" id="idProp"/>
            <input type="hidden" value="'.$factRes["n_factura"].'" id="numFact"/>
            <input type="hidden" value="Nuevo Ingreso" id="operacion"/>
            <input type="hidden" value="'.$idExpedient.'" id="nuExp"/>
            ';
            //ELIMINAR SQL DE TEMP
                //PROPIETARIO
                    $eliPropSQL ="DELETE FROM temp_propietarios where id=".$tempUserRes["temp_propietarios"]."";
                    $link->query($eliPropSQL);
                //CARACTERISTICAS DEL INMUEBLE
                    $elimCaracInmueSQL = "DELETE FROM temp_carainmue where id=".$tempUserRes["temp_carainmue"]."";
                    $link->query($elimCaracInmueSQL);
                //PUERTAS
                    $elimPuertasSQL = "DELETE FROM temp_puertas where id=".$tempUserRes["temp_puertas"]."";
                    $link->query($elimPuertasSQL);
                //ESTADO CONSERVACION
                    $elimConservSQL = "DELETE FROM temp_estado_conservacion where id=".$tempUserRes["temp_estado_conservacion"]."";
                    $link->query($elimConservSQL);
                //PIEZAS SANITARIAS
                    $elimPiezSan = "DELETE FROM temp_piezas_sanitarias where id=".$tempUserRes["temp_piezas_sanitarias"]."";
                    $link->query($elimPiezSan);
                //COMPLEMENTOS
                    $elimComple = "DELETE FROM temp_complementos where id=".$tempUserRes["temp_complementos"]."";
                    $link->query($elimComple);
                //AMBIENTES 
                    $elimAmbientSQL = "DELETE FROM temp_ambientes where id=".$tempUserRes["temp_ambientes"]."";
                    $link->query($elimAmbientSQL);
                //CARACTERISTICAS DE LA CONSTRUCCION
                    $elimCaracConstSQL = "DELETE FROM temp_caraconst where id=".$tempUserRes["temp_caraconst"]."";
                    $link->query($elimCaracConstSQL);
                //PROTOCOLIZACION DEL INMUEBLE
                    $elimProtInmueSQL = "DELETE FROM temp_datos_protocolizacion where id=".$tempUserRes["temp_datos_protocolizacion"]."";
                    $link->query($elimProtInmueSQL);
                //SERVICIOS
                    $elimServSQL = "DELETE FROM temp_servicios_inmue where id=".$tempUserRes["temp_servicios_inmue"]." ";
                    $link->query($elimServSQL);
                //LINDEROS SEGUN DOC
                    $elimLindDocSQL = "DELETE FROM temp_linderos_documento where id=".$tempUserRes["temp_linderos_documento"]."";
                    $link->query($elimLindDocSQL);
                //LINDEROS SEGUN INSPECCION
                    $elimLindInspSQL = "DELETE FROM temp_linderos_general where id=".$tempUserRes["temp_linderos_general"]."";
                    $link->query($elimLindInspSQL);
                //LINDEROS POSIBLE VENTA
                    $elimLindPosSQL ="DELETE FROM temp_linderos_posible_venta where id=".$tempUserRes["temp_linderos_posible_venta"]."";
                    $link->query($elimLindPosSQL);
                //INMUEBLE
                    $elimInmueSQL ="DELETE FROM temp_inmueble where id=".$tempUserRes["temp_inmueble"]."";
                    $link->query($elimInmueSQL);
                //EXPEDIENTE
                    $elimExpSQL = "DELETE FROM temp_expediente where id=".$tempUserRes["temp_expediente"]."";
                    $link->query($elimExpSQL);
                //FACTURA
                    $elimFactSQL = "DELETE FROM temp_factura where id=".$tempUserRes["temp_factura"]."";
                    $link->query($elimFactSQL);
                //USER
                    $elimUserSQL = "DELETE FROM user_temp where userId=".$userRes["id"]."";
                    $link->query($elimUserSQL);
            echo'<input type="hidden" value="false" id="verInmV">';
        }
    }
    function guardarRepConst3(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //USUARIO
            $userSQL = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUser = $link->query($userSQL);
            $userRes = $resUser->fetch_array();
        //USUARIOS TEMPORALES
            $tempUserSQL ="SELECT * FROM user_temp where userId=".$userRes["id"]."";
            $resTempUser = $link->query($tempUserSQL);
            $tempUserRes = $resTempUser->fetch_array();
        //PROPIETARIOS TEMP
            $propSQL ="SELECT * FROM temp_propietarios where id=".$tempUserRes["temp_propietarios"]."";
            $resProp = $link->query($propSQL);
            $propieRes = $resProp->fetch_array();
        //PROPIETARIOS
            $propSqlDe= "SELECT * FROM propietarios where cedula='".$propieRes["cedula"]."'";
            $resPropDe = $link->query($propSqlDe);
            $propDeRes = $resPropDe->fetch_array();
            //BUSQUEDA PROPIETARIO
                
                if($propSQLRes["cedula"]==$propieRes["cedula"]){
                    $uptPropSQl = "UPDATE propietarios SET cedula='".$propieRes["cedula"]."', rif='".$propieRes["rif"]."', nombre='".$propieRes["nombre"]."', apellido='".$propieRes["apellido"]."',telef='".$propieRes["telef"]."',dir_hab='".$propieRes["dir_hab"]."', telef_hab='".$propieRes["telef_hab"]."' where cedula='".$propieRes["cedula"]."'";
                    $resUptProp = $link->query($uptPropSQl);
                    $idProp2 = $propSQLRes["id"];
                }else{
                    $propietarioSQL ="INSERT INTO propietarios(cedula,rif,nombre,apellido,telef,dir_hab,telef_hab)value('".$propieRes['cedula']."','".$propieRes['rif']."','".$propieRes['nombre']."','".$propieRes['apellido']."','".$propieRes['telef']."','".$propieRes['dir_hab']."','".$propieRes['telef_hab']."') ";
                    $link->query($propietarioSQL);
                    $idProp2 = $link->insert_id;
                }
        //INMUEBLE TEMP
            $inmueSQL ="SELECT * FROM temp_inmueble where id=".$tempUserRes["temp_inmueble"]."";
            $resInmue = $link->query($inmueSQL);
            $inmueRes = $resInmue->fetch_array();
        //INMUEBLE
            $inmueDeSQL ="SELECT * FROM inmueble where direccion='".$inmueRes["direccion"]."'";
            $resDeInmue = $link->query($inmueDeSQL);
            $inmueDeRes = $resDeInmue->fetch_array();
        //CARACTERISTICAS DEL INMUEBLE
            $caracInmueSQL = "SELECT * FROM temp_carainmue where id=".$tempUserRes["temp_carainmue"]." ";
            $resCaracInmue = $link->query($caracInmueSQL);
            $caracInmueRes = $resCaracInmue->fetch_array();
            $caraInmueSQL = "INSERT INTO carc_inmueble(topografia,forma,uso,tenencia)value('".$caracInmueRes["topografia"]."','".$caracInmueRes["forma"]."','".$caracInmueRes["uso"]."','".$caracInmueRes["tenencia"]."')";
            $link->query($caraInmueSQL);
            $idcaraInmue2 = $link->insert_id;
        //PUERTAS
            $puertSQL = "SELECT * FROM temp_puertas where id=".$tempUserRes["temp_puertas"]."";
            $resPuert = $link->query($puertSQL);
            $puertRes = $resPuert->fetch_array();
            $puertasSQL = "INSERT INTO puertas(entamborada_fina,ent_econo,madera_cepi,hierro)value('".$puertRes['entamborada_fina']."','".$puertRes['ent_econo']."','".$puertRes['madera_cepi']."','".$puertRes['hierro']."')";
            $link->query($puertasSQL);
            $idPuertas = $link->insert_id;
        //ESTADO DE CONSERVACION
            $estaConserSQL = "SELECT * FROM temp_estado_conservacion where id=".$tempUserRes["temp_estado_conservacion"]."";
            $resEstaConser = $link->query($estaConserSQL);
            $estaConserRes = $resEstaConser->fetch_array();
            $conservSQL = "INSERT INTO estado_conservacion(ano_construccion,ano_refaccion,edad_efectiva,nro_planta,nro_vivienda)value('".$estaConserRes["ano_construccion"]."','".$estaConserRes["ano_refaccion"]."','".$estaConserRes["edad_efectiva"]."','".$estaConserRes["nro_planta"]."','".$estaConserRes["nro_vivienda"]."')";
            $link->query($conservSQL);
            $idConserv = $link->insert_id;
        //PIEZAS SANITARIAS
            $piezSantSQL = "SELECT * FROM temp_piezas_sanitarias where id=".$tempUserRes["temp_piezas_sanitarias"]."";
            $resPiezSant = $link->query($piezSantSQL);
            $piezSantRes = $resPiezSant->fetch_array();
            $piezSQL = "INSERT INTO piezas_sanitarias(porcelana_fina,porcelana_econ,banera,calentador,wc,bidet,lavamanos,ducha,urinario)value('".$piezSantRes["porcelana_fina"]."','".$piezSantRes["porcelana_econ"]."','".$piezSantRes["banera"]."','".$piezSantRes["calentador"]."','".$piezSantRes["wc"]."','".$piezSantRes["bidet"]."','".$piezSantRes["lavamanos"]."','".$piezSantRes["ducha"]."','".$piezSantRes["urinario"]."')";
            $link->query($piezSQL);
            $idPiezSant = $link->insert_id;
        //COMPLEMENTOS
            $compleSQL ="SELECT * FROM temp_complementos where id=".$tempUserRes["temp_complementos"]."";
            $resComple = $link->query($compleSQL);
            $compleRes = $resComple->fetch_array();
            $complementSQL ="INSERT INTO complementos(ascensor,aire_acond,rejas,closets,porcelana)value('".$compleRes["ascensor"]."','".$compleRes["aire_acond"]."','".$compleRes["rejas"]."','".$compleRes["closets"]."','".$compleRes["porcelana"]."')";
            $link->query($complementSQL);
            $idComplement = $link->insert_id;
        //AMBIENTES
            $ambienSQL = "SELECT * FROM temp_ambientes where id=".$tempUserRes["temp_ambientes"]."";
            $resAmbiente = $link->query($ambienSQL);
            $ambientesRes = $resAmbiente->fetch_array();
            $ambientSQL = "INSERT INTO ambientes(dormitorio,comedor,sala,banos,cocina,servicio,oficina,garaje,estacionamiento)value('".$ambientesRes["dormitorio"]."','".$ambientesRes["comedor"]."','".$ambientesRes["sala"]."','".$ambientesRes["banos"]."','".$ambientesRes["cocina"]."','".$ambientesRes["servicio"]."','".$ambientesRes["oficina"]."','".$ambientesRes["garaje"]."','".$ambientesRes["estacionamiento"]."')";
            $link->query($ambientSQL);
            $idAmbientes = $link->insert_id;
        //CARACTERISTICAS DE LA CONSTRUCCION
            $caracConstSQL = "SELECT * FROM temp_caraconst where id=".$tempUserRes["temp_caraconst"]."";
            $resCaraConst = $link->query($caracConstSQL);
            $caraConstRes = $resCaraConst->fetch_array();
            $SQLcaraConst = "INSERT INTO caracteristicas_construccion(destino,estructura,paredes_tipo,paredes_acabado,pintura,techo,pisos,ventanas,insta_electricas,observ,Regimen,fk_puertas,fk_estadoConserv,fk_piezasSanitarias,fk_complementos,fk_ambientes,fk_estadoCons)value('".$caraConstRes["destino"]."','".$caraConstRes["estructura"]."','".$caraConstRes["paredes_tipo"]."','".$caraConstRes["paredes_acabado"]."','".$caraConstRes["pintura"]."','".$caraConstRes["techo"]."','".$caraConstRes["pisos"]."','".$caraConstRes["ventanas"]."','".$caraConstRes["insta_electricas"]."','".$caraConstRes["observ"]."','".$caraConstRes["Regimen"]."',".$idPuertas.",".$idConserv.",".$idPiezSant.",".$idComplement.",".$idComplement.",".$idAmbientes.")";
            $link->query($SQLcaraConst);
            $idCaraConst = $link->insert_id;
        //PROTOCOLIZACION DEL INMUEBLE
            $protoSQL = "SELECT * FROM temp_datos_protocolizacion where id=".$tempUserRes["temp_datos_protocolizacion"]."";
            $resProto = $link->query($protoSQL);
            $protoRes = $resProto->fetch_array();
            $protSQL = "INSERT INTO datos_protocolizacion(documento,direccion,numero,tomo,folio,protocolo,trimestre,fecha,valor_inmueble)value('".$protoRes["documento"]."','".$protoRes["direccion"]."','".$protoRes["numero"]."','".$protoRes["tomo"]."','".$protoRes["folio"]."','".$protoRes["protocolo"]."','".$protoRes["trimestre"]."','".$protoRes["fecha"]."','".$protoRes["valor_inmueble"]."')";
            $link->query($protSQL);
            $idProt = $link->insert_id;
        //SERVICIOS
            $serviciosSQL ="SELECT * FROM temp_servicios_inmue where id=".$tempUserRes["temp_servicios_inmue"]."";
            $resServicios = $link->query($serviciosSQL);
            $serviciosRes = $resServicios->fetch_array();
            $servSQL = "INSERT INTO servicios_inmue(acued,acuedRural,aguasSubter,aguasServ,pavimentoFlex,pavimentoRig,viaEngran,acera,alumbradoPub,aseo,transportePublic,pozoSept,electriResi,electriIndus,lineaTelef)VALUE('".$serviciosRes["acued"]."','".$serviciosRes["acuedRural"]."','".$serviciosRes["aguasSubter"]."','".$serviciosRes["aguasServ"]."','".$serviciosRes["pavimentoFlex"]."','".$serviciosRes["pavimentoRig"]."','".$serviciosRes["viaEngran"]."','".$serviciosRes["acera"]."','".$serviciosRes["alumbradoPub"]."','".$serviciosRes["aseo"]."','".$serviciosRes["transportePublic"]."','".$serviciosRes["pozoSept"]."','".$serviciosRes["electriResi"]."','".$serviciosRes["electriIndus"]."','".$serviciosRes["lineaTelef"]."')";
            $link->query($servSQL);
            $idServ = $link->insert_id;
        //LINDEROS SEGUN DOC
            $lindDocSQL = "SELECT * FROM temp_linderos_documento where id=".$tempUserRes["temp_linderos_documento"]."";
            $resLindDoc = $link->query($lindDocSQL);
            $lindDocRes = $resLindDoc->fetch_array();
            $lindDocumSQL = "INSERT INTO linderos_documento(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$lindDocRes["norte"]."','".$lindDocRes["noreste"]."','".$lindDocRes["sur"]."','".$lindDocRes["sureste"]."','".$lindDocRes["este"]."','".$lindDocRes["suroeste"]."','".$lindDocRes["oeste"]."','".$lindDocRes["noroeste"]."','".$lindDocRes["alind_n"]."','".$lindDocRes["alind_s"]."','".$lindDocRes["alind_e"]."','".$lindDocRes["alind_o"]."','".$lindDocRes["areaTotal"]."','".$lindDocRes["uniAreaT"]."','".$lindDocRes["nivelesConst"]."','".$lindDocRes["uniAreaC"]."','".$lindDocRes["areaConst"]."','".$lindDocRes["uniNorte"]."','".$lindDocRes["uniSur"]."','".$lindDocRes["uniEste"]."','".$lindDocRes["uniOeste"]."')";
            $link->query($lindDocumSQL);
            $idLinDocum = $link->insert_id;
        //LINDEROS SEGUN INSPEC
            $lindGenSQL = "SELECT * FROM temp_linderos_general where id=".$tempUserRes["temp_linderos_general"]."";
            $resLindGen = $link->query($lindGenSQL);
            $lindGenRes = $resLindGen->fetch_array();
            $lindGeneralSQL = "INSERT INTO linderos_general(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$lindGenRes["norte"]."','".$lindGenRes["noreste"]."','".$lindGenRes["sur"]."','".$lindGenRes["sureste"]."','".$lindGenRes["este"]."','".$lindGenRes["suroeste"]."','".$lindGenRes["oeste"]."','".$lindGenRes["noroeste"]."','".$lindGenRes["alind_n"]."','".$lindGenRes["alind_s"]."','".$lindGenRes["alind_e"]."','".$lindGenRes["alind_o"]."','".$lindGenRes["areaTotal"]."','".$lindGenRes["uniAreaT"]."','".$lindGenRes["nivelesConst"]."','".$lindGenRes["uniAreaC"]."','".$lindGenRes["areaConst"]."','".$lindGenRes["uniNorte"]."','".$lindGenRes["uniSur"]."','".$lindGenRes["uniEste"]."','".$lindGenRes["uniOeste"]."')";
            $link->query($lindGeneralSQL);
            $idLinGeneral = $link->insert_id;
        //LINDEROS POSIBLE VENTA
            $lindPosSQL = "SELECT * FROM temp_linderos_posible_venta where id=".$tempUserRes["temp_linderos_posible_venta"]."";
            $resLindPos = $link->query($lindPosSQL);
            $lindPosRes = $resLindPos->fetch_array();
            $lindVentaSQL = "INSERT INTO linderos_posible_venta(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$lindPosRes["norte"]."','".$lindPosRes["noreste"]."','".$lindPosRes["sur"]."','".$lindPosRes["sureste"]."','".$lindPosRes["este"]."','".$lindPosRes["suroeste"]."','".$lindPosRes["oeste"]."','".$lindPosRes["noroeste"]."','".$lindPosRes["alind_n"]."','".$lindPosRes["alind_s"]."','".$lindPosRes["alind_e"]."','".$lindPosRes["alind_o"]."','".$lindPosRes["areaTotal"]."','".$lindPosRes["uniAreaT"]."','".$lindPosRes["nivelesConst"]."','".$lindPosRes["uniAreaC"]."','".$lindPosRes["areaConst"]."','".$lindPosRes["uniNorte"]."','".$lindPosRes["uniSur"]."','".$lindPosRes["uniEste"]."','".$lindPosRes["uniOeste"]."')";
            $link->query($lindVentaSQL);
            $idLinVenta = $link->insert_id;
        //INMUEBLE 
            $inmuebleSQL = "INSERT INTO inmueble(direccion,parroquia,sector,ambito,fk_carac_construccion,fk_protocolizacion,fk_carac_inmuebles,fk_lind_documento,fk_lind_general,fk_lind_pos_venta,fk_servicios)value('".$inmueRes["direccion"]."','".$inmueRes["parroquia"]."','".$inmueRes["sector"]."','".$inmueRes["ambito"]."',".$idCaraConst.",".$idProt.",".$idcaraInmue2.",".$idLinDocum.",".$idLinGeneral.",".$idLinVenta.",".$idServ.")";
            $link->query($inmuebleSQL);
            $idInmueble = $link->insert_id;
        //EXPEDIENTE
            $expSQL = "SELECT * FROM temp_expediente where id=".$tempUserRes["temp_expediente"]."";
            $resExpe = $link->query($expSQL);
            $expeRes = $resExpe->fetch_array();
            $expedientSQL = "INSERT INTO expediente(fk_inmueble,fk_propietario,fk_usuario,n_expediente,fecha,condicion,valorInmue)value(".$idInmueble.",".$idProp2.",".$userRes["id"].",'".$expeRes["no_expediente"]."','".$expeRes["fecha"]."','".$expeRes["condicion"]."','".$expeRes["valorInmue"]."')";
            $link->query($expedientSQL);
            $idExpedient = $link->insert_id;
        //FACTURA
            $factSQL = "SELECT * FROM temp_factura where id=".$tempUserRes["temp_factura"]."";
            $resFact = $link->query($factSQL);
            $factRes = $resFact->fetch_array();
            $facturaSQL = "INSERT INTO factura(monto,n_factura,fecha,n_recibo)value('".$factRes["monto"]."','".$factRes["n_factura"]."','".$factRes["fecha"]."','".$factRes["n_recibo"]."')";
            $link->query($facturaSQL);
            $idFactura = $link->insert_id;
                echo'
                <input type="hidden" value="'.$factRes["monto"].'" id="montoFact"/>
                <input type="hidden" value="'.$factRes["fecha"].'" id="fechFact"/>
                <input type="hidden" value="'.$idInmueble.'" id="idInmueble"/>
                <input type="hidden" value="'.$idProp2.'" id="idProp"/>
                <input type="hidden" value="'.$factRes["n_factura"].'" id="numFact"/>
                <input type="hidden" value="Nuevo Ingreso" id="operacion"/>
                <input type="hidden" value="'.$expeRes["id"].'" id="nuExp"/>
                ';
                //ELIMINAR SQL DE TEMP
                    //PROPIETARIO
                        $eliPropSQL ="DELETE FROM temp_propietarios where id=".$tempUserRes["temp_propietarios"]."";
                        $link->query($eliPropSQL);
                    //CARACTERISTICAS DEL INMUEBLE
                        $elimCaracInmueSQL = "DELETE FROM temp_carainmue where id=".$tempUserRes["temp_carainmue"]."";
                        $link->query($elimCaracInmueSQL);
                    //PUERTAS
                        $elimPuertasSQL = "DELETE FROM temp_puertas where id=".$tempUserRes["temp_puertas"]."";
                        $link->query($elimPuertasSQL);
                    //ESTADO CONSERVACION
                        $elimConservSQL = "DELETE FROM temp_estado_conservacion where id=".$tempUserRes["temp_estado_conservacion"]."";
                        $link->query($elimConservSQL);
                    //PIEZAS SANITARIAS
                        $elimPiezSan = "DELETE FROM temp_piezas_sanitarias where id=".$tempUserRes["temp_piezas_sanitarias"]."";
                        $link->query($elimPiezSan);
                    //COMPLEMENTOS
                        $elimComple = "DELETE FROM temp_complementos where id=".$tempUserRes["temp_complementos"]."";
                        $link->query($elimComple);
                    //AMBIENTES 
                        $elimAmbientSQL = "DELETE FROM temp_ambientes where id=".$tempUserRes["temp_ambientes"]."";
                        $link->query($elimAmbientSQL);
                    //CARACTERISTICAS DE LA CONSTRUCCION
                        $elimCaracConstSQL = "DELETE FROM temp_caraconst where id=".$tempUserRes["temp_caraconst"]."";
                        $link->query($elimCaracConstSQL);
                    //PROTOCOLIZACION DEL INMUEBLE
                        $elimProtInmueSQL = "DELETE FROM temp_datos_protocolizacion where id=".$tempUserRes["temp_datos_protocolizacion"]."";
                        $link->query($elimProtInmueSQL);
                    //SERVICIOS
                        $elimServSQL = "DELETE FROM temp_servicios_inmue where id=".$tempUserRes["temp_servicios_inmue"]." ";
                        $link->query($elimServSQL);
                    //LINDEROS SEGUN DOC
                        $elimLindDocSQL = "DELETE FROM temp_linderos_documento where id=".$tempUserRes["temp_linderos_documento"]."";
                        $link->query($elimLindDocSQL);
                    //LINDEROS SEGUN INSPECCION
                        $elimLindInspSQL = "DELETE FROM temp_linderos_general where id=".$tempUserRes["temp_linderos_general"]."";
                        $link->query($elimLindInspSQL);
                    //LINDEROS POSIBLE VENTA
                        $elimLindPosSQL ="DELETE FROM temp_linderos_posible_venta where id=".$tempUserRes["temp_linderos_posible_venta"]."";
                        $link->query($elimLindPosSQL);
                    //INMUEBLE
                        $elimInmueSQL ="DELETE FROM temp_inmueble where id=".$tempUserRes["temp_inmueble"]."";
                        $link->query($elimInmueSQL);
                    //EXPEDIENTE
                        $elimExpSQL = "DELETE FROM temp_expediente where id=".$tempUserRes["temp_expediente"]."";
                        $link->query($elimExpSQL);
                    //FACTURA
                        $elimFactSQL = "DELETE FROM temp_factura where id=".$tempUserRes["temp_factura"]."";
                        $link->query($elimFactSQL);
                    //USER
                        $elimUserSQL = "DELETE FROM user_temp where userId=".$userRes["id"]."";
                        $link->query($elimUserSQL);
    }
    //VERIFICAR F002
    function veriF2(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //USUARIO
            $userSQL = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUser = $link->query($userSQL);
            $usuarioRes = $resUser->fetch_array();
        //USUARIOS TEMPORALES
            $tempUserSQL ="SELECT * FROM user_temp where userId=".$usuarioRes["id"]."";
            $resTempUser = $link->query($tempUserSQL);
            $tempUserRes = $resTempUser->fetch_array();
        //PROPIETARIOS TEMP
            $propSQL ="SELECT * FROM temp_propietarios where id=".$tempUserRes["temp_propietarios"]."";
            $resProp = $link->query($propSQL);
            $propieRes = $resProp->fetch_array();
        //PROPIETARIOS
            $propSqlDe= "SELECT * FROM propietarios where cedula='".$propieRes["cedula"]."'";
            $resPropDe = $link->query($propSqlDe);
            $propDeRes = $resPropDe->fetch_array();
                if($propDeRes["cedula"]==$propieRes["cedula"]){
                    $uptPropSQl = "UPDATE propietarios SET cedula='".$propieRes["cedula"]."', rif='".$propieRes["rif"]."', nombre='".$propieRes["nombre"]."', apellido='".$propieRes["apellido"]."',telef='".$propieRes["telef"]."',dir_hab='".$propieRes["dir_hab"]."', telef_hab='".$propieRes["telef_hab"]."' where cedula='".$propieRes["cedula"]."'";
                    $resUptProp = $link->query($uptPropSQl);
                    $idProp2 = $propDeRes["id"];
                }else{
                    $propietarioSQL ="INSERT INTO propietarios(cedula,rif,nombre,apellido,telef,dir_hab,telef_hab)value('".$propieRes['cedula']."','".$propieRes['rif']."','".$propieRes['nombre']."','".$propieRes['apellido']."','".$propieRes['telef']."','".$propieRes['dir_hab']."','".$propieRes['telef_hab']."') ";
                    $link->query($propietarioSQL);
                    $idProp2 = $link->insert_id;
                }
        //INMUEBLE TEMP
            $inmueSQL ="SELECT * FROM temp_inmueble where id=".$tempUserRes["temp_inmueble"]."";
            $resInmue = $link->query($inmueSQL);
            $inmueRes = $resInmue->fetch_array();
        //INMUEBLE
            $inmueDeSQL ="SELECT * FROM inmueble where direccion='".$inmueRes["direccion"]."'";
            $resDeInmue = $link->query($inmueDeSQL);
            $inmueDeRes = $resDeInmue->fetch_array();
        if($propDeRes["cedula"]==$propieRes["cedula"]){
            if($inmueDeRes["id"]!=0){
                echo'<input type="hidden" value="true" id="verInmV">';
            }else{
                echo'<input type="hidden" value="false" id="verInmV">';
                //CARACTERISTICAS DEL INMUEBLE
                    $caracInmueSQL = "SELECT * FROM temp_carainmue where id=".$this->idCaraInmue." ";
                    $resCaracInmue = $link->query($caracInmueSQL);
                    $caracInmueRes = $resCaracInmue->fetch_array();
                    $caraInmueSQL = "INSERT INTO carc_inmueble(topografia,forma,uso,tenencia)value('".$caracInmueRes["topografia"]."','".$caracInmueRes["forma"]."','".$caracInmueRes["uso"]."','".$caracInmueRes["tenencia"]."')";
                    $link->query($caraInmueSQL);
                    $idcaraInmue2 = $link->insert_id;
                //PUERTAS
                    $puertSQL = "SELECT * FROM temp_puertas where id=".$this->idPuertas."";
                    $resPuert = $link->query($puertSQL);
                    $puertRes = $resPuert->fetch_array();
                    $puertasSQL = "INSERT INTO puertas(entamborada_fina,ent_econo,madera_cepi,hierro)value('".$puertRes['entamborada_fina']."','".$puertRes['ent_econo']."','".$puertRes['madera_cepi']."','".$puertRes['hierro']."')";
                    $link->query($puertasSQL);
                    $idPuertas = $link->insert_id;
                //ESTADO DE CONSERVACION
                    $estaConserSQL = "SELECT * FROM temp_estado_conservacion where id=".$this->idEstConserv."";
                    $resEstaConser = $link->query($estaConserSQL);
                    $estaConserRes = $resEstaConser->fetch_array();
                    $conservSQL = "INSERT INTO estado_conservacion(ano_construccion,ano_refaccion,edad_efectiva,nro_planta,nro_vivienda)value('".$estaConserRes["ano_construccion"]."','".$estaConserRes["ano_refaccion"]."','".$estaConserRes["edad_efectiva"]."','".$estaConserRes["nro_planta"]."','".$estaConserRes["nro_vivienda"]."')";
                    $link->query($conservSQL);
                    $idConserv = $link->insert_id;
                //PIEZAS SANITARIAS
                    $piezSantSQL = "SELECT * FROM temp_piezas_sanitarias where id=".$this->idPiezSant."";
                    $resPiezSant = $link->query($piezSantSQL);
                    $piezSantRes = $resPiezSant->fetch_array();
                    $piezSQL = "INSERT INTO piezas_sanitarias(porcelana_fina,porcelana_econ,banera,calentador,wc,bidet,lavamanos,ducha,urinario)value('".$piezSantRes["porcelana_fina"]."','".$piezSantRes["porcelana_econ"]."','".$piezSantRes["banera"]."','".$piezSantRes["calentador"]."','".$piezSantRes["wc"]."','".$piezSantRes["bidet"]."','".$piezSantRes["lavamanos"]."','".$piezSantRes["ducha"]."','".$piezSantRes["urinario"]."')";
                    $link->query($piezSQL);
                    $idPiezSant = $link->insert_id;
                //COMPLEMENTOS
                    $compleSQL ="SELECT * FROM temp_complementos where id=".$this->idComple."";
                    $resComple = $link->query($compleSQL);
                    $compleRes = $resComple->fetch_array();
                    $complementSQL ="INSERT INTO complementos(ascensor,aire_acond,rejas,closets,porcelana)value('".$compleRes["ascensor"]."','".$compleRes["aire_acond"]."','".$compleRes["rejas"]."','".$compleRes["closets"]."','".$compleRes["porcelana"]."')";
                    $link->query($complementSQL);
                    $idComplement = $link->insert_id;
                //AMBIENTES
                    $ambienSQL = "SELECT * FROM temp_ambientes where id=".$this->idAmbientes."";
                    $resAmbiente = $link->query($ambienSQL);
                    $ambientesRes = $resAmbiente->fetch_array();
                    $ambientSQL = "INSERT INTO ambientes(dormitorio,comedor,sala,banos,cocina,servicio,oficina,garaje,estacionamiento)value('".$ambientesRes["dormitorio"]."','".$ambientesRes["comedor"]."','".$ambientesRes["sala"]."','".$ambientesRes["banos"]."','".$ambientesRes["cocina"]."','".$ambientesRes["servicio"]."','".$ambientesRes["oficina"]."','".$ambientesRes["garaje"]."','".$ambientesRes["estacionamiento"]."')";
                    $link->query($ambientSQL);
                    $idAmbientes = $link->insert_id;
                //CARACTERISTICAS DE LA CONSTRUCCION
                    $caracConstSQL = "SELECT * FROM temp_caraconst where id=".$this->idCaraConst."";
                    $resCaraConst = $link->query($caracConstSQL);
                    $caraConstRes = $resCaraConst->fetch_array();
                    $SQLcaraConst = "INSERT INTO caracteristicas_construccion(destino,estructura,paredes_tipo,paredes_acabado,pintura,techo,pisos,ventanas,insta_electricas,observ,Regimen,fk_puertas,fk_estadoConserv,fk_piezasSanitarias,fk_complementos,fk_ambientes,fk_estadoCons)value('".$caraConstRes["destino"]."','".$caraConstRes["estructura"]."','".$caraConstRes["paredes_tipo"]."','".$caraConstRes["paredes_acabado"]."','".$caraConstRes["pintura"]."','".$caraConstRes["techo"]."','".$caraConstRes["pisos"]."','".$caraConstRes["ventanas"]."','".$caraConstRes["insta_electricas"]."','".$caraConstRes["observ"]."','".$caraConstRes["Regimen"]."',".$idPuertas.",".$idConserv.",".$idPiezSant.",".$idComplement.",".$idComplement.",".$idAmbientes.")";
                    $link->query($SQLcaraConst);
                    $idCaraConst = $link->insert_id;
                //PROTOCOLIZACION DEL INMUEBLE
                    $protoSQL = "SELECT * FROM temp_datos_protocolizacion where id=".$this->idProto."";
                    $resProto = $link->query($protoSQL);
                    $protoRes = $resProto->fetch_array();
                    $protSQL = "INSERT INTO datos_protocolizacion(documento,direccion,numero,tomo,folio,protocolo,trimestre,fecha,valor_inmueble)value('".$protoRes["documento"]."','".$protoRes["direccion"]."','".$protoRes["numero"]."','".$protoRes["tomo"]."','".$protoRes["folio"]."','".$protoRes["protocolo"]."','".$protoRes["trimestre"]."','".$protoRes["fecha"]."','".$protoRes["valor_inmueble"]."')";
                    $link->query($protSQL);
                    $idProt = $link->insert_id;
                //SERVICIOS
                    $serviciosSQL ="SELECT * FROM temp_servicios_inmue where id=".$this->idServInmue."";
                    $resServicios = $link->query($serviciosSQL);
                    $serviciosRes = $resServicios->fetch_array();
                    $servSQL = "INSERT INTO servicios_inmue(acued,acuedRural,aguasSubter,aguasServ,pavimentoFlex,pavimentoRig,viaEngran,acera,alumbradoPub,aseo,transportePublic,pozoSept,electriResi,electriIndus,lineaTelef)VALUE('".$serviciosRes["acued"]."','".$serviciosRes["acuedRural"]."','".$serviciosRes["aguasSubter"]."','".$serviciosRes["aguasServ"]."','".$serviciosRes["pavimentoFlex"]."','".$serviciosRes["pavimentoRig"]."','".$serviciosRes["viaEngran"]."','".$serviciosRes["acera"]."','".$serviciosRes["alumbradoPub"]."','".$serviciosRes["aseo"]."','".$serviciosRes["transportePublic"]."','".$serviciosRes["pozoSept"]."','".$serviciosRes["electriResi"]."','".$serviciosRes["electriIndus"]."','".$serviciosRes["lineaTelef"]."')";
                    $link->query($servSQL);
                    $idServ = $link->insert_id;
                //LINDEROS SEGUN DOC
                    $lindDocSQL = "SELECT * FROM temp_linderos_documento where id=".$this->idLindDoc."";
                    $resLindDoc = $link->query($lindDocSQL);
                    $lindDocRes = $resLindDoc->fetch_array();
                    $lindDocumSQL = "INSERT INTO linderos_documento(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$lindDocRes["norte"]."','".$lindDocRes["noreste"]."','".$lindDocRes["sur"]."','".$lindDocRes["sureste"]."','".$lindDocRes["este"]."','".$lindDocRes["suroeste"]."','".$lindDocRes["oeste"]."','".$lindDocRes["noroeste"]."','".$lindDocRes["alind_n"]."','".$lindDocRes["alind_s"]."','".$lindDocRes["alind_e"]."','".$lindDocRes["alind_o"]."','".$lindDocRes["areaTotal"]."','".$lindDocRes["uniAreaT"]."','".$lindDocRes["nivelesConst"]."','".$lindDocRes["uniAreaC"]."','".$lindDocRes["areaConst"]."','".$lindDocRes["uniNorte"]."','".$lindDocRes["uniSur"]."','".$lindDocRes["uniEste"]."','".$lindDocRes["uniOeste"]."')";
                    $link->query($lindDocumSQL);
                    $idLinDocum = $link->insert_id;
                //INMUEBLE 
                    
                    $inmuebleSQL = "INSERT INTO inmueble(direccion,parroquia,sector,ambito,fk_carac_construccion,fk_protocolizacion,fk_carac_inmuebles,fk_lind_documento,fk_servicios)value('".$inmueRes["direccion"]."','".$inmueRes["parroquia"]."','".$inmueRes["sector"]."','".$inmueRes["ambito"]."',".$idCaraConst.",".$idProt.",".$idcaraInmue2.",".$idLinDocum.",".$idServ.")";
                    $link->query($inmuebleSQL);
                    $idInmueble = $link->insert_id;
                //EXPEDIENTE
                    $expeTempSQL = "SELECT * FROM temp_expediente where id=".$this->idExp."";
                    $resExpeTemp = $link->query($expeTempSQL);
                    $expeTempRes = $resExpeTemp->fetch_array();
                    $expedientSQL = "INSERT INTO expediente(fk_inmueble,fk_propietario,fk_usuario,n_expediente,fecha,condicion,valorInmue)value(".$idInmueble.",".$idProp2.",".$userRes["id"].",'".$expeTempRes["no_expediente"]."','".$expeTempRes["fecha"]."','".$expeTempRes["condicion"]."','".$expeTempRes["valorInmue"]."')";
                    $link->query($expedientSQL);
                    $idExpedient = $link->insert_id;    
                //FACTURA
                    $factSQL = "SELECT * FROM temp_factura where id=".$this->idFactura."";
                    $resFact = $link->query($factSQL);
                    $factRes = $resFact->fetch_array();
                    $facturaSQL = "INSERT INTO factura(monto,n_factura,fecha,n_recibo)value('".$factRes["monto"]."','".$factRes["n_factura"]."','".$factRes["fecha"]."','".$factRes["n_recibo"]."')";
                    $link->query($facturaSQL);
                    $idFactura = $link->insert_id;
                echo'
                <input type="hidden" value="'.$factRes["monto"].'" id="montoFact"/>
                <input type="hidden" value="'.$factRes["fecha"].'" id="fechFact"/>
                <input type="hidden" value="'.$idInmueble.'" id="idInmueble"/>
                <input type="hidden" value="'.$idProp2.'" id="idProp"/>
                <input type="hidden" value="'.$factRes["n_factura"].'" id="numFact"/>
                <input type="hidden" value="Nuevo Ingreso" id="operacion"/>
                <input type="hidden" value="'.$idExpedient.'" id="nuExp"/>
                ';
                //ELIMINAR SQL DE TEMP
                    //PROPIETARIO
                        $eliPropSQL ="DELETE FROM temp_propietarios where id=".$tempUserRes["temp_propietarios"]."";
                        $link->query($eliPropSQL);
                    //CARACTERISTICAS DEL INMUEBLE
                        $elimCaracInmueSQL = "DELETE FROM temp_carainmue where id=".$tempUserRes["temp_carainmue"]."";
                        $link->query($elimCaracInmueSQL);
                    //PUERTAS
                        $elimPuertasSQL = "DELETE FROM temp_puertas where id=".$tempUserRes["temp_puertas"]."";
                        $link->query($elimPuertasSQL);
                    //ESTADO CONSERVACION
                        $elimConservSQL = "DELETE FROM temp_estado_conservacion where id=".$tempUserRes["temp_estado_conservacion"]."";
                        $link->query($elimConservSQL);
                    //PIEZAS SANITARIAS
                        $elimPiezSan = "DELETE FROM temp_piezas_sanitarias where id=".$tempUserRes["temp_piezas_sanitarias"]."";
                        $link->query($elimPiezSan);
                    //COMPLEMENTOS
                        $elimComple = "DELETE FROM temp_complementos where id=".$tempUserRes["temp_complementos"]."";
                        $link->query($elimComple);
                    //AMBIENTES 
                        $elimAmbientSQL = "DELETE FROM temp_ambientes where id=".$tempUserRes["temp_ambientes"]."";
                        $link->query($elimAmbientSQL);
                    //CARACTERISTICAS DE LA CONSTRUCCION
                        $elimCaracConstSQL = "DELETE FROM temp_caraconst where id=".$tempUserRes["temp_caraconst"]."";
                        $link->query($elimCaracConstSQL);
                    //PROTOCOLIZACION DEL INMUEBLE
                        $elimProtInmueSQL = "DELETE FROM temp_datos_protocolizacion where id=".$tempUserRes["temp_datos_protocolizacion"]."";
                        $link->query($elimProtInmueSQL);
                    //SERVICIOS
                        $elimServSQL = "DELETE FROM temp_servicios_inmue where id=".$tempUserRes["temp_servicios_inmue"]." ";
                        $link->query($elimServSQL);
                    //LINDEROS SEGUN DOC
                        $elimLindDocSQL = "DELETE FROM temp_linderos_documento where id=".$tempUserRes["temp_linderos_documento"]."";
                        $link->query($elimLindDocSQL);
                    //LINDEROS SEGUN INSPECCION
                        $elimLindInspSQL = "DELETE FROM temp_linderos_general where id=".$tempUserRes["temp_linderos_general"]."";
                        $link->query($elimLindInspSQL);
                    //LINDEROS POSIBLE VENTA
                        $elimLindPosSQL ="DELETE FROM temp_linderos_posible_venta where id=".$tempUserRes["temp_linderos_posible_venta"]."";
                        $link->query($elimLindPosSQL);
                    //INMUEBLE
                        $elimInmueSQL ="DELETE FROM temp_inmueble where id=".$tempUserRes["temp_inmueble"]."";
                        $link->query($elimInmueSQL);
                    //EXPEDIENTE
                        $elimExpSQL = "DELETE FROM temp_expediente where id=".$tempUserRes["temp_expediente"]."";
                        $link->query($elimExpSQL);
                    //FACTURA
                        $elimFactSQL = "DELETE FROM temp_factura where id=".$tempUserRes["temp_factura"]."";
                        $link->query($elimFactSQL);
                    //USER
                        $elimUserSQL = "DELETE FROM user_temp where userId=".$userRes["id"]."";
                        $link->query($elimUserSQL);
            }
        }else{
            echo'<input type="hidden" value="false" id="verInmV">';
            //CARACTERISTICAS DEL INMUEBLE
                $caracInmueSQL = "SELECT * FROM temp_carainmue where id=".$this->idCaraInmue." ";
                $resCaracInmue = $link->query($caracInmueSQL);
                $caracInmueRes = $resCaracInmue->fetch_array();
                $caraInmueSQL = "INSERT INTO carc_inmueble(topografia,forma,uso,tenencia)value('".$caracInmueRes["topografia"]."','".$caracInmueRes["forma"]."','".$caracInmueRes["uso"]."','".$caracInmueRes["tenencia"]."')";
                $link->query($caraInmueSQL);
                $idcaraInmue2 = $link->insert_id;
            //PUERTAS
                $puertSQL = "SELECT * FROM temp_puertas where id=".$this->idPuertas."";
                $resPuert = $link->query($puertSQL);
                $puertRes = $resPuert->fetch_array();
                $puertasSQL = "INSERT INTO puertas(entamborada_fina,ent_econo,madera_cepi,hierro)value('".$puertRes['entamborada_fina']."','".$puertRes['ent_econo']."','".$puertRes['madera_cepi']."','".$puertRes['hierro']."')";
                $link->query($puertasSQL);
                $idPuertas = $link->insert_id;
            //ESTADO DE CONSERVACION
                $estaConserSQL = "SELECT * FROM temp_estado_conservacion where id=".$this->idEstConserv."";
                $resEstaConser = $link->query($estaConserSQL);
                $estaConserRes = $resEstaConser->fetch_array();
                $conservSQL = "INSERT INTO estado_conservacion(ano_construccion,ano_refaccion,edad_efectiva,nro_planta,nro_vivienda)value('".$estaConserRes["ano_construccion"]."','".$estaConserRes["ano_refaccion"]."','".$estaConserRes["edad_efectiva"]."','".$estaConserRes["nro_planta"]."','".$estaConserRes["nro_vivienda"]."')";
                $link->query($conservSQL);
                $idConserv = $link->insert_id;
            //PIEZAS SANITARIAS
                $piezSantSQL = "SELECT * FROM temp_piezas_sanitarias where id=".$this->idPiezSant."";
                $resPiezSant = $link->query($piezSantSQL);
                $piezSantRes = $resPiezSant->fetch_array();
                $piezSQL = "INSERT INTO piezas_sanitarias(porcelana_fina,porcelana_econ,banera,calentador,wc,bidet,lavamanos,ducha,urinario)value('".$piezSantRes["porcelana_fina"]."','".$piezSantRes["porcelana_econ"]."','".$piezSantRes["banera"]."','".$piezSantRes["calentador"]."','".$piezSantRes["wc"]."','".$piezSantRes["bidet"]."','".$piezSantRes["lavamanos"]."','".$piezSantRes["ducha"]."','".$piezSantRes["urinario"]."')";
                $link->query($piezSQL);
                $idPiezSant = $link->insert_id;
            //COMPLEMENTOS
                $compleSQL ="SELECT * FROM temp_complementos where id=".$this->idComple."";
                $resComple = $link->query($compleSQL);
                $compleRes = $resComple->fetch_array();
                $complementSQL ="INSERT INTO complementos(ascensor,aire_acond,rejas,closets,porcelana)value('".$compleRes["ascensor"]."','".$compleRes["aire_acond"]."','".$compleRes["rejas"]."','".$compleRes["closets"]."','".$compleRes["porcelana"]."')";
                $link->query($complementSQL);
                $idComplement = $link->insert_id;
            //AMBIENTES
                $ambienSQL = "SELECT * FROM temp_ambientes where id=".$this->idAmbientes."";
                $resAmbiente = $link->query($ambienSQL);
                $ambientesRes = $resAmbiente->fetch_array();
                $ambientSQL = "INSERT INTO ambientes(dormitorio,comedor,sala,banos,cocina,servicio,oficina,garaje,estacionamiento)value('".$ambientesRes["dormitorio"]."','".$ambientesRes["comedor"]."','".$ambientesRes["sala"]."','".$ambientesRes["banos"]."','".$ambientesRes["cocina"]."','".$ambientesRes["servicio"]."','".$ambientesRes["oficina"]."','".$ambientesRes["garaje"]."','".$ambientesRes["estacionamiento"]."')";
                $link->query($ambientSQL);
                $idAmbientes = $link->insert_id;
            //CARACTERISTICAS DE LA CONSTRUCCION
                $caracConstSQL = "SELECT * FROM temp_caraconst where id=".$this->idCaraConst."";
                $resCaraConst = $link->query($caracConstSQL);
                $caraConstRes = $resCaraConst->fetch_array();
                $SQLcaraConst = "INSERT INTO caracteristicas_construccion(destino,estructura,paredes_tipo,paredes_acabado,pintura,techo,pisos,ventanas,insta_electricas,observ,Regimen,fk_puertas,fk_estadoConserv,fk_piezasSanitarias,fk_complementos,fk_ambientes,fk_estadoCons)value('".$caraConstRes["destino"]."','".$caraConstRes["estructura"]."','".$caraConstRes["paredes_tipo"]."','".$caraConstRes["paredes_acabado"]."','".$caraConstRes["pintura"]."','".$caraConstRes["techo"]."','".$caraConstRes["pisos"]."','".$caraConstRes["ventanas"]."','".$caraConstRes["insta_electricas"]."','".$caraConstRes["observ"]."','".$caraConstRes["Regimen"]."',".$idPuertas.",".$idConserv.",".$idPiezSant.",".$idComplement.",".$idComplement.",".$idAmbientes.")";
                $link->query($SQLcaraConst);
                $idCaraConst = $link->insert_id;
            //PROTOCOLIZACION DEL INMUEBLE
                $protoSQL = "SELECT * FROM temp_datos_protocolizacion where id=".$this->idProto."";
                $resProto = $link->query($protoSQL);
                $protoRes = $resProto->fetch_array();
                $protSQL = "INSERT INTO datos_protocolizacion(documento,direccion,numero,tomo,folio,protocolo,trimestre,fecha,valor_inmueble)value('".$protoRes["documento"]."','".$protoRes["direccion"]."','".$protoRes["numero"]."','".$protoRes["tomo"]."','".$protoRes["folio"]."','".$protoRes["protocolo"]."','".$protoRes["trimestre"]."','".$protoRes["fecha"]."','".$protoRes["valor_inmueble"]."')";
                $link->query($protSQL);
                $idProt = $link->insert_id;
            //SERVICIOS
                $serviciosSQL ="SELECT * FROM temp_servicios_inmue where id=".$this->idServInmue."";
                $resServicios = $link->query($serviciosSQL);
                $serviciosRes = $resServicios->fetch_array();
                $servSQL = "INSERT INTO servicios_inmue(acued,acuedRural,aguasSubter,aguasServ,pavimentoFlex,pavimentoRig,viaEngran,acera,alumbradoPub,aseo,transportePublic,pozoSept,electriResi,electriIndus,lineaTelef)VALUE('".$serviciosRes["acued"]."','".$serviciosRes["acuedRural"]."','".$serviciosRes["aguasSubter"]."','".$serviciosRes["aguasServ"]."','".$serviciosRes["pavimentoFlex"]."','".$serviciosRes["pavimentoRig"]."','".$serviciosRes["viaEngran"]."','".$serviciosRes["acera"]."','".$serviciosRes["alumbradoPub"]."','".$serviciosRes["aseo"]."','".$serviciosRes["transportePublic"]."','".$serviciosRes["pozoSept"]."','".$serviciosRes["electriResi"]."','".$serviciosRes["electriIndus"]."','".$serviciosRes["lineaTelef"]."')";
                $link->query($servSQL);
                $idServ = $link->insert_id;
            //LINDEROS SEGUN DOC
                $lindDocSQL = "SELECT * FROM temp_linderos_documento where id=".$this->idLindDoc."";
                $resLindDoc = $link->query($lindDocSQL);
                $lindDocRes = $resLindDoc->fetch_array();
                $lindDocumSQL = "INSERT INTO linderos_documento(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$lindDocRes["norte"]."','".$lindDocRes["noreste"]."','".$lindDocRes["sur"]."','".$lindDocRes["sureste"]."','".$lindDocRes["este"]."','".$lindDocRes["suroeste"]."','".$lindDocRes["oeste"]."','".$lindDocRes["noroeste"]."','".$lindDocRes["alind_n"]."','".$lindDocRes["alind_s"]."','".$lindDocRes["alind_e"]."','".$lindDocRes["alind_o"]."','".$lindDocRes["areaTotal"]."','".$lindDocRes["uniAreaT"]."','".$lindDocRes["nivelesConst"]."','".$lindDocRes["uniAreaC"]."','".$lindDocRes["areaConst"]."','".$lindDocRes["uniNorte"]."','".$lindDocRes["uniSur"]."','".$lindDocRes["uniEste"]."','".$lindDocRes["uniOeste"]."')";
                $link->query($lindDocumSQL);
                $idLinDocum = $link->insert_id;
            //INMUEBLE 
                
                $inmuebleSQL = "INSERT INTO inmueble(direccion,parroquia,sector,ambito,fk_carac_construccion,fk_protocolizacion,fk_carac_inmuebles,fk_lind_documento,fk_servicios)value('".$inmueRes["direccion"]."','".$inmueRes["parroquia"]."','".$inmueRes["sector"]."','".$inmueRes["ambito"]."',".$idCaraConst.",".$idProt.",".$idcaraInmue2.",".$idLinDocum.",".$idServ.")";
                $link->query($inmuebleSQL);
                $idInmueble = $link->insert_id;
            //EXPEDIENTE
                $expeTempSQL = "SELECT * FROM temp_expediente where id=".$this->idExp."";
                $resExpeTemp = $link->query($expeTempSQL);
                $expeTempRes = $resExpeTemp->fetch_array();
                $expedientSQL = "INSERT INTO expediente(fk_inmueble,fk_propietario,fk_usuario,n_expediente,fecha,condicion,valorInmue)value(".$idInmueble.",".$idProp2.",".$tempUserRes["userId"].",'".$expeTempRes["no_expediente"]."','".$expeTempRes["fecha"]."','".$expeTempRes["condicion"]."','".$expeTempRes["valorInmue"]."')";
                $link->query($expedientSQL);
                $idExpedient = $link->insert_id;    
            //FACTURA
                $factSQL = "SELECT * FROM temp_factura where id=".$this->idFactura."";
                $resFact = $link->query($factSQL);
                $factRes = $resFact->fetch_array();
                $facturaSQL = "INSERT INTO factura(monto,n_factura,fecha,n_recibo)value('".$factRes["monto"]."','".$factRes["n_factura"]."','".$factRes["fecha"]."','".$factRes["n_recibo"]."')";
                $link->query($facturaSQL);
                $idFactura = $link->insert_id;
            echo'
            <input type="hidden" value="'.$factRes["monto"].'" id="montoFact"/>
            <input type="hidden" value="'.$factRes["fecha"].'" id="fechFact"/>
            <input type="hidden" value="'.$idInmueble.'" id="idInmueble"/>
            <input type="hidden" value="'.$idProp2.'" id="idProp"/>
            <input type="hidden" value="'.$factRes["n_factura"].'" id="numFact"/>
            <input type="hidden" value="Nuevo Ingreso" id="operacion"/>
            <input type="hidden" value="'.$idExpedient.'" id="nuExp"/>
            ';
            //ELIMINAR SQL DE TEMP
                //PROPIETARIO
                    $eliPropSQL ="DELETE FROM temp_propietarios where id=".$this->idProp."";
                    $link->query($eliPropSQL);
                //CARACTERISTICAS DEL INMUEBLE
                    $elimCaracInmueSQL = "DELETE FROM temp_carainmue where id=".$this->idCaraInmue."";
                    $link->query($elimCaracInmueSQL);
                //PUERTAS
                    $elimPuertasSQL = "DELETE FROM temp_puertas where id=".$this->idPuertas."";
                    $link->query($elimPuertasSQL);
                //ESTADO CONSERVACION
                    $elimConservSQL = "DELETE FROM temp_estado_conservacion where id=".$this->idEstConserv."";
                    $link->query($elimConservSQL);
                //PIEZAS SANITARIAS
                    $elimPiezSan = "DELETE FROM temp_piezas_sanitarias where id=".$this->idPiezSant."";
                    $link->query($elimPiezSan);
                //COMPLEMENTOS
                    $elimComple = "DELETE FROM temp_complementos where id=".$this->idComple."";
                    $link->query($elimComple);
                //AMBIENTES 
                    $elimAmbientSQL = "DELETE FROM temp_ambientes where id=".$this->idAmbientes."";
                    $link->query($elimAmbientSQL);
                //CARACTERISTICAS DE LA CONSTRUCCION
                    $elimCaracConstSQL = "DELETE FROM temp_caraconst where id=".$this->idCaraConst."";
                    $link->query($elimCaracConstSQL);
                //PROTOCOLIZACION DEL INMUEBLE
                    $elimProtInmueSQL = "DELETE FROM temp_datos_protocolizacion where id=".$this->idProto."";
                    $link->query($elimProtInmueSQL);
                //SERVICIOS
                    $elimServSQL = "DELETE FROM temp_servicios_inmue where id=".$this->idServInmue." ";
                    $link->query($elimServSQL);
                //LINDEROS SEGUN DOC
                    $elimLindDocSQL = "DELETE FROM temp_linderos_documento where id=".$this->idLindDoc."";
                    $link->query($elimLindDocSQL);
                //LINDEROS SEGUN INSPECCION
                    $elimLindInspSQL = "DELETE FROM temp_linderos_general where id=".$this->idLindGen."";
                    $link->query($elimLindInspSQL);
                //INMUEBLE
                    $elimInmueSQL ="DELETE FROM temp_inmueble where id=".$this->idInmue."";
                    $link->query($elimInmueSQL);
                //EXPEDIENTE
                    $elimExpSQL = "DELETE FROM temp_expediente where id=".$this->idExp."";
                    $link->query($elimExpSQL);
                //FACTURA
                    $elimFactSQL = "DELETE FROM temp_factura where id=".$this->idFactura."";
                    $link->query($elimFactSQL);
                //USER
                    $elimUserSQL = "DELETE FROM user_temp where userId=".$tempUserRes["id"]."";
                    $link->query($elimUserSQL);
            }
        
    }
    function guardarRepConst(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //USUARIO
            $userSQL = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUser = $link->query($userSQL);
            $userRes = $resUser->fetch_array();
        //USUARIOS TEMPORALES
            $tempUserSQL ="SELECT * FROM user_temp where userId=".$userRes["id"]."";
            $resTempUser = $link->query($tempUserSQL);
            $tempUserRes = $resTempUser->fetch_array();
         //PROPIETARIOS TEMP
            $propSQL ="SELECT * FROM temp_propietarios where id=".$tempUserRes["temp_propietarios"]."";
            $resProp = $link->query($propSQL);
            $propieRes = $resProp->fetch_array();
        //PROPIETARIOS
            $propSqlDe= "SELECT * FROM propietarios where cedula='".$propieRes["cedula"]."'";
            $resPropDe = $link->query($propSqlDe);
            $propDeRes = $resPropDe->fetch_array();
            if($propDeRes["cedula"]==$propieRes["cedula"]){
                $uptPropSQl = "UPDATE propietarios SET cedula='".$propieRes["cedula"]."', rif='".$propieRes["rif"]."', nombre='".$propieRes["nombre"]."', apellido='".$propieRes["apellido"]."',telef='".$propieRes["telef"]."',dir_hab='".$propieRes["dir_hab"]."', telef_hab='".$propieRes["telef_hab"]."' where cedula='".$propieRes["cedula"]."'";
                $resUptProp = $link->query($uptPropSQl);
                $idProp2 = $propDeRes["id"];
            }else{
                $propietarioSQL ="INSERT INTO propietarios(cedula,rif,nombre,apellido,telef,dir_hab,telef_hab)value('".$propieRes['cedula']."','".$propieRes['rif']."','".$propieRes['nombre']."','".$propieRes['apellido']."','".$propieRes['telef']."','".$propieRes['dir_hab']."','".$propieRes['telef_hab']."') ";
                $link->query($propietarioSQL);
                $idProp2 = $link->insert_id;
            }
        //INMUEBLE TEMP
            $inmueSQL ="SELECT * FROM temp_inmueble where id=".$tempUserRes["temp_inmueble"]."";
            $resInmue = $link->query($inmueSQL);
            $inmueRes = $resInmue->fetch_array();
        //INMUEBLE
            $inmueDeSQL ="SELECT * FROM inmueble where direccion='".$inmueRes["direccion"]."'";
            $resDeInmue = $link->query($inmueDeSQL);
            $inmueDeRes = $resDeInmue->fetch_array();
        //CARACTERISTICAS DEL INMUEBLE
            $caracInmueSQL = "SELECT * FROM temp_carainmue where id=".$tempUserRes["temp_carainmue"]." ";
            $resCaracInmue = $link->query($caracInmueSQL);
            $caracInmueRes = $resCaracInmue->fetch_array();
            $caraInmueSQL = "INSERT INTO carc_inmueble(topografia,forma,uso,tenencia)value('".$caracInmueRes["topografia"]."','".$caracInmueRes["forma"]."','".$caracInmueRes["uso"]."','".$caracInmueRes["tenencia"]."')";
            $link->query($caraInmueSQL);
            $idcaraInmue2 = $link->insert_id;
        //PUERTAS
            $puertSQL = "SELECT * FROM temp_puertas where id=".$tempUserRes["temp_puertas"]."";
            $resPuert = $link->query($puertSQL);
            $puertRes = $resPuert->fetch_array();
            $puertasSQL = "INSERT INTO puertas(entamborada_fina,ent_econo,madera_cepi,hierro)value('".$puertRes['entamborada_fina']."','".$puertRes['ent_econo']."','".$puertRes['madera_cepi']."','".$puertRes['hierro']."')";
            $link->query($puertasSQL);
            $idPuertas = $link->insert_id;
        //ESTADO DE CONSERVACION
            $estaConserSQL = "SELECT * FROM temp_estado_conservacion where id=".$tempUserRes["temp_estado_conservacion"]."";
            $resEstaConser = $link->query($estaConserSQL);
            $estaConserRes = $resEstaConser->fetch_array();
            $conservSQL = "INSERT INTO estado_conservacion(ano_construccion,ano_refaccion,edad_efectiva,nro_planta,nro_vivienda)value('".$estaConserRes["ano_construccion"]."','".$estaConserRes["ano_refaccion"]."','".$estaConserRes["edad_efectiva"]."','".$estaConserRes["nro_planta"]."','".$estaConserRes["nro_vivienda"]."')";
            $link->query($conservSQL);
            $idConserv = $link->insert_id;
        //PIEZAS SANITARIAS
            $piezSantSQL = "SELECT * FROM temp_piezas_sanitarias where id=".$tempUserRes["temp_piezas_sanitarias"]."";
            $resPiezSant = $link->query($piezSantSQL);
            $piezSantRes = $resPiezSant->fetch_array();
            $piezSQL = "INSERT INTO piezas_sanitarias(porcelana_fina,porcelana_econ,banera,calentador,wc,bidet,lavamanos,ducha,urinario)value('".$piezSantRes["porcelana_fina"]."','".$piezSantRes["porcelana_econ"]."','".$piezSantRes["banera"]."','".$piezSantRes["calentador"]."','".$piezSantRes["wc"]."','".$piezSantRes["bidet"]."','".$piezSantRes["lavamanos"]."','".$piezSantRes["ducha"]."','".$piezSantRes["urinario"]."')";
            $link->query($piezSQL);
            $idPiezSant = $link->insert_id;
        //COMPLEMENTOS
            $compleSQL ="SELECT * FROM temp_complementos where id=".$tempUserRes["temp_complementos"]."";
            $resComple = $link->query($compleSQL);
            $compleRes = $resComple->fetch_array();
            $complementSQL ="INSERT INTO complementos(ascensor,aire_acond,rejas,closets,porcelana)value('".$compleRes["ascensor"]."','".$compleRes["aire_acond"]."','".$compleRes["rejas"]."','".$compleRes["closets"]."','".$compleRes["porcelana"]."')";
            $link->query($complementSQL);
            $idComplement = $link->insert_id;
        //AMBIENTES
            $ambienSQL = "SELECT * FROM temp_ambientes where id=".$tempUserRes["temp_ambientes"]."";
            $resAmbiente = $link->query($ambienSQL);
            $ambientesRes = $resAmbiente->fetch_array();
            $ambientSQL = "INSERT INTO ambientes(dormitorio,comedor,sala,banos,cocina,servicio,oficina,garaje,estacionamiento)value('".$ambientesRes["dormitorio"]."','".$ambientesRes["comedor"]."','".$ambientesRes["sala"]."','".$ambientesRes["banos"]."','".$ambientesRes["cocina"]."','".$ambientesRes["servicio"]."','".$ambientesRes["oficina"]."','".$ambientesRes["garaje"]."','".$ambientesRes["estacionamiento"]."')";
            $link->query($ambientSQL);
            $idAmbientes = $link->insert_id;
        //CARACTERISTICAS DE LA CONSTRUCCION
            $caracConstSQL = "SELECT * FROM temp_caraconst where id=".$tempUserRes["temp_caraconst"]."";
            $resCaraConst = $link->query($caracConstSQL);
            $caraConstRes = $resCaraConst->fetch_array();
            $SQLcaraConst = "INSERT INTO caracteristicas_construccion(destino,estructura,paredes_tipo,paredes_acabado,pintura,techo,pisos,ventanas,insta_electricas,observ,Regimen,fk_puertas,fk_estadoConserv,fk_piezasSanitarias,fk_complementos,fk_ambientes,fk_estadoCons)value('".$caraConstRes["destino"]."','".$caraConstRes["estructura"]."','".$caraConstRes["paredes_tipo"]."','".$caraConstRes["paredes_acabado"]."','".$caraConstRes["pintura"]."','".$caraConstRes["techo"]."','".$caraConstRes["pisos"]."','".$caraConstRes["ventanas"]."','".$caraConstRes["insta_electricas"]."','".$caraConstRes["observ"]."','".$caraConstRes["Regimen"]."',".$idPuertas.",".$idConserv.",".$idPiezSant.",".$idComplement.",".$idComplement.",".$idAmbientes.")";
            $link->query($SQLcaraConst);
            $idCaraConst = $link->insert_id;
        //PROTOCOLIZACION DEL INMUEBLE
            $protoSQL = "SELECT * FROM temp_datos_protocolizacion where id=".$tempUserRes["temp_datos_protocolizacion"]."";
            $resProto = $link->query($protoSQL);
            $protoRes = $resProto->fetch_array();
            $protSQL = "INSERT INTO datos_protocolizacion(documento,direccion,numero,tomo,folio,protocolo,trimestre,fecha,valor_inmueble)value('".$protoRes["documento"]."','".$protoRes["direccion"]."','".$protoRes["numero"]."','".$protoRes["tomo"]."','".$protoRes["folio"]."','".$protoRes["protocolo"]."','".$protoRes["trimestre"]."','".$protoRes["fecha"]."','".$protoRes["valor_inmueble"]."')";
            $link->query($protSQL);
            $idProt = $link->insert_id;
        //SERVICIOS
            $serviciosSQL ="SELECT * FROM temp_servicios_inmue where id=".$tempUserRes["temp_servicios_inmue"]."";
            $resServicios = $link->query($serviciosSQL);
            $serviciosRes = $resServicios->fetch_array();
            $servSQL = "INSERT INTO servicios_inmue(acued,acuedRural,aguasSubter,aguasServ,pavimentoFlex,pavimentoRig,viaEngran,acera,alumbradoPub,aseo,transportePublic,pozoSept,electriResi,electriIndus,lineaTelef)VALUE('".$serviciosRes["acued"]."','".$serviciosRes["acuedRural"]."','".$serviciosRes["aguasSubter"]."','".$serviciosRes["aguasServ"]."','".$serviciosRes["pavimentoFlex"]."','".$serviciosRes["pavimentoRig"]."','".$serviciosRes["viaEngran"]."','".$serviciosRes["acera"]."','".$serviciosRes["alumbradoPub"]."','".$serviciosRes["aseo"]."','".$serviciosRes["transportePublic"]."','".$serviciosRes["pozoSept"]."','".$serviciosRes["electriResi"]."','".$serviciosRes["electriIndus"]."','".$serviciosRes["lineaTelef"]."')";
            $link->query($servSQL);
            $idServ = $link->insert_id;
        //LINDEROS SEGUN DOC
            $lindDocSQL = "SELECT * FROM temp_linderos_documento where id=".$tempUserRes["temp_linderos_documento"]."";
            $resLindDoc = $link->query($lindDocSQL);
            $lindDocRes = $resLindDoc->fetch_array();
            $lindDocumSQL = "INSERT INTO linderos_documento(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$lindDocRes["norte"]."','".$lindDocRes["noreste"]."','".$lindDocRes["sur"]."','".$lindDocRes["sureste"]."','".$lindDocRes["este"]."','".$lindDocRes["suroeste"]."','".$lindDocRes["oeste"]."','".$lindDocRes["noroeste"]."','".$lindDocRes["alind_n"]."','".$lindDocRes["alind_s"]."','".$lindDocRes["alind_e"]."','".$lindDocRes["alind_o"]."','".$lindDocRes["areaTotal"]."','".$lindDocRes["uniAreaT"]."','".$lindDocRes["nivelesConst"]."','".$lindDocRes["uniAreaC"]."','".$lindDocRes["areaConst"]."','".$lindDocRes["uniNorte"]."','".$lindDocRes["uniSur"]."','".$lindDocRes["uniEste"]."','".$lindDocRes["uniOeste"]."')";
            $link->query($lindDocumSQL);
            $idLinDocum = $link->insert_id;
        //INMUEBLE 
            $inmuebleSQL = "INSERT INTO inmueble(direccion,parroquia,sector,ambito,fk_carac_construccion,fk_protocolizacion,fk_carac_inmuebles,fk_lind_documento,fk_servicios)value('".$inmueRes["direccion"]."','".$inmueRes["parroquia"]."','".$inmueRes["sector"]."','".$inmueRes["ambito"]."',".$idCaraConst.",".$idProt.",".$idcaraInmue2.",".$idLinDocum.",".$idServ.")";
            $link->query($inmuebleSQL);
            $idInmueble = $link->insert_id;
        //EXPEDIENTE
            $expSQL = "SELECT * FROM temp_expediente where id=".$tempUserRes["temp_expediente"]."";
            $resExpe = $link->query($expSQL);
            $expeRes = $resExpe->fetch_array();
            $expedientSQL = "INSERT INTO expediente(fk_inmueble,fk_propietario,fk_usuario,n_expediente,fecha,condicion,valorInmue)value(".$idInmueble.",".$idProp2.",".$tempUserRes["userId"].",'".$expeRes["no_expediente"]."','".$expeRes["fecha"]."','".$expeRes["condicion"]."','".$expeRes["valorInmue"]."')";
            $link->query($expedientSQL);
            $idExpedient = $link->insert_id;    
        //FACTURA
            $factSQL = "SELECT * FROM temp_factura where id=".$tempUserRes["temp_factura"]."";
            $resFact = $link->query($factSQL);
            $factRes = $resFact->fetch_array();
            $facturaSQL = "INSERT INTO factura(monto,n_factura,fecha,n_recibo)value('".$factRes["monto"]."','".$factRes["n_factura"]."','".$factRes["fecha"]."','".$factRes["n_recibo"]."')";
            $link->query($facturaSQL);
            $idFactura = $link->insert_id;
        echo'
        <input type="hidden" value="'.$factRes["monto"].'" id="montoFact"/>
        <input type="hidden" value="'.$factRes["fecha"].'" id="fechFact"/>
        <input type="hidden" value="'.$idInmueble.'" id="idInmueble"/>
        <input type="hidden" value="'.$idProp2.'" id="idProp"/>
        <input type="hidden" value="'.$factRes["n_factura"].'" id="numFact"/>
        <input type="hidden" value="Nuevo Ingreso" id="operacion"/>
        <input type="hidden" value="'.$idExpedient.'" id="nuExp"/>
        ';
        //ELIMINAR SQL DE TEMP
            //PROPIETARIO
                $eliPropSQL ="DELETE FROM temp_propietarios where id=".$tempUserRes["temp_propietarios"]."";
                $link->query($eliPropSQL);
            //CARACTERISTICAS DEL INMUEBLE
                $elimCaracInmueSQL = "DELETE FROM temp_carainmue where id=".$tempUserRes["temp_carainmue"]."";
                $link->query($elimCaracInmueSQL);
            //PUERTAS
                $elimPuertasSQL = "DELETE FROM temp_puertas where id=".$tempUserRes["temp_puertas"]."";
                $link->query($elimPuertasSQL);
            //ESTADO CONSERVACION
                $elimConservSQL = "DELETE FROM temp_estado_conservacion where id=".$tempUserRes["temp_estado_conservacion"]."";
                $link->query($elimConservSQL);
            //PIEZAS SANITARIAS
                $elimPiezSan = "DELETE FROM temp_piezas_sanitarias where id=".$tempUserRes["temp_piezas_sanitarias"]."";
                $link->query($elimPiezSan);
            //COMPLEMENTOS
                $elimComple = "DELETE FROM temp_complementos where id=".$tempUserRes["temp_complementos"]."";
                $link->query($elimComple);
            //AMBIENTES 
                $elimAmbientSQL = "DELETE FROM temp_ambientes where id=".$tempUserRes["temp_ambientes"]."";
                $link->query($elimAmbientSQL);
            //CARACTERISTICAS DE LA CONSTRUCCION
                $elimCaracConstSQL = "DELETE FROM temp_caraconst where id=".$tempUserRes["temp_caraconst"]."";
                $link->query($elimCaracConstSQL);
            //PROTOCOLIZACION DEL INMUEBLE
                $elimProtInmueSQL = "DELETE FROM temp_datos_protocolizacion where id=".$tempUserRes["temp_datos_protocolizacion"]."";
                $link->query($elimProtInmueSQL);
            //SERVICIOS
                $elimServSQL = "DELETE FROM temp_servicios_inmue where id=".$tempUserRes["temp_servicios_inmue"]." ";
                $link->query($elimServSQL);
            //LINDEROS SEGUN DOC
                $elimLindDocSQL = "DELETE FROM temp_linderos_documento where id=".$tempUserRes["temp_linderos_documento"]."";
                $link->query($elimLindDocSQL);
            //LINDEROS SEGUN INSPECCION
                $elimLindInspSQL = "DELETE FROM temp_linderos_general where id=".$tempUserRes["temp_linderos_general"]."";
                $link->query($elimLindInspSQL);
            //LINDEROS POSIBLE VENTA
                $elimLindPosSQL ="DELETE FROM temp_linderos_posible_venta where id=".$tempUserRes["temp_linderos_posible_venta"]."";
                $link->query($elimLindPosSQL);
            //INMUEBLE
                $elimInmueSQL ="DELETE FROM temp_inmueble where id=".$tempUserRes["temp_inmueble"]."";
                $link->query($elimInmueSQL);
            //EXPEDIENTE
                $elimExpSQL = "DELETE FROM temp_expediente where id=".$tempUserRes["temp_expediente"]."";
                $link->query($elimExpSQL);
            //FACTURA
                $elimFactSQL = "DELETE FROM temp_factura where id=".$tempUserRes["temp_factura"]."";
                $link->query($elimFactSQL);
            //USER
                $elimUserSQL = "DELETE FROM user_temp where userId=".$tempUserRes["userId"]."";
                $link->query($elimUserSQL);
    }
    //VERIFICAR F001
    function veriF1(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //USUARIO
            $userSQL = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUser = $link->query($userSQL);
            $userRes = $resUser->fetch_array();
        //USUARIOS TEMPORALES
            $tempUserSQL ="SELECT * FROM user_temp where userId=".$userRes["id"]."";
            $resTempUser = $link->query($tempUserSQL);
            $tempUserRes = $resTempUser->fetch_array();
        //PROPIETARIOS TEMPORALES
            $propSQL ="SELECT * FROM temp_propietarios where id=".$tempUserRes["temp_propietarios"]."";
            $resProp = $link->query($propSQL);
            $propieRes = $resProp->fetch_array();

        //PROPIETARIOS
            $propSqlDe= "SELECT * FROM propietarios where cedula='".$propieRes["cedula"]."'";
            $resPropDe = $link->query($propSqlDe);
            $propDeRes = $resPropDe->fetch_array();
        //INMUEBLE TEMP
            $inmueSQL ="SELECT * FROM temp_inmueble where id=".$tempUserRes["temp_inmueble"]."";
            $resInmue = $link->query($inmueSQL);
            $inmueRes = $resInmue->fetch_array();
        //INMUEBLE
            $inmueDeSQL ="SELECT * FROM inmueble where direccion='".$inmueRes["direccion"]."'";
            $resDeInmue = $link->query($inmueDeSQL);
            $inmueDeRes = $resDeInmue->fetch_array();
        if($propDeRes["cedula"]==$propieRes["cedula"]){
            if($inmueDeRes["id"]!=0){
                echo'<input type="hidden" value="true" id="verInmV">';
            }else{
                echo'<input type="hidden" value="false" id="verInmV">';
                //BUSQUEDA PROPIETARIO
                        $SQLProp = "SELECT * FROM propietarios where cedula='".$propieRes["cedula"]."'";
                        $resPropSQL = $link->query($SQLProp);
                        $propSQLRes = $resPropSQL->fetch_array();
                        if($propSQLRes["cedula"]==$propieRes["cedula"]){
                            $uptPropSQl = "UPDATE propietarios SET cedula='".$propieRes["cedula"]."', rif='".$propieRes["rif"]."', nombre='".$propieRes["nombre"]."', apellido='".$propieRes["apellido"]."',telef='".$propieRes["telef"]."',dir_hab='".$propieRes["dir_hab"]."', telef_hab='".$propieRes["telef_hab"]."' where cedula='".$propieRes["cedula"]."'";
                            $resUptProp = $link->query($uptPropSQl);
                            $idPropie = $propSQLRes["id"];
                        }else{
                            $propietarioSQL ="INSERT INTO propietarios(cedula,rif,nombre,apellido,telef,dir_hab,telef_hab)value('".$propieRes['cedula']."','".$propieRes['rif']."','".$propieRes['nombre']."','".$propieRes['apellido']."','".$propieRes['telef']."','".$propieRes['dir_hab']."','".$propieRes['telef_hab']."') ";
                            $link->query($propietarioSQL);
                            $idPropie = $link->insert_id;
                        }
                //CARACTERISTICAS DEL INMUEBLE
                    $caracInmueSQL = "SELECT * FROM temp_carainmue where id=".$tempUserRes["temp_carainmue"]." ";
                    $resCaracInmue = $link->query($caracInmueSQL);
                    $caracInmueRes = $resCaracInmue->fetch_array();
                    $caraInmueSQL = "INSERT INTO carc_inmueble(topografia,forma,uso,tenencia)value('".$caracInmueRes["topografia"]."','".$caracInmueRes["forma"]."','".$caracInmueRes["uso"]."','".$caracInmueRes["tenencia"]."')";
                    $link->query($caraInmueSQL);
                    $idcaraInmue2 = $link->insert_id;
                //PUERTAS
                    $puertSQL = "SELECT * FROM temp_puertas where id=".$tempUserRes["temp_puertas"]."";
                    $resPuert = $link->query($puertSQL);
                    $puertRes = $resPuert->fetch_array();
                    $puertasSQL = "INSERT INTO puertas(entamborada_fina,ent_econo,madera_cepi,hierro)value('".$puertRes['entamborada_fina']."','".$puertRes['ent_econo']."','".$puertRes['madera_cepi']."','".$puertRes['hierro']."')";
                    $link->query($puertasSQL);
                    $idPuertas = $link->insert_id;
                //ESTADO DE CONSERVACION
                    $estaConserSQL = "SELECT * FROM temp_estado_conservacion where id=".$tempUserRes["temp_estado_conservacion"]."";
                    $resEstaConser = $link->query($estaConserSQL);
                    $estaConserRes = $resEstaConser->fetch_array();
                    $conservSQL = "INSERT INTO estado_conservacion(ano_construccion,ano_refaccion,edad_efectiva,nro_planta,nro_vivienda)value('".$estaConserRes["ano_construccion"]."','".$estaConserRes["ano_refaccion"]."','".$estaConserRes["edad_efectiva"]."','".$estaConserRes["nro_planta"]."','".$estaConserRes["nro_vivienda"]."')";
                    $link->query($conservSQL);
                    $idConserv = $link->insert_id;
                //PIEZAS SANITARIAS
                    $piezSantSQL = "SELECT * FROM temp_piezas_sanitarias where id=".$tempUserRes["temp_piezas_sanitarias"]."";
                    $resPiezSant = $link->query($piezSantSQL);
                    $piezSantRes = $resPiezSant->fetch_array();
                    $piezSQL = "INSERT INTO piezas_sanitarias(porcelana_fina,porcelana_econ,banera,calentador,wc,bidet,lavamanos,ducha,urinario)value('".$piezSantRes["porcelana_fina"]."','".$piezSantRes["porcelana_econ"]."','".$piezSantRes["banera"]."','".$piezSantRes["calentador"]."','".$piezSantRes["wc"]."','".$piezSantRes["bidet"]."','".$piezSantRes["lavamanos"]."','".$piezSantRes["ducha"]."','".$piezSantRes["urinario"]."')";
                    $link->query($piezSQL);
                    $idPiezSant = $link->insert_id;
                //COMPLEMENTOS
                    $compleSQL ="SELECT * FROM temp_complementos where id=".$tempUserRes["temp_complementos"]."";
                    $resComple = $link->query($compleSQL);
                    $compleRes = $resComple->fetch_array();
                    $complementSQL ="INSERT INTO complementos(ascensor,aire_acond,rejas,closets,porcelana)value('".$compleRes["ascensor"]."','".$compleRes["aire_acond"]."','".$compleRes["rejas"]."','".$compleRes["closets"]."','".$compleRes["porcelana"]."')";
                    $link->query($complementSQL);
                    $idComplement = $link->insert_id;
                //AMBIENTES
                    $ambienSQL = "SELECT * FROM temp_ambientes where id=".$tempUserRes["temp_ambientes"]."";
                    $resAmbiente = $link->query($ambienSQL);
                    $ambientesRes = $resAmbiente->fetch_array();
                    $ambientSQL = "INSERT INTO ambientes(dormitorio,comedor,sala,banos,cocina,servicio,oficina,garaje,estacionamiento)value('".$ambientesRes["dormitorio"]."','".$ambientesRes["comedor"]."','".$ambientesRes["sala"]."','".$ambientesRes["banos"]."','".$ambientesRes["cocina"]."','".$ambientesRes["servicio"]."','".$ambientesRes["oficina"]."','".$ambientesRes["garaje"]."','".$ambientesRes["estacionamiento"]."')";
                    $link->query($ambientSQL);
                    $idAmbientes = $link->insert_id;
                //CARACTERISTICAS DE LA CONSTRUCCION
                    $caracConstSQL = "SELECT * FROM temp_caraconst where id=".$tempUserRes["temp_caraconst"]."";
                    $resCaraConst = $link->query($caracConstSQL);
                    $caraConstRes = $resCaraConst->fetch_array();
                    $SQLcaraConst = "INSERT INTO caracteristicas_construccion(destino,estructura,paredes_tipo,paredes_acabado,pintura,techo,pisos,ventanas,insta_electricas,observ,Regimen,fk_puertas,fk_estadoConserv,fk_piezasSanitarias,fk_complementos,fk_ambientes,fk_estadoCons)value('".$caraConstRes["destino"]."','".$caraConstRes["estructura"]."','".$caraConstRes["paredes_tipo"]."','".$caraConstRes["paredes_acabado"]."','".$caraConstRes["pintura"]."','".$caraConstRes["techo"]."','".$caraConstRes["pisos"]."','".$caraConstRes["ventanas"]."','".$caraConstRes["insta_electricas"]."','".$caraConstRes["observ"]."','".$caraConstRes["Regimen"]."',".$idPuertas.",".$idConserv.",".$idPiezSant.",".$idComplement.",".$idComplement.",".$idAmbientes.")";
                    $link->query($SQLcaraConst);
                    $idCaraConst = $link->insert_id;
                //PROTOCOLIZACION DEL INMUEBLE
                    $protoSQL = "SELECT * FROM temp_datos_protocolizacion where id=".$tempUserRes["temp_inmueble"]."";
                    $resProto = $link->query($protoSQL);
                    $protoRes = $resProto->fetch_array();
                    $protSQL = "INSERT INTO datos_protocolizacion(documento,direccion,numero,tomo,folio,protocolo,trimestre,fecha,valor_inmueble)value('".$protoRes["documento"]."','".$protoRes["direccion"]."','".$protoRes["numero"]."','".$protoRes["tomo"]."','".$protoRes["folio"]."','".$protoRes["protocolo"]."','".$protoRes["trimestre"]."','".$protoRes["fecha"]."','".$protoRes["valor_inmueble"]."')";
                    $link->query($protSQL);
                    $idProt = $link->insert_id;
                //SERVICIOS
                    $serviciosSQL ="SELECT * FROM temp_servicios_inmue where id=".$tempUserRes["temp_servicios_inmue"]."";
                    $resServicios = $link->query($serviciosSQL);
                    $serviciosRes = $resServicios->fetch_array();
                    $servSQL = "INSERT INTO servicios_inmue(acued,acuedRural,aguasSubter,aguasServ,pavimentoFlex,pavimentoRig,viaEngran,acera,alumbradoPub,aseo,transportePublic,pozoSept,electriResi,electriIndus,lineaTelef)VALUE('".$serviciosRes["acued"]."','".$serviciosRes["acuedRural"]."','".$serviciosRes["aguasSubter"]."','".$serviciosRes["aguasServ"]."','".$serviciosRes["pavimentoFlex"]."','".$serviciosRes["pavimentoRig"]."','".$serviciosRes["viaEngran"]."','".$serviciosRes["acera"]."','".$serviciosRes["alumbradoPub"]."','".$serviciosRes["aseo"]."','".$serviciosRes["transportePublic"]."','".$serviciosRes["pozoSept"]."','".$serviciosRes["electriResi"]."','".$serviciosRes["electriIndus"]."','".$serviciosRes["lineaTelef"]."')";
                    $link->query($servSQL);
                    $idServ = $link->insert_id;
                //LINDEROS SEGUN DOC
                    $lindDocSQL = "SELECT * FROM temp_linderos_documento where id=".$tempUserRes["temp_linderos_documento"]."";
                    $resLindDoc = $link->query($lindDocSQL);
                    $lindDocRes = $resLindDoc->fetch_array();
                    $lindDocumSQL = "INSERT INTO linderos_documento(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$lindDocRes["norte"]."','".$lindDocRes["noreste"]."','".$lindDocRes["sur"]."','".$lindDocRes["sureste"]."','".$lindDocRes["este"]."','".$lindDocRes["suroeste"]."','".$lindDocRes["oeste"]."','".$lindDocRes["noroeste"]."','".$lindDocRes["alind_n"]."','".$lindDocRes["alind_s"]."','".$lindDocRes["alind_e"]."','".$lindDocRes["alind_o"]."','".$lindDocRes["areaTotal"]."','".$lindDocRes["uniAreaT"]."','".$lindDocRes["nivelesConst"]."','".$lindDocRes["uniAreaC"]."','".$lindDocRes["areaConst"]."','".$lindDocRes["uniNorte"]."','".$lindDocRes["uniSur"]."','".$lindDocRes["uniEste"]."','".$lindDocRes["uniOeste"]."')";
                    $link->query($lindDocumSQL);
                    $idLinDocum = $link->insert_id;
                //LINDEROS SEGUN INSPEC
                    $lindGenSQL = "SELECT * FROM temp_linderos_general where id=".$tempUserRes["temp_linderos_general"]."";
                    $resLindGen = $link->query($lindGenSQL);
                    $lindGenRes = $resLindGen->fetch_array();
                    $lindGeneralSQL = "INSERT INTO linderos_general(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$lindGenRes["norte"]."','".$lindGenRes["noreste"]."','".$lindGenRes["sur"]."','".$lindGenRes["sureste"]."','".$lindGenRes["este"]."','".$lindGenRes["suroeste"]."','".$lindGenRes["oeste"]."','".$lindGenRes["noroeste"]."','".$lindGenRes["alind_n"]."','".$lindGenRes["alind_s"]."','".$lindGenRes["alind_e"]."','".$lindGenRes["alind_o"]."','".$lindGenRes["areaTotal"]."','".$lindGenRes["uniAreaT"]."','".$lindGenRes["nivelesConst"]."','".$lindGenRes["uniAreaC"]."','".$lindGenRes["areaConst"]."','".$lindGenRes["uniNorte"]."','".$lindGenRes["uniSur"]."','".$lindGenRes["uniEste"]."','".$lindGenRes["uniOeste"]."')";
                    $link->query($lindGeneralSQL);
                    $idLinGeneral = $link->insert_id;
                //INMUEBLE 
                    $inmuebleSQL = "INSERT INTO inmueble(direccion,parroquia,sector,ambito,fk_carac_construccion,fk_protocolizacion,fk_carac_inmuebles,fk_lind_documento,fk_lind_general,fk_servicios)value('".$inmueRes["direccion"]."','".$inmueRes["parroquia"]."','".$inmueRes["sector"]."','".$inmueRes["ambito"]."',".$idCaraConst.",".$idProt.",".$idcaraInmue2.",".$idLinDocum.",".$idLinGeneral.",".$idServ.")";
                    $link->query($inmuebleSQL);
                    $idInmueble = $link->insert_id;
                //EXPEDIENTE
                    $expSQL = "SELECT * FROM temp_expediente where id=".$tempUserRes["temp_expediente"]."";
                    $resExpe = $link->query($expSQL);
                    $expeRes = $resExpe->fetch_array();
                    $expedientSQL = "INSERT INTO expediente(fk_inmueble,fk_propietario,fk_usuario,n_expediente,fecha,condicion,valorInmue)value(".$idInmueble.",".$idPropie.",".$userRes["id"].",'".$expeRes["no_expediente"]."','".$expeRes["fecha"]."','".$expeRes["condicion"]."','".$expeRes["valorInmue"]."')";
                    $link->query($expedientSQL);
                    $nuExpedient = $link->insert_id;
                //FACTURA
                    $factSQL = "SELECT * FROM temp_factura where id=".$tempUserRes["temp_factura"]."";
                    $resFact = $link->query($factSQL);
                    $factRes = $resFact->fetch_array();
                    $facturaSQL = "INSERT INTO factura(monto,n_factura,fecha,n_recibo)value('".$factRes["monto"]."','".$factRes["n_factura"]."','".$factRes["fecha"]."','".$factRes["n_recibo"]."')";
                    $link->query($facturaSQL);
                    $idFactura = $link->insert_id;
                echo'
                <input type="hidden" value="'.$factRes["monto"].'" id="montoFact"/>
                <input type="hidden" value="'.$factRes["fecha"].'" id="fechFact"/>
                <input type="hidden" value="'.$idInmueble.'" id="idInmueble"/>
                <input type="hidden" value="'.$idPropie.'" id="idProp"/>
                <input type="hidden" value="'.$factRes["n_factura"].'" id="numFact"/>
                <input type="hidden" value="Nuevo Ingreso" id="operacion"/>
                <input type="hidden" value="'.$nuExpedient.'" id="nuExp"/>
                ';
                //ELIMINAR SQL DE TEMP
                    //PROPIETARIO
                        $eliPropSQL ="DELETE FROM temp_propietarios where id=".$tempUserRes["temp_propietarios"]."";
                        $link->query($eliPropSQL);
                    //CARACTERISTICAS DEL INMUEBLE
                        $elimCaracInmueSQL = "DELETE FROM temp_carainmue where id=".$tempUserRes["temp_carainmue"]."";
                        $link->query($elimCaracInmueSQL);
                    //PUERTAS
                        $elimPuertasSQL = "DELETE FROM temp_puertas where id=".$tempUserRes["temp_puertas"]."";
                        $link->query($elimPuertasSQL);
                    //ESTADO CONSERVACION
                        $elimConservSQL = "DELETE FROM temp_estado_conservacion where id=".$tempUserRes["temp_estado_conservacion"]."";
                        $link->query($elimConservSQL);
                    //PIEZAS SANITARIAS
                        $elimPiezSan = "DELETE FROM temp_piezas_sanitarias where id=".$tempUserRes["temp_piezas_sanitarias"]."";
                        $link->query($elimPiezSan);
                    //COMPLEMENTOS
                        $elimComple = "DELETE FROM temp_complementos where id=".$tempUserRes["temp_complementos"]."";
                        $link->query($elimComple);
                    //AMBIENTES 
                        $elimAmbientSQL = "DELETE FROM temp_ambientes where id=".$tempUserRes["temp_ambientes"]."";
                        $link->query($elimAmbientSQL);
                    //CARACTERISTICAS DE LA CONSTRUCCION
                        $elimCaracConstSQL = "DELETE FROM temp_caraconst where id=".$tempUserRes["temp_caraconst"]."";
                        $link->query($elimCaracConstSQL);
                    //PROTOCOLIZACION DEL INMUEBLE
                        $elimProtInmueSQL = "DELETE FROM temp_datos_protocolizacion where id=".$tempUserRes["temp_datos_protocolizacion"]."";
                        $link->query($elimProtInmueSQL);
                    //SERVICIOS
                        $elimServSQL = "DELETE FROM temp_servicios_inmue where id=".$tempUserRes["temp_servicios_inmue"]." ";
                        $link->query($elimServSQL);
                    //LINDEROS SEGUN DOC
                        $elimLindDocSQL = "DELETE FROM temp_linderos_documento where id=".$tempUserRes["temp_linderos_documento"]."";
                        $link->query($elimLindDocSQL);
                    //LINDEROS SEGUN INSPECCION
                        $elimLindInspSQL = "DELETE FROM temp_linderos_general where id=".$tempUserRes["temp_linderos_general"]."";
                        $link->query($elimLindInspSQL);
                    //INMUEBLE
                        $elimInmueSQL ="DELETE FROM temp_inmueble where id=".$tempUserRes["temp_inmueble"]."";
                        $link->query($elimInmueSQL);
                    //EXPEDIENTE
                        $elimExpSQL = "DELETE FROM temp_expediente where id=".$tempUserRes["temp_expediente"]."";
                        $link->query($elimExpSQL);
                    //FACTURA
                        $elimFactSQL = "DELETE FROM temp_factura where id=".$tempUserRes["temp_factura"]."";
                        $link->query($elimFactSQL);
                    //USER
                        $elimUserSQL = "DELETE FROM user_temp where userId=".$userRes["id"]."";
                        $link->query($elimUserSQL);
                
            }
        }else{
                echo'<input type="hidden" value="false" id="verInmV">';
                //BUSQUEDA PROPIETARIO
                        $SQLProp = "SELECT * FROM propietarios where cedula='".$propieRes["cedula"]."'";
                        $resPropSQL = $link->query($SQLProp);
                        $propSQLRes = $resPropSQL->fetch_array();
                        if($propSQLRes["cedula"]==$propieRes["cedula"]){
                            $uptPropSQl = "UPDATE propietarios SET cedula='".$propieRes["cedula"]."', rif='".$propieRes["rif"]."', nombre='".$propieRes["nombre"]."', apellido='".$propieRes["apellido"]."',telef='".$propieRes["telef"]."',dir_hab='".$propieRes["dir_hab"]."', telef_hab='".$propieRes["telef_hab"]."' where cedula='".$propieRes["cedula"]."'";
                            $resUptProp = $link->query($uptPropSQl);
                            $idPropie = $propSQLRes["id"];
                        }else{
                            $propietarioSQL ="INSERT INTO propietarios(cedula,rif,nombre,apellido,telef,dir_hab,telef_hab)value('".$propieRes['cedula']."','".$propieRes['rif']."','".$propieRes['nombre']."','".$propieRes['apellido']."','".$propieRes['telef']."','".$propieRes['dir_hab']."','".$propieRes['telef_hab']."') ";
                            $link->query($propietarioSQL);
                            $idPropie = $link->insert_id;
                        }
                //CARACTERISTICAS DEL INMUEBLE
                    $caracInmueSQL = "SELECT * FROM temp_carainmue where id=".$tempUserRes["temp_carainmue"]." ";
                    $resCaracInmue = $link->query($caracInmueSQL);
                    $caracInmueRes = $resCaracInmue->fetch_array();
                    $caraInmueSQL = "INSERT INTO carc_inmueble(topografia,forma,uso,tenencia)value('".$caracInmueRes["topografia"]."','".$caracInmueRes["forma"]."','".$caracInmueRes["uso"]."','".$caracInmueRes["tenencia"]."')";
                    $link->query($caraInmueSQL);
                    $idcaraInmue2 = $link->insert_id;
                //PUERTAS
                    $puertSQL = "SELECT * FROM temp_puertas where id=".$tempUserRes["temp_puertas"]."";
                    $resPuert = $link->query($puertSQL);
                    $puertRes = $resPuert->fetch_array();
                    $puertasSQL = "INSERT INTO puertas(entamborada_fina,ent_econo,madera_cepi,hierro)value('".$puertRes['entamborada_fina']."','".$puertRes['ent_econo']."','".$puertRes['madera_cepi']."','".$puertRes['hierro']."')";
                    $link->query($puertasSQL);
                    $idPuertas = $link->insert_id;
                //ESTADO DE CONSERVACION
                    $estaConserSQL = "SELECT * FROM temp_estado_conservacion where id=".$tempUserRes["temp_estado_conservacion"]."";
                    $resEstaConser = $link->query($estaConserSQL);
                    $estaConserRes = $resEstaConser->fetch_array();
                    $conservSQL = "INSERT INTO estado_conservacion(ano_construccion,ano_refaccion,edad_efectiva,nro_planta,nro_vivienda)value('".$estaConserRes["ano_construccion"]."','".$estaConserRes["ano_refaccion"]."','".$estaConserRes["edad_efectiva"]."','".$estaConserRes["nro_planta"]."','".$estaConserRes["nro_vivienda"]."')";
                    $link->query($conservSQL);
                    $idConserv = $link->insert_id;
                //PIEZAS SANITARIAS
                    $piezSantSQL = "SELECT * FROM temp_piezas_sanitarias where id=".$tempUserRes["temp_piezas_sanitarias"]."";
                    $resPiezSant = $link->query($piezSantSQL);
                    $piezSantRes = $resPiezSant->fetch_array();
                    $piezSQL = "INSERT INTO piezas_sanitarias(porcelana_fina,porcelana_econ,banera,calentador,wc,bidet,lavamanos,ducha,urinario)value('".$piezSantRes["porcelana_fina"]."','".$piezSantRes["porcelana_econ"]."','".$piezSantRes["banera"]."','".$piezSantRes["calentador"]."','".$piezSantRes["wc"]."','".$piezSantRes["bidet"]."','".$piezSantRes["lavamanos"]."','".$piezSantRes["ducha"]."','".$piezSantRes["urinario"]."')";
                    $link->query($piezSQL);
                    $idPiezSant = $link->insert_id;
                //COMPLEMENTOS
                    $compleSQL ="SELECT * FROM temp_complementos where id=".$tempUserRes["temp_complementos"]."";
                    $resComple = $link->query($compleSQL);
                    $compleRes = $resComple->fetch_array();
                    $complementSQL ="INSERT INTO complementos(ascensor,aire_acond,rejas,closets,porcelana)value('".$compleRes["ascensor"]."','".$compleRes["aire_acond"]."','".$compleRes["rejas"]."','".$compleRes["closets"]."','".$compleRes["porcelana"]."')";
                    $link->query($complementSQL);
                    $idComplement = $link->insert_id;
                //AMBIENTES
                    $ambienSQL = "SELECT * FROM temp_ambientes where id=".$tempUserRes["temp_ambientes"]."";
                    $resAmbiente = $link->query($ambienSQL);
                    $ambientesRes = $resAmbiente->fetch_array();
                    $ambientSQL = "INSERT INTO ambientes(dormitorio,comedor,sala,banos,cocina,servicio,oficina,garaje,estacionamiento)value('".$ambientesRes["dormitorio"]."','".$ambientesRes["comedor"]."','".$ambientesRes["sala"]."','".$ambientesRes["banos"]."','".$ambientesRes["cocina"]."','".$ambientesRes["servicio"]."','".$ambientesRes["oficina"]."','".$ambientesRes["garaje"]."','".$ambientesRes["estacionamiento"]."')";
                    $link->query($ambientSQL);
                    $idAmbientes = $link->insert_id;
                //CARACTERISTICAS DE LA CONSTRUCCION
                    $caracConstSQL = "SELECT * FROM temp_caraconst where id=".$tempUserRes["temp_caraconst"]."";
                    $resCaraConst = $link->query($caracConstSQL);
                    $caraConstRes = $resCaraConst->fetch_array();
                    $SQLcaraConst = "INSERT INTO caracteristicas_construccion(destino,estructura,paredes_tipo,paredes_acabado,pintura,techo,pisos,ventanas,insta_electricas,observ,Regimen,fk_puertas,fk_estadoConserv,fk_piezasSanitarias,fk_complementos,fk_ambientes,fk_estadoCons)value('".$caraConstRes["destino"]."','".$caraConstRes["estructura"]."','".$caraConstRes["paredes_tipo"]."','".$caraConstRes["paredes_acabado"]."','".$caraConstRes["pintura"]."','".$caraConstRes["techo"]."','".$caraConstRes["pisos"]."','".$caraConstRes["ventanas"]."','".$caraConstRes["insta_electricas"]."','".$caraConstRes["observ"]."','".$caraConstRes["Regimen"]."',".$idPuertas.",".$idConserv.",".$idPiezSant.",".$idComplement.",".$idComplement.",".$idAmbientes.")";
                    $link->query($SQLcaraConst);
                    $idCaraConst = $link->insert_id;
                //PROTOCOLIZACION DEL INMUEBLE
                    $protoSQL = "SELECT * FROM temp_datos_protocolizacion where id=".$tempUserRes["temp_datos_protocolizacion"]."";
                    $resProto = $link->query($protoSQL);
                    $protoRes = $resProto->fetch_array();
                    $protSQL = "INSERT INTO datos_protocolizacion(documento,direccion,numero,tomo,folio,protocolo,trimestre,fecha,valor_inmueble)value('".$protoRes["documento"]."','".$protoRes["direccion"]."','".$protoRes["numero"]."','".$protoRes["tomo"]."','".$protoRes["folio"]."','".$protoRes["protocolo"]."','".$protoRes["trimestre"]."','".$protoRes["fecha"]."','".$protoRes["valor_inmueble"]."')";
                    $link->query($protSQL);
                    $idProt = $link->insert_id;
                //SERVICIOS
                    $serviciosSQL ="SELECT * FROM temp_servicios_inmue where id=".$tempUserRes["temp_servicios_inmue"]."";
                    $resServicios = $link->query($serviciosSQL);
                    $serviciosRes = $resServicios->fetch_array();
                    $servSQL = "INSERT INTO servicios_inmue(acued,acuedRural,aguasSubter,aguasServ,pavimentoFlex,pavimentoRig,viaEngran,acera,alumbradoPub,aseo,transportePublic,pozoSept,electriResi,electriIndus,lineaTelef)VALUE('".$serviciosRes["acued"]."','".$serviciosRes["acuedRural"]."','".$serviciosRes["aguasSubter"]."','".$serviciosRes["aguasServ"]."','".$serviciosRes["pavimentoFlex"]."','".$serviciosRes["pavimentoRig"]."','".$serviciosRes["viaEngran"]."','".$serviciosRes["acera"]."','".$serviciosRes["alumbradoPub"]."','".$serviciosRes["aseo"]."','".$serviciosRes["transportePublic"]."','".$serviciosRes["pozoSept"]."','".$serviciosRes["electriResi"]."','".$serviciosRes["electriIndus"]."','".$serviciosRes["lineaTelef"]."')";
                    $link->query($servSQL);
                    $idServ = $link->insert_id;
                //LINDEROS SEGUN DOC
                    $lindDocSQL = "SELECT * FROM temp_linderos_documento where id=".$tempUserRes["temp_linderos_documento"]."";
                    $resLindDoc = $link->query($lindDocSQL);
                    $lindDocRes = $resLindDoc->fetch_array();
                    $lindDocumSQL = "INSERT INTO linderos_documento(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$lindDocRes["norte"]."','".$lindDocRes["noreste"]."','".$lindDocRes["sur"]."','".$lindDocRes["sureste"]."','".$lindDocRes["este"]."','".$lindDocRes["suroeste"]."','".$lindDocRes["oeste"]."','".$lindDocRes["noroeste"]."','".$lindDocRes["alind_n"]."','".$lindDocRes["alind_s"]."','".$lindDocRes["alind_e"]."','".$lindDocRes["alind_o"]."','".$lindDocRes["areaTotal"]."','".$lindDocRes["uniAreaT"]."','".$lindDocRes["nivelesConst"]."','".$lindDocRes["uniAreaC"]."','".$lindDocRes["areaConst"]."','".$lindDocRes["uniNorte"]."','".$lindDocRes["uniSur"]."','".$lindDocRes["uniEste"]."','".$lindDocRes["uniOeste"]."')";
                    $link->query($lindDocumSQL);
                    $idLinDocum = $link->insert_id;
                //LINDEROS SEGUN INSPEC
                    $lindGenSQL = "SELECT * FROM temp_linderos_general where id=".$tempUserRes["temp_linderos_general"]."";
                    $resLindGen = $link->query($lindGenSQL);
                    $lindGenRes = $resLindGen->fetch_array();
                    $lindGeneralSQL = "INSERT INTO linderos_general(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$lindGenRes["norte"]."','".$lindGenRes["noreste"]."','".$lindGenRes["sur"]."','".$lindGenRes["sureste"]."','".$lindGenRes["este"]."','".$lindGenRes["suroeste"]."','".$lindGenRes["oeste"]."','".$lindGenRes["noroeste"]."','".$lindGenRes["alind_n"]."','".$lindGenRes["alind_s"]."','".$lindGenRes["alind_e"]."','".$lindGenRes["alind_o"]."','".$lindGenRes["areaTotal"]."','".$lindGenRes["uniAreaT"]."','".$lindGenRes["nivelesConst"]."','".$lindGenRes["uniAreaC"]."','".$lindGenRes["areaConst"]."','".$lindGenRes["uniNorte"]."','".$lindGenRes["uniSur"]."','".$lindGenRes["uniEste"]."','".$lindGenRes["uniOeste"]."')";
                    $link->query($lindGeneralSQL);
                    $idLinGeneral = $link->insert_id;
                //INMUEBLE 
                    $inmuebleSQL = "INSERT INTO inmueble(direccion,parroquia,sector,ambito,fk_carac_construccion,fk_protocolizacion,fk_carac_inmuebles,fk_lind_documento,fk_lind_general,fk_servicios)value('".$inmueRes["direccion"]."','".$inmueRes["parroquia"]."','".$inmueRes["sector"]."','".$inmueRes["ambito"]."',".$idCaraConst.",".$idProt.",".$idcaraInmue2.",".$idLinDocum.",".$idLinGeneral.",".$idServ.")";
                    $link->query($inmuebleSQL);
                    $idInmueble = $link->insert_id;
                //EXPEDIENTE
                    $expSQL = "SELECT * FROM temp_expediente where id=".$tempUserRes["temp_expediente"]."";
                    $resExpe = $link->query($expSQL);
                    $expeRes = $resExpe->fetch_array();
                    $expedientSQL = "INSERT INTO expediente(fk_inmueble,fk_propietario,fk_usuario,n_expediente,fecha,condicion,valorInmue)value(".$idInmueble.",".$idPropie.",".$userRes["id"].",'".$expeRes["no_expediente"]."','".$expeRes["fecha"]."','".$expeRes["condicion"]."','".$expeRes["valorInmue"]."')";
                    $link->query($expedientSQL);
                    $nuExpedient = $link->insert_id;
                //FACTURA
                    $factSQL = "SELECT * FROM temp_factura where id=".$tempUserRes["temp_factura"]."";
                    $resFact = $link->query($factSQL);
                    $factRes = $resFact->fetch_array();
                    $facturaSQL = "INSERT INTO factura(monto,n_factura,fecha,n_recibo)value('".$factRes["monto"]."','".$factRes["n_factura"]."','".$factRes["fecha"]."','".$factRes["n_recibo"]."')";
                    $link->query($facturaSQL);
                    $idFactura = $link->insert_id;
                echo'
                <input type="hidden" value="'.$factRes["monto"].'" id="montoFact"/>
                <input type="hidden" value="'.$factRes["fecha"].'" id="fechFact"/>
                <input type="hidden" value="'.$idInmueble.'" id="idInmueble"/>
                <input type="hidden" value="'.$idPropie.'" id="idProp"/>
                <input type="hidden" value="'.$factRes["n_factura"].'" id="numFact"/>
                <input type="hidden" value="Nuevo Ingreso" id="operacion"/>
                <input type="hidden" value="'.$nuExpedient.'" id="nuExp"/>
                ';
                //ELIMINAR SQL DE TEMP
                    //PROPIETARIO
                        $eliPropSQL ="DELETE FROM temp_propietarios where id=".$tempUserRes["temp_propietarios"]."";
                        $link->query($eliPropSQL);
                    //CARACTERISTICAS DEL INMUEBLE
                        $elimCaracInmueSQL = "DELETE FROM temp_carainmue where id=".$tempUserRes["temp_carainmue"]."";
                        $link->query($elimCaracInmueSQL);
                    //PUERTAS
                        $elimPuertasSQL = "DELETE FROM temp_puertas where id=".$tempUserRes["temp_puertas"]."";
                        $link->query($elimPuertasSQL);
                    //ESTADO CONSERVACION
                        $elimConservSQL = "DELETE FROM temp_estado_conservacion where id=".$tempUserRes["temp_estado_conservacion"]."";
                        $link->query($elimConservSQL);
                    //PIEZAS SANITARIAS
                        $elimPiezSan = "DELETE FROM temp_piezas_sanitarias where id=".$tempUserRes["temp_piezas_sanitarias"]."";
                        $link->query($elimPiezSan);
                    //COMPLEMENTOS
                        $elimComple = "DELETE FROM temp_complementos where id=".$tempUserRes["temp_complementos"]."";
                        $link->query($elimComple);
                    //AMBIENTES 
                        $elimAmbientSQL = "DELETE FROM temp_ambientes where id=".$tempUserRes["temp_ambientes"]."";
                        $link->query($elimAmbientSQL);
                    //CARACTERISTICAS DE LA CONSTRUCCION
                        $elimCaracConstSQL = "DELETE FROM temp_caraconst where id=".$tempUserRes["temp_caraconst"]."";
                        $link->query($elimCaracConstSQL);
                    //PROTOCOLIZACION DEL INMUEBLE
                        $elimProtInmueSQL = "DELETE FROM temp_datos_protocolizacion where id=".$tempUserRes["temp_datos_protocolizacion"]."";
                        $link->query($elimProtInmueSQL);
                    //SERVICIOS
                        $elimServSQL = "DELETE FROM temp_servicios_inmue where id=".$tempUserRes["temp_servicios_inmue"]." ";
                        $link->query($elimServSQL);
                    //LINDEROS SEGUN DOC
                        $elimLindDocSQL = "DELETE FROM temp_linderos_documento where id=".$tempUserRes["temp_linderos_documento"]."";
                        $link->query($elimLindDocSQL);
                    //LINDEROS SEGUN INSPECCION
                        $elimLindInspSQL = "DELETE FROM temp_linderos_general where id=".$tempUserRes["temp_linderos_general"]."";
                        $link->query($elimLindInspSQL);
                    //INMUEBLE
                        $elimInmueSQL ="DELETE FROM temp_inmueble where id=".$tempUserRes["temp_inmueble"]."";
                        $link->query($elimInmueSQL);
                    //EXPEDIENTE
                        $elimExpSQL = "DELETE FROM temp_expediente where id=".$tempUserRes["temp_expediente"]."";
                        $link->query($elimExpSQL);
                    //FACTURA
                        $elimFactSQL = "DELETE FROM temp_factura where id=".$tempUserRes["temp_factura"]."";
                        $link->query($elimFactSQL);
                    //USER
                        $elimUserSQL = "DELETE FROM user_temp where userId=".$userRes["id"]."";
                        $link->query($elimUserSQL);
                
        }
    }
    function guardarRepConst1(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //USUARIO
            $userSQL = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUser = $link->query($userSQL);
            $userRes = $resUser->fetch_array();
        //USUARIOS TEMPORALES
            $tempUserSQL ="SELECT * FROM user_temp where userId=".$userRes["id"]."";
            $resTempUser = $link->query($tempUserSQL);
            $tempUserRes = $resTempUser->fetch_array();
        //PROPIETARIOS TEMPORALES
            $propSQL ="SELECT * FROM temp_propietarios where id=".$tempUserRes["temp_propietarios"]."";
            $resProp = $link->query($propSQL);
            $propieRes = $resProp->fetch_array();
        //PROPIETARIOS
            $propSqlDe= "SELECT * FROM propietarios where cedula='".$propieRes["cedula"]."'";
            $resPropDe = $link->query($propSqlDe);
            $propDeRes = $resPropDe->fetch_array();
        //INMUEBLE TEMP
            $inmueSQL ="SELECT * FROM temp_inmueble where id=".$tempUserRes["temp_inmueble"]."";
            $resInmue = $link->query($inmueSQL);
            $inmueRes = $resInmue->fetch_array();
        //INMUEBLE
            $inmueDeSQL ="SELECT * FROM inmueble where direccion='".$inmueRes["direccion"]."'";
            $resDeInmue = $link->query($inmueDeSQL);
            $inmueDeRes = $resDeInmue->fetch_array();
        //BUSQUEDA PROPIETARIO
            $SQLProp = "SELECT * FROM propietarios where cedula='".$propieRes["cedula"]."'";
            $resPropSQL = $link->query($SQLProp);
            $propSQLRes = $resPropSQL->fetch_array();
            if($propSQLRes["cedula"]==$propieRes["cedula"]){
                $uptPropSQl = "UPDATE propietarios SET cedula='".$propieRes["cedula"]."', rif='".$propieRes["rif"]."', nombre='".$propieRes["nombre"]."', apellido='".$propieRes["apellido"]."',telef='".$propieRes["telef"]."',dir_hab='".$propieRes["dir_hab"]."', telef_hab='".$propieRes["telef_hab"]."' where cedula='".$propieRes["cedula"]."'";
                $resUptProp = $link->query($uptPropSQl);
                $idPropie = $propSQLRes["id"];
            }else{
                $propietarioSQL ="INSERT INTO propietarios(cedula,rif,nombre,apellido,telef,dir_hab,telef_hab)value('".$propieRes['cedula']."','".$propieRes['rif']."','".$propieRes['nombre']."','".$propieRes['apellido']."','".$propieRes['telef']."','".$propieRes['dir_hab']."','".$propieRes['telef_hab']."') ";
                $link->query($propietarioSQL);
                $idPropie = $link->insert_id;
            }
            //CARACTERISTICAS DEL INMUEBLE
                $caracInmueSQL = "SELECT * FROM temp_carainmue where id=".$tempUserRes["temp_carainmue"]." ";
                $resCaracInmue = $link->query($caracInmueSQL);
                $caracInmueRes = $resCaracInmue->fetch_array();
                $caraInmueSQL = "INSERT INTO carc_inmueble(topografia,forma,uso,tenencia)value('".$caracInmueRes["topografia"]."','".$caracInmueRes["forma"]."','".$caracInmueRes["uso"]."','".$caracInmueRes["tenencia"]."')";
                $link->query($caraInmueSQL);
                $idcaraInmue2 = $link->insert_id;
            //PUERTAS
                $puertSQL = "SELECT * FROM temp_puertas where id=".$tempUserRes["temp_puertas"]."";
                $resPuert = $link->query($puertSQL);
                $puertRes = $resPuert->fetch_array();
                $puertasSQL = "INSERT INTO puertas(entamborada_fina,ent_econo,madera_cepi,hierro)value('".$puertRes['entamborada_fina']."','".$puertRes['ent_econo']."','".$puertRes['madera_cepi']."','".$puertRes['hierro']."')";
                $link->query($puertasSQL);
                $idPuertas = $link->insert_id;
            //ESTADO DE CONSERVACION
                $estaConserSQL = "SELECT * FROM temp_estado_conservacion where id=".$tempUserRes["temp_estado_conservacion"]."";
                $resEstaConser = $link->query($estaConserSQL);
                $estaConserRes = $resEstaConser->fetch_array();
                $conservSQL = "INSERT INTO estado_conservacion(ano_construccion,ano_refaccion,edad_efectiva,nro_planta,nro_vivienda)value('".$estaConserRes["ano_construccion"]."','".$estaConserRes["ano_refaccion"]."','".$estaConserRes["edad_efectiva"]."','".$estaConserRes["nro_planta"]."','".$estaConserRes["nro_vivienda"]."')";
                $link->query($conservSQL);
                $idConserv = $link->insert_id;
            //PIEZAS SANITARIAS
                $piezSantSQL = "SELECT * FROM temp_piezas_sanitarias where id=".$tempUserRes["temp_piezas_sanitarias"]."";
                $resPiezSant = $link->query($piezSantSQL);
                $piezSantRes = $resPiezSant->fetch_array();
                $piezSQL = "INSERT INTO piezas_sanitarias(porcelana_fina,porcelana_econ,banera,calentador,wc,bidet,lavamanos,ducha,urinario)value('".$piezSantRes["porcelana_fina"]."','".$piezSantRes["porcelana_econ"]."','".$piezSantRes["banera"]."','".$piezSantRes["calentador"]."','".$piezSantRes["wc"]."','".$piezSantRes["bidet"]."','".$piezSantRes["lavamanos"]."','".$piezSantRes["ducha"]."','".$piezSantRes["urinario"]."')";
                $link->query($piezSQL);
                $idPiezSant = $link->insert_id;
            //COMPLEMENTOS
                $compleSQL ="SELECT * FROM temp_complementos where id=".$tempUserRes["temp_complementos"]."";
                $resComple = $link->query($compleSQL);
                $compleRes = $resComple->fetch_array();
                $complementSQL ="INSERT INTO complementos(ascensor,aire_acond,rejas,closets,porcelana)value('".$compleRes["ascensor"]."','".$compleRes["aire_acond"]."','".$compleRes["rejas"]."','".$compleRes["closets"]."','".$compleRes["porcelana"]."')";
                $link->query($complementSQL);
                $idComplement = $link->insert_id;
            //AMBIENTES
                $ambienSQL = "SELECT * FROM temp_ambientes where id=".$tempUserRes["temp_ambientes"]."";
                $resAmbiente = $link->query($ambienSQL);
                $ambientesRes = $resAmbiente->fetch_array();
                $ambientSQL = "INSERT INTO ambientes(dormitorio,comedor,sala,banos,cocina,servicio,oficina,garaje,estacionamiento)value('".$ambientesRes["dormitorio"]."','".$ambientesRes["comedor"]."','".$ambientesRes["sala"]."','".$ambientesRes["banos"]."','".$ambientesRes["cocina"]."','".$ambientesRes["servicio"]."','".$ambientesRes["oficina"]."','".$ambientesRes["garaje"]."','".$ambientesRes["estacionamiento"]."')";
                $link->query($ambientSQL);
                $idAmbientes = $link->insert_id;
            //CARACTERISTICAS DE LA CONSTRUCCION
                $caracConstSQL = "SELECT * FROM temp_caraconst where id=".$tempUserRes["temp_caraconst"]."";
                $resCaraConst = $link->query($caracConstSQL);
                $caraConstRes = $resCaraConst->fetch_array();
                $SQLcaraConst = "INSERT INTO caracteristicas_construccion(destino,estructura,paredes_tipo,paredes_acabado,pintura,techo,pisos,ventanas,insta_electricas,observ,Regimen,fk_puertas,fk_estadoConserv,fk_piezasSanitarias,fk_complementos,fk_ambientes,fk_estadoCons)value('".$caraConstRes["destino"]."','".$caraConstRes["estructura"]."','".$caraConstRes["paredes_tipo"]."','".$caraConstRes["paredes_acabado"]."','".$caraConstRes["pintura"]."','".$caraConstRes["techo"]."','".$caraConstRes["pisos"]."','".$caraConstRes["ventanas"]."','".$caraConstRes["insta_electricas"]."','".$caraConstRes["observ"]."','".$caraConstRes["Regimen"]."',".$idPuertas.",".$idConserv.",".$idPiezSant.",".$idComplement.",".$idComplement.",".$idAmbientes.")";
                $link->query($SQLcaraConst);
                $idCaraConst = $link->insert_id;
            //PROTOCOLIZACION DEL INMUEBLE
                $protoSQL = "SELECT * FROM temp_datos_protocolizacion where id=".$tempUserRes["temp_datos_protocolizacion"]."";
                $resProto = $link->query($protoSQL);
                $protoRes = $resProto->fetch_array();
                $protSQL = "INSERT INTO datos_protocolizacion(documento,direccion,numero,tomo,folio,protocolo,trimestre,fecha,valor_inmueble)value('".$protoRes["documento"]."','".$protoRes["direccion"]."','".$protoRes["numero"]."','".$protoRes["tomo"]."','".$protoRes["folio"]."','".$protoRes["protocolo"]."','".$protoRes["trimestre"]."','".$protoRes["fecha"]."','".$protoRes["valor_inmueble"]."')";
                $link->query($protSQL);
                $idProt = $link->insert_id;
            //SERVICIOS
                $serviciosSQL ="SELECT * FROM temp_servicios_inmue where id=".$tempUserRes["temp_servicios_inmue"]."";
                $resServicios = $link->query($serviciosSQL);
                $serviciosRes = $resServicios->fetch_array();
                $servSQL = "INSERT INTO servicios_inmue(acued,acuedRural,aguasSubter,aguasServ,pavimentoFlex,pavimentoRig,viaEngran,acera,alumbradoPub,aseo,transportePublic,pozoSept,electriResi,electriIndus,lineaTelef)VALUE('".$serviciosRes["acued"]."','".$serviciosRes["acuedRural"]."','".$serviciosRes["aguasSubter"]."','".$serviciosRes["aguasServ"]."','".$serviciosRes["pavimentoFlex"]."','".$serviciosRes["pavimentoRig"]."','".$serviciosRes["viaEngran"]."','".$serviciosRes["acera"]."','".$serviciosRes["alumbradoPub"]."','".$serviciosRes["aseo"]."','".$serviciosRes["transportePublic"]."','".$serviciosRes["pozoSept"]."','".$serviciosRes["electriResi"]."','".$serviciosRes["electriIndus"]."','".$serviciosRes["lineaTelef"]."')";
                $link->query($servSQL);
                $idServ = $link->insert_id;
            //LINDEROS SEGUN DOC
                $lindDocSQL = "SELECT * FROM temp_linderos_documento where id=".$tempUserRes["temp_linderos_documento"]."";
                $resLindDoc = $link->query($lindDocSQL);
                $lindDocRes = $resLindDoc->fetch_array();
                $lindDocumSQL = "INSERT INTO linderos_documento(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$lindDocRes["norte"]."','".$lindDocRes["noreste"]."','".$lindDocRes["sur"]."','".$lindDocRes["sureste"]."','".$lindDocRes["este"]."','".$lindDocRes["suroeste"]."','".$lindDocRes["oeste"]."','".$lindDocRes["noroeste"]."','".$lindDocRes["alind_n"]."','".$lindDocRes["alind_s"]."','".$lindDocRes["alind_e"]."','".$lindDocRes["alind_o"]."','".$lindDocRes["areaTotal"]."','".$lindDocRes["uniAreaT"]."','".$lindDocRes["nivelesConst"]."','".$lindDocRes["uniAreaC"]."','".$lindDocRes["areaConst"]."','".$lindDocRes["uniNorte"]."','".$lindDocRes["uniSur"]."','".$lindDocRes["uniEste"]."','".$lindDocRes["uniOeste"]."')";
                $link->query($lindDocumSQL);
                $idLinDocum = $link->insert_id;
            //LINDEROS SEGUN INSPEC
                $lindGenSQL = "SELECT * FROM temp_linderos_general where id=".$tempUserRes["temp_linderos_general"]."";
                $resLindGen = $link->query($lindGenSQL);
                $lindGenRes = $resLindGen->fetch_array();
                $lindGeneralSQL = "INSERT INTO linderos_general(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$lindGenRes["norte"]."','".$lindGenRes["noreste"]."','".$lindGenRes["sur"]."','".$lindGenRes["sureste"]."','".$lindGenRes["este"]."','".$lindGenRes["suroeste"]."','".$lindGenRes["oeste"]."','".$lindGenRes["noroeste"]."','".$lindGenRes["alind_n"]."','".$lindGenRes["alind_s"]."','".$lindGenRes["alind_e"]."','".$lindGenRes["alind_o"]."','".$lindGenRes["areaTotal"]."','".$lindGenRes["uniAreaT"]."','".$lindGenRes["nivelesConst"]."','".$lindGenRes["uniAreaC"]."','".$lindGenRes["areaConst"]."','".$lindGenRes["uniNorte"]."','".$lindGenRes["uniSur"]."','".$lindGenRes["uniEste"]."','".$lindGenRes["uniOeste"]."')";
                $link->query($lindGeneralSQL);
                $idLinGeneral = $link->insert_id;
            //INMUEBLE 
                $inmuebleSQL = "INSERT INTO inmueble(direccion,parroquia,sector,ambito,fk_carac_construccion,fk_protocolizacion,fk_carac_inmuebles,fk_lind_documento,fk_lind_general,fk_servicios)value('".$inmueRes["direccion"]."','".$inmueRes["parroquia"]."','".$inmueRes["sector"]."','".$inmueRes["ambito"]."',".$idCaraConst.",".$idProt.",".$idcaraInmue2.",".$idLinDocum.",".$idLinGeneral.",".$idServ.")";
                $link->query($inmuebleSQL);
                $idInmueble = $link->insert_id;
            //EXPEDIENTE
                $expSQL = "SELECT * FROM temp_expediente where id=".$tempUserRes["temp_expediente"]."";
                $resExpe = $link->query($expSQL);
                $expeRes = $resExpe->fetch_array();
                $expedientSQL = "INSERT INTO expediente(fk_inmueble,fk_propietario,fk_usuario,n_expediente,fecha,condicion,valorInmue)value(".$idInmueble.",".$idPropie.",".$userRes["id"].",'".$expeRes["no_expediente"]."','".$expeRes["fecha"]."','".$expeRes["condicion"]."','".$expeRes["valorInmue"]."')";
                $link->query($expedientSQL);
                $nuExpedient = $link->insert_id;
            //FACTURA
                $factSQL = "SELECT * FROM temp_factura where id=".$tempUserRes["temp_factura"]."";
                $resFact = $link->query($factSQL);
                $factRes = $resFact->fetch_array();
                $facturaSQL = "INSERT INTO factura(monto,n_factura,fecha,n_recibo)value('".$factRes["monto"]."','".$factRes["n_factura"]."','".$factRes["fecha"]."','".$factRes["n_recibo"]."')";
                $link->query($facturaSQL);
                $idFactura = $link->insert_id;
            echo'
            <input type="hidden" value="'.$factRes["monto"].'" id="montoFact"/>
            <input type="hidden" value="'.$factRes["fecha"].'" id="fechFact"/>
            <input type="hidden" value="'.$idInmueble.'" id="idInmueble"/>
            <input type="hidden" value="'.$idPropie.'" id="idProp"/>
            <input type="hidden" value="'.$factRes["n_factura"].'" id="numFact"/>
            <input type="hidden" value="Nuevo Ingreso" id="operacion"/>
            <input type="hidden" value="'.$nuExpedient.'" id="nuExp"/>
            ';
            //ELIMINAR SQL DE TEMP
                //PROPIETARIO
                    $eliPropSQL ="DELETE FROM temp_propietarios where id=".$tempUserRes["temp_propietarios"]."";
                    $link->query($eliPropSQL);
                //CARACTERISTICAS DEL INMUEBLE
                    $elimCaracInmueSQL = "DELETE FROM temp_carainmue where id=".$tempUserRes["temp_carainmue"]."";
                    $link->query($elimCaracInmueSQL);
                //PUERTAS
                    $elimPuertasSQL = "DELETE FROM temp_puertas where id=".$tempUserRes["temp_puertas"]."";
                    $link->query($elimPuertasSQL);
                //ESTADO CONSERVACION
                    $elimConservSQL = "DELETE FROM temp_estado_conservacion where id=".$tempUserRes["temp_estado_conservacion"]."";
                    $link->query($elimConservSQL);
                //PIEZAS SANITARIAS
                    $elimPiezSan = "DELETE FROM temp_piezas_sanitarias where id=".$tempUserRes["temp_piezas_sanitarias"]."";
                    $link->query($elimPiezSan);
                //COMPLEMENTOS
                    $elimComple = "DELETE FROM temp_complementos where id=".$tempUserRes["temp_complementos"]."";
                    $link->query($elimComple);
                //AMBIENTES 
                    $elimAmbientSQL = "DELETE FROM temp_ambientes where id=".$tempUserRes["temp_ambientes"]."";
                    $link->query($elimAmbientSQL);
                //CARACTERISTICAS DE LA CONSTRUCCION
                    $elimCaracConstSQL = "DELETE FROM temp_caraconst where id=".$tempUserRes["temp_caraconst"]."";
                    $link->query($elimCaracConstSQL);
                //PROTOCOLIZACION DEL INMUEBLE
                    $elimProtInmueSQL = "DELETE FROM temp_datos_protocolizacion where id=".$tempUserRes["temp_datos_protocolizacion"]."";
                    $link->query($elimProtInmueSQL);
                //SERVICIOS
                    $elimServSQL = "DELETE FROM temp_servicios_inmue where id=".$tempUserRes["temp_servicios_inmue"]." ";
                    $link->query($elimServSQL);
                //LINDEROS SEGUN DOC
                    $elimLindDocSQL = "DELETE FROM temp_linderos_documento where id=".$tempUserRes["temp_linderos_documento"]."";
                    $link->query($elimLindDocSQL);
                //LINDEROS SEGUN INSPECCION
                    $elimLindInspSQL = "DELETE FROM temp_linderos_general where id=".$tempUserRes["temp_linderos_general"]."";
                    $link->query($elimLindInspSQL);
                //INMUEBLE
                    $elimInmueSQL ="DELETE FROM temp_inmueble where id=".$tempUserRes["temp_inmueble"]."";
                    $link->query($elimInmueSQL);
                //EXPEDIENTE
                    $elimExpSQL = "DELETE FROM temp_expediente where id=".$tempUserRes["temp_expediente"]."";
                    $link->query($elimExpSQL);
                //FACTURA
                    $elimFactSQL = "DELETE FROM temp_factura where id=".$tempUserRes["temp_factura"]."";
                    $link->query($elimFactSQL);
                //USER
                    $elimUserSQL = "DELETE FROM user_temp where userId=".$userRes["id"]."";
                    $link->query($elimUserSQL);
    }
    //VERIFICAR F004 - EMPADRONAMIENTO
    function veriFEmpadro(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //USUARIO
            $userSQL = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUser = $link->query($userSQL);
            $userRes = $resUser->fetch_array();
        //USUARIOS TEMPORALES
            $tempUserSQL ="SELECT * FROM user_temp where userId=".$userRes["id"]."";
            $resTempUser = $link->query($tempUserSQL);
            $tempUserRes = $resTempUser->fetch_array();
        //PROPIETARIOS TEMP
            $propSQL ="SELECT * FROM temp_propietarios where id=".$tempUserRes["temp_propietarios"]."";
            $resProp = $link->query($propSQL);
            $propieRes = $resProp->fetch_array();
            
        //PROPIETARIOS
            $propSqlDe= "SELECT * FROM propietarios where cedula='".$propieRes["cedula"]."'";
            $resPropDe = $link->query($propSqlDe);
            $propDeRes = $resPropDe->fetch_array();
        //INMUEBLE TEMP
            $inmueSQL ="SELECT * FROM temp_inmueble where id=".$tempUserRes["temp_inmueble"]."";
            $resInmue = $link->query($inmueSQL);
            $inmueRes = $resInmue->fetch_array();
        //INMUEBLE
            $inmueDeSQL ="SELECT * FROM inmueble where direccion='".$inmueRes["direccion"]."'";
            $resDeInmue = $link->query($inmueDeSQL);
            $inmueDeRes = $resDeInmue->fetch_array();

        if($propDeRes["cedula"]==$propieRes["cedula"]){
            if($inmueDeRes["id"]!=0){
                echo'<input type="hidden" value="true" id="verInmV">';
            }else{
                echo'<input type="hidden" value="false" id="verInmV">';
                //BUSQUEDA PROPIETARIO
                    $SQLProp = "SELECT * FROM propietarios where cedula='".$propieRes["cedula"]."'";
                    $resPropSQL = $link->query($SQLProp);
                    $propSQLRes = $resPropSQL->fetch_array();
                    if($propSQLRes["cedula"]==$propieRes["cedula"]){
                        $uptPropSQl = "UPDATE propietarios SET cedula='".$propieRes["cedula"]."', rif='".$propieRes["rif"]."', nombre='".$propieRes["nombre"]."', apellido='".$propieRes["apellido"]."',telef='".$propieRes["telef"]."',dir_hab='".$propieRes["dir_hab"]."', telef_hab='".$propieRes["telef_hab"]."' where cedula='".$propieRes["cedula"]."'";
                        $resUptProp = $link->query($uptPropSQl);
                        $idPropie = $propSQLRes["id"];
                    }else{
                        $propietarioSQL ="INSERT INTO propietarios(cedula,rif,nombre,apellido,telef,dir_hab,telef_hab)value('".$propieRes['cedula']."','".$propieRes['rif']."','".$propieRes['nombre']."','".$propieRes['apellido']."','".$propieRes['telef']."','".$propieRes['dir_hab']."','".$propieRes['telef_hab']."') ";
                        $link->query($propietarioSQL);
                        $idPropie = $link->insert_id;
                    }
                //CARACTERISTICAS DEL INMUEBLE
                    $caracInmueSQL = "SELECT * FROM temp_carainmue where id=".$tempUserRes["temp_carainmue"]." ";
                    $resCaracInmue = $link->query($caracInmueSQL);
                    $caracInmueRes = $resCaracInmue->fetch_array();
                    $caraInmueSQL = "INSERT INTO carc_inmueble(topografia,forma,uso,tenencia)value('".$caracInmueRes["topografia"]."','".$caracInmueRes["forma"]."','".$caracInmueRes["uso"]."','".$caracInmueRes["tenencia"]."')";
                    $link->query($caraInmueSQL);
                    $idcaraInmue2 = $link->insert_id;
                //PUERTAS
                    $puertSQL = "SELECT * FROM temp_puertas where id=".$tempUserRes["temp_puertas"]."";
                    $resPuert = $link->query($puertSQL);
                    $puertRes = $resPuert->fetch_array();
                    $puertasSQL = "INSERT INTO puertas(entamborada_fina,ent_econo,madera_cepi,hierro)value('".$puertRes['entamborada_fina']."','".$puertRes['ent_econo']."','".$puertRes['madera_cepi']."','".$puertRes['hierro']."')";
                    $link->query($puertasSQL);
                    $idPuertas = $link->insert_id;
                //ESTADO DE CONSERVACION
                    $estaConserSQL = "SELECT * FROM temp_estado_conservacion where id=".$tempUserRes["temp_estado_conservacion"]."";
                    $resEstaConser = $link->query($estaConserSQL);
                    $estaConserRes = $resEstaConser->fetch_array();
                    $conservSQL = "INSERT INTO estado_conservacion(ano_construccion,ano_refaccion,edad_efectiva,nro_planta,nro_vivienda)value('".$estaConserRes["ano_construccion"]."','".$estaConserRes["ano_refaccion"]."','".$estaConserRes["edad_efectiva"]."','".$estaConserRes["nro_planta"]."','".$estaConserRes["nro_vivienda"]."')";
                    $link->query($conservSQL);
                    $idConserv = $link->insert_id;
                //PIEZAS SANITARIAS
                    $piezSantSQL = "SELECT * FROM temp_piezas_sanitarias where id=".$tempUserRes["temp_piezas_sanitarias"]."";
                    $resPiezSant = $link->query($piezSantSQL);
                    $piezSantRes = $resPiezSant->fetch_array();
                    $piezSQL = "INSERT INTO piezas_sanitarias(porcelana_fina,porcelana_econ,banera,calentador,wc,bidet,lavamanos,ducha,urinario)value('".$piezSantRes["porcelana_fina"]."','".$piezSantRes["porcelana_econ"]."','".$piezSantRes["banera"]."','".$piezSantRes["calentador"]."','".$piezSantRes["wc"]."','".$piezSantRes["bidet"]."','".$piezSantRes["lavamanos"]."','".$piezSantRes["ducha"]."','".$piezSantRes["urinario"]."')";
                    $link->query($piezSQL);
                    $idPiezSant = $link->insert_id;
                //COMPLEMENTOS
                    $compleSQL ="SELECT * FROM temp_complementos where id=".$tempUserRes["temp_complementos"]."";
                    $resComple = $link->query($compleSQL);
                    $compleRes = $resComple->fetch_array();
                    $complementSQL ="INSERT INTO complementos(ascensor,aire_acond,rejas,closets,porcelana)value('".$compleRes["ascensor"]."','".$compleRes["aire_acond"]."','".$compleRes["rejas"]."','".$compleRes["closets"]."','".$compleRes["porcelana"]."')";
                    $link->query($complementSQL);
                    $idComplement = $link->insert_id;
                //AMBIENTES
                    $ambienSQL = "SELECT * FROM temp_ambientes where id=".$tempUserRes["temp_ambientes"]."";
                    $resAmbiente = $link->query($ambienSQL);
                    $ambientesRes = $resAmbiente->fetch_array();
                    $ambientSQL = "INSERT INTO ambientes(dormitorio,comedor,sala,banos,cocina,servicio,oficina,garaje,estacionamiento)value('".$ambientesRes["dormitorio"]."','".$ambientesRes["comedor"]."','".$ambientesRes["sala"]."','".$ambientesRes["banos"]."','".$ambientesRes["cocina"]."','".$ambientesRes["servicio"]."','".$ambientesRes["oficina"]."','".$ambientesRes["garaje"]."','".$ambientesRes["estacionamiento"]."')";
                    $link->query($ambientSQL);
                    $idAmbientes = $link->insert_id;
                //CARACTERISTICAS DE LA CONSTRUCCION
                    $caracConstSQL = "SELECT * FROM temp_caraconst where id=".$tempUserRes["temp_caraconst"]."";
                    $resCaraConst = $link->query($caracConstSQL);
                    $caraConstRes = $resCaraConst->fetch_array();
                    $SQLcaraConst = "INSERT INTO caracteristicas_construccion(destino,estructura,paredes_tipo,paredes_acabado,pintura,techo,pisos,ventanas,insta_electricas,observ,Regimen,fk_puertas,fk_estadoConserv,fk_piezasSanitarias,fk_complementos,fk_ambientes,fk_estadoCons)value('".$caraConstRes["destino"]."','".$caraConstRes["estructura"]."','".$caraConstRes["paredes_tipo"]."','".$caraConstRes["paredes_acabado"]."','".$caraConstRes["pintura"]."','".$caraConstRes["techo"]."','".$caraConstRes["pisos"]."','".$caraConstRes["ventanas"]."','".$caraConstRes["insta_electricas"]."','".$caraConstRes["observ"]."','".$caraConstRes["Regimen"]."',".$idPuertas.",".$idConserv.",".$idPiezSant.",".$idComplement.",".$idComplement.",".$idAmbientes.")";
                    $link->query($SQLcaraConst);
                    $idCaraConst = $link->insert_id;
                //PROTOCOLIZACION DEL INMUEBLE
                    $protoSQL = "SELECT * FROM temp_datos_protocolizacion where id=".$tempUserRes["temp_datos_protocolizacion"]."";
                    $resProto = $link->query($protoSQL);
                    $protoRes = $resProto->fetch_array();
                    $protSQL = "INSERT INTO datos_protocolizacion(documento,direccion,numero,tomo,folio,protocolo,trimestre,fecha,valor_inmueble)value('".$protoRes["documento"]."','".$protoRes["direccion"]."','".$protoRes["numero"]."','".$protoRes["tomo"]."','".$protoRes["folio"]."','".$protoRes["protocolo"]."','".$protoRes["trimestre"]."','".$protoRes["fecha"]."','".$protoRes["valor_inmueble"]."')";
                    $link->query($protSQL);
                    $idProt = $link->insert_id;
                //SERVICIOS
                    $serviciosSQL ="SELECT * FROM temp_servicios_inmue where id=".$tempUserRes["temp_servicios_inmue"]."";
                    $resServicios = $link->query($serviciosSQL);
                    $serviciosRes = $resServicios->fetch_array();
                    $servSQL = "INSERT INTO servicios_inmue(acued,acuedRural,aguasSubter,aguasServ,pavimentoFlex,pavimentoRig,viaEngran,acera,alumbradoPub,aseo,transportePublic,pozoSept,electriResi,electriIndus,lineaTelef)VALUE('".$serviciosRes["acued"]."','".$serviciosRes["acuedRural"]."','".$serviciosRes["aguasSubter"]."','".$serviciosRes["aguasServ"]."','".$serviciosRes["pavimentoFlex"]."','".$serviciosRes["pavimentoRig"]."','".$serviciosRes["viaEngran"]."','".$serviciosRes["acera"]."','".$serviciosRes["alumbradoPub"]."','".$serviciosRes["aseo"]."','".$serviciosRes["transportePublic"]."','".$serviciosRes["pozoSept"]."','".$serviciosRes["electriResi"]."','".$serviciosRes["electriIndus"]."','".$serviciosRes["lineaTelef"]."')";
                    $link->query($servSQL);
                    $idServ = $link->insert_id;
                //LINDEROS SEGUN DOC
                    $lindDocSQL = "SELECT * FROM temp_linderos_documento where id=".$tempUserRes["temp_linderos_documento"]."";
                    $resLindDoc = $link->query($lindDocSQL);
                    $lindDocRes = $resLindDoc->fetch_array();
                    $lindDocumSQL = "INSERT INTO linderos_documento(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$lindDocRes["norte"]."','".$lindDocRes["noreste"]."','".$lindDocRes["sur"]."','".$lindDocRes["sureste"]."','".$lindDocRes["este"]."','".$lindDocRes["suroeste"]."','".$lindDocRes["oeste"]."','".$lindDocRes["noroeste"]."','".$lindDocRes["alind_n"]."','".$lindDocRes["alind_s"]."','".$lindDocRes["alind_e"]."','".$lindDocRes["alind_o"]."','".$lindDocRes["areaTotal"]."','".$lindDocRes["uniAreaT"]."','".$lindDocRes["nivelesConst"]."','".$lindDocRes["uniAreaC"]."','".$lindDocRes["areaConst"]."','".$lindDocRes["uniNorte"]."','".$lindDocRes["uniSur"]."','".$lindDocRes["uniEste"]."','".$lindDocRes["uniOeste"]."')";
                    $link->query($lindDocumSQL);
                    $idLinDocum = $link->insert_id;
                //INMUEBLE 
                    $inmuebleSQL = "INSERT INTO inmueble(direccion,parroquia,sector,ambito,fk_carac_construccion,fk_protocolizacion,fk_carac_inmuebles,fk_lind_documento,fk_servicios)value('".$inmueRes["direccion"]."','".$inmueRes["parroquia"]."','".$inmueRes["sector"]."','".$inmueRes["ambito"]."',".$idCaraConst.",".$idProt.",".$idcaraInmue2.",".$idLinDocum.",".$idServ.")";
                    $link->query($inmuebleSQL);
                    $idInmueble = $link->insert_id;
                //EXPEDIENTE
                    $expSQL = "SELECT * FROM temp_expediente where id=".$tempUserRes["temp_expediente"]."";
                    $resExpe = $link->query($expSQL);
                    $expeRes = $resExpe->fetch_array();
                    $expedientSQL = "INSERT INTO expempadro(fk_inmueble,fk_propietario,fk_usuario,n_expediente,fecha,condicion,valorInmue)value(".$idInmueble.",".$idPropie.",".$userRes["id"].",'".$expeRes["no_expediente"]."','".$expeRes["fecha"]."','".$expeRes["condicion"]."','".$expeRes["valorInmue"]."')";
                    $link->query($expedientSQL);
                    $nuExpedient = $link->insert_id;
                //FACTURA
                    $factSQL = "SELECT * FROM temp_factura where id=".$tempUserRes["temp_factura"]."";
                    $resFact = $link->query($factSQL);
                    $factRes = $resFact->fetch_array();
                    $facturaSQL = "INSERT INTO factura(monto,n_factura,fecha,n_recibo)value('".$factRes["monto"]."','".$factRes["n_factura"]."','".$factRes["fecha"]."','".$factRes["n_recibo"]."')";
                    $link->query($facturaSQL);
                    $idFactura = $link->insert_id;
                echo'
                <input type="hidden" value="'.$factRes["monto"].'" id="montoFact"/>
                <input type="hidden" value="'.$factRes["fecha"].'" id="fechFact"/>
                <input type="hidden" value="'.$idInmueble.'" id="idInmueble"/>
                <input type="hidden" value="'.$idPropie.'" id="idProp"/>
                <input type="hidden" value="'.$factRes["n_factura"].'" id="numFact"/>
                <input type="hidden" value="Nuevo Ingreso" id="operacion"/>
                <input type="hidden" value="'.$nuExpedient.'" id="nuExp"/>
                ';
                //ELIMINAR SQL DE TEMP
                    //PROPIETARIO
                        $eliPropSQL ="DELETE FROM temp_propietarios where id=".$tempUserRes["temp_propietarios"]."";
                        $link->query($eliPropSQL);
                    //CARACTERISTICAS DEL INMUEBLE
                        $elimCaracInmueSQL = "DELETE FROM temp_carainmue where id=".$tempUserRes["temp_carainmue"]."";
                        $link->query($elimCaracInmueSQL);
                    //PUERTAS
                        $elimPuertasSQL = "DELETE FROM temp_puertas where id=".$tempUserRes["temp_puertas"]."";
                        $link->query($elimPuertasSQL);
                    //ESTADO CONSERVACION
                        $elimConservSQL = "DELETE FROM temp_estado_conservacion where id=".$tempUserRes["temp_estado_conservacion"]."";
                        $link->query($elimConservSQL);
                    //PIEZAS SANITARIAS
                        $elimPiezSan = "DELETE FROM temp_piezas_sanitarias where id=".$tempUserRes["temp_piezas_sanitarias"]."";
                        $link->query($elimPiezSan);
                    //COMPLEMENTOS
                        $elimComple = "DELETE FROM temp_complementos where id=".$tempUserRes["temp_complementos"]."";
                        $link->query($elimComple);
                    //AMBIENTES 
                        $elimAmbientSQL = "DELETE FROM temp_ambientes where id=".$tempUserRes["temp_ambientes"]."";
                        $link->query($elimAmbientSQL);
                    //CARACTERISTICAS DE LA CONSTRUCCION
                        $elimCaracConstSQL = "DELETE FROM temp_caraconst where id=".$tempUserRes["temp_caraconst"]."";
                        $link->query($elimCaracConstSQL);
                    //PROTOCOLIZACION DEL INMUEBLE
                        $elimProtInmueSQL = "DELETE FROM temp_datos_protocolizacion where id=".$tempUserRes["temp_datos_protocolizacion"]."";
                        $link->query($elimProtInmueSQL);
                    //SERVICIOS
                        $elimServSQL = "DELETE FROM temp_servicios_inmue where id=".$tempUserRes["temp_servicios_inmue"]." ";
                        $link->query($elimServSQL);
                    //LINDEROS SEGUN DOC
                        $elimLindDocSQL = "DELETE FROM temp_linderos_documento where id=".$tempUserRes["temp_linderos_documento"]."";
                        $link->query($elimLindDocSQL);
                    //LINDEROS SEGUN INSPECCION
                        $elimLindInspSQL = "DELETE FROM temp_linderos_general where id=".$tempUserRes["temp_linderos_general"]."";
                        $link->query($elimLindInspSQL);
                    //INMUEBLE
                        $elimInmueSQL ="DELETE FROM temp_inmueble where id=".$tempUserRes["temp_inmueble"]."";
                        $link->query($elimInmueSQL);
                    //EXPEDIENTE
                        $elimExpSQL = "DELETE FROM temp_expediente where id=".$tempUserRes["temp_expediente"]."";
                        $link->query($elimExpSQL);
                    //FACTURA
                        $elimFactSQL = "DELETE FROM temp_factura where id=".$tempUserRes["temp_factura"]."";
                        $link->query($elimFactSQL);
                    //USER
                        $elimUserSQL = "DELETE FROM user_temp where userId=".$userRes["id"]."";
                        $link->query($elimUserSQL);
            }
        }else{
            echo'<input type="hidden" value="false" id="verInmV">';
            //BUSQUEDA PROPIETARIO
                $SQLProp = "SELECT * FROM propietarios where cedula='".$propieRes["cedula"]."'";
                $resPropSQL = $link->query($SQLProp);
                $propSQLRes = $resPropSQL->fetch_array();
                if($propSQLRes["cedula"]==$propieRes["cedula"]){
                    $uptPropSQl = "UPDATE propietarios SET cedula='".$propieRes["cedula"]."', rif='".$propieRes["rif"]."', nombre='".$propieRes["nombre"]."', apellido='".$propieRes["apellido"]."',telef='".$propieRes["telef"]."',dir_hab='".$propieRes["dir_hab"]."', telef_hab='".$propieRes["telef_hab"]."' where cedula='".$propieRes["cedula"]."'";
                    $resUptProp = $link->query($uptPropSQl);
                    $idPropie = $propSQLRes["id"];
                }else{
                    $propietarioSQL ="INSERT INTO propietarios(cedula,rif,nombre,apellido,telef,dir_hab,telef_hab)value('".$propieRes['cedula']."','".$propieRes['rif']."','".$propieRes['nombre']."','".$propieRes['apellido']."','".$propieRes['telef']."','".$propieRes['dir_hab']."','".$propieRes['telef_hab']."') ";
                    $link->query($propietarioSQL);
                    $idPropie = $link->insert_id;
                }
            //CARACTERISTICAS DEL INMUEBLE
                $caracInmueSQL = "SELECT * FROM temp_carainmue where id=".$tempUserRes["temp_carainmue"]." ";
                $resCaracInmue = $link->query($caracInmueSQL);
                $caracInmueRes = $resCaracInmue->fetch_array();
                $caraInmueSQL = "INSERT INTO carc_inmueble(topografia,forma,uso,tenencia)value('".$caracInmueRes["topografia"]."','".$caracInmueRes["forma"]."','".$caracInmueRes["uso"]."','".$caracInmueRes["tenencia"]."')";
                $link->query($caraInmueSQL);
                $idcaraInmue2 = $link->insert_id;
            //PUERTAS
                $puertSQL = "SELECT * FROM temp_puertas where id=".$tempUserRes["temp_puertas"]."";
                $resPuert = $link->query($puertSQL);
                $puertRes = $resPuert->fetch_array();
                $puertasSQL = "INSERT INTO puertas(entamborada_fina,ent_econo,madera_cepi,hierro)value('".$puertRes['entamborada_fina']."','".$puertRes['ent_econo']."','".$puertRes['madera_cepi']."','".$puertRes['hierro']."')";
                $link->query($puertasSQL);
                $idPuertas = $link->insert_id;
            //ESTADO DE CONSERVACION
                $estaConserSQL = "SELECT * FROM temp_estado_conservacion where id=".$tempUserRes["temp_estado_conservacion"]."";
                $resEstaConser = $link->query($estaConserSQL);
                $estaConserRes = $resEstaConser->fetch_array();
                $conservSQL = "INSERT INTO estado_conservacion(ano_construccion,ano_refaccion,edad_efectiva,nro_planta,nro_vivienda)value('".$estaConserRes["ano_construccion"]."','".$estaConserRes["ano_refaccion"]."','".$estaConserRes["edad_efectiva"]."','".$estaConserRes["nro_planta"]."','".$estaConserRes["nro_vivienda"]."')";
                $link->query($conservSQL);
                $idConserv = $link->insert_id;
            //PIEZAS SANITARIAS
                $piezSantSQL = "SELECT * FROM temp_piezas_sanitarias where id=".$tempUserRes["temp_piezas_sanitarias"]."";
                $resPiezSant = $link->query($piezSantSQL);
                $piezSantRes = $resPiezSant->fetch_array();
                $piezSQL = "INSERT INTO piezas_sanitarias(porcelana_fina,porcelana_econ,banera,calentador,wc,bidet,lavamanos,ducha,urinario)value('".$piezSantRes["porcelana_fina"]."','".$piezSantRes["porcelana_econ"]."','".$piezSantRes["banera"]."','".$piezSantRes["calentador"]."','".$piezSantRes["wc"]."','".$piezSantRes["bidet"]."','".$piezSantRes["lavamanos"]."','".$piezSantRes["ducha"]."','".$piezSantRes["urinario"]."')";
                $link->query($piezSQL);
                $idPiezSant = $link->insert_id;
            //COMPLEMENTOS
                $compleSQL ="SELECT * FROM temp_complementos where id=".$tempUserRes["temp_complementos"]."";
                $resComple = $link->query($compleSQL);
                $compleRes = $resComple->fetch_array();
                $complementSQL ="INSERT INTO complementos(ascensor,aire_acond,rejas,closets,porcelana)value('".$compleRes["ascensor"]."','".$compleRes["aire_acond"]."','".$compleRes["rejas"]."','".$compleRes["closets"]."','".$compleRes["porcelana"]."')";
                $link->query($complementSQL);
                $idComplement = $link->insert_id;
            //AMBIENTES
                $ambienSQL = "SELECT * FROM temp_ambientes where id=".$tempUserRes["temp_ambientes"]."";
                $resAmbiente = $link->query($ambienSQL);
                $ambientesRes = $resAmbiente->fetch_array();
                $ambientSQL = "INSERT INTO ambientes(dormitorio,comedor,sala,banos,cocina,servicio,oficina,garaje,estacionamiento)value('".$ambientesRes["dormitorio"]."','".$ambientesRes["comedor"]."','".$ambientesRes["sala"]."','".$ambientesRes["banos"]."','".$ambientesRes["cocina"]."','".$ambientesRes["servicio"]."','".$ambientesRes["oficina"]."','".$ambientesRes["garaje"]."','".$ambientesRes["estacionamiento"]."')";
                $link->query($ambientSQL);
                $idAmbientes = $link->insert_id;
            //CARACTERISTICAS DE LA CONSTRUCCION
                $caracConstSQL = "SELECT * FROM temp_caraconst where id=".$tempUserRes["temp_caraconst"]."";
                $resCaraConst = $link->query($caracConstSQL);
                $caraConstRes = $resCaraConst->fetch_array();
                $SQLcaraConst = "INSERT INTO caracteristicas_construccion(destino,estructura,paredes_tipo,paredes_acabado,pintura,techo,pisos,ventanas,insta_electricas,observ,Regimen,fk_puertas,fk_estadoConserv,fk_piezasSanitarias,fk_complementos,fk_ambientes,fk_estadoCons)value('".$caraConstRes["destino"]."','".$caraConstRes["estructura"]."','".$caraConstRes["paredes_tipo"]."','".$caraConstRes["paredes_acabado"]."','".$caraConstRes["pintura"]."','".$caraConstRes["techo"]."','".$caraConstRes["pisos"]."','".$caraConstRes["ventanas"]."','".$caraConstRes["insta_electricas"]."','".$caraConstRes["observ"]."','".$caraConstRes["Regimen"]."',".$idPuertas.",".$idConserv.",".$idPiezSant.",".$idComplement.",".$idComplement.",".$idAmbientes.")";
                $link->query($SQLcaraConst);
                $idCaraConst = $link->insert_id;
            //PROTOCOLIZACION DEL INMUEBLE
                $protoSQL = "SELECT * FROM temp_datos_protocolizacion where id=".$tempUserRes["temp_datos_protocolizacion"]."";
                $resProto = $link->query($protoSQL);
                $protoRes = $resProto->fetch_array();
                $protSQL = "INSERT INTO datos_protocolizacion(documento,direccion,numero,tomo,folio,protocolo,trimestre,fecha,valor_inmueble)value('".$protoRes["documento"]."','".$protoRes["direccion"]."','".$protoRes["numero"]."','".$protoRes["tomo"]."','".$protoRes["folio"]."','".$protoRes["protocolo"]."','".$protoRes["trimestre"]."','".$protoRes["fecha"]."','".$protoRes["valor_inmueble"]."')";
                $link->query($protSQL);
                $idProt = $link->insert_id;
            //SERVICIOS
                $serviciosSQL ="SELECT * FROM temp_servicios_inmue where id=".$tempUserRes["temp_servicios_inmue"]."";
                $resServicios = $link->query($serviciosSQL);
                $serviciosRes = $resServicios->fetch_array();
                $servSQL = "INSERT INTO servicios_inmue(acued,acuedRural,aguasSubter,aguasServ,pavimentoFlex,pavimentoRig,viaEngran,acera,alumbradoPub,aseo,transportePublic,pozoSept,electriResi,electriIndus,lineaTelef)VALUE('".$serviciosRes["acued"]."','".$serviciosRes["acuedRural"]."','".$serviciosRes["aguasSubter"]."','".$serviciosRes["aguasServ"]."','".$serviciosRes["pavimentoFlex"]."','".$serviciosRes["pavimentoRig"]."','".$serviciosRes["viaEngran"]."','".$serviciosRes["acera"]."','".$serviciosRes["alumbradoPub"]."','".$serviciosRes["aseo"]."','".$serviciosRes["transportePublic"]."','".$serviciosRes["pozoSept"]."','".$serviciosRes["electriResi"]."','".$serviciosRes["electriIndus"]."','".$serviciosRes["lineaTelef"]."')";
                $link->query($servSQL);
                $idServ = $link->insert_id;
            //LINDEROS SEGUN DOC
                $lindDocSQL = "SELECT * FROM temp_linderos_documento where id=".$tempUserRes["temp_linderos_documento"]."";
                $resLindDoc = $link->query($lindDocSQL);
                $lindDocRes = $resLindDoc->fetch_array();
                $lindDocumSQL = "INSERT INTO linderos_documento(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$lindDocRes["norte"]."','".$lindDocRes["noreste"]."','".$lindDocRes["sur"]."','".$lindDocRes["sureste"]."','".$lindDocRes["este"]."','".$lindDocRes["suroeste"]."','".$lindDocRes["oeste"]."','".$lindDocRes["noroeste"]."','".$lindDocRes["alind_n"]."','".$lindDocRes["alind_s"]."','".$lindDocRes["alind_e"]."','".$lindDocRes["alind_o"]."','".$lindDocRes["areaTotal"]."','".$lindDocRes["uniAreaT"]."','".$lindDocRes["nivelesConst"]."','".$lindDocRes["uniAreaC"]."','".$lindDocRes["areaConst"]."','".$lindDocRes["uniNorte"]."','".$lindDocRes["uniSur"]."','".$lindDocRes["uniEste"]."','".$lindDocRes["uniOeste"]."')";
                $link->query($lindDocumSQL);
                $idLinDocum = $link->insert_id;
            //INMUEBLE 
                $inmuebleSQL = "INSERT INTO inmueble(direccion,parroquia,sector,ambito,fk_carac_construccion,fk_protocolizacion,fk_carac_inmuebles,fk_lind_documento,fk_servicios)value('".$inmueRes["direccion"]."','".$inmueRes["parroquia"]."','".$inmueRes["sector"]."','".$inmueRes["ambito"]."',".$idCaraConst.",".$idProt.",".$idcaraInmue2.",".$idLinDocum.",".$idServ.")";
                $link->query($inmuebleSQL);
                $idInmueble = $link->insert_id;
            //EXPEDIENTE
                $expSQL = "SELECT * FROM temp_expediente where id=".$tempUserRes["temp_expediente"]."";
                $resExpe = $link->query($expSQL);
                $expeRes = $resExpe->fetch_array();
                $expedientSQL = "INSERT INTO expempadro(fk_inmueble,fk_propietario,fk_usuario,n_expediente,fecha,condicion,valorInmue)value(".$idInmueble.",".$idPropie.",".$userRes["id"].",'".$expeRes["no_expediente"]."','".$expeRes["fecha"]."','".$expeRes["condicion"]."','".$expeRes["valorInmue"]."')";
                $link->query($expedientSQL);
                $nuExpedient = $link->insert_id;
            //FACTURA
                $factSQL = "SELECT * FROM temp_factura where id=".$tempUserRes["temp_factura"]."";
                $resFact = $link->query($factSQL);
                $factRes = $resFact->fetch_array();
                $facturaSQL = "INSERT INTO factura(monto,n_factura,fecha,n_recibo)value('".$factRes["monto"]."','".$factRes["n_factura"]."','".$factRes["fecha"]."','".$factRes["n_recibo"]."')";
                $link->query($facturaSQL);
                $idFactura = $link->insert_id;
            echo'
            <input type="hidden" value="'.$factRes["monto"].'" id="montoFact"/>
            <input type="hidden" value="'.$factRes["fecha"].'" id="fechFact"/>
            <input type="hidden" value="'.$idInmueble.'" id="idInmueble"/>
            <input type="hidden" value="'.$idPropie.'" id="idProp"/>
            <input type="hidden" value="'.$factRes["n_factura"].'" id="numFact"/>
            <input type="hidden" value="Nuevo Ingreso" id="operacion"/>
            <input type="hidden" value="'.$nuExpedient.'" id="nuExp"/>
            ';
            //ELIMINAR SQL DE TEMP
                //PROPIETARIO
                    $eliPropSQL ="DELETE FROM temp_propietarios where id=".$tempUserRes["temp_propietarios"]."";
                    $link->query($eliPropSQL);
                //CARACTERISTICAS DEL INMUEBLE
                    $elimCaracInmueSQL = "DELETE FROM temp_carainmue where id=".$tempUserRes["temp_carainmue"]."";
                    $link->query($elimCaracInmueSQL);
                //PUERTAS
                    $elimPuertasSQL = "DELETE FROM temp_puertas where id=".$tempUserRes["temp_puertas"]."";
                    $link->query($elimPuertasSQL);
                //ESTADO CONSERVACION
                    $elimConservSQL = "DELETE FROM temp_estado_conservacion where id=".$tempUserRes["temp_estado_conservacion"]."";
                    $link->query($elimConservSQL);
                //PIEZAS SANITARIAS
                    $elimPiezSan = "DELETE FROM temp_piezas_sanitarias where id=".$tempUserRes["temp_piezas_sanitarias"]."";
                    $link->query($elimPiezSan);
                //COMPLEMENTOS
                    $elimComple = "DELETE FROM temp_complementos where id=".$tempUserRes["temp_complementos"]."";
                    $link->query($elimComple);
                //AMBIENTES 
                    $elimAmbientSQL = "DELETE FROM temp_ambientes where id=".$tempUserRes["temp_ambientes"]."";
                    $link->query($elimAmbientSQL);
                //CARACTERISTICAS DE LA CONSTRUCCION
                    $elimCaracConstSQL = "DELETE FROM temp_caraconst where id=".$tempUserRes["temp_caraconst"]."";
                    $link->query($elimCaracConstSQL);
                //PROTOCOLIZACION DEL INMUEBLE
                    $elimProtInmueSQL = "DELETE FROM temp_datos_protocolizacion where id=".$tempUserRes["temp_datos_protocolizacion"]."";
                    $link->query($elimProtInmueSQL);
                //SERVICIOS
                    $elimServSQL = "DELETE FROM temp_servicios_inmue where id=".$tempUserRes["temp_servicios_inmue"]." ";
                    $link->query($elimServSQL);
                //LINDEROS SEGUN DOC
                    $elimLindDocSQL = "DELETE FROM temp_linderos_documento where id=".$tempUserRes["temp_linderos_documento"]."";
                    $link->query($elimLindDocSQL);
                //LINDEROS SEGUN INSPECCION
                    $elimLindInspSQL = "DELETE FROM temp_linderos_general where id=".$tempUserRes["temp_linderos_general"]."";
                    $link->query($elimLindInspSQL);
                //INMUEBLE
                    $elimInmueSQL ="DELETE FROM temp_inmueble where id=".$tempUserRes["temp_inmueble"]."";
                    $link->query($elimInmueSQL);
                //EXPEDIENTE
                    $elimExpSQL = "DELETE FROM temp_expediente where id=".$tempUserRes["temp_expediente"]."";
                    $link->query($elimExpSQL);
                //FACTURA
                    $elimFactSQL = "DELETE FROM temp_factura where id=".$tempUserRes["temp_factura"]."";
                    $link->query($elimFactSQL);
                //USER
                    $elimUserSQL = "DELETE FROM user_temp where userId=".$userRes["id"]."";
                    $link->query($elimUserSQL);
        }
    }
    function guardarRepEmpa(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //USUARIO
            $userSQL = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUser = $link->query($userSQL);
            $userRes = $resUser->fetch_array();
        //USUARIOS TEMPORALES
            $tempUserSQL ="SELECT * FROM user_temp where userId=".$userRes["id"]."";
            $resTempUser = $link->query($tempUserSQL);
            $tempUserRes = $resTempUser->fetch_array();
        //PROPIETARIOS TEMP
            $propSQL ="SELECT * FROM temp_propietarios where id=".$tempUserRes["temp_propietarios"]."";
            $resProp = $link->query($propSQL);
            $propieRes = $resProp->fetch_array();
            
        //PROPIETARIOS
            $propSqlDe= "SELECT * FROM propietarios where cedula='".$propieRes["cedula"]."'";
            $resPropDe = $link->query($propSqlDe);
            $propDeRes = $resPropDe->fetch_array();
        //INMUEBLE TEMP
            $inmueSQL ="SELECT * FROM temp_inmueble where id=".$tempUserRes["temp_inmueble"]."";
            $resInmue = $link->query($inmueSQL);
            $inmueRes = $resInmue->fetch_array();
        //INMUEBLE
            $inmueDeSQL ="SELECT * FROM inmueble where direccion='".$inmueRes["direccion"]."'";
            $resDeInmue = $link->query($inmueDeSQL);
            $inmueDeRes = $resDeInmue->fetch_array();
        //BUSQUEDA PROPIETARIO
            if($propDeRes["cedula"]==$propieRes["cedula"]){
                $uptPropSQl = "UPDATE propietarios SET cedula='".$propieRes["cedula"]."', rif='".$propieRes["rif"]."', nombre='".$propieRes["nombre"]."', apellido='".$propieRes["apellido"]."',telef='".$propieRes["telef"]."',dir_hab='".$propieRes["dir_hab"]."', telef_hab='".$propieRes["telef_hab"]."' where cedula='".$propieRes["cedula"]."'";
                $resUptProp = $link->query($uptPropSQl);
                $idPropie = $propDeRes["id"];
            }else{
                $propietarioSQL ="INSERT INTO propietarios(cedula,rif,nombre,apellido,telef,dir_hab,telef_hab)value('".$propieRes['cedula']."','".$propieRes['rif']."','".$propieRes['nombre']."','".$propieRes['apellido']."','".$propieRes['telef']."','".$propieRes['dir_hab']."','".$propieRes['telef_hab']."') ";
                $link->query($propietarioSQL);
                $idPropie = $link->insert_id;
            }
        //CARACTERISTICAS DEL INMUEBLE
            $caracInmueSQL = "SELECT * FROM temp_carainmue where id=".$tempUserRes["temp_carainmue"]." ";
            $resCaracInmue = $link->query($caracInmueSQL);
            $caracInmueRes = $resCaracInmue->fetch_array();
            $caraInmueSQL = "INSERT INTO carc_inmueble(topografia,forma,uso,tenencia)value('".$caracInmueRes["topografia"]."','".$caracInmueRes["forma"]."','".$caracInmueRes["uso"]."','".$caracInmueRes["tenencia"]."')";
            $link->query($caraInmueSQL);
            $idcaraInmue2 = $link->insert_id;
        //PUERTAS
            $puertSQL = "SELECT * FROM temp_puertas where id=".$tempUserRes["temp_puertas"]."";
            $resPuert = $link->query($puertSQL);
            $puertRes = $resPuert->fetch_array();
            $puertasSQL = "INSERT INTO puertas(entamborada_fina,ent_econo,madera_cepi,hierro)value('".$puertRes['entamborada_fina']."','".$puertRes['ent_econo']."','".$puertRes['madera_cepi']."','".$puertRes['hierro']."')";
            $link->query($puertasSQL);
            $idPuertas = $link->insert_id;
        //ESTADO DE CONSERVACION
            $estaConserSQL = "SELECT * FROM temp_estado_conservacion where id=".$tempUserRes["temp_estado_conservacion"]."";
            $resEstaConser = $link->query($estaConserSQL);
            $estaConserRes = $resEstaConser->fetch_array();
            $conservSQL = "INSERT INTO estado_conservacion(ano_construccion,ano_refaccion,edad_efectiva,nro_planta,nro_vivienda)value('".$estaConserRes["ano_construccion"]."','".$estaConserRes["ano_refaccion"]."','".$estaConserRes["edad_efectiva"]."','".$estaConserRes["nro_planta"]."','".$estaConserRes["nro_vivienda"]."')";
            $link->query($conservSQL);
            $idConserv = $link->insert_id;
        //PIEZAS SANITARIAS
            $piezSantSQL = "SELECT * FROM temp_piezas_sanitarias where id=".$tempUserRes["temp_piezas_sanitarias"]."";
            $resPiezSant = $link->query($piezSantSQL);
            $piezSantRes = $resPiezSant->fetch_array();
            $piezSQL = "INSERT INTO piezas_sanitarias(porcelana_fina,porcelana_econ,banera,calentador,wc,bidet,lavamanos,ducha,urinario)value('".$piezSantRes["porcelana_fina"]."','".$piezSantRes["porcelana_econ"]."','".$piezSantRes["banera"]."','".$piezSantRes["calentador"]."','".$piezSantRes["wc"]."','".$piezSantRes["bidet"]."','".$piezSantRes["lavamanos"]."','".$piezSantRes["ducha"]."','".$piezSantRes["urinario"]."')";
            $link->query($piezSQL);
            $idPiezSant = $link->insert_id;
        //COMPLEMENTOS
            $compleSQL ="SELECT * FROM temp_complementos where id=".$tempUserRes["temp_complementos"]."";
            $resComple = $link->query($compleSQL);
            $compleRes = $resComple->fetch_array();
            $complementSQL ="INSERT INTO complementos(ascensor,aire_acond,rejas,closets,porcelana)value('".$compleRes["ascensor"]."','".$compleRes["aire_acond"]."','".$compleRes["rejas"]."','".$compleRes["closets"]."','".$compleRes["porcelana"]."')";
            $link->query($complementSQL);
            $idComplement = $link->insert_id;
        //AMBIENTES
            $ambienSQL = "SELECT * FROM temp_ambientes where id=".$tempUserRes["temp_ambientes"]."";
            $resAmbiente = $link->query($ambienSQL);
            $ambientesRes = $resAmbiente->fetch_array();
            $ambientSQL = "INSERT INTO ambientes(dormitorio,comedor,sala,banos,cocina,servicio,oficina,garaje,estacionamiento)value('".$ambientesRes["dormitorio"]."','".$ambientesRes["comedor"]."','".$ambientesRes["sala"]."','".$ambientesRes["banos"]."','".$ambientesRes["cocina"]."','".$ambientesRes["servicio"]."','".$ambientesRes["oficina"]."','".$ambientesRes["garaje"]."','".$ambientesRes["estacionamiento"]."')";
            $link->query($ambientSQL);
            $idAmbientes = $link->insert_id;
        //CARACTERISTICAS DE LA CONSTRUCCION
            $caracConstSQL = "SELECT * FROM temp_caraconst where id=".$tempUserRes["temp_caraconst"]."";
            $resCaraConst = $link->query($caracConstSQL);
            $caraConstRes = $resCaraConst->fetch_array();
            $SQLcaraConst = "INSERT INTO caracteristicas_construccion(destino,estructura,paredes_tipo,paredes_acabado,pintura,techo,pisos,ventanas,insta_electricas,observ,Regimen,fk_puertas,fk_estadoConserv,fk_piezasSanitarias,fk_complementos,fk_ambientes,fk_estadoCons)value('".$caraConstRes["destino"]."','".$caraConstRes["estructura"]."','".$caraConstRes["paredes_tipo"]."','".$caraConstRes["paredes_acabado"]."','".$caraConstRes["pintura"]."','".$caraConstRes["techo"]."','".$caraConstRes["pisos"]."','".$caraConstRes["ventanas"]."','".$caraConstRes["insta_electricas"]."','".$caraConstRes["observ"]."','".$caraConstRes["Regimen"]."',".$idPuertas.",".$idConserv.",".$idPiezSant.",".$idComplement.",".$idComplement.",".$idAmbientes.")";
            $link->query($SQLcaraConst);
            $idCaraConst = $link->insert_id;
        //PROTOCOLIZACION DEL INMUEBLE
            $protoSQL = "SELECT * FROM temp_datos_protocolizacion where id=".$tempUserRes["temp_datos_protocolizacion"]."";
            $resProto = $link->query($protoSQL);
            $protoRes = $resProto->fetch_array();
            $protSQL = "INSERT INTO datos_protocolizacion(documento,direccion,numero,tomo,folio,protocolo,trimestre,fecha,valor_inmueble)value('".$protoRes["documento"]."','".$protoRes["direccion"]."','".$protoRes["numero"]."','".$protoRes["tomo"]."','".$protoRes["folio"]."','".$protoRes["protocolo"]."','".$protoRes["trimestre"]."','".$protoRes["fecha"]."','".$protoRes["valor_inmueble"]."')";
            $link->query($protSQL);
            $idProt = $link->insert_id;
        //SERVICIOS
            $serviciosSQL ="SELECT * FROM temp_servicios_inmue where id=".$tempUserRes["temp_servicios_inmue"]."";
            $resServicios = $link->query($serviciosSQL);
            $serviciosRes = $resServicios->fetch_array();
            $servSQL = "INSERT INTO servicios_inmue(acued,acuedRural,aguasSubter,aguasServ,pavimentoFlex,pavimentoRig,viaEngran,acera,alumbradoPub,aseo,transportePublic,pozoSept,electriResi,electriIndus,lineaTelef)VALUE('".$serviciosRes["acued"]."','".$serviciosRes["acuedRural"]."','".$serviciosRes["aguasSubter"]."','".$serviciosRes["aguasServ"]."','".$serviciosRes["pavimentoFlex"]."','".$serviciosRes["pavimentoRig"]."','".$serviciosRes["viaEngran"]."','".$serviciosRes["acera"]."','".$serviciosRes["alumbradoPub"]."','".$serviciosRes["aseo"]."','".$serviciosRes["transportePublic"]."','".$serviciosRes["pozoSept"]."','".$serviciosRes["electriResi"]."','".$serviciosRes["electriIndus"]."','".$serviciosRes["lineaTelef"]."')";
            $link->query($servSQL);
            $idServ = $link->insert_id;
        //LINDEROS SEGUN DOC
            $lindDocSQL = "SELECT * FROM temp_linderos_documento where id=".$tempUserRes["temp_linderos_documento"]."";
            $resLindDoc = $link->query($lindDocSQL);
            $lindDocRes = $resLindDoc->fetch_array();
            $lindDocumSQL = "INSERT INTO linderos_documento(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$lindDocRes["norte"]."','".$lindDocRes["noreste"]."','".$lindDocRes["sur"]."','".$lindDocRes["sureste"]."','".$lindDocRes["este"]."','".$lindDocRes["suroeste"]."','".$lindDocRes["oeste"]."','".$lindDocRes["noroeste"]."','".$lindDocRes["alind_n"]."','".$lindDocRes["alind_s"]."','".$lindDocRes["alind_e"]."','".$lindDocRes["alind_o"]."','".$lindDocRes["areaTotal"]."','".$lindDocRes["uniAreaT"]."','".$lindDocRes["nivelesConst"]."','".$lindDocRes["uniAreaC"]."','".$lindDocRes["areaConst"]."','".$lindDocRes["uniNorte"]."','".$lindDocRes["uniSur"]."','".$lindDocRes["uniEste"]."','".$lindDocRes["uniOeste"]."')";
            $link->query($lindDocumSQL);
            $idLinDocum = $link->insert_id;
        //INMUEBLE 
            $inmuebleSQL = "INSERT INTO inmueble(direccion,parroquia,sector,ambito,fk_carac_construccion,fk_protocolizacion,fk_carac_inmuebles,fk_lind_documento,fk_servicios)value('".$inmueRes["direccion"]."','".$inmueRes["parroquia"]."','".$inmueRes["sector"]."','".$inmueRes["ambito"]."',".$idCaraConst.",".$idProt.",".$idcaraInmue2.",".$idLinDocum.",".$idServ.")";
            $link->query($inmuebleSQL);
            $idInmueble = $link->insert_id;
        //EXPEDIENTE
            $expSQL = "SELECT * FROM temp_expediente where id=".$tempUserRes["temp_expediente"]."";
            $resExpe = $link->query($expSQL);
            $expeRes = $resExpe->fetch_array();
            $expedientSQL = "INSERT INTO expempadro(fk_inmueble,fk_propietario,fk_usuario,n_expediente,fecha,condicion,valorInmue)value(".$idInmueble.",".$idPropie.",".$userRes["id"].",'".$expeRes["no_expediente"]."','".$expeRes["fecha"]."','".$expeRes["condicion"]."','".$expeRes["valorInmue"]."')";
            $link->query($expedientSQL);
            $nuExpedient = $link->insert_id;
        //FACTURA
            $factSQL = "SELECT * FROM temp_factura where id=".$tempUserRes["temp_factura"]."";
            $resFact = $link->query($factSQL);
            $factRes = $resFact->fetch_array();
            $facturaSQL = "INSERT INTO factura(monto,n_factura,fecha,n_recibo)value('".$factRes["monto"]."','".$factRes["n_factura"]."','".$factRes["fecha"]."','".$factRes["n_recibo"]."')";
            $link->query($facturaSQL);
            $idFactura = $link->insert_id;
        echo'
        <input type="hidden" value="'.$factRes["monto"].'" id="montoFact"/>
        <input type="hidden" value="'.$factRes["fecha"].'" id="fechFact"/>
        <input type="hidden" value="'.$idInmueble.'" id="idInmueble"/>
        <input type="hidden" value="'.$idPropie.'" id="idProp"/>
        <input type="hidden" value="'.$factRes["n_factura"].'" id="numFact"/>
        <input type="hidden" value="Nuevo Ingreso" id="operacion"/>
        <input type="hidden" value="'.$nuExpedient.'" id="nuExp"/>
        ';
        //ELIMINAR SQL DE TEMP
            //PROPIETARIO
                $eliPropSQL ="DELETE FROM temp_propietarios where id=".$tempUserRes["temp_propietarios"]."";
                $link->query($eliPropSQL);
            //CARACTERISTICAS DEL INMUEBLE
                $elimCaracInmueSQL = "DELETE FROM temp_carainmue where id=".$tempUserRes["temp_carainmue"]."";
                $link->query($elimCaracInmueSQL);
            //PUERTAS
                $elimPuertasSQL = "DELETE FROM temp_puertas where id=".$tempUserRes["temp_puertas"]."";
                $link->query($elimPuertasSQL);
            //ESTADO CONSERVACION
                $elimConservSQL = "DELETE FROM temp_estado_conservacion where id=".$tempUserRes["temp_estado_conservacion"]."";
                $link->query($elimConservSQL);
            //PIEZAS SANITARIAS
                $elimPiezSan = "DELETE FROM temp_piezas_sanitarias where id=".$tempUserRes["temp_piezas_sanitarias"]."";
                $link->query($elimPiezSan);
            //COMPLEMENTOS
                $elimComple = "DELETE FROM temp_complementos where id=".$tempUserRes["temp_complementos"]."";
                $link->query($elimComple);
            //AMBIENTES 
                $elimAmbientSQL = "DELETE FROM temp_ambientes where id=".$tempUserRes["temp_ambientes"]."";
                $link->query($elimAmbientSQL);
            //CARACTERISTICAS DE LA CONSTRUCCION
                $elimCaracConstSQL = "DELETE FROM temp_caraconst where id=".$tempUserRes["temp_caraconst"]."";
                $link->query($elimCaracConstSQL);
            //PROTOCOLIZACION DEL INMUEBLE
                $elimProtInmueSQL = "DELETE FROM temp_datos_protocolizacion where id=".$tempUserRes["temp_datos_protocolizacion"]."";
                $link->query($elimProtInmueSQL);
            //SERVICIOS
                $elimServSQL = "DELETE FROM temp_servicios_inmue where id=".$tempUserRes["temp_servicios_inmue"]." ";
                $link->query($elimServSQL);
            //LINDEROS SEGUN DOC
                $elimLindDocSQL = "DELETE FROM temp_linderos_documento where id=".$tempUserRes["temp_linderos_documento"]."";
                $link->query($elimLindDocSQL);
            //LINDEROS SEGUN INSPECCION
                $elimLindInspSQL = "DELETE FROM temp_linderos_general where id=".$tempUserRes["temp_linderos_general"]."";
                $link->query($elimLindInspSQL);
            //INMUEBLE
                $elimInmueSQL ="DELETE FROM temp_inmueble where id=".$tempUserRes["temp_inmueble"]."";
                $link->query($elimInmueSQL);
            //EXPEDIENTE
                $elimExpSQL = "DELETE FROM temp_expediente where id=".$tempUserRes["temp_expediente"]."";
                $link->query($elimExpSQL);
            //FACTURA
                $elimFactSQL = "DELETE FROM temp_factura where id=".$tempUserRes["temp_factura"]."";
                $link->query($elimFactSQL);
            //USER
                $elimUserSQL = "DELETE FROM user_temp where userId=".$userRes["id"]."";
                $link->query($elimUserSQL);
    }
    //ELIMINAR TEMPORALES
    function elimReg(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        session_start();
        //USUARIO
            $userSQL = "SELECT * FROM usuarios where nick='".$_SESSION["usuario"]."'";
            $resUser = $link->query($userSQL);
            $userRes = $resUser->fetch_array();
        //TEMPORALES USUARIO
            $temUsuSQL = "SELECT * FROM user_temp where userId=".$userRes["id"]."";
            $resUsertemp = $link->query($temUsuSQL);
            $userTempRes = $resUsertemp->fetch_array();
        //PROPIETARIO
                $eliPropSQL ="DELETE FROM temp_propietarios where id=".$userTempRes["temp_propietarios"]."";
                $link->query($eliPropSQL);
            //CARACTERISTICAS DEL INMUEBLE
                $elimCaracInmueSQL = "DELETE FROM temp_carainmue where id=".$userTempRes["temp_carainmue"]."";
                $link->query($elimCaracInmueSQL);
            //PUERTAS
                $elimPuertasSQL = "DELETE FROM temp_puertas where id=".$$userTempRes["temp_puertas"]."";
                $link->query($elimPuertasSQL);
            //ESTADO CONSERVACION
                $elimConservSQL = "DELETE FROM temp_estado_conservacion where id=".$userTempRes["temp_estado_conservacion"]."";
                $link->query($elimConservSQL);
            //PIEZAS SANITARIAS
                $elimPiezSan = "DELETE FROM temp_piezas_sanitarias where id=".$userTempRes["temp_piezas_sanitarias"]."";
                $link->query($elimPiezSan);
            //COMPLEMENTOS
                $elimComple = "DELETE FROM temp_complementos where id=".$userTempRes["temp_complementos"]."";
                $link->query($elimComple);
            //AMBIENTES $userTempRes["temp_ambientes"]
                $elimAmbientSQL = "DELETE FROM temp_ambientes where id=".$userTempRes["temp_ambientes"]."";
                $link->query($elimAmbientSQL);
            //CARACTERISTICAS DE LA CONSTRUCCION
                $elimCaracConstSQL = "DELETE FROM temp_caraconst where id=".$userTempRes["temp_caraconst"]."";
                $link->query($elimCaracConstSQL);
            //PROTOCOLIZACION DEL INMUEBLE
                $elimProtInmueSQL = "DELETE FROM temp_datos_protocolizacion where id=".$userTempRes["temp_datos_protocolizacion"]."";
                $link->query($elimProtInmueSQL);
            //SERVICIOS
                $elimServSQL = "DELETE FROM temp_servicios_inmue where id=".$userTempRes["temp_servicios_inmue"]." ";
                $link->query($elimServSQL);
            //LINDEROS SEGUN DOC
                $elimLindDocSQL = "DELETE FROM temp_linderos_documento where id=".$userTempRes["temp_linderos_documento"]."";
                $link->query($elimLindDocSQL);
            //LINDEROS SEGUN INSPECCION
                $elimLindInspSQL = "DELETE FROM temp_linderos_general where id=".$userTempRes["temp_linderos_general"]."";
                $link->query($elimLindInspSQL);
            //LINDEROS POSIBLE VENTA
                $elimLindPosSQL ="DELETE FROM temp_linderos_posible_venta where id=".$userTempRes["temp_linderos_posible_venta"]."";
                $link->query($elimLindPosSQL);
            //INMUEBLE
                $elimInmueSQL ="DELETE FROM temp_inmueble where id=".$userTempRes["temp_inmueble"]."";
                $link->query($elimInmueSQL);
            //EXPEDIENTE
                $elimExpSQL = "DELETE FROM temp_expediente where id=".$userTempRes["temp_expediente"]."";
                $link->query($elimExpSQL);
            //FACTURA
                $elimFactSQL = "DELETE FROM temp_factura where id=".$userTempRes["temp_factura"]."";
                $link->query($elimFactSQL);
            //USER
                $elimUserSQL = "DELETE FROM user_temp where userId=".$userRes["id"]."";
                $link->query($elimUserSQL);
    }
    function guardConst(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
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
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
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
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
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
            $constSql  ="SELECT * FROM constancias INNER JOIN expediente where fk_expedi=".$pagosRes["fk_expedient"]."";
            $resConst = $link->query($constSql);
            $constRes = $resConst->fetch_array();
            echo'
            <div class="campDat"><embed id="embedPdf" src="http://localhost/SisCast/assets/constancias/'.$anoPago[0].'/'.$constRes["n_expediente"].'.pdf" type="application/pdf"></div>
            ';
        }
        if($anoPago[0] < date("Y")){
            $this->formImpri();
            echo'<center><br/><b>EL NUMERO DE EXPEDIENTE QUE INGRESO NO HA PAGADO EL AÑO EN CURSO</b></center>';
        }
    }
    function busFactura(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        $veriFactSql = "SELECT * FROM factura where n_factura='".$this->numFact."'";
        $resVeriFact = $link->query($veriFactSql);
        $veriFactRes = $resVeriFact->fetch_array();

            echo'<input type="hidden" value="'.$veriFactRes["n_factura"].'" id="numFactura" />';
    }
}


?>