<?php 
  include("../includes/validaSesion.php")
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Factor - Crear Usuario</title>
<?php
  include("../includes/recursosExternos.php");
?>
<script>
$(document).ready(function () {
  $('#dtBasicExample').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
  $('.dataTables_length').addClass('bs-select');
});

$(document).ready(function () {
  $('#dtBasicExample1').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
$(document).ready(function () {
  $('#dtBasicExample3').DataTable();
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


<div class="col-12 text-center">
  <h3>Usuarios Actuales&nbsp;&nbsp;<i class="fa fa-users" aria-hidden="true"></i></h3>
  <hr>
</div>

  <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="">Nombre         <i class="" aria-hidden="true"></i></th>
        <th class="">Rut            <i class="" aria-hidden="true"></i></th>
        <th class="">Mail           <i class="" aria-hidden="true"></i></th>
        <th class="">Perfil         <i class="" aria-hidden="true"></i></th>
        <th class="">Cargo          <i class="" aria-hidden="true"></i></th>
        <th class="">Vigencia       <i class="" aria-hidden="true"></i></th>
        <!--<th class="th-sm">Editar<i class="fa fa-sort float-right" aria-hidden="true"></i></th>-->
      </tr>
    </thead>
    <tbody>

    <?php
      $re = $fun ->cargar_datos_perfiles();
      foreach($re as $row)
        {

        
      ?>
    
    <tr>
                  <td><?php echo $row['nombre']?></td>
                  <td><?php echo $row['rut']?></td>
                  <td><?php echo $row['mail']?></td>
                  <td><?php echo $row['perf']?></td>
                  <td><?php echo $row['carg']?></td>
                  <td><?php echo $row['vig']?></td>
                 <!-- <td>Modificar <i class="fa fa-pencil-square" aria-hidden="true"></i>-->
</td>

      </tr>

              </tr>

<?php } ?>  

    </tbody>
    <tfoot>
      <tr>
        <th>Nombre</th>
        <th>Rut</th>
        <th>Mail</th>
        <th>Perfil</th>
        <th>Cargo</th>
        <th>Vigencia</th>
        <!--<th>Editar</th>-->
      </tr>
    </tfoot>
  </table>


</div>
</body>
</html>