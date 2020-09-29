<?php
class login{

    var $usuario= "";
    var $pass= "";

    function fLogin(){

        echo'
        <link rel="stylesheet" href="./src/stylus/login.css">
        <div class="wrapper fadeInDown">
          <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
              <img src="./assets/logo.jpg" id="icon" alt="User Icon" />
            </div>

            <!-- Login Form -->
            <form>
              <input type="text" id="fUser" class="fadeIn second" name="login" placeholder="login">
              <input type="password" id="fPass" class="fadeIn third" name="login" placeholder="password">
              <input type="submit" onclick="btnEntrar()" class="fadeIn fourth" value="Entrar">
            </form>

          </div>
        </div> ';
    }
    function fEntrar(){
        include('../conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();

        $sql= "SELECT * from usuarios where nick='".$this->usuario."' and pass='".$this->pass."' ";
        $respuesta = $link->query($sql);
        $resFilas= $respuesta->num_rows;
        $filasRes = $respuesta->fetch_array();
        if($resFilas != 0){
            session_start();
            $_SESSION["usuario"]=$this->usuario;
            $_SESSION["pass"]=$this->pass;
            $_SESSION["nivel"]=$filasRes["nivel"];
            header("http://localhost/SisCast/index.php");
        }
    }
    function fSalir(){
        session_start();
        session_destroy();
    }
}

?>