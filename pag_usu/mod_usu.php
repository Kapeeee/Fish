<?php 
  include("../includes/validaSesion.php")
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Factor - Modificar Usuario</title>
<?php
  include("../includes/recursosExternos.php");
?>

<script type="text/javascript">

function mod(usu) {
    
     $.ajax({
      url: '../controles/controlCargarDatosUsu.php',
      type: 'POST',
      data: {"usu":usu},
      dataType:'json',
      success:function(result){
        console.log(result);
        $('#nombre').val(result[0].nombre);
        $('#apellido').val(result[0].apellido);
        $('#rut').val(result[0].rut);
        $('#mail').val(result[0].mail);
        $('#nick').val(result[0].nick);
        $("#perfil").val(result[0].perfil);
        $("#cargo").val(result[0].cargo);

        if ((result[0].vig)==1) {  
          $('#vig').prop('checked', true);
              }else  {
                $('#vig').prop('checked', false);
              }

  }
  })
  
}

$(document).ajaxStart(function() {
  $("#formModUsu").hide();
  $("#loading").show();
     }).ajaxStop(function() {
  $("#loading").hide();
  $("#formModUsu").show();
  });  


$(document).ready(function() {
  $("#formModUsu").submit(function() {    
    $.ajax({
      type: "POST",
      url: '../controles/controlModUsu.php',
      data:$("#formModUsu").serialize(),
      success: function (result) { 
        var msg = result.trim();
        console.log(result);
        switch(msg) {
                case '0':
                    window.location.assign("../index.html")
                    break;
                case '1':
                    swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
                    break;
                default:
                    swal("Usuario Modificado", msg, "success");
                    //location.reload(true);
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
    <h3>Modificar Usuario&nbsp;&nbsp;<i class="fa fa-pencil-square" aria-hidden="true"></i></h3>
    <hr>
  </div>
  </div>

  <div id="loading" style="display: none;">
    <center><img src="../recursos/img/load.gif"></center>
  </div>
    <form id="formModUsu" onsubmit="return false;"  >
    <div class="col-12">
      <select class="form-control" id="usu" name="usu" style="width: 500px" onchange="mod(this.value)">
          <option value="" selected disabled>Seleccione Usuario</option>
                     <?php 
                      $re = $fun->cargar_usuarios(1,2);   
                      foreach($re as $row)      
                          {
                            ?>
                            
                             <option value="<?php echo $row['id_usu'] ?>"><?php echo $row['usuario'] ?></option>
                                
                            <?php
                          }    
                      ?>  
      </select><hr>
    </div>



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
             <input type="text"  class="form-control" id="rut" name="rut" maxlength="10" placeholder="xxxxxxxx-x"  readonly>
          </div>
          <div class="form-group">
             <label for="mail">Mail:</label>
             <input type="text" class="form-control" id="mail" name="mail" maxlength="50"  required>
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
                                               <option value="<?php echo $row['id_perfil']; ?>"><?php echo $row['perfil']; ?></option>
                                              <?php
                                            }
                                        ?></select>
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
                                          ?></select>
            </div>
            <div class="form-group">
             <label for="mail">Nickname:</label>
             <input type="text" class="form-control" id="nick" name="nick" maxlength="20"  readonly>
          </div>             
          <div class="form-check">
            <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="vig" id="vig"> Vigencia</label>
          </div>
          <input type="submit" class="btn btn-info" id="btnAc" name="btnAc" value="Modificar Usuario" >
          </form>
  </div>
  </div>



</div>
</body>
</html>