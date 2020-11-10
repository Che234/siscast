<?php
class busquedas{

    function construct(){
        $dormit= "";
        $sala = "";
        $comedor = "";
        $banos = "";
        $Cocina= "";
        $Servicio= "";
        $oficina = "";
        $garaje = "";
        $estac= "";
        $entamFina="";
        $entamEcon="";
        $madeCepil = "";
        $hierro = "";
        $porFina ="";
        $porceEcon = "";
        $banera = "";
        $calentador = "";
        $wc = "";
        $bidet = "";
        $lavamanos = "";
        $ducha = "";
        $urinario = "";
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
        $ano_construc ="";
        $ano_refac = "";
        $edadEfec = "";
        $numPlata = "";
        $numVivienda = "";
    }
//MOSTRAR LA BUSQUEDA
    function mostBusqueda(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        
        if($this->tipoBuscar=="Expediente"){
            //BUSQUEDA EXPEDIENTE
                $expSql = "SELECT * FROM expediente where n_expediente='".$this->campBuscar."'";
                $resBus=$link->query($expSql);
                $expRes = $resBus->fetch_array();
            if($expRes["id"]!=0){
                $numExp = $expRes["n_expediente"];
                $idProp = $expRes["fk_propietario"];
                $idInmue = $expRes["fk_inmueble"];
                $idExp = $expRes["n_expediente"];
                $condicion = $expRes["condicion"];

                //BUSQUEDA PAGOS
                        $pagosSql = "SELECT * FROM pagos where fk_expedient=".$expRes["n_expediente"]." AND tipo='normal'";
                        $resPago = $link->query($pagosSql);
                        $pagoRes = $resPago->fetch_array();
                        $fechPagosDiv = explode("-",$pagoRes["fechaPagos"]);
                        //BUSQUEDA PROPIETARIO
                    $propSql = "SELECT * FROM propietarios where id=".$idProp."";
                    $resProp = $link->query($propSql);
                    $propRes = $resProp->fetch_array();
                //BUSQUEDA INMUEBLE
                    $inmueSql = "SELECT * FROM inmueble where id=".$idInmue."";
                    $resInmue = $link->query($inmueSql);
                    $inmueRes = $resInmue->fetch_array();
                //BUSQUEDA CARACTERISTICAS DEL INMUEBLE
                    $caracInmueSql = "SELECT * FROM carc_inmueble where id=".$inmueRes["fk_carac_inmuebles"]."";
                    $rescaracInmue = $link->query($caracInmueSql);
                    $inmueResCarac = $rescaracInmue->fetch_array();
                //BUSQUEDA PAGOS
                    $pagosSql = "SELECT * FROM pagos where fk_expedient=".$idExp." AND tipo='normal'";
                    $resPago = $link->query($pagosSql);
                    $pagoRes = $resPago->fetch_array();
                    $fechPagosDiv = explode("-",$pagoRes["fechaPagos"]);

                    echo'
                <div class="container " id="BusqueDart">
                    <div class="row">
                        <div class="col">
                            <h2>Resultado</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <b>Propietario:</b> '.$propRes["nombre"].' '.$propRes["apellido"].'
                        </div>
                        <div class="col">
                            <b>Expediente:</b> '.$this->campBuscar.'
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <b>Ultima fecha pago</b>
                        </div>
                        <div class="col">
                            <b>Uso del Inmueble</b>
                        </div>
                        <div class="col-7">
                            <b>Acción</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            '; 
                        if($fechPagosDiv[0] == date("Y")){
                            echo $pagoRes["fechaPagos"];
                        }else{
                            echo 'NO HA CANCELADO ESTE AÑO';
                        }
                        echo'
                        </div>
                        <div class="col">
                            '.$inmueResCarac["uso"].'
                        </div>
                        <div class="col-7">
                            ';
                            if($fechPagosDiv[0] == date("Y") ){
                            echo'<input type"button" value="Ver pagos" onclick="btnPagos()" class="botones btn btn-primary" />';
                             }
                             if($fechPagosDiv[0] < date("Y")){
                                echo'<input type"button" value="Pagar" onclick="btnPagar()" class="botones btn btn-primary" />';
                             }
                             echo'
                            <input type"button" value="Modificar" class="botones btn btn-primary " onclick="mostTipModif()"/>';
                        $veriRenov = "SELECT * FROM constancias where fk_expedi=".$idExp." ORDER BY fecha DESC";
                        $resVeriRenov = $link->query($veriRenov);
                        $veriRenovRes = $resVeriRenov->fetch_array();
                        $fechaRenov = explode("-",$veriRenovRes["fecha"]);
                        echo'<input type"button" value="Renovación" class="botones btn btn-primary" onclick="btnRevConst()"/>

                            <input type"button" value="Eliminar" onclick="btnElimInmue()" class="botones btn btn-primary" />
                            <input type="hidden" value="'.$numExp.'" id="expBuscar" />
                            <input type="hidden" value="'.$this->tipoBuscar.'" id="tipoBuscar" />
                            <input type="hidden" value="'.$condicion.'" id="condicion"/>
                        </div>
                    </div>
                </div>
                <div id="MostResult"></div>';
            }else{
                $expEmpaSql = "SELECT * FROM expempadro where n_expediente=".$this->campBuscar."";
                $resExpEmpa = $link->query($expEmpaSql);
                $expEmpaRes = $resExpEmpa->fetch_array();
                $expedientes = $expEmpaRes["id"];
                if($expEmpaRes["id"]!=0){
                    $numExp = $expEmpaRes["n_expediente"];
                    $idProp = $expEmpaRes["fk_propietario"];
                    $idInmue = $expEmpaRes["fk_inmueble"];
                    $condicion = $expEmpaRes["condicion"];
                    $idExp = $expEmpaRes["id"];
                    //BUSQUEDA PAGOS
                        $pagosSql = "SELECT * FROM pagos where fk_expedient=".$expEmpaRes["n_expediente"]." AND tipo='EMPADRONAMIENTO'";
                        $resPago = $link->query($pagosSql);
                        $pagoRes = $resPago->fetch_assoc();
                        $fechPagosDiv = explode("-",$pagoRes["fechaPagos"]);
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
                echo'
                <div class="container " id="BusqueDart">
                    <div class="row">
                        <div class="col">
                            <h2>Resultado</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <b>Propietario:</b> '.$propRes["nombre"].' '.$propRes["apellido"].'
                        </div>
                        <div class="col">
                            <b>Expediente:</b> '.$this->campBuscar.'
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <b>Ultima fecha pago</b>
                        </div>
                        <div class="col">
                            <b>Uso del Inmueble</b>
                        </div>
                        <div class="col-7">
                            <b>Acción</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            '; 
                        if($fechPagosDiv[0] == date("Y")){
                            echo ''.$fechPagosDiv[2].'/'.$fechPagosDiv[1].'/'.$fechPagosDiv[0].'';
                        }else{
                            echo 'NO HA CANCELADO ESTE AÑO';
                        }
                        echo'
                        </div>
                        <div class="col">
                            '.$inmueResCarac["uso"].'
                        </div>
                        <div class="col-7">
                            ';
                            if($fechPagosDiv[0] == date("Y") ){
                            echo'<input type"button" value="Ver pagos" onclick="btnPagos()" class="botones btn btn-primary" />';
                             }
                             if($fechPagosDiv[0] < date("Y")){
                                echo'<input type"button" value="Pagar" onclick="btnPagar()" class="botones btn btn-primary" />';
                             }
                             echo'
                            <input type"button" value="Modificar" class="botones btn btn-primary " onclick="mostTipModif()"/>';
                        $veriRenov = "SELECT * FROM constancias where fk_expedi=".$idExp." ORDER BY fecha DESC";
                        $resVeriRenov = $link->query($veriRenov);
                        $veriRenovRes = $resVeriRenov->fetch_array();
                        $fechaRenov = explode("-",$veriRenovRes["fecha"]);
                        echo'<input type"button" value="Renovación" class="botones btn btn-primary" onclick="btnRevConst()"/>

                            <input type"button" value="Eliminar" onclick="btnElimInmue()" class="botones btn btn-primary" />
                            <input type="hidden" value="'.$numExp.'" id="expBuscar" />
                            <input type="hidden" value="'.$this->tipoBuscar.'" id="tipoBuscar" />
                        </div>
                    </div>
                </div>
                
                <div id="MostResult"></div>';
                }else{
                    echo'
                    <a href="./"><input type="button" value="Regresar" class="botones btn btn-primary"/></a>
                    <b>EXPEDIENTE NO EXISTE</b>';
                }

            }
            
        }
        if($this->tipoBuscar=="Cedula"){
            $cedulaFull = ''.$this->tipoCed.'|'.$this->campBuscar.'';
            //BUSQUEDA PROPIETARIO
                $propSql = "SELECT * FROM propietarios where cedula='".$cedulaFull."'";
                $resProp = $link->query($propSql);
                $propRes = $resProp->fetch_array();
            if($propRes["id"]!=0){
                //BUSQUEDA EXPEDIENTE
                $expediSql = "SELECT * FROM expediente where fk_propietario=".$propRes["id"]." ORDER BY fecha ASC";
                $resBusExp= $link->query($expediSql);
                $tipo = "normal";

                $expEmpadroSql = "SELECT * FROM expempadro where fk_propietario=".$propRes["id"]." ORDER BY fecha ASC";
                $resExpEmp = $link->query($expEmpadroSql);
                $idExp = $expEmpRes["id"];
                $idPropie = $expEmpRes["fk_propietario"];
                $idInmuebles = $expEmpRes["fk_inmueble"];
                $tipo = "EMPADRONAMIENTO";

                echo'
                    <div class="container-fluid" id="BusqueDart">
                            <div class="row">
                                <div class="col">
                                    <h2>Resultado</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <b>Propietario</b>
                                </div>
                                <div class="col">
                                    <b>'.$propRes["nombre"].' '.$propRes["apellido"].'</b>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-1">
                                        <b>Expediente</b>
                                    </div>
                                    <div class="col-1">
                                        <b>Fecha Pago</b>
                                    </div>
                                    <div class="col-1">
                                        <b>Uso del Inmueble</b>
                                    </div>
                                    <div class="col-3">
                                        <b>Dirección</b>
                                    </div>
                                    <div class="col">
                                        <b>Acción</b>
                                    </div>
                                </div>
                            
                ';

                while($expedCount = $resBusExp->fetch_array()){
                    $idExp = $expBusRes["id"];
                    $idPropie = $expBusRes["fk_propietario"];
                    $idInmuebles = $expBusRes["fk_inmueble"];
                    $noExp = $expedCount["n_expediente"];
                    $expNo ="'".$noExp."'";

                    $pagosSQL = "SELECT * FROM pagos where fk_expedient='".$expedCount["n_expediente"]."' AND tipo='normal' ORDER BY fechaPagos DESC";
                    $resPagos = $link->query($pagosSQL);
                    $pagosRes = $resPagos->fetch_array();
                    

                    $inmueSQL = "SELECT * FROM inmueble where id=".$expedCount["fk_inmueble"]."";
                    $resInmue = $link->query($inmueSQL);
                    $inmueRes = $resInmue->fetch_array();

                    $caracInmueSQL = "SELECT * FROM carc_inmueble where id='".$inmueRes["fk_carac_inmuebles"]."'";
                    $resCaracInmue = $link->query($caracInmueSQL);
                    $caracInmueRes = $resCaracInmue->fetch_array();

                    $fechaPag = explode('-',$pagosRes["fechaPagos"]);
                    echo'

                        <div class="row">
                            <div class="col-1">
                                <b>'.$expedCount["n_expediente"].'</b>
                            </div>
                            <div class="col-1">
                                <b>'.$pagosRes["fechaPagos"].'</b>
                            </div>
                            <div class="col-1">
                                <b>'.$caracInmueRes["uso"].'</b>
                            </div>
                            <div class="col-3">
                                <b>'.$inmueRes["direccion"].'</b>
                            </div>
                            <div class="col">
                                <input type"button" value="Renovación" class="botones btn btn-primary" onclick="btnRevConst('.$expNo.')"/>
                                <input type"button" value="Modificar" class="botones btn btn-primary" onclick="mostTipModif('.$expNo.')"/>';
                                if($pagosRes["fechaPagos"]){
                                    echo'<input type"button" value="Ver pagos" onclick="btnPagos()" class="botones btn btn-primary" />';
                                }
                                
                                if($fechaPag[0] < date("Y")){
                                    echo '<input type"button" value="Pagar" onclick="btnPagar()" class="botones btn btn-primary" />';
                                }
                            echo'
                                <input type"button" value="Eliminar" onclick="btnElimInmue('.$expNo.')" class="botones btn btn-primary" />
                                <input type="hidden" value="'.$expedCount["n_expediente"].'" id="expBuscar" />
                                <input type="hidden" value="'.$this->tipoBuscar.'" id="tipoBuscar" />
                            </div>
                        </div>
                        
                    ';


                }
                while($expedCount2 = $resExpEmp->fetch_array()){
                    $idExp = $expBusRes["id"];
                    $idPropie = $expBusRes["fk_propietario"];
                    $idInmuebles = $expBusRes["fk_inmueble"];
                    $noExp = $expedCount["n_expediente"];
                    $expNo ="'".$noExp."'";

                    $pagosSQL2 = "SELECT * FROM pagos where fk_expedient='".$expedCount2["n_expediente"]."' AND tipo='EMPADRONAMIENTO' ORDER BY fechaPagos DESC";
                    $resPagos2 = $link->query($pagosSQL2);
                    $pagosRes2 = $resPagos2->fetch_array();

                    $inmueSQL2 = "SELECT * FROM inmueble where id=".$expedCount2["fk_inmueble"]."";
                    $resInmue2 = $link->query($inmueSQL2);
                    $inmueRes2 = $resInmue2->fetch_array();

                    $caracInmueSQL2 = "SELECT * FROM carc_inmueble where id='".$inmueRes2["fk_carac_inmuebles"]."'";
                    $resCaracInmue2 = $link->query($caracInmueSQL2);
                    $caracInmueRes2 = $resCaracInmue2->fetch_array();

                    $fechaPag2 = explode('-',$pagosRes2["fechaPagos"]);
                    echo'

                        <div class="row">
                            <div class="col-1">
                                <b>'.$expedCount2["n_expediente"].'</b>
                            </div>
                            <div class="col-1">
                                <b>'.$pagosRes2["fechaPagos"].'</b>
                            </div>
                            <div class="col-1">
                                <b>'.$caracInmueRes2["uso"].'</b>
                            </div>
                            <div class="col-3">
                                <b>'.$inmueRes2["direccion"].'</b>
                            </div>
                            <div class="col">
                                <input type"button" value="Renovación" class="botones btn btn-primary" onclick="btnRevConst('.$expNo.')"/>
                                <input type"button" value="Modificar" class="botones btn btn-primary" onclick="mostTipModif('.$expNo.')"/>';
                                if($pagosRes2["fechaPagos"]){
                                    echo'<input type"button" value="Ver pagos" onclick="btnPagos()" class="botones btn btn-primary" />';
                                }
                                
                                if($fechaPag2[0] < date("Y")){
                                    echo '<input type"button" value="Pagar" onclick="btnPagar()" class="botones btn btn-primary" />';
                                }
                            echo'
                                <input type"button" value="Eliminar" onclick="btnElimInmue('.$expNo.')" class="botones btn btn-primary" />
                                 <input type="hidden" value="'.$expedCount2["n_expediente"].'" id="expBuscar2" />
                                <input type="hidden" value="'.$this->tipoBuscar.'" id="tipoBuscar" />
                            </div>
                        </div>
                        
                    ';


                }
                echo'
                    </div>
                </div>
                <div id="MostResult"></div>
                ';
            }else{
                echo'
                    <b>CEDULA NO SE ENCUENTRA REGISTRADA</b>
                ';
            }
        }
        if($this->tipoBuscar=="Rif"){

            $cedulaFull = ''.$this->tipoCed.'|'.$this->campBuscar.'';
            //BUSQUEDA PROPIETARIO
                $propSql = "SELECT * FROM propietarios where rif='".$cedulaFull."'";
                $resProp = $link->query($propSql);
                $propRes = $resProp->fetch_array();
            if($propRes["id"]!=0){
                //BUSQUEDA EXPEDIENTE
                $expediSql = "SELECT * FROM expediente where fk_propietario=".$propRes["id"]." ORDER BY fecha ASC";
                $resBusExp= $link->query($expediSql);
                $tipo = "normal";

                $expEmpadroSql = "SELECT * FROM expempadro where fk_propietario=".$propRes["id"]." ORDER BY fecha ASC";
                $resExpEmp = $link->query($expEmpadroSql);
                $idExp = $expEmpRes["id"];
                $idPropie = $expEmpRes["fk_propietario"];
                $idInmuebles = $expEmpRes["fk_inmueble"];
                $tipo = "EMPADRONAMIENTO";

                echo'
                    <div class="container-fluid" id="BusqueDart">
                            <div class="row">
                                <div class="col">
                                    <h2>Resultado</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <b>Propietario</b>
                                </div>
                                <div class="col">
                                    <b>'.$propRes["nombre"].' '.$propRes["apellido"].'</b>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-1">
                                        <b>Expediente</b>
                                    </div>
                                    <div class="col-1">
                                        <b>Fecha Pago</b>
                                    </div>
                                    <div class="col-1">
                                        <b>Uso del Inmueble</b>
                                    </div>
                                    <div class="col-3">
                                        <b>Dirección</b>
                                    </div>
                                    <div class="col">
                                        <b>Acción</b>
                                    </div>
                                </div>
                            
                ';

                while($expedCount = $resBusExp->fetch_array()){
                    $idExp = $expBusRes["id"];
                    $idPropie = $expBusRes["fk_propietario"];
                    $idInmuebles = $expBusRes["fk_inmueble"];
                    $noExp = $expedCount["n_expediente"];
                    $expNo ="'".$noExp."'";


                    $pagosSQL = "SELECT * FROM pagos where fk_expedient='".$expedCount["n_expediente"]."' AND tipo='normal' ORDER BY fechaPagos DESC";
                    $resPagos = $link->query($pagosSQL);
                    $pagosRes = $resPagos->fetch_array();

                    $inmueSQL = "SELECT * FROM inmueble where id=".$expedCount["fk_inmueble"]."";
                    $resInmue = $link->query($inmueSQL);
                    $inmueRes = $resInmue->fetch_array();

                    $caracInmueSQL = "SELECT * FROM carc_inmueble where id='".$inmueRes["fk_carac_inmuebles"]."'";
                    $resCaracInmue = $link->query($caracInmueSQL);
                    $caracInmueRes = $resCaracInmue->fetch_array();

                    $fechaPag = explode('-',$pagosRes["fechaPagos"]);
                    echo'

                        <div class="row">
                            <div class="col-1">
                                <b>'.$expedCount["n_expediente"].'</b>
                            </div>
                            <div class="col-1">
                                <b>'.$pagosRes["fechaPagos"].'</b>
                            </div>
                            <div class="col-1">
                                <b>'.$caracInmueRes["uso"].'</b>
                            </div>
                            <div class="col-3">
                                <b>'.$inmueRes["direccion"].'</b>
                            </div>
                            <div class="col">
                                <input type"button" value="Renovación" class="botones btn btn-primary" onclick="btnRevConst('.$noExp.')"/>
                                <input type"button" value="Modificar" class="botones btn btn-primary" onclick="mostTipModif('. $noExp.')"/>';
                                if($pagosRes["fechaPagos"]){
                                    echo'<input type"button" value="Ver pagos" onclick="btnPagos()" class="botones btn btn-primary" />';
                                }
                                
                                if($fechaPag[0] < date("Y")){
                                    echo '<input type"button" value="Pagar" onclick="btnPagar()" class="botones btn btn-primary" />';
                                }
                            echo'
                                <input type"button" value="Eliminar" onclick="btnElimInmue('.$expNo.')" class="botones btn btn-primary" />
                                <input type="hidden" value="'.$expNo.'" id="expBuscar" />
                                <input type="hidden" value="'.$this->tipoBuscar.'" id="tipoBuscar" />
                            </div>
                        </div>
                        
                    ';


                }
                while($expedCount2 = $resExpEmp->fetch_array()){
                    $idExp = $expBusRes["id"];
                    $idPropie = $expBusRes["fk_propietario"];
                    $idInmuebles = $expBusRes["fk_inmueble"];
                    $noExp = $expedCount2["n_expediente"];
                    $expNo ="'".$noExp."'";

                    $pagosSQL2 = "SELECT * FROM pagos where fk_expedient='".$expedCount2["n_expediente"]."' AND tipo='EMPADRONAMIENTO' ORDER BY fechaPagos DESC";
                    $resPagos2 = $link->query($pagosSQL2);
                    $pagosRes2 = $resPagos2->fetch_array();

                    $inmueSQL2 = "SELECT * FROM inmueble where id=".$expedCount2["fk_inmueble"]."";
                    $resInmue2 = $link->query($inmueSQL2);
                    $inmueRes2 = $resInmue2->fetch_array();

                    $caracInmueSQL2 = "SELECT * FROM carc_inmueble where id='".$inmueRes2["fk_carac_inmuebles"]."'";
                    $resCaracInmue2 = $link->query($caracInmueSQL2);
                    $caracInmueRes2 = $resCaracInmue2->fetch_array();

                    $fechaPag2 = explode('-',$pagosRes2["fechaPagos"]);
                    echo'

                        <div class="row">
                            <div class="col-1">
                                <b>'.$expedCount2["n_expediente"].'</b>
                            </div>
                            <div class="col-1">
                                <b>'.$pagosRes2["fechaPagos"].'</b>
                            </div>
                            <div class="col-1">
                                <b>'.$caracInmueRes2["uso"].'</b>
                            </div>
                            <div class="col-3">
                                <b>'.$inmueRes2["direccion"].'</b>
                            </div>
                            <div class="col">
                                <input type"button" value="Renovación" class="botones btn btn-primary" onclick="btnRevConst('.$expNo.')"/>
                                <input type"button" value="Modificar" class="botones btn btn-primary" onclick="mostTipModif('.$expNo.')"/>';
                                if($pagosRes2["fechaPagos"]){
                                    echo'<input type"button" value="Ver pagos" onclick="btnPagos()" class="botones btn btn-primary" />';
                                }
                                
                                if($fechaPag2[0] < date("Y")){
                                    echo '<input type"button" value="Pagar" onclick="btnPagar()" class="botones btn btn-primary" />';
                                }
                            echo'
                                <input type"button" value="Eliminar" onclick="btnElimInmue('.$expNo.')" class="botones btn btn-primary" />
                                 <input type="hidden" value="'.$expNo.'" id="expBuscar2" />
                                <input type="hidden" value="'.$this->tipoBuscar.'" id="tipoBuscar" />
                            </div>
                        </div>
                        
                    ';


                }
                echo'
                    </div>
                </div>
                <div id="MostResult"></div>
                ';
            }else{
                echo'
                    <b>CEDULA NO SE ENCUENTRA REGISTRADA</b>
                ';
            }
       
        }
    }
//MODIFICACIONES DE DATOS
    function mostModif(){
        echo'
            <select id="secciones" onChange="btnFormCambios()">
                <option value="0"></option>
                <option value="Propietario">Datos del Propietario</option>
                <option value="Inmueble">Datos del Inmueble</option>
                <option value="Caract Terreno">Caracteristicas del Terreno</option>
                <option value="Caract Construccion">Caracteristicas de la Construcción</option>
                <option value="Protocolizacion">Datos de Protocolizacion</option>
                <option value="conservacion">Estado de Conservacion</option>
                <option value="Piezas">Piezas Sanitarias</option>
                <option value="Puertas">Puertas</option>
                <option value="ambientes">Ambientes</option>
                <option value="LinderosDoc">Linderos Segun Documento</option>
                <option value="LinderosInspec">Linderos Segun Inspeccion</option>
                <option value="LinderosVenta">Linderos Posible Venta</option>
                <option value="Servicios">Servicios</option>
                <option value="Factura">Datos de la Factura</option>
            </select>
            <input type="hidden" value="'.$this->expBuscar.'" id="expeBus">
            <div id="modificaciones"></div>
            <div id="identifiId"></div>
            <div id="identifiId2"></div>
            <div id="identifiId3"></div>';
    }
    //INMUEBLE LISTO
        function modifInmueble(){
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();
            //BUSQUEDA DEL EXPEDIENTE
                $expSql = "SELECT * FROM expediente where n_expediente=".$this->expBuscar."";
                $resExp = $link->query($expSql);
                $expRes = $resExp->fetch_assoc();
                if($expRes["id"]!=0){
                    $idInmue = $expRes["fk_inmueble"];
                }else{
                    $expEmpSQL = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
                    $resEmpExp = $link->query($expEmpSQL);
                    $expEmpRes = $resEmpExp->fetch_array();
                    $idInmue = $expEmpRes["fk_inmueble"];
                }
            //BUSQUEDA DEL INMUEBLE
                $inmuSql = "SELECT * FROM inmueble where id=".$idInmue."";
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
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();
            $inmueSql = "UPDATE inmueble SET direccion='".$this->direcInmue."',parroquia='".$this->parrInmue."',sector='".$this->secInmue."',ambito='".$this->ambInmue."' WHERE id='".$this->idInmueble."' ";
            $link->query($inmueSql);
            echo 'ACTUALIZADO CON EXITO';
        }
        function eliminarBus(){
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();
            //BUSQUEDA DE EXPEDIENTE
                $expSql = "SELECT * FROM expediente where n_expediente='".$this->expBuscar."'";
                $resExp = $link->query($expSql);
                $expRes = $resExp->fetch_assoc();
                if($expRes["id"]!=0){
                    $idInmue = $expRes["fk_inmueble"];
                    $idExp = $expRes["n_expediente"];
                    $tipo = "normal";
                }else{
                    $expEmpSQL = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
                    echo $expEmpSQL;
                    $resEmpExp = $link->query($expEmpSQL);
                    $expEmpRes = $resEmpExp->fetch_array();
                    $idInmue = $expEmpRes["fk_inmueble"];
                    $idExp = $expEmpRes["n_expediente"];
                    $tipo = "EMPADRONAMIENTO";
                }
            //BUSQUEDA DE INMUEBLE
                $inmueSql = "SELECT * FROM inmueble where id=".$idInmue."";
                $resInmue = $link->query($inmueSql);
                $inmueRes = $resInmue->fetch_assoc();
            //BUSQUEDA DE PAGOS
                $pagos = "SELECT * FROM pagos where fk_expedient='".$idExp."' AND tipo='".$tipo."'";
                $resPagos = $link->query($pagos);
                $pagosRes = $resPagos->fetch_array();
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
                if($tipo=="EMPADRONAMIENTO"){
                    $elimSql = "DELETE FROM expempadro where n_expediente='".$idExp."'";
                    $link->query($elimSql);
                }else{
                    $elimSql = "DELETE FROM expediente where n_expediente='".$idExp."'";
                    $link->query($elimSql);
                }
                echo '
                <h2>EXPEDIENTE ELIMINADO CON EXITO</h2>
                ';
        }
    //CARACTERISTICAS DEL INMUEBLE LISTO
        function modifcarcTerreno(){
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();
            //BUSQUEDA DEL EXPEDIENTE
                $expSql = "SELECT * FROM expediente where n_expediente=".$this->expBuscar."";
                $resExp = $link->query($expSql);
                $expRes = $resExp->fetch_assoc();
                if($expRes["id"]!=0){
                    $idInmue = $expRes["fk_inmueble"];
                }else{
                    $expEmpSQL = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
                    $resEmpExp = $link->query($expEmpSQL);
                    $expEmpRes = $resEmpExp->fetch_array();
                    $idInmue = $expEmpRes["fk_inmueble"];
                }
            //BUSQUEDA DEL INMUEBLE
                $inmuSql = "SELECT * FROM inmueble where id=".$idInmue."";
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
           include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();
            $inmueSql = "UPDATE carc_inmueble SET topografia='".$this->topoConst."',forma='".$this->formaConst."',uso='".$this->usoConst."',tenencia='".$this->tenenConst."' WHERE id='".$this->idCarac."' ";
            $link->query($inmueSql);
            echo 'ACTUALIZADO CON EXITO';
        }
    //PROPIETARIO LISTO
        function modifPropietario(){
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();
            //BUSCAR EXPEDIENTE
                $busExped = "SELECT * FROM expediente where n_expediente='".$this->expBuscar."'";
                $resExped = $link->query($busExped);
                $expedRes = $resExped->fetch_array();
                if($expedRes["id"]!=0){
                    $idProp = $expedRes["fk_propietario"];
                }else{
                    $expEmpSQL = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
                    $resEmpExp = $link->query($expEmpSQL);
                    $expEmpRes = $resEmpExp->fetch_array();
                    $idProp = $expEmpRes["fk_propietario"];
                }
                
            //BUSCAR PROPIETARIO
                $propSql = "SELECT * FROM propietarios where id=".$idProp."";
                echo $propSql;
                $resProp = $link->query($propSql);
                $propRes = $resProp->fetch_array();
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
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();
            $propSql = "UPDATE propietarios SET cedula='".$this->cedula."',rif='".$this->rif."',nombre='".$this->nomProp."',apellido='".$this->apelProp."',telef='".$this->telefono."',dir_hab='".$this->direcProp."',telef_hab='".$this->telefono2."' WHERE cedula='".$this->cedula2."' ";
            $link->query($propSql);
            echo 'ACTUALIZADO CON EXITO';
        }
    //CARACTERISTICAS DE LA CONSTRUCCION
        function modifcarcConstruccion(){
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();
            //BUSQUEDA DEL EXPEDIENTE
                $expSql = "SELECT * FROM expediente where n_expediente='".$this->expBuscar."'";
                $resExp = $link->query($expSql);
                $expRes = $resExp->fetch_assoc();
                if($expRes["id"]!=0){
                    $idInmue = $expRes["fk_inmueble"];
                }else{
                    $expEmpSQL = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
                    $resEmpExp = $link->query($expEmpSQL);
                    $expEmpRes = $resEmpExp->fetch_array();
                    $idInmue = $expEmpRes["fk_inmueble"];
                }
            //BUSQUEDA DEL INMUEBLE
                $inmuSql = "SELECT * FROM inmueble where id=".$idInmue."";
                $resInmue = $link->query($inmuSql);
                $inmueRes = $resInmue->fetch_assoc();
            //BUSQUEDA CARAC. INMUEBLE
                $inmuCaracSql = "SELECT * FROM caracteristicas_construccion where id=".$inmueRes["fk_carac_construccion"]."";
                $inmuCarac = $link->query($inmuCaracSql);
                $caracInmu = $inmuCarac->fetch_assoc();
            echo'
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
                            <select id="destConst">';
                            if($caracInmu["destino"]){
                               echo' <option value="'.$caracInmu["destino"].'">'.$caracInmu["destino"].'</option>';
                            }
                            echo'
                                <option value="0"></option>
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
                    </td>
                    <td >
                        <div class="campDat">
                            <p class="negritas">Estructura</p>
                            <select id="estConst">';
                                if($caracInmu["estructura"]){
                                   echo' <option value="'.$caracInmu["estructura"].'">'.$caracInmu["estructura"].'</option>';
                                }
                                echo'
                                <option value="0"></option>
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
                    </td>
                    <td >
                        <div class="campDat">
                            <p class="negritas">Paredes</p>';
                            if($caracInmu["paredes_tipo"]){
                               echo' <option value="'.$caracInmu["paredes_tipo"].'">'.$caracInmu["paredes_tipo"].'</option>';
                            }
                            echo'<select id="pareTipoInmue">
                                <option value="">Tipo</option>
                                <option value="NO APLICA">NO APLICA</option>
                                <option value="Concreto">Ladrillo</option>
                                <option value="Metalica">Bloque</option>
                                <option value="Madera">Adobe Tapia</option>
                                <option value="Concreto">Bahareque</option>
                                <option value="Metalica">Madera</option>
                                <option value="Madera">Prefabricado</option>
                            </select>
                            <select id="pareAcaInmue">';
                            if($caracInmu["paredes_acabado"]){
                               echo' <option value="'.$caracInmu["paredes_acabado"].'">'.$caracInmu["paredes_acabado"].'</option>';
                            }
                            echo'
                                <option value="0">Acabado</option>
                                <option value="NO APLICA">NO APLICA</option>
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
                            <select id="pintConst">';
                            if($caracInmu["pintura"]){
                               echo' <option value="'.$caracInmu["pintura"].'">'.$caracInmu["pintura"].'</option>';
                            }
                            echo '
                                <option value="0"></option>
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
                    </td>
                    
                    <td>
                        <div class="campDat">
                            <p class="negritas">Techo</p>
                            <select id="techoConst">';
                            if($caracInmu["techo"]){
                               echo' <option value="'.$caracInmu["techo"].'">'.$caracInmu["techo"].'</option>';
                            }
                            echo '
                                <option value="0"></option>
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
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="campDat">
                            <p class="negritas">Pisos</p>
                            <select id="pisosConst">';
                            if($caracInmu["pisos"]){
                               echo' <option value="'.$caracInmu["pisos"].'">'.$caracInmu["pisos"].'</option>';
                            }
                            echo'
                                <option value="0"></option>
                                <option value="NO APLICA">NO APLICA</option>
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
                            <select id="ventConst">';
                            if($caracInmu["ventanas"]){
                               echo' <option value="'.$caracInmu["ventanas"].'">'.$caracInmu["ventanas"].'</option>';
                            }
                            echo'
                                <option value="0"></option>
                                <option value="NO APLICA">NO APLICA</option>
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
                            <select id="instElect">';
                            if($caracInmu["insta_electricas"]){
                               echo' <option value="'.$caracInmu["insta_electricas"].'">'.$caracInmu["insta_electricas"].'</option>';
                            }
                            echo'
                                <option value="0"></option>
                                <option value="NO APLICA">NO APLICA</option>
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
                            <select id="regInmue">';
                            if($caracInmu["Regimen"]){
                               echo' <option value="'.$caracInmu["Regimen"].'">'.$caracInmu["Regimen"].'</option>';
                            }
                            echo'
                                <option value="0"></option>
                                <option value="NO APLICA">NO APLICA</option>
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
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();
            $inmueSql = "UPDATE caracteristicas_construccion SET destino='".$this->destConst."',estructura='".$this->estConst."',paredes_tipo='".$this->pareTipoInmue."',paredes_acabado='".$this->pareAcaInmue."',pintura='".$this->pintConst."',techo='".$this->techoConst."',pisos='".$this->pisosConst."',ventanas='".$this->ventConst."',insta_electricas='".$this->instElect."',observ='".$this->obsConst."', Regimen='".$this->regInmue."' WHERE id='".$this->idCaracConst."' ";
            $link->query($inmueSql);
            echo 'ACTUALIZADO CON EXITO';
        }
    //DATOS DE PROTOCOLIZACION
        function modificarProtocol(){
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();
            //BUSQUEDA DEL EXPEDIENTE
                $expSql = "SELECT * FROM expediente where n_expediente='".$this->expBuscar."'";
                $resExp = $link->query($expSql);
                $expRes = $resExp->fetch_assoc();
                if($expRes["id"]!=0){
                    $idInmue = $expRes["fk_inmueble"];
                }else{
                    $expEmpSQL = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
                    $resEmpExp = $link->query($expEmpSQL);
                    $expEmpRes = $resEmpExp->fetch_array();
                    $idInmue = $expEmpRes["fk_inmueble"];
                }
            //BUSQUEDA DEL INMUEBLE
                $inmuSql = "SELECT * FROM inmueble where id=".$idInmue."";
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
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();
            $inmueSql = "UPDATE datos_protocolizacion SET documento='".$this->docDebConst."',direccion='".$this->direcProtConst."',numero='".$this->numProtConst."',tomo='".$this->tomoProtConst."',folio='".$this->folioProtConst."',protocolo='".$this->protoConst."',trimestre='".$this->trimProtConst."',fecha='".$this->dateProtConst."',valor_inmueble='".$this->valorProtConst."' WHERE id='".$this->idProto."' ";
            $link->query($inmueSql);
            echo 'ACTUALIZADO CON EXITO';
        }
    //ESTADO DE CONSERVACION
        function modifEstConserv(){
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();

            $expSQL = "SELECT * FROM expediente where n_expediente='".$this->expBuscar."'";
            $resExp = $link->query($expSQL);
            $expRes = $resExp->fetch_array();
            if($expRes["id"]!=0){
                $idInmue = $expRes["fk_inmueble"];
            }else{
                $expEmpSQL = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
                $resEmpExp = $link->query($expEmpSQL);
                $expEmpRes = $resEmpExp->fetch_array();
                $idInmue = $expEmpRes["fk_inmueble"];
            }
            $inmueSQL = "SELECT * FROM inmueble where id=".$idInmue."";
            $resInmue = $link->query($inmueSQL);
            $inmueRes = $resInmue->fetch_array();

            $caraConstSQL = "SELECT * FROM caracteristicas_construccion where id=".$inmueRes["fk_carac_construccion"]."";
            $resCaraConst = $link->query($caraConstSQL);
            $caraConstRes = $resCaraConst->fetch_array();

            $estConSQL = "SELECT * FROM estado_conservacion where id=".$caraConstRes["fk_estadoConserv"]."";
            $resEstConst = $link->query($estConSQL);
            $estConstRes = $resEstConst->fetch_array();

            
            echo'<div class="container-fluid">
            <div class="row">
                <div class="col">
                    <p class="h1">Estado de Conservación</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <b>Año de Construcción</b>
                    <input type="text" value="'.$estConstRes["ano_construccion"].'" id="ano_construc">
                </div>
                <div class="col">
                    <b>Año de Refacción</b>
                    <input type="text" value="'.$estConstRes["ano_refaccion"].'"id="ano_refac">
                </div>
                <div class="col">
                    <b>Edad Efectiva</b>
                    <input type="text" value="'.$estConstRes["edad_efectiva"].'"id="edadEfec"/>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <b>Nº de planta</b>
                    <input type="text" value="'.$estConstRes["nro_planta"].'" id="numPlata" />
                </div>
                <div class="col">
                    <b>Nº de Vivienda</b>
                    <input type="text" value="'.$estConstRes["nro_vivienda"].'" id="numVivienda" />
                </div>
            </div>
            </div>
            <div class="btnSig1">
                <input type="button" value="Siguiente" onclick="btnActConserv()" class="botones btn btn-primary" />
            </div';
        }
        function actEstConst(){
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();

            $expSQL = "SELECT * FROM expediente where n_expediente='".$this->expBuscar."'";
            $resExp = $link->query($expSQL);
            $expRes = $resExp->fetch_array();
            if($expRes["id"]!=0){
                $idInmue = $expRes["fk_inmueble"];
            }else{
                $expEmpSQL = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
                $resEmpExp = $link->query($expEmpSQL);
                $expEmpRes = $resEmpExp->fetch_array();
                $idInmue = $expEmpRes["fk_inmueble"];
            }
                $inmueSQL = "SELECT * FROM inmueble where id=".$idInmue."";
                $resInmue = $link->query($inmueSQL);
                $inmueRes = $resInmue->fetch_array();

                $caraConstSQL = "SELECT * FROM caracteristicas_construccion where id=".$inmueRes["fk_carac_construccion"]."";
                $resCaraConst = $link->query($caraConstSQL);
                $caraConstRes = $resCaraConst->fetch_array();

                $actEstSQL = "UPDATE estado_conservacion SET ano_construccion=".$this->ano_construc.",ano_refaccion=".$this->ano_refac.",edad_efectiva=".$this->edadEfec.",nro_planta=".$this->numPlata.",nro_vivienda=".$this->numVivienda." where id=".$caraConstRes["fk_estadoConserv"]."";
                $resActEst = $link->query($actEstSQL);
            
        }
    //PIEZAS SANITARIAS
        function mostPiezSant(){
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();

            $expSQL = "SELECT * FROM expediente where n_expediente='".$this->expBuscar."'";
            $resExp = $link->query($expSQL);
            $expRes = $resExp->fetch_array();
            if($expRes["id"]!=0){
                $idInmue = $expRes["fk_inmueble"];
            }else{
                $expEmpSQL = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
                $resEmpExp = $link->query($expEmpSQL);
                $expEmpRes = $resEmpExp->fetch_array();
                $idInmue = $expEmpRes["fk_inmueble"];
            }
            $inmueSQL = "SELECT * FROM inmueble where id=".$idInmue."";
            $resInmue = $link->query($inmueSQL);
            $inmueRes = $resInmue->fetch_array();

            $caraConstSQL = "SELECT * FROM caracteristicas_construccion where id=".$inmueRes["fk_carac_construccion"]."";
            $resCaraConst = $link->query($caraConstSQL);
            $caraConstRes = $resCaraConst->fetch_array();

            $estConSQL = "SELECT * FROM piezas_sanitarias where id=".$caraConstRes["fk_piezasSanitarias"]."";
            $resEstConst = $link->query($estConSQL);
            $estConstRes = $resEstConst->fetch_array();
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
                        <select id="porFina">';
                            if($estConstRes["porcelana_fina"]){
                                echo'
                                    <option value="'.$estConstRes["porcelana_fina"].'">'.$estConstRes["porcelana_fina"].'</option>
                                ';
                            }
                        echo'
                            
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Porcelana Econ.</b>
                        <select id="porceEcon">';
                            if($estConstRes["porcelana_econ"]){
                                echo'
                                    <option value="'.$estConstRes["porcelana_econ"].'">'.$estConstRes["porcelana_econ"].'</option>
                                ';
                            }
                            echo'
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Bañera</b>
                        <select id="banera">';

                            if($estConstRes["banera"]){
                                echo'
                                    <option value="'.$estConstRes["banera"].'">'.$estConstRes["banera"].'</option>
                                ';
                            }
                            echo'
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Calentador</b>
                        <select id="calentador">';
                            if($estConstRes["calentador"]){
                                echo'
                                    <option value="'.$estConstRes["calentador"].'">'.$estConstRes["calentador"].'</option>
                                ';
                            }
                        echo'
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <b>W.C.</b>
                        <select id="wc">';
                            if($estConstRes["wc"]){
                                echo'
                                    <option value="'.$estConstRes["wc"].'">'.$estConstRes["wc"].'</option>
                                ';
                            }
                        echo'
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Bidet</b>
                        <select id="bidet">';
                            if($estConstRes["bidet"]){
                                echo'
                                    <option value="'.$estConstRes["bidet"].'">'.$estConstRes["bidet"].'</option>
                                ';
                            }
                        echo'
                            <option value="'.$piezSanRes["bidet"].'">'.$piezSanRes["bidet"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Lavamanos</b>
                        <select id="lavamanos">';
                            if($estConstRes["lavamanos"]){
                                echo'
                                    <option value="'.$estConstRes["lavamanos"].'">'.$estConstRes["lavamanos"].'</option>
                                ';
                            }
                        echo'
                            <option value="'.$piezSanRes["lavamanos"].'">'.$piezSanRes["lavamanos"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Ducha</b>
                        <select id="ducha">';
                            if($estConstRes["ducha"]){
                                echo'
                                    <option value="'.$estConstRes["ducha"].'">'.$estConstRes["ducha"].'</option>
                                ';
                            }
                        echo'
                            <option value="'.$piezSanRes["ducha"].'">'.$piezSanRes["ducha"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Urinario</b>
                        <select id="urinario">';
                            if($estConstRes["urinario"]){
                                echo'
                                    <option value="'.$estConstRes["urinario"].'">'.$estConstRes["urinario"].'</option>
                                ';
                            }
                        echo'
                            <option value="'.$piezSanRes["urinario"].'">'.$piezSanRes["urinario"].'</option>
                            <option value="N/A">N/A</option>s
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="btnSig1">
                <input type="button" value="Actualizar" onclick="btnActPiez()" class="botones btn btn-primary" />
            </div>
            ';
        }
        function actPiez(){
           include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();

            $expSQL = "SELECT * FROM expediente where n_expediente='".$this->expBuscar."'";
            $resExp = $link->query($expSQL);
            $expRes = $resExp->fetch_array();
            if($expRes["id"]!=0){
                $idInmue = $expRes["fk_inmueble"];
            }else{
                $expEmpSQL = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
                $resEmpExp = $link->query($expEmpSQL);
                $expEmpRes = $resEmpExp->fetch_array();
                $idInmue = $expEmpRes["fk_inmueble"];
            }
                $inmueSQL = "SELECT * FROM inmueble where id=".$idInmue."";
                $resInmue = $link->query($inmueSQL);
                $inmueRes = $resInmue->fetch_array();

                $caraConstSQL = "SELECT * FROM caracteristicas_construccion where id=".$inmueRes["fk_carac_construccion"]."";
                $resCaraConst = $link->query($caraConstSQL);
                $caraConstRes = $resCaraConst->fetch_array();

                $actEstSQL = "UPDATE piezas_sanitarias SET porcelana_fina='".$this->porFina."',porcelana_econ='".$this->porceEcon."',banera='".$this->banera."',calentador='".$this->calentador."',wc='".$this->wc."',bidet='".$this->bidet."',lavamanos='".$lavamanos."',ducha='".$this->ducha."',urinario='".$this->urinario."' where id=".$caraConstRes["fk_piezasSanitarias"]."";
                $resActEst = $link->query($actEstSQL); 

        }
    //PUERTAS
        function mostPuert(){
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();

            $expSQL = "SELECT * FROM expediente where n_expediente='".$this->expBuscar."'";
            $resExp = $link->query($expSQL);
            $expRes = $resExp->fetch_array();
            if($expRes["id"]!=0){
                $idInmue = $expRes["fk_inmueble"];
            }else{
                $expEmpSQL = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
                $resEmpExp = $link->query($expEmpSQL);
                $expEmpRes = $resEmpExp->fetch_array();
                $idInmue = $expEmpRes["fk_inmueble"];
            }
            $inmueSQL = "SELECT * FROM inmueble where id=".$idInmue."";
            $resInmue = $link->query($inmueSQL);
            $inmueRes = $resInmue->fetch_array();

            $caraConstSQL = "SELECT * FROM caracteristicas_construccion where id=".$inmueRes["fk_carac_construccion"]."";
            $resCaraConst = $link->query($caraConstSQL);
            $caraConstRes = $resCaraConst->fetch_array();

            $estConSQL = "SELECT * FROM puertas where id=".$caraConstRes["fk_puertas"]."";
            $resEstConst = $link->query($estConSQL);
            $estConstRes = $resEstConst->fetch_array();

            echo'
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
                            <option value="'.$estConstRes["entamborada_fina"].'">'.$estConstRes["entamborada_fina"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Ent. Economica</b>
                        <select id="entamEcon">
                            <option value="'.$estConstRes["ent_econo"].'">'.$estConstRes["ent_econo"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Madera cepillada</b>
                        <select id="madeCepil">
                            <option value="'.$estConstRes["madera_cepi"].'">'.$estConstRes["madera_cepi"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col">
                        <b>Hierro</b>
                        <select id="hierro">
                            <option value="'.$estConstRes["hierro"].'">'.$estConstRes["hierro"].'</option>
                            <option value="N/A">N/A</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="btnSig1">
                <input type="button" value="Actualizar" onclick="btnActPuertas()" class="botones btn btn-primary" />
            </div>
            ';
        }
        function actPuertas(){
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();

            $expSQL = "SELECT * FROM expediente where n_expediente='".$this->expBuscar."'";
            $resExp = $link->query($expSQL);
            $expRes = $resExp->fetch_array();
            if($expRes["id"]!=0){
                $idInmue = $expRes["fk_inmueble"];
            }else{
                $expEmpSQL = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
                $resEmpExp = $link->query($expEmpSQL);
                $expEmpRes = $resEmpExp->fetch_array();
                $idInmue = $expEmpRes["fk_inmueble"];
            }
                $inmueSQL = "SELECT * FROM inmueble where id=".$idInmue."";
                $resInmue = $link->query($inmueSQL);
                $inmueRes = $resInmue->fetch_array();

                $caraConstSQL = "SELECT * FROM caracteristicas_construccion where id=".$inmueRes["fk_carac_construccion"]."";
                $resCaraConst = $link->query($caraConstSQL);
                $caraConstRes = $resCaraConst->fetch_array();

                $actEstSQL = "UPDATE puertas SET entamborada_fina='".$this->entamFina."',ent_econo='".$this->entamEcon."',madera_cepi='".$this->madeCepil."',hierro='".$this->hierro."' where id=".$caraConstRes["fk_puertas"]."";
                $resActEst = $link->query($actEstSQL);
        }
    //AMBIENTE
        function mostAmbien(){
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();

            $expSQL = "SELECT * FROM expediente where n_expediente='".$this->expBuscar."'";
            $resExp = $link->query($expSQL);
            $expRes = $resExp->fetch_array();
            if($expRes["id"]!=0){
                $idInmue = $expRes["fk_inmueble"];
            }else{
                $expEmpSQL = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
                $resEmpExp = $link->query($expEmpSQL);
                $expEmpRes = $resEmpExp->fetch_array();
                $idInmue = $expEmpRes["fk_inmueble"];
            }
            $inmueSQL = "SELECT * FROM inmueble where id=".$idInmue."";
            $resInmue = $link->query($inmueSQL);
            $inmueRes = $resInmue->fetch_array();

            $caraConstSQL = "SELECT * FROM caracteristicas_construccion where id=".$inmueRes["fk_carac_construccion"]."";
            $resCaraConst = $link->query($caraConstSQL);
            $caraConstRes = $resCaraConst->fetch_array();

            $estConSQL = "SELECT * FROM ambientes where id=".$caraConstRes["fk_ambientes"]."";
            $resEstConst = $link->query($estConSQL);
            $estConstRes = $resEstConst->fetch_array();
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
                    <input type="text" value="'.$estConstRes["dormitorio"].'" class="text" id="dormit">
                </div>
                <div class="col">
                    <b>Comedor</b>
                    <input type="text" value="'.$estConstRes["comedor"].'" class="text" id="comedor">
                </div>
                <div class="col">
                    <b>Sala</b>
                    <input type="text" value="'.$estConstRes["sala"].'" class="text" id="sala">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <b>Baños</b>
                    <input type="text" value="'.$estConstRes["banos"].'" class="text" id="banos" />
                </div>
                <div class="col">
                    <b>Cocina</b>
                    <input type="text" value="'.$estConstRes["cocina"].'" class="text" id="Cocina" />
                </div>
                <div class="col">
                    <b>Servicio</b>
                    <input type="text" value="'.$estConstRes["servicio"].'" class="text" id="Servicio" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <b>Oficina</b>
                    <input type="text" value="'.$estConstRes["oficina"].'" class="text" id="oficina" />
                </div>
                <div class="col">
                    <b>Garaje</b>
                    <input type="text" value="'.$estConstRes["garaje"].'" class="text" id="garaje" />
                </div>
                <div class="col">
                    <b>Estacionamiento</b>
                    <input type="text" value="'.$estConstRes["estacionamiento"].'" class="text" id="estac" />
                </div>
            </div>
            </div>
            <div class="btnSig1">
                <input type="button" value="Guardar" onclick="btnActAmbien()" class="botones btn btn-primary" />
            </div>
            ';
        }
        function actAmbien(){
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();

            $expSQL = "SELECT * FROM expediente where n_expediente='".$this->expBuscar."'";
            $resExp = $link->query($expSQL);
            $expRes = $resExp->fetch_array();
            if($expRes["id"]!=0){
                $idInmue = $expRes["fk_inmueble"];
            }else{
                $expEmpSQL = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
                $resEmpExp = $link->query($expEmpSQL);
                $expEmpRes = $resEmpExp->fetch_array();
                $idInmue = $expEmpRes["fk_inmueble"];
            }
                $inmueSQL = "SELECT * FROM inmueble where id=".$idInmue."";
                $resInmue = $link->query($inmueSQL);
                $inmueRes = $resInmue->fetch_array();

                $caraConstSQL = "SELECT * FROM caracteristicas_construccion where id=".$inmueRes["fk_carac_construccion"]."";
                $resCaraConst = $link->query($caraConstSQL);
                $caraConstRes = $resCaraConst->fetch_array();

                $actEstSQL = "UPDATE ambientes SET dormitorio=".$this->dormit.", comedor=".$this->comedor.", sala=".$this->sala.", banos=".$this->banos.",cocina=".$this->Cocina.", Servicio=".$this->Servicio.", oficina=".$this->oficina.", garaje=".$this->garaje.", estacionamiento=".$this->estac." where id=".$caraConstRes["fk_ambientes"]."";
                $resActEst = $link->query($actEstSQL);
        }
    //LINDEROS INSPECCION
        function mostInsp(){
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();
            //BUSQUEDA DEL EXPEDIENTE
                $expSql = "SELECT * FROM expediente where n_expediente=".$this->expBuscar."";
                $resExp = $link->query($expSql);
                $expRes = $resExp->fetch_assoc();
                if($expRes["id"]!=0){
                    $idInmue = $expRes["fk_inmueble"];
                }else{
                    $expEmpSQL = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
                    $resEmpExp = $link->query($expEmpSQL);
                    $expEmpRes = $resEmpExp->fetch_array();
                    $idInmue = $expEmpRes["fk_inmueble"];
                }
            //BUSQUEDA DEL INMUEBLE
                $inmuSql = "SELECT * FROM inmueble where id=".$idInmue."";
                $resInmue = $link->query($inmuSql);
                $inmueRes = $resInmue->fetch_array();
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
                <input type="hidden" value="0" id="idlindGen">';
            }else{
                //LINDEROS GENERAL
                    $lindGenSql = "SELECT * FROM linderos_general where id=".$inmueRes["fk_lind_general"]."";
                    $resLindGen = $link->query($lindGenSql);
                    $lindGenRes= $resLindGen->fetch_array();

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
                </div>';
            }
                
        }
        function guarActLind(){
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();
            //BUSQUEDA DEL EXPEDIENTE
                $expSql = "SELECT * FROM expediente where n_expediente='".$this->expBuscar."'";
                $resExp = $link->query($expSql);
                $expRes = $resExp->fetch_array();
                if($expRes["id"]!=0){
                    $idInmue = $expRes["fk_inmueble"];
                }else{
                    $expEmpSQL = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
                    $resEmpExp = $link->query($expEmpSQL);
                    $expEmpRes = $resEmpExp->fetch_array();
                    $idInmue = $expEmpRes["fk_inmueble"];
                }
            //BUSQUEDA DEL INMUEBLE
                $inmuSql = "SELECT * FROM inmueble where id=".$idInmue."";
                $resInmue = $link->query($inmuSql);
                $inmueRes = $resInmue->fetch_array();
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
        function mostLindVenta(){
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();
            //BUSQUEDA DEL EXPEDIENTE
                $expSql = "SELECT * FROM expediente where n_expediente='".$this->expBuscar."'";
                $resExp = $link->query($expSql);
                $expRes = $resExp->fetch_assoc();
                if($expRes["id"]!=0){
                    $idInmue = $expRes["fk_inmueble"];
                }else{
                    $expEmpSQL = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
                    $resEmpExp = $link->query($expEmpSQL);
                    $expEmpRes = $resEmpExp->fetch_array();
                    $idInmue = $expEmpRes["fk_inmueble"];
                }
            //BUSQUEDA DEL INMUEBLE
                $inmuSql = "SELECT * FROM inmueble where id=".$idInmue."";
                $resInmue = $link->query($inmuSql);
                $inmueRes = $resInmue->fetch_array();
                if($inmueRes["fk_lind_pos_venta"]){
                    $lindSQL = "SELECT * FROM linderos_posible_venta where id=".$inmueRes["fk_lind_pos_venta"]."";
                    $resLind = $link->query($lindSQL);
                    $lindRes= $resLind->fetch_array();
                }else{
                    $lindSQL = "SELECT * FROM linderos_posible_venta where id='0'";
                    $resLind = $link->query($lindSQL);
                    $lindRes= $resLind->fetch_array();
                }
            //BUSQUEDA DE LINDERO
                

                if($lindRes["norte"]=="nada"){
                    $norte = $lindRes["noreste"];
                    $puntNort = "NorEste";
                }elseif(!$lindRes["norte"]){
                    $norte = "";
                    $puntNort = "";
                }else{
                    $norte = $lindRes["norte"];
                    $puntNort = "Norte";
                }
                if($lindRes["sur"]=="nada"){
                    $sur = $lindRes["sureste"];
                    $puntSur = "SurEste";
                }elseif(!$lindRes["sur"]){
                    $sur = "";
                    $puntSur = "";
                }else{
                    $sur = $lindRes["sur"];
                    $puntSur = "Sur";
                }
                if($lindRes["este"]=="nada"){
                    $este = $lindRes["suroeste"];
                    $puntEste = "SurOeste";
                }elseif(!$lindRes["este"]){
                    $este = "";
                    $puntEste = "";
                }else{
                    $este = $lindRes["este"];
                    $puntEste = "Este";
                }
                if($lindRes["oeste"]=="nada"){
                    $oeste = $lindRes["noroeste"];
                    $puntOeste = "NorOeste";
                }elseif(!$lindRes["oeste"]){
                    $oeste = "";
                    $puntOeste = "   ";
                }else{
                    $oeste = $lindRes["oeste"];
                    $puntOeste = "Oeste";
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
                            <option value='.$puntNort.'>'.$puntNort.'</option>
                            <option value="Norte">Norte</option>
                            <option value="NorteEste">NortEste</option>
                        </select>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-4">
                                <input type="text" value="'.$norte.'" class="text" id="nortPosVenta" />
                                <select id="uniNorte2">';
                                    if($lindRes["uniNorte"]){
                                        echo'
                                            <option value="'.$lindRes["uniNorte"].'">'.$lindRes["uniNorte"].'</option>
                                        ';
                                    }
                                    echo'
                                    <option value="N/A">N/A</option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <b>Alinderado</b>
                                <input type="text" onKeyUp="mayusProp(this)" value="'.$lindRes["alind_n"].'"class="text" id="alindPosNort" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <select id="puntSur2">
                            <option value="'.$puntSur.'">'.$puntSur.'</option>
                            <option value="Sur">Sur</option>
                            <option value="SurEste">SurEste</option>
                        </select>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-4">
                                <input type="text" value="'.$sur.'" class="text" id="surPosVenta" />
                                <select id="uniSur2">';

                                    if($lindRes["uniSur"]){
                                        echo'
                                            <option value="'.$lindRes["uniSur"].'">'.$lindRes["uniSur"].'</option>
                                        ';
                                    }
                                    echo'
                                    <option value="N/A">N/A</option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <b>Alinderado</b>
                                <input type="text" onKeyUp="mayusProp(this)" value="'.$lindRes["alind_s"].'" class="text" id="alindPosSur" />
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <select id="puntEste2">
                            <option value="'.$puntEste.'">'.$puntEste.'</option>
                            <option value="Este">Este</option>
                            <option value="SurOeste">SurOeste</option>
                        </select>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-4">
                                <input type="text" value="'.$este.'" class="text" id="estePosVenta" />
                                <select id="uniEste2">
                                    <option value="'.$lindRes["uniEste"].'">'.$lindRes["uniEste"].'</option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <b>Alinderado</b>
                                <input type="text" onKeyUp="mayusProp(this)" value="'.$lindRes["alind_e"].'" class="text" id="alindPosEste" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <select id="puntOeste2">
                            <option value="'.$puntOeste.'">'.$puntOeste.'</option>
                            <option value="Oeste">Oeste</option>
                            <option value="NortOeste">NortOeste</option>
                        </select>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-4">
                                <input type="text" value="'.$oeste.'" class="text" id="oestePosVenta" />
                                <select id="uniOeste2">
                                    <option value="'.$lindRes["uniOeste"].'">'.$lindRes["uniOeste"].'</option>
                                    <option value="m">m</option>
                                    <option value="Lq">Lq</option>
                                    <option value="Ld">Ld</option>
                                    <option value="otros">otros</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <b>Alinderado</b>
                                <input type="text" onKeyUp="mayusProp(this)" value="'.$lindRes["alind_o"].'"class="text"id="alindPosOeste" />
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
                            <input type="text" value="'.$lindRes["areaTotal"].'"class="text" id="arTotal2" >
                            <select id="uniAreaT2">
                                <option value="'.$lindRes["uniAreaT"].'">'.$lindRes["uniAreaT"].'</option>
                                <option value="N/A">N/A</option>
                                <option value="m2">m2</option>
                                <option value="Ha">Ha</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="campDat">
                            <b>Niveles de Construcción</b>
                            <input type="text" onKeyUp="mayusProp(this)" value="'.$lindRes["nivelesConst"].'"class="text" id="NivConstTotal2" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="campDat">
                            <b>Área de Construcción</b>
                            <input type="text" value="'.$lindRes["areaConst"].'"class="text" id="arConstTotal2" >
                            <select id="uniAreaConst2">
                                <option value="'.$lindRes["uniAreaC"].'">'.$lindRes["uniAreaC"].'</option>
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
                <input type="button" value="Guardar" onclick="btnActVenta()" class="botones btn btn-primary" />
            </div>
            ';
        }
        function actLindVenta(){
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();
            $expSql = "SELECT * FROM expediente where n_expediente='".$this->expBuscar."'";
                $resExp = $link->query($expSql);
                $expRes = $resExp->fetch_assoc();
                if($expRes["id"]!=0){
                    $idInmue = $expRes["fk_inmueble"];
                }else{
                    $expEmpSQL = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
                    $resEmpExp = $link->query($expEmpSQL);
                    $expEmpRes = $resEmpExp->fetch_array();
                    $idInmue = $expEmpSQL["fk_inmueble"];
                }
            //BUSQUEDA DEL INMUEBLE
                $inmuSql = "SELECT * FROM inmueble where id=".$idInmue."";
                $resInmue = $link->query($inmuSql);
                $inmueRes = $resInmue->fetch_array();

            if($inmueRes["fk_lind_pos_venta"]){
                $lindPosVentaSql = "SELECT * FROM linderos_posible_venta where id=".$inmueRes["fk_lind_pos_venta"]."";
                $resPosVenta = $link->query($lindPosVentaSql);
                $posVentaRes= $resPosVenta->fetch_assoc();
                $idPosVenta= $posVentaRes["id"];
            }else{
                $lindPosVentaSql = "SELECT * FROM linderos_posible_venta where id='0'";
                $resPosVenta = $link->query($lindPosVentaSql);
                $posVentaRes= $resPosVenta->fetch_assoc();
                $idPosVenta= "0";
            }
            
            if($this->puntNorte2=="Norte"){
                $Norte = $this->nortPosVenta;
                $norEste = "nada";
            }else{
                $Norte = "nada";
                $norEste = $this->nortPosVenta;
            }
            if($this->puntSur2=="Sur"){
                $Sur = $this->surPosVenta;
                $SurEste = "nada";
            }else{
                $Sur = "nada";
                $SurEste = $this->surPosVenta;
            }
            if($this->puntEste2=="Este"){
                $Este = $this->estePosVenta;
                $SurOeste = "nada";
            }else{
                $Este = "nada";
                $SurOeste = $this->estePosVenta;
            }
            if($this->puntOeste2=="Oeste"){
                $Oeste = $this->oestePosVenta;
                $NortOeste = "nada";
            }else{
                $Oeste = "nada";
                $NortOeste = $this->oestePosVenta;
            }
            if($posVentaRes["id"]==0){
                $lindGeneralSQL = "INSERT INTO linderos_posible_venta(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$Norte."','".$norEste."','".$Sur."','".$SurEste."','".$Este."','".$SurOeste."','".$Oeste."','".$NortOeste."','".$this->alindPosNort."','".$this->alindPosSur."','".$this->alindPosEste."','".$this->alindPosOeste."','".$this->arTotal2."','".$this->uniAreaT2."','".$this->NivConstTotal2."','".$this->uniAreaConst2."','".$this->arConstTotal2."','".$this->uniNorte2."','".$this->uniSur2."','".$this->uniEste2."','".$this->uniOeste2."')";
                $link->query($lindGeneralSQL);
                $idLindVenta= $link->insert_id;

                $inmuSql = "UPDATE inmueble SET fk_lind_pos_venta=".$idLindVenta." where id=".$idInmue."";
                $resInmue = $link->query($inmuSql);
            }else{
                $lindGeneralSQL = "UPDATE linderos_posible_venta SET norte='".$Norte."',noreste='".$norEste."',sur='".$Sur."',sureste='".$SurEste."',este='".$Este."',suroeste='".$SurOeste."',oeste='".$Oeste."',noroeste='".$NortOeste."',alind_n='".$this->alindPosNort."',alind_s='".$this->alindPosSur."',alind_e='".$this->alindPosEste."',alind_o='".$this->alindPosOeste."',areaTotal='".$this->arTotal2."',uniAreaT='".$this->uniAreaT2."',nivelesConst='".$this->NivConstTotal2."',uniAreaC='".$this->uniAreaConst2."',areaConst='".$this->arConstTotal2."',uniNorte='".$this->uniNorte2."',uniSur='".$this->uniSur2."',uniEste='".$this->uniEste2."',uniOeste='".$this->uniOeste2."' where id=".$inmueRes["fk_lind_pos_venta"]."";
                $link->query($lindGeneralSQL);
            }
        }
    //LINDEROS SEGUN DOCUMENTO
        function mostLindDoc(){
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();
            //BUSQUEDA DEL EXPEDIENTE
                $expSql = "SELECT * FROM expediente where n_expediente='".$this->expBuscar."'";
                $resExp = $link->query($expSql);
                $expRes = $resExp->fetch_array();
                if($expRes["id"]!=0){
                    $idInmue = $expRes["fk_inmueble"];
                }else{
                    $expEmpSQL = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
                    $resEmpExp = $link->query($expEmpSQL);
                    $expEmpRes = $resEmpExp->fetch_array();
                    $idInmue = $expEmpRes["fk_inmueble"];
                }
            //BUSQUEDA DEL INMUEBLE
                $inmuSql = "SELECT * FROM inmueble where id=".$idInmue."";
                $resInmue = $link->query($inmuSql);
                $inmueRes = $resInmue->fetch_array();
                if($inmueRes["fk_lind_documento"]){
                    $lindSQL = "SELECT * FROM linderos_documento where id=".$inmueRes["fk_lind_documento"]."";
                    $resLind = $link->query($lindSQL);
                    $lindRes= $resLind->fetch_array();
                }else{
                    $lindSQL = "SELECT * FROM linderos_documento where id='0'";
                    $resLind = $link->query($lindSQL);
                    $lindRes= $resLind->fetch_array();
                }
            if($lindRes["norte"]=="nada"){
                    $norte = $lindRes["noreste"];
                    $puntNort = "NorEste";
                }elseif(!$lindRes["norte"]){
                    $norte = "";
                    $puntNort = "";
                }else{
                    $norte = $lindRes["norte"];
                    $puntNort = "Norte";
                }
                if($lindRes["sur"]=="nada"){
                    $sur = $lindRes["sureste"];
                    $puntSur = "SurEste";
                }elseif(!$lindRes["sur"]){
                    $sur = "";
                    $puntSur = "";
                }else{
                    $sur = $lindRes["sur"];
                    $puntSur = "Sur";
                }
                if($lindRes["este"]=="nada"){
                    $este = $lindRes["suroeste"];
                    $puntEste = "SurOeste";
                }elseif(!$lindRes["este"]){
                    $este = "";
                    $puntEste = "";
                }else{
                    $este = $lindRes["este"];
                    $puntEste = "Este";
                }
                if($lindRes["oeste"]=="nada"){
                    $oeste = $lindRes["noroeste"];
                    $puntOeste = "NorOeste";
                }elseif(!$lindRes["oeste"]){
                    $oeste = "";
                    $puntOeste = "   ";
                }else{
                    $oeste = $lindRes["oeste"];
                    $puntOeste = "Oeste";
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
                                <option value="'.$puntNort.'">'.$puntNort.'</option>
                                <option value="Norte">Norte</option>
                                <option value="NorteEste">NortEste</option>
                            </select>
                        </div>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="text" value="'.$norte.'" class="text" id="nortSecDoc" />
                                    <select id="uniNorte3">
                                        <option value="'.$lindRes["uniNorte"].'">'.$lindRes["uniNorte"].'</option>
                                        <option value="m">m</option>
                                        <option value="Lq">Lq</option>
                                        <option value="Ld">Ld</option>
                                        <option value="otros">otros</option>
                                    </select>
                                </div>
                                <div class="col-lg-8">
                                    <b>Alinderado</b>
                                    <input type="text" onKeyUp="mayusProp(this)" value="'.$lindRes["alind_n"].'" class="text" id="alindSecNorte" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <select id="puntSur3">
                                <option value="'.$puntSur.'">'.$puntSur.'</option>
                                <option value="Sur">Sur</option>
                                <option value="SurEste">SurEste</option>
                            </select>
                        </div>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="text" value="'.$sur.'" class="text" id="surSecDoc" />
                                    <select id="uniSur3">
                                        <option value="'.$lindRes["uniSur"].'">'.$lindRes["uniSur"].'</option>
                                        <option value="m">m</option>
                                        <option value="Lq">Lq</option>
                                        <option value="Ld">Ld</option>
                                        <option value="otros">otros</option>
                                    </select>
                                </div>
                                <div class="col-lg-8">
                                    <b >Alinderado</b>
                                    <input type="text" onKeyUp="mayusProp(this)" value="'.$lindRes["alind_s"].'" class="text" id="alindSecSur" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <select id="puntEste3">
                                <option value="'.$puntEste.'">'.$puntEste.'</option>
                                <option value="Este">Este</option>
                                <option value="SurOeste">SurOeste</option>
                            </select>
                        </div>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="text" value="'.$este.'" class="text" id="esteSecDoc" />
                                    <select id="uniEste3">
                                        <option value="'.$lindRes["uniEste"].'">'.$lindRes["uniEste"].'</option>
                                        <option value="m">m</option>
                                        <option value="Lq">Lq</option>
                                        <option value="Ld">Ld</option>
                                        <option value="otros">otros</option>
                                    </select>
                                </div>
                                <div class="col-lg-8">
                                    <b>Alinderado</b>
                                    <input type="text" onKeyUp="mayusProp(this)" value="'.$lindRes["alind_e"].'" class="text" id="alindSecEste" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <select id="puntOeste3">
                                <option value="'.$puntOeste.'">'.$puntOeste.'</option>
                                <option value="Oeste">Oeste</option>
                                <option value="NortOeste">NortOeste</option>
                            </select>
                        </div>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="text" value="'.$oeste.'" class="text" id="oesteSecDoc" />
                                    <select id="uniOeste3">
                                        <option value="'.$lindRes["uniOeste"].'">'.$lindRes["uniOeste"].'</option>
                                        <option value="m">m</option>
                                        <option value="Lq">Lq</option>
                                        <option value="Ld">Ld</option>
                                        <option value="otros">otros</option>
                                    </select>
                                </div>
                                <div class="col-lg-8">
                                    <b>Alinderado</b>
                                    <input type="text" onKeyUp="mayusProp(this)" value="'.$lindRes["alind_o"].'" class="text" id="alindSecOeste" />
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
                                <input type="text" onKeyUp="mayusProp(this)" value="'.$lindRes["areaTotal"].'" class="text" id="arTotal3" >
                                <select id="uniAreaT3">
                                    <option value="'.$lindRes["uniAreaT"].'">'.$lindRes["uniAreaT"].'</option>
                                    <option value="N/A">N/A</option>
                                    <option value="m2">m2</option>
                                    <option value="Ha">Ha</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="campDat">
                                <b>Niveles de Construcción</b>
                                <input type="text" onKeyUp="mayusProp(this)" value="'.$lindRes["nivelesConst"].'" class="text" id="NivConstTotal3" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="campDat">
                                <b>Área de Construcción</b>
                                <input type="text" onKeyUp="mayusProp(this)" value="'.$lindRes["areaConst"].'" id="arConstTotal3" >
                                <select id="uniAreaConst3">
                                    <option value="'.$lindRes["uniAreaC"].'">'.$lindRes["uniAreaC"].'</option>
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
                    <input type="button" value="Actualizar" onclick="btnActDoc()" class="botones btn btn-primary" />
                </div>
            ';
        }
        function actLindDoc(){
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();
            $expSql = "SELECT * FROM expediente where n_expediente='".$this->expBuscar."'";
                $resExp = $link->query($expSql);
                $expRes = $resExp->fetch_array();
                if($expRes["id"]!=0){
                    $idInmue = $expRes["fk_inmueble"];
                }else{
                    $expEmpSQL = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
                    $resEmpExp = $link->query($expEmpSQL);
                    $expEmpRes = $resEmpExp->fetch_array();
                    $idInmue = $expEmpSQL["fk_inmueble"];
                }
            //BUSQUEDA DEL INMUEBLE
                $inmuSql = "SELECT * FROM inmueble where id=".$idInmue."";
                $resInmue = $link->query($inmuSql);
                $inmueRes = $resInmue->fetch_array();

            if($inmueRes["fk_lind_documento"]){
                $lindPosVentaSql = "SELECT * FROM linderos_documento where id=".$inmueRes["fk_lind_documento"]."";
                $resPosVenta = $link->query($lindPosVentaSql);
                $posVentaRes= $resPosVenta->fetch_array();
                $idPosVenta= $posVentaRes["id"];
            }else{
                $lindPosVentaSql = "SELECT * FROM linderos_documento where id='0'";
                $resPosVenta = $link->query($lindPosVentaSql);
                $posVentaRes= $resPosVenta->fetch_array();
                $idPosVenta= "0";
            }
            
            if($this->puntNorte2=="Norte"){
                $Norte = $this->nortPosVenta;
                $norEste = "nada";
            }else{
                $Norte = "nada";
                $norEste = $this->nortPosVenta;
            }
            if($this->puntSur2=="Sur"){
                $Sur = $this->surPosVenta;
                $SurEste = "nada";
            }else{
                $Sur = "nada";
                $SurEste = $this->surPosVenta;
            }
            if($this->puntEste2=="Este"){
                $Este = $this->estePosVenta;
                $SurOeste = "nada";
            }else{
                $Este = "nada";
                $SurOeste = $this->estePosVenta;
            }
            if($this->puntOeste2=="Oeste"){
                $Oeste = $this->oestePosVenta;
                $NortOeste = "nada";
            }else{
                $Oeste = "nada";
                $NortOeste = $this->oestePosVenta;
            }
            if($posVentaRes["id"]==0){
                $lindGeneralSQL = "INSERT INTO linderos_posible_venta(norte,noreste,sur,sureste,este,suroeste,oeste,noroeste,alind_n,alind_s,alind_e,alind_o,areaTotal,uniAreaT,nivelesConst,uniAreaC,areaConst,uniNorte,uniSur,uniEste,uniOeste)value('".$Norte."','".$norEste."','".$Sur."','".$SurEste."','".$Este."','".$SurOeste."','".$Oeste."','".$NortOeste."','".$this->alindSecNorte."','".$this->alindSecSur."','".$this->alindSecEste."','".$this->alindSecOeste."','".$this->arTotal3."','".$this->uniAreaT3."','".$this->NivConstTotal3."','".$this->uniAreaConst3."','".$this->arConstTotal3."','".$this->uniNorte3."','".$this->uniSur3."','".$this->uniEste3."','".$this->uniOeste3."')";
                $link->query($lindGeneralSQL);
                $idLindVenta= $link->insert_id;

                $inmuSql = "UPDATE inmueble SET fk_lind_documento=".$idLindVenta." where id=".$idInmue."";
                $resInmue = $link->query($inmuSql);
            }else{
                $lindGeneralSQL = "UPDATE linderos_documento SET norte='".$Norte."',noreste='".$norEste."',sur='".$Sur."',sureste='".$SurEste."',este='".$Este."',suroeste='".$SurOeste."',oeste='".$Oeste."',noroeste='".$NortOeste."',alind_n='".$this->alindSecNorte."',alind_s='".$this->alindSecSur."',alind_e='".$this->alindSecEste."',alind_o='".$this->alindSecOeste."',areaTotal='".$this->arTotal3."',uniAreaT='".$this->uniAreaT3."',nivelesConst='".$this->NivConstTotal3."',uniAreaC='".$this->uniAreaConst3."',areaConst='".$this->arConstTotal3."',uniNorte='".$this->uniNorte3."',uniSur='".$this->uniSur3."',uniEste='".$this->uniEste3."',uniOeste='".$this->uniOeste3."' where id=".$inmueRes["fk_lind_documento"]."";
                $link->query($lindGeneralSQL);
        }
    }
    //SERVICIOS
        function modifServi(){
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();
            //BUSQUEDA DEL EXPEDIENTE
                $expSql = "SELECT * FROM expediente where n_expediente=".$this->expBuscar."";
                $resExp = $link->query($expSql);
                $expRes = $resExp->fetch_assoc();
                if($expRes["id"]!=0){
                    $idInmue = $expRes["fk_inmueble"];
                }else{
                    $expEmpSQL = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
                    $resEmpExp = $link->query($expEmpSQL);
                    $expEmpRes = $resEmpExp->fetch_array();
                    $idInmue = $expEmpRes["fk_inmueble"];
                }
            //BUSQUEDA DEL INMUEBLE
                $inmuSql = "SELECT * FROM inmueble where id=".$idInmue."";
                $resInmue = $link->query($inmuSql);
                $inmueRes = $resInmue->fetch_assoc();
            //BUSQUEDA DE SERVICIOS
                $servSql = "SELECT * FROM servicios_inmue where id=".$inmueRes["fk_servicios"]."";
                $resServ = $link->query($servSql);
                $servRes = $resServ->fetch_assoc();
            echo'
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
                                <option value="'.$servRes["acued"].'">'.$servRes["acued"].'</option>
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
                                <option value="'.$servRes["acuedRural"].'">'.$servRes["acuedRural"].'</option>
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
                                <option value="'.$servRes["aguasSubter"].'">'.$servRes["aguasSubter"].'</option>
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
                                <option value="'.$servRes["aguasServ"].'">'.$servRes["aguasServ"].'</option>
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
                                <option value="'.$servRes["pavimentoFlex"].'">'.$servRes["pavimentoFlex"].'</option>
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
                                <option value="'.$servRes["pavimentoRig"].'">'.$servRes["pavimentoRig"].'</option>
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
                                <option value="'.$servRes["viaEngran"].'">'.$servRes["viaEngran"].'</option>
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
                                <option value="'.$servRes["acera"].'">'.$servRes["acera"].'</option>
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
                                <option value="'.$servRes["alumbradoPub"].'">'.$servRes["alumbradoPub"].'</option>
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
                                <option value="'.$servRes["aseo"].'">'.$servRes["aseo"].'</option>
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
                                <option value="'.$servRes["transportePublic"].'">'.$servRes["transportePublic"].'</option>
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
                                <option value="'.$servRes["pozoSept"].'">'.$servRes["pozoSept"].'</option>
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
                                <option value="'.$servRes["electriResi"].'">'.$servRes["electriResi"].'</option>
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
                                <option value="'.$servRes["electriIndus"].'">'.$servRes["electriIndus"].'</option>
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
                                <option value="'.$servRes["lineaTelf"].'">'.$servRes["lineaTelf"].'</option>
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
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();
            $lindGenSql = "UPDATE servicios_inmue SET acued='".$this->Acue."',acuedRural='".$this->AcueRural."',aguasSubter='".$this->AguasSub."',aguasServ='".$this->AguasServ."',pavimentoFlex='".$this->PavFlex."',pavimentoRig='".$this->PavRig."',viaEngran='".$this->viaEngran."',acera='".$this->acera."',alumbradoPub='".$this->AlumPublico."',aseo='".$this->aseo."',transportePublic='".$this->transPublic."',pozoSept='".$this->pozoSept."',electriResi='".$this->ElectResidencial."',electriIndus='".$this->ElectriIndust."',lineaTelef='".$this->linTelf."' WHERE id='".$this->idServ."' ";
            $link->query($lindGenSql);
            echo 'ACTUALIZADO CON EXITO';
        }
    //FACTURA
        function modifFact(){
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();
            //BUSQUEDA DEL EXPEDIENTE
                $expSql = "SELECT * FROM expediente where n_expediente='".$this->expBuscar."'";
                $resExp = $link->query($expSql);
                $expNormRes = $resExp->fetch_array();
                if($expNormRes["id"]!=0){
                    $IdExp = $expNormRes["n_expediente"];
                    $idFact= $expNormRes["fk_factura"];
                    $tipo = "normal";
                }else{
                    $expEmpSQL = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
                    $resEmpExp = $link->query($expEmpSQL);
                    $expEmpRes = $resEmpExp->fetch_array();
                    $IdExp = $expEmpRes["n_expediente"];
                    $idFact= $expEmpRes["fk_factura"];
                    $tipo = "EMPADRONAMIENTO";
                }
            //BUSQUEDA DE FACTURA
                $pagosSQL = "SELECT * FROM pagos where fk_expedient='".$IdExp."' AND tipo='".$tipo."'";
                $resPagos = $link->query($pagosSQL);
                $pagosRes = $resPagos->fetch_array();
                if($pagosRes["id"]!=0){
                    $factSql = "SELECT * FROM factura where id=".$pagosRes["fk_factura"]."";
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
            include('../conexion.php');
            $MySql = new conexion;
            $link= $MySql->conectar();
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
        <button onclick="btnPagarInmue()" class="botones btn btn-primary" />Pagar </button>
        <input type="hidden" value="'.$this->expBuscar.'" id="expBuscar" />';
    }
    function pagarInmue(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        
        //INSERT FACTURA
            $factSql = "INSERT INTO factura(monto,n_factura,fecha)value('".$this->montoFact."','".$this->numFact."','".$this->fechFact."') ";
            $factConex = $link->query($factSql);
            $idFact = $link->insert_id;
        //BUSCAR EXPEDIENTE
            $expSql = "SELECT * FROM expediente where n_expediente=".$this->expBuscar."";
            $resExp = $link->query($expSql);
            $expRes = $resExp->fetch_assoc();
        //VERIFICAR PAGOS
            $pagSql= "SELECT * FROM pagos where fk_expedient=".$expRes["n_expediente"]."";
            $resPagos = $link->query($pagSql);
            $pagoRes = $resPagos->fetch_assoc();
        //INSERT PAGOS 
            $pagoSql = "INSERT INTO pagos(fk_expedient,fk_factura,fechaPagos)value(".$expRes["n_expediente"].",".$idFact.",'".date("Y-m-d")."')";
            $link->query($pagoSql);
        echo'PAGO REALIZADO CON EXITO';
    }
    function verPagos(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        //BUSQUEDA DEL EXPEDIENTE
            $expSql = "SELECT * FROM expediente where n_expediente=".$this->expBuscar."";
            $resExp = $link->query($expSql);
            $expRes = $resExp->fetch_assoc();
            if($expRes!=0){
                $propietarios = $expRes["fk_propietario"];
                $expediente = $expRes["n_expediente"];
                $tipo= "normal";
            }else{
                $expempadroSql = "SELECT * FROM expempadro where n_expediente=".$this->expBuscar."";
                $resExpempadro = $link->query($expempadroSql);
                $expempadroRes = $resExpempadro->fetch_assoc();
                $propietarios = $expempadroRes["fk_propietario"];
                $expediente = $expempadroRes["n_expediente"];
                $tipo = "EMPADRONAMIENTO";
            }
        //BUSQUEDA DEL PROPIETARIO
            $propSql = "SELECT * FROM propietarios where id=".$propietarios."";
            $resProp = $link->query($propSql);
            $propRes = $resProp->fetch_assoc();
        //BUSQUEDA DE CANTIDAD DE PAGOS
            $veriPagoSql = "SELECT * FROM pagos where fk_expedient=".$expediente." AND tipo='".$tipo."' ORDER BY fechaPagos DESC";
            $veriResPago = $link->query($veriPagoSql);
        
        echo'

        <div class="container flu">
            <div class="row">
                <div class="col">
                    <h2>Datos del propietario</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <b>Nombre:</b> '.$propRes["nombre"].' '.$porpRes["apellido"].'
                </div>
                <div class="col">
                    <b>Cedula</b> '.$propRes["cedula"].'
                </div>
                <div class="col">
                    <b>Dirección de Hab.</b> '.$propRes["dir_hab"].'
                </div>
                <div class="col">
                    <b>Nº de Expediente:</b> '.$expediente.'
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h2>Pagos realizados</h2>
                </div>
            </div>
            <div class="row">
                    <div class="col">
                        <b>No.</b>
                    </div>
                    <div class="col">
                        <b>No. Factura:</b>
                    </div>
                    <div class="col">
                        <b>Monto:</b>
                    </div>
                    <div class="col">
                        <b>Fecha:</b>
                    </div>
                </div>
        ';
                //BUSQUEDA DE FACTURA
                    $no=0;
            while($resPagos = $veriResPago->fetch_array()){
                $factSQL = "SELECT * FROM factura where id=".$resPagos["fk_factura"]."";
                $resFact = $link->query($factSQL);
                $factRes = $resFact->fetch_array();
                $no= $no+1;
                echo'
                   <div class="row">
                        <div class="col">
                            '.$no.'
                        </div>
                        <div class="col">
                            '.$factRes["n_factura"].'
                        </div>
                        <div class="col">
                            '.$factRes["monto"].'
                        </div>
                        <div class="col">
                            '.$resPagos["fechaPagos"].'
                        </div>
                   </div>
                ';
            }
            echo'
        </div>';
    }
}


?>