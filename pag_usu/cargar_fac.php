<?php 
  include("../includes/validaSesion.php")
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Factor - Listado Factoring</title>
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

</script>

</head>

<body>


<?php
  include("../includes/infoLog.php");
  include("../includes/menu.php");
?>

<div class="container" id="main">

<div class="col-12 text-center">
    
<h3>Empresas de Factoring Actuales&nbsp;&nbsp;<i class="fa fa-balance-scale" aria-hidden="true"></i></h3>
<hr>

</div>

  <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="">ID         <i class="" aria-hidden="true"></i></th>
        <th class="">RUT            <i class="" aria-hidden="true"></i></th>
        <th class="">RAZÓN SOCIAL         <i class="" aria-hidden="true"></i></th>
        <th class="">EMAIL         <i class="" aria-hidden="true"></i></th>
        <th class="">TELEFONO         <i class="" aria-hidden="true"></i></th>
        <th class="">CONTACTO       <i class="" aria-hidden="true"></i></th>
        <th class="">DIRECCIÓN       <i class="" aria-hidden="true"></i></th>
        <!--<th class="th-sm">Editar<i class="fa fa-sort float-right" aria-hidden="true"></i></th>-->
      </tr>
    </thead>
    <tbody>

    <?php
      $re = $fun ->cargar_datos_fac();
      foreach($re as $row)
        {

        
      ?>
    
    <tr>
                  <td><?php echo $row['id_factoring']?></td>
                  <td><?php echo $row['rut']?></td>
                  <td><?php echo $row['razon_social']?></td>
                  <td><?php echo $row['email']?></td>
                  <td><?php echo $row['telefono']?></td>
                  <td><?php echo $row['contacto_personal']?></td>
                  <td><?php echo $row['direccion']?></td>
                 <!-- <td>Modificar <i class="fa fa-pencil-square" aria-hidden="true"></i>-->
</td>

      </tr>

              </tr>

<?php } ?>  

    </tbody>
    <tfoot>
      <tr>
        <th>ID</th>
        <th>RUT</th>
        <th>RAZÓN SOCIAL</th>
        <th>EMAIL</th>
        <th>TELEFONO</th>
        <th>CONTACTO</th>
        <th>DIRECCIÓN</th>
        <!--<th>Editar</th>-->
      </tr>
    </tfoot>
  </table>


</div>
</body>
</html>