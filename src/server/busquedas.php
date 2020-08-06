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
                if($$fechPagosDiv[0] == date("Y")){
                    echo 'Si ha pagado';
                }else{
                    echo 'No ha realizado pago';
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
                $veriRenov = "SELECT * FROM constancias where fk_exped=".$expRes["id"]." ORDER BY fecha DESC";
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
        }else{
            echo'
            <a href="http://localhost/SisCast/"><input type="button" value="Regresar" class="botones btn btn-primary"/></a>
            <b>EXPEDIENTE NO EXISTE</b>';
        }
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
                            $veriConstCed = "SELECT * FROM constancias where fk_exped=".$sqlExpeRes["id"]." ORDER BY fecha DESC";
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
                </table>';
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
                            $veriConstCed = "SELECT * FROM constancias where fk_exped=".$sqlExpeRes["id"]." ORDER BY fecha DESC";
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
                </table>';
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
                <option value="Linderos">Linderos</option>
                <option value="Servicios">Servicios</option>
                <option value="Factura">Datos de la Factura</option>
            </select>
            <div id="modificaciones"></div>
            <div id="identifiId"></div>
            <div id="identifiId2"></div>
            <div id="identifiId3"></div>';
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
        <input type="hidden" id="telefono" value="'.$inmueRes["telef"].'"/>
        <input type="hidden" id="parr" value="'.$inmueRes["parroquia"].'" />
        <input type="hidden" id="sector" value="'.$inmueRes["sector"].'"/>
        <input type="hidden" id="ambito" value="'.$inmueRes["ambito"].'"/>
        <input type="hidden" id="idInmueble" value="'.$inmueRes["id"].'"/>
        <div class="btnSig1">
            <input type="button" value="Actualizar" onclick="btnActInmue()" class="botones btn btn-primary" />
        </div>
        
        ';
    }
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
        <input type="hidden" id="regimen" value="'.$caracInmu["regimen"].'"/>
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
            </tr>
        </table>
        <div class="btnSig1">
            <input type="button" value="Siguiente" onclick="btnActCaracInmue()" class="botones btn btn-primary" />
        </div>
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
        <input type="hidden" value="'.$caracInmu["piezas_sanitarias"].'" id="piezas_sanitarias"/>
        <input type="hidden" value="'.$caracInmu["ventanas"].'" id="ventanas"/>
        <input type="hidden" value="'.$caracInmu["puertas"].'" id="puertas"/>
        <input type="hidden" value="'.$caracInmu["insta_electricas"].'" id="insta_electricas"/>
        <input type="hidden" value="'.$caracInmu["complementos"].'" id="complementos"/>
        <input type="hidden" value="'.$caracInmu["estado_conservacion"].'" id="estado_conservacion"/>
        <input type="hidden" value="'.$caracInmu["ambientes"].'" id="ambientes"/>
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
                        <textarea id="obsConst">'.$caracInmu["observ"].'</textarea>
                    </div>
                </td>
                <td>
                    <div class="btnSig1">
                        <input type="button" value="Actualizar" onclick="btnActConst()" class="botones btn btn-primary" />
                    </div>
                </td>
            </tr>
        </table>';
    }
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
                        <input type="text" value="'.$caracInmu["documento"].'" id="docDebConst"/>
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
                        <input type="text" value="'.$caracInmu["protocolo"].'" id="protoConst"/>
                    </div>
                </td>
                <td class="tdConst">
                    <div class="campDat">
                        <p class="negritas">Trimestre:</p>
                        <input type="text" value="'.$caracInmu["trimestre"].'" id="trimProtConst"/>
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
    function modifLinderos(){
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
        //LINDEROS GENERAL
            $lindGenSql = "SELECT * FROM linderos_general where id=".$inmueRes["fk_lind_general"]."";
            $resLindGen = $link->query($lindGenSql);
            $lindGenRes= $resLindGen->fetch_assoc();

            if($lindGenRes["norte"]=="nada"){
                $norteGen = "Norte";
            }else{
                $norteGen = "NorteEste";
            }
            if($lindGenRes["sur"]=="nada"){
                $surGen = "Sur";
            }else{
                $surGen = "SurEste";
            }
            if($lindGenRes["este"]=="nada"){
                $esteGen = "Este";
            }else{
                $esteGen = "SurOeste";
            }
            if($lindGenRes["oeste"]=="nada"){
                $oesteGen = "Oeste";
            }else{
                $oesteGen = "NortOeste";
            }
        //LINDEROS POSIBLE VENTA
            $lindPosVentaSql = "SELECT * FROM linderos_posible_venta where id=".$inmueRes["fk_lind_pos_venta"]."";
            $resPosVenta = $link->query($lindPosVentaSql);
            $posVentaRes= $resPosVenta->fetch_assoc();

            if($posVentaRes["norte"]=="nada"){
                $nortePosVenta = "Norte";
            }else{
                $nortePosVenta = "NorteEste";
            }
            if($posVentaRes["sur"]=="nada"){
                $surPosVenta = "Sur";
            }else{
                $surPosVenta = "SurEste";
            }
            if($posVentaRes["este"]=="nada"){
                $estePosVenta = "Este";
            }else{
                $estePosVenta = "SurOeste";
            }
            if($posVentaRes["oeste"]=="nada"){
                $oestePosVenta = "Oeste";
            }else{
                $oestePosVenta = "NortOeste";
            }
        //LINDEROS SEGUN DOCUMENTO
            $lindDocumentoSql = "SELECT * FROM linderos_documento where id=".$inmueRes["fk_lind_documento"]."";
            $resDocumento = $link->query($lindDocumentoSql);
            $documentoRes= $resDocumento->fetch_assoc();

            if($documentoRes["norte"]=="nada"){
                $norteSecDoc = "Norte";
            }else{
                $norteSecDoc = "NorteEste";
            }
            if($documentoRes["sur"]=="nada"){
                $surSecDoc = "Sur";
            }else{
                $surSecDoc = "SurEste";
            }
            if($documentoRes["este"]=="nada"){
                $esteSecDoc = "Este";
            }else{
                $esteSecDoc = "SurOeste";
            }
            if($documentoRes["oeste"]=="nada"){
                $oesteSecDoc = "Oeste";
            }else{
                $oesteSecDoc = "NortOeste";
            }
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
                        <option value="no"></option>
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
                        <option value="no"></option>
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
                        <option value="no"></option>
                        <option value="si">Si</option>
                        <option value="no">No</option>
                    </select>
                </td>
                <td>
                    <div id="lindSecDoc"></div>
                </td>
            </tr>
        </table>
        <div class="btnSig1">
            <input type="button" value="Actualizar" onclick="btnActLinderos()" class=" botones btn btn-primary" />
        </div>
        <input type="hidden" value="'.$norteSecDoc.'" id="nortePunt3">
        <input type="hidden" value="'.$surSecDoc.'" id="surPunt3">
        <input type="hidden" value="'.$esteSecDoc.'" id="estePunt3">
        <input type="hidden" value="'.$oesteSecDoc.'" id="oestePunt3">
        <input type="hidden" value="'.$nortePosVenta.'" id="nortePunt2">
        <input type="hidden" value="'.$surPosVenta.'" id="surPunt2">
        <input type="hidden" value="'.$estePosVenta.'" id="estePunt2">
        <input type="hidden" value="'.$oestePosVenta.'" id="oestePunt2">
        <input type="hidden" value="'.$norteGen.'" id="nortePunt">
        <input type="hidden" value="'.$surGen.'" id="surPunt">
        <input type="hidden" value="'.$esteGen.'" id="estePunt">
        <input type="hidden" value="'.$oesteGen.'" id="oestePunt">
        <input type="hidden" value="'.$lindGenRes["norte"].'" id="lindGen" />
        <input type="hidden" value="'.$posVentaRes["norte"].'" id="lindPosVenta" />
        <input type="hidden" value="'.$documentoRes["norte"].'" id="lindDocumento" />
        <input type="hidden" value="'.$lindGenRes["noreste"].'" id="lindGen2" />
        <input type="hidden" value="'.$posVentaRes["noreste"].'" id="lindPosVenta2" />
        <input type="hidden" value="'.$documentoRes["noreste"].'" id="lindDocumento2" />
        <input type="hidden" value="'.$lindGenRes["id"].'" id="idlindGen" />
        <input type="hidden" value="'.$posVentaRes["id"].'" id="idlindPosVenta" />
        <input type="hidden" value="'.$documentoRes["id"].'" id="idlindDocumento" />
        ';
    }
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
        $inmueSql = "UPDATE inmueble SET telef='".$this->telefono."',direccion='".$this->direcInmue."',parroquia='".$this->parrInmue."',sector='".$this->secInmue."',ambito='".$this->ambInmue."' WHERE id='".$this->idInmueble."' ";
        $link->query($inmueSql);
        echo 'ACTUALIZADO CON EXITO';
    }
    function actCaracInmue(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $inmueSql = "UPDATE carc_inmueble SET topografia='".$this->topoConst."',forma='".$this->formaConst."',uso='".$this->usoConst."',tenencia='".$this->tenenConst."',regimen='".$this->regInmue."' WHERE id='".$this->idCarac."' ";
        $link->query($inmueSql);
        echo 'ACTUALIZADO CON EXITO';
    }
    function actConst(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $inmueSql = "UPDATE caracteristicas_construccion SET destino='".$this->destConst."',estructura='".$this->estConst."',paredes_tipo='".$this->pareTipoInmue."',paredes_acabado='".$this->pareAcaInmue."',pintura='".$this->pintConst."',techo='".$this->techoConst."',pisos='".$this->pisosConst."',piezas_sanitarias='".$this->piezConst."',ventanas='".$this->ventConst."',puertas='".$this->puertConst."',insta_electricas='".$this->instElect."',complementos='".$this->compConst."',estado_conservacion='".$this->estConserv."',ambientes='".$this->ambConst."',observ='".$this->obsConst."' WHERE id='".$this->idCaracConst."' ";
        $link->query($inmueSql);
        echo 'ACTUALIZADO CON EXITO';
    }
    function actProtocol(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $inmueSql = "UPDATE datos_protocolizacion SET documento='".$this->docDebConst."',direccion='".$this->direcProtConst."',numero='".$this->numProtConst."',tomo='".$this->tomoProtConst."',folio='".$this->folioProtConst."',protocolo='".$this->protoConst."',trimestre='".$this->trimProtConst."',fecha='".$this->dateProtConst."',valor_inmueble='".$this->valorProtConst."' WHERE id='".$this->idProto."' ";
        $link->query($inmueSql);
        echo 'ACTUALIZADO CON EXITO';
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
            $lindGenSql = "UPDATE linderos_general SET norte='".$Norte."',noreste='".$norEste."',sur='".$Sur."',sureste='".$SurEste."',este='".$Este."',suroeste='".$SurOeste."',oeste='".$Oeste."',noroeste='".$NortOeste."',alind_n='".$this->alindNort."',alind_s='".$this->alindSur."',alind_e='".$this->alindEste."',alind_o='".$this->alindOeste."',areaTotal='".$this->arTotal."',uniAreaT='".$this->uniAreaT."',nivelesConst='".$this->NivConstTotal."',uniAreaC='".$this->uniAreaConst."',areaConst='".$this->arConstTotal."',uniNorte='".$this->uniNorte."',uniSur='".$this->uniSur."',uniEste='".$this->uniEste."',uniOeste='".$this->uniOeste."' WHERE id='".$this->idlindGen."' ";
            $link->query($lindGenSql);

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
            $lindPosVentaSql = "UPDATE linderos_posible_venta SET norte='".$Norte2."',noreste='".$norEste2."',sur='".$Sur2."',sureste='".$SurEste2."',este='".$Este2."',suroeste='".$SurOeste2."',oeste='".$Oeste2."',noroeste='".$NortOeste2."',alind_n='".$this->alindPosNort."',alind_s='".$this->alindPosSur."',alind_e='".$this->alindPosEste."',alind_o='".$this->alindPosOeste."',areaTotal='".$this->arTotal2."',uniAreaT='".$this->uniAreaT3."',nivelesConst='".$this->NivConstTotal2."',uniAreaC='".$this->uniAreaConst2."',areaConst='".$this->arConstTotal2."',uniNorte='".$this->uniNorte2."',uniSur='".$this->uniSur2."',uniEste='".$this->uniEste2."',uniOeste='".$this->uniOeste2."' WHERE id='".$this->idlindPosVenta."' ";
            $link->query($lindPosVentaSql);

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
            $lindSecDocSql = "UPDATE linderos_documento SET norte='".$Norte3."',noreste='".$norEste3."',sur='".$Sur3."',sureste='".$SurEste3."',este='".$Este3."',suroeste='".$SurOeste3."',oeste='".$Oeste3."',noroeste='".$NortOeste3."',alind_n='".$this->alindSecNorte."',alind_s='".$this->alindSecSur."',alind_e='".$this->alindSecEste."',alind_o='".$this->alindSecOeste."',areaTotal='".$this->arTotal3."',uniAreaT='".$this->uniAreaT3."',nivelesConst='".$this->NivConstTotal3."',uniAreaC='".$this->uniAreaConst3."',areaConst='".$this->arConstTotal3."',uniNorte='".$this->uniNorte3."',uniSur='".$this->uniSur3."',uniEste='".$this->uniEste3."',uniOeste='".$this->uniOeste3."' WHERE id='".$this->idlindDocumento."' ";
            $link->query($lindSecDocSql);



            echo 'ACTUALIZADO CON EXITO';
        
    }
    function guarActServ(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $lindGenSql = "UPDATE servicios_inmue SET acued='".$this->Acue."',acuedRural='".$this->AcueRural."',aguasSubter='".$this->AguasSub."',aguasServ='".$this->AguasServ."',pavimentoFlex='".$this->PavFlex."',pavimentoRig='".$this->PavRig."',viaEngran='".$this->viaEngran."',acera='".$this->acera."',alumbradoPub='".$this->AlumPublico."',aseo='".$this->aseo."',transportePublic='".$this->transPublic."',pozoSept='".$this->pozoSept."',electriResi='".$this->ElectResidencial."',electriIndus='".$this->ElectriIndust."',lineaTelef='".$this->linTelf."' WHERE id='".$this->idServ."' ";
        $link->query($lindGenSql);
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

    function actGeneral(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $lindGenSql = "SELECT * FROM linderos_general where id=".$this->idlindGen."";
        $resLindGen = $link->query($lindGenSql);
        $lindGenRes= $resLindGen->fetch_assoc();
        if($lindGenRes["norte"]=="nada"){
            $nortGen = $lindGenRes["noreste"];
        }else{
            $nortGen = $lindGenRes["norte"];
        }
        if($lindGenRes["sur"]=="nada"){
            $surGen = $lindGenRes["sureste"];
        }else{
            $surGen = $lindGenRes["sur"];
        }
        if($lindGenRes["este"]=="nada"){
            $esteGen = $lindGenRes["suroeste"];
        }else{
            $esteGen = $lindGenRes["este"];
        }
        if($lindGenRes["oeste"]=="nada"){
            $oesteGen = $lindGenRes["noroeste"];
        }else{
            $oesteGen = $lindGenRes["oeste"];
        }
        echo'
        <input type="hidden" value="'.$nortGen.'" id="no_gen"/>
        <input type="hidden" value="'.$surGen.'" id="su_gen"/>
        <input type="hidden" value="'.$esteGen.'" id="es_gen"/>
        <input type="hidden" value="'.$oesteGen.'" id="oe_gen"/>
        <input type="hidden" value="'.$lindGenRes["alind_n"].'" id="alindN_gen"/>
        <input type="hidden" value="'.$lindGenRes["alind_s"].'" id="alindS_gen"/>
        <input type="hidden" value="'.$lindGenRes["alind_e"].'" id="alindE_gen"/>
        <input type="hidden" value="'.$lindGenRes["alind_o"].'" id="alindO_gen"/>
        <input type="hidden" value="'.$lindGenRes["areaTotal"].'" id="area_gen"/>
        <input type="hidden" value="'.$lindGenRes["nivelesConst"].'" id="niveles_gen"/>
        <input type="hidden" value="'.$lindGenRes["areaConst"].'" id="areaConst_gen"/>
        <input type="hidden" value="'.$lindGenRes["uniNorte"].'" id="uniN_gen"/>
        <input type="hidden" value="'.$lindGenRes["uniSur"].'" id="uniS_gen"/>
        <input type="hidden" value="'.$lindGenRes["uniEste"].'" id="uniE_gen"/>
        <input type="hidden" value="'.$lindGenRes["uniOeste"].'" id="uniO_gen"/>
        <input type="hidden" value="'.$lindGenRes["id"].'" id="idGen"/>
        <input type="hidden" value="'.$lindGenRes["uniAreaT"].'" id="uniAreaTotal"/>
        <input type="hidden" value="'.$lindGenRes["uniAreaC"].'" id="uniAreaC"/>
        ';
    }
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