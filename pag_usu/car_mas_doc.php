<?php 
  include("../includes/validaSesion.php");
  include("../includes/infoLog.php");
  include("../includes/menu.php");
  include("../includes/recursosExternos.php"); 
?>
<!-- INICIO DE CODIGO PARA IMPORTAR ARCHIVOS EXCEL
<?php
include('dbconect.php');
require_once('../vendor/php-excel-reader/excel_reader2.php');
require_once('../vendor/SpreadsheetReader.php');



if (isset($_POST["import"]))
{
    
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = '../subidas/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
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
				
                $valor = "";
                if(isset($Row[2])) {
                    $valor = mysqli_real_escape_string($con,$Row[2]);
                }
				
                $rut = "";
                if(isset($Row[3])) {
                    $rut = mysqli_real_escape_string($con,$Row[3]);
                }
                
                if (!empty($num_fac) || !empty($fec_emision) || !empty($valor) || !empty($rut)) {
                    //$query = "insert into tbl_productos(num_fac,fec_emision, valor, rut) values('".$num_fac."','".$fec_emision."','".$valor."','".$rut."')";
                    $query = "INSERT INTO DOCUMENTO VALUES ('',".$num_fac.",'','','','',".$fec_emision.",'','','','',".$valor.",'','','','','','','','','',1,'','',(select id_cliente from cliente where rut= ".$rut."),'','','','')";
                    $resultados = mysqli_query($con, $query);
                
                    if (! empty($resultados)) {
                        $type = "success";
                        $message = "Excel importado correctamente";
                    } else {
                        $type = "error";
                        $message = "Hubo un problema al importar registros";
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

FIN DE CODIGO  DE CODIGO PARA IMPORTAR ARCHIVOS EXCEL-->


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Factor - Carga Masiva de Documentos</title>
<?php
  
?>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script src="http://momentjs.com/downloads/moment.min.js"></script>
<script src="http://momentjs.com/downloads/moment.js"></script>
<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">
<link href="assets/style.css" rel="stylesheet">
<script type="text/javascript">

$(document).ready(function () {
  $('#dtBasicExample').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
  $('.dataTables_length').addClass('bs-select');
});


//RELLENO DE DATOS DEL DOCUMENTO
function mod(doc) {
    
    $.ajax({
     url: '../controles/controlCargarDatosDoc.php', 
     type: 'POST',
     data: {"id_documento":doc},
     dataType:'json',
     success:function(result)
     {
       console.log(result);

        

    }
 })
   

}


$(document).ajaxStart(function() {
  $("#formCarInd").hide();
  $("#loading").show();
     }).ajaxStop(function() {
  $("#loading").hide();
  $("#formCarInd").show();
  });  


$(document).ready(function() {
  $("#formCarInd").submit(function() {    
    $.ajax({
      type: "POST",
      url: '../controles/controlCarInd.php',
      data:$("#formCarInd").serialize(),
      success:function (result) 
      { 
        var msg = result.trim();
        console.log(result);
        switch(msg) {
                case '0':
                    window.location.assign("../index.html")
                    break;
                case '1':
                    swal("Documento Duplicado", "El Documento Ingresado ya se encuentra en la Base de Datos", "warning");
                    break;
                case '2':
                    swal("Error Base de Datos", "Error de base de datos, comuniquese con el administrador", "warning");
                    break;
                case '3':
                    swal("ENTRO POR 3", "Entro por 3", "warning");
                    break;
                default:
                    swal("Documento Ingresado Correctamente.", msg, "success");
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
<header> 
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> <a class="navbar-brand" href="#">BaulPHP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"> <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a> </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busqueda</button>
      </form>
    </div>
  </nav>
</header>

<!-- TABLA NUEVA PARA MODIFICACION CURSATURA-->

<div class="container" id="main" bg="light">  
        <form id="formCarInd" onsubmit="return false;">
        <!-- DIV PARA TITULO PRINCIPAL--> 
                <div class="row">
                        <div class="col-12 text-center">
                            <h3>Carga de Documento Masivo:&nbsp;&nbsp;<i class="fa fa-file-excel-o" aria-hidden="true"></i>
                        </div>
                </div>
        <!-- Sucursal y Fecha--> 
                <div class="row border-dark ">
                        <div class="col-12 text-center">
                            <br>
                            <hr>
                            <h5>Adjuntar Archivo</h5>
                            <br>
                        </div>
                 </div>
        <!-- CARGA DE GIF LOADING
        <div id="loading" style="display: none;">
            <center>
                <img src="../recursos/img/load.gif">
            </center>
        </div>
       




            <div class="outer-container">
            <form action="" method="post"
                name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                <div>
                <label>Elija Archivo Excel</label>
                <input type="file" name="file"
                        id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import"
                        class="btn-submit">Importar Registros</button>
                </div>
            </form>
            </div>


-->


<div class="container">
  <h3 class="mt-5">Importar archivo de Excel a MySQL usando PHP</h3>
  <hr>
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
    
    <div class="outer-container">
        <form action="" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
                <label>Elija Archivo Excel</label> <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Importar Registros</button>
        
            </div>
        
        </form>
        
    </div>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    
         
<?php

    $sqlSelect =    "SELECT d.numero_doc,d.fec_emision,c.razon_social,c.rut,d.valor
                    FROM documento d, cliente c
                    WHERE d.id_cli = c.id_cliente
                    ORDER BY d.numero_doc desc";

    $result = mysqli_query($con, $sqlSelect);

if (mysqli_num_rows($result) > 0)
{
?>
        
        <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Numero Factura</th>
                <th>Fecha Emisión</th>
                <th>Razón Social</th>
                <th>Rut</th>
                <th>Valor</th>

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
            <td><?php  echo $row['valor']; ?></td>
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




<!--



        
            <form name="f2" method="post" action="action.cgi" enctype="multipart/form-data">
              <input type="file" name="prueba" id="prueba">
            </form> 
            
            <form name='f1' action="ejercicio1.html" method=POST>
            <label name=lblnum1>Numero 1:</label><input type=text name='num1'/>
            <label name=lblnum2>Numero 2:</label><input type=text name='num2'/>
            <input type=button value="   +   " onclick="fsuma()">
            
            <input type=text name='resul'/>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
          </div>







        <br>
         <div class="row">
            <div class="col-12 text-center">
                <input type="submit" class="btn btn-info" id="btnAc" name="btnAc" value="Guardar Nuevo Documento">
            </div>
        </div>
        
       --> 
        

          
        
    </form>
</div>


</body>

<script type="text/javascript">
    $(".chosen").chosen();
</script>
</html>