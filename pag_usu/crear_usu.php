<?php 
  include("../includes/validaSesion.php")
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Factor- Crear Usuario</title>
<?php
  include("../includes/recursosExternos.php");
?>
<script>
$(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>

<script type="text/javascript">

$(document).ajaxStart(function() {
  $("#formCrearUsu").hide();
  $("#loading").show();
     }).ajaxStop(function() {
  $("#loading").hide();
  $("#formCrearUsu").show();
  });  


$(document).ready(function() {
  $("#formCrearUsu").submit(function() {    
    $.ajax({
      type: "POST",
      url: '../controles/controlCrearUsu.php',
      data:$("#formCrearUsu").serialize(),
      success: function (result) { 
        var msg = result.trim();

        switch(msg) {
                case '1':
                    swal("Rut Duplicado", "El RUT ya se encuentra en el sistema, puede encontrarse sin vigencia", "warning");
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
  <div class="col-12">
    <h3>Nuevo Usuario&nbsp;&nbsp;<i class="fa fa-user-plus" aria-hidden="true"></i>
</h3>
    <hr>
  </div>
  </div>

  <div id="loading" style="display: none;">
    <center><img src="../recursos/img/load.gif"></center>
  </div>


  <form id="formCrearUsu" onsubmit="return false;"  >

  <div class="row" >
    <div class="col-6">

            <div class="form-group">
              <label for="nom">Nombre:</label>
                <div class="row">
                  <div class="col-12">
                    <input type="text" class="form-control" id="nombre" name="nombre"  maxlength="25" placeholder="Nombre" required>
                  </div>
              </div>
            </div>
            <div class="form-group">
                <label for="ape">Apellido:</label>
                <div class="row">
                  <div class="col-12">
                    <input type="text" class="form-control" id="apellido" name="apellido"  maxlength="25" placeholder="Apellido" required>
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label for="rut">Rut:</label>
              <input type="text"  class="form-control" id="rut" name="rut" maxlength="10" placeholder="xxxxxxxx-x" pattern="\d{3,8}-[\d|kK]{1}"  required>
            </div>
            <div class="form-group">
              <label for="mail">Mail:</label>
              <input type="text" class="form-control" id="mail" name="mail" maxlength="50"  placeholder="ejemplo@dominio.com" required>
            </div>
            
    </div>
    <div class="col-6">
        <div class="form-group">
          <label for="ape">Perfil de Sistema:</label>
             <select class="form-control" name="perfil" id="perfil" required>
                          <option value="" selected disabled>Seleccione el perfil</option>
                                       <?php 
                                        $re = $fun->cargar_perfiles(1);   
                                        foreach($re as $row)      
                                            {
                                              ?>
                                               <option value="<?php echo $row['id_perfil'] ?>"><?php echo $row['perfil'] ?></option>
                                                  
                                              <?php
                                            }    
                                        ?>       
                        </select>
          </div>
          <div class="form-group">
            <label for="ape">Cargo:</label>
               <select class="form-control" name="cargo" id="cargo" required>
                            <option value="" selected disabled>Seleccione el cargo</option>
                                         <?php 
                                          $re = $fun->cargar_cargos(1);   
                                          foreach($re as $row)      
                                              {
                                                ?>
                                                 <option value="<?php echo $row['id_cargo'] ?>"><?php echo $row['cargo'] ?></option>
                                                    
                                                <?php
                                              }    
                                          ?>       
                          </select>
            </div>
            <div class="form-group">
             <label for="mail">Nickname:</label>
             <input type="text" class="form-control" id="nick" name="nick" maxlength="20"  required>
          </div>
          
          <div class="form-group">
              <div class="col-12">
                                             

              </div>
              
          </div>
          </div>
      </div>
      
      <div class="col-12 text-center">
    <input type="submit" class="btn btn-info" id="btnAc" name="btnAc" value="Crear Usuario" >                                         
    </div>
    
    </div>

  </form>


</div>


</body>
</html>