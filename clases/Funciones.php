<?php

require_once '../recursos/db/db.php';


class Funciones 
{


    /*///////////////////////////////////////
    SELECCIONAR FACTURAS SEGUN ESTADO
    //////////////////////////////////////*/
    public function traer_facturas($opc){

        try{
            
            
            $pdo = AccesoDB::getCon();

           // FACTURA SIN MOVIMIENTO
            if($opc == 1) {
                $sql = "SELECT d.id_documento,d.numero_doc, DATE_FORMAT(d.fec_emision, '%d-%m-%Y') fec_emision, DATE_FORMAT(d.fec_venc, '%d-%m-%Y') fec_venc,DATE_FORMAT(d.fec_venc_pactado, '%d-%m-%Y') fec_venc_pactado,d.valor,d.anticipado,DATE_FORMAT(d.fec_depo_anticipo, '%d-%m-%Y') fec_depo_anticipo,d.retencion,d.interes_mora,d.excedente,DATE_FORMAT(d.fec_depo_exc, '%d-%m-%Y') fec_depo_exc,d.obs,
                t1.desc_item,d.operacion,
                f.razon_social factoring,
                u.nick usuario,
                c.razon_social cliente,c.rut,
                h.razon_social holding
                FROM documento AS d
                LEFT JOIN holding as h
                ON d.id_hold = h.id_hold
                LEFT JOIN cliente as c 
                ON d.id_cli = c.id_cliente
                LEFT JOIN factoring as f
                ON d.id_fact = f.id_factoring
                LEFT JOIN tab_param AS t1
                ON d.estado = t1.cod_item
                LEFT JOIN usuario AS u
                on d.id_usu = u.id_usu
                WHERE t1.cod_grupo = 3 AND t1.vig_item  = 1 AND t1.desc_item = 'SIN MOVIMIENTO'";
                // FACTURA FACTORIZADA
            }elseif ($opc == 2 ) {
                $sql = "SELECT d.id_documento,d.numero_doc, DATE_FORMAT(d.fec_emision, '%d-%m-%Y') fec_emision, DATE_FORMAT(d.fec_venc, '%d-%m-%Y') fec_venc,DATE_FORMAT(d.fec_venc_pactado, '%d-%m-%Y') fec_venc_pactado,d.valor,d.anticipado,DATE_FORMAT(d.fec_depo_anticipo, '%d-%m-%Y') fec_depo_anticipo,d.retencion,d.interes_mora,d.excedente,DATE_FORMAT(d.fec_depo_exc, '%d-%m-%Y') fec_depo_exc,d.obs,
                t1.desc_item,d.operacion,
                f.razon_social factoring,
                u.nick usuario,
                c.razon_social cliente,c.rut,
                h.razon_social holding
                FROM documento AS d
                LEFT JOIN holding as h
                ON d.id_hold = h.id_hold
                LEFT JOIN cliente as c 
                ON d.id_cli = c.id_cliente
                LEFT JOIN factoring as f
                ON d.id_fact = f.id_factoring
                LEFT JOIN tab_param AS t1
                ON d.estado = t1.cod_item
                LEFT JOIN usuario AS u
                on d.id_usu = u.id_usu
                WHERE t1.cod_grupo = 3 AND t1.vig_item  = 1 AND t1.desc_item = 'FACTORIZADA'";
                // FACTURA FINALIZADA
            }elseif ($opc == 3 ) {
                $sql = "SELECT d.id_documento,d.numero_doc, DATE_FORMAT(d.fec_emision, '%d-%m-%Y') fec_emision, DATE_FORMAT(d.fec_venc, '%d-%m-%Y') fec_venc,DATE_FORMAT(d.fec_venc_pactado, '%d-%m-%Y') fec_venc_pactado,d.valor,d.anticipado,DATE_FORMAT(d.fec_depo_anticipo, '%d-%m-%Y') fec_depo_anticipo,d.retencion,d.interes_mora,d.excedente,DATE_FORMAT(d.fec_depo_exc, '%d-%m-%Y') fec_depo_exc,d.obs,
                t1.desc_item,d.operacion,
                f.razon_social factoring,
                u.nick usuario,
                c.razon_social cliente,c.rut,
                h.razon_social holding
                FROM documento AS d
                LEFT JOIN holding as h
                ON d.id_hold = h.id_hold
                LEFT JOIN cliente as c 
                ON d.id_cli = c.id_cliente
                LEFT JOIN factoring as f
                ON d.id_fact = f.id_factoring
                LEFT JOIN tab_param AS t1
                ON d.estado = t1.cod_item
                LEFT JOIN usuario AS u
                on d.id_usu = u.id_usu
                WHERE t1.cod_grupo = 3 AND t1.vig_item  = 1 AND t1.desc_item = 'PRORROGADA'";
                // FACTURA VENCIDA
            }elseif ($opc == 4 ) {
                $sql = "SELECT d.id_documento,d.numero_doc, DATE_FORMAT(d.fec_emision, '%d-%m-%Y') fec_emision, DATE_FORMAT(d.fec_venc, '%d-%m-%Y') fec_venc,DATE_FORMAT(d.fec_venc_pactado, '%d-%m-%Y') fec_venc_pactado,d.valor,d.anticipado,DATE_FORMAT(d.fec_depo_anticipo, '%d-%m-%Y') fec_depo_anticipo,d.retencion,d.interes_mora,d.excedente,DATE_FORMAT(d.fec_depo_exc, '%d-%m-%Y') fec_depo_exc,d.obs,
                t1.desc_item,d.operacion,
                f.razon_social factoring,
                u.nick usuario,
                c.razon_social cliente,c.rut,
                h.razon_social holding
                FROM documento AS d
                LEFT JOIN holding as h
                ON d.id_hold = h.id_hold
                LEFT JOIN cliente as c 
                ON d.id_cli = c.id_cliente
                LEFT JOIN factoring as f
                ON d.id_fact = f.id_factoring
                LEFT JOIN tab_param AS t1
                ON d.estado = t1.cod_item
                LEFT JOIN usuario AS u
                on d.id_usu = u.id_usu
                WHERE t1.cod_grupo = 3 AND t1.vig_item  = 1 AND t1.desc_item = 'CANCELADA DE CLIENTE A FACTOR'";
                // FACTURA CANCELADA A FACTOR
            }elseif ($opc == 5 ) {
                $sql = "SELECT d.id_documento,d.numero_doc, DATE_FORMAT(d.fec_emision, '%d-%m-%Y') fec_emision, DATE_FORMAT(d.fec_venc, '%d-%m-%Y') fec_venc,DATE_FORMAT(d.fec_venc_pactado, '%d-%m-%Y') fec_venc_pactado,d.valor,d.anticipado,DATE_FORMAT(d.fec_depo_anticipo, '%d-%m-%Y') fec_depo_anticipo,d.retencion,d.interes_mora,d.excedente,DATE_FORMAT(d.fec_depo_exc, '%d-%m-%Y') fec_depo_exc,d.obs,
                t1.desc_item,d.operacion,
                f.razon_social factoring,
                u.nick usuario,
                c.razon_social cliente,c.rut,
                h.razon_social holding
                FROM documento AS d
                LEFT JOIN holding as h
                ON d.id_hold = h.id_hold
                LEFT JOIN cliente as c 
                ON d.id_cli = c.id_cliente
                LEFT JOIN factoring as f
                ON d.id_fact = f.id_factoring
                LEFT JOIN tab_param AS t1
                ON d.estado = t1.cod_item
                LEFT JOIN usuario AS u
                on d.id_usu = u.id_usu
                WHERE t1.cod_grupo = 3 AND t1.vig_item  = 1 AND t1.desc_item = 'CANCELADA DE CLIENTE A FACTORING'";
                // FACTURA CANCELADA A FACTORING
            }elseif ($opc == 6 ) {
                $sql = "SELECT d.id_documento,d.numero_doc, DATE_FORMAT(d.fec_emision, '%d-%m-%Y') fec_emision, DATE_FORMAT(d.fec_venc, '%d-%m-%Y') fec_venc,DATE_FORMAT(d.fec_venc_pactado, '%d-%m-%Y') fec_venc_pactado,d.valor,d.anticipado,DATE_FORMAT(d.fec_depo_anticipo, '%d-%m-%Y') fec_depo_anticipo,d.retencion,d.interes_mora,d.excedente,DATE_FORMAT(d.fec_depo_exc, '%d-%m-%Y') fec_depo_exc,d.obs,
                t1.desc_item,d.operacion,
                f.razon_social factoring,
                u.nick usuario,
                c.razon_social cliente,c.rut,
                h.razon_social holding
                FROM documento AS d
                LEFT JOIN holding as h
                ON d.id_hold = h.id_hold
                LEFT JOIN cliente as c 
                ON d.id_cli = c.id_cliente
                LEFT JOIN factoring as f
                ON d.id_fact = f.id_factoring
                LEFT JOIN tab_param AS t1
                ON d.estado = t1.cod_item
                LEFT JOIN usuario AS u
                on d.id_usu = u.id_usu
                WHERE t1.cod_grupo = 3 AND t1.vig_item  = 1 AND t1.desc_item = 'CANCELADA DE FACTOR A FACTORING'";
            }elseif ($opc == 7 ) {
                $sql = "SELECT d.id_documento,d.numero_doc, DATE_FORMAT(d.fec_emision, '%d-%m-%Y') fec_emision, DATE_FORMAT(d.fec_venc, '%d-%m-%Y') fec_venc,DATE_FORMAT(d.fec_venc_pactado, '%d-%m-%Y') fec_venc_pactado,d.valor,d.anticipado,DATE_FORMAT(d.fec_depo_anticipo, '%d-%m-%Y') fec_depo_anticipo,d.retencion,d.interes_mora,d.excedente,DATE_FORMAT(d.fec_depo_exc, '%d-%m-%Y') fec_depo_exc,d.obs,
                t1.desc_item,d.operacion,
                f.razon_social factoring,
                u.nick usuario,
                c.razon_social cliente,c.rut,
                h.razon_social holding
                FROM documento AS d
                LEFT JOIN holding as h
                ON d.id_hold = h.id_hold
                LEFT JOIN cliente as c 
                ON d.id_cli = c.id_cliente
                LEFT JOIN factoring as f
                ON d.id_fact = f.id_factoring
                LEFT JOIN tab_param AS t1
                ON d.estado = t1.cod_item
                LEFT JOIN usuario AS u
                on d.id_usu = u.id_usu
                WHERE t1.cod_grupo = 3 AND t1.vig_item  = 1 AND t1.desc_item = 'FINALIZADA'";
            }
                
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $response = $stmt->fetchAll();
            return $response;


        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }





    /*///////////////////////////////////////
    SELECCIONAR FACTURAS SEGUN ESTADO
    //////////////////////////////////////*/
    public function resumen_fact(){

        try{
            
            
            $pdo = AccesoDB::getCon();

           // FACTURA SIN MOVIMIENTO
            if($opc == 1) {
                $sql = "SELECT D.numero_doc,c.razon_social,D.fec_emision,D.valor,C.rut
                FROM documento D, cliente C
                WHERE D.ID_CLI = C.ID_cliente AND D.ESTADO = 1 AND D.ID_HOLD = 1";
                // FACTURA FACTORIZADA
            }
                
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":estado", $estado, PDO::PARAM_INT);
            $stmt->bindParam(":hold", $hold, PDO::PARAM_INT);
            $stmt->execute();
            $response = $stmt->fetchAll();
            return $response;


        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }

























    /*///////////////////////////////////////
    Cargar datos de usuario
    //////////////////////////////////////*/
    public function cargar_datos_usu($id_usu,$opc){

        try{
            
            
            $pdo = AccesoDB::getCon();

            if($opc == 1)
            {
                $sql = "select a.id_usu,a.nombre,a.apellido, a.RUT rut,a.email mail,b.desc_item perfil, c.desc_item cargo, if(a.vigencia=1,'VIGENTE','NO VIGENTE') vig, a.NICK nick
                from usuario a, tab_param b, tab_param c
                where a.CARGO = b.COD_ITEM and b.COD_GRUPO = 2 and b.VIG_ITEM = 1 
                and a.PERFIL = c.COD_ITEM and c.COD_GRUPO = 1 and c.VIG_ITEM = 1
                and a.ID_USU = :id_usu";

            }else if($opc == 2)
            {
                $sql = "select a.id_usu,a.nombre,a.apellido, a.RUT rut,a.email mail,b.cod_item perfil, c.cod_item cargo, a.vigencia vig, a.NICK nick
                from usuario a, tab_param b, tab_param c
                where a.CARGO = b.COD_ITEM and b.COD_GRUPO = 2 and b.VIG_ITEM = 1 
                and a.PERFIL = c.COD_ITEM and c.COD_GRUPO = 1 and c.VIG_ITEM = 1
                and a.ID_USU = :id_usu";
            }
                    
            



            

             
            

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id_usu", $id_usu, PDO::PARAM_INT);
            $stmt->execute();

            $response = $stmt->fetchAll();
            return $response;

        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }


    /*///////////////////////////////////////
    Cargar lista despegable de clientes
    //////////////////////////////////////*/
    public function cargar_clientes(){

        try{
            
            
            $pdo = AccesoDB::getCon();

            $sql = "select * from cliente order by razon_social";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $response = $stmt->fetchAll();
            return $response;

        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }


/*///////////////////////////////////////
    Cargar datos de usuario
    //////////////////////////////////////*/
    public function cargar_datos_perfiles(){

        try{
            
            
            $pdo = AccesoDB::getCon();
            $sql = "select u.id_usu,u.nombre,u.apellido,RUT as rut,eMAIL as mail,a.desc_item as perf, b.desc_item as carg,if(u.vigencia=1, 'Vigente','No Vigente') as vig
            from usuario u , tab_param a,tab_param b
            where u.perfil = a.cod_item and a.cod_grupo = 1 and a.vig_item = 1
            and u.cargo =  b.cod_item and b.cod_grupo = 2 and b.vig_item = 1 ";
        



                   
            

            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $response = $stmt->fetchAll();
            return $response;

        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }



    /*///////////////////////////////////////
    Cargar formas de giro
    //////////////////////////////////////*/
        public function cargar_formas_giro($vig_giro) {

            try{
                
                
                $pdo = AccesoDB::getCon();

                if ($vig_giro == 0) {
                    $sql = "select cod_item , desc_item  from tab_param where cod_grupo = 8 and cod_item <> 0";
                }else if ($vig_giro == 1) {
                    $sql = "select cod_item , desc_item  from tab_param where cod_grupo = 8 and cod_item <> 0 and vig_item = 1";
                }  
                

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                $response = $stmt->fetchAll();
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
            }
        }


    /*///////////////////////////////////////
    Cargar formas de giro
    //////////////////////////////////////*/
    public function cargar_documento($opc,$id_doc) {

        try{
            
            
            $pdo = AccesoDB::getCon();

            if ($opc == 0) 
            {
                $sql = "select * from documento where id_documento = :id_doc";
            }else if ($opc == 1) 
            {

                $sql = "SELECT d.id_documento,d.tipo_pag_exc,d.numero_doc,d.centro_costo,d.tipo_doc,d.tasa,d.dif_precio,d.fec_emision,d.fec_prorroga,d.fec_pag_prorroga,
                d.interes_prorroga,d.fec_venc_pactado,d.valor,d.anticipado,d.fec_depo_anticipo,d.retencion,d.interes_mora,d.excedente,d.estado_pago_excedente,
                d.fec_depo_exc,d.num_operacion_desc_excedente,d.obs,d.estado,d.operacion,d.fec_venc,d.id_fact,d.id_cli,d.id_hold,d.id_usu,
                c.id_cliente idcli,c.rut rutcli,c.razon_social nomcli,c.contacto_personal contcli,c.telefono fonocli,
                f.id_factoring idfac,f.rut rutfac,f.razon_social nomfac,f.contacto_personal contfac,f.telefono fonofac 
                FROM DOCUMENTO AS d
                LEFT JOIN holding as h
                ON d.ID_HOLD = h.ID_HOLD
                LEFT JOIN cliente as c 
                ON d.ID_CLI = c.ID_cliente
                LEFT JOIN FACTORING as f
                ON d.ID_FACT = f.ID_FACTORING
                WHERE d.id_documento = :id_doc";


                /*$sql = "select  d.id_documento,d.tipo_pag_exc,d.numero_doc,d.centro_costo,d.tipo_doc,d.tasa,d.dif_precio,d.fec_emision,d.fec_prorroga,d.fec_pag_prorroga,
                d.interes_prorroga,d.fec_venc_pactado,d.valor,d.anticipado,d.fec_depo_anticipo,d.retencion,d.interes_mora,d.excedente,d.estado_pago_excedente,
                d.fec_depo_exc,d.num_operacion_desc_excedente,d.obs,d.estado,d.operacion,d.fec_venc,d.id_fact,d.id_cli,d.id_hold,d.id_usu,
                
                c.id_cliente idcli,c.rut rutcli,c.razon_social nomcli,c.contacto_personal contcli,c.telefono fonocli,
                
                f.id_factoring idfac,f.rut rutfac,f.razon_social nomfac,f.contacto_personal contfac,f.telefono fonofac
                from documento d,cliente c,factoring f,holding h
                where d.id_documento = :id_doc and d.id_cli = c.id_cliente and d.id_hold = h.id_hold
                limit 1";*/


            }  
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id_doc", $id_doc, PDO::PARAM_INT);
            $stmt->execute();



            $response = $stmt->fetchAll();
            return $response;

        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }


    /*///////////////////////////////////////
    Cargar Datos de aprobaciones de usuarios para form cursatura
    //////////////////////////////////////*/
    public function cargar_aprobaciones($idope){

        try{
            $pdo = AccesoDB::getCon();
                
                
                $sql = " select a.est_nue_ope, concat(b.nom1_usu,' ', b.apepat_usu) nom, c.desc_item,a.obs_log_ope
                         from log_ope a, usuarios b, tab_param c 
                         where a.id_usu = b.id_usu and id_ope = :ope
                         and c.cod_grupo = 2 and c.cod_item = a.cargo_usu_log and c.vig_item = 1";
            
            
               

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":ope", $idope, PDO::PARAM_INT);
            $stmt->execute();

            $response = $stmt->fetchAll();
            return $response;

        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }
    


    /*///////////////////////////////////////
    Cargar Datos de detalle de la operacion (check_cursatura) 
    //////////////////////////////////////*/
    public function cargar_datos_det_ope($idope){

        try{
            $pdo = AccesoDB::getCon();
                
                
                $sql = "select a.est_ope,t_o.desc_item tipo_ope, a.id_ope,a.fec_ope,
                        (select count(id_doc) from documentos d where d.id_ope = a.id_ope) cant_doc,
                        (select t_d.desc_item from tab_param t_d where cod_grupo = 3 and t_d.cod_item = 
                                (select distinct tipo_doc from documentos e where e.id_ope = a.id_ope)) tipo_doc,
                        round(((select sum(plazo_doc) from documentos e where e.id_ope = a.id_ope)/
                        (select count(id_doc) from documentos d where d.id_ope = a.id_ope)
                        ),0) plazo_prom,
                         round(((select sum(anticipo_porc) from documentos e where e.id_ope = a.id_ope)/
                        (select count(id_doc) from documentos d where d.id_ope = a.id_ope)
                        ),0) anticipo_prom,
                        a.com_cob_ope, a.tasa_ope,
                        round(((select sum(COM_COB_DOC) from documentos e where e.id_ope = a.id_ope)/
                        (select count(id_doc) from documentos d where d.id_ope = a.id_ope)
                        ),0) ing_por_ope,
                        (select sum(monto_doc) from documentos d where d.id_ope = a.id_ope) monto_docs,
                        (select sum(monto_finan_doc) from documentos d where d.id_ope = a.id_ope) monto_finan,
                        (select sum(dif_pre_doc) from documentos d where d.id_ope = a.id_ope) dif_pre,
                        (select sum(anticipo_doc) from documentos d where d.id_ope = a.id_ope) ant_doc,
                        round(((select sum(monto_doc) from documentos d where d.id_ope = a.id_ope)*
                        (select (sum(com_cob_doc) /100)/30 from documentos d where d.id_ope = a.id_ope)
                        *((select sum(plazo_doc) from documentos e where e.id_ope = a.id_ope)/
                        (select count(id_doc) from documentos d where d.id_ope = a.id_ope)
                        )),0) serv_fact,
                        (a.com_cur_ope + a.iva_com_ope) serv_adm,
                        (select total_gasto_ope from gastos_ope g where g.id_ope_gasto = a.id_ope) gasto_ope,
                        a.monto_giro_ope, a.obs_ope
                        from operaciones a, tab_param t_o
                        where a.id_ope = :ope and  t_o.cod_grupo = 6 and t_o.COD_ITEM = a.tipo_ope";
            
            
               

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":ope", $idope, PDO::PARAM_INT);
            $stmt->execute();

            $response = $stmt->fetchAll();
            return $response;

        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }




   /*///////////////////////////////////////
    Contar Ope para resumen por cargo
    //////////////////////////////////////*/
        public function contador_ope($cargo){

            try{
                
                
                $pdo = AccesoDB::getCon();


               if ($cargo == 2) {
                  $sql = "select count(id_ope) ope from operaciones where est_ope = 1";
               }elseif ($cargo == 3) {
                   $sql = "select count(id_ope) ope from operaciones where est_ope = 3";
               }
                    
                
                

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                

                $totalFilas    =    $stmt->rowCount();

                if ($totalFilas == 0 ) {
                    return ('0');
                 }else{
                $response = $stmt->fetchAll();
                   return $response;
                 }


            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
            }
        }




   /*///////////////////////////////////////
    Validar rut deudor
    //////////////////////////////////////*/
        public function validar_rut_deudor($rut) {

            try{
                
                
                $pdo = AccesoDB::getCon();

               
                    $sql = "select nom_deu_doc from documentos where rut_deu_doc = :rut order by 1 limit 1";
                
                

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":rut", $rut, PDO::PARAM_STR);
                $stmt->execute();

                

                $totalFilas    =    $stmt->rowCount();

                if ($totalFilas == 0 ) {
                    return ('0');
                 }else{
                $response = $stmt->fetchAll();
                   return $response;
                 }


            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
            }
        }

  /*///////////////////////////////////////
    Validar Ingreso Doc
    //////////////////////////////////////*/
    public function validar_ingreso_doc($id_hold,$num_doc) {

        try{
            
            
            $pdo = AccesoDB::getCon();

           
            $sql = "select id_documento from documento
            WHERE numero_doc = :num_doc and id_hold = :id_hold";
            
            

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id_hold", $id_hold, PDO::PARAM_INT);
            $stmt->bindParam(":num_doc", $num_doc, PDO::PARAM_INT);
            $stmt->execute();

            

            $response = $stmt->fetchColumn();
            return $response;


        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }








   /*///////////////////////////////////////
    Cargar tipos de operaciones
    //////////////////////////////////////*/
        public function cargar_tipo_ope($vig_ope) {

            try{
                
                
                $pdo = AccesoDB::getCon();

                if ($vig_ope == 0) {
                    $sql = "select cod_item , desc_item  from tab_param where cod_grupo = 6 and cod_item <> 0";
                }else if ($vig_ope == 1) {
                    $sql = "select cod_item , desc_item  from tab_param where cod_grupo = 6 and cod_item <> 0 and vig_item = 1";
                }  
                

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                $response = $stmt->fetchAll();
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
            }
        }


   /*///////////////////////////////////////
    Cargar Bancos
    //////////////////////////////////////*/
        public function cargar_bcos($vig_bcos) {

            try{
                
                
                $pdo = AccesoDB::getCon();

                if ($vig_bcos == 0) {
                    $sql = "select cod_item , desc_item  from tab_param where cod_grupo = 5 and cod_item <> 0";
                }else if ($vig_bcos == 1) {
                    $sql = "select cod_item , desc_item  from tab_param where cod_grupo = 5 and cod_item <> 0 and vig_item = 1";
                }  
                

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                $response = $stmt->fetchAll();
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
            }
        }

/*///////////////////////////////////////
    Cargar Bancos
    //////////////////////////////////////*/
    public function formas_pago_doc($vig_bcos) {

        try{
            
            
            $pdo = AccesoDB::getCon();

            if ($vig_bcos == 0) {
                $sql = "select cod_item , desc_item  from tab_param where cod_grupo = 9 and cod_item <> 0";
            }else if ($vig_bcos == 1) {
                $sql = "select cod_item , desc_item  from tab_param where cod_grupo = 9 and cod_item <> 0 and vig_item = 1";
            }  
            

            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $response = $stmt->fetchAll();
            return $response;

        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }




    /*///////////////////////////////////////
    Validar usuario reset contraseña
    //////////////////////////////////////*/
        public function validar_usu($rut,$mail){

            try{
                
                
                $pdo = AccesoDB::getCon();

                           
                $sql = "select id_usu id from usuario where rut = :rut and email = :mail";
                          
                       
                                
                            

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":rut", $rut, PDO::PARAM_STR);
                $stmt->bindParam(":mail", $mail, PDO::PARAM_STR);
                $stmt->execute();

                $response = $stmt->fetchColumn();
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../factor/datos_pers.php';</script>";
            }
        }



    /*///////////////////////////////////////
    Validar contraseña 
    //////////////////////////////////////*/
        public function validar_pwd($id,$ident){

            try{
                
                
                $pdo = AccesoDB::getCon();

                            if ($ident == 0) {
                                $sql = "select pass_cli pass
                                        from clientes where id_cli = :id";
                            
                            }else if ($ident == 1) {
                                $sql = "select pass_usu pass
                                        from usuarios where id_usu = :id";
                            }
        
                       
                                
                            

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();

                $response = $stmt->fetchAll();
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
            }
        }



    /*///////////////////////////////////////
    Cargar dia +/- cliente para calculo de plazo
    //////////////////////////////////////*/
        public function cargar_dia_cli($cli){

            try{
                
                
                $pdo = AccesoDB::getCon();


        
                       
                                $sql = "select dia_cli
                                        from clientes where id_cli = :cli";
                            
                            

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":cli", $cli, PDO::PARAM_INT);
                $stmt->execute();

                $response = $stmt->fetchAll();
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
            }
        }



    /*///////////////////////////////////////
    Cargar lista despegable de tipos de documentos
    //////////////////////////////////////*/
        public function cargar_tipo_doc($vig){

            try{
                
                
                $pdo = AccesoDB::getCon();


        
                        if ($vig == 0) {
                                $sql = "";
                            }else if ($vig == 1){
                                $sql = "select cod_item tipo, desc_item tipo_doc from tab_param where cod_grupo = 5 and cod_item <> 0 and vig_item = 1";
                            }
                            

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                $response = $stmt->fetchAll();
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
            }
        }

        /*///////////////////////////////////////
    Cargar Estado de Pago Excedente
    //////////////////////////////////////*/
    public function cargar_estado_excedente($vig){

        try{
            
            
            $pdo = AccesoDB::getCon();


    
                    if ($vig == 0) {
                            $sql = "";
                        }else if ($vig == 1){
                            $sql = "select cod_item id_pago, desc_item estado_pago from tab_param where cod_grupo = 6 and cod_item <> 0 and vig_item = 1";
                        }
                        

            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $response = $stmt->fetchAll();
            return $response;

        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }
        /*///////////////////////////////////////
    Cargar lista despegable de tipos de documentos
    //////////////////////////////////////*/
    public function cargar_tiposdepago($vig){

        try{
            
            
            $pdo = AccesoDB::getCon();


    
                    if ($vig == 0) {
                            $sql = "";
                        }else if ($vig == 1){
                            $sql = "select cod_item id_pago, desc_item tipo_pago from tab_param where cod_grupo = 4 and cod_item <> 0 and vig_item = 1";
                        }
                        

            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $response = $stmt->fetchAll();
            return $response;

        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }




    
    /*///////////////////////////////////////
    Cargar lista despegable de usuarios
    //////////////////////////////////////*/
        public function cargar_usuarios($vig,$opc){

            try{
                
                
                $pdo = AccesoDB::getCon();

                if($opc == 1){
                    if ($vig == 0) {
                        $sql = "select id_usu, concat(nombre,' ',apellido,'- ',nick) usuario
                                from usuario order by 2";
                    }else if ($vig == 1){
                        $sql = "select id_usu, concat(nombre,' ',apellido,'- ',nick) usuario
                                from usuario where vigencia = 1 order by 2";
                    }

                }else if($opc == 2){
                    $sql = "select id_usu, concat(nombre,' ',apellido,'- ',nick) usuario
                                from usuario";

                }
        
                       
                            

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                $response = $stmt->fetchAll();
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
            }
        }
        // /*///////////////////////////////////////
        // Cargar lista despegable de clientes
        // //////////////////////////////////////*/
        // public function cargar_clientes($vig){

        //     try{
                
                
        //         $pdo = AccesoDB::getCon();


        
        //                 if ($vig == 0) {
        //                         $sql = "select `ID_CLI`, `NOM_CLI`,`RUT_CLI` from clientes order by 2";
        //                     }else if ($vig == 1){
        //                         $sql = "select `ID_CLI`, `NOM_CLI`,`RUT_CLI` from clientes where `VIG_CLI` = 1 order by 2";
        //                     }
                            

        //         $stmt = $pdo->prepare($sql);
        //         $stmt->execute();

        //         $response = $stmt->fetchAll();
        //         return $response;

        //     } catch (Exception $e) {
        //         echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        //     }
        // }

      

    /*///////////////////////////////////////
    Generar password
    //////////////////////////////////////*/
    public function generaPass(){
            //Se define una cadena de caractares. Te recomiendo que uses esta.
            $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
            //Obtenemos la longitud de la cadena de caracteres
            $longitudCadena=strlen($cadena);
             
            //Se define la variable que va a contener la contraseña
            $pass = "";
            //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
            $longitudPass=6;
             
            //Creamos la contraseña
            for($i=1 ; $i<=$longitudPass ; $i++){
                //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
                $pos=rand(0,$longitudCadena-1);
             
                //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
                $pass .= substr($cadena,$pos,1);
            }
            return $pass;
        }



    /*///////////////////////////////////////
    Validar rut nuevo
    //////////////////////////////////////*/
        public function validar_rut($rut, $op) {

            try{
                $pdo = AccesoDB::getCon();

                if($op == 1){
                    $sql = "SELECT rut FROM usuario where rut = :rut";
                } else if($op == 2){
                    $sql = "SELECT rut FROM cliente where rut = :rut";
                } else if($op == 3){
                    $sql = "SELECT rut FROM factoring where rut = :rut";
                } else if($op == 4){
                    $sql = "SELECT rut FROM holding where rut = :rut";
                }

            
               
                


                

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":rut", $rut, PDO::PARAM_STR);
                $stmt->execute();

                $response = $stmt->fetchColumn();
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
            }
        }


    /*///////////////////////////////////////
    Cargar Cargos
    //////////////////////////////////////*/
        public function cargar_cargos($vig_cargo) {

            try{
                
                
                $pdo = AccesoDB::getCon();

                if ($vig_cargo == 0) {
                    $sql = "select cod_item id_cargo, desc_item cargo from tab_param where cod_grupo = 1 and cod_item <> 0";
                }else if ($vig_cargo == 1) {
                    $sql = "select cod_item id_cargo, desc_item cargo from tab_param where cod_grupo = 1 and cod_item <> 0 and vig_item = 1";
                }  
                

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                $response = $stmt->fetchAll();
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
            }
        }

    /*///////////////////////////////////////
    Cargar estados de documento
    //////////////////////////////////////*/
    public function cargar_estados($vig_cargo) {

        try{
            
            
            $pdo = AccesoDB::getCon();

            if ($vig_cargo == 0) {
                $sql = "select cod_item id_cargo, desc_item cargo from tab_param where cod_grupo = 1 and cod_item <> 0";
            }else if ($vig_cargo == 1) {
                $sql = "select cod_item id_estado, desc_item estado from tab_param where cod_grupo = 3 and cod_item <> 0 and vig_item = 1";
            }  
            

            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $response = $stmt->fetchAll();
            return $response;

        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }


 


    /*///////////////////////////////////////
    Cargar Perfiles
    //////////////////////////////////////*/
        public function cargar_perfiles($vig_usu) {

            try{
                
                
                $pdo = AccesoDB::getCon();

                if ($vig_usu == 0) {
                    $sql = "select cod_item id_perfil, desc_item perfil from tab_param where cod_grupo = 2 and cod_item <> 0";
                }else if ($vig_usu == 1) {
                    $sql = "select cod_item id_perfil, desc_item perfil from tab_param where cod_grupo = 2 and cod_item <> 0 and vig_item = 1";
                }  
                

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                $response = $stmt->fetchAll();
                return $response;

            } catch (Exception $e) {
                echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
            }
        }




    

    /*///////////////////////////////////////
    Cargar datos de Cliente
    //////////////////////////////////////*/
    public function cargar_datos_cli_ope($ope){

        try{
            
            
            $pdo = AccesoDB::getCon();


                    
            
                $sql = "select a.id_cli,
                        a.nom_cli, b.fec_ope ,
                        a.linea_cred_cli, 
                        (select sum(monto_giro_ope) from operaciones c where (c.est_ope = 3 or c.cli_ope = a.id_cli)) ocupada,
                        a.linea_cred_cli, a.bco_cli,a.nro_cta_cli, a.mail_cli
                        from clientes a inner join  operaciones b on a.id_cli = b.cli_ope where id_ope = :ope";
    



                   
            

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":ope", $ope, PDO::PARAM_INT);
            $stmt->execute();

            $response = $stmt->fetchAll();
            return $response;

        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }


    /*///////////////////////////////////////
    Cargar datos de Cliente
    //////////////////////////////////////*/
    public function cargar_datos_cli($id_cli){

         try{
            
            
            $pdo = AccesoDB::getCon();
                    
            $sql = "select *                
            from cliente where id_cliente = :id_cli";
            
                   
            
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id_cli", $id_cli, PDO::PARAM_STR);
            $stmt->execute();
            $response = $stmt->fetchAll();
            return $response;
            
        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }

    /*///////////////////////////////////////
    Cargar datos de Facturas
    //////////////////////////////////////*/
    public function cargar_factura($hold,$estado){

        try{
           
           
           $pdo = AccesoDB::getCon();
                   
           $sql = "SELECT d.numero_doc,c.razon_social,DATE_FORMAT(d.fec_emision, '%d-%m-%Y')fec_emision,d.valor,c.rut
           FROM documento d, cliente c
           WHERE d.id_cli = c.id_cliente AND d.estado = :estado AND d.id_hold = :hold";
           
                  
           
           $stmt = $pdo->prepare($sql);
           $stmt->bindParam(":hold", $hold, PDO::PARAM_STR);
           $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
           
       } catch (Exception $e) {
           echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
       }
   }

       /*///////////////////////////////////////
    Cargar datos de Facturas
    //////////////////////////////////////*/
    public function cargar_factura2($hold,$vigencia){

        try{
           
           
           $pdo = AccesoDB::getCon();
            
           if($vigencia == 0){
                $sql = "SELECT d.numero_doc,c.razon_social,d.fec_emision,d.fec_venc,d.valor,d.rut,datediff(now(),d.fec_venc) as dias
                FROM documento d, cliente d
                WHERE d.id_cli = c.id_cliente AND d.estado = 2 AND d.id_hold = :hold
                AND d.fec_venc <  CURDATE()";
           }else if($vigencia == 1){
                $sql = "SELECT d.numero_doc,c.razon_social,d.fec_emision,d.fec_venc,d.valor,d.rut,datediff(now(),d.fec_venc) as dias
                FROM documento d, cliente d
                WHERE d.id_cli = c.id_cliente AND d.estado = 2 AND d.id_hold = :hold
                AND d.fec_venc >  CURDATE()";
           }
           
        
           
                  
           
           $stmt = $pdo->prepare($sql);
           $stmt->bindParam(":hold", $hold, PDO::PARAM_STR);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
           
       } catch (Exception $e) {
           echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
       }
   }
          /*///////////////////////////////////////
    Cargar datos de Facturas
    //////////////////////////////////////*/
    public function cargar_factura3($hold){

        try{
           
           
           $pdo = AccesoDB::getCon();
            
           $sql = "SELECT d.numero_doc,c.razon_social,DATE_FORMAT(d.fec_emision, '%d-%m-%Y')fec_emision,d.valor,c.rut
           FROM documento d, cliente c
           WHERE d.id_cli = c.id_cliente AND d.estado = 6 AND d.id_hold = :hold";
           
        
           
                  
           
           $stmt = $pdo->prepare($sql);
           $stmt->bindParam(":hold", $hold, PDO::PARAM_STR);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
           
       } catch (Exception $e) {
           echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
       }
   }

      /*///////////////////////////////////////
    Cargar datos de Facturas
    //////////////////////////////////////*/
    public function cargar_factura4($hold){

        try{
           
           
           $pdo = AccesoDB::getCon();
            
           $sql = "SELECT d.numero_doc,c.razon_social,d.fec_emision,d.valor,d.rut
           FROM documento d, cliente c
           WHERE d.id_cli = c.id_cliente AND d.id_hold = :hold AND d.estado_pago_excedente is null";
           
        
           
                  
           
           $stmt = $pdo->prepare($sql);
           $stmt->bindParam(":hold", $hold, PDO::PARAM_STR);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
           
       } catch (Exception $e) {
           echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
       }
   }
         /*///////////////////////////////////////
    Cargar datos de Facturas
    //////////////////////////////////////*/
    public function cargar_factura5($hold){

        try{
           
           
           $pdo = AccesoDB::getCon();
            
           $sql = "SELECT d.numero_doc,c.razon_social,d.fec_emision,d.valor,c.rut
           FROM documento d, cliente c
           WHERE d.id_cli = c.id_cliente AND d.id_hold = :hold AND d.estado_pago_excedente is null";
           
        
           
                  
           
           $stmt = $pdo->prepare($sql);
           $stmt->bindParam(":hold", $hold, PDO::PARAM_STR);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
           
       } catch (Exception $e) {
           echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
       }
   }

    /*///////////////////////////////////////
    Llenar Info Deudores cursatura
    //////////////////////////////////////*/

    public function infodeudores($idope){

        try{
            
            
            $pdo = AccesoDB::getCon();

            //OJO CON EL CALCULO DE LA MORA, SOLO SE TOMARA EL MONTO FINANCIADO
            
                
            
            // $sql = "select 
            //         a.nom_deu_doc, 
            //         round((sum(a.dif_pre_doc) + sum(a.com_cob_doc) + sum(a.anticipo_doc)), 0) deuda_ope,
            //         (select round((sum(a.dif_pre_doc) + sum(a.com_cob_doc) + sum(a.anticipo_doc)), 0) 
            //             from documentos b 
            //             where b.rut_deu_doc = a.rut_deu_doc and b.est_doc = 1 group by b.rut_deu_doc) deuda_cli,
            //         round(((select round((sum(a.dif_pre_doc) + sum(a.com_cob_doc) + sum(a.anticipo_doc)), 0) 
            //             from documentos b 
            //             where b.rut_deu_doc = a.rut_deu_doc and b.est_doc = 1 group by b.rut_deu_doc) / c.LINEA_CRED_CLI),2) conc_cli,
            //         round((1.5/(select DATEDIFF(CURDATE() ,b.fec_ven_doc) * b.monto_finan_doc
            //             from documentos b 
            //             where b.rut_deu_doc = a.rut_deu_doc and b.est_doc = 1 group by b.rut_deu_doc) ) ,0) mora_cli
            //         from documentos a inner join operaciones b on a.id_ope = b.id_ope
            //         inner join clientes c on b.cli_ope = c.id_cli
            //         where a.id_ope = :idope
            //         group by a.NOM_DEU_DOC order by a.nom_deu_doc";

            $sql = "select 
                    a.nom_deu_doc, 
                    round((sum(a.dif_pre_doc) + sum(a.com_cob_doc) + sum(a.anticipo_doc)), 0) deuda_ope,
                    (select round((sum(a.dif_pre_doc) + sum(a.com_cob_doc) + sum(a.anticipo_doc)), 0) 
                        from documentos b 
                        where b.rut_deu_doc = a.rut_deu_doc and b.est_doc = 1 group by b.rut_deu_doc) deuda_cli,
                    round(((select round((sum(a.dif_pre_doc) + sum(a.com_cob_doc) + sum(a.anticipo_doc)), 0) 
                        from documentos b 
                        where b.rut_deu_doc = a.rut_deu_doc and b.est_doc = 1 group by b.rut_deu_doc) / c.LINEA_CRED_CLI),2) conc_cli,
                    round((select b.monto_finan_doc
                        from documentos b 
                        where b.rut_deu_doc = a.rut_deu_doc and b.est_doc = 1 group by b.rut_deu_doc)  ,0) mora_cli
                    from documentos a inner join operaciones b on a.id_ope = b.id_ope
                    inner join clientes c on b.cli_ope = c.id_cli
                    where a.id_ope = :idope
                    group by a.NOM_DEU_DOC order by a.nom_deu_doc";




                   
            

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":idope", $idope, PDO::PARAM_INT);
            $stmt->execute();

            $response = $stmt->fetchAll();
            return $response;

        } catch (Exception $e) {
            echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
        }
    }
    //////////////////////////////////////////////////////////////////// F A C T O R I N G ///////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////// F A C T O R I N G ///////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////// F A C T O R I N G ///////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////// F A C T O R I N G ///////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////// F A C T O R I N G ///////////////////////////////////////////////////////////

    /*///////////////////////////////////////
    Cargar datos de Factoring
    //////////////////////////////////////*/
    public function cargar_datos_fac(){

        try{
           
           
           $pdo = AccesoDB::getCon();
                   
           $sql = "select *                
           from factoring";
           
                  
           
           $stmt = $pdo->prepare($sql);
           //$stmt->bindParam(":id_cli", $id_cli, PDO::PARAM_STR);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
           
       } catch (Exception $e) {
           echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
       }
   }
   /*///////////////////////////////////////
    Cargar datos de fact 2
    //////////////////////////////////////*/
    public function addLog($id_usu,$id_doc,$estado){

        try{
           
            
           $pdo = AccesoDB::getCon();
                   
        
           $sql = "insert into logdoc (`idlogdoc`,`fechalog`,`estadoanterior`,`estadoactual`,`usuariolog`,`id_doc`)  
           values (null,curdate(),:estado,:estado,:id_usu,:id_doc)";
           
                  
           
           $stmt = $pdo->prepare($sql);
           $stmt->bindParam(":id_usu", $id_usu, PDO::PARAM_INT);
           $stmt->bindParam(":id_doc", $id_doc, PDO::PARAM_INT);
           $stmt->bindParam(":estado", $estado, PDO::PARAM_INT);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
           
       } catch (Exception $e) {
           /*echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";*/
       }
   }

   public function addLog2($id_usu,$id_doc,$estado){

    try{
       
        
       $pdo = AccesoDB::getCon();
               
    
       $sql = "insert into logdoc (`idlogdoc`,`fechalog`,`estadoanterior`,`estadoactual`,`usuariolog`,`id_doc`)  
       values (null,curdate(),:estado,:estado,:id_usu,:id_doc)";
       
              
       
       $stmt = $pdo->prepare($sql);
       $stmt->bindParam(":id_usu", $id_usu, PDO::PARAM_INT);
       $stmt->bindParam(":id_doc", $id_doc, PDO::PARAM_INT);
       $stmt->bindParam(":estado", $estado, PDO::PARAM_INT);
       $stmt->execute();
       $response = $stmt->fetchAll();
       return $response;
       
   } catch (Exception $e) {
       /*echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";*/
   }
}
    /*///////////////////////////////////////
    Cargar datos de fact 2
    //////////////////////////////////////*/
    public function llenarLog($id_doc){

        try{
           
           
           $pdo = AccesoDB::getCon();
                   
           $sql = "select l.idlogdoc,DATE_FORMAT(l.fechalog, '%d-%m-%Y') fecha,t1.desc_item,u.nombre
           from documento as d,logdoc as l,tab_param as t1,tab_param as t2, usuario as u
           where d.id_documento = :doc and  l.id_doc = :doc and
           t1.cod_grupo = 3  and t1.cod_item = l.estadoanterior and
           t2.cod_grupo = 3  and t2.cod_item = l.estadoactual and u.id_usu = l.usuariolog";
           
                  
           
           $stmt = $pdo->prepare($sql);
           $stmt->bindParam(":doc", $id_doc, PDO::PARAM_INT);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
           
       } catch (Exception $e) {
           /*echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";*/
       }
   }

   /*///////////////////////////////////////
    Cargar datos de fact 2
    //////////////////////////////////////*/
    public function cargar_datos_fac2($id_fac){

        try{
           
           
           $pdo = AccesoDB::getCon();
                   
           $sql = "select *                
           from factoring where id_factoring = :id_fac";
           
                  
           
           $stmt = $pdo->prepare($sql);
           $stmt->bindParam(":id_fac", $id_fac, PDO::PARAM_STR);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
           
       } catch (Exception $e) {
           echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
       }
   }

    //////////////////////////////////////////////////////////////////// EMPRESAS DEL holding ///////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////// EMPRESAS DEL holding ///////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////// EMPRESAS DEL holding ///////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////// EMPRESAS DEL holding ///////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////// EMPRESAS DEL holding ///////////////////////////////////////////////////////////

    //////////////////////////////
    //Cargar datos de Factoring
    //////////////////////////////////////*/
    public function cargar_datos_hold(){

        try{
           
           
           $pdo = AccesoDB::getCon();
                   
           $sql = "select *                
           from holding";
           
                  
           
           $stmt = $pdo->prepare($sql);
           //$stmt->bindParam(":id_cli", $id_cli, PDO::PARAM_STR);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
           
       } catch (Exception $e) {
           echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
       }
   }

   /*///////////////////////////////////////
    Cargar datos de fact 2
    //////////////////////////////////////*/
    public function cargar_datos_hold2($id_hold){

        try{
           
           
           $pdo = AccesoDB::getCon();
                   
           $sql = "select *                
           from holding where id_hold = :id_hold";
           
                  
           
           $stmt = $pdo->prepare($sql);
           $stmt->bindParam(":id_hold", $id_hold, PDO::PARAM_STR);
           $stmt->execute();
           $response = $stmt->fetchAll();
           return $response;
           
       } catch (Exception $e) {
           echo"<script type=\"text/javascript\">alert('Error, comuniquese con el administrador".  $e->getMessage()." '); window.location='../paginas_fa/datos_pers.php';</script>";
       }
   }



}
