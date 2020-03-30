<?php
session_start();

 if( isset($_SESSION['id']) and ($_SESSION['perfil'] <> 0) ){
  		//Si la sesión esta seteada no hace nada
  		$id = $_SESSION['id'];
  	}
  	else{
 		//Si no lo redirige a la pagina index para que inicie la sesion	
 		echo("0");
 		goto salir;
 	}         
	     
	require_once '../clases/Funciones.php';
 	require_once '../clases/ClaseDocumento.php';

	try{

        $hold = $_POST['hold'];
        $cadena = $_POST['cadena'];
        $centro_costo = $_POST['centro_costo'];  
        $tasa = $_POST['tasa'];
        $fec_depo_anticipo = $_POST['fec_dep_anti'];
        $obs = $_POST['obs_doc'];
        $estado = $_POST['estado'];
        $operacion = $_POST['num_oper'];
        if(empty($_POST['fac'])){$id_fact = null;}else{$id_fact = $_POST['fac'];}
        $id_usu = $_SESSION['id']; 
        
        //echo $cadena,$centro_costo,$tasa,$fec_depo_anticipo,$obs,$estado,$operacion,$id_fact,$id_usu;
        
        $dao = new DocumentoDAO('','',$centro_costo,'',$tasa,'','','','','','','','',$fec_depo_anticipo,'','','','','','',$obs,$estado,$operacion,'',$id_fact,'','',$id_usu,'','');

        $mod_doc = $dao->mod_varios($cadena);
        /*
        $funlog = new Funciones();
        $ingresarlog = $funlog->addLog2($id_usu,$id_doc,$estado);
        */
        if (count($mod_doc)>0){
            echo "1";    
        } else
        {
            echo "Documentos Modificado Correctamente.";     
        }
	salir:
	
	} catch (Exception $e) {
		echo"1"; 
	}
?>