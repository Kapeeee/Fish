<?php
 session_start();

 	if( isset($_SESSION['id']) and ($_SESSION['perfil'] <> 0)and isset($_POST['numdoc']) ){
 		//Si la sesión esta seteada no hace nada
 		$id = $_SESSION['id'];
 	}
 	else{
		echo("0");
 		goto salir;
	}      
	     
	require_once '../clases/Funciones.php';
	require_once '../clases/ClaseDocumento.php';


	try{
		$numero_doc = $_POST['numdoc'];
        $centro_costo = $_POST['centro_costo'];
        $tipo_doc = $_POST['tipo'];
        $tasa = $_POST['tasa'];
        $dif_precio = $_POST['dif_precio'];
        $fec_emision = $_POST['fec_emision'];
        $fec_prorroga = $_POST['fec_pror'];
        $fec_pag_prorroga = $_POST['fec_pag_pror'];
        $interes_prorroga = $_POST['inter_pror'];
        $fec_venc_pactado = $_POST['fec_ven_pac'];
        $valor = $_POST['valor'];
        $anticipado = $_POST['antici'];
        $fec_depo_anticipo = $_POST['fec_dep_anti'];
        $retencion = $_POST['rete'];
        $interes_mora = $_POST['inter_mora'];
        $excedente = $_POST['exedente'];
        if (empty($estado_pago_excedente)){$estado_pago_excedente = null;}else{$estado_pago_excedente = $_POST['est_exce'];}
        $fec_depo_exc = $_POST['fec_depo_exc'];
        $num_operacion_desc_excedente = $_POST['ope_asoc_desc_exce'];
        $obs = $_POST['obs_doc'];
        $estado = $_POST['estado'];
        $operacion = $_POST['num_oper'];
        $fec_venc = $_POST['vencimiento'];

        if($fec_venc = '0000-00-00'){
            $fec_venc = null;
        }


        if (empty($id_fact)){$id_fact = null;}else{$id_fact = $_POST['fac'];}
        $id_cli = $_POST['cli'];
        $id_hold = $_POST['hold'];
        $id_usu = $_SESSION['id'];    
        if (empty($tipo_pago_exc)){$tipo_pago_exc = null;}else{$tipo_pago_exc = $_POST['tipo_pago_exc'];}
        if (empty($fec_pag_int)){$fec_pag_int = null;}else{$fec_pag_int = $_POST['fec_pag_int'];}


        $fun = new Funciones();
     		

		if ($numero_doc != '')
		{
            $val = $fun->validar_ingreso_doc($id_hold,$numero_doc);
            if($val <> ""){
                echo "1";
            }else{
                    $dao = new DocumentoDAO('',$numero_doc,$centro_costo,$tipo_doc,$tasa,$dif_precio,$fec_emision,$fec_prorroga,$fec_pag_prorroga,$interes_prorroga,$fec_venc_pactado,$valor
                                    , $anticipado,$fec_depo_anticipo,$retencion,$interes_mora ,$excedente,$estado_pago_excedente,$fec_depo_exc,$num_operacion_desc_excedente,
                                    $obs,$estado,$operacion,$fec_venc,$id_fact,$id_cli, $id_hold, $id_usu,$tipo_pago_exc,$fec_pag_int);
        
                    $crear_doc = $dao->crear_doc();

                    /*$funlog = new Funciones();
                    $ingresarlog = $funlog->addLog($id_usu,$numero_doc);*/

                if (count($crear_doc)>0){
                    echo"2";    
                }else{
                    echo "Documento N° :".$numero_doc." Ingresado Correctamente!";  
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