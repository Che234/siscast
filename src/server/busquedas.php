<?php
class busquedas{

    function construct(){
        $campBuscar = "";
        $tipoBuscar = "";
        $tipoCed = "";
        $expBuscar = "";
        $cedula = "";
        $rif = "";
        $nomProp = "";
        $apelProp = "";
        $telefono = "";
        $direcProp = "";
        $cedula2 = "";
        $telefono2 = "";
        $parrInmue = "";
        $secInmue = "";
        $direcInmue = "";
        $ambInmue = "";
        $idInmueble = "";
        $topoConst = "";
        $formaConst = "";
        $regInmue = "";
        $usoConst = "";
        $tenenConst = "";
        $idCarac = "";
        $destConst = "";
        $estConst = "";
        $pareTipoInmue = "";
        $pareAcaInmue = "";
        $pintConst = "";
        $estConserv = "";
        $techoConst ="";
        $pisosConst = "";
        $piezConst = "";
        $ventConst = "";
        $puertConst = "";
        $instElect = "";
        $ambConst = "";
        $compConst = "";
        $obsConst = "";
        $idCaracConst = "";
        $docDebConst = "";
        $direcProtConst = "";
        $numProtConst = "";
        $tomoProtConst = "";
        $folioProtConst = "";
        $protoConst = "";
        $trimProtConst = "";
        $dateProtConst = "";
        $valorProtConst = "";
        $idProto = "";
        $lindGen = "";
        $lindPosVenta = "";
        $lindDocumento = "";
        $idlindGen = "";
        $idlindPosVenta ="";
        $idlindDocumento = "";
        $n_gen = "";
        $s_gen = "";
        $e_gen = "";
        $o_gen = "";
        $alindN_gen = "";
        $alindS_gen = "";
        $alindE_gen = "";
        $alindO_gen = "";
        $area_gen = "";
        $niveles_gen = "";
        $areaConst_gen = "";
        $uniN_gen = "";
        $uniS_gen = "";
        $uniE_gen = "";
        $uniO_gen = "";
        $idGen = "";
        $nortGen = "";
        $uniNorte = "";
        $alindNort = "";
        $surGen = "";
        $uniSur = "";
        $alindSur = "";
        $esteGen = "";
        $uniEste = "";
        $alindEste = "";
        $oesteGen = "";
        $uniOeste = "";
        $alindOeste = "";
        $arTotal = "";
        $NivConstTotal = "";
        $arConstTotal = "";
        $nortPosVenta = "";
        $uniNorte2 = "";
        $alindPosNort = "";
        $surPosVenta = "";
        $uniSur2 = "";
        $alindPosSur = "";
        $estePosVenta = "";
        $uniEste2 = "";
        $alindPosEste = "";
        $oestePosVenta = "";
        $uniOeste2 = "";
        $alindPosOeste = "";
        $arTotal2 = "";
        $NivConstTotal2 = "";
        $arConstTotal2 = "";
        $nortSecDoc = "";
        $uniNorte3 = "";
        $alindSecNorte = "";
        $surSecDoc = "";
        $uniSur3 = "";
        $alindSecSur = "";
        $esteSecDoc = "";
        $uniEste3 = "";
        $alindSecEste = "";
        $oesteSecDoc = "";
        $uniOeste3 = "";
        $alindSecOeste = "";
        $arTotal3 = "";
        $NivConstTotal3 = "";
        $arConstTotal3 = "";
        $arTotalVenta = "";
        $arRestante = "";
        $valorTerreno = "";
        $valorInmueble = "";
        $valorConstruc = "";
        $idTerreno = "";
        $Acue = "";
        $AcueRural = "";
        $AguasSub = "";
        $AguasServ = "";
        $PavFlex = "";
        $PavRig = "";
        $viaEngran = "";
        $acera = "";
        $AlumPublico = "";
        $aseo ="";
        $transPublic = "";
        $pozoSept = "";
        $ElectResidencial = "";
        $ElectriIndust = "";
        $linTelf = "";
        $idServ = "";
        $expBuscar = "";
        $numFactHid = "";
        $fechFact = "";
        $puntNorte = "";
        $puntSur = "";
        $puntEste = "";
        $puntOeste = "";
        $uniAreaT = "";
        $uniAreaConst = "";
        $puntNorte2 = "";
        $puntSur2 = "";
        $puntEste2 = "";
        $puntOeste2 = "";
        $uniAreaT2 = "";
        $uniAreaConst2 = "";
        $puntNorte3 = "";
        $puntSur3 = "";
        $puntEste3 = "";
        $puntOeste3 = "";
        $uniAreaT3 = "";
        $uniAreaConst3 = "";
    }

    function mostBusqueda(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        
        if($this->tipoBuscar=="Expediente"){
            //BUSQUEDA EXPEDIENTE
                $expSql = "SELECT * FROM expediente where n_expediente=".$this->campBuscar."";
                $resBus=$link->query($expSql);
                $expRes = $resBus->fetch_assoc();
            if($expRes["id"]!=0){
                $numExp = $expRes["n_expediente"];
                $idProp = $expRes["fk_propietario"];
                $idInmue = $expRes["fk_inmueble"];
                
            }elseif($expRes["id"]==0){
                $expEmpaSql = "SELECT * FROM expempadro where n_expediente=".$this->campBuscar."";
                $resExpEmpa = $link->query($expEmpaSql);
                $expEmpaRes = $resExpEmpa->fetch_array();
                if($expEmpaRes["id"]!=0){
                    $numExp = $expEmpaRes["n_expediente"];
                    $idProp = $expEmpaRes["fk_propietario"];
                    $idInmue = $expEmpaRes["fk_inmueble"];
                }else{
                    echo'
                    <a href="http://localhost/SisCast/"><input type="button" value="Regresar" class="botones btn btn-primary"/></a>
                    <b>EXPEDIENTE NO EXISTE</b>';
                }
            }
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
                    $fechPagosDiv = explode("-",$pagoRes["fechaPagos"]);
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
                        if($fechPagosDiv[0] == date("Y")){
                            echo $pagoRes["fechaPagos"];
                        }else{
                            echo 'NO HA CANCELADO ESTE AÑO';
                        }
                         echo'</td>
                         <td>
                            '.$inmueResCarac["uso"].'
                         </td>
                         <td>';
                         if($fechPagosDiv[0] == date("Y") ){
                            echo'<input type"button" value="Ver pagos" onclick="btnPagos()" class="botones btn btn-primary" />';
                         }
                         if($fechPagosDiv[0] < date("Y")){
                            echo'<input type"button" value="Pagar" onclick="btnPagar()" class="botones btn btn-primary" />';
                         }
                            echo'
                            <input type"button" value="Modificar" class="botones btn btn-primary" onclick="mostTipModif()"/>';
                        $veriRenov = "SELECT * FROM constancias where fk_expedi=".$expRes["id"]." ORDER BY fecha DESC";
                        $resVeriRenov = $link->query($veriRenov);
                        $veriRenovRes = $resVeriRenov->fetch_array();
                        $fechaRenov = explode("-",$veriRenovRes["fecha"]);
                        if($fechaConst[0] == date("Y")){
                            if($veriConstRes["tipo_operacion"] == "Nueva Inscripción"){
                                echo'<input type"button" value="Renovación" class="botones btn btn-primary" onclick="btnRevConst()"/>';
                            }
                        }
                            echo' 
                            <input type"button" value="Eliminar" onclick="btnElimInmue()" class="botones btn btn-primary" />
                            <input type="hidden" value="'.$expRes["n_expediente"].'" id="expBuscar" />
                            <input type="hidden" value="'.$this->tipoBuscar.'" id="tipoBuscar" />
                         </td>
                     </tr>
                </table>
                <div id="MostResult"></div>';
        }
        if($this->tipoBuscar=="Cedula"){
            $cedulaFull = ''.$this->tipoCed.'-'.$this->campBuscar.'';
            //BUSQUEDA PROPIETARIO
                $propSql = "SELECT * FROM propietarios where cedula='".$cedulaFull."'";
                $resProp = $link->query($propSql);
                $propRes = $resProp->fetch_array();
            //BUSQUEDA EXPEDIENTE
                $expediSql = "SELECT * FROM expediente where fk_propietario=".$propRes["id"]." ORDER BY fecha ASC";
                $resBusExp= $link->query($expediSql);
                $expBusRes = $resBusExp->fetch_array();
                if($expBusRes["id"]==0){
                    $expEmpadroSql = "SELECT * FROM expempadro where fk_propietario=".$propRes["id"]." ORDER BY fecha ASC";
                    $resExpEmp = $link->query($expEmpadroSql);
                    $expEmpRes = $resExpEmp->fetch_array();
                    $idExp = $expEmpRes["id"];
                    $idPropie = $expEmpRes["fk_propietario"];
                    $idInmuebles = $expEmpRes["fk_inmueble"];
                }else{
                    $idExp = $expBusRes["id"];
                    $idPropie = $expBusRes["fk_propietario"];
                    $idInmuebles = $expBusRes["fk_inmueble"];
                }
            //CONTAR EXPEDIENTES
                $expedienteSql = "SELECT COUNT(*) FROM expediente where fk_propietario=".$idPropie."";
                $resExpediente= $link->query($expedienteSql);
                $expedienteRes = $resExpediente->fetch_assoc();
                $cantExpediente = $expedienteRes["COUNT(*)"];
                if($cantExpediente==0){
                    $expeEmpadroSql = "SELECT COUNT(*) FROM expempadro where fk_propietario=".$idPropie."";
                    $resExpEmpadro = $link->query($expeEmpadroSql);
                    $expEmpadroRes = $resExpEmpadro->fetch_array();
                    $cantExpediente = $expEmpadroRes["COUNT(*)"];
                }
            //BUSQUEDA INMUEBLE
                $inmueSql = "SELECT * FROM inmueble where id=".$idInmuebles."";
                $resInmue = $link->query($inmueSql);
                $inmueRes = $resInmue->fetch_array();
            //BUSQUEDA CARACTERISTICAS DEL INMUEBLE
                $caracInmueSql = "SELECT * FROM carc_inmueble where id=".$inmueRes["fk_carac_inmuebles"]."";
                $rescaracInmue = $link->query($caracInmueSql);
                $inmueResCarac = $rescaracInmue->fetch_array();
            //BUSQUEDA PAGOS
                $pagosSql = "SELECT * FROM pagos where fk_expedient=".$idExp."";
                $resPago = $link->query($pagosSql);
                $pagoRes = $resPago->fetch_array();
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
                            '.$propRes["nombre"].' '.$propRes["apellido"].'
                        </td>
                     </tr>
                     <tr>
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
                            <b>Dirección</b>
                         </td>
                         <td>
                            <b>Acción</b>
                         </td>
                    </tr>';
                    $SqlExpediente = "SELECT * FROM expediente where expediente.fk_propietario=".$idPropie." ORDER BY fecha ASC";
                    $resSqlExpe = $link->query($SqlExpediente);
                    
                   for($i=0; $i < $expedienteRes["COUNT(*)"]; $i++){

                    $sqlExpeRes = $resSqlExpe->fetch_array();
                    
                    $SqlFechaPago = "SELECT * FROM pagos where fk_expedient=".$sqlExpeRes["id"]." ";
                    $resSqlFechaPag = $link->query($SqlFechaPago);
                    $SqlFechaPagRes = $resSqlFechaPag->fetch_array();
                    $fechaPag= explode("-",$SqlFechaPagRes["fechaPagos"]);
                    
                    $sqlInmueBus = "SELECT * FROM inmueble where id=".$sqlExpeRes["fk_inmueble"]."";
                    $resInmueBus = $link->query($sqlInmueBus);
                    $inmueBusRes = $resInmueBus->fetch_array();
                    
                    $SqlCaracteInmue = "SELECT * FROM carc_inmueble where id=".$inmueBusRes["fk_carac_inmuebles"]."";
                    $resCaracteInmue = $link->query($SqlCaracteInmue);
                    $caracInmueRes = $resCaracteInmue->fetch_array();
                    echo'
                    <tr>
                         <td>
                            '.$sqlExpeRes[4].'
                         </td>
                         <td>';
                        if($fechaPag[0] == date("Y")){          
                            echo $SqlFechaPagRes["fechaPagos"];
                        }else{
                            echo 'No ha realizado pago';
                        }
                         echo'</td>
                         <td>
                            '.$caracInmueRes["uso"].'
                         </td>
                         <td>
                             '.$inmueBusRes["direccion"].'
                         </td>
                         <td>';
                           
                            if($SqlFechaPagRes["id"]!=0){
                                echo'<input type"button" value="Ver pagos" onclick="btnPagos()" class="botones btn btn-primary" />';
                            }
                            
                            if($fechaPag[0] < date("Y")){
                                echo '<input type"button" value="Pagar" onclick="btnPagar()" class="botones btn btn-primary" />';
                            }
                            echo '<input type"button" value="Modificar" class="botones btn btn-primary" onclick="mostTipModif()"/>';
                            $veriConstCed = "SELECT * FROM constancias where fk_expedi=".$sqlExpeRes["id"]." ORDER BY fecha DESC";
                            $resVeriConst = $link->query($veriConstCed);
                            $veriConstRes = $resVeriConst->fetch_array();
                            $fechaConst = explode("-",$veriConstRes["fecha"]);
                            if($fechaConst[0] < date("Y")){
                                    echo'<input type"button" value="Renovación" class="botones btn btn-primary" onclick="btnRevConst()"/>';
                            }
                            if($fechaConst[0] == date("Y")){
                                if($veriConstRes["tipo_operacion"] == "Nueva Inscripción"){
                                    echo'<input type"button" value="Renovación" class="botones btn btn-primary" onclick="btnRevConst()"/>';
                                }
                            }
                            echo' 
                            <input type"button" value="Eliminar" onclick="btnElimInmue()" class="botones btn btn-primary" />
                            <input type="hidden" value="'.$sqlExpeRes["n_expediente"].'" id="expBuscar" />
                            <input type="hidden" value="'.$this->tipoBuscar.'" id="tipoBuscar" />
                         </td>
                     </tr>';
                   }
                echo'   
                </table>
                <div id="MostResult"></div>';
        }
        if($this->tipoBuscar=="Rif"){
            $cedulaFull = ''.$this->tipoCed.'-'.$this->campBuscar.'';
            //BUSQUEDA PROPIETARIO
                $propSql = "SELECT * FROM propietarios where rif='".$cedulaFull."'";
                $resProp = $link->query($propSql);
                $propRes = $resProp->fetch_array();
            //BUSQUEDA EXPEDIENTE
                $expediSql = "SELECT * FROM expediente where fk_propietario=".$propRes["id"]." ORDER BY fecha ASC";
                $resBusExp= $link->query($expediSql);
                $expBusRes = $resBusExp->fetch_array();
                $idPropie = $expBusRes["fk_propietario"];
                $idInmuebles = $expBusRes["fk_inmueble"];
            //CONTAR EXPEDIENTES
                $expedienteSql = "SELECT COUNT(*) FROM expediente where fk_propietario=".$idPropie."";
                $resExpediente= $link->query($expedienteSql);
                $expedienteRes = $resExpediente->fetch_assoc();
            //BUSQUEDA INMUEBLE
                $inmueSql = "SELECT * FROM inmueble where id=".$idInmuebles."";
                $resInmue = $link->query($inmueSql);
                $inmueRes = $resInmue->fetch_array();
            //BUSQUEDA CARACTERISTICAS DEL INMUEBLE
                $caracInmueSql = "SELECT * FROM carc_inmueble where id=".$inmueRes["fk_carac_inmuebles"]."";
                $rescaracInmue = $link->query($caracInmueSql);
                $inmueResCarac = $rescaracInmue->fetch_array();
            //BUSQUEDA PAGOS
                $pagosSql = "SELECT * FROM pagos where fk_expedient=".$expBusRes["id"]."";
                $resPago = $link->query($pagosSql);
                $pagoRes = $resPago->fetch_array();
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
                            '.$propRes["nombre"].' '.$propRes["apellido"].'
                        </td>
                     </tr>
                     <tr>
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
                            <b>Dirección</b>
                         </td>
                         <td>
                            <b>Acción</b>
                         </td>
                    </tr>';
                    $SqlExpediente = "SELECT * FROM expediente where expediente.fk_propietario=".$idPropie." ORDER BY fecha ASC";
                    $resSqlExpe = $link->query($SqlExpediente);
                    
                   for($i=0; $i < $expedienteRes["COUNT(*)"]; $i++){

                    $sqlExpeRes = $resSqlExpe->fetch_array();
                    
                    $SqlFechaPago = "SELECT * FROM pagos where fk_expedient=".$sqlExpeRes["id"]." ";
                    $resSqlFechaPag = $link->query($SqlFechaPago);
                    $SqlFechaPagRes = $resSqlFechaPag->fetch_array();
                    $fechaPag= explode("-",$SqlFechaPagRes["fechaPagos"]);
                    
                    $sqlInmueBus = "SELECT * FROM inmueble where id=".$sqlExpeRes["fk_inmueble"]."";
                    $resInmueBus = $link->query($sqlInmueBus);
                    $inmueBusRes = $resInmueBus->fetch_array();
                    
                    $SqlCaracteInmue = "SELECT * FROM carc_inmueble where id=".$inmueBusRes["fk_carac_inmuebles"]."";
                    $resCaracteInmue = $link->query($SqlCaracteInmue);
                    $caracInmueRes = $resCaracteInmue->fetch_array();
                    echo'
                    <tr>
                         <td>
                            '.$sqlExpeRes[4].'
                         </td>
                         <td>';
                        if($fechaPag[0] == date("Y")){          
                            echo $SqlFechaPagRes["fechaPagos"];
                        }else{
                            echo 'No ha realizado pago';
                        }
                         echo'</td>
                         <td>
                            '.$caracInmueRes["uso"].'
                         </td>
                         <td>
                             '.$inmueBusRes["direccion"].'
                         </td>
                         <td>';
                           
                            if($SqlFechaPagRes["id"]!=0){
                                echo'<input type"button" value="Ver pagos" onclick="btnPagos()" class="botones btn btn-primary" />';
                            }
                            
                            if($fechaPag[0] < date("Y")){
                                echo '<input type"button" value="Pagar" onclick="btnPagar()" class="botones btn btn-primary" />';
                            }
                            echo '<input type"button" value="Modificar" class="botones btn btn-primary" onclick="mostTipModif()"/>';
                            $veriConstCed = "SELECT * FROM constancias where fk_expedi=".$sqlExpeRes["id"]." ORDER BY fecha DESC";
                            $resVeriConst = $link->query($veriConstCed);
                            $veriConstRes = $resVeriConst->fetch_array();
                            $fechaConst = explode("-",$veriConstRes["fecha"]);
                            if($fechaConst[0] < date("Y")){
                                    echo'<input type"button" value="Renovación" class="botones btn btn-primary" onclick="btnRevConst()"/>';
                            }
                            if($fechaConst[0] == date("Y")){
                                if($veriConstRes["tipo_operacion"] == "Nueva Inscripción"){
                                    echo'<input type"button" value="Renovación" class="botones btn btn-primary" onclick="btnRevConst()"/>';
                                }
                            }
                            echo' 
                            <input type"button" value="Eliminar" onclick="btnElimInmue()" class="botones btn btn-primary" />
                            <input type="hidden" value="'.$sqlExpeRes["n_expediente"].'" id="expBuscar" />
                            <input type="hidden" value="'.$this->tipoBuscar.'" id="tipoBuscar" />
                         </td>
                     </tr>';
                   }
                echo'   
                </table>
                <div id="MostResult"></div>';
        }
       
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
                <option value="Linderos">Linderos Segun Inspeccion</option>
                <option value="Servicios">Servicios</option>
                <option value="Factura">Datos de la Factura</option>
            </select>
            <div id="modificaciones"></div>
            <div id="identifiId"></div>
            <div id="identifiId2"></div>
            <div id="identifiId3"></div>';
    }
    //INMUEBLE LISTO
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
            <input type="hidden" id="parr" value="'.$inmueRes["parroquia"].'" />
            <input type="hidden" id="sector" value="'.$inmueRes["sector"].'"/>
            <input type="hidden" id="ambito" value="'.$inmueRes["ambito"].'"/>
            <input type="hidden" id="idInmueble" value="'.$inmueRes["id"].'"/>
            <div class="btnSig1">
                <input type="button" value="Actualizar" onclick="btnActInmue()" class="botones btn btn-primary" />
            </div>
            
            ';
        }
        function actInmue(){
            $link= new mysqli("127.0.0.1", "root","","siscast") 
            or die(mysqli_error());
            $inmueSql = "UPDATE inmueble SET direccion='".$this->direcInmue."',parroquia='".$this->parrInmue."',sector='".$this->secInmue."',ambito='".$this->ambInmue."' WHERE id='".$this->idInmueble."' ";
            $link->query($inmueSql);
            echo 'ACTUALIZADO CON EXITO';
        }
        function eliminarBus(){
            $link= new mysqli("127.0.0.1", "root","","siscast") 
            or die(mysqli_error());
            //BUSQUEDA DE EXPEDIENTE
                $expSql = "SELECT * FROM expediente where n_expediente=".$this->expBuscar."";
                $resExp = $link->query($expSql);
                $expRes = $resExp->fetch_assoc();
            //BUSQUEDA DE INMUEBLE
                $inmueSql = "SELECT * FROM inmueble where id=".$expRes["fk_inmueble"]."";
                $resInmue = $link->query($inmueSql);
                $inmueRes = $resInmue->fetch_assoc();
            //BUSQUEDA DE PAGOS
                $pagos = "SELECT * FROM pagos where fk_expedient=".$expRes["id"]."";
                $resPagos = $link->query($pagos);
                $pagosRes = $resPagos->fetch_assoc();
            // //ELIMINAR DE PROPIETARIO
            //     $propSql = "DELETE FROM propietarios where id=".$expRes["fk_propietario"]."";
            //     $link->query($propSql);
            //ELIMINAR DE CARACTERISTICAS DE LA CONSTRUCCIÓN
                $caracSql = "DELETE FROM caracteristicas_construccion where id=".$inmueRes["fk_carac_construccion"]." ";
                $link->query($caracSql);
            //ELIMINAR PROTOCOLIZACION
                $protSql = "DELETE FROM datos_protocolizacion where id=".$inmueRes["fk_protocolizacion"]."";
                $link->query($protSql);
            //ELIMINAR CARACTERISTICAS DEL INMUEBLE
                $caracInmueSql = "DELETE FROM carc_inmueble where id=".$inmueRes["fk_carac_inmuebles"]."";
                $link->query($caracInmueSql);
            //ELIMINAR LINDERO SEGUN DOCUMENTO
                $lindDocSql = "DELETE FROM linderos_documento where id=".$inmueRes["fk_lind_documento"]."";
                $link->query($lindDocSql);
            //ELEMINAR LINDEROS GENERAL
                $lindGeneralSql = "DELETE FROM linderos_general where id=".$inmueRes["fk_lind_general"]."";
                $link->query($lindGeneralSql);
            //ELIMINAR LINDEROS POSIBLE VENTA
                $lindPosVentaSql = "DELETE FROM linderos_posible_venta where id=".$inmueRes["fk_lind_pos_venta"]."";
                $link->query($lindPosVentaSql);
            //ELIMINAR TERRENO
                $terrSql = "DELETE FROM terreno where id=".$inmueRes["fk_terreno"]."";
                $link->query($terrSql);
            //ELIMINAR SERVICIOS
                $servSql = "DELETE FROM servicios_inmue where id=".$inmueRes["fk_servicios"]."";
                $link->query($servSql);
            //ELIMINAR FACTURA
                $factSql = "DELETE FROM factura where id=".$pagosRes["fk_factura"]."";
                $link->query($factSql);
            //ELIMINAR CONSTANCIAS
                $constSql = "DELETE FROM constancias where id =".$expRes["id"]."";
                $link->query($constSql);
            //ELIMINAR PAGOS 
                $pagSql = "DELETE FROM pagos where fk_expediente=".$expRes["id"]."";
                $link->query($pagSql);
            //ELIMINAR DE INMUEBLE
                $elimInmueSql = "DELETE FROM inmueble where id=".$expRes["fk_inmueble"]."";
                $link->query($elimInmueSql);
            //ELIMINAR EXPEDIENTE
                $elimSql = "DELETE FROM expediente where n_expediente=".$this->expBuscar."";
                $link->query($elimSql);

                echo '
                <h2>EXPEDIENTE ELIMINADO CON EXITO</h2>
                ';
        }
    //CARACTERISTICAS DEL INMUEBLE LISTO
        function modifcarcTerreno(){
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
            //BUSQUEDA CARAC. INMUEBLE
                $inmuCaracSql = "SELECT * FROM carc_inmueble where id=".$inmueRes["fk_carac_inmuebles"]."";
                $inmuCarac = $link->query($inmuCaracSql);
                $caracInmu = $inmuCarac->fetch_assoc();
            echo'
            <input type="hidden" id="topografia" value="'.$caracInmu["topografia"].'"/>
            <input type="hidden" id="forma" value="'.$caracInmu["forma"].'"/>
            <input type="hidden" id="uso" value="'.$caracInmu["uso"].'"/>
            <input type="hidden" id="tenencia" value="'.$caracInmu["tenencia"].'"/>
            <input type="hidden" id="idCarac" value="'.$caracInmu["id"].'"/>
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
                </tr>
            </table>
            <div class="btnSig1">
                <input type="button" value="Guardar" onclick="btnActCaracInmue()" class="botones btn btn-primary" />
            </div>
            ';
        }
        function actCaracInmue(){
            $link= new mysqli("127.0.0.1", "root","","siscast") 
            or die(mysqli_error());
            $inmueSql = "UPDATE carc_inmueble SET topografia='".$this->topoConst."',forma='".$this->formaConst."',uso='".$this->usoConst."',tenencia='".$this->tenenConst."' WHERE id='".$this->idCarac."' ";
            $link->query($inmueSql);
            echo 'ACTUALIZADO CON EXITO';
        }
    //PROPIETARIO LISTO
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
            <input type="hidden" value="'.$propRes["telef_hab"].'" id="divTelf2" />
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
                        <div class="col">
                            <div class="campDat">
                                <p class="negritas">Telef. Celular</p>
                                <input type="text" class="codigo2" value="" id="codTelf2"/>
                                <input type="text" class="numText" value="" id="numTelf2"/>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="campDat">
                            <p class="negritas">Telef. Hab.</p>
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
            $propSql = "UPDATE propietarios SET cedula='".$this->cedula."',rif='".$this->rif."',nombre='".$this->nomProp."',apellido='".$this->apelProp."',telef='".$this->telefono."',dir_hab='".$this->direcProp."',telef_hab='".$this->telefono2."' WHERE cedula='".$this->cedula2."' ";
            $link->query($propSql);
            echo 'ACTUALIZADO CON EXITO';
        }
    //CARACTERISTICAS DE LA CONSTRUCCION
        function modifcarcConstruccion(){
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
            //BUSQUEDA CARAC. INMUEBLE
                $inmuCaracSql = "SELECT * FROM caracteristicas_construccion where id=".$inmueRes["fk_carac_construccion"]."";
                $inmuCarac = $link->query($inmuCaracSql);
                $caracInmu = $inmuCarac->fetch_assoc();
            echo'
            <input type="hidden" value="'.$caracInmu["destino"].'" id="destino"/>
            <input type="hidden" value="'.$caracInmu["estructura"].'" id="estructura"/>
            <input type="hidden" value="'.$caracInmu["paredes_tipo"].'" id="paredes_tipo"/>
            <input type="hidden" value="'.$caracInmu["paredes_acabado"].'" id="paredes_acabado"/>
            <input type="hidden" value="'.$caracInmu["pintura"].'" id="pintura"/>
            <input type="hidden" value="'.$caracInmu["techo"].'" id="techo"/>
            <input type="hidden" value="'.$caracInmu["pisos"].'" id="pisos"/>
            <input type="hidden" value="'.$caracInmu["ventanas"].'" id="ventanas"/>
            <input type="hidden" value="'.$caracInmu["insta_electricas"].'" id="insta_electricas"/>
            <input type="hidden" value="'.$caracInmu["Regimen"].'" id="regimen"/>
            <input type="hidden" value="'.$caracInmu["id"].'" id="idCaracConst"/>
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
                        
                    </td>
                </tr>
                <tr>
                    <td>
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
                    <td>
                        <div class="campDat">
                            <p class="negritas">Observaciones</p>
                            <textarea id="obsConst">'.$caracInmu["observ"].'</textarea>
                        </div>
                    </td>
                <tr>
                    <td>
                        <div class="btnSig1">
                            <input type="button" value="Actualizar" onclick="btnActConst()" class="botones btn btn-primary" />
                        </div>
                    </td>
                </tr>
            </table>';
        }
        function actConst(){
            $link= new mysqli("127.0.0.1", "root","","siscast") 
            or die(mysqli_error());
            $inmueSql = "UPDATE caracteristicas_construccion SET destino='".$this->destConst."',estructura='".$this->estConst."',paredes_tipo='".$this->pareTipoInmue."',paredes_acabado='".$this->pareAcaInmue."',pintura='".$this->pintConst."',techo='".$this->techoConst."',pisos='".$this->pisosConst."',ventanas='".$this->ventConst."',insta_electricas='".$this->instElect."',observ='".$this->obsConst."', Regimen='".$this->regInmue."' WHERE id='".$this->idCaracConst."' ";
            $link->query($inmueSql);
            echo 'ACTUALIZADO CON EXITO';
        }
    //DATOS DE PROTOCOLIZACION
        function modificarProtocol(){
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
            //BUSQUEDA CARAC. INMUEBLE
                $inmuCaracSql = "SELECT * FROM datos_protocolizacion where id=".$inmueRes["fk_protocolizacion"]."";
                $inmuCarac = $link->query($inmuCaracSql);
                $caracInmu = $inmuCarac->fetch_assoc();
            echo'
            <input type="hidden" value="'.$caracInmu["id"].'" id="idProto">
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
                            <select id="docDebConst">
                            <option value="'.$caracInmu["documento"].'">'.$caracInmu["documento"].'</option>
                            <option value="NO APLICA">NO APLICA</option>
                            <option value="AUTENTICADO">AUTENTICADO</option>
                            <option value="REGISTRADO">REGISTRADO</option>
                        </select>
                        </div>
                    </td>
                    <td class="tdConst">
                        <div class="campDat">
                            <p class="negritas">Dirección:</p>
                            <input type="text" value="'.$caracInmu["direccion"].'" id="direcProtConst"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="tdConst">
                        <div class="campDat">
                            <p class="negritas">Numero:</p>
                            <input type="text" value="'.$caracInmu["numero"].'" id="numProtConst"/>
                        </div>
                    </td>
                    <td class="tdConst">
                        <div class="campDat">
                            <p class="negritas">Tomo:</p>
                            <input type="text" value="'.$caracInmu["tomo"].'" id="tomoProtConst"/>
                        </div>
                    </td>
                    <td class="tdConst">
                        <div class="campDat">
                            <p class="negritas">Folio:</p>
                            <input type="text" value="'.$caracInmu["folio"].'" id="folioProtConst"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="tdConst">
                        <div class="campDat">
                            <p class="negritas">Protocolo:</p>
                            <select id="protoConst">
                                <option value="'.$caracInmu["protocolo"].'">'.$caracInmu["protocolo"].'</option>
                                <option value="NO APLICA">NO APLICA</option>
                                <option value="Primero">Primero</option>
                                <option value="Segundo">Segundo</option>
                                <option value="Tercero">Tercero</option>
                            </select>
                        </div>
                    </td>
                    <td class="tdConst">
                        <div class="campDat">
                            <p class="negritas">Trimestre:</p>
                            <select id="trimProtConst">
                                <option value="'.$caracInmu["trimestre"].'">'.$caracInmu["trimestre"].'</option>
                                <option value="NO APLICA">NO APLICA</option>
                                <option value="Primero">Primero</option>
                                <option value="Segundo">Segundo</option>
                                <option value="Tercero">Tercero</option>
                                <option value="Cuarto">Cuarto</option>
                            </select>
                        </div>
                    </td>
                    <td class="tdConst">
                        <div class="campDat">
                            <p class="negritas">Fecha:</p>
                            <input type="date" value="'.$caracInmu["fecha"].'" id="dateProtConst"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="tdConst">
                        <div class="campDat">
                            <p class="negritas">Valor del Inmueble:</p>
                            <input type="text" value="'.$caracInmu["valor_inmueble"].'" id="valorProtConst"/>
                        </div>
                    </td>
                </tr>
            </table>
            <div class="btnSig1">
                <input type="button" value="Actualizar" onclick="btnActProtocol()" class=" botones btn btn-primary" />
            </div>';
        }
        function actProtocol(){
            $link= new mysqli("127.0.0.1", "root","","siscast") 
            or die(mysqli_error());
            $inmueSql = "UPDATE datos_protocolizacion SET documento='".$this->docDebConst."',direccion='".$this->direcProtConst."',numero='".$this->numProtConst."',tomo='".$this->tomoProtConst."',folio='".$this->folioProtConst."',protocolo='".$this->protoConst."',trimestre='".$this->trimProtConst."',fecha='".$this->dateProtConst."',valor_inmueble='".$this->valorProtConst."' WHERE id='".$this->idProto."' ";
            $link->query($inmueSql);
            echo 'ACTUALIZADO CON EXITO';
        }
    //LINDEROS INSPECCION
        function modifLinderos(){
            $link= new mysqli("127.0.0.1", "root","","siscast") 
            or die(mysqli_error());
            //BUSQUEDA DEL EXPEDIENTE
                $expSql = "SELECT * FROM expediente where n_expediente=".$this->expBuscar."";
                $resExp = $link->query($expSql);
                $expRes = $resExp->fetch_assoc();
            //BUSQUEDA DEL INMUEBLE
                $inmuSql = "SELECT * FROM inmueble where id=".$expRes["fk_inmueble"]."";
                $resInmue = $link->query($inmuSql);
                $inmueRes = $resInmue->fetch_assoc();
            if($inmueRes["fk_lind_general"]==0){
                echo'<div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <b class="h1">LINDEROS SEGÚN INSPECCIÓN</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <select id="puntNorte">
                            <option value=""></option>
                            <option value="Norte">Norte</option>
                            <option value="NorEste">NorEste</option>
                        </select>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-4">
                                <input type="text" class="text" value="" id="nortGen" />
                                <select id="uniNorte">
                                    <option value=""></option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <b>Alinderado</b>
                                <input type="text" value="" class="text" id="alindNort" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <select id="puntSur">
                            <option value=""></option>
                            <option value="Sur">Sur</option>
                            <option value="SurEste">SurEste</option>
                        </select>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-4">
                                <input type="text" value="" class="text" id="surGen" />
                                <select id="uniSur">
                                    <option value=""></option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <b>Alinderado</b>
                                <input type="text" class="text" value="" id="alindSur" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <select id="puntEste">
                            <option value=""></option>
                            <option value="Este">Este</option>
                            <option value="SurOeste">SurOeste</option>
                        </select>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-4">
                                <input type="text" value="" class="text" id="esteGen" />
                                <select id="uniEste">
                                    <option value=""></option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <b>Alinderado</b>
                                <input type="text" onKeyUp="mayusProp(this)" value="" class="text" id="alindEste" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <select id="puntOeste">
                            <option value=""></option>
                            <option value="Oeste">Oeste</option>
                            <option value="NorOeste">NorOeste</option>
                        </select>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-4">
                                <input type="text" value="" class="text" id="oesteGen" />
                                <select id="uniOeste">
                                    <option value=""></option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <b>Alinderado</b>
                                <input type="text" onKeyUp="mayusProp(this)" value="" class="text" id="alindOeste" />
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
                                <input type="text" value="" class="text" id="arTotal" >
                                <select id="uniAreaT">
                                    <option value="N/A">N/A</option>
                                    <option value="m2">m2</option>
                                    <option value="Ha">Ha</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="campDat">
                                <b>Niveles de Construcción</b>
                                <input type="text" onKeyUp="mayusProp(this)" value="" class="text" id="NivConstTotal" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="campDat">
                                <b>Área de Construcción</b>
                                <input type="text" value="" class="text" id="arConstTotal" >
                                <select id="uniAreaConst">
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
                    <input type="button" value="Actualizar" onclick="btnAplicGen()" class="botones btn btn-primary" />
                </div>
                <input type="hidden" value="0" id="idlindGen">
                <input type="hidden" value="'.$inmueRes["id"].'" id="idInmue">';
            }else{
                //LINDEROS GENERAL
                    $lindGenSql = "SELECT * FROM linderos_general where id=".$inmueRes["fk_lind_general"]."";
                    $resLindGen = $link->query($lindGenSql);
                    $lindGenRes= $resLindGen->fetch_assoc();

                    if($lindGenRes["norte"]=="nada"){
                        $norteGen = "NorteEste";
                    }else{
                        $norteGen = "Norte";
                    }
                    if($lindGenRes["sur"]=="nada"){
                        $surGen = "SurEste";
                    }else{
                        $surGen = "Sur";
                    }
                    if($lindGenRes["este"]=="nada"){
                        $esteGen = "SurOeste";
                    }else{
                        $esteGen = "Este";
                    }
                    if($lindGenRes["oeste"]=="nada"){
                        $oesteGen = "NortOeste";
                    }else{
                        $oesteGen = "Oeste";
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
                                <option value="'.$norteGen.'">'.$norteGen.'</option>
                                <option value="Norte">Norte</option>
                                <option value="NorEste">NorEste</option>
                            </select>
                        </div>
                        <div class="col-10">
                            <div class="row">
                                <div class="col-4">
                                    <input type="text" class="text" value="'.$lindGenRes["norte"].'" id="nortGen" />
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
                                <option value="'.$surGen.'">'.$surGen.'</option>
                                <option value="Sur">Sur</option>
                                <option value="SurEste">SurEste</option>
                            </select>
                        </div>
                        <div class="col-10">
                            <div class="row">
                                <div class="col-4">
                                    <input type="text" value="'.$lindGenRes["sur"].'" class="text" id="surGen" />
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
                                <option value="'.$esteGen.'">'.$esteGen.'</option>
                                <option value="Este">Este</option>
                                <option value="SurOeste">SurOeste</option>
                            </select>
                        </div>
                        <div class="col-10">
                            <div class="row">
                                <div class="col-4">
                                    <input type="text" value="'.$lindGenRes["este"].'" class="text" id="esteGen" />
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
                                <option value="'.$oesteGen.'">'.$oesteGen.'</option>
                                <option value="Oeste">Oeste</option>
                                <option value="NorOeste">NorOeste</option>
                            </select>
                        </div>
                        <div class="col-10">
                            <div class="row">
                                <div class="col-4">
                                    <input type="text" value="'.$lindGenRes["oeste"].'" class="text" id="oesteGen" />
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
                    <input type="button" value="Actualizar" onclick="btnAplicGen()" class="botones btn btn-primary" />
                </div>
                <input type="hidden" value="'.$lindGenRes["id"].'" id="idlindGen">
                <input type="hidden" value="'.$inmueRes["id"].'" id="idInmue">';
            }
            
            // //LINDEROS POSIBLE VENTA
            //     $lindPosVentaSql = "SELECT * FROM linderos_posible_venta where id=".$inmueRes["fk_lind_pos_venta"]."";
            //     $resPosVenta = $link->query($lindPosVentaSql);
            //     $posVentaRes= $resPosVenta->fetch_assoc();

            //     if($posVentaRes["norte"]=="nada"){
            //         $nortePosVenta = "Norte";
            //     }else{
            //         $nortePosVenta = "NorteEste";
            //     }
            //     if($posVentaRes["sur"]=="nada"){
            //         $surPosVenta = "Sur";
            //     }else{
            //         $surPosVenta = "SurEste";
            //     }
            //     if($posVentaRes["este"]=="nada"){
            //         $estePosVenta = "Este";
            //     }else{
            //         $estePosVenta = "SurOeste";
            //     }
            //     if($posVentaRes["oeste"]=="nada"){
            //         $oestePosVenta = "Oeste";
            //     }else{
            //         $oestePosVenta = "NortOeste";
            //     }
            // //LINDEROS SEGUN DOCUMENTO
            //     $lindDocumentoSql = "SELECT * FROM linderos_documento where id=".$inmueRes["fk_lind_documento"]."";
            //     $resDocumento = $link->query($lindDocumentoSql);
            //     $documentoRes= $resDocumento->fetch_assoc();

            //     if($documentoRes["norte"]=="nada"){
            //         $norteSecDoc = "Norte";
            //     }else{
            //         $norteSecDoc = "NorteEste";
            //     }
            //     if($documentoRes["sur"]=="nada"){
            //         $surSecDoc = "Sur";
            //     }else{
            //         $surSecDoc = "SurEste";
            //     }
            //     if($documentoRes["este"]=="nada"){
            //         $esteSecDoc = "Este";
            //     }else{
            //         $esteSecDoc = "SurOeste";
            //     }
            //     if($documentoRes["oeste"]=="nada"){
            //         $oesteSecDoc = "Oeste";
            //     }else{
            //         $oesteSecDoc = "NortOeste";
            //     }
                
        }
        function guarActLind(){
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
            if($this->idlindGen==0){
                $lindGeneralSQL = "INSERT INTO linderos_general(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$Norte."','".$norEste."','".$Sur."','".$SurEste."','".$Este."','".$SurOeste."','".$Oeste."','".$NortOeste."','".$this->alindNort."','".$this->alindSur."','".$this->alindEste."','".$this->alindOeste."','".$this->arTotal."','".$this->uniAreaT."','".$this->NivConstTotal."','".$this->uniAreaConst."','".$this->arConstTotal."','".$this->uniNorte."','".$this->uniSur."','".$this->uniEste."','".$this->uniOeste."')";
                $link->query($lindGeneralSQL);
                $idlindGen= $link->insert_id;

                $inmuSql = "UPDATE inmueble SET fk_lind_general=".$idlindGen." where id=".$this->idInmue."";
                $resInmue = $link->query($inmuSql);
            }else{
                $lindGeneralSQL = "UPDATE linderos_general SET norte='".$Norte."',noreste='".$norEste."',sur='".$Sur."',sureste='".$SurEste."',este='".$Este."',suroeste='".$SurOeste."',oeste='".$Oeste."',noroeste='".$NortOeste."',alind_n='".$this->alindNort."',alind_s='".$this->alindSur."',alind_e='".$this->alindEste."',alind_o='".$this->alindOeste."',areaTotal='".$this->arTotal."',uniAreaT='".$this->uniAreaT."',nivelesConst='".$this->NivConstTotal."',uniAreaC='".$this->uniAreaConst."',areaConst='".$this->arConstTotal."',uniNorte='".$this->uniNorte."',uniSur='".$this->uniSur."',uniEste='".$this->uniEste."',uniOeste='".$this->uniOeste."' where id=".$this->idlindGen."";
                $link->query($lindGeneralSQL);
                $idlindGen = $this->idlindGen;
            }
                    
            echo 'ACTUALIZADO CON EXITO'; 
        }
    //LINDEROS POSIBLE VENTA
        function actPosVenta(){
            $link= new mysqli("127.0.0.1", "root","","siscast") 
            or die(mysqli_error());
            $lindPosVentaSql = "SELECT * FROM linderos_posible_venta where id=".$this->idlindPosVenta."";
            $resPosVenta = $link->query($lindPosVentaSql);
            $posVentaRes= $resPosVenta->fetch_assoc();
            if($posVentaRes["norte"]=="nada"){
                $nortPosVenta = $posVentaRes["noreste"];
            }else{
                $nortPosVenta = $posVentaRes["norte"];
            }
            if($posVentaRes["sur"]=="nada"){
                $surPosVenta = $posVentaRes["sureste"];
            }else{
                $surPosVenta = $posVentaRes["sur"];
            }
            if($posVentaRes["este"]=="nada"){
                $estePosVenta = $posVentaRes["suroeste"];
            }else{
                $estePosVenta = $posVentaRes["este"];
            }
            if($posVentaRes["oeste"]=="nada"){
                $oestePosVenta = $posVentaRes["noroeste"];
            }else{
                $oestePosVenta = $posVentaRes["oeste"];
            }
            echo'
            <input type="hidden" value="'.$nortPosVenta.'" id="n_posVenta"/>
            <input type="hidden" value="'.$surPosVenta.'" id="s_posVenta"/>
            <input type="hidden" value="'.$estePosVenta.'" id="e_posVenta"/>
            <input type="hidden" value="'.$oestePosVenta.'" id="o_posVenta"/>
            <input type="hidden" value="'.$posVentaRes["alind_n"].'" id="alindN_posVenta"/>
            <input type="hidden" value="'.$posVentaRes["alind_s"].'" id="alindS_posVenta"/>
            <input type="hidden" value="'.$posVentaRes["alind_e"].'" id="alindE_posVenta"/>
            <input type="hidden" value="'.$posVentaRes["alind_o"].'" id="alindO_posVenta"/>
            <input type="hidden" value="'.$posVentaRes["uniNorte"].'" id="uniN_posVenta"/>
            <input type="hidden" value="'.$posVentaRes["uniSur"].'" id="uniS_posVenta"/>
            <input type="hidden" value="'.$posVentaRes["uniEste"].'" id="uniE_posVenta"/>
            <input type="hidden" value="'.$posVentaRes["uniOeste"].'" id="uniO_posVenta"/>
            <input type="hidden" value="'.$posVentaRes["areaTotal"].'" id="area_posVenta"/>
            <input type="hidden" value="'.$posVentaRes["nivelesConst"].'" id="niveles_posVenta"/>
            <input type="hidden" value="'.$posVentaRes["areaConst"].'" id="areaConst_posVenta"/>
            <input type="hidden" value="'.$posVentaRes["id"].'" id="idPosVenta"/>
            <input type="hidden" value="'.$posVentaRes["uniAreaT"].'" id="uniAreaTotal2"/>
            <input type="hidden" value="'.$posVentaRes["uniAreaC"].'" id="uniAreaC2"/>
            ';
        }
    //LINDEROS SEGUN DOCUMENTO
        function actSecDoc(){
            $link= new mysqli("127.0.0.1", "root","","siscast") 
            or die(mysqli_error());
            $lindDocumentoSql = "SELECT * FROM linderos_documento where id=".$this->idlindDocumento."";
            $resDocumento = $link->query($lindDocumentoSql);
            $documentoRes= $resDocumento->fetch_assoc();
            if($documentoRes["norte"]=="nada"){
                $nortDoc = $documentoRes["noreste"];
            }else{
                $nortDoc = $documentoRes["norte"];
            }
            if($documentoRes["sur"]=="nada"){
                $surDoc = $documentoRes["sureste"];
            }else{
                $surDoc = $documentoRes["sur"];
            }
            if($documentoRes["este"]=="nada"){
                $esteDoc = $documentoRes["suroeste"];
            }else{
                $esteDoc = $documentoRes["este"];
            }
            if($documentoRes["oeste"]=="nada"){
                $oesteDoc = $documentoRes["noroeste"];
            }else{
                $oesteDoc = $documentoRes["oeste"];
            }
            echo'
            <input type="hidden" value="'.$nortDoc.'" id="no_SecDoc"/>
            <input type="hidden" value="'.$surDoc.'" id="su_SecDoc"/>
            <input type="hidden" value="'.$esteDoc.'" id="es_SecDoc"/>
            <input type="hidden" value="'.$oesteDoc.'" id="oe_SecDoc"/>
            <input type="hidden" value="'.$documentoRes["alind_n"].'" id="alindN_SecDoc"/>
            <input type="hidden" value="'.$documentoRes["alind_s"].'" id="alindS_SecDoc"/>
            <input type="hidden" value="'.$documentoRes["alind_e"].'" id="alindE_SecDoc"/>
            <input type="hidden" value="'.$documentoRes["alind_o"].'" id="alindO_SecDoc"/>
            <input type="hidden" value="'.$documentoRes["uniNorte"].'" id="uniN_SecDoc"/>
            <input type="hidden" value="'.$documentoRes["uniSur"].'" id="uniS_SecDoc"/>
            <input type="hidden" value="'.$documentoRes["uniEste"].'" id="uniE_SecDoc"/>
            <input type="hidden" value="'.$documentoRes["uniOeste"].'" id="uniO_SecDoc"/>
            <input type="hidden" value="'.$documentoRes["areaTotal"].'" id="area_SecDoc"/>
            <input type="hidden" value="'.$documentoRes["nivelesConst"].'" id="niveles_SecDoc"/>
            <input type="hidden" value="'.$documentoRes["areaConst"].'" id="areaConst_SecDoc"/>
            <input type="hidden" value="'.$documentoRes["uniAreaT"].'" id="uniAreaTotal3"/>
            <input type="hidden" value="'.$documentoRes["uniAreaC"].'" id="uniAreaC3"/>
            ';
        }
    //SERVICIOS
        function modifServi(){
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
            //BUSQUEDA DE SERVICIOS
                $servSql = "SELECT * FROM servicios_inmue where id=".$inmueRes["fk_servicios"]."";
                $resServ = $link->query($servSql);
                $servRes = $resServ->fetch_assoc();
            echo'
            <input type="hidden" value="'.$servRes["acued"].'" id="acued">
            <input type="hidden" value="'.$servRes["acuedRural"].'" id="acuedRural">
            <input type="hidden" value="'.$servRes["aguasSubter"].'" id="aguasSubter">
            <input type="hidden" value="'.$servRes["aguasServ"].'" id="aguasServ">
            <input type="hidden" value="'.$servRes["pavimentoFlex"].'" id="pavimentoFlex">
            <input type="hidden" value="'.$servRes["pavimentoRig"].'" id="pavimentoRig">
            <input type="hidden" value="'.$servRes["viaEngran"].'" id="viaEngranzo">
            <input type="hidden" value="'.$servRes["acera"].'" id="Acera">
            <input type="hidden" value="'.$servRes["alumbradoPub"].'" id="alumbradoPub">
            <input type="hidden" value="'.$servRes["aseo"].'" id="Aseo">
            <input type="hidden" value="'.$servRes["transportePublic"].'" id="transportePublic">
            <input type="hidden" value="'.$servRes["pozoSept"].'" id="pozoSeptico">
            <input type="hidden" value="'.$servRes["electriResi"].'" id="electriResi">
            <input type="hidden" value="'.$servRes["electriIndus"].'" id="electriIndus">
            <input type="hidden" value="'.$servRes["lineaTelf"].'" id="lineaTelf">
            <input type="hidden" value="'.$servRes["id"].'" id="idServ">
            <table border="1px" class="taConst">
                <tr>
                    <td colspan="4" class="tiConst">
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
            </table>
            <div class="btnSig1">
                <input type="button" value="Guardar" onclick="btnActServ()" class=" botones btn btn-primary" />
            </div>
            ';
        }
        function guarActServ(){
            $link= new mysqli("127.0.0.1", "root","","siscast") 
            or die(mysqli_error());
            $lindGenSql = "UPDATE servicios_inmue SET acued='".$this->Acue."',acuedRural='".$this->AcueRural."',aguasSubter='".$this->AguasSub."',aguasServ='".$this->AguasServ."',pavimentoFlex='".$this->PavFlex."',pavimentoRig='".$this->PavRig."',viaEngran='".$this->viaEngran."',acera='".$this->acera."',alumbradoPub='".$this->AlumPublico."',aseo='".$this->aseo."',transportePublic='".$this->transPublic."',pozoSept='".$this->pozoSept."',electriResi='".$this->ElectResidencial."',electriIndus='".$this->ElectriIndust."',lineaTelef='".$this->linTelf."' WHERE id='".$this->idServ."' ";
            $link->query($lindGenSql);
            echo 'ACTUALIZADO CON EXITO';
        }
    //FACTURA
        function modifFact(){
            $link= new mysqli("127.0.0.1", "root","","siscast") 
            or die(mysqli_error());
            //BUSQUEDA DEL EXPEDIENTE
                $expSql = "SELECT * FROM expediente where n_expediente=".$this->expBuscar."";
                $resExp = $link->query($expSql);
                $expRes = $resExp->fetch_assoc();
            //BUSQUEDA DE FACTURA
                $expSql = "SELECT * FROM pagos where fk_expedient=".$expRes["id"]."";
                $resExp = $link->query($expSql);
                $expRes = $resExp->fetch_assoc();
                if($expRes["id"]!=0){
                    $factSql = "SELECT * FROM factura where id=".$expRes["fk_factura"]."";
                    $resFact = $link->query($factSql);
                    $factRes = $resFact->fetch_array();
                    echo'
                    <input type="hidden" value="'.$factRes["n_factura"].'" id="numFactHid" />
                    <table border="1px" class="taConst">
                        <tr>
                            <td class="tdConst">
                                <div class="campDat">
                                    <p class="negritas">Monto:</p>
                                    <input type="text" value="'.$factRes["monto"].'" id="montoFact"/>
                                </div>
                            </td>
                            <td>
                                <div class="campDat">
                                    <p class="negritas">Fecha:</p>
                                    <input type="date" value="'.$factRes["fecha"].'" id="fechFact"/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="tdConst">
                                <div class="campDat">
                                    <p class="negritas">Numero Factura:</p>
                                    <input type="number" value="'.$factRes["n_factura"].'" id="numFact"/>
                                </div>
                        </tr>
                    </table>
                    <div class="btnSig1">
                        <input type="button" value="Actualizar" onclick="btnActFact()" class=" botones btn btn-primary" />
                    </div>';
                }else{
                    echo'<b>EXPEDIENTE SELECCIONADO NO POSEE PAGO, EN EL AÑO EN CURSO</b>';
                }
        }
        function guarActFact(){
            $link= new mysqli("127.0.0.1", "root","","siscast") 
            or die(mysqli_error());
            $actFactSql = "UPDATE factura SET monto='".$this->montoFact."',n_factura=".$this->numFact.",fecha='".$this->fechFact."' where n_factura=".$this->numFactHid." ";
            $link->query($actFactSql);
            echo '<b>ACTUALIZADO CON EXITO</b>';
        }
    //PAGOS
        function formPagosInmue(){
            echo'
            <table border="1">
                <tr>
                    <td>
                        <h2>Realiza el Pago</h2>
                    </td>
                </tr>
                <tr>
                    <td class="tdConst">
                        <div class="campDat">
                            <p class="negritas">Monto:</p>
                            <input type="text" id="montoFact"/>
                        </div>
                    </td>
                    <td class="tdConst">
                        <div class="campDat">
                            <p class="negritas">Numero Factura:</p>
                            <input type="number" id="numFact" onchange="btnVeriFact()"/>
                        </div>
                    <td class="tdConst">
                        <div class="campDat">
                            <p class="negritas">Fecha:</p>
                            <input type="date" id="fechFact"/>
                        </div>
                    </td>
                </tr>
            </table>      
            <div id="campOculto"></div>
            <input type"button" value="Pagar" onclick="btnPagarInmue()" class="botones btn btn-primary" />
            <input type="hidden" value="'.$this->expBuscar.'" id="expBuscar" />';
        }
        function pagarInmue(){
            $link= new mysqli("127.0.0.1", "root","","siscast") 
            or die(mysqli_error());
            
            //INSERT FACTURA
                $factSql = "INSERT INTO factura(monto,n_factura,fecha)value('".$this->montoFact."','".$this->numFact."','".$this->fechFact."') ";
                $factConex = $link->query($factSql);
                $idFact = $link->insert_id;
            //BUSCAR EXPEDIENTE
                $expSql = "SELECT * FROM expediente where n_expediente=".$this->expBuscar."";
                $resExp = $link->query($expSql);
                $expRes = $resExp->fetch_assoc();
            //VERIFICAR PAGOS
                $pagSql= "SELECT * FROM pagos where fk_expedient=".$expRes["id"]."";
                $resPagos = $link->query($pagSql);
                $pagoRes = $resPagos->fetch_assoc();
            //INSERT PAGOS 
                $pagoSql = "INSERT INTO pagos(fk_expedient,fk_factura,fechaPagos)value(".$expRes["id"].",".$idFact.",'".date("Y-m-d")."')";
                $link->query($pagoSql);
            echo'PAGO REALIZADO CON EXITO';
        }
        function verPagos(){
            $link= new mysqli("127.0.0.1", "root","","siscast") 
            or die(mysqli_error());
            //BUSQUEDA DEL EXPEDIENTE
                $expSql = "SELECT * FROM expediente where n_expediente=".$this->expBuscar."";
                $resExp = $link->query($expSql);
                $expRes = $resExp->fetch_assoc();
            //BUSQUEDA DEL PROPIETARIO
                $propSql = "SELECT * FROM propietarios where id=".$expRes["fk_propietario"]."";
                $resProp = $link->query($propSql);
                $propRes = $resProp->fetch_assoc();
            //BUSQUEDA DE CANTIDAD DE PAGOS
                $veriPagoSql = "SELECT COUNT(*) FROM pagos where fk_expedient=".$expRes["id"]." ORDER BY fechaPagos";
                $veriResPago = $link->query($veriPagoSql);
                $veriPagoRes = $veriResPago->fetch_assoc();
            
            echo'
            <table border="1">
                <tr>
                    <td colspan="4">
                        <h2>Datos del propietario</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Nombre:</b> '.$propRes["nombre"].'
                    </td>
                    <td>
                        <b>Apellido</b> '.$porpRes["apellido"].'
                    </td>
                    <td>
                        <b>Cedula</b> '.$propRes["cedula"].'
                    </td>
                    <td>
                        <b>Dirección de Hab.</b> '.$propRes["dir_hab"].'
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>
                        <h2>Pagos realizados</h2>
                    </td>
                </tr>';
            
                echo'<tr>
                    <td>
                        <b>No.</b>
                    </td>
                    <td>
                        <b>No. Factura:</b>
                    </td>
                    <td>
                        <b>Monto:</b>
                    </td>
                    <td>
                        <b>Fecha:</b>
                    </td>
                </tr>';
                    //BUSQUEDA DE PAGOS
                        $pagoSql = "SELECT * FROM pagos where fk_expedient=".$expRes["id"]." ";
                        $resPago = $link->query($pagoSql);
                        $pagoRes = $resPago->fetch_assoc();
                    //BUSQUEDA DE FACTURA
                        $factSql = "SELECT * FROM pagos INNER JOIN factura where fk_expedient=".$pagoRes["fk_expedient"]."";
                        $resFact = $link->query($factSql);
                        $no=0;
            for($i = 0; $i<$veriPagoRes["COUNT(*)"]; $i++){
                $factRes = $resFact->fetch_array();
                    $no= $no+1;
                    echo'
                    <tr>
                        <td>
                            '.$no.'
                        </td>
                        <td>
                            '.$factRes["n_factura"].'
                        </td>
                        <td>
                            '.$factRes["monto"].'
                        </td>
                        <td>
                            '.$factRes["fechaPagos"].'
                        </td>
                    </tr>';
            }
                
                echo'
            </table>';
        }
}


?>