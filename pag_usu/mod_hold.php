<?php 
  include("../includes/validaSesion.php")
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Factor - Modificar Empresa Holding</title>
<?php
  include("../includes/recursosExternos.php");
?>

<script type="text/javascript">

function mod(hold) {
    
     $.ajax({
      url: '../controles/controlCargarDatosHold.php',
      type: 'POST',
      data: {"hold":hold},
      dataType:'json',
      success:function(result){
        console.log(result);
        $('#rsocial').val(result[0].razon_social);
        $('#mail').val(result[0].email);
        $("#direccion").val(result[0].direccion);
        $('#rut').val(result[0].rut);
        $('#telefono').val(result[0].telefono);
        $('#contacto').val(result[0].contacto_personal);
        $('#giro').val(result[0].giro);
        $('#comu_fact').val(result[0].comuna_factura);
        $('#ciudadfact').val(result[0].ciudad_factura);

  }
  })
  
}

$(document).ajaxStart(function() {
  $("#formModHold").hide();
  $("#loading").show();
     }).ajaxStop(function() {
  $("#loading").hide();
  $("#formModHold").show();
  });  


$(document).ready(function() {
  $("#formModHold").submit(function() {    
    $.ajax({
      type: "POST",
      url: '../controles/controlModHold.php',
      data:$("#formModHold").serialize(),
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
    <h3>Modificar Empresa del Holding&nbsp;&nbsp;<i class="fa fa-cog fa-spin fa-1x fa-fw"></i></h3>
    <hr>
  </div>
  </div>

  <div id="loading" style="display: none;">
    <center><img src="../recursos/img/load.gif"></center>
  </div>
    <form id="formModHold" onsubmit="return false;"  >
    <div class="col-12">
      <select class="form-control" id="hold" name="hold" style="width: 500px" onchange="mod(this.value)">
          <option value="" selected disabled>Seleccione Empresa</option>
                     <?php 
                      $re = $fun->cargar_datos_hold();   
                      foreach($re as $row)      
                          {
                            ?>
                            
                             <option value="<?php echo $row['id_hold'] ?>"><?php echo $row['razon_social'] ?></option>
                                
                            <?php
                          }    
                      ?>  
      </select><hr>
    </div>



  <div class="row" >
  <div class="col-6">

        <div class="form-group">
        <label for="razon">Razón Social:</label>
            <div class="row">
            <div class="col-12">
                <input type="text" class="form-control" id="rsocial" name="rsocial"  maxlength="150" placeholder="Razón Social" required>
            </div>
        </div>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <div class="row">
            <div class="col-12">
                <input type="text" class="form-control" id="direccion" name="direccion"  maxlength="100" placeholder="Dirección" required>
            </div>
        </div>
        </div>
        <div class="form-group">
        <label for="rut">Rut:</label>
        <input type="text"  class="form-control" id="rut" name="rut" maxlength="10" placeholder="xxxxxxxx-x" pattern="\d{3,8}-[\d|kK]{1}"  required>
        </div>

        <div class="form-group">
        <label for="giro">Giro:</label>
        <input type="text"  class="form-control" id="giro" name="giro" maxlength="150" placeholder="Giro" required>
        </div>
        <div class="form-group">
        <label for="comu_fact">Comuna Facturación:</label>
        <input type="text"  class="form-control" id="comu_fact" name="comu_fact" maxlength="150" placeholder="Comúna Facturación" required>
        </div>                          



    </div>
    <div class="col-6">
    <div class="form-group">
              <label for="telefono">Telefono:</label>
                <div class="row">
                  <div class="col-12">
                    <input type="text" class="form-control" id="telefono" name="telefono"  maxlength="20" placeholder="Teléfono" required>
                  </div>
              </div>
            </div>
            <div class="form-group">
                <label for="contacto">Contacto Personal:</label>
                <div class="row">
                  <div class="col-12">
                    <input type="text" class="form-control" id="contacto" name="contacto"  maxlength="100" placeholder="Contacto Personal" required>
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label for="mail">Mail:</label>
              <input type="email" class="form-control" id="mail" name="mail" maxlength="50"  placeholder="ejemplo@dominio.com" required>
            </div> 

             <div class="form-group">
              <label for="ciudadfact">Ciudad Facturación:</label>
                <div class="row">
                     <div class="col-12">
                     <input type="text" class="form-control" id="ciudadfact" name="ciudadfact" maxlength="150"  placeholder="Ciudad" required>
                     </div>
                </div>
            </div> 

      </div>
      <div class="col-12 text-center">
      <input type="submit" class="btn btn-info" id="btnAc" name="btnAc" value="Modificar Empresa" >
            </form>
            </div>
           
    </div>
  </div>



</div>
</body>
</html>