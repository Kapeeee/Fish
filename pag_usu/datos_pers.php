<?php 
  include("../includes/validaSesion.php")
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Factor - Datos Personales</title>

<?php
  include("../includes/recursosExternos.php");
  include("../includes/infoLog.php");
  include("../includes/menu.php");
?>



<script type="text/javascript">

$(document).ajaxStart(function() {
  $("#formActPwd").hide();
  $("#main").hide();
  $("#loading").show();
     }).ajaxStop(function() {
  $("#loading").hide();
  $("#main").show();
  $("#formActPwd").show();
  });  


$(document).ready(function() {
  $("#formActPwd").submit(function() {    
    $.ajax({
      type: "POST",
      url: '../controles/controlActPwd.php',
      data:$("#formActPwd").serialize(),
      success: function (result) { 
        var msg = result.trim();

        switch(msg) {
                case '1':
                    swal("Error de Contraseña", "La contraseña actual no corresponde, intente nuevamente", "warning");
                    break;
                case '2':
                    swal("Error de Nueva Contraseña", "Las nuevas contraseñas no son iguales, intente nuevamente", "warning");
                    break;
                case '3':
                    swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
                    break;
                default:
                    swal("Contraseña Actualizada", msg, "success");
                    setInterval('location.reload()',10000);
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


<div class="container" id="main">
  <div class="row">
    <div class="col-12 text-center">
      <h3><i class="fa fa-address-card" aria-hidden="true"></i>&nbsp;Mis Datos&nbsp;</h3>
    </div>
    <div id="loading" style="display: none;">
    <center><img src="../recursos/img/load.gif"></center>
    </div>
  </div>
      <?php
      $re = $fun->cargar_datos_usu($id,1);   
      foreach($re as $row)      
          {
          }    
      ?>  
  <hr>
  <div class="row">
      <div class="col-6">

        <div class="input-group mb-2">
            <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;NOMBRE</div>
            </div>
            <input type="text" class="form-control" id="tasa" value ="<?php echo $row['nombre'] ?>" placeholder="" readonly>
        </div>  

        <div class="input-group mb-2">
            <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;APELLIDO</div>
            </div>
            <input type="text" class="form-control" id="tasa" value ="<?php echo $row['apellido'] ?>" placeholder="" readonly>
        </div>  

        <div class="input-group mb-2">
            <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp;RUT</div>
            </div>
            <input type="text" class="form-control" id="tasa" value ="<?php echo $row['rut'] ?>" placeholder="" readonly>
        </div>  
        <div class="input-group mb-2">
            <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></i>&nbsp;MAIL</div>
            </div>
            <input type="text" class="form-control" id="tasa" value ="<?php echo $row['mail'] ?>" placeholder="" readonly>
        </div> 

        
      </div>
      <div class="col-6">


          <div class="input-group mb-2">
            <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-address-card-o" aria-hidden="true"></i>&nbsp;PERFIL DEL SISTEMA</div>
            </div>
            <input type="text" class="form-control" id="perfil_usu" name="perfil_usu" value ="<?php echo $row['perfil'] ?>" placeholder="" readonly>
        </div> 
        <div class="input-group mb-2">
            <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-id-badge" aria-hidden="true"></i>&nbsp;CARGO</div>
            </div>
            <input type="text" class="form-control" name="cargo_usu" id="cargo_usu" value ="<?php echo $row['cargo'] ?>" placeholder="" readonly>
        </div> 
          
        <div class="input-group mb-2">
            <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-check-square-o" aria-hidden="true"></i></i>&nbsp;VIGENCIA</div>
            </div>
            <input type="text" class="form-control" id="vig_usu" name="vig_usu" value ="<?php echo $row['vig'] ?>" placeholder="" readonly>
        </div> 

        <div class="input-group mb-2">
            <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-star" aria-hidden="true"></i>&nbsp;NICKNAME</div>
            </div>
            <input type="text" class="form-control"  id="nick_usu" name="nick_usu" value ="<?php echo $row['nick'] ?>" placeholder="" readonly>
        </div>

      </div>
              
      <div class="col-12 text-center">
      <br>
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalActPwd" id="btn-pwd" name="btn-pwd">Actualizar Contraseña</button> 
      </div>
    </div>
  </div>

    <div class="modal fade " id="ModalActPwd" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Actualizar Contraseña</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <br>
        <div class="col-12">
              <form  id="formActPwd" onsubmit="return false;">
              <div class="form-group row">
                <label class="col-sm-6 col-form-label" >Contraseña Actual:</label>
                <div class="col-sm-6">
                <input type="password" class="form-control" id="actpwd" placeholder="Ingresa tu contraseña" maxlength="6" name="actpwd">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-6 col-form-label" >Nueva Contraseña:</label>
                <div class="col-sm-6">
                <input type="password" class="form-control" id="newpwd1" placeholder="Nueva contraseña" maxlength="6" name="newpwd1">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-6 col-form-label" >Repita la Nueva Contraseña:</label>
                <div class="col-sm-6">
                <input type="password" class="form-control" id="newpwd2" placeholder="Nueva contraseña" maxlength="6" name="newpwd2">
                </div>
              </div>
                <center><input type="submit" class="btn btn-info" id="btnAc" name="btnAc" value="Actualizar"></center> 
                <br>
              </form>
          </div>
        
      </div>

    </div>
  </div>
</body>
</html>