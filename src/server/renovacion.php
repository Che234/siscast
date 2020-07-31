<?php

class renovacion{

    function construct(){
        $expBuscar="";
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
            $pagRes = $resPag->fetch_array();
            $pagRes = explode("-",$pagRes["fechaPagos"]);

        // if($pagRes[0]==date("Y")){
            
        // }

    }
}


?>