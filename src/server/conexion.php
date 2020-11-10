<?php
    class conexion{

        var $user = "sisroot";
        var $pass = "";
        var $bd = "siscast";
        var $serv= "localhost";
        var $prefijoBD="";

        function conectar(){
            $link= new mysqli($this->serv, $this->user,$this->pass,$this->bd) 
        or die(mysqli_error());
            return $link;

        }
        
    }
?>