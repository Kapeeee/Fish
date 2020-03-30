<?php
 session_start();

 	if( isset($_SESSION['id']) and ($_SESSION['perfil'] <> 0)and isset($_POST['rut']) ){
 		//Si la sesión esta seteada no hace nada
 		$id = $_SESSION['id'];
 	}
 	else{
		echo("0");
 		goto salir;
	}      
	     
	require_once '../clases/Funciones.php';
	require_once '../clases/ClaseFactoring.php';
	//require_once '../clases/ClaseGastosOpe.php';

	try{
		
		$razon = $_POST['rsocial'];
		$mail = $_POST['mail'];
		$direccion = $_POST['direccion'];
		$rut = $_POST['rut'];
		$telefono = $_POST['telefono'];
		$contacto = $_POST['contacto'];
		$celular = $_POST['celular'];
		//if(empty($celular)){$celular = null;}else{$celular = $_POST['celular'];}   
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

	
		$fun = new Funciones(); 

		if ($mail != '')
		{
			$val = $fun->validar_rut($rut,3); //1-usuario/2-cliente/3-factoring/4-holding
			if ($val <> ""){
				echo"1";  
			}else{			

			$dao = new factoringDAO('',$rut,$razon, $mail, $telefono,$contacto,$direccion,$celular,$num_cta_1,$num_cta_2,$banco_cta_1,$banco_cta_2,$tipo_cta_1 ,$tipo_cta_2,$email2,$email3,$email4,$cargo_contactop1,$contacto_personal2,$cargo_contactop2);
		
			$crear_fac = $dao->crear_factoring();

				if (count($crear_fac)>0){
					echo"2";    
				}else{
					echo "Empresa de Factoring ".$razon." Creado!";  
				}
			}
		}else{
		echo "3";
	}
	salir:
	} catch (Exception $e) {
		echo"2"; 

	}
 
?>