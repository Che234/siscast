<?php

class renovacion{

    function construct(){
        $expBuscar="";
        $tipoBuscar="";
    }

    function busRenov(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        //BUSCAR EXPEDIENTE
            $busSql = "SELECT * FROM expediente where n_expediente='".$this->expBuscar."'";
            $resBus = $link->query($busSql);
            $busRes = $resBus->fetch_array();
        if($busRes["id"] !=0){
            
            $expResultado = $busRes["id"];
            $anoExp = explode('-',$busRes["fecha"]);
            $condicionExp = $busRes["condicion"];
        }else{
            $busempaSql = "SELECT * FROM expempadro where n_expediente='".$this->expBuscar."'";
            $resempadroBus = $link->query($busempaSql);
            $empadroBusRes = $resempadroBus->fetch_array();
            $expResultado = $empadroBusRes["id"];
            $anoExp = explode('-',$empadroBusRes["fecha"]);
            $condicionExp = $empadroBusRes["condicion"];
        }
        //BUSCAR PAGO
            $pagSql = "SELECT * FROM pagos where fk_expedient=".$expResultado." ORDER BY fechaPagos DESC";
            $resPag = $link->query($pagSql);
            $pagoRes = $resPag->fetch_array();
            $pagRes = explode("-",$pagoRes["fechaPagos"]);
        //BUSCAR FACTURA
            $factSql = "SELECT * FROM factura where id=".$pagoRes["fk_factura"]."";
            $resFact = $link->query($factSql);
            $factRes = $resFact->fetch_array();
        //BUSQUEDA INMUEBLE
            $inmueSql = "SELECT * FROM inmueble where id=".$busRes["fk_inmueble"]."";
            $resInmueble = $link->query($inmueSql);
            $inmuebleRes = $resInmueble->fetch_array();
        //BUSQUEDA LINDERO SEG DOC
            if($inmuebleRes["fk_lind_documento"]==NULL){
                $lindSecDoc = 0;
            }else{
                $lindSecDoc = $inmuebleRes["fk_lind_documento"];
            }
            $lindSecSql = "SELECT * FROM linderos_documento where id=".$lindSecDoc." ";
            $resLindSec = $link->query($lindSecSql);
            $lindSecRes = $resLindSec->fetch_array();
            if($lindSecRes["id"]==""){
                $lindSecDoc = "nada";
            }else{
                $lindSecDoc= $lindSecRes["id"];
            }
        //BUSQUEDA LINDERO GENERAL
            if($inmuebleRes["fk_lind_general"]==NULL){
                $lindGen = 0;
            }else{
                $lindGen = $inmuebleRes["fk_lind_general"];
            }
            $lindGenSql = "SELECT * FROM linderos_general where id=".$lindGen."";
            $resLindGen = $link->query($lindGenSql);
            $lindGenrRes = $resLindGen->fetch_array();
            if($lindGenrRes["id"]==""){
                $lindGen = "nada";
            }else{
                $lindGen= $lindGenrRes["id"];
            }
        //BUSQUEDA LINDERO POS VENTA
            if($inmuebleRes["fk_lind_pos_venta"]==NULL){
                $lindPosVenta = 0;
            }else{
                $lindPosVenta = $inmuebleRes["fk_lind_pos_venta"];
            }
            $lindPosVentaSql = "SELECT * FROM linderos_posible_venta where id=".$lindPosVenta." ";
            $resLindPosVenta = $link->query($lindPosVentaSql);
            $lindPosVentaRes = $resLindPosVenta->fetch_array();
            if($lindPosVentaRes["id"]==""){
                $lindPosVenta = "nada";
            }else{
                    $lindPosVenta= $lindPosVentaRes["id"];
            }

        if($pagRes[0] < date("Y")){
            echo'
            <input type="hidden" value="No" id="proceso" />
            <input type="hidden" value="'.$busRes["id"].'" id="nuExp" />
            <input type="hidden" value="'.$this->tipoBuscar.'" id="tipoBuscar" />
            <input type="hidden" value="'.$anoExp[0].'" id="anoExp" />
            ';   
        }else{
           echo' <input type="hidden" value="'.$busRes["fk_inmueble"].'" id="idInmueble" />
            <input type="hidden" value="'.$busRes["fk_propietario"].'" id="idProp" />
            <input type="hidden" value="'.$busRes["id"].'" id="nuExp" />
            <input type="hidden" value="'.$this->tipoBuscar.'" id="tipoBuscar" />
            <input type="hidden" value="'.$anoExp[0].'" id="anoExp" />
            <input type="hidden" value="'.$condicionExp.'" id="condicionExp"/>
            <input type="hidden" value="'.$factRes["monto"].'" id="montoFact" />
            <input type="hidden" value="'.$factRes["fecha"].'" id="fechFact" />
            <input type="hidden" value="'.$factRes["n_factura"].'" id="numFact" />
            <input type="hidden" value="Renovación" id="operacion" />
            <input type="hidden" value="'.$lindPosVenta.'" id="lindPosventa" />
            <input type="hidden" value="'.$lindGen.'" id="lindGeneral" />
            <input type="hidden" value="'.$lindSecDoc.'" id="lindSecDoc" />
            <input type="hidden" value="Si" id="proceso" />';
        }

    }
}


?>