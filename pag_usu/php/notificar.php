<?php 
	require_once "conexion.php";
	$conexion=conexion();

	$id=$_POST['iddoc'];
	$fechanoti=$_POST['fn30'];


	$sql="UPDATE documento set fn30='$fechanoti',
								n30=1
				where id_documento=$id";
				echo $result=mysqli_query($conexion,$sql);

	$consultaid = "select d.numero_doc,c.email,d.id_documento,f.razon_social,f.rut,f.direccion,f.email,f.telefono,f.banco_cta_1,f.num_cta_1,f.tipo_cta_1,f.banco_cta_2,f.num_cta_2,f.tipo_cta_2,f.contacto_personal,f.cargo_contactop1,f.contacto_personal2,f.cargo_contactop2,f.email2,f.email3,f.email4
from factoring f, cliente c, documento d
where d.id_cli = c.id_cliente and d.id_fact = f.id_factoring and d.id_documento = $id";

	$resultid=mysqli_query($conexion,$consultaid);
	$ver=mysqli_fetch_row($resultid);

	
	$to = "ppimentel@andescode.cl,patrikpimentelcarvacho@gmail.com";
	$subject = "Recordatorio de Vencimiento Factura Numero: ".$ver[0];
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "FROM: Cobranza-Transfactor";
	$message = '<!DOCTYPE html">
								<html xmlns="http://www.w3.org/1999/xhtml">
                        
								<body style="font: Verdana, Geneva, sans-serif">

								Estimado Cliente, Recordamos que quedan 30 Dias para el vencimiento de su Factura.,<br> 
								Favor Regularizar a la Brevedad al siguiente Contacto, Si ya fue Liquidada Favor Notificar.<p><br>
								
								<p><b>DEUDA CON '.$ver[3].'</b><br>

                                Los datos para transferencia:<br>
                                <b>'.$ver[3].'</b><br>
                                RUT: '.$ver[4].'<br>
                                DIRECCION: '.$ver[5].'<br>
                                CORREO: '.$ver[6].'<br>
                                BANCO: '.$ver[8].'<br>
                                Num CTA:'.$ver[9].'<br>
                                TIPO DE CUENTA:'.$ver[10].'<br>
                                BANCO: '.$ver[11].'<br>
                                Num CTA:'.$ver[12].'<br>
                                TIPO DE CUENTA:'.$ver[13].'<br>
                                
                                <i>Fono: '.$ver[7].'</i><br>
                                <i>Fono: '.$ver[21].'</i><br>
                                
                                '.$ver[18].'<br>
                                '.$ver[19].'<br>
                                '.$ver[20].'<br>
                                  
								
								


							
								
								</body>
								</html> ';
 
	$exito = mail($to, $subject, $message, $headers);


 ?>