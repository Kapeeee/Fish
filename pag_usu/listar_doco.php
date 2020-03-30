<?php 
  include("../includes/validaSesion.php");


  //if (empty($id_cliente)){$id_cliente = null;}else{$tipo_doc = $_GET['cliente'];}   

  ?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Factor - Modificar Cliente</title>
<?php
  include("../includes/recursosExternos.php");
?>

<script type="text/javascript">



function mod(hold) {
    
     $.ajax({
      url: '../controles/control_Cargar_Facturas5.php',
      type: 'POST',
      data: {"hold":hold},
      dataType:'json',
      success:function(result){
        console.log(result);
  }
  })
  
}

$(document).ajaxStart(function() {
  $("#formTraeFact").hide();
  $("#loading").show();
     }).ajaxStop(function() {
  $("#loading").hide();
  $("#formTraeFact").show();
  });  

/*
$(document).ready(function() {

            $('#dtBasicExample2').DataTable( {
            dom: 'Bfrtip',
            buttons: ['copyHtml5','excelHtml5','csvHtml5','pdfHtml5'],
            language:{"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"}
            });
            
});
*/


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
                        <h3>Diferencia de Precio&nbsp;&nbsp;<i class="fa fa-print" aria-hidden="true"></i>
                        </h3>
                        <hr>
                  </div>
            </div>

  <div id="loading" style="display: none;">
    <center><img src="../recursos/img/load.gif"></center>
  </div>
    <form id="formTraeFact" onsubmit="return false;"  >
    
      <div class="row">

            <div class="col-6">

                        <label for="hold">Empresa del Holding Asociada&nbsp;:</label>                          
                        <select class="form-control" id="hold" name="hold" style="" onchange="">
                        <option value="" selected disabled>Seleccione Empresa Del Holding</option>
                                    <?php 
                                    $re = $fun->cargar_datos_hold();   
                                    foreach($re as $row)      
                                          {
                                          ?>
                                          
                                          <option value="<?php echo $row['id_hold'] ?>"><?php echo $row['razon_social'] ?></option>
                                                
                                          <?php
                                          }    
                                    ?>  
                        </select>



            </div>
            <div class="col-6">           
       
                              <label for="estado">Estado de la Factura&nbsp;:</label>
                                <select class="form-control" name="estado" id="estado" >
                                    <option value="" selected disabled>Seleccione el Estado</option>
                                       <?php 
                                        $re = $fun->cargar_estados(1);   
                                        foreach($re as $row)      
                                            {
                                              ?>
                                               <option value="<?php echo $row['id_estado'] ?>"><?php echo $row['estado'] ?></option>
                                                  
                                              <?php
                                            }    
                                        ?>       
                                    </select>        
            </div>
      
      </div>

      



  <div class="row" >
                
      <div class="col-12 text-center">
      <br> 
            <input type="submit" class="btn btn-info" id="btnAc" name="btnAc" value="Buscar Datos"  onclick="" >
            </form>
      </div>

       <div class="col-12">
       <br>
       <table class="table" id="dtBasicExample2">
                <thead>
                    <tr>
                        <th scope="col">Número Factura</th>
                        <th scope="col">Razón Social</th>
                        <th scope="col">Fecha Emisión</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Rut</th>
                    </tr>
                </thead>
                <tbody id="contenido">
                    
                </tbody>
            </table>


            
       </div>                                         

           
    </div>      



  </div>
</div>
<script>
$(document).ready(function() {
  $("#formTraeFact").submit(function() {    
    $.ajax({
      type: "POST",
      url: '../controles/control_Cargar_Facturas5.php',
      data:$("#formTraeFact").serialize(),
      dataType:'json',
      success: function (result) { 
       //console.log(result);
       tabla(result)
      },
      error: function(){
            alert('Verifique los datos')      
      }
    });
    return false;
  });
});

function traer() {
      $('#dtBasicExample2').DataTable( {
            dom: 'Bfrtip',
            buttons: ['copyHtml5','excelHtml5','csvHtml5','pdfHtml5'],
            language:{"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"}
            });
}


var contenido = document.querySelector('#contenido')
function tabla(result) {
            // console.log(datos)
            contenido.innerHTML = ''
            for(let valor of result){
                // console.log(valor.nombre)
                contenido.innerHTML += `
                
                <tr>
                    <th scope="row">${ valor.numero_doc }</th>
                    <td>${ valor.razon_social }</td>
                    <td>${ valor.fec_emision }</td>
                    <td>${ valor.valor}</td>
                    <td>${ valor.rut}</td>
                </tr>
                `
            }
            traer()
        }
</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>







</body>
</html>

