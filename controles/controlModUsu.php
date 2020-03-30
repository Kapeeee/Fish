<?php
session_start();

 if( isset($_SESSION['id']) and ($_SESSION['perfil'] <> 0) and isset($_POST['usu']) ){
  		//Si la sesión esta seteada no hace nada
  		$id = $_SESSION['id'];
  	}
  	else{
 		//Si no lo redirige a la pagina index para que inicie la sesion	
 		echo("0");
 		goto salir;
 	}         
	     
	require_once '../clases/Funciones.php';
 	require_once '../clases/ClaseUsuario.php';

	try{
		$usu = $_POST['usu'];
		$nom = $_POST['nombre'];
 		$ape = $_POST['apellido'];
 		$mail = $_POST['mail'];
 		$perfil = $_POST['perfil'];
 		$cargo = $_POST['cargo'];
 		$nick = $_POST['nick'];
		


		if (isset($_POST['vig'])) {
			$vig = 1;
		}else{
			$vig = 0;
		}
		

		$dao = new UsuarioDAO($usu,'',$nom,$ape,$mail,'',$vig,$cargo,$perfil,$nick);
		$mod_usu = $dao->modificar_usuario();
		 
			if (count($mod_usu)>0){
				echo "1";    
			} else {
				echo"Usuario ".$nick." Modificado, para aplicar los cambios el usuario debe re ingresar al sistema.";  
			}
	salir:
	} catch (Exception $e) {
		echo"1"; 
	}
?>