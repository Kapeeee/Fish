<?php 
  include("../includes/validaSesion.php");
  include("../includes/infoLog.php");
  include("../includes/menu.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Factor - Carga Individual</title>
<?php
  include("../includes/recursosExternos.php");
  
?>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script src="http://momentjs.com/downloads/moment.min.js"></script>
<script src="http://momentjs.com/downloads/moment.js"></script>

<script type="text/javascript">

//window.onload = mod();

function calcular(tasa){
    
    
    var valor = (document.getElementById("valor").value);
    var anticipado = ((valor*tasa)/100);
   
    
    document.getElementById("antici").value = Math.round(anticipado) ;
    document.getElementById("exedente").value = Math.round(valor-anticipado) ;
    document.getElementById("rete").value = Math.round(valor-anticipado) ;

   
}




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


function getcli(cli) {
    
    $.ajax({
     url: '../controles/controlCargarDatosCli.php',
     type: 'POST',
     data: {"cli":cli},
     dataType:'json',
     success:function(result){
       console.log(result);
       $('#nom_cli').val(result[0].razon_social);
       $('#rut_cli').val(result[0].rut);
       $('#fono_cli').val(result[0].telefono);
       $('#cont_cli').val(result[0].contacto_personal);

 }
 })
 
}
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


//FIN DE LECTURA DE DOCUMENTO

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


<!-- TABLA NUEVA PARA MODIFICACION CURSATURA-->

<div class="container" id="main" bg="light">  
    <form id="formCarInd" onsubmit="return false;">
        <!-- DIV PARA TITULO PRINCIPAL--> 
        <div class="row">
            <div class="col-12 text-center">
                <h3>Carga de Documento Individual:&nbsp;&nbsp;<i class="fa fa-reply-all" aria-hidden="true"></i>
            </div>
        </div>
        
        <!-- Sucursal y Fecha--> 
<div class="row border-dark ">
            
                        
                        
                            <div class="col-12 text-center">
                                <br>
                                <hr>
                                <h5>Datos del Documento</h5>
                                <br>
                            </div>

                            <div class="col-12 text-center">
                                <div class="col-4 ">
                                
                                        <label for="tipo">Empresa del Holding Asociada(*)&nbsp;:</label>
                                        <select class="form-control chosen" id="hold" name="hold" style="" onchange="" required>
                                        <option value="" selected disabled >Seleccione Empresa</option>
                                                    <?php 
                                                    $re = $fun->cargar_datos_hold();   
                                                    foreach($re as $row)      
                                                        {
                                                            ?>
                                                            
                                                            <option  value="<?php echo $row['id_hold'] ?>"><?php echo $row['razon_social'] ?></option>
                                                                
                                                            <?php
                                                        }    
                                                    ?>  
                                        </select><br><br>
                                </div>

                            </div>

                            <div class="col-4">
                                
                                <label for="tipo">Tipo de Documento(*)&nbsp;:</label>
                                <select class="form-control" name="tipo" id="tipo" required>
                                    <option value="" selected disabled>Seleccione Tipo</option>
                                       <?php 
                                        $re = $fun->cargar_tipo_doc(1);   
                                        foreach($re as $row)      
                                            {
                                              ?>
                                               <option value="<?php echo $row['tipo'] ?>"><?php echo $row['tipo_doc'] ?></option>
                                                  
                                              <?php
                                            }    
                                        ?>       
                                </select>                        






                                <label for="numdoc">Numero de Documento(*)&nbsp;:</label>
                                <input type="number" class="form-control" id="numdoc" name="numdoc" value="" required >
                                <label for="fec_emision">Fecha de Emisión(*)&nbsp;:</label>
                                <input type="date" class="form-control" id="fec_emision" name="fec_emision" value="" required >
                                <label for="vencimiento">Fecha de Vencimiento&nbsp;:</label>
                                <input type="date" class="form-control" id="vencimiento" name="vencimiento" value="" >
                                <label for="fec_ven_pac">Fecha de Vencimiento Pactado&nbsp;:</label>
                                <input type="date" class="form-control" id="fec_ven_pac" name="fec_ven_pac" value="" >
                                <br>
                            </div>

                            <div class="col-md-4">
                            
                                <label for="estado">Estado(*)&nbsp;:</label>
                                <select class="form-control" name="estado" id="estado" required>
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
                                <label for="valor">Valor $&nbsp;:</label>
                                <input type="number" class="form-control" id="valor" name="valor" value="" required >
                                <label for="antici">Anticipado&nbsp;:</label>
                                <input type="number" class="form-control" id="antici" name="antici" value="" >
                                <label for="rete">Retención&nbsp;:</label>
                                <input type="number" class="form-control" id="rete" name="rete" value="" >
                                <label for="fec_dep_anti">Fecha de Deposito del Anticipo&nbsp;:</label>
                                <input type="date" class="form-control" id="fec_dep_anti" name="fec_dep_anti" value="" >
                            </div>

                            <div class="col-md-4">
                                <label for="tasa">Tasa&nbsp;(% Financiado):</label>
                                <input type="number" step="0,01" class="form-control" id="tasa" name="tasa" value="" onkeyup="calcular(this.value)" >
                                <label for="dif_precio">Diferencia de Precio&nbsp;:</label>
                                <input type="number" class="form-control" id="dif_precio" name="dif_precio" value="" >
                                <label for="num_oper">N° Operación&nbsp;:</label>
                                <input type="number" class="form-control" id="num_oper" name="num_oper" value="" >
                                <label for="inter_mora">Interés por Mora&nbsp;:</label>
                                <input type="number" class="form-control" id="inter_mora" name="inter_mora" value="" >
                                <label for="centro_costo">Centro de Costo&nbsp;:</label>
                                <input type="number" class="form-control" id="centro_costo" name="centro_costo" value="" >
                            </div>


                            <div class="col-6">
                                <br>
                                <hr>
                                <h5 class="text-center">Datos del Cliente</h5>
                                <br>
                                <div class="col-12">
                                        <select class="form-control chosen" id="cli" name="cli" onchange="getcli(this.value)" required>
                                        <option value="" selected disabled>Seleccione Cliente</option>
                                                        <?php 
                                                        $re = $fun->cargar_clientes();   
                                                        foreach($re as $row)      
                                                            {
                                                                ?>
                                                                
                                                                <option value="<?php echo $row['id_cliente'] ?>"><?php echo $row['razon_social'] ?></option>
                                                                    
                                                                <?php
                                                            }    
                                                        ?>  
                                        </select><br><br>
                                        <label for="nom_cli">Nombre&nbsp;:</label>
                                        <input type="text" class="form-control" id="nom_cli" name="nom_cli" value="" readonly >
                                        <label for="rut_cli">Rut&nbsp;:</label>
                                        <input type="text" class="form-control" id="rut_cli" name="rut_cli" value="" readonly >
                                        <label for="cont_cli">Contacto&nbsp;:</label>
                                        <input type="text" class="form-control" id="cont_cli" name="cont_cli" value="" readonly >
                                        <label for="fono_cli">Telefono&nbsp;:</label>
                                        <input type="text" class="form-control" id="fono_cli" name="fono_cli" value=""readonly >
                                        <br>
                                </div>
                            </div>
     

                            <div class="col-6 ">
                                <br>
                                <hr>
                                <h5 class="text-center">Datos del Factoring</h5>
                                <br>
                                <div class="col-12">

                                        <select class="form-control chosen" id="fac" name="fac" style="" onchange="getfac(this.value)">
                                        <option value="" selected disabled>Seleccione Empresa</option>
                                        <?php 
                                        $re = $fun->cargar_datos_fac();   
                                        foreach($re as $row)      
                                            {
                                                ?>
                                                    
                                        <option value="<?php echo $row['id_factoring'] ?>"><?php echo $row['razon_social'] ?></option>
                                                        
                                                <?php
                                            }    
                                        ?>  
                                        </select><br><br>
                                        <label for="nom_fac">Nombre&nbsp;:</label>
                                        <input type="text" class="form-control" id="nom_fac" name="nom_fac" value="" readonly>
                                        <label for="rut_fac">Rut&nbsp;:</label>
                                        <input type="text" class="form-control" id="rut_fac" name="rut_fac" value="" readonly>
                                        <label for="cont_fac">Contacto&nbsp;:</label>
                                        <input type="text" class="form-control" id="cont_fac" name="cont_fac" value="" readonly>
                                        <label for="fono_fac">Telefono&nbsp;:</label>
                                        <input type="text" class="form-control" id="fono_fac" name="fono_fac" value="" readonly>
                                        <br>
                                </div>
                            </div>

                            <div class="col-6">
                                <br>
                                <hr>
                                <h5 class="text-center">Datos de la Prórroga</h5>
                                <br>
                                <div class="col-12">
                                    <label for="fec_pror">Fecha de Prórroga&nbsp;:</label>
                                    <input type="date" class="form-control" id="fec_pror" name="fec_pror" value="" >
                                    <label for="inter_pror">Interés&nbsp;:</label>
                                    <input type="number" class="form-control" id="inter_pror" name="inter_pror" value="" >
                                    <label for="fec_pag_pror">Fecha de Pago&nbsp;:</label>
                                    <input type="date" class="form-control" id="fec_pag_pror" name="fec_pag_pror" value="" >
                                    <br>
                                </div>
                            </div>
                            
                            
                            <div class="col-6 ">
                                <br>
                                <hr>
                                <h5 class="text-center">Datos de Excedente</h5>
                                <br>
                                <div class="col-12">
                                    <label for="exedente">Excedente $&nbsp;:</label>
                                    <input type="number" class="form-control" id="exedente" name="exedente" value="" >
                                    <label for="est_exce">Estado&nbsp;:</label>
                                    <select class="form-control" name="est_exce" id="est_exce" >
                                    <option value="" selected disabled>Seleccione el Estado</option>
                                       <?php 
                                        $re = $fun->cargar_estado_excedente(1);   
                                        foreach($re as $row)      
                                            {
                                              ?>
                                               <option value="<?php echo $row['id_pago']?>"><?php echo $row['estado_pago'] ?></option>
                                                  
                                              <?php
                                            }    
                                        ?>       
                                    </select>    
                                    <label for="fec_depo_exc">Fecha de Liquidación&nbsp;:</label>
                                    <input type="date" class="form-control" id="fec_depo_exc" name="fec_depo_exc" value="" >



                        
                                    <label for="tipo_pago_exc">Tipo de Pago&nbsp;:</label>
                                    <select class="form-control" name="tipo_pago_exc" id="tipo_pago_exc" >
                                    <option value="" selected disabled>Seleccione el Estado</option>
                                       <?php 
                                        $re = $fun->cargar_tiposdepago(1);   
                                        foreach($re as $row)      
                                            {
                                              ?>
                                               <option value="<?php echo $row['id_pago'] ?>"><?php echo $row['tipo_pago'] ?></option>
                                                  
                                              <?php
                                            }    
                                        ?>       
                                    </select>    
                                    
                                    
                                    
                                    
                                    
                                    <label for="ope_asoc_desc_exce">N° de Operacion Asociada a Descuento&nbsp;:</label>
                                    <input type="number" class="form-control" id="ope_asoc_desc_exce" name="ope_asoc_desc_exce" value="" >
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
                                    <textarea class="form-control" id="obs_doc" name="obs_doc" aria-label="With textarea"></textarea>
                                </div><br>
                            </div>
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
                <input type="submit" class="btn btn-info" id="btnAc" name="btnAc" value="Guardar Nuevo Documento">
            </div>
        </div>
        
        
        

          
        
    </form>
</div>


</body>
<!--
<script type="text/javascript">
    $(".chosen").chosen();
</script>-->
</html>
