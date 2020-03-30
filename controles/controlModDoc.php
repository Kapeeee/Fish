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

        
		$id_doc = $_POST['id_documento'];
        $numero_doc = $_POST['numdoc'];
        $centro_costo = $_POST['centro_costo'];
        if (empty($tipo_doc)){$tipo_doc = null;}else{$tipo_doc = $_POST['tipo'];}   
        $tasa = $_POST['tasa'];
        if (empty($dif_precio)){$dif_precio = null;}else{$dif_precio = $_POST['dif_precio'];} 
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
        if(empty($_POST['fac'])){$id_fact = null;}else{$id_fact = $_POST['fac'];}
        $id_cli = $_POST['cli'];
        $id_hold = $_POST['hold'];
        $id_usu = $_SESSION['id'];
        $fec_venc = $_POST['vencimiento'];
        if (empty($tipo_pago_exc)){$tipo_pago_exc = null;}else{$tipo_pago_exc = $_POST['tipo_pago_exc'];}
        if (empty($fec_pag_int)){$fec_pag_int = null;}else{$fec_pag_int = $_POST['fec_pag_int'];}



        
        
        
        $dao = new DocumentoDAO($id_doc,$numero_doc,$centro_costo,$tipo_doc,$tasa,
                                $dif_precio,$fec_emision,$fec_prorroga,$fec_pag_prorroga,$interes_prorroga,
                                $fec_venc_pactado,$valor,$anticipado,$fec_depo_anticipo,$retencion,
                                $interes_mora ,$excedente,$estado_pago_excedente,$fec_depo_exc,$num_operacion_desc_excedente,
                                $obs,$estado,$operacion,$fec_venc,$id_fact,
                                $id_cli, $id_hold, $id_usu,$tipo_pago_exc,$fec_pag_int);

        $mod_doc = $dao->mod_doc();
        
        $funlog = new Funciones();
        $ingresarlog = $funlog->addLog($id_usu,$id_doc,$estado);

        if (count($mod_doc)>0){
            echo "1";    
        } else
        {
            echo "Documento Modificado Correctamente.";     
        }
	salir:
	
	} catch (Exception $e) {
		echo"1asdasdasd"; 
	}
?>