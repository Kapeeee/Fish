<?php
 session_start();

 if( isset($_SESSION['id_fac']) and ($_SESSION['perfil_fac'] <> 0) ){
    //Si la sesión esta seteada no hace nada
    $id = $_SESSION['id_fac'];
  }
  else{
    //Si no lo redirige a la pagina index para que inicie la sesion 
    header("location: ../index.html");
  }  

	require_once '../clases/Funciones.php';

	try{

		$cli = stripcslashes ($_POST['cli']);

		 $fun = new Funciones();
		 $re = $fun->cargar_dia_cli($cli);


          foreach($re as $row){

                echo ($row['dia_cli']);
    
              }
		
		
	
	} catch (Exception $e) {
		//echo($e);
		echo"'Error, verifique los datos'",  $e->getMessage(); 

	}
?>