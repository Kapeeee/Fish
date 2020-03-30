<?php 
  include("../includes/validaSesion.php")
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Factor- Crear Empresa Holding</title>
<?php
  include("../includes/recursosExternos.php");
?>


<script type="text/javascript">

$(document).ajaxStart(function() {
  $("#formCrearHold").hide();
  $("#loading").show();
     }).ajaxStop(function() {
  $("#loading").hide();
  $("#formCrearHold").show();
  });  


$(document).ready(function() {
  $("#formCrearHold").submit(function() {    
    $.ajax({
      type: "POST",
      url: '../controles/controlCrearHold.php',
      data:$("#formCrearHold").serialize(),
      success: function (result) { 
        var msg = result.trim();

        switch(msg) {
                case '1':
                    swal("Rut Duplicado", "El RUT ya se encuentra en el sistema", "warning");
                    break;
                case '2':
                    swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
                    break;
                case '3':
                    swal("Error Mail", "Favor ingrese un correo electronico para enviar las credenciales", "warning");
                    break;
                default:
                    swal("Usuario Creado", msg, "success");
            }
      },
      error: function(){
              alert('Verifique los datos')      
      }
    });
    return false;
  });
});

</script>



 
</head>

<body>


<?php
  include("../includes/infoLog.php");
  include("../includes/menu.php");
?>


<div class="container" id="main">
  <div class="row">
  <div class="col-12 text-center">
    <h3>Nueva Empresa del Holding&nbsp;&nbsp;<i class="fa fa-cog fa-spin fa-1x fa-fw"></i>
</h3>
    <hr>
  </div>
  </div>

  <div id="loading" style="display: none;">
    <center><img src="../recursos/img/load.gif"></center>
  </div>


  <form id="formCrearHold" onsubmit="return false;"  >

  <div class="row" >
    <div class="col-6">

            <div class="form-group">
              <label for="razon">Razón Social:</label>
                <div class="row">
                  <div class="col-12">
                    <input type="text" class="form-control" id="rsocial" name="rsocial"  maxlength="25" placeholder="Razón Social" required>
                  </div>
              </div>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <div class="row">
                  <div class="col-12">
                    <input type="text" class="form-control" id="direccion" name="direccion"  maxlength="25" placeholder="Dirección" required>
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label for="rut">Rut:</label>
              <input type="text"  class="form-control" id="rut" name="rut" maxlength="10" placeholder="xxxxxxxx-x" pattern="\d{3,8}-[\d|kK]{1}"  required>
            </div>

            <div class="form-group">
        <label for="giro">Giro:</label>
        <input type="text"  class="form-control" id="giro" name="giro" maxlength="250" placeholder="Giro" required>
        </div>
        <div class="form-group">
        <label for="comu_fact">Comuna Facturación:</label>
        <input type="text"  class="form-control" id="comu_fact" name="comu_fact" maxlength="250" placeholder="Comúna Facturación" required>
        </div>
  
    </div>

     <div class="col-6">
            <div class="form-group">
              <label for="telefono">Telefono:</label>
                <div class="row">
                  <div class="col-12">
                    <input type="text" class="form-control" id="telefono" name="telefono"  maxlength="25" placeholder="Teléfono" >
                  </div>
              </div>
            </div>

            <div class="form-group">
                <label for="contacto">Contacto Personal:</label>
                <div class="row">
                  <div class="col-12">
                    <input type="text" class="form-control" id="contacto" name="contacto"  maxlength="25" placeholder="Contacto Personal" required>
                  </div>
              </div>
            </div>

            <div class="form-group">
              <label for="mail">Mail:</label>
                <div class="row">
                  <div class="col-12">
                  <input type="email" class="form-control" id="mail" name="mail" maxlength="50"  placeholder="ejemplo@dominio.com" required>
                  </div>
              </div>
            </div>

            <div class="form-group">
              <label for="ciudadfact">Ciudad Facturación:</label>
                <div class="row">
                     <div class="col-12">
                     <input type="text" class="form-control" id="ciudadfact" name="ciudadfact" maxlength="50"  placeholder="Ciudad" required>
                     </div>
                </div>
            </div>             

            
            
              
      </div>
      
 
        <div class="col-12 text-center">
            <input type="submit" class="btn btn-info" id="btnAc" name="btnAc" value="Crear Nueva Empresa Holding" >                                         
        </div>
    </div>

  </form>


</div>


</body>
</html>