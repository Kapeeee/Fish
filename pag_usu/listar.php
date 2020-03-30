<?php 
  include("../includes/validaSesion.php")
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<title>Factor - Listado</title>

<?php
  include("../includes/recursosExternos.php");
  include("../includes/infoLog.php");
  include("../includes/menu.php");
?>
<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
<link href="assets/style.css" rel="stylesheet">
<script src="js/funciones.js"></script>
<script src="librerias/alertifyjs/alertify.js"></script>
<script src="librerias/select2/js/select2.js"></script>
<script type="text/javascript">


  function mod(hold){
    $('#tabla').load('componentes/tabla.php?hold='+hold);
    $('#tabla2').load('componentes/tabla2.php?hold='+hold);
  };

  function modcli(cli){
    $('#tabla').load('componentes/tabla.php?cli='+cli);
    $('#tabla2').load('componentes/tabla2.php?cli='+cli);
  };


</script>



</head>
<body>





 



        <div class="container" id="main" bg="light">
        <form id="formTraeFact" onsubmit="return false;"  >
        <h3>Listado Facturas </h3>
        <hr>
                <div class="row">
                  <br>
                <div class="col-4">

                                              
                      <select class="form-control" id="hold" name="hold" style="" onchange="mod(this.value)">
                      <option value="" selected disabled>Seleccione Empresa Del Holding</option>
                                  <?php 
                                  $re = $fun->cargar_datos_hold();   
                                  foreach($re as $row)      
                                        {
                                        ?>
                                        
                                        <option value="<?php echo $row['id_hold'] ?>"><?php echo $row['razon_social'] ?></option>
                                              
                                        <?php
                                        }    
                                  ?>  
                      </select>

                      </div>
                      <div class="col-4">

                                              
                      <select class="form-control" id="cli" name="cli" style="" onchange="modcli(this.value)">
                      <option value="" selected disabled>Seleccione Cliente</option>
                                  <?php 
                                  $re = $fun->cargar_clientes();   
                                  foreach($re as $row)      
                                        {
                                          ?>
                            
                                          <option value="<?php echo $row['id_cliente'] ?>"><?php echo $row['razon_social'] ?></option>
                                             
                                         <?php
                                        }    
                                  ?>  
                      </select>

                      </div>


                </div>
             



        </form>

        <div id="tabla"></div>                    
        <div id="tabla2"></div>                            
        </div>
                           

        </div>
        
                                       
<!-- Modal para edicion de datos -->

<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-right: 16px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil-square" aria-hidden="true">&nbsp;</i>Actualizar Datos de Factura</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
      </div>
      <div class="modal-body">
          
      
          <div class="col-12">
            <div class="form-group row">
              <div class="col-12">
              <input type="text" hidden="" id="iddoc" name="">
              <div class="input-group input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">N° Factura</span>
                                  </div>
                                  <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" id="numfac" name="" placeholder="Sin Datos" disabled >
                                </div>
                                
                  
              </div>
              <div class="col-12">
              <div class="input-group input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">R. Social</span>
                                  </div>
                                  <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" id="nombre" name="" placeholder="Sin Datos" disabled  >
                                </div>
                                
                      
              </div>

            </div>
          </div>
          <hr>
          <div class="col-12">
            <div class="form-group row">
             <div class="col-12">
                                        

                <h5>Actualizar Pago de Intereses (+/-)</h5>
                                        
                <label>Fecha</label>

                <input type="date" name="" id="fec_pag_int" class="form-control input-sm">
                <label>Monto</label>
                <input type="number" name="" id="interes" class="form-control input-sm">
              </div>                           
            
            </div>
          </div>

        

      		          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>
        
      </div>
    </div>
  </div>
</div>

<!-- Modal para notificaciones 30 -->
<div class="modal fade" id="modalEditarNoti30" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-right: 16px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><i class='fa fa-envelope' aria-hidden='true'></i> &nbsp;Notificacion De Vencimiento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
      </div>
      <div class="modal-body">
          <div class="col-12">
            <div class="form-group row">
              <div class="col-12">
              <input type="text" hidden="" id="iddoc" name="">
              <div class="input-group input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">N° Factura</span>
                                  </div>
                                  <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" id="numfacn30" name=""  disabled >
                                </div>  
              </div>
              <div class="col-12">
              <div class="input-group input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">R. Social</span>
                                  </div>
                                  <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" id="nombren30" name=""  disabled  >
                                </div>      
              </div>
            </div>
          </div>
          <hr>
          <div class="col-12">
            <div class="form-group row">
             <div class="col-12">
                                        

                                                    
                <label>Fecha de Notificación 30 Días</label>

                <input type="date" name="" id="fn30" class="form-control input-sm">
                <label>Correo de Notificación</label>
                <input type="text" name="" id="correocli30" class="form-control input-sm" disabled>
                                    
    
              </div>                           
            
            </div>
          </div>

        

      		          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" id="notificar30" data-dismiss="modal"><i class="fa fa-envelope" aria-hidden="true"></i> Notificar</button>
        
      </div>
    </div>
  </div>



</div>


<!-- FIN para notificaciones 30 -->
<!-- Modal para notificaciones 15 -->
<div class="modal fade" id="modalEditarNoti15" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-right: 16px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><i class='fa fa-envelope' aria-hidden='true'></i> &nbsp;Notificacion De Vencimiento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
      </div>
      <div class="modal-body">
          <div class="col-12">
            <div class="form-group row">
              <div class="col-12">
              <input type="text" hidden="" id="iddoc" name="">
              <div class="input-group input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">N° Factura</span>
                                  </div>
                                  <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" id="numfacn15" name=""  disabled >
                                </div>  
              </div>
              <div class="col-12">
              <div class="input-group input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">R. Social</span>
                                  </div>
                                  <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" id="nombren15" name=""  disabled  >
                                </div>      
              </div>
            </div>
          </div>
          <hr>
          <div class="col-12">
            <div class="form-group row">
             <div class="col-12">
                                        

                                                    
                <label>Fecha de Notificación 15 Días</label>

                <input type="date" name="" id="fn15" class="form-control input-sm">
                <label>Correo de Notificación</label>
                <input type="text" name="" id="correocli15" class="form-control input-sm" disabled>
                                    
    
              </div>                           
            
            </div>
          </div>

        

      		          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" id="notificar15" data-dismiss="modal"><i class="fa fa-envelope" aria-hidden="true"></i> Notificar</button>
        
      </div>
    </div>
  </div>



</div>


<!-- FIN para notificaciones 15 -->
<!-- Modal para notificaciones 5 -->
<div class="modal fade" id="modalEditarNoti5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-right: 16px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><i class='fa fa-envelope' aria-hidden='true'></i> &nbsp;Notificacion De Vencimiento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
      </div>
      <div class="modal-body">
          <div class="col-12">
            <div class="form-group row">
              <div class="col-12">
              <input type="text" hidden="" id="iddoc" name="">
              <div class="input-group input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">N° Factura</span>
                                  </div>
                                  <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" id="numfacn5" name=""  disabled >
                                </div>  
              </div>
              <div class="col-12">
              <div class="input-group input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">R. Social</span>
                                  </div>
                                  <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" id="nombren5" name=""  disabled  >
                                </div>      
              </div>
            </div>
          </div>
          <hr>
          <div class="col-12">
            <div class="form-group row">
             <div class="col-12">
                                        

                                                    
                <label>Fecha de Notificación 5 Días</label>

                <input type="date" name="" id="fn5" class="form-control input-sm">
                <label>Correo de Notificación</label>
                <input type="text" name="" id="correocli5" class="form-control input-sm" disabled>
                                    
    
              </div>                           
            
            </div>
          </div>

        

      		          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" id="notificar5" data-dismiss="modal"><i class="fa fa-envelope" aria-hidden="true"></i> Notificar</button>
        
      </div>
    </div>
  </div>



</div>


<!-- FIN para notificaciones 5 -->


</body>
</html>



<!--<script type="text/javascript">

	  $(document).ready(function(){
   		$('#tabla').load('componentes/tabla.php');
      $('#buscador').load('componentes/buscador.php');
  });
</script>*-->

<script type="text/javascript">
    $(document).ready(function(){
        $('#actualizadatos').click(function(){
          actualizaDatos();
        });

    });
    $(document).ready(function(){
        $('#notificar30').click(function(){
          notificarCliente30();
        });

    });
    $(document).ready(function(){
        $('#notificar15').click(function(){
          notificarCliente15();
        });

    });
    $(document).ready(function(){
        $('#notificar5').click(function(){
          notificarCliente5();
        });

    });
    

   
</script>

