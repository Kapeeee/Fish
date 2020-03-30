<?php
require_once '../recursos/db/db.php';
   

/*/////////////////////////////
Clase Documento
////////////////////////////*/

class DocumentoDAO 
{
    private $id_documento;
	private $numero_doc;
    private $centro_costo;
    private $tipo_doc;
    private $tasa;
    private $dif_precio;
    private $fec_emision;
    private $fec_prorroga;
    private $fec_pag_prorroga;
    private $interes_prorroga;
    private $fec_venc_pactado;
    private $valor;
    private $anticipado;
    private $fec_depo_anticipo;
    private $retencion;
    private $interes_mora;
    private $excedente;
    private $estado_pago_excedente;
    private $fec_depo_exc;
    private $num_operacion_desc_excedente;
    private $obs;
    private $estado;
    private $operacion;
    private $fec_venc;
    private $id_fact;
    private $id_cli;
    private $id_hold;
    private $id_usu;
    private $tipo_pago_exc;
    private $fec_pag_int;


    public function __construct(    $id_documento=null,
                                    $numero_doc=null,
                                    $centro_costo=null,
                                    $tipo_doc=null,
                                    $tasa=null,
                                    $dif_precio=null,
                                    $fec_emision=null,
                                    $fec_prorroga=null,
                                    $fec_pag_prorroga=null,
                                    $interes_prorroga=null,
                                    $fec_venc_pactado=null,
                                    $valor=null,
                                    $anticipado=null,
                                    $fec_depo_anticipo=null,
                                    $retencion=null,
                                    $interes_mora=null,
                                    $excedente=null,
                                    $estado_pago_excedente=null,
                                    $fec_depo_exc=null,
                                    $num_operacion_desc_excedente=null,
                                    $obs=null,
                                    $estado=null,
                                    $operacion=null,
                                    $fec_venc=null,
                                    $id_fact=null,
                                    $id_cli=null,
                                    $id_hold=null,
                                    $id_usu=null,
                                    $tipo_pago_exc=null,
                                    $fec_pag_int = null                                    
                                    ) {


 
$this->id_documento=$id_documento;
$this->numero_doc=$numero_doc;
$this->centro_costo=$centro_costo;
$this->tipo_doc=$tipo_doc;
$this->tasa=$tasa;
$this->dif_precio=$dif_precio;
$this->fec_emision=$fec_emision;
$this->fec_prorroga=$fec_prorroga;
$this->fec_pag_prorroga=$fec_pag_prorroga;
$this->interes_prorroga=$interes_prorroga;
$this->fec_venc_pactado=$fec_venc_pactado;
$this->valor=$valor;
$this->anticipado=$anticipado;
$this->fec_depo_anticipo=$fec_depo_anticipo;
$this->retencion=$retencion;
$this->interes_mora=$interes_mora;
$this->excedente=$excedente;
$this->estado_pago_excedente=$estado_pago_excedente;
$this->fec_depo_exc=$fec_depo_exc;
$this->num_operacion_desc_excedente=$num_operacion_desc_excedente;
$this->obs=$obs;
$this->estado=$estado;
$this->operacion=$operacion;
$this->fec_venc=$fec_venc;
$this->id_fact=$id_fact;
$this->id_cli=$id_cli;
$this->id_hold=$id_hold;
$this->id_usu= $id_usu;
$this->tipo_pago_exc= $tipo_pago_exc;
$this->fec_pag_int = $fec_pag_int;


    }
    public function getDoc() {
    return $this->id_documento;;
    }

    /*///////////////////////////////////////
    Ingresar Documento
    //////////////////////////////////////*/
    public function crear_doc() {

    			 try{
                $pdo = AccesoDB::getCon();
                
               
                $sql_ing_doc = "INSERT INTO `documento`(`numero_doc`,`centro_costo`,`tipo_doc`,
                `tasa`,`dif_precio`,`fec_emision`,`fec_prorroga`,
                `fec_pag_prorroga`,`interes_prorroga`,`fec_venc_pactado`,
                `valor`,`anticipado`,`fec_depo_anticipo`,`retencion`,
                `interes_mora`,`excedente`,`estado_pago_excedente`,
                `fec_depo_exc`,`num_operacion_desc_excedente`,`obs`,
                `estado`,`operacion`,`id_fact`,`id_cli`,`id_hold`,`id_usu`,`fec_venc`,`tipo_pag_exc`,`fec_pag_int`)

                VALUES(:numero_doc, :centro_costo, :tipo_doc, :tasa, :dif_precio,
                       :fec_emision, :fec_prorroga,:fec_pag_prorroga,:interes_prorroga,:fec_venc_pactado,
                       :valor, :anticipado, :fec_depo_anticipo, :retencion, :interes_mora,
                       :excedente, :estado_pago_excedente,:fec_depo_exc,:num_operacion_desc_excedente,:obs,
                       :estado,:operacion,:id_fact,:id_cli,:id_hold,
                       :id_usu,:fec_venc,:tipo_pag_exc,:fec_pag_int)";

                              


                $stmt = $pdo->prepare($sql_ing_doc);
                $stmt->bindParam("numero_doc",$this->numero_doc, PDO::PARAM_INT);
                $stmt->bindParam("centro_costo",$this->centro_costo, PDO::PARAM_INT);
                $stmt->bindParam("tipo_doc",$this->tipo_doc, PDO::PARAM_INT);
                $stmt->bindParam("tasa",$this->tasa, PDO::PARAM_INT);
                $stmt->bindParam("dif_precio",$this->dif_precio, PDO::PARAM_INT);
                $stmt->bindParam("fec_emision",$this->fec_emision, PDO::PARAM_STR);
                $stmt->bindParam("fec_prorroga",$this->fec_prorroga, PDO::PARAM_STR);
                $stmt->bindParam("fec_pag_prorroga",$this->fec_pag_prorroga, PDO::PARAM_STR);
                $stmt->bindParam("interes_prorroga",$this->interes_prorroga, PDO::PARAM_INT);
                $stmt->bindParam("fec_venc_pactado",$this->fec_venc_pactado, PDO::PARAM_STR);
                $stmt->bindParam("valor",$this->valor, PDO::PARAM_INT);
                $stmt->bindParam("anticipado",$this->anticipado, PDO::PARAM_INT);
                $stmt->bindParam("fec_depo_anticipo",$this->fec_depo_anticipo, PDO::PARAM_STR);
                $stmt->bindParam("retencion",$this->retencion, PDO::PARAM_INT);
                $stmt->bindParam("interes_mora",$this->interes_mora, PDO::PARAM_INT);
                $stmt->bindParam("excedente",$this->excedente, PDO::PARAM_INT);
                $stmt->bindParam("estado_pago_excedente",$this->estado_pago_excedente, PDO::PARAM_INT);
                $stmt->bindParam("fec_depo_exc",$this->fec_depo_exc, PDO::PARAM_STR);
                $stmt->bindParam("num_operacion_desc_excedente",$this->num_operacion_desc_excedente, PDO::PARAM_INT);
                $stmt->bindParam("obs",$this->obs, PDO::PARAM_STR);
                $stmt->bindParam("estado",$this->estado, PDO::PARAM_INT);
                $stmt->bindParam("operacion",$this->operacion, PDO::PARAM_INT);
                $stmt->bindParam("id_fact",$this->id_fact, PDO::PARAM_INT);
                $stmt->bindParam("id_cli",$this->id_cli, PDO::PARAM_INT);
                $stmt->bindParam("id_hold",$this->id_hold, PDO::PARAM_INT);
                $stmt->bindParam("id_usu",$this->id_usu, PDO::PARAM_INT);
                $stmt->bindParam("fec_venc",$this->fec_venc, PDO::PARAM_STR);
                $stmt->bindParam("tipo_pag_exc",$this->tipo_pago_exc, PDO::PARAM_INT);
                $stmt->bindParam("fec_pag_int",$this->fec_pag_int, PDO::PARAM_STR);
                $stmt->execute();




                             

                
                
        

            } catch (Exception $e) {
                echo"Error, comuniquese con el administrador".  $e->getMessage().""; 
            }

    }
    ///////////////////////////////////////
    ///Modificar Documento
    //////////////////////////////////////
    public function mod_doc() {

        try{
           
            $pdo = AccesoDB::getCon();

            $sql_mod_doc = "UPDATE `documento` 
            SET
            `numero_doc` = :numero_doc,
            `centro_costo` = :centro_costo,
            `tipo_doc` =  :tipo_doc,
            `tasa`= :tasa,
            `dif_precio`=:dif_precio,
            `fec_emision`=:fec_emision,
            `fec_prorroga`=:fec_prorroga,
            `fec_pag_prorroga`=:fec_pag_prorroga,
            `interes_prorroga`=:interes_prorroga,
            `fec_venc_pactado`= :fec_venc_pactado,
            `valor` = :valor,
            `anticipado`= :anticipado,
            `fec_depo_anticipo`= :fec_depo_anticipo,
            `retencion`= :retencion,
            `interes_mora`= :interes_mora,
            `excedente`= :excedente,
            `estado_pago_excedente`=  :estado_pago_excedente,
            `fec_depo_exc`= :fec_depo_exc,
            `num_operacion_desc_excedente`=  :num_operacion_desc_excedente,
            `obs`= :obs,
            `estado`= :estado,
            `operacion`= :operacion,
            `id_fact`= :id_fact,
            `id_cli`= :id_cli,
            `id_hold`=:id_hold,
            `fec_venc`= :fec_venc,
            `tipo_pag_exc` =:tipo_pag_exc,
            `fec_pag_int`= :fec_pag_int

            

            WHERE id_documento = :id_doc";
                              
                $stmt = $pdo->prepare($sql_mod_doc);
                $stmt->bindParam("numero_doc",$this->numero_doc, PDO::PARAM_INT);
                $stmt->bindParam("centro_costo",$this->centro_costo, PDO::PARAM_INT);
                $stmt->bindParam("tipo_doc",$this->tipo_doc, PDO::PARAM_INT);
                $stmt->bindParam("tasa",$this->tasa, PDO::PARAM_INT);
                $stmt->bindParam("dif_precio",$this->dif_precio, PDO::PARAM_INT);
                $stmt->bindParam("fec_emision",$this->fec_emision, PDO::PARAM_STR);
                $stmt->bindParam("fec_prorroga",$this->fec_prorroga, PDO::PARAM_STR);
                $stmt->bindParam("fec_pag_prorroga",$this->fec_pag_prorroga, PDO::PARAM_STR);
                $stmt->bindParam("interes_prorroga",$this->interes_prorroga, PDO::PARAM_INT);
                $stmt->bindParam("fec_venc_pactado",$this->fec_venc_pactado, PDO::PARAM_STR);
                $stmt->bindParam("valor",$this->valor, PDO::PARAM_INT);
                $stmt->bindParam("anticipado",$this->anticipado, PDO::PARAM_INT);
                $stmt->bindParam("fec_depo_anticipo",$this->fec_depo_anticipo, PDO::PARAM_STR);
                $stmt->bindParam("retencion",$this->retencion, PDO::PARAM_INT);
                $stmt->bindParam("interes_mora",$this->interes_mora, PDO::PARAM_INT);
                $stmt->bindParam("excedente",$this->excedente, PDO::PARAM_INT);
                $stmt->bindParam("estado_pago_excedente",$this->estado_pago_excedente, PDO::PARAM_INT);
                $stmt->bindParam("fec_depo_exc",$this->fec_depo_exc, PDO::PARAM_STR);
                $stmt->bindParam("num_operacion_desc_excedente",$this->num_operacion_desc_excedente, PDO::PARAM_INT);
                $stmt->bindParam("obs",$this->obs, PDO::PARAM_STR);
                $stmt->bindParam("estado",$this->estado, PDO::PARAM_INT);
                $stmt->bindParam("operacion",$this->operacion, PDO::PARAM_INT);
                $stmt->bindParam("id_fact",$this->id_fact, PDO::PARAM_INT);
                $stmt->bindParam("id_cli",$this->id_cli, PDO::PARAM_INT);
                $stmt->bindParam("id_hold",$this->id_hold, PDO::PARAM_INT);
                $stmt->bindParam("fec_venc",$this->fec_venc, PDO::PARAM_STR);
                $stmt->bindParam("tipo_pag_exc",$this->tipo_pago_exc, PDO::PARAM_INT);
                $stmt->bindParam("fec_pag_int",$this->fec_pag_int, PDO::PARAM_STR);
                $stmt->bindParam("id_doc",$this->id_documento, PDO::PARAM_INT);
                $stmt->execute();
                //$stmt->bindParam("id_usu",$this->id_usu, PDO::PARAM_INT);
       
}


    catch (Exception $e) {
       echo"Error, comuniquese con el administrador".  $e->getMessage().""; 
   }

}
public function mod_varios($cadena) {

    try{
       
        $pdo = AccesoDB::getCon();


        $sql_mod_doc = "UPDATE `documento`
         SET
         `centro_costo`=:centro_costo,
         `tasa`=:tasa,
         `fec_depo_anticipo`=:fec_depo_anticipo,
         `obs`= :obs,
         `estado`=:estado,
         `operacion`=:operacion,
         `id_fact`=:id_fact
         
          WHERE $cadena";






                          
            $stmt = $pdo->prepare($sql_mod_doc);
            $stmt->bindParam("centro_costo",$this->centro_costo, PDO::PARAM_INT);
            $stmt->bindParam("tasa",$this->tasa, PDO::PARAM_INT);
            $stmt->bindParam("fec_depo_anticipo",$this->fec_depo_anticipo, PDO::PARAM_STR);
            $stmt->bindParam("obs",$this->obs, PDO::PARAM_STR);
            $stmt->bindParam("estado",$this->estado, PDO::PARAM_INT);
            $stmt->bindParam("operacion",$this->operacion, PDO::PARAM_INT);
            $stmt->bindParam("id_fact",$this->id_fact, PDO::PARAM_INT);
            $stmt->execute();

   
}


catch (Exception $e) {
   echo"Error, comuniquese con el administrador".  $e->getMessage().""; 
}

}
}

?>