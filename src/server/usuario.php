<?php

class usuario{

        var $nombre = "";
        var $apellido = "";
        var $cedula = "";
        var $correo = "";
        var $direccion= "";
        var $telf= "";
        var $user= "";
        var $pass= "";

    function mostRegistro(){
        echo'
            <div class="container contUsuario ">
                <div class="row">
                    <div class="titCentro column-lg-">
                        <h2>Datos Personales</h2>
                    </div>
                </div>
                <div class="row filasUser">
                    <div class="campos" >
                        <p class="negritas text-left">Nombre:</p>
                        <input type="text" id="nombre" >
                    </div>
                    <div class="campos" >
                        <p class="negritas text-left">Apellido:</p>
                        <input type="text" id="apellido">
                    </div>
                    <div class="campos" >
                        <p class="negritas text-left">Cedula:</p>
                        <input type="text" id="ced">
                    </div>
                </div>
                <div class="row filasUser">
                    <div class="campos">
                        <p class="negritas text-left" >Dirección:</p>
                        <input type="text" id="direc" />
                    </div>
                    <div class="campos">
                        <p class="negritas text-left">Correo</p>
                        <input typè="email" id="correo"/>
                    </div>
                    <div class="campos">
                        <p class="negritas text-left">Telefono:</p>
                        <input class="codigo" type="text" id="codTelef">
                        <input class="telf" type="text" id="numTelf">
                    </div>
                </div>
                <div class="row filasUser">
                    <div class="campos">
                        <p class="negritas text-left">Usuario:</p>
                        <input type="text" id="user">    
                    </div>
                    <div class="campos">
                        <p class="negritas text-left">Verifica Contraseña:</p>
                        <input type="password" id="verPass">
                    </div>
                    <div class="campos">
                        <p class="negritas text-left">Contraseña:</p>
                        <input type="password" id="contrasena">
                    </div>
                </div>
                <div class="row filasUser">
                    <div class="campos">
                    <button type="button" onclick="btnGuardUsu()" class="botones btn btn-primary">Enviar</button>
                    <button type="button" onclick="btnLimpiarUsu()" class="botones btn btn-danger">Limpiar</button>
                    </div>
                </div>
            </div>

        ';
    }
    function guardUsu(){
        $link=mysqli_connect("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());
        $link->query("INSERT INTO usuarios(nick,pass,nombre,apellido,cedula,direccion,telef,correo)values('".$this->user."', '".$this->pass."','".$this->nombre."','".$this->apellido."','".$this->cedula."', '".$this->direccion."','".$this->telf."','".$this->correo."') ") or die(mysqli_error($link));
        $this->mostRegistro();
    }

}





?>