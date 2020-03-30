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
 	require_once '../clases/ClaseUsuario.php';
 
 	try{
 		$nombre = $_POST['nombre'];
 		$apellido = $_POST['apellido'];
 		$rut = $_POST['rut'];
 		$mail = $_POST['mail'];
 		$perfil = $_POST['perfil'];
 		$cargo = $_POST['cargo'];
 		$vig = 1;
 		$nick = $_POST['nick'];
 		
 		
 		$fun = new Funciones(); 
 
		if ($mail != '')
		{
			$val = $fun->validar_rut($rut,1); 
			if ($val <> ""){
					echo "1";
			
			}else{
					$contraseña = $fun->generaPass();
		 
		 			$dao = new UsuarioDAO('',$rut,$nombre, $apellido, $mail, md5($contraseña),$vig,$cargo,$perfil,$nick);
		 		
					$crear_usu = $dao->crear_usuario();
					
					if (count($crear_usu)>0){
					
					echo "2";    
					} else {
						//$enviar_pass = $fun->enviar_correo_pass($nom,$correo,$nueva_pass);
					
					echo"Usuario ".$nick." Creado ".$contraseña.", favor verifique en su correo (Buzon de entrada, correos no deseados o spam) la contraseña para ingresar";  
						
					}
			}
	}else{
		
		echo"3";
	}
	salir:
 	} catch (Exception $e) {
		
		echo"2"; 
  	}
 ?>