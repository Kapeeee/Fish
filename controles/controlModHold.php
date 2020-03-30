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
 	require_once '../clases/ClaseHolding.php';

	try{

		$hold = $_POST['hold'];
		$razon = $_POST['rsocial'];
		$mail = $_POST['mail'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$contacto = $_POST['contacto'];
		$giro = $_POST['giro'];
        $comuna = $_POST['comu_fact'];
        $ciudad = $_POST['ciudadfact'];



		$dao = new holdingDAO($hold,'',$razon,$mail,$telefono,$contacto,$direccion,$giro,$comuna,$ciudad); 		
		$mod_hold = $dao->modificar_holding();

			if (count($mod_hold)>0){
				echo "1";    
			} else {
			
			echo "Empresa Factoring  Actualizada Correctamente.";  
				
			}
	salir:
	
	} catch (Exception $e) {
		echo"1"; 
	}
?>