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
	require_once '../clases/ClaseHolding.php';
	//require_once '../clases/ClaseGastosOpe.php';

	try{
		
		$razon = $_POST['rsocial'];
		$mail = $_POST['mail'];
		$direccion = $_POST['direccion'];
		$rut = $_POST['rut'];
		$telefono = $_POST['telefono'];
		$contacto = $_POST['contacto'];
		$giro = $_POST['giro'];
        $comuna = $_POST['comu_fact'];
        $ciudad = $_POST['ciudadfact'];



		$fun = new Funciones(); 

		if ($mail != '')
		{
			$val = $fun->validar_rut($rut,3); //1-usuario sistema/0-cliente sistema
			if ($val <> ""){
			echo"1";  
			
			
			}else{
			

			$dao = new holdingDAO('',$rut,$razon, $mail, $telefono, $contacto,$direccion,$giro,$comuna,$ciudad);
		
			$crear_hold = $dao->crear_holding();

				if (count($crear_hold)>0){
					echo"2";    
				}else{
					echo "Empresa del Holding ".$razon." Creada!";  
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