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
 	require_once '../clases/ClaseCliente.php';

	try{
		
		$id_cli = $_POST['cli'];
		$razon = $_POST['rsocial'];
		$mail = $_POST['mail'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$contacto = $_POST['contacto'];
		$plazo = $_POST['plazopago'];
        $giro = $_POST['giro'];
        $comuna = $_POST['comu_fact'];
        $dtemail = $_POST['dtemail'];
        $ciudad = $_POST['ciudadfact'];



		$dao = new ClienteDAO($id_cli,'',$razon,$mail,$telefono,$contacto,$direccion,$plazo,$giro,$comuna,$dtemail,$ciudad); 		
		$mod_cli = $dao->modificar_cliente();

			if (count($mod_cli)>0){
				echo "1";    
			} else {
			
			echo "Cliente Actualizado Correctamente.";  
				
			}
	salir:
	
	} catch (Exception $e) {
		echo"1"; 
	}
?>