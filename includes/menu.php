

<div class="row">
<div class="col-12 text-center">
  <nav class="navbar navbar-expand-md navbar-dark" style ="background-color:#00662b ">
        <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="false">
              <span class="navbar-toggler-icon"></span>
              </button>
              <div class="navbar-collapse collapse" id="navb" >
              <ul class="navbar-nav" >
                <li class="nav-item "><a class="nav-link" href="inicio.php"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp;Inicio </a></li> 
                <li class="nav-item "><a class="nav-link" href="listar.php"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Listado </a></li> 
                <li class="nav-item "><a class="nav-link" href="datos_pers.php"><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp;Mis Datos</a></li> 
                <!-- Dropdown -->
                    <li class="nav-item dropdown">
                      
                      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-address-card" aria-hidden="true"></i>&nbsp;Usuario</a>
                      
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="cargar_usu.php">Ver &nbsp;<i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="dropdown-item" href="crear_usu.php">Agregar &nbsp;<i class="fa fa-user-plus" aria-hidden="true"></i></a>
                        <a class="dropdown-item" href="mod_usu.php">Modificar &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      </div>
                    </li>
                <!-- Dropdown -->
                <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;Clientes</a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="cargar_cli.php">Ver &nbsp;<i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="dropdown-item" href="crear_cli.php">Agregar &nbsp;<i class="fa fa-plus-square" aria-hidden="true"></i></a>
                        <a class="dropdown-item" href="mod_cli.php">Modificar &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                      </div>
                    </li>  
                <!-- Dropdown -->
               
                <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-balance-scale" aria-hidden="true"></i>&nbsp;Factoring</a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="cargar_fac.php">Ver &nbsp;<i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="dropdown-item" href="crear_fac.php">Agregar &nbsp;<i class="fa fa-plus-square" aria-hidden="true"></i></a>
                        <a class="dropdown-item" href="mod_fac.php">Modificar  &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      </div>
                    </li>         
                <!-- Dropdown -->
               
                <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i>&nbsp;Empresas Holding
                      <span class="sr-only">Loading...</span></a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="cargar_hold.php">Ver &nbsp;<i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="dropdown-item" href="crear_hold.php">Agregar &nbsp;<i class="fa fa-plus-square" aria-hidden="true"></i></a>
                        <a class="dropdown-item" href="mod_hold.php">Modificar  &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      </div>
                    </li>                        
                <!-- Dropdown -->
               
                <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;Facturas</a>
                      <div class="dropdown-menu">
                       
                        <!--<a class="dropdown-item" href="mod_doc.php">Modificar  &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>-->
                        <a class="dropdown-item" href="car_ind_doc.php">Carga Individual  &nbsp;<i class="fa fa-clone" aria-hidden="true"></i></a>
                        <a class="dropdown-item" href="car_mas.php">Carga Masiva  &nbsp;<i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                       
                      </div>
                    </li> 
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;Reportes
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="listar_doc.php">Facturas por Estado&nbsp;</a>
                        <a class="dropdown-item" href="listar_doca.php">Factorizadas - Vigentes y Moras&nbsp;</a>
                        <a class="dropdown-item" href="listar_doce.php">Pendiente Cliente - Pagadas a Factoring por Factor&nbsp;</a>
                        <a class="dropdown-item" href="listar_doci.php">Excedentes Por Liquidar&nbsp;</a>
                        <a class="dropdown-item" href="listar_doco.php">Diferencia de Precio&nbsp;</a>
                      </div>
                    </li>      
              </ul>
            </div>
      </nav> 
  </div>
</div>
  


