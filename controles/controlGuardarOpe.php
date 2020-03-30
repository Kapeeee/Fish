<?php

 
 	include("../includes/validaSesion.php");
	     
	//require_once '../clases/Funciones.php';
	require_once '../clases/ClaseOperacion.php';
	require_once '../clases/ClaseGastosOpe.php';
	require_once '../clases/ClaseDocumento.php';

	try{
				// unescape los valores de cadena en la matriz JSON
$TableData = stripcslashes ($_POST['data']);

//$form = stripcslashes ($_POST['data1']);

// Decodificar el array JSON
$TableData= json_decode($TableData,TRUE);

//$form = json_decode($form,TRUE);

// ahora $ TableData se puede acceder como una matriz PHP
//echo stripcslashes ($_POST['id']);



		$fec_ope = $_POST['fec_ope'];
		$id_usu = $id;
		$tipo_ope = $_POST['tipo_ope'];
		$obs_ope = $_POST['obs_ope'];
		$tasa_ope = $_POST['tasa_ope'];
		$com_cob = $_POST['com_cob'];
		$com_cur = $_POST['com_cur'];
		$ape_ope = $_POST['ape_ope'];
		$dia_ope = $_POST['dia_ope'];
		$otros_desc_ope = $_POST['otros_desc_ope'];
		$monto_giro = $_POST['monto_giro'];
		$cli_ope = $_POST['cli'];
		$fec_reg = date("Y-m-d h:i:s", time());
		$est_ope = 1;


		$est_doc = 1;	

		$not_gas = $_POST['not_gas'];
		$env_gas = $_POST['env_gas'];
		$proc_gas = $_POST['proc_gas'];
		$copia_fac_gas = $_POST['copia_fac_gas'];
		$cert_gas = $_POST['cert_gas'];

		$iva_com_cob = $_POST['iva_com_cob'];
		$iva_comi_tot = $_POST['iva_comi_tot'];
		$ga_ope = $_POST['ga_ope'];

		$vig_gasto = 1;

		$cargo = $_SESSION['cargo_fac'];
		
		$dao_ope = new OperacionDAO('', $fec_ope,$id_usu, $tipo_ope,$obs_ope,$tasa_ope,$com_cob,$com_cur,$ape_ope,$dia_ope,$otros_desc_ope,' ',$monto_giro,$cli_ope,'','', $fec_reg, $est_ope,$iva_com_cob,$iva_comi_tot,'');



		
		
		$guardar_ope = $dao_ope->ing_ope($cargo);
		
			
			if (!isset($guardar_ope)){
			echo"2";    
			} else {
						$id_ope =($guardar_ope[0]['id_ope']);
						$dao_doc = new DocumentoDAO(' ', $fec_reg,$id_usu, $est_doc,$TableData,'','','','','','','','','','','','');
						$guardar_doc = $dao_doc->ing_doc($id_ope);
						if (count($guardar_doc)>0){
								echo"2";    
								} else {
											$dao_gastos = new GastosOpeDAO('',$not_gas,$env_gas,$proc_gas,$copia_fac_gas,$cert_gas,$vig_gasto, $ga_ope);
											$guardar_gastos = $dao_gastos->ing_GastosOpe($id_ope);
											if (count($guardar_gastos)>0){
											echo"2";    
											} else {
												echo"Operacion ingresada correctamente";   
											}
						}
	}
		
		
			

	} catch (Exception $e) {
		echo"2"; 



	}
?>