<?php
    class conexion{

        var $user = "root";
        var $pass = "";
        var $bd = "siscast";
        var $serv= "127.0.0.1";
        var $prefijoBD="";

        function conectar(){
            mysqli_connect($this->serv, $this->user,$this->pass,$this->bd) 
            or die("error al conectar con la bd");
        }
        
    }
?>