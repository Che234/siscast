<?php
    class conexion{

        var $user = "sisroot";
        var $pass = "";
        var $bd = "siscast";
        var $serv= "10.0.1.33";
        var $prefijoBD="";

        function conectar(){
            $link= new mysqli($this->serv, $this->user,$this->pass,$this->bd) 
        or die(mysqli_error());
            return $link;

        }
        
    }
?>