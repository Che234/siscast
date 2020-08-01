<?php

class renovacion{

    function construct(){
        $expBuscar="";
        $tipoBuscar="";
    }

    function busRenov(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        //BUSCAR EXPEDIENTE
            $busSql = "SELECT * FROM expediente where n_expediente=".$this->expBuscar."";
            $resBus = $link->query($busSql);
            $busRes = $resBus->fetch_array();
        //BUSCAR PAGO
            $pagSql = "SELECT * FROM pagos where fk_expedient=".$busRes["id"]." ORDER BY fechaPagos DESC";
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
            $lindSecSql = "SELECT * FROM linderos_documento where id=".$inmuebleRes["fk_lind_documento"]." ";
            $resLindSec = $link->query($lindSecSql);
            $lindSecRes = $resLindSec->fetch_array();
        //BUSQUEDA LINDERO GENERAL
            $lindGenSql = "SELECT * FROM linderos_general where id=".$inmuebleRes["fk_lind_general"]."";
            $resLindGen = $link->query($lindGenSql);
            $lindGenrRes = $resLindGen->fetch_array();
        //BUSQUEDA LINDERO POS VENTA
            $lindPosVentaSql = "SELECT * FROM linderos_posible_venta where id=".$inmuebleRes["fk_lind_pos_venta"]." ";
            $resLindPosVenta = $link->query($lindPosVentaSql);
            $lindPosVentaRes = $resLindPosVenta->fetch_array();

        if($pagRes[0] < date("Y")){
            echo'
            <input type="hidden" value="No" id="proceso" />
            <input type="hidden" value="'.$this->expBuscar.'" id="nuExp" />
            <input type="hidden" value="'.$this->tipoBuscar.'" id="tipoBuscar" />
            ';   
        }else{
           echo' <input type="hidden" value="'.$busRes["fk_inmueble"].'" id="idInmueble" />
            <input type="hidden" value="'.$busRes["fk_propietario"].'" id="idProp" />
            <input type="hidden" value="'.$this->expBuscar.'" id="nuExp" />
            <input type="hidden" value="'.$this->tipoBuscar.'" id="tipoBuscar" />
            <input type="hidden" value="'.$factRes["monto"].'" id="montoFact" />
            <input type="hidden" value="'.$factRes["fecha"].'" id="fechFact" />
            <input type="hidden" value="'.$factRes["n_factura"].'" id="numFact" />
            <input type="hidden" value="Renovación" id="operacion" />
            <input type="hidden" value="'.$lindPosVentaRes["norte"].'" id="lindPosventa" />
            <input type="hidden" value="'.$lindGenrRes["norte"].'" id="lindGeneral" />
            <input type="hidden" value="'.$lindSecRes["norte"].'" id="lindSecDoc" />
            <input type="hidden" value="Si" id="proceso" />';
        }

    }
}


?>