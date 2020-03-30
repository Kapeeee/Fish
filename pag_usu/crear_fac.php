<?php 
  include("../includes/validaSesion.php")
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Factor- Crear Nueva Empresa de Factoring</title>
<?php
  include("../includes/recursosExternos.php");
?>


<script type="text/javascript">

$(document).ajaxStart(function() {
  $("#formCrearFac").hide();
  $("#loading").show();
     }).ajaxStop(function() {
  $("#loading").hide();
  $("#formCrearFac").show();
  });  


$(document).ready(function() {
  $("#formCrearFac").submit(function() {    
    $.ajax({
      type: "POST",
      url: '../controles/controlCrearFac.php',
      data:$("#formCrearFac").serialize(),
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
    <h3>Nueva Empresa de Factoring&nbsp;&nbsp;<i class="fa fa-balance-scale" aria-hidden="true"></i>
</h3>
    <hr>
  </div>
  </div>

  <div id="loading" style="display: none;">
    <center><img src="../recursos/img/load.gif"></center>
  </div>


  <form id="formCrearFac" onsubmit="return false;"  >

  <div class="row" >

   <!--  PRIMERA COLUMNA -->
    <div class="col-4">
      

            <div class="form-group">
              <label for="razon">Razón Social:</label>
                <div class="row">
                  <div class="col-12">
                    <input type="text" class="form-control" id="rsocial" name="rsocial"  maxlength="150" placeholder="Razón Social" required>
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
                <label for="contacto">Contacto Principal:</label>
                <div class="row">
                  <div class="col-12">
                    <input type="text" class="form-control" id="contacto" name="contacto"  maxlength="100" placeholder="Contacto Principal" required>
                  </div>
              </div>
            </div>

             <div class="form-group">
                <label for="contacto_personal2">Contacto Secundario:</label>
                <div class="row">
                  <div class="col-12">
                    <input type="text" class="form-control" id="contacto_personal2" name="contacto_personal2"  maxlength="100" placeholder="Contacto Secundario" >
                  </div>
              </div>
            </div>


            <div class="form-group">
              <label for="email4">Mail Alternativo:</label>
              <div class="row">
                <div class="col-12">
                  <input type="email" class="form-control" id="email4" name="email4" maxlength="50"  placeholder="ejemplo@dominio.com" >
                </div>
              </div>
            </div>  



  
    </div>
     
   <!--  SEGUNDA COLUMNA -->
     <div class="col-4">

                 <div class="form-group">
              <label for="rut">Rut:</label>
              <input type="text"  class="form-control" id="rut" name="rut" maxlength="10" placeholder="xxxxxxxx-x" pattern="\d{3,8}-[\d|kK]{1}"  required>
            </div>
            
            <div class="form-group">
              <label for="telefono">Telefono:</label>
                <div class="row">
                  <div class="col-12">
                    <input type="text" class="form-control" id="telefono" name="telefono"  maxlength="20" placeholder="Teléfono">
                  </div>
              </div>
            </div>

            <div class="form-group">
              <label for="cargo_contactop1">Cargo Contacto Principal:</label>
                <div class="row">
                  <div class="col-12">
                    <input type="text" class="form-control" id="cargo_contactop1" name="cargo_contactop1"  maxlength="45" placeholder="Cargo" >
                  </div>
              </div>
            </div>

            <div class="form-group">
              <label for="cargo_contactop2">Cargo Contacto Secundario:</label>
                <div class="row">
                  <div class="col-12">
                    <input type="text" class="form-control" id="cargo_contactop2" name="cargo_contactop2"  maxlength="45" placeholder="Cargo">
                  </div>
              </div>
            </div>
           

           
        </div>
    
   <!--  TERCERA COLUMNA -->
    <div class="col-4">

          <div class="form-group">
              <label for="direccion">Dirección:</label>
              <div class="row">
                <div class="col-12">
                  <input type="text" class="form-control" id="direccion" name="direccion"  maxlength="100" placeholder="Dirección" required>
                </div>
                
            </div>
          </div>

               <div class="form-group">
              <label for="celular">Celular:</label>
                <div class="row">
                  <div class="col-12">
                    <input type="text" class="form-control" id="celular" name="celular"  maxlength="20" placeholder="Celular ">
                  </div>
              </div>
            </div>


            <div class="form-group">
              <label for="email2">Mail Contacto Principal:</label>
              <div class="row">
                <div class="col-12">
                  <input type="email" class="form-control" id="email2" name="email2" maxlength="50"  placeholder="ejemplo@dominio.com" >
                </div>
              </div>
            </div> 


            <div class="form-group">
              <label for="email3">Mail Contacto Secundario:</label>
              <div class="row">
                <div class="col-12">
                  <input type="email" class="form-control" id="email3" name="email3" maxlength="50"  placeholder="ejemplo@dominio.com" >
                </div>
              </div>
            </div> 
          </div>        







 
   



        
    </div>



<!--  DATOS FINANCIEROS -->


<hr>
    <div class="row">
          <div class="col-12 text-center">
            <h5>Datos Financieros</h5>
            <br>
          </div>
          
          <div class="col-4">

              <div class="form-group">
                  <label for="banco_cta_1">Banco Cuenta Principal:</label>
                  <div class="row">
                    <div class="col-12">
                      <input type="text" class="form-control" id="banco_cta_1" name="banco_cta_1"  maxlength="45" placeholder="Banco Principal" >
                    </div>
                    
                </div>
              </div>

              <div class="form-group">
                  <label for="banco_cta_2">Banco Cuenta Secundaria:</label>
                  <div class="row">
                    <div class="col-12">
                      <input type="text" class="form-control" id="banco_cta_2" name="banco_cta_2"  maxlength="45" placeholder="Banco Secundario" >
                    </div>
                    
                </div>
              </div>

    </div>



          <div class="col-4">

              <div class="form-group">
                  <label for="num_cta_1">Numero Cta. Principal:</label>
                  <div class="row">
                    <div class="col-12">
                      <input type="text" class="form-control" id="num_cta_1" name="num_cta_1"  maxlength="45" placeholder="N° Cta. Principal" >
                    </div>
                    
                </div>
              </div>

              <div class="form-group">
                  <label for="num_cta_2">Numero Cta. Secundaria:</label>
                  <div class="row">
                    <div class="col-12">
                      <input type="text" class="form-control" id="num_cta_2" name="num_cta_2"  maxlength="45" placeholder="N° Cta. Secundaria" >
                    </div>
                    
                </div>
              </div>

          </div>


          <div class="col-4">

          <div class="form-group">
              <label for="tipo_cta_1">Tipo Cuenta Principal:</label>
              <div class="row">
                <div class="col-12">
                  <input type="text" class="form-control" id="tipo_cta_1" name="tipo_cta_1"  maxlength="45" placeholder="Tipo de Cuenta" >
                </div>
                
            </div>
          </div>

            <div class="form-group">
                <label for="tipo_cta_2">Tipo Cuenta Secundaria:</label>
                <div class="row">
                  <div class="col-12">
                    <input type="text" class="form-control" id="tipo_cta_2" name="tipo_cta_2"  maxlength="45" placeholder="Tipo de Cuenta" >
                  </div>
                  
              </div>
            </div>
          </div>
    

    <div class="col-12 text-center">
      <hr><br>
            <input type="submit" class="btn btn-info" id="btnAc" name="btnAc" value="Crear Nueva Empresa" >                                         
    </div>
    </div>
    
    








  </form>


</div>


</body>
</html>