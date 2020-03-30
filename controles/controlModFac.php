<?php
session_start();

 if( isset($_SESSION['id']) and ($_SESSION['perfil'] <> 0)){
  		//Si la sesión esta seteada no hace nada
  		$id = $_SESSION['id'];
  	}
  	else{
 		//Si no lo redirige a la pagina index para que inicie la sesion	
 		echo("0");
 		goto salir;
 	}         
	     
	require_once '../clases/Funciones.php';
 	require_once '../clases/ClaseFactoring.php';

	try{

		$id_fac = $_POST['fac'];
		$razon = $_POST['rsocial'];
		$mail = $_POST['mail'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$contacto = $_POST['contacto'];
		if (empty($celular)){$celular = null;}else{$celular = $_POST['celular'];}  
		$num_cta_1 = $_POST['num_cta_1'];
		$num_cta_2 = $_POST['num_cta_2'];
		$banco_cta_1 = $_POST['banco_cta_1'];
		$banco_cta_2 = $_POST['banco_cta_2'];
		$tipo_cta_1 = $_POST['tipo_cta_1'];
		$tipo_cta_2 = $_POST['tipo_cta_2'];
		$email2 = $_POST['email2'];
		$email3 = $_POST['email3'];
		$email4 = $_POST['email4'];
		$cargo_contactop1 = $_POST['cargo_contactop1'];
		$contacto_personal2 = $_POST['contacto_personal2'];
		$cargo_contactop2 = $_POST['cargo_contactop2'];



		$dao = new factoringDAO($id_fac,'',$razon,$mail,$telefono,$contacto,$direccion,$celular,$num_cta_1,$num_cta_2,$banco_cta_1,$banco_cta_2,$tipo_cta_1 ,$tipo_cta_2,$email2,$email3,$email4,$cargo_contactop1,$contacto_personal2,$cargo_contactop2);	
		$mod_fac = $dao->modificar_factoring();

			if (count($mod_fac)>0){
				echo "1";    
			} else {
			
			echo "Empresa Factoring  Actualizada Correctamente.";  
				
			}
	salir:
	
	} catch (Exception $e) {
		echo"1"; 
	}
?>