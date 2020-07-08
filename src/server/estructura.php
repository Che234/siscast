
<?php
    class estructura{
        function header(){
            echo'<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#"><img class="logoMenu" src="./assets/logo.jpg" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active ">
                  <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Constancias
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Imprimir</a>
                    <a class="dropdown-item" onclick="btnFormConst()" href="#">Registrar</a>
                    <a class="dropdown-item" href="#">Estadisticas</a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Usuarios
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" onclick="mostRegistro()">Registrar</a>
                    <a class="dropdown-item" href="#">Buscar</a>
                    <a class="dropdown-item" href="#">Estadisticas</a>
                  </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#" >Buscar</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" onclick="btnSalir()" href="#" >Salir</a>
                </li>
              </ul>
            </div>
          </nav>';
        }
        function body(){
            echo'
            <div id="campGeneral">
              <div class="campBuscador">
                <h1>BUSCAR POR EXPEDIENTE</h1>
                <input type="text" id="campBuscar" />
                <input type="button" value="Consultar" onclick="busConstExp()" class="botones btn btn-primary />
              </div>
              <div class="campBuscador">
                <h1>BUSCAR POR CEDULA</h1>
                <input type="text" id="campBuscar" />
                <input type="button" value="Consultar" class="botones btn btn-primary />
              </div>
            </div>
            <div id="campOculto"></div>
            ';
        }
    }
?>