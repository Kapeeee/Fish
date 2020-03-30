<?php 
	session_start();
	require_once "../php/conexion.php";
	//require_once '../../recursos/db/db.php';

	//$pdo = AccesoDB::getCon();
	$conexion=conexion();

	
	if(empty($_GET['cli'])){
		$hold = $_GET['hold'];
		$cli = null;
		$sql="select d.numero_doc,DATE_FORMAT(d.fec_emision, '%d-%m-%Y') fec_emision,c.rut,c.razon_social,d.operacion,d.valor, d.anticipado, DATE_FORMAT(d.fec_depo_anticipo,'%d-%m-%Y') fec_depo_anticipo, d.excedente,DATE_FORMAT(d.fec_venc_pactado, '%d-%m-%Y')fec_venc_pactado,d.interes_mora,d.fec_pag_int,d.id_documento
				from documento d, cliente c
				where d.id_cli = c.id_cliente and d.id_fact is null and d.estado = 1 and d.id_hold = '$hold'";

	}elseif(empty($_GET['hold'])){
		$cli = $_GET['cli'];
		$hold = null;
		$sql="select d.numero_doc,DATE_FORMAT(d.fec_emision, '%d-%m-%Y') fec_emision,c.rut,c.razon_social,d.operacion,d.valor, d.anticipado, DATE_FORMAT(d.fec_depo_anticipo,'%d-%m-%Y') fec_depo_anticipo, d.excedente,DATE_FORMAT(d.fec_venc_pactado, '%d-%m-%Y')fec_venc_pactado,d.interes_mora,d.fec_pag_int,d.id_documento
				from documento d, cliente c
				where d.id_cli = c.id_cliente and d.id_fact is null and d.estado = 1 and d.id_cli = '$cli'";
	}

 ?>

<div class="row">
	<div class="col-sm-12">
        <br>
        <hr>
	<h5>Facturas sin Movimiento</h5>


	<button onclick="factorizar('<?php echo $hold ?>');" class="btn btn-info"> <i class="fa fa-balance-scale" aria-hidden="true" title="Factorizar"></i> Factorizar Seleccionadas </button>
	<table class='tutorial-table' id="dtBasicExample">
			<tr>
				<td><i class="fa fa-balance-scale" aria-hidden="true" title="Factorizar"></i></td>
				<td>N° Factura</td>
				<td>F.Emisión</td>
				<td>RUT</td>
				<td>R. Social</td>
				<td>N° Ope.</td>
				<td>Valor</td>
				<td>Anticipado</td>
				<td>Fec. Anticipo</td>
				<td>Excedente</td>
				<td>Venc. Pactado</td>
				<td>Intéres(+/-)</td>
				<td>Fec. Pago Interés</td>
				<td>Dias Favor/Contra</td>
				<td>Mod. Int.</td>
				<td>Mod. General.</td>
			</tr>

			<?php 

				
				

				$result=mysqli_query($conexion,$sql);
				while($ver=mysqli_fetch_row($result)){ 

					$datos=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2]."||".
						   $ver[3]."||".
						   $ver[4]."||".
						   $ver[5]."||".
						   $ver[6]."||".
						   $ver[7]."||".
						   $ver[8]."||".
						   $ver[9]."||".
						   $ver[10]."||".
						   $ver[11]."||".
						   $ver[12]; //ID//
			 ?>

			<tr>
				
				<td> <input type="checkbox" value="<?php echo $ver[0]?>" ></td>
				<td><?php echo $ver[0] ?></td>
				<td><?php echo $ver[1] ?></td>
				<td><?php echo $ver[2] ?></td>
				<td><?php echo $ver[3] ?></td>
				<td><?php echo $ver[4] ?></td>
				<td id="<?php echo $ver[12]?>"><?php echo "<script>var string = numeral(". $ver[5].").format('$000,000,000,000');document.getElementById('". $ver[12]."').innerHTML = string </script>"?></td>
				<td id="<?php echo $ver[12]."ant"?>"><?php echo "<script>var string = numeral(". $ver[6].").format('$000,000,000,000');document.getElementById('". $ver[12]."ant').innerHTML = string </script>"?></td>
				<td>
					<?php 
					$test3= $ver[7];
                    if($test3 =='00-00-0000' || $test3 =='0000-00-00'|| $test3 == null || $test3 == "" || empty($test3)){
						echo  '-- / -- / --';
					}else{
						echo date('d-m-Y',strtotime($test3));
					} 
					?>
				</td>
				<td id="<?php echo $ver[12]."exc"?>"><?php echo "<script>var string = numeral(". $ver[8].").format('$000,000,000,000');document.getElementById('". $ver[12]."exc').innerHTML = string </script>"?></td>
				<td><!-- VENC PACTADO-->
					<?php 
					$test2= $ver[9];
					if($test2 =='00-00-0000'|| $test2 =='0000-00-00'|| $test2 == null || $test2 == "" || empty($test2)){
						echo  '-- / -- / --';
					}else{
						echo date('d-m-Y',strtotime($test2));
					} 
					?>
				</td>
				<!-- INTERES-->
				<td id="<?php echo $ver[12]."inter"?>"><?php echo "<script>var string = numeral(". $ver[10].").format('$000,000,000,000');document.getElementById('". $ver[12]."inter').innerHTML = string </script>"?></td>
				<td><!-- FEC PAGO INTERES-->
					<?php 

					$test1= $ver[11];
					if($test1 == '00-00-0000'|| $test1 =='0000-00-00'|| $test1 == null || $test1 == "" || empty($test1)){
						echo  '-- / -- / --';
					}else{
						echo date('d-m-Y',strtotime($test1));
					}
					
					
					?>
				</td>	
				<!-- DIAS FAVOR CONTRA-->
				<?php
					
					if($test2 =='00-00-0000'|| $test2 =='0000-00-00'|| $test2 == null || $test2 == ""){
						echo "<td>Sin Vencimiento Pactado</td>";	
					}else{
						$fec_actual = date("d-m-Y", time());
						$fec_venc = $ver[9];
						$datetime1 = date_create($fec_actual);
						$datetime2 = date_create($fec_venc);
						$interval = date_diff($datetime1,$datetime2);
						$numfinal =  $interval->format('%R%a días');
						if($numfinal >= 0){
							echo "<td style='color: green;'>".$numfinal."</td>";
						}else{
							echo "<td style='color: red;'>".$numfinal."</td>";
						}
					}
							

				?>
				<td>
					<button class="btn btn-warning" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">
						<i class="fa fa-pencil-square" aria-hidden="true"></i>
					</button>
				</td>
				<td>
					
					
					<a style="text-decoration:none"  href="mod_doc.php?id_documento=<?php echo $ver[12]?>" name="" value=""><button class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></button></a>
					
				</td>
			</tr>
			<?php 
		}
		
			 ?>
		</table>
	</div>
</div>