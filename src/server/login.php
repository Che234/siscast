<?php
class login{

    var $usuario= "";
    var $pass= "";

    function fLogin(){
        echo'
        <div class="fLogin">
        <div class="">
                <div >
                    <img class="imgLogo" src="./assets/logo.jpg">
                </div>
            </div>
            <div >
                <div >
                    <p class="negritas">Usuario</p>
                </div>
            </div>
            <div class="">
                <div >
                    <input type="text" id="fUser" />
                </div>
            </div>
            <div class="">
                <div>
                    <p class="negritas">Contraseña</p>
                </div>
            </div>
            <div class="">
                <div >
                    <input type="password" id="fPass" />
                </div>
            </div>
            <div class="">
                <div >
                    <input type="buttom" onclick="btnEntrar()" value="Entrar" class="btnLogin botones btn btn-primary" />
                </div>
            </div>
            </div>';
    }
    function fEntrar(){
        $link= new mysqli("127.0.0.1", "root","","siscast") 
        or die(mysqli_error());

        $sql= "SELECT * from usuarios where nick='".$this->usuario."' and pass='".$this->pass."' ";
        $respuesta = $link->query($sql);
        $resFilas= $respuesta->num_rows;
        if($resFilas != 0){
            session_start();
            $_SESSION["usuario"]=$this->usuario;
            $_SESSION["pass"]=$this->pass;
            header("http://localhost/SisCast/index.php");
        }
    }
    function fSalir(){
        session_start();
        session_destroy();
    }
}

?>