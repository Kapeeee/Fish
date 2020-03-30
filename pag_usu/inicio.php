<?php 
  include("../includes/validaSesion.php")
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Factor - Resumen</title>

<?php
  include("../includes/recursosExternos.php");
  include("../includes/infoLog.php");
  include("../includes/menu.php");
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
  $('#dtBasicExample2').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
  $('.dataTables_length').addClass('bs-select');
});
$(document).ready(function () {
  $('#dtBasicExample3').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
  $('.dataTables_length').addClass('bs-select');
});
$(document).ready(function () {
  $('#dtBasicExample4').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
  $('.dataTables_length').addClass('bs-select');
});
$(document).ready(function () {
  $('#dtBasicExample5').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
  $('.dataTables_length').addClass('bs-select');
});
$(document).ready(function () {
  $('#dtBasicExample6').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
  $('.dataTables_length').addClass('bs-select');
});
$(document).ready(function () {
  $('#dtBasicExample7').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
  $('.dataTables_length').addClass('bs-select');
});
</script>

</head>
<body>

      <div class="container border border-dark" id="main">
            <div class="row">
                  <div class="col-12 text-center">
                        <h3><i class="fa fa-pie-chart" aria-hidden="true"></i>&nbsp;Resúmen General</h3>
                  </div>
                  <hr>
            </div>

            <div class="container border border-success" id="main">
                  <h5>Facturas Sin Movimiento &nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i></i></h5>
                  <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" style="font-size: 0.8rem;" width="100%">
                  <thead class="thead-dark">
                  <tr>
                  <th class="th-sm">N° Factura</th>
                  <th class="th-sm">Estado</th>
                  <th class="th-sm">Cliente</th>
                  <th class="th-sm">Rut</th>
                  <th class="th-sm">Valor</th>
                  <th class="th-sm">Anticipado</th>
                  <th class="th-sm">F. Emisión</th>
                  <th class="th-sm">F. Vencimiento</th>
                  <th class="th-sm">Factoring</th>
                  <th class="th-sm">Interes Mora</th>
                  <th class="th-sm">Holding</th>
                  <th class="th-sm">Dias para Vencer</th>
                  <th class="th-sm">Gestionar</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                  $re = $fun ->traer_facturas(1);

                  foreach($re as $row)
                  {


                  ?>

                  <tr>
                  <td><?php echo "N° ".$row['numero_doc']?></td>
                  <td><?php echo $row['desc_item']?></td>
                  <td><?php echo $row['cliente']?></td>
                  <td><?php echo $row['rut']?></td>
                  <td><?php echo "<script>var string = numeral(". $row['valor'].").format('$000,000,000,000');document.write(string)</script>"?></td>
                  <td><?php echo "<script>var string = numeral(". $row['anticipado'].").format('$000,000,000,000');document.write(string)</script>"?></td>
                  <td><?php echo $row['fec_emision']?></td>
                  <td><?php echo $row['fec_venc']?></td>
                  <td><?php echo $row['factoring']?></td>
                  <td><?php echo $row['interes_mora']?></td>
                  <td><?php echo $row['holding']?></td>
                  <td><?php 
                  $fec_actual = date("d-m-Y", time());
                  $fec_venc = $row['fec_venc'];
                  $datetime1 = date_create($fec_actual);
                  $datetime2 = date_create($fec_venc);
                  $interval = date_diff($datetime2, $datetime1);
                  echo $interval->format('%R%a días');
                  ?>
                  </td>

                  <td><a style="text-decoration:none"  href="mod_doc.php?id_documento=<?php echo $row['id_documento']?>" name="" value="">Gestionar</a></td>






                  </tr>

                  </tr>

                  <?php } ?>  

                  </tbody>
                  <tfoot>
                  <tr>
                  <th>N° Factura</th>
                  <th>Estado</th>
                  <th>Cliente</th>
                  <th>Rut</th>
                  <th>Valor</th>
                  <th>Anticipado</th>
                  <th>F. Emisión</th>
                  <th>F. Vencimiento</th>
                  <th>Factoring</th>
                  <th>Interes Mora</th>
                  <th>Holding</th>
                  <th>Dias Restantes</th>
                  <th>Gestionar</th>
                  </tr>
                  </tfoot> 
                  </table>

            </div>


            





            <div class="container border border-success" id="main">
                  <h5>Facturas Factorizadas &nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i></i></h5>
                  <table id="dtBasicExample2" class="table table-striped table-bordered" cellspacing="0" style="font-size: 0.8rem;" width="100%">
                  <thead class="thead-dark">
                  <tr>
                  <th class="th-sm">N° Factura</th>
                  <th class="th-sm">Estado</th>
                  <th class="th-sm">Cliente</th>
                  <th class="th-sm">Rut</th>
                  <th class="th-sm">Valor</th>
                  <th class="th-sm">Anticipado</th>
                  <th class="th-sm">F. Emisión</th>
                  <th class="th-sm">F. Vencimiento</th>
                  <th class="th-sm">Factoring</th>
                  <th class="th-sm">Interes Mora</th>
                  <th class="th-sm">Holding</th>
                  <th class="th-sm">Dias en Mora</th>
                  <th class="th-sm">Gestionar</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                  $re = $fun ->traer_facturas(2);

                  foreach($re as $row)
                  {


                  ?>

                  <tr>
                  <td><?php echo "N° ".$row['numero_doc']?></td>
                  <td><?php echo $row['desc_item']?></td>
                  <td><?php echo $row['cliente']?></td>
                  <td><?php echo $row['rut']?></td>
                  <td><?php echo "<script>var string = numeral(". $row['valor'].").format('$000,000,000,000');document.write(string)</script>"?></td>
                  <td><?php echo "<script>var string = numeral(". $row['anticipado'].").format('$000,000,000,000');document.write(string)</script>"?></td>
                  <td><?php echo $row['fec_emision']?></td>
                  <td><?php echo $row['fec_venc']?></td>
                  <td><?php echo $row['factoring']?></td>
                  <td><?php echo $row['interes_mora']?></td>
                  <td><?php echo $row['holding']?></td>
                  <td><?php 
                  $fec_actual = date("d-m-Y", time());
                  $fec_venc = $row['fec_venc'];
                  $datetime1 = date_create($fec_actual);
                  $datetime2 = date_create($fec_venc);
                  $interval = date_diff($datetime2, $datetime1);
                  echo $interval->format('%R%a días');
                  ?>
                  </td>
                  <td><a style="text-decoration:none"  href="mod_doc.php?id_documento=<?php echo $row['id_documento']?>" name="" value="">Gestionar</a></td> 





                  </tr>

                  </tr>

                  <?php } ?>  

                  </tbody>
                  <tfoot>
                  <tr>
                  <th>N° Factura</th>
                  <th>Estado</th>
                  <th>Cliente</th>
                  <th>Rut</th>
                  <th>Valor</th>
                  <th>Anticipado</th>
                  <th>F. Emisión</th>
                  <th>F. Vencimiento</th>
                  <th>Factoring</th>
                  <th>Interes Mora</th>
                  <th>Holding</th>
                  <th>Dias Restantes</th>
                  <th>Gestionar</th>
                  </tr>
                  </tfoot> 
                  </table>

            </div>
            <div class="container border border-success" id="main">
                  <h5>Facturas Prorrogadas &nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i></i></h5>
                  <table id="dtBasicExample3" class="table table-striped table-bordered" cellspacing="0" style="font-size: 0.8rem;" width="100%">
                  <thead class="thead-dark">
                  <tr>
                  <th class="th-sm">N° Factura</th>
                  <th class="th-sm">Estado</th>
                  <th class="th-sm">Cliente</th>
                  <th class="th-sm">Rut</th>
                  <th class="th-sm">Valor</th>
                  <th class="th-sm">Anticipado</th>
                  <th class="th-sm">F. Emisión</th>
                  <th class="th-sm">F. Vencimiento</th>
                  <th class="th-sm">Factoring</th>
                  <th class="th-sm">Interes Mora</th>
                  <th class="th-sm">Holding</th>
                  <th class="th-sm">Dias en Mora</th>
                  <th class="th-sm">Gestionar</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                  $re = $fun ->traer_facturas(3);

                  foreach($re as $row)
                  {


                  ?>

                  <tr>
                  <td><?php echo "N° ".$row['numero_doc']?></td>
                  <td><?php echo $row['desc_item']?></td>
                  <td><?php echo $row['cliente']?></td>
                  <td><?php echo $row['rut']?></td>
                  <td><?php echo "<script>var string = numeral(". $row['valor'].").format('$000,000,000,000');document.write(string)</script>"?></td>
                  <td><?php echo "<script>var string = numeral(". $row['anticipado'].").format('$000,000,000,000');document.write(string)</script>"?></td>
                  <td><?php echo $row['fec_emision']?></td>
                  <td><?php echo $row['fec_venc']?></td>
                  <td><?php echo $row['factoring']?></td>
                  <td><?php echo $row['interes_mora']?></td>
                  <td><?php echo $row['holding']?></td>
                  <td><?php 
                  $fec_actual = date("d-m-Y", time());
                  $fec_venc = $row['fec_venc'];
                  $datetime1 = date_create($fec_actual);
                  $datetime2 = date_create($fec_venc);
                  $interval = date_diff($datetime2, $datetime1);
                  echo $interval->format('%R%a días');
                  ?>
                  </td>

                  <td><a style="text-decoration:none"  href="mod_doc.php?id_documento=<?php echo $row['id_documento']?>" name="" value="">Gestionar</a></td>






                  </tr>

                  </tr>

                  <?php } ?>  

                  </tbody>
                  <tfoot>
                  <tr>
                  <th>N° Factura</th>
                  <th>Estado</th>
                  <th>Cliente</th>
                  <th>Rut</th>
                  <th>Valor</th>
                  <th>Anticipado</th>
                  <th>F. Emisión</th>
                  <th>F. Vencimiento</th>
                  <th>Factoring</th>
                  <th>Interes Mora</th>
                  <th>Holding</th>
                  <th>Dias Restantes</th>
                  <th>Gestionar</th>
                  </tr>
                  </tfoot> 
                  </table>

            </div>
            <div class="container border border-success" id="main">
                  <h5>Cancelada de Cliente a Factor &nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i></i></h5>
                  <table id="dtBasicExample4" class="table table-striped table-bordered" cellspacing="0" style="font-size: 0.8rem;" width="100%">
                  <thead class="thead-dark">
                  <tr>
                  <th class="th-sm">N° Factura</th>
                  <th class="th-sm">Estado</th>
                  <th class="th-sm">Cliente</th>
                  <th class="th-sm">Rut</th>
                  <th class="th-sm">Valor</th>
                  <th class="th-sm">Anticipado</th>
                  <th class="th-sm">F. Emisión</th>
                  <th class="th-sm">F. Vencimiento</th>
                  <th class="th-sm">Factoring</th>
                  <th class="th-sm">Interes Mora</th>
                  <th class="th-sm">Holding</th>
                  <th class="th-sm">Dias en Mora</th>
                  <th class="th-sm">Gestionar</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                  $re = $fun ->traer_facturas(4);

                  foreach($re as $row)
                  {


                  ?>

                  <tr>
                  <td><?php echo "N° ".$row['numero_doc']?></td>
                  <td><?php echo $row['desc_item']?></td>
                  <td><?php echo $row['cliente']?></td>
                  <td><?php echo $row['rut']?></td>
                  <td><?php echo "<script>var string = numeral(". $row['valor'].").format('$000,000,000,000');document.write(string)</script>"?></td>
                  <td><?php echo "<script>var string = numeral(". $row['anticipado'].").format('$000,000,000,000');document.write(string)</script>"?></td>
                  <td><?php echo $row['fec_emision']?></td>
                  <td><?php echo $row['fec_venc']?></td>
                  <td><?php echo $row['factoring']?></td>
                  <td><?php echo $row['interes_mora']?></td>
                  <td><?php echo $row['holding']?></td>
                  <td><?php 
                  $fec_actual = date("d-m-Y", time());
                  $fec_venc = $row['fec_venc'];
                  $datetime1 = date_create($fec_actual);
                  $datetime2 = date_create($fec_venc);
                  $interval = date_diff($datetime2, $datetime1);
                  echo $interval->format('%R%a días');
                  ?>
                  </td>

                  <td><a style="text-decoration:none"  href="mod_doc.php?id_documento=<?php echo $row['id_documento']?>" name="" value="">Gestionar</a></td>






                  </tr>

                  </tr>

                  <?php } ?>  

                  </tbody>
                  <tfoot>
                  <tr>
                  <th>N° Factura</th>
                  <th>Estado</th>
                  <th>Cliente</th>
                  <th>Rut</th>
                  <th>Valor</th>
                  <th>Anticipado</th>
                  <th>F. Emisión</th>
                  <th>F. Vencimiento</th>
                  <th>Factoring</th>
                  <th>Interes Mora</th>
                  <th>Holding</th>
                  <th>Dias Restantes</th>
                  <th>Gestionar</th>
                  </tr>
                  </tfoot> 
                  </table>

            </div>
            <div class="container border border-success" id="main">
                  <h5>Cancelada de Cliente a Factoring &nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i></i></h5>
                  <table id="dtBasicExample5" class="table table-striped table-bordered" cellspacing="0" style="font-size: 0.8rem;" width="100%">
                  <thead class="thead-dark">
                  <tr>
                  <th class="th-sm">N° Factura</th>
                  <th class="th-sm">Estado</th>
                  <th class="th-sm">Cliente</th>
                  <th class="th-sm">Rut</th>
                  <th class="th-sm">Valor</th>
                  <th class="th-sm">Anticipado</th>
                  <th class="th-sm">F. Emisión</th>
                  <th class="th-sm">F. Vencimiento</th>
                  <th class="th-sm">Factoring</th>
                  <th class="th-sm">Interes Mora</th>
                  <th class="th-sm">Holding</th>
                  <th class="th-sm">Dias en Mora</th>
                  <th class="th-sm">Gestionar</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                  $re = $fun ->traer_facturas(5);

                  foreach($re as $row)
                  {


                  ?>

                  <tr>
                  <td><?php echo "N° ".$row['numero_doc']?></td>
                  <td><?php echo $row['desc_item']?></td>
                  <td><?php echo $row['cliente']?></td>
                  <td><?php echo $row['rut']?></td>
                  <td><?php echo "<script>var string = numeral(". $row['valor'].").format('$000,000,000,000');document.write(string)</script>"?></td>
                  <td><?php echo "<script>var string = numeral(". $row['anticipado'].").format('$000,000,000,000');document.write(string)</script>"?></td>
                  <td><?php echo $row['fec_emision']?></td>
                  <td><?php echo $row['fec_venc']?></td>
                  <td><?php echo $row['factoring']?></td>
                  <td><?php echo $row['interes_mora']?></td>
                  <td><?php echo $row['holding']?></td>
                  <td><?php 
                  $fec_actual = date("d-m-Y", time());
                  $fec_venc = $row['fec_venc'];
                  $datetime1 = date_create($fec_actual);
                  $datetime2 = date_create($fec_venc);
                  $interval = date_diff($datetime2, $datetime1);
                  echo $interval->format('%R%a días');
                  ?>
                  </td>

                  <td><a style="text-decoration:none"  href="mod_doc.php?id_documento=<?php echo $row['id_documento']?>" name="" value="">Gestionar</a></td>






                  </tr>

                  </tr>

                  <?php } ?>  

                  </tbody>
                  <tfoot>
                  <tr>
                  <th>N° Factura</th>
                  <th>Estado</th>
                  <th>Cliente</th>
                  <th>Rut</th>
                  <th>Valor</th>
                  <th>Anticipado</th>
                  <th>F. Emisión</th>
                  <th>F. Vencimiento</th>
                  <th>Factoring</th>
                  <th>Interes Mora</th>
                  <th>Holding</th>
                  <th>Dias Restantes</th>
                  <th>Gestionar</th>
                  </tr>
                  </tfoot> 
                  </table>

            </div>
            <div class="container border border-success" id="main">
                  <h5>Cancelada de Factor a Factoring &nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i></i></h5>
                  <table id="dtBasicExample6" class="table table-striped table-bordered" cellspacing="0" style="font-size: 0.8rem;" width="100%">
                  <thead class="thead-dark">
                  <tr>
                  <th class="th-sm">N° Factura</th>
                  <th class="th-sm">Estado</th>
                  <th class="th-sm">Cliente</th>
                  <th class="th-sm">Rut</th>
                  <th class="th-sm">Valor</th>
                  <th class="th-sm">Anticipado</th>
                  <th class="th-sm">F. Emisión</th>
                  <th class="th-sm">F. Vencimiento</th>
                  <th class="th-sm">Factoring</th>
                  <th class="th-sm">Interes Mora</th>
                  <th class="th-sm">Holding</th>
                  <th class="th-sm">Dias en Mora</th>
                  <th class="th-sm">Gestionar</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                  $re = $fun ->traer_facturas(6);

                  foreach($re as $row)
                  {


                  ?>

                  <tr>
                  <td><?php echo "N° ".$row['numero_doc']?></td>
                  <td><?php echo $row['desc_item']?></td>
                  <td><?php echo $row['cliente']?></td>
                  <td><?php echo $row['rut']?></td>
                  <td><?php echo "<script>var string = numeral(". $row['valor'].").format('$000,000,000,000');document.write(string)</script>"?></td>
                  <td><?php echo "<script>var string = numeral(". $row['anticipado'].").format('$000,000,000,000');document.write(string)</script>"?></td>
                  <td><?php echo $row['fec_emision']?></td>
                  <td><?php echo $row['fec_venc']?></td>
                  <td><?php echo $row['factoring']?></td>
                  <td><?php echo $row['interes_mora']?></td>
                  <td><?php echo $row['holding']?></td>
                  <td><?php 
                  $fec_actual = date("d-m-Y", time());
                  $fec_venc = $row['fec_venc'];
                  $datetime1 = date_create($fec_actual);
                  $datetime2 = date_create($fec_venc);
                  $interval = date_diff($datetime2, $datetime1);
                  echo $interval->format('%R%a días');
                  ?>
                  </td>

                  <td><a style="text-decoration:none"  href="mod_doc.php?id_documento=<?php echo $row['id_documento']?>" name="" value="">Gestionar</a></td>






                  </tr>

                  </tr>

                  <?php } ?>  

                  </tbody>
                  <tfoot>
                  <tr>
                  <th>N° Factura</th>
                  <th>Estado</th>
                  <th>Cliente</th>
                  <th>Rut</th>
                  <th>Valor</th>
                  <th>Anticipado</th>
                  <th>F. Emisión</th>
                  <th>F. Vencimiento</th>
                  <th>Factoring</th>
                  <th>Interes Mora</th>
                  <th>Holding</th>
                  <th>Dias Restantes</th>
                  <th>Gestionar</th>
                  </tr>
                  </tfoot> 
                  </table>

            </div>
            <div class="container border border-success" id="main">
                  <h5>Cancelada de Factor a Factoring &nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i></i></h5>
                  <table id="dtBasicExample7" class="table table-striped table-bordered" cellspacing="0" style="font-size: 0.8rem;" width="100%">
                  <thead class="thead-dark">
                  <tr>
                  <th class="th-sm">N° Factura</th>
                  <th class="th-sm">Estado</th>
                  <th class="th-sm">Cliente</th>
                  <th class="th-sm">Rut</th>
                  <th class="th-sm">Valor</th>
                  <th class="th-sm">Anticipado</th>
                  <th class="th-sm">F. Emisión</th>
                  <th class="th-sm">F. Vencimiento</th>
                  <th class="th-sm">Factoring</th>
                  <th class="th-sm">Interes Mora</th>
                  <th class="th-sm">Holding</th>
                  <th class="th-sm">Dias en Mora</th>
                  <th class="th-sm">Gestionar</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                  $re = $fun ->traer_facturas(7);

                  foreach($re as $row)
                  {


                  ?>

                  <tr>
                  <td><?php echo "N° ".$row['numero_doc']?></td>
                  <td><?php echo $row['desc_item']?></td>
                  <td><?php echo $row['cliente']?></td>
                  <td><?php echo $row['rut']?></td>
                  <td><?php echo "<script>var string = numeral(". $row['valor'].").format('$000,000,000,000');document.write(string)</script>"?></td>
                  <td><?php echo "<script>var string = numeral(". $row['anticipado'].").format('$000,000,000,000');document.write(string)</script>"?></td>
                  <td><?php echo $row['fec_emision']?></td>
                  <td><?php echo $row['fec_venc']?></td>
                  <td><?php echo $row['factoring']?></td>
                  <td><?php echo $row['interes_mora']?></td>
                  <td><?php echo $row['holding']?></td>
                  <td><?php 
                  $fec_actual = date("d-m-Y", time());
                  $fec_venc = $row['fec_venc'];
                  $datetime1 = date_create($fec_actual);
                  $datetime2 = date_create($fec_venc);
                  $interval = date_diff($datetime2, $datetime1);
                  echo $interval->format('%R%a días');
                  ?>
                  </td>

                  <td><a style="text-decoration:none"  href="mod_doc.php?id_documento=<?php echo $row['id_documento']?>" name="" value="">Gestionar</a></td>






                  </tr>

                  </tr>

                  <?php } ?>  

                  </tbody>
                  <tfoot>
                  <tr>
                  <th>N° Factura</th>
                  <th>Estado</th>
                  <th>Cliente</th>
                  <th>Rut</th>
                  <th>Valor</th>
                  <th>Anticipado</th>
                  <th>F. Emisión</th>
                  <th>F. Vencimiento</th>
                  <th>Factoring</th>
                  <th>Interes Mora</th>
                  <th>Holding</th>
                  <th>Dias Restantes</th>
                  <th>Gestionar</th>
                  </tr>
                  </tfoot> 
                  </table>

            </div>
    









      </div>


</body>
</html>