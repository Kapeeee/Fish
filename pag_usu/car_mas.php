<?php

include("../includes/validaSesion.php");
include("../includes/infoLog.php");
include("../includes/menu.php");
include("../includes/recursosExternos.php");
include('dbconect.php');
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');

if (isset($_POST["import"]))
{
    
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'subidas/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        $hold = $_POST["hold"];
        $id_usu = $_SESSION['id'];
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {   
          
                $num_fac = "";
                if(isset($Row[0])) {
                    $num_fac = mysqli_real_escape_string($con,$Row[0]);
                }
                
                $fec_emision = "";
                if(isset($Row[1])) {
                    $fec_emision = mysqli_real_escape_string($con,$Row[1]);
                }
                $rut = "";
                if(isset($Row[2])) {
                    $rut = mysqli_real_escape_string($con,$Row[2]);
                }

                $valor = "";
                if(isset($Row[3])) {
                    $valor = mysqli_real_escape_string($con,$Row[3]);
                }
		

                if (!empty($num_fac) || !empty($fec_emision) || !empty($valor) || !empty($rut)) {
                   $query = "INSERT INTO `documento` (`id_documento` ,`numero_doc` ,`centro_costo` ,`tipo_doc` ,`tasa` ,`dif_precio` ,`fec_emision` ,`fec_prorroga` ,`fec_pag_prorroga` ,`interes_prorroga` ,`fec_venc_pactado` ,`valor` ,`anticipado` ,`fec_depo_anticipo` ,`retencion` ,`interes_mora` ,`excedente` ,`estado_pago_excedente` ,`fec_depo_exc` ,`num_operacion_desc_excedente` ,`obs` ,`estado` ,`operacion` ,`id_fact` ,`id_cli` ,`id_hold` ,`id_usu` ,`fec_venc` ,`tipo_pag_exc`)
                    VALUES (NULL , ".$num_fac.", NULL , '2' , NULL , NULL ,STR_TO_DATE(REPLACE('".$fec_emision."','-','.'),GET_FORMAT(date,'USA')), NULL , NULL , NULL , NULL , ".$valor.", NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , '1', NULL , NULL , (SELECT id_cliente from cliente where rut= '".$rut."'),".$hold." , ".$id_usu." , (SELECT DATE_ADD((STR_TO_DATE(REPLACE('".$fec_emision."','-','.'),GET_FORMAT(date,'USA'))), INTERVAL c.plazo_pago DAY)from cliente as c where rut = '".$rut."') , NULL)";                             
                    $resultados = mysqli_query($con, $query);
                                                                        
                    if (!empty($resultados)) {
                        $type = "success";
                        $message = "Excel importado correctamente";
                    } else {
                        $type = "error";
                        $message = "Hubo un problema al importar uno o más registros, No se Insertan Facturas Duplicadas.";
                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "El archivo enviado es invalido. Por favor vuelva a intentarlo";
  }
}
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Carga Masiva</title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">
<link href="assets/style.css" rel="stylesheet">
<script type="text/javascript">

    function gethold() {
        $("#submit").prop("disabled", false);
 
    }
</script>
</head>

<body>
<header> 
  

<!-- Begin page content -->

<div class="container" id="main" bg="light">
  
<div class="row">
            <div class="col-12 text-center">
                <h3>Carga Masiva de  Datos del Documento:&nbsp;&nbsp;<i class="fa fa-file-excel-o" aria-hidden="true"></i>
            </div>

                <div class="col-12 text-center">
                                <div class="col-4 ">
                                

                                </div>

                            </div>
        </div>
  <hr>
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
    
    <div class="outer-container">
        <form action="" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
            <label for="tipo">Empresa del Holding Asociada&nbsp;:</label>
                                        <select class="form-control chosen" id="hold" name="hold" style="" onchange="gethold()">
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
                                        </select><br><br>
                <label>Elija Archivo Excel</label> <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import" disabled
                    class="btn-submit">Importar Registros</button>
        
            </div>
        
        </form>
        
    </div>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    
         
<?php
    $sqlSelect = "SELECT d.numero_doc,DATE_FORMAT(fec_emision, '%d-%m-%Y') fec_emision,c.razon_social,c.rut,d.valor,h.razon_social holding
    FROM documento d, cliente c,holding h
    WHERE d.id_cli = c.id_cliente and d.id_hold = h.id_hold
    ORDER BY d.id_documento desc";

    $result = mysqli_query($con, $sqlSelect);

if (mysqli_num_rows($result) > 0)
{
?>
        <br>
    <table class='tutorial-table'>
        <thead>
            
            <tr><br>
               <h3>Ultimos Ingresos.</h3>
                <th>Numero Factura</th>
                <th>Fecha Emisión</th>
                <th>Cliente</th>
                <th>Rut</th>
                <th>Valor</th>
                <th>Empresa del Holding</th>   
            </tr>
        </thead>
<?php
    while ($row = mysqli_fetch_array($result)) {
?>                  
        <tbody>
        <tr>

            <td><?php  echo $row['numero_doc']; ?></td>
            <td><?php  echo $row['fec_emision']; ?></td>
            <td><?php  echo $row['razon_social']; ?></td>
            <td><?php  echo $row['rut']; ?></td>
            <td><?php echo "<script>var string = numeral(". $row['valor'].").format('$000,000,000,000');document.write(string)</script>"?></td>
            <td><?php  echo $row['holding']; ?></td>
        </tr>
<?php
    }
?>
        </tbody>
    </table>
<?php 
} 
?>
      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 

  
</div>
<!-- Fin container -->
<footer class="footer">
  <div class="container"> <span class="text-muted">
</footer>
</body>
</html>