<?php
require_once '../recursos/db/db.php';

/*/////////////////////////////
Clase Factoring
////////////////////////////*/

class factoringDAO 
{
    private $id_factoring;
    private $rut;
    private $razon_social;
    private $email;
    private $telefono;
    private $contacto_personal;
    private $direccion;
    private $celular;
    private $num_cta_1;
    private $num_cta_2;
    private $banco_cta_1;
    private $banco_cta_2;
    private $tipo_cta_1;
    private $tipo_cta_2;
    private $email2;
    private $email3 ;
    private $email4;
    private $cargo_contactop1;
    private $contacto_personal2;
    private $cargo_contactop2;











    public function __construct($id_factoring=null,
                                $rut=null,
                                $razon_social=null,
                                $email=null,
                                $telefono=null,
                                $contacto_personal=null,
                                $direccion=null,
                                $celular = null,
                                $num_cta_1 = null,
                                $num_cta_2 = null,
                                $banco_cta_1 = null,
                                $banco_cta_2 = null,
                                $tipo_cta_1 = null,
                                $tipo_cta_2 = null,
                                $email2 = null,
                                $email3  = null,
                                $email4 = null,
                                $cargo_contactop1 = null,
                                $contacto_personal2 = null,
                                $cargo_contactop2 = null) 
                                {

    $this->id_factoring = $id_factoring;
    $this->rut = $rut;
    $this->razon_social = $razon_social;
    $this->email = $email;
    $this->telefono = $telefono;
    $this->contacto_personal = $contacto_personal;
    $this->direccion = $direccion;
    $this->celular = $celular;
    $this->num_cta_1 = $num_cta_1;
    $this->num_cta_2 = $num_cta_2;
    $this->banco_cta_1 = $banco_cta_1;
    $this->banco_cta_2 = $banco_cta_2;
    $this->tipo_cta_1 = $tipo_cta_1;
    $this->tipo_cta_2 = $tipo_cta_2;
    $this->email2 = $email2;
    $this->email3 = $email3;
    $this->email4 = $email4;
    $this->cargo_contactop1 = $cargo_contactop1;
    $this->contacto_personal2 = $contacto_personal2;
    $this->cargo_contactop2 = $cargo_contactop2;
    }

    public function getFactoring() {
    return $this->id_factoring;
    }


    /*///////////////////////////////////////
    Crear Factoring
    //////////////////////////////////////*/
    public function crear_factoring() {

        try{
             
                $pdo = AccesoDB::getCon();

                $sql_crear_factoring = "INSERT INTO `factoring`(`RUT`,
                                                                `RAZON_SOCIAL`,
                                                                `EMAIL`,
                                                                `TELEFONO`,
                                                                `CONTACTO_PERSONAL`,
                                                                `DIRECCION`,
                                                                `CELULAR` ,
                                                                `NUM_CTA_1`,
                                                                `NUM_CTA_2`,
                                                                `BANCO_CTA_1`, 
                                                                `BANCO_CTA_2`, 
                                                                `TIPO_CTA_1`, 
                                                                `TIPO_CTA_2`, 
                                                                `EMAIL2`, 
                                                                `EMAIL3`, 
                                                                `EMAIL4`, 
                                                                `CARGO_CONTACTOP1`, 
                                                                `CONTACTO_PERSONAL2`,
                                                                `CARGO_CONTACTOP2`)

                                VALUES( :rut,
                                        :razon_social,
                                        :email,
                                        :telefono,
                                        :contacto_personal,
                                        :direccion,
                                        :celular,
                                        :num_cta_1,
                                        :num_cta_2,
                                        :banco_cta_1,
                                        :banco_cta_2,
                                        :tipo_cta_1,
                                        :tipo_cta_2,
                                        :email2,
                                        :email3,
                                        :email4,
                                        :cargo_contactop1,
                                        :contacto_personal2,
                                        :cargo_contactop2)";


                $stmt = $pdo->prepare($sql_crear_factoring);
                $stmt->bindParam(":rut", $this->rut, PDO::PARAM_STR); 
                $stmt->bindParam(":razon_social", $this->razon_social, PDO::PARAM_STR); 
                $stmt->bindParam(":email", $this->email, PDO::PARAM_STR); 
                $stmt->bindParam(":telefono", $this->telefono, PDO::PARAM_STR); 
                $stmt->bindParam(":contacto_personal", $this->contacto_personal, PDO::PARAM_STR); 
                $stmt->bindParam(":direccion", $this->direccion, PDO::PARAM_STR);
                $stmt->bindParam(":celular", $this->celular, PDO::PARAM_STR);
                $stmt->bindParam(":num_cta_1", $this->num_cta_1, PDO::PARAM_STR);
                $stmt->bindParam(":num_cta_2", $this->num_cta_2, PDO::PARAM_STR);
                $stmt->bindParam(":banco_cta_1", $this->banco_cta_1, PDO::PARAM_STR);
                $stmt->bindParam(":banco_cta_2", $this->banco_cta_2, PDO::PARAM_STR);
                $stmt->bindParam(":tipo_cta_1", $this->tipo_cta_1, PDO::PARAM_STR);
                $stmt->bindParam(":tipo_cta_2", $this->tipo_cta_2, PDO::PARAM_STR);
                $stmt->bindParam(":email2", $this->email2, PDO::PARAM_STR);
                $stmt->bindParam(":email3", $this->email3, PDO::PARAM_STR);
                $stmt->bindParam(":email4", $this->email4, PDO::PARAM_STR);
                $stmt->bindParam(":cargo_contactop1", $this->cargo_contactop1, PDO::PARAM_STR);
                $stmt->bindParam(":contacto_personal2", $this->contacto_personal2, PDO::PARAM_STR);
                $stmt->bindParam(":cargo_contactop2", $this->cargo_contactop2, PDO::PARAM_STR);
                $stmt->execute();
            
               

            } catch (Exception $e) {
                echo"Error, comuniquese con el administrador".  $e->getMessage().""; 
            }
    }

     /*///////////////////////////////////////
    Modificar Factoring
    //////////////////////////////////////*/
    public function modificar_factoring() {


        try{
    
 
            $pdo = AccesoDB::getCon();

            $sql_mod_cli = "UPDATE `factoring`
                                SET
                                `razon_social`      = :razon_social,
                                `telefono`          = :telefono ,
                                `contacto_personal` = :contacto_personal,
                                `direccion`         = :direccion,
                                `email`             = :email,
                                `celular`           = :celular,
                                `num_cta_1`         = :num_cta_1,
                                `num_cta_2`         = :num_cta_2,
                                `banco_cta_1`       = :banco_cta_1,
                                `banco_cta_2`       = :banco_cta_2,
                                `tipo_cta_1`        = :tipo_cta_1,
                                `tipo_cta_2`        = :tipo_cta_2,
                                `email2`            = :email2,
                                `email3`            = :email3,
                                `email4`            = :email4,
                                `cargo_contactop1`  = :cargo_contactop1,
                                `contacto_personal2`= :contacto_personal2,
                                `cargo_contactop2`  = :cargo_contactop2

                                
                                WHERE `id_factoring` = :id_fac";




            $stmt = $pdo->prepare($sql_mod_cli);
            //$stmt->bindParam(":rut", $this->rut, PDO::PARAM_STR);
            $stmt->bindParam(":razon_social", $this->razon_social, PDO::PARAM_STR); 
            $stmt->bindParam(":id_fac", $this->id_factoring, PDO::PARAM_STR);
            $stmt->bindParam(":email", $this->email, PDO::PARAM_STR); 
            $stmt->bindParam(":telefono", $this->telefono, PDO::PARAM_STR); 
            $stmt->bindParam(":contacto_personal", $this->contacto_personal, PDO::PARAM_STR); 
            $stmt->bindParam(":direccion", $this->direccion, PDO::PARAM_STR); 
            $stmt->bindParam(":celular",$this->celular ,PDO::PARAM_STR);
            $stmt->bindParam(":num_cta_1",$this->num_cta_1 ,PDO::PARAM_STR);
            $stmt->bindParam(":num_cta_2",$this->num_cta_2 ,PDO::PARAM_STR);
            $stmt->bindParam(":banco_cta_1",$this->banco_cta_1 ,PDO::PARAM_STR);
            $stmt->bindParam(":banco_cta_2 ",$this->banco_cta_2 ,PDO::PARAM_STR);
            $stmt->bindParam(":tipo_cta_1",$this->tipo_cta_1 ,PDO::PARAM_STR);
            $stmt->bindParam(":tipo_cta_2 ",$this->tipo_cta_2 ,PDO::PARAM_STR);
            $stmt->bindParam(":email2",$this->email2 ,PDO::PARAM_STR);
            $stmt->bindParam(":email3",$this->email3 ,PDO::PARAM_STR);
            $stmt->bindParam(":email4",$this->email4 ,PDO::PARAM_STR);
            $stmt->bindParam(":cargo_contactop1",$this->cargo_contactop1 ,PDO::PARAM_STR);
            $stmt->bindParam(":contacto_personal2",$this->contacto_personal2 ,PDO::PARAM_STR);
            $stmt->bindParam(":cargo_contactop2",$this->cargo_contactop2 ,PDO::PARAM_STR);
            $stmt->execute();
        

            } catch (Exception $e) {
                echo"Error, comuniquese con el administrador :".  $e->getMessage()."";
            }
    }
    

}

    ?>