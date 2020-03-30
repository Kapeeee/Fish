<?php 
  include("../includes/validaSesion.php");
  include("../includes/infoLog.php");
  include("../includes/menu.php");

  //$id_doc = $_GET["id_documento"];

    $numero = count($_GET);
    $tags = array_keys($_GET);
    $hold = $_GET['hold'];
    //print_r($tags);
    echo "<br>";
    $valores = array_values($_GET);
    $cadena = "";
    //print_r($valores);


    for($i=0;$i<$numero-1;$i++){
        $$tags[$i]=$valores[$i];
        if(($i+1)==$numero-1){
            $cadena .= "numero_doc = ".$valores[$i]."  ";
            
        }else{
            $cadena .= "numero_doc = ".$valores[$i]." or ";
        }
        
    }

    //echo "<br>".$cadena;

    
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Factor - Ceder Facturas</title>
<?php
  include("../includes/recursosExternos.php");
?>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script src="http://momentjs.com/downloads/moment.min.js"></script>
<script src="http://momentjs.com/downloads/moment.js"></script>
<link href="assets/style.css" rel="stylesheet">
<script type="text/javascript">

//window.onload = mod();


//window.onload = mod(<?/*php echo $id_doc */?>);
/*RELLENO DE DATOS DEL DOCUMENTO
function mod(doc) {
    
    $.ajax({
     url: '../controles/controlCargarDatosDoc.php', 
     type: 'POST',
     data: {"id_documento":doc},
     dataType:'json',
     success:function(result)
     {
       console.log(result);

        $('#antici').val(result[0].anticipado);
        $('#centro_costo').val(result[0].centro_costo);
        $('#dif_precio').val(result[0].dif_precio);
        $('#estado').val(result[0].estado);
        $('#est_exce').val(result[0].estado_pago_excedente);
        $('#fec_dep_anti').val(result[0].fec_depo_anticipo);
        $('#fec_depo_exc').val(result[0].fec_depo_exc);
        $('#fec_emision').val(result[0].fec_emision);
        $('#fec_pag_pror').val(result[0].fec_pag_prorroga);
        $('#fec_pror').val(result[0].fec_prorroga);
        $('#vencimiento').val(result[0].fec_venc);
        $('#fec_ven_pac').val(result[0].fec_venc_pactado);
        $('#cli').val(result[0].id_cli);
        $('#fac').val(result[0].id_fact);
        $('#inter_mora').val(result[0].interes_mora);
        $('#inter_pror').val(result[0].interes_prorroga);
        $('#ope_asoc_desc_exce').val(result[0].num_operacion_desc_excedente);
        $('#numdoc').val(result[0].numero_doc);
        $('#obs').val(result[0].obs);
        $('#num_oper').val(result[0].operacion);
        $('#rete').val(result[0].retencion);
        $('#tasa').val(result[0].tasa);
        $('#tipo').val(result[0].tipo_doc);
        $('#valor').val(result[0].valor);
        $('#exedente').val(result[0].excedente);
        $('#hold').val(result[0].id_hold);
        $('#nom_cli').val(result[0].nomcli);
        $('#rut_cli').val(result[0].rutcli);
        $('#cont_cli').val(result[0].contcli);
        $('#fono_cli').val(result[0].fonocli);
        $('#nom_fac').val(result[0].nomfac);
        $('#rut_fac').val(result[0].rutfac);
        $('#cont_fac').val(result[0].contfac);
        $('#fono_fac').val(result[0].fonofac);
        $('#tipo_pago_exc').val(result[0].tipo_pag_exc);
        $('#obs_doc').val(result[0].obs);
        
    }
 })
}
*/
function modestado(){
   
    $('#btnAc').prop('disabled', false);

  };



function getfac(fac) {
    
    $.ajax({
     url: '../controles/controlCargarDatosFac.php',
     type: 'POST',
     data: {"fac":fac},
     dataType:'json',
     success:function(result){
       console.log(result);
       $('#nom_fac').val(result[0].razon_social);
       $('#rut_fac').val(result[0].rut);
       $('#fono_fac').val(result[0].telefono);
       $('#cont_fac').val(result[0].contacto_personal);

 }
 })
 
}



$(document).ajaxStart(function() {
  $("#formFactorizar").hide();
  $("#loading").show();
     }).ajaxStop(function() {
  $("#loading").hide();
  $("#formFactorizar").show();
  });  


$(document).ready(function() {
  $("#formFactorizar").submit(function() {    
    $.ajax({
      type: "POST",
      url: '../controles/controlFactorizar.php',
      data:$("#formFactorizar").serialize(),
      success:function (result) 
      { 
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
                    swal("Documento Modificados.", msg, "success");
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


<!-- TABLA NUEVA PARA MODIFICACION CURSATURA-->

<div class="container" id="main" bg="light">  
    <form id="formFactorizar" onsubmit="return false;">
        <!-- DIV PARA TITULO PRINCIPAL--> 
        <div class="row">
            <div class="col-12 text-center">
                <h3>Ceder Facturas:&nbsp;&nbsp;<i class="fa fa-reply-all" aria-hidden="true"></i>
                <input type="text" hidden id="cadena" name= "cadena" value="<?php echo $cadena?>">
                <input type="text" hidden id="hold" name= "hold" value="<?php echo $hold?>">
            </div>
        </div>
        
        <!-- Sucursal y Fecha--> 
<div class="row border-dark ">
            
                        
                        
                            <div class="col-12 text-center">
                                <br>
                                <hr>
                                <h5>Facturas a Ceder: 
                                <?php
                                    
                                    for($i=0;$i<$numero-1;$i++){
                                        $$tags[$i]=$valores[$i];
                                        echo $valores[$i]." ";
                                    }
                                    
                                    ?>
                                </h5>
                                <br>
                            </div>





                            <div class="col-md-4">
                            
                                <label for="estado">Estado&nbsp;:</label>
                                <select class="form-control" name="estado" id="estado" onchange="modestado()" required>
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
                                <label for="fec_dep_anti">Fecha de Deposito del Anticipo&nbsp;:</label>
                                <input type="date" class="form-control" id="fec_dep_anti" name="fec_dep_anti" value="" required>
                            </div>

                            <div class="col-md-4">
                                <label for="tasa">Tasa &nbsp;(% Financiado):</label>
                                <input type="number" step="0.01" class="form-control" id="tasa" name="tasa" value="" required>
                                <!--<label for="dif_precio">Diferencia de Precio&nbsp;:</label>
                                <input type="number" class="form-control" id="dif_precio" name="dif_precio" value="" > -->
                                <label for="num_oper">N° Operación&nbsp;:</label>
                                <input type="number" class="form-control" id="num_oper" name="num_oper" value="" required>
                                <label for="centro_costo">Centro de Costo&nbsp;:</label>
                                <input type="number" class="form-control" id="centro_costo" name="centro_costo" value="" required>
                            </div>


                  
     

                            <div class="col-4 ">
                               
                             
                                <div class="col-12">
                                        <label for="estado">Empresa de Factoring&nbsp;:</label>    
                                        <select class="form-control" id="fac" name="fac" style="" onchange="getfac(this.value)" required>
                                        <option value="" selected disabled>Seleccione Factoring</option>
                                        <?php 
                                        $re = $fun->cargar_datos_fac();   
                                        foreach($re as $row)      
                                            {
                                                ?>
                                                    
                                        <option value="<?php echo $row['id_factoring'] ?>"><?php echo $row['razon_social'] ?></option>
                                                        
                                                <?php
                                            }    
                                        ?>  
                                        </select>
                                       
                                        <label for="cont_fac">Contacto&nbsp;:</label>
                                        <input type="text" class="form-control" id="cont_fac" name="cont_fac" value=""  readonly="readonly">
                                        <label for="fono_fac">Telefono&nbsp;:</label>
                                        <input type="text" class="form-control" id="fono_fac" name="fono_fac" value=""  readonly="readonly">
                                        <br>
                                </div>
                            </div>


                            
                            
                
                            <div class="col-12 text-center">
                                <div class="col-12">
                                <br>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Observaciones <br>Generales </span>
                                        </div>
                                        <textarea class="form-control" id="obs_doc" name="obs_doc" aria-label="With textarea" required></textarea>
                                    </div><br>
                                   <!-- <input id="id_documento" name="id_documento" type="hidden" value=">">-->
                                </div>
                            </div>
                            <div class="col-12">
                                
                            </div>
                            
                            

</div>

                            
                     

            
            

        

        
   

        <!-- CARGA DE GIF LOADING-->
        <div id="loading" style="display: none;">
            <center>
                <img src="../recursos/img/load.gif">
            </center>
        </div>
       
        <br>
         <div class="row">
            <div class="col-12 text-center">
                <input type="submit" class="btn btn-info" id="btnAc" name="btnAc" value="Guardar Cambios" disabled title="Recuerde Cambiar el Estado"><br>
                Necesita Cambiar el Estado para Modificar.
            </div>
        </div>


        
    </form>

                                   

            













</div>




</body>

<script type="text/javascript">
    $(".chosen").chosen();
</script>
</html>