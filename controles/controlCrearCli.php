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
	require_once '../clases/ClaseCliente.php';
	//require_once '../clases/ClaseGastosOpe.php';

	try{
		
		$razon = $_POST['rsocial'];
		$mail = $_POST['mail'];
		$direccion = $_POST['direccion'];
		$rut = $_POST['rut'];
		$telefono = $_POST['telefono'];
		$contacto = $_POST['contacto'];
		$plazo = $_POST['plazopago'];
        $giro = $_POST['giro'];
        $comuna = $_POST['comu_fact'];
        $dtemail = $_POST['dtemail'];
        $ciudad = $_POST['ciudadfact'];



		$fun = new Funciones(); 

		if ($mail != '')
		{
			$val = $fun->validar_rut($rut,2); //1-usuario sistema/0-cliente sistema
			if ($val <> ""){
			echo"1";  
			
			
			}else{
			

			$dao = new ClienteDAO('',$rut,$razon, $mail, $telefono, $contacto,$direccion,$plazo,$giro,$comuna,$dtemail,$ciudad);
		
			$crear_cli = $dao->crear_cliente();

				if (count($crear_cli)>0){
					echo"2";    
				}else{
					echo "Cliente ".$razon." Creado!";  
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